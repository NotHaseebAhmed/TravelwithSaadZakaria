<?php
/**
 * Logout Handler
 * Save as: travel-panel/auth/logout.php
 */

require_once __DIR__ . '/../includes/auth_functions.php';

start_secure_session();
logout_user();

header('Location: /travelwithsaadzakaria/travel-panel/auth/login.php');
exit;
?>