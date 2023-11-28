<?php

// Database configuration
$host = 'localhost';     // Replace with your database host (usually 'localhost')
$username = 'root'; // Replace with your database username
$password = ''; // Replace with your database password
$database = 'tailor'; // Replace with your database name

// Create a connection to the database
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
