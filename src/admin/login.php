<?php
include '../lib/db_con.php';

$email = $_REQUEST["email"];
$password = $_REQUEST["password"];
$remember = isset($_REQUEST["remember"]) ? true : false;

$check = 0;

if (strpos($email, '@') !== false) {
    $sql = "SELECT `aid`, `email`, `password` FROM `admin` WHERE email='$email'";
} else {
    $sql = "SELECT `aid`, `email`, `password` FROM `admin` WHERE email='$email'";
}

$result = $conn->query($sql);

if ($result === false) {
    echo "Error: " . $conn->error;
    exit;
}

while ($row = $result->fetch_assoc()) {
    if ($password === $row["password"]) {
        $check = 1;
        $aid = $row["aid"];
        $email = $row["email"];

        if ($remember) {
            $token = bin2hex(random_bytes(32));
            setcookie("remember_token", $token, time() + (86400 * 7), "/"); 
            $updateTokenSql = "UPDATE `admin` SET remember_token='$token' WHERE `aid`=$aid";
            $conn->query($updateTokenSql);
        }

        break;
    }
}

if ($check == 1) {
    session_start();
    $_SESSION["aid"] = $aid;
    $_SESSION["email"] = $email;
    $_SESSION["username"] = $username;

    header('Location: dashboard.php');
} else {
    echo "<script>";
    echo "alert('Invalid email or password. Please try again.');";
    echo "window.location.replace('../admin/');";
    echo "</script>";
}

$conn->close();
?>
