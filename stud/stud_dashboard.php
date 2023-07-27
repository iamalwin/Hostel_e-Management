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
  <title>Hotel_Management</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../admin/Purple Admin_files/materialdesignicons.min.css">
  <link rel="stylesheet" href="../admin/Purple Admin_files/vendor.bundle.base.css">



  <!-- Add this link to your HTML head section -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">

  <link rel="stylesheet" href="../dist/css/style.min.css">
<link rel="stylesheet" href="./include/style.css">

  <!-- Layout styles -->
  <link rel="stylesheet" href="../admin/Purple Admin_files/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="https://www.bootstrapdash.com/demo/purple-admin-free/assets/images/favicon.ico">

</head>

<body class="">
  <div class="container-scroller">

    <!-- Preloader - style you can find in spinners.css -->

    <!-- <div class="preloader">
      <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
      </div>
    </div> -->

    <!-- partial:partials/_navbar.html -->

    <!-- partial:partials/_navbar.html -->
    <header class="topbar" data-navbarbg="skin6">
      <?php include './include/stud_navbar.php' ?>
    </header>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper pt-0 proBanner-padding-top">
      <!-- partial:partials/_sidebar.html -->
      <div class="navcantainer d-fixed">
        <?php include './include/stud_sidebar.php' ?>
      </div>
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
          </div>

          <?php 

   /* $sel = "SELECT * FROM admin_login"; 
    $query = mysqli_query($conn,$sel);
    $resul = mysqli_fetch_assoc($query);*/
?>
          <!-- Dash data section -->
          <h3><?php echo $_SESSION['UNSER_NAME']; ?> </h3>

          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../admin/Purple Admin_files/vendor.bundle.base.js.download"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../admin/Purple Admin_files/Chart.min.js.download"></script>
    <script src="../admin/Purple Admin_files/jquery.cookie.js.download" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../admin/Purple Admin_files/off-canvas.js.download"></script>
    <script src="../admin/Purple Admin_files/hoverable-collapse.js.download"></script>
    <script src="../admin/Purple Admin_files/misc.js.download"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../admin/Purple Admin_files/dashboard.js.download"></script>
    <script src="../admin/Purple Admin_files/todolist.js.download"></script>
    <!-- End custom js for this page -->


    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/jquery/dist/jquery.min.js "></script>
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js "></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>

      <script src="../admin/Purple Admin_files/vendor.bundle.base.js.download"></script>
    <!-- This page plugin js -->

    <script>
      $(".preloader ").fadeOut();
    </script>

</body>

</html>