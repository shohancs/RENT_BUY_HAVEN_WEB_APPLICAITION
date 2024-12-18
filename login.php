<?php include"inc/header.php"; ?>
<main>
	<!-- START: Breadcrumb -->
     <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-uppercase d-flex justify-content-between">
                    <div>
                        <h4 style="color: #023021; font-size: 25px;">Account Log In</h4>
                    </div>
                    <div class="d-flex">
                        <a href="index.php"><h4 style="color:#545454; font-size: 17px; font-weight: 400; ">HOME</h4></a>
                        <h4 class="px-2" style="color:#545454; font-size: 17px; font-weight: 400; "> / </h4>
                        <h4 style="color:#6c757d; font-size: 17px; font-weight: 400; ">signin</h4>
                    </div>
                </div>
            </div>
        </div>
     </section>
    <!-- END: Breadcrumb -->
	<section>
		<div class="container py-5 mb-5">
			<div class="row">

				<div class="col-lg-6">
					<div class="" style="border-left: 3px double #ffc107; padding: 0 2%;">
                        <h1 class="mt-5 mb-4" style="letter-spacing: 2px; color:#023021; font-size: 25px; font-weight:600;">Login User Account</h1>
                    </div>
					<div class="user bg-light p-5" style="border-top: 4px solid #ffc107; border-radius: 10px;">
						<!-- START : FORM -->
						<form action="" method="POST">
							<div class="mb-3">
								<label for="">Email Address</label>
								<div class="input-group form-group">
				                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="enter your email..." aria-label="emailHelp" aria-describedby="basic-addon2" required autocomplete="off">
				                  <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-envelope"></i></span>
				                </div>
							</div>

							<div class="mb-3">
								<label for="">Password</label>
								<div class="input-group form-group">
				                  <input type="password" name="password" class="form-control" id="myInput" placeholder="enter your password..." required autocomplete="off">
				                  <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-lock"></i></span>
				                </div>
							</div>

							<div class="mb-3">
								<input type="checkbox" class="form-check-input" id="exampleCheck1" onclick="myFunction()">
								    <label class="form-check-label" for="exampleCheck1"> Show Password</label>
								    <script>
				                    function myFunction() {
				                      var x = document.getElementById("myInput");
				                      if (x.type === "password") {
				                        x.type = "text";
				                      } else {
				                        x.type = "password";
				                      }
				                    }
				                  </script>
							</div>

							<div class="mb-3">
								<div class="d-grid gap-2">
									<input type="submit" name="login" class="btn btn-dark px-5 quBtn" value="User Log in">
								</div>								
							</div>

			                <div class="form-group">
			                	<i class="fa-regular fa-circle-question"></i> Not a Member? <a href="register.php">Signup Here</a>
			                </div>
			              </form>	

			              <!--  -->
							<?php  
								if (isset($_POST['login'])) {
								    $email 		= mysqli_real_escape_string($db, $_POST['email']);
								    $password 	= mysqli_real_escape_string($db, $_POST['password']);
								    $hassedPass = sha1($password);

								    $readSql = "SELECT * FROM role WHERE email='$email' AND status=1";
								    $readQuery = mysqli_query($db, $readSql);
								    $userCount = mysqli_num_rows($readQuery);

								    if ($userCount == 0) { ?>
								        <div class="alert alert-danger text-center my-2" role="alert">
								            Sorry!! No User Found. Try Again.
								        </div>
								    <?php } 
								    else {
								        $row = mysqli_fetch_assoc($readQuery);

								        if ($row['password'] === $hassedPass) {
								            $_SESSION['id'] 	= $row['id'];
								            $_SESSION['name'] 	= $row['name'];
								            $_SESSION['email'] 	= $row['email'];
								            $_SESSION['image'] 	= $row['image'];
								            $_SESSION['role'] 	= $row['role'];

								            // Role-based redirection
								            if ($_SESSION['role'] == 3) { // Admin Role
								                header("Location: index.php");
								            } else { // Unknown Role
								                session_destroy();
								                header("Location: index.php");
								            }
								        } else { ?>
								            <div class="alert alert-danger text-center my-2" role="alert">
								                Invalid Credentials. Try Again.
								            </div>
								        <?php }
								    }
								}

							?>
							<!--  -->				

						
						<!-- END : FORM -->
					</div>
				</div>


				
				<div class="col-lg-6">
					<div class="" style="border-left: 3px double #023021; padding: 0 2%;">
                        <h1 class="mt-5 mb-4" style="letter-spacing: 2px; color:#023021; font-size: 25px; font-weight:600;">Login Seller Account</h1>
                    </div>
					<div class="user bg-light p-5" style="border-top: 4px solid #ffc107; border-radius: 10px;">
						<!-- START : FORM -->
						<form action="" method="POST">
							<div class="mb-3">
								<label for="">Email Address</label>
								<div class="input-group form-group">
				                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="enter your email..." aria-label="emailHelp" aria-describedby="basic-addon2" required autocomplete="off">
				                  <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-envelope"></i></span>
				                </div>
							</div>

							<div class="mb-3">
								<label for="">Password</label>
								<div class="input-group form-group">
				                  <input type="password" name="password" class="form-control" id="myInput" placeholder="enter your password..." required autocomplete="off">
				                  <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-lock"></i></span>
				                </div>
							</div>

							<div class="mb-3">
								<input type="checkbox" class="form-check-input" id="exampleCheck2" onclick="myFunction()">
								    <label class="form-check-label" for="exampleCheck2"> Show Password</label>
								    <script>
				                    function myFunction() {
				                      var x = document.getElementById("myInput");
				                      if (x.type === "password") {
				                        x.type = "text";
				                      } else {
				                        x.type = "password";
				                      }
				                    }
				                  </script>
							</div>

							<div class="mb-3">
								<div class="d-grid gap-2">
									<input type="submit" name="sellogin" class="btn btn-dark px-5 quBtn" value="Seller Log in">
								</div>								
							</div>

			                <div class="form-group">
			                	<i class="fa-regular fa-circle-question"></i> Not a Member? <a href="sellerregister.php">Signup Here</a>
			                </div>
			              </form>	
			              <!--  -->
							<?php  
								if (isset($_POST['sellogin'])) {
								    $email 		= mysqli_real_escape_string($db, $_POST['email']);
								    $password 	= mysqli_real_escape_string($db, $_POST['password']);
								    $hassedPass = sha1($password);

								    $readSql = "SELECT * FROM role WHERE email='$email' AND status=1";
								    $readQuery = mysqli_query($db, $readSql);
								    $userCount = mysqli_num_rows($readQuery);

								    if ($userCount == 0) { ?>
								        <div class="alert alert-danger text-center my-2" role="alert">
								            Sorry!! No User Found. Try Again.
								        </div>
								    <?php } 
								    else {
								        $row = mysqli_fetch_assoc($readQuery);

								        if ($row['password'] === $hassedPass) {
								            $_SESSION['id'] 	= $row['id'];
								            $_SESSION['name'] 	= $row['name'];
								            $_SESSION['email'] 	= $row['email'];
								            $_SESSION['image'] 	= $row['image'];
								            $_SESSION['role'] 	= $row['role'];

								            // Role-based redirection
								            if ($_SESSION['role'] == 4) { // Admin Role
								                header("Location: sellerDashboard.php");
								            } else { // Unknown Role
								                session_destroy();
								                header("Location: index.php");
								            }
								        } else { ?>
								            <div class="alert alert-danger text-center my-2" role="alert">
								                Invalid Credentials. Try Again.
								            </div>
								        <?php }
								    }
								}

							?>
							<!--  -->					

						
						<!-- END : FORM -->
					</div>
				</div>
			</div>
		</div>
	</section>
</main>
<?php include"inc/footer.php"; ?>