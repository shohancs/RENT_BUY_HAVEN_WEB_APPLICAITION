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
							<div class="breadcrumb-title pe-3">Hotel Booking Manage</div>
							<div class="ps-3">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb mb-0 p-0">
										<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">Hotel Booking list</li>
									</ol>
								</nav>
							</div>
						</div>
						<!--end breadcrumb--> 

						<h6 class="mb-0 text-uppercase">Hotel Booking LIST</h6>  
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
										      <th scope="col" class="text-center">Hotel Name</th>
										      <th scope="col" class="text-center">User Email</th>
										      <th scope="col" class="text-center">User Phone</th>
										      <th scope="col" class="text-center">CheckIn</th>
										      <th scope="col" class="text-center">CheckOut</th>
										      <th scope="col" class="text-center">Adult</th>
										      <th scope="col" class="text-center">Child</th>
										      <th scope="col" class="text-center">Status</th>
										      <th scope="col" class="text-center">Join Date</th>
										      <th scope="col" class="text-center">Action</th>
										    </tr>
										  </thead>

										  <tbody>
										  	<?php  
										  		$roleSql = "SELECT * FROM booking ORDER BY id DESC";
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
										  				$prd_id  		= $row['prd_id'];
										  				$email  		= $row['email'];
										  				$phone  		= $row['phone'];
										  				$check_in  		= $row['check_in'];
										  				$check_out  	= $row['check_out'];
										  				$adult  		= $row['adult'];
										  				$child  		= $row['child'];
										  				$status  		= $row['status'];
										  				$join_date  	= $row['join_date'];
										  				$i++;
										  				?>
										  				
										  					<tr>
										  						<th scope="row" class="text-center"><?php echo $i; ?></th>
										  						<td class="text-center">
																	<?php  
																	$childSql = "SELECT * FROM rent_subcategory WHERE sub_id ='$prd_id' ORDER BY subcat_name ASC";
																	$childQuery = mysqli_query($db, $childSql);

																	while ($row = mysqli_fetch_assoc($childQuery)) {
																		$sub_id 		= $row['sub_id'];
																		$is_parent		= $row['is_parent'];
																		$subcat_name	= $row['subcat_name'];
																		

																		echo $subcat_name;
																	}
																	?>
																</td>
																<td class="text-center">
																	<?php echo $email; ?>
																</td>
																<td class="text-center">
																	<?php echo $phone; ?>
																</td>
																<td class="text-center">
																	<?php echo $check_in; ?>
																</td>
																<td class="text-center">
																	<?php echo $check_out; ?>
																</td>
																<td class="text-center">
																	<?php echo $adult; ?>
																</td>
																<td class="text-center">
																	<?php echo $child; ?>
																</td>
																<td class="text-center">
																	<?php  
																		if ($status == 0) { ?>
															      			<span class="badge text-bg-info">Pending</span>
															      		<?php }
															      		else if ($status == 1) { ?>
															      			<span class="badge text-bg-success">Active</span>
															      		<?php }
															      		else if ($status == 2) { ?>
															      			<span class="badge text-bg-danger">Disable</span>
															      		<?php }
																	?>
																</td>
																<td class="text-center">
																	<?php echo $join_date; ?>
																</td>
																<td class="text-center">
																	<div class="action-btn">
																		<ul>
																			<li>
																				<?php  
																					if ( $status != 0 ) {
																						echo "Updated";
																					}
																					else { ?>
																						<a href="adminBooking.php?do=Approve&aId=<?php echo $id; ?>" class="btn btn-outline-success"><i class="fa-solid fa-pencil"></i> Approve</a>
																				
																						<a href="adminBooking.php?do=Disable&dId=<?php echo $id; ?>" class="btn btn-outline-danger"><i class="fa-regular fa-eye-slash"></i> Disable</a> 

																					<?php }
																				?>
																				  
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

					else if ( $do == "Approve" ) {

						if ( isset($_GET['aId']) ) {
							$apdId = $_GET['aId'];
							$sql = "UPDATE booking SET status=1 WHERE id='$apdId'";
							$query = mysqli_query($db, $sql);

							if ( $query ) {
								header("Location: adminBooking.php?do=Manage");
							}
							else {
								die('mysqli error.' . mysqli_error($db));
							}
						}

					}

					else if ( $do == "Disable" ) {
						if ( isset($_GET['dId']) ) {
							$apdId = $_GET['dId'];
							$sql = "UPDATE booking SET status=2 WHERE id='$apdId'";
							$query = mysqli_query($db, $sql);

							if ( $query ) {
								header("Location: adminBooking.php?do=Manage");
							}
							else {
								die('mysqli error.' . mysqli_error($db));
							}
						}
					}

				?>

			</div>
		</div>
		<!--END: BODY CONTENT -->

<?php include "inc/footer.php"; ?>