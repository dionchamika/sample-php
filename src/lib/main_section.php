<!-- Top banner -->
<section class="vh-75 vh-lg-60 container-fluid rounded overflow-hidden" data-aos="fade-in">
    <div class="swiper-container overflow-hidden rounded h-100 bg-light" data-swiper data-options='{
        "spaceBetween": 0,
        "slidesPerView": 1,
        "effect": "fade",
        "speed": 1000,
        "loop": true,
        "parallax": true,
        "observer": true,
        "observeParents": true,
        "lazy": {
            "loadPrevNext": true
        },
        "autoplay": {
            "delay": 4000,
            "disableOnInteraction": false
        },
        "pagination": {
            "el": ".swiper-pagination",
            "clickable": true
        }
    }'>
    <div class="swiper-wrapper">
        <?php
// Fetch slide data from the database
$sql = "SELECT * FROM customize WHERE clients IS NULL ORDER BY id DESC LIMIT 3"; // Fetch slides without data from the second form
$result = $conn->query($sql);

// Check if slides are available
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Output the slide only if it doesn't have data from the second form
        if (empty($row['clients'])) {
            echo '<div class="swiper-slide position-relative h-100 w-100">';
            echo '<div class="w-100 h-100 overflow-hidden position-absolute z-index-1 top-0 start-0 end-0 bottom-0">';
            echo '<div class="w-100 h-100 bg-img-cover bg-pos-center-center overflow-hidden" data-swiper-parallax="-400" style="will-change: transform; background-image: url(admin/' . $row['img1'] . ')"></div>';
            echo '</div>';
            echo '<div class="container position-relative z-index-10 d-flex h-100 align-items-start flex-column justify-content-center">';
            echo '<h2 class="display-3 tracking-wide fw-bold text-uppercase tracking-wide text-white">';
            echo '<span class="text-outline-dark">' . $row['first'] . '</span><span style="color: #009348;"> ' . $row['second'] . '</span>';
            echo '</h2>';
            echo '<div>';
            echo '<a class="btn btn-psuedo text-dark" role="button">Customized Corporate Branding</a>';
            echo '<p class="title-small text-dark opacity-75 mb-0">' . $row['third'] . '</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    }
} else {
    // If there are no slides available, you can display a message or handle it as needed
    echo 'No images available.';
}
?>

    </div>
    <div class="swiper-pagination swiper-pagination-bullet-light"></div>
    </div>
</section>



        <!-- Featured Brands-->
<div class="brand-section container-fluid" data-aos="fade-in">
    <div class="bg-overlay-sides-white-to-transparent bg-white py-5 py-md-7">
        <div class="container">
            <h2 style="text-align:center; padding: 20px;" class="text-uppercase">Categories</h2>
            <section class="customer-logos slider">
                <?php
                // Fetch client logos from the database and display them
                $sql_clients = "SELECT clients FROM customize WHERE clients IS NOT NULL"; // Query to select client logos uploaded via form 2
                $result_clients = $conn->query($sql_clients);

                if ($result_clients->num_rows > 0) {
                    while ($row_clients = $result_clients->fetch_assoc()) {
                        echo '<div class="slide"><img src="admin/' . $row_clients['clients'] . '"></div>';
                    }
                }
                ?>
               
            </section>
        </div>
    </div>
