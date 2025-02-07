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
     <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />

 
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



.slider-wrapper {
  position: relative;
  transition: transform 0.5s ease-in-out;
}
.slider-wrapper .slide-button {
  position: absolute;
  top: 50%;
  outline: none;
  border: none;
  height: 50px;
  width: 50px;
  z-index: 5;
  color: #fff;
  display: flex;
  cursor: pointer;
  font-size: 2.2rem;
  background: #000;
  align-items: center;
  justify-content: center;
  border-radius: 50%;
  transform: translateY(-50%);
}
.slider-wrapper .slide-button:hover {
  background: #404040;
}
.slider-wrapper .slide-button#prev-slide {
  left: -25px;
  display: none;
}
.slider-wrapper .slide-button#next-slide {
  right: -25px;
}
.slider-wrapper .image-list {
  display: grid;
  grid-template-columns: repeat(10, 1fr);
  gap: 28px;
  font-size: 0;
  list-style: none;
  margin-bottom: 30px;
  overflow-x: auto;
  scrollbar-width: none;
   width: 100%; /* Adjusted for responsiveness */

}
.slider-wrapper .image-list::-webkit-scrollbar {
  display: none;
}
.slider-wrapper .image-list .image-item {
  width: 455px;
  height: 400px;
  object-fit: cover !important;
}
.container .slider-scrollbar {
  height: 24px;
  width: 100%;
  display: flex;
  align-items: center;
}
.slider-scrollbar .scrollbar-track {
  background: #ccc;
  width: 100%;
  height: 2px;
  display: flex;
  align-items: center;
  border-radius: 4px;
  position: relative;
}
.slider-scrollbar:hover .scrollbar-track {
  height: 4px;
}
.slider-scrollbar .scrollbar-thumb {
  position: absolute;
  background: #000;
  top: 0;
  bottom: 0;
  width: 50%;
  height: 100%;
  cursor: grab;
  border-radius: inherit;
}
.slider-scrollbar .scrollbar-thumb:active {
  cursor: grabbing;
  height: 8px;
  top: -2px;
}
.slider-scrollbar .scrollbar-thumb::after {
  content: "";
  position: absolute;
  left: 0;
  right: 0;
  top: -10px;
  bottom: -10px;
}
/* Styles for mobile and tablets */
@media only screen and (max-width: 1023px) {
  .slider-wrapper .slide-button {
    display: none !important;
  }
  .slider-wrapper .image-list {
    gap: 8px;
    margin-bottom: 15px;
    scroll-snap-type: x mandatory;
  }
  .slider-wrapper .image-list .image-item {
    width: 260px;
    height: 300px;
  }
  .slider-scrollbar .scrollbar-thumb {
    width: 20%;
  }
}
@media only screen and (max-width: 767px) {
  .slider-scrollbar {
    display: none; /* Hide scrollbar in mobile view if not needed */
  }

  .image-list {
    overflow-x: scroll; /* Allow horizontal scrolling on the image list in mobile view */
    -webkit-overflow-scrolling: touch; /* Enable smooth scrolling on iOS devices */
  }
}
  </style>

  <!-- Page Title -->
  <title>PRODUCTION CAPABILITIES - SLT Clothing</title>

</head>
<body>



    <!-- Navbar -->
 <?php include 'nav.php';?>  
 <?php include '../lib/style.php';?>

<?php include 'whatsapp.php';?>
 
    <!-- / Navbar-->   

    <!-- Main Section-->
    <section class="mt-0 overflow-hidden ">
        <!-- Page Content Goes Here -->

        <!-- / Top banner -->
        <section class="vh-75 vh-lg-60 container-fluid rounded overflow-hidden" data-aos="fade-in">
                        <div class="d-flex justify-content-between items-center pt-2 flex-column flex-lg-row">
                    <div>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><u><a href="../">Home</a></u></li>
                              <li class="breadcrumb-item active"><a href="../production-capabilities/">PRODUCTION CAPABILITIES</a></li>
                            </ol>
                        </nav>       
                    </div>
                    
                </div>
            <!-- Swiper Info -->
          

