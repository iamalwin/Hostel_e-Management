<?php
include("../dbconnect.php");
extract($_POST);
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $query = "SELECT stud_id FROM stud WHERE username = '$username' AND password = '$password'";
  $result = mysqli_query($connect, $query);

  if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_assoc($result);
      $_SESSION["current_user_id"] = $row["stud_id"];
      header("Location: profile.php");
      exit();
  } else {
      echo "Invalid username or password.";
  }

}


// if (isset($_GET['logout'])) {
//     session_destroy();
//     unset($_SESSION['stud_id']);
//     header("location:../stud_login.php");
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Hotel_Management</title>
  <link rel="stylesheet" href="../admin/include/materialdesignicons.min.css">
  <link rel="stylesheet" href="../admin/include/vendor.bundle.base.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">

  <link rel="stylesheet" href="../dist/css/style.min.css">
<link rel="stylesheet" href="./include/style.css">
  <link rel="stylesheet" href="../admin/include/style.css">
  <link rel="shortcut icon" href="../admin/include/ho_login.png">

</head>

<body class="">
  <div class="container-scroller">

    <div class="preloader">
      <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
      </div>
    </div>
    <header class="topbar" data-navbarbg="skin6">
      <?php include './stud_navbar.php' ?>
    </header>

    <div class="container-fluid page-body-wrapper pt-0 proBanner-padding-top">
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



<?php 
/*$user = $_SESSION['UNSER_NAME'];
 $query = mysqli_query($conn,"select * from admin_login where username = '$user'");
 $row =mysqli_fetch_array($query);
 $id = $row['id'];

 ********************************************
 <!-- <?php $sel = "SELECT * FROM stud";
$query = mysqli_query($connect, $sel);

while ($row = mysqli_fetch_assoc($query)) {
    $name = $row['name'];
}?> -->
 *******************************************

   /* $sel = "SELECT * FROM admin_login"; 
    $query = mysqli_query($conn,$sel);
    $resul = mysqli_fetch_assoc($query);*/
?>
          <!-- Dash data section -->


<?php
$stud_id = $_SESSION['stud_id'];

$sel = "SELECT name FROM stud WHERE stud_id = $stud_id";
$query = mysqli_query($connect, $sel);

if ($row = mysqli_fetch_assoc($query)) {
    $name = $row['name'];
    echo "Welcome, " . $name;
} else {
    echo "User not found or not logged in.";
}
?>



 <?php echo $name; ?>
          <!-- <h1>Welcome to the Dashboard, <?php echo $user_name; ?>!</h1> -->

        </div>
      </div>
    </div>
    <script src="../admin/include/vendor.bundle.base.js.download"></script>
    <script src="../admin/include/Chart.min.js.download"></script>
    <script src="../admin/include/jquery.cookie.js.download" type="text/javascript"></script>
    <script src="../admin/include/off-canvas.js.download"></script>
    <script src="../admin/include/hoverable-collapse.js.download"></script>
    <script src="../admin/include/misc.js.download"></script>
    <script src="../admin/include/dashboard.js.download"></script>
    <script src="../admin/include/todolist.js.download"></script>
    <script src="../assets/libs/jquery/dist/jquery.min.js "></script>
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js "></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>
    <script src="../admin/include/vendor.bundle.base.js.download"></script>
    <script>
      $(".preloader ").fadeOut();
    </script>

</body>

</html>