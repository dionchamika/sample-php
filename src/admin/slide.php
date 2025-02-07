<?php
// Include your database connection file here
include '../lib/db_con.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle insertion from slideForm
    if (isset($_POST['first'])) {
        // Data from the first form (slideForm)
        $first = $_POST['first'];
        $second = $_POST['second'];
        $third = $_POST['third'];

        // Handle file upload for the first form
        $targetDirectory = "uploads/";
        $img1 = "";

        if (isset($_FILES['img1']) && $_FILES['img1']['tmp_name'] != "") {
            $name_x = $_FILES["img1"]["name"];
            $name = "pic_" . date('YmdHis') . "_" . rand(10, 999999) . "_" . $name_x;
            $img1 = $targetDirectory . $name;
            move_uploaded_file($_FILES['img1']['tmp_name'], $img1);
        }

        // Insert data from the first form into the database
        $insertQuery = "INSERT INTO customize (first, second, third, img1) VALUES ('$first', '$second', '$third', '$img1')";
        if ($conn->query($insertQuery) === TRUE) {
            header("Location: homeslide.php"); // Redirect after successful insertion
            exit();
        } else {
            echo "Error inserting record: " . $conn->error;
        }
    }

    // Handle insertion from slideForm2
    if (isset($_FILES['clients']) && $_FILES['clients']['tmp_name'] != "") {
        // Handle file upload for the second form (slideForm2)
        $targetDirectory = "uploads/";
        $clientsImg = "";

        $name_x = $_FILES["clients"]["name"];
        $name = "client_" . date('YmdHis') . "_" . rand(10, 999999) . "_" . $name_x;
        $clientsImg = $targetDirectory . $name;
        move_uploaded_file($_FILES['clients']['tmp_name'], $clientsImg);

        // Insert data from the second form into the database
        $insertQuery2 = "INSERT INTO customize (clients) VALUES ('$clientsImg')";
        if ($conn->query($insertQuery2) === TRUE) {
            header("Location: homeslide.php"); // Redirect after successful insertion
            exit();
        } else {
            echo "Error inserting record: " . $conn->error;
        }
    }



} else {
    // Redirect if form is not submitted
    header("Location: homeslide.php");
    exit();
}

// Close database connection
$conn->close();
?>
