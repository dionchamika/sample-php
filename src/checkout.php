<?php
include 'lib/db_con.php';

session_start();

// one nam meka ain karhn
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_SERVER['HTTP_REFERER'])) {
    header('Location: index.php');
    exit();
}

?>
<?php
$pid = $_POST["pid"]; // Get the product ID from the form
$pname = $_POST["pname"];
$size = $_POST["size"];
$quantity = $_POST["quantity"];
$price = $_POST["price"];

$img = isset($_POST["img"]) ? $_POST["img"] : ''; // Check if "img" key exists
$price = isset($_POST["price"]) ? $_POST["price"] : ''; // Check if "price" key exists
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
      /**
          * Reinstate scrolling for non-JS clients
          */
      .simplebar-content-wrapper {
        overflow: auto;
      }
    </style>
  </noscript>

  <!-- Page Title -->
  <title>Checkout |  <?php echo $_POST["pname"]; ?></title>

</head>
<body>
<form method="post" action="payment.php">

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
                               
                                <li class="me-4"><a class="nav-link-checkout active"
                                        >Information</a></li>
                               
                                <li><a class="nav-link-checkout nav-link-last "
                                      >Payment</a></li>
                            </ul>
                        </nav>                        <div class="mt-5">
                            <!-- Checkout Panel Information-->
                            <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-4">
                              <h3 class="fs-5 fw-bolder m-0 lh-1">Contact Information</h3>
                            </div>
                            <div class="row">
                             <!-- First Name -->
<?php
// session_start();

if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
    $userID = $_SESSION['id'];
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
    $email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
} else {
    header('Location: user/login/');
    exit();
}
?>

<!-- First Name -->
<div class="col-sm-12">
    <div class="form-group">
        <label for="firstNameBilling" class="form-label">Name</label>
        <input type="text" class="form-control" id="firstNameBilling" placeholder="" value="<?php echo $username; ?>" required="" readonly>
    </div>
</div>

<!-- Mobile Number -->
<div class="col-12">
    <div class="form-group">
        <label for="mobileNumber" class="form-label">Email</label>
        <input type="email" class="form-control" id="mobileNumber" value="<?php echo $email; ?>" readonly>
    </div>
</div>



                            </div>
                           <h3 class="fs-5 mt-5 fw-bolder mb-4 border-bottom pb-4">Shipping Address</h3>
<div class="row">
    <!-- First Name-->
    <div class="col-sm-6">
        <div class="form-group">
            <label for="firstName" class="form-label">First Name</label>
            <input type="text" class="form-control" id="firstName" name="firstname" required>
        </div>
    </div>

    <!-- Last Name-->
    <div class="col-sm-6">
        <div class="form-group">
            <label for="lastName" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastName" name="lastname" required>
        </div>
    </div>

    <!-- Address-->
    <div class="col-12">
        <div class="form-group">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="adress"  required>
        </div>
    </div>

    <!-- Country-->
  <div class="col-md-6">
    <div class="form-group">
        <label for="country" class="form-label">Country</label>
        <select class="form-select" id="country" name="country" onchange="updateStateOptions()" required>
            <option value="Sri Lanka" selected>Sri Lanka</option>
            <option value="USA">United States</option>
            <option value="Canada">Canada</option>
            <!-- Add more country options if needed -->
        </select>
    </div>
</div>

<!-- State (text input) -->
<div class="col-md-6">
    <div class="form-group">
        <label for="state" class="form-label">State</label>
        <input type="text" class="form-control" id="state" placeholder="Enter State" required name="state">
    </div>
</div>

<!-- Zip/Post Code -->
<div class="col-md-6">
    <div class="form-group">
        <label for="zip" class="form-label">Zip/Post Code</label>
        <input type="text" class="form-control" id="zip" name="zip" required>
    </div>
</div>

<!-- Contact Number -->
<div class="col-md-6">
    <div class="form-group">
        <label for="contactNumber" class="form-label">Contact Number</label>
        <input type="tel" class="form-control" id="contactNumber"  name="contactnumber">
    </div>
</div>

<script>
function updateStateOptions() {
    var countrySelect = document.getElementById('country');
    var stateInput = document.getElementById('state');

    var selectedCountry = countrySelect.options[countrySelect.selectedIndex].value;

    stateInput.placeholder = selectedCountry === 'Sri Lanka' ? 'Enter State' : 'Enter Province/Region';

    stateInput.value = '';
}
</script>
</div>

                            <!-- / Billing Address-->
                        
                            <div class="pt-5 mt-5 pb-5 border-top d-flex justify-content-md-end align-items-center">
        <button type="submit" class="btn btn-dark w-100 w-md-auto">Proceed to payment</button>

                            </div>                        </div>
                    </div>
                </div>



    <div class="col-12 col-lg-5 bg-light pt-lg-10 aside-checkout pb-5 pb-lg-0 my-5 my-lg-0">
        <div class="p-4 py-lg-0 pe-lg-0 ps-lg-5">
            <div class="pb-3">
                <!-- Cart Item-->
                <div class="row mx-0 py-4 g-0 border-bottom">
                    <div class="col-6 position-relative">
                        <picture class="d-block border">
                        <img class="img-fluid" src="images/<?php echo $img; ?>" alt="<?php echo $pname; ?>">
                        </picture>
                    </div>
                    <div class="col-5 offset-1">
                        <div>
                           <h6 class="justify-content-between d-flex align-items-start mb-2">
                            <?php echo $pname; ?>
                        </h6>
                        <span class="d-block text-muted fw-bolder text-uppercase fs-9">Size: <?php echo $size; ?> / Qty: <?php echo $quantity; ?></span>
                        </div>
                    </div>
                </div>
                <!-- / Cart Item-->
            </div>
            <div class="py-4 border-bottom">
                 <div class="d-flex justify-content-between align-items-center mb-2">
                        <p class="m-0 fw-bold fs-5">Total</p>
                <p class="m-0 fs-6 fw-bold"><?php echo ($price && $quantity) ? 'RS ' . number_format($price * $quantity, 2) : ''; ?></p>
            </div>
            
            </div>
            <div class="py-4">
                <!-- Hidden input fields for Cart Item details -->
                <input type="hidden" name="pid" value="<?php echo $pid; ?>">
                <input type="hidden" name="pname" value="<?php echo $pname; ?>">
                <input type="hidden" name="size" value="<?php echo $size; ?>">
                <input type="hidden" name="quantity" value="<?php echo $quantity; ?>">
                <!-- Hidden input field for total price -->
<input type="hidden" name="price" value="<?php echo ($price && $quantity) ? number_format($price * $quantity, 2) : ''; ?>">

                <input type="hidden" name="img" value="<?php echo $img; ?>">
                <input type="hidden" name="username" value="<?php echo $_SESSION["username"]; ?>">
                <input type="hidden" name="email" value="<?php echo $_SESSION["email"]; ?>">
                <input type="hidden" name="id" value="<?php echo $_SESSION["id"]; ?>">
            </div>

    </div>




            </div>
        </div>
        <!-- /Page Content -->
    </section>
    <!-- / Main Section-->
</form>


    <!-- Theme JS -->
    <!-- Vendor JS -->
    <script src="./assets/js/vendor.bundle.js"></script>
    
    <!-- Theme JS -->
    <script src="./assets/js/theme.bundle.js"></script>
</body>

</html>