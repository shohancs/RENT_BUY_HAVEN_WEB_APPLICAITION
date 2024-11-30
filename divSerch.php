<?php include"inc/header.php"; ?>

<main>

    


    <?php  
        if ( isset( $_GET['dId'] ) ) {
            $dId = $_GET['dId'];

            $rentDivSql = "SELECT * FROM rent_division WHERE id='$dId' AND status = 1 ORDER BY priority ASC";
            $rentDivQuery = mysqli_query( $db, $rentDivSql );
            $rentDivCount = mysqli_num_rows($rentDivQuery);

            if ( $rentDivCount == 0 ) { ?>
                <div class="alert alert-danger text-center" role="alert">
                  Sorry!! No data found.
                </div>
            <?php }
            else {

                while ( $row = mysqli_fetch_assoc( $rentDivQuery ) ) {
                    $id             = $row['id'];
                    $name           = $row['name'];
                    $priority       = $row['priority'];
                    $status         = $row['status'];
                    $join_date      = $row['join_date'];
                    ?>
                    <!-- START: Breadcrumb -->
                     <section class="py-5 bg-light">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 text-uppercase d-flex justify-content-between">
                                    <div>
                                        <h4 style="color: #023021; font-size: 25px;">Result: <?php echo $name; ?> Division</h4>
                                    </div>
                                    <div class="d-flex">
                                        <a href="index.php"><h4 style="color:#545454; font-size: 17px; font-weight: 400; ">HOME</h4></a>
                                        <h4 class="px-2" style="color:#545454; font-size: 17px; font-weight: 400; "> / </h4>
                                        <h4 style="color:#6c757d; font-size: 17px; font-weight: 400; "><?php echo $name; ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                     </section>
                    <!-- END: Breadcrumb -->

                    <!-- START: RESULT TOTAL -->
                     <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <p class="pt-5 pb-2" style="color: #023021; font-size: 20px;">
                                    <?php  
                                        $childSql = "SELECT * FROM rent_subcategory WHERE division_id ='$id' AND status=1 ORDER BY subcat_name ASC";
                                        $childQuery = mysqli_query($db, $childSql);
                                        $childSqlCount = mysqli_num_rows($childQuery);
                                        ?>
                                        <?php echo $childSqlCount; ?>
                                        <?php
                                    ?>+ results</p>
                               
                            </div>
                        </div>
                     </div>
                    <!-- END: RESULT TOTAL -->


                    <!-- START: Category Wise Product Showcase -->
                         <section class="">
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

                                                    $childSql = "SELECT * FROM rent_subcategory WHERE is_parent ='$cat_id' AND division_id='$dId' AND status=1 ORDER BY subcat_name ASC";
                                                    $childQuery = mysqli_query($db, $childSql);
                                                    $childSqlCount = mysqli_num_rows($childQuery);

                                                    if ( $childSqlCount == 0 ) { ?>
                                                        <div class="alert alert-danger text-center" role="alert">
                                                      Sorry!! No data Avaiable at this moment.
                                                    </div>
                                                    <?php }

                                                    else {
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

                                                        <div class="col-lg-4 pb-4">
                                                            <div class="bg-light">
                                                                <div>
                                                                    <div class="image_show">
                                                                       <div >
                                                                        <?php
                                                                            if (!empty($img_one)) {
                                                                                echo '<img src="admin/assets/images/subcategory/' . $img_one . '" alt="" style="height: 300px; width: 100%;">';
                                                                            } else {
                                                                                echo '<img src="admin/assets/images/dummy.jpg" alt="" style="height: 300px; width: 100%;">';
                                                                            }
                                                                        ?>
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
                                                                                        <p class="h-6 fw-light lh-sm py-2" style="text-align:justify; color:#023021;"><i class="fa-solid fa-location-dot px-1"></i> <?php echo $location; ?>, <span><?php echo $district; ?></span>, <span><?php echo $name; ?></span></p>                                        
                                                                                        <?php
                                                                                    } 
                                                                                ?>
                                                                                <div class="d-grid gap-2 pb-2">
                                                                                    <a href="details.php?rdId=<?php echo $sub_id; ?>" class="btn btn-outline-warning btn-3 px-3">View Details</a>
                                                                                </div>
                                                                </div>
                                                            </div> 
                                                        </div>

                                                        <?php
                                                            }
                                                        }

                                                    }

                                                    

                                                ?>
                                            </div>



                                        

                                    </div>
                                </div>
                            </div>
                         </section>
                        <!-- END: Category Wise Product Showcase -->

                    <?php
                }
            }


        }
    ?>

    

    

    

    

    
    <!-- START: QUESTION PART -->
     <section class="">
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