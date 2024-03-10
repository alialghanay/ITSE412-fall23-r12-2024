<?php
include 'connect.php';

error_log("Received POST request: " . print_r($_POST, true));

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are set
    if (isset($_POST['title']) && isset($_POST['abstract']) && isset($_POST['year']) && isset($_POST['app_id']) && isset($_POST['state']) && isset($_POST['mem_id']) && isset($_POST['lan'])) {
        // Debug log to check form data
        error_log("All required fields are set");

        $title = $_POST['title'];
        $abstract = $_POST['abstract'];
        $year = $_POST['year'];
        // You should handle file uploads properly, this assumes you're storing file paths in the database
        $file = isset($_POST['file']) ? $_POST['file'] : null;
        $app_id = $_POST['app_id'];
        $state = $_POST['state'];
        $mem_id = $_POST['mem_id'];
        $lan = $_POST['lan'];

        // Debug log to check SQL query
        $sql = "INSERT INTO papers (title, abstract, year, file, app_id, state, mem_id, lan) VALUES ('$title', '$abstract', '$year', '$file', '$app_id', '$state', '$mem_id', '$lan')";
        error_log("SQL query: " . $sql);

        if ($conn->query($sql) === TRUE) {
            // Set success message in response
            $response['success'] = true;
            $response['message'] = "New record created successfully";
        } else {
            // Set error message in response
            $response['success'] = false;
            $response['message'] = "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        // Set error message if required fields are not set
        $response['success'] = false;
        $response['message'] = "Required fields are missing";
    }
} else {
    // Set error message if request method is not POST
    $response['success'] = false;
    $response['message'] = "Invalid request method";
}

// Close database connection
$conn->close();

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
