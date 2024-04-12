<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $appid = isset($_POST["appid"]) ? $_POST["appid"] : '';

    $deletePapers = "DELETE FROM applications WHERE app_id = $appid";

    if ($conn->query($deletePapers) === TRUE) {
        echo json_encode(array("status" => "success", "message" => "papers deleted successfully"));
    } else {
        echo json_encode(array("status" => "error", "message" => "Error deleting papers: " . $conn->error));
    }
} else {
    echo json_encode(array("status" => "error", "message" => "Invalid request method"));
}

$conn->close();
