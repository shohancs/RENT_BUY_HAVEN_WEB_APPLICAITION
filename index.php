<?php include"inc/header.php"; ?>

<main>
    <!-- START: Bannner Carousel Slider -->
     <section>
        <swiper-container style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="mySwiper"
        speed="600" parallax="true" pagination="true" pagination-clickable="true" navigation="true">
        <div slot="container-start" class="parallax-bg"
        style="background-image: linear-gradient(to left, rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url(assets/images/banner_slider.jpg); background-size:cover;" data-swiper-parallax="-23%"></div>

        <swiper-slide>
            <div class="title fs-1 fw-semibold text-warning text-center mb-2" data-swiper-parallax="-300" style='letter-spacing: 2px; font-family: "Acme", sans-serif;'>Rent to Buy: Save for Your Dream Home</div>
            <div class="subtitle text-center fs-4 fw-light mb-1" data-swiper-parallax="-200" style='letter-spacing: 1px;'>Affordable Rentals with a Path to Ownership</div>
            <div class="subtitle text-center fw-lighter lh-sm" data-swiper-parallax="-100" >
                Explore our discounted rental properties that help you save for a future home purchase. Start your journey toward homeownership today!
            </div>
        </swiper-slide>

        <swiper-slide>
            <div class="title fs-1 fw-semibold text-warning text-center mb-2" data-swiper-parallax="-300" style='letter-spacing: 2px; font-family: "Acme", sans-serif;'>Stay in Style: Hotel Rentals</div>
            <div class="subtitle text-center fs-4 fw-light mb-1" data-swiper-parallax="-200" style='letter-spacing: 1px;'>Luxury Stays at Unbeatable Prices</div>
            <div class="subtitle text-center fw-lighter lh-sm" data-swiper-parallax="-100">              
                Discover our curated selection of hotels available for rent. Enjoy comfort, convenience, and exceptional service during your stay.                
            </div>
        </swiper-slide>

        <swiper-slide>
            <div class="title fs-1 fw-semibold text-warning text-center mb-2" data-swiper-parallax="-300" style='letter-spacing: 2px; font-family: "Acme", sans-serif;'>Prime Retail Spaces for Rent</div>
            <div class="subtitle text-center fs-4 fw-light mb-1" data-swiper-parallax="-200" style='letter-spacing: 1px;'>Your Business Deserves the Best Location</div>
            <div class="subtitle text-center fw-lighter lh-sm" data-swiper-parallax="-100">
                Browse our commercial properties for rent—perfect for stores, boutiques, and businesses. Secure your ideal space today!
            </div>
        </swiper-slide>
        </swiper-container>
     </section>
    <!-- End: Bannner Carousel Slider -->

    <!-- START: Our Services -->
     <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="text-center fs-1 fw-semibold pt-3 " style="color:#023021; letter-spacing: 1px; ">Our Services</h1>
                    <div class="mb-3" style="border-bottom: 3px solid #ffc107;width: 5%;margin: 0px auto;"></div>

                    <div class="row py-5">
                        <div class="col-lg-12">
                            <div class="d-flex justify-content-center">
                                <a href="">
                                    <div class="card me-5 py-3 service-card" style="width: 18rem;">
                                    <div class="background-image"></div>
                                        <div class="card-body">                                        
                                            <img src="assets/images/rent.svg" alt="" class="w-50" style="margin:0 23%;">
                                            <h1 class="text-center pt-3 card-head" style="color:#023021;">Rent</h1>
                                            <p class="card-text text-center">Affordable housing options<br>Find your ideal place today!<br>Explore our listings. <br><span class="text-primary">Click Here..</span></p>
                                        </div>
                                    </div>
                                </a>
                                
                                <a href="">
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

    <!-- START: EXPLORE PART -->
     <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="pb-5">
                        <h1 class="text-center fs-1 fw-semibold pt-3 " style="color:#023021; letter-spacing: 1px; ">Explore Destinations</h1>
                        <div class="mb-3" style="border-bottom: 3px solid #ffc107;width: 5%;margin: 0px auto;"></div>
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
                            ?>
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
                                            $sub_id 		= $row['sub_id'];
                                            $is_parent		= $row['is_parent'];
                                            $subcat_name	= $row['subcat_name'];
                                            $slug 			= $row['slug'];
                                            $ow_name		= $row['ow_name'];
                                            $ow_email		= $row['ow_email'];
                                            $ow_phone		= $row['ow_phone'];
                                            $location		= $row['location'];
                                            $price			= $row['price'];
                                            $bed			= $row['bed'];
                                            $kitchen		= $row['kitchen'];
                                            $washroom		= $row['washroom'];
                                            $totalroom		= $row['totalroom'];
                                            $area_size		= $row['area_size'];
                                            $floor			= $row['floor'];
                                            $short_desc		= $row['short_desc'];
                                            $long_desc		= $row['long_desc'];
                                            $img_one		= $row['img_one'];
                                            $img_two		= $row['img_two'];
                                            $img_three		= $row['img_three'];
                                            $img_four		= $row['img_four'];
                                            $img_five		= $row['img_five'];
                                            $img_six		= $row['img_six'];
                                            $status 		= $row['status'];
                                            $join_date 		= $row['join_date'];
                                            ?>
                                                <div class="col-lg-3">
                                                    <div class="explore-card" style="border-radius: 8px; transition: 0.2s ease-in;">
                                                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                                            <div class="carousel-inner">
                                                                <div class="carousel-item active">
                                                                    <?php 
                                                                        if (!empty($img_one)) {
                                                                            echo '<img src="admin/assets/images/subcategory/' . $img_one . '" class="d-block w-100" alt="" style="width: 60px;">';
                                                                        } else {
                                                                            echo '<img src="admin/assets/images/dummy.jpg" class="d-block w-100" alt="" style="width: 60px;">';
                                                                        }
                                                                    ?>
                                                                </div>
                                                                <div class="carousel-item">
                                                                    <?php 
                                                                        if (!empty($img_two)) {
                                                                            echo '<img src="admin/assets/images/subcategory/' . $img_two . '" class="d-block w-100" alt="" style="width: 60px;">';
                                                                        } else {
                                                                            echo '<img src="admin/assets/images/dummy.jpg" class="d-block w-100" alt="" style="width: 60px;">';
                                                                        }
                                                                    ?>
                                                                </div>
                                                                <div class="carousel-item">
                                                                    <?php 
                                                                        if (!empty($img_three)) {
                                                                            echo '<img src="admin/assets/images/subcategory/' . $img_three . '" class="d-block w-100" alt="" style="width: 60px;">';
                                                                        } else {
                                                                            echo '<img src="admin/assets/images/dummy.jpg" class="d-block w-100" alt="" style="width: 60px;">';
                                                                        }
                                                                    ?>
                                                                </div>

                                                                <div class="carousel-item">
                                                                    <?php 
                                                                        if (!empty($img_four)) {
                                                                            echo '<img src="admin/assets/images/subcategory/' . $img_four . '" class="d-block w-100" alt="" style="width: 60px;">';
                                                                        } else {
                                                                            echo '<img src="admin/assets/images/dummy.jpg" class="d-block w-100" alt="" style="width: 60px;">';
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
                                                        <div class="d-flex justify-content-between p-3">
                                                            <div>
                                                                <h5 class="fw-bold">BDT <?php echo $price; ?>৳ <sup>PER MONTH</sup></h5>
                                                                <h6 class="fw-semibold" style="text-align:justify;"><?php echo $subcat_name; ?></h6>
                                                                
                                                                <p class="h-6 fw-light lh-sm" style="text-align:justify;"><?php echo $location; ?></p>
                                                                <div class="">
                                                                    <div class="d-flex justify-content-xl-around align-items-center">
                                                                        <i class="fa-solid fa-person-shelter"></i> <?php echo $totalroom; ?>
                                                                        <i class="fa-solid fa-bath"></i> <?php echo $washroom; ?>
                                                                        <i class="fa-solid fa-fire-burner"></i> <?php echo $kitchen; ?>
                                                                        <i class="fa-solid fa-house"></i></i> <?php echo $area_size; ?>
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
                            <?php
                        }
                    ?>

                    
                </div>
            </div>
        </div>
     </section>
    <!-- END: EXPLORE PART -->


    

    
</main>
    
<?php include"inc/footer.php"; ?>