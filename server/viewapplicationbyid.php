<?php
include 'connect.php';

if (isset($_POST['appid']) && filter_var($_POST['appid'], FILTER_VALIDATE_INT)) {
    $app_id = intval($_POST['appid']);
    $query = "SELECT * FROM applications WHERE app_id = $app_id";
    $result = $conn->query($query);
    if ($result && $result->num_rows > 0) {
        $papers = array();

        while ($row = $result->fetch_assoc()) {
            $papers[] = $row;
        }
        echo json_encode(array("status" => "success", "apps" => $papers));
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
