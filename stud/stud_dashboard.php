<!DOCTYPE html>
<!-- saved from url=(0054)https://www.bootstrapdash.com/demo/purple-admin-free/# -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Required meta tags -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="./Purple Admin_files/materialdesignicons.min.css">
    <link rel="stylesheet" href="./Purple Admin_files/vendor.bundle.base.css">


    <!-- Add this link to your HTML head section -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">

<link rel="stylesheet" href="../dist/css/style.min.css">

<style>
  #liveDate, #liveTime {
    display: contents;
            font-size: 20px;
            width: 100%;
        }
        .page-title, .date, .time {
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 10px;
            display: inline-block;
        }

</style>

    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="./Purple Admin_files/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="https://www.bootstrapdash.com/demo/purple-admin-free/assets/images/favicon.ico">
  <style type="text/css">/* Chart.js */
@keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}</style></head>
  <body class="">
    <div class="container-scroller">

      <!-- Preloader - style you can find in spinners.css -->
    
      <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 d-flex flex-row fixed-top">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="https://www.bootstrapdash.com/demo/purple-admin-free/index.html"><img src="./Purple Admin_files/logo.svg" alt="logo"></a>
          <a class="navbar-brand brand-logo-mini" href="https://www.bootstrapdash.com/demo/purple-admin-free/index.html"><img src="./Purple Admin_files/logo-mini.svg" alt="logo"></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
 

          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="https://www.bootstrapdash.com/demo/purple-admin-free/#" data-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="./Purple Admin_files/face1.jpg" alt="image">
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black">Admin</p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../index.php">
                  <i class="mdi mdi-logout mr-2 text-primary"></i> Signout </a>
              </div>
            </li>


          </ul>

          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>



      <!-- partial -->
      <div class="container-fluid page-body-wrapper pt-0 proBanner-padding-top">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#home" class="nav-link">
                <div class="nav-profile-image">
                  <img src="./Purple Admin_files/face1.jpg" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2">Hostel</span>
                  <span class="text-secondary text-small">Admin</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>


            <li class="nav-item active">
              <a class="nav-link" href="#">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>



            <li class="nav-item">
              <a class="nav-link" href="#">
                <span class="menu-title">Students Details</span>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">
                <span class="menu-title">Students Registration</span>
                <i class="mdi mdi-account-plus menu-icon"></i>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">
                <span class="menu-title">Fees</span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./stud_feedback.php">
                <span class="menu-title">Feedback</span>
                <i class="mdi mdi-chart-bar menu-icon"></i>
              </a>
            </li>



          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">

          <!-- dash section -->

            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard
              </h3>

              <nav aria-label="breadcrumb row-5 bg-gradient-primary">
              <h3 class="page-title">
                    <span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-calendar align-middle"></i></span> 
                    <div class="date" id="liveDate"></div>
                    <div class="time" id="liveTime"></div>
              </h3>
              </nav>
            </div>

            <!-- Dash data section -->

            <!-- <div class="row">
              <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">
                    <img src="./Purple Admin_files/circle.svg" class="card-img-absolute" alt="circle-image">
                    <h4 class="font-weight-normal mb-1">Weekly Sales <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-1">$ 15,0000</h2>
                    <h6 class="card-text">sed by 60%</h6>
                  </div>
                </div>
              </div>
              <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                    <img src="./Purple Admin_files/circle.svg" class="card-img-absolute" alt="circle-image">
                    <h4 class="font-weight-normal mb-1">Weekly Sales <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-1">$ 15,0000</h2>
                    <h6 class="card-text">Increased by 60%</h6>
                  </div>
                </div>
              </div>
              <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-warning card-img-holder text-white">
                  <div class="card-body">
                    <img src="./Purple Admin_files/circle.svg" class="card-img-absolute" alt="circle-image">
                    <h4 class="font-weight-normal mb-1">Weekly Orders <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-1">45,6334</h2>
                    <h6 class="card-text">Decreased by 10%</h6>
                  </div>
                </div>
              </div>
              <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                  <div class="card-body">
                    <img src="./Purple Admin_files/circle.svg" class="card-img-absolute" alt="circle-image">
                    <h4 class="font-weight-normal mb-1">Visitors Online <i class="mdi mdi-diamond mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-1">95,5741</h2>
                    <h6 class="card-text">Increased by 5%</h6>
                  </div>
                </div>
              </div>

          </div>
 content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid clearfix">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin template</a> from Bootstrapdash.com</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="./Purple Admin_files/vendor.bundle.base.js.download"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="./Purple Admin_files/Chart.min.js.download"></script>
    <script src="./Purple Admin_files/jquery.cookie.js.download" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="./Purple Admin_files/off-canvas.js.download"></script>
    <script src="./Purple Admin_files/hoverable-collapse.js.download"></script>
    <script src="./Purple Admin_files/misc.js.download"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="./Purple Admin_files/dashboard.js.download"></script>
    <script src="./Purple Admin_files/todolist.js.download"></script>
    <!-- End custom js for this page -->
  

    <!-- Date & time -->
    <script>
        function updateDateTime() {
            var dateElement = document.getElementById('liveDate');
            var timeElement = document.getElementById('liveTime');
            var now = new Date();

            var formattedDate = now.getFullYear() + '-' + 
                                padNumber(now.getMonth() + 1) + '-' + 
                                padNumber(now.getDate());

            var formattedTime = padNumber(now.getHours()) + ':' + 
                                padNumber(now.getMinutes()) + ':' + 
                                padNumber(now.getSeconds());

            dateElement.textContent = formattedDate;
            timeElement.textContent = formattedTime;
        }

        function padNumber(number) {
            return (number < 10 ? '0' : '') + number;
        }

        // Update the date and time every second (1000ms)
        setInterval(updateDateTime, 1000);
    </script>
</body>
</html>
In this updated version, we've introduced two new <div> elements with classes "date" and "time" to hold the date and time separately. The CSS styles for these classes define the font size and colors to make them visually distinguishable.

With these changes, the date and time will be displayed in separate elements, and each will update dynamically every second. The date will be shown in blue (#007bff), and the time will be shown in orange (#ff5722). Save the file and open it in your web browser to see the updated live date and time display with separate date and time elements.









<!-- Bootstrap tether Core JavaScript -->
<script src="../assets/libs/jquery/dist/jquery.min.js "></script>
<script src="../assets/libs/popper.js/dist/umd/popper.min.js "></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>


<!-- This page plugin js -->

<script>
$(".preloader ").fadeOut();
</script>

</body></html>