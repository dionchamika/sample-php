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

    <title>Admin Dashboard - SLT clothing</title>

    <!-- Font awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Sandstone Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

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
    
        label {font-size: 14px;}


    .modal-title {
        color: #333;
    }

    .modal-body p {
        color: #555;
    }

    .modal-footer {
        border-top: 1px solid #ddd;
    }

    .modal-footer button {
        color: #333;
    }
 #additionalOptions {
        margin-top: 15px;
        margin-left: 1px !important;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    select {
/*        width: 50%;*/
        padding: 8px;
        margin-bottom: 10px;
        box-sizing: border-box;
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
                <li><a href="change.php"><i class="fa fa-upload"></i> change Products Images</a></li>
               
                
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
  
<div class="content-wrapper" style="margin-top: -10px !important;">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                    
                        <h2 class="page-title">Add Clients Logos</h2>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Logo images</div>


<form id="uploadForm" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-sm-2 control-label text-uppercase">cap</label>
        <div class="col-sm-10">
            <input id="input-44" type="file" name="cap" accept=".png, .jpg, .jpeg"><br>
        </div>
    </div>
    <div class="hr-dashed"></div>
    <div class="form-group">
        <div class="col-sm-8 col-sm-offset-2"><br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>

<script>
$(document).ready(function() {
    $('#uploadForm').submit(function(event) {
        event.preventDefault(); // Prevent default form submission

        var formData = new FormData($(this)[0]);
        var fileInput = $('#input-44')[0]; // Get the file input element
        var file = fileInput.files[0]; // Get the selected file

        // Check if a file is selected
        if (!file) {
            // Show SweetAlert2 error message if no file is selected
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Please select an image to upload.',
                showConfirmButton: false,
                timer: 1500
            });
            return; // Exit the function
        }

        // Validate image dimensions
        var img = new Image();
        img.onload = function() {
            if (img.width !== 600 || img.height !== 600) {
                // Show SweetAlert2 error message if image dimensions are not 600x600
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Please upload an image with dimensions exactly 600x600 pixels.',
                    showConfirmButton: false,
                    timer: 1500
                });
                return; // Exit the function
            }

            // If all validations pass, proceed with form submission
            $.ajax({
                url: 'change/cap.php',
                type: 'POST',
                data: formData,
                async: true,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    // Show SweetAlert2 success message
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response,
                        showConfirmButton: false,
                        timer: 1000
                    }).then(function() {
                        location.reload();
                    });
                },
                error: function(xhr, status, error) {
                    // Show SweetAlert2 error message
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An error occurred while uploading the image.',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
        };
        img.src = URL.createObjectURL(file); // Set the image source to validate dimensions
    });
});
</script>

</div>


                                    </div>
                                </div>
                            </div>






                          </div>
     

                    </div>
                </div>
                
               
<div class="content-wrapper" style="margin-top: -10px !important;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Shirt Image</div>
                           <form id="shirt" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-sm-2 control-label text-uppercase">shirt</label>
        <div class="col-sm-10">
            <input id="input-45" type="file" name="shirt" accept=".png, .jpg, .jpeg"><br>
        </div>
    </div>
    <div class="hr-dashed"></div>
    <div class="form-group">
        <div class="col-sm-8 col-sm-offset-2"><br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>

<script>
$(document).ready(function() {
    $('#shirt').submit(function(event) {
        event.preventDefault(); // Prevent default form submission

        var formData = new FormData($(this)[0]);
        var fileInput = $('#input-45')[0]; // Get the file input element
        var file = fileInput.files[0]; // Get the selected file

        // Check if a file is selected
        if (!file) {
            // Show SweetAlert2 error message if no file is selected
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Please select an image to upload.',
                showConfirmButton: false,
                timer: 1500
            });
            return; // Exit the function
        }

        // Validate image dimensions
        var img = new Image();
        img.onload = function() {
            if (img.width !== 600 || img.height !== 600) {
                // Show SweetAlert2 error message if image dimensions are not 600x600
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Please upload an image with dimensions exactly 600x600 pixels.',
                    showConfirmButton: false,
                    timer: 1500
                });
                return; // Exit the function
            }

            // If all validations pass, proceed with form submission
            $.ajax({
                url: 'change/shirt.php',
                type: 'POST',
                data: formData,
                async: true,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    // Show SweetAlert2 success message
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response,
                        showConfirmButton: false,
                        timer: 1000
                    }).then(function() {
                        location.reload();
                    });
                },
                error: function(xhr, status, error) {
                    // Show SweetAlert2 error message
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An error occurred while uploading the image.',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
        };
        img.src = URL.createObjectURL(file); // Set the image source to validate dimensions
    });
});
</script>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content-wrapper" style="margin-top: -10px !important;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Bottoms Image</div>
                            <form id="bottoms" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-sm-2 control-label text-uppercase">bottoms</label>
        <div class="col-sm-10">
            <input id="input-3" type="file" name="bottoms" accept=".png, .jpg, .jpeg"><br>
        </div>
    </div>
    <div class="hr-dashed"></div>
    <div class="form-group">
        <div class="col-sm-8 col-sm-offset-2"><br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>

<script>
$(document).ready(function() {
    $('#bottoms').submit(function(event) {
        event.preventDefault(); // Prevent default form submission

        var formData = new FormData($(this)[0]);
        var fileInput = $('#input-3')[0]; // Get the file input element
        var file = fileInput.files[0]; // Get the selected file

        // Check if a file is selected
        if (!file) {
            // Show SweetAlert2 error message if no file is selected
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Please select an image to upload.',
                showConfirmButton: false,
                timer: 1500
            });
            return; // Exit the function
        }

        // Validate image dimensions
        var img = new Image();
        img.onload = function() {
            if (img.width !== 600 || img.height !== 600) {
                // Show SweetAlert2 error message if image dimensions are not 600x600
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Please upload an image with dimensions exactly 600x600 pixels.',
                    showConfirmButton: false,
                    timer: 1500
                });
                return; // Exit the function
            }

            // If all validations pass, proceed with form submission
            $.ajax({
                url: 'change/bottoms.php',
                type: 'POST',
                data: formData,
                async: true,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    // Show SweetAlert2 success message
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response,
                        showConfirmButton: false,
                        timer: 1000
                    }).then(function() {
                        location.reload();
                    });
                },
                error: function(xhr, status, error) {
                    // Show SweetAlert2 error message
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An error occurred while uploading the image.',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
        };
        img.src = URL.createObjectURL(file); // Set the image source to validate dimensions
    });
});
</script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>


                                     
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>




</script>


    <!-- Loading Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

<!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->

    <script src="js/main.js"></script>


</body>

</html>