<!-- Slide-->
<div class="swiper-slide position-relative h-100 w-100">
    <div class="w-100 h-100 overflow-hidden position-absolute z-index-1 top-0 start-0 end-0 bottom-0">
      <div class="w-100 h-100 bg-img-cover bg-pos-center-center overflow-hidden"
           style="will-change: transform; background-image: url(https://www.bernardsceylon.com/wp-content/uploads/2019/04/SHA9077.jpg)">
      </div>
    </div>
    <div class="container position-relative z-index-10 d-flex h-100 align-items-start flex-column justify-content-center">
      <h2 class="display-3 tracking-wide fw-bold text-uppercase tracking-wide text-white">
        <span class="text-outline-dark">Production Capabilities</span></h2>
      <div>
      </div>
    </div>
  </div>
  <!-- /Slide-->
                   </section>
        <!--/ Top Banner-->


        

        <div class="container-fluid">


          
         

            <!-- Homepage Intro-->

<!-- Homepage Banners Right -->


<!--Topic end-->        
        



<!-- capabilities 2-->
<section class="mt-0 overflow-hidden" data-aos="fade-in">
       
       
            <div class="container py-3 mt-4">
                <!-- Main Topic and Text Area -->
                <!-- <section class="py-4"> -->
            <h3 class="text-muted">We have a vertically integrated production facility with the capability to provide unique colour matching, advanced embroidery and printing in a shorter lead time</h3>
                            
                        </div>
                    
                <!-- </section> -->
                <!-- /Main Topic and Text Area -->
        
                <!-- Rest of your content here -->
        
            </div>
        <!-- </section> -->
  
<div class="container" data-aos="fade-up" id="one">
<div class="ms-4 py-4 text-outline-dark">
    <h1>KNITTING</h1>
</div>
      <div class="slider-wrapper">
        <button id="prev-slide" class="slide-button material-symbols-rounded">
          chevron_left
        </button>
        <ul class="image-list img-fluid">

          <img class="image-item" src="https://www.bernardsceylon.com/wp-content/uploads/2019/05/knit_2.png" alt="img-2" />
          <img class="image-item" src="https://www.bernardsceylon.com/wp-content/uploads/2019/05/knit_3.png" alt="img-3" />
          <img class="image-item" src="https://www.bernardsceylon.com/wp-content/uploads/2019/05/knit_1.png" alt="img-4" />

        </ul>
        <button id="next-slide" class="slide-button material-symbols-rounded">
          chevron_right
        </button>
      </div>
      <div class="slider-scrollbar">
        <div class="scrollbar-track">
          <div class="scrollbar-thumb"></div>
        </div>
      </div>
    </div>
    <!-- </div> -->
</section>
<!-- /capabilitise 2-->  
<!-- / Homepage Banners Left  -->


<div class="container" data-aos="fade-up" id="two">
<div class="ms-4 py-4 mt-2 text-outline-dark">
    <h1>DYEING</h1>
</div>
      <div class="slider-wrapper">
        <button id="prev-slide" class="slide-button material-symbols-rounded">
          chevron_left
        </button>
        <ul class="image-list img-fluid">

          <img class="image-item" src="https://www.bernardsceylon.com/wp-content/uploads/2019/05/die_1.png" alt="img-2" />
          <img class="image-item" src="https://www.bernardsceylon.com/wp-content/uploads/2019/05/die_2.png" alt="img-3" />
          <img class="image-item" src="https://www.bernardsceylon.com/wp-content/uploads/2019/05/die_3.png" alt="img-4" />
          <img class="image-item" src="https://www.bernardsceylon.com/wp-content/uploads/2019/05/die_4.png" alt="img-4" />
          <img class="image-item" src="https://www.bernardsceylon.com/wp-content/uploads/2019/05/die_5.png" alt="img-4" />
          <img class="image-item" src="https://www.bernardsceylon.com/wp-content/uploads/2019/05/die_6.png" alt="img-4" />

        </ul>
        <button id="next-slide" class="slide-button material-symbols-rounded">
          chevron_right
        </button>
      </div>
      <div class="slider-scrollbar">
        <div class="scrollbar-track">
          <div class="scrollbar-thumb"></div>
        </div>
      </div>
    </div>
    <!-- </div> -->
