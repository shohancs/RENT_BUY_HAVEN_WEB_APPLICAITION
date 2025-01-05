<?php include"inc/header.php"; ?>

<main>

    <!-- START: Bannner Carousel Slider -->

     <section class="banner-slider">
        <swiper-container style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="mySwiper"
        speed="600" parallax="true" pagination="true" pagination-clickable="true" navigation="true">
        <div slot="container-start" class="parallax-bg"
        style="background-image: linear-gradient(to left, rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url(assets/images/banner_slider.jpg); background-size:cover;" data-swiper-parallax="-23%"></div>

        <swiper-slide>
            <div class="title  fw-semibold text-warning text-center mb-2" data-swiper-parallax="-300" style="letter-spacing: 3px;font-family: Acme, sans-serif;transform: translate3d(0px, 0px, 0px);transition-duration: 0ms;font-size: 53px;line-height: 79px;">Rent to Buy: Save for Your Dream Home</div>
            <div class="subtitle text-center mb-1" data-swiper-parallax="-200" style="letter-spacing: 1px;transform: translate3d(0px, 0px, 0px);font-size: 27px;line-height: 57px;color: #fff; padding-bottom: 3px;">Affordable Rentals with a Path to Ownership</div>
            <div class="subtitle text-center fw-lighter lh-sm" data-swiper-parallax="-100" >
                Explore our discounted rental properties that help you save for a future home purchase. Start your journey toward homeownership today!
            </div>
        </swiper-slide>

        <swiper-slide>
            <div class="title  fw-semibold text-warning text-center mb-2" data-swiper-parallax="-300" style="letter-spacing: 3px;font-family: Acme, sans-serif;transform: translate3d(0px, 0px, 0px);transition-duration: 0ms;font-size: 53px;line-height: 79px;">Stay in Style: Hotel Rentals</div>
            <div class="subtitle text-center mb-1" data-swiper-parallax="-200" style="letter-spacing: 1px;transform: translate3d(0px, 0px, 0px);font-size: 27px;line-height: 57px;color: #fff; padding-bottom: 3px;">Luxury Stays at Unbeatable Prices</div>
            <div class="subtitle text-center fw-lighter lh-sm" data-swiper-parallax="-100">              
                Discover our curated selection of hotels available for rent. Enjoy comfort, convenience, and exceptional service during your stay.                
            </div>
        </swiper-slide>

        <swiper-slide>
            <div class="title  fw-semibold text-warning text-center mb-2" data-swiper-parallax="-300" style="letter-spacing: 3px;font-family: Acme, sans-serif;transform: translate3d(0px, 0px, 0px);transition-duration: 0ms;font-size: 53px;line-height: 79px;">Prime Retail Spaces for Rent</div>
            <div class="subtitle text-center mb-1" data-swiper-parallax="-200" style="letter-spacing: 1px;transform: translate3d(0px, 0px, 0px);font-size: 27px;line-height: 57px;color: #fff; padding-bottom: 3px;">Your Business Deserves the Best Location</div>
            <div class="subtitle text-center fw-lighter lh-sm" data-swiper-parallax="-100">
                Browse our commercial properties for rent—perfect for stores, boutiques, and businesses. Secure your ideal space today!
            </div>
        </swiper-slide>
        </swiper-container>
     </section>
    <!-- End: Bannner Carousel Slider -->
    

    <!-- START: Our Services -->
     <section class="py-5">
        <div class="container pt-3">
            <div class="row">
                <div class="col-lg-12">
                    <div style="border-left: 3px double #ffc107; padding: 0 2%;">
                        <h1 class=""  style="letter-spacing: 3px; color:#023021; font-size: 40px; font-weight:600;">Our Services</h1>
                    </div>
                    

                    <div class="row pt-4">
                        <div class="col-lg-12">
                            <div class="d-flex justify-content-center">
                                <a href="rent.php">
                                    <div class="card me-5 py-3 service-card" style="width: 18rem;">
                                        <div class="card-body">                                        
                                            <img src="assets/images/rent.svg" alt="" class="w-50" style="margin:0 23%;">
                                            <h1 class="text-center pt-3 card-head" style="color:#023021;">Rent</h1>
                                            <p class="card-text text-center">Affordable housing options<br>Find your ideal place today!<br>Explore our listings. <br><span class="text-primary">Click Here..</span></p>
                                        </div>
                                    </div>
                                </a>
                                
                                <a href="buy.php">
                                    <div class="card me-5 py-2 service-card" style="width: 18rem;">
                                        <div class="card-body">
                                            <img src="assets/images/buy.svg" alt="" class="w-50" style="margin:0 23%;">
                                            <h1 class="text-center pt-3" style="color:#023021;">Buy</h1>
                                            <p class="card-text text-center">Affordable housing options<br>Find your ideal place today!<br>Explore our listings. <br><span class="text-primary">Click Here..</span></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </section>
    <!-- END: Our Services -->


    <!-- START: RENT Services Part -->
    <section class="service-part pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex align-items-center justify-content-between">
                        <div style="border-left: 3px double #ffc107; padding: 0 2%;">
                            <p style="margin: 0; color:#023021;">Browse Hot Offer</p>
                            <h1 class=""  style="letter-spacing: 3px;  color:#023021; font-size: 40px; font-weight:600;">Explore Rent Category</h1>
                        </div>
                        <div>
                            <a href="rent.php" style="color:#023021;">Show all</a>
                        </div>
                    </div>
                    

                    <div class="py-5">
                        <swiper-container class="mySwiper" pagination="true" pagination-clickable="true" slides-per-view="3" space-between="30" free-mode="true">

                            <?php 
                                $rentcategorySql = "SELECT * FROM rent_category WHERE status = 1 ORDER BY name ASC";
                                $rentcategoryQuery = mysqli_query($db, $rentcategorySql);

                                while ($row = mysqli_fetch_assoc($rentcategoryQuery)) {
                                    $cat_id         = $row['cat_id'];
                                    $cat_name       = $row['name'];

                                    $childSql = "SELECT * FROM rent_subcategory WHERE is_parent ='$cat_id' AND status=1 ORDER BY sub_id DESC LIMIT 12";
                                    $childQuery = mysqli_query($db, $childSql);
                                    $childSqlCount = mysqli_num_rows($childQuery);

                                    while ($row = mysqli_fetch_assoc($childQuery)) {
                                        $sub_id         = $row['sub_id'];
                                        $is_parent      = $row['is_parent'];
                                        $subcat_name    = $row['subcat_name'];
                                        $slug           = $row['slug'];
                                        $ow_name        = $row['ow_name'];
                                        $ow_email       = $row['ow_email'];
                                        $ow_phone       = $row['ow_phone'];
                                        $district       = $row['district'];
                                        $division_id       = $row['division_id'];
                                        $location       = $row['location'];
                                        $price          = $row['price'];
                                        $bed            = $row['bed'];
                                        $kitchen        = $row['kitchen'];
                                        $washroom       = $row['washroom'];
                                        $totalroom      = $row['totalroom'];
                                        $area_size      = $row['area_size'];
                                        $floor          = $row['floor'];
                                        $rank           = $row['rank'];
                                        $decoration     = $row['decoration'];
                                        $desk           = $row['desk'];
                                        $wifi           = $row['wifi'];
                                        $hottub         = $row['hottub'];
                                        $currency       = $row['currency'];
                                        $ac             = $row['ac'];
                                        $pool           = $row['pool'];
                                        $park           = $row['park'];
                                        $gym            = $row['gym'];
                                        $luggage        = $row['luggage'];
                                        $availability   = $row['availability'];
                                        $short_desc     = $row['short_desc'];
                                        $long_desc      = $row['long_desc'];
                                        $ow_image       = $row['ow_image'];
                                        $img_one        = $row['img_one'];
                                        $img_two        = $row['img_two'];
                                        $img_three      = $row['img_three'];
                                        $img_four       = $row['img_four'];
                                        $img_five       = $row['img_five'];
                                        $img_six        = $row['img_six'];
                                        $status         = $row['status'];
                                        $google_map     = $row['google_map'];
                                        $join_date      = $row['join_date'];
                                        ?>
<swiper-slide class="text-start">
    <div>
        <div>
            <div class="show-img">
                <?php
                    if (!empty($img_one)) {
                        echo '<img src="admin/assets/images/subcategory/' . $img_one . '" alt="" style="height: 275px;">';
                    } else {
                        echo '<img src="admin/assets/images/dummy.jpg" alt="" style="height: 275px;">';
                    }
                ?>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="items">
                        <span class="badge text-bg-warning">FOR RENT</span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="items-icon">

                        <?php
                         $ipaddress = getenv("REMOTE_ADDR") ;
                        ?>

                        <form action="" method="POST">
                            <input type="hidden" name="sub_id" value="<?php echo $sub_id; ?>">
                            <input type="hidden" name="ip_address" value="<?php echo $ipaddress; ?>">
                            <input type="hidden" name="cat_name" value="<?php echo $cat_name; ?>">
                        <?php  
                            if(!empty( $_SESSION['email'] )) {

                                $sesId = $_SESSION['email'];

                                $sql = "SELECT * FROM role WHERE email='$sesId' AND status = 1";
                                $query = mysqli_query($db, $sql);

                                while ( $row = mysqli_fetch_assoc($query) ) {
                                    $id             = $row['id'];
                                    $name           = $row['name'];
                                    $email          = $row['email'];
                                    $phone          = $row['phone'];
                                    $address        = $row['address'];
                                    $password       = $row['password'];
                                    $role           = $row['role'];
                                    $image          = $row['image'];
                                    $nid            = $row['nid'];
                                    $status         = $row['status'];
                                    $join_date      = $row['join_date'];
                                    ?>
                                    <input type="hidden" name="user_id" value="<?php echo $id; ?>">
                                    <?php
                                }

                            }
                        ?>
                            <input type="hidden" name="status" value="1">
                            <button type="submit" name="cart" style="background: transparent; border: 0;"><i class="fa-solid fa-heart text-danger"></i></button>                               
                        </form>

                        <?php  
                        if ( isset( $_POST['cart'] ) ) {
                            $cat_name   = $_POST['cat_name'];
                            $sub_id     = $_POST['sub_id'];
                            $user_id    = $_POST['user_id'];
                            $ip_address = $_POST['ip_address'];
                            $status     = $_POST['status'];

                            // Check if the item already exists in the cart
                            $sql_check = "SELECT * FROM cart WHERE sub_id = '$sub_id' AND user_id = '$user_id'";
                            $result_check = mysqli_query($db, $sql_check);

                            if (mysqli_num_rows($result_check) > 0) {
                                // Item already exists, increment quantity
                                $row = mysqli_fetch_assoc($result_check);
                                $current_quantity = $row['quantity'];
                                $new_quantity = $current_quantity + 1;

                                $sql_update = "UPDATE cart SET quantity = $new_quantity WHERE sub_id = '$sub_id' AND user_id = '$user_id'";
                                $query_update = mysqli_query($db, $sql_update);
                            } else {
                                // Item doesn't exist, insert a new record
                                $sql = "INSERT INTO cart (cat_name, sub_id, user_id, ip_address, status, quantity, join_date) VALUES ('$cat_name', '$sub_id', '$user_id', '$ip_address', '$status', 1, now())";
                                $query = mysqli_query($db, $sql);
                            }

                            if ($query || $query_update) {
                                header("Location: index.php");
                                exit();
                            } else {
                                die('mysqli_query' . mysqli_error($db));
                            }

                           
                        }
                        ?>

                        
                    </div> 
                </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="py-4 px-3">
                                                                        <div class="row">
                                                                            <div class="col-lg-10">
                                                                                <div>
                                                                                    <h4 class="" style="font-size: 17px; color: #1a7e00; filter: drop-shadow(0px 0px 12px #1a7e00);"><?php echo $cat_name; ?></h4>
                                                                                    <h5 class="fw-semibold py-2" style="text-align:justify; color:#023021; letter-spacing: 0.5px;"><?php echo $subcat_name; ?></h5>  
                                                                                    <h4 class="fw-semibold" style="color:#023021; letter-spacing: 0.7px;">৳<?php echo $price; ?> BDT <sup class="fw-medium">PER 
                                                                                        <?php 
                                                                                            if ( $cat_id == 2 ) {
                                                                                                echo "NIGHT";
                                                                                            }
                                                                                            else {
                                                                                                echo "MONTH";
                                                                                            }
                                                                                        ?>
                                                                                         
                                                                                     </sup></h4>
                                                                                                                        
                                                                                    
                                                                                    <div class="d-flex">
                                                                                        <?php  
                                                                                            if ( $cat_id == 2 ) {
                                                                                                if ( $rank == 1 ) { ?>
                                                                                                    <div >
                                                                                                    <i class="fa-solid fa-star text-warning"></i>
                                                                                                    <i class="fa-solid fa-star text-warning"></i>
                                                                                                    <i class="fa-solid fa-star text-warning"></i>
                                                                                                    <i class="fa-solid fa-star text-warning"></i>
                                                                                                    <i class="fa-solid fa-star text-warning"></i>
                                                                                                </div>
                                                                                                <p class="px-3">Five Star</p>
                                                                                                <?php }

                                                                                                else if ( $rank == 2 ) { ?>
                                                                                                    <div >
                                                                                                    <i class="fa-solid fa-star text-warning"></i>
                                                                                                    <i class="fa-solid fa-star text-warning"></i>
                                                                                                    <i class="fa-solid fa-star text-warning"></i>
                                                                                                    <i class="fa-solid fa-star text-warning"></i>
                                                                                                </div>
                                                                                                <p class="px-3">Four Star</p>
                                                                                                <?php }

                                                                                                else if ( $rank == 3 ) { ?>
                                                                                                    <div >
                                                                                                    <i class="fa-solid fa-star text-warning"></i>
                                                                                                    <i class="fa-solid fa-star text-warning"></i>
                                                                                                    <i class="fa-solid fa-star text-warning"></i>
                                                                                                </div>
                                                                                                <p class="px-3">Three Star</p>
                                                                                                <?php }

                                                                                                else if ( $rank == 4 ) { ?>
                                                                                                    <div >
                                                                                                    <i class="fa-solid fa-star text-warning"></i>
                                                                                                    <i class="fa-solid fa-star text-warning"></i>
                                                                                                </div>
                                                                                                <p class="px-3">Two Star</p>
                                                                                                <?php }

                                                                                                else if ( $rank == 1 ) { ?>
                                                                                                    <div >
                                                                                                    <i class="fa-solid fa-star text-warning"></i>
                                                                                                </div>
                                                                                                <p class="px-3">One Star</p>
                                                                                                <?php }
                                                                                            }
                                                                                            else {
                                                                                                ?>
                                                                                                <div >
                                                                                                    <i class="fa-solid fa-star text-warning"></i>
                                                                                                    <i class="fa-solid fa-star text-warning"></i>
                                                                                                    <i class="fa-solid fa-star text-warning"></i>
                                                                                                    <i class="fa-solid fa-star-half-stroke text-warning"></i>
                                                                                                    <i class="fa-regular fa-star text-warning"></i>
                                                                                                </div>
                                                                                                <p class="px-3">1458 review</p>
                                                                                                <?php
                                                                                            }
                                                                                        ?>
                                                                                        
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-2">
                                                                                <div class="verifiction-owner">
                                                                                    <?php
                                                                                        if (!empty($ow_image)) {
                                                                                            echo '<img src="admin/assets/images/owner/' . $ow_image . '" alt="" class="ow_img">
                                                                                                <img src="assets/images/verified.png" alt="" class="verify">
                                                                                                ';
                                                                                        } else {
                                                                                            echo '
                                                                                                <img src="assets/images/dummy.png" alt="" class="ow_img">
                                                                                                    <img src="assets/images/verified.png" alt="" class="verify">
                                                                                            ';
                                                                                        }
                                                                                    ?>
                                                                                    
                                                                                </div> 
                                                                            </div>
                                                                        </div>

                                                                        <div class="px-4 py-1">
                                                                            <?php  
                                                                                if ( $cat_id == 3 ) { ?>
                                                                                    <div class="d-flex justify-content-between">
                                                                                        
                                                                                        <div class="d-flex ">
                                                                                            <div><i class="fa-solid fa-house-user" style="padding-right: 11px"></i></div>
                                                                                            <div><p><?php echo $area_size; ?> sqft</p></div>
                                                                                        </div>
                                                                                    </div>
                                                                                <?php }
                                                                                else { ?>
                                                                                    <div class="d-flex justify-content-between">
                                                                                        <div class="d-flex ">
                                                                                            <div><i class="fa-solid fa-bed" style="padding-right: 11px"></i></div>
                                                                                            <div><p><?php echo $bed; ?> Bedrooms</p></div>
                                                                                        </div>
                                                                                        <div class="d-flex ">
                                                                                            <div><i class="fa-solid fa-kitchen-set" style="padding-right: 11px"></i></div>
                                                                                            <div><p><?php echo $kitchen; ?> Kitchen</p></div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="d-flex justify-content-between">
                                                                                        <div class="d-flex ">
                                                                                            <div><i class="fa-solid fa-bath" style="padding-right: 11px"></i></div>
                                                                                            <div><p><?php echo $washroom; ?> Bathrooms</p></div>
                                                                                        </div>
                                                                                        
                                                                                        <div class="d-flex ">
                                                                                            <?php  
                                                                                                if ( $cat_id == 2 ) { ?>
                                                                                                    <div><i class="fa-regular fa-snowflake" style="padding-right: 11px"></i></div>
                                                                                            <div><p>
                                                                                                <?php
                                                                                                if ( $ac == 1 ) {
                                                                                                     echo "Air Conditioning";
                                                                                                 } 
                                                                                                 else {
                                                                                                    echo "No Air Conditioning";
                                                                                                 }
                                                                                                ?>
                                                                                            </p></div>
                                                                                                <?php }
                                                                                                else { ?>
                                                                                                    <div><i class="fa-solid fa-house-user" style="padding-right: 11px"></i></div>
                                                                                                    <div><p><?php echo $area_size; ?> sqft</p></div>
                                                                                                <?php }
                                                                                            ?>
                                                                                            
                                                                                        </div>
                                                                                    </div>
                                                                                <?php }
                                                                            ?>
                                                                            

                                                                            <div class="d-flex justify-content-between">
                                                                                <?php  

                                                                                    if ( $cat_id == 2 || $cat_id == 3 ) { 
                                                                                        if ( $decoration == 1 ) {?>
                                                                                            <div class="d-flex ">
                                                                                                <div><i class="fa-solid fa-couch" style="padding-right: 11px"></i></div>
                                                                                                <div><p>Furnished</p></div>
                                                                                            </div>
                                                                                        <?php }
                                                                                        else if ( $decoration == 2 ) {?>
                                                                                            <div class="d-flex ">
                                                                                                <div><i class="fa-solid fa-couch" style="padding-right: 11px"></i></div>
                                                                                                <div><p>Semi-Furnished</p></div>
                                                                                            </div>
                                                                                        <?php }
                                                                                        else if ( $decoration == 3 ) {?>
                                                                                            <div class="d-flex ">
                                                                                                <div><i class="fa-solid fa-couch" style="padding-right: 11px"></i></div>
                                                                                                <div><p>Non-Furnished</p></div>
                                                                                            </div>
                                                                                        <?php }

                                                                                        if ( !($cat_id == 1) ) {
                                                                                                if ( $park == 1 ) { ?>
                                                                                                    <div class="d-flex ">
                                                                                                        <div><i class="fa-solid fa-car-side" style="padding-right: 11px"></i></div>
                                                                                                        <div><p>Parking Jone</p></div>
                                                                                                    </div>
                                                                                                <?php }
                                                                                                else{ ?>
                                                                                                    <div class="d-flex ">
                                                                                                        <div><i class="fa-solid fa-car-side" style="padding-right: 11px"></i></div>
                                                                                                        <div><p>No Parking</p></div>
                                                                                                    </div>
                                                                                                <?php }
                                                                                            }
                                                                                    }
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        
                                                                        <hr class="m-0 pb-2">
                                                                        <?php  
                                                                            $divsql = "SELECT * FROM rent_division WHERE status=1 AND id='$division_id'";
                                                                            $divquery = mysqli_query($db, $divsql);

                                                                            while ( $row = mysqli_fetch_assoc($divquery) ) {
                                                                                $id             = $row['id'];
                                                                                $name           = $row['name'];
                                                                                $priority       = $row['priority'];
                                                                                $status         = $row['status'];
                                                                                ?>
                                                                                <p class="h-6 fw-light lh-sm py-2" style="text-align:justify; color:#023021; text-transform: capitalize;"><i class="fa-solid fa-location-dot px-1"></i> <?php echo $location; ?>, <span><?php echo $district; ?></span>, <span><?php echo $name; ?></span></p>                                        
                                                                                <?php
                                                                            } 
                                                                        ?>
                                                                        
                                                                        <div class="d-grid gap-2 pb-2">
                                                                            <a href="details.php?rdId=<?php echo $sub_id; ?>" class="btn btn-outline-warning btn-3 px-3">View Details</a>
                                                                        </div>
                                                                    </div>
                                                                </div>                                
                                                            </swiper-slide>
                                                        <?php
                                                    }
                                                }
                                                ?>

                                        </swiper-container>
                                    </div>

                                    
                                </div>
                            </div>
                        </div>
                        i
                     </section>
                    <!-- END: RENT Services Part -->

                    <!-- START: BUY Services Part -->
                    <section class="service-part pb-5 pt-3">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div style="border-left: 3px double #ffc107; padding: 0 2%;">
                                            <p style="margin: 0; color:#023021;">Browse Hot Offer</p>
                                            <h1 class=""  style="letter-spacing: 3px;  color:#023021; font-size: 40px; font-weight:600;">Explore Buy Category</h1>
                                        </div>
                                        <div>
                                            <a href="buy.php" style="color:#023021;">Show all</a>
                                        </div>
                                    </div>
                                    

                                    <div class="py-5">

                                        <swiper-container class="mySwiper" pagination="true" pagination-clickable="true" slides-per-view="3" space-between="30" free-mode="true">

                                            <?php 
                                                $rentcategorySql = "SELECT * FROM buy_category WHERE status = 1 ORDER BY priority_id ASC";
                                                    $rentcategoryQuery = mysqli_query($db, $rentcategorySql);

                                                    while ($row = mysqli_fetch_assoc($rentcategoryQuery)) {
                                                        $id             = $row['id'];
                                                        $catname        = $row['name'];
                                                        $priority_id    = $row['priority_id'];

                                                    $childSql = "SELECT * FROM buy_subcategory WHERE is_parent ='$id' AND status=1 ORDER BY subcat_name ASC";
                                                    $childQuery = mysqli_query($db, $childSql);
                                                    $childSqlCount = mysqli_num_rows($childQuery);

                                                    $i = 0;

                                                    while ($row = mysqli_fetch_assoc($childQuery)) {
                                                        $sub_id         = $row['sub_id'];
                                                        $is_parent      = $row['is_parent'];
                                                        $subcat_name    = $row['subcat_name'];
                                                        $slug           = $row['slug'];
                                                        $ow_name        = $row['ow_name'];
                                                        $ow_email       = $row['ow_email'];
                                                        $ow_phone       = $row['ow_phone'];
                                                        $district       = $row['district'];
                                                        $division_id       = $row['division_id'];
                                                        $location       = $row['location'];
                                                        $price          = $row['price'];
                                                        $bed            = $row['bed'];
                                                        $kitchen        = $row['kitchen'];
                                                        $washroom       = $row['washroom'];
                                                        $totalroom      = $row['totalroom'];
                                                        $area_size      = $row['area_size'];
                                                        $katha          = $row['katha'];
                                                        $floor          = $row['floor'];
                                                        $rank           = $row['rank'];
                                                        $decoration     = $row['decoration'];
                                                        $desk           = $row['desk'];
                                                        $wifi           = $row['wifi'];
                                                        $hottub         = $row['hottub'];
                                                        $currency       = $row['currency'];
                                                        $ac             = $row['ac'];
                                                        $pool           = $row['pool'];
                                                        $park           = $row['park'];
                                                        $gym            = $row['gym'];
                                                        $luggage        = $row['luggage'];
                                                        $availability   = $row['availability'];
                                                        $short_desc     = $row['short_desc'];
                                                        $long_desc      = $row['long_desc'];
                                                        $ow_image       = $row['ow_image'];
                                                        $img_one        = $row['img_one'];
                                                        $img_two        = $row['img_two'];
                                                        $img_three      = $row['img_three'];
                                                        $img_four       = $row['img_four'];
                                                        $img_five       = $row['img_five'];
                                                        $img_six        = $row['img_six'];
                                                        $status         = $row['status'];
                                                        $google_map     = $row['google_map'];
                                                        $join_date      = $row['join_date'];
                                                        $i++;
                                                        ?>
                                                            <swiper-slide class="text-start">
                                                                <div>
                                                                    <div>
                                                                        <div class="show-img">
                                                                            <?php
                                                                                if (!empty($img_one)) {
                                                                                    echo '<img src="admin/assets/images/buy_subcategory/' . $img_one . '" alt="" style="height: 275px;">';
                                                                                } else {
                                                                                    echo '<img src="admin/assets/images/dummy.jpg" alt="" style="height: 275px;">';
                                                                                }
                                                                            ?>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <div class="items">
                                                                                    <span class="badge text-bg-warning">FOR BUY</span>
                                                                                </div>
                                                                            </div>
                <div class="col-lg-6">
                    <div class="items-icon">

                        <?php
                         $ipaddress = getenv("REMOTE_ADDR") ;
                        ?>

                        <form action="" method="POST">
                            <input type="hidden" name="sub_id" value="<?php echo $sub_id; ?>">
                            <input type="hidden" name="ip_address" value="<?php echo $ipaddress; ?>">

                            <input type="hidden" name="cat_name" value="<?php echo $catname; ?>">
                        <?php  
                            if(!empty( $_SESSION['email'] )) {

                                $sesId = $_SESSION['email'];

                                $sql = "SELECT * FROM role WHERE email='$sesId' AND status = 1";
                                $query = mysqli_query($db, $sql);

                                while ( $row = mysqli_fetch_assoc($query) ) {
                                    $id             = $row['id'];
                                    $name           = $row['name'];
                                    $email          = $row['email'];
                                    $phone          = $row['phone'];
                                    $address        = $row['address'];
                                    $password       = $row['password'];
                                    $role           = $row['role'];
                                    $image          = $row['image'];
                                    $nid            = $row['nid'];
                                    $status         = $row['status'];
                                    $join_date      = $row['join_date'];
                                    ?>
                                    <input type="hidden" name="user_id" value="<?php echo $id; ?>">
                                    <?php
                                }

                            }
                        ?>
                            <input type="hidden" name="status" value="1">
                            <button type="submit" name="cart" style="background: transparent; border: 0;"><i class="fa-solid fa-heart text-danger"></i></button>                               
                        </form>

                        <?php  
                        if ( isset( $_POST['cart'] ) ) {
                            $cat_name   = $_POST['cat_name'];
                            $sub_id     = $_POST['sub_id'];
                            $user_id    = $_POST['user_id'];
                            $ip_address = $_POST['ip_address'];
                            $status     = $_POST['status'];

                            // Check if the item already exists in the cart
                            $sql_check = "SELECT * FROM cart WHERE sub_id = '$sub_id' AND user_id = '$user_id'";
                            $result_check = mysqli_query($db, $sql_check);

                            if (mysqli_num_rows($result_check) > 0) {
                                // Item already exists, increment quantity
                                $row = mysqli_fetch_assoc($result_check);
                                $current_quantity = $row['quantity'];
                                $new_quantity = $current_quantity + 1;

                                $sql_update = "UPDATE cart SET quantity = $new_quantity WHERE sub_id = '$sub_id' AND user_id = '$user_id'";
                                $query_update = mysqli_query($db, $sql_update);
                            } else {
                                // Item doesn't exist, insert a new record
                                $sql = "INSERT INTO cart (cat_name, sub_id, user_id, ip_address, status, quantity, join_date) VALUES ('$cat_name', '$sub_id', '$user_id', '$ip_address', '$status', 1, now())";
                                $query = mysqli_query($db, $sql);
                            }

                            if ($query || $query_update) {
                                header("Location: index.php");
                                exit();
                            } else {
                                die('mysqli_query' . mysqli_error($db));
                            }

                           
                        }
                        ?>

                        
                    </div> 
                </div>
            </div>
        </div>
        
        <div class="py-4 px-3">
            <div class="row">
                <div class="col-lg-10">
                    <div>
                        <h4 class="" style="font-size: 17px; color: #1a7e00; filter: drop-shadow(0px 0px 12px #1a7e00);"><?php echo $catname; ?></h4>
                        <h5 class="fw-semibold py-2" style="text-align:justify; color:#023021; letter-spacing: 0.5px;"><?php echo $subcat_name; ?></h5>  
                        <h4 class="fw-semibold" style="color:#023021; letter-spacing: 0.7px;">৳<?php echo $price; ?> BDT</h4>
                                                            
                        
                        <div class="d-flex">
                            <?php  
                                if ( $priority_id == 2 ) {
                                    if ( $rank == 1 ) { ?>
                                        <div >
                                        <i class="fa-solid fa-star text-warning"></i>
                                        <i class="fa-solid fa-star text-warning"></i>
                                        <i class="fa-solid fa-star text-warning"></i>
                                        <i class="fa-solid fa-star text-warning"></i>
                                        <i class="fa-solid fa-star text-warning"></i>
                                    </div>
                                    <p class="px-3">Five Star</p>
                                    <?php }

                                    else if ( $rank == 2 ) { ?>
                                        <div >
                                        <i class="fa-solid fa-star text-warning"></i>
                                        <i class="fa-solid fa-star text-warning"></i>
                                        <i class="fa-solid fa-star text-warning"></i>
                                        <i class="fa-solid fa-star text-warning"></i>
                                    </div>
                                    <p class="px-3">Four Star</p>
                                    <?php }

                                    else if ( $rank == 3 ) { ?>
                                        <div >
                                        <i class="fa-solid fa-star text-warning"></i>
                                        <i class="fa-solid fa-star text-warning"></i>
                                        <i class="fa-solid fa-star text-warning"></i>
                                    </div>
                                    <p class="px-3">Three Star</p>
                                    <?php }

                                    else if ( $rank == 4 ) { ?>
                                        <div >
                                        <i class="fa-solid fa-star text-warning"></i>
                                        <i class="fa-solid fa-star text-warning"></i>
                                    </div>
                                    <p class="px-3">Two Star</p>
                                    <?php }

                                    else if ( $rank == 1 ) { ?>
                                        <div >
                                        <i class="fa-solid fa-star text-warning"></i>
                                    </div>
                                    <p class="px-3">One Star</p>
                                    <?php }
                                }
                            ?>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="verifiction-owner">
                        <?php
                            if (!empty($ow_image)) {
                                echo '<img src="admin/assets/images/owner/' . $ow_image . '" alt="" class="ow_img">
                                    <img src="assets/images/verified.png" alt="" class="verify">
                                    ';
                            } else {
                                echo '
                                    <img src="assets/images/dummy.png" alt="" class="ow_img">
                                        <img src="assets/images/verified.png" alt="" class="verify">
                                ';
                            }
                        ?>
                        
                    </div> 
                </div>
            </div>

            <div class="px-4 py-1">
                <div class="d-flex justify-content-between">

                    <div class="d-flex ">
                        <div><i class="fa-solid fa-house-user" style="padding-right: 11px"></i></div>
                        <div><p><?php echo $area_size; ?> sqft</p></div>
                    </div>

                    <div class="d-flex ">
                        <div><i class="fa-solid fa-house-user" style="padding-right: 11px"></i></div>
                        <div><p><?php echo $katha; ?> Katha</p></div>
                    </div>
                </div>

                <?php  
                    if ( empty( $priority_id == 4 ) ) { ?>
                        <?php  
                            if ( $priority_id != 3) { ?>
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex ">
                                        <div><i class="fa-solid fa-bed" style="padding-right: 11px"></i></div>
                                        <div><p><?php echo $bed; ?> Bedrooms</p></div>
                                    </div>
                                    <div class="d-flex ">
                                        <div><i class="fa-solid fa-kitchen-set" style="padding-right: 11px"></i></div>
                                        <div><p><?php echo $kitchen; ?> Kitchen</p></div>
                                    </div>
                                </div>
                           <?php  }
                        ?>
                        

                        <div class="d-flex justify-content-between">
                            <div class="d-flex ">
                                <div><i class="fa-solid fa-bath" style="padding-right: 11px"></i></div>
                                <div><p>
                                    <?php
                                    if ( !empty( $washroom ) ) {
                                        echo $washroom;
                                    }
                                    else {
                                        echo "No";
                                    }
                                          
                                     ?> Bathrooms</p></div>
                            </div>

                            <div class="d-flex">
                                <?php  
                                    if ( $park == 1 ) { ?>
                                        <div class="d-flex ">
                                            <div><i class="fa-solid fa-car-side" style="padding-right: 11px"></i></div>
                                            <div><p>Parking Jone</p></div>
                                        </div>
                                    <?php }
                                    else{ ?>
                                        <div class="d-flex ">
                                            <div><i class="fa-solid fa-car-side" style="padding-right: 11px"></i></div>
                                            <div><p>No Parking</p></div>
                                        </div>
                                    <?php }
                                ?>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <div class="d-flex ">
                                <?php  
                                    if ( $decoration == 1 ) {?>
                                        <div class="d-flex ">
                                            <div><i class="fa-solid fa-couch" style="padding-right: 11px"></i></div>
                                            <div><p>Furnished</p></div>
                                        </div>
                                    <?php }
                                    else if ( $decoration == 2 ) {?>
                                        <div class="d-flex ">
                                            <div><i class="fa-solid fa-couch" style="padding-right: 11px"></i></div>
                                            <div><p>Semi-Furnished</p></div>
                                        </div>
                                    <?php }
                                    else if ( $decoration == 3 ) {?>
                                        <div class="d-flex ">
                                            <div><i class="fa-solid fa-couch" style="padding-right: 11px"></i></div>
                                            <div><p>Non-Furnished</p></div>
                                        </div>
                                    <?php }
                                ?>
                            </div>

                            <div class="d-flex">
                                <?php  
                                    if ( $ac == 1 ) { ?>
                                        <div class="d-flex ">
                                            <div><i class="fa-regular fa-snowflake" style="padding-right: 11px"></i></div>
                                            <div><p>Air Conditioning</p></div>
                                        </div>
                                    <?php }
                                    else{ ?>
                                        <div class="d-flex ">
                                            <div><i class="fa-regular fa-snowflake" style="padding-right: 11px"></i></div>
                                            <div><p>No Air Conditioning</p></div>
                                        </div>
                                    <?php }
                                ?>
                            </div>
                        </div>
                    <?php }
                ?>

                


            </div>
            
            
            <hr class="m-0 pb-2">
                <?php  
                    $divsql = "SELECT * FROM buy_division WHERE status=1 AND id='$division_id'";
                    $divquery = mysqli_query($db, $divsql);

                    while ( $row = mysqli_fetch_assoc($divquery) ) {
                        $id             = $row['id'];
                        $name           = $row['name'];
                        $priority       = $row['priority'];
                        $status         = $row['status'];
                        ?>
                        <p class="h-6 fw-light lh-sm py-2" style="text-align:justify; color:#023021;"><i class="fa-solid fa-location-dot px-1"></i> <?php echo $location; ?>, <span><?php echo $district; ?></span>, <span><?php echo $name; ?></span></p>                                        
                        <?php
                    } 
                ?>
                <div class="d-grid gap-2 pb-2">
                    <a href="buy_details.php?rdId=<?php echo $sub_id; ?>" class="btn btn-outline-warning btn-3 px-3">View Details</a>
                </div>
        </div>
    </div>                                
</swiper-slide>
                                        <?php
                                    }
                                }
                                ?>

                        </swiper-container>
                    </div>

                    
                </div>
            </div>
        </div>
     </section>
    <!-- END: BUY Services Part -->

    <!-- START: EXPLORE PART -->
     <!-- <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="pb-4">
                        <h1 class="text-center fs-1 fw-semibold " style="color:#023021; letter-spacing: 1px; ">Explore Destinations</h1>
                        <div class="mb-2" style="border-bottom: 3px solid #ffc107;width: 5%;margin: 0px auto;"></div>
                    </div>
                    

                    <?php
                        $rentCatSql = "SELECT * FROM rent_category WHERE status=1 ORDER BY name ASC";
                        $rentCatQuery = mysqli_query($db, $rentCatSql);

                        while ( $row = mysqli_fetch_assoc($rentCatQuery) ) {
                            $cat_id         = $row['cat_id'];
                            $name           = $row['name'];
                            $is_parent      = $row['is_parent'];
                            $description    = $row['description'];
                            $image          = $row['image'];
                            $status         = $row['status'];
                            
                            $childSql = "SELECT * FROM rent_subcategory WHERE is_parent ='$cat_id' AND status=1";
                            $childQuery = mysqli_query( $db, $childSql );
                            $childSqlCount = mysqli_num_rows($childQuery);
                            if ($childSqlCount != 0){ ?>
                                <div class="">
                                <div class="d-flex align-self-center justify-content-between py-5">
                                    <a href="" class="h2" style="color:#023021; filter: drop-shadow(0px 0px 20px #023021);"><?php echo $name; ?></a>
                                    <a href="" style="color:#023021;">Show all</a>
                                </div>
                                <div class="row">
                                    <?php
                                        $childSql = "SELECT * FROM rent_subcategory WHERE is_parent ='$cat_id' AND status=1 ORDER BY sub_id DESC LIMIT 4";
                                        $childQuery = mysqli_query($db, $childSql);

                                        while ($row = mysqli_fetch_assoc($childQuery)) {
                                            $sub_id         = $row['sub_id'];
                                            $is_parent      = $row['is_parent'];
                                            $subcat_name    = $row['subcat_name'];
                                            $slug           = $row['slug'];
                                            $ow_name        = $row['ow_name'];
                                            $ow_email       = $row['ow_email'];
                                            $ow_phone       = $row['ow_phone'];
                                            $location       = $row['location'];
                                            $price          = $row['price'];
                                            $bed            = $row['bed'];
                                            $kitchen        = $row['kitchen'];
                                            $washroom       = $row['washroom'];
                                            $totalroom      = $row['totalroom'];
                                            $area_size      = $row['area_size'];
                                            $floor          = $row['floor'];
                                            $short_desc     = $row['short_desc'];
                                            $long_desc      = $row['long_desc'];
                                            $img_one        = $row['img_one'];
                                            $img_two        = $row['img_two'];
                                            $img_three      = $row['img_three'];
                                            $img_four       = $row['img_four'];
                                            $img_five       = $row['img_five'];
                                            $img_six        = $row['img_six'];
                                            $status         = $row['status'];
                                            $join_date      = $row['join_date'];
                                            ?>
                                                <div class="col-lg-3">
                                                    <div class="explore-card" style="border-radius: 8px; transition: 0.2s ease-in; border: 1px solid #ccc;">
                                                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                                            <div class="carousel-inner">
                                                                <div class="carousel-item active">
                                                                    <?php 
                                                                        if (!empty($img_one)) {
                                                                            echo '<img src="admin/assets/images/subcategory/' . $img_one . '" class="d-block w-100" alt="" style="height: 215px; ">';
                                                                        } else {
                                                                            echo '<img src="admin/assets/images/dummy.jpg" class="d-block w-100" alt="" style="height: 215px; " >';
                                                                        }
                                                                    ?>
                                                                </div>
                                                                <div class="carousel-item">
                                                                    <?php 
                                                                        if (!empty($img_two)) {
                                                                            echo '<img src="admin/assets/images/subcategory/' . $img_two . '" class="d-block w-100" alt="" style="height: 215px; ">';
                                                                        } else {
                                                                            echo '<img src="admin/assets/images/dummy.jpg" class="d-block w-100" alt="" style="height: 215px; ">';
                                                                        }
                                                                    ?>
                                                                </div>
                                                                <div class="carousel-item">
                                                                    <?php 
                                                                        if (!empty($img_three)) {
                                                                            echo '<img src="admin/assets/images/subcategory/' . $img_three . '" class="d-block w-100" alt="" style="height: 215px; ">';
                                                                        } else {
                                                                            echo '<img src="admin/assets/images/dummy.jpg" class="d-block w-100" alt="" style="height: 215px; ">';
                                                                        }
                                                                    ?>
                                                                </div>

                                                                <div class="carousel-item">
                                                                    <?php 
                                                                        if (!empty($img_four)) {
                                                                            echo '<img src="admin/assets/images/subcategory/' . $img_four . '" class="d-block w-100" alt="" style="height: 215px; ">';
                                                                        } else {
                                                                            echo '<img src="admin/assets/images/dummy.jpg" class="d-block w-100" alt="" style="height: 215px; ">';
                                                                        }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                                <span class="visually-hidden">Previous</span>
                                                            </button>
                                                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                                <span class="visually-hidden">Next</span>
                                                            </button>
                                                        </div>
                                                        <div class="top-text "><span class="badge text-bg-warning">FOR RENT</span></div>
                                                        <div class="d-flex justify-content-between p-3">
                                                            <div>
                                                                <h5 class="fw-bold" style="color:#023021;">৳<?php echo $price; ?> BDT <sup>PER MONTH</sup></h5>
                                                                <h6 class="fw-semibold" style="text-align:justify; color:#023021;""><?php echo $subcat_name; ?></h6>
                                                                
                                                                <p class="h-6 fw-light lh-sm" style="text-align:justify; color:#023021;""><?php echo $location; ?></p>
                                                                <div class="">
                                                                    <div class="d-flex justify-content-xl-around align-items-center">
                                                                        <i class="fa-solid fa-person-shelter" style="color:#023021;"></i> <?php echo $totalroom; ?>
                                                                        <i class="fa-solid fa-bath" style="color:#023021;"></i> <?php echo $washroom; ?>
                                                                        <i class="fa-solid fa-fire-burner" style="color:#023021;"></i> <?php echo $kitchen; ?>
                                                                        <i class="fa-solid fa-house" style="color:#023021;"></i></i> <?php echo $area_size; ?>sqft
                                                                    </div>
                                                                </div>
                                                                <div class="d-grid gap-2 py-3">
                                                                    <a href="" class="btn btn-outline-warning btn-3 px-3">View Details</a>
                                                                </div>
                                                            </div>
                                                            <div><i class="fa-regular fa-heart text-danger"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                        }
                                    ?>
                                    
                                </div>
                                    
                            </div>
                           <?php }


                            
                        }
                    ?>

                    
                </div>
            </div>
        </div>
     </section> -->
    <!-- END: EXPLORE PART -->

    <!-- START: FAQ PART -->
     <section class="text-bg-light py-5">
        <div class="container pt-5">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="d-flex">
                        <div>
                            <img src="assets/images/faq1.jpg" alt="" width="90%">
                        </div>
                        <div style="margin: 20% 0px 0px">
                            <img src="assets/images/faq2.jpg" alt="" width="90%">
                        </div>
                    </div>
                    
                </div>
                <div class="col-lg-6">                
                    <div style="border-left: 3px double #ffc107; padding: 0 3%;">
                        <h1 class=""  style="letter-spacing: 3px; font-family: &quot;Acme&quot; sans-serif; color:#023021; font-size: 40px; font-weight:600;">FAQ Services</h1>
                    </div>

                    <div class="pt-5">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    What are the available packages for property listings?
                                </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    We offer multiple packages for property listings, allowing sellers to select one based on their needs. Each package comes with different benefits, such as the number of properties allowed, enhanced visibility, and additional verification services. This makes it easier for property owners to choose a plan that suits their budget and listing requirements.
                                </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    How does the property verification process work?
                                </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Each property goes through a multi-step verification process. First, a field checker verifies the authenticity of the property and confirms ownership based on the selected package. After this initial check, our super admin performs a final review to approve the listing for display on the platform, ensuring users can trust the listings they see.
                                </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    What payment options are available, and is there a transaction fee?
                                </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    We support various payment methods, including cryptocurrency payments via CoinGate. Each transaction incurs a 1% platform fee, which is deducted from the total before releasing funds to the seller. This fee covers operational costs and helps us provide a secure and seamless transaction experience.
                                </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    How do users create accounts and access services?
                                </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                Users can create accounts on the platform to access property listings and other services. Once registered, users can browse listings, communicate with sellers, and make payments directly through their account. We also offer additional services beyond property listings, making it easy for users to find the resources they need in one place.
                                </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    How does the platform ensure the security of transactions and data?
                                </button>
                                </h2>
                                <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                Security is a top priority for us. We use encryption for all transactions and sensitive data storage, ensuring users personal information and financial details remain safe. Our system also includes multi-factor authentication and regular security audits to protect against unauthorized access and data breaches.
                                </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    What types of customer support are available for users and sellers?
                                </button>
                                </h2>
                                <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                We offer comprehensive customer support via email, chat, and phone. Our support team assists with account setup, payments, verification issues, and general inquiries about using the platform. Additionally, we provide dedicated support for sellers, helping them with listing management, package upgrades, and technical troubleshooting.
                                </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                    What types of properties are listed on the platform?
                                </button>
                                </h2>
                                <div id="collapseSeven" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                Our platform supports a variety of property types, including apartments, hotels, and commercial spaces like stores. Each listing provides detailed information about the property, including amenities, location, pricing, and availability. We aim to cater to a wide range of users, whether they're looking to rent, buy, or invest in different property types.
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </section>
    <!-- END: FAQ PART -->

    <!-- START: CONTACT -->
     <div class="text-bg-light pb-5 pt-3" >
        <section class="p-5 " style="background: #1a7e00; color: #fff; width: 60%; margin: 0px auto; border-radius: 10px;">
        <div class="d-flex justify-content-evenly align-items-center">
            <div>
                <h3 style="font-size: 20px; letter-spacing:1px; margin-bottom: 2px;">Get In Tour</h3>
                <h1><a href="mailto:rentbuyhaven@gmail.com" style="font-size: 25px; color:#fff; letter-spacing:1px;">rentbuyhaven@gmail.com</a></h1>
            </div>
            <div>
                <h1 class="rounded-circle py-2 px-3" style="background: #fff; color: #05362e;">or</h1>
            </div>
            <div>
            <h3 style="font-size: 20px; letter-spacing:1px; margin-bottom: 2px;">Call Us Via</h3>
            <h1><a href="tel:01758745698" style="font-size: 25px; color:#fff; letter-spacing:1px;">+880 1758745698</a></h1>
            </div>
        </div>
     </section>
     </div>
     
     
    <!-- END: CONTACT -->

    <!-- START: QUESTION PART -->
     <section class="pb-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 question_part">
                    <div class="bg-white " style="margin: 10% auto; width: 65%;">
                        <h4 class="px-5 py-3" style="background: #1a7e00; color: #fff;">Got Questions? Ask Away!</h4 class="p-3">
                        <form action="" method="POST" class="px-5 py-5">
                            <div class="row">
                                <!--  -->
                                <?php  
                                    if ( !empty( $_SESSION['email'] ) ) { ?>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Message</label>
                                            <textarea name="msg" id="" class="form-control" placeholder="write here..." rows="5" required></textarea>
                                        </div>
                                        <div class="d-grid gap-2">
                                            <?php  
                                                if ( isset( $_SESSION['email'] ) ) {
                                                    $sesId = $_SESSION['email'];

                                                    $sql = "SELECT * FROM role WHERE email='$sesId'";
                                                    $query = mysqli_query($db, $sql);

                                                    while ( $row = mysqli_fetch_assoc($query) ) {
                                                        $id             = $row['id'];
                                                        $name           = $row['name'];
                                                        $email          = $row['email'];
                                                        $phone          = $row['phone'];
                                                        $address        = $row['address'];
                                                        $password       = $row['password'];
                                                        $role           = $row['role'];
                                                        $image          = $row['image'];
                                                        $nid            = $row['nid'];
                                                        $status         = $row['status'];
                                                        ?>
                                                        <input type="hidden" name="fname" value="<?php echo $name; ?>">
                                                        <input type="hidden" name="email" value="<?php echo $email; ?>">
                                                        <input type="hidden" name="phone" value="<?php echo $phone; ?>">
                                                        <input type="hidden" name="role" value="<?php echo $role; ?>">
                                                        <?php
                                                    }
                                                }
                                            ?>
                                            <input type="hidden" name="status" value="2">
                                            
                                            <!--  -->
                                            <?php  
                                                if ( !empty( $_SESSION['email'] ) ) { ?>
                                                    <input type="submit" name="masg" value="SUBMIT" class="btn btn-primary quBtn">
                                                <?php }
                                                else { ?>
                                                    <div class="alert alert-info my-4 text-center" role="alert">
                                                      Login to reserve you service. <a href="login.php">Click Here</a>
                                                    </div>
                                               <?php }
                                            ?>
                                            <!--  -->
                                            
                                        </div>
                                    <?php }
                                    else { ?>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">First Name</label>
                                                <input type="text" name="fname" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Last Name</label>
                                                <input type="text" name="lname" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Email Address</label>
                                                <input type="email" name="email" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Phone</label>
                                                <input type="tel" name="phone" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="" class="form-label">Message</label>
                                            <textarea name="msg" id="" class="form-control" placeholder="write here..." rows="5" required></textarea>
                                        </div>
                                        <div class="d-grid gap-2">
                                            <input type="hidden" name="status" value="2">
                                            <input type="hidden" name="role" value="3">
                                            <input type="submit" name="masg" value="SUBMIT" class="btn btn-primary quBtn">
                                            
                                        </div>
                                   <?php }
                                ?>
                                <!--  -->
                                
                            </div>
                            
                        </form>
                        <?php  
                            if ( isset($_POST['masg']) ) {
                                $fname  = mysqli_real_escape_string($db, $_POST['fname']);
                                $lname  = mysqli_real_escape_string($db, $_POST['lname']);
                                $email  = mysqli_real_escape_string($db, $_POST['email']);
                                $phone  = mysqli_real_escape_string($db, $_POST['phone']);
                                $msg    = mysqli_real_escape_string($db, $_POST['msg']);
                                $role   = mysqli_real_escape_string($db, $_POST['role']);
                                $status = mysqli_real_escape_string($db, $_POST['status']);

                                $sql = "INSERT INTO message (role, status, fname, lname, email, phone, msg, join_date) VALUES('$role', '$status', '$fname', '$lname', '$email', '$phone', '$msg', now())";
                                $query = mysqli_query($db, $sql);

                                if ( $query ) {
                                    header('Location: index.php');
                                }
                                else {
                                    die("Mysqli_Error" . mysqli_error($db));
                                }
                            }
                        ?>
                    </div>
                </div>

                <div class="col-lg-4 review-part p-5 d-flex align-items-center">
                    <div class="">
                        <h1 class="text-white pb-3" >Rent Buy Haven Provide Safe, Trusted And Reliable Collection!</h1>
                        <p class="text-white fw-light pb-3" style="">We offer customers reliable and regular collection of trash and materials, on a scheduled or call basis, with a safe and unique level of service for family.</p>
                        <a href="packages.php" class="quPartBtn">GET START NOW</a>

                        <div class="row d-flex align-items-center pt-5 mt-4">
                            <div class="col-lg-3" style="text-align: center;">
                            <i class="fa-solid fa-sack-dollar cost"></i>
                            </div>
                            <div class="col-lg-9">
                                <h5 class="text-white pb-2">Great Service & Low Cost</h5>
                                <p class="text-white fw-light">If your business is looking for reliable, cost effective general waste collection then you should cgoose us now!</p>
                            </div>
                        </div>
                    </div>
                    
                </div>

                
            </div>
        </div>
     </section>
    <!-- END: QUESTION PART -->

    <!-- START: Blog Part -->
     <section>
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="fs-1 fw-semibold" style="color: #05362e;">Recent News And Articles</h1>
                    <div class="row py-5">
                        <div class="col-lg-6">
                            <div class="blog-left">
                                <?php  
                                    $sql = "SELECT * FROM blog WHERE status=1 ORDER BY id ASC LIMIT 1";
                                    $query = mysqli_query($db, $sql);

                                    while ( $row = mysqli_fetch_assoc( $query ) ) {
                                        $id             = $row['id'];
                                        $name           = $row['name'];
                                        $cateId         = $row['cateId'];
                                        $title          = $row['title'];
                                        $details        = $row['details'];
                                        $image          = $row['image'];
                                        $status         = $row['status'];
                                        $join_date      = $row['join_date'];
                                        ?>

                                        <div class="card">
                                            <div class="category_blog">
                                                <?php
                                                $catSql = "SELECT * FROM buy_category WHERE id='$cateId' AND status=1";
                                                $catQuery = mysqli_query($db, $catSql);

                                                while ($row = mysqli_fetch_assoc($catQuery)) {
                                                    $catid      = $row['id'];
                                                    $is_parent  = $row['is_parent'];
                                                    $catname       = $row['name'];
                                                ?>
                                                <p><?php echo $catname; ?></p>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <a href="blog.php" class="b_title h4 pb-3"><?php echo $title; ?></a>
                                            <p class="" style="text-align: justify; color: #677a74;"><?php echo  substr($details, 0,250) ?>...</p>
                                            <hr>
                                            <div class="d-flex">
                                                <p class="px-3"><i class="fa-regular fa-calendar-days"></i> <?php echo $join_date; ?></p>
                                                <p><i class="fa-regular fa-user"></i> <?php echo $name; ?></p>
                                            </div>

                                        </div>

                                        <?php
                                    }
                                ?>
                                
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="blog-right">
                                <div class="rightBlogPart px-4">
                                    <?php  
                                        $sql = "SELECT * FROM blog WHERE status=1 ORDER BY id DESC LIMIT 3";
                                        $query = mysqli_query($db, $sql);

                                        while ( $row = mysqli_fetch_assoc( $query ) ) {
                                            $id             = $row['id'];
                                            $name           = $row['name'];
                                            $cateId         = $row['cateId'];
                                            $title          = $row['title'];
                                            $details        = $row['details'];
                                            $image          = $row['image'];
                                            $status         = $row['status'];
                                            $join_date      = $row['join_date'];
                                            ?>
                                            <div>
                                                <p class="text-warning link-underline-warning" ><u><?php
                                                $catSql = "SELECT * FROM buy_category WHERE id='$cateId' AND status=1";
                                                $catQuery = mysqli_query($db, $catSql);

                                                while ($row = mysqli_fetch_assoc($catQuery)) {
                                                    $catid      = $row['id'];
                                                    $is_parent  = $row['is_parent'];
                                                    $catname       = $row['name'];
                                                ?>
                                                <?php echo $catname; ?>
                                                <?php
                                                }
                                                ?></u></p>
                                                <a href="blog.php" class="b_title h4 py-2"><?php echo $title; ?></a>
                                                <div class="d-flex py-3">
                                                    <p class="px-3"><i class="fa-regular fa-calendar-days"></i> <?php echo $join_date; ?></p>
                                                    <p><i class="fa-regular fa-user"></i> <?php echo $name; ?></p>
                                                </div>
                                                <hr>
                                            </div>
                                            <?php

                                        }
                                        ?>

                                    <div class="py-5">
                                      <a href="blog.php" class="quBtn" style="padding: 20px 35px;">Check All Blog Posts</a>  
                                      
                                    </div>                                    

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </section>
    <!-- END: Blog Part -->
    
</main>
    
<?php include"inc/footer.php"; ?>