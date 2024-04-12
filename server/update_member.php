<?php
include 'connect.php';// Include th DB connection file


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
    
    // Check if user_id is not empty
    if (!empty($user_id)) {
        // Construct the UPDATE query
        $update_query = "UPDATE members SET work='$work', specialization='$specialization', phone='$phone', country='$country', biography='$biography', title='$title', lan1='$lan1', lan2='$lan2', roles='$role_id'";
        
        // Check if paper_id is provided
        if(!empty($paper_id)){
            $update_query .= " ,p_id = '$paper_id' ";
        }
        
        // Check if application_id is provided
        if(!empty($application_id)){
            $update_query .= " ,app_id = '$application_id' ";
        }
        
        // Append condition to update specific user
        $update_query .= " WHERE user_id = '$user_id'";

        // Execute the UPDATE query
        $result = mysqli_query($conn, $update_query);

        // Check if the query was successful
        if ($result) {
            // If successful, output success message
            echo "Data Updated successfully!";
        } else {
            // If an error occurs, output error message
            echo "Test: " . $role_id; // Just for testing, can be removed
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        // If user_id is empty or missing, output error message
        echo "Error: Missing or empty fields.";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
