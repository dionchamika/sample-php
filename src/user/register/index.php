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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/58f72b5be6.js" crossorigin="anonymous"></script>

  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="../../assets/images/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../../assets/images/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon/favicon-16x16.png">
  <link rel="mask-icon" href="../../assets/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">

<link
     rel="stylesheet"
     href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
   />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
 

  <!-- Vendor CSS -->
  <link rel="stylesheet" href="../../assets/css/libs.bundle.css" />

  <!-- Main CSS -->
  <link rel="stylesheet" href="../../assets/css/theme.bundle.css" />

  <!-- Fix for custom scrollbar if JS is disabled-->
  <!-- <noscript> -->
<style>
    /**
    * Reinstate scrolling for non-JS clients
    */
    .simplebar-content-wrapper {
        overflow: auto;
    }


</style>
  <!-- </noscript> -->
 <style type="text/css">
      a{text-decoration: none;}
  </style>
  <!-- Page Title -->
  <title>REGISTER - SLT Clothing</title>

</head>
<body class=" bg-light">

    <!-- Main Section-->
    <section
        class="mt-0 overflow-hidden  vh-100 d-flex justify-content-center align-items-center p-4">
        <!-- Page Content Goes Here -->

        <!-- Login Form-->
        <div class="col col-md-8 col-lg-6 col-xxl-5">
            <!-- Logo-->
           
              <!-- Logo -->
    <a class="navbar-brand fw-bold fs-3 flex-shrink-0 order-0 align-self-center justify-content-center d-flex mx-0 px-0" href="../../">
        <img src="../../assets/images/logos/re-logo.png" alt="Logo" width="100" height="50">
    </a>
    <div id="alert-container" style="position: fixed; top: 10px; right: 10px; z-index: 9999;"></div>
    <!-- / Logo -->
            <!-- / Logo-->
    <div class="shadow-xl p-4 p-lg-5 bg-white mt-5">
                <h1 class="text-center mb-5 fs-2 fw-bold">SIGNUP</h1>
               
<form id="form" method="POST">
    <div class="form-group">
        <label class="form-label" for="register-fname">Username</label>
        <input type="text" class="form-control" id="register-fname" name="username" required>
    </div>

    <div class="form-group">
        <label class="form-label" for="register-email">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>

    <div class="form-group row">
        <div class="col">
            <label class="form-label" for="phone">Mobile Number</label>
            <div class="input-group">
                <input type="tel" class="form-control w-100 phon" id="phone" name="phone" required>
            </div>
            <div class="alert alert-info" style="display: none;"></div>
        </div>

        <div class="col">
            <label class="form-label" for="gender">Gender</label>
            <select class="form-control" id="gender" name="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="form-label" for="register-password">Password</label>
        <input type="password" class="form-control" id="register-password" name="password" type="password" required pattern=".{5,}" title="Password must be at least 5 characters long" oninput="checkPasswordStrength()">
    </div>

    <button type="submit" onclick="process(event)" class="btn btn-dark d-block w-100 my-4">Sign Up</button>
</form>


                  <p class="d-block text-center text-muted pb-5">Already registered?<u> <a class="text-muted" href="../login/">Login here.</a></u></p>
            </div>

        </div>
        <!-- / Login Form-->

        <!-- /Page Content -->
    </section>
    <!-- / Main Section-->
<script type="text/javascript">
   


    const phoneInputField = document.querySelector("#phone");
    const phoneInput = window.intlTelInput(phoneInputField, {
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });

    phoneInput.setCountry("LK");

    const info = document.querySelector(".alert-info");

   function process(event) {
        event.preventDefault();

        const phoneNumberInput = document.getElementById('phone');
        const phoneNumber = phoneInput.getNumber();

        info.style.display = "none";
        info.innerHTML = "";

        if (phoneInput.isValidNumber()) {
            console.log("Valid Phone Number:", phoneNumber);

            submitForm();
        } else {
            console.error("Invalid Phone Number:", phoneNumber);
        }
    }

    function submitForm() {
        const form = document.getElementById('form');
        const formData = new FormData(form);

        fetch('sql/', {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showAlert('success', 'You have successfully registered ! Please log in.');
            } else {
                showAlert('danger', 'Error! Please register again.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }

    function showAlert(type, message) {
        const alertElement = document.createElement('div');
        alertElement.className = `alert alert-${type} alert-dismissible fade show`;
        alertElement.innerHTML = `
            ${message}
     
        `;

        document.body.appendChild(alertElement);
    }

    function getIp(callback) {
        fetch('https://ipinfo.io/json?token=b2151f664c9d58', { headers: { 'Accept': 'application/json' } })
            .then((resp) => resp.json())
            .catch(() => {
                return {
                    country: 'us',
                };
            })
            .then((resp) => callback(resp.country));
    }
     function showAlert(type, message) {
        const alertContainer = document.getElementById('alert-container');

        const alertElement = document.createElement('div');
        alertElement.className = `alert alert-${type} alert-dismissible fade show`;
        alertElement.innerHTML = `
            ${message}
        
        `;

        alertContainer.appendChild(alertElement);
    }
    function showAlert(type, message) {
    const alertContainer = document.getElementById('alert-container');

    const alertElement = document.createElement('div');
    alertElement.className = `alert alert-${type} alert-dismissible fade show`;
    alertElement.innerHTML = `
        ${message}

    `;

    alertContainer.appendChild(alertElement);

setTimeout(() => {
        alertElement.remove();

        if (type === 'success') {
            window.location.href = '../login/';
        }
    }, 4000);
}

</script>
<div class="mt-5">
<?php include '../../lib/footer.php';?>
</div>

    <!-- Theme JS -->
    <!-- Vendor JS -->
    <script src="../../assets/js/vendor.bundle.js"></script>
    
    <!-- Theme JS -->
    <script src="../../assets/js/theme.bundle.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>