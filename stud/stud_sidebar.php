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
<nav class="sidebar sidebar-offcanvas m-0 fixed-left d-flex" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#home" class="nav-link">
                <div class="nav-profile-image">
                <img src="./include/img/<?php echo $row['image']; ?>" class="rounded-circle float-right" alt="...">
                    <span class="login-status online"></span>
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2">Student</span>
                    <span class="text-secondary text-small"><?php echo " ".$_SESSION['name'];?></span>
                </div>
                <!-- <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i> -->
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link" href="./stud_dashboard.php">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Fees  <i class="mdi mdi-menu-down mdi-24px text-primary"></i>
</span>
                <i class="mdi mdi-credit-card menu-icon"></i>
            </a>
            <div class="collapse bg-light" style="border-radius: 50px;" id="ui-basic">
                <ul class="nav menu-title flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="./stud_feespay.php">Fees pay <i class="mdi mdi-cash-multiple menu-icon" style="margin-left: 15px;"></i></a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="./stud_feespayed.php">Payed Details <i class="mdi mdi-format-list-bulleted menu-icon"></i></a></li> -->
                </ul>
            </div>
        </li>

        <li class="nav-item">
        <a class="nav-link" href="./stud_feedback.php">
                <span class="menu-title">Feedback</span>
                <i class="mdi mdi-chart-bar menu-icon"></i>
            </a>
        </li>
    </ul>
</nav>