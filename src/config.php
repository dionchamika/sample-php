<?php
$host = "slt-clothing-db.c18qswy2ixqk.us-east-1.rds.amazonaws.com"; // Update with actual RDS endpoint
$username = "admin";
$password = "sltclothing12345";
$database = "slt_clothing"; // Your actual database name

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}
?>
