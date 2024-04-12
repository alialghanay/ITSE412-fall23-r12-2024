<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "rppp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get total counts
$sql = "SELECT 
            (SELECT COUNT(*) FROM members) AS total_members,
            (SELECT COUNT(*) FROM journals) AS total_journals,
            (SELECT COUNT(*) FROM applications) AS total_applications,
            (SELECT COUNT(*) FROM papers) AS total_papers";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalMembers = $row["total_members"];
    $totalJournals = $row["total_journals"];
    $totalApplications = $row["total_applications"];
    $totalPapers = $row["total_papers"];
} else {
    $totalMembers = 0;
    $totalJournals = 0;
    $totalApplications = 0;
    $totalPapers = 0;
}

$conn->close();
