<?php
include('../dbconnect.php');
session_start();
?>

<!-- stud count php -->
<?php
include("../dbconnect.php");
$query = "SELECT COUNT(*) AS total_students FROM stud";
$result = mysqli_query($connect, $query);
if ($result) {
  $row = mysqli_fetch_assoc($result);
  $totalStudents = $row['total_students'];
} else {
  $totalStudents = 0;
}
?>

<?php
include("../dbconnect.php");
$query = "SELECT COUNT(*) AS total_feed FROM suggest";
$result = mysqli_query($connect, $query);
if ($result) {
  $row = mysqli_fetch_assoc($result);
  $totalfeed = $row['total_feed'];
} else {
  $totalSfeed = 0;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Hostel_Admin</title>
  <link rel="stylesheet" href="./include/materialdesignicons.min.css">
  <link rel="stylesheet" href="./include/vendor.bundle.base.css">
  <link rel="stylesheet" href="./include/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">

  <link rel="stylesheet" href="../dist/css/style.min.css">

  <link rel="stylesheet" href="./include/style.css">
  <link rel="shortcut icon" href="./include/ho_login.png">
  <link rel="stylesheet" href="./include/exstyle.css">

  <style>
    .card-img-holder a {
      text-decoration: none;
      color: white;
      font-family: Georgia, 'Times New Roman', Times, serif;
    }
  </style>
</head>

<body class="">
  <div class="container-scroller">

    <!-- Preloader --->

    <div class="preloader">
      <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
      </div>
    </div>

    <?php include './navbar.php' ?>

    <div class="container-fluid page-body-wrapper pt-0 proBanner-padding-top">
      <?php include 'sidebar.php' ?>

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
              <h5 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-calendar align-middle"></i></span>
                <?php $currentDate = date('d-m-Y');
                echo $currentDate; ?>
              </h5>
            </nav>
          </div>

          <!-- Dash data section -->


          <div class="row">
            <div class="col-md-5 stretch-card grid-margin">
              <div class="card bg-gradient-info card-img-holder text-white">
                <a href="./Stud_detail.php">
                  <div class="card-body">
                    <img src="./include/circle.svg" class="card-img-absolute" alt="circle-image">
                    <h2 class="font-weight-normal mb-1">
                      <i class="mdi mdi-account mdi-24px  float-right"></i>

                      <!-- studends count -->
                      <?php echo "Total Students: " . $totalStudents; ?>
                    </h2>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-md-5 stretch-card grid-margin">
              <div class="card bg-gradient-danger card-img-holder text-white">

                <a href="./get_feedback.php">
                  <div class="card-body">
                    <img src="./include/circle.svg" class="card-img-absolute" alt="circle-image">
                    <h2 class="font-weight-normal mb-1">
                      <i class="mdi mdi-chart-line mdi-24px float-right"></i>

                      <!-- studends count -->
                      <?php echo "Total Feedback: " . $totalfeed; ?>
                    </h2>
                  </div>
                </a>

              </div>
            </div>
            <!--  <div class="col-md-3 stretch-card grid-margin">
              <div class="card bg-gradient-warning card-img-holder text-white">
                <div class="card-body">
                  <img src="./include/circle.svg" class="card-img-absolute" alt="circle-image">
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
                  <img src="./include/circle.svg" class="card-img-absolute" alt="circle-image">
                  <h4 class="font-weight-normal mb-1">Visitors Online <i class="mdi mdi-diamond mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-1">95,5741</h2>
                  <h6 class="card-text">Increased by 5%</h6>
                </div>
              </div>
            </div> -->
          </div>


          <div class="col-md-7 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">

                <h1 class="card-title" style="font-size: 1.5rem; color: skyblue; font-weight:bolder;">Time table</h1>

                <table class="table table-responsive-xl">
                  <tr style="color: skyblue; font-weight:bolder;">
                    <th>schedule</th>
                    <th>Time</th>
                  </tr>

                  <tr>
                    <td>Mass</td>
                    <td>6:30 - 7:30</td>
                  </tr>

                  <tr>
                    <td>Break Fast</td>
                    <td>7:30 - 8:30</td>
                  </tr>

                  <tr>
                    <td>Launch</td>
                    <td>12:30 - 1:30</td>
                  </tr>
                  <tr>
                    <td>Eveing Prayer</td>
                    <td>6:30 - 7:00 </td>
                  </tr>
                  <tr>
                    <td>Dennar</td>
                    <td>7:00 - 8:30</td>
                  </tr>
                  <tr>
                    <td>Study Hour</td>
                    <td>8:30 - 10:00</td>
                  </tr>

                </table>
              </div>
            </div>
            </div>
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
    </div>
  </div>
  </div>
  <script src="./include/vendor.bundle.base.js.download"></script>
  <script src="./include/Chart.min.js.download"></script>
  <script src="./include/jquery.cookie.js.download" type="text/javascript"></script>
  <script src="./include/off-canvas.js.download"></script>
  <script src="./include/hoverable-collapse.js.download"></script>
  <script src="./include/misc.js.download"></script>
  <script src="./include/dashboard.js.download"></script>
  <script src="./include/todolist.js.download"></script>
  <script src="../assets/libs/jquery/dist/jquery.min.js "></script>
  <script src="../assets/libs/popper.js/dist/umd/popper.min.js "></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>
  <script src="../assets/home_img/popper.js.download"></script>

  <script src="../assets/libs/jquery/dist/jquery.min.js.download"></script>

  <script src="./include/vendor.bundle.base.js.download"></script>
  <script>
    function toggleCollapse(event) {
      event.preventDefault();
      var target = event.target;
      var parent = target.closest('.nav-item');
      var collapse = parent.querySelector('.collapse');
      var icon = parent.querySelector('.menu-icon');

      if (collapse.style.display === 'none') {
        collapse.style.display = 'block';
        icon.classList.add('rotate');
      } else {
        collapse.style.display = 'none';
        icon.classList.remove('rotate');
      }
    }

    var collapsedLinks = document.querySelectorAll('.nav-link.collapsed');
    for (var i = 0; i < collapsedLinks.length; i++) {
      collapsedLinks[i].addEventListener('click', toggleCollapse);
    }
  </script>


  <script>
    $(".preloader ").fadeOut();
  </script>

</body>

</html>