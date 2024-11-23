<?php include"inc/header.php"; ?>

<main>

    <!-- START: Breadcrumb -->
     <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-uppercase d-flex justify-content-between">
                    <div>
                        <h4 style="color: #023021; font-size: 25px;">EXPLORE RENT CATEGORY</h4>
                    </div>
                    <div class="d-flex">
                        <a href="index.php"><h4 style="color:#545454; font-size: 17px; font-weight: 400; ">HOME</h4></a>
                        <h4 class="px-2" style="color:#545454; font-size: 17px; font-weight: 400; "> / </h4>
                        <h4 style="color:#6c757d; font-size: 17px; font-weight: 400; ">RENT CATEGORY</h4>
                    </div>
                </div>
            </div>
        </div>
     </section>
    <!-- END: Breadcrumb -->


    <?php include"inc/rent_area.php"; ?>

    <!-- START: Category ShowCase -->
    <section class="pt-5">
        <div class="container">
            <div class="row">                
                <div class="col-lg-12 d-flex justify-content-center text-uppercase">
                    <?php  
                        $rentcategorySql = "SELECT * FROM rent_category WHERE status = 1 ORDER BY name ASC";
                        $rentcategoryQuery = mysqli_query( $db, $rentcategorySql );

                        while ( $row = mysqli_fetch_assoc( $rentcategoryQuery ) ) {
                            $cat_id         = $row['cat_id'];
                            $name           = $row['name'];
                            $slug           = $row['slug'];                                                     
                            $is_parent      = $row['is_parent'];
                            $description    = $row['description'];
                            $image          = $row['image'];
                            $status         = $row['status'];
                            $join_date      = $row['join_date'];
                            ?>
                                <a href="products.php"><p class="border border-dark-subtle p-3 me-4 category_name" style="color: #023021; font-size: 19px; letter-spacing: 0.9px; font-weight: 600;"><?php echo $name; ?></p></a>
                            <?php
                        }


                    ?>

                </div>
            </div>
        </div>
     </section>
    <!-- END: Category ShowCase -->

    <!-- START: RESULT TOTAL -->
     <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php  
                    $sql = "SELECT * FROM rent_subcategory WHERE status = 1";
                    $query = mysqli_query($db, $sql);

                    $count = mysqli_num_rows($query);

                    ?>
                     <p class="pt-5 pb-2" style="color: #023021; font-size: 20px;"><?php echo $count; ?>+ results</p>
                    <?php
                ?>
               
            </div>
        </div>
     </div>
    <!-- END: RESULT TOTAL -->

    

    <!-- START: Category Wise Product Showcase -->
     <section class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <?php
                        $rentcategorySql = "SELECT * FROM rent_category WHERE status = 1 ORDER BY name ASC";
                        $rentcategoryQuery = mysqli_query($db, $rentcategorySql);

                        while ($row = mysqli_fetch_assoc($rentcategoryQuery)) {
                            $cat_id         = $row['cat_id'];
                            $cat_name       = $row['name'];
                            ?>
                            <div style="border-left: 3px double #ffc107; padding: 0 2%;">
                                <h1 class=""  style="letter-spacing: 3px; color:#023021; font-size: 30px; font-weight:600; text-transform: uppercase;"><?php echo $cat_name; ?></h1>
                            </div>
                            

                            <div class="row py-5">

                            <?php

                                $childSql = "SELECT * FROM rent_subcategory WHERE is_parent ='$cat_id' AND status=1 ORDER BY subcat_name ASC";
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
                                    $i++;
                                ?>

                                <div class="col-lg-4 pb-4">
                                    <div class="bg-light">
                                        <div>
                                            <div class="image_show">
                                               <div >
                                                    <img src="assets/images/banner_slider.jpg" alt="" width="100%">
                                                </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="category">
                                                                <span class="badge text-bg-warning">FOR RENT</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="category-icon">
                                                                <form action="" method="POST">
                                                                    <button type="submit" style="background: transparent; border: 0;"><i class="fa-solid fa-heart text-danger"></i></button>
                                                                    
                                                                </form>
                                                                
                                                            </div> 
                                                        </div>
                                                    </div> 
                                                
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="py-4 px-3">
                                            <div class="row">
                                                <div class="col-lg-10">
                                                    <div>
                                                        <h4 class="" style="font-size: 17px; color: #1a7e00; filter: drop-shadow(0px 0px 12px #1a7e00);">Apartment</h4>
                                                        <h5 class="fw-semibold py-2" style="text-align:justify; color:#023021; letter-spacing: 0.5px;">Shapla Housing mountain room</h5>  
                                                        <h4 class="fw-semibold" style="color:#023021; letter-spacing: 0.7px;">৳24000 BDT <sup class="fw-medium">PER MONTH</sup></h4>
                                                                                            
                                                        
                                                        <div class="d-flex">
                                                            <div >
                                                                <i class="fa-solid fa-star text-warning"></i>
                                                                <i class="fa-solid fa-star text-warning"></i>
                                                                <i class="fa-solid fa-star text-warning"></i>
                                                                <i class="fa-solid fa-star-half-stroke text-warning"></i>
                                                                <i class="fa-regular fa-star text-warning"></i>
                                                            </div>
                                                            <p class="px-3">1458 review</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="verifiction-owner">
                                                        <img src="assets/images/dummy.png" alt="" class="ow_img">
                                                        <img src="assets/images/verified.png" alt="" class="verify">
                                                    </div> 
                                                </div>
                                            </div>

                                            <div class="px-4 py-1">
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex ">
                                                        <div><i class="fa-solid fa-bed" style="padding-right: 11px"></i></div>
                                                        <div><p>04 Bedrooms</p></div>
                                                    </div>
                                                    <div class="d-flex ">
                                                        <div><i class="fa-solid fa-kitchen-set" style="padding-right: 11px"></i></div>
                                                        <div><p>01 Kitchen</p></div>
                                                    </div>
                                                </div>

                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex ">
                                                        <div><i class="fa-solid fa-bath" style="padding-right: 11px"></i></div>
                                                        <div><p>02 Bathrooms</p></div>
                                                    </div>
                                                    
                                                    <div class="d-flex ">
                                                        <div><i class="fa-solid fa-house-user" style="padding-right: 11px"></i></div>
                                                        <div><p>1500 sqft</p></div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            <hr class="m-0 pb-2">
                                            <p class="h-6 fw-light lh-sm py-2" style="text-align:justify; color:#023021;"><i class="fa-solid fa-location-dot px-1"></i> 186/c1 Taltola, Agargaon, Dhaka</p>
                                            <div class="d-grid gap-2 pb-2">
                                                <a href="details.php" class="btn btn-outline-warning btn-3 px-3">View Details</a>
                                            </div>
                                        </div>
                                    </div> 
                                </div>

                                <?php
                                    }
                                }

                            ?>
                        </div>

                        <hr>
                        <h1>dummy part for store furnished</h1>



                    <!-- Stores -->
                    <div style="border-left: 3px double #ffc107; padding: 0 2%;">
                        <h1 class=""  style="letter-spacing: 3px; color:#023021; font-size: 30px; font-weight:600; text-transform: uppercase;">Stores</h1>
                    </div>
                    
                    <div class="row py-5">

                        <div class="col-lg-4 pb-4">
                            <div class="bg-light">
                                <div>
                                    <div class="image_show">
                                       <div >
                                            <img src="assets/images/banner_slider.jpg" alt="" width="100%">
                                        </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="category">
                                                        <span class="badge text-bg-warning">FOR RENT</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="category-icon">
                                                        <form action="" method="POST">
                                                            <button type="submit" style="background: transparent; border: 0;"><i class="fa-solid fa-heart text-danger"></i></button>
                                                            
                                                        </form>
                                                        
                                                    </div> 
                                                </div>
                                            </div> 
                                        
                                    </div>
                                    
                                </div>
                                
                                <div class="py-4 px-3">
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <div>
                                                <h4 class="" style="font-size: 17px; color: #1a7e00; filter: drop-shadow(0px 0px 12px #1a7e00);">Apartment</h4>
                                                <h5 class="fw-semibold py-2" style="text-align:justify; color:#023021; letter-spacing: 0.5px;">Shapla Housing mountain room</h5>  
                                                <h4 class="fw-semibold" style="color:#023021; letter-spacing: 0.7px;">৳24000 BDT <sup class="fw-medium">PER MONTH</sup></h4>
                                                                                    
                                                
                                                <div class="d-flex">
                                                    <div >
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                        <i class="fa-solid fa-star-half-stroke text-warning"></i>
                                                        <i class="fa-regular fa-star text-warning"></i>
                                                    </div>
                                                    <p class="px-3">1458 review</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="verifiction-owner">
                                                <img src="assets/images/dummy.png" alt="" class="ow_img">
                                                <img src="assets/images/verified.png" alt="" class="verify">
                                            </div> 
                                        </div>
                                    </div>

                                    <div class="px-4 py-1">

                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex ">
                                                <div><i class="fa-solid fa-couch" style="padding-right: 11px"></i></div>
                                                <div><p>Furnished</p></div>
                                            </div>
                                            
                                            <div class="d-flex ">
                                                <div><i class="fa-solid fa-house-user" style="padding-right: 11px"></i></div>
                                                <div><p>1500 sqft</p></div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <hr class="m-0 pb-2">
                                    <p class="h-6 fw-light lh-sm py-2" style="text-align:justify; color:#023021;"><i class="fa-solid fa-location-dot px-1"></i> 186/c1 Taltola, Agargaon, Dhaka</p>
                                    <div class="d-grid gap-2 pb-2">
                                        <a href="" class="btn btn-outline-warning btn-3 px-3">View Details</a>
                                    </div>
                                </div>
                            </div> 
                        </div>

                    </div>

                </div>
            </div>
        </div>
     </section>
    <!-- END: Category Wise Product Showcase -->

    
    <!-- START: QUESTION PART -->
     <section class="pt-5">
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
    
</main>
    
<?php include"inc/footer.php"; ?>