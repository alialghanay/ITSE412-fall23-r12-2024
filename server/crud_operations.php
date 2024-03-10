<?php
include "connect.php"; // Include the database connection file

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
