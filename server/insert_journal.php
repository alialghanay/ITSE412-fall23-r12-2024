<?php

include 'connect.php'; //DB Connection


header("Access-Control-Allow-Origin: *");  // Allow requests from any origin

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    // real_escape_string for safety and previnting sql injection attacks
    $jname = $conn->real_escape_string($_POST['jname']);
    $jdesc = $conn->real_escape_string($_POST['jdesc']);
    $daysallowed = $conn->real_escape_string($_POST['daysallowed']);
    $c_name = $conn->real_escape_string($_POST['c_name']);
 
    // Photos upload handling
    $jphoto = '';
    if (isset($_FILES['jphoto']) && $_FILES['jphoto']['error'] === UPLOAD_ERR_OK) {
        $jphoto_tmp_name = $_FILES['jphoto']['tmp_name'];
        $file_info = pathinfo($_FILES['jphoto']['name']);
        $extension = strtolower($file_info['extension']);
        //only accepting these pictures extenisons
        $allowed_extensions = array('jpg', 'jpeg', 'png');

        
        if (in_array($extension, $allowed_extensions)) {
            
            $jphoto = addslashes(file_get_contents($jphoto_tmp_name));
        } else {
            echo "Error: Only JPEG and PNG files are allowed.";
            exit; // Stop execution if invalid file extension
        }
    }
    // Insert values into database
    $sql = "INSERT INTO journals (jname, jdesc, daysallowed, c_name, jphoto) VALUES
     ('$jname', '$jdesc', '$daysallowed', '$c_name', '$jphoto')";

    if ($conn->query($sql) === TRUE) {
        echo "New Journal has been added";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

//closing DB connection
$conn->close();

/*
    reviewed by @alialghanay on 10/10/2022
    Database Connection:
    Includes the connect.php file to establish a connection to the database.

    Cross-Origin Resource Sharing (CORS):
    Sets the header Access-Control-Allow-Origin: * to allow requests from any origin.

    Request Method Validation:
    Checks if the request method is POST using $_SERVER["REQUEST_METHOD"] == "POST".
    This ensures that the script is only executed when a POST request is made.

    Data Retrieval and Sanitization:
    Retrieves the values of jname, jdesc, daysallowed, and c_name from the POST data.
    Uses $conn->real_escape_string() to sanitize the retrieved values, preventing SQL injection attacks.

    File Upload Handling:
    Checks if a file (jphoto) is uploaded and if there are no errors (UPLOAD_ERR_OK).
    Validates the file extension to ensure it's either JPEG or PNG.
    Reads the contents of the uploaded file using file_get_contents() and escapes it using addslashes() before storing it in the database.
    
    Insertion into Database:
    Constructs an SQL insert query to insert the retrieved values into the journals table.
    Executes the SQL query using $conn->query($sql).
    If the insertion is successful, it outputs a success message.
    If there's an error during the insertion, it outputs an error message containing the SQL query and the error information obtained from $conn->error.
    
    Closing Database Connection:
    Closes the database connection to free up resources.
*/
?>