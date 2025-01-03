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
										<li class="breadcrumb-item active" aria-current="page">All Packages list</li>
									</ol>
								</nav>
							</div>
							<!-- START: For Right Part -->
							<div class="ms-auto">
								<div class="btn-group">
									<div class="row row-cols-auto g-3">
										<div class="col">
											<a href="package.php?do=Add" class="btn btn-dark px-5">Add New Package</a>
										</div>
										<div class="col">
											<a href="package.php?do=ManageTrash" class="btn btn-danger px-5">Trash</a>
										</div>									
									</div>
								</div>
							</div>
							<!-- END: For Right Part -->
						</div>
						<!--end breadcrumb-->

						<h6 class="mb-0 text-uppercase">ALL Package LIST</h6>
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
										      <th scope="col" class="text-center">Package Name</th>
										      <th scope="col" class="text-center">User Use</th>
										      <th scope="col" class="text-center">Regular Amount</th>
										      <th scope="col" class="text-center">Discount Amount</th>
										      <th scope="col" class="text-center">Renew Amount</th>
										      <th scope="col" class="text-center">Status</th>
										      <th scope="col" class="text-center">Join Date</th>
										      <th scope="col" class="text-center">Action</th>
										    </tr>
										  </thead>

										  <tbody>
										  	<?php  

										  		$rentDivSql = "SELECT * FROM package WHERE status = 1 ORDER BY id ASC";
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
										  				$id   			= $row['id'];
										  				$name  			= $row['name'];
										  				$details  		= $row['details'];
										  				$basic_price  	= $row['basic_price'];
										  				$discount_price = $row['discount_price'];
										  				$dis_percent  	= $row['dis_percent'];
										  				$renew  		= $row['renew'];
										  				$rent_flat  	= $row['rent_flat'];
										  				$rent_store  	= $row['rent_store'];
										  				$rent_hotel  	= $row['rent_hotel'];
										  				$buy_flat  		= $row['buy_flat'];
										  				$buy_store  	= $row['buy_store'];
										  				$buy_hotel  	= $row['buy_hotel'];
										  				$buy_property  	= $row['buy_property'];
										  				$status  		= $row['status'];
										  				$join_date  	= $row['join_date'];
										  				$i++;
										  				?>
										  				
										  					<tr>
														      <th scope="row" class="text-center"><?php echo $i; ?></th>
														      <td class="text-center"><?php echo $name; ?></td>
														      <td class="text-center">count</td>
														      <td class="text-center"><?php echo $basic_price; ?></td>
														      <td class="text-center"><?php echo $discount_price; ?></td>
														      <td class="text-center"><?php echo $renew; ?></td>
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
														      				<a href="rentDivision.php?do=Edit&editId=<?php echo $id; ?>" class="btn btn-outline-primary" style="margin: 0 15px;"><i class="fa-solid fa-pencil"></i> Edit</a> 
														      				<a href="" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#tId<?php echo $id; ?>"><i class="fa-regular fa-eye-slash"></i> Disable</a>
														      			</li>
														      		</ul>
														      	</div>

														      	<!-- START: MODAL -->
																<div class="modal fade" id="tId<?php echo $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
																  <div class="modal-dialog">
																    <div class="modal-content">
																      <div class="modal-header">
																        <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmation Alert!</h1>
																        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																      </div>
																      <div class="modal-body">
																      	<h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure to disable <span style="color: red;"><?php echo $name; ?> </span> Division?</h1>																        
																      </div>
																      <div class="modal-footer justify-content-around">
																      	<ul>
																      		<li>
																      			<a href="rentDivision.php?do=Trash&tData=<?php echo $id; ?>" class="btn btn-primary">Yes</a>
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

					else if( $do == "Add" ) { ?>
						<!--breadcrumb-->
						<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
							<div class="breadcrumb-title pe-3">Create</div>
							<div class="ps-3">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb mb-0 p-0">
										<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">Add New Package</li>
									</ol>
								</nav>
							</div>
							<!-- START: For Right Part -->
							<div class="ms-auto">
								<div class="btn-group">
									<div class="row row-cols-auto g-3">
										<div class="col">
											<a href="package.php?do=Manage" class="btn btn-dark px-5">All Packages</a>
										</div>
										<div class="col">
											<a href="package.php?do=ManageTrash" class="btn btn-danger px-5">Trash</a>
										</div>									
									</div>
								</div>
							</div>
							<!-- END: For Right Part -->
						</div>
						<!--end breadcrumb-->

						<h6 class="mb-0 text-uppercase">Add New Package</h6>
						<hr>
						<div class="card" >
							<div class="card-body">
								<div class="border p-3 radius-10">
									<!-- START : FORM -->
									<form action="package.php?do=Store" method="POST" enctype="multipart/form-data">
										<div class="row">
											<div class="col-lg-6">
												<div class="mb-3">
													<label>Package Name</label>
													<input type="text" name="pacname" class="form-control" required autocomplete="off" placeholder="enter package name..">
												</div>

												<div class="mb-3">
													<label>Details</label>
													<textarea name="details" class="form-control" cols="3"></textarea>
												</div>

												<div class="mb-3">
													<label>Regular Price</label>
													<input type="text" name="basic_price" class="form-control" placeholder="regular price">
												</div>

												<div class="mb-3">
													<label>Discount Price</label>
													<input type="text" name="discount_price" class="form-control" placeholder="discount price">
												</div>

												<div class="mb-3">
													<label>Discount Percentage</label>
													<input type="text" name="dis_percent" class="form-control" placeholder="discount percentage">
												</div>

												<div class="mb-3">
													<label>Renew Amount</label>
													<input type="text" name="renew" class="form-control" placeholder="renew amount">
												</div>
											</div>
											<div class="col-lg-6">
												

												<div class="mb-3">
													<label>Rent Flat Quantity</label>
													<input type="text" name="rent_flat" class="form-control" placeholder="rent flat">
												</div>

												<div class="mb-3">
													<label>Rent Store Quantity</label>
													<input type="text" name="rent_store" class="form-control" placeholder="rent store">
												</div>

												<div class="mb-3">
													<label>Rent Hotel Quantity</label>
													<input type="text" name="rent_hotel" class="form-control" placeholder="rent hotel">
												</div>

												<div class="mb-3">
													<label>Buy Flat Quantity</label>
													<input type="text" name="buy_flat" class="form-control" placeholder="buy flat">
												</div>

												<div class="mb-3">
													<label>Buy Store Quantity</label>
													<input type="text" name="buy_store" class="form-control" placeholder="buy store">
												</div>

												<div class="mb-3">
													<label>Buy Hotel Quantity</label>
													<input type="text" name="buy_hotel" class="form-control" placeholder="buy hotel">
												</div>

												<div class="mb-3">
													<label>Buy Plot Quantity</label>
													<input type="text" name="buy_property" class="form-control" placeholder="buy Properties">
												</div>

												<div class="mb-3">
													<label>Status</label>
													<select name="status" class="form-select">
														<option value="1">Please Select the Status</option>
														<option value="1">Active</option>
														<option value="0">InActive</option>
													</select>
												</div>

												<div class="mb-3">
													<div class="d-grid gap-2">
														<input type="submit" name="addpac" class="btn btn-dark px-5" value="Add New Package">
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
							$pacname 			= mysqli_real_escape_string($db, $_POST['pacname']);
							$details 			= mysqli_real_escape_string($db, $_POST['details']);
							$basic_price 		= mysqli_real_escape_string($db, $_POST['basic_price']);
							$discount_price 	= mysqli_real_escape_string($db, $_POST['discount_price']);
							$dis_percent 		= mysqli_real_escape_string($db, $_POST['dis_percent']);
							$renew 				= mysqli_real_escape_string($db, $_POST['renew']);
							$rent_flat 			= mysqli_real_escape_string($db, $_POST['rent_flat']);
							$rent_store 		= mysqli_real_escape_string($db, $_POST['rent_store']);
							$rent_hotel 		= mysqli_real_escape_string($db, $_POST['rent_hotel']);
							$buy_flat 			= mysqli_real_escape_string($db, $_POST['buy_flat']);
							$buy_store 			= mysqli_real_escape_string($db, $_POST['buy_store']);
							$buy_hotel 			= mysqli_real_escape_string($db, $_POST['buy_hotel']);
							$buy_property 		= mysqli_real_escape_string($db, $_POST['buy_property']);
							$status 			= mysqli_real_escape_string($db, $_POST['status']);

							$addPacSql = "INSERT INTO package ( name, details, basic_price, discount_price, dis_percent, renew, rent_flat, rent_store, rent_hotel, buy_flat, buy_store, buy_hotel, buy_property, status, join_date ) VALUES ( '$pacname', '$details', '$basic_price', '$discount_price', '$dis_percent', '$renew', '$rent_flat', '$rent_store', '$rent_hotel', '$buy_flat', '$buy_store', '$buy_hotel', '$buy_property', '$status', now() )";
							$addPacQuery = mysqli_query ( $db, $addPacSql );

							if ( $addPacQuery ) {
							  	header( "Location: package.php?do=Manage" );
							}  
							else {
								die( "Mysql Error." . mysqli_error($db) );
							}



						}
					}

					else if( $do == "Edit" ) {
						if ( isset($_GET['editId']) ) {
							$editIdStore = $_GET['editId'];
							$editSql = "SELECT * FROM rent_division WHERE id='$editIdStore'";
							$editQuery = mysqli_query( $db, $editSql );

							while ( $row = mysqli_fetch_assoc( $editQuery ) ) {
								$id  			= $row['id'];
				  				$name  			= $row['name'];
				  				$priority  		= $row['priority'];
				  				$status  		= $row['status'];
				  				?>
				  				<!--breadcrumb-->
								<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
									<div class="breadcrumb-title pe-3">Edit</div>
									<div class="ps-3">
										<nav aria-label="breadcrumb">
											<ol class="breadcrumb mb-0 p-0">
												<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
												</li>
												<li class="breadcrumb-item active" aria-current="page">Rent Division Edit</li>
											</ol>
										</nav>
									</div>
									<!-- START: For Right Part -->
									<div class="ms-auto">
										<div class="btn-group">
											<div class="row row-cols-auto g-3">
												<div class="col">
													<a href="rentDivision.php?do=Manage" class="btn btn-dark px-5">All Rent Division</a>
												</div>
												<div class="col">
													<a href="rentDivision.php?do=Add" class="btn btn-primary px-5">Add New Rent Division</a>
												</div>
												<div class="col">
													<a href="rentDivision.php?do=ManageTrash" class="btn btn-danger px-5">Trash</a>
												</div>									
											</div>
										</div>
									</div>
									<!-- END: For Right Part -->
								</div>
								<!--end breadcrumb-->

								<h6 class="mb-0 text-uppercase">Edit Rent Division Info</h6>
								<hr>
								<div class="card" style="width: 45%;">
									<div class="card-body">
										<div class="border p-3 radius-10">
											<!-- START : FORM -->
											<form action="rentDivision.php?do=Update" method="POST" enctype="multipart/form-data">
												<div class="mb-3">
													<label>Division Name</label>
													<input type="text" name="name" class="form-control" required autocomplete="off" placeholder="enter category name.." value="<?php echo $name; ?>">
												</div>

												<div class="mb-3">
													<label>Priority Number</label>
													<input type="text" name="priority" class="form-control" required autocomplete="off" value="<?php echo $priority; ?>">
												</div>

												<div class="mb-3">
													<label>Status</label>
													<select name="status" class="form-select">
														<option value="1">Please Select the Status</option>
														<option value="1" <?php if( $status == 1 ) { echo "selected"; } ?>>Active</option>
														<option value="0" <?php if( $status == 0 ) { echo "selected"; } ?>>InActive</option>
													</select>
												</div>

												<div class="mb-3">
													<div class="d-grid gap-2">
														<input type="hidden" name="updateId" value="<?php echo $id; ?>">
														<input type="submit" name="updateRentCat" class="btn btn-dark px-5" value="Update Rent Division">
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
							$name 			= mysqli_real_escape_string($db, $_POST['name']);
							$priority 		= mysqli_real_escape_string($db, $_POST['priority']);
							$status 		= mysqli_real_escape_string($db, $_POST['status']);

							

							$updateRentSql = "UPDATE rent_division SET name='$name', priority='$priority', status='$status', join_date=now() WHERE id='$updateId'";
							$updateRentQuery = mysqli_query( $db, $updateRentSql );

							if ($updateRentQuery) {
								header("Location: rentDivision.php?do=Manage");
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