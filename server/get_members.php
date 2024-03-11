<?php

include 'connect.php';

$query = "SELECT * FROM member_details_view;";
$result = mysqli_query($conn, $query);

if ($result) {
    $members = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($members);
} else {
    echo json_encode(['error' => 'Failed to retrieve members']);
}

mysqli_close($conn);

?>
