<?php
include 'connect.php';

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $jname = $conn->real_escape_string($_POST['jname']);
    $jdesc = $conn->real_escape_string($_POST['jdesc']);
    $daysallowed = $conn->real_escape_string($_POST['daysallowed']);
    $c_name = $conn->real_escape_string($_POST['c_name']);

    // Assuming j_id is obtained from another source or auto-generated
    $j_id = 1; // Replace with the actual j_id value

    // File upload handling
    $jphoto = '';
    if (isset($_FILES['jphoto']) && $_FILES['jphoto']['error'] === UPLOAD_ERR_OK) {
        $jphoto_tmp_name = $_FILES['jphoto']['tmp_name'];
        $jphoto = addslashes(file_get_contents($jphoto_tmp_name));
    }

    // Insert into database
    $sql = "INSERT INTO journals (j_id, jname, jdesc, daysallowed, c_name, jphoto) 
            VALUES ('$j_id', '$jname', '$jdesc', '$daysallowed', '$c_name', '$jphoto')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
