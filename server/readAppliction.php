<?php 
// Function to read all applications
function readApplications() {
    global $conn;

    $sql = "SELECT * FROM applications";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $applications = array();
        while ($row = $result->fetch_assoc()) {
            $applications[] = $row;
        }
        return $applications;
    } else {
        return "No applications found";
    }
}
?>
