<?php
include '../lib/db_con.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pid = $_POST['pid'];

    $deleteQuery = "DELETE FROM products WHERE pid = $pid";

    if ($conn->query($deleteQuery) === TRUE) {
        header("Location: allproducts.php");
        exit();
    } else {
        echo "Error deleting product: " . $conn->error;
    }
} else {
    header("Location: allproducts.php");
    exit();
}

$conn->close();
?>
