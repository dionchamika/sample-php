<?php
include 'lib/db_con.php';

session_start();

// one nam meka ain karhn
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_SERVER['HTTP_REFERER'])) {
    header('Location: index.php');
    exit();
}
?>
<!doctype html>
<html lang="en">

<!-- Head -->
<head>
  <!-- Page Meta Tags-->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="keywords" content="">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Custom Google Fonts-->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;600&family=Roboto:wght@300;400;700&display=auto"
    rel="stylesheet">

  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="./assets/images/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="./assets/images/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/favicon/favicon-16x16.png">
  <link rel="mask-icon" href="./assets/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">

  <!-- Vendor CSS -->
  <link rel="stylesheet" href="./assets/css/libs.bundle.css" />

  <!-- Main CSS -->
  <link rel="stylesheet" href="./assets/css/theme.bundle.css" />

  <!-- Fix for custom scrollbar if JS is disabled-->
  <noscript>
    <style>
      
      .simplebar-content-wrapper {
        overflow: auto;
      }
    </style>
  </noscript>

  <!-- Page Title -->
  <title>Payment -  <?php echo $_POST["pname"]; ?></title>

</head>
<body>
<form id="checkoutForm" action="process_order.php" method="POST">
    <?php

// ain krhn
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $pid = $_POST['pid'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $adress = $_POST['adress'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $contactnumber = $_POST['contactnumber'];

    // Retrieve the Cart Item details
    $pname = $_POST['pname'];
    $size = $_POST['size'];
    $quantity = $_POST['quantity'];
    $img = $_POST['img'];
    $price = $_POST['price'];

 

}
?>
    <!-- Main Section-->
    <section class="mt-0  vh-lg-100">
        <!-- Page Content Goes Here -->
        <div class="container">
            <div class="row g-0 vh-lg-100">
                <div class="col-lg-7 pt-5 pt-lg-10">
                    <div class="pe-lg-5">
                        <!-- Logo-->
                        <a class="navbar-brand fw-bold fs-3 flex-shrink-0 mx-0 px-0" href="../">
                                <div class="d-flex align-items-center">
                                   <img src="assets/images/logos/re-logo.png" alt="Logo" width="100" height="50">
                                </div>
                            </a>
                        <!-- / Logo-->
                        <nav class="d-none d-md-block">
                            <ul class="list-unstyled d-flex justify-content-start mt-4 align-items-center fw-bolder small">
                               
                                <li class="me-4"><a class="nav-link-checkout "
                                        >Checkout</a></li>
                                <li><a class="nav-link-checkout nav-link-last active"
                                        >Payment</a></li>
                            </ul>
                        </nav>                        <div class="mt-5">
                            <!-- Checkout Information Summary -->
                            <ul class="list-group mb-5 d-none d-lg-block rounded-0">
                                 <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <span class="text-muted small me-2 f-w-36 fw-bolder">Name</span>
                                        <span class="small"><?php echo $username; ?></span>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <span class="text-muted small me-2 f-w-36 fw-bolder">Contact</span>
                                        <span class="small"><?php echo $email; ?> / <?php echo $contactnumber; ?></span>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <span class="text-muted small me-2 f-w-36 fw-bolder">Deliver To</span>
                                        <span class="small"><?php echo $adress; ?> / <?php echo $country; ?></span>
                                    </div>
                                </li>
                               
                            </ul><!-- / Checkout Information Summary-->
                            
                            <!-- Checkout Panel Information-->
                            <h3 class="fs-5 fw-bolder mb-4 border-bottom pb-4">Payment Method</h3>
                            
                            <div class="row">
                            
                              <!-- Payment Option-->
                              <div class="col-12">
                                <div class="form-check form-group form-check-custom form-radio-custom mb-3">
                                  <input class="form-check-input" type="radio" name="checkoutPaymentMethod" id="checoutPaymentStripe" checked>
                                  <label class="form-check-label" for="checoutPaymentStripe">
                                    <span class="d-flex justify-content-between align-items-start">
                                      <span>
                                        <span class="mb-0 fw-bolder d-block mb-2">Cash on Delivery</span>
                                      </span>
                                    </span>
                                  </label>
                                </div>
                              </div>
                            
                              <!-- Payment Option-->
                              <!-- Payment Option-->
<div class="col-12">
    <div class="form-check form-group form-check-custom form-radio-custom mb-3">
        <input class="form-check-input" type="radio" name="checkoutPaymentMethod" id="checkoutPaymentPaypal">
        <label class="form-check-label" for="checkoutPaymentPaypal">
            <span class="d-flex justify-content-between align-items-start">
                <span>
                    <span class="mb-0 fw-bolder d-block">PayPal</span>
                </span>
                <i class="ri-paypal-line"></i>
            </span>
        </label>
    </div>
</div>

                            
                            </div>
                           <!-- Payment Details-->
                        <div class="card-details">
                            <div class="row pt-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="cc-name" class="form-label">Address</label>
                                        <input type="text" class="form-control" id="cc-name" placeholder="" required="" value="<?php echo $adress; ?>" disabled>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="cc-number" class="form-label">Contact number</label>
                                        <input type="text" class="form-control" id="cc-number" value="<?php echo $contactnumber; ?>" disabled>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="cc-number" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="cc-number" value="<?php echo $email; ?>" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
<!-- / Payment Details-->

                            
                            <!-- Paypal Info-->
                            <div class="paypal-details bg-light p-4 d-none my-3 fw-bolder">
                              Comming soon
                            </div>
                            <!-- /Paypal Info-->
                            
                            <!-- Accept Terms Checkbox-->
                            <div class="form-group form-check m-0">
                              <input type="checkbox" class="form-check-input" id="accept-terms" checked>
                              <label class="form-check-label fw-bolder" for="accept-terms">I agree to SLT clothing's <a href="#">terms &
                                  conditions</a></label>
                            </div>
                            
                <input type="hidden" name="id" value="<?php echo $_SESSION["id"]; ?>">
                <input type="hidden" name="username" value="<?php echo $_SESSION["username"]; ?>">
                <input type="hidden" name="email" value="<?php echo $_SESSION["email"]; ?>">
                 <input type="hidden" name="firstname" value="<?php echo $firstname; ?>">
                 <input type="hidden" name="pid" value="<?php echo $pid; ?>">
                 <input type="hidden" name="lastname" value="<?php echo $lastname; ?>">
                <input type="hidden" name="adress" value="<?php echo $adress; ?>">
                <input type="hidden" name="country" value="<?php echo $country; ?>">
                <input type="hidden" name="state" value="<?php echo $state; ?>">
                <input type="hidden" name="zip" value="<?php echo $zip; ?>">
                <input type="hidden" name="contactnumber" value="<?php echo $contactnumber; ?>">
                <input type="hidden" name="pname" value="<?php echo $pname; ?>">
                <input type="hidden" name="size" value="<?php echo $size; ?>">
                <input type="hidden" name="quantity" value="<?php echo $quantity; ?>">
                <input type="hidden" name="img" value="<?php echo $img; ?>">
                <input type="hidden" name="price" value="<?php echo $price; ?>">
                

                            <div class="pt-5 mt-5 pb-5 border-top d-flex flex-column flex-md-row justify-content-between align-items-center">
                             
<button id="completeOrderButton" class="btn btn-dark w-100 w-md-auto" role="button">Complete Order</button>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var completeOrderButton = document.getElementById('completeOrderButton');
        var paypalRadio = document.getElementById('checkoutPaymentPaypal');

        toggleCompleteOrderButton();

        document.addEventListener('change', function (event) {
            if (event.target.name === 'checkoutPaymentMethod') {
                toggleCompleteOrderButton();
            }
        });

        function toggleCompleteOrderButton() {
            completeOrderButton.style.display = paypalRadio.checked ? 'none' : 'block';
        }
    });
