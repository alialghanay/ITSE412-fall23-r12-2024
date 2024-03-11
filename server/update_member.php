<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : '';
    $work = isset($_POST['work']) ? $_POST['work'] : '';
    $specialization = isset($_POST['specialization']) ? $_POST['specialization'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $country = isset($_POST['country']) ? $_POST['country'] : '';
    $biography = isset($_POST['biography']) ? $_POST['biography'] : '';
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $paper_id = isset($_POST['paper']) ? $_POST['paper'] : '';
    $application_id = isset($_POST['application']) ? $_POST['application'] : '';
    $lan1 = isset($_POST['lan1']) ? $_POST['lan1'] : '';
    $lan2 = isset($_POST['lan2']) ? $_POST['lan2'] : '';
    $role_id = isset($_POST['gridRadios']) ? $_POST['gridRadios'] : '';
    
    if (!empty($user_id)) {
        $insert_query = "UPDATE members SET work='$work', specialization='$specialization', phone='$phone', country='$country', biography='$biography', title='$title', p_id='$paper_id', app_id='$application_id', lan1='$lan1', lan2='$lan2', roles='$role_id' WHERE user_id='$user_id'";

        $result = mysqli_query($conn, $insert_query);

        if ($result) {
            echo "Data Updated successfully!";
        } else {
            echo "Test: " . $role_id;
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Error: Missing or empty fields.";
    }

    mysqli_close($conn);
}
?>
