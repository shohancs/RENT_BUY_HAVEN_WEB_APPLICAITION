<?php include"inc/header.php"; ?>
<main>
	<!-- START: Breadcrumb -->
     <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-uppercase d-flex justify-content-between">
                    <div>
                        <h4 style="color: #023021; font-size: 25px;">Update account</h4>
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
					<div class="" style="border-left: 3px double #ffc107; padding: 0 2%;">
                        <h1 class="mt-5 mb-4" style="letter-spacing: 2px; color:#023021; font-size: 25px; font-weight:600;">User Information</h1>
                    </div>
					<div class="user bg-light p-4" style="border-top: 4px solid #ffc107; border-radius: 10px;">

						<?php  
							$profileId = $_SESSION['email'];
							$sql = "SELECT * FROM role WHERE email='$profileId' AND status=1";
							$query = mysqli_query( $db, $sql );

							while( $row = mysqli_fetch_assoc($query) ) {
								$id  			= $row['id'];
				  				$name  			= $row['name'];
				  				$email  		= $row['email'];
				  				$phone  		= $row['phone'];
				  				$address  		= $row['address'];
				  				$password  		= $row['password'];
				  				$role  			= $row['role'];
				  				$image  		= $row['image'];
				  				$nid  			= $row['nid'];
				  				$status  		= $row['status'];
				  				$join_date  	= $row['join_date'];
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
											

											<input type="hidden" value="3" name="role">
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

								$updateIdStore 	= mysqli_real_escape_string($db, $_POST['updateRole']);
								$updateId 		= mysqli_real_escape_string($db, $_POST['updateId']);
								$name 			= mysqli_real_escape_string($db, $_POST['name']);
								$email 			= mysqli_real_escape_string($db, $_POST['email']);
								$phone 			= mysqli_real_escape_string($db, $_POST['phone']);
								$address 		= mysqli_real_escape_string($db, $_POST['address']);
								$password 		= mysqli_real_escape_string($db, $_POST['password']);
								$repassword		= mysqli_real_escape_string($db, $_POST['repassword']);
								$role 			= mysqli_real_escape_string($db, $_POST['role']);
								$status 		= mysqli_real_escape_string($db, $_POST['status']);

								$image 			= mysqli_real_escape_string($db, $_FILES['image']['name']);
								$tmpImg 		= $_FILES['image']['tmp_name'];

								$nid 			= mysqli_real_escape_string($db, $_FILES['nid']['name']);
								$tmpNidImg 		= $_FILES['nid']['tmp_name'];

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
											header("Location: index.php");
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
											header("Location: index.php");
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
											header("Location: index.php");
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
										header("Location: index.php");
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
										header("Location: index.php");
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
										header("Location: index.php");
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
											header("Location: index.php");
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
										header("Location: index.php");
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
			</div>
		</div>
	</section>
</main>
<?php include"inc/footer.php"; ?>