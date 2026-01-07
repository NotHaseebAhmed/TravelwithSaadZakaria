<?php
/**
 * URL Helper Functions
 * Use these functions throughout your site to generate SEO-friendly URLs
 */

// Base URL of your site (change this to your actual domain)
// define('BASE_URL', '/');
// For local development:
// Detect protocol (http / https)


$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'];

// Project folder name on localhost
$localProjectFolder = 'TravelwithSaadZakaria';

if ($host === 'localhost') {
    // Local environment
    define('BASE_URL', $protocol . '://' . $host . '/' . $localProjectFolder);
} else {
    // Hosting environment
    define('BASE_URL', $protocol . '://' . $host);
}

/**
 * Generate Home URL
 * @return string
 */
function get_home_url() {
    return BASE_URL . '/';
}


/**
 * Generate Contact Us URL
 * @return string
 */
function get_contact_url() {
    return BASE_URL . '/contact-us/';
}

/**
 * Generate Hotel List URL
 * @param string $location_slug Optional location filter
 * @return string
 */
function get_hotels_url($location_slug = null) {
    $url = BASE_URL . '/hotels';
    if ($location_slug) {
        $url .= '/' . $location_slug;
    }
    return $url . '/';
}

/**
 * Generate Single Hotel URL
 * @param string $hotel_slug
 * @return string
 */
function get_hotel_url($hotel_slug) {
    return BASE_URL . '/hotel/' . $hotel_slug . '/';
}

/**
 * Generate Car Rentals List URL
 * @return string
 */
function get_car_rentals_url() {
    return BASE_URL . '/car-rentals/';
}

/**
 * Generate Single Car Rental URL
 * @param string $car_slug
 * @return string
 */
function get_car_rental_url($car_slug) {
    return BASE_URL . '/car-rental/' . $car_slug . '/';
}

/**
 * Generate Umrah Packages List URL
 * @param string $type Optional: economy, business, premium
 * @return string
 */
function get_umrah_packages_url($type = null) {
    $url = BASE_URL . '/umrah-packages';
    if ($type) {
        $url .= '/' . strtolower($type);
    }
    return $url . '/';
}

/**
 * Generate Single Umrah Package URL
 * @param string $package_slug
 * @return string
 */
function get_umrah_package_url($package_slug) {
    return BASE_URL . '/umrah-package/' . $package_slug . '/';
}

/**
 * Generate Locations List URL
 * @return string
 */
function get_locations_url() {
    return BASE_URL . '/locations/';
}

/**
 * Generate Booking Confirmation URL
 * @return string
 */
// function get_booking_confirm_url() {
//     return BASE_URL . '/booking/confirm/';
// }

// /**
//  * Generate Booking Success URL
//  * @param int $booking_id Optional
//  * @return string
//  */
// function get_booking_success_url($booking_id = null) {
//     $url = BASE_URL . '/booking/success/';
//     if ($booking_id) {
//         $url .= '?id=' . $booking_id;
//     }
//     return $url;
// }

/**
 * Get Current URL
 * @return string
 */
function get_current_url() {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
    return $protocol . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
}

/**
 * Create a slug from string
 * @param string $string
 * @return string
 */
function create_slug($string) {
    $string = strtolower(trim($string));
    $string = preg_replace('/[^a-z0-9-]/', '-', $string);
    $string = preg_replace('/-+/', '-', $string);
    return trim($string, '-');
}

/**
 * Generate canonical URL (for SEO)
 * @param string $url
 * @return string
 */
function get_canonical_url($url = null) {
    if (!$url) {
        $url = get_current_url();
    }
    // Remove query parameters for canonical
    $url = strtok($url, '?');
    // Ensure trailing slash
    if (substr($url, -1) !== '/') {
        $url .= '/';
    }
    return $url;
}

/**
 * Redirect to URL
 * @param string $url
 * @param int $status_code Default 302 (temporary), use 301 for permanent
 */
