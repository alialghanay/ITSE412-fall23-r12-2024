<?php

// Database credentials
$host = "localhost"; // Change this to your database host
$username = "your_username"; // Change this to your database username
$password = "your_password"; // Change this to your database password
$database = "rpppo"; // Change this to your database name

// Attempt to connect to the database
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";



?>