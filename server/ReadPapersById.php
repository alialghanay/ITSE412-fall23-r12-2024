<?php
// Including the 'connect.php' file to establish a database connection
include 'connect.php';

// Checking if the 'pid' parameter is set in the POST request
if (isset($_POST['pid'])) {
    // Converting the 'pid' parameter to an integer
    $p_id = intval($_POST['pid']);
    // SQL query to select papers with the given 'p_id'
    $query = "SELECT  p_id, title, abstract, year, app_id, state, mem_id, lan FROM papers WHERE p_id = $p_id";
    // Executing the SQL query
    $result = $conn->query($query);
    // Checking if the query was successful and if there are any rows returned
    if ($result && $result->num_rows > 0) {
        // Initializing an array to store the papers data
        $papers = array();
        // Looping through each row of the result set
        while ($row = $result->fetch_assoc()) {
            // Adding each row of paper data to the 'papers' array
            $papers[] = $row;
        }
        // Outputting the papers data as JSON, indicating success
        echo json_encode(array("status" => "success", "papers" => $papers));
    } else {
        // Outputting an error message in JSON format if no papers are found with the given ID
        echo json_encode(array("status" => "error", "message" => "No papers found with the given ID"));
    }
} else {
    // Outputting an error message in JSON format if the 'pid' parameter is invalid or missing
    echo json_encode(array("status" => "error", "message" => "Invalid or missing p_id parameter"));
}

// Closing the database connection
$conn->close();
?>
