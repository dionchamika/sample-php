<?php
include '../lib/db_con.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $orderId = $_POST['order_id'];
    $newStatus = $_POST['status'];

    // Perform the update in the database
    $updateQuery = "UPDATE orders SET status = '$newStatus' WHERE id = $orderId";

    if ($conn->query($updateQuery) === TRUE) {
        echo "Status updated successfully";
    } else {
        echo "Error updating status: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
    
    // Redirect back to the page
    header('Location: dashboard.php');
    exit();
} else {
    // If the request method is not POST, redirect back to the page
    header('Location: dashboard.php');
    exit();
}
?>
