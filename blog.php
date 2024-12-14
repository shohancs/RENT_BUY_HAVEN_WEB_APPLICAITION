<?php include"inc/header.php"; ?>

<main>

    <!-- START: Breadcrumb -->
     <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-uppercase d-flex justify-content-between">
                    <div>
                        <h4 style="color: #023021; font-size: 25px;">Sustainable, Secure Blog</h4>
                    </div>
                    <div class="d-flex">
                        <a href="index.php"><h4 style="color:#545454; font-size: 17px; font-weight: 400; ">HOME</h4></a>
                        <h4 class="px-2" style="color:#545454; font-size: 17px; font-weight: 400; "> / </h4>
                        <h4 style="color:#6c757d; font-size: 17px; font-weight: 400; ">blog</h4>
                    </div>
                </div>
            </div>
        </div>
     </section>
    <!-- END: Breadcrumb -->

    <!-- Main Blog -->
    <section>
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-12">
                    <?php

                    $sql = "SELECT * FROM blog WHERE status=1 ORDER BY id DESC";
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

                        <div class="py-4">
                            <div class="pb-3">
                                <?php 
                                if ( !empty( $image ) ) {
                                    echo '<img src="admin/assets/images/blog/' . $image . '" alt="" style="width: 100%;">';
                                }
                                else { 
                                    echo '<img src="admin/assets/images/dummy.jpg" alt="" style="width: 100%;">';
                                }
                            ?>                                
                            </div>
                            
                            <span style="background: #023021; color: #fff; padding: 5px 10px; border-radius: 5px;"><?php echo $join_date; ?></span>

                            <h3 class="py-3" style="letter-spacing: 1px;color:#023021;font-size: 25px;font-weight: 500;text-transform: capitalize;"><?php echo $title; ?></h3>
                            <p style="line-height: 26px; text-align: justify;"><?php echo $details; ?></p>
                            <div class="d-flex">
                                <div class="me-3" style="color: #023021;">
                                    <i class="fa-regular fa-user me-1"></i>
                                    By <?php echo $name; ?>
                                </div>
                                <div style="color: #023021;">
                                    <i class="fa-solid fa-house me-1"></i>
                                    <?php
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
                                                ?>
                                </div>
                            </div>
                        </div>
                        <hr class="pb-2">

                        <?php
                    }
                    ?>

                    
                    
                </div>
            </div>
        </div>
    </section>
    <!-- Main Blog -->
    
</main>
    
<?php include"inc/footer.php"; ?>