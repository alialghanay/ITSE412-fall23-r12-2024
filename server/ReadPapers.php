<?php
// Including the 'connect.php' file to establish a database connection
include 'connect.php';

// SQL query to select all papers from the database
$query = "SELECT p_id, title, abstract, year, app_id, file, state, mem_id, lan FROM papers";

// Executing the SQL query
$result = $conn->query($query);

// Checking if there are any rows returned from the query
if ($result->num_rows > 0) {
    // Initializing an array to store the response data
    $response = array();
    // Initializing an index for numbering the rows
    $index = 0;
    // Looping through each row of the result set
    while ($row = $result->fetch_assoc()) {
        // Getting the file name from the 'file' column
        $file_name = basename($row['file']);
        // Generating HTML markup for a table row containing paper data
        $html = "<tr>" .
            "<td>" . ($index + 1) . "</td>" .
            "<td>" . $row['title'] . "</td>" .
            "<td>" . $row['state'] . "</td>" .
            "<td>" . $row['mem_id'] . "</td>" .
            "<td>" . $row['year'] . "</td>" .
            "<td>" . $row['abstract'] . "</td>" .
            "<td><a href='http://localhost/ITSE412-fall23-r12/server/view_file.php?p_id=" . $row['p_id'] . "'>" . $file_name . "</a></td>" .
            "<td>" .
            // Adding a button for updating paper data, with an onClick event to call a JavaScript function
            '<button type="button" class="btn btn-warning btn-sm me-2 update-btn" onClick="updateForm(' .
            $row['p_id'] .
            ')">Update</button>' .
            // Adding a button for deleting papers, with an onClick event to call a JavaScript function
            '<button type="button" class="btn btn-danger btn-sm" onclick="deletePapers(' .
            $row['p_id'] .
            ')">Delete</button>' .
            "</td>" .
            "</tr>";
        // Adding the HTML markup for the current row to the response array
        $response[] = $html;
        // Incrementing the index
        $index++;
    }
    // Outputting the response array as JSON, indicating success
    echo json_encode(array("status" => "success", "papers" => $response));
} else {
    // Outputting an error message in JSON format if no papers are found
    echo json_encode(array("status" => "error", "message" => "No papers found"));
}

// Closing the database connection
$conn->close();
?>
