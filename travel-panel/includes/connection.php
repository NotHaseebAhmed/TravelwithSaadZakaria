<?php
// ===========================================
//  DATABASE CONNECTION FILE
//  Project: Travel With Saad
//  Author: Haseeb Ahmed
// ===========================================

// Database credentials
$host = getenv('DB_HOST');        // usually 'localhost'
$username = getenv('DB_USER');          // your MySQL username
$password = getenv('DB_PASSWORD');              // your MySQL password
$database = getenv('DB_NAME'); // your database name

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("❌ Database connection failed: " . $conn->connect_error);
}

// Optional: Set charset for proper Unicode support
$conn->set_charset("utf8mb4");



?>
