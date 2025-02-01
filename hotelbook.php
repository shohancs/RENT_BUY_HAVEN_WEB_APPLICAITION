<?php include"inc/header.php"; ?>
<main>
	<!-- START: Breadcrumb -->
     <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-uppercase d-flex justify-content-between">
                    <div>
                        <h4 style="color: #023021; font-size: 25px;">Hotel Booking Information</h4>
                    </div>
                    <div class="d-flex">
                        <a href="index.php"><h4 style="color:#545454; font-size: 17px; font-weight: 400; ">HOME</h4></a>
                        <h4 class="px-2" style="color:#545454; font-size: 17px; font-weight: 400; "> / </h4>
                        <h4 style="color:#6c757d; font-size: 17px; font-weight: 400; ">booking</h4>
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
                        <h1 class="mt-5 mb-4" style="letter-spacing: 2px; color:#023021; font-size: 25px; font-weight:600;">Hotel Booking Information</h1>
                    </div>
					<div class="user bg-light p-4" style="border-top: 4px solid #ffc107; border-radius: 10px;">

						<!-- START: DATATABLE -->
						<div class="table-responsive">
							<table class="table table-striped table-hover table-bordered"  id="example">
							  <thead class="table-dark">
							    <tr>
							      <th scope="col" class="text-center">#Sl.</th>
							      <th scope="col" class="text-center">Hotel Name</th>
							      <th scope="col" class="text-center">CheckIn</th>
							      <th scope="col" class="text-center">CheckOut</th>
							      <th scope="col" class="text-center">Adult</th>
							      <th scope="col" class="text-center">Child</th>
							      <th scope="col" class="text-center">Status</th>
							      <th scope="col" class="text-center">Join Date</th>
							    </tr>
							  </thead>

							  <tbody>
							  	<?php  
							  		$profileId = $_SESSION['email'];
									$sql = "SELECT * FROM booking WHERE email='$profileId'";
							  		$roleQuery = mysqli_query( $db, $sql );
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
		</div>
	</section>
</main>
<?php include"inc/footer.php"; ?>