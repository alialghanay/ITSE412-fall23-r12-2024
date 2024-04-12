<?php
// Including the 'connect.php' file, which presumably contains the code to establish a database connection
include 'connect.php';

// Constructing the SQL query to select all records from the 'applications' table
$query = "SELECT * FROM applications";

// Executing the SQL query
$result = $conn->query($query);

// Checking if there are any rows returned from the query
if ($result->num_rows > 0) {
    // If there are rows, initialize an empty array to hold the application data
    $apps = array();

    // Loop through each row returned by the query
    while ($row = $result->fetch_assoc()) {
        // Add each row (representing an application) to the array
        $apps[] = $row;
    }

    // Encode the array containing all application data as JSON and output it
    echo json_encode(array("status" => true, "apps" => $apps));
} else {
    // If no rows are returned from the query, return a JSON response indicating no users found
    echo json_encode(array("status" => false, "message" => "No applications found"));
}

// Closing the database connection
$conn->close();
?>