<!-- </section> -->
<!-- Cutting Section -->

<div class="container" data-aos="fade-up" id="three">
  <div class="ms-4 py-4 mt-2 text-outline-dark">
    <h1>CUTTING</h1>
  </div>
  <div class="slider-wrapper">
    <button id="prev-slide" class="slide-button material-symbols-rounded">
      chevron_left
    </button>
    <ul class="image-list img-fluid">
      <!-- Add your cutting images here -->
      <img class="image-item" src="https://www.bernardsceylon.com/wp-content/uploads/2019/05/cut_3.png" alt="cutting-img-1" />
      <img class="image-item" src="https://www.bernardsceylon.com/wp-content/uploads/2019/05/cut_2.png" alt="cutting-img-1" />
      <img class="image-item" src="https://www.bernardsceylon.com/wp-content/uploads/2019/05/cut_1.png" alt="cutting-img-1" />
      <img class="image-item" src="https://www.bernardsceylon.com/wp-content/uploads/2019/05/cut_4.png" alt="cutting-img-1" />
      <img class="image-item" src="https://www.bernardsceylon.com/wp-content/uploads/2019/05/cut_5.png" alt="cutting-img-1" />
      <!-- Add more cutting images as needed -->
    </ul>
    <button id="next-slide" class="slide-button material-symbols-rounded">
      chevron_right
    </button>
  </div>
  <div class="slider-scrollbar">
    <div class="scrollbar-track">
      <div class="scrollbar-thumb"></div>
    </div>
  </div>
</div>

<div class="container" data-aos="fade-up" id="four">
  <div class="ms-4 py-4 mt-2 text-outline-dark">
    <h1>LASER CUTTING</h1>
  </div>
  <div class="slider-wrapper">
    <button id="prev-slide" class="slide-button material-symbols-rounded">
      chevron_left
    </button>
    <ul class="image-list img-fluid">
      <!-- Add your cutting images here -->
      <img class="image-item" src="https://www.bernardsceylon.com/wp-content/uploads/2019/05/emb_11.png" alt="cutting-img-1" />
      <img class="image-item" src="https://www.bernardsceylon.com/wp-content/uploads/2019/05/emb_7.png" alt="cutting-img-1" />
      <img class="image-item" src="https://www.bernardsceylon.com/wp-content/uploads/2019/05/emb_10.png" alt="cutting-img-1" />

    </ul>
    <button id="next-slide" class="slide-button material-symbols-rounded">
      chevron_right
    </button>
  </div>
  <div class="slider-scrollbar">
    <div class="scrollbar-track">
      <div class="scrollbar-thumb"></div>
    </div>
  </div>
</div>

<div class="container" data-aos="fade-up" id="five">
  <div class="ms-4 py-4 mt-2 text-outline-dark">
    <h1>PRINGTING</h1>
  </div>
  <div class="slider-wrapper img-fluid">
    <button id="prev-slide" class="slide-button material-symbols-rounded">
      chevron_left
    </button>
    <ul class="image-list">
      <!-- Add your cutting images here -->
      <img class="image-item" src="https://www.bernardsceylon.com/wp-content/uploads/2019/05/print_1.png" alt="cutting-img-1" />
      <img class="image-item" src="https://www.bernardsceylon.com/wp-content/uploads/2019/05/print_2.png" alt="cutting-img-1" />
      <img class="image-item" src="https://www.bernardsceylon.com/wp-content/uploads/2019/05/print_3.png" alt="cutting-img-1" />
      <img class="image-item" src="https://www.bernardsceylon.com/wp-content/uploads/2019/05/print_4.png" alt="cutting-img-1" />
      <img class="image-item" src="https://www.bernardsceylon.com/wp-content/uploads/2019/05/print_5.png" alt="cutting-img-1" />
      <img class="image-item" src="https://www.bernardsceylon.com/wp-content/uploads/2019/05/print_6.png" alt="cutting-img-1" />
      <img class="image-item" src="https://www.bernardsceylon.com/wp-content/uploads/2019/05/print_7.png" alt="cutting-img-1" />
      <img class="image-item" src="https://www.bernardsceylon.com/wp-content/uploads/2019/05/print_8.png" alt="cutting-img-1" />
      <img class="image-item" src="https://www.bernardsceylon.com/wp-content/uploads/2019/05/print_9.png" alt="cutting-img-1" />


    </ul>
    <button id="next-slide" class="slide-button material-symbols-rounded">
      chevron_right
    </button>
  </div>
  <div class="slider-scrollbar">
    <div class="scrollbar-track">
      <div class="scrollbar-thumb"></div>
    </div>
  </div>
