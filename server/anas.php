<?php
// Include database connection
include_once "connect.php";

// Function to add a new paper
function addPaper($title, $abstract, $year, $file, $app_id, $state, $mem_id, $lan) {
    global $conn;
    $query = "INSERT INTO papers (title, abstract, year, file, app_id, state, mem_id, lan) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssisissi", $title, $abstract, $year, $file, $app_id, $state, $mem_id, $lan);
    if ($stmt->execute()) {
        return "Paper added successfully";
    } else {
        return "Error adding paper: " . $conn->error;
    }
}

// Function to update paper details
function updatePaper($p_id, $title, $abstract, $year, $state, $lan) {
    global $conn;
    $query = "UPDATE papers SET title=?, abstract=?, year=?, state=?, lan=? WHERE p_id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssiisi", $title, $abstract, $year, $state, $lan, $p_id);
    if ($stmt->execute()) {
        return "Paper updated successfully";
    } else {
        return "Error updating paper: " . $conn->error;
    }
}

// Function to delete a paper
function deletePaper($p_id) {
    global $conn;
    $query = "DELETE FROM papers WHERE p_id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $p_id);
    if ($stmt->execute()) {
        return "Paper deleted successfully";
    } else {
        return "Error deleting paper: " . $conn->error;
    }
}

// Function to retrieve paper details
function getPaperDetails($p_id) {
    global $conn;
    $query = "SELECT * FROM papers WHERE p_id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $p_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}

// Check if the request is AJAX
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    // AJAX request detected
    if(isset($_POST['action'])) {
        // Handle different actions
        switch($_POST['action']) {
            case 'add':
                // Add paper action
                $result = addPaper($_POST['title'], $_POST['abstract'], $_POST['year'], $_FILES['file']['tmp_name'], $_POST['app_id'], $_POST['state'], $_POST['mem_id'], $_POST['lan']);
                echo $result;
                break;
            case 'update':
                // Update paper action
                $result = updatePaper($_POST['p_id'], $_POST['title'], $_POST['abstract'], $_POST['year'], $_POST['state'], $_POST['lan']);
                echo $result;
                break;
            case 'delete':
                // Delete paper action
                $result = deletePaper($_POST['p_id']);
                echo $result;
                break;
            case 'getDetails':
                // Get paper details action
                $paperDetails = getPaperDetails($_POST['p_id']);
                echo json_encode($paperDetails);
                break;
            default:
                echo "Invalid action";
        }
    } else {
        echo "No action specified";
    }
} else {
    echo "This page can only be accessed via AJAX";
}

// Close database connection
$conn->close();
?>
