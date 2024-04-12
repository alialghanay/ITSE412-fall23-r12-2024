<?php
include 'connect.php';

if (isset($_GET['p_id'])) {
    $p_id = $_GET['p_id'];
    $query = "SELECT file FROM papers WHERE p_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $p_id); // Assuming p_id is an integer
    $stmt->execute();
    $stmt->bind_result($file_content);
    if ($stmt->fetch()) {
        // Set appropriate content type header
        header("Content-type: application/pdf"); // Assuming the file is a PDF

        // Output file content
        echo $file_content;
    } else {
        echo "File not found.";
    }

    $stmt->close();
} else {
    echo "p_id parameter not set.";
}

$conn->close();
?>
