<?php
include 'lib/db_con.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_SERVER['HTTP_REFERER'])) {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // $id = $_POST['id'];
    $pid = $_POST['pid'];
    $userid = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $adress = $_POST['adress']; 
    $country = $_POST['country'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $contactnumber = $_POST['contactnumber'];

    $pname = $_POST['pname'];
    $size = $_POST['size'];
    $quantity = $_POST['quantity'];
    $img = $_POST['img'];
    $price = $_POST['price'];

    $order_datetime = date('Y-m-d H:i:s'); // Get the current date and time
$query = "INSERT INTO orders (userid, username, email, firstname, lastname, adress, country, state, zip, contactnumber, pname, size, quantity, img, price, order_datetime)
          VALUES ('$userid', '$username', '$email', '$firstname', '$lastname', '$adress', '$country', '$state', '$zip', '$contactnumber', '$pname', '$size', '$quantity', '$img', '$price', '$order_datetime')";



// ... (previous code)

    if ($conn->query($query) === TRUE) {
        // Order placed successfully, now update the quantity in the products table
        $updateQuantityQuery = "UPDATE products SET quantity = quantity - $quantity WHERE pid = $pid";

        if ($conn->query($updateQuantityQuery) === TRUE) {
            // Return success response
            echo json_encode(['success' => true]);
        } else {
            // Return error response
            echo json_encode(['success' => false, 'message' => 'Error updating product quantity']);
        }
    } else {
        // Return error response
        echo json_encode(['success' => false, 'message' => 'Error placing the order']);
    }

    $conn->close();
}
?>
