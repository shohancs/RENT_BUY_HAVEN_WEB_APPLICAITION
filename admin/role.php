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
										<li class="breadcrumb-item active" aria-current="page">All Role list</li>
									</ol>
								</nav>
							</div>
							<!-- START: For Right Part -->
							<div class="ms-auto">
								<div class="btn-group">
									<div class="row row-cols-auto g-3">
										<div class="col">
											<a href="role.php?do=Add" class="btn btn-dark px-5">Add New Role</a>
										</div>
										<div class="col">
											<a href="role.php?do=ManageTrash" class="btn btn-danger px-5">Trash</a>
										</div>									
									</div>
								</div>
							</div>
							<!-- END: For Right Part -->
						</div>
						<!--end breadcrumb-->

						<h6 class="mb-0 text-uppercase">ALL Role LIST</h6>
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

										  		$roleSql = "SELECT * FROM role WHERE status = 1 ORDER BY name ASC";
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
														      <td class="text-center"><?php echo $join_date; ?></td>
														      <td class="text-center">
														      	<div class="action-btn">
														      		<ul>
														      			<li>
														      				<a href="role.php?do=Edit&editId=<?php echo $id; ?>" class="btn btn-outline-primary" style="margin: 0 15px;"><i class="fa-solid fa-pencil"></i> Edit</a> 
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
																      	<h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure to disable <span style="color: red;"><?php echo $name; ?> </span>?</h1>																        
																      </div>
																      <div class="modal-footer justify-content-around">
																      	<ul>
																      		<li>
																      			<a href="role.php?do=Trash&tData=<?php echo $id; ?>" class="btn btn-primary">Yes</a>
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

					else if ( $do == "AdminManage" ) { ?>
						<!--breadcrumb-->
						<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
							<div class="breadcrumb-title pe-3">Manage</div>
							<div class="ps-3">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb mb-0 p-0">
										<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">All Super Admin Role list</li>
									</ol>
								</nav>
							</div>
							<!-- START: For Right Part -->
							<div class="ms-auto">
								<div class="btn-group">
									<div class="row row-cols-auto g-3">
										<div class="col">
											<a href="role.php?do=Add" class="btn btn-dark px-5">Add New Super Admin</a>
										</div>
										<div class="col">
											<a href="role.php?do=ManageTrash" class="btn btn-danger px-5">Trash</a>
										</div>									
									</div>
								</div>
							</div>
							<!-- END: For Right Part -->
						</div>
						<!--end breadcrumb-->

						<h6 class="mb-0 text-uppercase">ALL Super Admin Role LIST</h6>
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

										  		$roleSql = "SELECT * FROM role WHERE status = 1 AND role=1 ORDER BY name ASC";
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
														      <td class="text-center"><?php echo $join_date; ?></td>
														      <td class="text-center">
														      	<div class="action-btn">
														      		<ul>
														      			<li>
														      				<a href="role.php?do=Edit&editId=<?php echo $id; ?>" class="btn btn-outline-primary" style="margin: 0 15px;"><i class="fa-solid fa-pencil"></i> Edit</a> 
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
																      	<h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure to disable <span style="color: red;"><?php echo $name; ?> </span>?</h1>																        
																      </div>
																      <div class="modal-footer justify-content-around">
																      	<ul>
																      		<li>
																      			<a href="role.php?do=Trash&tData=<?php echo $id; ?>" class="btn btn-primary">Yes</a>
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

					else if ( $do == "fieldManage" ) { ?>
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
							<!-- START: For Right Part -->
							<div class="ms-auto">
								<div class="btn-group">
									<div class="row row-cols-auto g-3">
										<div class="col">
											<a href="role.php?do=Add" class="btn btn-dark px-5">Add New Role</a>
										</div>
										<div class="col">
											<a href="role.php?do=ManageTrash" class="btn btn-danger px-5">Trash</a>
										</div>									
									</div>
								</div>
							</div>
							<!-- END: For Right Part -->
						</div>
						<!--end breadcrumb-->

						<h6 class="mb-0 text-uppercase">ALL Role LIST</h6>
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

										  		$roleSql = "SELECT * FROM role WHERE status = 1 AND role=2 ORDER BY name ASC";
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
														      <td class="text-center"><?php echo $join_date; ?></td>
														      <td class="text-center">
														      	<div class="action-btn">
														      		<ul>
														      			<li>
														      				<a href="role.php?do=Edit&editId=<?php echo $id; ?>" class="btn btn-outline-primary" style="margin: 0 15px;"><i class="fa-solid fa-pencil"></i> Edit</a> 
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
																      	<h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure to disable <span style="color: red;"><?php echo $name; ?> </span>?</h1>																        
																      </div>
																      <div class="modal-footer justify-content-around">
																      	<ul>
																      		<li>
																      			<a href="role.php?do=Trash&tData=<?php echo $id; ?>" class="btn btn-primary">Yes</a>
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

					else if ( $do == "userManage" ) { ?>
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
							<!-- START: For Right Part -->
							<div class="ms-auto">
								<div class="btn-group">
									<div class="row row-cols-auto g-3">
										<div class="col">
											<a href="role.php?do=Add" class="btn btn-dark px-5">Add New Role</a>
										</div>
										<div class="col">
											<a href="role.php?do=ManageTrash" class="btn btn-danger px-5">Trash</a>
										</div>									
									</div>
								</div>
							</div>
							<!-- END: For Right Part -->
						</div>
						<!--end breadcrumb-->

						<h6 class="mb-0 text-uppercase">ALL Role LIST</h6>
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

										  		$roleSql = "SELECT * FROM role WHERE status = 1 AND role=3 ORDER BY name ASC";
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
														      <td class="text-center"><?php echo $join_date; ?></td>
														      <td class="text-center">
														      	<div class="action-btn">
														      		<ul>
														      			<li>
														      				<a href="role.php?do=Edit&editId=<?php echo $id; ?>" class="btn btn-outline-primary" style="margin: 0 15px;"><i class="fa-solid fa-pencil"></i> Edit</a> 
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
																      	<h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure to disable <span style="color: red;"><?php echo $name; ?> </span>?</h1>																        
																      </div>
																      <div class="modal-footer justify-content-around">
																      	<ul>
																      		<li>
																      			<a href="role.php?do=Trash&tData=<?php echo $id; ?>" class="btn btn-primary">Yes</a>
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

					else if ( $do == "sellerManage" ) { ?>
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
							<!-- START: For Right Part -->
							<div class="ms-auto">
								<div class="btn-group">
									<div class="row row-cols-auto g-3">
										<div class="col">
											<a href="role.php?do=Add" class="btn btn-dark px-5">Add New Role</a>
										</div>
										<div class="col">
											<a href="role.php?do=ManageTrash" class="btn btn-danger px-5">Trash</a>
										</div>									
									</div>
								</div>
							</div>
							<!-- END: For Right Part -->
						</div>
						<!--end breadcrumb-->

						<h6 class="mb-0 text-uppercase">ALL Role LIST</h6>
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

										  		$roleSql = "SELECT * FROM role WHERE status = 1 AND role=4 ORDER BY name ASC";
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
														      <td class="text-center"><?php echo $join_date; ?></td>
														      <td class="text-center">
														      	<div class="action-btn">
														      		<ul>
														      			<li>
														      				<a href="role.php?do=Edit&editId=<?php echo $id; ?>" class="btn btn-outline-primary" style="margin: 0 15px;"><i class="fa-solid fa-pencil"></i> Edit</a> 
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
																      	<h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure to disable <span style="color: red;"><?php echo $name; ?> </span>?</h1>																        
																      </div>
																      <div class="modal-footer justify-content-around">
																      	<ul>
																      		<li>
																      			<a href="role.php?do=Trash&tData=<?php echo $id; ?>" class="btn btn-primary">Yes</a>
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
										<li class="breadcrumb-item active" aria-current="page">Add New Role</li>
									</ol>
								</nav>
							</div>
							<!-- START: For Right Part -->
							<div class="ms-auto">
								<div class="btn-group">
									<div class="row row-cols-auto g-3">
										<div class="col">
											<a href="role.php?do=Manage" class="btn btn-dark px-5">All Role</a>
										</div>
										<div class="col">
											<a href="role.php?do=ManageTrash" class="btn btn-danger px-5">Trash</a>
										</div>									
									</div>
								</div>
							</div>
							<!-- END: For Right Part -->
						</div>
						<!--end breadcrumb-->

						<h6 class="mb-0 text-uppercase">Add New Role</h6>
						<hr>
						<div class="card">
							<div class="card-body">
								<div class="border p-3 radius-10">
									<!-- START : FORM -->
									<form action="role.php?do=Store" method="POST" enctype="multipart/form-data">
										<div class="row">
											<div class="col-lg-6">
												<div class="mb-3">
													<label>Full Name</label>
													<input type="text" name="name" class="form-control" required autocomplete="off" placeholder="enter name..">
												</div>

												<div class="mb-3">
													<label>Email Address</label>
													<input type="email" name="email" class="form-control" required autocomplete="off" placeholder="enter email">
												</div>

												<div class="mb-3">
													<label>Phone No</label>
													<input type="tel" name="phone" class="form-control" required autocomplete="off" placeholder="+880 1....">
												</div>

												<div class="mb-3">
													<label>Password</label>
													<input type="password" name="password" class="form-control" required autocomplete="off" placeholder="**********">
												</div>
												<div class="mb-3">
													<label>Re-Password</label>
													<input type="password" name="repassword" class="form-control" required autocomplete="off" placeholder="**********">
												</div>

												<div class="mb-3">
													<label>Address</label>
													<textarea name="address" class="form-control" id="" cols="30" rows="3" required autocomplete="off" placeholder="address.."></textarea>
												</div>
											</div>
											<div class="col-lg-6">

												<div class="mb-3">
													<label>Manage Role</label>
													<select name="role" class="form-select">
														<option value="3">Please Select the role</option>
														<option value="1">Admin</option>
														<option value="2">Field Checker</option>
														<option value="3">User</option>
														<option value="4">Seller</option>
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
													<label for="">Nid Card</label>
													<input type="file" class="form-control" name="nid">
												</div>

												<div class="mb-3">
													<div class="d-grid gap-2">
														<input type="submit" name="addRole" class="btn btn-dark px-5" value="Add New Role">
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
						if ( isset($_POST['addRole']) ) {

							$name 		= mysqli_real_escape_string($db, $_POST['name']);
							$email 		= mysqli_real_escape_string($db, $_POST['email']);
							$phone 		= mysqli_real_escape_string($db, $_POST['phone']);
							$address 	= mysqli_real_escape_string($db, $_POST['address']);
							$password 	= mysqli_real_escape_string($db, $_POST['password']);
							$repassword	= mysqli_real_escape_string($db, $_POST['repassword']);
							$role 		= mysqli_real_escape_string($db, $_POST['role']);
							$status 	= mysqli_real_escape_string($db, $_POST['status']);

							if ( $password == $repassword ) {
								$hassedPass = sha1($password);

								$image 		= mysqli_real_escape_string($db, $_FILES['image']['name']);
								$tmpImg 	= $_FILES['image']['tmp_name'];

								if ( !empty( $image ) ) {
									$img = rand(0, 999999) . "_" . $image;
									move_uploaded_file($tmpImg, 'assets/images/role/' . $img);
								}
								else {
									$img = "";
								}

								$nid 		= mysqli_real_escape_string($db, $_FILES['nid']['name']);
								$tmpNidImg 	= $_FILES['nid']['tmp_name'];

								if ( !empty( $nid ) ) {
									$nidImg = rand(0, 999999) . "_" . $nid;
									move_uploaded_file($tmpNidImg, 'assets/images/role/nid/' . $nidImg);
								}
								else {
									$nidImg = "";
								}

								$addRole = "INSERT INTO role ( name, email, phone, address, password, role, image, nid, status, join_date ) VALUES ( '$name', '$email', '$phone', '$address', '$hassedPass', '$role', '$img', '$nidImg', '$status', now() )";
								$roleQuery = mysqli_query ( $db, $addRole );

								if ( $roleQuery ) {
								  	header( "Location: role.php?do=Manage" );
								}  
								else {
									die( "Mysql Error." . mysqli_error($db) );
								}
							}
							else { ?>
								<div class="alert alert-warning" role="alert">
								  Sorry! please password and repassword use same input.
								</div>
							<?php }

						

							



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
									<!-- START: For Right Part -->
									<div class="ms-auto">
										<div class="btn-group">
											<div class="row row-cols-auto g-3">
												<div class="col">
													<a href="role.php?do=Manage" class="btn btn-dark px-5">All Role Manage</a>
												</div>
												<div class="col">
													<a href="role.php?do=Add" class="btn btn-primary px-5">Add New Role</a>
												</div>
												<div class="col">
													<a href="role.php?do=ManageTrash" class="btn btn-danger px-5">Trash</a>
												</div>									
											</div>
										</div>
									</div>
									<!-- END: For Right Part -->
								</div>
								<!--end breadcrumb-->

								<h6 class="mb-0 text-uppercase">Edit Role Info</h6>
								<hr>
								<div class="card">
									<div class="card-body">
										<div class="border p-3 radius-10">
											<!-- START : FORM -->
									<form action="role.php?do=Update" method="POST" enctype="multipart/form-data">
										<div class="row">
											<div class="col-lg-6">
												<div class="mb-3">
													<label>Full Name</label>
													<input type="text" name="name" class="form-control" required autocomplete="off" placeholder="enter name.." value="<?php echo $name; ?>">
												</div>

												<div class="mb-3">
													<label>Email Address</label>
													<input type="email" name="email" class="form-control" required autocomplete="off" placeholder="enter email"value="<?php echo $email; ?>">
												</div>

												<div class="mb-3">
													<label>Phone No</label>
													<input type="tel" name="phone" class="form-control" required autocomplete="off" placeholder="+880 1...." value="<?php echo $phone; ?>">
												</div>

												<div class="mb-3">
													<label>Password</label>
													<input type="password" name="password" class="form-control" placeholder="**********">
												</div>
												<div class="mb-3">
													<label>Re-Password</label>
													<input type="password" name="repassword" class="form-control" placeholder="**********">
												</div>

												<div class="mb-3">
													<label>Address</label>
													<textarea name="address" class="form-control" id="" cols="30" rows="3" required autocomplete="off" placeholder="address.."><?php echo $address; ?></textarea>
												</div>
											</div>
											<div class="col-lg-6">

												<div class="mb-3">
													<label>Manage Role</label>
													<select name="role" class="form-select">
														<option >Please Select the role</option>
														<option value="1" <?php if( $role == 1 ) { echo "selected"; } ?>>Admin</option>
														<option value="2" <?php if( $role == 2 ) { echo "selected"; } ?>>Field Checker</option>
														<option value="3" <?php if( $role == 3 ) { echo "selected"; } ?>>User</option>
														<option value="4" <?php if( $role == 4 ) { echo "selected"; } ?>>Seller</option>
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
															echo '<img src="assets/images/role/' . $image . '" alt="" style="width: 100%;">';
											      		}
											      		else { 
															echo '<img src="assets/images/dummy.jpg" alt="" style="width: 100%;">';
											      		}
											      	?>
													<br><br>
													<input type="file" class="form-control" name="image">
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
													<input type="file" class="form-control" name="nid">
												</div>

												<div class="mb-3">
													<div class="d-grid gap-2">
														<input type="hidden" name="updateId" value="<?php echo $id; ?>">
														<input type="submit" name="updateRole" class="btn btn-dark px-5" value="Update Role Info">
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
										header("Location: role.php?do=Manage");
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
										header("Location: role.php?do=Manage");
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
										header("Location: role.php?do=Manage");
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
									header("Location: role.php?do=Manage");
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
									header("Location: role.php?do=Manage");
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
									header("Location: role.php?do=Manage");
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
										header("Location: role.php?do=Manage");
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
									header("Location: role.php?do=Manage");
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

					else if( $do == "Trash" ) {
						if (isset($_GET['tData'])) {
							$trashId = $_GET['tData'];
							$trashSql = "UPDATE role SET status=0 WHERE id='$trashId'";
							$trashQuery = mysqli_query($db, $trashSql);

							if ($trashQuery) {
								header("Location: role.php?do=Manage");
							}
							else {
								die("MySql Error." . mysqli_error($db));
							}
						}
					}

					else if( $do == "ManageTrash" ) { ?>
						<!--breadcrumb-->
						<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
							<div class="breadcrumb-title pe-3">Manage Role Trash</div>
							<div class="ps-3">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb mb-0 p-0">
										<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">Trash Role list</li>
									</ol>
								</nav>
							</div>
							<!-- START: For Right Part -->
							<div class="ms-auto">
								<div class="btn-group">
									<div class="row row-cols-auto g-3">
										<div class="col">
											<a href="role.php?do=Manage" class="btn btn-primary px-5">Manage All Role</a>
										</div>
										<div class="col">
											<a href="role.php?do=Add" class="btn btn-dark px-5">Add New Role</a>
										</div>									
									</div>
								</div>
							</div>
							<!-- END: For Right Part -->
						</div>
						<!--end breadcrumb-->

						<h6 class="mb-0 text-uppercase">TRASH ROLE LIST</h6>
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

										  		$categoryRentSql = "SELECT * FROM role WHERE status = 0 ORDER BY name ASC";
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
														      				<a href="role.php?do=Edit&editId=<?php echo $id; ?>" class="btn btn-outline-primary"><i class="fa-solid fa-pencil"></i> Edit</a> 
														      				<a href="role.php?do=ManageActive&activeId=<?php echo $id; ?>" class="btn btn-outline-success" style="margin: 0 15px;"><i class="fa-solid fa-file-circle-check"></i> Active</a> 
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
																      	<h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure to Delete <span style="color: red;"><?php echo $name; ?> </span>Role?</h1>																        
																      </div>
																      <div class="modal-footer justify-content-around">
																      	<ul>
																      		<li>
																      			<a href="role.php?do=Delete&dData=<?php echo $id; ?>" class="btn btn-primary">Yes</a>
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
							$activeSql = "UPDATE role SET status=1 WHERE id='$acId'";
							$activeQuery = mysqli_query($db, $activeSql);

							if ($activeQuery) {
								header("Location: role.php?do=Manage");
							}
							else {
								die("Mysqli_Error" . mysqli_error($db));
							}
						}
					}

					else if( $do == "Delete" ) {
						if (isset($_GET['dData'])) {
							$deleteData = $_GET['dData'];
							$deleteSQL = "DELETE FROM role WHERE id='$deleteData' ";
							$deleteQuery = mysqli_query($db, $deleteSQL);

							if ($deleteQuery) {
								header("Location: role.php?do=ManageTrash");
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