<?php
include 'connect.php';

if (isset($_POST['pid']) && filter_var($_POST['pid'], FILTER_VALIDATE_INT)) {
    $p_id = intval($_POST['pid']);
    $query = "SELECT * FROM papers WHERE p_id = $p_id";
    $result = $conn->query($query);
    if ($result && $result->num_rows > 0) {
        $papers = array();

        while ($row = $result->fetch_assoc()) {
            $papers[] = $row;
        }
        echo json_encode(array("status" => "success", "papers" => $papers));
    } else {
        echo json_encode(array("status" => "error", "message" => "No papers found with the given ID"));
    }
} else {
    // Invalid or missing p_id parameter
    echo json_encode(array("status" => "error", "message" => "Invalid or missing p_id parameter"));
}

// Close database connection
$conn->close();
?>
