<?php
// Including the 'connect.php' file to establish a database connection
include 'connect.php';

// Checking if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieving data from the POST request
    $title = $_POST['title'];
    $abstract = $_POST['abstract'];
    $year = $_POST['year'];
    $app_id = $_POST['app_id'];
    $state = $_POST['state'];
    $mem_id = $_POST['mem_id'];
    $lan = $_POST['lan'];
    
    // Initializing an empty variable for the file
    $file = '';
    // Checking if a file is uploaded and there is no error
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        // Getting the temporary file name
        $file_tmp_name = $_FILES['file']['tmp_name'];
        // Getting information about the file
        $file_info = pathinfo($_FILES['file']['name']);
        // Getting the extension of the file and converting it to lowercase
        $extension = strtolower($file_info['extension']);
        // Array of allowed extensions
        $allowed_extensions = array('pdf','jpg', 'jpeg', 'png');
    
        // Checking if the uploaded file has an allowed extension
        if (in_array($extension, $allowed_extensions)) {
            // Reading the contents of the file and adding slashes to escape special characters
            $file = addslashes(file_get_contents($file_tmp_name));
        } else {
            // Displaying an error message if the uploaded file is not a PDF
            echo "Error: Only PDF files are allowed.";
            // Exiting the script
            exit; 
        }
    }
    
    // Constructing the SQL query to update paper details
    $sql = "UPDATE papers SET title='$title', abstract='$abstract', year='$year', file='$file', app_id='$app_id', state='$state', lan='$lan' WHERE p_id='$id'";
    // Executing the SQL query
    $result = $conn->query($sql);

    // Checking if the query was successful
    if ($result) {
        // Outputting a success message in JSON format
        echo json_encode(array("success" => true, "message" => "Paper details updated successfully"));
    } else {
        // Outputting an error message in JSON format if the query failed
        echo json_encode(array("success" => false, "message" => "Failed to update paper details"));
    }

    // Closing the database connection
    $conn->close();
} else {
    // Outputting an error message in JSON format if the request method is not POST
    echo json_encode(array("success" => false, "message" => "Invalid request"));
}
?>
