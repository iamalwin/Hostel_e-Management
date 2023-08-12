<?php
include("../dbconnect.php");
extract($_POST);
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>get_feed</title>
  <link rel="stylesheet" href="../admin/include/materialdesignicons.min.css">
  <link rel="stylesheet" href="../admin/include/vendor.bundle.base.css">
  <link rel="stylesheet" href="../admin/include/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../dist/css/style.min.css">
  <link rel="stylesheet" href="../admin/include/style.css">
  <link rel="shortcut icon" href="../admin/include/ho_login.png">
  <link rel="stylesheet" href="../admin/include/exstyle.css">

  <style>
    .rbtn button {
      text-align: center;
      color: red;
      display: flex;
      width: 30px;
      height: 30px;
      border-radius: 50px;
      justify-content: center;
      align-items: center;
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
     <?php include 'stud_navbar.php' ?>
    </header>

    <div class="container-fluid page-body-wrapper pt-0 proBanner-padding-top">
      <div class="navcantainer d-fixed">
        <?php include 'stud_sidebar.php' ?>
      </div>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-chart-bar menu-icon"></i>
              </span> Feedback
            </h3>
          </div>
              <form method="POST">
          <div class="grid-margin card p-5 stretch-card">
            <table class="table table-responsive-xl">

              <thead class="grid-margin bg-light fs-1 fw-bolder">
                <tr>
                  <th>Reg No</th>
                  <th>Name</th>
                  <th>Subject</th>
                  <th>Complaints / suggestion</th>
                  <th>Status</th>
                  <!-- <th>Action</th> -->
                </tr>
              </thead>

              <?php
              $qry = mysqli_query($connect, "select * from suggest");
              $i = 1;
              while ($row = mysqli_fetch_array($qry)) {
                $reg = $row['reg'];
              ?>

                <tr class="alert " role="alert">
                  <td>
                    <div><?php echo $row['reg']; ?></div>
                  </td>
                  <td>
                    <div><?php echo $row['name']; ?></div>
                  </td>
                  <td>
                    <div><?php echo $row['sub']; ?></div>
                  </td>
                  <td>
                    <div><?php echo $row['cmpl']; ?></div>
                  </td>
                  <!-- <td class="rbtn">
                    <button class="btn btn--radius-50 btn--blue  btn-primary" id="btn1" type="submit" name="btn1">Solved</button>
                  </td> -->
                  <div class="request">
                  <td><?php echo $row['status']; ?></td>    </div>
                </tr>
              <?php
                $i++;
              }

              ?>
            </table>
          </div>
		  </form>
        </div>

      </div>
      <footer class="footer">
        <div class="container-fluid clearfix">
          <span class="text-muted d-block text-center text-sm-left d-sm-inline-block"></span>
          <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"></span>
        </div>
      </footer>
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
    document.addEventListener('DOMContentLoaded', () => {
    const statusElement = document.getElementById('status');

    // Listen for messages from admin's side
    window.addEventListener('message', event => {
        if (event.data.action === 'solveRequest') {
            // Change the status text and icon on student's side
            statusElement.textContent = 'Solved';
            statusElement.classList.add('solved');
        }
    });
});

  </script>
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


<script>
  document.addEventListener('DOMContentLoaded', () => {
    const solveButton = document.getElementById('solveButton');

    solveButton.addEventListener('click', () => {
        // Send a message to student's side to change the icon
        window.postMessage({ action: 'solveRequest' }, '*');
    });
});

</script>

</body>

</html>