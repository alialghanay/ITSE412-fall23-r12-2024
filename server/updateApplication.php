<?php
// Including the 'connect.php' file, which presumably contains the code to establish a database connection
include 'connect.php';

// Checking if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieving the POST parameters for app_id, app_name, publish_number, and publish_date
    $id = $_POST['app_id'];
    $app_name = $_POST['app_name'];
    $publish_number = $_POST['publish_number'];
    $publish_date = $_POST['publish_date'];
    
    // Constructing the SQL query to update the record in the 'applications' table
    $sql = "UPDATE applications SET app_name='$app_name', publish_number='$publish_number', publish_date='$publish_date' WHERE app_id='$id'";
    
    // Executing the SQL query
    $result = $conn->query($sql);

    // Checking if the query execution was successful
    if ($result) {
        // If the update is successful, returning a success message as JSON
        echo json_encode(array("success" => true, "message" => "Paper details updated successfully"));
    } else {
        // If an error occurs during the update, returning an error message as JSON
        echo json_encode(array("success" => false, "message" => "Failed to update paper details"));
    }

    // Closing the database connection
    $conn->close();
} else {
    // If the request method is not POST, returning an error message as JSON
    echo json_encode(array("success" => false, "message" => "Invalid request"));
}
?>