</div>




        <!--/ Featured Brands-->

        <div class="container-fluid">

            <!-- Featured Categories-->
            <div class="m-0">
                    <!-- Swiper Latest -->
                    <div class="swiper-container overflow-hidden overflow-lg-visible"
                      data-swiper
                      data-options='{
                        "spaceBetween": 25,
                        "slidesPerView": 1,
                        "observer": true,
                        "observeParents": true,
                        "breakpoints": {     
                          "540": {
                            "slidesPerView": 1,
                            "spaceBetween": 0
                          },
                          "770": {
                            "slidesPerView": 2
                          },
                          "1024": {
                            "slidesPerView": 3
                          },
                          "1200": {
                            "slidesPerView": 4
                          },
                          "1500": {
                            "slidesPerView": 5
                          }
                        },   
                        "navigation": {
                          "nextEl": ".swiper-next",
                          "prevEl": ".swiper-prev"
                        }
                      }'>
                                  
                      <div class="swiper-wrapper imgq">
                          <div class="swiper-slide align-self-stretch bg-transparent h-auto">
                            <div class="me-xl-n4 me-xxl-n5" data-aos="fade-up" data-aos-delay="000">
                                <picture class="d-block mb-4 img-clip-shape-one">
                                    <img class="w-100" title="" src="./assets/images/categories/1.png" alt="">
                                </picture>
                                <h4 class="lead fw-bold">Arm Cuts</h4>
                                <a href="view/arm-cut.php" class="btn btn-psuedo align-self-start" style="color:#213c9a;">Shop Now</a>
                            </div>
                          </div>
                                            <?php


// Fetch shirt images from the database
$sql = "SELECT * FROM images WHERE bottoms IS NOT NULL ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $bottoms_image = $row["bottoms"];
        // Display the shirt image
        echo '<div class="swiper-slide align-self-stretch bg-transparent h-auto">';
        echo '<div class="me-xl-n4 me-xxl-n5" data-aos="fade-up" data-aos-delay="500">';
        echo '<picture class="d-block mb-4 img-clip-shape-one">';
        echo '<img class="w-100" title="" src="admin/uploads/' . $bottoms_image . '" alt="">';
        echo '</picture>';
        echo '<h4 class="lead fw-bold">Bottoms</h4>';
        echo '<a href="view/Bottoms.php" class="btn btn-psuedo align-self-start" style="color:#213c9a;">Shop Now</a>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo " ";
}

?>
                          
                          <div class="swiper-slide align-self-stretch bg-transparent h-auto">
                            <div class="me-xl-n4 me-xxl-n5" data-aos="fade-up" data-aos-delay="300">
                                <picture class="d-block mb-4 img-clip-shape-one">
                                    <img class="w-100" title="" src="./assets/images/categories/5.png" alt="">
                                </picture>
                                <h4 class="lead fw-bold">White Vest</h4>
                                <a href="view/whitevest.php" class="btn btn-psuedo align-self-start" style="color:#213c9a;">Shop Now</a>
                            </div>
                          </div>
 
                         <?php


// Fetch shirt images from the database
$sql = "SELECT * FROM images WHERE shirt IS NOT NULL ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $shirt_image = $row["shirt"];
        // Display the shirt image
        echo '<div class="swiper-slide align-self-stretch bg-transparent h-auto">';
        echo '<div class="me-xl-n4 me-xxl-n5" data-aos="fade-up" data-aos-delay="500">';
        echo '<picture class="d-block mb-4 img-clip-shape-one">';
        echo '<img class="w-100" title="" src="admin/uploads/shirt/' . $shirt_image . '" alt="">';
        echo '</picture>';
        echo '<h4 class="lead fw-bold">shirts</h4>';
        echo '<a href="view/shirts.php" class="btn btn-psuedo align-self-start" style="color:#213c9a;">Shop Now</a>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo " ";
}

