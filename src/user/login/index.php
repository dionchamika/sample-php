
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
  <link rel="apple-touch-icon" sizes="180x180" href="../../assets/images/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../../assets/images/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon/favicon-16x16.png">
  <link rel="mask-icon" href="../../assets/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">

  <!-- Vendor CSS -->
  <link rel="stylesheet" href="../../assets/css/libs.bundle.css" />

  <!-- Main CSS -->
  <link rel="stylesheet" href="../../assets/css/theme.bundle.css" />

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
  <style type="text/css">
      a{text-decoration: none;}
        .form-check-input {
        border-color: #343a40; /* Set the border color to your desired dark color */
    }

    .form-check-input:checked {
        border-color: #343a40; /* Set the border color for the checked state */
    }
  </style>

  <!-- Page Title -->
  <title>LOGIN - SLT Clothing</title>

</head>
<body class=" bg-light">

    <!-- Main Section-->
    <section
        class="mt-0 overflow-hidden  vh-100 d-flex justify-content-center align-items-center p-4">
        <!-- Page Content Goes Here -->

        <!-- Login Form-->
        <div class="col col-md-8 col-lg-6 col-xxl-5">
            <!-- Logo-->
            <a class="navbar-brand fw-bold fs-3 flex-shrink-0 order-0 align-self-center justify-content-center d-flex mx-0 px-0" href="../../">
                <div class="d-flex align-items-center">
                           <img src="../../assets/images/logos/re-logo.png" alt="Logo" width="100" height="50">

                </div>
            </a>
            <!-- / Logo-->
            <div class="shadow-xl p-4 p-lg-5 bg-white">
                <h1 class="text-center fw-bold mb-5 fs-2">Login</h1>
               
                <form action="sql/login.php" method="POST">
                    <div class="form-group">
                      <label class="form-label" for="login-email">Email address</label>
                      <input type="email" class="form-control" id="login-email" name="email" placeholder="name@email.com">
                    </div>
                    <div class="form-group">
                      <label for="login-password" class="form-label d-flex justify-content-between align-items-center">
                        Password
                      </label>
                      <input type="password" class="form-control" id="login-password" name="password" placeholder="Enter your password">
                    </div>
                    <div class="form-check">
                <input type="checkbox" class="form-check-input" id="remember-me" name="remember">
                <label class="form-check-label" for="remember-me">Remember Me</label>
            </div>
                    <button type="submit" class="btn btn-dark d-block w-100 my-4">Login</button>
                </form>
                <p class="d-block text-center text-muted">New customer?<u> <a class="text-muted" href="../register/">Sign up for an account</a></u></p>
            </div>

        </div>
        <!-- / Login Form-->

        <!-- /Page Content -->
    </section>
    <!-- / Main Section-->

<div class="mt-5">
<?php include '../../lib/footer.php';?>
</div>
    <!-- Theme JS -->
    <!-- Vendor JS -->
    <script src="../../assets/js/vendor.bundle.js"></script>
    
    <!-- Theme JS -->
    <script src="../../assets/js/theme.bundle.js"></script>
</body>

</html>

