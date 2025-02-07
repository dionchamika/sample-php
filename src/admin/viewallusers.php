<?php
include '../lib/db_con.php';

session_start();




?>

<!doctype html>
<html lang="en" class="no-js">
  <?php include 'login_check.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="#3e454c">
    
    <title>All Registerd Users - SLT Clothing</title>

    <!-- Font awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Sandstone Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Bootstrap Datatables -->
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <!-- Bootstrap social button library -->
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <!-- Bootstrap select -->
    <link rel="stylesheet" href="css/bootstrap-select.css">
    <!-- Bootstrap file input -->
    <link rel="stylesheet" href="css/fileinput.min.css">
    <!-- Awesome Bootstrap checkbox -->
    <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
    <!-- Admin Stye -->
    <link rel="stylesheet" href="css/style.css">

  

</head>

<body>
    <div class="brand clearfix">
        <a href="../" class="logo text-light">SLT Clothing</a>
        <span class="menu-btn"><i class="fa fa-bars"></i></span>
        <ul class="ts-profile-nav">
            <li><a>
                  <span id="current-time"></span>

    <script>
        function updateCurrentTime() {
            var options = {
                timeZone: 'Asia/Colombo',
                hour12: true,
                hour: 'numeric',
                minute: 'numeric',
                second: 'numeric'
            };

            var formatter = new Intl.DateTimeFormat('en-US', options);
            var timeString = formatter.format(new Date());

            document.getElementById('current-time').innerText = "" + timeString;
        }

        setInterval(updateCurrentTime, 1000);
        updateCurrentTime();
    </script>
            </a></li>
            <li class="ts-account">
                <a> Account <i class="fa fa-angle-down hidden-side"></i></a>
                <ul>
                    <li><a onclick="confirmLogout()" style="cursor: pointer;">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <script type="text/javascript">
                             function confirmLogout() {
      var isConfirmed = confirm("Are you sure you want to log out?");
      if (isConfirmed) {
        window.location.href = "Logout.php"; 
      }
    }

                      </script>
                </ul>
            </li>
        </ul>
    </div>

    <div class="ts-main-content">
        <nav class="ts-sidebar">
            <ul class="ts-sidebar-menu">
               
                
                <li><a href="dashboard.php"><i class="fa fa-table"></i> Dashboard</a></li>
                <li><a href="new-product.php"><i class="fa fa-plus"></i> Add New Product</a></li>
                <li><a href="viewallusers.php"><i class="fa fa-edit"></i> View All Users</a></li>
                <li><a href="allproducts.php"><i class="fa fa-pie-chart"></i> All Products</a></li>
                 <li><a href="homeslide.php"><i class="fa fa-image"></i> Upload Home Images</a></li>
              
                
                <!-- Account from above -->
                <ul class="ts-profile-nav">
                    <li><a href="#">Help</a></li>
                    <li><a href="#">Settings</a></li>
                    <li class="ts-account">
                        <a href="#"><img src="img/ts-avatar.jpg" class="ts-avatar hidden-side" alt=""> Account <i class="fa fa-angle-down hidden-side"></i></a>
                        <ul>
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Edit Account</a></li>
                            <li><a href="#">Logout</a></li>
                        </ul>
                    </li>
                </ul>

            </ul>
        </nav>
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <?php
                include '../lib/db_con.php';

                $query = "SELECT * FROM user ORDER BY id DESC";
                $result = $conn->query($query);

                $numUsers = $result->num_rows;

                if ($result->num_rows > 0) {
                ?>
                    <h2 class="page-title">All Users</h2>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <?php echo $numUsers > 0 ? "$numUsers members registered" : "No members in site"; ?>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Username</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Gender</th>
                                                    <th>Date/Time</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while ($row = $result->fetch_assoc()) {
                                                    echo '<tr>';
                                                    echo '<td>' . $row['id'] . '</td>';
                                                    echo '<td>' . $row['username'] . '</td>';
                                                    echo '<td>' . $row['email'] . '</td>';
                                                    echo '<td>' . $row['phone'] . '</td>';
                                                    echo '<td>' . $row['gender'] . '</td>';
                                                    echo '<td>' . $row['date_time'] . '</td>';
                                                    echo '</tr>';
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                } else {
                    echo '<div class="alert alert-info">No users found.</div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>


    <!-- Loading Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


    <script src="js/main.js"></script>
    


</body>

</html>