<?php
include 'connect.php';
$query = "SELECT * FROM users";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $users = array();

    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }

    echo json_encode(array("status" => "success", "users" => $users));
} else {

    echo json_encode(array("status" => "error", "message" => "No users found"));
}

$conn->close();
