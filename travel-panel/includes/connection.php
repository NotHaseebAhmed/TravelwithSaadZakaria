<?php
// ===========================================
//  DATABASE CONNECTION FILE
//  Project: Travel With Saad
//  Author: Haseeb Ahmed
// ===========================================

// Database credentials
$host = 'Localhost';        // usually 'localhost'
$username = 'root';          // your MySQL username
$password = '';              // your MySQL password
$database = 'travel_with_saad'; // your database name

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("❌ Database connection failed: " . $conn->connect_error);
}

// Optional: Set charset for proper Unicode support
$conn->set_charset("utf8mb4");



?>
