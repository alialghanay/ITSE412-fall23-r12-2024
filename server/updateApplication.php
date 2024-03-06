<?php
// Function to update an application by ID
function updateApplication($appId, $appName, $publishNumber, $publishDate) {
    global $conn;

    $sql = "UPDATE applications SET app_name=?, publish_number=?, publish_date=? WHERE app_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $appName, $publishNumber, $publishDate, $appId);

    if ($stmt->execute()) {
        return "Application updated successfully";
    } else {
        return "Error updating application: " . $stmt->error;
    }

    $stmt->close();
}
?>