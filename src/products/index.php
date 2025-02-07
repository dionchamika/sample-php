<?php
include '../lib/db_con.php';

session_start();

if (!isset($_SESSION["id"])) {
    if (isset($_COOKIE["remember_token"])) {
        $token = $_COOKIE["remember_token"];
        $sql = "SELECT id, username FROM `user` WHERE remember_token='$token'";
        $result = $conn->query($sql);

        if ($result === false) {
            die("Error in SQL query: " . $conn->error);
        }

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION["id"] = $row["id"];
            $_SESSION["username"] = $row["username"];

            $newToken = bin2hex(random_bytes(32));
            $updateTokenSql = "UPDATE `user` SET remember_token='$newToken' WHERE id={$row['id']}";
            if ($conn->query($updateTokenSql) === false) {
                die("Error updating remember_token: " . $conn->error);
            }

            setcookie("remember_token", $newToken, time() + (86400 * 7), "/"); // 7 days

            header('Location: ../products/');
            exit();
        } else {
             "No user found with remember_token: $token";
        }
    } else {
         "No remember_token found in cookies";
    }
}

if (isset($_GET['pid'])) {
    $productId = filter_var($_GET['pid'], FILTER_VALIDATE_INT);

    if ($productId === false || $productId <= 0) {
        header("HTTP/1.0 404 Not Found");
        include('../404.php');
        exit();
    }

    $query = "SELECT * FROM products WHERE pid = $productId";
    $result = $conn->query($query);

    if (!$result || $result->num_rows === 0) {
        header("HTTP/1.0 404 Not Found");
        include('../404.php');
        exit();
    }
} else {
    // Handle the case when 'pid' is not set
    header("HTTP/1.0 404 Not Found");
    include('../404.php');
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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Main CSS -->
  <link rel="stylesheet" href="../assets/css/theme.bundle.css" />
<!-- Font Awesome 5.15.1 CSS -->
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css'>
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
    .product-image {
        width: 100%; 
        height: 600px;
/*        object-fit: ;*/


    }

@media (max-width: 768px) {
    .product-image {
        height: 500px; 
    }
}

@media (max-width: 576px) {
    .product-image {
        height: 330px; 
    }
}
.ind{
    z-index: 999 !important;
}
.alert{
    background-color: blue;color: #fff;
}
.custom-alert {
    position: fixed;
     top: 10px;
     right: 10px;
     padding: 10px;
     border-radius: 5px;
     color: #fff;
     font-size: 18px;
     z-index: 999 !important;
 }

 .alert-danger {
     background-color: #203d9a; /* Red background for danger */
 }

 .alert-warning {
     background-color: #203d9a; /* Yellow background for warning */
 }
 .text-muted li {
    background-color: transparent !important;
}


#fb-share-button-container {
    display: flex;
    justify-content: flex-end;  /* Align to the right */
}

#fb-share-button {
    background: #3b5998;
    border-radius: 3px;
    font-weight: 600;
    padding: 5px 8px;
    display: inline-block;
}

#fb-share-button:hover {
    cursor: pointer;
    background: #213A6F;
}

#fb-share-button svg {
    width: 18px;
    fill: white;
    vertical-align: middle;
    border-radius: 2px;
}

#fb-share-button span {
    vertical-align: middle;
    color: white;
    font-size: 14px;
    padding: 0 3px;
}

</style>
  <!-- Page Title -->
  <title>SLT Clothing</title>

</head>
<body>

    <!-- Navbar -->
         <?php include 'nav.php';?> 

    <!-- / Navbar-->    <!-- / Navbar-->
<?php
$pid = $_REQUEST["pid"];

$sqlUpdateViewCount = "UPDATE products SET view_count = view_count + 1 WHERE pid = '$pid'";
$conn->query($sqlUpdateViewCount);

