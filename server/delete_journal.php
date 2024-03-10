<?php
// Set CORS headers to allow requests from any origin
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type");

// Include the connection script
include 'connect.php'; // Assuming you have a connection script named connect.php

// Check if j_id parameter is set and not empty
if (isset($_GET['j_id']) && !empty($_GET['j_id'])) {
    // Sanitize the j_id parameter
    $j_id = $conn->real_escape_string($_GET['j_id']);

    // Delete the journal from the database
    $sql_delete = "DELETE FROM journals WHERE j_id = '$j_id'";

    if ($conn->query($sql_delete) === TRUE) {
        echo "Journal with j_id = $j_id deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "No j_id parameter provided";
}

// Close connection
$conn->close();
?>
