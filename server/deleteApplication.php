<?php
// Function to delete an application by ID
function deleteApplication($appId) {
    global $conn;

    $sql = "DELETE FROM applications WHERE app_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $appId);

    if ($stmt->execute()) {
        return "Application deleted successfully";
    } else {
        return "Error deleting application: " . $stmt->error;
    }

    $stmt->close();
}
?>