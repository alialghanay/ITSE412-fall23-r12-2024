<?php
// Database connection parameters
$host = "localhost"; // Hostname where the MySQL server is running
$username = "root";   // MySQL username
$password = "1234";   // MySQL password
$database = "rppp";   // Name of the MySQL database to connect to

// Establishing a connection to the MySQL database
$conn = new mysqli($host, $username, $password, $database);

// Checking if the connection was successful
if ($conn->connect_error) {
    // If connection fails, output an error message and terminate script execution
    die("Connection failed: " . $conn->connect_error);
}
?>
