<?php
include("../dbconnect.php");
extract($_POST);
session_start();

if (!isset($_SESSION["reg"])) {
  header("Location: ../stud_login.php");
  exit();
}

$user_id = $_SESSION["reg"];
$query = "SELECT * FROM stud WHERE reg = '$user_id'";

$result = mysqli_query($connect, $query);

if ($result) {
  $row = mysqli_fetch_assoc($result);
} else {
  die("Error: " . mysqli_error($connect));
}
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

  <style>
    .card-img-holder a {
      text-decoration: none;
      color: white;
      font-family: Georgia, 'Times New Roman', Times, serif;
    }

    .bg-gradient {
      background: linear-gradient(45deg, #94a2b3, #cbddf2);
      color: white;
      padding: 20px;
    }
  </style>
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
              </span> Profile
            </h3>
          </div>

          <div class="formbold-main-wrapper card d-flex justify-content-center align-items-center">
              <form method="post" class="col-10">

                <img src="./include/img/<?php echo $row['image']; ?>" class="rounded-circle float-right" alt="...">

                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <div class="row">
                  <div class="m-1 col-md-5">
                    <div style="margin-top:10px">
                      <label for="name">Name</label><br>
                      <input type="text" name="name" disabled value="<?php echo $row['name']; ?>" style="padding: 5px; background-color:white; border: 1px solid #ccc; border-radius: 4px;">
                    </div>
                    <div style="margin-top: 10px;">
                      <label for="reg">Registration</label><br>
                      <input type="text" name="reg" disabled value="<?php echo $row['reg']; ?>" style="padding: 5px; background-color:white; border: 1px solid #ccc; border-radius: 4px;">
                    </div>
                  </div>
                  <div class="m-1 col-md-5">
                    <div style="margin-top:10px">
                      <label for="dept">Dept</label><br>
                      <input type="text" name="dept" disabled value="<?php echo $row['dept']; ?>" style="padding: 5px; background-color:white; border: 1px solid #ccc; border-radius: 4px;">
                    </div>
                    <div style="margin-top: 10px;">
                      <label for="year">Year</label><br>
                      <input type="text" name="year" disabled value="<?php echo $row['year']; ?>" style="padding: 5px; background-color:white; border: 1px solid #ccc; border-radius: 4px;">
                    </div>
                  </div>

                  <div class="m-1 col-md-5">
                    <div style="margin-top:10px">
                      <label for="email">Email</label><br>
                      <input type="text" name="email" disabled value="<?php echo $row['email']; ?>" style="padding: 5px; background-color:white; border: 1px solid #ccc; border-radius: 4px;">
                    </div>
                    <div style="margin-top:10px">
                      <label for="fathname">Father Name</label><br>
                      <input type="text" name="fathname" disabled value="<?php echo $row['fathname']; ?>" style="padding: 5px; background-color:white; border: 1px solid #ccc; border-radius: 4px;">
                    </div>
                  </div>

                  <div class="m-1 col-md-5">
                    <div style="margin-top:10px">
                      <label for="fathphone">Father Phone</label><br>
                      <input type="text" name="fathphone" disabled value="<?php echo $row['fathphone']; ?>" style="padding: 5px; background-color:white; border: 1px solid #ccc; border-radius: 4px;">
                    </div>
                    <div style="margin-top: 10px;">
                      <label for="age">Age:</label><br>
                      <input type="text" name="age" disabled value="<?php echo $row['age']; ?>" style="padding: 5px; background-color:white; border: 1px solid #ccc; border-radius: 4px;">
                    </div>
                  </div>

                  <div class="m-1 col-md-5">
                    <div style="margin-top:10px">
                      <label for="dob">Dob</label><br>
                      <input type="text" name="dob" disabled value="<?php echo $row['dob']; ?>" style="padding: 5px; background-color:white; border: 1px solid #ccc; border-radius: 4px;">
                    </div>
                    <div style="margin-top: 10px;">
                      <label for="bldgrp">B-Group</label><br>
                      <input type="text" name="bldgrp" disabled value="<?php echo $row['bldgrp']; ?>" style="padding: 5px; background-color:white; border: 1px solid #ccc; border-radius: 4px;">
                    </div>
                  </div>

                  <div class="m-1 col-md-5">
                    <div style="margin-top:10px">
                      <label for="email">Email</label><br>
                      <input type="text" name="email" disabled value="<?php echo $row['email']; ?>" style="padding: 5px; background-color:white; border: 1px solid #ccc; border-radius: 4px;">
                    </div>
                    <div style="margin-top: 10px;">
                      <label for="phone">Phone</label><br>
                      <input type="text" name="phone" disabled value="<?php echo $row['phone']; ?>" style="padding: 5px; background-color:white; border: 1px solid #ccc; border-radius: 4px;">
                    </div>
                  </div>

                  <div class="m-1 col-md-5">
                    <div style="margin-top:10px">
                      <label for="address">Address</label><br>
                      <textarea name="address" cols="22" rows="3" disabled style="padding: 5px; background-color:white; border: 1px solid #ccc; border-radius: 4px; display:block"><?php echo $row['address']; ?></textarea>
                    </div>
                  </div>

                </div>
              </form>
          </div>
        </div>
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