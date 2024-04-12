<?php
// Including the 'connect.php' file, which presumably contains the code to establish a database connection
include 'connect.php';

// Checking if the 'appid' parameter is set in the POST request and is a valid integer
if (isset($_POST['appid']) && filter_var($_POST['appid'], FILTER_VALIDATE_INT)) {
    // Retrieving and sanitizing the 'appid' parameter as an integer
    $app_id = intval($_POST['appid']);

    // Constructing the SQL query to select records from the 'applications' table based on the provided 'appid'
    $query = "SELECT * FROM applications WHERE app_id = $app_id";

    // Executing the SQL query
    $result = $conn->query($query);

    // Checking if the query execution was successful and if any rows were returned
    if ($result && $result->num_rows > 0) {
        // If there are rows returned, initialize an empty array to hold the application data
        $papers = array();

        // Loop through each row returned by the query
        while ($row = $result->fetch_assoc()) {
            // Add each row (representing an application) to the array
            $papers[] = $row;
        }

        // Encode the array containing application data as JSON and output it with a success status
        echo json_encode(array("status" => "success", "apps" => $papers));
    } else {
        // If no rows are returned from the query, return a JSON response indicating no papers found with the given ID
        echo json_encode(array("status" => "error", "message" => "No papers found with the given ID"));
    }
} else {
    // If the 'appid' parameter is missing or is not a valid integer, return a JSON response indicating an error
    echo json_encode(array("status" => "error", "message" => "Invalid or missing app_id parameter"));
}

// Closing the database connection
$conn->close();
?>
