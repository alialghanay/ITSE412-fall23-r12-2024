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
        $jphoto = $row['jphoto'];

        // Prepare journal data as an associative array
        $journalData = array(
            'j_id' => $j_id,
            'jname' => $jname_previous,
            'jdesc' => $jdesc_previous,
            'daysallowed' => $daysallowed_previous,
            'c_name' => $c_name_previous,
            'jphoto' => base64_encode($jphoto) // Convert photo to base64 for JSON compatibility
        );

        // Encode journal data as JSON and echo it
        echo json_encode($journalData);
    } else {
        echo "No journal found with j_id = $j_id";
        exit;
    }
} else {
    echo "No j_id parameter provided";
    exit;
}

// Close connection
$conn->close();
?>
