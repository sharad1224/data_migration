<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "company_db";

// Create Connection
$conn = new mysqli($host, $username, $password, $database);

// Check Connection
if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}

// Optional Success Message
// echo "Database Connected Successfully";

?>