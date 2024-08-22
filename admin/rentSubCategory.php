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

			if ($do == "Manage") { ?>
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Manage</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">All Sub Category list</li>
							</ol>
						</nav>
					</div>
					<!-- START: For Right Part -->
					<div class="ms-auto">
						<div class="btn-group">
							<div class="row row-cols-auto g-3">
								<div class="col">
									<a href="rentSubCategory.php?do=Add" class="btn btn-dark px-5">Add New Sub Category</a>
								</div>
								<div class="col">
									<a href="rentSubCategory.php?do=ManageTrash" class="btn btn-danger px-5">Trash</a>
								</div>
							</div>
						</div>
					</div>
					<!-- END: For Right Part -->
				</div>
				<!--end breadcrumb-->

				<h6 class="mb-0 text-uppercase">ALL SUB CATEGORY LIST</h6>
				<hr>
				<div class="card">
					<div class="card-body">
						<div class="border p-3 radius-10">
							<!-- START: DATATABLE -->
							<div class="table-responsive">
								<table class="table table-striped table-hover table-bordered" id="example">
									<thead class="table-dark">
										<tr>
											<th scope="col" class="text-center">#Sl.</th>
											<th scope="col" class="text-center">Image</th>
											<th scope="col" class="text-center">Sub Category Name</th>
											<th scope="col" class="text-center">Slug</th>
											<th scope="col" class="text-center">Category Name</th>
											<th scope="col" class="text-center">Owner Name</th>
											<th scope="col" class="text-center">Owner Email</th>
											<th scope="col" class="text-center">Owner Phone No.</th>
											<th scope="col" class="text-center">Location</th>
											<th scope="col" class="text-center">Price</th>
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

											$childSql = "SELECT * FROM rent_subcategory WHERE is_parent ='$cat_id' AND status=1 ORDER BY subcat_name ASC";
											$childQuery = mysqli_query($db, $childSql);
											$childSqlCount = mysqli_num_rows($childQuery);

											$i = 0;

											while ($row = mysqli_fetch_assoc($childQuery)) {
												$sub_id 		= $row['sub_id'];
												$is_parent		= $row['is_parent'];
												$subcat_name	= $row['subcat_name'];
												$slug 			= $row['slug'];
												$ow_name		= $row['ow_name'];
												$ow_email		= $row['ow_email'];
												$ow_phone		= $row['ow_phone'];
												$location		= $row['location'];
												$price			= $row['price'];
												$bed			= $row['bed'];
												$kitchen		= $row['kitchen'];
												$washroom		= $row['washroom'];
												$totalroom		= $row['totalroom'];
												$area_size		= $row['area_size'];
												$floor			= $row['floor'];
												$short_desc		= $row['short_desc'];
												$long_desc		= $row['long_desc'];
												$img_one		= $row['img_one'];
												$img_two		= $row['img_two'];
												$img_three		= $row['img_three'];
												$img_four		= $row['img_four'];
												$img_five		= $row['img_five'];
												$img_six		= $row['img_six'];
												$status 		= $row['status'];
												$join_date 		= $row['join_date'];
												$i++;
										?>
												<tr>
													<th scope="row" class="text-center"><?php echo $i; ?></th>
													<td class="text-center">
														<?php
														if (!empty($img_one)) {
															echo '<img src="assets/images/subcategory/' . $img_one . '" alt="" style="width: 60px;">';
														} else {
															echo '<img src="assets/images/dummy.jpg" alt="" style="width: 60px;">';
														}
														?>
													</td>
													<td class="text-center"> <?php echo $subcat_name; ?></td>
													<td class="text-center"> <?php echo substr($slug, 0, 10); ?>..</td>
													<td class="text-center"><span class="badge rounded-pill text-bg-primary"><?php echo $cat_name; ?></span></td>
													<td class="text-center"><?php echo $ow_name; ?></td>
													<td class="text-center"><?php echo $ow_email; ?></td>
													<td class="text-center"><?php echo $ow_phone; ?></td>
													<td class="text-center"><?php echo substr($location, 0, 10); ?>..</td>
													<td class="text-center"><span class="badge rounded-pill text-bg-warning"><?php echo $price; ?>৳</span></td>
													<td class="text-center">
														<?php
														if ($status == 1) { ?>
															<span class="badge text-bg-success">Active</span>
														<?php } else if ($status == 0) { ?>
															<span class="badge text-bg-danger">InActive</span>
														<?php }
														?>
													</td>
													<td class="text-center"><?php echo $join_date; ?></td>
													<td class="text-center">
														<div class="action-btn">
															<ul>
																<li>
																	<a href="rentSubCategory.php?do=Edit&editId=<?php echo $sub_id; ?>" class="btn btn-outline-primary"><i class="fa-solid fa-pencil"></i> Edit</a>
																	<a href="rentSubCategory.php&viewId=<?php echo $sub_id; ?>" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#vId<?php echo $sub_id; ?>"><i class="fa-regular fa-eye"></i> View</a>
																	<a href="" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#tId<?php echo $sub_id; ?>"><i class="fa-regular fa-eye-slash"></i> Disable</a>
																</li>
															</ul>
														</div>

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
																				<a href="rentSubCategory.php?do=Trash&tData=<?php echo $sub_id; ?>" class="btn btn-primary">Yes</a>
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
																			<h1 class="modal-title fs-5" id="exampleModalLabel">Full View of <span style="color: red;"><?php echo $subcat_name; ?> </span></h1>
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
																													<input type="text" name="subname" class="form-control" required autocomplete="off" placeholder="enter sub category name.." value="<?php echo $subcat_name; ?>" readonly>
																												</div>
																												<div class="mb-3">
																													<label>Owner Name</label>
																													<input type="text" name="ow_name" class="form-control" required autocomplete="off" placeholder="enter owner name.." value="<?php echo $ow_name; ?>" readonly>
																												</div>
																												<div class="mb-3">
																													<label>Owner Email</label>
																													<input type="email" name="ow_email" class="form-control" required autocomplete="off" placeholder="enter owner email.." value="<?php echo $ow_email; ?>" readonly>
																												</div>
																												<div class="mb-3">
																													<label>Owner Phone No.</label>
																													<input type="phone" name="ow_phone" class="form-control" required autocomplete="off" placeholder="enter owner phone.." value="<?php echo $ow_phone; ?>" readonly>
																												</div>
																												<div class="mb-3">
																													<label>Location</label>
																													<input type="text" name="location" class="form-control" required autocomplete="off" placeholder="enter location.." value="<?php echo $location; ?>" readonly>
																												</div>

																												<div class="row">
																													<div class="col-lg-6">
																														<div class="mb-3">
																															<label>Category Name</label>
																															<select class="form-select" name="is_parent" readonly>
																																<option>Please Select the Category</option>
																																<?php
																																$catSql = "SELECT * FROM rent_category WHERE status=1";
																																$catQuery = mysqli_query($db, $catSql);

																																while ($row = mysqli_fetch_assoc($catQuery)) {
																																	$cat_id = $row['cat_id'];
																																	$catname = $row['name'];
																																?>
																																	<option value="<?php echo $cat_id ?>" <?php if ($is_parent == $cat_id) {
																																												echo "selected";
																																											} ?>> - <?php echo $catname; ?></option>
																																<?php
																																}
																																?>
																															</select>
																														</div>
																													</div>
																													<div class="col-lg-6">
																														<div class="mb-3">
																															<label>Price <sup>(Taka)</sup></label>
																															<input type="number" name="price" class="form-control" required autocomplete="off" placeholder="enter price.." value="<?php echo $price; ?>" readonly>
																														</div>
																													</div>
																													<div class="col-lg-6">
																														<div class="mb-3">
																															<label>Bed</label>
																															<input type="number" name="bed" class="form-control" required autocomplete="off" placeholder="enter number of bed.." value="<?php echo $bed; ?>" readonly>
																														</div>
																													</div>
																													<div class="col-lg-6">
																														<div class="mb-3">
																															<label>Kitchen</label>
																															<input type="number" name="kitchen" class="form-control" required autocomplete="off" placeholder="enter number of kitchen.." value="<?php echo $kitchen; ?>" readonly>
																														</div>
																													</div>
																													<div class="col-lg-6">
																														<div class="mb-3">
																															<label>Washroom</label>
																															<input type="number" name="washroom" class="form-control" required autocomplete="off" placeholder="enter number of washroom.." value="<?php echo $washroom; ?>" readonly>
																														</div>
																													</div>
																													<div class="col-lg-6">
																														<div class="mb-3">
																															<label>Total Room <sup>(Included Drawing, Dining)</sup> </label>
																															<input type="number" name="totalRoom" class="form-control" required autocomplete="off" placeholder="enter number of total room.." value="<?php echo $totalroom; ?>" readonly>
																														</div>
																													</div>

																													<div class="col-lg-6">
																														<div class="mb-3">
																															<label>Area Size <sup>(Sq Ft)</sup></label>
																															<input type="number" name="areaSize" class="form-control" required autocomplete="off" placeholder="enter size of area.." value="<?php echo $area_size; ?>" readonly>
																														</div>
																													</div>
																													<div class="col-lg-6">
																														<div class="mb-3">
																															<label>Floor Number <sup>(1st->2nd->3rd..)</sup></label>
																															<input type="number" name="floor" class="form-control" required autocomplete="off" placeholder="enter size of area.." value="<?php echo $floor; ?>" readonly>
																														</div>
																													</div>
																													<div class="mb-3">
																														<label>Short Description</label>
																														<textarea name="sdesc" class="form-control" cols="30" rows="10" id="editor" placeholder="write short description..." readonly><?php echo $short_desc; ?></textarea>
																													</div>
																													<div class="mb-3">
																														<label>Long Description</label>
																														<textarea name="ldesc" class="form-control" cols="30" rows="10" id="editor1" placeholder="write long description..." readonly><?php echo $long_desc; ?></textarea>
																													</div>
																												</div>

																											</div>
																											<div class="col-lg-6">

																												<div class="row">
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
			<?php } else if ($do == "Add") { ?>
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Create</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Sub Category Create</li>
							</ol>
						</nav>
					</div>
					<!-- START: For Right Part -->
					<div class="ms-auto">
						<div class="btn-group">
							<div class="row row-cols-auto g-3">
								<div class="col">
									<a href="rentSubCategory.php?do=Manage" class="btn btn-dark px-5">All Sub Category</a>
								</div>
								<div class="col">
									<a href="rentSubCategory.php?do=ManageTrash" class="btn btn-danger px-5">Trash</a>
								</div>
							</div>
						</div>
					</div>
					<!-- END: For Right Part -->
				</div>
				<!--end breadcrumb-->

				<h6 class="mb-0 text-uppercase">Add New Sub Category</h6>
				<hr>
				<div class="card">
					<div class="card-body">
						<div class="border p-3 radius-10">
							<!-- START : FORM -->
							<form action="rentSubCategory.php?do=Store" method="POST" enctype="multipart/form-data">
								<div class="row">
									<div class="col-lg-6">
										<div class="mb-3">
											<label>Sub Category Name</label>
											<input type="text" name="subname" class="form-control" required autocomplete="off" placeholder="enter sub category name..">
										</div>
										<div class="mb-3">
											<label>Owner Name</label>
											<input type="text" name="ow_name" class="form-control" required autocomplete="off" placeholder="enter owner name..">
										</div>
										<div class="mb-3">
											<label>Owner Email</label>
											<input type="email" name="ow_email" class="form-control" required autocomplete="off" placeholder="enter owner email..">
										</div>
										<div class="mb-3">
											<label>Owner Phone No.</label>
											<input type="phone" name="ow_phone" class="form-control" required autocomplete="off" placeholder="enter owner phone..">
										</div>
										<div class="mb-3">
											<label>Location</label>
											<input type="text" name="location" class="form-control" required autocomplete="off" placeholder="enter location..">
										</div>

										<div class="row">
											<div class="col-lg-6">
												<div class="mb-3">
													<label>Category Name</label>
													<select class="form-select" name="is_parent">
														<option>Please Select the Category</option>
														<?php
														$catSql = "SELECT * FROM rent_category WHERE status=1";
														$catQuery = mysqli_query($db, $catSql);

														while ($row = mysqli_fetch_assoc($catQuery)) {
															$cat_id = $row['cat_id'];
															$catname = $row['name'];
														?>
															<option value="<?php echo $cat_id ?>"> - <?php echo $catname; ?></option>
														<?php
														}
														?>
													</select>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="mb-3">
													<label>Price <sup>(Taka)</sup></label>
													<input type="number" name="price" class="form-control" required autocomplete="off" placeholder="enter price..">
												</div>
											</div>
											<div class="col-lg-6">
												<div class="mb-3">
													<label>Bed</label>
													<input type="number" name="bed" class="form-control" required autocomplete="off" placeholder="enter number of bed..">
												</div>
											</div>
											<div class="col-lg-6">
												<div class="mb-3">
													<label>Kitchen</label>
													<input type="number" name="kitchen" class="form-control" required autocomplete="off" placeholder="enter number of kitchen..">
												</div>
											</div>
											<div class="col-lg-6">
												<div class="mb-3">
													<label>Washroom</label>
													<input type="number" name="washroom" class="form-control" required autocomplete="off" placeholder="enter number of washroom..">
												</div>
											</div>
											<div class="col-lg-6">
												<div class="mb-3">
													<label>Total Room <sup>(Included Drawing, Dining)</sup> </label>
													<input type="number" name="totalRoom" class="form-control" required autocomplete="off" placeholder="enter number of total room..">
												</div>
											</div>

											<div class="col-lg-6">
												<div class="mb-3">
													<label>Area Size <sup>(Sq Ft)</sup></label>
													<input type="number" name="areaSize" class="form-control" required autocomplete="off" placeholder="enter size of area..">
												</div>
											</div>
											<div class="col-lg-6">
												<div class="mb-3">
													<label>Floor Number <sup>(1st->2nd->3rd..)</sup></label>
													<input type="number" name="floor" class="form-control" required autocomplete="off" placeholder="enter size of area..">
												</div>
											</div>
										</div>

									</div>
									<div class="col-lg-6">
										<div class="mb-3">
											<label>Short Description</label>
											<textarea name="sdesc" class="form-control" cols="30" rows="10" id="editor" placeholder="write short description..."></textarea>
										</div>
										<div class="mb-3">
											<label>Long Description</label>
											<textarea name="ldesc" class="form-control" cols="30" rows="10" id="editor1" placeholder="write long description..."></textarea>
										</div>

										<div class="mb-3">
											<label>Status</label>
											<select name="status" class="form-select">
												<option value="1">Please Select the Status</option>
												<option value="1">Active</option>
												<option value="0">InActive</option>
											</select>
										</div>

										<div class="row">
											<div class="col-lg-6">
												<div class="mb-3">
													<label>Image One</label>
													<input type="file" class="form-control" name="img_one">
												</div>
											</div>
											<div class="col-lg-6">
												<div class="mb-3">
													<label>Image Two</label>
													<input type="file" class="form-control" name="img_two">
												</div>
											</div>
											<div class="col-lg-6">
												<div class="mb-3">
													<label>Image Three</label>
													<input type="file" class="form-control" name="img_three">
												</div>
											</div>
											<div class="col-lg-6">
												<div class="mb-3">
													<label>Image Four</label>
													<input type="file" class="form-control" name="img_four">
												</div>
											</div>
											<div class="col-lg-6">
												<div class="mb-3">
													<label>Image Five</label>
													<input type="file" class="form-control" name="img_five">
												</div>
											</div>
											<div class="col-lg-6">
												<div class="mb-3">
													<label>Image Six</label>
													<input type="file" class="form-control" name="img_six">
												</div>
											</div>
										</div>


										<div class="mb-3">
											<div class="d-grid gap-2">
												<input type="submit" name="addSubCat" class="btn btn-dark px-5" value="Add Sub Category">
											</div>
										</div>
									</div>
								</div>
							</form>
							<!-- END : FORM -->
						</div>
					</div>
				</div>
				<?php } else if ($do == "Store") {
				if (isset($_POST['addSubCat'])) {
					$subname 		= mysqli_real_escape_string($db, $_POST['subname']);
					$ow_name 		= mysqli_real_escape_string($db, $_POST['ow_name']);
					$ow_email 		= mysqli_real_escape_string($db, $_POST['ow_email']);
					$ow_phone 		= mysqli_real_escape_string($db, $_POST['ow_phone']);
					$location 		= mysqli_real_escape_string($db, $_POST['location']);
					$price 			= mysqli_real_escape_string($db, $_POST['price']);
					$bed 			= mysqli_real_escape_string($db, $_POST['bed']);
					$kitchen 		= mysqli_real_escape_string($db, $_POST['kitchen']);
					$washroom 		= mysqli_real_escape_string($db, $_POST['washroom']);
					$totalRoom 		= mysqli_real_escape_string($db, $_POST['totalRoom']);
					$areaSize 		= mysqli_real_escape_string($db, $_POST['areaSize']);
					$floor 			= mysqli_real_escape_string($db, $_POST['floor']);
					$sdesc 			= mysqli_real_escape_string($db, $_POST['sdesc']);
					$ldesc 			= mysqli_real_escape_string($db, $_POST['ldesc']);
					$is_parent 		= mysqli_real_escape_string($db, $_POST['is_parent']);
					$status 		= mysqli_real_escape_string($db, $_POST['status']);

					// For Image One
					$img_one		= mysqli_real_escape_string($db, $_FILES['img_one']['name']);
					$tmpImgOne		= $_FILES['img_one']['tmp_name'];

					if (!empty($img_one)) {
						$img1 = rand(0, 999999) . "_" . $img_one;
						move_uploaded_file($tmpImgOne, 'assets/images/subcategory/' . $img1);
					} else {
						$img1 = '';
					}

					// For Image Two
					$img_two 		= mysqli_real_escape_string($db, $_FILES['img_two']['name']);
					$tmpImgTwo 		= $_FILES['img_two']['tmp_name'];

					if (!empty($tmpImgTwo)) {
						$img2 = rand(0, 999999) . "_" . $img_two;
						move_uploaded_file($tmpImgTwo, 'assets/images/subcategory/' . $img2);
					} else {
						$img2 = '';
					}

					// For Image Three
					$img_three		= mysqli_real_escape_string($db, $_FILES['img_three']['name']);
					$tmpImgThree	= $_FILES['img_three']['tmp_name'];

					if (!empty($img_three)) {
						$img3 = rand(0, 999999) . "_" . $img_three;
						move_uploaded_file($tmpImgThree, 'assets/images/subcategory/' . $img3);
					} else {
						$img3 = '';
					}

					// For Image Four
					$img_four		= mysqli_real_escape_string($db, $_FILES['img_four']['name']);
					$tmpImgFour		= $_FILES['img_four']['tmp_name'];

					if ($img_four) {
						$img4 = rand(0, 999999) . "_" . $img_four;
						move_uploaded_file($tmpImgFour, 'assets/images/subcategory/' . $img4);
					} else {
						$img4 = '';
					}

					// For Image Five
					$img_five 		= mysqli_real_escape_string($db, $_FILES['img_five']['name']);
					$tmpImgFive		= $_FILES['img_five']['tmp_name'];

					if (!empty($img_five)) {
						$img5 = rand(0, 999999) . "_" . $img_five;
						move_uploaded_file($tmpImgFive, 'assets/images/subcategory/' . $img5);
					} else {
						$img5 = '';
					}

					// For Image Six
					$img_six 		= mysqli_real_escape_string($db, $_FILES['img_six']['name']);
					$tmpImgSix		= $_FILES['img_six']['tmp_name'];

					if (!empty($img_six)) {
						$img6 = rand(0, 999999) . "_" . $img_six;
						move_uploaded_file($tmpImgSix, 'assets/images/subcategory/' . $img6);
					} else {
						$img6 = '';
					}


					// Start: For Slug Making
					function createSlug($subname)
					{
						// Convert to Lower case
						$slug = strtolower($subname);

						// Remove Special Character
						$slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);

						// Replace multiple spaces or hyphens with a single hyphen
						$slug = preg_replace('/[\s-]+/', ' ', $slug);

						// Replace spaces with hyphens
						$slug = preg_replace('/\s/', '-', $slug);

						// Trim leading and trailing hyphens
						$slug = trim($slug, '-');

						return $slug;
					}
					$slug = createSlug($subname);
					// End: For Slug Making

					$addSubCategorySql = "INSERT INTO rent_subcategory ( subcat_name, slug, is_parent, ow_name, ow_email, ow_phone, location, price, bed, kitchen, washroom, totalroom, area_size, floor, short_desc, long_desc, img_one, img_two, img_three, img_four, img_five, img_six, status, join_date ) VALUES ( '$subname', '$slug', '$is_parent', '$ow_name', '$ow_email', '$ow_phone', '$location', '$price', '$bed', '$kitchen', '$washroom', '$totalRoom', '$areaSize', '$floor', '$sdesc', '$ldesc', '$img1', '$img2', '$img3', '$img4', '$img5', '$img6', '$status', now() )";
					$addQuery = mysqli_query($db, $addSubCategorySql);

					if ($addQuery) {
						header("Location: rentSubCategory.php?do=Manage");
					} else {
						die("Mysql Error." . mysqli_error($db));
					}
				}
			} else if ($do == "Edit") {
				if (isset($_GET['editId'])) {
					$editIdStore = $_GET['editId'];
					$editSql = "SELECT * FROM rent_subcategory WHERE sub_id='$editIdStore'";
					$editQuery = mysqli_query($db, $editSql);

					while ($row = mysqli_fetch_assoc($editQuery)) {
						$sub_id 		= $row['sub_id'];
						$is_parent		= $row['is_parent'];
						$subcat_name	= $row['subcat_name'];
						$slug 			= $row['slug'];
						$ow_name		= $row['ow_name'];
						$ow_email		= $row['ow_email'];
						$ow_phone		= $row['ow_phone'];
						$location		= $row['location'];
						$price			= $row['price'];
						$bed			= $row['bed'];
						$kitchen		= $row['kitchen'];
						$washroom		= $row['washroom'];
						$totalroom		= $row['totalroom'];
						$area_size		= $row['area_size'];
						$floor			= $row['floor'];
						$short_desc		= $row['short_desc'];
						$long_desc		= $row['long_desc'];
						$img_one		= $row['img_one'];
						$img_two		= $row['img_two'];
						$img_three		= $row['img_three'];
						$img_four		= $row['img_four'];
						$img_five		= $row['img_five'];
						$img_six		= $row['img_six'];
						$status 		= $row['status'];
						$join_date 		= $row['join_date'];
				?>
						<!--breadcrumb-->
						<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
							<div class="breadcrumb-title pe-3">Edit</div>
							<div class="ps-3">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb mb-0 p-0">
										<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">Rent Sub Category Edit</li>
									</ol>
								</nav>
							</div>
							<!-- START: For Right Part -->
							<div class="ms-auto">
								<div class="btn-group">
									<div class="row row-cols-auto g-3">
										<div class="col">
											<a href="rentSubCategory.php?do=Manage" class="btn btn-dark px-5">All Rent Category</a>
										</div>
										<div class="col">
											<a href="rentSubCategory.php?do=Add" class="btn btn-primary px-5">Add New Rent Category</a>
										</div>
										<div class="col">
											<a href="rentSubCategory.php?do=ManageTrash" class="btn btn-danger px-5">Trash</a>
										</div>
									</div>
								</div>
							</div>
							<!-- END: For Right Part -->
						</div>
						<!--end breadcrumb-->

						<h6 class="mb-0 text-uppercase">Edit Rent Sub Category Info</h6>
						<hr>
						<div class="card">
							<div class="card-body">
								<div class="border p-3 radius-10">
									<!-- START : FORM -->
									<form action="rentSubCategory.php?do=Update" method="POST" enctype="multipart/form-data">
										<div class="row">
											<div class="col-lg-6">
												<div class="mb-3">
													<label>Sub Category Name</label>
													<input type="text" name="subname" class="form-control" required autocomplete="off" placeholder="enter sub category name.." value="<?php echo $subcat_name; ?>">
												</div>
												<div class="mb-3">
													<label>Owner Name</label>
													<input type="text" name="ow_name" class="form-control" required autocomplete="off" placeholder="enter owner name.." value="<?php echo $ow_name; ?>">
												</div>
												<div class="mb-3">
													<label>Owner Email</label>
													<input type="email" name="ow_email" class="form-control" required autocomplete="off" placeholder="enter owner email.." value="<?php echo $ow_email; ?>">
												</div>
												<div class="mb-3">
													<label>Owner Phone No.</label>
													<input type="phone" name="ow_phone" class="form-control" required autocomplete="off" placeholder="enter owner phone.." value="<?php echo $ow_phone; ?>">
												</div>
												<div class="mb-3">
													<label>Location</label>
													<input type="text" name="location" class="form-control" required autocomplete="off" placeholder="enter location.." value="<?php echo $location; ?>">
												</div>

												<div class="row">
													<div class="col-lg-6">
														<div class="mb-3">
															<label>Category Name</label>
															<select class="form-select" name="is_parent">
																<option>Please Select the Category</option>
																<?php
																$catSql = "SELECT * FROM rent_category WHERE status=1";
																$catQuery = mysqli_query($db, $catSql);

																while ($row = mysqli_fetch_assoc($catQuery)) {
																	$cat_id = $row['cat_id'];
																	$catname = $row['name'];
																?>
																	<option value="<?php echo $cat_id ?>" <?php if ($is_parent == $cat_id) {
																												echo "selected";
																											} ?>> - <?php echo $catname; ?></option>
																<?php
																}
																?>
															</select>
														</div>
													</div>
													<div class="col-lg-6">
														<div class="mb-3">
															<label>Price <sup>(Taka)</sup></label>
															<input type="number" name="price" class="form-control" required autocomplete="off" placeholder="enter price.." value="<?php echo $price; ?>">
														</div>
													</div>
													<div class="col-lg-6">
														<div class="mb-3">
															<label>Bed</label>
															<input type="number" name="bed" class="form-control" required autocomplete="off" placeholder="enter number of bed.." value="<?php echo $bed; ?>">
														</div>
													</div>
													<div class="col-lg-6">
														<div class="mb-3">
															<label>Kitchen</label>
															<input type="number" name="kitchen" class="form-control" required autocomplete="off" placeholder="enter number of kitchen.." value="<?php echo $kitchen; ?>">
														</div>
													</div>
													<div class="col-lg-6">
														<div class="mb-3">
															<label>Washroom</label>
															<input type="number" name="washroom" class="form-control" required autocomplete="off" placeholder="enter number of washroom.." value="<?php echo $washroom; ?>">
														</div>
													</div>
													<div class="col-lg-6">
														<div class="mb-3">
															<label>Total Room <sup>(Included Drawing, Dining)</sup> </label>
															<input type="number" name="totalRoom" class="form-control" required autocomplete="off" placeholder="enter number of total room.." value="<?php echo $totalroom; ?>">
														</div>
													</div>

													<div class="col-lg-6">
														<div class="mb-3">
															<label>Area Size <sup>(Sq Ft)</sup></label>
															<input type="number" name="areaSize" class="form-control" required autocomplete="off" placeholder="enter size of area.." value="<?php echo $area_size; ?>">
														</div>
													</div>
													<div class="col-lg-6">
														<div class="mb-3">
															<label>Floor Number <sup>(1st->2nd->3rd..)</sup></label>
															<input type="number" name="floor" class="form-control" required autocomplete="off" placeholder="enter size of area.." value="<?php echo $floor; ?>">
														</div>
													</div>
												</div>

											</div>
											<div class="col-lg-6">
												<div class="mb-3">
													<label>Short Description</label>
													<textarea name="sdesc" class="form-control" cols="30" rows="10" id="editor" placeholder="write short description..."><?php echo $short_desc; ?></textarea>
												</div>
												<div class="mb-3">
													<label>Long Description</label>
													<textarea name="ldesc" class="form-control" cols="30" rows="10" id="editor1" placeholder="write long description..."><?php echo $long_desc; ?></textarea>
												</div>

												<div class="mb-3">
													<label>Status</label>
													<select name="status" class="form-select">
														<option value="1">Please Select the Status</option>
														<option value="1" <?php if ($status == 1) {
																				echo 'selected';
																			} ?>>Active</option>
														<option value="0" <?php if ($status == 0) {
																				echo 'selected';
																			} ?>>InActive</option>
													</select>
												</div>

												<div class="row">
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


												<div class="mb-3">
													<div class="d-grid gap-2">
														<input type="hidden" name="rentSubId" value="<?php echo $sub_id; ?>">
														<input type="submit" name="updateRentSubCat" class="btn btn-dark px-5" value="Update Rent Sub Category">
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
			} else if ($do == "Update") {

				if (isset($_POST['updateRentSubCat'])) {

					$updateIdStore 	= mysqli_real_escape_string($db, $_POST['rentSubId']);
					$subname 		= mysqli_real_escape_string($db, $_POST['subname']);
					$ow_name 		= mysqli_real_escape_string($db, $_POST['ow_name']);
					$ow_email 		= mysqli_real_escape_string($db, $_POST['ow_email']);
					$ow_phone 		= mysqli_real_escape_string($db, $_POST['ow_phone']);
					$location 		= mysqli_real_escape_string($db, $_POST['location']);
					$price 			= mysqli_real_escape_string($db, $_POST['price']);
					$bed 			= mysqli_real_escape_string($db, $_POST['bed']);
					$kitchen 		= mysqli_real_escape_string($db, $_POST['kitchen']);
					$washroom 		= mysqli_real_escape_string($db, $_POST['washroom']);
					$totalRoom 		= mysqli_real_escape_string($db, $_POST['totalRoom']);
					$areaSize 		= mysqli_real_escape_string($db, $_POST['areaSize']);
					$floor 			= mysqli_real_escape_string($db, $_POST['floor']);
					$sdesc 			= mysqli_real_escape_string($db, $_POST['sdesc']);
					$ldesc 			= mysqli_real_escape_string($db, $_POST['ldesc']);
					$is_parent 		= mysqli_real_escape_string($db, $_POST['is_parent']);
					$status 		= mysqli_real_escape_string($db, $_POST['status']);

					// For Image One
					$img_one		= mysqli_real_escape_string($db, $_FILES['img_one']['name']);
					$tmpImgOne		= $_FILES['img_one']['tmp_name'];

					if (!empty($img_one)) {
						$oldImgOneSql = "SELECT * FROM rent_subcategory WHERE sub_id='$updateIdStore'";
						$oldImageQuery = mysqli_query($db, $oldImgOneSql);

						while ($row = mysqli_fetch_assoc($oldImageQuery)) {
							$old_Img_one = $row['img_one'];
							unlink('assets/images/subcategory/' . $old_Img_one);
						}

						$img1 = rand(0, 999999) . "_" . $img_one;
						move_uploaded_file($tmpImgOne, 'assets/images/subcategory/' . $img1);

						// Start: For Slug Making
						function createSlug($subname)
						{
							// Convert to Lower case
							$slug = strtolower($subname);

							// Remove Special Character
							$slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);

							// Replace multiple spaces or hyphens with a single hyphen
							$slug = preg_replace('/[\s-]+/', ' ', $slug);

							// Replace spaces with hyphens
							$slug = preg_replace('/\s/', '-', $slug);

							// Trim leading and trailing hyphens
							$slug = trim($slug, '-');

							return $slug;
						}
						$slug = createSlug($subname);
						// End: For Slug Making
						$updateRentCatSql = "UPDATE rent_subcategory SET subcat_name='$subname', slug='$slug', is_parent='$is_parent', ow_name='$ow_name', ow_email='$ow_email', ow_phone='$ow_phone', location='$location', price='$price', bed='$bed', kitchen='$kitchen', washroom='$washroom', totalroom='$totalRoom', area_size='$areaSize', floor='$floor', short_desc='$sdesc', long_desc='$ldesc', img_one='$img1', status='$status' WHERE sub_id='$updateIdStore' ";
						$updateRentCatQuery = mysqli_query($db, $updateRentCatSql);

						if ($updateRentCatQuery) {
							header("Location: rentSubCategory.php?do=Manage");
						} else {
							die("Mysql Error." . mysqli_error($db));
						}
					}

					// For Image Two
					$img_two 		= mysqli_real_escape_string($db, $_FILES['img_two']['name']);
					$tmpImgTwo 		= $_FILES['img_two']['tmp_name'];

					if (!empty($img_two)) {
						$oldImgTwoSql = "SELECT * FROM rent_subcategory WHERE sub_id='$updateIdStore'";
						$oldImageQuery = mysqli_query($db, $oldImgTwoSql);

						while ($row = mysqli_fetch_assoc($oldImageQuery)) {
							$old_Img_Two = $row['img_two'];
							unlink('assets/images/subcategory/' . $old_Img_Two);
						}

						$img2 = rand(0, 999999) . "_" . $img_two;
						move_uploaded_file($tmpImgTwo, 'assets/images/subcategory/' . $img2);

						// Start: For Slug Making
						function createSlug($subname)
						{
							// Convert to Lower case
							$slug = strtolower($subname);

							// Remove Special Character
							$slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);

							// Replace multiple spaces or hyphens with a single hyphen
							$slug = preg_replace('/[\s-]+/', ' ', $slug);

							// Replace spaces with hyphens
							$slug = preg_replace('/\s/', '-', $slug);

							// Trim leading and trailing hyphens
							$slug = trim($slug, '-');

							return $slug;
						}
						$slug = createSlug($subname);
						// End: For Slug Making

						$updateRentCatSql = "UPDATE rent_subcategory SET subcat_name='$subname', slug='$slug', is_parent='$is_parent', ow_name='$ow_name', ow_email='$ow_email', ow_phone='$ow_phone', location='$location', price='$price', bed='$bed', kitchen='$kitchen', washroom='$washroom', totalroom='$totalRoom', area_size='$areaSize', floor='$floor', short_desc='$sdesc', long_desc='$ldesc', img_two='$img2', status='$status' WHERE sub_id='$updateIdStore' ";
						$updateRentCatQuery = mysqli_query($db, $updateRentCatSql);

						if ($updateRentCatQuery) {
							header("Location: rentSubCategory.php?do=Manage");
						} else {
							die("Mysql Error." . mysqli_error($db));
						}
					}


					// For Image Three
					$img_three		= mysqli_real_escape_string($db, $_FILES['img_three']['name']);
					$tmpImgThree	= $_FILES['img_three']['tmp_name'];

					if (!empty($img_three)) {
						$oldImgThreeSql = "SELECT * FROM rent_subcategory WHERE sub_id='$updateIdStore'";
						$oldImageQuery = mysqli_query($db, $oldImgThreeSql);

						while ($row = mysqli_fetch_assoc($oldImageQuery)) {
							$old_Img_Three = $row['img_three'];
							unlink('assets/images/subcategory/' . $old_Img_Three);
						}

						$img3 = rand(0, 999999) . "_" . $img_three;
						move_uploaded_file($tmpImgThree, 'assets/images/subcategory/' . $img3);

						// Start: For Slug Making
						function createSlug($subname)
						{
							// Convert to Lower case
							$slug = strtolower($subname);

							// Remove Special Character
							$slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);

							// Replace multiple spaces or hyphens with a single hyphen
							$slug = preg_replace('/[\s-]+/', ' ', $slug);

							// Replace spaces with hyphens
							$slug = preg_replace('/\s/', '-', $slug);

							// Trim leading and trailing hyphens
							$slug = trim($slug, '-');

							return $slug;
						}
						$slug = createSlug($subname);
						// End: For Slug Making

						$updateRentCatSql = "UPDATE rent_subcategory SET subcat_name='$subname', slug='$slug', is_parent='$is_parent', ow_name='$ow_name', ow_email='$ow_email', ow_phone='$ow_phone', location='$location', price='$price', bed='$bed', kitchen='$kitchen', washroom='$washroom', totalroom='$totalRoom', area_size='$areaSize', floor='$floor', short_desc='$sdesc', long_desc='$ldesc', img_three='$img3', status='$status' WHERE sub_id='$updateIdStore' ";
						$updateRentCatQuery = mysqli_query($db, $updateRentCatSql);

						if ($updateRentCatQuery) {
							header("Location: rentSubCategory.php?do=Manage");
						} else {
							die("Mysql Error." . mysqli_error($db));
						}
					}

					// For Image Four
					$img_four		= mysqli_real_escape_string($db, $_FILES['img_four']['name']);
					$tmpImgFour		= $_FILES['img_four']['tmp_name'];

					if (!empty($img_four)) {
						$oldImgFourSql = "SELECT * FROM rent_subcategory WHERE sub_id='$updateIdStore'";
						$oldImageQuery = mysqli_query($db, $oldImgFourSql);

						while ($row = mysqli_fetch_assoc($oldImageQuery)) {
							$old_Img_Four = $row['img_four'];
							unlink('assets/images/subcategory/' . $old_Img_Four);
						}

						$img4 = rand(0, 999999) . "_" . $img_four;
						move_uploaded_file($tmpImgFour, 'assets/images/subcategory/' . $img4);

						// Start: For Slug Making
						function createSlug($subname)
						{
							// Convert to Lower case
							$slug = strtolower($subname);

							// Remove Special Character
							$slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);

							// Replace multiple spaces or hyphens with a single hyphen
							$slug = preg_replace('/[\s-]+/', ' ', $slug);

							// Replace spaces with hyphens
							$slug = preg_replace('/\s/', '-', $slug);

							// Trim leading and trailing hyphens
							$slug = trim($slug, '-');

							return $slug;
						}
						$slug = createSlug($subname);
						// End: For Slug Making
						$updateRentCatSql = "UPDATE rent_subcategory SET subcat_name='$subname', slug='$slug', is_parent='$is_parent', ow_name='$ow_name', ow_email='$ow_email', ow_phone='$ow_phone', location='$location', price='$price', bed='$bed', kitchen='$kitchen', washroom='$washroom', totalroom='$totalRoom', area_size='$areaSize', floor='$floor', short_desc='$sdesc', long_desc='$ldesc', img_four='$img4', status='$status' WHERE sub_id='$updateIdStore' ";
						$updateRentCatQuery = mysqli_query($db, $updateRentCatSql);

						if ($updateRentCatQuery) {
							header("Location: rentSubCategory.php?do=Manage");
						} else {
							die("Mysql Error." . mysqli_error($db));
						}
					}

					// For Image Five
					$img_five 		= mysqli_real_escape_string($db, $_FILES['img_five']['name']);
					$tmpImgFive		= $_FILES['img_five']['tmp_name'];

					if (!empty($img_five)) {
						$oldImgFiveSql = "SELECT * FROM rent_subcategory WHERE sub_id='$updateIdStore'";
						$oldImageQuery = mysqli_query($db, $oldImgFiveSql);

						while ($row = mysqli_fetch_assoc($oldImageQuery)) {
							$old_Img_Five = $row['img_five'];
							unlink('assets/images/subcategory/' . $old_Img_Five);
						}

						$img5 = rand(0, 999999) . "_" . $img_five;
						move_uploaded_file($tmpImgFive, 'assets/images/subcategory/' . $img5);

						// Start: For Slug Making
						function createSlug($subname)
						{
							// Convert to Lower case
							$slug = strtolower($subname);

							// Remove Special Character
							$slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);

							// Replace multiple spaces or hyphens with a single hyphen
							$slug = preg_replace('/[\s-]+/', ' ', $slug);

							// Replace spaces with hyphens
							$slug = preg_replace('/\s/', '-', $slug);

							// Trim leading and trailing hyphens
							$slug = trim($slug, '-');

							return $slug;
						}
						$slug = createSlug($subname);
						// End: For Slug Making
						$updateRentCatSql = "UPDATE rent_subcategory SET subcat_name='$subname', slug='$slug', is_parent='$is_parent', ow_name='$ow_name', ow_email='$ow_email', ow_phone='$ow_phone', location='$location', price='$price', bed='$bed', kitchen='$kitchen', washroom='$washroom', totalroom='$totalRoom', area_size='$areaSize', floor='$floor', short_desc='$sdesc', long_desc='$ldesc', img_five='$img5', status='$status' WHERE sub_id='$updateIdStore' ";
						$updateRentCatQuery = mysqli_query($db, $updateRentCatSql);

						if ($updateRentCatQuery) {
							header("Location: rentSubCategory.php?do=Manage");
						} else {
							die("Mysql Error." . mysqli_error($db));
						}
					}



					// For Image Six
					$img_six 		= mysqli_real_escape_string($db, $_FILES['img_six']['name']);
					$tmpImgSix		= $_FILES['img_six']['tmp_name'];

					if (!empty($img_six)) {
						$oldImgSixSql = "SELECT * FROM rent_subcategory WHERE sub_id='$updateIdStore'";
						$oldImageQuery = mysqli_query($db, $oldImgSixSql);

						while ($row = mysqli_fetch_assoc($oldImageQuery)) {
							$old_Img_Six = $row['img_six'];
							unlink('assets/images/subcategory/' . $old_Img_Six);
						}

						$img6 = rand(0, 999999) . "_" . $img_six;
						move_uploaded_file($tmpImgSix, 'assets/images/subcategory/' . $img6);

						// Start: For Slug Making
						function createSlug($subname)
						{
							// Convert to Lower case
							$slug = strtolower($subname);

							// Remove Special Character
							$slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);

							// Replace multiple spaces or hyphens with a single hyphen
							$slug = preg_replace('/[\s-]+/', ' ', $slug);

							// Replace spaces with hyphens
							$slug = preg_replace('/\s/', '-', $slug);

							// Trim leading and trailing hyphens
							$slug = trim($slug, '-');

							return $slug;
						}
						$slug = createSlug($subname);
						// End: For Slug Making
						$updateRentCatSql = "UPDATE rent_subcategory SET subcat_name='$subname', slug='$slug', is_parent='$is_parent', ow_name='$ow_name', ow_email='$ow_email', ow_phone='$ow_phone', location='$location', price='$price', bed='$bed', kitchen='$kitchen', washroom='$washroom', totalroom='$totalRoom', area_size='$areaSize', floor='$floor', short_desc='$sdesc', long_desc='$ldesc', img_six='$img6', status='$status' WHERE sub_id='$updateIdStore' ";
						$updateRentCatQuery = mysqli_query($db, $updateRentCatSql);

						if ($updateRentCatQuery) {
							header("Location: rentSubCategory.php?do=Manage");
						} else {
							die("Mysql Error." . mysqli_error($db));
						}
					} else {

						// Start: For Slug Making
						function createSlug($subname)
						{
							// Convert to Lower case
							$slug = strtolower($subname);

							// Remove Special Character
							$slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);

							// Replace multiple spaces or hyphens with a single hyphen
							$slug = preg_replace('/[\s-]+/', ' ', $slug);

							// Replace spaces with hyphens
							$slug = preg_replace('/\s/', '-', $slug);

							// Trim leading and trailing hyphens
							$slug = trim($slug, '-');

							return $slug;
						}
						$slug = createSlug($subname);
						// End: For Slug Making
						$updateRentCatSql = "UPDATE rent_subcategory SET subcat_name='$subname', slug='$slug', is_parent='$is_parent', ow_name='$ow_name', ow_email='$ow_email', ow_phone='$ow_phone', location='$location', price='$price', bed='$bed', kitchen='$kitchen', washroom='$washroom', totalroom='$totalRoom', area_size='$areaSize', floor='$floor', short_desc='$sdesc', long_desc='$ldesc', status='$status' WHERE sub_id='$updateIdStore' ";
						$updateRentCatQuery = mysqli_query($db, $updateRentCatSql);

						if ($updateRentCatQuery) {
							header("Location: rentSubCategory.php?do=Manage");
						} else {
							die("Mysql Error." . mysqli_error($db));
						}
					}
				}
			} else if ($do == "Trash") {
				if (isset($_GET['tData'])) {
					$trashId = $_GET['tData'];
					$trashSql = "UPDATE rent_subcategory SET status=0 WHERE sub_id='$trashId'";
					$trashQuery = mysqli_query($db, $trashSql);

					if ($trashQuery) {
						header("Location: rentSubCategory.php?do=Manage");
					} else {
						die("MySql Error." . mysqli_error($db));
					}
				}
			} else if ($do == "ManageTrash") { ?>
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Manage Rent Sub Category Trash</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Trash Rent Sub Category list</li>
							</ol>
						</nav>
					</div>
					<!-- START: For Right Part -->
					<div class="ms-auto">
						<div class="btn-group">
							<div class="row row-cols-auto g-3">
								<div class="col">
									<a href="rentSubCategory.php?do=Manage" class="btn btn-primary px-5">All Rent Sub Category</a>
								</div>
								<div class="col">
									<a href="rentSubCategory.php?do=Add" class="btn btn-dark px-5">Add New Rent Sub Category</a>
								</div>
							</div>
						</div>
					</div>
					<!-- END: For Right Part -->
				</div>
				<!--end breadcrumb-->

				<h6 class="mb-0 text-uppercase">TRASH Rent sub CATEGORY LIST</h6>
				<hr>
				<div class="card">
					<div class="card-body">
						<div class="border p-3 radius-10">
							<!-- START: DATATABLE -->
							<div class="table-responsive">
								<table class="table table-striped table-hover table-bordered" id="example">
									<thead class="table-dark">
										<tr>
											<th scope="col" class="text-center">#Sl.</th>
											<th scope="col" class="text-center">Image</th>
											<th scope="col" class="text-center">Sub Category Name</th>
											<th scope="col" class="text-center">Slug</th>
											<th scope="col" class="text-center">Category Name</th>
											<th scope="col" class="text-center">Owner Name</th>
											<th scope="col" class="text-center">Owner Email</th>
											<th scope="col" class="text-center">Owner Phone No.</th>
											<th scope="col" class="text-center">Location</th>
											<th scope="col" class="text-center">Price</th>
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

											$childSql = "SELECT * FROM rent_subcategory WHERE is_parent ='$cat_id' AND status=0 ORDER BY subcat_name ASC";
											$childQuery = mysqli_query($db, $childSql);
											$childSqlCount = mysqli_num_rows($childQuery);

											$i = 0;

											while ($row = mysqli_fetch_assoc($childQuery)) {
												$sub_id 		= $row['sub_id'];
												$is_parent		= $row['is_parent'];
												$subcat_name	= $row['subcat_name'];
												$slug 			= $row['slug'];
												$ow_name		= $row['ow_name'];
												$ow_email		= $row['ow_email'];
												$ow_phone		= $row['ow_phone'];
												$location		= $row['location'];
												$price			= $row['price'];
												$bed			= $row['bed'];
												$kitchen		= $row['kitchen'];
												$washroom		= $row['washroom'];
												$totalroom		= $row['totalroom'];
												$area_size		= $row['area_size'];
												$floor			= $row['floor'];
												$short_desc		= $row['short_desc'];
												$long_desc		= $row['long_desc'];
												$img_one		= $row['img_one'];
												$img_two		= $row['img_two'];
												$img_three		= $row['img_three'];
												$img_four		= $row['img_four'];
												$img_five		= $row['img_five'];
												$img_six		= $row['img_six'];
												$status 		= $row['status'];
												$join_date 		= $row['join_date'];
												$i++;
										?>
												<tr>
													<th scope="row" class="text-center"><?php echo $i; ?></th>
													<td class="text-center">
														<?php
														if (!empty($img_one)) {
															echo '<img src="assets/images/subcategory/' . $img_one . '" alt="" style="width: 60px;">';
														} else {
															echo '<img src="assets/images/dummy.jpg" alt="" style="width: 60px;">';
														}
														?>
													</td>
													<td class="text-center"> <?php echo $subcat_name; ?></td>
													<td class="text-center"> <?php echo substr($slug, 0, 10); ?>..</td>
													<td class="text-center"><span class="badge rounded-pill text-bg-primary"><?php echo $cat_name; ?></span></td>
													<td class="text-center"><?php echo $ow_name; ?></td>
													<td class="text-center"><?php echo $ow_email; ?></td>
													<td class="text-center"><?php echo $ow_phone; ?></td>
													<td class="text-center"><?php echo substr($location, 0, 10); ?>..</td>
													<td class="text-center"><span class="badge rounded-pill text-bg-warning"><?php echo $price; ?>৳</span></td>
													<td class="text-center">
														<?php
														if ($status == 1) { ?>
															<span class="badge text-bg-success">Active</span>
														<?php } else if ($status == 0) { ?>
															<span class="badge text-bg-danger">InActive</span>
														<?php }
														?>
													</td>
													<td class="text-center"><?php echo $join_date; ?></td>
													<td class="text-center">
														<div class="action-btn">
															<ul>
																<li>
																	<a href="rentSubCategory.php?do=Edit&editId=<?php echo $sub_id; ?>" class="btn btn-outline-primary"><i class="fa-solid fa-pencil"></i> Edit</a>

																	<a href="rentSubCategory.php&viewId=<?php echo $sub_id; ?>" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#vId<?php echo $sub_id; ?>"><i class="fa-regular fa-eye"></i> View</a>

																	<a href="rentSubCategory.php?do=ManageActive&activeId=<?php echo $sub_id; ?>" class="btn btn-outline-success"><i class="fa-solid fa-file-circle-check"></i> Active</a>

																	<a href="" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#dId<?php echo $sub_id; ?>"><i class="fa-regular fa-eye-slash"></i> Delete</a>
																</li>
															</ul>
														</div>

														<!-- START: MODAL FOR DELETE -->
														<div class="modal fade" id="dId<?php echo $sub_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
															<div class="modal-dialog">
																<div class="modal-content">
																	<div class="modal-header">
																		<h1 class="modal-title fs-5" id="exampleModalLabel">Confirmation Alert!</h1>
																		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																	</div>
																	<div class="modal-body">
																		<h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure to Delete Rent SubCategory <br><span style="color: red;"><?php echo $subcat_name; ?> </span>?</h1>
																	</div>
																	<div class="modal-footer justify-content-around">
																		<ul>
																			<li>
																				<a href="rentSubCategory.php?do=Delete&dData=<?php echo $sub_id; ?>" class="btn btn-primary">Yes</a>
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
																			<h1 class="modal-title fs-5" id="exampleModalLabel">Full View of <span style="color: red;"><?php echo $subcat_name; ?> </span></h1>
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
																													<input type="text" name="subname" class="form-control" required autocomplete="off" placeholder="enter sub category name.." value="<?php echo $subcat_name; ?>" readonly>
																												</div>
																												<div class="mb-3">
																													<label>Owner Name</label>
																													<input type="text" name="ow_name" class="form-control" required autocomplete="off" placeholder="enter owner name.." value="<?php echo $ow_name; ?>" readonly>
																												</div>
																												<div class="mb-3">
																													<label>Owner Email</label>
																													<input type="email" name="ow_email" class="form-control" required autocomplete="off" placeholder="enter owner email.." value="<?php echo $ow_email; ?>" readonly>
																												</div>
																												<div class="mb-3">
																													<label>Owner Phone No.</label>
																													<input type="phone" name="ow_phone" class="form-control" required autocomplete="off" placeholder="enter owner phone.." value="<?php echo $ow_phone; ?>" readonly>
																												</div>
																												<div class="mb-3">
																													<label>Location</label>
																													<input type="text" name="location" class="form-control" required autocomplete="off" placeholder="enter location.." value="<?php echo $location; ?>" readonly>
																												</div>

																												<div class="row">
																													<div class="col-lg-6">
																														<div class="mb-3">
																															<label>Category Name</label>
																															<select class="form-select" name="is_parent" readonly>
																																<option>Please Select the Category</option>
																																<?php
																																$catSql = "SELECT * FROM rent_category WHERE status=1";
																																$catQuery = mysqli_query($db, $catSql);

																																while ($row = mysqli_fetch_assoc($catQuery)) {
																																	$cat_id = $row['cat_id'];
																																	$catname = $row['name'];
																																?>
																																	<option value="<?php echo $cat_id ?>" <?php if ($is_parent == $cat_id) {
																																												echo "selected";
																																											} ?>> - <?php echo $catname; ?></option>
																																<?php
																																}
																																?>
																															</select>
																														</div>
																													</div>
																													<div class="col-lg-6">
																														<div class="mb-3">
																															<label>Price <sup>(Taka)</sup></label>
																															<input type="number" name="price" class="form-control" required autocomplete="off" placeholder="enter price.." value="<?php echo $price; ?>" readonly>
																														</div>
																													</div>
																													<div class="col-lg-6">
																														<div class="mb-3">
																															<label>Bed</label>
																															<input type="number" name="bed" class="form-control" required autocomplete="off" placeholder="enter number of bed.." value="<?php echo $bed; ?>" readonly>
																														</div>
																													</div>
																													<div class="col-lg-6">
																														<div class="mb-3">
																															<label>Kitchen</label>
																															<input type="number" name="kitchen" class="form-control" required autocomplete="off" placeholder="enter number of kitchen.." value="<?php echo $kitchen; ?>" readonly>
																														</div>
																													</div>
																													<div class="col-lg-6">
																														<div class="mb-3">
																															<label>Washroom</label>
																															<input type="number" name="washroom" class="form-control" required autocomplete="off" placeholder="enter number of washroom.." value="<?php echo $washroom; ?>" readonly>
																														</div>
																													</div>
																													<div class="col-lg-6">
																														<div class="mb-3">
																															<label>Total Room <sup>(Included Drawing, Dining)</sup> </label>
																															<input type="number" name="totalRoom" class="form-control" required autocomplete="off" placeholder="enter number of total room.." value="<?php echo $totalroom; ?>" readonly>
																														</div>
																													</div>

																													<div class="col-lg-6">
																														<div class="mb-3">
																															<label>Area Size <sup>(Sq Ft)</sup></label>
																															<input type="number" name="areaSize" class="form-control" required autocomplete="off" placeholder="enter size of area.." value="<?php echo $area_size; ?>" readonly>
																														</div>
																													</div>
																													<div class="col-lg-6">
																														<div class="mb-3">
																															<label>Floor Number <sup>(1st->2nd->3rd..)</sup></label>
																															<input type="number" name="floor" class="form-control" required autocomplete="off" placeholder="enter size of area.." value="<?php echo $floor; ?>" readonly>
																														</div>
																													</div>
																													<div class="mb-3">
																														<label>Short Description</label>
																														<textarea name="sdesc" class="form-control" cols="30" rows="10" id="editor" placeholder="write short description..." readonly><?php echo $short_desc; ?></textarea>
																													</div>
																													<div class="mb-3">
																														<label>Long Description</label>
																														<textarea name="ldesc" class="form-control" cols="30" rows="10" id="editor1" placeholder="write long description..." readonly><?php echo $long_desc; ?></textarea>
																													</div>
																												</div>

																											</div>
																											<div class="col-lg-6">

																												<div class="row">
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
			<?php } else if ($do == "ManageActive") {
				if (isset($_GET['activeId'])) {
					$acId = $_GET['activeId'];
					$activeSql = "UPDATE rent_subcategory SET status=1 WHERE sub_id='$acId'";
					$activeQuery = mysqli_query($db, $activeSql);

					if ($activeQuery) {
						header("Location: rentSubCategory.php?do=Manage");
					} else {
						die("Mysqli_Error" . mysqli_error($db));
					}
				}
			} else if ($do == "Delete") {
				if (isset($_GET['dData'])) {
					$deleteData = $_GET['dData'];
					$deleteSQL = "DELETE FROM rent_subcategory WHERE sub_id='$deleteData' ";
					$deleteQuery = mysqli_query($db, $deleteSQL);

					if ($deleteQuery) {
						header("Location: rentSubCategory.php?do=ManageTrash");
					} else {
						die("Mysqli_Error" . mysqli_error($db));
					}
				}
			}
			?>

		</div>
	</div>
	<!--END: BODY CONTENT -->

	<?php include "inc/footer.php"; ?>