<?php
include '../lib/db_con.php';

session_start();

if (!isset($_SESSION["id"])) {
    if (isset($_COOKIE["remember_token"])) {
        $token = $_COOKIE["remember_token"];
        $sql = "SELECT id, email FROM `user` WHERE remember_token='$token'";
        $result = $conn->query($sql);

        if ($result === false) {
            die("Error in SQL query: " . $conn->error);
        }

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION["id"] = $row["id"];
            $_SESSION["email"] = $row["email"];
            $_SESSION["username"] = $row["username"];

            $newToken = bin2hex(random_bytes(32));
            $updateTokenSql = "UPDATE `user` SET remember_token='$newToken' WHERE id={$row['id']}";
            $conn->query($updateTokenSql);

            setcookie("remember_token", $newToken, time() + (86400 * 7), "/"); // 30 days

            header('Location: ../account/');
            exit();
        } else {
            header('Location: ../');
            exit();
        }
    } else {
        header('Location: ../user/login/');
        exit();
    }
}
$username = $_SESSION["username"];
$email = $_SESSION["email"];
$userid = $_SESSION["id"];
$query = "SELECT * FROM orders WHERE (username = '$username' AND email = '$email') AND userid = $userid ORDER BY order_datetime DESC LIMIT 80";
$result = $conn->query($query);

// Check if there are any orders
if ($result === false) {
    die("Error in SQL query: " . $conn->error);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
     
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>Recent Orders - <?php echo $_SESSION["username"]; ?></title>
    <style type="text/css">
        /* ===== Google Font Import - Poppins ===== */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

:root{
    /* ===== Colors ===== */
    --panel-color: #FFF;
    --text-color: #000;
    --black-light-color: #707070;
    --border-color: #e6e5e5;
    --toggle-color: #DDD;
    --box1-color: #4DA3FF;
    --box2-color: #FFE6AC;
    --box3-color: #E7D1FC;
    --title-icon-color: #fff;
    
    /* ====== Transition ====== */
    --tran-05: all 0.5s ease;
    --tran-03: all 0.3s ease;
    --tran-03: all 0.2s ease;
}

body{
    min-height: 100vh;
    background-color: var(--primary-color);
/*     text-decoration: none !important;*/

}
a {
     text-decoration: none !important;
     color: #000000;
}
body.dark{
    --primary-color: #3A3B3C;
    --panel-color: #242526;
    --text-color: #CCC;
    --black-light-color: #CCC;
    --border-color: #4D4C4C;
    --toggle-color: #FFF;
    --box1-color: #3A3B3C;
    --box2-color: #3A3B3C;
    --box3-color: #3A3B3C;
    --title-icon-color: #CCC;
}
/* === Custom Scroll Bar CSS === */


body.dark::-webkit-scrollbar-thumb:hover,
body.dark .activity-data::-webkit-scrollbar-thumb:hover{
    background: #3A3B3C;
}

nav{
    position: fixed;
    top: 0;
    left: 0;
    height: 100%;
    width: 250px;
    padding: 10px 14px;
    background-color: var(--panel-color);
    border-right: 1px solid var(--border-color);
    transition: var(--tran-05);
}
nav.close{
    width: 73px;
}
nav .logo-name{
    display: flex;
    align-items: center;
}
nav .logo-image{
    display: flex;
    justify-content: center;
    min-width: 45px;
}
nav .logo-image img{
    width: 40px;
    object-fit: cover;
    border-radius: 50%;
}

nav .logo-name .logo_name{
    font-size: 22px;
    font-weight: 600;
    color: var(--text-color);
    margin-left: 14px;
    transition: var(--tran-05);
}
nav.close .logo_name{
    opacity: 0;
    pointer-events: none;
}
nav .menu-items{
    margin-top: 40px;
    height: calc(100% - 90px);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}
.menu-items li{
    list-style: none;
}
.menu-items li a{
    display: flex;
    align-items: center;
    height: 50px;
    text-decoration: none;
    position: relative;
}
.nav-links li a:hover:before{
    content: "";
    position: absolute;
    left: -7px;
    height: 5px;
    width: 5px;
    border-radius: 50%;
    background-color: var(--primary-color);
}
body.dark li a:hover:before{
    background-color: var(--text-color);
}
.menu-items li a i{
    font-size: 24px;
    min-width: 45px;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--black-light-color);
}
.menu-items li a .link-name{
    font-size: 18px;
    font-weight: 400;
    color: var(--black-light-color);    
    transition: var(--tran-05);
}
nav.close li a .link-name{
    opacity: 0;
    pointer-events: none;
}
.nav-links li a:hover i,
.nav-links li a:hover .link-name{
    color: var(--primary-color);
}
body.dark .nav-links li a:hover i,
body.dark .nav-links li a:hover .link-name{
    color: var(--text-color);
}
.menu-items .logout-mode{
    padding-top: 10px;
    border-top: 1px solid var(--border-color);
}
.menu-items .mode{
    display: flex;
    align-items: center;
    white-space: nowrap;
}
.menu-items .mode-toggle{
    position: absolute;
    right: 14px;
    height: 50px;
    min-width: 45px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
}
.mode-toggle .switch{
    position: relative;
    display: inline-block;
    height: 22px;
    width: 40px;
    border-radius: 25px;
    background-color: var(--toggle-color);
}
.switch:before{
    content: "";
    position: absolute;
    left: 5px;
    top: 50%;
    transform: translateY(-50%);
    height: 15px;
    width: 15px;
    background-color: var(--panel-color);
    border-radius: 50%;
    transition: var(--tran-03);
}
body.dark .switch:before{
    left: 20px;
}

