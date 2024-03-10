<?php
include 'connect.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user data from the form
    $id = $_POST['p_id'];
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $abstract = isset($_POST['abstract']) ? $_POST['abstract'] : '';
    $year = isset($_POST['year']) ? intval($_POST['year']) : 0; // Convert to integer
    // Handle file upload separately
    $file = ''; // Initialize file variable
    if (isset($_FILES['file'])) {
        $file = $_FILES['file']['name']; // Get file name
        // Handle file upload logic here
    }
    $app_id = isset($_POST['app_id']) ? intval($_POST['app_id']) : 0; // Convert to integer
    $state = isset($_POST['state']) ? $_POST['state'] : '';
    $mem_id = isset($_POST['mem_id']) ? $_POST['mem_id'] : '';
    $lan = isset($_POST['lan']) ? $_POST['lan'] : '';
    
    $sql = "UPDATE papers SET title='$title', abstract='$abstract', year='$year', file='$file', app_id='$app_id', state='$state', mem_id='$mem_id', lan='$lan' WHERE p_id='$id'";
    $result = $conn->query($sql);

    if ($result) {
        // If the query is successful, send a success response
        echo json_encode(array("success" => true, "message" => "Paper details updated successfully"));
    } else {
        // If the query fails, send an error response
        echo json_encode(array("success" => false, "message" => "Failed to update paper details"));
    }

    // Close the database connection
    $conn->close();
} else {
    // If the form is not submitted, send an error response
    echo json_encode(array("success" => false, "message" => "Invalid request"));
}
?>