</div>

<div class="container" data-aos="fade-up" id="six">
  <div class="ms-4 py-4 mt-2 text-outline-dark">
    <h1>EMBROIDERY</h1>
  </div>
  <div class="slider-wrapper">
    <button id="prev-slide" class="slide-button material-symbols-rounded">
      chevron_left
    </button>
    <ul class="image-list img-fluid">
      <!-- Add your cutting images here -->
      <img class="image-item" src="https://www.bernardsceylon.com/wp-content/uploads/2019/05/emb_2.png" alt="cutting-img-1" />
      <img class="image-item" src="https://www.bernardsceylon.com/wp-content/uploads/2019/05/emb_3.png" alt="cutting-img-1" />
      <img class="image-item" src="https://www.bernardsceylon.com/wp-content/uploads/2019/05/emb_5.png" alt="cutting-img-1" />
      <img class="image-item" src="https://www.bernardsceylon.com/wp-content/uploads/2019/05/emb_6.png" alt="cutting-img-1" />


    </ul>
    <button id="next-slide" class="slide-button material-symbols-rounded">
      chevron_right
    </button>
  </div>
  <div class="slider-scrollbar">
    <div class="scrollbar-track">
      <div class="scrollbar-thumb"></div>
    </div>
  </div>
</div>

<div class="container" data-aos="fade-up" id="seven">
  <div class="ms-4 py-4 mt-2 text-outline-dark">
    <h1>EMBROIDERY</h1>
  </div>
  <div class="slider-wrapper">
    <button id="prev-slide" class="slide-button material-symbols-rounded">
      chevron_left
    </button>
    <ul class="image-list img-fluid">
      <!-- Add your cutting images here -->
      <img class="image-item" src="https://www.bernardsceylon.com/wp-content/uploads/2019/05/se_5.png" alt="cutting-img-1" />
      <img class="image-item" src="https://www.bernardsceylon.com/wp-content/uploads/2019/05/sew_4.png" alt="cutting-img-1" />
      <img class="image-item" src="https://www.bernardsceylon.com/wp-content/uploads/2019/05/sew_3.png" alt="cutting-img-1" />
      <img class="image-item" src="https://www.bernardsceylon.com/wp-content/uploads/2019/05/sew_2.png" alt="cutting-img-1" />
      <img class="image-item" src="https://www.bernardsceylon.com/wp-content/uploads/2019/05/sew_1.png" alt="cutting-img-1" />


    </ul>
    <button id="next-slide" class="slide-button material-symbols-rounded">
      chevron_right
    </button>
  </div>
  <div class="slider-scrollbar">
    <div class="scrollbar-track">
      <div class="scrollbar-thumb"></div>
    </div>
  </div>
</div>
<!-- End of CUTTING Section -->

<!-- End of CUTTING Section -->



