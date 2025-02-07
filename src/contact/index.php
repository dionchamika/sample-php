<?php
session_start();
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
    <script src="https://kit.fontawesome.com/58f72b5be6.js" crossorigin="anonymous"></script>


  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="./assets/images/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="./assets/images/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/favicon/favicon-16x16.png">
  <link rel="mask-icon" href="./assets/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">

  <!-- Vendor CSS -->
  <link rel="stylesheet" href="../assets/css/libs.bundle.css" />

  <!-- Main CSS -->
  <link rel="stylesheet" href="../assets/css/theme.bundle.css" />
 
  <!-- WhatsApp details popup -->
  <link rel="stylesheet" href="../assets/css/whatsapp.css" />


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

    .ftco-section {
  padding: 2em 0; }

.ftco-no-pt {
  padding-top: 0; }

.ftco-no-pb {
  padding-bottom: 0; }

.heading-section {
  font-size: 28px;
  color: #000; }

.img {
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center center; }

.form-control {
  height: 36px;
  background: #fff;
  color: rgba(0, 0, 0, 0.8);
  font-size: 14px;
  border-radius: 2px;
  -webkit-box-shadow: none !important;
  box-shadow: none !important;
  border: 1px solid rgba(0, 0, 0, 0.1); }
  .form-control::-webkit-input-placeholder {
    /* Chrome/Opera/Safari */
    color: rgba(0, 0, 0, 0.3) !important; }
  .form-control::-moz-placeholder {
    /* Firefox 19+ */
    color: rgba(0, 0, 0, 0.3) !important; }
  .form-control:-ms-input-placeholder {
    /* IE 0+ */
    color: rgba(0, 0, 0, 0.3) !important; }
  .form-control:-moz-placeholder {
    /* Firefox 18- */
    color: rgba(0, 0, 0, 0.3) !important; }
  .form-control:focus, .form-control:active {
    border-color: #34489f !important; }

textarea.form-control {
  height: inherit !important; }

.wrapper {
  width: 100%;
  -webkit-box-shadow: 0px 21px 20px -13px rgba(0, 0, 0, 0.1);
  -moz-box-shadow: 0px 21px 20px -13px rgba(0, 0, 0, 0.1);
  box-shadow: 0px 14px 21px -13px rgba(0, 0, 0, 0.1); }

.contact-wrap {
  background: #fff; }

.info-wrap {
  color: rgba(255, 255, 255, 0.8); }
  .info-wrap h3 {
    color: #fff; }
  .info-wrap .dbox {
    width: 100%;
    color: rgba(255, 255, 255, 0.8);
    margin-bottom: 25px; }
    .info-wrap .dbox:last-child {
      margin-bottom: 0; }
    .info-wrap .dbox p {
      margin-bottom: 0; }
      .info-wrap .dbox p span {
        font-weight: 500;
        color: #fff; }
      .info-wrap .dbox p a {
        color: #fff; }
    .info-wrap .dbox .icon {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      border: 2px solid rgba(255, 255, 255, 0.2); }
      .info-wrap .dbox .icon span {
        font-size: 20px;
        color: #fff; }
    .info-wrap .dbox .text {
      width: calc(100% - 50px); }

.btn {
  padding: 12px 16px;
  cursor: pointer;
  border-width: 1px;
  border-radius: 5px;
  font-size: 14px;
  font-weight: 400;
  -webkit-box-shadow: 0px 10px 20px -6px rgba(0, 0, 0, 0.12);
  -moz-box-shadow: 0px 10px 20px -6px rgba(0, 0, 0, 0.12);
  box-shadow: 0px 10px 20px -6px rgba(0, 0, 0, 0.12);
  position: relative;
  margin-bottom: 20px;
  -webkit-transition: 0.3s;
  -o-transition: 0.3s;
  transition: 0.3s; }
  @media (prefers-reduced-motion: reduce) {
    .btn {
      -webkit-transition: none;
      -o-transition: none;
      transition: none; } }
  .btn:hover, .btn:active, .btn:focus {
    outline: none !important;
    -webkit-box-shadow: 0px 10px 20px -6px rgba(0, 0, 0, 0.22) !important;
    -moz-box-shadow: 0px 10px 20px -6px rgba(0, 0, 0, 0.22) !important;
    box-shadow: 0px 10px 20px -6px rgba(0, 0, 0, 0.22) !important; }
  .btn.btn-primary {
    background: #34489f !important;
    border-color: #34489f !important;
    color: #fff; }
    .btn.btn-primary:hover, .btn.btn-primary:focus {
      border-color: #019f6c !important;
      background: #019f6c !important; }

.contactForm .label {
  color: #000;
  text-transform: uppercase;
  font-size: 12px;
  font-weight: 600; }

.contactForm .form-control {
  border: none;
  border-bottom: 1px solid rgba(0, 0, 0, 0.1);
  padding: 0; }

#contactForm .error {
  color: red;
  font-size: 12px; }

#contactForm .form-control {
  font-size: 16px; }

#message {
  resize: vertical; }

#form-message-warning, #form-message-success {
  display: none; }

#form-message-warning {
  color: red; }

#form-message-success {
  color: #28a745;
  font-size: 18px;
  font-weight: bold; }

.submitting {
  float: left;
  width: 100%;
  padding: 10px 0;
  display: none;
  font-size: 16px;
  font-weight: bold; }


  </style>

  <!-- Page Title -->
  <title>CONTACT - SLT Clothing</title>

</head>
<body>



    <!-- Navbar -->
 <?php include 'nav.php';?>  
 <?php include '../lib/style.php';?>

<?php include '../lib/whasapp.php';?>
 
    <!-- / Navbar-->   

    <!-- Main Section-->
    <section class="mt-0 overflow-hidden ">
        <!-- Page Content Goes Here -->

        <!-- / Top banner -->
        <section class="vh-75 vh-lg-60 container-fluid rounded overflow-hidden" data-aos="fade-in">
           
            <!-- Swiper Info -->
          
<div class="d-flex justify-content-between items-center pt-2 flex-column flex-lg-row">
                    <div>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><u><a href="../">Home</a></u></li>
                              <li class="breadcrumb-item active"><a href="../contact/">Contact</a></li>
                            </ol>
                        </nav>       
                    </div>
                    
                </div> 

<!-- Slide-->
<div class="swiper-slide position-relative h-100 w-100">
    <div class=".w-100.h-100.overflow-hidden.position-absolute.z-index-1.top-0.start-0.end-0.bottom-0 {
    pointer-events: auto;
}">
      <div class="w-100 h-100 bg-img-cover bg-pos-center-center overflow-hidden">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.1722109616435!2d79.87319207499598!3d6.869957993128714!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25a4cde693a73%3A0x1473bb350a16a65a!2sBernards%20Head%20Office!5e0!3m2!1sen!2slk!4v1707388382137!5m2!1sen!2slk" width="100%" height="550" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
         </div>
    </div>
  </div>
  <!-- /Slide-->
                   </section>
<section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section text-muted">Send your enquiry</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="wrapper">
                        <div class="row no-gutters">
                            <div class="col-lg-8 col-md-7 order-md-last d-flex align-items-stretch">
                                <div class="contact-wrap w-100 p-md-5 p-4">
                                    <div id="form-message-warning" class="mb-4"></div> 
                            <div id="form-message-success" class="mb-4">
                            Your message was sent, thank you!
                            </div>
                                    <form method="POST" id="contactForm" name="contactForm" class="contactForm">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="name">Full Name</label>
                                                    <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="col-md-6"> 
                                                <div class="form-group">
                                                    <label class="label" for="email">Email Address</label>
                                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="label" for="subject">Subject</label>
                                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="label" for="#">Message</label>
                                                    <textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Message"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="submit" value="Send Message" class="btn btn-primary">
                                                    <div class="submitting"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-5 d-flex align-items-stretch">
                                <div class="info-wrap bg-light w-100 p-md-5 p-4">
  <a class="navbar-brand fw-bold fs-3 flex-shrink-0 order-0 align-self-center justify-content-center d-flex mx-0 px-0" href="../">
                    <img src="../assets/images/logos/f-logo.png" alt="Logo" width="100" height="50">
                </a>                                    
                            <div class="dbox w-100 d-flex align-items-start">
                                <div class="icon d-flex align-items-center justify-content-center text-dark">
                                    <span class="fa fa-map-marker" style="color: #000000;"></span>
                                </div>
                                <div class="text pl-3 text-dark">
                                <p><span class="text-dark"></span>  Address</p>
                              </div>
                          </div>
                            <div class="dbox w-100 d-flex align-items-center">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <span class="fa fa-phone"  style="color: #000000;"></span>
                                </div>
                                <div class="text pl-3 text-dark">
                                <p><span class="text-dark">Phone:</span> <a href="tel://+94" class="text-dark">+94 123 456 789</a></p>

                              </div>
                          </div>
                            <div class="dbox w-100 d-flex align-items-center">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <span class="fa fa-paper-plane"  style="color: #000000;"></span>
                                </div>
                                <div class="text pl-3">
                                <p><span class="text-dark"></span> <a href="mailto: sample@email.com" class="text-dark"> sample@email.com</a></p>
                              </div>
                          </div>
                            <div class="dbox w-100 d-flex align-items-center">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <span class="fa fa-globe" style="color: #000000;"></span>
                                </div>
                                <div class="text pl-3">
                                <p><span class="text-dark"></span> <a href="https://www.bernardsceylon.com/" class="text-dark"> sample.com</a></p>
                              </div>
                          </div>
                      </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<script type="text/javascript">
    (function($) {

    "use strict";


  // Form
    var contactForm = function() {
        if ($('#contactForm').length > 0 ) {
            $( "#contactForm" ).validate( {
                rules: {
                    name: "required",
                    subject: "required",
                    email: {
                        required: true,
                        email: true
                    },
                    message: {
                        required: true,
                        minlength: 5
                    }
                },
                messages: {
                    name: "Please enter your name",
                    subject: "Please enter your subject",
                    email: "Please enter a valid email address",
                    message: "Please enter a message"
                },
                /* submit via ajax */
                
                submitHandler: function(form) {     
                    var $submit = $('.submitting'),
                        waitText = 'Submitting...';

                    $.ajax({    
                      type: "POST",
                      url: "sendemail.php",
                      data: $(form).serialize(),

                      beforeSend: function() { 
                        $submit.css('display', 'block').text(waitText);
                      },
                      success: function(msg) {
                       if (msg == 'OK') {
                        $('#form-message-warning').hide();
                            setTimeout(function(){
                            $('#contactForm').fadeIn();
                        }, 1000);
                            setTimeout(function(){
                               $('#form-message-success').fadeIn();   
                        }, 1400);

                        setTimeout(function(){
                               $('#form-message-success').fadeOut();   
                        }, 8000);

                        setTimeout(function(){
                               $submit.css('display', 'none').text(waitText);  
                        }, 1400);

                        setTimeout(function(){
                            $( '#contactForm' ).each(function(){
                                                this.reset();
                                            });
                        }, 1400);
                           
                        } else {
                           $('#form-message-warning').html(msg);
                            $('#form-message-warning').fadeIn();
                            $submit.css('display', 'none');
                        }
                      },
                      error: function() {
                        $('#form-message-warning').html("Something went wrong. Please try again.");
                         $('#form-message-warning').fadeIn();
                         $submit.css('display', 'none');
                      }
                  });           
                } // end submitHandler

            });
        }
    };
    contactForm();

})(jQuery);

</script>
    <!-- Footer -->
    <?php include 'footer.php';?>

    <!-- / Footer-->


    <!-- Theme JS -->
    <!-- Vendor JS -->
    <script src="../assets/js/vendor.bundle.js"></script>
    
    <!-- Theme JS -->
    <script src="../assets/js/theme.bundle.js"></script>

      <!-- Link to your WhatsApp.js file -->
    <!-- <script src="../assets/js/whatsapp.js"></script> -->
</body>

</html>