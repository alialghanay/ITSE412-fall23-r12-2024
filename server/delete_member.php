<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = isset($_POST["userId"]) ? $_POST["userId"] : '';

    // Perform validation if needed

    $deleteMember = "DELETE FROM members WHERE id = $userId";

    if ($conn->query($deleteMember) === TRUE) {
        echo json_encode(array("status" => "success", "message" => "member deleted successfully"));
    } else {
        echo json_encode(array("status" => "error", "message" => "Error deleting member: " . $conn->error));
    }
} else {
    echo json_encode(array("status" => "error", "message" => "Invalid request method"));
}

$conn->close();
?>