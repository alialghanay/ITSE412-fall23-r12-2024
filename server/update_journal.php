<?php
include 'connect.php'; // Assuming you have a connection script named connect.php

// Check if j_id parameter is set and not empty
if (isset($_GET['j_id']) && !empty($_GET['j_id'])) {
    // Sanitize the j_id parameter
    $j_id = $conn->real_escape_string($_GET['j_id']);

    // Retrieve previous data of the journal with the specified j_id
    $sql_select = "SELECT * FROM journals WHERE j_id = '$j_id'";
    $result = $conn->query($sql_select);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Store previous data into variables
        $jname_previous = $row['jname'];
        $jdesc_previous = $row['jdesc'];
        $daysallowed_previous = $row['daysallowed'];
        $c_name_previous = $row['c_name'];
    } else {
        echo "No journal found with j_id = $j_id";
        exit;
    }
} else {
    echo "No j_id parameter provided";
    exit;
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $jname = $conn->real_escape_string($_POST['jname']);
    $jdesc = $conn->real_escape_string($_POST['jdesc']);
    $daysallowed = $conn->real_escape_string($_POST['daysallowed']);
    $c_name = $conn->real_escape_string($_POST['c_name']);

    // Update the journal in the database
    $sql_update = "UPDATE journals SET jname = '$jname', jdesc = '$jdesc', daysallowed = '$daysallowed', c_name = '$c_name' WHERE j_id = '$j_id'";

    if ($conn->query($sql_update) === TRUE) {
        echo "Journal with j_id = $j_id updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Close connection
$conn->close();
?>
