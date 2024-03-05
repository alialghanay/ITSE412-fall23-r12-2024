<?php

// Database credentials
$host = "localhost"; // Change this to your database host
$username = "root"; // Change this to your database username
$password = "1234"; // Change this to your database password
$database = "rppp"; // Change this to your database name

// Attempt to connect to the database
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";



?>