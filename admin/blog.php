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
										<li class="breadcrumb-item active" aria-current="page">All Blogs</li>
									</ol>
								</nav>
							</div>
							<!-- START: For Right Part -->
							<div class="ms-auto">
								<div class="btn-group">
									<div class="row row-cols-auto g-3">
										<div class="col">
											<a href="blog.php?do=Add" class="btn btn-dark px-5">Add New Blog</a>
										</div>								
									</div>
								</div>
							</div>
							<!-- END: For Right Part -->
						</div>
						<!--end breadcrumb-->

						<h6 class="mb-0 text-uppercase">ALL Blogs</h6>
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
										      <th scope="col" class="text-center">Author Name</th>
										      <th scope="col" class="text-center">Title</th>
										      <th scope="col" class="text-center">Category</th>
										      <th scope="col" class="text-center">Status</th>
										      <th scope="col" class="text-center">Join Date</th>
										      <th scope="col" class="text-center">Action</th>
										    </tr>
										  </thead>

										  <tbody>
										  	<?php  

										  		$roleSql = "SELECT * FROM blog WHERE status = 1 ORDER BY id DESC";
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
										  				$cateId  		= $row['cateId'];
										  				$title  		= $row['title'];
										  				$details  		= $row['details'];
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
																		echo '<img src="assets/images/blog/' . $image . '" alt="" style="width: 60px;">';
														      		}
														      		else { 
																		echo '<img src="assets/images/dummy.jpg" alt="" style="width: 60px;">';
														      		}
														      	?>
														      	</td>
														      <td class="text-center"><?php echo $name; ?></td>
														      <td class="text-center"><?php echo $title; ?></td>
														      <td class="text-center">
																<?php
																$catSql = "SELECT * FROM buy_category WHERE id='$cateId' AND status=1";
																$catQuery = mysqli_query($db, $catSql);

																while ($row = mysqli_fetch_assoc($catQuery)) {
																	$catid 		= $row['id'];
																	$is_parent 	= $row['is_parent'];
																	$name 		= $row['name'];
																?>
																<span class="badge text-bg-warning"><?php echo $name; ?></span>
																<?php
																}
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
														      				<a href="blog.php?do=Edit&editId=<?php echo $id; ?>" class="btn btn-outline-primary" style="margin: 0 15px;"><i class="fa-solid fa-pencil"></i> Edit</a> 

														      				<a href="" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#tId<?php echo $id; ?>"><i class="fa-regular fa-eye-slash"></i> Delete</a>
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
																      	<h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure to Delete <span style="color: red;"><?php echo $name; ?> </span>?</h1>																        
																      </div>
																      <div class="modal-footer justify-content-around">
																      	<ul>
																      		<li>
																      			<a href="blog.php?do=Delete&dData=<?php echo $id; ?>" class="btn btn-primary">Yes</a>
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
										<li class="breadcrumb-item active" aria-current="page">Add New Blog</li>
									</ol>
								</nav>
							</div>
							<!-- START: For Right Part -->
							<div class="ms-auto">
								<div class="btn-group">
									<div class="row row-cols-auto g-3">
										<div class="col">
											<a href="blog.php?do=Manage" class="btn btn-dark px-5">All Blogs</a>
										</div>									
									</div>
								</div>
							</div>
							<!-- END: For Right Part -->
						</div>
						<!--end breadcrumb-->

						<h6 class="mb-0 text-uppercase">Add New Blog</h6>
						<hr>
						<div class="card">
							<div class="card-body">
								<div class="border p-3 radius-10">
									<!-- START : FORM -->
									<form action="blog.php?do=Store" method="POST" enctype="multipart/form-data">
										<div class="row">
											<div class="col-lg-6">
												<div class="mb-3">
													<label>Title</label>
													<input type="text" name="title" class="form-control" required autocomplete="off" placeholder="title..">
												</div>

												<div class="mb-3">
													<label>Author Name</label>
													<input type="text" name="name" class="form-control" required autocomplete="off" placeholder="enter name">
												</div>

												<div class="mb-3">
													<label>Description</label>
													<textarea name="details" class="form-control" id="" cols="30" rows="3" autocomplete="off" placeholder="details.."></textarea>
												</div>
											</div>
											<div class="col-lg-6">

												<div class="mb-3">
													<label>Category Name</label>
													<select name="cateId" class="form-select" >
														<option>Please Select the Category</option>
														<?php
															$catSql = "SELECT * FROM buy_category WHERE status=1";
															$catQuery = mysqli_query($db, $catSql);

															while ($row = mysqli_fetch_assoc($catQuery)) {
																$id 	 = $row['id'];
																$name 	 = $row['name'];
															?>
																<option value="<?php echo $id ?>"> - <?php echo $name; ?></option>
															<?php
															}
														?>
													</select>
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
													<label for="">Image</label>
													<input type="file" class="form-control" name="image">
												</div>

												<div class="mb-3">
													<div class="d-grid gap-2">
														<input type="submit" name="addBlog" class="btn btn-dark px-5" value="Add New Blog">
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
						if ( isset($_POST['addBlog']) ) {

							$name 		= mysqli_real_escape_string($db, $_POST['name']);
							$cateId 	= mysqli_real_escape_string($db, $_POST['cateId']);
							$title 		= mysqli_real_escape_string($db, $_POST['title']);
							$details 	= mysqli_real_escape_string($db, $_POST['details']);
							$status 	= mysqli_real_escape_string($db, $_POST['status']);

							$image 		= mysqli_real_escape_string($db, $_FILES['image']['name']);
							$tmpImg 	= $_FILES['image']['tmp_name'];

							if ( !empty( $image ) ) {
								$img = rand(0, 999999) . "_" . $image;
								move_uploaded_file($tmpImg, 'assets/images/blog/' . $img);
							}
							else {
								$img = "";
							}

							$addRole = "INSERT INTO blog ( name, cateId, title, details, image, status, join_date ) VALUES ( '$name', '$cateId', '$title', '$details', '$img', '$status', now() )";
							$roleQuery = mysqli_query ( $db, $addRole );

							if ( $roleQuery ) {
							  	header( "Location: blog.php?do=Manage" );
							}  
							else {
								die( "Mysql Error." . mysqli_error($db) );
							}

						}
					}

					else if( $do == "Edit" ) {
						if ( isset($_GET['editId']) ) {
							$editIdStore = $_GET['editId'];
							$editSql = "SELECT * FROM blog WHERE id='$editIdStore'";
							$editQuery = mysqli_query( $db, $editSql );

							while ( $row = mysqli_fetch_assoc( $editQuery ) ) {
								$id  			= $row['id'];
				  				$name  			= $row['name'];
				  				$cateId  		= $row['cateId'];
				  				$title  		= $row['title'];
				  				$details  		= $row['details'];
				  				$image  		= $row['image'];
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
												<li class="breadcrumb-item active" aria-current="page">Edit Blog</li>
											</ol>
										</nav>
									</div>
									<!-- START: For Right Part -->
									<div class="ms-auto">
										<div class="btn-group">
											<div class="row row-cols-auto g-3">
												<div class="col">
													<a href="blog.php?do=Manage" class="btn btn-dark px-5">All Blogs</a>
												</div>
												<div class="col">
													<a href="blog.php?do=Add" class="btn btn-primary px-5">Add New Blog</a>
												</div>									
											</div>
										</div>
									</div>
									<!-- END: For Right Part -->
								</div>
								<!--end breadcrumb-->

								<h6 class="mb-0 text-uppercase">Edit Blog</h6>
								<hr>
								<div class="card">
									<div class="card-body">
										<div class="border p-3 radius-10">
											<!-- START : FORM -->
									<form action="blog.php?do=Update" method="POST" enctype="multipart/form-data">
										<div class="row">
											<div class="col-lg-6">
												<div class="mb-3">
													<label>Title</label>
													<input type="text" name="title" class="form-control" required autocomplete="off" placeholder="title.." value="<?php echo $title; ?>">
												</div>

												<div class="mb-3">
													<label>Author Name</label>
													<input type="text" name="name" class="form-control" required autocomplete="off" placeholder="enter name"value="<?php echo $name; ?>">
												</div>

												<div class="mb-3">
													<label>Description</label>
													<textarea name="details" class="form-control" id="" cols="30" rows="3" required autocomplete="off" placeholder="details.."><?php echo $details; ?></textarea>
												</div>
											</div>
											<div class="col-lg-6">

												<div class="mb-3">
													<label>Category Name</label>
													<select class="form-select" name="cateId">
														<option>Please Select the Category</option>
														<?php
														$catSql = "SELECT * FROM buy_category WHERE status=1";
														$catQuery = mysqli_query($db, $catSql);

														while ($row = mysqli_fetch_assoc($catQuery)) {
															$catid 		= $row['id'];
															$is_parent 	= $row['is_parent'];
															$name 		= $row['name'];
														?>
															<option value="<?php echo $catid ?>" <?php if ($cateId == $catid) {
															echo "selected";
															} ?>> - <?php echo $name; ?></option>
														<?php
														}
														?>
													</select>
												</div>
												
												<div class="mb-3">
													<label>Status</label>
													<select name="status" class="form-select">
														<option value="1" <?php if( $status == 1 ) { echo "selected"; } ?>>Active</option>
														<option value="0" <?php if( $status == 0 ) { echo "selected"; } ?>>InActive</option>
													</select>
												</div>

												<div class="mb-3">
													<label for="">Image</label>
													<br><br>
													<?php 
											      		if ( !empty( $image ) ) {
															echo '<img src="assets/images/blog/' . $image . '" alt="" style="width: 100%;">';
											      		}
											      		else { 
															echo '<img src="assets/images/dummy.jpg" alt="" style="width: 100%;">';
											      		}
											      	?>
													<br><br>
													<input type="file" class="form-control" name="image">
												</div>

												<div class="mb-3">
													<div class="d-grid gap-2">
														<input type="hidden" name="updateId" value="<?php echo $id; ?>">
														<input type="submit" name="updateRole" class="btn btn-dark px-5" value="Update Blog Information">
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
							$cateId 		= mysqli_real_escape_string($db, $_POST['cateId']);
							$title 			= mysqli_real_escape_string($db, $_POST['title']);
							$details 		= mysqli_real_escape_string($db, $_POST['details']);
							$status 		= mysqli_real_escape_string($db, $_POST['status']);

							$image 			= mysqli_real_escape_string($db, $_FILES['image']['name']);
							$tmpImg 		= $_FILES['image']['tmp_name'];

							$oldImgSql = "SELECT * FROM blog WHERE id='$updateId'";
							$oldIMgQuery = mysqli_query( $db, $oldImgSql );

							while ( $row = mysqli_fetch_assoc($oldIMgQuery) ){
								$oldImg = $row['image'];
								unlink("assets/images/blog/$img" . $oldImg);
							} 
							$img = rand(0, 999999) . "_" . $image;
							move_uploaded_file($tmpImg, 'assets/images/blog/' . $img);

							$updateRoleSql = "UPDATE blog SET name='$name', cateId='$cateId', title='$title', details='$details', image='$img', status='$status', join_date=now() WHERE id='$updateId'";
							$updateRoleQuery = mysqli_query( $db, $updateRoleSql );

							if ($updateRoleQuery) {
								header("Location: blog.php?do=Manage");
							}
							else {
								die ( "Mysqli Error." . mysqli_error($db) );
							}				

							

						}
					}

					else if( $do == "Delete" ) {
						if (isset($_GET['dData'])) {
							$deleteData = $_GET['dData'];
							$deleteSQL = "DELETE FROM blog WHERE id='$deleteData' ";
							$deleteQuery = mysqli_query($db, $deleteSQL);

							if ($deleteQuery) {
								header("Location: blog.php?do=Manage");
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