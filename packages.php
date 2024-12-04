<?php include"inc/header.php"; ?>

<main>

    <!-- START: Breadcrumb -->
     <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-uppercase d-flex justify-content-between">
                    <div>
                        <h4 style="color: #023021; font-size: 25px;">PACKAGES Offer</h4>
                    </div>
                    <div class="d-flex">
                        <a href="index.php"><h4 style="color:#545454; font-size: 17px; font-weight: 400; ">HOME</h4></a>
                        <h4 class="px-2" style="color:#545454; font-size: 17px; font-weight: 400; "> / </h4>
                        <h4 style="color:#6c757d; font-size: 17px; font-weight: 400; ">BUY PACKAGE</h4>
                    </div>
                </div>
            </div>
        </div>
     </section>
    <!-- END: Breadcrumb -->

    <!-- STRAT: PACKAGE PART -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center my-5 pb-3">
                    <h3 style="letter-spacing: 3px; color:#023021; font-size: 40px; font-weight:600;">Find the Best Plan that's Right for Your Business</h3>
                    <p style="letter-spacing: 1px; color:#023021;">We Have the Features and Service You Deserve!</p>
                </div>

                <?php  
                    $rentDivSql = "SELECT * FROM package WHERE status = 1 ORDER BY id ASC";
                    $rentDivQuery = mysqli_query( $db, $rentDivSql );

                    while ( $row = mysqli_fetch_assoc( $rentDivQuery ) ) {
                        $id             = $row['id'];
                        $name           = $row['name'];
                        $details        = $row['details'];
                        $basic_price    = $row['basic_price'];
                        $discount_price = $row['discount_price'];
                        $dis_percent    = $row['dis_percent'];
                        $renew          = $row['renew'];
                        $rent_flat      = $row['rent_flat'];
                        $rent_store     = $row['rent_store'];
                        $rent_hotel     = $row['rent_hotel'];
                        $buy_flat       = $row['buy_flat'];
                        $buy_store      = $row['buy_store'];
                        $buy_hotel      = $row['buy_hotel'];
                        $buy_property   = $row['buy_property'];
                        $status         = $row['status'];
                        $join_date      = $row['join_date'];
                        ?>

                        <div class="col-lg-4">
                            <div class="cards border border-light-subtle p-5 bg-light" style="border-radius: 10px; filter: drop-shadow(0px 0px 12px #ccc);">
                                <?php  
                                    if ( $id == 2 ) { ?>
                                        <div class="text-cards">
                                            <p style="letter-spacing: 2px; color:#023021; font-size: 18px; font-weight:500; color: #fff; text-align: right;">Most <br> Popular</p>
                                        </div>
                                    <?php }
                                ?>
                                
                                <h3 class="pb-2" style="letter-spacing: 2px; color:#023021; font-size: 40px; font-weight:600; text-transform: capitalize;"><?php echo $name; ?></h3>
                                <p style="letter-spacing: 1px; color:#023021; font-size: 16px; font-weight:500; "><?php echo $details; ?></p>

                                <h1 style="letter-spacing: 2px; color:#023021; font-size: 50px; font-weight:600; padding-bottom: 0px; ">TK <?php echo $discount_price; ?><span style="font-size: 30px; font-weight: 400;">/mo</span></h1>
                                <p style="letter-spacing: 1px; color:#023021; font-size: 16px; font-weight:500; "><?php echo $dis_percent; ?>% OFF</p>
                                <h5 class="text-danger">Renew at TK <?php echo $basic_price; ?>/mo</h5>
                                <hr>

                                <h5 class="text-success pb-3 py-1">GET THE OFFER</h5>

                                <?php  
                                    if ( !empty($rent_flat) ) { ?>
                                        <div class="d-flex offer">
                                            <i class="fa-solid fa-check me-3"></i>
                                            <p><strong><?php echo $rent_flat; ?></strong> Rent Apartment</p>
                                        </div>
                                    <?php }
                                ?>

                                <?php  
                                    if ( !empty($rent_hotel) ) { ?>
                                        <div class="d-flex offer">
                                            <i class="fa-solid fa-check me-3"></i>
                                            <p><strong><?php echo $rent_hotel; ?></strong> Rent Hotel</p>
                                        </div>
                                    <?php }
                                ?>

                                <?php  
                                    if ( !empty($rent_store) ) { ?>
                                        <div class="d-flex offer">
                                            <i class="fa-solid fa-check me-3"></i>
                                            <p><strong><?php echo $rent_store; ?></strong> Rent Store</p>
                                        </div>
                                    <?php }
                                ?>

                                <?php  
                                    if ( !empty($buy_flat) ) { ?>
                                        <div class="d-flex offer">
                                            <i class="fa-solid fa-check me-3"></i>
                                            <p><strong><?php echo $buy_flat; ?></strong> Sell Apartment</p>
                                        </div>
                                    <?php }
                                ?>

                                <?php  
                                    if ( !empty($buy_hotel) ) { ?>
                                        <div class="d-flex offer">
                                            <i class="fa-solid fa-check me-3"></i>
                                            <p><strong><?php echo $buy_hotel; ?></strong> Sell Hotel</p>
                                        </div>
                                    <?php }
                                ?>

                                <?php  
                                    if ( !empty($buy_store) ) { ?>
                                        <div class="d-flex offer">
                                            <i class="fa-solid fa-check me-3"></i>
                                            <p><strong><?php echo $buy_store; ?></strong> Sell Store</p>
                                        </div>
                                    <?php }
                                ?>

                                <?php  
                                    if ( !empty($buy_property) ) { ?>
                                        <div class="d-flex offer">
                                            <i class="fa-solid fa-check me-3"></i>
                                            <p><strong><?php echo $buy_property; ?></strong> Sell Plots</p>
                                        </div>
                                    <?php }
                                ?>

                                <form action="sellerregister.php" method="POST" style="padding: 13px 0px; ">
                                    <div class="d-grid gap-2">
                                        <input type="submit" class="btn btn-success quBtn" value="GET STARTED">
                                    </div>
                                </form>

                            </div>
                        </div>

                        <?php
                    }
                                                        
                ?>

                

            </div>
        </div>
    </section>
    <!-- END: PACKAGE PART -->

</main>
    
<?php include"inc/footer.php"; ?>