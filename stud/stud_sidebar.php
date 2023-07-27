<nav class="sidebar sidebar-offcanvas m-0" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#home" class="nav-link">
                <div class="nav-profile-image">
                <img src="../admin/include/face1.jpg" alt="profile">
                    <span class="login-status online"></span>
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2">Hostel</span>
                    <span class="text-secondary text-small">Student</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link" href="./stud_dashboard.php">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>


        <!-- <li class="nav-item">
            <a class="nav-link" href="#">
                <span class="menu-title">Students Registration</span>
                <i class="mdi mdi-account-plus menu-icon"></i>
            </a>
        </li> -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Fees</span>
                <i class="mdi mdi-menu-down mdi-24px text-primary"></i>
                <i class="mdi mdi-credit-card menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav menu-title flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="./stud_feespay.php">Fees pay <i class="mdi mdi-cash-multiple menu-icon"></i></a></li>
                    <li class="nav-item"><a class="nav-link" href="./stud_feespayed.php">Payed Details <i class="mdi mdi-format-list-bulleted menu-icon"></i></a></li>
                </ul>
            </div>
        </li>

        <!-- <li class="nav-item">
            <a class="nav-link" href="./feespay.php">
                <span class="menu-title">Fees pay</span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
            </a>
        </li> -->
        <li class="nav-item">
        <a class="nav-link" href="./stud_feedback.php">
                <span class="menu-title">Feedback</span>
                <i class="mdi mdi-chart-bar menu-icon"></i>
            </a>
        </li>
    </ul>
</nav>