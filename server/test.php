<?php
include "crud_operations.php";

// Test create operation
echo createApplication("Test App", "12345", "2024-03-05") . PHP_EOL;

// Test read operation
$applications = readApplications();
print_r($applications);

// Test update operation
echo updateApplication(1, "Updated App", "54321", "2024-03-06") . PHP_EOL;

// Test delete operation
echo deleteApplication(2) . PHP_EOL;
?>
