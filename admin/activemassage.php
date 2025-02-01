<?php include "inc/header.php"; ?>

	<!--wrapper-->
	<div class="wrapper">

		<?php include "inc/leftmenu.php"; ?>
		<?php include "inc/topbar.php"; ?>

		<!--START: BODY CONTENT -->
		<div class="page-wrapper">
			<div class="page-content">

				<?php  
					$do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

					if ( $do == "Manage" ) { ?>
						<!--breadcrumb-->
						<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
							<div class="breadcrumb-title pe-3">Manage</div>
							<div class="ps-3">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb mb-0 p-0">
										<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">Support</li>
									</ol>
								</nav>
							</div>
						</div>
						<!--end breadcrumb-->

						<h6 class="mb-0 text-uppercase">Massage List</h6>
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
										      <th scope="col" class="text-center">First Name</th>
										      <th scope="col" class="text-center">Last Name</th>
										      <th scope="col" class="text-center">Email</th>
										      <th scope="col" class="text-center">Phone</th>
										      <th scope="col" class="text-center">Role</th>
										      <th scope="col" class="text-center">Status</th>
										      <th scope="col" class="text-center">Join Date</th>
										      <th scope="col" class="text-center">Action</th>
										    </tr>
										  </thead>

										  <tbody>
										  	<?php  

										  		$roleSql = "SELECT * FROM message WHERE status=1 ORDER BY id DESC";
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
										  				$role  			= $row['role'];
										  				$status  		= $row['status'];
										  				$fname  		= $row['fname'];
										  				$lname  		= $row['lname'];
										  				$email  		= $row['email'];
										  				$phone  		= $row['phone'];
										  				$msg  			= $row['msg'];
										  				$join_date  	= $row['join_date'];
										  				$i++;
										  				?>
										  				
										  					<tr>
														      <th scope="row" class="text-center"><?php echo $i; ?></th>
														      <td class="text-center"><?php echo $fname; ?></td>
														      <td class="text-center"><?php echo $lname; ?></td>
														      <td class="text-center"><?php echo $email; ?></td>
														      <td class="text-center"><?php echo $phone; ?></td>
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
														      		else if ($status == 2) { ?>
														      			<span class="badge text-bg-info">Pending</span>
														      		<?php }
														      	?>
														      </td>
														      <td class="text-center"><?php echo $join_date; ?></td>
														      <td class="text-center">
														      	<div class="action-btn">
														      		<ul>
														      			<li>
														      				<a href="massage.php?do=Edit&editId=<?php echo $id; ?>" class="btn btn-outline-primary" style="margin: 0 15px;"><i class="fa-solid fa-pencil"></i> Edit</a> 

														      				<!-- <a href="massage.php?do=ManageActive&activeId=<?php echo $id; ?>" class="btn btn-outline-success" style="margin: 0 15px;"><i class="fa-solid fa-file-circle-check"></i> Active</a>  -->
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

					else if( $do == "Edit" ) {
						if ( isset($_GET['editId']) ) {
							$editIdStore = $_GET['editId'];
							$editSql = "SELECT * FROM message WHERE id='$editIdStore'";
							$editQuery = mysqli_query( $db, $editSql );

							while ( $row = mysqli_fetch_assoc( $editQuery ) ) {
								$id  			= $row['id'];
				  				$role  			= $row['role'];
				  				$status  		= $row['status'];
				  				$fname  		= $row['fname'];
				  				$lname  		= $row['lname'];
				  				$email  		= $row['email'];
				  				$phone  		= $row['phone'];
				  				$msg  			= $row['msg'];
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
												<li class="breadcrumb-item active" aria-current="page">Edit Message Info</li>
											</ol>
										</nav>
									</div>
									<!-- START: For Right Part -->
									<div class="ms-auto">
										<div class="btn-group">
											<div class="row row-cols-auto g-3">
												<div class="col">
													<a href="massage.php?do=Manage" class="btn btn-dark px-5">All Message</a>
												</div>									
											</div>
										</div>
									</div>
									<!-- END: For Right Part -->
								</div>
								<!--end breadcrumb-->

								<h6 class="mb-0 text-uppercase">Edit Message</h6>
								<hr>
								<div class="card">
									<div class="card-body">
										<div class="border p-3 radius-10">
											<!-- START : FORM -->
									<form action="massage.php?do=Update" method="POST" enctype="multipart/form-data">
										<div class="row">
											<div class="col-lg-6">
												<div class="mb-3">
													<label>First Name</label>
													<p name="fname" class="form-control"><?php echo $fname; ?></p>
												</div>

												<div class="mb-3">
													<label>Last Name</label>
													<p name="lname" class="form-control"><?php echo $lname; ?></p>
												</div>

												<div class="mb-3">
													<label>Email Address</label>
													<p name="email" class="form-control"><?php echo $email; ?></p>
												</div>

												<div class="mb-3">
													<label>Phone No.</label>
													<p name="phone" class="form-control"><?php echo $phone; ?></p>
												</div>

											</div>
											<div class="col-lg-6">
												<div class="mb-3">
													<label>Message</label>
													<p name="msg" class="form-control"><?php echo $msg; ?></p>
												</div>

												<div class="mb-3">
													<label>Manage Role</label>
													<br>
													<p name="role" class="form-control">
														<?php  
															if ( $role == 1 ) { ?>
													  			Admin
													  		<?php }
													  		else if ( $role == 2 ) { ?>
													  			Field Checker
													  		<?php }
													  		else if ( $role == 3 ) { ?>
													  			User
													  		<?php }
													  		else if ( $role == 4 ) { ?>
													  			Seller
													  		<?php }
														?>
													</p>
													
												</div>
												
												<div class="mb-3">
													<label>Status</label>
													<select name="status" class="form-select">
														<option value="1" <?php if( $status == 1 ) { echo "selected"; } ?>>Active</option>
														<option value="2" <?php if( $status == 2 ) { echo "selected"; } ?>>Pending</option>
													</select>
												</div>

												<div class="mb-3">
													<div class="d-grid gap-2">
														<input type="hidden" name="updateId" value="<?php echo $id; ?>">
														<input type="submit" name="updateRole" class="btn btn-dark px-5" value="Update">
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
							$status 		= mysqli_real_escape_string($db, $_POST['status']);

							$updateRoleSql = "UPDATE message SET status='$status' WHERE id='$updateId'";
							$updateRoleQuery = mysqli_query( $db, $updateRoleSql );

							if ($updateRoleQuery) {
								header("Location: massage.php?do=Manage");
							}
							else {
								die ( "Mysqli Error." . mysqli_error($db) );
							}

							
							

						}
					}

					else if ( $do == "ManageActive" ) {
						if ( isset($_GET['activeId']) ) {
							$acId = $_GET['activeId'];
							$activeSql = "UPDATE message SET status=1 WHERE id='$acId'";
							$activeQuery = mysqli_query($db, $activeSql);

							if ($activeQuery) {
								header("Location: message.php?do=Manage");
							}
							else {
								die("Mysqli_Error" . mysqli_error($db));
							}
						}
					}

					else if( $do == "Delete" ) {
						if (isset($_GET['dData'])) {
							$deleteData = $_GET['dData'];
							$deleteSQL = "DELETE FROM message WHERE id='$deleteData' ";
							$deleteQuery = mysqli_query($db, $deleteSQL);

							if ($deleteQuery) {
								header("Location: message.php?do=ManageTrash");
							}
							else {
								die("Mysqli_Error" . mysqli_error($db));
							}
						}
					}
				?>

			</div>
		</div>
		<!--END: BODY CONTENT -->

<?php include "inc/footer.php"; ?>