?>




                          <div class="swiper-slide align-self-stretch bg-transparent h-auto">
                            <div class="me-xl-n4 me-xxl-n5" data-aos="fade-up" data-aos-delay="700">
                                <picture class="d-block mb-4 img-clip-shape-one">
                                    <img class="w-100" title="" src="./assets/images/categories/8.png" alt="HTML Bootstrap Template by Pixel Rocket">
                                </picture>
                                <h4 class="lead fw-bold">cotton gloves</h4>
                                <a href="view/gloves.php" class="btn btn-psuedo align-self-start" style="color:#213c9a;">Shop Now</a>
                            </div>
                          </div>
                      </div>
                    
                      <div class="swiper-btn swiper-prev swiper-disabled-hide swiper-btn-side btn-icon bg-white text-dark ms-3 shadow mt-n5"><i class="ri-arrow-left-s-line "></i></div>
                      <div class="swiper-btn swiper-next swiper-disabled-hide swiper-btn-side swiper-btn-side-right btn-icon bg-white text-dark me-3 shadow mt-n5"><i class="ri-arrow-right-s-line ri-lg"></i></div>
                    
                    </div>
                    <!-- / Swiper Latest-->                <!-- SVG Used for Clipath on featured images above-->
                <svg width="0" height="0">
                  <defs>
                  <clipPath id="svg-slanted-one" clipPathUnits="objectBoundingBox">
                      <path d="M0.822,1 H0.016 a0.015,0.015,0,0,1,-0.016,-0.015 L0.158,0.015 A0.016,0.015,0,0,1,0.173,0 L0.984,0 a0.016,0.015,0,0,1,0.016,0.015 L0.837,0.985 A0.016,0.015,0,0,1,0.822,1"></path>
                  </clipPath>
                  </defs>
                </svg>            </div>
            <!-- /Featured Categories-->

            <!-- Homepage Intro-->
            <div class="position-relative row my-lg-7 pt-5 pt-lg-0 g-8">
                <div class="bg-text bottom-0 start-0 end-0" data-aos="fade-up">
                    <h2 class="bg-text-title opacity-10"><span class="text-outline-dark">ERA</span>NA</h2>
                </div>
                <div class="col-12 col-md-6 position-relative z-index-20 mb-7 mb-lg-0" data-aos="fade-right">
                    <p class="text-muted title-small">Welcome to</p>
                    <h3 class="display-3 fw-bold mb-5"><span class="text-outline-dark">SLT</span> - Clothing</h3>
                    <p class="lead">
                        

                        Strengthened by over 70 years of expertise, Bernards have found resounding success as a pioneer in creating custom-made T-shirts in Sri Lanka for a wide range of brands. As one of the largest apparel manufacturing companies in the country,  Bernards dominates the market with its’ main line of custom made t-shirts for all purposes and occasions.  <br>Today, our modern apparel factory is equipped to handle orders of any scale and compete in this dynamic business environment where customers constantly look for quality and value for money. </p>
                        With our range of clients growing over the years, our spirit of innovation has also reached new heights making Bernards a brand that is respected both locally and globally.
                    </p>
                    <p class="lead">With worldwide shipping and unbeatable prices - now's a great time to pick out something from our range.</p>
                </div>
                <div class="col-12 col-md-6 position-relative z-index-20 pe-0" data-aos="fade-left">
                    <picture class="w-50 d-block position-relative z-index-10 border border-white border-4 shadow-lg">
                        <img class="img-fluid" src="https://img.freepik.com/free-photo/sexy-smiling-beautiful-woman-her-handsome-boyfriend-happy-cheerful-family-having-tender-momentsyoung-passionate-couple-hugging-sensual-pair-isolated-white-cheerful-happy_158538-22583.jpg?t=st=1737817718~exp=1737821318~hmac=077618823b4e29f293976edcfb1bd4bcb93efff035e37fe206b062dd901322e2&w=1380" alt="">
                    </picture>
                    <picture class="w-60 d-block me-8 mt-n10 shadow-lg border border-white border-4 position-relative z-index-20 ms-auto">
                        <img class="img-fluid" src="https://img.freepik.com/free-photo/sexy-smiling-beautiful-woman-her-handsome-boyfriend-happy-cheerful-family-having-tender-momentsyoung-passionate-couple-hugging-sensual-pair-isolated-white-cheerful-happy_158538-22583.jpg?t=st=1737817718~exp=1737821318~hmac=077618823b4e29f293976edcfb1bd4bcb93efff035e37fe206b062dd901322e2&w=1380" alt="">
                    </picture>
                    <picture class="w-50 d-block me-8 mt-n7 shadow-lg border border-white border-4 position-absolute top-0 end-0 z-index-0 ">
                        <img class="img-fluid" src="https://stag2.mydemoview.com/bernards/wp-content/uploads/2019/05/slide1img.png" alt="">
                    </picture>
                </div>
            </div>
            <!-- / Homepage Intro-->

            <!-- Homepage Banners-->
            <div class="pt-7 mb-5 mb-lg-10">
                <div class="row g-4">
                    <div class="col-12 col-xl-6 position-relative" data-aos="fade-right">
                        <picture class="position-relative z-index-10">
                            <img class="w-100 rounded" src="./assets/images/banners/fab.png" alt="HTML Bootstrap Template by Pixel Rocket">
                        </picture>
                        <div class="position-absolute top-0 bottom-0 start-0 end-0 d-flex justify-content-center align-items-center z-index-20">
                            <div class="py-6 px-5 px-lg-10 text-center w-100">
                                <h2 class="display-1 mb-3 fw-bold text-white"><span class="text-outline-light">FABRICS</span> </h2>
                            
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-6" data-aos="fade-left">
                        <div class="row g-4 justify-content-end">
                            <div class="col-12 col-md-6 d-flex">
                                <div class="card position-relative overflow-hidden ">
                                        <picture class="position-relative z-index-10 d-block bg-light">
                                        <img class="w-100 rounded" src="assets/images/banners/fab-1.png" alt="HTML Bootstrap Template by Pixel Rocket">
                                    </picture>

                                    <div class="card-overlay">
                                        <p class="lead fw-bolder mb-2"><a href="fabrics/" class="btn btn-psuedo align-self-start"  style="color:white;">Shop Now</a> </p>
                           
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 d-flex">
                                <div class="card position-relative overflow-hidden">
                                    <picture class="position-relative z-index-10 d-block bg-light">
                                        <img class="w-100 rounded" src="./assets/images/banners/fab-2.png" alt="HTML Bootstrap Template by Pixel Rocket">
                                    </picture>
                                    <div class="card-overlay">
                                        <p class="lead fw-bolder mb-2"><a href="fabrics/" class="btn btn-psuedo align-self-start"  style="color:white;">Shop Now</a> </p>
                           
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 d-flex">
                                <div class="card position-relative overflow-hidden">
                                    <picture class="position-relative z-index-10 d-block bg-light">
                                        <img class="w-100 rounded" src="./assets/images/banners/fab-3.png" alt="HTML Bootstrap Template by Pixel Rocket">
                                    </picture>
                                    <div class="card-overlay">
                                        <p class="lead fw-bolder mb-2"><a href="fabrics/" class="btn btn-psuedo align-self-start"  style="color:white;">Shop Now</a> </p>
                           
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 d-flex">
                                <div class="card position-relative overflow-hidden">
                                    <picture class="position-relative z-index-10 d-block bg-light">
                                        <img class="w-100 rounded" src="./assets/images/banners/fab-4.png" alt="HTML Bootstrap Template by Pixel Rocket">
                                    </picture>
                                    <div class="card-overlay">
                                        <p class="lead fw-bolder mb-2"><a href="fabrics/" class="btn btn-psuedo align-self-start"  style="color:white;">Shop Now</a> </p>
                           
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / Homepage Banners-->

            <!-- Instagram-->
            <!-- Swiper Instagram -->
            <div data-aos="fade-in">
              <h3 class="title-small text-muted text-center mb-4 mt-5"><i class="ri-instagram-line align-bottom"></i>
            </h3>
            <div class="overflow-hidden">
              <div class="swiper-container swiper-overflow-visible"
                data-swiper
                data-options='{
                    "spaceBetween": 20,
                    "loop": true,
                    "autoplay": {
                      "delay": 2000,
                      "disableOnInteraction": false
                    },
                    "breakpoints": {
                      "400": {
                        "slidesPerView": 2
                      },
                      "600": {
                        "slidesPerView": 3
                      },       
                      "999": {
                        "slidesPerView": 5
                      },
                      "1024": {
                        "slidesPerView": 6
                      }
                    }
                  }'>
              </div>
            </div>
            </div>
            <!-- /Swiper Instagram-->
            <!-- / Instagram-->

        </div>

        <!-- /Page Content -->
    </section>