<?php
// Including the 'connect.php' file to establish a database connection
include 'connect.php';

// Checking if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieving the 'pid' parameter from the POST request, if it exists
    $pid = isset($_POST["pid"]) ? $_POST["pid"] : '';

    // Performing validation if needed

    // SQL query to delete papers with the given 'pid'
    $deletePapers = "DELETE FROM papers WHERE p_id = $pid";

    // Executing the SQL query
    if ($conn->query($deletePapers) === TRUE) {
        // Outputting a success message in JSON format if the papers are deleted successfully
        echo json_encode(array("status" => "success", "message" => "Papers deleted successfully"));
    } else {
        // Outputting an error message in JSON format if there is an error deleting papers
        echo json_encode(array("status" => "error", "message" => "Error deleting papers: " . $conn->error));
    }
} else {
    // Outputting an error message in JSON format if the request method is not POST
    echo json_encode(array("status" => "error", "message" => "Invalid request method"));
}

// Closing the database connection
$conn->close();
?>
