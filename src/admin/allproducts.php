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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>All Products - SLT clothing</title>

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

.titlee{font-weight: 600 !important;
    margin-top: 20px;
    font-size: 16px;
    text-align: center;

}
.par{
    font-weight: 600 !important;
    text-transform: uppercase;
}
.update{
    margin-left: 10px;
}
.modal-body {
        padding: 20px;
    }

    .product-detail {
        margin-bottom: 15px;
    }

    .product-detail label {
        font-weight: bold;
    }

    .product-detail p {
        margin: 0;
    }
.wama{
    margin-left: 10px;
}
a{text-decoration: none !important ; color: #fff !important;
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
                 <li class="ts-account">
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
                $query = "SELECT * FROM products";
                $result = $conn->query($query);

                $numProducts = $result->num_rows;

                if ($result->num_rows > 0) {
                ?>
                    <h2 class="page-title">All Products</h2>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <?php echo $numProducts > 0 ? "$numProducts Products found" : "No Products in site"; ?>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Products Id</th>
                                                    <th>Products Name</th>
                                                    <th>Category</th>
                                                    <th>Price</th>
                                                    <th>Stocks</th>
                                                    <th>Sizes</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while ($row = $result->fetch_assoc()) {
                                                    echo '<tr>';
                                                    echo '<td>' . $row['pid'] . '</td>';
                                                    echo '<td>' . $row['pname'] . '</td>';
                                                    echo '<td>' . $row['category'] . '</td>';
                                                    echo '<td>' . $row['price'] . '</td>';
                                                    echo '<td>' . $row['quantity'] . '</td>';
                                                    echo '<td>' . $row['sizes'] . '</td>';
                                                    echo '<td>';

                                                    echo '<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#productModal' . $row['pid'] . '">View product</button>';
                                                    echo '<button class="btn btn-success btn-sm update" data-toggle="modal" data-target="#updateProductModal' . $row['pid'] . '">Update</button>';
                                                    echo '<button class="btn btn-danger btn-sm delete wama" onclick="showConfirmation2(' . $row['pid'] . ')">Delete</button>';


                                                    echo '</td>';
                                                    echo '</tr>';

                                                    echo '<div class="modal fade" id="productModal' . $row['pid'] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">';
                                                    echo '<div class="modal-dialog" role="document">';
                                                    echo '<div class="modal-content">';
                                                    echo '<div class="modal-header">';
                                                    echo '<h5 class="modal-title titlee" id="exampleModalLabel">' . $row['pname'] . '</h5>';
                                                    echo '</div>';
                                                    echo '<div class="modal-body">';
                                                    echo '<img src="../images/' . $row["img"] . '" alt="Product Image" class="product-image">';
                                                    echo '<p><span class="par mt">Category</span>: ' . $row['category'] . '</p>';
                                                    echo '<p><span class="par">shirtcategory</span>: ' . $row['shirtcategory'] . '</p>';
                                                    echo '<p><span class="par">stocks</span>: ' . $row['quantity'] . '</p>';
                                                    echo '<p><span class="par">sizes</span>: ' . $row['sizes'] . '</p>';
                                                    echo '<p><span class="par">Brand</span>: ' . $row['Brand'] . '</p>';
                                                    echo '<p><span class="par">Style</span>: ' . $row['Style'] . '</p>';
                                                    echo '<p><span class="par">Colour</span>: ' . $row['Colour'] . '</p>';
                                                    echo '<p><span class="par">Material</span>: ' . $row['Material'] . '</p>';
                                                    echo '<p><span class="par">Thickness</span>: ' . $row['Thickness'] . '</p>';
                                                    echo '<p><span class="par">price</span>: ' . $row['price'] . '</p>';
                                                    echo '<p><span class="par">description</span>: ' . $row['description'] . '</p>';

                                                    echo '<p><span class="par">status</span>: ' . (($row['status'] == 1) ? 'In Stock' : 'Out of Stock') . '</p>';
                                                    echo '<p><span class="par">product views</span>: ' . $row['view_count'] . '</p>';

                                                    echo '</div>';

                                                    echo '<div class="modal-footer">';
                                                    echo '<button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>';
                                                    echo '</div>';
                                                    echo '</div>';
                                                    echo '</div>';
                                                    echo '</div>';
echo '<div class="modal fade" id="deleteProductModal' . $row['pid'] . '" tabindex="-1" role="dialog" aria-labelledby="deleteProductModalLabel' . $row['pid'] . '" aria-hidden="true">';
echo '<div class="modal-dialog" role="document">';
echo '<div class="modal-content">';
echo '<div class="modal-header">';
echo '<h5 class="modal-title titlee" id="deleteProductModalLabel' . $row['pid'] . '">Delete Product: ' . $row['pname'] . '</h5>';
echo '</div>';
echo '<div class="modal-body">';
echo '<img src="../images/' . $row["img"] . '" alt="Product Image" class="product-image">';
echo '<p><strong>Warning:</strong> Once deleted, this product cannot be recovered. Are you sure you want to proceed?</p>';
echo '</div>';
echo '<div class="modal-footer">';
echo '<form action="delete.php" method="post" id="deleteProductForm">';
echo '<input type="hidden" name="pid" id="deleteProductId" value="">';
echo '<button type="button" class="btn btn-danger" onclick="showConfirmation()">Delete</button>';
echo '<button type="button" class="btn btn-dark" data-dismiss="modal">Cancel</button>';
echo '</form>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';

// delete

echo '<div class="modal fade" id="updateProductModal' . $row['pid'] . '" tabindex="-1" role="dialog" aria-labelledby="updateProductModalLabel' . $row['pid'] . '" aria-hidden="true">';
echo '<div class="modal-dialog" role="document">';
echo '<div class="modal-content">';
echo '<div class="modal-header">';
echo '<h5 class="modal-title titlee" id="updateProductModalLabel' . $row['pid'] . '">Update Product: ' . $row['pname'] . '</h5>';
// echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
// echo '<span aria-hidden="true">&times;</span>';
echo '</button>';
echo '</div>';
echo '<div class="modal-body">';
echo '<form action="update_product.php" method="post">';
echo '<input type="hidden" name="pid" value="' . $row['pid'] . '">';

echo '<div class="form-group">';
echo '<label for="pname">Product Name:</label>';
echo '<input type="text" class="form-control" id="pname" name="pname" value="' . $row['pname'] . '">';
echo '</div>';

echo '<div class="form-group">';
echo '<label for="category">Category:</label>';
echo '<select class="form-control" id="category" name="category">';
$categories = array("armcut", "bottoms", "whitevest", "shirts", "shirt", "shorts");

foreach ($categories as $category) {
    echo '<option value="' . $category . '" ' . ($row['category'] == $category ? 'selected' : '') . '>' . ucfirst($category) . '</option>';
}
echo '</select>';
echo '</div>';


echo '<div class="form-group">';
echo '<label for="shirtcategory">T - Shirt Category:(optional)</label>';
echo '<select class="form-control" id="shirtcategory" name="shirtcategory">';
echo '<option value=""></option>'; // Empty option

$shirtCategoryOptions = array("collar", "sleeve", "bottom", "silt", "placket", "sleevehem");

foreach ($shirtCategoryOptions as $option) {
    echo '<option value="' . $option . '" ' . ($row['shirtcategory'] == $option ? 'selected' : '') . '>' . strtoupper($option) . '</option>';
}

echo '</select>';
echo '</div>';


echo '<div class="form-group">';
echo '<label for="quantity">stocks:</label>';
echo '<input type="text" class="form-control" id="quantity" name="quantity" value="' . $row['quantity'] . '">';
echo '</div>';




echo '<div class="form-group">';
echo '<label for="Brand">Brand:</label>';
echo '<input type="text" class="form-control" id="Brand" name="Brand" value="' . $row['Brand'] . '">';
echo '</div>';

echo '<div class="form-group">';
echo '<label for="Style">Style:</label>';
echo '<input type="text" class="form-control" id="Style" name="Style" value="' . $row['Style'] . '">';
echo '</div>';

echo '<div class="form-group">';
echo '<label for="Colour">Colour:</label>';
echo '<input type="text" class="form-control" id="Colour" name="Colour" value="' . $row['Colour'] . '">';
echo '</div>';

echo '<div class="form-group">';
echo '<label for="Material">Material:</label>';
echo '<input type="text" class="form-control" id="Material" name="Material" value="' . $row['Material'] . '">';
echo '</div>';

echo '<div class="form-group">';
echo '<label for="Thickness">Thickness:</label>';
echo '<input type="text" class="form-control" id="Thickness" name="Thickness" value="' . $row['Thickness'] . '">';
echo '</div>';

echo '<div class="form-group">';
echo '<label for="price">price:</label>';
echo '<input type="text" class="form-control" id="price" name="price" value="' . $row['price'] . '">';
echo '</div>';

echo '<div class="form-group">';
echo '<label for="description">description:</label>';
echo '<input type="text" class="form-control" id="description" name="description" value="' . $row['description'] . '">';
echo '</div>';




echo '<button type="submit" class="btn btn-success">Update</button>';
echo '</form>';
echo '</div>';
echo '<div class="modal-footer">';
echo '<button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';

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
                    echo '<div class="alert alert-info">No products found. <u><a href="new-product.php">click here</u></a> to add new product</div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
<script>
function showConfirmation(pid) {
    var modal = $('#deleteProductModal' + pid);
    modal.modal('show');

    modal.find('.btn-danger').click(function() {
        document.getElementById('deleteProductId').value = pid;
        document.getElementById('deleteProductForm').submit();
    });
}

function showConfirmation2(pid) {
    Swal.fire({
        title: 'Delete Product',
        text: 'Enter password to proceed with the deletion:',
        input: 'password',
        inputAttributes: {
            autocapitalize: 'off'
        },
        showCancelButton: true,
        confirmButtonText: 'Confirm',
        showLoaderOnConfirm: true,
        preConfirm: (password) => {
            if (password === 'admin123') {
                return true;
            } else {
                Swal.showValidationMessage('Incorrect password. Access denied.');
                return false;
            }
        }
    }).then((result) => {
        if (result.isConfirmed) {
            var modal = $('#deleteProductModal' + pid);
            modal.modal('show');

            modal.find('.btn-danger').click(function() {
                document.getElementById('deleteProductId').value = pid;
                document.getElementById('deleteProductForm').submit();
            });
        }
    });
}
</script>


    <!-- Loading Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


    <script src="js/main.js"></script>
    


</body>

</html>