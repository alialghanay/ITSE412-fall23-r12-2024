<?php

include 'connect.php'; // DB connection
header("Access-Control-Allow-Origin: *");  // Allow requests from any origin


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are set and not empty
    if (isset($_POST['updateJId'], $_POST['updateJName'], $_POST['updateJDesc'], $_POST['updateDaysAllowed'], $_POST['updateCName'])) {
        
        $j_id = $_POST['updateJId'];
        $jname = $_POST['updateJName'];
        $jdesc = $_POST['updateJDesc'];
        $daysallowed = $_POST['updateDaysAllowed'];
        $c_name = $_POST['updateCName'];
         
        // Check if a new photo is uploaded
        if (!empty($_FILES['updateJPhoto']['name'])) {
            $jphoto_tmp = $_FILES['updateJPhoto']['tmp_name'];
            $jphoto = file_get_contents($jphoto_tmp); 
            $jphoto_type = $_FILES['updateJPhoto']['type'];

            // Prepare and bind parameters to prevent SQL injection
            $sql_update = "UPDATE journals SET jname = ?, jdesc = ?, daysallowed = ?, c_name = ?, jphoto = ? WHERE j_id = ?";
            $stmt = $conn->prepare($sql_update);
            $stmt->bind_param("sssiss", $jname, $jdesc, $daysallowed, $c_name, $jphoto, $j_id);
        } else {       
            // Prepare and bind parameters to prevent SQL injection
            $sql_update = "UPDATE journals SET jname = ?, jdesc = ?, daysallowed = ?, c_name = ? WHERE j_id = ?";
            $stmt = $conn->prepare($sql_update);
            $stmt->bind_param("ssisi", $jname, $jdesc, $daysallowed, $c_name, $j_id);
        }
        // Execute the update query statement
        if ($stmt->execute()) {
            echo "Journal updated successfully";
        } else {
            echo "Error updating journal: " . $conn->error;
        }
        //  Close statement
        $stmt->close();
        
    } else {
        echo "Please fill all required fields";
        
    }
} else {
    
    echo "Wrong method used for updating!";
}
//  Close connection
$conn->close();

/*
    reviewed by @alialghanay on 10/10/2022
    Database Connection:
    Includes the connect.php file to establish a connection to the database.

    Cross-Origin Resource Sharing (CORS):
    Sets the header Access-Control-Allow-Origin: * to allow requests from any origin.

    Request Method Validation:
    Checks if the request method is POST using $_SERVER["REQUEST_METHOD"] == "POST". This ensures that the script is only executed when a POST request is made.

    Data Validation:
    Checks if all required fields (updateJId, updateJName, updateJDesc, updateDaysAllowed, updateCName) are set and not empty in the POST data.

    Updating Journal Entry:
    Retrieves the values of j_id, jname, jdesc, daysallowed, and c_name from the POST data.
    Checks if a new photo is uploaded. If so, retrieves and binds the photo contents and type to the update query statement.
    Prepares the SQL update query statement with placeholders to prevent SQL injection.
    Binds the parameters to the prepared statement using bind_param().
    Executes the update query using $stmt->execute().
    If the update is successful, it outputs a success message. Otherwise, it outputs an error message containing the error information obtained from $conn->error.
    
    Error Handling:
    If any required fields are missing or empty, it outputs a message indicating that all required fields need to be filled.
    If the request method used is not POST, it outputs a message indicating that the wrong method was used for updating.
    Closing Database Connection: Closes the database connection to free up resources.

*/
?>
