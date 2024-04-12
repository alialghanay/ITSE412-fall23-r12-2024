<?php

include 'connect.php';  //DB Connection

header("Access-Control-Allow-Origin: *"); // Allow requests from any origin

// Fetching the journals from the database
$sql_select = "SELECT * FROM journals";
$result = $conn->query($sql_select);

// Check if there are any journals found in the DB 
if ($result->num_rows > 0) {
    // HTML Table
    $output = '<table class="table">';
    $output .= '<thead><tr><th>Journal ID</th><th>Journal Name</th><th>Chapter Name</th><th>Description</th><th>Journal Photo</th><th>Days Allowed</th></tr></thead>';
    $output .= '<tbody>';

     // Fetch and outputing each journal row
     while ($row = $result->fetch_assoc()) {
        $output .= '<tr>';
        $output .= '<td>' . $row['j_id'] . '</td>';
        $output .= '<td>' . $row['jname'] . '</td>';
        $output .= '<td>' . $row['c_name'] . '</td>';
        $output .= '<td>' . $row['jdesc'] . '</td>';

        if (!empty($row['jphoto'])) {
            $output .= '<td><img src="data:image/jpeg;base64,'.base64_encode($row['jphoto']).'" style="max-width: 100px; max-height: 100px;" alt="Journal Photo"></td>';
        } else {
            $output .= '<td>No Photo Available</td>';
        }
        $output .= '<td>' . $row['daysallowed'] . '</td>';
        $output .= '<td>';
        $output .= '<button class="btn btn-primary btn-sm mr-1" onclick="openUpdateJournalModal('.$row['j_id'].', \''.$row['jname'].'\', \''.$row['jdesc'].'\', '.$row['daysallowed'].', \''.$row['c_name'].'\')">Update</button>';
        $output .= '<button class="btn btn-danger btn-sm" onclick="deleteJournal('.$row['j_id'].')">Delete</button>';
        $output .= '</td>';
        $output .= '</tr>';
    }
    // the end of the table
    $output .= '</tbody></table>';

    // output of the table containing the Journals
    echo $output;
} else {
    echo "No journals found in the database";
}

// Close connection
$conn->close();

/*
    reviewed by @alialghanay on 10/10/2022
    Database Connection:
    Includes the connect.php file to establish a connection to the database.

    Cross-Origin Resource Sharing (CORS):
    Sets the header Access-Control-Allow-Origin: * to allow requests from any origin.

    Fetching Journals from Database:

    Executes a SQL query to select all journals from the journals table.
    Checks if there are any journals found in the database.
    Generating HTML Table:

    If journals are found, generates an HTML table to display them.
    Sets table headers (<thead>) with column names: Journal ID, Journal Name, Chapter Name, Description, Journal Photo, and Days Allowed.
    Loops through each journal row fetched from the database and generates table rows (<tr>).
    Displays journal data within table cells (<td>), including handling for journal photos stored as base64 encoded strings.
    Includes buttons for updating and deleting each journal entry, with onclick events calling JavaScript functions openUpdateJournalModal() and deleteJournal() respectively.
    
    Outputting Table:
    Outputs the generated HTML table containing journal data.
    Error Handling:

    If no journals are found in the database,
    outputs a message indicating that no journals were found.
*/
?>