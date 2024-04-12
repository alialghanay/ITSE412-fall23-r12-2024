<?php

include 'connect.php'; // DB connection
header("Access-Control-Allow-Origin: *");  // Allow requests from any origin

// Check that the j_id parameter is set and not empty
if (isset($_GET['j_id']) && !empty($_GET['j_id'])) {
    
    $j_id = $conn->real_escape_string($_GET['j_id']);

    // sql delete queury
    $sql = "DELETE FROM journals WHERE j_id = '$j_id'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Journal deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "No j_id parameter is provided";
}

// Close DB connection
$conn->close();

/*
    reviewed by @alialghanay on 10/10/2022
    Database Connection:
    Includes the connect.php file to establish a connection to the database.

    Cross-Origin Resource Sharing (CORS):
    Sets the header Access-Control-Allow-Origin: * to allow requests from any origin.

    Parameter Validation:
    Checks if the j_id parameter is set and not empty using isset($_GET['j_id']) and !empty($_GET['j_id']).
    If the parameter is valid, it retrieves and sanitizes the j_id value using $conn->real_escape_string($_GET['j_id']).
    
    SQL Delete Query:
    Constructs an SQL delete query to delete the journal entry with the specified j_id from the journals table.
    Execution and Response:

    Executes the SQL query using $conn->query($sql).
    If the query executes successfully, it outputs a success message indicating that the journal with the provided j_id was deleted.
    If there's an error during the query execution, it outputs an error message containing the error information obtained from $conn->error.
    Error Handling:

    If the j_id parameter is not provided, it outputs a message indicating that no j_id parameter is provided.
    Closing Database Connection: Closes the database connection to free up resources.
 */
?>