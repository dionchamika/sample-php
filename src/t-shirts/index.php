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

            header('Location: ../t-shirts/');
            exit();
        } else {
             "No user found with remember_token: $token";
        }
    } else {
         "No remember_token found in cookies";
    }
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
  <link rel="mask-icon" href="../assets/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">

  <!-- Vendor CSS -->
  <link rel="stylesheet" href="../assets/css/libs.bundle.css" />

  <!-- Main CSS -->
  <link rel="stylesheet" href="../assets/css/theme.bundle.css" />

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
      a {text-decoration: none !important; }
/*        body {user-select: none;}*/
.product-image {
        width: 100%; 
        height: 320px;
        object-fit: cover;

    }
     .search-result-item {
    display: flex;
    margin-bottom: 10px;
}

.image-container {
    width: 100px; /* Set a fixed width */
    height: 100px; /* Set a fixed height */
    overflow: hidden;
}

.image-container img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Maintain aspect ratio and cover container */
}

.product-details {
    margin-left: 10px; /* Adjust margin between image and details */
}
    </style>

  <!-- Page Title -->
  <title>T SHIRTS - SLT Clothing</title>

</head>
<body>
     <?php include 'nav.php';?> 
      <?php include '../lib/style.php';?>

<?php include '../lib/whasapp.php';?>

<!-- / Navbar--> <div class="container-fluid" data-aos="fade-in">
                        <div class="d-flex justify-content-between items-center pt-2 flex-column flex-lg-row">
                    <div>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><u><a href="../">Home</a></u></li>
                              <li class="breadcrumb-item active"><a href="../t-shirts/">T-SHIRTS</a></li>
                            </ol>
                        </nav>       
                    </div>
                </div>
                  </div>  
    <!-- Main Section-->
    <section class="mt-0 " data-aos="fade-in">
        <!-- Page Content Goes Here -->
        
        <!-- Category Top Banner -->
        <div class="py-10 bg-img-cover bg-overlay-dark position-relative overflow-hidden bg-pos-center-center rounded-0"
            style="background-image: url(https://www.brandedimage.com/wp-content/uploads/2016/10/black-tshirt-banner.jpeg); ">
            <div class="container-fluid position-relative z-index-20" data-aos="fade-right" data-aos-delay="300">
                <h1 class="fw-bold display-6 mb-4  text-outline-light" style="font-size: 50px;">T-Shirts</h1>
                <div class="col-12 col-md-6">
                    <p class="text-white mb-0 fs-5">
                        You may have heard the phrase “look like a team, play like a team”. Our customised T-shirts can help you do exactly that!
                    </p>

                </div>
            </div>
        </div>
        <!-- Category Top Banner -->
<div class="container text-center text-muted py-3 mt-3" data-aos="fade-in">
    <h5>
        At Bernards, we have been creating customised T-shirts for universities, corporates, promotional events and workwear uniforms for over 70 years. Made from the highest quality fabrics using the best embroidery machines, we give you the option of customising every detail of your garment – starting from the collar to the slit!
    </h5>
</div>
        <div class="container-fluid" data-aos="fade-in">
            <!-- Category Toolbar-->
                <div class="d-flex justify-content-between items-center pt-5 pb-4 flex-column flex-lg-row">
                    <div>
                        
                           
                    </div>
                    <div class="d-flex justify-content-end align-items-center mt-4 mt-lg-0 flex-column flex-md-row">
                
                        <!-- Filter Trigger-->
                        <button class="btn bg-light p-3 me-md-3 d-flex align-items-center fs-7 lh-1 w-100 mb-2 mb-md-0 w-md-auto " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasFilters" aria-controls="offcanvasFilters">
                            <i class="ri-equalizer-line me-2"></i> Filters
                        </button>
                       
                           
                        <!-- / Sort Options-->
                    </div>
                </div>            <!-- /Category Toolbar-->

            <!-- Products-->
           <div class="row g-4 ms-3">
<?php

function generateProductCards($conn, $category, $limit = 20)
{
    $sql = "SELECT * FROM products WHERE shirtcategory = '$category' ORDER BY PID DESC LIMIT $limit";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
?>
            <div class="col-12 col-sm-6 col-lg-3" data-aos="fade-in">
                <!-- Card Product-->
                <div class="card border border-transparent position-relative overflow-hidden h-100 transparent">
                    <div class="card-img position-relative">
                        <?php if ($row["status"] == 0) : ?>
                            <div class="card-badges">
                                <span class="badge badge-card"><span class="f-w-2 f-h-2 bg-danger rounded-circle d-block me-1"></span> Out of Stock</span>
                            </div>
                        <?php else : ?>
                            <div class="card-badges">
                                <span class="badge badge-card"><span class="f-w-2 f-h-2 bg-success rounded-circle d-block me-1"></span> In Stock</span>
                            </div>
                        <?php endif; ?>

                        <picture class="position-relative overflow-hidden d-block bg-light product-image">
                            <img class="w-100 img-fluid position-relative z-index-10" title="" src="../images/<?php echo $row["img"]; ?>" alt="">
                        </picture>
                        <div class="position-absolute start-0 bottom-0 end-0 z-index-20 p-2">
                            <button class="btn btn-quick-add"><i class="ri-add-line me-2"></i> Buy now</button>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <a class="text-decoration-none link-cover" href="../products/?pid=<?php echo $row["pid"]; ?>"><?php echo $row["pname"]; ?></a>
                        <p class="mt-2 mb-0 small"><span class="text-dark" style="font-size: 18px;"><strong>RS.<?php echo $row["price"]; ?></strong></span></p>
                    </div>
                </div>
                <!--/ Card Product-->
            </div>
<?php
        }
    } else {
        // No products found
?>
        <div class="col-12 text-center py-3">
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Items are not available</h4>
            </div>
        </div>
<?php
    }
}

