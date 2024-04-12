<?php
include 'connect.php';// Include the DB connection file
// Define the SQL query to retrieve all member details
$query = "SELECT * FROM member_details_view;";

// Execute the SQL query
$result = mysqli_query($conn, $query);

// Check if the query was successful
if ($result) {
    // Fetch all member details as an associative array
    $members = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // Encode the member details as JSON and output it
    echo json_encode($members);
} else {
    // If the query fails, output an error message
    echo json_encode(['error' => 'Failed to retrieve members']);
}
// Close the database connection
mysqli_close($conn); ?>
