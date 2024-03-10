<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pid = isset($_POST["pid"]) ? $_POST["pid"] : '';

    // Perform validation if needed

    $deletePapers = "DELETE FROM papers WHERE p_id = $pid";

    if ($conn->query($deletePapers) === TRUE) {
        echo json_encode(array("status" => "success", "message" => "papers deleted successfully"));
    } else {
        echo json_encode(array("status" => "error", "message" => "Error deleting papers: " . $conn->error));
    }
} else {
    echo json_encode(array("status" => "error", "message" => "Invalid request method"));
}

$conn->close();
?>