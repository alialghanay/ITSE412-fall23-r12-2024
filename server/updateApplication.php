<?php
include 'connect.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user data from the form
    $id = $_POST['app_id'];
    $app_name = isset($_POST['app_name']) ? $_POST['app_name'] : '';
    $publish_number = isset($_POST['publish_number']) ? $_POST['publish_number'] : '';
    $publish_date = isset($_POST['publish_date']) ? intval($_POST['publish_date']) : 0; // Convert to integer
    
    $sql = "UPDATE applications SET app_name='$app_name', publish_number='$publish_number', publish_date='$publish_date' WHERE app_id='$id'";
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
