<?php
include 'connect.php'; // Assuming you have a connection script named connect.php

// when comitting remove these headers to show that u are having a problem and an error مهممم
header("Access-Control-Allow-Origin: *"); // Allow requests from any origin
header("Access-Control-Allow-Methods: GET, POST"); // Allow GET and POST requests
header("Access-Control-Allow-Headers: Content-Type"); // Allow the Content-Type header
// Retrieve journals from the database
$sql_select = "SELECT * FROM journals";
$result = $conn->query($sql_select);

// Check if there are any journals found
if ($result->num_rows > 0) {
    // Start building the HTML table
    $output = '<table class="table">';
    $output .= '<thead><tr><th>Journal ID</th><th>Journal Name</th><th>Description</th><th>Days Allowed</th><th>Journal Photo</th><th>Catogory Name</th></tr></thead>';
    $output .= '<tbody>';
    
    // Fetch and output each journal row
    while ($row = $result->fetch_assoc()) {
        $output .= '<tr>';
        $output .= '<td>' . $row['j_id'] . '</td>';
        $output .= '<td>' . $row['jname'] . '</td>';
        $output .= '<td>' . $row['jdesc'] . '</td>';
        $output .= '<td>' . $row['daysallowed'] . '</td>';
        if (!empty($row['jphoto'])) {
            $output .= '<td><img src="data:image/jpeg;base64,'.base64_encode($row['jphoto']).'" style="max-width: 100px; max-height: 100px;" alt="Journal Photo"></td>';
        } else {
            $output .= '<td>No Photo Available</td>';
        }
        $output .= '<td>' . $row['c_name'] . '</td>';
       
        $output .= '<td>';
        $output .= '<a href="update_journal.html?j_id='.$row['j_id'].'" class="btn btn-primary btn-sm mr-1">Update</a>';
        $output .= '<button class="btn btn-danger btn-sm" onclick="deleteJournal('.$row['j_id'].')">Delete</button>';
        $output .= '</td>';
        $output .= '</tr>';
    }
    
    // Close the table
    $output .= '</tbody></table>';
    
    // Output the HTML table
    echo $output;
} else {
    echo "No journals found in the database";
}

// Close connection
$conn->close();
?>
