<?php  
	session_start();
	ob_start();
	include "inc/db.php";

	if ( !empty($_SESSION['id']) || !empty($_SESSION['email']) ) {
		header("Location: dashboard.php");
		exit;
	}
?>
<!doctype html>
<html lang="en">


<!-- Mirrored from codervent.com/rukada/demo/vertical/authentication-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Jan 2023 17:33:39 GMT -->
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<title>Login</title>
</head>


<body class="bg-login">
	<!--wrapper-->
	<div class="wrapper">
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container-fluid">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
					
						<div class="card shadow-none">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="text-center mb-4">
										<h3 class="">Admin Sign In</h3>
										<p class="mb-0">Login to your account</p>
									</div>
									<div class="login-separater text-center mb-4"> <span>SIGN IN WITH EMAIL</span>
										<hr/>
									</div>
									<div class="form-body">
										<form action="" method="POST">
											<div class="mb-3">
												<label for="email" class="form-label">Email Address</label>
												<input type="email" name="email" class="form-control" id="email" placeholder="Email Address" required autocomplete="off">
											</div>
											<div class="mb-3">
												<label for="password" class="form-label">Enter Password</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" name="password" class="form-control border-end-0" id="password" placeholder="Enter Password" required autocomplete="off"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
												</div>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" name="adminSubmit" class="btn btn-primary"><i class="bx bxs-lock-open"></i> Sign in</button>
												</div>
											</div>
										</form>
										<!--  -->
										<?php  
											if (isset($_POST['adminSubmit'])) {
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
											            if ($_SESSION['role'] == 1) { // Admin Role
											                header("Location: dashboard.php");
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
										<div class="col-12 text-start pt-4">
											<a href="fieldlogin.php" class="btn btn-success">Field Checker</a>
											</p>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!--Password show & hide js -->
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
</body>


<!-- Mirrored from codervent.com/rukada/demo/vertical/authentication-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Jan 2023 17:33:39 GMT -->
</html>