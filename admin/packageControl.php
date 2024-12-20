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
										<li class="breadcrumb-item active" aria-current="page">All Packages Control</li>
									</ol>
								</nav>
							</div>
							<!-- START: For Right Part -->
							<div class="ms-auto">
								<div class="btn-group">
									<div class="row row-cols-auto g-3">
										<div class="col">
											<a href="packageControl.php?do=Add" class="btn btn-dark px-5">Add New Renew</a>
										</div>								
									</div>
								</div>
							</div>
							<!-- END: For Right Part -->
						</div>
						<!--end breadcrumb-->

						<h6 class="mb-0 text-uppercase">ALL Packages Control</h6>
						<hr>
						<div class="card">
							<div class="card-body">
								<div class="border p-3 radius-10">
									<!-- START: DATATABLE -->
									<div class="table-responsive">
										<table class="table table-striped table-hover table-bordered"  id="example">
										  <thead class="table-dark">
										    <tr>
										        <th scope="col text-center">Invoice Id</th>
										        <th scope="col text-center">Email</th>
					                            <th scope="col text-center">Package Name</th>
					                            <th scope="col text-center">Price</th>
					                            <th scope="col text-center">Transaction ID</th>
					                            <th scope="col text-center">Transaction Date</th>
					                            <th scope="col text-center">Renewal Date</th>
					                            <th scope="col text-center">Status</th>
					                            <th scope="col text-center">Action</th>
										    </tr>
										  </thead>

										  <tbody>
										  	<?php  

										  		$rentDivSql = "SELECT * FROM transactions ORDER BY id DESC";
										  		$rentDivQuery = mysqli_query( $db, $rentDivSql );
										  		$rentDivCount = mysqli_num_rows($rentDivQuery);

										  		if ( $rentDivCount == 0 ) { ?>
										  			<div class="alert alert-danger text-center" role="alert">
													  Sorry!! No data found in this datatable.
													</div>
										  		<?php }
										  		else {
										  			$i = 0;

										  			while ( $row = mysqli_fetch_assoc( $rentDivQuery ) ) {
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
														      <th scope="row" class="text-center"><?php echo $i; ?></th>
														      <td class="text-center"><?php echo $user_email; ?></td>
														      <td class="text-center"><?php echo $package_name; ?></td>
														      <td class="text-center"><?php echo $price; ?></td>
														      <td class="text-center"><?php echo $transaction_id; ?></td>
														      <td class="text-center"><?php echo $transaction_date; ?></td>
														      <td class="text-center"><?php echo $renewal_date; ?></td>
														      <td class="text-center">
														      	<?php  
														      		if ($status == 1) { ?>
														      			<span class="badge text-bg-success">Active</span>
														      		<?php }
														      		else if ($status == 0) { ?>
														      			<span class="badge text-bg-warning">Pending</span>
														      		<?php }
														      	?>
														      </td>
														      <td class="text-center">
														      	<div class="action-btn">
														      		<ul>
														      			<li>
														      				<a href="packageControl.php?do=Edit&editId=<?php echo $id; ?>" class="btn btn-outline-primary" style="margin: 0 15px;"><i class="fa-solid fa-pencil"></i> Edit</a> 
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

					else if( $do == "Add" ) { ?>
						<!--breadcrumb-->
						<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
							<div class="breadcrumb-title pe-3">Create</div>
							<div class="ps-3">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb mb-0 p-0">
										<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">Add New Renewal Transaction</li>
									</ol>
								</nav>
							</div>
							<!-- START: For Right Part -->
							<div class="ms-auto">
								<div class="btn-group">
									<div class="row row-cols-auto g-3">
										<div class="col">
											<a href="packageControl.php?do=Manage" class="btn btn-dark px-5">All Packages Control</a>
										</div>								
									</div>
								</div>
							</div>
							<!-- END: For Right Part -->
						</div>
						<!--end breadcrumb-->

						<h6 class="mb-0 text-uppercase">Add New Renewal Transaction</h6>
						<hr>
						<div class="card w-50" >
							<div class="card-body">
								<div class="border p-3 radius-10">
									<!-- START : FORM -->
									<form action="packageControl.php?do=Store" method="POST" enctype="multipart/form-data">
										<div class="row">
											<div class="col-lg-12">

												<div class="mb-3">
												    <label>Seller Email</label>
												    <select name="user_email" class="form-select">
												        <option value="">Seller All Email List</option>
												        <?php  
												            $rentDivSql = "SELECT * FROM transactions ORDER BY id DESC";
												            $rentDivQuery = mysqli_query($db, $rentDivSql);

												            $emails = []; // Array to store unique emails

												            while ($row = mysqli_fetch_assoc($rentDivQuery)) {
												                $user_email = $row['user_email'];

												                $sql = "SELECT * FROM role WHERE status=1 AND email = '$user_email' AND role = 4 ORDER BY name ASC";
												                $query = mysqli_query($db, $sql);

												                while ($roleRow = mysqli_fetch_assoc($query)) {
												                    $email = $roleRow['email'];

												                    if (!in_array($email, $emails)) { // Check if email is not already in the array
												                        $emails[] = $email; // Add email to the array
												                        ?>
												                        <option value="<?php echo $email; ?>"> - <?php echo $email; ?></option>
												                        <?php
												                    }
												                }
												            }
												        ?>
												    </select>
												</div>


												<div class="mb-3">
													<label>Package Name</label>
													<select name="package_name" class="form-select">
														<option value="">Select Package Name</option>
														<?php  
															$sql = "SELECT * FROM package WHERE status=1 ORDER BY id ASC";
															$query = mysqli_query($db, $sql);

															while($row = mysqli_fetch_assoc( $query )) {
																$id  			= $row['id'];
												  				$name  			= $row['name'];
												  				?>

												  				<option value="<?php echo $name; ?>"> - <?php echo $name; ?></option>

												  				<?php
															}
														?>
														
													</select>
												</div>

												<div class="mb-3">
													<label>Package Renewal Price</label>
													<input type="text" name="price" class="form-control" placeholder="price">
												</div>

												<div class="mb-3">
													<label>Package Renewal Date</label>
													<input type="date" name="renewal_date" class="form-control" placeholder="date">
												</div>

												<div class="mb-3">
													<label>Status</label>
													<select name="status" class="form-select">
														<option value="0">Please Select the Status</option>
														<option value="1">Active</option>
														<option value="0">Pending</option>
													</select>
												</div>

												<div class="mb-3">
													<div class="d-grid gap-2">
														<input type="submit" name="addpac" class="btn btn-dark px-5" value="Add New Renewal Package">
													</div>											
												</div>
											</div>

												

												
											</div>
										</div>

										
							
									</form>
									<!-- END : FORM -->
								</div>							
							</div>
						</div>
					<?php }

					else if( $do == "Store" ) {
						if ( isset($_POST['addpac']) ) {
							$user_email 	= mysqli_real_escape_string($db, $_POST['user_email']);
							$package_name 	= mysqli_real_escape_string($db, $_POST['package_name']);
							$price 			= mysqli_real_escape_string($db, $_POST['price']);
							$renewal_date 	= mysqli_real_escape_string($db, $_POST['renewal_date']);
							$status 		= mysqli_real_escape_string($db, $_POST['status']);

							$addPacSql = "INSERT INTO transactions ( user_email, package_name, price, renewal_date, status ) VALUES ( '$user_email', '$package_name', '$price', '$renewal_date', '$status' )";
							$addPacQuery = mysqli_query ( $db, $addPacSql );

							if ( $addPacQuery ) {
							  	header( "Location: packageControl.php?do=Manage" );
							}  
							else {
								die( "Mysql Error." . mysqli_error($db) );
							}



						}
					}

					else if( $do == "Edit" ) {
						if ( isset($_GET['editId']) ) {
							$editIdStore = $_GET['editId'];
							$editSql = "SELECT * FROM transactions WHERE id='$editIdStore'";
							$editQuery = mysqli_query( $db, $editSql );

							while ( $row = mysqli_fetch_assoc( $editQuery ) ) {
								$id               = $row['id'];
                                $transaction_id   = $row['transaction_id'];
                                $user_email       = $row['user_email'];
                                $package_name     = $row['package_name'];
                                $price            = $row['price'];
                                $transaction_date = $row['transaction_date'];
                                $renewal_date     = $row['renewal_date'];
                                $status           = $row['status'];
				  				?>
				  				<!--breadcrumb-->
								<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
									<div class="breadcrumb-title pe-3">Edit</div>
									<div class="ps-3">
										<nav aria-label="breadcrumb">
											<ol class="breadcrumb mb-0 p-0">
												<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
												</li>
												<li class="breadcrumb-item active" aria-current="page">Package Control Edit</li>
											</ol>
										</nav>
									</div>
									<!-- START: For Right Part -->
									<div class="ms-auto">
										<div class="btn-group">
											<div class="row row-cols-auto g-3">
												<div class="col">
													<a href="packageControl.php?do=Manage" class="btn btn-dark px-5">All Package Control</a>
												</div>									
											</div>
										</div>
									</div>
									<!-- END: For Right Part -->
								</div>
								<!--end breadcrumb-->

								<h6 class="mb-0 text-uppercase">Edit Package Control</h6>
								<hr>
								<div class="card" style="width: 45%;">
									<div class="card-body">
										<div class="border p-3 radius-10">
											<!-- START : FORM -->
											<form action="packageControl.php?do=Update" method="POST" enctype="multipart/form-data">
												<div class="mb-3">
												    <label>Seller Email</label>
												    <p class="form-control" name="user_email"> <?php echo $user_email; ?> </p>
												</div>


												<div class="mb-3">
													<label>Package Name</label>
													<p class="form-control" name="package_name"> <?php echo $package_name; ?> </p>
												</div>

												<div class="mb-3">
													<label>Package Renewal Price</label>
													<p name="price" class="form-control"><?php echo $price; ?></p>
												</div>

												<div class="mb-3">
													<label>Package Renewal Date</label>
													<input type="date" name="renewal_date" class="form-control" placeholder="date" value="<?php echo $renewal_date; ?>">
												</div>

												<div class="mb-3">
													<label>Status</label>
													<select name="status" class="form-select">
														<option>Please Select the Status</option>
														<option value="1" <?php if( $status == 1 ) { echo "selected"; } ?>>Active</option>
														<option value="0" <?php if( $status == 0 ) { echo "selected"; } ?>>Pending</option>
													</select>
												</div>

												<div class="mb-3">
													<div class="d-grid gap-2">
														<input type="hidden" name="updateId" value="<?php echo $id; ?>">
														<input type="submit" name="updateRentCat" class="btn btn-dark px-5" value="Update Package Control Info">
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

						if (isset( $_POST['updateRentCat'] )) {

							$updateIdStore 	= mysqli_real_escape_string($db, $_POST['updateRentCat']);
							$updateId 		= mysqli_real_escape_string($db, $_POST['updateId']);
							$user_email 	= mysqli_real_escape_string($db, $_POST['user_email']);
							$package_name 	= mysqli_real_escape_string($db, $_POST['package_name']);
							$price 			= mysqli_real_escape_string($db, $_POST['price']);
							$renewal_date 	= mysqli_real_escape_string($db, $_POST['renewal_date']);
							$status 		= mysqli_real_escape_string($db, $_POST['status']);

							

							$updateRentSql = "UPDATE transactions SET renewal_date='$renewal_date', status='$status' WHERE id='$updateId'";
							$updateRentQuery = mysqli_query( $db, $updateRentSql );

							if ($updateRentQuery) {
								header("Location: packageControl.php?do=Manage");
							}
							else {
								die ( "Mysqli Error." . mysqli_error($db) );
							}

						}
					}

					else if( $do == "Trash" ) {
						if (isset($_GET['tData'])) {
							$trashId = $_GET['tData'];
							$trashSql = "UPDATE rent_division SET status=0 WHERE id='$trashId'";
							$trashQuery = mysqli_query($db, $trashSql);

							if ($trashQuery) {
								header("Location: rentDivision.php?do=Manage");
							}
							else {
								die("MySql Error." . mysqli_error($db));
							}
						}
					}

					else if( $do == "ManageTrash" ) { ?>
						<!--breadcrumb-->
						<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
							<div class="breadcrumb-title pe-3">Manage Rent Division Trash</div>
							<div class="ps-3">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb mb-0 p-0">
										<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">Trash Rent Division list</li>
									</ol>
								</nav>
							</div>
							<!-- START: For Right Part -->
							<div class="ms-auto">
								<div class="btn-group">
									<div class="row row-cols-auto g-3">
										<div class="col">
											<a href="rentDivision.php?do=Manage" class="btn btn-primary px-5">All Rent Division</a>
										</div>
										<div class="col">
											<a href="rentDivision.php?do=Add" class="btn btn-dark px-5">Add New Rent Category</a>
										</div>									
									</div>
								</div>
							</div>
							<!-- END: For Right Part -->
						</div>
						<!--end breadcrumb-->

						<h6 class="mb-0 text-uppercase">TRASH Rent Division LIST</h6>
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
										      <th scope="col" class="text-center">Division Name</th>
										      <th scope="col" class="text-center">Priority Number</th>
										      <th scope="col" class="text-center">Count</th>
										      <th scope="col" class="text-center">Status</th>
										      <th scope="col" class="text-center">Join Date</th>
										      <th scope="col" class="text-center">Action</th>
										    </tr>
										  </thead>

										  <tbody>
										  	<?php  

										  		$categoryRentSql = "SELECT * FROM rent_division WHERE status = 0 ORDER BY priority ASC";
										  		$categoryRentQuery = mysqli_query( $db, $categoryRentSql );
										  		$categoryRentCount = mysqli_num_rows($categoryRentQuery);

										  		if ( $categoryRentCount == 0 ) { ?>
										  			<div class="alert alert-danger text-center" role="alert">
													  Sorry!! No data found in this datatable.
													</div>
										  		<?php }
										  		else {
										  			$i = 0;

										  			while ( $row = mysqli_fetch_assoc( $categoryRentQuery ) ) {
										  				$id  			= $row['id'];
										  				$name  			= $row['name'];
										  				$priority  		= $row['priority'];
										  				$status  		= $row['status'];
										  				$join_date  	= $row['join_date'];
										  				$i++;
										  				?>
										  				
										  					<tr>
														      <th scope="row" class="text-center"><?php echo $i; ?></th>
														      <td class="text-center"><?php echo $name; ?></td>
														      <td class="text-center"><?php echo $priority; ?></td>
														      <td class="text-center">Count</td>
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
														      				<a href="rentDivision.php?do=Edit&editId=<?php echo $id; ?>" class="btn btn-outline-primary"><i class="fa-solid fa-pencil"></i> Edit</a> 
														      				<a href="rentDivision.php?do=ManageActive&activeId=<?php echo $id; ?>" class="btn btn-outline-success" style="margin: 0 15px;"><i class="fa-solid fa-file-circle-check"></i> Active</a> 
														      				<a href="" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#dId<?php echo $id; ?>"><i class="fa-regular fa-eye-slash"></i> Delete</a>
														      			</li>
														      		</ul>
														      	</div>

														      	<!-- START: MODAL -->
																<div class="modal fade" id="dId<?php echo $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
																  <div class="modal-dialog">
																    <div class="modal-content">
																      <div class="modal-header">
																        <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmation Alert!</h1>
																        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																      </div>
																      <div class="modal-body">
																      	<h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure to Delete <span style="color: red;"><?php echo $name; ?> </span>Division?</h1>																        
																      </div>
																      <div class="modal-footer justify-content-around">
																      	<ul>
																      		<li>
																      			<a href="rentDivision.php?do=Delete&dData=<?php echo $id; ?>" class="btn btn-primary">Yes</a>
																      			<a href="" class="btn btn-dark" data-bs-dismiss="modal">No</a>
																      		</li>
																      	</ul>
																      </div>
																    </div>
																  </div>
																</div>
														      	<!-- END: MODAL -->
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

					else if ( $do == "ManageActive" ) {
						if ( isset($_GET['activeId']) ) {
							$acId = $_GET['activeId'];
							$activeSql = "UPDATE rent_division SET status=1 WHERE id='$acId'";
							$activeQuery = mysqli_query($db, $activeSql);

							if ($activeQuery) {
								header("Location: rentDivision.php?do=Manage");
							}
							else {
								die("Mysqli_Error" . mysqli_error($db));
							}
						}
					}

					else if( $do == "Delete" ) {
						if (isset($_GET['dData'])) {
							$deleteData = $_GET['dData'];
							$deleteSQL = "DELETE FROM rent_division WHERE id='$deleteData' ";
							$deleteQuery = mysqli_query($db, $deleteSQL);

							if ($deleteQuery) {
								header("Location: rentDivision.php?do=ManageTrash");
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