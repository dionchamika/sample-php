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
    <title>Admin  Dashboard - SLT Clothing</title>

    <!-- Font awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Sandstone Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <link rel="stylesheet" href="css/bootstrap-select.css">
    <link rel="stylesheet" href="css/fileinput.min.css">
    <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
    <link rel="stylesheet" href="css/style.css">
  <style type="text/css">
           .product-image {
    display: block;
    margin: 0 auto;
    max-width: 100%;
    height: 260px;
    object-fit: cover; 
    border-radius: 4px; 
    box-shadow: 0 2px 2px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px; 
}

.product-image:hover {
    filter: brightness(95%); 
}
.status-delivered {
    background-color: #5cb85c; /* Green */
    color: #fff; /* White text */
}

.status-processing {
    background-color: #337ab7; /* Blue */
    color: #fff; /* White text */
}

.status-on-hold {
    background-color: #777; /* Gray */
    color: #fff; /* White text */
}


.pagination {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.pagination ul {
    list-style: none;
    padding: 0;
    display: flex;
}

.pagination li {
    margin: 0 5px;
}

.pagination a {
    text-decoration: none;
    color: #333;
    background-color: #eee;
    padding: 8px 12px;
    border-radius: 4px;
    transition: background-color 0.3s;
}

.pagination a:hover {
    background-color: #ddd;
}

  </style>

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

                        <h2 class="page-title">Dashboard</h2>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <?php


function getTotalCount($conn, $admin) {
    $sql = "SELECT COUNT(*) as total FROM $admin";
    $result = $conn->query($sql);

    if ($result) {
        $row = $result->fetch_assoc();
        return $row['total'];
    } else {
        return 'Error fetching data';
    }
}

$total_users = getTotalCount($conn, 'user');

$total_products = getTotalCount($conn, 'products');

$total_orders = getTotalCount($conn, 'orders');


?>

                                        <div class="panel panel-default">
                                            <div class="panel-body bk-primary text-light">
                                                <div class="stat-panel text-center">
                                                    <div class="stat-panel-number h1 "><?php echo $total_users; ?></div>
                                                    <div class="stat-panel-title text-uppercase">New Users</div>
                                                </div>
                                            </div>
                                            <center><a href="viewallusers.php" class="block-anchor panel-footer">Full Detail <i class="fa fa-arrow-right"></i></a></center>
                                        </div>


                                    </div>
                                    <?php

$query = "SELECT COUNT(*) as totalProducts FROM products";
$result = $conn->query($query);

if ($result) {
    $row = $result->fetch_assoc();
    $totalProducts = $row['totalProducts'];
} else {
    $totalProducts = 0;
}

?>

<div class="col-md-3">
    <div class="panel panel-default">
        <div class="panel-body bk-success text-light">
            <div class="stat-panel text-center">
                <div class="stat-panel-number h1"><?php echo $totalProducts; ?></div>
                <div class="stat-panel-title text-uppercase">All Products</div>
            </div>
        </div>
        <a href="allproducts.php" class="block-anchor panel-footer text-center">See All &nbsp; <i class="fa fa-arrow-right"></i></a>
    </div>
</div>

                                        <?php


function getTotalOrder($conn, $orders) {
    $sql = "SELECT COUNT(*) as total FROM $orders ";
    $result = $conn->query($sql);

    if ($result) {
        $row = $result->fetch_assoc();
        return $row['total'];
    } else {
        return 'Error fetching data';
    }
}



$total_orders = getTotalOrder($conn, 'orders');

?>

                                    <div class="col-md-3">
                                        <div class="panel panel-default">
                                            <div class="panel-body bk-info text-light">
                                                <div class="stat-panel text-center">
                                                    <div class="stat-panel-number h1 "><?php echo $total_orders; ?></div>
                                                    <div class="stat-panel-title text-uppercase">Total Orders</div>
                                                </div>
                                            </div>
<a href="#s" class="block-anchor panel-footer text-center" id="scrollToLink"><i class="fa fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                   <a href="new-product.php"> <div class="col-md-3">
                                        <div class="panel panel-default">
                                            <div class="panel-body bk-warning text-light">
                                                <div class="stat-panel text-center">
                                                    <div class="stat-panel-number h1 ">+</div>
                                                    <div class="stat-panel-title text-uppercase">Add New Product</div>
                                                </div>
                                            </div>
                                            <a href="new-product.php" class="block-anchor panel-footer text-center"> &nbsp; <i class="fa fa-arrow-right"></i></a>
                                        </div>
                                    </a>
                                    </div>
                                </div>
                            </div>
                        </div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Recent Orders</div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="s">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Size</th>
                                <th>Quantity</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
$items_per_page = 20;
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($current_page - 1) * $items_per_page;

$query = "SELECT * FROM orders ORDER BY id DESC LIMIT $items_per_page OFFSET $offset";
$result = $conn->query($query);


$result = $conn->query($query);


                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<tr>';
                                    echo '<td>' . $row['pname'] . '</td>';
                                    echo '<td>' . $row['size'] . '</td>';
                                    echo '<td>' . $row['quantity'] . '</td>';
                                    echo '<td>' . $row['order_datetime'] . '</td>';
                                    echo '<td>' . getOrderStatus($row['status'], $row['id']) . '</td>';
                                    echo '<td>' . getStatusButtons($row['id'], $row['status']) . '</td>';
                                    echo '<td>';
                                    echo '<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#orderModal' . $row['id'] . '">View Details</button>';
                                    echo '</td>';
                                    echo '</tr>';

                                    // Order details modal
                                    echo '<div class="modal fade" id="orderModal' . $row['id'] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">';
                                    echo '<div class="modal-dialog" role="document">';
                                    echo '<div class="modal-content">';
                                    echo '<div class="modal-header">';
                                    echo '<h5 class="modal-title titlee" id="exampleModalLabel">Order Details</h5>';
                                    echo '</div>';
                                    echo '<div class="modal-body">';
                                    echo '<img src="../images/' . $row["img"] . '" alt="Product Image" class="product-image">';
                                    echo '<p><strong>Product Name:</strong> ' . $row['pname'] . '</p>';
                                    echo '<p><strong>Size:</strong> ' . $row['size'] . '</p>';
                                    echo '<p><strong>Quantity:</strong> ' . $row['quantity'] . '</p>';
                                    echo '<p><strong>Date:</strong> ' . $row['order_datetime'] . '</p>';
                                    echo '<p><strong>Username:</strong> ' . $row['username'] . '</p>';
                                    echo '<p><strong>First Name:</strong> ' . $row['firstname'] . '</p>';
                                    echo '<p><strong>Last Name:</strong> ' . $row['lastname'] . '</p>';
                                    echo '<p><strong>Email:</strong> ' . $row['email'] . '</p>';
                                    echo '<p><strong>Address:</strong> ' . $row['adress'] . '</p>';
                                    echo '<p><strong>Country:</strong> ' . $row['country'] . '</p>';
                                    echo '<p><strong>State:</strong> ' . $row['state'] . '</p>';
                                    echo '<p><strong>Contact Number:</strong> ' . $row['contactnumber'] . '</p>';
                                    echo '<p><strong>Price:</strong> ' . $row['price'] . '</p>';
                                    echo '</div>';
                                    echo '<div class="modal-footer">';
                                    echo '<button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';

                                    // Status update modal
                                    echo '<div class="modal fade" id="statusModal' . $row['id'] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">';
                                    echo '<div class="modal-dialog" role="document">';
                                    echo '<div class="modal-content">';
                                    echo '<div class="modal-header">';
                                    echo '<h5 class="modal-title titlee" id="exampleModalLabel">Update Order Status</h5>';
                                    echo '</div>';
                                    echo '<div class="modal-body">';
                                    echo '<form action="update_status.php" method="post">';
                                    echo '<input type="hidden" name="order_id" value="' . $row['id'] . '">';
                                    echo '<div class="form-group">';
                                    echo '<label for="statusSelect">Select Status:</label>';
                                    echo '<select class="form-control" id="statusSelect" name="status">';
echo '<option value="pending">Pending</option>';
echo '<option value="processing">Processing</option>';
echo '<option value="shipped">Shipped</option>';
echo '<option value="delivered">Delivered</option>';
echo '<option value="on-hold">On Hold</option>';
                                    echo '</select>';
                                    echo '</div>';
                                    echo '<button type="submit" class="btn btn-primary">Update Status</button>';
                                    echo '</form>';
                                    echo '</div>';
                                    echo '<div class="modal-footer">';
                                    echo '<button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                }
                            } else {
                                echo '<tr><td colspan="6">No orders found</td></tr>';
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
function getOrderStatus($statusCode, $orderId)
{
    switch ($statusCode) {
        case 'pending':
            return '<span class="label label-warning">Pending</span>';
        case 'cancelled':
            return '<span class="label label-danger">Cancelled</span>';
        case 'shipped':
            return '<span class="label label-success">Shipped</span>';
        case 'delivered':
            return '<span class="label label-info status-delivered">Delivered</span>';
        case 'processing':
            return '<span class="label label-primary status-processing">Processing</span>';
        case 'on-hold':
            return '<span class="label label-secondary status-on-hold">On Hold</span>';
        // Add more cases as needed
        default:
            return '<span class="label label-warning">Pending</span>';
    }
}

function getStatusButtons($orderId, $currentStatus)
{
    // You can add more status options manually here
    $statusOptions = '
        <option value="pending">Pending</option>
        <option value="processing">Processing</option>
        <option value="shipped">Shipped</option>
        <option value="delivered">Delivered</option>
        <option value="on-hold">On Hold</option>
    ';

    return '
        <div class="btn-group">
            <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#statusModal' . $orderId . '">
                Change Status
            </button>
        </div>

        <!-- Status Modals -->
        <div class="modal fade" id="statusModal' . $orderId . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title titlee" id="exampleModalLabel">Update Order Status</h5>
                    </div>
                    <div class="modal-body">
                        <p>Current Status: ' . getOrderStatus($currentStatus, $orderId) . '</p>
                        <form action="update_status.php" method="post">
                            <input type="hidden" name="order_id" value="' . $orderId . '">
                            <div class="form-group">
                                <label for="statusSelect">Select Status:</label>
                                <select class="form-control" id="statusSelect" name="status">
                                    ' . str_replace('value="' . $currentStatus . '"', 'value="' . $currentStatus . '" selected', $statusOptions) . '
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Status</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>';
}

echo '<div class="pagination">';
echo '<ul>';

$total_pages = ceil($total_orders / $items_per_page);
$visible_pages = 3; // Adjust this to set the number of visible page links

$start_page = max($current_page - floor($visible_pages / 2), 1);
$end_page = min($start_page + $visible_pages - 1, $total_pages);

if ($start_page > 1) {
    echo '<li><a href="?page=1">1</a></li>';
    if ($start_page > 2) {
        echo '<li><span>...</span></li>';
    }
}

for ($i = $start_page; $i <= $end_page; $i++) {
    echo '<li><a ' . ($i == $current_page ? 'class="active"' : '') . ' href="?page=' . $i . '">' . $i . '</a></li>';
}

if ($end_page < $total_pages) {
    if ($end_page < $total_pages - 1) {
        echo '<li><span>...</span></li>';
    }
    echo '<li><a href="?page=' . $total_pages . '">' . $total_pages . '</a></li>';
}

echo '</ul>';
echo '</div>';
?>
                        
                       
                    </div>
                </div>

            </div>
        </div>
    </div>
<script>
document.getElementById('scrollToLink').addEventListener('click', function(event) {
    event.preventDefault();

    var targetElement = document.getElementById('s');
    if (targetElement) {
        targetElement.scrollIntoView({ behavior: 'smooth' });
    }
});
</script>


    <!-- Loading Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


    <script src="js/main.js"></script>
    


</body>

</html>