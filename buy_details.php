<?php include"inc/header.php"; ?>

<main>

    <?php  
        if ( isset($_GET['rdId']) ) {
            $rentDetailsId = $_GET['rdId'];

            $sql = "SELECT * FROM buy_subcategory WHERE status=1 AND sub_id ='$rentDetailsId'";
            $query = mysqli_query($db, $sql);

            while( $row = mysqli_fetch_assoc($query) ) {
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
                $breakfast      = $row['breakfast'];
                $restourant     = $row['restourant'];
                $ac             = $row['ac'];
                $pool           = $row['pool'];
                $park           = $row['park'];
                $gym            = $row['gym'];
                $luggage        = $row['luggage'];
                $drwaing        = $row['drwaing'];
                $dinning        = $row['dinning'];
                $balcony        = $row['balcony'];
                $garage         = $row['garage'];
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

                <!-- START: Breadcrumb -->
                 <section class="py-5 bg-light">
                    <div class="container">
                        <div class="row">
                            
                                    <div class="col-lg-12 text-uppercase d-flex justify-content-between">
                                        <?php  

                                                $sql = "SELECT * FROM buy_category WHERE status = 1 AND id='$is_parent'";
                                                $query = mysqli_query( $db, $sql );

                                                while ($row = mysqli_fetch_assoc($query)) {
                                                    $cat_id         = $row['id'];
                                                    $cat_name       = $row['name'];
                                                    $priority_id    = $row['priority_id'];
                                                    ?>
                                        <div>
                                            <h4 style="color: #023021; font-size: 25px;">Buy Details <?php echo $cat_name; ?> </h4>
                                        </div>
                                        <div class="d-flex">
                                            <a href="index.php"><h4 style="color:#545454; font-size: 17px; font-weight: 400; ">HOME</h4></a>
                                            <h4 class="px-2" style="color:#545454; font-size: 17px; font-weight: 400; "> / </h4>
                                            <a href="buy.php"><h4 style="color:#545454; font-size: 17px; font-weight: 400; ">BUY CATEGORY</h4></a>
                                            <h4 class="px-2" style="color:#545454; font-size: 17px; font-weight: 400; "> / </h4>
                                            
                                                    <a href="buy_products.php?pid=<?php echo $cat_id; ?>"><h4 style="color:#545454; font-size: 17px; font-weight: 400; "><?php echo $cat_name; ?></h4></a>
                                                    <?php
                                                    }

                                                ?>
                                            
                                            <h4 class="px-2" style="color:#545454; font-size: 17px; font-weight: 400; "> / </h4>
                                            <h4 style="color:#6c757d; font-size: 17px; font-weight: 400; "><?php echo $slug; ?></h4>
                                        </div>
                                    </div>
                                    
                            
                        </div>
                    </div>
                 </section>
                <!-- END: Breadcrumb -->

                <!-- START: Product DETAILS IMAGE -->
                 <section class="product-image">
                 <div class="container">
                    <div class="mySlides">
                        <div class="numbertext">1 / 6</div>
                        <?php
                            if (!empty($img_one)) {
                                echo '<img src="admin/assets/images/buy_subcategory/' . $img_one . '" alt="" style="width:100%;height: 676px;object-fit: scale-down;">';
                            } else {
                                echo '<img src="admin/assets/images/dummy.jpg" alt="" style="width:100%;height: 676px;object-fit: scale-down;">';
                            }
                        ?>
                    </div>

                    <div class="mySlides">
                        <div class="numbertext">2 / 6</div>
                        <?php
                            if (!empty($img_two)) {
                                echo '<img src="admin/assets/images/buy_subcategory/' . $img_two . '" alt="" style="width:100%;height: 676px;object-fit: scale-down;">';
                            } else {
                                echo '<img src="admin/assets/images/dummy.jpg" alt="" style="width:100%;height: 676px;object-fit: scale-down;">';
                            }
                        ?>
                    </div>

                    <div class="mySlides">
                        <div class="numbertext">3 / 6</div>
                        <?php
                            if (!empty($img_three)) {
                                echo '<img src="admin/assets/images/buy_subcategory/' . $img_three . '" alt="" style="width:100%;height: 676px;object-fit: scale-down;">';
                            } else {
                                echo '<img src="admin/assets/images/dummy.jpg" alt="" style="width:100%;height: 676px;object-fit: scale-down;">';
                            }
                        ?>
                    </div>
                        
                    <div class="mySlides">
                        <div class="numbertext">4 / 6</div>
                        <?php
                            if (!empty($img_four)) {
                                echo '<img src="admin/assets/images/buy_subcategory/' . $img_four . '" alt="" style="width:100%;height: 676px;object-fit: scale-down;">';
                            } else {
                                echo '<img src="admin/assets/images/dummy.jpg" alt="" style="width:100%;height: 676px;object-fit: scale-down;">';
                            }
                        ?>
                    </div>

                    <div class="mySlides">
                        <div class="numbertext">5 / 6</div>
                        <?php
                            if (!empty($img_five)) {
                                echo '<img src="admin/assets/images/buy_subcategory/' . $img_five . '" alt="" style="width:100%;height: 676px;object-fit: scale-down;">';
                            } else {
                                echo '<img src="admin/assets/images/dummy.jpg" alt="" style="width:100%;height: 676px;object-fit: scale-down;">';
                            }
                        ?>
                    </div>
                        
                    <div class="mySlides">
                        <div class="numbertext">6 / 6</div>
                        <?php
                            if (!empty($img_six)) {
                                echo '<img src="admin/assets/images/buy_subcategory/' . $img_six . '" alt="" style="width:100%;height: 676px;object-fit: scale-down;">';
                            } else {
                                echo '<img src="admin/assets/images/dummy.jpg" alt="" style="width:100%;height: 676px;object-fit: scale-down;">';
                            }
                        ?>
                    </div>
                        
                    <a class="prev" onclick="plusSlides(-1)">❮</a>
                    <a class="next" onclick="plusSlides(1)">❯</a>

                    <div class="caption-container">
                        <p id="caption"></p>
                    </div>

                    <div class="row">
                        <div class="column">
                        <?php
                            if (!empty($img_one)) {
                                echo '<img class="demo cursor" src="admin/assets/images/buy_subcategory/' . $img_one . '" alt="" style="width:100%; height: 100%;" onclick="currentSlide(1)">';
                            } else {
                                echo '<img class="demo cursor" src="admin/assets/images/dummy.jpg" alt="" style="width:100%; height: 100%;" onclick="currentSlide(1)">';
                            }
                        ?>
                        </div>
                        <div class="column">
                            <?php
                            if (!empty($img_two)) {
                                echo '<img class="demo cursor" src="admin/assets/images/buy_subcategory/' . $img_two . '" alt="" style="width:100%; height: 100%;" onclick="currentSlide(2)">';
                            } else {
                                echo '<img class="demo cursor" src="admin/assets/images/dummy.jpg" alt="" style="width:100%; height: 100%;" onclick="currentSlide(2)">';
                            }
                        ?>
                        </div>
                        <div class="column">
                        <?php
                            if (!empty($img_three)) {
                                echo '<img class="demo cursor" src="admin/assets/images/buy_subcategory/' . $img_three . '" alt="" style="width:100%; height: 100%;" onclick="currentSlide(3)">';
                            } else {
                                echo '<img class="demo cursor" src="admin/assets/images/dummy.jpg" alt="" style="width:100%; height: 100%;" onclick="currentSlide(3)">';
                            }
                        ?>
                        </div>
                        <div class="column">
                        <?php
                            if (!empty($img_four)) {
                                echo '<img class="demo cursor" src="admin/assets/images/buy_subcategory/' . $img_four . '" alt="" style="width:100%; height: 100%;" onclick="currentSlide(4)">';
                            } else {
                                echo '<img class="demo cursor" src="admin/assets/images/dummy.jpg" alt="" style="width:100%; height: 100%;" onclick="currentSlide(4)">';
                            }
                        ?>
                        </div>
                        <div class="column">
                        <?php
                            if (!empty($img_five)) {
                                echo '<img class="demo cursor" src="admin/assets/images/buy_subcategory/' . $img_five . '" alt="" style="width:100%; height: 100%;" onclick="currentSlide(5)">';
                            } else {
                                echo '<img class="demo cursor" src="admin/assets/images/dummy.jpg" alt="" style="width:100%; height: 100%;" onclick="currentSlide(5)">';
                            }
                        ?>
                        </div>    
                        <div class="column">
                        <?php
                            if (!empty($img_six)) {
                                echo '<img class="demo cursor" src="admin/assets/images/buy_subcategory/' . $img_six . '" alt="" style="width:100%; height: 100%;" onclick="currentSlide(6)">';
                            } else {
                                echo '<img class="demo cursor" src="admin/assets/images/dummy.jpg" alt="" style="width:100%; height: 100%;" onclick="currentSlide(6)">';
                            }
                        ?>
                        </div>
                    </div>
                    </div>
                 </section>
                <!-- END: Product DETAILS IMAGE -->

                <!-- START: Details body part start -->
                 <section class="py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="top-details">
                                    <div class="row pb-3">
                                        <div class="col-lg-8">
                                              <?php  
                                                if ( $priority_id == 2 ) { 
                                                    if ( $rank == 1 ) { ?>
                                                        <div class="d-flex pb-2">
                                                            <div >
                                                                <i class="fa-solid fa-star text-success"></i>
                                                                <i class="fa-solid fa-star text-success"></i>
                                                                <i class="fa-solid fa-star text-success"></i>
                                                                <i class="fa-solid fa-star text-success"></i>
                                                                <i class="fa-solid fa-star text-success"></i>
                                                            </div>
                                                            <h3 class="px-3" style="letter-spacing: 1px; color:#023021; font-size: 22px; font-weight:600; text-transform: capitalize;">Five Star</h3>
                                                        </div>
                                                    
                                                    <?php }

                                                    else if ( $rank == 2 ) { ?>
                                                    <div class="d-flex pb-2">
                                                        <div >
                                                            <i class="fa-solid fa-star text-success"></i>
                                                            <i class="fa-solid fa-star text-success"></i>
                                                            <i class="fa-solid fa-star text-success"></i>
                                                            <i class="fa-solid fa-star text-success"></i>
                                                        </div>
                                                        <h3 class="px-3" style="letter-spacing: 1px; color:#023021; font-size: 22px; font-weight:600; text-transform: capitalize;">Four Star</h3>
                                                    </div>
                                                    <?php }

                                                    else if ( $rank == 3 ) { ?>
                                                    <div class="d-flex pb-2">
                                                        <div >
                                                            <i class="fa-solid fa-star text-success"></i>
                                                            <i class="fa-solid fa-star text-success"></i>
                                                            <i class="fa-solid fa-star text-success"></i>
                                                        </div>
                                                        <h3 class="px-3" style="letter-spacing: 1px; color:#023021; font-size: 22px; font-weight:600; text-transform: capitalize;">Three Star</h3>
                                                    </div>
                                                    <?php }

                                                    else if ( $rank == 4 ) { ?>
                                                    <div class="d-flex pb-2">
                                                        <div >
                                                            <i class="fa-solid fa-star text-success"></i>
                                                            <i class="fa-solid fa-star text-success"></i>
                                                        </div>
                                                        <h3 class="px-3" style="letter-spacing: 1px; color:#023021; font-size: 22px; font-weight:600; text-transform: capitalize;">Two Star</h3>
                                                    </div>
                                                    <?php }

                                                    else if ( $rank == 1 ) { ?>
                                                    <div class="d-flex pb-2">
                                                        <div >
                                                            <i class="fa-solid fa-star text-success"></i>
                                                        </div>
                                                        <h3 class="px-3" style="letter-spacing: 1px; color:#023021; font-size: 22px; font-weight:600; text-transform: capitalize;">One Star</h3>
                                                    </div>
                                                    <?php }
                                                } 
                                                else {

                                                }
                                            ?>
                                            <h1 class="" style="letter-spacing: 2px; color:#023021; font-size: 35px; font-weight:600; text-transform: uppercase;">৳ <?php echo $price; ?> BDT</h1>
                                            <h3 class="py-1" style="letter-spacing: 2px; color:#023021; font-size: 24px; font-weight:600; text-transform: capitalize;"><?php echo $subcat_name; ?></h3>
                                            <?php  
                                                $divsql = "SELECT * FROM buy_division WHERE status=1 AND id='$division_id'";
                                                $divquery = mysqli_query($db, $divsql);

                                                while ( $row = mysqli_fetch_assoc($divquery) ) {
                                                    $id             = $row['id'];
                                                    $name           = $row['name'];
                                                    $priority       = $row['priority'];
                                                    $status         = $row['status'];
                                                    ?>
                                                    <h5 style=" font-size: 20px; text-transform: capitalize;"><?php echo $location; ?>, <span><?php echo $district; ?></span>, <span><?php echo $name; ?></span></h5>
                                                    <?php
                                                } 
                                            ?>
                                          
                                        </div>
                                        <div class="col-lg-4">    
                                             
                                        </div>
                                    </div>

                                    <div class="my-4" style="border-left: 3px double #ffc107; padding: 0 2%;">
                                        <h1 class=""  style="letter-spacing: 3px; color:#023021; font-size: 23px; font-weight:600; text-transform: uppercase;">Facts and features</h1>
                                    </div>
                                    
                                    <div class="services d-flex">
                                        <?php  

                                        if ( empty( $priority_id == 4 ) ) {
                                            if ( $priority_id == 3 ) { ?>
                                                <div class="bg-light px-5 py-4 me-5">
                                                    <?php  

                                                    if ( $priority_id == 2 || $priority_id == 3 ) { 
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
                                                    }
                                                        ?>
                                                    <div class="d-flex ">                                                        
                                                        <div><i class="fa-solid fa-bath" style="padding-right: 11px"></i></div>
                                                        <div><p><?php echo $washroom; ?> Bathrooms</p></div>
                                                    </div>

                                                    <div class="d-flex ">
                                                        <div><i class="fa-solid fa-stairs" style="padding-right: 11px"></i></div>
                                                        <div><p><?php echo $floor; ?> Floor</p></div>
                                                    </div>

                                                    <div class="d-flex ">
                                                        <div><i class="fa-solid fa-warehouse" style="padding-right: 11px"></i></div>
                                                        <div><p><?php echo $garage; ?> Garage</p></div>
                                                    </div>

                                                    <div class="d-flex ">
                                                        <div><i class="fa-solid fa-map-location-dot" style="padding-right: 11px"></i></div>
                                                        <div><p><?php echo $area_size; ?> sqft area Size</p></div>
                                                    </div>

                                                    <div class="d-flex ">
                                                        <div><i class="fa-solid fa-map-location-dot" style="padding-right: 11px"></i></div>
                                                        <div><p><?php echo $katha; ?> Katha</p></div>
                                                    </div>
                                                </div>
                                            <?php }

                                            else { 

                                                if ( $priority_id == 2 ) { ?>
                                                    <div class="bg-light px-4 py-4 me-5">
                                                        <div class="d-flex ">
                                                            <div><i class="fa-solid fa-bed" style="padding-right: 11px"></i></div>
                                                            <div><p><?php echo $bed; ?> Bedrooms</p></div>
                                                        </div>

                                                        <div class="d-flex ">
                                                            <div><i class="fa-solid fa-couch" style="padding-right: 11px"></i></div>
                                                            <div><p><?php echo $drwaing; ?> Drawing</p></div>
                                                        </div>

                                                        <div class="d-flex ">
                                                            <?php  
                                                                if ( !empty( $dinning ) ) { ?>

                                                                <div><i class="fa-solid fa-utensils" style="padding-right: 11px"></i>
                                                                </div>

                                                                <div>
                                                                
                                                                    <p><?php echo $dinning; ?> Dinning</p>
                                                                    
                                                                </div>
                                                            <?php }
                                                                else {

                                                                }
                                                            ?>
                                                        </div>

                                                        <div class="d-flex ">
                                                            <div><i class="fa-solid fa-kitchen-set" style="padding-right: 11px"></i></div>
                                                            <div><p><?php echo $kitchen; ?> Kitchen</p></div>
                                                        </div>

                                                        <div class="d-flex ">
                                                            <div><i class="fa-solid fa-bath" style="padding-right: 11px"></i></div>
                                                            <div><p><?php echo $washroom; ?> Bathrooms</p></div>
                                                        </div>

                                                        <?php  
                                                            if ( $priority_id == 2 ) { ?>
                                                                <div class="d-flex ">
                                                                    <div><i class="fa-solid fa-building" style="padding-right: 11px"></i></div>
                                                                    <div><p><?php echo $balcony; ?> Balcony</p></div>
                                                                </div>

                                                                <div class="d-flex ">
                                                                    <div><i class="fa-solid fa-stairs" style="padding-right: 11px"></i></div>
                                                                    <div><p><?php echo $floor; ?> Floor</p></div>
                                                                </div>
                                                           <?php }
                                                            else {

                                                            }
                                                        ?>
                                                    </div>

                                                    <div class="bg-light px-4 py-4">
                                                        <?php  
                                                            if ( $priority_id != 2 ) { ?>
                                                                <div class="d-flex ">
                                                                    <div><i class="fa-solid fa-building" style="padding-right: 11px"></i></div>
                                                                    <div><p><?php echo $balcony; ?> Balcony</p></div>
                                                                </div>

                                                                <div class="d-flex ">
                                                                    <div><i class="fa-solid fa-stairs" style="padding-right: 11px"></i></div>
                                                                    <div><p><?php echo $floor; ?> Floor</p></div>
                                                                </div>
                                                           <?php }
                                                        ?>
                                                        

                                                        <div class="d-flex ">
                                                            <div><i class="fa-solid fa-warehouse" style="padding-right: 11px"></i></div>
                                                            <div><p><?php echo $garage; ?> Garage</p></div>
                                                        </div>

                                                        <div class="d-flex ">
                                                            <div><i class="fa-solid fa-map-location-dot" style="padding-right: 11px"></i></div>
                                                            <div><p><?php echo $area_size; ?> sqft area Size</p></div>
                                                        </div>

                                                        <div class="d-flex ">
                                                            <div><i class="fa-solid fa-map-location-dot" style="padding-right: 11px"></i></div>
                                                            <div><p><?php echo $katha; ?> Katha</p></div>
                                                        </div>

                                                        <?php  
                                                            if ( $priority_id == 2 ) { ?>
                                                                <div class="d-flex ">
                                                                    <?php  
                                                                        if ( !empty( $pool ) ) { ?>
                                                                            <div><i class="fa-solid fa-water-ladder" style="padding-right: 11px"></i></div>
                                                                            <div><p>Swimming pool(indoor)</p></div>
                                                                        <?php }
                                                                    ?>                         
                                                                </div>

                                                                <div class="d-flex ">
                                                                    <?php  
                                                                        if ( !empty( $park ) ) { ?>
                                                                            <div><i class="fa-solid fa-car-side" style="padding-right: 11px"></i></div>
                                                                            <div><p>Car park</p></div>
                                                                        <?php }
                                                                    ?>                         
                                                                </div>

                                                                <div class="d-flex ">
                                                                    <?php  
                                                                        if ( !empty( $gym ) ) { ?>
                                                                            <div><i class="fa-solid fa-dumbbell" style="padding-right: 11px"></i></div>
                                                                            <div><p>Fitness center</p></div>
                                                                        <?php }
                                                                    ?>                         
                                                                </div>

                                                                <div class="d-flex ">
                                                                    <?php  
                                                                        if ( !empty( $luggage ) ) { ?>
                                                                            <div><i class="fa-solid fa-cart-flatbed-suitcase" style="padding-right: 11px"></i></div>
                                                                            <div><p>Luggage Storage</p></div>
                                                                        <?php }
                                                                    ?>                         
                                                                </div>

                                                                <div class="d-flex ">
                                                                    <?php  
                                                                        if ( !empty( $ac ) ) { ?>
                                                                            <div><i class="fa-solid fa-snowflake" style="padding-right: 11px"></i>
                                                                            </div>
                                                                            <div><p>Air conditioning</p></div> 
                                                                        <?php }
                                                                    ?>                                                                    
                                                                </div>
                                                            <?php }
                                                        ?>

                                                        <?php  
                                                            if ( $priority_id != 2 ) { ?>
                                                                <div class="d-flex ">
                                                                    <div><i class="fa-solid fa-map-location-dot" style="padding-right: 11px"></i></div>
                                                                    <div><p><?php echo $katha; ?> Katha</p></div>
                                                                </div>
                                                            <?php }
                                                        ?>

                                                        
                                                    </div>

                                                    <?php  
                                                        if ( $priority_id == 2 ) { ?>
                                                            <div class="bg-light px-4 py-4 ms-5">
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

                                                                <div class="d-flex ">
                                                                    <div><i class="fa-solid fa-user-shield" style="padding-right: 11px"></i></div>
                                                                    <div><p><?php if ( !empty( $desk ) ) {
                                                                        echo "Front desk [24-hour]";
                                                                    } ?></p></div>
                                                                </div>

                                                                <div class="d-flex ">
                                                                    <div><i class="fa-solid fa-wifi" style="padding-right: 11px"></i></div>
                                                                    <div><p><?php if ( !empty( $wifi ) ) {
                                                                        echo "Wifi";
                                                                    } ?></p></div>
                                                                </div>

                                                                <div class="d-flex ">
                                                                    <div><i class="fa-solid fa-hot-tub-person" style="padding-right: 11px"></i></div>
                                                                    <div><p><?php if ( !empty( $hottub ) ) {
                                                                        echo "Hot tub";
                                                                    } ?></p></div>
                                                                </div>

                                                                <div class="d-flex ">
                                                                    <div><i class="fa-solid fa-comments-dollar"style="padding-right: 11px"></i></div>
                                                                    <div><p><?php if ( !empty( $currency ) ) {
                                                                        echo "Currency";
                                                                    } ?></p></div>
                                                                </div>

                                                                <div class="d-flex ">
                                                                    <div><i class="fa-solid fa-bowl-rice" style="padding-right: 11px"></i></div>
                                                                    <div><p><?php if ( !empty( $breakfast ) ) {
                                                                        echo "Complementary Breakfast";
                                                                    } ?></p></div>
                                                                </div>

                                                                <div class="d-flex ">
                                                                    <div><i class="fa-solid fa-bell-concierge" style="padding-right: 11px"></i></div>
                                                                    <div><p><?php if ( !empty( $restourant ) ) {
                                                                        echo "Restourant";
                                                                    } ?></p></div>
                                                                </div>                                                              

                                                                



                                                        
                                                            </div>
                                                        <?php }
                                                        else {

                                                        }
                                                    ?>
                                                <?php }
                                                else { ?>
                                                    <div class="bg-light px-5 py-4 me-5">
                                                        <div class="d-flex ">
                                                            <div><i class="fa-solid fa-bed" style="padding-right: 11px"></i></div>
                                                            <div><p><?php echo $bed; ?> Bedrooms</p></div>
                                                        </div>

                                                        <div class="d-flex ">
                                                            <div><i class="fa-solid fa-couch" style="padding-right: 11px"></i></div>
                                                            <div><p><?php echo $drwaing; ?> Drawing</p></div>
                                                        </div>

                                                        <div class="d-flex ">
                                                            <?php  
                                                                if ( !empty( $dinning ) ) { ?>

                                                                <div><i class="fa-solid fa-utensils" style="padding-right: 11px"></i>
                                                                </div>

                                                                <div>
                                                                
                                                                    <p><?php echo $dinning; ?> Dinning</p>
                                                                    
                                                                </div>
                                                            <?php }
                                                                else {

                                                                }
                                                            ?>
                                                        </div>

                                                        <div class="d-flex ">
                                                            <div><i class="fa-solid fa-kitchen-set" style="padding-right: 11px"></i></div>
                                                            <div><p><?php echo $kitchen; ?> Kitchen</p></div>
                                                        </div>

                                                        <div class="d-flex ">
                                                            <div><i class="fa-solid fa-bath" style="padding-right: 11px"></i></div>
                                                            <div><p><?php echo $washroom; ?> Bathrooms</p></div>
                                                        </div>
                                                    </div>
                                                    <div class="bg-light px-5 py-4">
                                                        <div class="d-flex ">
                                                            <div><i class="fa-solid fa-building" style="padding-right: 11px"></i></div>
                                                            <div><p><?php echo $balcony; ?> Balcony</p></div>
                                                        </div>

                                                        <div class="d-flex ">
                                                            <div><i class="fa-solid fa-stairs" style="padding-right: 11px"></i></div>
                                                            <div><p><?php echo $floor; ?> Floor</p></div>
                                                        </div>

                                                        <div class="d-flex ">
                                                            <div><i class="fa-solid fa-warehouse" style="padding-right: 11px"></i></div>
                                                            <div><p><?php echo $garage; ?> Garage</p></div>
                                                        </div>

                                                        <div class="d-flex ">
                                                            <div><i class="fa-solid fa-map-location-dot" style="padding-right: 11px"></i></div>
                                                            <div><p><?php echo $area_size; ?> sqft area Size</p></div>
                                                        </div>

                                                        <div class="d-flex ">
                                                            <div><i class="fa-solid fa-map-location-dot" style="padding-right: 11px"></i></div>
                                                            <div><p><?php echo $katha; ?> Katha</p></div>
                                                        </div>
                                                    </div>
                                                <?php }

                                             }

                                        }

                                        else { ?>
                                            <div class="bg-light px-5 py-4 me-5">

                                                <div class="d-flex ">
                                                    <div><i class="fa-solid fa-map-location-dot" style="padding-right: 11px"></i></div>
                                                    <div><p><?php echo $area_size; ?> sqft area Size</p></div>
                                                </div>

                                                <div class="d-flex ">
                                                    <div><i class="fa-solid fa-map-location-dot" style="padding-right: 11px"></i></div>
                                                    <div><p><?php echo $katha; ?> Katha</p></div>
                                                </div>
                                            </div>

                                       <?php  }
                                            
                                            
                                        ?>
                                        
                                    </div>

                                    <div class="my-4" style="border-left: 3px double #ffc107; padding: 0 2%;">
                                        <h1 class=""  style="letter-spacing: 3px; color:#023021; font-size: 23px; font-weight:600; text-transform: uppercase;">Overview</h1>
                                    </div>

                                    <div>
                                        <p style="text-align: justify;"><?php echo $short_desc; ?></p>
                                    </div>
                                    <div>
                                        <p style="text-align: justify;"><?php echo $long_desc; ?></p>
                                    </div>

                                    <div class="my-4" style="border-left: 3px double #ffc107; padding: 0 2%;">
                                        <h1 class=""  style="letter-spacing: 3px; color:#023021; font-size: 23px; font-weight:600; text-transform: uppercase;">Amenities</h1>
                                    </div>

                                    <div class="amenities">
                                    <div class="row ">
                                        <?php  
                                            if ( $priority_id == 3 || $priority_id == 4 ) { ?>

                                                <div class="col-lg-2 text-center p-2">
                                                    <i class="fa-solid fa-stairs"></i>
                                                    <p>Flooring</p>
                                                </div>

                                                <div class="col-lg-2 text-center p-2">
                                                <i class="fa-solid fa-bell-concierge"></i>
                                                    <p>24 Hours Concierege</p>
                                                </div>

                                                <div class="col-lg-2 text-center p-2">
                                                <i class="fa-solid fa-building"></i>
                                                    <p>Apartment Facing</p>
                                                </div>

                                                <div class="col-lg-2 text-center p-2">
                                                    <i class="fa-solid fa-plug"></i>
                                                    <p>Electricity</p>
                                                </div>

                                                <div class="col-lg-2 text-center p-2">
                                                    <i class="fa-solid fa-stairs"></i>
                                                    <p>Floor Level</p>
                                                </div>

                                                <div class="col-lg-2 text-center p-2">
                                                    <i class="fa-solid fa-video"></i>
                                                    <p>View</p>
                                                </div>

                                                <div class="col-lg-2 text-center p-2">
                                                    <i class="fa-solid fa-school"></i>
                                                    <p>Nearby School</p>
                                                </div>

                                                <div class="col-lg-2 text-center p-2">
                                                    <i class="fa-solid fa-plane"></i>
                                                    <p>Distance from Airport(kms)</p>
                                                </div>

                                                <div class="col-lg-2 text-center p-2">
                                                    <i class="fa-solid fa-bus"></i>
                                                    <p>Nearby Public Transport</p>
                                                </div>

                                                <div class="col-lg-2 text-center p-2">
                                                    <i class="fa-solid fa-shield-halved"></i>
                                                    <p>Guard/Security Staff</p>
                                                </div>

                                                <div class="col-lg-2 text-center p-2">
                                                    <i class="fa-solid fa-paw"></i>
                                                    <p>Pet Policy</p>
                                                </div>
                                            <?php }
                                            else { ?>
                                                <div class="col-lg-2 text-center p-2">
                                                    <i class="fa-brands fa-windows"></i>
                                                    <p>Double Glazed Windows</p>
                                                </div>

                                                <div class="col-lg-2 text-center p-2">
                                                    <i class="fa-solid fa-stairs"></i>
                                                    <p>Flooring</p>
                                                </div>

                                                <div class="col-lg-2 text-center p-2">
                                                <i class="fa-solid fa-bell-concierge"></i>
                                                    <p>24 Hours Concierege</p>
                                                </div>

                                                <div class="col-lg-2 text-center p-2">
                                                <i class="fa-solid fa-building"></i>
                                                    <p>Apartment Facing</p>
                                                </div>

                                                <div class="col-lg-2 text-center p-2">
                                                <i class="fa-solid fa-mask-ventilator"></i>
                                                    <p>Gas</p>
                                                </div>

                                                <div class="col-lg-2 text-center p-2">
                                                    <i class="fa-solid fa-plug"></i>
                                                    <p>Electricity</p>
                                                </div>

                                                <div class="col-lg-2 text-center p-2">
                                                    <i class="fa-solid fa-stairs"></i>
                                                    <p>Floor Level</p>
                                                </div>

                                                <div class="col-lg-2 text-center p-2">
                                                    <i class="fa-solid fa-person-shelter"></i>
                                                    <p>Maintanance Staff</p>
                                                </div>

                                                <div class="col-lg-2 text-center p-2">
                                                    <i class="fa-solid fa-broom"></i>
                                                    <p>Cleaning Service</p>
                                                </div>

                                                <div class="col-lg-2 text-center p-2">
                                                    <i class="fa-solid fa-video"></i>
                                                    <p>View</p>
                                                </div>

                                                <div class="col-lg-2 text-center p-2">
                                                    <i class="fa-solid fa-building"></i>
                                                    <p>Balcony</p>
                                                </div>

                                                <div class="col-lg-2 text-center p-2">
                                                    <i class="fa-solid fa-people-carry-box"></i>
                                                    <p>Lobby in Building</p>
                                                </div>

                                                <div class="col-lg-2 text-center p-2">
                                                    <i class="fa-solid fa-school"></i>
                                                    <p>Nearby School</p>
                                                </div>

                                                <div class="col-lg-2 text-center p-2">
                                                    <i class="fa-solid fa-plane"></i>
                                                    <p>Distance from Airport(kms)</p>
                                                </div>

                                                <div class="col-lg-2 text-center p-2">
                                                    <i class="fa-solid fa-bus"></i>
                                                    <p>Nearby Public Transport</p>
                                                </div>

                                                <div class="col-lg-2 text-center p-2">
                                                    <i class="fa-solid fa-shield-halved"></i>
                                                    <p>Guard/Security Staff</p>
                                                </div>

                                                <div class="col-lg-2 text-center p-2">
                                                    <i class="fa-solid fa-paw"></i>
                                                    <p>Pet Policy</p>
                                                </div>
                                            <?php }
                                        ?>
                                        


                                    </div>
                                    </div>
                                    

                                    <hr>
                                    
                                    <div class="map">
                                        <?php echo $google_map; ?>
                                    </div>

                                    
                                    
                                </div>

                                <div class="review pt-5">
                                    <div style="border-left: 3px double #ffc107; padding: 0 2%;">
                                        <h1 class=""  style="letter-spacing: 3px; color:#023021; font-size: 23px; font-weight:600; text-transform: uppercase;">Write Review</h1>
                                    </div>

                                    <div class="comment-part py-5">
                                        <form action="" method="POST">
                                            <div class="mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="star" id="flexRadioDefault2" value="5" required>
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        <div>
                                                            <i class="fa-solid fa-star text-warning"></i>
                                                            <i class="fa-solid fa-star text-warning"></i>
                                                            <i class="fa-solid fa-star text-warning"></i>
                                                            <i class="fa-solid fa-star text-warning"></i>
                                                            <i class="fa-solid fa-star text-warning"></i>
                                                        </div>
                                                    </label>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="star" id="flexRadioDefault3" value="4" required>
                                                    <label class="form-check-label" for="flexRadioDefault3">
                                                        <div>
                                                            <i class="fa-solid fa-star text-warning"></i>
                                                            <i class="fa-solid fa-star text-warning"></i>
                                                            <i class="fa-solid fa-star text-warning"></i>
                                                            <i class="fa-solid fa-star text-warning"></i>
                                                            <i class="fa-regular fa-star text-warning"></i>
                                                        </div>
                                                    </label>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="star" id="flexRadioDefault4" value="3" required>
                                                    <label class="form-check-label" for="flexRadioDefault4">
                                                        <div>
                                                            <i class="fa-solid fa-star text-warning"></i>
                                                            <i class="fa-solid fa-star text-warning"></i>
                                                            <i class="fa-solid fa-star text-warning"></i>
                                                            <i class="fa-regular fa-star text-warning"></i>
                                                            <i class="fa-regular fa-star text-warning"></i>
                                                        </div>
                                                    </label>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="star" id="flexRadioDefault5" value="2" required>
                                                    <label class="form-check-label" for="flexRadioDefault5">
                                                        <div>
                                                            <i class="fa-solid fa-star text-warning"></i>
                                                            <i class="fa-solid fa-star text-warning"></i>
                                                            <i class="fa-regular fa-star text-warning"></i>
                                                            <i class="fa-regular fa-star text-warning"></i>
                                                            <i class="fa-regular fa-star text-warning"></i>
                                                        </div>
                                                    </label>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="star" id="flexRadioDefault6" value="1" required>
                                                    <label class="form-check-label" for="flexRadioDefault6">
                                                        <div>
                                                            <i class="fa-solid fa-star text-warning"></i>
                                                            <i class="fa-regular fa-star text-warning"></i>
                                                            <i class="fa-regular fa-star text-warning"></i>
                                                            <i class="fa-regular fa-star text-warning"></i>
                                                            <i class="fa-regular fa-star text-warning"></i>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                            

                                            <div class="mb-3">
                                                <textarea name="msg" class="form-control" rows="3" placeholder="write here.." required></textarea>
                                            </div>

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
                                                        <input type="hidden" name="name" value="<?php echo $name; ?>">
                                                        <input type="hidden" name="email" value="<?php echo $email; ?>">
                                                        <input type="hidden" name="role" value="<?php echo $role; ?>">
                                                        <?php
                                                    }
                                                }
                                            ?>
                                            <input type="hidden" name="prd_id" value="<?php echo $sub_id; ?>">

                                             <!--  -->
                                                <?php  
                                                    if ( !empty( $_SESSION['email'] ) ) { ?>
                                                        <div class="d-grid gap-2">
                                                            <input type="submit" name="subm" class="btn btn-success" value="Submit Here">
                                                        </div>
                                                    <?php }
                                                    else { ?>
                                                        <div class="alert alert-info my-4 text-center" role="alert">
                                                          Login to reserve you service. <a href="login.php">Click Here</a>
                                                        </div>
                                                   <?php }
                                                ?>
                                                <!--  -->                                            
                                            
                                        </form>

                                        <?php  
                                            if ( isset($_POST['subm']) ) {
                                                $star       = mysqli_real_escape_string($db, $_POST['star']);
                                                $msg        = mysqli_real_escape_string($db, $_POST['msg']);
                                                $prd_id     = mysqli_real_escape_string($db, $_POST['prd_id']);
                                                $role       = mysqli_real_escape_string($db, $_POST['role']);
                                                $name       = mysqli_real_escape_string($db, $_POST['name']);
                                                $email      = mysqli_real_escape_string($db, $_POST['email']);

                                                $sql = "INSERT INTO buyreview (prd_id, role, name, email, star, msg, join_date) VALUES('$prd_id', '$role', '$name', '$email', '$star', '$msg', now())";
                                                $query = mysqli_query($db, $sql);

                                                if ( $query ) {
                                                    header('Location: buy.php');
                                                }
                                                else {
                                                    die("Mysqli_Error" . mysqli_error($db));
                                                }
                                            }
                                        ?>

                                        <div class="py-5">
                                            <div style="border-left: 3px double #ffc107; padding: 0 2%;">
                                                <h1 class=""  style="letter-spacing: 3px; color:#023021; font-size: 23px; font-weight:600; text-transform: uppercase;">All Reviews </h1>
                                            </div>
                                        </div>
                                        

                                            <hr>
                                            <?php  
                                                $sql = "SELECT * FROM buyreview WHERE prd_id ='$rentDetailsId' ORDER BY id DESC";
                                                $query = mysqli_query($db, $sql);

                                                while ( $row = mysqli_fetch_assoc($query) ) {
                                                    $id         = $row['id'];
                                                    $prd_id     = $row['prd_id'];
                                                    $role       = $row['role'];
                                                    $name       = $row['name'];
                                                    $email      = $row['email'];
                                                    $star       = $row['star'];
                                                    $msg        = $row['msg'];
                                                    $join_date  = $row['join_date'];
                                                    ?>
                                                    <div>
                                                <p class="mb-0"><?php echo $join_date; ?></p>

                                                <div class="py-2">
                                                    <?php  
                                                        if ( $star == 5 ) { ?>
                                                            <i class="fa-solid fa-star text-warning"></i>
                                                            <i class="fa-solid fa-star text-warning"></i>
                                                            <i class="fa-solid fa-star text-warning"></i>
                                                            <i class="fa-solid fa-star text-warning"></i>
                                                            <i class="fa-solid fa-star text-warning"></i>
                                                        <?php }

                                                        else if ( $star == 4 ) { ?>
                                                            <i class="fa-solid fa-star text-warning"></i>
                                                            <i class="fa-solid fa-star text-warning"></i>
                                                            <i class="fa-solid fa-star text-warning"></i>
                                                            <i class="fa-solid fa-star text-warning"></i>
                                                            <i class="fa-regular fa-star text-warning"></i>
                                                        <?php }

                                                        else if ( $star == 3 ) { ?>
                                                            <i class="fa-solid fa-star text-warning"></i>
                                                            <i class="fa-solid fa-star text-warning"></i>
                                                            <i class="fa-solid fa-star text-warning"></i>
                                                            <i class="fa-regular fa-star text-warning"></i>
                                                            <i class="fa-regular fa-star text-warning"></i>
                                                        <?php }

                                                        else if ( $star == 2 ) { ?>
                                                            <i class="fa-solid fa-star text-warning"></i>
                                                            <i class="fa-solid fa-star text-warning"></i>
                                                            <i class="fa-regular fa-star text-warning"></i>
                                                            <i class="fa-regular fa-star text-warning"></i>
                                                            <i class="fa-regular fa-star text-warning"></i>
                                                        <?php }

                                                        else if ( $star == 1 ) { ?>
                                                            <i class="fa-solid fa-star text-warning"></i>
                                                            <i class="fa-regular fa-star text-warning"></i>
                                                            <i class="fa-regular fa-star text-warning"></i>
                                                            <i class="fa-regular fa-star text-warning"></i>
                                                            <i class="fa-regular fa-star text-warning"></i>
                                                        <?php }
                                                    ?>
                                                </div>
                                                <h4 style="color:#023021;"><?php echo $name; ?></h4>
                                                <p style="text-align: justify;"><?php echo $msg; ?></p>
                                                <hr>
                                            </div>

                                                    <?php
                                                }
                                            ?>
                                            

                                        
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="sticky-top">
                                    
                                    <div class="mb-4" style="border-left: 3px double #ffc107; padding: 0 2%;">
                                                    <h1 class=""  style="letter-spacing: 3px; color:#023021; font-size: 23px; font-weight:600; text-transform: uppercase;">For Booking Contact Owner</h1>
                                                </div>

                                                <div class="bg-light p-4">
                                                    <div class="d-flex align-items-center">
                                                        <?php
                                                            if (!empty($ow_image)) {
                                                                echo '<img src="admin/assets/images/owner/' . $ow_image . '" alt="" width="100">
                                                                    ';
                                                            } else {
                                                                echo '
                                                                    <img src="assets/images/dummy.png" alt="" width="100"">
                                                                ';
                                                            }
                                                        ?>
                                                        <h5 class="ps-3" style="color:#023021;"><?php echo $ow_name; ?></h5>
                                                    </div>
                                                    <!--  -->
                                                    <?php  
                                                        if ( !empty( $_SESSION['email'] ) ) { ?>
                                                            <div class="d-flex pt-5">
                                                                <i class="fa-solid fa-phone pe-3" style="color:#023021;"></i>
                                                                <P style="color:#023021;">Phone: <a href="callto:<?php echo $ow_phone; ?>" style="color:#023021;"><?php echo $ow_phone; ?></a></P>
                                                            </div>
                                                            <div class="d-flex">
                                                                <i class="fa-solid fa-envelope pe-3" style="color:#023021;"></i>
                                                                <P style="color:#023021;">Email: <a href="mailto:<?php echo $ow_email; ?>" style="color:#023021;"><?php echo $ow_email; ?></a></P>
                                                            </div>
                                                            <div class="d-flex">
                                                                <i class="fa-solid fa-map-pin pe-3" style="color:#023021;"></i>
                                                                <?php  
                                                                    $divsql = "SELECT * FROM buy_division WHERE status=1 AND id='$division_id'";
                                                                    $divquery = mysqli_query($db, $divsql);

                                                                    while ( $row = mysqli_fetch_assoc($divquery) ) {
                                                                        $id             = $row['id'];
                                                                        $name           = $row['name'];
                                                                        $priority       = $row['priority'];
                                                                        $status         = $row['status'];
                                                                        ?>
                                                                        <P style="color:#023021;">Address: <?php echo $location .", " . $district .", ". $name; ?></P>
                                                                        <?php
                                                                    } 
                                                                ?>
                                                                
                                                            </div>

                                                            <div class="text-center py-2">
                                                                <a href="callto:+<?php echo $ow_phone; ?>" class="btn btn-warning px-4 cntct-btn">Contact Availability</a>
                                                            </div>
                                                        <?php }
                                                        else { ?>
                                                            <div class="alert alert-info my-4 text-center" role="alert">
                                                              Login to reserve you service. <a href="login.php">Click Here</a>
                                                            </div>
                                                       <?php }
                                                    ?>
                                                    <!--  -->
                                                    
                                                </div>
                                    
                                </div>
                                    
                            </div>
                        </div>
                    </div>
                 </section>
                <!-- END: Details body part start -->

                <?php
            }
        }
    ?>

    

    

    <!-- START: Category Wise Product Showcase -->
     <section class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <!-- Apartments -->
                     <div class="d-flex align-items-center justify-content-between">
                        <div style="border-left: 3px double #ffc107; padding: 0 2%;">
                            <h1 class=""  style="letter-spacing: 3px; color:#023021; font-size: 23px; font-weight:600; text-transform: uppercase;">Similar Apartments For Buy</h1>
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
    <!-- END: Category Wise Product Showcase -->

    
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
    
</main>
    
<?php include"inc/footer.php"; ?>