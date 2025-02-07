<?php
include '../../../lib/db_con.php';

$email = $_REQUEST["email"];
$password = $_REQUEST["password"];
$remember = isset($_REQUEST["remember"]) ? true : false;

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$check = 0;

if (strpos($email, '@') !== false) {
    $sql = "SELECT `id`, `username`, `email`, `password` FROM `user` WHERE email='$email'";
} else {
    $sql = "SELECT `id`, `username`, `email`, `password` FROM `user` WHERE email='$email'";
}

$result = $conn->query($sql);

if ($result === false) {
    echo "Error: " . $conn->error;
    exit;
}

while ($row = $result->fetch_assoc()) {
    if (password_verify($password, $row["password"])) {
        $check = 1;
        $id = $row["id"];
        $username = $row["username"];

        if ($remember) {
            $token = bin2hex(random_bytes(32));
            setcookie("remember_token", $token, time() + (86400 * 7), "/"); // 7 days
            $updateTokenSql = "UPDATE `user` SET remember_token='$token' WHERE `id`=$id";
            $conn->query($updateTokenSql);
        }

        break; 
    }
}

if ($check == 1) {
    session_start();
    $_SESSION["id"] = $id;
    $_SESSION["username"] = $username;
    $_SESSION["phone"] = $phone;
    $_SESSION["email"] = $email;

    // Check if a redirect URL is set
    if (isset($_SESSION['redirect_url'])) {
        $redirect_url = $_SESSION['redirect_url'];
        unset($_SESSION['redirect_url']); // Clear the stored URL
        header("Location: $redirect_url");
        exit();
    } else {
        header('Location: ../../../account/');
        exit();
    }
} else {
    echo "<script>";
    echo "alert('Invalid email or password. Please try again.');";
    echo "window.location.replace('../');";
    echo "</script>";
}

$conn->close();
?>
