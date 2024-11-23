<?php include"inc/header.php"; ?>

<main>

    <?php  
        if ( isset($_GET['rdId']) ) {
            $rentDetailsId = $_GET['rdId'];

            $sql = "SELECT * FROM rent_subcategory WHERE status=1 AND sub_id ='$rentDetailsId'";
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
                $floor          = $row['floor'];
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
                                <div>
                                    <h4 style="color: #023021; font-size: 25px;">Apartments</h4>
                                </div>
                                <div class="d-flex">
                                    <a href="index.php"><h4 style="color:#545454; font-size: 17px; font-weight: 400; ">HOME</h4></a>
                                    <h4 class="px-2" style="color:#545454; font-size: 17px; font-weight: 400; "> / </h4>
                                    <a href=""><h4 style="color:#545454; font-size: 17px; font-weight: 400; ">RENT CATEGORY</h4></a>
                                    <h4 class="px-2" style="color:#545454; font-size: 17px; font-weight: 400; "> / </h4>
                                    <a href=""><h4 style="color:#545454; font-size: 17px; font-weight: 400; ">APARTMENTS</h4></a>
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
                                echo '<img src="admin/assets/images/subcategory/' . $img_one . '" alt="" style="width:100%;height: 676px;object-fit: scale-down;">';
                            } else {
                                echo '<img src="admin/assets/images/dummy.jpg" alt="" style="width:100%;height: 676px;object-fit: scale-down;">';
                            }
                        ?>
                    </div>

                    <div class="mySlides">
                        <div class="numbertext">2 / 6</div>
                        <?php
                            if (!empty($img_two)) {
                                echo '<img src="admin/assets/images/subcategory/' . $img_two . '" alt="" style="width:100%;height: 676px;object-fit: scale-down;">';
                            } else {
                                echo '<img src="admin/assets/images/dummy.jpg" alt="" style="width:100%;height: 676px;object-fit: scale-down;">';
                            }
                        ?>
                    </div>

                    <div class="mySlides">
                        <div class="numbertext">3 / 6</div>
                        <?php
                            if (!empty($img_three)) {
                                echo '<img src="admin/assets/images/subcategory/' . $img_three . '" alt="" style="width:100%;height: 676px;object-fit: scale-down;">';
                            } else {
                                echo '<img src="admin/assets/images/dummy.jpg" alt="" style="width:100%;height: 676px;object-fit: scale-down;">';
                            }
                        ?>
                    </div>
                        
                    <div class="mySlides">
                        <div class="numbertext">4 / 6</div>
                        <?php
                            if (!empty($img_four)) {
                                echo '<img src="admin/assets/images/subcategory/' . $img_four . '" alt="" style="width:100%;height: 676px;object-fit: scale-down;">';
                            } else {
                                echo '<img src="admin/assets/images/dummy.jpg" alt="" style="width:100%;height: 676px;object-fit: scale-down;">';
                            }
                        ?>
                    </div>

                    <div class="mySlides">
                        <div class="numbertext">5 / 6</div>
                        <?php
                            if (!empty($img_five)) {
                                echo '<img src="admin/assets/images/subcategory/' . $img_five . '" alt="" style="width:100%;height: 676px;object-fit: scale-down;">';
                            } else {
                                echo '<img src="admin/assets/images/dummy.jpg" alt="" style="width:100%;height: 676px;object-fit: scale-down;">';
                            }
                        ?>
                    </div>
                        
                    <div class="mySlides">
                        <div class="numbertext">6 / 6</div>
                        <?php
                            if (!empty($img_six)) {
                                echo '<img src="admin/assets/images/subcategory/' . $img_six . '" alt="" style="width:100%;height: 676px;object-fit: scale-down;">';
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
                                echo '<img class="demo cursor" src="admin/assets/images/subcategory/' . $img_one . '" alt="" style="width:100%; height: 100%;" onclick="currentSlide(1)">';
                            } else {
                                echo '<img class="demo cursor" src="admin/assets/images/dummy.jpg" alt="" style="width:100%; height: 100%;" onclick="currentSlide(1)">';
                            }
                        ?>
                        </div>
                        <div class="column">
                            <?php
                            if (!empty($img_two)) {
                                echo '<img class="demo cursor" src="admin/assets/images/subcategory/' . $img_two . '" alt="" style="width:100%; height: 100%;" onclick="currentSlide(2)">';
                            } else {
                                echo '<img class="demo cursor" src="admin/assets/images/dummy.jpg" alt="" style="width:100%; height: 100%;" onclick="currentSlide(2)">';
                            }
                        ?>
                        </div>
                        <div class="column">
                        <?php
                            if (!empty($img_three)) {
                                echo '<img class="demo cursor" src="admin/assets/images/subcategory/' . $img_three . '" alt="" style="width:100%; height: 100%;" onclick="currentSlide(3)">';
                            } else {
                                echo '<img class="demo cursor" src="admin/assets/images/dummy.jpg" alt="" style="width:100%; height: 100%;" onclick="currentSlide(3)">';
                            }
                        ?>
                        </div>
                        <div class="column">
                        <?php
                            if (!empty($img_four)) {
                                echo '<img class="demo cursor" src="admin/assets/images/subcategory/' . $img_four . '" alt="" style="width:100%; height: 100%;" onclick="currentSlide(4)">';
                            } else {
                                echo '<img class="demo cursor" src="admin/assets/images/dummy.jpg" alt="" style="width:100%; height: 100%;" onclick="currentSlide(4)">';
                            }
                        ?>
                        </div>
                        <div class="column">
                        <?php
                            if (!empty($img_five)) {
                                echo '<img class="demo cursor" src="admin/assets/images/subcategory/' . $img_five . '" alt="" style="width:100%; height: 100%;" onclick="currentSlide(5)">';
                            } else {
                                echo '<img class="demo cursor" src="admin/assets/images/dummy.jpg" alt="" style="width:100%; height: 100%;" onclick="currentSlide(5)">';
                            }
                        ?>
                        </div>    
                        <div class="column">
                        <?php
                            if (!empty($img_six)) {
                                echo '<img class="demo cursor" src="admin/assets/images/subcategory/' . $img_six . '" alt="" style="width:100%; height: 100%;" onclick="currentSlide(6)">';
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
                                            <h1 class="" style="letter-spacing: 2px; color:#023021; font-size: 35px; font-weight:600; text-transform: uppercase;">৳ <?php echo $price; ?> BDT</h1>
                                            <h3 class="py-1" style="letter-spacing: 2px; color:#023021; font-size: 24px; font-weight:600; text-transform: capitalize;"><?php echo $subcat_name; ?></h3>
                                            <?php  
                                                $divsql = "SELECT * FROM rent_division WHERE status=1 AND id='$division_id'";
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
                                            <div class="review">
                                            <div>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                (20)
                                            </div>
                                            <div>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                                (10)
                                            </div>
                                            <div>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                                (10)
                                            </div>
                                            <div>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-regular fa-star-half-stroke text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                                (10)
                                            </div>
                                            <div>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                                (10)
                                            </div>
                                            </div>  
                                        </div>
                                    </div>

                                    <div class="my-4" style="border-left: 3px double #ffc107; padding: 0 2%;">
                                        <h1 class=""  style="letter-spacing: 3px; color:#023021; font-size: 23px; font-weight:600; text-transform: uppercase;">Facts and features</h1>
                                    </div>
                                    
                                    <div class="services d-flex">
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
                                                <div><i class="fa-solid fa-utensils" style="padding-right: 11px"></i></div>
                                                <div><p><?php echo $dinning; ?> Dinning</p></div>
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
                                                <p style="color:#023021; font-size: 18px;">Available: <?php echo $availability; ?></p>
                                            </div>
                                        </div>
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
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="5">
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
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="4">
                                                    <label class="form-check-label" for="flexRadioDefault2">
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
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="3">
                                                    <label class="form-check-label" for="flexRadioDefault2">
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
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="2">
                                                    <label class="form-check-label" for="flexRadioDefault2">
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
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="1">
                                                    <label class="form-check-label" for="flexRadioDefault2">
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
                                                <textarea name="" class="form-control" rows="3" placeholder="write here.."></textarea>
                                            </div>


                                            
                                            <div class="d-grid gap-2">
                                                <input type="submit" class="btn btn-success" value="Submit Here">
                                            </div>
                                        </form>

                                        <div class="py-5">
                                            <div style="border-left: 3px double #ffc107; padding: 0 2%;">
                                                <h1 class=""  style="letter-spacing: 3px; color:#023021; font-size: 23px; font-weight:600; text-transform: uppercase;">All Reviews </h1>
                                            </div>
                                        </div>
                                            <hr>
                                        <div>
                                            
                                                <p>2024-07-28</p>
                                                <h4 style="color:#023021;">Shohanur Rahamn Shohan</h4>
                                                <p style="text-align: justify;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium maiores totam, adipisci tempore facilis quisquam veniam nam libero error exercitationem quidem, obcaecati repellat, quia deleniti est dicta molestias ducimus minus?</p>
                                            <hr>

                                            <p>2024-07-28</p>
                                                <h4 style="color:#023021;">Shohanur Rahamn Shohan</h4>
                                                <p style="text-align: justify;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium maiores totam, adipisci tempore facilis quisquam veniam nam libero error exercitationem quidem, obcaecati repellat, quia deleniti est dicta molestias ducimus minus?</p>
                                            <hr>
                                        </div>

                                        
                                        
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
                                                $divsql = "SELECT * FROM rent_division WHERE status=1 AND id='$division_id'";
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
                            <h1 class=""  style="letter-spacing: 3px; color:#023021; font-size: 23px; font-weight:600; text-transform: uppercase;">Similar Apartments For rent</h1>
                        </div>
                        <div>
                            <a href="" style="color:#023021;">Show all</a>
                        </div>
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
                                        <a href="" class="btn btn-outline-warning btn-3 px-3">View Details</a>
                                    </div>
                                </div>
                            </div> 
                        </div>

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
                                        <a href="" class="btn btn-outline-warning btn-3 px-3">View Details</a>
                                    </div>
                                </div>
                            </div> 
                        </div>

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