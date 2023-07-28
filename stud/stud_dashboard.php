<?php
include("../dbconnect.php");
extract($_POST);
session_start();


// Check if the user is logged in and the user's name is set in the session
if (isset($_SESSION['stud_id'])) {
  $user_name = $_SESSION['stud_id'];
} else {
  // If the user is not logged in, redirect them to the login page or perform any other action
  header("Location: ../stud_login.php");
  exit();
}
// // Fetch the logged-in user's name from the database
// $loggedInUsername = $_SESSION['stud_id'];

// // Prepare and execute the SQL query to fetch the user's name from the "stud" table
// $query = "SELECT name FROM stud WHERE stud_id = '$loggedInUsername'";
// $result = mysqli_query($connect, $query);

// // Check if the query was successful and if the user was found
// if ($result && mysqli_num_rows($result) === 1) {
//     $row = mysqli_fetch_assoc($result);
//     $userName = $row['name'];
// } else {
//     // Handle the case when the user is not found in the "stud" table or any other error
//     $userName = "User Not Found";
// }

// // Close the database connection
// mysqli_close($connect);
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
  <link rel="stylesheet" href="../admin/include/materialdesignicons.min.css">
  <link rel="stylesheet" href="../admin/include/vendor.bundle.base.css">



  <!-- Add this link to your HTML head section -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">

  <link rel="stylesheet" href="../dist/css/style.min.css">
<link rel="stylesheet" href="./include/style.css">


  <!-- Layout styles -->
  <link rel="stylesheet" href="../admin/include/style.css">
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
      <!-- <?php include './stud_navbar.php' ?> -->
    </header>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper pt-0 proBanner-padding-top">
      <!-- partial:partials/_sidebar.html -->
      <div class="navcantainer d-fixed">
        <?php include './stud_sidebar.php' ?>
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

<?= $_SESSION['re'];
?>

          <?php 

/*$user = $_SESSION['UNSER_NAME'];
 $query = mysqli_query($conn,"select * from admin_login where username = '$user'");
 $row =mysqli_fetch_array($query);
 $id = $row['id'];


   /* $sel = "SELECT * FROM admin_login"; 
    $query = mysqli_query($conn,$sel);
    $resul = mysqli_fetch_assoc($query);*/
?>
          <!-- Dash data section -->

          <!-- <?php
// Assuming you have already established a database connection and assigned it to $connect

$sel = "SELECT * FROM stud";
$query = mysqli_query($connect, $sel);

// Loop through the result set and display the "name" column for each row
while ($row = mysqli_fetch_assoc($query)) {
    $name = $row['name'];
    echo $name . "<br>";
}
?> -->
 <?php echo $user_name; ?>
          <!-- <h1>Welcome to the Dashboard, <?php echo $user_name; ?>!</h1> -->
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../admin/include/vendor.bundle.base.js.download"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../admin/include/Chart.min.js.download"></script>
    <script src="../admin/include/jquery.cookie.js.download" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../admin/include/off-canvas.js.download"></script>
    <script src="../admin/include/hoverable-collapse.js.download"></script>
    <script src="../admin/include/misc.js.download"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../admin/include/dashboard.js.download"></script>
    <script src="../admin/include/todolist.js.download"></script>
    <!-- End custom js for this page -->


    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/jquery/dist/jquery.min.js "></script>
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js "></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>

      <script src="../admin/include/vendor.bundle.base.js.download"></script>
    <!-- This page plugin js -->

    <script>
      $(".preloader ").fadeOut();
    </script>

</body>

</html>