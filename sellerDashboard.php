<?php
    session_start();
    ob_start();
    include"admin/inc/db.php"
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Seller Dashboard</title>
    <?php include"inc/css.php" ?>
    
  </head>

  <body style="background: #F4F4F4;">

    <main>
      <section>
        <div class="container-fluid">
          <div class="row">
          <?php include"inc/asideseller.php" ?>
            <div class="col-10 p-4" style="background: #F4F4F4;">
              <div class="d-flex justify-content-between align-items-center">
                <h4 class="" style="margin: 0px auto; color:#023021;">Welcome to Seller Dashboard</h4>
                <div>
                  <?php  
                      if ( !empty( $_SESSION['email'] ) ) { ?>
                          <div class="dropdown">
                            <div class="d-flex align-items-center showlog">
                                <?php 
                                    if ( !empty( $_SESSION['image'] ) ) {
                                        echo '<img src="admin/assets/images/role/' . $_SESSION['image'] . '" alt="" style="width: 60px; border-radius: 20%;">';
                                    }
                                    else { 
                                        echo '<img src="admin/assets/images/dummy.jpg" alt="" style="width: 60px; border-radius: 20%;">';
                                    }
                                ?>
                                <h5 class="ps-3"><?php echo $_SESSION['name']; ?></h5>
                            </div>  
                          </div>
                      <?php }
                  ?>
                </div>
              </div>
              
              
              <hr class="pb-2">
              <?php  
                  $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

                  if ( $do == 'Manage' ) { ?>
                    <!-- STRAT: PACKAGE PART -->
                    <section class="">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 text-center pb-3">
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
                                                <form method="GET">
                                                    <div class="d-grid gap-2">
                                                        <a href="checkout.php?price=<?php echo $discount_price; ?>&pak=<?php echo $name; ?>&email=<?php echo $_SESSION['email']; ?>" class="btn btn-success quBtn">GET STARTED</a>
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
                  <?php }

                  else if ( $do == 'Invoice' ) { ?>                    
                    <h4 class="" style="margin: 0px auto; color:#023021;">My Invoice</h4>      

                    <!-- Table Start -->
                    <div class="table-responsive py-3">
                      <table id="example" class="table table-striped table-hover table-bordered" >
                        <thead class="table-dark">
                          <tr>
                            <th scope="col">Invoice Id</th>
                            <th scope="col">Package Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Transaction ID</th>
                            <th scope="col">Transaction Date</th>
                            <th scope="col">Renewal Date</th>
                            <th scope="col">Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php  
                            $sesEmail = $_SESSION['email'];
                            $sql = "SELECT * FROM transactions WHERE user_email='$sesEmail' ORDER BY id DESC";
                            $query = mysqli_query($db, $sql);
                            $count = mysqli_num_rows($query);

                            if ( $count == 0 ) { ?>
                              <div class="alert alert-danger text-center" role="alert">
                                Sorry! No Data Found..
                              </div>
                           <?php }
                           else {
                              $i = 0;
                              while ( $row = mysqli_fetch_assoc($query) ) {
                                $id               = $row['id'];
                                $transaction_id   = $row['transaction_id'];
                                $user_email       = $row['user_email'];
                                $package_name     = $row['package_name'];
                                $price            = $row['price'];
                                $transaction_date = $row['transaction_date'];
                                $renewal_date     = $row['renewal_date'];
                                $status           = $row['status'];
                                $i++;
                                ?>

                                <tr>
                                  <th scope="row"><?php echo $i; ?></th>
                                  <td><?php echo $package_name; ?></td>
                                  <td><?php echo $price; ?></td>
                                  <td><?php echo $transaction_id; ?></td>
                                  <td><?php echo $transaction_date; ?></td>
                                  <td><?php echo $renewal_date; ?></td>
                                  <td><?php 
                                    if ( $status == 1 ) { ?>
                                      <span class="badge text-bg-primary">Active</span>
                                    <?php }
                                    else if ( $status == 0 ) { ?>
                                      <span class="badge text-bg-warning">Pending</span>
                                    <?php }
                                  ?></td>
                                </tr>

                                <?php
                              }
                           }

                            

                          ?>
                          
                        </tbody>
                      </table>
                    </div>
                    <!-- Table End -->

                  <?php }

                  else if ( $do == 'Profile' ) { ?>                  
                    <div class="col-lg-12">
                      <div class="" style="border-left: 3px double #ffc107; padding: 0 2%;">
                          <h1 class="mt-5 mb-4" style="letter-spacing: 2px; color:#023021; font-size: 25px; font-weight:600;">Seller Information</h1>
                      </div>
                      <div class="user bg-light p-4" style="border-top: 4px solid #ffc107; border-radius: 10px;">

                        <?php  
                          $profileId = $_SESSION['email'];
                          $sql = "SELECT * FROM role WHERE email='$profileId' AND status=1";
                          $query = mysqli_query( $db, $sql );

                          while( $row = mysqli_fetch_assoc($query) ) {
                            $id       = $row['id'];
                              $name       = $row['name'];
                              $email      = $row['email'];
                              $phone      = $row['phone'];
                              $address      = $row['address'];
                              $password     = $row['password'];
                              $role       = $row['role'];
                              $image      = $row['image'];
                              $nid        = $row['nid'];
                              $status     = $row['status'];
                              $join_date    = $row['join_date'];
                              ?>
                              <form action="" method="POST" enctype="multipart/form-data">
                              <div class="row">
                                <div class="col-lg-6">
                                  <div class="mb-3">
                                    <label>Full Name</label>
                                    <input type="text" name="name" class="form-control" required autocomplete="off" placeholder="enter name.." value="<?php echo $name; ?>">
                                  </div>

                                  <div class="mb-3">
                                    <label>Email Address</label>
                                    <p name="email" class="form-control text-danger"><?php echo $email; ?></p>
                                    <input type="hidden" name="email" class="form-control" required autocomplete="off" placeholder="enter name.." value="<?php echo $email; ?>">
                                  </div>

                                  <div class="mb-3">
                                    <label>Phone No</label>
                                    <input type="tel" name="phone" class="form-control" required autocomplete="off" placeholder="+880 1...." value="<?php echo "$phone"; ?>">
                                  </div>

                                  <div class="mb-3">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" autocomplete="off" placeholder="**********">
                                  </div>
                                  <div class="mb-3">
                                    <label>Re-Password</label>
                                    <input type="password" name="repassword" class="form-control" autocomplete="off" placeholder="**********">
                                  </div>

                                  <div class="mb-3">
                                    <label>Address</label>
                                    <textarea name="address" class="form-control" id="" cols="30" rows="3" required autocomplete="off" placeholder="address.."><?php echo $address; ?></textarea>
                                  </div>
                                  
                                </div>
                                <div class="col-lg-6">
                                  

                                  <input type="hidden" value="4" name="role">
                                  <input type="hidden" value="1" name="status">

                                  <div class="mb-3">
                                    <label for="">User Image</label>
                                    <br><br>
                                      <?php 
                                            if ( !empty( $image ) ) {
                                          echo '<img src="admin/assets/images/role/' . $image . '" alt="" style="width: 60%;">';
                                            }
                                            else { 
                                          echo '<img src="admin/assets/images/dummy.jpg" alt="" style="width: 60%;">';
                                            }
                                          ?>
                                      <br><br>
                                    <input type="file" class="form-control" name="image">
                                  </div>

                                  <div class="mb-3">
                                    <label for="">Nid Card</label>
                                    <br><br>
                                    <?php 
                                          if ( !empty( $nid ) ) {
                                        echo '<img src="admin/assets/images/role/nid/' . $nid . '" alt="" style="width: 100%;">';
                                          }
                                          else { 
                                        echo 'Not Uploaded';
                                          }
                                        ?>
                                    <br><br>
                                    <input type="file" class="form-control" name="nid">
                                  </div>

                                  <div class="mb-3">
                                    <div class="d-grid gap-2">
                                      <input type="hidden" name="updateId" value="<?php echo $id; ?>">
                                      <input type="submit" name="updateRole" class="btn btn-dark px-5 quBtn" value="Update">
                                    </div>                      
                                  </div>

                                  
                                </div>
                              </div>    
                            </form>
                              <?php
                          }
                        ?>

                        <!-- START : FORM -->
                        

                        <?php  
                          if (isset( $_POST['updateRole'] )) {

                              $updateIdStore  = mysqli_real_escape_string($db, $_POST['updateRole']);
                              $updateId     = mysqli_real_escape_string($db, $_POST['updateId']);
                              $name       = mysqli_real_escape_string($db, $_POST['name']);
                              $email      = mysqli_real_escape_string($db, $_POST['email']);
                              $phone      = mysqli_real_escape_string($db, $_POST['phone']);
                              $address    = mysqli_real_escape_string($db, $_POST['address']);
                              $password     = mysqli_real_escape_string($db, $_POST['password']);
                              $repassword   = mysqli_real_escape_string($db, $_POST['repassword']);
                              $role       = mysqli_real_escape_string($db, $_POST['role']);
                              $status     = mysqli_real_escape_string($db, $_POST['status']);

                              $image      = mysqli_real_escape_string($db, $_FILES['image']['name']);
                              $tmpImg     = $_FILES['image']['tmp_name'];

                              $nid      = mysqli_real_escape_string($db, $_FILES['nid']['name']);
                              $tmpNidImg    = $_FILES['nid']['tmp_name'];

                              if ( !empty( $password ) && !empty($image) && !empty($nid) ) {
                                if ( $password == $repassword ) {
                                  $hassedPass = sha1($password);

                                  // DELETE OLD IMAGE FROM FOLDER
                                  $oldImgSql = "SELECT * FROM role WHERE id='$updateId'";
                                  $oldIMgQuery = mysqli_query( $db, $oldImgSql );

                                  while ( $row = mysqli_fetch_assoc($oldIMgQuery) ){
                                    $oldImg = $row['image'];
                                    unlink("admin/assets/images/role/$img" . $oldImg);
                                  } 
                                  $img = rand(0, 999999) . "_" . $image;
                                  move_uploaded_file($tmpImg, 'admin/assets/images/role/' . $img);

                                  // DELETE NID FROM FOLDER
                                  $oldNidSql = "SELECT * FROM role WHERE id='$updateId'";
                                  $oldNidQuery = mysqli_query( $db, $oldNidSql );

                                  while ( $row = mysqli_fetch_assoc($oldNidQuery) ){
                                    $oldNid = $row['nid'];
                                    unlink("admin/assets/images/role/nid/$nidImg" . $oldNid);
                                  } 
                                  $nidImg = rand(0, 999999) . "_" . $nid;
                                  move_uploaded_file($tmpNidImg, 'admin/assets/images/role/nid/' . $nidImg);


                                  // Sql Update
                                  $updateRoleSql = "UPDATE role SET name='$name', email='$email', phone='$phone', address='$address', password='$hassedPass', role='$role', image='$img', nid='$nidImg', status='$status', join_date=now() WHERE id='$updateId'";
                                  $updateRoleQuery = mysqli_query( $db, $updateRoleSql );

                                  if ($updateRoleQuery) {
                                    header("Location: sellerDashboard.php?do=Manage");
                                  }
                                  else {
                                    die ( "Mysqli Error." . mysqli_error($db) );
                                  }

                                }
                                
                              }

                              else if ( !empty( $password ) && !empty($image) && empty($nid) ) {
                                if ( $password == $repassword ) {
                                  $hassedPass = sha1($password);

                                  // DELETE OLD IMAGE FROM FOLDER
                                  $oldImgSql = "SELECT * FROM role WHERE id='$updateId'";
                                  $oldIMgQuery = mysqli_query( $db, $oldImgSql );

                                  while ( $row = mysqli_fetch_assoc($oldIMgQuery) ){
                                    $oldImg = $row['image'];
                                    unlink("admin/assets/images/role/$img" . $oldImg);
                                  } 
                                  $img = rand(0, 999999) . "_" . $image;
                                  move_uploaded_file($tmpImg, 'admin/assets/images/role/' . $img);


                                  // Sql Update
                                  $updateRoleSql = "UPDATE role SET name='$name', email='$email', phone='$phone', address='$address', password='$hassedPass', role='$role', image='$img', status='$status', join_date=now() WHERE id='$updateId'";
                                  $updateRoleQuery = mysqli_query( $db, $updateRoleSql );

                                  if ($updateRoleQuery) {
                                    header("Location: sellerDashboard.php?do=Manage");
                                  }
                                  else {
                                    die ( "Mysqli Error." . mysqli_error($db) );
                                  }

                                }
                                
                              }

                              else if ( !empty( $password ) && empty($image) && !empty($nid) ) {
                                if ( $password == $repassword ) {
                                  $hassedPass = sha1($password);

                                  // DELETE NID FROM FOLDER
                                  $oldNidSql = "SELECT * FROM role WHERE id='$updateId'";
                                  $oldNidQuery = mysqli_query( $db, $oldNidSql );

                                  while ( $row = mysqli_fetch_assoc($oldNidQuery) ){
                                    $oldNid = $row['nid'];
                                    unlink("admin/assets/images/role/nid/$nidImg" . $oldNid);
                                  } 
                                  $nidImg = rand(0, 999999) . "_" . $nid;
                                  move_uploaded_file($tmpNidImg, 'admin/assets/images/role/nid/' . $nidImg);


                                  // Sql Update
                                  $updateRoleSql = "UPDATE role SET name='$name', email='$email', phone='$phone', address='$address', password='$hassedPass', role='$role', nid='$nidImg', status='$status', join_date=now() WHERE id='$updateId'";
                                  $updateRoleQuery = mysqli_query( $db, $updateRoleSql );

                                  if ($updateRoleQuery) {
                                    header("Location: sellerDashboard.php?do=Manage");
                                  }
                                  else {
                                    die ( "Mysqli Error." . mysqli_error($db) );
                                  }

                                }
                                
                              }

                              else if ( empty( $password ) && !empty($image) && !empty($nid) ) {
                                // DELETE OLD IMAGE FROM FOLDER
                                $oldImgSql = "SELECT * FROM role WHERE id='$updateId'";
                                $oldIMgQuery = mysqli_query( $db, $oldImgSql );

                                while ( $row = mysqli_fetch_assoc($oldIMgQuery) ){
                                  $oldImg = $row['image'];
                                  unlink("admin/assets/images/role/$img" . $oldImg);
                                } 
                                $img = rand(0, 999999) . "_" . $image;
                                move_uploaded_file($tmpImg, 'admin/assets/images/role/' . $img);

                                // DELETE NID FROM FOLDER
                                $oldNidSql = "SELECT * FROM role WHERE id='$updateId'";
                                $oldNidQuery = mysqli_query( $db, $oldNidSql );

                                while ( $row = mysqli_fetch_assoc($oldNidQuery) ){
                                  $oldNid = $row['nid'];
                                  unlink("admin/assets/images/role/nid/$nidImg" . $oldNid);
                                } 
                                $nidImg = rand(0, 999999) . "_" . $nid;
                                move_uploaded_file($tmpNidImg, 'admin/assets/images/role/nid/' . $nidImg);


                                // Sql Update
                                $updateRoleSql = "UPDATE role SET name='$name', email='$email', phone='$phone', address='$address', role='$role', image='$img', nid='$nidImg', status='$status', join_date=now() WHERE id='$updateId'";
                                $updateRoleQuery = mysqli_query( $db, $updateRoleSql );

                                if ($updateRoleQuery) {
                                  header("Location: sellerDashboard.php?do=Manage");
                                }
                                else {
                                  die ( "Mysqli Error." . mysqli_error($db) );
                                }
                                
                              }

                              else if ( empty( $password ) && empty($image) && !empty($nid) ) {
                                

                                // DELETE NID FROM FOLDER
                                $oldNidSql = "SELECT * FROM role WHERE id='$updateId'";
                                $oldNidQuery = mysqli_query( $db, $oldNidSql );

                                while ( $row = mysqli_fetch_assoc($oldNidQuery) ){
                                  $oldNid = $row['nid'];
                                  unlink("admin/assets/images/role/nid/$nidImg" . $oldNid);
                                } 
                                $nidImg = rand(0, 999999) . "_" . $nid;
                                move_uploaded_file($tmpNidImg, 'admin/assets/images/role/nid/' . $nidImg);


                                // Sql Update
                                $updateRoleSql = "UPDATE role SET name='$name', email='$email', phone='$phone', address='$address', role='$role', nid='$nidImg', status='$status', join_date=now() WHERE id='$updateId'";
                                $updateRoleQuery = mysqli_query( $db, $updateRoleSql );

                                if ($updateRoleQuery) {
                                  header("Location: sellerDashboard.php?do=Manage");
                                }
                                else {
                                  die ( "Mysqli Error." . mysqli_error($db) );
                                }
                                
                              }

                              else if ( empty( $password ) && !empty($image) && empty($nid) ) {
                                // DELETE OLD IMAGE FROM FOLDER
                                $oldImgSql = "SELECT * FROM role WHERE id='$updateId'";
                                $oldIMgQuery = mysqli_query( $db, $oldImgSql );

                                while ( $row = mysqli_fetch_assoc($oldIMgQuery) ){
                                  $oldImg = $row['image'];
                                  unlink("admin/assets/images/role/$img" . $oldImg);
                                } 
                                $img = rand(0, 999999) . "_" . $image;
                                move_uploaded_file($tmpImg, 'admin/assets/images/role/' . $img);

                                


                                // Sql Update
                                $updateRoleSql = "UPDATE role SET name='$name', email='$email', phone='$phone', address='$address', role='$role', image='$img', status='$status', join_date=now() WHERE id='$updateId'";
                                $updateRoleQuery = mysqli_query( $db, $updateRoleSql );

                                if ($updateRoleQuery) {
                                  header("Location: sellerDashboard.php?do=Manage");
                                }
                                else {
                                  die ( "Mysqli Error." . mysqli_error($db) );
                                }
                                
                              }

                              else if ( !empty( $password ) && empty($image) && empty($nid) ) {
                                if ( $password == $repassword ) {
                                  $hassedPass = sha1($password);

                                  

                                  // Sql Update
                                  $updateRoleSql = "UPDATE role SET name='$name', email='$email', phone='$phone', address='$address', password='$hassedPass', role='$role', status='$status', join_date=now() WHERE id='$updateId'";
                                  $updateRoleQuery = mysqli_query( $db, $updateRoleSql );

                                  if ($updateRoleQuery) {
                                    header("Location: sellerDashboard.php?do=Manage");
                                  }
                                  else {
                                    die ( "Mysqli Error." . mysqli_error($db) );
                                  }

                                }
                                
                              }

                              else if ( empty( $password ) && empty($image) && empty($nid) ) {

                                // Sql Update
                                $updateRoleSql = "UPDATE role SET name='$name', email='$email', phone='$phone', address='$address', role='$role', status='$status', join_date=now() WHERE id='$updateId'";
                                $updateRoleQuery = mysqli_query( $db, $updateRoleSql );

                                if ($updateRoleQuery) {
                                  header("Location: sellerDashboard.php?do=Manage");
                                }
                                else {
                                  die ( "Mysqli Error." . mysqli_error($db) );
                                }
                                
                              }

                              else { ?>
                                <div class="alert alert-warning text-center" role="alert">
                                  Sorry! please password and repassword use same input.
                                </div>
                              <?php }         

                              

                            }
                        ?>

                        
                        <!-- END : FORM -->
                      </div>
                    </div>             
                  <?php }
              ?>
          </div>
        </div>
      </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>




    <?php 
      ob_end_flush();
    ?>
  </body>



  
</html>