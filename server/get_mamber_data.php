<?php

include 'connect.php';// Include the DB connection file

// Function to fetch users from the database
function getUsers($conn) {
    // SQL query to select users
    $usersQuery = "SELECT id, username FROM users as u where u.id NOT IN (SELECT user_id FROM member_details_view)";
    // Execute the query
    $usersResult = mysqli_query($conn, $usersQuery);

    // Array to store fetched users
    $users = array();

    // Iterate over the result set and store each user in the array
    while ($row = mysqli_fetch_assoc($usersResult)) {
        $users[] = $row;
    }

    // Return the array of users
    return $users;
}

// Function to fetch papers from the database
function getPapers($conn) {
    // SQL query to select papers
    $papersQuery = "SELECT p_id, title FROM papers";
    // Execute the query
    $papersResult = mysqli_query($conn, $papersQuery);

    // Array to store fetched papers
    $papers = array();

    // Iterate over the result set and store each paper in the array
    while ($row = mysqli_fetch_assoc($papersResult)) {
        $papers[] = $row;
    }

    // Return the array of papers
    return $papers;
}

// Function to fetch applications from the database
function getApplications($conn) {
    // SQL query to select applications
    $applicationsQuery = "SELECT app_id, app_name FROM applications";
    // Execute the query
    $applicationsResult = mysqli_query($conn, $applicationsQuery);

    // Array to store fetched applications
    $applications = array();

    // Iterate over the result set and store each application in the array
    while ($row = mysqli_fetch_assoc($applicationsResult)) {
        $applications[] = $row;
    }

    // Return the array of applications
    return $applications;
}

// Call the functions to fetch users, papers, and applications
$users = getUsers($conn);
$papers = getPapers($conn);
$applications = getApplications($conn);

// Close the database connection
mysqli_close($conn);

// Encode the fetched data as JSON and output it
echo json_encode(array('users' => $users, 'papers' => $papers, 'applications' => $applications));
?>
