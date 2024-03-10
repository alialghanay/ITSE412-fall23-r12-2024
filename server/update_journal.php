<?php
include 'connect.php'; // Assuming you have a connection script named connect.php

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are set and not empty
    if (isset($_POST['updateJId'], $_POST['updateJName'], $_POST['updateJDesc'], $_POST['updateDaysAllowed'], $_POST['updateCName'])) {
        // Retrieve form data
        $j_id = $_POST['updateJId'];
        $jname = $_POST['updateJName'];
        $jdesc = $_POST['updateJDesc'];
        $daysallowed = $_POST['updateDaysAllowed'];
        $c_name = $_POST['updateCName'];

        // Check if a new photo file is uploaded
        if (!empty($_FILES['updateJPhoto']['name'])) {
            $jphoto_tmp = $_FILES['updateJPhoto']['tmp_name'];
            $jphoto = file_get_contents($jphoto_tmp); // Read the file content
            $jphoto_type = $_FILES['updateJPhoto']['type'];

            // Prepare and bind parameters to prevent SQL injection
            $sql_update = "UPDATE journals SET jname = ?, jdesc = ?, daysallowed = ?, c_name = ?, jphoto = ? WHERE j_id = ?";
            $stmt = $conn->prepare($sql_update);
            $stmt->bind_param("sssiss", $jname, $jdesc, $daysallowed, $c_name, $jphoto, $j_id);
        } else {
            // Prepare and bind parameters without updating the photo
            $sql_update = "UPDATE journals SET jname = ?, jdesc = ?, daysallowed = ?, c_name = ? WHERE j_id = ?";
            $stmt = $conn->prepare($sql_update);
            $stmt->bind_param("ssisi", $jname, $jdesc, $daysallowed, $c_name, $j_id);
        }

        // Execute the update query
        if ($stmt->execute()) {
            echo "Journal updated successfully";
        } else {
            echo "Error updating journal: " . $conn->error;
        }

        // Close statement
        $stmt->close();
    } else {
        echo "Please fill all required fields";
    }
} else {
    echo "Invalid request method";
}

// Close connection
$conn->close();
?>
