<?php

include 'connect.php';

function getUsers($conn) {
    $usersQuery = "SELECT id, username FROM users";
    $usersResult = mysqli_query($conn, $usersQuery);

    $users = array();

    while ($row = mysqli_fetch_assoc($usersResult)) {
        $users[] = $row;
    }

    return $users;
}

// Function to get papers
function getPapers($conn) {
    $papersQuery = "SELECT p_id, title FROM papers";
    $papersResult = mysqli_query($conn, $papersQuery);

    $papers = array();

    while ($row = mysqli_fetch_assoc($papersResult)) {
        $papers[] = $row;
    }

    return $papers;
}

// Function to get applications
function getApplications($conn) {
    $applicationsQuery = "SELECT app_id, app_name FROM applications";
    $applicationsResult = mysqli_query($conn, $applicationsQuery);

    $applications = array();

    while ($row = mysqli_fetch_assoc($applicationsResult)) {
        $applications[] = $row;
    }

    return $applications;
}

// Get data
$users = getUsers($conn);
$papers = getPapers($conn);
$applications = getApplications($conn);

// Close the connection
mysqli_close($conn);

// Return the data as JSON
echo json_encode(array('users' => $users, 'papers' => $papers, 'applications' => $applications));
?>
