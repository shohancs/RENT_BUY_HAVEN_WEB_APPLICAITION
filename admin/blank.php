<?php include "inc/header.php"; ?>

	<!--wrapper-->
	<div class="wrapper">

		<?php include "inc/leftmenu.php"; ?>
		<?php include "inc/topbar.php"; ?>

		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">

				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Manage</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">All Category list</li>
							</ol>
						</nav>
					</div>
					<!-- START: For Right Part -->
					<div class="ms-auto">
						<div class="btn-group">
							<div class="row row-cols-auto g-3">
								<div class="col">
									<a href="category.php?do=Add" class="btn btn-dark px-5">Add New Category</a>
								</div>
								<div class="col">
									<button type="button" class="btn btn-danger px-5">Trash</button>
								</div>									
							</div>
						</div>
					</div>
					<!-- END: For Right Part -->
				</div>
				<!--end breadcrumb-->

				<h6 class="mb-0 text-uppercase">Blank Page</h6>
				<hr>
				<div class="card">
					<div class="card-body">
						<div class="border p-3 radius-10">
							<!-- START: DATATABLE -->
						<?php  

							function createSlug($categoryName) {
							    // Convert to lowercase
							    $slug = strtolower($categoryName);
							    
							    // Remove special characters
							    $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);
							    
							    // Replace multiple spaces or hyphens with a single hyphen
							    $slug = preg_replace('/[\s-]+/', ' ', $slug);
							    
							    // Replace spaces with hyphens
							    $slug = preg_replace('/\s/', '-', $slug);
							    
							    // Trim leading and trailing hyphens
							    $slug = trim($slug, '-');
							    
							    return $slug;
							}

							// Example usage
							$categoryName = "Shohanur Rahman Shohan";
							$slug = createSlug($categoryName);
							echo $slug; // Output: category-name-example



						?>
						<!-- END: DATATABLE -->		
						</div>										
					</div>
				</div>

			</div>
		</div>
		<!--end page wrapper -->

<?php include "inc/footer.php"; ?>