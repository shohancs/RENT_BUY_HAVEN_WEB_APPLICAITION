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
										  			<!-- <div class="alert alert-danger text-center" role="alert">
													  Sorry!! No data found in this datatable.
													</div> -->
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

					else if ( $do == "rentsubCategory" ) { ?>
						<!--breadcrumb-->
						<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
							<div class="breadcrumb-title pe-3">Manage</div>
							<div class="ps-3">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb mb-0 p-0">
										<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">Pending Rent Sub Categories</li>
									</ol>
								</nav>
							</div>
						</div>
						<!--end breadcrumb-->

						<h6 class="mb-0 text-uppercase">Pending Rent Sub Categories</h6>
						<hr>
						<div class="card">
							<div class="card-body">
								<div class="border p-3 radius-10">
									<!-- START: DATATABLE -->
									<div class="table-responsive">
										<table class="table table-striped table-hover table-bordered"  id="example">
										  <thead class="table-dark">
										    <tr>
											    <th scope="col" class="text-center">Id</th>
					                            <th scope="col" class="text-center">Email</th>
					                            <th scope="col" class="text-center">Phone</th>
					                            <th scope="col" class="text-center">Title</th>
					                            <th scope="col" class="text-center">Category</th>
					                            <th scope="col" class="text-center">District</th>
					                            <th scope="col" class="text-center">Area</th>
					                            <th scope="col" class="text-center">Status</th>
					                            <th scope="col" class="text-center">Join Date</th>
					                            <th scope="col" class="text-center">Action</th>
										    </tr>
										  </thead>

										  <tbody>

										  	<?php  
										  		$rentcategorySql = "SELECT * FROM rent_category WHERE status = 1 ORDER BY name ASC";
												$rentcategoryQuery = mysqli_query($db, $rentcategorySql);

												while ($row = mysqli_fetch_assoc($rentcategoryQuery)) {
													$cat_id  		= $row['cat_id'];
													$cat_name  		= $row['name'];

													$childSql = "SELECT * FROM rent_subcategory WHERE is_parent ='$cat_id' AND status = 2 ORDER BY sub_id DESC";
													$childQuery = mysqli_query($db, $childSql);
													$childSqlCount = mysqli_num_rows($childQuery);

													$i = 0;

													while ($row = mysqli_fetch_assoc($childQuery)) {
														$sub_id       = $row['sub_id'];
						                                $is_parent    = $row['is_parent'];
						                                $subcat_name  = $row['subcat_name'];
						                                $slug         = $row['slug'];
						                                $ow_name      = $row['ow_name'];
						                                $ow_email     = $row['ow_email'];
						                                $ow_phone     = $row['ow_phone'];
						                                $district     = $row['district'];
						                                $division_id  = $row['division_id'];
						                                $location     = $row['location'];
						                                $price        = $row['price'];
						                                $bed          = $row['bed'];
						                                $kitchen      = $row['kitchen'];
						                                $washroom     = $row['washroom'];
						                                $totalroom    = $row['totalroom'];
						                                $area_size    = $row['area_size'];
						                                $floor        = $row['floor'];
						                                $rank         = $row['rank'];
						                                $decoration   = $row['decoration'];
						                                $desk         = $row['desk'];
						                                $wifi         = $row['wifi'];
						                                $hottub       = $row['hottub'];
						                                $currency     = $row['currency'];
						                                $ac           = $row['ac'];
						                                $pool         = $row['pool'];
						                                $park         = $row['park'];
						                                $gym          = $row['gym'];
						                                $luggage      = $row['luggage'];
						                                $drwaing      = $row['drwaing'];
						                                $dinning      = $row['dinning'];
						                                $balcony      = $row['balcony'];
						                                $garage       = $row['garage'];
						                                $breakfast    = $row['breakfast'];
						                                $restourant    = $row['restourant'];
						                                $availability    = $row['availability'];
						                                $short_desc   = $row['short_desc'];
						                                $long_desc    = $row['long_desc'];
						                                $ow_image     = $row['ow_image'];
						                                $img_one      = $row['img_one'];
						                                $img_two      = $row['img_two'];
						                                $img_three    = $row['img_three'];
						                                $img_four     = $row['img_four'];
						                                $img_five     = $row['img_five'];
						                                $img_six      = $row['img_six'];
						                                $status       = $row['status'];
						                                $google_map   = $row['google_map'];
						                                $join_date    = $row['join_date'];
														$i++;
														?>

														<tr>
													      <th scope="row" class="text-center"><?php echo $i; ?></th>
													      <td class="text-center"><?php echo $ow_email; ?></td>
													      <td class="text-center"><?php echo $ow_phone; ?></td>
													      <td class="text-center"><?php echo $subcat_name; ?></td>	     
													      <td class="text-center"><span class="badge rounded-pill text-bg-primary"><?php echo $cat_name; ?></span></td>
													      <td class="text-center"><?php echo $district; ?></td>
													      <td class="text-center"><?php echo $location; ?></td>
													      <td class="text-center">
															<?php
															if ($status == 2) { ?>
																<span class="badge text-bg-info">Pending</span>
															<?php } 
															else if ($status == 3) { ?>
																<span class="badge text-bg-warning">Approve</span>
															<?php }
															else if ($status == 4) { ?>
																<span class="badge text-bg-danger">Decline</span>
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
																	<a href="fieldRole.php&viewId=<?php echo $sub_id; ?>" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#vId<?php echo $sub_id; ?>"><i class="fa-regular fa-eye"></i> View</a>

																	<a href="" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#aId<?php echo $sub_id; ?>"><i class="fa-solid fa-file-circle-check"></i> Approve</a>

																	<a href="" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#tId<?php echo $sub_id; ?>"><i class="fa-regular fa-eye-slash"></i> Disable</a>
																</li>
															</ul>
														</div>

														<!-- START: MODAL FOR Active -->
														<div class="modal fade" id="aId<?php echo $sub_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
															<div class="modal-dialog">
																<div class="modal-content">
																	<div class="modal-header">
																		<h1 class="modal-title fs-5" id="exampleModalLabel">Confirmation Alert!</h1>
																		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																	</div>
																	<div class="modal-body">
																		<h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure to Active Rent SubCategory <br><span style="color: red;"><?php echo $subcat_name; ?> </span>?</h1>
																	</div>
																	<div class="modal-footer justify-content-around">
																		<ul>
																			<li>
																				<a href="fieldRole.php?do=ManageActive&activeId=<?php echo $sub_id; ?>" class="btn btn-primary">Yes</a>
																				<a href="" class="btn btn-dark" data-bs-dismiss="modal">No</a>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														<!-- END: MODAL FOR Active -->



														<!-- START: MODAL FOR DELETE -->
														<div class="modal fade" id="tId<?php echo $sub_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
															<div class="modal-dialog">
																<div class="modal-content">
																	<div class="modal-header">
																		<h1 class="modal-title fs-5" id="exampleModalLabel">Confirmation Alert!</h1>
																		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																	</div>
																	<div class="modal-body">
																		<h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure to disable Rent SubCategory <br><span style="color: red;"><?php echo $subcat_name; ?> </span>?</h1>
																	</div>
																	<div class="modal-footer justify-content-around">
																		<ul>
																			<li>
																				<a href="fieldRole.php?do=Managetrash&tData=<?php echo $sub_id; ?>" class="btn btn-primary">Yes</a>
																				<a href="" class="btn btn-dark" data-bs-dismiss="modal">No</a>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														<!-- END: MODAL FOR DELETE -->

														<!-- START: MODAL FOR FULL VIEW -->
														<div class="col">
															<!-- Modal -->
															<div class="modal fade" id="vId<?php echo $sub_id; ?>" tabindex="-1" aria-hidden="true" style="display: none;">
																<div class="modal-dialog modal-xl">
																	<div class="modal-content">
																		<div class="modal-header">
																			<h1 class="modal-title fs-5" id="exampleModalLabel">Full View of <span style="color: red;"><?php echo $ow_email; ?> </span></h1>
																			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																		</div>
																		<div class="modal-body">
																			<div class="container">
																				<div class="row">
																					<div class="col-lg-12">
																						<div class="card">
																							<div class="card-body">
																								<div class="border p-3 radius-10">
																									<!-- START : FORM -->
																									<form action="" method="POST" enctype="multipart/form-data">
																										<div class="row" style="text-align: left;">
																		                                <div class="col-lg-6">
																		                                  <div class="mb-3">
																		                                    <label class="form-label">Sub Category Name</label>
																		                                    <p class="border p-2 text-dark"><?php echo $subcat_name; ?></p>
																		                                  </div>
																		                                  <div class="mb-3">
																		                                  	<label for="">Owner Name</label>
																		                                  	<p class="border p-2 text-dark"><?php echo $ow_name; ?></p>
																		                                  </div>

																		                                  <div class="mb-3">
																		                                  	<label for="">Owner Email</label>
																		                                  	<p class="border p-2 text-dark"><?php echo $ow_email; ?></p>
																		                                  </div>
																		                                  <div class="mb-3">
																		                                  	<label for="">Owner Phone</label>
																		                                  	<p class="border p-2 text-dark"><?php echo $ow_phone; ?></p>
																		                                  </div>
																		                                  
																		                                  <div class="row">
																		                                  	<div class="col-6">
																		                                  		<div class="mb-3">
																				                                  	<label for="">Division</label>
																				                                  	 <?php  
																			                                            $sql = "SELECT * FROM rent_division WHERE id='$division_id' AND status=1 ORDER BY priority ASC";
																			                                            $query = mysqli_query($db, $sql);

																			                                            while ( $row = mysqli_fetch_assoc($query) ) {
																			                                              $id       = $row['id'];
																			                                                $name       = $row['name'];
																			                                                $priority     = $row['priority'];
																			                                                $status     = $row['status'];
																			                                                ?>
																			                                                  
																			                                               <p class="border p-2 text-dark"><?php echo $name; ?></p>
																			                                                <?php
																			                                            }
																			                                          ?>
																				                                  	
																				                                  </div>
																		                                  	</div>
																		                                    <div class="col-lg-6">
																		                                      <div class="mb-3">
																		                                        <label>District</label>
																		                                        <p class="border p-2 text-dark"><?php echo $district; ?></p>
																		                                      </div>
																		                                    </div>
																		                                  </div>
																		                                  <div class="mb-3">
																		                                    <label>House Number & Location</label>
																		                                    <p class="border p-2 text-dark"><?php echo $location; ?></p>
																		                                  </div>

																		                                  <div class="row">
																		                                    <div class="col-lg-6">
																		                                      <div class="mb-3">
																		                                        <label>Category Name</label>
																		                                        <p class="border p-2 text-dark"><?php echo $cat_name; ?></p>
																		                                          
																		                                        </select>
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-6">
																		                                      <div class="mb-3">
																		                                        <label>Price <sup>(Taka)</sup></label>
																		                                        <p class="border p-2 text-dark"><?php echo $price; ?></p>
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-2">
																		                                      <div class="mb-3">
																		                                        <label>Bed</label>
																		                                        <p class="border p-2 text-dark"><?php echo $bed; ?></p>
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-2">
																		                                      <div class="mb-3">
																		                                        <label>Kitchen</label>
																		                                        <p class="border p-2 text-dark"><?php echo $kitchen; ?></p>
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-2">
																		                                      <div class="mb-3">
																		                                        <label>Drawing</label>
																		                                        <p class="border p-2 text-dark"><?php echo $drwaing; ?></p>
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-2">
																		                                      <div class="mb-3">
																		                                        <label>Dinning</label>
																		                                        <p class="border p-2 text-dark"><?php echo $dinning; ?></p>
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-2">
																		                                      <div class="mb-3">
																		                                        <label>Balcony</label>
																		                                        <p class="border p-2 text-dark"><?php echo $balcony; ?></p>
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-2">
																		                                      <div class="mb-3">
																		                                        <label>Garage</label>
																		                                        <p class="border p-2 text-dark"><?php echo $garage; ?></p>
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-3">
																		                                      <div class="mb-3">
																		                                        <label>Bathroom</label>
																		                                        <p class="border p-2 text-dark"><?php echo $washroom; ?></p>
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-3">
																		                                      <div class="mb-3">
																		                                        <label>Total Room</label>
																		                                        <p class="border p-2 text-dark"><?php echo $totalroom; ?></p>
																		                                      </div>
																		                                    </div>

																		                                    <div class="col-lg-3">
																		                                      <div class="mb-3">
																		                                        <label>Area Size <sup>(Sq Ft)</sup></label>
																		                                        <p class="border p-2 text-dark"><?php echo $area_size; ?></p>
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-3">
																		                                      <div class="mb-3">	                   	
																		                                        <label>Floor No</label>
																		                                        <p class="border p-2 text-dark"><?php echo $floor; ?></p>
																		                                      </div>
																		                                    </div>

																		                                    <label for="">For Hotel And Other Category</label>

																		                                    <div class="col-lg-3">
																		                                      <div class="mb-3">
																		                                        <label>Ranking For Hotel</label>
																		                                        <select name="rank" class="form-select">
																		                                          <option>select Here</option>
																		                                          <option value="1" <?php if ( $rank == 1 ) {
																		                                            echo "selected";
																		                                          } ?>>5 Star</option>
																		                                          <option value="2" <?php if ( $rank == 2 ) {
																		                                            echo "selected";
																		                                          } ?>>4 Star</option>
																		                                          <option value="3" <?php if ( $rank == 3 ) {
																		                                            echo "selected";
																		                                          } ?>>3 Star</option>
																		                                          <option value="4" <?php if ( $rank == 4 ) {
																		                                            echo "selected";
																		                                          } ?>>2 Star</option>
																		                                          <option value="5" <?php if ( $rank == 5 ) {
																		                                            echo "selected";
																		                                          } ?>>1 Star</option>
																		                                        </select>
																		                                      </div>
																		                                    </div>                      

																		                                    <div class="col-lg-3">
																		                                      <div class="mb-3">
																		                                        <label>Decoration</label>>
																		                                        <select name="decoration" class="form-select">
																		                                          <option>select Here</option>
																		                                          <option value="1" <?php if ( $decoration == 1 ) {
																		                                            echo "selected";
																		                                          } ?>>Furnished</option>
																		                                          <option value="2" <?php if ( $decoration == 2 ) {
																		                                            echo "selected";
																		                                          } ?>>Semi-Furnished</option>
																		                                          <option value="3" <?php if ( $decoration == 3 ) {
																		                                            echo "selected";
																		                                          } ?>>Non-Furnished</option>
																		                                        </select>
																		                                      </div>
																		                                    </div>

																		                                    <div class="col-lg-3">
																		                                      
																		                                      <div class="form-check">
																		                                        <input name="desk" class="form-check-input" type="checkbox" value="1" <?php if ( $desk == 1 ) {
																		                                          echo "checked";
																		                                        } ?> id="flexCheckDefault">
																		                                        <label class="form-check-label" for="flexCheckDefault">
																		                                          Front desk [24-hour]
																		                                        </label>
																		                                      </div>

																		                                      <div class="form-check">
																		                                        <input name="wifi" class="form-check-input" type="checkbox" value="1" <?php if ( $wifi == 1 ) {
																		                                          echo "checked";
																		                                        } ?> id="flexCheckDefault">
																		                                        <label class="form-check-label" for="flexCheckDefault">
																		                                          Free Wi-Fi in all rooms!
																		                                        </label>
																		                                      </div>

																		                                      <div class="form-check">
																		                                        <input name="hottub" class="form-check-input" type="checkbox" value="1" <?php if ( $hottub == 1 ) {
																		                                          echo "checked";
																		                                        } ?> id="flexCheckDefault">
																		                                        <label class="form-check-label" for="flexCheckDefault">
																		                                          Hot tub
																		                                        </label>
																		                                      </div>

																		                                      <div class="form-check">
																		                                        <input name="currency" class="form-check-input" type="checkbox" value="1"<?php if ( $currency == 1 ) {
																		                                          echo "checked";
																		                                        } ?> id="flexCheckDefault">
																		                                        <label class="form-check-label" for="flexCheckDefault">
																		                                          Currency exchange
																		                                        </label>
																		                                      </div>

																		                                      <div class="form-check">
																		                                        <input name="breakfast" class="form-check-input" type="checkbox" value="1"<?php if ( $breakfast == 1 ) {
																		                                          echo "checked";
																		                                        } ?> id="flexCheckDefault">
																		                                        <label class="form-check-label" for="flexCheckDefault">
																		                                          Breakfast
																		                                        </label>
																		                                      </div>

																		                                      <div class="form-check">
																		                                        <input name="restaurant" class="form-check-input" type="checkbox" value="1" <?php if ( $restourant == 1 ) {
																		                                          echo "checked";
																		                                        } ?> id="flexCheckDefault">
																		                                        <label class="form-check-label" for="flexCheckDefault">
																		                                          Restourant
																		                                        </label>
																		                                      </div>
																		                                      
																		                                    </div>

																		                                    <div class="col-lg-3">
																		                                      
																		                                      <div class="form-check">
																		                                        <input name="ac" class="form-check-input" type="checkbox" value="1" <?php if ( $ac == 1 ) {
																		                                          echo "checked";
																		                                        } ?> id="flexCheckDefault">
																		                                        <label class="form-check-label" for="flexCheckDefault">
																		                                          Air conditioning
																		                                        </label>
																		                                      </div>

																		                                      <div class="form-check">
																		                                        <input name="pool" class="form-check-input" type="checkbox" value="1" <?php if ( $pool == 1 ) {
																		                                          echo "checked";
																		                                        } ?> id="flexCheckDefault">
																		                                        <label class="form-check-label" for="flexCheckDefault">
																		                                          Swimming pool(indoor)
																		                                        </label>
																		                                      </div>

																		                                      <div class="form-check">
																		                                        <input name="park" class="form-check-input" type="checkbox" value="1" <?php if ( $park == 1 ) {
																		                                          echo "checked";
																		                                        } ?> id="flexCheckDefault">
																		                                        <label class="form-check-label" for="flexCheckDefault">
																		                                          Car park
																		                                        </label>
																		                                      </div>

																		                                      <div class="form-check">
																		                                        <input name="gym" class="form-check-input" type="checkbox" value="1" <?php if ( $gym == 1 ) {
																		                                          echo "checked";
																		                                        } ?> id="flexCheckDefault">
																		                                        <label class="form-check-label" for="flexCheckDefault">
																		                                          Fitness center
																		                                        </label>
																		                                      </div>

																		                                      <div class="form-check">
																		                                        <input name="luggage" class="form-check-input" type="checkbox" value="1" <?php if ( $luggage == 1 ) {
																		                                          echo "checked";
																		                                        } ?> id="flexCheckDefault">
																		                                        <label class="form-check-label" for="flexCheckDefault">
																		                                          Luggage storage
																		                                        </label>
																		                                      </div>
																		                                      
																		                                    </div>

																		                                  </div>

																		                                </div>
																		                                <div class="col-lg-6">
																		                                  <div class="mb-3">
																		                                    <label>Short Description</label>
																		                                    <p class="border p-2 text-dark"><?php echo $short_desc; ?></p>
																		                                  </div>
																		                                  <div class="mb-3">
																		                                    <label>Long Description</label>
																		                                    <p class="border p-2 text-dark"><?php echo $long_desc; ?></p>
																		                                  </div>
																		                                  <div class="mb-3">
																		                                    <label>Google Embed Map URL <sup>(iframe)</sup></label>
																		                                    <p style="width: 50px !important;">
																		                                    	<?php echo $google_map; ?>
																		                                    </p>
																		                                    
																		                                  </div>
																		                                  <div class="row">
																		                                    <div class="col-lg-6">
																		                                      <div class="mb-3">
																		                                        <label>Available on</label>
																		                                        <p class="border p-2 text-dark"><?php echo $availability; ?></p>
																		                                      </div>
																		                                    </div>                     
																		                                  </div>

																		                                  <div class="mb-3">
																		                                        <label>Owner Image</label>
																		                                        <br><br>
																		                                          <?php 
																											      		if ( !empty( $ow_image ) ) {
																															echo '<img src="assets/images/role/' . $ow_image . '" alt="" style="width: 100%;">';
																											      		}
																											      		else { 
																															echo '<img src="assets/images/dummy.jpg" alt="" style="width: 100%;">';
																											      		}
																											      	?>
																		                                      </div>


																		                                  <div class="row">
																		                                    <label for="">Products Images</label>
																		                                    <div class="col-lg-6">
																		                                      <div class="mb-3">
																		                                        <label>Image One</label>
																		                                        <br><br>
																		                                          <?php
																		                                            if (!empty($img_one)) {
																		                                              echo '<img src="assets/images/subcategory/' . $img_one . '" alt="" style="width: 100%;">';
																		                                            } else {
																		                                              echo '<h5>No Image Uploaded!!</h5>';
																		                                            }
																		                                          ?>
																		                                          <br><br>
																		                                        <input type="file" class="form-control" name="img_one">
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-6">
																		                                      <div class="mb-3">
																		                                        <label>Image Two</label>
																		                                        <br><br>
																		                                          <?php
																		                                            if (!empty($img_two)) {
																		                                              echo '<img src="assets/images/subcategory/' . $img_two . '" alt="" style="width: 100%;">';
																		                                            } else {
																		                                              echo '<h5>No Image Uploaded!!</h5>';
																		                                            }
																		                                          ?>
																		                                          <br><br>
																		                                        <input type="file" class="form-control" name="img_two">
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-6">
																		                                      <div class="mb-3">
																		                                        <label>Image Three</label>
																		                                        <br><br>
																		                                          <?php
																		                                            if (!empty($img_three)) {
																		                                              echo '<img src="assets/images/subcategory/' . $img_three . '" alt="" style="width: 100%;">';
																		                                            } else {
																		                                              echo '<h5>No Image Uploaded!!</h5>';
																		                                            }
																		                                          ?>
																		                                          <br><br>
																		                                        <input type="file" class="form-control" name="img_three">
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-6">
																		                                      <div class="mb-3">
																		                                        <label>Image Four</label>
																		                                        <br><br>
																		                                          <?php
																		                                            if (!empty($img_four)) {
																		                                              echo '<img src="assets/images/subcategory/' . $img_four . '" alt="" style="width: 100%;">';
																		                                            } else {
																		                                              echo '<h5>No Image Uploaded!!</h5>';
																		                                            }
																		                                          ?>
																		                                          <br><br>
																		                                        <input type="file" class="form-control" name="img_four">
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-6">
																		                                      <div class="mb-3">
																		                                        <label>Image Five</label>
																		                                        <br><br>
																		                                          <?php
																		                                            if (!empty($img_five)) {
																		                                              echo '<img src="assets/images/subcategory/' . $img_five . '" alt="" style="width: 100%;">';
																		                                            } else {
																		                                              echo '<h5>No Image Uploaded!!</h5>';
																		                                            }
																		                                          ?>
																		                                          <br><br>
																		                                        <input type="file" class="form-control" name="img_five">
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-6">
																		                                      <div class="mb-3">
																		                                        <label>Image Six</label>
																		                                        <br><br>
																		                                          <?php
																		                                            if (!empty($img_six)) {
																		                                              echo '<img src="assets/images/subcategory/' . $img_six . '" alt="" style="width: 100%;">';
																		                                            } else {
																		                                              echo '<h5>No Image Uploaded!!</h5>';
																		                                            }
																		                                          ?>
																		                                          <br><br>
																		                                        <input type="file" class="form-control" name="img_six">
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
																					</div>
																				</div>
																			</div>
																		</div>
																		<div class="modal-footer">
																			<button type="button" class="btn btn-dark" data-bs-dismiss="modal">Exit</button>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<!-- END: MODAL FOR FULL VIEW -->

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

					else if ( $do == "rentappsubCategory" ) { ?>
						<!--breadcrumb-->
						<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
							<div class="breadcrumb-title pe-3">Manage</div>
							<div class="ps-3">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb mb-0 p-0">
										<li class="breadcrumb-item"><a href="field_dashboard.php"><i class="bx bx-home-alt"></i></a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">Rent Sub Categories</li>
									</ol>
								</nav>
							</div>
						</div>
						<!--end breadcrumb-->

						<h6 class="mb-0 text-uppercase">Rent Sub Categories</h6>
						<hr>
						<div class="card">
							<div class="card-body">
								<div class="border p-3 radius-10">
									<!-- START: DATATABLE -->
									<div class="table-responsive">
										<table class="table table-striped table-hover table-bordered"  id="example">
										  <thead class="table-dark">
										    <tr>
											    <th scope="col" class="text-center">Id</th>
					                            <th scope="col" class="text-center">Email</th>
					                            <th scope="col" class="text-center">Phone</th>
					                            <th scope="col" class="text-center">Title</th>
					                            <th scope="col" class="text-center">Category</th>
					                            <th scope="col" class="text-center">District</th>
					                            <th scope="col" class="text-center">Area</th>
					                            <th scope="col" class="text-center">Status</th>
					                            <th scope="col" class="text-center">Join Date</th>
					                            <th scope="col" class="text-center">Action</th>
										    </tr>
										  </thead>

										  <tbody>

										  	<?php  
										  		$rentcategorySql = "SELECT * FROM rent_category WHERE status = 1 ORDER BY name ASC";
												$rentcategoryQuery = mysqli_query($db, $rentcategorySql);

												while ($row = mysqli_fetch_assoc($rentcategoryQuery)) {
													$cat_id  		= $row['cat_id'];
													$cat_name  		= $row['name'];

													$childSql = "SELECT * FROM rent_subcategory WHERE is_parent ='$cat_id' AND status != 1 ORDER BY sub_id DESC";
													$childQuery = mysqli_query($db, $childSql);
													$childSqlCount = mysqli_num_rows($childQuery);

													$i = 0;

													while ($row = mysqli_fetch_assoc($childQuery)) {
														$sub_id       = $row['sub_id'];
						                                $is_parent    = $row['is_parent'];
						                                $subcat_name  = $row['subcat_name'];
						                                $slug         = $row['slug'];
						                                $ow_name      = $row['ow_name'];
						                                $ow_email     = $row['ow_email'];
						                                $ow_phone     = $row['ow_phone'];
						                                $district     = $row['district'];
						                                $division_id  = $row['division_id'];
						                                $location     = $row['location'];
						                                $price        = $row['price'];
						                                $bed          = $row['bed'];
						                                $kitchen      = $row['kitchen'];
						                                $washroom     = $row['washroom'];
						                                $totalroom    = $row['totalroom'];
						                                $area_size    = $row['area_size'];
						                                $floor        = $row['floor'];
						                                $rank         = $row['rank'];
						                                $decoration   = $row['decoration'];
						                                $desk         = $row['desk'];
						                                $wifi         = $row['wifi'];
						                                $hottub       = $row['hottub'];
						                                $currency     = $row['currency'];
						                                $ac           = $row['ac'];
						                                $pool         = $row['pool'];
						                                $park         = $row['park'];
						                                $gym          = $row['gym'];
						                                $luggage      = $row['luggage'];
						                                $drwaing      = $row['drwaing'];
						                                $dinning      = $row['dinning'];
						                                $balcony      = $row['balcony'];
						                                $garage       = $row['garage'];
						                                $breakfast    = $row['breakfast'];
						                                $restourant    = $row['restourant'];
						                                $availability    = $row['availability'];
						                                $short_desc   = $row['short_desc'];
						                                $long_desc    = $row['long_desc'];
						                                $ow_image     = $row['ow_image'];
						                                $img_one      = $row['img_one'];
						                                $img_two      = $row['img_two'];
						                                $img_three    = $row['img_three'];
						                                $img_four     = $row['img_four'];
						                                $img_five     = $row['img_five'];
						                                $img_six      = $row['img_six'];
						                                $status       = $row['status'];
						                                $google_map   = $row['google_map'];
						                                $join_date    = $row['join_date'];
														$i++;
														?>

														<tr>
													      <th scope="row" class="text-center"><?php echo $i; ?></th>
													      <td class="text-center"><?php echo $ow_email; ?></td>
													      <td class="text-center"><?php echo $ow_phone; ?></td>
													      <td class="text-center"><?php echo $subcat_name; ?></td>	     
													      <td class="text-center"><span class="badge rounded-pill text-bg-primary"><?php echo $cat_name; ?></span></td>
													      <td class="text-center"><?php echo $district; ?></td>
													      <td class="text-center"><?php echo $location; ?></td>
													      <td class="text-center">
															<?php
															if ($status == 2) { ?>
																<span class="badge text-bg-info">Pending</span>
															<?php } 
															else if ($status == 3) { ?>
																<span class="badge text-bg-warning">Approve</span>
															<?php }
															else if ($status == 4) { ?>
																<span class="badge text-bg-danger">Decline</span>
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
																	<a href="fieldRole.php&viewId=<?php echo $sub_id; ?>" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#vId<?php echo $sub_id; ?>"><i class="fa-regular fa-eye"></i> View</a>
																</li>
															</ul>
														</div>

														<!-- START: MODAL FOR FULL VIEW -->
														<div class="col">
															<!-- Modal -->
															<div class="modal fade" id="vId<?php echo $sub_id; ?>" tabindex="-1" aria-hidden="true" style="display: none;">
																<div class="modal-dialog modal-xl">
																	<div class="modal-content">
																		<div class="modal-header">
																			<h1 class="modal-title fs-5" id="exampleModalLabel">Full View of <span style="color: red;"><?php echo $ow_email; ?> </span></h1>
																			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																		</div>
																		<div class="modal-body">
																			<div class="container">
																				<div class="row">
																					<div class="col-lg-12">
																						<div class="card">
																							<div class="card-body">
																								<div class="border p-3 radius-10">
																									<!-- START : FORM -->
																									<form action="" method="POST" enctype="multipart/form-data">
																										<div class="row" style="text-align: left;">
																		                                <div class="col-lg-6">
																		                                  <div class="mb-3">
																		                                    <label class="form-label">Sub Category Name</label>
																		                                    <p class="border p-2 text-dark"><?php echo $subcat_name; ?></p>
																		                                  </div>
																		                                  <div class="mb-3">
																		                                  	<label for="">Owner Name</label>
																		                                  	<p class="border p-2 text-dark"><?php echo $ow_name; ?></p>
																		                                  </div>

																		                                  <div class="mb-3">
																		                                  	<label for="">Owner Email</label>
																		                                  	<p class="border p-2 text-dark"><?php echo $ow_email; ?></p>
																		                                  </div>
																		                                  <div class="mb-3">
																		                                  	<label for="">Owner Phone</label>
																		                                  	<p class="border p-2 text-dark"><?php echo $ow_phone; ?></p>
																		                                  </div>
																		                                  
																		                                  <div class="row">
																		                                  	<div class="col-6">
																		                                  		<div class="mb-3">
																				                                  	<label for="">Division</label>
																				                                  	 <?php  
																			                                            $sql = "SELECT * FROM rent_division WHERE id='$division_id' AND status=1 ORDER BY priority ASC";
																			                                            $query = mysqli_query($db, $sql);

																			                                            while ( $row = mysqli_fetch_assoc($query) ) {
																			                                              $id       = $row['id'];
																			                                                $name       = $row['name'];
																			                                                $priority     = $row['priority'];
																			                                                $status     = $row['status'];
																			                                                ?>
																			                                                  
																			                                               <p class="border p-2 text-dark"><?php echo $name; ?></p>
																			                                                <?php
																			                                            }
																			                                          ?>
																				                                  	
																				                                  </div>
																		                                  	</div>
																		                                    <div class="col-lg-6">
																		                                      <div class="mb-3">
																		                                        <label>District</label>
																		                                        <p class="border p-2 text-dark"><?php echo $district; ?></p>
																		                                      </div>
																		                                    </div>
																		                                  </div>
																		                                  <div class="mb-3">
																		                                    <label>House Number & Location</label>
																		                                    <p class="border p-2 text-dark"><?php echo $location; ?></p>
																		                                  </div>

																		                                  <div class="row">
																		                                    <div class="col-lg-6">
																		                                      <div class="mb-3">
																		                                        <label>Category Name</label>
																		                                        <p class="border p-2 text-dark"><?php echo $cat_name; ?></p>
																		                                          
																		                                        </select>
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-6">
																		                                      <div class="mb-3">
																		                                        <label>Price <sup>(Taka)</sup></label>
																		                                        <p class="border p-2 text-dark"><?php echo $price; ?></p>
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-2">
																		                                      <div class="mb-3">
																		                                        <label>Bed</label>
																		                                        <p class="border p-2 text-dark"><?php echo $bed; ?></p>
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-2">
																		                                      <div class="mb-3">
																		                                        <label>Kitchen</label>
																		                                        <p class="border p-2 text-dark"><?php echo $kitchen; ?></p>
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-2">
																		                                      <div class="mb-3">
																		                                        <label>Drawing</label>
																		                                        <p class="border p-2 text-dark"><?php echo $drwaing; ?></p>
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-2">
																		                                      <div class="mb-3">
																		                                        <label>Dinning</label>
																		                                        <p class="border p-2 text-dark"><?php echo $dinning; ?></p>
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-2">
																		                                      <div class="mb-3">
																		                                        <label>Balcony</label>
																		                                        <p class="border p-2 text-dark"><?php echo $balcony; ?></p>
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-2">
																		                                      <div class="mb-3">
																		                                        <label>Garage</label>
																		                                        <p class="border p-2 text-dark"><?php echo $garage; ?></p>
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-3">
																		                                      <div class="mb-3">
																		                                        <label>Bathroom</label>
																		                                        <p class="border p-2 text-dark"><?php echo $washroom; ?></p>
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-3">
																		                                      <div class="mb-3">
																		                                        <label>Total Room</label>
																		                                        <p class="border p-2 text-dark"><?php echo $totalroom; ?></p>
																		                                      </div>
																		                                    </div>

																		                                    <div class="col-lg-3">
																		                                      <div class="mb-3">
																		                                        <label>Area Size <sup>(Sq Ft)</sup></label>
																		                                        <p class="border p-2 text-dark"><?php echo $area_size; ?></p>
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-3">
																		                                      <div class="mb-3">	                   	
																		                                        <label>Floor No</label>
																		                                        <p class="border p-2 text-dark"><?php echo $floor; ?></p>
																		                                      </div>
																		                                    </div>

																		                                    <label for="">For Hotel And Other Category</label>

																		                                    <div class="col-lg-3">
																		                                      <div class="mb-3">
																		                                        <label>Ranking For Hotel</label>
																		                                        <select name="rank" class="form-select">
																		                                          <option>select Here</option>
																		                                          <option value="1" <?php if ( $rank == 1 ) {
																		                                            echo "selected";
																		                                          } ?>>5 Star</option>
																		                                          <option value="2" <?php if ( $rank == 2 ) {
																		                                            echo "selected";
																		                                          } ?>>4 Star</option>
																		                                          <option value="3" <?php if ( $rank == 3 ) {
																		                                            echo "selected";
																		                                          } ?>>3 Star</option>
																		                                          <option value="4" <?php if ( $rank == 4 ) {
																		                                            echo "selected";
																		                                          } ?>>2 Star</option>
																		                                          <option value="5" <?php if ( $rank == 5 ) {
																		                                            echo "selected";
																		                                          } ?>>1 Star</option>
																		                                        </select>
																		                                      </div>
																		                                    </div>                      

																		                                    <div class="col-lg-3">
																		                                      <div class="mb-3">
																		                                        <label>Decoration</label>>
																		                                        <select name="decoration" class="form-select">
																		                                          <option>select Here</option>
																		                                          <option value="1" <?php if ( $decoration == 1 ) {
																		                                            echo "selected";
																		                                          } ?>>Furnished</option>
																		                                          <option value="2" <?php if ( $decoration == 2 ) {
																		                                            echo "selected";
																		                                          } ?>>Semi-Furnished</option>
																		                                          <option value="3" <?php if ( $decoration == 3 ) {
																		                                            echo "selected";
																		                                          } ?>>Non-Furnished</option>
																		                                        </select>
																		                                      </div>
																		                                    </div>

																		                                    <div class="col-lg-3">
																		                                      
																		                                      <div class="form-check">
																		                                        <input name="desk" class="form-check-input" type="checkbox" value="1" <?php if ( $desk == 1 ) {
																		                                          echo "checked";
																		                                        } ?> id="flexCheckDefault">
																		                                        <label class="form-check-label" for="flexCheckDefault">
																		                                          Front desk [24-hour]
																		                                        </label>
																		                                      </div>

																		                                      <div class="form-check">
																		                                        <input name="wifi" class="form-check-input" type="checkbox" value="1" <?php if ( $wifi == 1 ) {
																		                                          echo "checked";
																		                                        } ?> id="flexCheckDefault">
																		                                        <label class="form-check-label" for="flexCheckDefault">
																		                                          Free Wi-Fi in all rooms!
																		                                        </label>
																		                                      </div>

																		                                      <div class="form-check">
																		                                        <input name="hottub" class="form-check-input" type="checkbox" value="1" <?php if ( $hottub == 1 ) {
																		                                          echo "checked";
																		                                        } ?> id="flexCheckDefault">
																		                                        <label class="form-check-label" for="flexCheckDefault">
																		                                          Hot tub
																		                                        </label>
																		                                      </div>

																		                                      <div class="form-check">
																		                                        <input name="currency" class="form-check-input" type="checkbox" value="1"<?php if ( $currency == 1 ) {
																		                                          echo "checked";
																		                                        } ?> id="flexCheckDefault">
																		                                        <label class="form-check-label" for="flexCheckDefault">
																		                                          Currency exchange
																		                                        </label>
																		                                      </div>

																		                                      <div class="form-check">
																		                                        <input name="breakfast" class="form-check-input" type="checkbox" value="1"<?php if ( $breakfast == 1 ) {
																		                                          echo "checked";
																		                                        } ?> id="flexCheckDefault">
																		                                        <label class="form-check-label" for="flexCheckDefault">
																		                                          Breakfast
																		                                        </label>
																		                                      </div>

																		                                      <div class="form-check">
																		                                        <input name="restaurant" class="form-check-input" type="checkbox" value="1" <?php if ( $restourant == 1 ) {
																		                                          echo "checked";
																		                                        } ?> id="flexCheckDefault">
																		                                        <label class="form-check-label" for="flexCheckDefault">
																		                                          Restourant
																		                                        </label>
																		                                      </div>
																		                                      
																		                                    </div>

																		                                    <div class="col-lg-3">
																		                                      
																		                                      <div class="form-check">
																		                                        <input name="ac" class="form-check-input" type="checkbox" value="1" <?php if ( $ac == 1 ) {
																		                                          echo "checked";
																		                                        } ?> id="flexCheckDefault">
																		                                        <label class="form-check-label" for="flexCheckDefault">
																		                                          Air conditioning
																		                                        </label>
																		                                      </div>

																		                                      <div class="form-check">
																		                                        <input name="pool" class="form-check-input" type="checkbox" value="1" <?php if ( $pool == 1 ) {
																		                                          echo "checked";
																		                                        } ?> id="flexCheckDefault">
																		                                        <label class="form-check-label" for="flexCheckDefault">
																		                                          Swimming pool(indoor)
																		                                        </label>
																		                                      </div>

																		                                      <div class="form-check">
																		                                        <input name="park" class="form-check-input" type="checkbox" value="1" <?php if ( $park == 1 ) {
																		                                          echo "checked";
																		                                        } ?> id="flexCheckDefault">
																		                                        <label class="form-check-label" for="flexCheckDefault">
																		                                          Car park
																		                                        </label>
																		                                      </div>

																		                                      <div class="form-check">
																		                                        <input name="gym" class="form-check-input" type="checkbox" value="1" <?php if ( $gym == 1 ) {
																		                                          echo "checked";
																		                                        } ?> id="flexCheckDefault">
																		                                        <label class="form-check-label" for="flexCheckDefault">
																		                                          Fitness center
																		                                        </label>
																		                                      </div>

																		                                      <div class="form-check">
																		                                        <input name="luggage" class="form-check-input" type="checkbox" value="1" <?php if ( $luggage == 1 ) {
																		                                          echo "checked";
																		                                        } ?> id="flexCheckDefault">
																		                                        <label class="form-check-label" for="flexCheckDefault">
																		                                          Luggage storage
																		                                        </label>
																		                                      </div>
																		                                      
																		                                    </div>

																		                                  </div>

																		                                </div>
																		                                <div class="col-lg-6">
																		                                  <div class="mb-3">
																		                                    <label>Short Description</label>
																		                                    <p class="border p-2 text-dark"><?php echo $short_desc; ?></p>
																		                                  </div>
																		                                  <div class="mb-3">
																		                                    <label>Long Description</label>
																		                                    <p class="border p-2 text-dark"><?php echo $long_desc; ?></p>
																		                                  </div>
																		                                  <div class="mb-3">
																		                                    <label>Google Embed Map URL <sup>(iframe)</sup></label>
																		                                    <p style="width: 50px !important;">
																		                                    	<?php echo $google_map; ?>
																		                                    </p>
																		                                    
																		                                  </div>
																		                                  <div class="row">
																		                                    <div class="col-lg-6">
																		                                      <div class="mb-3">
																		                                        <label>Available on</label>
																		                                        <p class="border p-2 text-dark"><?php echo $availability; ?></p>
																		                                      </div>
																		                                    </div>                     
																		                                  </div>

																		                                  <div class="mb-3">
																		                                        <label>Owner Image</label>
																		                                        <br><br>
																		                                          <?php 
																											      		if ( !empty( $ow_image ) ) {
																															echo '<img src="assets/images/role/' . $ow_image . '" alt="" style="width: 100%;">';
																											      		}
																											      		else { 
																															echo '<img src="assets/images/dummy.jpg" alt="" style="width: 100%;">';
																											      		}
																											      	?>
																		                                      </div>


																		                                  <div class="row">
																		                                    <label for="">Products Images</label>
																		                                    <div class="col-lg-6">
																		                                      <div class="mb-3">
																		                                        <label>Image One</label>
																		                                        <br><br>
																		                                          <?php
																		                                            if (!empty($img_one)) {
																		                                              echo '<img src="assets/images/subcategory/' . $img_one . '" alt="" style="width: 100%;">';
																		                                            } else {
																		                                              echo '<h5>No Image Uploaded!!</h5>';
																		                                            }
																		                                          ?>
																		                                          <br><br>
																		                                        <input type="file" class="form-control" name="img_one">
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-6">
																		                                      <div class="mb-3">
																		                                        <label>Image Two</label>
																		                                        <br><br>
																		                                          <?php
																		                                            if (!empty($img_two)) {
																		                                              echo '<img src="assets/images/subcategory/' . $img_two . '" alt="" style="width: 100%;">';
																		                                            } else {
																		                                              echo '<h5>No Image Uploaded!!</h5>';
																		                                            }
																		                                          ?>
																		                                          <br><br>
																		                                        <input type="file" class="form-control" name="img_two">
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-6">
																		                                      <div class="mb-3">
																		                                        <label>Image Three</label>
																		                                        <br><br>
																		                                          <?php
																		                                            if (!empty($img_three)) {
																		                                              echo '<img src="assets/images/subcategory/' . $img_three . '" alt="" style="width: 100%;">';
																		                                            } else {
																		                                              echo '<h5>No Image Uploaded!!</h5>';
																		                                            }
																		                                          ?>
																		                                          <br><br>
																		                                        <input type="file" class="form-control" name="img_three">
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-6">
																		                                      <div class="mb-3">
																		                                        <label>Image Four</label>
																		                                        <br><br>
																		                                          <?php
																		                                            if (!empty($img_four)) {
																		                                              echo '<img src="assets/images/subcategory/' . $img_four . '" alt="" style="width: 100%;">';
																		                                            } else {
																		                                              echo '<h5>No Image Uploaded!!</h5>';
																		                                            }
																		                                          ?>
																		                                          <br><br>
																		                                        <input type="file" class="form-control" name="img_four">
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-6">
																		                                      <div class="mb-3">
																		                                        <label>Image Five</label>
																		                                        <br><br>
																		                                          <?php
																		                                            if (!empty($img_five)) {
																		                                              echo '<img src="assets/images/subcategory/' . $img_five . '" alt="" style="width: 100%;">';
																		                                            } else {
																		                                              echo '<h5>No Image Uploaded!!</h5>';
																		                                            }
																		                                          ?>
																		                                          <br><br>
																		                                        <input type="file" class="form-control" name="img_five">
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-6">
																		                                      <div class="mb-3">
																		                                        <label>Image Six</label>
																		                                        <br><br>
																		                                          <?php
																		                                            if (!empty($img_six)) {
																		                                              echo '<img src="assets/images/subcategory/' . $img_six . '" alt="" style="width: 100%;">';
																		                                            } else {
																		                                              echo '<h5>No Image Uploaded!!</h5>';
																		                                            }
																		                                          ?>
																		                                          <br><br>
																		                                        <input type="file" class="form-control" name="img_six">
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
																					</div>
																				</div>
																			</div>
																		</div>
																		<div class="modal-footer">
																			<button type="button" class="btn btn-dark" data-bs-dismiss="modal">Exit</button>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<!-- END: MODAL FOR FULL VIEW -->

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
							$activeSql = "UPDATE rent_subcategory SET status=3 WHERE sub_id ='$acId'";
							$activeQuery = mysqli_query($db, $activeSql);

							if ($activeQuery) {
								header("Location: fieldRole.php?do=rentsubCategory");
							}
							else {
								die("Mysqli_Error" . mysqli_error($db));
							}
						}
					}

					else if ( $do == "Managetrash" ) {
						if ( isset($_GET['tData']) ) {
							$acId = $_GET['tData'];
							$activeSql = "UPDATE rent_subcategory SET status=4 WHERE sub_id ='$acId'";
							$activeQuery = mysqli_query($db, $activeSql);

							if ($activeQuery) {
								header("Location: fieldRole.php?do=rentsubCategory");
							}
							else {
								die("Mysqli_Error" . mysqli_error($db));
							}
						}
					}

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

					// For Buy
					else if ( $do == "buysubCategory" ) { ?>
						<!--breadcrumb-->
						<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
							<div class="breadcrumb-title pe-3">Manage</div>
							<div class="ps-3">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb mb-0 p-0">
										<li class="breadcrumb-item"><a href="field_dashboard.php"><i class="bx bx-home-alt"></i></a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">Pending Buy Sub Categories</li>
									</ol>
								</nav>
							</div>
						</div>
						<!--end breadcrumb-->

						<h6 class="mb-0 text-uppercase">Pending Buy Sub Categories</h6>
						<hr>
						<div class="card">
							<div class="card-body">
								<div class="border p-3 radius-10">
									<!-- START: DATATABLE -->
									<div class="table-responsive">
										<table class="table table-striped table-hover table-bordered"  id="example">
										  <thead class="table-dark">
										    <tr>
											    <th scope="col" class="text-center">Id</th>
					                            <th scope="col" class="text-center">Email</th>
					                            <th scope="col" class="text-center">Phone</th>
					                            <th scope="col" class="text-center">Title</th>
					                            <th scope="col" class="text-center">Category</th>
					                            <th scope="col" class="text-center">District</th>
					                            <th scope="col" class="text-center">Area</th>
					                            <th scope="col" class="text-center">Status</th>
					                            <th scope="col" class="text-center">Join Date</th>
					                            <th scope="col" class="text-center">Action</th>
										    </tr>
										  </thead>

										  <tbody>

										  	<?php  
										  		$rentcategorySql = "SELECT * FROM buy_category WHERE status = 1 ORDER BY name ASC";
												$rentcategoryQuery = mysqli_query($db, $rentcategorySql);

												while ($row = mysqli_fetch_assoc($rentcategoryQuery)) {
													$cat_id  		= $row['id'];
													$cat_name  		= $row['name'];

													$childSql = "SELECT * FROM buy_subcategory WHERE is_parent ='$cat_id' AND status = 2 ORDER BY sub_id DESC";
													$childQuery = mysqli_query($db, $childSql);
													$childSqlCount = mysqli_num_rows($childQuery);

													$i = 0;

													while ($row = mysqli_fetch_assoc($childQuery)) {
														$sub_id       = $row['sub_id'];
						                                $is_parent    = $row['is_parent'];
						                                $subcat_name  = $row['subcat_name'];
						                                $slug         = $row['slug'];
						                                $ow_name      = $row['ow_name'];
						                                $ow_email     = $row['ow_email'];
						                                $ow_phone     = $row['ow_phone'];
						                                $district     = $row['district'];
						                                $division_id  = $row['division_id'];
						                                $location     = $row['location'];
						                                $price        = $row['price'];
						                                $bed          = $row['bed'];
						                                $kitchen      = $row['kitchen'];
						                                $washroom     = $row['washroom'];
						                                $totalroom    = $row['totalroom'];
						                                $area_size    = $row['area_size'];
						                                $katha    		= $row['katha'];
						                                $floor        = $row['floor'];
						                                $rank         = $row['rank'];
						                                $decoration   = $row['decoration'];
						                                $desk         = $row['desk'];
						                                $wifi         = $row['wifi'];
						                                $hottub       = $row['hottub'];
						                                $currency     = $row['currency'];
						                                $ac           = $row['ac'];
						                                $pool         = $row['pool'];
						                                $park         = $row['park'];
						                                $gym          = $row['gym'];
						                                $luggage      = $row['luggage'];
						                                $drwaing      = $row['drwaing'];
						                                $dinning      = $row['dinning'];
						                                $balcony      = $row['balcony'];
						                                $garage       = $row['garage'];
						                                $breakfast    = $row['breakfast'];
						                                $restourant    = $row['restourant'];
						                                $availability    = $row['availability'];
						                                $short_desc   = $row['short_desc'];
						                                $long_desc    = $row['long_desc'];
						                                $ow_image     = $row['ow_image'];
						                                $img_one      = $row['img_one'];
						                                $img_two      = $row['img_two'];
						                                $img_three    = $row['img_three'];
						                                $img_four     = $row['img_four'];
						                                $img_five     = $row['img_five'];
						                                $img_six      = $row['img_six'];
						                                $status       = $row['status'];
						                                $google_map   = $row['google_map'];
						                                $join_date    = $row['join_date'];
														$i++;
														?>

														<tr>
													      <th scope="row" class="text-center"><?php echo $i; ?></th>
													      <td class="text-center"><?php echo $ow_email; ?></td>
													      <td class="text-center"><?php echo $ow_phone; ?></td>
													      <td class="text-center"><?php echo $subcat_name; ?></td>	     
													      <td class="text-center"><span class="badge rounded-pill text-bg-primary"><?php echo $cat_name; ?></span></td>
													      <td class="text-center"><?php echo $district; ?></td>
													      <td class="text-center"><?php echo $location; ?></td>
													      <td class="text-center">
															<?php
															if ($status == 2) { ?>
																<span class="badge text-bg-info">Pending</span>
															<?php } 
															else if ($status == 3) { ?>
																<span class="badge text-bg-warning">Approve</span>
															<?php }
															else if ($status == 4) { ?>
																<span class="badge text-bg-danger">Decline</span>
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
																	<a href="fieldRole.php&viewId=<?php echo $sub_id; ?>" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#vId<?php echo $sub_id; ?>"><i class="fa-regular fa-eye"></i> View</a>

																	<a href="" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#aId<?php echo $sub_id; ?>"><i class="fa-solid fa-file-circle-check"></i> Approve</a>

																	<a href="" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#tId<?php echo $sub_id; ?>"><i class="fa-regular fa-eye-slash"></i> Disable</a>
																</li>
															</ul>
														</div>

														<!-- START: MODAL FOR Active -->
														<div class="modal fade" id="aId<?php echo $sub_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
															<div class="modal-dialog">
																<div class="modal-content">
																	<div class="modal-header">
																		<h1 class="modal-title fs-5" id="exampleModalLabel">Confirmation Alert!</h1>
																		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																	</div>
																	<div class="modal-body">
																		<h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure to Active Rent SubCategory <br><span style="color: red;"><?php echo $subcat_name; ?> </span>?</h1>
																	</div>
																	<div class="modal-footer justify-content-around">
																		<ul>
																			<li>
																				<a href="fieldRole.php?do=ManagebuyActive&activeId=<?php echo $sub_id; ?>" class="btn btn-primary">Yes</a>
																				<a href="" class="btn btn-dark" data-bs-dismiss="modal">No</a>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														<!-- END: MODAL FOR Active -->



														<!-- START: MODAL FOR DELETE -->
														<div class="modal fade" id="tId<?php echo $sub_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
															<div class="modal-dialog">
																<div class="modal-content">
																	<div class="modal-header">
																		<h1 class="modal-title fs-5" id="exampleModalLabel">Confirmation Alert!</h1>
																		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																	</div>
																	<div class="modal-body">
																		<h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure to disable Rent SubCategory <br><span style="color: red;"><?php echo $subcat_name; ?> </span>?</h1>
																	</div>
																	<div class="modal-footer justify-content-around">
																		<ul>
																			<li>
																				<a href="fieldRole.php?do=Manageetrash&tData=<?php echo $sub_id; ?>" class="btn btn-primary">Yes</a>
																				<a href="" class="btn btn-dark" data-bs-dismiss="modal">No</a>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														<!-- END: MODAL FOR DELETE -->

														<!-- START: MODAL FOR FULL VIEW -->
														<div class="col">
															<!-- Modal -->
															<div class="modal fade" id="vId<?php echo $sub_id; ?>" tabindex="-1" aria-hidden="true" style="display: none;">
																<div class="modal-dialog modal-xl">
																	<div class="modal-content">
																		<div class="modal-header">
																			<h1 class="modal-title fs-5" id="exampleModalLabel">Full View of <span style="color: red;"><?php echo $ow_email; ?> </span></h1>
																			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																		</div>
																		<div class="modal-body">
																			<div class="container">
																				<div class="row">
																					<div class="col-lg-12">
																						<div class="card">
																							<div class="card-body">
																								<div class="border p-3 radius-10">
																									<!-- START : FORM -->
																									<form action="" method="POST" enctype="multipart/form-data">
																										<div class="row" style="text-align: left;">
																		                                <div class="col-lg-6">
																		                                  <div class="mb-3">
																		                                    <label class="form-label">Sub Category Name</label>
																		                                    <p class="border p-2 text-dark"><?php echo $subcat_name; ?></p>
																		                                  </div>
																		                                  <div class="mb-3">
																		                                  	<label for="">Owner Name</label>
																		                                  	<p class="border p-2 text-dark"><?php echo $ow_name; ?></p>
																		                                  </div>

																		                                  <div class="mb-3">
																		                                  	<label for="">Owner Email</label>
																		                                  	<p class="border p-2 text-dark"><?php echo $ow_email; ?></p>
																		                                  </div>
																		                                  <div class="mb-3">
																		                                  	<label for="">Owner Phone</label>
																		                                  	<p class="border p-2 text-dark"><?php echo $ow_phone; ?></p>
																		                                  </div>
																		                                  
																		                                  <div class="row">
																		                                  	<div class="col-6">
																		                                  		<div class="mb-3">
																				                                  	<label for="">Division</label>
																				                                  	 <?php  
																			                                            $sql = "SELECT * FROM rent_division WHERE id='$division_id' AND status=1 ORDER BY priority ASC";
																			                                            $query = mysqli_query($db, $sql);

																			                                            while ( $row = mysqli_fetch_assoc($query) ) {
																			                                              $id       = $row['id'];
																			                                                $name       = $row['name'];
																			                                                $priority     = $row['priority'];
																			                                                $status     = $row['status'];
																			                                                ?>
																			                                                  
																			                                               <p class="border p-2 text-dark"><?php echo $name; ?></p>
																			                                                <?php
																			                                            }
																			                                          ?>
																				                                  	
																				                                  </div>
																		                                  	</div>
																		                                    <div class="col-lg-6">
																		                                      <div class="mb-3">
																		                                        <label>District</label>
																		                                        <p class="border p-2 text-dark"><?php echo $district; ?></p>
																		                                      </div>
																		                                    </div>
																		                                  </div>
																		                                  <div class="mb-3">
																		                                    <label>House Number & Location</label>
																		                                    <p class="border p-2 text-dark"><?php echo $location; ?></p>
																		                                  </div>

																		                                  <div class="row">
																		                                    <div class="col-lg-6">
																		                                      <div class="mb-3">
																		                                        <label>Category Name</label>
																		                                        <p class="border p-2 text-dark"><?php echo $cat_name; ?></p>
																		                                          
																		                                        </select>
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-6">
																		                                      <div class="mb-3">
																		                                        <label>Price <sup>(Taka)</sup></label>
																		                                        <p class="border p-2 text-dark"><?php echo $price; ?></p>
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-2">
																		                                      <div class="mb-3">
																		                                        <label>Bed</label>
																		                                        <p class="border p-2 text-dark"><?php echo $bed; ?></p>
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-2">
																		                                      <div class="mb-3">
																		                                        <label>Kitchen</label>
																		                                        <p class="border p-2 text-dark"><?php echo $kitchen; ?></p>
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-2">
																		                                      <div class="mb-3">
																		                                        <label>Drawing</label>
																		                                        <p class="border p-2 text-dark"><?php echo $drwaing; ?></p>
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-2">
																		                                      <div class="mb-3">
																		                                        <label>Dinning</label>
																		                                        <p class="border p-2 text-dark"><?php echo $dinning; ?></p>
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-2">
																		                                      <div class="mb-3">
																		                                        <label>Balcony</label>
																		                                        <p class="border p-2 text-dark"><?php echo $balcony; ?></p>
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-2">
																		                                      <div class="mb-3">
																		                                        <label>Garage</label>
																		                                        <p class="border p-2 text-dark"><?php echo $garage; ?></p>
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-6">
																		                                      <div class="mb-3">
																		                                        <label>Area Size <sup>(Sq Ft)</sup></label>
																		                                        <p class="border p-2 text-dark"><?php echo $area_size; ?></p>
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-6">
																		                                        <div class="mb-3">
																		                                            <label>Katha <sup>(size)</sup></label>
																		                                            <p class="border p-2 text-dark"><?php echo $katha; ?></p>
																		                                        </div>
																		                                      </div>
																		                                    <div class="col-lg-4">
																		                                      <div class="mb-3">
																		                                        <label>Bathroom</label>
																		                                        <p class="border p-2 text-dark"><?php echo $washroom; ?></p>
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-4">
																		                                      <div class="mb-3">
																		                                        <label>Total Room</label>
																		                                        <p class="border p-2 text-dark"><?php echo $totalroom; ?></p>
																		                                      </div>
																		                                    </div>
																		                                    
																		                                    <div class="col-lg-4">
																		                                      <div class="mb-3">	                   	
																		                                        <label>Floor No</label>
																		                                        <p class="border p-2 text-dark"><?php echo $floor; ?></p>
																		                                      </div>
																		                                    </div>

																		                                    <label for="">For Hotel And Other Category</label>

																		                                    <div class="col-lg-3">
																		                                      <div class="mb-3">
																		                                        <label>Ranking For Hotel</label>
																		                                        <select name="rank" class="form-select">
																		                                          <option>select Here</option>
																		                                          <option value="1" <?php if ( $rank == 1 ) {
																		                                            echo "selected";
																		                                          } ?>>5 Star</option>
																		                                          <option value="2" <?php if ( $rank == 2 ) {
																		                                            echo "selected";
																		                                          } ?>>4 Star</option>
																		                                          <option value="3" <?php if ( $rank == 3 ) {
																		                                            echo "selected";
																		                                          } ?>>3 Star</option>
																		                                          <option value="4" <?php if ( $rank == 4 ) {
																		                                            echo "selected";
																		                                          } ?>>2 Star</option>
																		                                          <option value="5" <?php if ( $rank == 5 ) {
																		                                            echo "selected";
																		                                          } ?>>1 Star</option>
																		                                        </select>
																		                                      </div>
																		                                    </div>                      

																		                                    <div class="col-lg-3">
																		                                      <div class="mb-3">
																		                                        <label>Decoration</label>>
																		                                        <select name="decoration" class="form-select">
																		                                          <option>select Here</option>
																		                                          <option value="1" <?php if ( $decoration == 1 ) {
																		                                            echo "selected";
																		                                          } ?>>Furnished</option>
																		                                          <option value="2" <?php if ( $decoration == 2 ) {
																		                                            echo "selected";
																		                                          } ?>>Semi-Furnished</option>
																		                                          <option value="3" <?php if ( $decoration == 3 ) {
																		                                            echo "selected";
																		                                          } ?>>Non-Furnished</option>
																		                                        </select>
																		                                      </div>
																		                                    </div>

																		                                    <div class="col-lg-3">
																		                                      
																		                                      <div class="form-check">
																		                                        <input name="desk" class="form-check-input" type="checkbox" value="1" <?php if ( $desk == 1 ) {
																		                                          echo "checked";
																		                                        } ?> id="flexCheckDefault">
																		                                        <label class="form-check-label" for="flexCheckDefault">
																		                                          Front desk [24-hour]
																		                                        </label>
																		                                      </div>

																		                                      <div class="form-check">
																		                                        <input name="wifi" class="form-check-input" type="checkbox" value="1" <?php if ( $wifi == 1 ) {
																		                                          echo "checked";
																		                                        } ?> id="flexCheckDefault">
																		                                        <label class="form-check-label" for="flexCheckDefault">
																		                                          Free Wi-Fi in all rooms!
																		                                        </label>
																		                                      </div>

																		                                      <div class="form-check">
																		                                        <input name="hottub" class="form-check-input" type="checkbox" value="1" <?php if ( $hottub == 1 ) {
																		                                          echo "checked";
																		                                        } ?> id="flexCheckDefault">
																		                                        <label class="form-check-label" for="flexCheckDefault">
																		                                          Hot tub
																		                                        </label>
																		                                      </div>

																		                                      <div class="form-check">
																		                                        <input name="currency" class="form-check-input" type="checkbox" value="1"<?php if ( $currency == 1 ) {
																		                                          echo "checked";
																		                                        } ?> id="flexCheckDefault">
																		                                        <label class="form-check-label" for="flexCheckDefault">
																		                                          Currency exchange
																		                                        </label>
																		                                      </div>

																		                                      <div class="form-check">
																		                                        <input name="breakfast" class="form-check-input" type="checkbox" value="1"<?php if ( $breakfast == 1 ) {
																		                                          echo "checked";
																		                                        } ?> id="flexCheckDefault">
																		                                        <label class="form-check-label" for="flexCheckDefault">
																		                                          Breakfast
																		                                        </label>
																		                                      </div>

																		                                      <div class="form-check">
																		                                        <input name="restaurant" class="form-check-input" type="checkbox" value="1" <?php if ( $restourant == 1 ) {
																		                                          echo "checked";
																		                                        } ?> id="flexCheckDefault">
																		                                        <label class="form-check-label" for="flexCheckDefault">
																		                                          Restourant
																		                                        </label>
																		                                      </div>
																		                                      
																		                                    </div>

																		                                    <div class="col-lg-3">
																		                                      
																		                                      <div class="form-check">
																		                                        <input name="ac" class="form-check-input" type="checkbox" value="1" <?php if ( $ac == 1 ) {
																		                                          echo "checked";
																		                                        } ?> id="flexCheckDefault">
																		                                        <label class="form-check-label" for="flexCheckDefault">
																		                                          Air conditioning
																		                                        </label>
																		                                      </div>

																		                                      <div class="form-check">
																		                                        <input name="pool" class="form-check-input" type="checkbox" value="1" <?php if ( $pool == 1 ) {
																		                                          echo "checked";
																		                                        } ?> id="flexCheckDefault">
																		                                        <label class="form-check-label" for="flexCheckDefault">
																		                                          Swimming pool(indoor)
																		                                        </label>
																		                                      </div>

																		                                      <div class="form-check">
																		                                        <input name="park" class="form-check-input" type="checkbox" value="1" <?php if ( $park == 1 ) {
																		                                          echo "checked";
																		                                        } ?> id="flexCheckDefault">
																		                                        <label class="form-check-label" for="flexCheckDefault">
																		                                          Car park
																		                                        </label>
																		                                      </div>

																		                                      <div class="form-check">
																		                                        <input name="gym" class="form-check-input" type="checkbox" value="1" <?php if ( $gym == 1 ) {
																		                                          echo "checked";
																		                                        } ?> id="flexCheckDefault">
																		                                        <label class="form-check-label" for="flexCheckDefault">
																		                                          Fitness center
																		                                        </label>
																		                                      </div>

																		                                      <div class="form-check">
																		                                        <input name="luggage" class="form-check-input" type="checkbox" value="1" <?php if ( $luggage == 1 ) {
																		                                          echo "checked";
																		                                        } ?> id="flexCheckDefault">
																		                                        <label class="form-check-label" for="flexCheckDefault">
																		                                          Luggage storage
																		                                        </label>
																		                                      </div>
																		                                      
																		                                    </div>

																		                                  </div>

																		                                </div>
																		                                <div class="col-lg-6">
																		                                  <div class="mb-3">
																		                                    <label>Short Description</label>
																		                                    <p class="border p-2 text-dark"><?php echo $short_desc; ?></p>
																		                                  </div>
																		                                  <div class="mb-3">
																		                                    <label>Long Description</label>
																		                                    <p class="border p-2 text-dark"><?php echo $long_desc; ?></p>
																		                                  </div>
																		                                  <div class="mb-3">
																		                                    <label>Google Embed Map URL <sup>(iframe)</sup></label>
																		                                    <p style="width: 50px !important;">
																		                                    	<?php echo $google_map; ?>
																		                                    </p>
																		                                    
																		                                  </div>
																		                                  <div class="row">
																		                                    <div class="col-lg-6">
																		                                      <div class="mb-3">
																		                                        <label>Available on</label>
																		                                        <p class="border p-2 text-dark"><?php echo $availability; ?></p>
																		                                      </div>
																		                                    </div>                     
																		                                  </div>

																		                                  <div class="mb-3">
																		                                        <label>Owner Image</label>
																		                                        <br><br>
																		                                          <?php 
																											      		if ( !empty( $ow_image ) ) {
																															echo '<img src="assets/images/role/' . $ow_image . '" alt="" style="width: 100%;">';
																											      		}
																											      		else { 
																															echo '<img src="assets/images/dummy.jpg" alt="" style="width: 100%;">';
																											      		}
																											      	?>
																		                                      </div>


																		                                  <div class="row">
																		                                    <label for="">Products Images</label>
																		                                    <div class="col-lg-6">
																		                                      <div class="mb-3">
																		                                        <label>Image One</label>
																		                                        <br><br>
																		                                          <?php
																		                                            if (!empty($img_one)) {
																		                                              echo '<img src="assets/images/buy_subcategory/' . $img_one . '" alt="" style="width: 100%;">';
																		                                            } else {
																		                                              echo '<h5>No Image Uploaded!!</h5>';
																		                                            }
																		                                          ?>
																		                                          <br><br>
																		                                        <input type="file" class="form-control" name="img_one">
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-6">
																		                                      <div class="mb-3">
																		                                        <label>Image Two</label>
																		                                        <br><br>
																		                                          <?php
																		                                            if (!empty($img_two)) {
																		                                              echo '<img src="assets/images/buy_subcategory/' . $img_two . '" alt="" style="width: 100%;">';
																		                                            } else {
																		                                              echo '<h5>No Image Uploaded!!</h5>';
																		                                            }
																		                                          ?>
																		                                          <br><br>
																		                                        <input type="file" class="form-control" name="img_two">
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-6">
																		                                      <div class="mb-3">
																		                                        <label>Image Three</label>
																		                                        <br><br>
																		                                          <?php
																		                                            if (!empty($img_three)) {
																		                                              echo '<img src="assets/images/buy_subcategory/' . $img_three . '" alt="" style="width: 100%;">';
																		                                            } else {
																		                                              echo '<h5>No Image Uploaded!!</h5>';
																		                                            }
																		                                          ?>
																		                                          <br><br>
																		                                        <input type="file" class="form-control" name="img_three">
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-6">
																		                                      <div class="mb-3">
																		                                        <label>Image Four</label>
																		                                        <br><br>
																		                                          <?php
																		                                            if (!empty($img_four)) {
																		                                              echo '<img src="assets/images/buy_subcategory/' . $img_four . '" alt="" style="width: 100%;">';
																		                                            } else {
																		                                              echo '<h5>No Image Uploaded!!</h5>';
																		                                            }
																		                                          ?>
																		                                          <br><br>
																		                                        <input type="file" class="form-control" name="img_four">
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-6">
																		                                      <div class="mb-3">
																		                                        <label>Image Five</label>
																		                                        <br><br>
																		                                          <?php
																		                                            if (!empty($img_five)) {
																		                                              echo '<img src="assets/images/buy_subcategory/' . $img_five . '" alt="" style="width: 100%;">';
																		                                            } else {
																		                                              echo '<h5>No Image Uploaded!!</h5>';
																		                                            }
																		                                          ?>
																		                                          <br><br>
																		                                        <input type="file" class="form-control" name="img_five">
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-6">
																		                                      <div class="mb-3">
																		                                        <label>Image Six</label>
																		                                        <br><br>
																		                                          <?php
																		                                            if (!empty($img_six)) {
																		                                              echo '<img src="assets/images/buy_subcategory/' . $img_six . '" alt="" style="width: 100%;">';
																		                                            } else {
																		                                              echo '<h5>No Image Uploaded!!</h5>';
																		                                            }
																		                                          ?>
																		                                          <br><br>
																		                                        <input type="file" class="form-control" name="img_six">
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
																					</div>
																				</div>
																			</div>
																		</div>
																		<div class="modal-footer">
																			<button type="button" class="btn btn-dark" data-bs-dismiss="modal">Exit</button>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<!-- END: MODAL FOR FULL VIEW -->

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

					else if ( $do == "buyappsubCategory" ) { ?>
						<!--breadcrumb-->
						<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
							<div class="breadcrumb-title pe-3">Manage</div>
							<div class="ps-3">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb mb-0 p-0">
										<li class="breadcrumb-item"><a href="field_dashboard.php"><i class="bx bx-home-alt"></i></a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">Buy Sub Categories</li>
									</ol>
								</nav>
							</div>
						</div>
						<!--end breadcrumb-->

						<h6 class="mb-0 text-uppercase">Buy Sub Categories</h6>
						<hr>
						<div class="card">
							<div class="card-body">
								<div class="border p-3 radius-10">
									<!-- START: DATATABLE -->
									<div class="table-responsive">
										<table class="table table-striped table-hover table-bordered"  id="example">
										  <thead class="table-dark">
										    <tr>
											    <th scope="col" class="text-center">Id</th>
					                            <th scope="col" class="text-center">Email</th>
					                            <th scope="col" class="text-center">Phone</th>
					                            <th scope="col" class="text-center">Title</th>
					                            <th scope="col" class="text-center">Category</th>
					                            <th scope="col" class="text-center">District</th>
					                            <th scope="col" class="text-center">Area</th>
					                            <th scope="col" class="text-center">Status</th>
					                            <th scope="col" class="text-center">Join Date</th>
					                            <th scope="col" class="text-center">Action</th>
										    </tr>
										  </thead>

										  <tbody>

										  	<?php  
										  		$rentcategorySql = "SELECT * FROM buy_category WHERE status = 1 ORDER BY name ASC";
												$rentcategoryQuery = mysqli_query($db, $rentcategorySql);

												while ($row = mysqli_fetch_assoc($rentcategoryQuery)) {
													$cat_id  		= $row['id'];
													$cat_name  		= $row['name'];

													$childSql = "SELECT * FROM buy_subcategory WHERE is_parent ='$cat_id' AND status != 1 ORDER BY sub_id DESC";
													$childQuery = mysqli_query($db, $childSql);
													$childSqlCount = mysqli_num_rows($childQuery);

													$i = 0;

													while ($row = mysqli_fetch_assoc($childQuery)) {
														$sub_id       = $row['sub_id'];
						                                $is_parent    = $row['is_parent'];
						                                $subcat_name  = $row['subcat_name'];
						                                $slug         = $row['slug'];
						                                $ow_name      = $row['ow_name'];
						                                $ow_email     = $row['ow_email'];
						                                $ow_phone     = $row['ow_phone'];
						                                $district     = $row['district'];
						                                $division_id  = $row['division_id'];
						                                $location     = $row['location'];
						                                $price        = $row['price'];
						                                $bed          = $row['bed'];
						                                $kitchen      = $row['kitchen'];
						                                $washroom     = $row['washroom'];
						                                $totalroom    = $row['totalroom'];
						                                $area_size    = $row['area_size'];
						                                $katha    		= $row['katha'];
						                                $floor        = $row['floor'];
						                                $rank         = $row['rank'];
						                                $decoration   = $row['decoration'];
						                                $desk         = $row['desk'];
						                                $wifi         = $row['wifi'];
						                                $hottub       = $row['hottub'];
						                                $currency     = $row['currency'];
						                                $ac           = $row['ac'];
						                                $pool         = $row['pool'];
						                                $park         = $row['park'];
						                                $gym          = $row['gym'];
						                                $luggage      = $row['luggage'];
						                                $drwaing      = $row['drwaing'];
						                                $dinning      = $row['dinning'];
						                                $balcony      = $row['balcony'];
						                                $garage       = $row['garage'];
						                                $breakfast    = $row['breakfast'];
						                                $restourant    = $row['restourant'];
						                                $availability    = $row['availability'];
						                                $short_desc   = $row['short_desc'];
						                                $long_desc    = $row['long_desc'];
						                                $ow_image     = $row['ow_image'];
						                                $img_one      = $row['img_one'];
						                                $img_two      = $row['img_two'];
						                                $img_three    = $row['img_three'];
						                                $img_four     = $row['img_four'];
						                                $img_five     = $row['img_five'];
						                                $img_six      = $row['img_six'];
						                                $status       = $row['status'];
						                                $google_map   = $row['google_map'];
						                                $join_date    = $row['join_date'];
														$i++;
														?>

														<tr>
													      <th scope="row" class="text-center"><?php echo $i; ?></th>
													      <td class="text-center"><?php echo $ow_email; ?></td>
													      <td class="text-center"><?php echo $ow_phone; ?></td>
													      <td class="text-center"><?php echo $subcat_name; ?></td>	     
													      <td class="text-center"><span class="badge rounded-pill text-bg-primary"><?php echo $cat_name; ?></span></td>
													      <td class="text-center"><?php echo $district; ?></td>
													      <td class="text-center"><?php echo $location; ?></td>
													      <td class="text-center">
															<?php
															if ($status == 2) { ?>
																<span class="badge text-bg-info">Pending</span>
															<?php } 
															else if ($status == 3) { ?>
																<span class="badge text-bg-warning">Approve</span>
															<?php }
															else if ($status == 4) { ?>
																<span class="badge text-bg-danger">Decline</span>
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
																	<a href="fieldRole.php&viewId=<?php echo $sub_id; ?>" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#vId<?php echo $sub_id; ?>"><i class="fa-regular fa-eye"></i> View</a>
																</li>
															</ul>
														</div>

														<!-- START: MODAL FOR FULL VIEW -->
														<div class="col">
															<!-- Modal -->
															<div class="modal fade" id="vId<?php echo $sub_id; ?>" tabindex="-1" aria-hidden="true" style="display: none;">
																<div class="modal-dialog modal-xl">
																	<div class="modal-content">
																		<div class="modal-header">
																			<h1 class="modal-title fs-5" id="exampleModalLabel">Full View of <span style="color: red;"><?php echo $ow_email; ?> </span></h1>
																			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																		</div>
																		<div class="modal-body">
																			<div class="container">
																				<div class="row">
																					<div class="col-lg-12">
																						<div class="card">
																							<div class="card-body">
																								<div class="border p-3 radius-10">
																									<!-- START : FORM -->
																									<form action="" method="POST" enctype="multipart/form-data">
																										<div class="row" style="text-align: left;">
																		                                <div class="col-lg-6">
																		                                  <div class="mb-3">
																		                                    <label class="form-label">Sub Category Name</label>
																		                                    <p class="border p-2 text-dark"><?php echo $subcat_name; ?></p>
																		                                  </div>
																		                                  <div class="mb-3">
																		                                  	<label for="">Owner Name</label>
																		                                  	<p class="border p-2 text-dark"><?php echo $ow_name; ?></p>
																		                                  </div>

																		                                  <div class="mb-3">
																		                                  	<label for="">Owner Email</label>
																		                                  	<p class="border p-2 text-dark"><?php echo $ow_email; ?></p>
																		                                  </div>
																		                                  <div class="mb-3">
																		                                  	<label for="">Owner Phone</label>
																		                                  	<p class="border p-2 text-dark"><?php echo $ow_phone; ?></p>
																		                                  </div>
																		                                  
																		                                  <div class="row">
																		                                  	<div class="col-6">
																		                                  		<div class="mb-3">
																				                                  	<label for="">Division</label>
																				                                  	 <?php  
																			                                            $sql = "SELECT * FROM rent_division WHERE id='$division_id' AND status=1 ORDER BY priority ASC";
																			                                            $query = mysqli_query($db, $sql);

																			                                            while ( $row = mysqli_fetch_assoc($query) ) {
																			                                              $id       = $row['id'];
																			                                                $name       = $row['name'];
																			                                                $priority     = $row['priority'];
																			                                                $status     = $row['status'];
																			                                                ?>
																			                                                  
																			                                               <p class="border p-2 text-dark"><?php echo $name; ?></p>
																			                                                <?php
																			                                            }
																			                                          ?>
																				                                  	
																				                                  </div>
																		                                  	</div>
																		                                    <div class="col-lg-6">
																		                                      <div class="mb-3">
																		                                        <label>District</label>
																		                                        <p class="border p-2 text-dark"><?php echo $district; ?></p>
																		                                      </div>
																		                                    </div>
																		                                  </div>
																		                                  <div class="mb-3">
																		                                    <label>House Number & Location</label>
																		                                    <p class="border p-2 text-dark"><?php echo $location; ?></p>
																		                                  </div>

																		                                  <div class="row">
																		                                    <div class="col-lg-6">
																		                                      <div class="mb-3">
																		                                        <label>Category Name</label>
																		                                        <p class="border p-2 text-dark"><?php echo $cat_name; ?></p>
																		                                          
																		                                        </select>
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-6">
																		                                      <div class="mb-3">
																		                                        <label>Price <sup>(Taka)</sup></label>
																		                                        <p class="border p-2 text-dark"><?php echo $price; ?></p>
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-2">
																		                                      <div class="mb-3">
																		                                        <label>Bed</label>
																		                                        <p class="border p-2 text-dark"><?php echo $bed; ?></p>
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-2">
																		                                      <div class="mb-3">
																		                                        <label>Kitchen</label>
																		                                        <p class="border p-2 text-dark"><?php echo $kitchen; ?></p>
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-2">
																		                                      <div class="mb-3">
																		                                        <label>Drawing</label>
																		                                        <p class="border p-2 text-dark"><?php echo $drwaing; ?></p>
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-2">
																		                                      <div class="mb-3">
																		                                        <label>Dinning</label>
																		                                        <p class="border p-2 text-dark"><?php echo $dinning; ?></p>
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-2">
																		                                      <div class="mb-3">
																		                                        <label>Balcony</label>
																		                                        <p class="border p-2 text-dark"><?php echo $balcony; ?></p>
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-2">
																		                                      <div class="mb-3">
																		                                        <label>Garage</label>
																		                                        <p class="border p-2 text-dark"><?php echo $garage; ?></p>
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-6">
																		                                      <div class="mb-3">
																		                                        <label>Area Size <sup>(Sq Ft)</sup></label>
																		                                        <p class="border p-2 text-dark"><?php echo $area_size; ?></p>
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-6">
																		                                        <div class="mb-3">
																		                                            <label>Katha <sup>(size)</sup></label>
																		                                            <p class="border p-2 text-dark"><?php echo $katha; ?></p>
																		                                        </div>
																		                                      </div>
																		                                    <div class="col-lg-4">
																		                                      <div class="mb-3">
																		                                        <label>Bathroom</label>
																		                                        <p class="border p-2 text-dark"><?php echo $washroom; ?></p>
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-4">
																		                                      <div class="mb-3">
																		                                        <label>Total Room</label>
																		                                        <p class="border p-2 text-dark"><?php echo $totalroom; ?></p>
																		                                      </div>
																		                                    </div>
																		                                    
																		                                    <div class="col-lg-4">
																		                                      <div class="mb-3">	                   	
																		                                        <label>Floor No</label>
																		                                        <p class="border p-2 text-dark"><?php echo $floor; ?></p>
																		                                      </div>
																		                                    </div>

																		                                    <label for="">For Hotel And Other Category</label>

																		                                    <div class="col-lg-3">
																		                                      <div class="mb-3">
																		                                        <label>Ranking For Hotel</label>
																		                                        <select name="rank" class="form-select">
																		                                          <option>select Here</option>
																		                                          <option value="1" <?php if ( $rank == 1 ) {
																		                                            echo "selected";
																		                                          } ?>>5 Star</option>
																		                                          <option value="2" <?php if ( $rank == 2 ) {
																		                                            echo "selected";
																		                                          } ?>>4 Star</option>
																		                                          <option value="3" <?php if ( $rank == 3 ) {
																		                                            echo "selected";
																		                                          } ?>>3 Star</option>
																		                                          <option value="4" <?php if ( $rank == 4 ) {
																		                                            echo "selected";
																		                                          } ?>>2 Star</option>
																		                                          <option value="5" <?php if ( $rank == 5 ) {
																		                                            echo "selected";
																		                                          } ?>>1 Star</option>
																		                                        </select>
																		                                      </div>
																		                                    </div>                      

																		                                    <div class="col-lg-3">
																		                                      <div class="mb-3">
																		                                        <label>Decoration</label>>
																		                                        <select name="decoration" class="form-select">
																		                                          <option>select Here</option>
																		                                          <option value="1" <?php if ( $decoration == 1 ) {
																		                                            echo "selected";
																		                                          } ?>>Furnished</option>
																		                                          <option value="2" <?php if ( $decoration == 2 ) {
																		                                            echo "selected";
																		                                          } ?>>Semi-Furnished</option>
																		                                          <option value="3" <?php if ( $decoration == 3 ) {
																		                                            echo "selected";
																		                                          } ?>>Non-Furnished</option>
																		                                        </select>
																		                                      </div>
																		                                    </div>

																		                                    <div class="col-lg-3">
																		                                      
																		                                      <div class="form-check">
																		                                        <input name="desk" class="form-check-input" type="checkbox" value="1" <?php if ( $desk == 1 ) {
																		                                          echo "checked";
																		                                        } ?> id="flexCheckDefault">
																		                                        <label class="form-check-label" for="flexCheckDefault">
																		                                          Front desk [24-hour]
																		                                        </label>
																		                                      </div>

																		                                      <div class="form-check">
																		                                        <input name="wifi" class="form-check-input" type="checkbox" value="1" <?php if ( $wifi == 1 ) {
																		                                          echo "checked";
																		                                        } ?> id="flexCheckDefault">
																		                                        <label class="form-check-label" for="flexCheckDefault">
																		                                          Free Wi-Fi in all rooms!
																		                                        </label>
																		                                      </div>

																		                                      <div class="form-check">
																		                                        <input name="hottub" class="form-check-input" type="checkbox" value="1" <?php if ( $hottub == 1 ) {
																		                                          echo "checked";
																		                                        } ?> id="flexCheckDefault">
																		                                        <label class="form-check-label" for="flexCheckDefault">
																		                                          Hot tub
																		                                        </label>
																		                                      </div>

																		                                      <div class="form-check">
																		                                        <input name="currency" class="form-check-input" type="checkbox" value="1"<?php if ( $currency == 1 ) {
																		                                          echo "checked";
																		                                        } ?> id="flexCheckDefault">
																		                                        <label class="form-check-label" for="flexCheckDefault">
																		                                          Currency exchange
																		                                        </label>
																		                                      </div>

																		                                      <div class="form-check">
																		                                        <input name="breakfast" class="form-check-input" type="checkbox" value="1"<?php if ( $breakfast == 1 ) {
																		                                          echo "checked";
																		                                        } ?> id="flexCheckDefault">
																		                                        <label class="form-check-label" for="flexCheckDefault">
																		                                          Breakfast
																		                                        </label>
																		                                      </div>

																		                                      <div class="form-check">
																		                                        <input name="restaurant" class="form-check-input" type="checkbox" value="1" <?php if ( $restourant == 1 ) {
																		                                          echo "checked";
																		                                        } ?> id="flexCheckDefault">
																		                                        <label class="form-check-label" for="flexCheckDefault">
																		                                          Restourant
																		                                        </label>
																		                                      </div>
																		                                      
																		                                    </div>

																		                                    <div class="col-lg-3">
																		                                      
																		                                      <div class="form-check">
																		                                        <input name="ac" class="form-check-input" type="checkbox" value="1" <?php if ( $ac == 1 ) {
																		                                          echo "checked";
																		                                        } ?> id="flexCheckDefault">
																		                                        <label class="form-check-label" for="flexCheckDefault">
																		                                          Air conditioning
																		                                        </label>
																		                                      </div>

																		                                      <div class="form-check">
																		                                        <input name="pool" class="form-check-input" type="checkbox" value="1" <?php if ( $pool == 1 ) {
																		                                          echo "checked";
																		                                        } ?> id="flexCheckDefault">
																		                                        <label class="form-check-label" for="flexCheckDefault">
																		                                          Swimming pool(indoor)
																		                                        </label>
																		                                      </div>

																		                                      <div class="form-check">
																		                                        <input name="park" class="form-check-input" type="checkbox" value="1" <?php if ( $park == 1 ) {
																		                                          echo "checked";
																		                                        } ?> id="flexCheckDefault">
																		                                        <label class="form-check-label" for="flexCheckDefault">
																		                                          Car park
																		                                        </label>
																		                                      </div>

																		                                      <div class="form-check">
																		                                        <input name="gym" class="form-check-input" type="checkbox" value="1" <?php if ( $gym == 1 ) {
																		                                          echo "checked";
																		                                        } ?> id="flexCheckDefault">
																		                                        <label class="form-check-label" for="flexCheckDefault">
																		                                          Fitness center
																		                                        </label>
																		                                      </div>

																		                                      <div class="form-check">
																		                                        <input name="luggage" class="form-check-input" type="checkbox" value="1" <?php if ( $luggage == 1 ) {
																		                                          echo "checked";
																		                                        } ?> id="flexCheckDefault">
																		                                        <label class="form-check-label" for="flexCheckDefault">
																		                                          Luggage storage
																		                                        </label>
																		                                      </div>
																		                                      
																		                                    </div>

																		                                  </div>

																		                                </div>
																		                                <div class="col-lg-6">
																		                                  <div class="mb-3">
																		                                    <label>Short Description</label>
																		                                    <p class="border p-2 text-dark"><?php echo $short_desc; ?></p>
																		                                  </div>
																		                                  <div class="mb-3">
																		                                    <label>Long Description</label>
																		                                    <p class="border p-2 text-dark"><?php echo $long_desc; ?></p>
																		                                  </div>
																		                                  <div class="mb-3">
																		                                    <label>Google Embed Map URL <sup>(iframe)</sup></label>
																		                                    <p style="width: 50px !important;">
																		                                    	<?php echo $google_map; ?>
																		                                    </p>
																		                                    
																		                                  </div>
																		                                  <div class="row">
																		                                    <div class="col-lg-6">
																		                                      <div class="mb-3">
																		                                        <label>Available on</label>
																		                                        <p class="border p-2 text-dark"><?php echo $availability; ?></p>
																		                                      </div>
																		                                    </div>                     
																		                                  </div>

																		                                  <div class="mb-3">
																		                                        <label>Owner Image</label>
																		                                        <br><br>
																		                                          <?php 
																											      		if ( !empty( $ow_image ) ) {
																															echo '<img src="assets/images/role/' . $ow_image . '" alt="" style="width: 100%;">';
																											      		}
																											      		else { 
																															echo '<img src="assets/images/dummy.jpg" alt="" style="width: 100%;">';
																											      		}
																											      	?>
																		                                      </div>


																		                                  <div class="row">
																		                                    <label for="">Products Images</label>
																		                                    <div class="col-lg-6">
																		                                      <div class="mb-3">
																		                                        <label>Image One</label>
																		                                        <br><br>
																		                                          <?php
																		                                            if (!empty($img_one)) {
																		                                              echo '<img src="assets/images/buy_subcategory/' . $img_one . '" alt="" style="width: 100%;">';
																		                                            } else {
																		                                              echo '<h5>No Image Uploaded!!</h5>';
																		                                            }
																		                                          ?>
																		                                          <br><br>
																		                                        <input type="file" class="form-control" name="img_one">
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-6">
																		                                      <div class="mb-3">
																		                                        <label>Image Two</label>
																		                                        <br><br>
																		                                          <?php
																		                                            if (!empty($img_two)) {
																		                                              echo '<img src="assets/images/buy_subcategory/' . $img_two . '" alt="" style="width: 100%;">';
																		                                            } else {
																		                                              echo '<h5>No Image Uploaded!!</h5>';
																		                                            }
																		                                          ?>
																		                                          <br><br>
																		                                        <input type="file" class="form-control" name="img_two">
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-6">
																		                                      <div class="mb-3">
																		                                        <label>Image Three</label>
																		                                        <br><br>
																		                                          <?php
																		                                            if (!empty($img_three)) {
																		                                              echo '<img src="assets/images/buy_subcategory/' . $img_three . '" alt="" style="width: 100%;">';
																		                                            } else {
																		                                              echo '<h5>No Image Uploaded!!</h5>';
																		                                            }
																		                                          ?>
																		                                          <br><br>
																		                                        <input type="file" class="form-control" name="img_three">
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-6">
																		                                      <div class="mb-3">
																		                                        <label>Image Four</label>
																		                                        <br><br>
																		                                          <?php
																		                                            if (!empty($img_four)) {
																		                                              echo '<img src="assets/images/buy_subcategory/' . $img_four . '" alt="" style="width: 100%;">';
																		                                            } else {
																		                                              echo '<h5>No Image Uploaded!!</h5>';
																		                                            }
																		                                          ?>
																		                                          <br><br>
																		                                        <input type="file" class="form-control" name="img_four">
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-6">
																		                                      <div class="mb-3">
																		                                        <label>Image Five</label>
																		                                        <br><br>
																		                                          <?php
																		                                            if (!empty($img_five)) {
																		                                              echo '<img src="assets/images/buy_subcategory/' . $img_five . '" alt="" style="width: 100%;">';
																		                                            } else {
																		                                              echo '<h5>No Image Uploaded!!</h5>';
																		                                            }
																		                                          ?>
																		                                          <br><br>
																		                                        <input type="file" class="form-control" name="img_five">
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-6">
																		                                      <div class="mb-3">
																		                                        <label>Image Six</label>
																		                                        <br><br>
																		                                          <?php
																		                                            if (!empty($img_six)) {
																		                                              echo '<img src="assets/images/buy_subcategory/' . $img_six . '" alt="" style="width: 100%;">';
																		                                            } else {
																		                                              echo '<h5>No Image Uploaded!!</h5>';
																		                                            }
																		                                          ?>
																		                                          <br><br>
																		                                        <input type="file" class="form-control" name="img_six">
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
																					</div>
																				</div>
																			</div>
																		</div>
																		<div class="modal-footer">
																			<button type="button" class="btn btn-dark" data-bs-dismiss="modal">Exit</button>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<!-- END: MODAL FOR FULL VIEW -->

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

					else if ( $do == "ManagebuyActive" ) {
						if ( isset($_GET['activeId']) ) {
							$acId = $_GET['activeId'];
							$activeSql = "UPDATE buy_subcategory SET status=3 WHERE sub_id ='$acId'";
							$activeQuery = mysqli_query($db, $activeSql);

							if ($activeQuery) {
								header("Location: fieldRole.php?do=buysubCategory");
							}
							else {
								die("Mysqli_Error" . mysqli_error($db));
							}
						}
					}

					else if ( $do == "Manageetrash" ) {
						if ( isset($_GET['tData']) ) {
							$acId = $_GET['tData'];
							$activeSql = "UPDATE buy_subcategory SET status=4 WHERE sub_id ='$acId'";
							$activeQuery = mysqli_query($db, $activeSql);

							if ($activeQuery) {
								header("Location: fieldRole.php?do=buysubCategory");
							}
							else {
								die("Mysqli_Error" . mysqli_error($db));
							}
						}
					}

					else if( $do == "buyEdit" ) {
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

					else if ( $do == "Support" ) { ?>
					

				<h6 class="mb-0 text-uppercase">Support</h6>
				<hr>
				<div class="card">
					<div class="card-body">
						<div class="border p-3 radius-10">
							<h1 class="text-center pb-5 mb-5">Contact Us</h1>

							<h4>Phone No: 01731-578788</h4>
							<h4>Email Address: Shohanurrahmanshohan.cs@gmail.com</h4>
							<h4>Website: <a href="https://shohancs.com/">https://shohancs.com/</a></h4>
							<h4>Linkdin: <a href="https://www.linkedin.com/in/shohancs/">https://www.linkedin.com/in/shohancs/</a></h4>
							<h4>Github: <a href="https://github.com/shohancs">https://github.com/shohancs</a></h4>

						</div>										
					</div>
				</div>
					<?php }
				?>

			</div>
		</div>
		<!--END: BODY CONTENT -->

<?php include "inc/fieldfooter.php"; ?>