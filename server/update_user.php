<?php

include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST['userId'];
    $newUsername = $_POST['newUsername'];
    $newEmail = $_POST['newEmail'];
    $newPassword = $_POST['newPassword'];

    $query = "UPDATE users SET username='$newUsername', email='$newEmail', password='$newPassword' WHERE id='$userId'";
    $result = $conn->query($query);

    if ($result) {
        echo json_encode(array("success" => true, "message" => "User details updated successfully"));
    } else {
        echo json_encode(array("success" => false, "message" => "Failed to update user details"));
    }

    $conn->close();
} else {
    echo json_encode(array("success" => false, "message" => "Invalid request"));
}
?>
