<?php
include 'lib/db_con.php';
session_start();

if (!isset($_SESSION["id"])) {
    if (isset($_COOKIE["remember_token"])) {
        $token = $_COOKIE["remember_token"];
        $sql = "SELECT id, username FROM `user` WHERE remember_token='$token'";
        $result = $conn->query($sql);

        if ($result === false) {
            die("Error in SQL query: " . $conn->error);
        }

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION["id"] = $row["id"];
            $_SESSION["username"] = $row["username"];
            $_SESSION["email"] = $row["email"];

            $newToken = bin2hex(random_bytes(32));
            $updateTokenSql = "UPDATE `user` SET remember_token='$newToken' WHERE id={$row['id']}";
            if ($conn->query($updateTokenSql) === false) {
                die("Error updating remember_token: " . $conn->error);
            }

            setcookie("remember_token", $newToken, time() + (86400 * 7), "/"); // 7 days

            header('Location: ../sltclothing/');
            exit();
        } else {
            // Debugging information
             "No user found with remember_token: $token";
        }
    } else {
        // Debugging information
         "No remember_token found in cookies";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<meta name="keywords" content="">
<title>SLT Clothing</title>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;600&family=Roboto:wght@300;400;700&display=auto"
    rel="stylesheet">
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<script src="https://kit.fontawesome.com/58f72b5be6.js" crossorigin="anonymous"></script>
<!-- Favicon -->
<link rel="apple-touch-icon" sizes="180x180" href="./assets/images/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="./assets/images/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="./assets/images/favicon/favicon-16x16.png">
<link rel="mask-icon" href="./assets/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">
<link rel="stylesheet" href="./assets/css/libs.bundle.css" />
<link rel="stylesheet" href="./assets/css/theme.bundle.css" />
<noscript><style>.simplebar-content-wrapper {overflow: auto;}</style></noscript>
<?php include 'lib/style.php';?>
</head>
<body>
<!-- Whasapp -->       

<!-- whasapp end -->
<!-- Navbar -->
<?php include 'lib/nav.php';?>  
<!-- / Navbar-->    
<!-- Main Section-->
<?php include 'lib/main_section.php';?>  
<!-- / Main Section-->
<!-- Footer -->
<?php include 'lib/footer.php';?>
<!-- / Footer-->
<script type="text/javascript">
        $(document).ready(function(){
    $('.customer-logos').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 3
            }
        }]
    });
});
</script>
<script src="./assets/js/vendor.bundle.js"></script>
<script src="./assets/js/theme.bundle.js"></script>
</body>
</html>