<?php include "inc/header.php"; ?>

	<!--wrapper-->
	<div class="wrapper">

		<?php include "inc/fieldleftmenu.php"; ?>
		<?php include "inc/fieldtopbar.php"; ?>

		<!--START: BODY CONTENT -->
		<div class="page-wrapper">
			<div class="page-content">

				<?php  
					$do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

					if ( $do == "fieldManage" ) { ?>
						<!--breadcrumb-->
						<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
							<div class="breadcrumb-title pe-3">Manage</div>
							<div class="ps-3">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb mb-0 p-0">
										<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">All Role list</li>
									</ol>
								</nav>
							</div>
						</div>
						<!--end breadcrumb-->

						<h6 class="mb-0 text-uppercase">My Accocunt</h6>
						<hr>
						<div class="card">
							<div class="card-body">
								<div class="border p-3 radius-10">
									<!-- START: DATATABLE -->
									<div class="table-responsive">
										<table class="table table-striped table-hover table-bordered"  id="example">
										  <thead class="table-dark">
										    <tr>
										      <th scope="col" class="text-center">#Sl.</th>
										      <th scope="col" class="text-center">Image</th>
										      <th scope="col" class="text-center">Full Name</th>
										      <th scope="col" class="text-center">Email</th>
										      <th scope="col" class="text-center">Phone</th>
										      <th scope="col" class="text-center">Address</th>
										      <th scope="col" class="text-center">Role</th>
										      <th scope="col" class="text-center">Status</th>
										      <th scope="col" class="text-center">Action</th>
										    </tr>
										  </thead>

										  <tbody>
										  	<?php  

										  		$sesId = $_SESSION['email'];

										  		$roleSql = "SELECT * FROM role WHERE email='$sesId' AND  status = 1 AND role=2 ORDER BY name ASC";
										  		$roleQuery = mysqli_query( $db, $roleSql );
										  		$Count = mysqli_num_rows($roleQuery);

										  		if ( $Count == 0 ) { ?>
										  			<div class="alert alert-danger text-center" role="alert">
													  Sorry!! No data found in this datatable.
													</div>
										  		<?php }
										  		else {
										  			$i = 0;

										  			while ( $row = mysqli_fetch_assoc( $roleQuery ) ) {
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
										  				$i++;
										  				?>

										  				<tr>
														      <th scope="row" class="text-center"><?php echo $i; ?></th>
														      <td class="text-center">
														      	<?php 
														      		if ( !empty( $image ) ) {
																		echo '<img src="assets/images/role/' . $image . '" alt="" style="width: 60px;">';
														      		}
														      		else { 
																		echo '<img src="assets/images/dummy.jpg" alt="" style="width: 60px;">';
														      		}
														      	?>
														      	</td>
														      <td class="text-center"><?php echo $name; ?></td>
														      <td class="text-center"><?php echo $email; ?></td>
														      <td class="text-center"><?php echo $phone; ?></td>
														      <td class="text-center"><?php echo $address; ?></td>
														      <td class="text-center">
														      	<?php 
														      		if ( $role == 1 ) { ?>
														      			<span class="badge text-bg-success">Admin</span>
														      		<?php }
														      		else if ( $role == 2 ) { ?>
														      			<span class="badge text-bg-info">Field Checker</span>
														      		<?php }
														      		else if ( $role == 3 ) { ?>
														      			<span class="badge text-bg-warning">User</span>
														      		<?php }
														      		else if ( $role == 4 ) { ?>
														      			<span class="badge text-bg-primary">Seller</span>
														      		<?php }

														      	?>
														      		
														      	</td>
														      <td class="text-center">
														      	<?php  
														      		if ($status == 1) { ?>
														      			<span class="badge text-bg-success">Active</span>
														      		<?php }
														      		else if ($status == 0) { ?>
														      			<span class="badge text-bg-danger">InActive</span>
														      		<?php }
														      	?>
														      </td>
														      <td class="text-center">
														      	<div class="action-btn">
														      		<ul>
														      			<li>
														      				<a href="fieldRole.php?do=Edit&editId=<?php echo $id; ?>" class="btn btn-outline-primary" style="margin: 0 15px;"><i class="fa-solid fa-pencil"></i> Edit</a> 
														      			</li>
														      		</ul>
														      	</div>
														      </td>
														    </tr>
										  				<?php
										  			}
										  		}


										  	?>
										    
										  </tbody>
										</table>
									</div>							
									<!-- END: DATATABLE -->	
								</div>													
							</div>
						</div>
					<?php }

					else if ( $do == "sellerManage" ) { ?>
						<!--breadcrumb-->
						<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
							<div class="breadcrumb-title pe-3">Manage</div>
							<div class="ps-3">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb mb-0 p-0">
										<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">All Seller list</li>
									</ol>
								</nav>
							</div>
						</div>
						<!--end breadcrumb-->

						<h6 class="mb-0 text-uppercase">ALL Seller LIST</h6>
						<hr>
						<div class="card">
							<div class="card-body">
								<div class="border p-3 radius-10">
									<!-- START: DATATABLE -->
									<div class="table-responsive">
										<table class="table table-striped table-hover table-bordered"  id="example">
										  <thead class="table-dark">
										    <tr>
										      <th scope="col" class="text-center">#Sl.</th>
										      <th scope="col" class="text-center">Image</th>
										      <th scope="col" class="text-center">Full Name</th>
										      <th scope="col" class="text-center">Email</th>
										      <th scope="col" class="text-center">Phone</th>
										      <th scope="col" class="text-center">Address</th>
										      <th scope="col" class="text-center">Role</th>
										      <th scope="col" class="text-center">Status</th>
										      <th scope="col" class="text-center">Join Date</th>
										      <th scope="col" class="text-center">Action</th>
										    </tr>
										  </thead>

										  <tbody>

										  	<?php  
										  		$rentDivSql = "SELECT * FROM transactions ORDER BY id DESC";
										  		$rentDivQuery = mysqli_query( $db, $rentDivSql );
										  		while ( $row = mysqli_fetch_assoc( $rentDivQuery ) ) {
									  				$id               = $row['id'];
					                                $user_email       = $row['user_email'];

					                                $roleSql = "SELECT * FROM role WHERE email='$user_email' AND status = 1 AND role=4 ORDER BY name ASC";
										  		$roleQuery = mysqli_query( $db, $roleSql );
										  		$Count = mysqli_num_rows($roleQuery);

										  		if ( $Count == 0 ) { ?>
										  			<div class="alert alert-danger text-center" role="alert">
													  Sorry!! No data found in this datatable.
													</div>
										  		<?php }
										  		else {
										  			$i = 0;

										  			while ( $row = mysqli_fetch_assoc( $roleQuery ) ) {
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
										  				$i++;
										  				?>
										  				
										  					<tr>
														      <th scope="row" class="text-center"><?php echo $i; ?></th>
														      <td class="text-center">
														      	<?php 
														      		if ( !empty( $image ) ) {
																		echo '<img src="assets/images/role/' . $image . '" alt="" style="width: 60px;">';
														      		}
														      		else { 
																		echo '<img src="assets/images/dummy.jpg" alt="" style="width: 60px;">';
														      		}
														      	?>
														      	</td>
														      <td class="text-center"><?php echo $name; ?></td>
														      <td class="text-center"><?php echo $email; ?></td>
														      <td class="text-center"><?php echo $phone; ?></td>
														      <td class="text-center"><?php echo $address; ?></td>
														      <td class="text-center">
														      	<?php 
														      		if ( $role == 1 ) { ?>
														      			<span class="badge text-bg-success">Admin</span>
														      		<?php }
														      		else if ( $role == 2 ) { ?>
														      			<span class="badge text-bg-info">Field Checker</span>
														      		<?php }
														      		else if ( $role == 3 ) { ?>
														      			<span class="badge text-bg-warning">User</span>
														      		<?php }
														      		else if ( $role == 4 ) { ?>
														      			<span class="badge text-bg-primary">Seller</span>
														      		<?php }

														      	?>
														      		
														      	</td>
														      <td class="text-center">
														      	<?php  
														      		if ($status == 1) { ?>
														      			<span class="badge text-bg-success">Active</span>
														      		<?php }
														      		else if ($status == 0) { ?>
														      			<span class="badge text-bg-danger">InActive</span>
														      		<?php }
														      	?>
														      </td>
														      <td class="text-center"><?php echo $join_date; ?></td>
														      <td class="text-center">
														      	<div class="action-btn">
														      		<ul>
														      			<li>
														      				<a href="fieldRole.php?do=Edit&editId=<?php echo $id; ?>" class="btn btn-outline-primary" style="margin: 0 15px;"><i class="fa-solid fa-pencil"></i> Check Info</a> 
														      			</li>
														      		</ul>
														      	</div>
														      </td>
														    </tr>
										  				<?php
										  			}
										  		}

					                            }
										  	?>
										    
										  </tbody>
										</table>
									</div>							
									<!-- END: DATATABLE -->	
								</div>													
							</div>
						</div>
					<?php }

					else if( $do == "Edit" ) {
						if ( isset($_GET['editId']) ) {
							$editIdStore = $_GET['editId'];
							$editSql = "SELECT * FROM role WHERE id='$editIdStore'";
							$editQuery = mysqli_query( $db, $editSql );

							while ( $row = mysqli_fetch_assoc( $editQuery ) ) {
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
				  				<!--breadcrumb-->
								<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
									<div class="breadcrumb-title pe-3">Edit</div>
									<div class="ps-3">
										<nav aria-label="breadcrumb">
											<ol class="breadcrumb mb-0 p-0">
												<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
												</li>
												<li class="breadcrumb-item active" aria-current="page">Edit Role Info</li>
											</ol>
										</nav>
									</div>
								</div>
								<!--end breadcrumb-->

								<h6 class="mb-0 text-uppercase">Edit Role Info</h6>
								<hr>
								<div class="card">
									<div class="card-body">
										<div class="border p-3 radius-10">
											<!-- START : FORM -->
									<form action="fieldRole.php?do=Update" method="POST" enctype="multipart/form-data">
										<div class="row">
											<div class="col-lg-6">
												<div class="mb-3">
													<label>Full Name</label>
													<input type="text" name="name" class="form-control" required autocomplete="off" placeholder="enter name.." value="<?php echo $name; ?>">
												</div>

												<div class="mb-3">
													<label>Email Address</label>
													<input type="hidden" name="email" class="form-control" value="<?php echo $email; ?>">
													<h6 name="email" class="text-danger"><?php echo $email; ?></h6>
												</div>

												<div class="mb-3">
													<label>Phone No</label>
													<input type="tel" name="phone" class="form-control" required autocomplete="off" placeholder="+880 1...." value="<?php echo $phone; ?>">
												</div>

												<?php  
													if (  $role == 4 ) {
													}
													else { ?>
														<div class="mb-3">
															<label>Password</label>
															<input type="password" name="password" class="form-control" placeholder="**********">
														</div>
														<div class="mb-3">
															<label>Re-Password</label>
															<input type="password" name="repassword" class="form-control" placeholder="**********">
														</div>
													<?php }
												?>

												

												<div class="mb-3">
													<label>Address</label>
													<textarea name="address" class="form-control" id="" cols="30" rows="3" required autocomplete="off" placeholder="address.."><?php echo $address; ?></textarea>
												</div>
											</div>
											<div class="col-lg-6">

												<div class="mb-3">
													<input type="hidden" name="role" value="<?php echo $role; ?>">
													<input type="hidden" name="status" value="<?php echo $status; ?>">
												</div>

												<div class="mb-3">
													<label for="">Image</label>
													<br><br>
													<?php 
											      		if ( !empty( $image ) ) {
															echo '<img src="assets/images/role/' . $image . '" alt="" style="width: 100%;">';
											      		}
											      		else { 
															echo '<img src="assets/images/dummy.jpg" alt="" style="width: 100%;">';
											      		}
											      	?>
													<br><br>
													<?php  
														if (  $role == 4 ) {
														}
														else { ?>
															<input type="file" class="form-control" name="image">
														<?php }
													?>
													
												</div>

												<div class="mb-3">
													<label for="">Nid Card</label>
													<br><br>
													<?php 
											      		if ( !empty( $nid ) ) {
															echo '<img src="assets/images/role/nid/' . $nid . '" alt="" style="width: 100%;">';
											      		}
											      		else { 
															echo 'Not Uploaded';
											      		}
											      	?>
													<br><br>
													<?php  
														if (  $role == 4 ) {
														}
														else { ?>
															<input type="file" class="form-control" name="nid">
														<?php }
													?>
													
												</div>

												<div class="mb-3">
													<div class="d-grid gap-2">
														<input type="hidden" name="updateId" value="<?php echo $id; ?>">
														<?php  
															if (  $role == 4 ) {
															}
															else { ?>
																<input type="submit" name="updateRole" class="btn btn-dark px-5" value="Update Role Info">
															<?php }
														?>
														
													</div>											
												</div>
											</div>
										</div>

										
										
							
									</form>
									<!-- END : FORM -->
										</div>							
									</div>
								</div>

				  				<?php
							}
						}
					}

					

					else if( $do == "Update" ) {

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
										unlink("assets/images/role/$img" . $oldImg);
									} 
									$img = rand(0, 999999) . "_" . $image;
									move_uploaded_file($tmpImg, 'assets/images/role/' . $img);

									// DELETE NID FROM FOLDER
									$oldNidSql = "SELECT * FROM role WHERE id='$updateId'";
									$oldNidQuery = mysqli_query( $db, $oldNidSql );

									while ( $row = mysqli_fetch_assoc($oldNidQuery) ){
										$oldNid = $row['nid'];
										unlink("assets/images/role/nid/$nidImg" . $oldNid);
									} 
									$nidImg = rand(0, 999999) . "_" . $nid;
									move_uploaded_file($tmpNidImg, 'assets/images/role/nid/' . $nidImg);


									// Sql Update
									$updateRoleSql = "UPDATE role SET name='$name', email='$email', phone='$phone', address='$address', password='$hassedPass', role='$role', image='$img', nid='$nidImg', status='$status', join_date=now() WHERE id='$updateId'";
									$updateRoleQuery = mysqli_query( $db, $updateRoleSql );

									if ($updateRoleQuery) {
										header("Location: fieldRole.php?do=fieldManage");
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
										unlink("assets/images/role/$img" . $oldImg);
									} 
									$img = rand(0, 999999) . "_" . $image;
									move_uploaded_file($tmpImg, 'assets/images/role/' . $img);


									// Sql Update
									$updateRoleSql = "UPDATE role SET name='$name', email='$email', phone='$phone', address='$address', password='$hassedPass', role='$role', image='$img', status='$status', join_date=now() WHERE id='$updateId'";
									$updateRoleQuery = mysqli_query( $db, $updateRoleSql );

									if ($updateRoleQuery) {
										header("Location: fieldRole.php?do=fieldManage");
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
										unlink("assets/images/role/nid/$nidImg" . $oldNid);
									} 
									$nidImg = rand(0, 999999) . "_" . $nid;
									move_uploaded_file($tmpNidImg, 'assets/images/role/nid/' . $nidImg);


									// Sql Update
									$updateRoleSql = "UPDATE role SET name='$name', email='$email', phone='$phone', address='$address', password='$hassedPass', role='$role', nid='$nidImg', status='$status', join_date=now() WHERE id='$updateId'";
									$updateRoleQuery = mysqli_query( $db, $updateRoleSql );

									if ($updateRoleQuery) {
										header("Location: fieldRole.php?do=fieldManage");
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
									unlink("assets/images/role/$img" . $oldImg);
								} 
								$img = rand(0, 999999) . "_" . $image;
								move_uploaded_file($tmpImg, 'assets/images/role/' . $img);

								// DELETE NID FROM FOLDER
								$oldNidSql = "SELECT * FROM role WHERE id='$updateId'";
								$oldNidQuery = mysqli_query( $db, $oldNidSql );

								while ( $row = mysqli_fetch_assoc($oldNidQuery) ){
									$oldNid = $row['nid'];
									unlink("assets/images/role/nid/$nidImg" . $oldNid);
								} 
								$nidImg = rand(0, 999999) . "_" . $nid;
								move_uploaded_file($tmpNidImg, 'assets/images/role/nid/' . $nidImg);


								// Sql Update
								$updateRoleSql = "UPDATE role SET name='$name', email='$email', phone='$phone', address='$address', role='$role', image='$img', nid='$nidImg', status='$status', join_date=now() WHERE id='$updateId'";
								$updateRoleQuery = mysqli_query( $db, $updateRoleSql );

								if ($updateRoleQuery) {
									header("Location: fieldRole.php?do=fieldManage");
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
									unlink("assets/images/role/nid/$nidImg" . $oldNid);
								} 
								$nidImg = rand(0, 999999) . "_" . $nid;
								move_uploaded_file($tmpNidImg, 'assets/images/role/nid/' . $nidImg);


								// Sql Update
								$updateRoleSql = "UPDATE role SET name='$name', email='$email', phone='$phone', address='$address', role='$role', nid='$nidImg', status='$status', join_date=now() WHERE id='$updateId'";
								$updateRoleQuery = mysqli_query( $db, $updateRoleSql );

								if ($updateRoleQuery) {
									header("Location: fieldRole.php?do=fieldManage");
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
									unlink("assets/images/role/$img" . $oldImg);
								} 
								$img = rand(0, 999999) . "_" . $image;
								move_uploaded_file($tmpImg, 'assets/images/role/' . $img);

								


								// Sql Update
								$updateRoleSql = "UPDATE role SET name='$name', email='$email', phone='$phone', address='$address', role='$role', image='$img', status='$status', join_date=now() WHERE id='$updateId'";
								$updateRoleQuery = mysqli_query( $db, $updateRoleSql );

								if ($updateRoleQuery) {
									header("Location: fieldRole.php?do=fieldManage");
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
										header("Location: fieldRole.php?do=fieldManage");
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
									header("Location: fieldRole.php?do=fieldManage");
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
					}
				?>

			</div>
		</div>
		<!--END: BODY CONTENT -->

<?php include "inc/fieldfooter.php"; ?>