$sql = "SELECT * FROM products  WHERE pid='$pid'";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {?>
    <!-- Main Section-->
    <section class="mt-0 container-fluid">
        <!-- Page Content Goes Here -->

        <!-- Breadcrumbs-->
        <div class="py-2">
            <div class="ms-2">
                <nav class="m-0" aria-label="breadcrumb">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item breadcrumb-dark"><a href="../">Home</a></li>
                        <li class="breadcrumb-item  breadcrumb-dark active" aria-current="page"><?php echo $row["pname"]; ?></li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- / Breadcrumbs-->

        <div class="container-fluid mt-5">
            <!-- Product Top Section-->
            <div class="row">
                <!-- Product Images--><h1 class="mb-1 mt-4 fs-2 fw-bold"><?php echo $row["pname"]; ?><hr></h1>
                <div class="col-12 col-md-6 col-xl-7">
                    <div class="row g-3" data-aos="fade-right">
                        <div class="col-12">

                            <picture>
                                <img class="img-fluid product-image rounded" data-zoomable src="../images/<?php echo $row["img"]; ?>" alt="<?php echo $row["pname"]; ?>">
                            </picture>
                        </div>
                    </div>
                </div>
                <!-- /Product Images-->

                <!-- Product Information-->
                <div class="col-12 col-md-6 col-lg-5">                        

                    <div class="sticky-top top-5 mt-1">
                        <div class="pb-1" data-aos="fade-in">

                            <div class="d-flex justify-content-between align-items-center">

                                <p class="fs-4 m-0 m-1 mb-2 text-danger fw-bold ms-3 py-1">RS.<?php echo number_format($row["price"]); ?></p>
                            </div><hr>
                            <ul class="text-muted">
     <?php if ($row["pname"]) : ?>
        <li class="mt-1">Product : <?php echo $row["pname"]; ?></li>
    <?php endif; ?>

    <?php if ($row["Brand"]) : ?>
        <li class="mt-1">Brand : <?php echo $row["Brand"]; ?></li>
    <?php endif; ?>

    <?php if ($row["Style"]) : ?>
        <li class="mt-1">Style : <?php echo $row["Style"]; ?></li>
    <?php endif; ?>

    <?php if ($row["Colour"]) : ?>
        <li class="mt-1">Colour : <?php echo $row["Colour"]; ?></li>
    <?php endif; ?>

    <?php if ($row["Material"]) : ?>
        <li class="mt-1">Material : <?php echo $row["Material"]; ?></li>
    <?php endif; ?>

    <?php if ($row["Thickness"]) : ?>
        <li class="mt-1">Thickness : <?php echo $row["Thickness"] . ' GSM'; ?></li>
    <?php endif; ?>
    <li class="mt-1">Payment Options : Cash on Delivery.</li>
    <li class="mt-1">A Genuine Product. Made in Sri Lanka.</li>
    <?php
echo '<div class="d-flex align-items-center mt-3"  style="margin-left: -20px; font-size: 13px;">';
    echo '<i class="ri-eye-line me-2"></i>';
    echo '<span class="text-muted">Views: ' . $row['view_count'] . '</span>';
    echo '</div>';
    ?>
</ul>

                            <div class="border-top mt-4 mb-3 product-option">
                                <small class="text-uppercase pt-4 d-block fw-bolder">
                                    <span class="text-muted">Select Size </span> : <span class="selected-option fw-bold" data-pixr-product-option="size"></span>
                                </small>
                                <div class="mt-4 d-flex justify-content-start flex-wrap align-items-start">
                                    <?php
                                    $sizes = explode(",", $row["sizes"]);
                                    foreach ($sizes as $size) {
                                    ?>
                                        <div class="form-check-option form-check-rounded">
                                            <input type="radio" name="product-option-sizes" value="<?php echo $size; ?>" id="option-sizes-<?php echo $size; ?>" <?php echo ($size === "M") ? 'checked' : ''; ?> required>
                                            <label for="option-sizes-<?php echo $size; ?>">
                                                <small><?php echo $size; ?></small>
                                            </label>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div class="form-group me-3">
                                    <label for="quantity" class="form-label">Quantity:</label>
                                    <input type="number" class="form-control" id="quantity" name="quantity" value="1" min="1" <?php echo ($row["quantity"] === 0) ? 'disabled' : ''; ?>>
                                </div>
                                <small class="text-muted">
                                    <?php
                                    if ($row["quantity"] > 0) {
                                        echo $row["quantity"] . ' Items Left';
                                    } else {
                                        echo 'Out of Stock';
                                    }
                                    ?>
                                </small>
                            </div>
                            <input type="hidden" name="pid" value="<?php echo $row["pid"]; ?>">
                            <input type="hidden" name="img" value="<?php echo $row["img"]; ?>">
                            <input type="hidden" name="price" value="<?php echo $row["price"]; ?>">
                            <input type="hidden" name="selected_quantity" value="<?php echo $quantity; ?>">
                            <!-- Append the input fields to the form -->
                            <button class="btn btn-dark w-100 mt-4 mb-0 hover-lift-sm hover-boxshadow rounded" onclick="buyNow(<?php echo $row['quantity']; ?>, <?php echo $row['price']; ?>)" <?php echo ($row["quantity"] === 0) ? 'disabled' : ''; ?>>
    Buy Now
</button>


                        <!-- </div> -->
                    </div>
                <!-- </div> -->
            <!-- </div> -->
        <!-- </div> -->



<script>
    function showAlert(message, styleClass) {
    Swal.fire({
        title: message,
        icon: 'error',
        confirmButtonText: 'OK'
    });
}


function buyNow(availableQuantity, productPrice) {
    var selectedSize = document.querySelector('input[name="product-option-sizes"]:checked');
    var quantityInput = document.getElementById('quantity');
    var selectedQuantity = quantityInput.value;

    if (!selectedSize) {
        Swal.fire({
            title: 'Please select a size.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    if (parseInt(selectedQuantity) > parseInt(availableQuantity)) {
        Swal.fire({
            title: 'Quantity exceeds available stock.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }
    <?php $_SESSION['redirect_url'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>

  document.querySelector('input[name="selected_quantity"]').value = selectedQuantity;
document.querySelector('input[name="price"]').value = productPrice;

<?php if (!isset($_SESSION["id"])) { ?>
  Swal.fire({
        title: 'Login Required',

    text: 'Please log in to purchase the product.',
        icon: 'error',
  footer: '<u><a href="../user/login/">Click here</u> to login</a>'
});
        <?php } else { ?>
            <?php if ($row["quantity"] > 0) { ?>
                var form = document.createElement('form');
                form.method = 'POST';
                form.action = '../checkout.php';

                var productNameInput = document.createElement('input');
                productNameInput.type = 'hidden';
                productNameInput.name = 'pname';
                productNameInput.value = '<?php echo $row["pname"]; ?>';
                form.appendChild(productNameInput);

                var productSizeInput = document.createElement('input');
                productSizeInput.type = 'hidden';
                productSizeInput.name = 'size';
                productSizeInput.value = selectedSize.value;
                form.appendChild(productSizeInput);

                var uidInput = document.createElement('input');
                uidInput.type = 'hidden';
                uidInput.name = 'id';
                uidInput.value = '<?php echo $_SESSION["id"]; ?>';
                form.appendChild(uidInput);

                var pidInput = document.createElement('input');
                pidInput.type = 'hidden';
                pidInput.name = 'pid';
                pidInput.value = '<?php echo $row["pid"]; ?>';
                form.appendChild(pidInput);

                var imageInput = document.createElement('input');
                imageInput.type = 'hidden';
                imageInput.name = 'img';
                imageInput.value = '<?php echo $row["img"]; ?>';
                form.appendChild(imageInput);

                var sizeInput = document.createElement('input');
                sizeInput.type = 'hidden';
                sizeInput.name = 'size';
                sizeInput.value = selectedSize.value;
                form.appendChild(sizeInput);

                var quantityInput = document.createElement('input');
                quantityInput.type = 'hidden';
                quantityInput.name = 'quantity';
                quantityInput.value = selectedQuantity;
                form.appendChild(quantityInput);

                var priceInput = document.createElement('input');
                priceInput.type = 'hidden';
                priceInput.name = 'price';
                priceInput.value = productPrice;
                form.appendChild(priceInput);


                document.body.appendChild(form);
                form.submit();
            <?php } ?>
        <?php } ?>
    }



</script>








                            <!-- Product Highlights-->
                                <div class="my-5">
                                    <div class="row">
                                        <div class="col-12 col-md-4">
                                            <div class="text-center px-2">
                                                <i class="ri-24-hours-line ri-2x"></i>
                                                <small class="d-block mt-1">Next-day Delivery</small>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="text-center px-2">
                                                <i class="ri-secure-payment-line ri-2x"></i>
                                                <small class="d-block mt-1">Secure Checkout</small>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="text-center px-2">
                                                <i class="ri-service-line ri-2x"></i>
                                                <small class="d-block mt-1">Free Returns</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- / Product Highlights-->
                        
                            <!-- Product Accordion -->
                            <div class="accordion" id="accordionProduct">
                                <div class="accordion-item">
                                  <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                      Product Details
                                    </button>
                                  </h2>
                                  <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionProduct">
                                    <div class="accordion-body">
                                        <p class="m-0"><?php echo $row["description"]; ?>.</p>
                                    </div>
                                  </div>
                                </div>
<!--                                 <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Details & Care
                                      </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionProduct">
                                      <div class="accordion-body">
                                          <ul class="list-group list-group-flush">
                                              <li class="list-group-item d-flex border-0 row g-0 px-0">
                                                  <span class="col-4 fw-bolder">Composition</span>
                                                  <span class="col-7 offset-1">98% Cotton, 2% elastane</span>
                                              </li>
                                              <li class="list-group-item d-flex border-0 row g-0 px-0">
                                                  <span class="col-4 fw-bolder">Care</span>
                                                  <span class="col-7 offset-1">Professional dry clean only. Do not bleach. Do not iron.</span>
                                              </li>
                                          </ul>
                                      </div>
                                    </div>
                                  </div>  -->       
                                <div class="accordion-item">
                                  <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                      Delivery & Returns
                                    </button>
                                  </h2>
                                  <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionProduct">
                                    <div class="accordion-body">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item d-flex border-0 row g-0 px-0">
                                                <span class="col-4 fw-bolder">Delivery</span>
                                                <span class="col-7 offset-1">Standard delivery free for orders over $99. Next day delivery $9.99</span>
                                            </li>
                                            <li class="list-group-item d-flex border-0 row g-0 px-0">
                                                <span class="col-4 fw-bolder">Returns</span>
                                                <span class="col-7 offset-1">30 day return period. See our <a class="text-link-border" href="#">terms & conditions.</a></span>
                                            </li>
                                        </ul>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <!-- / Product Accordion-->
                        </div>                    </div>
                </div>
</div>




                <!-- / Product Information-->
            </div>
            <!-- / Product Top Section-->


            <!-- Featured Categories-->
<div class="row g-0 container">
    <!-- Related Products -->
    <div class="col-12" data-aos="fade-up">
        <h3 class="fs-4 fw-bolder mt-7 mb-4">You May Also Like</h3>
        <!-- Swiper Latest -->
        <div class="swiper-container" data-swiper data-options='{
            "spaceBetween": 20,
            "loop": false,
            "autoplay": {
                "delay": 5000,
                "disableOnInteraction": false
            },
            "navigation": {
                "nextEl": ".swiper-next",
                "prevEl": ".swiper-prev"
            },
            "breakpoints": {
                "600": {
                    "slidesPerView": 2
                },
                "1024": {
                    "slidesPerView": 3
                },
                "1400": {
                    "slidesPerView": 4
                }
            }
        }'>
            <div class="swiper-wrapper">
                <?php
                $sql = "SELECT * FROM products ORDER BY PID DESC LIMIT 10";
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()) {
                     $isOutOfStock = $row["quantity"] == 0;
                ?>
                    <div class="swiper-slide">
                        <!-- Card Product -->
                        <div class="card border border-transparent position-relative overflow-hidden h-100 transparent">
                            <div class="card-img position-relative">
    <?php if ($isOutOfStock) : ?>
                        <div class="card-badges">
                            <span class="badge badge-card"><span class="f-w-2 f-h-2 bg-danger rounded-circle d-block me-1"></span> Out of Stock</span>
                        </div>
                    <?php else : ?>
                        <div class="card-badges">
                            <span class="badge badge-card"><span class="f-w-2 f-h-2 bg-success rounded-circle d-block me-1"></span> In Stock</span>
                        </div>
                    <?php endif; ?>
                                <span class="position-absolute top-0 end-0 p-2 z-index-20 text-muted"><i class="ri-heart-line"></i></span>
                                <picture class="position-relative overflow-hidden d-block bg-light .custom-image">
                                    <img class="w-100 img-fluid position-relative z-index-10" title="" src="../images/<?php echo $row["img"]; ?>" alt="<?php echo $row["pname"]; ?>" style="height: 300px;object-fit: cover; ">
                                </picture>
                                <div class="position-absolute start-0 bottom-0 end-0 z-index-20 p-2">
                                    <button class="btn btn-quick-add"><i class="ri-add-line me-2"></i> QUICK VIEW</button>
                                </div>

                            </div>
                            <div class="card-body px-0">
                                <a class="text-decoration-none link-cover" href="../products/?pid=<?php echo $row["pid"]; ?>"><?php echo $row["pname"]; ?></a>
                                <p class="mt-2 mb-0 small"><span class="text-dark">RS.<?php echo number_format($row["price"]); ?></span></p>
                            </div>
                        </div>
                        <!--/ Card Product -->
                    </div>
                <?php
                }
                ?>
            </div>
            <!-- Add Arrows -->
            <div class="swiper-prev top-50 start-0 z-index-30 cursor-pointer transition-all bg-white px-3 py-4 position-absolute z-index-30 top-50 start-0 mt-n8 d-flex justify-content-center align-items-center opacity-50-hover">
                <i class="ri-arrow-left-s-line ri-lg"></i>
            </div>
            <div class="swiper-next top-50 end-0 z-index-30 cursor-pointer transition-all bg-white px-3 py-4 position-absolute z-index-30 top-50 end-0 mt-n8 d-flex justify-content-center align-items-center opacity-50-hover">
                <i class="ri-arrow-right-s-line ri-lg"></i>
            </div>
        </div>
        <!-- / Swiper Latest -->
    </div>
    <!-- / Related Products -->
</div>

            <!-- /Featured Categories-->

            
        </div>

        <!-- /Page Content -->
    </section>
    <!-- / Main Section-->
<?php } ?>
<?php include 'footer.php';?>    <!-- / Footer-->


    <!-- Theme JS -->
    <!-- Vendor JS -->
    <script src="../assets/js/vendor.bundle.js"></script>
    
    <!-- Theme JS -->
    <script src="../assets/js/theme.bundle.js"></script>
</body>

</html>
