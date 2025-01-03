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

					if ( $do == "Manage" ) { ?>
						<!--breadcrumb-->
						<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
							<div class="breadcrumb-title pe-3">Report Manage</div>
							<div class="ps-3">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb mb-0 p-0">
										<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">All Report list</li>
									</ol>
								</nav>
							</div>
						</div>
						<!--end breadcrumb--> 

						<h6 class="mb-0 text-uppercase">ALL Report LIST</h6>  
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
										      <th scope="col" class="text-center">Rent Title</th>
										      <th scope="col" class="text-center">Buy Title</th>
										      <th scope="col" class="text-center">Seller Email</th>
										      <th scope="col" class="text-center">Join Date</th>
										      <th scope="col" class="text-center">Action</th>
										    </tr>
										  </thead>

										  <tbody>
										  	<?php  
										  		$sesId = $_SESSION['email'];
										  		$roleSql = "SELECT * FROM report WHERE field_email = '$sesId' ORDER BY id DESC";
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
										  				$id  				= $row['id'];
										  				$rent_prdId  		= $row['rent_prdId'];
										  				$buy_prdId  		= $row['buy_prdId'];
										  				$seller_email  		= $row['seller_email'];
										  				$field_email  		= $row['field_email'];
										  				$details  			= $row['details'];
										  				$img_one  			= $row['img_one'];
										  				$img_two  			= $row['img_two'];
										  				$img_three  		= $row['img_three'];
										  				$img_four  			= $row['img_four'];
										  				$join_date  		= $row['join_date'];
										  				$i++;
										  				?>
										  				
										  					<tr>
										  						<th scope="row" class="text-center"><?php echo $i; ?></th>
										  						<td class="text-center">
																	<?php  
																	if (empty($rent_prdId)) {
																		echo "---";
																	}
																	else {
																		$childSql = "SELECT * FROM rent_subcategory WHERE sub_id ='$rent_prdId' ORDER BY subcat_name ASC";
																		$childQuery = mysqli_query($db, $childSql);

																			while ($row = mysqli_fetch_assoc($childQuery)) {
																				$sub_id 		= $row['sub_id'];
																				$is_parent		= $row['is_parent'];
																				$subcat_name	= $row['subcat_name'];
																				

																				echo $subcat_name;
																			}
																		}
																	?>
																</td>
																<td class="text-center">
																	<?php  
																	if (empty($buy_prdId)) {
																		echo "---";
																	}
																	else {
																		$childSql = "SELECT * FROM buy_subcategory WHERE sub_id ='$buy_prdId' ORDER BY subcat_name ASC";
																		$childQuery = mysqli_query($db, $childSql);

																		while ($row = mysqli_fetch_assoc($childQuery)) {
																			$bsub_id 		= $row['sub_id'];
																			$bis_parent		= $row['is_parent'];
																			$bsubcat_name	= $row['subcat_name'];
																			

																			echo $bsubcat_name;
																		}
																	}																		
																	?>
																</td>
																<td class="text-center">
																	<?php  
																		$childSql = "SELECT * FROM role WHERE role=4 AND id ='$seller_email' ORDER BY name ASC";
																		$childQuery = mysqli_query($db, $childSql);

																		while ($row = mysqli_fetch_assoc($childQuery)) {
																			$bsub_id 		= $row['id'];
																			$email			= $row['email'];
																			

																			echo $email;
																		}
																	?>
														      	<td class="text-center"><?php echo $join_date; ?></td>
														      	<td class="text-center">
														      	<div class="action-btn">
														      		<ul>
														      			<li>
														      				<a href="report.php&viewId=<?php echo $id; ?>" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#vId<?php echo $id; ?>"><i class="fa-regular fa-eye"></i> View</a>
														      			</li>
														      		</ul>
<!-- Modal -->
<!-- START: MODAL FOR FULL VIEW -->
<div class="col">
	<!-- Modal -->
	<div class="modal fade" id="vId<?php echo $id; ?>" tabindex="-1" aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel">Full View of <span style="color: red;">
						<?php  
							$childSql = "SELECT * FROM role WHERE role=4 AND id ='$seller_email' ORDER BY name ASC";
							$childQuery = mysqli_query($db, $childSql);

							while ($row = mysqli_fetch_assoc($childQuery)) {
								$bsub_id 		= $row['id'];
								$email			= $row['email'];
								

								echo $email;
							}
						?> </span></h1>
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
												<div class="row text-start">
													<div class="col-lg-6">
														<div class="mb-3">
															<label>Rent Product Name</label>

															<?php  
															if (empty($rent_prdId)) {
																	echo "---";
															}
															else {
																$childSql = "SELECT * FROM rent_subcategory WHERE sub_id ='$rent_prdId' ORDER BY subcat_name ASC";
																$childQuery = mysqli_query($db, $childSql);

																while ($row = mysqli_fetch_assoc($childQuery)) {
																	$sub_id 		= $row['sub_id'];
																	$is_parent		= $row['is_parent'];
																	$subcat_name	= $row['subcat_name'];
																	?>
																	<input type="text" class="form-control" value="<?php echo $subcat_name; ?>">
																	<?php
																}
															}
															?>
														</select>

															
														</div>

														<div class="mb-3">
															<label>Buy Product Name</label>
															<?php   
																if (empty($buy_prdId)) {
																	echo "---";
																}
																else {
																	$childSql = "SELECT * FROM buy_subcategory WHERE sub_id ='$buy_prdId' ORDER BY subcat_name ASC";
																	$childQuery = mysqli_query($db, $childSql);

																	while ($row = mysqli_fetch_assoc($childQuery)) {
																		$bsub_id 		= $row['sub_id'];
																		$bis_parent		= $row['is_parent'];
																		$bsubcat_name	= $row['subcat_name'];
																		?>
																			<input type="text" class="form-control" value="<?php echo $bsubcat_name; ?>">
																			<?php
																	}
																}
															?>

															
														</div>

														<div class="mb-3">
															<label>Seller Email</label>
															<?php  
																$childSql = "SELECT * FROM role WHERE role=4 AND id ='$seller_email' ORDER BY name ASC";
																$childQuery = mysqli_query($db, $childSql);

																while ($row = mysqli_fetch_assoc($childQuery)) {
																	$bsub_id 		= $row['id'];
																	$email			= $row['email'];
																	?>
																	<input type="text" class="form-control" value="<?php echo $email; ?>">
																	<?php
																}
															?>
															
														</div>

														<div class="mb-3">													<input type="hidden" name="field_email" value="<?php echo $_SESSION['email']; ?>">
														</div>

														<div class="mb-3">
															<label>Report</label>
															<textarea name="text" class="form-control" id="" cols="30" rows="8" required autocomplete="off" placeholder="report write here.."><?php echo $details; ?></textarea>
														</div>
													</div>
													<div class="col-lg-6">
														<label for="">Optional Image</label>

														<div class="row">
															<div class="col-6">
																<div class="mb-3">
																	<label for="">Image</label>
																	<br><br>
																	<?php
																	if (!empty($img_one)) {
																		echo '<img src="assets/images/report/' . $img_one . '" alt="" style="width: 100%;">';
																	} else {
																		echo '<h5>No Image Uploaded!!</h5>';
																	}
																	?>
																	<br><br>
																	<input type="file" class="form-control" name="img_one">
																</div>
															</div>
															<div class="col-6">
																<div class="mb-3">
																	<label for="">Image</label>
																	<br><br>
																	<?php
																	if (!empty($img_two)) {
																		echo '<img src="assets/images/report/' . $img_two . '" alt="" style="width: 100%;">';
																	} else {
																		echo '<h5>No Image Uploaded!!</h5>';
																	}
																	?>
																	<br><br>
																	<input type="file" class="form-control" name="img_two">
																</div>
															</div>
															<div class="col-6">
																<div class="mb-3">
																	<label for="">Image</label>
																	<br><br>
																	<?php
																	if (!empty($img_three)) {
																		echo '<img src="assets/images/report/' . $img_three . '" alt="" style="width: 100%;">';
																	} else {
																		echo '<h5>No Image Uploaded!!</h5>';
																	}
																	?>
																	<br><br>
																	<input type="file" class="form-control" name="img_three">
																</div>
															</div>
															<div class="col-6">
																<div class="mb-3">
																	<label for="">Image</label>
																	<br><br>
																	<?php
																	if (!empty($img_four)) {
																		echo '<img src="assets/images/report/' . $img_four . '" alt="" style="width: 100%;">';
																	} else {
																		echo '<h5>No Image Uploaded!!</h5>';
																	}
																	?>
																	<br><br>
																	<input type="file" class="form-control" name="img_four">
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
<!-- Modal -->
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
										<li class="breadcrumb-item active" aria-current="page">Write Report</li>
									</ol>
								</nav>
							</div>
						</div>
						<!--end breadcrumb-->

						<h6 class="mb-0 text-uppercase">Write Report</h6>
						<hr>
						<div class="card">
							<div class="card-body">
								<div class="border p-3 radius-10">
									<!-- START : FORM -->
									<form action="report.php?do=Store" method="POST" enctype="multipart/form-data">
										<div class="row">
											<div class="col-lg-6">
												<div class="mb-3">
													<label>Rent Product Name</label>

													<select name="rent_prdId" class="form-select">
														<option>Please Select the Rent Product Name </option>
														<?php  
														$sql = "SELECT * FROM rent_subcategory WHERE status != 1 ORDER BY sub_id DESC";
														$query = mysqli_query($db, $sql);
														 while ( $row = mysqli_fetch_assoc($query) ) {
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
							                                ?>
							                                <option value="<?php echo $sub_id ?>"> - <?php echo $subcat_name; ?></option>
							                                <?php
							                            }
													?>
													</select>
												</div>

												<div class="mb-3">
													<label>Buy Product Name</label>

													<select name="buy_prdId" class="form-select">
														<option>Please Select the Buy Product Name </option>
														<?php  
														$sql = "SELECT * FROM buy_subcategory WHERE status != 1 ORDER BY sub_id DESC";
														$query = mysqli_query($db, $sql);
														 while ( $row = mysqli_fetch_assoc($query) ) {
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
							                                ?>
							                                <option value="<?php echo $sub_id ?>"> - <?php echo $subcat_name; ?></option>
							                                <?php
							                            }
													?>
													</select>
												</div>

												<div class="mb-3">
													<label>Seller Email</label>

													<select name="seller_email" class="form-select">
														<option>Please Select the Seller Email </option>
														<?php  
															$rentDivSql = "SELECT * FROM transactions ORDER BY id DESC";
													  		$rentDivQuery = mysqli_query( $db, $rentDivSql );
													  		while ( $row = mysqli_fetch_assoc( $rentDivQuery ) ) {
												  				$id               = $row['id'];
								                                $user_email       = $row['user_email'];

								                                $roleSql = "SELECT * FROM role WHERE email='$user_email' AND status = 1 AND role=4 ORDER BY name ASC";
													  		$roleQuery = mysqli_query( $db, $roleSql );
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
												  				?>
							                                <option value="<?php echo $id ?>"> - <?php echo $email; ?></option>
							                                <?php
													  		}

													  	}
														?>
													</select>
												</div>

												<div class="mb-3">													<input type="hidden" name="field_email" value="<?php echo $_SESSION['email']; ?>">
												</div>

												<div class="mb-3">
													<label>Report</label>
													<textarea name="text" class="form-control" id="" cols="30" rows="8" required autocomplete="off" placeholder="report write here.."></textarea>
												</div>
											</div>
											<div class="col-lg-6">
												<label for="">Optional Image</label>

												<div class="mb-3">
													<label for="">Image</label>
													<input type="file" class="form-control" name="img_one">
												</div>

												<div class="mb-3">
													<label for="">Image</label>
													<input type="file" class="form-control" name="img_two">
												</div>

												<div class="mb-3">
													<label for="">Image</label>
													<input type="file" class="form-control" name="img_three">
												</div>

												<div class="mb-3">
													<label for="">Image</label>
													<input type="file" class="form-control" name="img_four">
												</div>

												<div class="mb-3">
													<div class="d-grid gap-2">
														<input type="submit" name="addReport" class="btn btn-dark px-5" value="Add Report">
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
						if ( isset($_POST['addReport']) ) {

							$rent_prdId 	= mysqli_real_escape_string($db, $_POST['rent_prdId']);
							$buy_prdId 		= mysqli_real_escape_string($db, $_POST['buy_prdId']);
							$seller_email 	= mysqli_real_escape_string($db, $_POST['seller_email']);
							$field_email 	= mysqli_real_escape_string($db, $_POST['field_email']);
							$details 		= mysqli_real_escape_string($db, $_POST['text']);

							// For Image One
							$img_one		= mysqli_real_escape_string($db, $_FILES['img_one']['name']);
							$tmpImgOne		= $_FILES['img_one']['tmp_name'];

							if (!empty($img_one)) {
								$img1 = rand(0, 999999) . "_" . $img_one;
								move_uploaded_file($tmpImgOne, 'assets/images/report/' . $img1);
							} else {
								$img1 = '';
							}

							// For Image Two
							$img_two 		= mysqli_real_escape_string($db, $_FILES['img_two']['name']);
							$tmpImgTwo 		= $_FILES['img_two']['tmp_name'];

							if (!empty($tmpImgTwo)) {
								$img2 = rand(0, 999999) . "_" . $img_two;
								move_uploaded_file($tmpImgTwo, 'assets/images/report/' . $img2);
							} else {
								$img2 = '';
							}

							// For Image Three
							$img_three		= mysqli_real_escape_string($db, $_FILES['img_three']['name']);
							$tmpImgThree	= $_FILES['img_three']['tmp_name'];

							if (!empty($img_three)) {
								$img3 = rand(0, 999999) . "_" . $img_three;
								move_uploaded_file($tmpImgThree, 'assets/images/report/' . $img3);
							} else {
								$img3 = '';
							}

							// For Image Four
							$img_four		= mysqli_real_escape_string($db, $_FILES['img_four']['name']);
							$tmpImgFour		= $_FILES['img_four']['tmp_name'];

							if ($img_four) {
								$img4 = rand(0, 999999) . "_" . $img_four;
								move_uploaded_file($tmpImgFour, 'assets/images/report/' . $img4);
							} else {
								$img4 = '';
							}

							$addSubCategorySql = "INSERT INTO report ( rent_prdId, buy_prdId, seller_email, field_email, details, img_one, img_two, img_three, img_four, join_date ) VALUES ( '$rent_prdId', '$buy_prdId', '$seller_email', '$field_email', '$details', '$img1', '$img2', '$img3', '$img4', now() )";
							$addQuery = mysqli_query($db, $addSubCategorySql);

							if ($addQuery) {
								header("Location: report.php?do=Manage");
							} else {
								die("Mysql Error." . mysqli_error($db));
							}

						}
					}


				?>

			</div>
		</div>
		<!--END: BODY CONTENT -->

<?php include "inc/footer.php"; ?>