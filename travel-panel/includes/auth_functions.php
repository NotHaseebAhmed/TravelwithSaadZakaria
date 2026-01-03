<?php
/**
 * Security & Authentication Functions
 * Save as: travel-panel/includes/auth_functions.php
 */

// Start secure session
function start_secure_session() {
    if (session_status() === PHP_SESSION_NONE) {
        // Secure session settings
        ini_set('session.cookie_httponly', 1);
        ini_set('session.use_only_cookies', 1);
        ini_set('session.cookie_secure', 0); // Set to 1 if using HTTPS
        ini_set('session.cookie_samesite', 'Strict');
        
        session_name('ADMIN_SESSION');
        session_start();
        
        // Regenerate session ID periodically
        if (!isset($_SESSION['created'])) {
            $_SESSION['created'] = time();
        } else if (time() - $_SESSION['created'] > 1800) {
            session_regenerate_id(true);
            $_SESSION['created'] = time();
        }
    }
}

// Check if user is logged in
function is_logged_in() {
    return isset($_SESSION['admin_logged_in']) && 
           $_SESSION['admin_logged_in'] === true &&
           isset($_SESSION['admin_id']);
}

// Require login (redirect if not logged in)
function require_login() {
    if (!is_logged_in()) {
        $_SESSION['redirect_after_login'] = $_SERVER['REQUEST_URI'];
        header('Location: /travel-panel/auth/login.php');
        exit;
    }
}

// Get client IP address
function get_client_ip() {
    $ip = $_SERVER['REMOTE_ADDR'];
    
    // Check for proxy
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0];
    }
    
    return filter_var($ip, FILTER_VALIDATE_IP) ? $ip : '0.0.0.0';
}

// Check rate limiting (prevent brute force)
function check_rate_limit($conn, $max_attempts = 5, $lockout_time = 900) {
    $ip = get_client_ip();
    $cutoff_time = date('Y-m-d H:i:s', time() - $lockout_time);
    
    // Clean old attempts
    $stmt = $conn->prepare("DELETE FROM login_attempts WHERE attempt_time < ?");
    $stmt->bind_param("s", $cutoff_time);
    $stmt->execute();
    
    // Count recent failed attempts
    $stmt = $conn->prepare("SELECT COUNT(*) as attempts FROM login_attempts 
                           WHERE ip_address = ? AND success = 0 AND attempt_time > ?");
    $stmt->bind_param("ss", $ip, $cutoff_time);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    
    if ($result['attempts'] >= $max_attempts) {
        return [
            'allowed' => false,
            'message' => 'Too many failed attempts. Please try again in 15 minutes.'
        ];
    }
    
    return ['allowed' => true];
}

// Log login attempt
function log_login_attempt($conn, $success = false) {
    $ip = get_client_ip();
    $time = date('Y-m-d H:i:s');
    
    $stmt = $conn->prepare("INSERT INTO login_attempts (ip_address, attempt_time, success) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $ip, $time, $success);
    $stmt->execute();
}

// Generate CSRF token
function generate_csrf_token() {
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

// Verify CSRF token
function verify_csrf_token($token) {
    return isset($_SESSION['csrf_token']) && 
           hash_equals($_SESSION['csrf_token'], $token);
}

// Sanitize input
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

// Login user
function login_user($conn, $username, $password, $csrf_token) {
    // Verify CSRF token
    if (!verify_csrf_token($csrf_token)) {
        return ['success' => false, 'message' => 'Invalid security token.'];
    }
    
    // Check rate limiting
    $rate_check = check_rate_limit($conn);
    if (!$rate_check['allowed']) {
        return ['success' => false, 'message' => $rate_check['message']];
    }
    
    // Sanitize username
    $username = sanitize_input($username);
    
    // Get user from database
    $stmt = $conn->prepare("SELECT id, username, password, locked_until FROM admin_users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 0) {
        log_login_attempt($conn, false);
        return ['success' => false, 'message' => 'Invalid username or password.'];
    }
    
    $user = $result->fetch_assoc();
    
    // Check if account is locked
    if ($user['locked_until'] && strtotime($user['locked_until']) > time()) {
        return ['success' => false, 'message' => 'Account is temporarily locked.'];
    }
    
    // Verify password
    if (!password_verify($password, $user['password'])) {
        log_login_attempt($conn, false);
        
        // Increment failed attempts
        $stmt = $conn->prepare("UPDATE admin_users SET failed_attempts = failed_attempts + 1 WHERE id = ?");
        $stmt->bind_param("i", $user['id']);
        $stmt->execute();
        
        return ['success' => false, 'message' => 'Invalid username or password.'];
    }
    
    // Successful login
    log_login_attempt($conn, true);
    
    // Reset failed attempts and update last login
    $stmt = $conn->prepare("UPDATE admin_users SET failed_attempts = 0, locked_until = NULL, 
                           last_login = NOW() WHERE id = ?");
    $stmt->bind_param("i", $user['id']);
    $stmt->execute();
    
    // Set session variables
    session_regenerate_id(true);
    $_SESSION['admin_logged_in'] = true;
    $_SESSION['admin_id'] = $user['id'];
    $_SESSION['admin_username'] = $user['username'];
    $_SESSION['login_time'] = time();
    
    return ['success' => true, 'message' => 'Login successful!'];
}

// Logout user
function logout_user() {
    $_SESSION = array();
    
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    
    session_destroy();
}
?>