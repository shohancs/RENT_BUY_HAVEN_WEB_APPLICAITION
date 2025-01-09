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
								<li class="breadcrumb-item active" aria-current="page">All Buy Sub Category list</li>
							</ol>
						</nav>
					</div>
					<!-- START: For Right Part -->
					<div class="ms-auto">
						<div class="btn-group">
							<div class="row row-cols-auto g-3">
								<div class="col">
									<a href="buySubCategory.php?do=Add" class="btn btn-dark px-5">Add New Buy Sub Category</a>
								</div>
								<div class="col">
									<a href="buySubCategory.php?do=ManageTrash" class="btn btn-danger px-5">Trash</a>
								</div>
							</div>
						</div>
					</div>
					<!-- END: For Right Part -->
				</div>
				<!--end breadcrumb-->

				<h6 class="mb-0 text-uppercase">ALL RENT SUB CATEGORY LIST</h6>
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
										$rentcategorySql = "SELECT * FROM buy_category WHERE status = 1 ORDER BY name ASC";
										$rentcategoryQuery = mysqli_query($db, $rentcategorySql);

										while ($row = mysqli_fetch_assoc($rentcategoryQuery)) {
											$cat_id  		= $row['id'];
											$cat_name  		= $row['name'];

											$childSql = "SELECT * FROM buy_subcategory WHERE is_parent ='$cat_id' AND status=1 ORDER BY subcat_name ASC";
											$childQuery = mysqli_query($db, $childSql);
											$i = 0;
											$childSqlCount = mysqli_num_rows($childQuery);

											

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
													<td class="text-center">
														<?php
														if (!empty($img_one)) {
															echo '<img src="assets/images/buy_subcategory/' . $img_one . '" alt="" style="width: 60px;">';
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
																	<a href="buySubCategory.php?do=Edit&editId=<?php echo $sub_id; ?>" class="btn btn-outline-primary"><i class="fa-solid fa-pencil"></i> Edit</a>
																	<a href="buySubCategory.php&viewId=<?php echo $sub_id; ?>" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#vId<?php echo $sub_id; ?>"><i class="fa-regular fa-eye"></i> View</a>
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
																				<a href="buySubCategory.php?do=Trash&tData=<?php echo $sub_id; ?>" class="btn btn-primary">Yes</a>
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
																							<form action="" method="POST" enctype="multipart/form-data" style="text-align: left;">
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
																		                                        <label>Division</label>
																		                                        <select class="form-select" name="division">
																		                                          <option>Select the Division</option>
																		                                          <?php  
																		                                            $sql = "SELECT * FROM buy_division WHERE status=1 ORDER BY priority ASC";
																		                                            $query = mysqli_query($db, $sql);

																		                                            while ( $row = mysqli_fetch_assoc($query) ) {
																		                                              $id       = $row['id'];
																		                                                $name       = $row['name'];
																		                                                $priority     = $row['priority'];
																		                                                $status     = $row['status'];
																		                                                ?>
																		                                                  
																		                                                <option value="<?php echo $id; ?>" <?php if ( $id == $division_id ) {
																		                                                  echo "selected";
																		                                                } ?>><?php echo $name; ?></option>
																		                                                <?php
																		                                            }
																		                                          ?>
																		                                          
																		                                        </select>
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-6">
																		                                      <div class="mb-3">
																		                                        <label>District</label>
																		                                        <input type="text" name="district" class="form-control"  autocomplete="off" placeholder="enter district.." value="<?php echo $district; ?>">
																		                                      </div>
																		                                    </div>
																		                                </div>
																		                                  <div class="mb-3">
																		                                    <label>House Number & Location</label>
																		                                    <input type="text" name="location" class="form-control"  autocomplete="off" placeholder="enter area location.." value="<?php echo $location; ?>">
																		                                  </div>

																										<div class="row">
																											<div class="col-lg-6">
																												<div class="mb-3">
																													<label>Category Name</label>
																													<select class="form-select" name="is_parent">
																														<option>Please Select the Category</option>
																														<?php
																														$catSql = "SELECT * FROM buy_category WHERE status=1";
																														$catQuery = mysqli_query($db, $catSql);

																														while ($row = mysqli_fetch_assoc($catQuery)) {
																															$cat_id = $row['id'];
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
																		                                        <input type="number" name="price" class="form-control"  autocomplete="off" placeholder="enter price.." value="<?php echo $price; ?>">
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-2">
																		                                      <div class="mb-3">
																		                                        <label>Bed</label>
																		                                        <input type="number" name="bed" class="form-control"  autocomplete="off" placeholder="enter number of bed.." value="<?php echo $bed; ?>">
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-2">
																		                                      <div class="mb-3">
																		                                        <label>Kitchen</label>
																		                                        <input type="number" name="kitchen" class="form-control"  autocomplete="off" placeholder="enter number of kitchen.." value="<?php echo $kitchen; ?>">
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-2">
																		                                      <div class="mb-3">
																		                                        <label>Drawing</label>
																		                                        <input type="number" name="drawing" class="form-control"  autocomplete="off" placeholder="drawing.." value="<?php echo $drwaing; ?>">
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-2">
																		                                      <div class="mb-3">
																		                                        <label>Dinning</label>
																		                                        <input type="number" name="dinning" class="form-control"  autocomplete="off" placeholder="enter number of dinning.." value="<?php echo $dinning; ?>">
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-2">
																		                                      <div class="mb-3">
																		                                        <label>Balcony</label>
																		                                        <input type="number" name="balcony" class="form-control"  autocomplete="off" placeholder="enter number of balcony.." value="<?php echo $balcony; ?>">
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-2">
																		                                      <div class="mb-3">
																		                                        <label>Garage</label>
																		                                        <input type="number" name="garage" class="form-control"  autocomplete="off" placeholder="enter number of garage.." value="<?php echo $garage; ?>">
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-3">
																		                                      <div class="mb-3">
																		                                        <label>Bathroom</label>
																		                                        <input type="number" name="washroom" class="form-control"  autocomplete="off" placeholder="enter number of washroom.." value="<?php echo $washroom; ?>">
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-3">
																		                                      <div class="mb-3">
																		                                        <label>Total Room</label>
																		                                        <input type="number" name="totalRoom" class="form-control"  autocomplete="off" placeholder="enter number of total room.." value="<?php echo $totalroom; ?>">
																		                                      </div>
																		                                    </div>

																		                                    <div class="col-lg-3">
																		                                      <div class="mb-3">
																		                                        <label>Area Size <sup>(Sq Ft)</sup></label>
																		                                        <input type="number" name="areaSize" class="form-control"  autocomplete="off" placeholder="enter size of area.." value="<?php echo $area_size; ?>">
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-3">
																		                                      <div class="mb-3">
																		                                        <label>Floor Number <sup>(1st->2nd->3rd..)</sup></label>
																		                                        <input type="number" name="floor" class="form-control"  autocomplete="off" placeholder="enter size of area.." value="<?php echo $floor; ?>">
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
														                                        <label>Decoration</label>
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
																		                                    <textarea name="sdesc" class="form-control" cols="30" rows="3" id="editor" placeholder="write short description..."><?php echo $short_desc; ?></textarea>
																		                                  </div>
																		                                  <div class="mb-3">
																		                                    <label>Long Description</label>
																		                                    <textarea name="ldesc" class="form-control" cols="30" rows="4" id="editor1" placeholder="write long description..."><?php echo $long_desc; ?></textarea>
																		                                  </div>
																		                                  <div class="mb-3">
																		                                    <label>Google Embed Map URL <sup>(iframe)</sup></label>
																		                                    <textarea name="map" rows="2" class="form-control"  placeholder="iframe url code"><?php echo $google_map; ?></textarea>
																		                                  </div>

																		                                  <div class="row">
																		                                    <div class="col-lg-6">
																		                                      <div class="mb-3">
																		                                        <label>Available on</label>
																		                                        <input type="date" name="available" class="form-control" value="<?php echo $availability; ?>">
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-6">
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
																		                                    </div>                      
																		                                  </div>

																		                                  <div class="mb-3">
																											<label>Owner Image</label>
																											<br><br>
																											<?php
																											if (!empty($ow_image)) {
																												echo '<img src="assets/images/owner/' . $ow_image . '" alt="" style="width: 100%;">';
																											} else {
																												echo '<h5>No Image Uploaded!!</h5>';
																											}
																											?>
																											<br><br>
																											<input type="file" class="form-control" name="ow_image">
																										</div>
																														

																										<div class="row">
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

			else if ($do == "fieldcheckManage") { ?>
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Manage</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Field Checker Buy Sub Category list</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->

				<h6 class="mb-0 text-uppercase">Field Checker Buy Sub Category list</h6>
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
										$rentcategorySql = "SELECT * FROM buy_category WHERE status = 1 ORDER BY name ASC";
										$rentcategoryQuery = mysqli_query($db, $rentcategorySql);

										while ($row = mysqli_fetch_assoc($rentcategoryQuery)) {
											$cat_id  		= $row['id'];
											$cat_name  		= $row['name'];

											$childSql = "SELECT * FROM buy_subcategory WHERE is_parent ='$cat_id' AND status NOT IN (1,2) ORDER BY sub_id DESC";
											$childQuery = mysqli_query($db, $childSql);
											$i = 0;
											$childSqlCount = mysqli_num_rows($childQuery);

											

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
				                              $katha    = $row['katha'];
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
				                              $buystatus       = $row['status'];
				                              $google_map   = $row['google_map'];
				                              $join_date    = $row['join_date'];
												$i++;
										?>
												<tr>
													<th scope="row" class="text-center"><?php echo $i; ?></th>
													<td class="text-center">
														<?php
														if (!empty($img_one)) {
															echo '<img src="assets/images/buy_subcategory/' . $img_one . '" alt="" style="width: 60px;">';
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
														if ($buystatus == 2) { ?>
															<span class="badge text-bg-info">Pending</span>
														<?php } 
														else if ($buystatus == 3) { ?>
															<span class="badge text-bg-warning">Approve</span>
														<?php }
														else if ($buystatus == 4) { ?>
															<span class="badge text-bg-danger">Decline</span>
														<?php }
														else if ($buystatus == 0) { ?>
															<span class="badge text-bg-danger">InActive</span>
														<?php }
														?>
													</td>
													<td class="text-center"><?php echo $join_date; ?></td>
													<td class="text-center">
														<div class="action-btn">
															<ul>
																<li>
																	<a href="buySubCategory.php?do=Edit&editId=<?php echo $sub_id; ?>" class="btn btn-outline-primary"><i class="fa-solid fa-pencil"></i> Edit</a>
																	<a href="buySubCategory.php&viewId=<?php echo $sub_id; ?>" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#vId<?php echo $sub_id; ?>"><i class="fa-regular fa-eye"></i> View</a>
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
																				<a href="buySubCategory.php?do=Trash&tData=<?php echo $sub_id; ?>" class="btn btn-primary">Yes</a>
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
									<form action="" method="POST" enctype="multipart/form-data" style="text-align: left;">
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
				                                        <label>Division</label>
				                                        <select class="form-select" name="division">
				                                          <option>Select the Division</option>
				                                          <?php  
				                                            $sql = "SELECT * FROM buy_division WHERE status=1 ORDER BY priority ASC";
				                                            $query = mysqli_query($db, $sql);

				                                            while ( $row = mysqli_fetch_assoc($query) ) {
				                                              $id       = $row['id'];
				                                                $name       = $row['name'];
				                                                $priority     = $row['priority'];
				                                                $status     = $row['status'];
				                                                ?>
				                                                  
				                                                <option value="<?php echo $id; ?>" <?php if ( $id == $division_id ) {
				                                                  echo "selected";
				                                                } ?>><?php echo $name; ?></option>
				                                                <?php
				                                            }
				                                          ?>
				                                          
				                                        </select>
				                                      </div>
				                                    </div>
				                                    <div class="col-lg-6">
				                                      <div class="mb-3">
				                                        <label>District</label>
				                                        <input type="text" name="district" class="form-control"  autocomplete="off" placeholder="enter district.." value="<?php echo $district; ?>">
				                                      </div>
				                                    </div>
				                                </div>
				                                  <div class="mb-3">
				                                    <label>House Number & Location</label>
				                                    <input type="text" name="location" class="form-control"  autocomplete="off" placeholder="enter area location.." value="<?php echo $location; ?>">
				                                  </div>

												<div class="row">
													<div class="col-lg-6">
														<div class="mb-3">
															<label>Category Name</label>
															<select class="form-select" name="is_parent">
																<option>Please Select the Category</option>
																<?php
																$catSql = "SELECT * FROM buy_category WHERE status=1";
																$catQuery = mysqli_query($db, $catSql);

																while ($row = mysqli_fetch_assoc($catQuery)) {
																	$cat_id = $row['id'];
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
				                                        <input type="number" name="price" class="form-control"  autocomplete="off" placeholder="enter price.." value="<?php echo $price; ?>">
				                                      </div>
				                                    </div>
				                                    <div class="col-lg-2">
				                                      <div class="mb-3">
				                                        <label>Bed</label>
				                                        <input type="number" name="bed" class="form-control"  autocomplete="off" placeholder="enter number of bed.." value="<?php echo $bed; ?>">
				                                      </div>
				                                    </div>
				                                    <div class="col-lg-2">
				                                      <div class="mb-3">
				                                        <label>Kitchen</label>
				                                        <input type="number" name="kitchen" class="form-control"  autocomplete="off" placeholder="enter number of kitchen.." value="<?php echo $kitchen; ?>">
				                                      </div>
				                                    </div>
				                                    <div class="col-lg-2">
				                                      <div class="mb-3">
				                                        <label>Drawing</label>
				                                        <input type="number" name="drawing" class="form-control"  autocomplete="off" placeholder="drawing.." value="<?php echo $drwaing; ?>">
				                                      </div>
				                                    </div>
				                                    <div class="col-lg-2">
				                                      <div class="mb-3">
				                                        <label>Dinning</label>
				                                        <input type="number" name="dinning" class="form-control"  autocomplete="off" placeholder="enter number of dinning.." value="<?php echo $dinning; ?>">
				                                      </div>
				                                    </div>
				                                    <div class="col-lg-2">
				                                      <div class="mb-3">
				                                        <label>Balcony</label>
				                                        <input type="number" name="balcony" class="form-control"  autocomplete="off" placeholder="enter number of balcony.." value="<?php echo $balcony; ?>">
				                                      </div>
				                                    </div>
				                                    <div class="col-lg-2">
				                                      <div class="mb-3">
				                                        <label>Garage</label>
				                                        <input type="number" name="garage" class="form-control"  autocomplete="off" placeholder="enter number of garage.." value="<?php echo $garage; ?>">
				                                      </div>
				                                    </div>
				                                    <div class="col-lg-3">
				                                      <div class="mb-3">
				                                        <label>Bathroom</label>
				                                        <input type="number" name="washroom" class="form-control"  autocomplete="off" placeholder="enter number of washroom.." value="<?php echo $washroom; ?>">
				                                      </div>
				                                    </div>
				                                    <div class="col-lg-3">
				                                      <div class="mb-3">
				                                        <label>Total Room</label>
				                                        <input type="number" name="totalRoom" class="form-control"  autocomplete="off" placeholder="enter number of total room.." value="<?php echo $totalroom; ?>">
				                                      </div>
				                                    </div>

				                                    <div class="col-lg-3">
				                                      <div class="mb-3">
				                                        <label>Area Size <sup>(Sq Ft)</sup></label>
				                                        <input type="number" name="areaSize" class="form-control"  autocomplete="off" placeholder="enter size of area.." value="<?php echo $area_size; ?>">
				                                      </div>
				                                    </div>
				                                    <div class="col-lg-3">
				                                      <div class="mb-3">
				                                        <label>Floor Number <sup>(1st->2nd->3rd..)</sup></label>
				                                        <input type="number" name="floor" class="form-control"  autocomplete="off" placeholder="enter size of area.." value="<?php echo $floor; ?>">
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
                                        <label>Decoration</label>
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
				                                    <textarea name="sdesc" class="form-control" cols="30" rows="3" id="editor" placeholder="write short description..."><?php echo $short_desc; ?></textarea>
				                                  </div>
				                                  <div class="mb-3">
				                                    <label>Long Description</label>
				                                    <textarea name="ldesc" class="form-control" cols="30" rows="4" id="editor1" placeholder="write long description..."><?php echo $long_desc; ?></textarea>
				                                  </div>
				                                  <div class="mb-3">
				                                    <label>Google Embed Map URL <sup>(iframe)</sup></label>
				                                    <textarea name="map" rows="2" class="form-control"  placeholder="iframe url code"><?php echo $google_map; ?></textarea>
				                                  </div>

				                                  <div class="row">
				                                    <div class="col-lg-6">
				                                      <div class="mb-3">
				                                        <label>Available on</label>
				                                        <input type="date" name="available" class="form-control" value="<?php echo $availability; ?>">
				                                      </div>
				                                    </div>
				                                    <div class="col-lg-6">
				                                      <div class="mb-3">
														<label>Status</label>
														<select name="status" class="form-select">
															<option value="1" <?php if( $buystatus == 1 ) { echo "selected"; } ?>>Active</option>
															<option value="0" <?php if( $buystatus == 0 ) { echo "selected"; } ?>>InActive</option>
															<option value="2" <?php if( $buystatus == 2 ) { echo "selected"; } ?>>Pending</option>
															<option value="3" <?php if( $buystatus == 3 ) { echo "selected"; } ?>>Approve</option>
															<option value="4" <?php if( $buystatus == 4 ) { echo "selected"; } ?>>Decline</option>
														</select>
													</div>
				                                    </div>                      
				                                  </div>

				                                  <div class="mb-3">
													<label>Owner Image</label>
													<br><br>
													<?php
													if (!empty($ow_image)) {
														echo '<img src="assets/images/owner/' . $ow_image . '" alt="" style="width: 100%;">';
													} else {
														echo '<h5>No Image Uploaded!!</h5>';
													}
													?>
													<br><br>
													<input type="file" class="form-control" name="ow_image">
												</div>
																

												<div class="row">
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

			else if ($do == "sellercheckManage") { ?>
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Manage</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Seller Buy Sub Category list</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->

				<h6 class="mb-0 text-uppercase">Seller Buy Sub Category list</h6>
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
										$rentcategorySql = "SELECT * FROM buy_category WHERE status = 1 ORDER BY name ASC";
										$rentcategoryQuery = mysqli_query($db, $rentcategorySql);

										while ($row = mysqli_fetch_assoc($rentcategoryQuery)) {
											$cat_id  		= $row['id'];
											$cat_name  		= $row['name'];

											$childSql = "SELECT * FROM buy_subcategory WHERE is_parent ='$cat_id' AND status = 2 ORDER BY sub_id DESC";
											$childQuery = mysqli_query($db, $childSql);
											$i = 0;
											$childSqlCount = mysqli_num_rows($childQuery);

											

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
				                              $katha    = $row['katha'];
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
													<td class="text-center">
														<?php
														if (!empty($img_one)) {
															echo '<img src="assets/images/buy_subcategory/' . $img_one . '" alt="" style="width: 60px;">';
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
																	<a href="buySubCategory.php?do=Edit&editId=<?php echo $sub_id; ?>" class="btn btn-outline-primary"><i class="fa-solid fa-pencil"></i> Edit</a>
																	<a href="buySubCategory.php&viewId=<?php echo $sub_id; ?>" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#vId<?php echo $sub_id; ?>"><i class="fa-regular fa-eye"></i> View</a>
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
																				<a href="buySubCategory.php?do=Trash&tData=<?php echo $sub_id; ?>" class="btn btn-primary">Yes</a>
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
																							<form action="" method="POST" enctype="multipart/form-data" style="text-align: left;">
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
																		                                        <label>Division</label>
																		                                        <select class="form-select" name="division">
																		                                          <option>Select the Division</option>
																		                                          <?php  
																		                                            $sql = "SELECT * FROM buy_division WHERE status=1 ORDER BY priority ASC";
																		                                            $query = mysqli_query($db, $sql);

																		                                            while ( $row = mysqli_fetch_assoc($query) ) {
																		                                              $id       = $row['id'];
																		                                                $name       = $row['name'];
																		                                                $priority     = $row['priority'];
																		                                                $status     = $row['status'];
																		                                                ?>
																		                                                  
																		                                                <option value="<?php echo $id; ?>" <?php if ( $id == $division_id ) {
																		                                                  echo "selected";
																		                                                } ?>><?php echo $name; ?></option>
																		                                                <?php
																		                                            }
																		                                          ?>
																		                                          
																		                                        </select>
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-6">
																		                                      <div class="mb-3">
																		                                        <label>District</label>
																		                                        <input type="text" name="district" class="form-control"  autocomplete="off" placeholder="enter district.." value="<?php echo $district; ?>">
																		                                      </div>
																		                                    </div>
																		                                </div>
																		                                  <div class="mb-3">
																		                                    <label>House Number & Location</label>
																		                                    <input type="text" name="location" class="form-control"  autocomplete="off" placeholder="enter area location.." value="<?php echo $location; ?>">
																		                                  </div>

																										<div class="row">
																											<div class="col-lg-6">
																												<div class="mb-3">
																													<label>Category Name</label>
																													<select class="form-select" name="is_parent">
																														<option>Please Select the Category</option>
																														<?php
																														$catSql = "SELECT * FROM buy_category WHERE status=1";
																														$catQuery = mysqli_query($db, $catSql);

																														while ($row = mysqli_fetch_assoc($catQuery)) {
																															$cat_id = $row['id'];
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
																		                                        <input type="number" name="price" class="form-control"  autocomplete="off" placeholder="enter price.." value="<?php echo $price; ?>">
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-2">
																		                                      <div class="mb-3">
																		                                        <label>Bed</label>
																		                                        <input type="number" name="bed" class="form-control"  autocomplete="off" placeholder="enter number of bed.." value="<?php echo $bed; ?>">
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-2">
																		                                      <div class="mb-3">
																		                                        <label>Kitchen</label>
																		                                        <input type="number" name="kitchen" class="form-control"  autocomplete="off" placeholder="enter number of kitchen.." value="<?php echo $kitchen; ?>">
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-2">
																		                                      <div class="mb-3">
																		                                        <label>Drawing</label>
																		                                        <input type="number" name="drawing" class="form-control"  autocomplete="off" placeholder="drawing.." value="<?php echo $drwaing; ?>">
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-2">
																		                                      <div class="mb-3">
																		                                        <label>Dinning</label>
																		                                        <input type="number" name="dinning" class="form-control"  autocomplete="off" placeholder="enter number of dinning.." value="<?php echo $dinning; ?>">
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-2">
																		                                      <div class="mb-3">
																		                                        <label>Balcony</label>
																		                                        <input type="number" name="balcony" class="form-control"  autocomplete="off" placeholder="enter number of balcony.." value="<?php echo $balcony; ?>">
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-2">
																		                                      <div class="mb-3">
																		                                        <label>Garage</label>
																		                                        <input type="number" name="garage" class="form-control"  autocomplete="off" placeholder="enter number of garage.." value="<?php echo $garage; ?>">
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-3">
																		                                      <div class="mb-3">
																		                                        <label>Bathroom</label>
																		                                        <input type="number" name="washroom" class="form-control"  autocomplete="off" placeholder="enter number of washroom.." value="<?php echo $washroom; ?>">
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-3">
																		                                      <div class="mb-3">
																		                                        <label>Total Room</label>
																		                                        <input type="number" name="totalRoom" class="form-control"  autocomplete="off" placeholder="enter number of total room.." value="<?php echo $totalroom; ?>">
																		                                      </div>
																		                                    </div>

																		                                    <div class="col-lg-3">
																		                                      <div class="mb-3">
																		                                        <label>Area Size <sup>(Sq Ft)</sup></label>
																		                                        <input type="number" name="areaSize" class="form-control"  autocomplete="off" placeholder="enter size of area.." value="<?php echo $area_size; ?>">
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-3">
																		                                      <div class="mb-3">
																		                                        <label>Floor Number <sup>(1st->2nd->3rd..)</sup></label>
																		                                        <input type="number" name="floor" class="form-control"  autocomplete="off" placeholder="enter size of area.." value="<?php echo $floor; ?>">
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
														                                        <label>Decoration</label>
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
																		                                    <textarea name="sdesc" class="form-control" cols="30" rows="3" id="editor" placeholder="write short description..."><?php echo $short_desc; ?></textarea>
																		                                  </div>
																		                                  <div class="mb-3">
																		                                    <label>Long Description</label>
																		                                    <textarea name="ldesc" class="form-control" cols="30" rows="4" id="editor1" placeholder="write long description..."><?php echo $long_desc; ?></textarea>
																		                                  </div>
																		                                  <div class="mb-3">
																		                                    <label>Google Embed Map URL <sup>(iframe)</sup></label>
																		                                    <textarea name="map" rows="2" class="form-control"  placeholder="iframe url code"><?php echo $google_map; ?></textarea>
																		                                  </div>

																		                                  <div class="row">
																		                                    <div class="col-lg-6">
																		                                      <div class="mb-3">
																		                                        <label>Available on</label>
																		                                        <input type="date" name="available" class="form-control" value="<?php echo $availability; ?>">
																		                                      </div>
																		                                    </div>
																		                                    <div class="col-lg-6">
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
																		                                    </div>                      
																		                                  </div>

																		                                  <div class="mb-3">
																											<label>Owner Image</label>
																											<br><br>
																											<?php
																											if (!empty($ow_image)) {
																												echo '<img src="assets/images/role/' . $ow_image . '" alt="" style="width: 100%;">';
																											} else {
																												echo '<h5>No Image Uploaded!!</h5>';
																											}
																											?>
																											<br><br>
																											<input type="file" class="form-control" name="ow_image">
																										</div>
																														

																										<div class="row">
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


			else if ($do == "Add") { ?>
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
									<a href="buySubCategory.php?do=Manage" class="btn btn-dark px-5">All Sub Category</a>
								</div>
								<div class="col">
									<a href="buySubCategory.php?do=ManageTrash" class="btn btn-danger px-5">Trash</a>
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
							<form action="buySubCategory.php?do=Store" method="POST" enctype="multipart/form-data">
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
										<div class="row">
											<div class="col-lg-6">
												<div class="mb-3">
													<label>Division</label>
													<select class="form-select" name="division">
														<option>Select the Division</option>
														<?php  
															$sql = "SELECT * FROM buy_division WHERE status=1 ORDER BY priority ASC";
															$query = mysqli_query($db, $sql);

															while ( $row = mysqli_fetch_assoc($query) ) {
																$id  			= $row['id'];
												  				$name  			= $row['name'];
												  				$priority  		= $row['priority'];
												  				$status  		= $row['status'];
												  				?>
												  				  
																  <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
												  				<?php
															}
														?>
													  
													</select>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="mb-3">
													<label>District</label>
													<input type="text" name="district" class="form-control"  autocomplete="off" placeholder="enter district..">
												</div>
											</div>
										</div>
										<div class="mb-3">
											<label>House Number & Location</label>
											<input type="text" name="location" class="form-control"  autocomplete="off" placeholder="enter area location..">
										</div>

										<div class="row">
											<div class="col-lg-6">
												<div class="mb-3">
													<label>Category Name</label>
													<select class="form-select" name="is_parent">
														<option>Please Select the Category</option>
														<?php
														$catSql = "SELECT * FROM buy_category WHERE status=1";
														$catQuery = mysqli_query($db, $catSql);

														while ($row = mysqli_fetch_assoc($catQuery)) {
															$id 		= $row['id'];
															$name 		= $row['name'];
														?>
															<option value="<?php echo $id ?>"> - <?php echo $name; ?></option>
														<?php
														}
														?>
													</select>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="mb-3">
													<label>Price <sup>(Taka)</sup></label>
													<input type="number" name="price" class="form-control"  autocomplete="off" placeholder="enter price..">
												</div>
											</div>
											<div class="col-lg-2">
												<div class="mb-3">
													<label>Bed</label>
													<input type="number" name="bed" class="form-control"  autocomplete="off" placeholder="enter number of bed..">
												</div>
											</div>
											<div class="col-lg-2">
												<div class="mb-3">
													<label>Kitchen</label>
													<input type="number" name="kitchen" class="form-control"  autocomplete="off" placeholder="enter number of kitchen..">
												</div>
											</div>
											<div class="col-lg-2">
												<div class="mb-3">
													<label>Drawing</label>
													<input type="number" name="drawing" class="form-control"  autocomplete="off" placeholder="drawing..">
												</div>
											</div>
											<div class="col-lg-2">
												<div class="mb-3">
													<label>Dinning</label>
													<input type="number" name="dinning" class="form-control"  autocomplete="off" placeholder="enter number of dinning..">
												</div>
											</div>
											<div class="col-lg-2">
												<div class="mb-3">
													<label>Balcony</label>
													<input type="number" name="balcony" class="form-control"  autocomplete="off" placeholder="enter number of balcony..">
												</div>
											</div>
											<div class="col-lg-2">
												<div class="mb-3">
													<label>Garage</label>
													<input type="number" name="garage" class="form-control"  autocomplete="off" placeholder="enter number of garage..">
												</div>
											</div>
											<div class="col-lg-6">
												<div class="mb-3">
													<label>Area Size <sup>(Sq Ft)</sup></label>
													<input type="number" name="areaSize" class="form-control"  autocomplete="off" placeholder="enter size of area..">
												</div>
											</div>
											<div class="col-lg-6">
												<div class="mb-3">
													<label>Katha <sup>(size)</sup></label>
													<input type="text" name="katha" class="form-control"  autocomplete="off" placeholder="enter size of area katha..">
												</div>
											</div>
											<div class="col-lg-3">
												<div class="mb-3">
													<label>Bathroom</label>
													<input type="number" name="washroom" class="form-control"  autocomplete="off" placeholder="enter number of washroom..">
												</div>
											</div>
											<div class="col-lg-3">
												<div class="mb-3">
													<label>Total Room</label>
													<input type="number" name="totalRoom" class="form-control"  autocomplete="off" placeholder="enter number of total room..">
												</div>
											</div>

											
											<div class="col-lg-6">
												<div class="mb-3">
													<label>Floor Number <sup>(1st->2nd->3rd..)</sup></label>
													<input type="number" name="floor" class="form-control"  autocomplete="off" placeholder="enter size of area..">
												</div>
											</div>

											<label for="">For Hotel And Other Category</label>

											<div class="col-lg-3">
												<div class="mb-3">
													<label>Ranking For Hotel</label>
													<select name="rank" class="form-select">
														<option>select Here</option>
														<option value="1">5 Star</option>
														<option value="2">4 Star</option>
														<option value="3">3 Star</option>
														<option value="4">2 Star</option>
														<option value="5">1 Star</option>
													</select>
												</div>
											</div>											

											<div class="col-lg-3">
												<div class="mb-3">
													<label>Decoration</label>
													<select name="decoration" class="form-select">
														<option>select Here</option>
														<option value="1">Furnished</option>
														<option value="2">Semi-Furnished</option>
														<option value="3">Non-Furnished</option>
													</select>
												</div>
											</div>

											<div class="col-lg-3">
												
												<div class="form-check">
												  <input name="desk" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
												  <label class="form-check-label" for="flexCheckDefault">
												    Front desk [24-hour]
												  </label>
												</div>

												<div class="form-check">
												  <input name="wifi" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
												  <label class="form-check-label" for="flexCheckDefault">
												    Free Wi-Fi in all rooms!
												  </label>
												</div>

												<div class="form-check">
												  <input name="hottub" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
												  <label class="form-check-label" for="flexCheckDefault">
												    Hot tub
												  </label>
												</div>

												<div class="form-check">
												  <input name="currency" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
												  <label class="form-check-label" for="flexCheckDefault">
												    Currency exchange
												  </label>
												</div>

												<div class="form-check">
												  <input name="breakfast" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
												  <label class="form-check-label" for="flexCheckDefault">
												    Breakfast
												  </label>
												</div>

												<div class="form-check">
												  <input name="restourant" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
												  <label class="form-check-label" for="flexCheckDefault">
												    Restourant
												  </label>
												</div>
												
											</div>

											<div class="col-lg-3">
												
												<div class="form-check">
												  <input name="ac" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
												  <label class="form-check-label" for="flexCheckDefault">
												    Air conditioning
												  </label>
												</div>

												<div class="form-check">
												  <input name="pool" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
												  <label class="form-check-label" for="flexCheckDefault">
												    Swimming pool(indoor)
												  </label>
												</div>

												<div class="form-check">
												  <input name="park" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
												  <label class="form-check-label" for="flexCheckDefault">
												    Car park
												  </label>
												</div>

												<div class="form-check">
												  <input name="gym" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
												  <label class="form-check-label" for="flexCheckDefault">
												    Fitness center
												  </label>
												</div>

												<div class="form-check">
												  <input name="luggage" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
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
											<textarea name="sdesc" class="form-control" cols="30" rows="10" id="editor" placeholder="write short description..."></textarea>
										</div>
										<div class="mb-3">
											<label>Long Description</label>
											<textarea name="ldesc" class="form-control" cols="30" rows="10" id="editor1" placeholder="write long description..."></textarea>
										</div>
										<div class="mb-3">
											<label>Google Embed Map URL <sup>(iframe)</sup></label>
											<textarea name="map" rows="2" class="form-control"  placeholder="iframe url code"></textarea>
										</div>
										<div class="row">
											<div class="col-lg-6">
												<div class="mb-3">
													<label>Available on</label>
													<input type="date" name="availabe" class="form-control">
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
											</div>											
										</div>

										<div class="mb-3">
											<label>Owner Image</label>
											<input type="file" class="form-control" name="ow_image">
										</div>

										

										<div class="row">
											<label for="">Products Images</label>
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
					$division		= mysqli_real_escape_string($db, $_POST['division']);
					$district 		= mysqli_real_escape_string($db, $_POST['district']);
					$location 		= mysqli_real_escape_string($db, $_POST['location']);
					$price 			= mysqli_real_escape_string($db, $_POST['price']);
					$bed 			= mysqli_real_escape_string($db, $_POST['bed']);
					$kitchen 		= mysqli_real_escape_string($db, $_POST['kitchen']);
					$drawing 		= mysqli_real_escape_string($db, $_POST['drawing']);
					$dinning 		= mysqli_real_escape_string($db, $_POST['dinning']);
					$balcony 		= mysqli_real_escape_string($db, $_POST['balcony']);
					$garage 		= mysqli_real_escape_string($db, $_POST['garage']);
					$washroom 		= mysqli_real_escape_string($db, $_POST['washroom']);
					$totalRoom 		= mysqli_real_escape_string($db, $_POST['totalRoom']);
					$areaSize 		= mysqli_real_escape_string($db, $_POST['areaSize']);
					$katha 			= mysqli_real_escape_string($db, $_POST['katha']);
					$floor 			= mysqli_real_escape_string($db, $_POST['floor']);
					$rank 			= mysqli_real_escape_string($db, $_POST['rank']);
					$decoration 	= mysqli_real_escape_string($db, $_POST['decoration']);
					$desk 			= mysqli_real_escape_string($db, $_POST['desk']);
					$wifi 			= mysqli_real_escape_string($db, $_POST['wifi']);
					$hottub 		= mysqli_real_escape_string($db, $_POST['hottub']);
					$currency 		= mysqli_real_escape_string($db, $_POST['currency']);
					$breakfast 		= mysqli_real_escape_string($db, $_POST['breakfast']);
					$restourant 	= mysqli_real_escape_string($db, $_POST['restourant']);
					$ac 			= mysqli_real_escape_string($db, $_POST['ac']);
					$pool 			= mysqli_real_escape_string($db, $_POST['pool']);
					$park 			= mysqli_real_escape_string($db, $_POST['park']);
					$gym 			= mysqli_real_escape_string($db, $_POST['gym']);
					$luggage 		= mysqli_real_escape_string($db, $_POST['luggage']);
					$sdesc 			= mysqli_real_escape_string($db, $_POST['sdesc']);
					$ldesc 			= mysqli_real_escape_string($db, $_POST['ldesc']);
					$map			= mysqli_real_escape_string($db, $_POST['map']);
					$availabe		= $_POST['availabe'];
					$is_parent 		= mysqli_real_escape_string($db, $_POST['is_parent']);
					$status 		= mysqli_real_escape_string($db, $_POST['status']);

					// For Owner Image
					$ow_image		= mysqli_real_escape_string($db, $_FILES['ow_image']['name']);
					$tmpImgOwn		= $_FILES['ow_image']['tmp_name'];

					if (!empty($ow_image)) {
						$imgOwn = rand(0, 999999) . "_" . $ow_image;
						move_uploaded_file($tmpImgOwn, 'assets/images/owner/' . $imgOwn);
					} else {
						$imgOwn = '';
					}

					// For Image One
					$img_one		= mysqli_real_escape_string($db, $_FILES['img_one']['name']);
					$tmpImgOne		= $_FILES['img_one']['tmp_name'];

					if (!empty($img_one)) {
						$img1 = rand(0, 999999) . "_" . $img_one;
						move_uploaded_file($tmpImgOne, 'assets/images/buy_subcategory/' . $img1);
					} else {
						$img1 = '';
					}

					// For Image Two
					$img_two 		= mysqli_real_escape_string($db, $_FILES['img_two']['name']);
					$tmpImgTwo 		= $_FILES['img_two']['tmp_name'];

					if (!empty($tmpImgTwo)) {
						$img2 = rand(0, 999999) . "_" . $img_two;
						move_uploaded_file($tmpImgTwo, 'assets/images/buy_subcategory/' . $img2);
					} else {
						$img2 = '';
					}

					// For Image Three
					$img_three		= mysqli_real_escape_string($db, $_FILES['img_three']['name']);
					$tmpImgThree	= $_FILES['img_three']['tmp_name'];

					if (!empty($img_three)) {
						$img3 = rand(0, 999999) . "_" . $img_three;
						move_uploaded_file($tmpImgThree, 'assets/images/buy_subcategory/' . $img3);
					} else {
						$img3 = '';
					}

					// For Image Four
					$img_four		= mysqli_real_escape_string($db, $_FILES['img_four']['name']);
					$tmpImgFour		= $_FILES['img_four']['tmp_name'];

					if ($img_four) {
						$img4 = rand(0, 999999) . "_" . $img_four;
						move_uploaded_file($tmpImgFour, 'assets/images/buy_subcategory/' . $img4);
					} else {
						$img4 = '';
					}

					// For Image Five
					$img_five 		= mysqli_real_escape_string($db, $_FILES['img_five']['name']);
					$tmpImgFive		= $_FILES['img_five']['tmp_name'];

					if (!empty($img_five)) {
						$img5 = rand(0, 999999) . "_" . $img_five;
						move_uploaded_file($tmpImgFive, 'assets/images/buy_subcategory/' . $img5);
					} else {
						$img5 = '';
					}

					// For Image Six
					$img_six 		= mysqli_real_escape_string($db, $_FILES['img_six']['name']);
					$tmpImgSix		= $_FILES['img_six']['tmp_name'];

					if (!empty($img_six)) {
						$img6 = rand(0, 999999) . "_" . $img_six;
						move_uploaded_file($tmpImgSix, 'assets/images/buy_subcategory/' . $img6);
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

					$addSubCategorySql = "INSERT INTO buy_subcategory ( subcat_name, slug, is_parent, ow_name, ow_email, ow_phone, district, division_id, location, price, bed, kitchen, washroom, totalroom, area_size, katha, floor, rank, decoration, desk, wifi, hottub, currency, breakfast, restourant, ac, pool, park, gym, luggage, drwaing, dinning, balcony, garage, availability, short_desc, long_desc, ow_image, img_one, img_two, img_three, img_four, img_five, img_six, status, google_map, join_date ) VALUES ( '$subname', '$slug', '$is_parent', '$ow_name', '$ow_email', '$ow_phone', '$district', '$division', '$location', '$price', '$bed', '$kitchen', '$washroom', '$totalRoom', '$areaSize', '$katha', '$floor', '$rank', '$decoration', '$desk', '$wifi', '$hottub', '$currency', '$breakfast', '$restourant', '$ac', '$pool', '$park', '$gym', '$luggage', '$drawing', '$dinning', '$balcony', '$garage', '$availabe', '$sdesc', '$ldesc', '$imgOwn', '$img1', '$img2', '$img3', '$img4', '$img5', '$img6', '$status', '$map', now() )";
					$addQuery = mysqli_query($db, $addSubCategorySql);

					if ($addQuery) {
						header("Location: buySubCategory.php?do=Manage");
					} else {
						die("Mysql Error." . mysqli_error($db));
					}
				}
			} 


			else if ($do == "Edit") {
				if (isset($_GET['editId'])) {
					$editIdStore = $_GET['editId'];
					$editSql = "SELECT * FROM buy_subcategory WHERE sub_id='$editIdStore'";
					$editQuery = mysqli_query($db, $editSql);

					while ($row = mysqli_fetch_assoc($editQuery)) {
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
                      $katha    = $row['katha'];
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
                      $resstatus       = $row['status'];
                      $google_map   = $row['google_map'];
                      $join_date    = $row['join_date'];
				?>
						<!--breadcrumb-->
						<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
							<div class="breadcrumb-title pe-3">Edit</div>
							<div class="ps-3">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb mb-0 p-0">
										<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">Buy Sub Category Edit</li>
									</ol>
								</nav>
							</div>
							<!-- START: For Right Part -->
							<div class="ms-auto">
								<div class="btn-group">
									<div class="row row-cols-auto g-3">
										<div class="col">
											<a href="buySubCategory.php?do=Manage" class="btn btn-dark px-5">All Buy Category</a>
										</div>
										<div class="col">
											<a href="buySubCategory.php?do=Add" class="btn btn-primary px-5">Add New Buy Category</a>
										</div>
										<div class="col">
											<a href="buySubCategory.php?do=ManageTrash" class="btn btn-danger px-5">Trash</a>
										</div>
									</div>
								</div>
							</div>
							<!-- END: For Right Part -->
						</div>
						<!--end breadcrumb-->

						<h6 class="mb-0 text-uppercase">Edit Buy Sub Category Info</h6>
						<hr>
						<div class="card">
							<div class="card-body">
								<div class="border p-3 radius-10">
									<!-- START : FORM -->
									<form action="buySubCategory.php?do=Update" method="POST" enctype="multipart/form-data">
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
				                                        <label>Division</label>
				                                        <select class="form-select" name="division">
				                                          <option>Select the Division</option>
				                                          <?php  
				                                            $sql = "SELECT * FROM buy_division WHERE status=1 ORDER BY priority ASC";
				                                            $query = mysqli_query($db, $sql);

				                                            while ( $row = mysqli_fetch_assoc($query) ) {
				                                              $id       = $row['id'];
				                                                $name       = $row['name'];
				                                                $priority     = $row['priority'];
				                                                $status     = $row['status'];
				                                                ?>
				                                                  
				                                                <option value="<?php echo $id; ?>" <?php if ( $id == $division_id ) {
				                                                  echo "selected";
				                                                } ?>><?php echo $name; ?></option>
				                                                <?php
				                                            }
				                                          ?>
				                                          
				                                        </select>
				                                      </div>
				                                    </div>
				                                    <div class="col-lg-6">
				                                      <div class="mb-3">
				                                        <label>District</label>
				                                        <input type="text" name="district" class="form-control"  autocomplete="off" placeholder="enter district.." value="<?php echo $district; ?>">
				                                      </div>
				                                    </div>
				                                </div>
				                                  <div class="mb-3">
				                                    <label>House Number & Location</label>
				                                    <input type="text" name="location" class="form-control"  autocomplete="off" placeholder="enter area location.." value="<?php echo $location; ?>">
				                                  </div>

												<div class="row">
													<div class="col-lg-6">
														<div class="mb-3">
															<label>Category Name</label>
															<select class="form-select" name="is_parent">
																<option>Please Select the Category</option>
																<?php
																$catSql = "SELECT * FROM buy_category WHERE status=1";
																$catQuery = mysqli_query($db, $catSql);

																while ($row = mysqli_fetch_assoc($catQuery)) {
																	$cat_id = $row['id'];
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
				                                        <input type="number" name="price" class="form-control"  autocomplete="off" placeholder="enter price.." value="<?php echo $price; ?>">
				                                      </div>
				                                    </div>
				                                    <div class="col-lg-2">
												<div class="mb-3">
													<label>Bed</label>
													<input type="number" name="bed" class="form-control"  autocomplete="off" placeholder="enter number of bed.." value="<?php echo $bed; ?>">
												</div>
											</div>
											<div class="col-lg-2">
												<div class="mb-3">
													<label>Kitchen</label>
													<input type="number" name="kitchen" class="form-control"  autocomplete="off" placeholder="enter number of kitchen.." value="<?php echo $kitchen; ?>">
												</div>
											</div>
											<div class="col-lg-2">
												<div class="mb-3">
													<label>Drawing</label>
													<input type="number" name="drawing" class="form-control"  autocomplete="off" placeholder="drawing.." value="<?php echo $drwaing; ?>">
												</div>
											</div>
											<div class="col-lg-2">
												<div class="mb-3">
													<label>Dinning</label>
													<input type="number" name="dinning" class="form-control"  autocomplete="off" placeholder="enter number of dinning.." value="<?php echo $dinning; ?>">
												</div>
											</div>
											<div class="col-lg-2">
												<div class="mb-3">
													<label>Balcony</label>
													<input type="number" name="balcony" class="form-control"  autocomplete="off" placeholder="enter number of balcony.." value="<?php echo $balcony; ?>">
												</div>
											</div>
											<div class="col-lg-2">
												<div class="mb-3">
													<label>Garage</label>
													<input type="number" name="garage" class="form-control"  autocomplete="off" placeholder="enter number of garage.." value="<?php echo $garage; ?>">
												</div>
											</div>
											<div class="col-lg-6">
												<div class="mb-3">
													<label>Area Size <sup>(Sq Ft)</sup></label>
													<input type="number" name="areaSize" class="form-control"  autocomplete="off" placeholder="enter size of area.." value="<?php echo $area_size; ?>">
												</div>
											</div>
											<div class="col-lg-6">
												<div class="mb-3">
													<label>Katha <sup>(size)</sup></label>
													<input type="text" name="katha" class="form-control"  autocomplete="off" placeholder="enter size of area katha.." value="<?php echo $katha; ?>">
												</div>
											</div>
											<div class="col-lg-3">
												<div class="mb-3">
													<label>Bathroom</label>
													<input type="number" name="washroom" class="form-control"  autocomplete="off" placeholder="enter number of washroom.." value="<?php echo $washroom; ?>">
												</div>
											</div>
											<div class="col-lg-3">
												<div class="mb-3">
													<label>Total Room</label>
													<input type="number" name="totalRoom" class="form-control"  autocomplete="off" placeholder="enter number of total room.." value="<?php echo $totalroom; ?>">
												</div>
											</div>

											
											<div class="col-lg-6">
												<div class="mb-3">
													<label>Floor Number <sup>(1st->2nd->3rd..)</sup></label>
													<input type="number" name="floor" class="form-control"  autocomplete="off" placeholder="enter size of area.." value="<?php echo $floor; ?>">
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
                                        <label>Decoration</label>
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
				                                    <textarea name="sdesc" class="form-control" cols="30" rows="3" id="editor" placeholder="write short description..."><?php echo $short_desc; ?></textarea>
				                                  </div>
				                                  <div class="mb-3">
				                                    <label>Long Description</label>
				                                    <textarea name="ldesc" class="form-control" cols="30" rows="4" id="editor1" placeholder="write long description..."><?php echo $long_desc; ?></textarea>
				                                  </div>
				                                  <div class="mb-3">
				                                    <label>Google Embed Map URL <sup>(iframe)</sup></label>
				                                    <textarea name="map" rows="2" class="form-control"  placeholder="iframe url code"><?php echo $google_map; ?></textarea>
				                                  </div>

				                                  <div class="row">
				                                    <div class="col-lg-6">
				                                      <div class="mb-3">
				                                        <label>Available on</label>
				                                        <input type="date" name="available" class="form-control" value="<?php echo $availability; ?>">
				                                      </div>
				                                    </div>
				                                    <div class="col-lg-6">
				                                      <div class="mb-3">
														<label>Status</label>
														<?php echo $status; ?>
														<select name="status" class="form-select">
														<option value="1" <?php if( $resstatus == 1 ) { echo "selected"; } ?>>Active</option>
														<option value="0" <?php if( $resstatus == 0 ) { echo "selected"; } ?>>InActive</option>
														<option value="2" <?php if( $resstatus == 2 ) { echo "selected"; } ?>>Pending</option>
														<option value="3" <?php if( $resstatus == 3 ) { echo "selected"; } ?>>Approve</option>
														<option value="4" <?php if( $resstatus == 4 ) { echo "selected"; } ?>>Decline</option>
													</select>
													</div>
				                                    </div>                      
				                                  </div>

				                                  <div class="mb-3">
													<label>Owner Image</label>
													<br><br>
													<?php
													if (!empty($ow_image)) {
														echo '<img src="assets/images/role/' . $ow_image . '" alt="" style="width: 100%;">';
													} else {
														echo '<h5>No Image Uploaded!!</h5>';
													}
													?>
													<br><br>
													<input type="file" class="form-control" name="ow_image">
												</div>
																

												<div class="row">
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
			} 


			else if ($do == "Update") {

				if (isset($_POST['updateRentSubCat'])) {

				  $updateIdStore    = mysqli_real_escape_string($db, $_POST['rentSubId']);
                  $subname          = mysqli_real_escape_string($db, $_POST['subname']);
                  $ow_name          = mysqli_real_escape_string($db, $_POST['ow_name']);
                  $ow_email         = mysqli_real_escape_string($db, $_POST['ow_email']);
                  $ow_phone         = mysqli_real_escape_string($db, $_POST['ow_phone']);
                  $division         = mysqli_real_escape_string($db, $_POST['division']);
                  $district         = mysqli_real_escape_string($db, $_POST['district']);
                  $location         = mysqli_real_escape_string($db, $_POST['location']);
                  $price            = mysqli_real_escape_string($db, $_POST['price']);
                  $bed              = mysqli_real_escape_string($db, $_POST['bed']);
                  $kitchen          = mysqli_real_escape_string($db, $_POST['kitchen']);
                  $drawing          = mysqli_real_escape_string($db, $_POST['drawing']);
                  $dinning          = mysqli_real_escape_string($db, $_POST['dinning']);
                  $balcony          = mysqli_real_escape_string($db, $_POST['balcony']);
                  $garage           = mysqli_real_escape_string($db, $_POST['garage']);
                  $washroom         = mysqli_real_escape_string($db, $_POST['washroom']);
                  $totalRoom        = mysqli_real_escape_string($db, $_POST['totalRoom']);
                  $areaSize         = mysqli_real_escape_string($db, $_POST['areaSize']);
                  $katha         = mysqli_real_escape_string($db, $_POST['katha']);
                  $floor            = mysqli_real_escape_string($db, $_POST['floor']);
                  $rank             = mysqli_real_escape_string($db, $_POST['rank']);
                  $decoration       = mysqli_real_escape_string($db, $_POST['decoration']);
                  $desk             = mysqli_real_escape_string($db, $_POST['desk']);
                  $wifi             = mysqli_real_escape_string($db, $_POST['wifi']);
                  $hottub           = mysqli_real_escape_string($db, $_POST['hottub']);
                  $currency         = mysqli_real_escape_string($db, $_POST['currency']);
                  $breakfast        = mysqli_real_escape_string($db, $_POST['breakfast']);
                  $restaurant       = mysqli_real_escape_string($db, $_POST['restaurant']);
                  $ac               = mysqli_real_escape_string($db, $_POST['ac']);
                  $pool             = mysqli_real_escape_string($db, $_POST['pool']);
                  $park             = mysqli_real_escape_string($db, $_POST['park']);
                  $gym              = mysqli_real_escape_string($db, $_POST['gym']);
                  $luggage          = mysqli_real_escape_string($db, $_POST['luggage']);
                  $sdesc            = mysqli_real_escape_string($db, $_POST['sdesc']);
                  $ldesc            = mysqli_real_escape_string($db, $_POST['ldesc']);
                  $map              = mysqli_real_escape_string($db, $_POST['map']);
                  $available        = $_POST['available'];
                  $is_parent        = mysqli_real_escape_string($db, $_POST['is_parent']);
                  $status           = mysqli_real_escape_string($db, $_POST['status']);

                  // For Owner Image
					$ow_image		= mysqli_real_escape_string($db, $_FILES['ow_image']['name']);
					$tmpImgOw		= $_FILES['ow_image']['tmp_name'];

					if (!empty($ow_image)) {
						$oldImgOwSql = "SELECT * FROM buy_subcategory WHERE sub_id='$updateIdStore'";
						$oldImageQuery = mysqli_query($db, $oldImgOwSql);

						while ($row = mysqli_fetch_assoc($oldImageQuery)) {
							$old_Img_ow = $row['ow_image'];
							unlink('assets/images/owner/' . $old_Img_ow);
						}

						$imgOw = rand(0, 999999) . "_" . $ow_image;
						move_uploaded_file($tmpImgOw, 'assets/images/owner/' . $imgOw);

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
						$updateRentCatSql = "UPDATE buy_subcategory SET subcat_name='$subname', slug='$slug', is_parent='$is_parent', ow_name='$ow_name', ow_email='$ow_email', ow_phone='$ow_phone', district='$district', division_id='$division', location='$location', price='$price', bed='$bed', kitchen='$kitchen', washroom='$washroom', totalroom='$totalRoom', area_size='$areaSize', katha='$katha', floor='$floor', rank='$rank', decoration='$decoration', desk='$desk', wifi='$wifi', hottub='$hottub', currency='$currency', ac='$ac', pool='$pool', park='$park', gym='$gym', luggage='$luggage', drwaing='$drawing', dinning='$dinning', balcony='$balcony', garage='$garage', breakfast='$breakfast', restourant='$restaurant', availability='$available',  short_desc='$sdesc', long_desc='$ldesc', google_map='$map', ow_image='$imgOw', status='$status' WHERE sub_id='$updateIdStore' ";
						$updateRentCatQuery = mysqli_query($db, $updateRentCatSql);

						if ($updateRentCatQuery) {
							header("Location: buySubCategory.php?do=Manage");
						} else {
							die("Mysql Error." . mysqli_error($db));
						}
					}

					// For Image One
					$img_one		= mysqli_real_escape_string($db, $_FILES['img_one']['name']);
					$tmpImgOne		= $_FILES['img_one']['tmp_name'];

					if (!empty($img_one)) {
						$oldImgOneSql = "SELECT * FROM buy_subcategory WHERE sub_id='$updateIdStore'";
						$oldImageQuery = mysqli_query($db, $oldImgOneSql);

						while ($row = mysqli_fetch_assoc($oldImageQuery)) {
							$old_Img_one = $row['img_one'];
							unlink('assets/images/buy_subcategory/' . $old_Img_one);
						}

						$img1 = rand(0, 999999) . "_" . $img_one;
						move_uploaded_file($tmpImgOne, 'assets/images/buy_subcategory/' . $img1);

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
						$updateRentCatSql = "UPDATE buy_subcategory SET subcat_name='$subname', slug='$slug', is_parent='$is_parent', ow_name='$ow_name', ow_email='$ow_email', ow_phone='$ow_phone', district='$district', division_id='$division', location='$location', price='$price', bed='$bed', kitchen='$kitchen', washroom='$washroom', totalroom='$totalRoom', area_size='$areaSize', katha='$katha', floor='$floor', rank='$rank', decoration='$decoration', desk='$desk', wifi='$wifi', hottub='$hottub', currency='$currency', ac='$ac', pool='$pool', park='$park', gym='$gym', luggage='$luggage', drwaing='$drawing', dinning='$dinning', balcony='$balcony', garage='$garage', breakfast='$breakfast', restourant='$restaurant', availability='$available',  short_desc='$sdesc', long_desc='$ldesc', google_map='$map', img_one='$img1', status='$status' WHERE sub_id='$updateIdStore' ";
						$updateRentCatQuery = mysqli_query($db, $updateRentCatSql);

						if ($updateRentCatQuery) {
							header("Location: buySubCategory.php?do=Manage");
						} else {
							die("Mysql Error." . mysqli_error($db));
						}
					}

					// For Image Two
					$img_two 		= mysqli_real_escape_string($db, $_FILES['img_two']['name']);
					$tmpImgTwo 		= $_FILES['img_two']['tmp_name'];

					if (!empty($img_two)) {
						$oldImgTwoSql = "SELECT * FROM buy_subcategory WHERE sub_id='$updateIdStore'";
						$oldImageQuery = mysqli_query($db, $oldImgTwoSql);

						while ($row = mysqli_fetch_assoc($oldImageQuery)) {
							$old_Img_Two = $row['img_two'];
							unlink('assets/images/buy_subcategory/' . $old_Img_Two);
						}

						$img2 = rand(0, 999999) . "_" . $img_two;
						move_uploaded_file($tmpImgTwo, 'assets/images/buy_subcategory/' . $img2);

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

						$updateRentCatSql = "UPDATE rent_subcategory SET subcat_name='$subname', slug='$slug', is_parent='$is_parent', ow_name='$ow_name', ow_email='$ow_email', ow_phone='$ow_phone', district='$district', division_id='$division', location='$location', price='$price', bed='$bed', kitchen='$kitchen', washroom='$washroom', totalroom='$totalRoom', area_size='$areaSize', katha='$katha', floor='$floor', rank='$rank', decoration='$decoration', desk='$desk', wifi='$wifi', hottub='$hottub', currency='$currency', ac='$ac', pool='$pool', park='$park', gym='$gym', luggage='$luggage', drwaing='$drawing', dinning='$dinning', balcony='$balcony', garage='$garage', breakfast='$breakfast', restourant='$restaurant', availability='$available',  short_desc='$sdesc', long_desc='$ldesc', google_map='$map', img_two='$img2', status='$status' WHERE sub_id='$updateIdStore' ";
						$updateRentCatQuery = mysqli_query($db, $updateRentCatSql);

						if ($updateRentCatQuery) {
							header("Location: buySubCategory.php?do=Manage");
						} else {
							die("Mysql Error." . mysqli_error($db));
						}
					}


					// For Image Three
					$img_three		= mysqli_real_escape_string($db, $_FILES['img_three']['name']);
					$tmpImgThree	= $_FILES['img_three']['tmp_name'];

					if (!empty($img_three)) {
						$oldImgThreeSql = "SELECT * FROM buy_subcategory WHERE sub_id='$updateIdStore'";
						$oldImageQuery = mysqli_query($db, $oldImgThreeSql);

						while ($row = mysqli_fetch_assoc($oldImageQuery)) {
							$old_Img_Three = $row['img_three'];
							unlink('assets/images/buy_subcategory/' . $old_Img_Three);
						}

						$img3 = rand(0, 999999) . "_" . $img_three;
						move_uploaded_file($tmpImgThree, 'assets/images/buy_subcategory/' . $img3);

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

						$updateRentCatSql = "UPDATE buy_subcategory SET subcat_name='$subname', slug='$slug', is_parent='$is_parent', ow_name='$ow_name', ow_email='$ow_email', ow_phone='$ow_phone', district='$district', division_id='$division', location='$location', price='$price', bed='$bed', kitchen='$kitchen', washroom='$washroom', totalroom='$totalRoom', area_size='$areaSize', katha='$katha', floor='$floor', rank='$rank', decoration='$decoration', desk='$desk', wifi='$wifi', hottub='$hottub', currency='$currency', ac='$ac', pool='$pool', park='$park', gym='$gym', luggage='$luggage', drwaing='$drawing', dinning='$dinning', balcony='$balcony', garage='$garage', breakfast='$breakfast', restourant='$restaurant', availability='$available',  short_desc='$sdesc', long_desc='$ldesc', google_map='$map', img_three='$img3', status='$status' WHERE sub_id='$updateIdStore' ";
						$updateRentCatQuery = mysqli_query($db, $updateRentCatSql);

						if ($updateRentCatQuery) {
							header("Location: buySubCategory.php?do=Manage");
						} else {
							die("Mysql Error." . mysqli_error($db));
						}
					}

					// For Image Four
					$img_four		= mysqli_real_escape_string($db, $_FILES['img_four']['name']);
					$tmpImgFour		= $_FILES['img_four']['tmp_name'];

					if (!empty($img_four)) {
						$oldImgFourSql = "SELECT * FROM buy_subcategory WHERE sub_id='$updateIdStore'";
						$oldImageQuery = mysqli_query($db, $oldImgFourSql);

						while ($row = mysqli_fetch_assoc($oldImageQuery)) {
							$old_Img_Four = $row['img_four'];
							unlink('assets/images/buy_subcategory/' . $old_Img_Four);
						}

						$img4 = rand(0, 999999) . "_" . $img_four;
						move_uploaded_file($tmpImgFour, 'assets/images/buy_subcategory/' . $img4);

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
						$updateRentCatSql = "UPDATE buy_subcategory SET subcat_name='$subname', slug='$slug', is_parent='$is_parent', ow_name='$ow_name', ow_email='$ow_email', ow_phone='$ow_phone', district='$district', division_id='$division', location='$location', price='$price', bed='$bed', kitchen='$kitchen', washroom='$washroom', totalroom='$totalRoom', area_size='$areaSize', katha='$katha', floor='$floor', rank='$rank', decoration='$decoration', desk='$desk', wifi='$wifi', hottub='$hottub', currency='$currency', ac='$ac', pool='$pool', park='$park', gym='$gym', luggage='$luggage', drwaing='$drawing', dinning='$dinning', balcony='$balcony', garage='$garage', breakfast='$breakfast', restourant='$restaurant', availability='$available',  short_desc='$sdesc', long_desc='$ldesc', google_map='$map', img_four='$img4', status='$status' WHERE sub_id='$updateIdStore' ";
						$updateRentCatQuery = mysqli_query($db, $updateRentCatSql);

						if ($updateRentCatQuery) {
							header("Location: buySubCategory.php?do=Manage");
						} else {
							die("Mysql Error." . mysqli_error($db));
						}
					}

					// For Image Five
					$img_five 		= mysqli_real_escape_string($db, $_FILES['img_five']['name']);
					$tmpImgFive		= $_FILES['img_five']['tmp_name'];

					if (!empty($img_five)) {
						$oldImgFiveSql = "SELECT * FROM buy_subcategory WHERE sub_id='$updateIdStore'";
						$oldImageQuery = mysqli_query($db, $oldImgFiveSql);

						while ($row = mysqli_fetch_assoc($oldImageQuery)) {
							$old_Img_Five = $row['img_five'];
							unlink('assets/images/buy_subcategory/' . $old_Img_Five);
						}

						$img5 = rand(0, 999999) . "_" . $img_five;
						move_uploaded_file($tmpImgFive, 'assets/images/buy_subcategory/' . $img5);

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
						$updateRentCatSql = "UPDATE buy_subcategory SET subcat_name='$subname', slug='$slug', is_parent='$is_parent', ow_name='$ow_name', ow_email='$ow_email', ow_phone='$ow_phone', district='$district', division_id='$division', location='$location', price='$price', bed='$bed', kitchen='$kitchen', washroom='$washroom', totalroom='$totalRoom', area_size='$areaSize', katha='$katha', floor='$floor', rank='$rank', decoration='$decoration', desk='$desk', wifi='$wifi', hottub='$hottub', currency='$currency', ac='$ac', pool='$pool', park='$park', gym='$gym', luggage='$luggage', drwaing='$drawing', dinning='$dinning', balcony='$balcony', garage='$garage', breakfast='$breakfast', restourant='$restaurant', availability='$available',  short_desc='$sdesc', long_desc='$ldesc', google_map='$map',  img_five='$img5', status='$status' WHERE sub_id='$updateIdStore' ";
						$updateRentCatQuery = mysqli_query($db, $updateRentCatSql);

						if ($updateRentCatQuery) {
							header("Location: buySubCategory.php?do=Manage");
						} else {
							die("Mysql Error." . mysqli_error($db));
						}
					}



					// For Image Six
					$img_six 		= mysqli_real_escape_string($db, $_FILES['img_six']['name']);
					$tmpImgSix		= $_FILES['img_six']['tmp_name'];

					if (!empty($img_six)) {
						$oldImgSixSql = "SELECT * FROM buy_subcategory WHERE sub_id='$updateIdStore'";
						$oldImageQuery = mysqli_query($db, $oldImgSixSql);

						while ($row = mysqli_fetch_assoc($oldImageQuery)) {
							$old_Img_Six = $row['img_six'];
							unlink('assets/images/buy_subcategory/' . $old_Img_Six);
						}

						$img6 = rand(0, 999999) . "_" . $img_six;
						move_uploaded_file($tmpImgSix, 'assets/images/buy_subcategory/' . $img6);

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
						$updateRentCatSql = "UPDATE buy_subcategory SET subcat_name='$subname', slug='$slug', is_parent='$is_parent', ow_name='$ow_name', ow_email='$ow_email', ow_phone='$ow_phone', district='$district', division_id='$division', location='$location', price='$price', bed='$bed', kitchen='$kitchen', washroom='$washroom', totalroom='$totalRoom', area_size='$areaSize', katha='$katha', floor='$floor', rank='$rank', decoration='$decoration', desk='$desk', wifi='$wifi', hottub='$hottub', currency='$currency', ac='$ac', pool='$pool', park='$park', gym='$gym', luggage='$luggage', drwaing='$drawing', dinning='$dinning', balcony='$balcony', garage='$garage', breakfast='$breakfast', restourant='$restaurant', availability='$available',  short_desc='$sdesc', long_desc='$ldesc', google_map='$map', img_six='$img6', status='$status' WHERE sub_id='$updateIdStore' ";
						$updateRentCatQuery = mysqli_query($db, $updateRentCatSql);

						if ($updateRentCatQuery) {
							header("Location: buySubCategory.php?do=Manage");
						} else {
							die("Mysql Error." . mysqli_error($db));
						}
					} 

					else {

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
						$updateRentCatSql = "UPDATE buy_subcategory SET subcat_name='$subname', slug='$slug', is_parent='$is_parent', ow_name='$ow_name', ow_email='$ow_email', ow_phone='$ow_phone', district='$district', division_id='$division', location='$location', price='$price', bed='$bed', kitchen='$kitchen', washroom='$washroom', totalroom='$totalRoom', area_size='$areaSize', katha='$katha', floor='$floor', rank='$rank', decoration='$decoration', desk='$desk', wifi='$wifi', hottub='$hottub', currency='$currency', ac='$ac', pool='$pool', park='$park', gym='$gym', luggage='$luggage', drwaing='$drawing', dinning='$dinning', balcony='$balcony', garage='$garage', breakfast='$breakfast', restourant='$restaurant', availability='$available',  short_desc='$sdesc', long_desc='$ldesc', google_map='$map', status='$status' WHERE sub_id='$updateIdStore' ";
						$updateRentCatQuery = mysqli_query($db, $updateRentCatSql);

						if ($updateRentCatQuery) {
							header("Location: buySubCategory.php?do=Manage");
						} else {
							die("Mysql Error." . mysqli_error($db));
						}
					}
				}
			} 

			else if ($do == "Trash") {
				if (isset($_GET['tData'])) {
					$trashId = $_GET['tData'];
					$trashSql = "UPDATE buy_subcategory SET status=0 WHERE sub_id='$trashId'";
					$trashQuery = mysqli_query($db, $trashSql);

					if ($trashQuery) {
						header("Location: buySubCategory.php?do=Manage");
					} else {
						die("MySql Error." . mysqli_error($db));
					}
				}
			} 

			else if ($do == "ManageTrash") { ?>
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Manage Buy Sub Category Trash</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Trash Buy Sub Category list</li>
							</ol>
						</nav>
					</div>
					<!-- START: For Right Part -->
					<div class="ms-auto">
						<div class="btn-group">
							<div class="row row-cols-auto g-3">
								<div class="col">
									<a href="buySubCategory.php?do=Manage" class="btn btn-primary px-5">All Buy Sub Category</a>
								</div>
								<div class="col">
									<a href="buySubCategory.php?do=Add" class="btn btn-dark px-5">Add New Buy Sub Category</a>
								</div>
							</div>
						</div>
					</div>
					<!-- END: For Right Part -->
				</div>
				<!--end breadcrumb-->

				<h6 class="mb-0 text-uppercase">TRASH Buy sub CATEGORY LIST</h6>
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
										$rentcategorySql = "SELECT * FROM buy_category WHERE status = 1 ORDER BY name ASC";
										$rentcategoryQuery = mysqli_query($db, $rentcategorySql);

										while ($row = mysqli_fetch_assoc($rentcategoryQuery)) {
											$cat_id  		= $row['id'];
											$cat_name  		= $row['name'];

											$childSql = "SELECT * FROM buy_subcategory WHERE is_parent ='$cat_id' AND status=0 ORDER BY subcat_name ASC";
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
															echo '<img src="assets/images/buy_subcategory/' . $img_one . '" alt="" style="width: 60px;">';
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
																	<a href="buySubCategory.php?do=Edit&editId=<?php echo $sub_id; ?>" class="btn btn-outline-primary"><i class="fa-solid fa-pencil"></i> Edit</a>

																	<a href="buySubCategory.php?do=ManageActive&activeId=<?php echo $sub_id; ?>" class="btn btn-outline-success"><i class="fa-solid fa-file-circle-check"></i> Active</a>

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
																				<a href="buySubCategory.php?do=Delete&dData=<?php echo $sub_id; ?>" class="btn btn-primary">Yes</a>
																				<a href="" class="btn btn-dark" data-bs-dismiss="modal">No</a>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														<!-- END: MODAL FOR DELETE -->
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

			else if ($do == "ManageActive") {
				if (isset($_GET['activeId'])) {
					$acId = $_GET['activeId'];
					$activeSql = "UPDATE buy_subcategory SET status=1 WHERE sub_id='$acId'";
					$activeQuery = mysqli_query($db, $activeSql);

					if ($activeQuery) {
						header("Location: buySubCategory.php?do=Manage");
					} else {
						die("Mysqli_Error" . mysqli_error($db));
					}
				}
			} 

			else if ($do == "Delete") {
				if (isset($_GET['dData'])) {
					$deleteData = $_GET['dData'];
					$deleteSQL = "DELETE FROM buy_subcategory WHERE sub_id='$deleteData' ";
					$deleteQuery = mysqli_query($db, $deleteSQL);

					if ($deleteQuery) {
						header("Location: buySubCategory.php?do=ManageTrash");
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