<?php
include("../dbconnect.php");
extract($_POST);
session_start();
?>
<!DOCTYPE html>
<!-- saved from url=(0054)https://www.bootstrapdash.com/demo/purple-admin-free/# -->
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Required meta tags -->

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>get_feed</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="./Purple Admin_files/materialdesignicons.min.css">
  <link rel="stylesheet" href="./Purple Admin_files/vendor.bundle.base.css">

  <!-- Layout styles -->
  <link rel="stylesheet" href="./Purple Admin_files/style.css">
  <!-- Add this link to your HTML head section -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">

  <link rel="stylesheet" href="../dist/css/style.min.css">

  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="./Purple Admin_files/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="./include/images/hs-logo.png  ">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="https://www.bootstrapdash.com/demo/purple-admin-free/assets/images/favicon.ico">
  <style type="text/css">
    /* Chart.js */
    @keyframes chartjs-render-animation {
      from {
        opacity: .99
      }

      to {
        opacity: 1
      }
    }

    .chartjs-render-monitor {
      animation: chartjs-render-animation 1ms
    }

    .chartjs-size-monitor,
    .chartjs-size-monitor-expand,
    .chartjs-size-monitor-shrink {
      position: absolute;
      direction: ltr;
      left: 0;
      top: 0;
      right: 0;
      bottom: 0;
      overflow: hidden;
      pointer-events: none;
      visibility: hidden;
      z-index: -1
    }

    .chartjs-size-monitor-expand>div {
      position: absolute;
      width: 1000000px;
      height: 1000000px;
      left: 0;
      top: 0
    }

    .chartjs-size-monitor-shrink>div {
      position: absolute;
      width: 200%;
      height: 200%;
      left: 0;
      top: 0
    }
  </style>
  <style>
    #liveDate,
    #liveTime {
      display: contents;
      font-size: 20px;
      width: 100%;
    }

    .page-title,
    .date,
    .time {
      background-color: #fff;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 20px;
      border-radius: 10px;
      display: inline-block;
    }
  </style>

</head>

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
    <header class="topbar" data-navbarbg="skin6">
      <?php include './include/navbar.php' ?>
    </header>


    <!-- partial -->
    <div class="container-fluid page-body-wrapper pt-0 proBanner-padding-top">
      <!-- partial:partials/_sidebar.html -->
      <div class="navcantainer d-fixed">
        <?php include './include/sidebar.php' ?>
      </div>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">

          <!-- dash section -->

          <div class="page-header">
            <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-chart-bar menu-icon"></i>
              </span> Feedback
            </h3>
          </div>

          <!-- Dash data section -->

<div class="col-md-12 card p-5 grid-margin stretch-card m-0">
          <table width="67%" border="0" align="center">
            <tr>
              <td width="16%">
                <div align="center" class="style6"><strong><strong>Reg No</strong> </div>
              </td>
              <td width="25%">
                <div align="center" class="style6"><strong>Student Name</strong> </div>
              </td>
              <td width="22%">
                <div align="center" class="style6"><strong>Subject </strong></div>
              </td>
              <td width="37%">
                <div align="center" class="style6"><strong>Complaints/suggestion </strong></div>
              </td>
            </tr>

            <tr>
              <td colspa="8">&nbsp;</td>
            </tr>
            <?php
            $qry = mysqli_query($connect, "select * from suggest");
            $i = 1;
            while ($row = mysqli_fetch_array($qry)) {
              $reg = $row['reg'];
            ?>

              <tr>
                <td height="20">
                  <div align="center"><?php echo $row['reg']; ?></div>
                </td>
                <td>
                  <div align="center"><?php echo $row['name']; ?></div>
                </td>
                <td>
                  <div align="center"><?php echo $row['sub']; ?></div>
                </td>
                <td>
                  <div align="center"><?php echo $row['cmpl']; ?></div>
                </td>
              </tr>
              <tr>
                <td height="22" colspa="8">&nbsp;</td>
              </tr>
            <?php
              $i++;
            }

            ?>
          </table>
          </div>  
        </div>

      </div>
      <!-- content-wrapper ends -->
      <!-- partial:partials/_footer.html -->
      <footer class="footer">
        <div class="container-fluid clearfix">
          <span class="text-muted d-block text-center text-sm-left d-sm-inline-block"></span>
          <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"></span>
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
  <!-- Bootstrap tether Core JavaScript -->
  <script src="../assets/libs/jquery/dist/jquery.min.js "></script>
  <script src="../assets/libs/popper.js/dist/umd/popper.min.js "></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>


  <!-- This page plugin js -->

  <script>
    $(".preloader ").fadeOut();
  </script>

</body>

</html>