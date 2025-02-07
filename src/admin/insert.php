<?php
include '../lib/db_con.php';
session_start();

// Check if the user is logged in
if (!isset($_SESSION["aid"])) {
    $response = array(
        'success' => false,
        'message' => 'Please login.'
    );
    echo json_encode($response);
    exit;
}

// Ensure the request method is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $response = array(
        'success' => false,
        'message' => 'Direct access to this page is not allowed.'
    );
    echo json_encode($response);
    exit;
}

$aid = $_SESSION["aid"];
$category = $_POST["category"]; 
$quantity = $_POST["quantity"]; 
$sizes = $_POST["sizes"]; 
$shirtcategory = empty($_POST["shirtcategory"]) ? 'NULL' : "'" . $_POST["shirtcategory"] . "'"; 
$pname = $_POST["pname"];
$Brand = $_POST["Brand"];
$Style = $_POST["Style"];
$Colour = $_POST["Colour"];
$Material = $_POST["Material"];
$Thickness = $_POST["Thickness"];
$description = $_POST["description"]; 
$price = $_POST["price"]; 
$date_time = date('Y-m-d h:i:s');
$sizeString = implode(",", $sizes);

$temp = $_FILES["img"]["tmp_name"];

if ($temp != "") {
    $name_x = $_FILES["img"]["name"];
    $name = "pic_" . date('YmdHis') . "_" . rand(10, 999999) . "_" . $name_x;
    $destination = "../images/" . $name;

    if (move_uploaded_file($temp, $destination)) {
        $sql = "INSERT INTO products (category, quantity, sizes, shirtcategory, pname, Brand, Style, Colour, Material, Thickness, description, price, img, date_time) 
            VALUES ('$category', '$quantity', '$sizeString', $shirtcategory, '$pname', '$Brand', '$Style' , '$Colour', '$Material', '$Thickness', '$description', '$price', '$name', '$date_time')";

        if ($conn->query($sql) === TRUE) {
            $response = array(
                'success' => true,
                'message' => 'Product has been submitted successfully.'
            );
            echo json_encode($response);
        } else {
            $response = array(
                'success' => false,
                'message' => 'Error inserting product data: ' . $conn->error
            );
            echo json_encode($response);
        }
    } else {
        $response = array(
            'success' => false,
            'message' => 'Error uploading image.'
        );
        echo json_encode($response);
    }
} else {
    $response = array(
        'success' => false,
        'message' => 'Invalid image format. Only PNG and JPEG images are allowed.'
    );
    echo json_encode($response);
}

$conn->close();
?>