function redirect_to($url, $status_code = 302) {
    header('Location: ' . $url, true, $status_code);
    exit();
}

/**
 * Check if current page is home
 * @return bool
 */
function is_home() {
    $script_name = basename($_SERVER['SCRIPT_NAME']);
    $uri = trim($_SERVER['REQUEST_URI'], '/');
    return $script_name === 'home.php' || empty($uri) || $uri === 'home';
}

/**
 * Check if current page is contact
 * @return bool
 */
function is_contact() {
    $script_name = basename($_SERVER['SCRIPT_NAME']);
    $uri = trim($_SERVER['REQUEST_URI'], '/');
    return $script_name === 'contact.php' || $script_name === 'contact-us.php' || $uri === 'contact-us';
}

/**
 * Check and redirect old URLs
 */
function check_and_redirect_old_urls() {
    $request_uri = $_SERVER['REQUEST_URI'];
    $script_name = basename($_SERVER['SCRIPT_NAME']);
    
    // Parse query string
    parse_str($_SERVER['QUERY_STRING'] ?? '', $query_params);
    
    // Hotel List: hotels/hotel-list.php -> /hotels/
    if ($script_name === 'hotel-list.php' && strpos($request_uri, '/hotels/hotel-list.php') !== false) {
        if (isset($query_params['location'])) {
            redirect_to(get_hotels_url($query_params['location']), 301);
        } else {
            redirect_to(get_hotels_url(), 301);
        }
    }
    
    // Hotel Details: hotels/hotel-details.php?slug=xyz -> /hotel/xyz/
    if ($script_name === 'hotel-details.php' && isset($query_params['slug'])) {
        if (strpos($request_uri, '/hotels/hotel-details.php') !== false) {
            redirect_to(get_hotel_url($query_params['slug']), 301);
        }
    }
    
    // Car List: car-rentals/car-rentals-list.php -> /car-rentals/
    if ($script_name === 'car-rentals-list.php' && strpos($request_uri, '/car-rentals/car-rentals-list.php') !== false) {
        redirect_to(get_car_rentals_url(), 301);
    }
    
    // Car Details: car-rentals/car-rental-detail.php?slug=xyz -> /car-rental/xyz/
    if ($script_name === 'car-rental-detail.php' && isset($query_params['slug'])) {
        if (strpos($request_uri, '/car-rentals/car-rental-detail.php') !== false) {
            redirect_to(get_car_rental_url($query_params['slug']), 301);
        }
    }
    
    // Umrah Package List: umrah-packages/umrah-packages-list.php -> /umrah-packages/
    if ($script_name === 'umrah-packages-list.php' && strpos($request_uri, '/umrah-packages/umrah-packages-list.php') !== false) {
        if (isset($query_params['type'])) {
            redirect_to(get_umrah_packages_url($query_params['type']), 301);
        } else {
            redirect_to(get_umrah_packages_url(), 301);
        }
    }
    
    // Umrah Package Details: umrah-packages/umrah-package-detail.php?slug=xyz -> /umrah-package/xyz/
    if ($script_name === 'umrah-package-detail.php' && isset($query_params['slug'])) {
        if (strpos($request_uri, '/umrah-packages/umrah-package-detail.php') !== false) {
            redirect_to(get_umrah_package_url($query_params['slug']), 301);
        }
    }
    
    // Home Page: views/home.php -> /
    if ($script_name === 'home.php' && strpos($request_uri, '/views/home.php') !== false) {
        redirect_to(get_home_url(), 301);
    }
    
    // Contact Page: views/contact.php or views/contact-us.php -> /contact-us/
    if (($script_name === 'contact.php' || $script_name === 'contact-us.php') && 
        strpos($request_uri, '/views/') !== false && strpos($request_uri, '.php') !== false) {
        redirect_to(get_contact_url(), 301);
    }
}

// Run the check automatically when this file is included
check_and_redirect_old_urls();
?>