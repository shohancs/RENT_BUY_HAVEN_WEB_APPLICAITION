<?php include"inc/header.php"; ?>

<main>

    <div class="container py-5">
        <div class="row">
            <div class="col-lg-12 ">
                <h1 class="text-center pt-5" style="letter-spacing: 1px; color:#023021; font-size: 50px; font-weight:500;">About Rent Buy Haven</h1>
                <p class="text-center pb-5">We are a small pasionate team.</p>

                <h3 class="mt-5" style="letter-spacing: 1px; color:#023021; font-size: 30px; font-weight:500;">Empowering Your Real Estate Journey with Seamless Rent and Buy Solutions</h3>
                <p class="pt-1" style="line-height: 28px;">Based in Bangladesh, our dynamic team is committed to providing innovative solutions for individuals seeking to rent or buy properties. Whether you're looking for an apartment, hotel, store, or plot, our platform connects you with the right choices without the hassle. Our mission is to simplify your real estate experience by offering a user-friendly interface and efficient tools that make finding the perfect property easier than ever. By integrating advanced features and real-time updates, we ensure that our platform stays ahead of the curve, enabling seamless transactions and smooth property browsing in a digital-first world.</p>
            </div>

            <div class="d-flex justify-content-center py-5"> 
            <?php  
                $roleSql = "SELECT * FROM role WHERE role=1 AND status = 1 ORDER BY name ASC";
                $roleQuery = mysqli_query( $db, $roleSql );

                while ( $row = mysqli_fetch_assoc( $roleQuery ) ) {
                    $id             = $row['id'];
                    $name           = $row['name'];
                    $email          = $row['email'];
                    $role           = $row['role'];
                    $image          = $row['image'];
                    $status         = $row['status'];
                    ?>

                    <div class="text-center me-4">
                        <?php 
                            if ( !empty( $image ) ) {
                                echo '<img src="admin/assets/images/role/' . $image . '" alt="" width="300" height="300" style="border-radius: 5px;">';
                            }
                            else { 
                                echo '<img src="admin/assets/images/dummy.jpg" alt=""  width="300" height="300">';
                            }
                        ?>
                        <h5 class="pt-3" style="color:#023021; font-size: 20px; font-weight:500;"><?php echo $name; ?></h5>
                        <p class="m-0" style="color:#023021; font-size: 1em;"><i class="fa-regular fa-envelope"></i> <?php echo $email; ?></p>
                        <p style="color:#023021; font-size: 1em;">Co-Founder</p>
                        
                    </div>

                    <?php

                    
            }

            ?>
            </div>
            <div class="col-lg-4 pb-3">
                <img src="" alt="">
            </div>
        </div>
    </div>
    
</main>
    
<?php include"inc/footer.php"; ?>