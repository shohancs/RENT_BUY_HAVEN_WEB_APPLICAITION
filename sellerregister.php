<?php include"inc/header.php"; ?>
<main>
	<!-- START: Breadcrumb -->
     <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-uppercase d-flex justify-content-between">
                    <div>
                        <h4 style="color: #023021; font-size: 25px;">Register new account</h4>
                    </div>
                    <div class="d-flex">
                        <a href="index.php"><h4 style="color:#545454; font-size: 17px; font-weight: 400; ">HOME</h4></a>
                        <h4 class="px-2" style="color:#545454; font-size: 17px; font-weight: 400; "> / </h4>
                        <h4 style="color:#6c757d; font-size: 17px; font-weight: 400; ">signup</h4>
                    </div>
                </div>
            </div>
        </div>
     </section>
    <!-- END: Breadcrumb -->
	<section>
		<div class="container py-5 mb-5">
			<div class="row">
				
				<div class="col-lg-12">
					<div class="" style="border-left: 3px double #023021; padding: 0 2%;">
                        <h1 class="mt-5 mb-4" style="letter-spacing: 2px; color:#023021; font-size: 25px; font-weight:600;">Create Seller Account</h1>
                    </div>
					<div class="user bg-light p-4" style="border-top: 4px solid #023021; border-radius: 10px;">
						<!-- START : FORM -->
						<form action="" method="POST" enctype="multipart/form-data">
							<div class="row">
								<div class="col-lg-6">
									<div class="mb-3">
										<label>Full Name</label>
										<input type="text" name="name" class="form-control" required autocomplete="off" placeholder="enter name..">
									</div>

									<div class="mb-3">
										<label>Email Address</label>
										<input type="email" name="email" class="form-control" required autocomplete="off" placeholder="enter email">
									</div>

									<div class="mb-3">
										<label>Phone No</label>
										<input type="tel" name="phone" class="form-control" required autocomplete="off" placeholder="+880 1....">
									</div>

									<div class="mb-3">
										<label>Password</label>
										<input type="password" name="password" class="form-control" required autocomplete="off" placeholder="**********">
									</div>
									<div class="mb-3">
										<label>Re-Password</label>
										<input type="password" name="repassword" class="form-control" required autocomplete="off" placeholder="**********">
									</div>
									
								</div>
								<div class="col-lg-6">
									<div class="mb-3">
										<label>Address</label>
										<textarea name="address" class="form-control" id="" cols="30" rows="3" required autocomplete="off" placeholder="address.."></textarea>
									</div>

									<input type="hidden" value="4" name="role">
									<input type="hidden" value="1" name="status">

									<div class="mb-3">
										<label for="">Seller Image</label>
										<input type="file" class="form-control" name="image">
									</div>

									<div class="mb-3">
										<label for="">Nid Card (National Id Card)</label>
										<input type="file" class="form-control" name="nid" required>
									</div>

									<div class="mb-3">
										<div class="d-grid gap-2">
											<input type="submit" name="addseller" class="btn btn-dark px-5 quBtn" value="Submit">
										</div>											
									</div>

									<div class="form-group">
					                	<i class="fa-regular fa-circle-question"></i> Already has an Account? <a href="sellerlogin.php">Login Here</a>
					                </div>
								</div>
							</div>


						</form>

						<?php  
							if ( isset($_POST['addseller']) ) {
								$name 		= mysqli_real_escape_string($db, $_POST['name']);
								$email 		= mysqli_real_escape_string($db, $_POST['email']);
								$phone 		= mysqli_real_escape_string($db, $_POST['phone']);
								$address 	= mysqli_real_escape_string($db, $_POST['address']);
								$password 	= mysqli_real_escape_string($db, $_POST['password']);
								$repassword	= mysqli_real_escape_string($db, $_POST['repassword']);
								$role 		= mysqli_real_escape_string($db, $_POST['role']);
								$status 	= mysqli_real_escape_string($db, $_POST['status']);

								if ( $password == $repassword ) {
									$hassedPass = sha1($password);

									$image 		= mysqli_real_escape_string($db, $_FILES['image']['name']);
									$tmpImg 	= $_FILES['image']['tmp_name'];

									if ( !empty( $image ) ) {
										$img = rand(0, 999999) . "_" . $image;
										move_uploaded_file($tmpImg, 'admin/assets/images/role/' . $img);
									}
									else {
										$img = "";
									}

									$nid 		= mysqli_real_escape_string($db, $_FILES['nid']['name']);
									$tmpNidImg 	= $_FILES['nid']['tmp_name'];

									if ( !empty( $nid ) ) {
										$nidImg = rand(0, 999999) . "_" . $nid;
										move_uploaded_file($tmpNidImg, 'admin/assets/images/role/nid/' . $nidImg);
									}
									else {
										$nidImg = "";
									}

									$addRole = "INSERT INTO role ( name, email, phone, address, password, role, image, nid, status, join_date ) VALUES ( '$name', '$email', '$phone', '$address', '$hassedPass', '$role', '$img', '$nidImg', '$status', now() )";
									$roleQuery = mysqli_query ( $db, $addRole );

									if ( $roleQuery ) {
									  	header( "Location: sellerlogin.php" );
									}  
									else {
										die( "Mysql Error." . mysqli_error($db) );
									}
								}
								else { ?>
									<div class="alert alert-warning" role="alert">
									  Sorry! please password and repassword use same input.
									</div>
								<?php }
							}
						?>
						<!-- END : FORM -->
					</div>
				</div>
			</div>
		</div>
	</section>
</main>
<?php include"inc/footer.php"; ?>