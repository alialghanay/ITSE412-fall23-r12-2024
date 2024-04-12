<?php
include 'connect.php';//Include the db connection file

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the user ID from the POST data, if it exists
    $userId = isset($_POST["userId"]) ? $_POST["userId"] : '';

    // Construct the SQL query to delete the member
    $deleteMember = "DELETE FROM members WHERE user_id = $userId";

    // Execute the delete query and handle the result
    if ($conn->query($deleteMember) === TRUE) {
        // If deletion is successful, send a success response
        echo json_encode(array("status" => "success", "message" => "member deleted successfully"));
    } else {
        // If an error occurs during deletion, send an error response with the detailed error message
        echo json_encode(array("status" => "error", "message" => "Error deleting member: " . $conn->error));
    }
} else {
    // If the request method is not POST, send an error response
    echo json_encode(array("status" => "error", "message" => "Invalid request method"));
}

// Close the database connection
$conn->close();
?>