.dashboard{
    position: relative;
    left: 250px;
    background-color: var(--panel-color);
    min-height: 100vh;
    width: calc(100% - 250px);
    padding: 10px 14px;
    transition: var(--tran-05);
}
nav.close ~ .dashboard{
    left: 73px;
    width: calc(100% - 73px);
}
.dashboard .top{
    position: fixed;
    top: 0;
    left: 250px;
    display: flex;
    width: calc(100% - 250px);
    justify-content: space-between;
    align-items: center;
    padding: 10px 14px;
    background-color: var(--panel-color);
    transition: var(--tran-05);
    z-index: 10;
}
nav.close ~ .dashboard .top{
    left: 73px;
    width: calc(100% - 73px);
}
.dashboard .top .sidebar-toggle{
    font-size: 26px;
    color: var(--text-color);
    cursor: pointer;
}
.dashboard .top .search-box{
    position: relative;
    height: 45px;
    max-width: 600px;
    width: 100%;
    margin: 0 30px;
}
.top .search-box input{
    position: absolute;
    border: 1px solid var(--border-color);
    background-color: var(--panel-color);
    padding: 0 25px 0 50px;
    border-radius: 5px;
    height: 100%;
    width: 100%;
    color: var(--text-color);
    font-size: 15px;
    font-weight: 400;
    outline: none;
}
.top .search-box i{
    position: absolute;
    left: 15px;
    font-size: 22px;
    z-index: 10;
    top: 50%;
    transform: translateY(-50%);
    color: var(--black-light-color);
}
.top img{
    width: 40px;
    border-radius: 50%;
}
.dashboard .dash-content{
    padding-top: 50px;
}
.dash-content .title{
    display: flex;
    align-items: center;
    margin: 60px 0 30px 0;
}
.dash-content .title i{
    position: relative;
    height: 35px;
    width: 35px;
    background-color: var(--primary-color);
    border-radius: 6px;
    color: var(--title-icon-color);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
}
.dash-content .title .text{
    font-size: 24px;
    font-weight: 500;
    color: var(--text-color);
    margin-left: 10px;
}
.dash-content .boxes{
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
}
.dash-content .boxes .box{
    display: flex;
    flex-direction: column;
    align-items: center;
    border-radius: 12px;
    width: calc(100% / 3 - 15px);
    padding: 15px 20px;
    background-color: var(--box1-color);
    transition: var(--tran-05);
}
.boxes .box i{
    font-size: 35px;
    color: var(--text-color);
}
.boxes .box .text{
    white-space: nowrap;
    font-size: 18px;
    font-weight: 500;
    color: var(--text-color);
}
.boxes .box .number{
    font-size: 40px;
    font-weight: 500;
    color: var(--text-color);
}
.boxes .box.box2{
    background-color: var(--box2-color);
}
.boxes .box.box3{
    background-color: var(--box3-color);
}
.dash-content .activity .activity-data{
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
}
.activity .activity-data{
    display: flex;
}
.activity-data .data{
    display: flex;
    flex-direction: column;
    margin: 0 15px;
}
.activity-data .data-title{
    font-size: 20px;
    font-weight: 500;
    color: var(--text-color);
}
.activity-data .data .data-list{
    font-size: 18px;
    font-weight: 400;
    margin-top: 20px;
    white-space: nowrap;
    color: var(--text-color);
}

@media (max-width: 1000px) {
    nav{
        width: 73px;
    }
    nav.close{
        width: 250px;
    }
    nav .logo_name{
        opacity: 0;
        pointer-events: none;
    }
    nav.close .logo_name{
        opacity: 1;
        pointer-events: auto;
    }
    nav li a .link-name{
        opacity: 0;
        pointer-events: none;
    }
    nav.close li a .link-name{
        opacity: 1;
        pointer-events: auto;
    }
    nav ~ .dashboard{
        left: 73px;
        width: calc(100% - 73px);
    }
    nav.close ~ .dashboard{
        left: 250px;
        width: calc(100% - 250px);
    }
    nav ~ .dashboard .top{
        left: 73px;
        width: calc(100% - 73px);
    }
    nav.close ~ .dashboard .top{
        left: 250px;
        width: calc(100% - 250px);
    }
    .activity .activity-data{
        overflow-X: scroll;
    }
}

