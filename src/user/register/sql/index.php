<?php
include '../../../lib/db_con.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $gender = $_POST["gender"];
    $password = $_POST["password"];
    $date_time = date('Y-m-d H:i:s');

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $checkEmailQuery = "SELECT id FROM user WHERE email = '$email'";
    $result = $conn->query($checkEmailQuery);

    $response = array();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $existingUserId = $row['id'];

        $response["success"] = false;
        $response["message"] = "Error! Email already registered. Existing user ID: $existingUserId";
    } else {
        $sql = "INSERT INTO user(username, email, phone, gender, password, date_time) VALUES ('$username', '$email', '$phone', '$gender', '$hashedPassword', '$date_time')";

        if ($conn->query($sql) === TRUE) {
            $response["success"] = true;
        } else {
            $response["success"] = false;
        }
    }

    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    header('Location: ../'); 
    exit();
}
?>
