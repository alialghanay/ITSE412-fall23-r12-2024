<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $title = $_POST['title'];
    $abstract = $_POST['abstract'];
    $year = $_POST['year'];
    $file = $_POST['file']; // Assuming you're handling file uploads properly
    $app_id = $_POST['app_id'];
    $state = $_POST['state'];
    $mem_id = $_POST['mem_id'];
    $lan = $_POST['lan'];
    
    $sql = "INSERT INTO papers (title, abstract, year, file, app_id, state, mem_id, lan) VALUES ('$title', '$abstract', '$year', '$file', '$app_id', '$state', '$mem_id', '$lan')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();




?>