@media (max-width: 780px) {
    .dash-content .boxes .box{
        width: calc(100% / 2 - 15px);
        margin-top: 15px;
    }
}
@media (max-width: 560px) {
    .dash-content .boxes .box{
        width: 100% ;
    }
}
@media (max-width: 400px) {
    nav{
        width: 0px;
    }
    nav.close{
        width: 73px;
    }
    nav .logo_name{
        opacity: 0;
        pointer-events: none;
    }
    nav.close .logo_name{
        opacity: 0;
        pointer-events: none;
    }
    nav li a .link-name{
        opacity: 0;
        pointer-events: none;
    }
    nav.close li a .link-name{
        opacity: 0;
        pointer-events: none;
    }
    nav ~ .dashboard{
        left: 0;
        width: 100%;
    }
    nav.close ~ .dashboard{
        left: 73px;
        width: calc(100% - 73px);
    }
    nav ~ .dashboard .top{
        left: 0;
        width: 100%;
    }
    nav.close ~ .dashboard .top{
        left: 0;
        width: 100%;
    }
}
.order-table {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
    font-family: 'Poppins', sans-serif;
}

.order-table th, .order-table td {
    border: 1px solid #ddd;
    padding: 12px;
    text-align: left;
}

.order-table th {
    background-color: #f8f9fa;
    font-weight: 600;
}



.order-table tr:hover {
    background-color: #f2f2f2;
}

.order-table td.status {
    font-weight: 600;
    color: #007bff;
}

.order-table tr:not(:last-child) {
    margin-bottom: 10px;
}

/* Style for the "No recent orders found" message */
.activity-data .data-list {
    color: #6c757d;
    margin-top: 10px;
    font-style: italic;
}

/* Add this CSS to your stylesheet or within a style tag in the HTML document */
.order-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

.order-table th, .order-table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
    white-space: nowrap; /* Prevent line breaks within cells */
    overflow: hidden;
    text-overflow: ellipsis; /* Display ellipsis (...) for truncated text */
}

/* Optional: Adjust styling based on screen width */
@media (max-width: 767px) {
    .order-table th, .order-table td {
        padding: 5px;
        font-size: 12px;
    }
}

    </style>
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
            </div>

           <span class="logo_name mt-4" style="margin-left: -30px;"><a href="../">SLT clothing</a></span>
        </div>

        <div class="menu-items" style="margin-left: -30px;">
            <ul class="nav-links">
                <li><a href="../account/">
                    <i class="uil uil-chart active"></i>
                    <span class="link-name active">Orders</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-user"></i>
                    <span class="link-name">Account</span>
                </a></li>
                
            </ul>
            
            <ul class="logout-mode">
                <li><a onclick="confirmLogout()" style="cursor: pointer;">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>

                      <script type="text/javascript">
                             function confirmLogout() {
      var isConfirmed = confirm("Are you sure you want to log out?");
      if (isConfirmed) {
        window.location.href = "Logout.php"; 
      }
    }

                      </script>
               <div class="mode-toggle">
                </div>

                
            </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top mt-4">

            <i class="uil uil-bars sidebar-toggle"></i>
<img src="./assets/images/logos/logo.png" style="width: 100px;">
           
            
            <!--<img src="images/profile.jpg" alt="">-->
        </div>
        <div class="dash-content">
            <div class="overview">
           

                <div class="boxes">

                </div>
            </div>

  <div class="activity">
        <div class="title">
            <i class="uil uil-clock-three"></i>
            <span class="text">Recent Orders</span>
        </div>
        <hr>

        <div class="activity-data">
            <?php
if ($result->num_rows > 0) {
    echo '<table class="order-table">';
    echo '<tr>';
    echo '<th>Product</th>';
    echo '<th>Quantity</th>';
    echo '<th>Size</th>';
    echo '<th>Price</th>';
    echo '<th>Status</th>';
    echo '</tr>';

    while ($row = $result->fetch_assoc()) {
        $statusColor = '';
        switch ($row['status']) {
            case 'Pending':
                $statusColor = 'orange'; 
                break;
            
            case 'processing':
                $statusColor = 'blue';
                break;
            case 'shipped':
                $statusColor = 'green'; 
                break;
            case 'delivered':
                $statusColor = 'red'; 
                break;
            case 'on-hold':
                $statusColor = 'grey';
                break;
            default:
                $statusColor = 'orange';
        }

        echo '<tr>';
        echo '<td class="product-name">' . truncateProductName($row['pname'], 30) . '</td>';
        echo '<td>' . $row['quantity'] . '</td>';
        echo '<td>' . $row['size'] . '</td>';
        echo '<td>' . $row['price'] . '</td>';
        echo '<td style="color: ' . $statusColor . ';">' . $row['status'] . '</td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo '<div class="data-list">No recent orders found.</div>';
}

// Function to truncate the product name
function truncateProductName($name, $length) {
    if (strlen($name) > $length) {
        $name = substr($name, 0, $length) . '...';
    }
    return $name;
}
?>


        </div>
    </div>

        </div>

    </section>

    <script src="script.js"></script>
</body>
</html>