<?php
// Include your database connection file here
include '../lib/db_con.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the product ID
   echo $pid = $_POST['pid'];

// Retrieve other form data
$pname = $_POST['pname'];
$category = $_POST['category'];
$shirtcategory = $_POST['shirtcategory'];
$quantity = $_POST['quantity'];
$Brand = $_POST['Brand'];
$Style = $_POST['Style'];
$Colour = $_POST['Colour'];
$Material = $_POST['Material'];
$Thickness = $_POST['Thickness'];
$price = $_POST['price'];
$description = $_POST['description'];
$status = $_POST['status'];


    // Update the product in the database
    $updateQuery = "UPDATE products SET 
                    pname = '$pname',
                    category = '$category',
                    shirtcategory = '$shirtcategory',
                    quantity = '$quantity',
                    Brand = '$Brand',
                    Style = '$Style',
                    Colour = '$Colour',
                    Material = '$Material',
                    Thickness = '$Thickness',
                    price = $price,
                    description = '$description',
                    status = '$status'
                    WHERE pid = $pid";

    if ($conn->query($updateQuery) === TRUE) {
        header("Location: allproducts.php");
        exit();
    } else {
        echo "Error updating product: " . $conn->error;
    }
} else {
    header("Location: allproducts.php");
    exit();
}

$conn->close();
?>
