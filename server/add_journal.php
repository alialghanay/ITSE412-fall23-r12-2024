<?php
include 'connect.php';

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $jname = $conn->real_escape_string($_POST['jname']);
    $jdesc = $conn->real_escape_string($_POST['jdesc']);
    $daysallowed = $conn->real_escape_string($_POST['daysallowed']);
    $c_name = $conn->real_escape_string($_POST['c_name']);

    // File upload handling
    $jphoto = $_FILES['jphoto']['tmp_name'];
    if (!is_null($jphoto)) {
        $jphoto = addslashes(file_get_contents($jphoto));
    }

    // Insert into database without specifying j_id
    $sql = "INSERT INTO journals (jname, jdesc, daysallowed, c_name, jphoto) 
            VALUES ('$jname', '$jdesc', '$daysallowed', '$c_name', '$jphoto')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
