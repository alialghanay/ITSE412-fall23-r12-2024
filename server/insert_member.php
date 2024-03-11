<?php
// Include your database connection file
include 'connect.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data from the form
    $user_id = $_POST['user'];
    $work = $_POST['work'];
    $specialization = $_POST['specializtion'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    $biography = $_POST['biography'];
    $title = $_POST['title'];
    $paper_id = $_POST['paper'];
    // If 'journal' is used in the form, retrieve its value
    // $journal_id = $_POST['journal'];
    $application_id = $_POST['application'];
    $lan1 = $_POST['lan1'];
    $lan2 = $_POST['lan2'];
    $role_id = $_POST['gridRadios'];

    // Insert data into the 'members' table
    $insert_query = "INSERT INTO members (user_id, work, specialization, phone, country, biography, title, p_id, app_id, lan1, lan2, roles)
                     VALUES ('$user_id', '$work', '$specialization', '$phone', '$country', '$biography', '$title', '$paper_id', '$application_id', '$lan1', '$lan2', '$role_id')";

    $result = mysqli_query($conn, $insert_query);

    // Check if the insertion was successful
    if ($result) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
