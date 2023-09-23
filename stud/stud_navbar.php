<?php
$user_id = $_SESSION["reg"]; // Assuming 'reg' is the correct column name
$query = "SELECT * FROM stud WHERE reg = '$user_id'";

// Execute the query
$result = mysqli_query($connect, $query);

// Check if the query was successful
if ($result) {
  $row = mysqli_fetch_assoc($result);
} else {
  // Handle the error if the query fails
  die("Error: " . mysqli_error($connect));
}
?>
<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 d-flex flex-row fixed-top">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="../index.php"><img src="../admin/include/HO_LOGO.png" alt="logo"></a>
          <a class="navbar-brand brand-logo-mini" href="../index.php"><img src="../admin/include/ho_login.png" class="w-50 h-40" alt="logo"></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
 
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                <img src="./include/img/admin_logo1.png" class="rounded-circle float-right" alt="">
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black">Welcome<?php echo " ".$_SESSION['name'];?></p>
                </div><i class="mdi mdi-menu-down mdi-24px text-primary"></i>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" style="color: black;" href="./stud_profile.php">
              <i class="mdi mdi-account mr-2 text-primary"></i> Profile </a>
                <a class="dropdown-item" style="color: black;" href="../logout.php">
                  <i class="mdi mdi-logout mr-2 text-primary"></i>Signout </a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
</nav>
