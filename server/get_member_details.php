<?php
include 'connect.php';// Include the DB connection file


// Check if the 'user_id' parameter is set in the GET request
if (isset($_GET['user_id'])) {
    // Sanitize the 'user_id' parameter to prevent SQL injection
    $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);

    // Construct the SQL query to retrieve member details based on the user_id
    $query = "SELECT * FROM member_details_view WHERE user_id = '$user_id'";

    // Execute the SQL query
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if ($result) {
        // Fetch the member details as an associative array
        $memberDetails = mysqli_fetch_assoc($result);
        // Encode the member details as JSON and output it
        echo json_encode($memberDetails);
    } else {
        // If the query fails, output an error message
        echo json_encode(['error' => 'Failed to retrieve member details']);
    }
} else {
    // If the 'user_id' parameter is missing in the GET request, output an error message
    echo json_encode(['error' => 'Missing user_id parameter']);
}

// Close the database connection
mysqli_close($conn);
?>
