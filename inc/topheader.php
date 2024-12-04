<header>
    <div class="container">
        <div class="top-header">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                        <div class="container-fluid">

                            <a class="navbar-brand" href="index.php"><img src="assets/images/logo2.png" alt="" style="width: 70%;"></a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                            </button>
                            
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">  
                                <div class="d-flex ms-auto align-items-center">
                                    

                                    <?php  
                                        if ( !empty( $_SESSION['email'] ) ) { ?>
                                            <div class="dropdown">
                                            <div class="d-flex align-items-center showlog">
                                                <?php 
                                                    if ( !empty( $_SESSION['image'] ) ) {
                                                        echo '<img src="admin/assets/images/role/' . $_SESSION['image'] . '" alt="" style="width: 60px; border-radius: 20%;">';
                                                    }
                                                    else { 
                                                        echo '<img src="admin/assets/images/dummy.jpg" alt="" style="width: 60px; border-radius: 20%;">';
                                                    }
                                                ?>
                                                <h5 class="ps-3"><?php echo $_SESSION['name']; ?></h5>
                                            </div>                                              

                                              <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                                                <hr style="margin: 2px 0px;">
                                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                                <hr style="margin: 2px 0px;">
                                                <li><a class="dropdown-item" href="logout.php">logout</a></li>
                                              </ul>
                                            </div>
                                        <?php }
                                        else { ?>
                                            <div class="mx-3">
                                                <form action="packages.php" method="GET">
                                                    <button type="submit" class="btn btn-secondary">+ Add Property</button>
                                                </form>
                                            </div>
                                            <div class="">
                                                <a href="login.php" class="btn btn-outline-warning btn-1 px-4  mx-3">Login</a>
                                                <a href="register.php" class="btn btn-warning btn-2 px-4">SignUp </a>
                                            </div>
                                       <?php }
                                    ?>
                                    
                                                               

                                </div>     
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>

        <hr>

        <div class="navigation-header pb-3 ">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                        <div class="container-fluid">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                                </li>
                                <li class="nav-item mx-4">
                                    <a class="nav-link" href="rent.php">Rent</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="buy.php">Buy</a>
                                </li>
                                <li class="nav-item mx-4">
                                    <a class="nav-link" href="#">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">About Us</a>
                                </li>
                            </ul>
                            <div class="d-flex align-items-center ms-auto">
                                <div class="mx-4">
                                    <form action="" method="GET" class="search-container">
                                        <input type="text" name="query" id="search-input" placeholder="search here..." />
                                        <button type="button" id="search-button">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                        </button>
                                    </form>

                                </div>

                                <div>
                                    <a href="">
                                    <i class="fa-solid fa-heart cart"></i><sup style="top: -14px; color:#023021; ">20</sup>
                                    </a>
                                </div>
                            </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        
    </div>
</header>
