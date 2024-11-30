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
										<li class="breadcrumb-item active" aria-current="page">All Buy Category list</li>
									</ol>
								</nav>
							</div>
							<!-- START: For Right Part -->
							<div class="ms-auto">
								<div class="btn-group">
									<div class="row row-cols-auto g-3">
										<div class="col">
											<a href="buycategory.php?do=Add" class="btn btn-dark px-5">Add New Buy Category</a>
										</div>
										<div class="col">
											<a href="buycategory.php?do=ManageTrash" class="btn btn-danger px-5">Trash</a>
										</div>									
									</div>
								</div>
							</div>
							<!-- END: For Right Part -->
						</div>
						<!--end breadcrumb-->

						<h6 class="mb-0 text-uppercase">ALL Buy CATEGORY LIST</h6>
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
										      <th scope="col" class="text-center">Buy Category Name</th>
										      <th scope="col" class="text-center">Slug</th>
										      <th scope="col" class="text-center">Quantity</th>
										      <th scope="col" class="text-center">Is Parent</th>
										      <th scope="col" class="text-center">Priority Number</th>
										      <th scope="col" class="text-center">Status</th>
										      <th scope="col" class="text-center">Join Date</th>
										      <th scope="col" class="text-center">Action</th>
										    </tr>
										  </thead>

										  <tbody>
										  	<?php  

										  		$rentcategorySql = "SELECT * FROM buy_category WHERE status = 1 ORDER BY priority_id ASC";
										  		$rentcategoryQuery = mysqli_query( $db, $rentcategorySql );
										  		$rentcategoryCount = mysqli_num_rows($rentcategoryQuery);

										  		if ( $rentcategoryCount == 0 ) { ?>
										  			<div class="alert alert-danger text-center" role="alert">
													  Sorry!! No data found in this datatable.
													</div>
										  		<?php }
										  		else {
										  			$i = 0;

										  			while ( $row = mysqli_fetch_assoc( $rentcategoryQuery ) ) {
										  				$id  			= $row['id'];
										  				$name  			= $row['name'];
										  				$slug  			= $row['slug'];										  				
										  				$is_parent  	= $row['is_parent'];
										  				$priority_id  	= $row['priority_id'];
										  				$description 	= $row['description'];
										  				$image  		= $row['image'];
										  				$status  		= $row['status'];
										  				$join_date  	= $row['join_date'];
										  				$i++;
										  				?>
										  				
										  					<tr>
														      <th scope="row" class="text-center"><?php echo $i; ?></th>
														      <td class="text-center">
														      	<?php  
														      		if ( !empty( $image ) ) { 
																		echo '<img src="assets/images/buycategory/' . $image . '" alt="" style="width: 60px;">';
														      		}
														      		else { 
																		echo '<img src="assets/images/dummy.jpg" alt="" style="width: 60px;">';
														      		}
														      	?>
														      </td>
														      <td class="text-center"><?php echo $name; ?></td>
														      <td class="text-center"><?php echo $slug; ?></td>
														      
														      <td class="text-center">
														      	
														      </td>
														      <td class="text-center">
														      	<?php  
														      		if ($is_parent == 1) { ?>
														      			<span class="badge text-bg-primary">Parent</span>
														      		<?php }
														      		else {
														      			echo "Not Parent";
														      		}
														      	?>
														      </td>
														      <td class="text-center"><?php echo $priority_id; ?></td>
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
														      				<a href="buycategory.php?do=Edit&editId=<?php echo $id; ?>" class="btn btn-outline-primary" style="margin: 0 15px;"><i class="fa-solid fa-pencil"></i> Edit</a> 
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
																      	<h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure to disable <span style="color: red;"><?php echo $name; ?> </span>category?</h1>																        
																      </div>
																      <div class="modal-footer justify-content-around">
																      	<ul>
																      		<li>
																      			<a href="buycategory.php?do=Trash&tData=<?php echo $id; ?>" class="btn btn-primary">Yes</a>
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
										<li class="breadcrumb-item active" aria-current="page">Buy Category Create</li>
									</ol>
								</nav>
							</div>
							<!-- START: For Right Part -->
							<div class="ms-auto">
								<div class="btn-group">
									<div class="row row-cols-auto g-3">
										<div class="col">
											<a href="buycategory.php?do=Manage" class="btn btn-dark px-5">All Buy Category</a>
										</div>
										<div class="col">
											<a href="buycategory.php?do=ManageTrash" class="btn btn-danger px-5">Trash</a>
										</div>									
									</div>
								</div>
							</div>
							<!-- END: For Right Part -->
						</div>
						<!--end breadcrumb-->

						<h6 class="mb-0 text-uppercase">Add New Buy Category</h6>
						<hr>
						<div class="card">
							<div class="card-body">
								<div class="border p-3 radius-10">
									<!-- START : FORM -->
									<form action="buycategory.php?do=Store" method="POST" enctype="multipart/form-data">
										<div class="row">
											<div class="col-lg-6">
												<div class="mb-3">
													<label>Buy Category Name</label>
													<input type="text" name="name" class="form-control" required autocomplete="off" placeholder="enter category name..">
												</div>
												<div class="mb-3">
													<label>Category Description</label>
													<textarea name="description" class="form-control" cols="30" rows="10" id="editor" placeholder="write category description..."></textarea>
												</div>
												<div class="mb-3">
													<label>Priotity Number</label>
													<input type="number" class="form-control" name="priority_id" value="number..">
												</div>
											</div>
											<div class="col-lg-6">
												<div class="mb-3">
													<label>Status</label>
													<select name="status" class="form-select">
														<option value="1">Please Select the Status</option>
														<option value="1">Active</option>
														<option value="0">InActive</option>
													</select>
												</div>

												<div class="mb-3">
													<label>Category Logo</label>
													<input type="file" class="form-control" name="image">
												</div>

												<div class="mb-3">
													<div class="d-grid gap-2">
														<input type="submit" name="addRentCat" class="btn btn-dark px-5" value="Add Buy Category">
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
						if ( isset($_POST['addRentCat']) ) {
							$name 			= mysqli_real_escape_string($db, $_POST['name']);
							$description 	= mysqli_real_escape_string($db, $_POST['description']);
							$priority_id 	= mysqli_real_escape_string($db, $_POST['priority_id']);
							$status 		= mysqli_real_escape_string($db, $_POST['status']);
							$catImg 		= mysqli_real_escape_string($db, $_FILES['image']['name']);
							$tmpImg			= $_FILES['image']['tmp_name'];

							if ( !empty($catImg) ) {
								$img = rand( 0, 999999 ) . "_" . $catImg;
								move_uploaded_file($tmpImg, 'assets/images/buycategory/' . $img);
							}
							else {
								$img = '';
							}

							// Start: For Slug Making
							function createSlug( $name ) {
								// Convert to Lower case
								$slug = strtolower($name); 

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
							$slug = createSlug($name);
							// End: For Slug Making

							$addRentCategorySql = "INSERT INTO buy_category ( name, slug, priority_id, description, image, status, join_date ) VALUES ( '$name', '$slug', '$priority_id', '$description', '$img', '$status', now() )";
							$addRentQuery = mysqli_query ( $db, $addRentCategorySql );

							if ( $addRentQuery ) {
							  	header( "Location: buycategory.php?do=Manage" );
							}  
							else {
								die( "Mysql Error." . mysqli_error($db) );
							}



						}
					}

					else if( $do == "Edit" ) {
						if ( isset($_GET['editId']) ) {
							$editIdStore = $_GET['editId'];
							$editSql = "SELECT * FROM buy_category WHERE id='$editIdStore'";
							$editQuery = mysqli_query( $db, $editSql );

							while ( $row = mysqli_fetch_assoc( $editQuery ) ) {
								$id  			= $row['id'];
				  				$name  			= $row['name'];
				  				$slug  			= $row['slug'];
				  				$priority_id  	= $row['priority_id'];
				  				$description 	= $row['description'];
				  				$image  		= $row['image'];
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
												<li class="breadcrumb-item active" aria-current="page">Buy Category Edit</li>
											</ol>
										</nav>
									</div>
									<!-- START: For Right Part -->
									<div class="ms-auto">
										<div class="btn-group">
											<div class="row row-cols-auto g-3">
												<div class="col">
													<a href="buycategory.php?do=Manage" class="btn btn-dark px-5">All Buy Category</a>
												</div>
												<div class="col">
													<a href="buycategory.php?do=Add" class="btn btn-primary px-5">Add New Buy Category</a>
												</div>
												<div class="col">
													<a href="buycategory.php?do=ManageTrash" class="btn btn-danger px-5">Trash</a>
												</div>									
											</div>
										</div>
									</div>
									<!-- END: For Right Part -->
								</div>
								<!--end breadcrumb-->

								<h6 class="mb-0 text-uppercase">Edit Buy Category Info</h6>
								<hr>
								<div class="card">
									<div class="card-body">
										<div class="border p-3 radius-10">
											<!-- START : FORM -->
											<form action="buycategory.php?do=Update" method="POST" enctype="multipart/form-data">
												<div class="row">
													<div class="col-lg-6">
														<div class="mb-3">
															<label>Category Name</label>
															<input type="text" name="name" class="form-control" required autocomplete="off" placeholder="enter category name.." value="<?php echo $name; ?>">
														</div>														<div class="mb-3">
															<label>Category Description</label>
															<textarea name="description" class="form-control" cols="30" rows="10" id="editor" placeholder="write category description..."><?php echo $description; ?></textarea>
														</div>
														<div class="mb-3">
															<label>Priority Number</label>
															<input type="number" name="priority_id" class="form-control"  placeholder="number.." value="<?php echo $priority_id; ?>">
														</div>

													</div>
													<div class="col-lg-6">
														<div class="mb-3">
															<label>Status</label>
															<select name="status" class="form-select">
																<option value="1">Please Select the Status</option>
																<option value="1" <?php if( $status == 1 ) { echo "selected"; } ?>>Active</option>
																<option value="0" <?php if( $status == 0 ) { echo "selected"; } ?>>InActive</option>
															</select>
														</div>

														<div class="mb-3">
															<label>Category Logo</label> <br><br>
															<?php  
																if (!empty( $image )) {
																	echo '<img src="assets/images/buycategory/' . $image . '" alt="" style="width: 100px;">';
																}
																else {
																	echo '<h5>No Image Uploaded!!</h5>';
																}
															?>
															<br><br>
															<input type="file" class="form-control" name="image">
														</div>

														<div class="mb-3">
															<div class="d-grid gap-2">
																<input type="hidden" name="updateId" value="<?php echo $id; ?>">
																<input type="submit" name="updateRentCat" class="btn btn-dark px-5" value="Update Buy Category">
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

						if (isset( $_POST['updateRentCat'] )) {

							$updateIdStore 	= mysqli_real_escape_string($db, $_POST['updateCat']);
							$updateId 		= mysqli_real_escape_string($db, $_POST['updateId']);
							$name 			= mysqli_real_escape_string($db, $_POST['name']);
							$description 	= mysqli_real_escape_string($db, $_POST['description']);
							$priority_id 	= mysqli_real_escape_string($db, $_POST['priority_id']);
							$status 		= mysqli_real_escape_string($db, $_POST['status']);
							$catImage		= mysqli_real_escape_string($db, $_FILES['image']['name']);
							$tmpImg			= $_FILES['image']['tmp_name'];

							if ( !empty($catImage) ) {
								$oldImageSql = "SELECT * FROM buy_category WHERE id='$updateId'";
								$oldImageQuery = mysqli_query( $db, $oldImageSql );

								while ( $row = mysqli_fetch_assoc( $oldImageQuery ) ) {
									$catOldImg = $row['image'];	
									unlink("assets/images/buycategory/$img" . $catOldImg);
								} 

								$img = rand( 0, 999999 ) . "_" . $catImage;
								move_uploaded_file($tmpImg, 'assets/images/buycategory/' . $img);

								// Start: For Slug Making
								function createSlug( $name ) {
									// Convert to Lower case
									$slug = strtolower($name); 

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
								$slug = createSlug($name);
								// End: For Slug Making

								$updateRentSql = "UPDATE buy_category SET name='$name', slug='$slug', priority_id='$priority_id', description='$description', image='$img', status='$status', join_date=now() WHERE id='$updateId'";
								$updateRentQuery = mysqli_query( $db, $updateRentSql );

								if ($updateRentQuery) {
									header("Location: buycategory.php?do=Manage");
								}
								else {
									die ( "Mysqli Error." . mysqli_error($db) );
								}
							}

							else {
								$updateIdStore 	= mysqli_real_escape_string($db, $_POST['updateCat']);
								$updateId 		= mysqli_real_escape_string($db, $_POST['updateId']);
								$name 			= mysqli_real_escape_string($db, $_POST['name']);
								$description 	= mysqli_real_escape_string($db, $_POST['description']);
								$priority_id 	= mysqli_real_escape_string($db, $_POST['priority_id']);
								$status 		= mysqli_real_escape_string($db, $_POST['status']);

								// Start: For Slug Making
								function createSlug( $name ) {
									// Convert to Lower case
									$slug = strtolower($name); 

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
								$slug = createSlug($name);
								// End: For Slug Making

								$updateRentSql = "UPDATE buy_category SET name='$name', slug='$slug', priority_id='$priority_id', description='$description', status='$status', join_date=now() WHERE id='$updateId'";
								$updateRentQuery = mysqli_query( $db, $updateRentSql );

								if ($updateRentQuery) {
									header("Location: buycategory.php?do=Manage");
								}
								else {
									die ( "Mysqli Error." . mysqli_error($db) );
								}
									
							}

						}
					}

					else if( $do == "Trash" ) {
						if (isset($_GET['tData'])) {
							$trashId = $_GET['tData'];
							$trashSql = "UPDATE buy_category SET status=0 WHERE id='$trashId'";
							$trashQuery = mysqli_query($db, $trashSql);

							if ($trashQuery) {
								header("Location: buycategory.php?do=Manage");
							}
							else {
								die("MySql Error." . mysqli_error($db));
							}
						}
					}

					else if( $do == "ManageTrash" ) { ?>
						<!--breadcrumb-->
						<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
							<div class="breadcrumb-title pe-3">Manage Buy Trash</div>
							<div class="ps-3">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb mb-0 p-0">
										<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">Trash Buy Category list</li>
									</ol>
								</nav>
							</div>
							<!-- START: For Right Part -->
							<div class="ms-auto">
								<div class="btn-group">
									<div class="row row-cols-auto g-3">
										<div class="col">
											<a href="buycategory.php?do=Manage" class="btn btn-primary px-5">All Buy Category</a>
										</div>
										<div class="col">
											<a href="buycategory.php?do=Add" class="btn btn-dark px-5">Add New Buy Category</a>
										</div>									
									</div>
								</div>
							</div>
							<!-- END: For Right Part -->
						</div>
						<!--end breadcrumb-->

						<h6 class="mb-0 text-uppercase">TRASH Buy CATEGORY LIST</h6>
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
										      <th scope="col" class="text-center">Category Name</th>
										      <th scope="col" class="text-center">Slug</th>
										      <th scope="col" class="text-center">Quantity</th>
										      <th scope="col" class="text-center">Is Parent</th>
										      <th scope="col" class="text-center">Priority Number</th>
										      <th scope="col" class="text-center">Status</th>
										      <th scope="col" class="text-center">Action</th>
										    </tr>
										  </thead>

										  <tbody>
										  	<?php  

										  		$categoryRentSql = "SELECT * FROM buy_category WHERE status = 0 ORDER BY name ASC";
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
										  				$slug  			= $row['slug'];
										  				$description 	= $row['description'];
										  				$image  		= $row['image'];
										  				$is_parent  	= $row['is_parent'];
										  				$priority_id  	= $row['priority_id'];
										  				$status  		= $row['status'];
										  				$i++;
										  				?>
										  				
										  					<tr>
														      <th scope="row" class="text-center"><?php echo $i; ?></th>
														      <td class="text-center">
														      	<?php  
														      		if ( !empty( $image ) ) { 
																		echo '<img src="assets/images/buycategory/' . $image . '" alt="" style="width: 60px;">';
														      		}
														      		else { 
																		echo '<img src="assets/images/dummy.jpg" alt="" style="width: 60px;">';
														      		}
														      	?>
														      </td>
														      <td class="text-center"><?php echo $name; ?></td>
														      <td class="text-center"><?php echo $slug; ?></td>
														      
														      <td class="text-center">quantity</td>
														      <td class="text-center">
														      	<?php  
														      		if ($is_parent == 1) { ?>
														      			<span class="badge text-bg-primary">Parent</span>
														      		<?php }
														      	?>
														      </td>
														      <td class="text-center"><?php echo $priority_id; ?></td>
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
														      				<a href="buycategory.php?do=Edit&editId=<?php echo $id; ?>" class="btn btn-outline-primary"><i class="fa-solid fa-pencil"></i> Edit</a> 
														      				<a href="buycategory.php?do=ManageActive&activeId=<?php echo $id; ?>" class="btn btn-outline-success" style="margin: 0 15px;"><i class="fa-solid fa-file-circle-check"></i> Active</a> 
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
																      	<h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure to Delete <span style="color: red;"><?php echo $name; ?> </span>category?</h1>																        
																      </div>
																      <div class="modal-footer justify-content-around">
																      	<ul>
																      		<li>
																      			<a href="buycategory.php?do=Delete&dData=<?php echo $id; ?>" class="btn btn-primary">Yes</a>
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
							$activeSql = "UPDATE buy_category SET status=1 WHERE id='$acId'";
							$activeQuery = mysqli_query($db, $activeSql);

							if ($activeQuery) {
								header("Location: buycategory.php?do=Manage");
							}
							else {
								die("Mysqli_Error" . mysqli_error($db));
							}
						}
					}

					else if( $do == "Delete" ) {
						if (isset($_GET['dData'])) {
							$deleteData = $_GET['dData'];
							$deleteSQL = "DELETE FROM buy_category WHERE id='$deleteData' ";
							$deleteQuery = mysqli_query($db, $deleteSQL);

							if ($deleteQuery) {
								header("Location: buycategory.php?do=ManageTrash");
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