<?php
// Include database connection
include_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch data from POST request
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];


    
    $sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
    
 
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $password, $email);

    if ($stmt->execute()) {
        echo json_encode(array("success" => true, "message" => "User registered successfully!"));
    } else {
        echo json_encode(array("success" => false, "message" => "Error registering user"));
    }

    $stmt->close();
} else {

    echo json_encode(array("success" => false, "message" => "Invalid request method"));
}


$conn->close();
?>
