<?php
include 'connect.php';

if (isset($_GET['user_id'])) {
    $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);

    $query = "SELECT * FROM member_details_view WHERE user_id = '$user_id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $memberDetails = mysqli_fetch_assoc($result);
        echo json_encode($memberDetails);
    } else {
        echo json_encode(['error' => 'Failed to retrieve member details']);
    }
} else {
    echo json_encode(['error' => 'Missing user_id parameter']);
}

mysqli_close($conn);
?>
