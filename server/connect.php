<?php

$host = "localhost"; 
$username = "root";
$password = "1234";
$database = "rppp";

// Attempt to connect to the database
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>