</script>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-5 bg-light pt-lg-10 aside-checkout pb-5 pb-lg-0 my-5 my-lg-0">
                    <div class="p-4 py-lg-0 pe-lg-0 ps-lg-5">
                        <div class="pb-3">
                            <!-- Cart Item-->
                            <div class="row mx-0 py-4 g-0 border-bottom">
                                <div class="col-2 position-relative">
                                    <picture class="d-block border">
                                        <img class="img-fluid" src="images/<?php echo $img; ?>" >
                                    </picture>
                                </div>
                                <div class="col-9 offset-1">
                                    <div>
                                        <h6 class="justify-content-between d-flex align-items-start mb-2">
                                            <?php echo $pname; ?>
                                        </h6>
<span class="d-block text-muted fw-bolder text-uppercase fs-9">Size: <?php echo $size; ?> / Qty: <?php echo $quantity; ?></span>                                    </div>
                                </div>
                            </div>    <!-- / Cart Item-->
                            <!-- Cart Item-->
                               <!-- / Cart Item-->
                        </div>
                        
                        <div class="py-4 border-bottom">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="m-0 fw-bold fs-5">Total</p>
                                </div>
                                <p class="m-0 fs-5 fw-bold"><?php echo $price; ?></p>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
    </section>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Handle form submission via AJAX
        document.getElementById('checkoutForm').addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent the default form submission
            
            // Serialize form data
            var formData = new FormData(this);

            // Send AJAX request
            fetch(this.action, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Order placed successfully
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Order placed successfully!',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Redirect or perform any action after success
                            window.location.replace('account/');
                        }
                    });
                } else {
                    // Error occurred
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Error placing the order. Please try again.',
                        confirmButtonText: 'OK'
                    });
                }
            })
            .catch(error => {
                // Handle any errors
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong! Please try again later.',
                    confirmButtonText: 'OK'
                });
            });
        });
    });
</script></form>

    <!-- / Main Section-->
<!-- Your existing JavaScript code -->


    <!-- Theme JS -->
    <!-- Vendor JS -->
    <script src="./assets/js/vendor.bundle.js"></script>
    
    <!-- Theme JS -->
    <script src="./assets/js/theme.bundle.js"></script>
</body>

</html>