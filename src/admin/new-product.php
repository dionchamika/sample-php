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

    <title>Admin Dashboard - SLT Clothing</title>

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
    body{ user-select:none; width: 100% !important;}
    
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
                    
                        <h2 class="page-title">Add New Product</h2>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">add products details</div>
                                    <div class="panel-body">
<form id="productForm" action="insert.php" method="POST" class="form-horizontal" enctype="multipart/form-data">


                                    <div class="hr-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label text-uppercase">Product Category</label>
                                        <div class="col-sm-10">
                                            <select class="selectpicker" name="category" onchange="showAdditionalOptions()" required>
    <optgroup>
        <option value="armcut">Arm cut</option>
        <option value="bottoms">Bottoms</option>
        <option value="whitevest">White vest</option>
        <option value="shirts">T Shirts</option>
        <option value="shirt">Shirts</option>
        <option value="shorts">Shorts</option>
    </optgroup>
</select>

<div id="additionalOptions" style="display: none;">
    <label for="additionalCategoryOptions">Additional Options:</label>
<select name="shirtcategory" id="additionalCategoryOptions" class="selectpicker">
        <!-- Options for Shirts -->
        <optgroup id="shirtOptions" style="display: none;">
            <option value=""></option>
            <option value="collar">COLLAR OPTIONS</option>
            <option value="sleeve">SLEEVE OPTIONS</option>
            <option value="bottom">BOTTOM HEM OPTIONS</option>
            <option value="silt">SLIT</option>
            <option value="placket">PLACKET TYPES</option>
            <option value="sleevehem">SLEEVE HEM TYPES</option>
        </optgroup>
    </select>
</div>

<script>
    function showAdditionalOptions() {
        var categorySelect = document.getElementsByName("category")[0];
        var additionalOptionsDiv = document.getElementById("additionalOptions");
        var shirtOptions = document.getElementById("shirtOptions");

        additionalOptionsDiv.style.display = "none";
        shirtOptions.style.display = "none";

        if (categorySelect.value === "shirts") {
            additionalOptionsDiv.style.display = "block";
            shirtOptions.style.display = "block";

            $('#additionalCategoryOptions').selectpicker('refresh');
        }
    }
</script>


                                           
                                        </div>
                                    </div>
                                        <div class="hr-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">AVAILABLE QUANTITY</label>
                                        <div class="col-sm-10">
                                            <select class="selectpicker" name="quantity">
                                                <optgroup>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                    <option value="23">24</option>
                                                    <option value="24">25</option>
                                                    <option value="26">26</option>
                                                    <option value="27">27</option>
                                                    <option value="28">28</option>
                                                    <option value="29">29</option>
                                                    <option value="30">30</option>
                                                </optgroup>
                                                
                                            </select>

                                           
                                        </div>
                                    </div>

                                      <div class="hr-dashed"></div>
<div class="form-group">
    <label class="col-sm-2 control-label">AVAILABLE SIZES</label>
    <div class="col-sm-10">
        <select class="selectpicker" name="sizes[]" multiple required>
            <optgroup label="Sizes">
                <option value="S">S</option>
                <option value="SM">SM</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
                <option value="XXL">XXL</option>
            </optgroup>
        </select>
    </div>
</div>


                                      <div class="hr-dashed"></div>


                                            <div class="form-group">
                                                <label class="col-sm-2 control-label text-uppercase"> Product Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="pname" placeholder="Product name here" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label text-uppercase"> Brand</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="Brand" placeholder="type Brand name here">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label text-uppercase"> Style</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="Style" placeholder="type Product Style here">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label text-uppercase"> Colour</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="Colour" placeholder="type Product Colour here">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label text-uppercase"> Material</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="Material" placeholder="type Product Material here">
                                                </div>
                                            </div>
                                         
                                         <div class="form-group">
                                                <label class="col-sm-2 control-label text-uppercase"> Thickness</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="Thickness" placeholder="type Product Thickness here">
                                                </div>
                                            </div>

                                            <div class="hr-dashed"></div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label text-uppercase"> Description</label>
                                                <div class="col-sm-10">
                                            <textarea class="form-control" rows="3" name="description"></textarea>
                                                </div>
                                            </div>




                                            <div class="hr-dashed"></div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Price</label>
                                                <div class="col-sm-10">
                                                <div class="input-group mb"><span class="input-group-addon">RS</span>
                                                <input type="number" class="form-control" name="price" required></div>                                                </div>
                                            </div>
                                            
                                          
                                               <div class="hr-dashed"></div>
                                            <div class="form-group">
        <label class="col-sm-2 control-label">Product Image<span style="color: #fff; ">...</span></label>
        <div class="col-sm-10">
        <input id="input-43" type="file" name="img" accept=".png, .jpg, .jpeg" onchange="validateImageSize()">
        <div id="errorBlock43" class="help-block" nam></div>
        </div>
    </div></div>
                                              <div class="hr-dashed"></div>
                                            <div class="form-group">
                                                <div class="col-sm-8 col-sm-offset-2">
    <button id="submitBtn" class="btn btn-primary" type="button">Submit</button>

                                                </div>
                                        </form>

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


    <!-- Loading Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

<!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->

    <script src="js/main.js"></script>
<script>
    function validateImageSize() {
        var input = document.getElementById('input-43');
        var errorBlock = document.getElementById('errorBlock43');
        
        if (input.files.length > 0) {
            var fileSize = input.files[0].size; // in bytes
            var maxSize = 1024 * 1024; // 1MB

            if (fileSize > maxSize) {
                errorBlock.innerHTML = 'Image size must be under 1MB.';
                input.value = ''; // Clear the file input
            } else {
                errorBlock.innerHTML = ''; // Clear any previous error messages
            }
        }
    }
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Event listener for form submission
    $('#submitBtn').click(function() {
        // Serialize form data
        var formData = new FormData($('#productForm')[0]);

        // AJAX request
        $.ajax({
            url: 'insert.php', // URL to submit the form data
            type: 'POST', // HTTP method
            data: formData, // Form data to submit
            processData: false,
            contentType: false,
            success: function(response) {
                // Parse response
                var data = JSON.parse(response);
                // Check if submission was successful
                if (data.success) {
                    // Show success message
                    Swal.fire({
                        title: 'Success!',
                        text: 'Product has been submitted successfully.',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        // Redirect after clicking OK
                        window.location.replace('new-product.php');
                    });
                } else {
                    // Show error message
                    Swal.fire({
                        title: 'Error!',
                        text: data.message,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            },
            error: function(xhr, status, error) {
                // Show error message
                Swal.fire({
                    title: 'Error!',
                    text: 'An error occurred while submitting the form.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        });
    });
});
</script>

</body>

</html>