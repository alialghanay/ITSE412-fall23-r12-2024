<?php
include 'connect.php';

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $app_name = $_POST['app_name'];
    $publish_number = $_POST['publish_number'];
    $publish_date = $_POST['publish_date'];
    $sql = "INSERT INTO applications (app_name, publish_number, publish_date) VALUES ('$app_name', '$publish_number', '$publish_date')";
    if ($conn->query($sql) === TRUE) {
        $response['success'] = true;
        $response['message'] = "New record created successfully";
    } else {
        $response['success'] = false;
        $response['message'] = "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    $response['success'] = false;
    $response['message'] = "Invalid request method";
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($response);
