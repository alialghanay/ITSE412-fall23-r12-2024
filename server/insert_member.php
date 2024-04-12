<?php
include 'connect.php';// Include the DB connection File

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve POST data and set default values if they are not provided
    $user_id = isset($_POST['user']) ? $_POST['user'] : '';
    $work = isset($_POST['work']) ? $_POST['work'] : '';
    $specialization = isset($_POST['specialization']) ? $_POST['specialization'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $country = isset($_POST['country']) ? $_POST['country'] : '';
    $biography = isset($_POST['biography']) ? $_POST['biography'] : '';
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $paper_id = isset($_POST['paper']) ? $_POST['paper'] : null;
    $application_id = isset($_POST['application']) ? $_POST['application'] : null;
    $lan1 = isset($_POST['lan1']) ? $_POST['lan1'] : '';
    $lan2 = isset($_POST['lan2']) ? $_POST['lan2'] : '';
    $role_id = isset($_POST['gridRadios']) ? $_POST['gridRadios'] : 3;
    
    // Construct the INSERT query
    $insert_query = "INSERT INTO members (user_id, work, specialization, phone, country, biography, title, p_id, app_id, lan1, lan2, roles)
                     VALUES ('$user_id', '$work', '$specialization', '$phone', '$country', '$biography', '$title', '$paper_id', '$application_id', '$lan1', '$lan2', '$role_id')";

    // Execute the INSERT query
    $result = mysqli_query($conn, $insert_query);

    // Check if the query was successful
    if ($result) {
        // If successful, output success message
        echo "Data inserted successfully!";
    } else {
        // If an error occurs, output error message
        echo "Error: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
