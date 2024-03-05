<?php
// Include your database connection file here
include 'connect.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user data from the form
    $userId = $_POST['userId'];
    $newUsername = $_POST['newUsername'];
    $newEmail = $_POST['newEmail'];
    $newPassword = $_POST['newPassword'];

    // Your SQL query to update user data in the database
    $query = "UPDATE users SET username='$newUsername', email='$newEmail', password='$newPassword' WHERE id='$userId'";
    $result = $conn->query($query);

    if ($result) {
        // If the query is successful, send a success response
        echo json_encode(array("success" => true, "message" => "User details updated successfully"));
    } else {
        // If the query fails, send an error response
        echo json_encode(array("success" => false, "message" => "Failed to update user details"));
    }

    // Close the database connection
    $conn->close();
} else {
    // If the form is not submitted, send an error response
    echo json_encode(array("success" => false, "message" => "Invalid request"));
}
?>