<!-- </section> -->
<script type="text/javascript">
const initSlider = (containerSelector) => {
    const container = document.querySelector(containerSelector);
    const imageList = container.querySelector(".image-list");
    const slideButtons = container.querySelectorAll(".slide-button");
    const sliderScrollbar = container.querySelector(".slider-scrollbar");
    const scrollbarThumb = container.querySelector(".scrollbar-thumb");
    const maxScrollLeft = imageList.scrollWidth - imageList.clientWidth;

    // Handle scrollbar thumb drag
    scrollbarThumb.addEventListener("mousedown", (e) => {
        const startX = e.clientX;
        const thumbPosition = scrollbarThumb.offsetLeft;
        const maxThumbPosition = sliderScrollbar.getBoundingClientRect().width - scrollbarThumb.offsetWidth;

        // Update thumb position on mouse move
        const handleMouseMove = (e) => {
            const deltaX = e.clientX - startX;
            const newThumbPosition = thumbPosition + deltaX;

            // Ensure the scrollbar thumb stays within bounds
            const boundedPosition = Math.max(0, Math.min(maxThumbPosition, newThumbPosition));
            const scrollPosition = (boundedPosition / maxThumbPosition) * maxScrollLeft;

            scrollbarThumb.style.left = `${boundedPosition}px`;
            imageList.scrollLeft = scrollPosition;
        };

        // Remove event listeners on mouse up
        const handleMouseUp = () => {
            document.removeEventListener("mousemove", handleMouseMove);
            document.removeEventListener("mouseup", handleMouseUp);
        };

        // Add event listeners for drag interaction
        document.addEventListener("mousemove", handleMouseMove);
        document.addEventListener("mouseup", handleMouseUp);
    });

    // Slide images smoothly
const slideImages = (direction) => {
    const scrollAmount = imageList.clientWidth * direction;
    const currentPosition = imageList.scrollLeft;
    const targetPosition = currentPosition + scrollAmount;
    const startTime = performance.now();

    const animateScroll = (currentTime) => {
        const elapsedTime = currentTime - startTime;

        if (elapsedTime < 500) {
            const newPosition = easeInOutCubic(elapsedTime, currentPosition, scrollAmount, 500);
            imageList.scrollLeft = newPosition;
            requestAnimationFrame(animateScroll);
        } else {
            imageList.scrollLeft = targetPosition;
            handleSlideButtons();
        }
    };

    requestAnimationFrame(animateScroll);
};

// Easing function for smooth scrolling
const easeInOutCubic = (t, b, c, d) => {
    t /= d / 2;
    if (t < 1) return c / 2 * t * t * t + b;
    t -= 2;
    return c / 2 * (t * t * t + 2) + b;
};


    // Slide images according to the slide button clicks
    slideButtons.forEach(button => {
        button.addEventListener("click", () => {
            const direction = button.id.includes("prev") ? -1 : 1;
            slideImages(direction);
        });
    });

    // Show or hide slide buttons based on scroll position
    const handleSlideButtons = () => {
        slideButtons[0].style.display = imageList.scrollLeft <= 0 ? "none" : "flex";
        slideButtons[1].style.display = imageList.scrollLeft >= maxScrollLeft ? "none" : "flex";
    };

    // Update scrollbar thumb position based on image scroll
    const updateScrollThumbPosition = () => {
        const scrollPosition = imageList.scrollLeft;
        const thumbPosition = (scrollPosition / maxScrollLeft) * (sliderScrollbar.clientWidth - scrollbarThumb.offsetWidth);
        scrollbarThumb.style.left = `${thumbPosition}px`;
    };

    // Call these two functions when image list scrolls
    imageList.addEventListener("scroll", () => {
        updateScrollThumbPosition();
        handleSlideButtons();
    });
};


// Initialize cutting slider on window resize and load
window.addEventListener("resize", () => {
    initSlider(".container[id='one']");
    initSlider(".container[id='two']");
    initSlider(".container[id='theree']");
    initSlider(".container[id='four']");
    initSlider(".container[id='five']");
    initSlider(".container[id='six']");
    initSlider(".container[id='seven']");
});

window.addEventListener("load", () => {
    initSlider(".container[id='one']");
    initSlider(".container[id='two']");
        initSlider(".container[id='three']");
        initSlider(".container[id='four']");
        initSlider(".container[id='five']");
        initSlider(".container[id='six']");
        initSlider(".container[id='seven']");

});

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
    <script src="../assets/js/whatsapp.js"></script>
</body>

</html>