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
                                                <li><a class="dropdown-item" href="hotelbook.php">Booking Update</a></li>
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
                                    <a class="nav-link" href="blog.php">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="about.php">About Us</a>
                                </li>
                            </ul>
                            <div class="d-flex align-items-center ms-auto">
                                <!-- Search Button -->
                                <div class="mx-4">
                                    <form action="search_result.php" method="GET" class="search-container">
                                        <input type="text" name="search" id="search-input" placeholder="search rent items..." />
                                        <button type="button" id="search-button">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                        </button>
                                    </form>
                                </div>
                                 <!-- Search Button -->

                                <div class="actions">
                                  <div class="wishlist-icon" id="wishlistIcon">
                                    <?php  
                                    if ( !empty($_SESSION['id']) ) {
                                        $sesmail = $_SESSION['id'];
                                        $sql = "SELECT * FROM cart WHERE user_id='$sesmail' AND status=1 ORDER BY id DESC";
                                        $query = mysqli_query($db, $sql);
                                        $i=0;

                                        $quantity = mysqli_num_rows($query);
                                        ?>
                                        <i class="fa-solid fa-heart cart heart-icon"></i><sup class="wishlist-count" style="top: -14px; color:#023021; "><?php echo $quantity; ?></sup>
                                        <?php
                                    }

                                    else  {
                                        $sql = "SELECT * FROM cart WHERE status=1 ORDER BY id DESC";
                                        $query = mysqli_query($db, $sql);
                                        $i=0;

                                        $quantity = mysqli_num_rows($query);
                                        ?>
                                        <i class="fa-solid fa-heart cart heart-icon"></i><sup class="wishlist-count" style="top: -14px; color:#023021; "><i class="fa-solid fa-circle-dot" style="font-size: 10px; color: #08c;"></i></sup>
                                        <?php
                                    }
                                        
                                    ?>
                                    
                                  </div>
                                </div>
                                <!--  -->
                                <div class="wishlist-panel px-2" id="wishlistPanel">
                                    <div class="wishlist-header">
                                      <h2 style="color:#023021; font-size: 20px; font-weight:600;">My Wishlist</h2>
                                      <button class="close-panel" id="closePanel">&times;</button>
                                    </div>

                                    <div class="wishlist-content">
                                        <!-- Wishlist Code -->

                                        <?php  

                                            if ( !empty($_SESSION['id']) ) {
                                                $sesmail = $_SESSION['id'];
                                                $sql = "SELECT * FROM cart WHERE user_id='$sesmail' AND status=1 ORDER BY id DESC";
                                                $query = mysqli_query($db, $sql);

                                                $quantity = mysqli_num_rows($query);

                                                if ( $quantity == 0 ) { ?>
                                                    <div class="alert alert-info wishlist-content text-center" role="alert">
                                                      Empty Your Wishlist
                                                    </div>
                                                <?php }

                                                else {

                                                    while ($row = mysqli_fetch_assoc($query)) {
                                                        $id             = $row['id'];
                                                        $cat_name       = $row['cat_name'];
                                                        $sub_id         = $row['sub_id'];
                                                        $user_id        = $row['user_id'];
                                                        $ip_address     = $row['ip_address'];
                                                        $status         = $row['status'];
                                                        $join_date      = $row['join_date'];

                                                        // rent part
                                                        $childSql = "SELECT * FROM rent_subcategory WHERE sub_id ='$sub_id' AND status=1 ORDER BY sub_id DESC";
                                                        $childQuery = mysqli_query($db, $childSql);

                                                        while ($row = mysqli_fetch_assoc($childQuery)) {
                                                            $sub_id         = $row['sub_id'];
                                                            $is_parent      = $row['is_parent'];
                                                            $subcat_name    = $row['subcat_name'];        
                                                            $img_one        = $row['img_one'];
                                                            ?>

                                                            <div class="row align-items-center py-2">
                                                                <div class="col-lg-3">
                                                                    <div class="show-img">
                                                                        <?php
                                                                            if (!empty($img_one)) {
                                                                                echo '<img src="admin/assets/images/subcategory/' . $img_one . '" alt="" style="height: 50px; width: 100%;">';
                                                                            } else {
                                                                                echo '<img src="admin/assets/images/dummy.jpg" alt="" style="height: 50px; width: 100%;">';
                                                                            }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <div class="d-flex justify-content-between">
                                                                        <h4 class="" style="font-size: 15px; color: #1a7e00; filter: drop-shadow(0px 0px 12px #1a7e00);">Rent <?php echo $cat_name; ?></h4>
                                                                        <form action="" method="POST">
                                                                            <input type="hidden" name="dData" value="<?php echo $id; ?>">
                                                                            <input type="submit" value="X">
                                                                        </form>
                                                                        <?php  
                                                                            if (isset($_POST['dData'])) {
                                                                                $deleteData = $_POST['dData'];
                                                                                $deleteSQL = "DELETE FROM cart WHERE id='$deleteData'";
                                                                                $deleteQuery = mysqli_query($db, $deleteSQL);

                                                                                if ($deleteQuery) {
                                                                                    header("Location: index.php");
                                                                                    exit();
                                                                                } else {
                                                                                    die("Mysqli_Error" . mysqli_error($db));
                                                                                }
                                                                            }
                                                                        ?>

                                                                    </div>
                                                                    <a href="details.php?rdId=<?php echo $sub_id; ?>"><p style="color: #023021; font-weight: 600;"> <?php echo $subcat_name; ?> </p></a>
                                                                    
                                                                    
                                                                    
                                                                </div>
                                                            </div>
                                                            <hr class="my-0">

                                                            <?php
                                                        }

                                                        // buy part
                                                        $childSql = "SELECT * FROM buy_subcategory WHERE sub_id ='$sub_id' AND status=1 ORDER BY sub_id DESC";
                                                        $childQuery = mysqli_query($db, $childSql);

                                                        while ($row = mysqli_fetch_assoc($childQuery)) {
                                                            $sub_id         = $row['sub_id'];
                                                            $is_parent      = $row['is_parent'];
                                                            $subcat_name    = $row['subcat_name'];        
                                                            $img_one        = $row['img_one'];
                                                            ?>

                                                            <div class="row align-items-center py-2">
                                                                <div class="col-lg-3">
                                                                    <div class="show-img">
                                                                        <?php
                                                                            if (!empty($img_one)) {
                                                                                echo '<img src="admin/assets/images/buy_subcategory/' . $img_one . '" alt="" style="height: 50px; width: 100%;">';
                                                                            } else {
                                                                                echo '<img src="admin/assets/images/dummy.jpg" alt="" style="height: 50px; width: 100%;">';
                                                                            }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <div class="d-flex justify-content-between">
                                                                        <h4 class="" style="font-size: 15px; color: #1a7e00; filter: drop-shadow(0px 0px 12px #1a7e00);">Buy <?php echo $cat_name; ?></h4>
                                                                        <!-- style="background: transparent; border: 0; filter: drop-shadow(0px 0px 12px #023021); font-size: 14px;" -->

                                                                        <form action="" method="POST">
                                                                            <input type="hidden" name="dData" value="<?php echo $id; ?>">
                                                                            <input type="submit" value="X">
                                                                        </form>
                                                                        <?php  
                                                                            if (isset($_POST['dData'])) {
                                                                                $deleteData = $_POST['dData'];
                                                                                $deleteSQL = "DELETE FROM cart WHERE id='$deleteData'";
                                                                                $deleteQuery = mysqli_query($db, $deleteSQL);

                                                                                
                                                                            }
                                                                        ?>

                                                                    </div>
                                                                    <a href="buy_details.php?rdId=<?php echo $sub_id; ?>"><p style="color: #023021; font-weight: 600;"> <?php echo $subcat_name; ?> </p></a>
                                                                    
                                                                    
                                                                    
                                                                </div>
                                                            </div>
                                                            <hr class="my-0">

                                                            <?php
                                                        }
                                                                    
                                                    }

                                                }
                                                // code
                                            }                                        
                                            // ---------------------------------------------
                                            else { ?>
                                                <div class="alert alert-success text-center" role="alert">
                                                  Login to check your List!
                                                </div>
                                            <?php }  
                                            // --------------------------------------------
                                            

                                            
                                        ?>

                                        <!-- Wishlist Code -->
                                    </div>

                                </div>
                                  <script src="scripts.php"></script>
                                <!--  -->

                                <div>
                                    
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
