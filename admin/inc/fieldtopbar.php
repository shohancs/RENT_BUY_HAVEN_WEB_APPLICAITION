<?php
session_start(); 
ob_start();
include "db.php";

// Check if the user is logged in
if (empty($_SESSION['id']) || empty($_SESSION['email'])) {
    header("Location: fieldlogin.php");
    exit;
}

// Fetch the logged-in user's data
$user_id = $_SESSION['id'];
$userQuery = "SELECT * FROM role WHERE id='$user_id' AND status=1";
$userResult = mysqli_query($db, $userQuery);
$userData = mysqli_fetch_assoc($userResult);

// If no user is found, redirect to login
if (!$userData) {
    session_destroy();
    header("Location: index.php");
    exit;
}

// Assign user data to variables
$user_name = $userData['name'];
$user_email = $userData['email'];
$user_image = $userData['image'];
?>
<!--start header -->
<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i></div>
            
            <div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center">
							<li class="nav-item mobile-search-icon">
								<a class="nav-link" href="#">	<i class='bx bx-search'></i>
								</a>
							</li>
							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">	
								</a>
							</li>
							<li class="nav-item dropdown dropdown-large">
								
								<div class="dropdown-menu dropdown-menu-end">
									<div class="header-notifications-list">
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">View All Notifications</div>
									</a>
								</div>
							</li>
							<li class="nav-item dropdown dropdown-large">
								
								<div class="dropdown-menu dropdown-menu-end">
									
									<div class="header-message-list">
									</div>
								</div>
							</li>
						</ul>
					</div>
            
            <div class="user-box dropdown">
                <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <!-- Display user image -->
                    <img src="assets/images/role/<?php echo $user_image; ?>" style="width: 40px;" alt="User Image">
                    <div class="user-info ps-3">
                        <p class="user-name mb-0"><?php echo $user_name; ?></p>
                        <p class="designation mb-0"><?php echo $user_email; ?></p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="field_dashboard.php"><i class='bx bx-home-circle'></i><span>Dashboard</span></a></li>
                    <li>
                        <div class="dropdown-divider mb-0"></div>
                    </li>
                    <li><a class="dropdown-item" href="logout.php"><i class='bx bx-log-out-circle'></i><span>Logout</span></a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<!--end header -->
