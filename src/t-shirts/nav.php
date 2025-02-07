<nav class="navbar navbar-expand-lg navbar-light bg-white flex-column border-0">
    <div class="container-fluid">
        <div class="w-100">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <!-- Logo-->
                <a class="navbar-brand fw-bold fs-3 flex-shrink-0 order-0 align-self-center justify-content-center d-flex mx-0 px-0" href="../">
                    <img src="../assets/images/logos/logo.png" alt="Logo" width="100" height="50">
                </a>
                <!-- / Logo-->
                <!-- Navbar Icons-->

                <ul class="list-unstyled mb-0 d-flex align-items-center order-1 order-lg-2 nav-sidelinks">
                <?php if (isset($_SESSION["id"])) { ?>
                    <li class="d-lg-none">
                        <!-- Mobile Menu -->
                        <span class="nav-link text-body d-flex align-items-center cursor-pointer " data-bs-toggle="collapse"
                            
                            aria-label="Toggle navigation"><a href="../account/"> <i class="fa-regular fa-user" style="font-size:18px;"></i></a>
                        </span>
                         </li>
                         <?php }?>

                    <li class="d-lg-none">
                        <!-- Mobile Menu -->
                        <span class="nav-link text-body d-flex align-items-center cursor-pointer" data-bs-toggle="collapse"
                            data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                            aria-label="Toggle navigation"><i class="ri-menu-line ri-lg me-1"></i>Menu</span>
                    </li>

                    <!-- Login-->
                    <?php if (!isset($_SESSION["id"])) { ?>
                    <li class="ms-1 d-none d-lg-inline-block">
                        <a class="nav-link text-body" href="../user/login/">
                            <i class="ri-login-box-line ri-lg"></i>
                        </a>
                    </li>
                    <?php } else { ?>
                        <li class="ms-1 d-none d-lg-inline-block">
                        <a class="nav-link text-body" href="../account/">
                        <i class="fa-regular fa-user" style="font-size:18px;"></i>             
                       </a>
                    </li>
                    <?php } ?>
                    <!-- Navbar Cart Icon -->
                    <div>
                        <!-- Cart Items -->
                        <div>
                            <!-- Cart Product -->
                        </div>
                    </div>
                </ul>
                <!-- Navbar Icons -->
                <!-- Main Navigation -->
                <div class="flex-shrink-0 collapse navbar-collapse navbar-collapse-light w-auto flex-grow-1 order-2 order-lg-1" id="navbarNavDropdown">
                    <!-- Menu -->
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <!-- Add your dropdown items here -->
                        <li class="nav-item">
                            <a class="nav-link" href="../fabrics/" role="button">
                                Fabrics
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../embroidery-print/" role="button">
                                EMBROIDERY & PRINT
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../t-shirts/" role="button" style="color: #213d98; font-weight: 600;">
                                T-SHIRTS
                            </a>
                        </li>
                        <li class="nav-item">
                            <div class="flex-shrink-0 collapse navbar-collapse navbar-collapse-light w-auto flex-grow-1 order-2 order-lg-1" id="navbarNavDropdown">
                                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Products
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item text-muted fw-bold" href="../all-products/">All Producs</a>
                                            <a class="dropdown-item text-muted fw-bold" href="../view/arm-cut.php">Arm Cuts</a>
                                            <a class="dropdown-item text-muted fw-bold" href="../view/bottoms.php">Bottoms</a>
                                            <a class="dropdown-item text-muted fw-bold" href="../view/whitevest.php">White Vest</a>
                                            <a class="dropdown-item text-muted fw-bold" href="../view/shirts.php">Shirts</a>
                                            <a class="dropdown-item text-muted fw-bold" href="../view/shorts.php">Shorts</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../production-capabilities/" role="button">
                                PRODUCTION CAPABILITIES
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../contact/" role="button">
                                Contact
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../about/" role="button">
                                About
                            </a>
                        </li>
                    </ul>
                    <!-- / Menu -->
                </div>
            </div>
        </div>
    </div>
</nav>