?>

<?php
function getCategoryCount($conn, $targetCategory)
{
    $sql = "SELECT COUNT(*) AS categoryCount FROM products WHERE shirtcategory = '$targetCategory'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['categoryCount'];
    } else {
        return 0;
    }
}

$collarCount = getCategoryCount($conn, 'collar');
$sleeveCount = getCategoryCount($conn, 'sleeve');
$bottomCount = getCategoryCount($conn, 'bottom');
$siltCount = getCategoryCount($conn, 'silt');
$placketCount = getCategoryCount($conn, 'placket');
$sleevehemCount = getCategoryCount($conn, 'sleevehem');
?>

<h1 class="fw-bold fs-3 mb-2 mt-5">COLLAR OPTIONS</h1>
<p class="m-0 text-muted small mb-4">Showing - <?php echo $collarCount; ?> items</p>
<div class="row g-4">
    <?php generateProductCards($conn, 'collar'); ?>
</div>

<h1 class="fw-bold fs-3 mb-2 mt-4">SLEEVE OPTIONS</h1>
<p class="m-0 text-muted small mb-4">Showing - <?php echo $sleeveCount; ?> items</p>
<div class="row g-4">
    <?php generateProductCards($conn, 'sleeve'); ?>
</div>

<h1 class="fw-bold fs-3 mb-2 mt-4">BOTTOM HEM OPTIONS</h1>
<p class="m-0 text-muted small mb-4">Showing - <?php echo $bottomCount; ?> items</p>
<div class="row g-4">
    <?php generateProductCards($conn, 'bottom'); ?>
</div>

<h1 class="fw-bold fs-3 mb-2 mt-4 text-uppercase">silt</h1>
<p class="m-0 text-muted small mb-4">Showing - <?php echo $siltCount; ?> items</p>
<div class="row g-4">
    <?php generateProductCards($conn, 'silt'); ?>
</div>

<h1 class="fw-bold fs-3 mb-2 mt-4">PLACKET TYPES</h1>
<p class="m-0 text-muted small mb-4">Showing - <?php echo $placketCount; ?> items</p>
<div class="row g-4">
    <?php generateProductCards($conn, 'placket'); ?>
</div>

<h1 class="fw-bold fs-3 mb-2 mt-4">SLEEVE HEM TYPES</h1>
<p class="m-0 text-muted small mb-4">Showing - <?php echo $sleevehemCount; ?> items</p>
<div class="row g-4">
    <?php generateProductCards($conn, 'sleevehem'); ?>
</div>






        </div>              <!-- / Pagination-->
        </div>
        

        <!-- /Page Content -->
    </section>
    <!-- / Main Section-->

    <!-- Footer -->
    
    <!-- Offcanvas Imports-->
    <!-- Filters Offcanvas-->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasFilters" aria-labelledby="offcanvasFiltersLabel">
    <div class="offcanvas-header pb-0 d-flex align-items-center">
        <h5 class="offcanvas-title" id="offcanvasFiltersLabel">Category Filters</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="d-flex flex-column justify-content-between w-100 h-100">

            <!-- Filters-->
            <div>
                <form action="" id="searchForm">
                    <!-- Brands Filter -->
<div class="py-4 widget-filter border-top">
    <a class="small text-body text-decoration-none text-secondary-hover transition-all transition-all fs-6 fw-bolder d-block collapse-icon-chevron"
        data-bs-toggle="collapse" href="#filter-modal-brands" role="button" aria-expanded="true"
        aria-controls="filter-modal-brands">
        
    </a>
    <div id="filter-modal-brands" class="collapse show">
        <div class="input-group my-3 py-1">
            <input type="text" id="filterSearch" class="form-control py-2 filter-search rounded" placeholder="Search products"
                aria-label="Search">
            <span class="input-group-text bg-transparent p-2 position-absolute top-10 end-0 border-0 z-index-20"><i
                class="ri-search-2-line text-muted"></i></span>
        </div>
        <!-- Container to display search results -->
        <div id="searchResultsContainer" class="container mt-3"></div>
    </div>
</div>

<div class="border-top pt-3">
    <button type="button" class="btn btn-dark mt-2 d-block hover-lift-sm hover-boxshadow" onclick="applyFilters()">Search</button>
</div>

                </form>
            </div>

            <!-- / Filters-->

            <!-- Filter Button-->
            <!-- /Filter Button-->
        </div>
    </div>
</div>

<!-- Container to display search results -->
<div id="searchResultsContainer" class="container mt-3"></div>

<script>
    function applyFilters() {
        var filterSearch = document.getElementById('filterSearch');
        var searchResultsContainer = document.getElementById('searchResultsContainer');

        // Call the PHP script to handle the search
        searchResultsContainer.innerHTML = ''; // Clear previous results
        fetch('search.php?search=' + filterSearch.value.trim())
            .then(response => response.text())
            .then(data => {
                searchResultsContainer.innerHTML = data;
            })
            .catch(error => console.error('Error:', error));
    }
</script>

<?php include 'footer.php';?>    <!-- / Footer-->

    <!-- Theme JS -->
    <!-- Vendor JS -->
    <script src="../assets/js/vendor.bundle.js"></script>
    
    <!-- Theme JS -->
    <script src="../assets/js/theme.bundle.js"></script>
</body>

</html>
