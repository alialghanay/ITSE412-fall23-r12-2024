<?php
// Function to create a new application
function createApplication($appName, $publishNumber, $publishDate) {
    global $conn;

    $sql = "INSERT INTO applications (app_name, publish_number, publish_date) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $appName, $publishNumber, $publishDate);

    if ($stmt->execute()) {
        return "Application created successfully";
    } else {
        return "Error creating application: " . $stmt->error;
    }

    $stmt->close();
}

?>  