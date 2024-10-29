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

                    <div class="row pt-4">
                        <div class="col-lg-12">
                            <div class="d-flex justify-content-center">
                                <a href="">
                                    <div class="card me-5 py-3 service-card" style="width: 18rem;">
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
     <section class="py-5">
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
     </section>
    <!-- END: EXPLORE PART -->

    <!-- START: QUESTION PART -->
     <section class="py-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 question_part">
                    <div class="bg-white " style="margin: 10% auto; width: 65%;">
                        <h4 class="px-5 py-3" style="background: #1a7e00; color: #fff;">Got Questions? Ask Away!</h4 class="p-3">
                        <form action="" method="POST" class="px-5 py-5">
                            <div class="row">
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
                                        <input type="tel" name="phone" class="form-control" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Message</label>
                                <textarea name="desb" id="" class="form-control" placeholder="write here..." rows="5" ></textarea>
                            </div>
                            <div class="d-grid gap-2">
                                <input type="submit" value="SUBMIT" class="btn btn-primary quBtn">
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4 review-part p-5 d-flex align-items-center">
                    <div class="">
                        <h1 class="text-white pb-3" >Rent Buy Haven Provide Safe, Trusted And Reliable Collection!</h1>
                        <p class="text-white fw-light pb-3" style="">We offer customers reliable and regular collection of trash and materials, on a scheduled or call basis, with a safe and unique level of service for family.</p>
                        <a href="" class="quPartBtn">GET START NOW</a>

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
                                <div class="card">
                                    <div class="category_blog"> <p>Apartments</p> </div>
                                    <a href="" class="b_title h4 pb-3">Wastia Start Recycling Electric Car Batteries To Solve An Ecological Issue With A Circular Solution!</a>
                                    <p class="" style="text-align: justify; color: #677a74;">We partnered with community to create circular value ecosystem for electric and hybrid vehicle batteries, this will enable scarce raw materials to be reused through closed loop recycling...</p>
                                    <hr>
                                    <div class="d-flex">
                                        <p class="px-3"><i class="fa-regular fa-calendar-days"></i> September 2, 2024</p>
                                        <p><i class="fa-regular fa-user"></i> Habiba</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="blog-right">
                                <div class="rightBlogPart px-4">
                                    <div>
                                        <p class="text-warning link-underline-warning" ><u>Hottle</u></p>
                                        <a href="" class="b_title h4 py-2">Wastia Start Recycling Electric Car Batteries To Solve An Ecological Issue With A Circular Solution!</a>
                                        <div class="d-flex py-3">
                                            <p class="px-3"><i class="fa-regular fa-calendar-days"></i> September 2, 2024</p>
                                            <p><i class="fa-regular fa-user"></i> Habiba</p>
                                        </div>
                                        <hr>
                                    </div>
                                    <div>
                                        <p class="text-warning link-underline-warning" ><u>Hottle</u></p>
                                        <a href="" class="b_title h4 py-2">Wastia Start Recycling Electric Car Batteries To Solve An Ecological Issue With A Circular Solution!</a>
                                        <div class="d-flex py-3">
                                            <p class="px-3"><i class="fa-regular fa-calendar-days"></i> September 2, 2024</p>
                                            <p><i class="fa-regular fa-user"></i> Habiba</p>
                                        </div>
                                        <hr>
                                    </div>

                                    <div class="py-5">
                                      <a href="" class="quBtn" style="padding: 20px 35px;">Check All Blog Posts</a>  
                                      
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