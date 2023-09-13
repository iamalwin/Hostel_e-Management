<?php
include("../dbconnect.php");
extract($_POST);
session_start();


// Update the database to mark the task as solved
$sql = "UPDATE suggest SET status = 'solved' WHERE id = id"; // Assuming task ID is 1

if ($connect->query($sql) === TRUE) {
    echo "Task marked as solved successfully!";
} else {
    echo "Error updating record: " . $connect->error;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>get_feed</title>
  <link rel="stylesheet" href="./include/materialdesignicons.min.css">
  <link rel="stylesheet" href="./include/vendor.bundle.base.css">
  <link rel="stylesheet" href="./include/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../dist/css/style.min.css">
  <link rel="stylesheet" href="./include/style.css">
  <link rel="shortcut icon" href="./include/ho_login.png">
  <link rel="stylesheet" href="./include/exstyle.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

    <!-- <div class="preloader">
      <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
      </div>
    </div> -->

    <header class="topbar" data-navbarbg="skin6">
     <?php include 'navbar.php' ?>
    </header>

    <div class="container-fluid page-body-wrapper pt-0 proBanner-padding-top">
      <div class="navcantainer d-fixed">
        <?php include 'sidebar.php' ?>
      </div>
      <div class="main-panel">
        <div class="content-wrapper p-4">

          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-chart-bar menu-icon"></i>
              </span> Feedback
            </h3>
          </div>
              <form method="POST">
          <div class="grid-margin card p-2 stretch-card">
            <table class="table table-responsive-xl">

              <thead class="grid-margin bg-light fs-1 fw-bolder">
                <tr>
                  <th>Reg No</th>
                  <th>Name</th>
                  <th>Subject</th>
                  <th>Complaints / suggestion</th>
                  <!-- <th>Action</th> -->
                  <th>Action</th>
                </tr>
              </thead>

              <?php
              $qry = mysqli_query($connect, "select * from suggest");
              $i = 1;
              while ($row = mysqli_fetch_array($qry)) {
                $reg = $row['reg'];
              ?>
                <tr>
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
                    <textarea name="" id="" style="background-color:white;border-color:white; width:100%;" cols="70" rows="3" disabled><?php echo $row['cmpl']; ?></textarea>
                  </td>
                  <!-- <td class="rbtn">
                    <button class="btn btn--radius-50 btn--blue  btn-primary" id="btn1" type="submit" name="btn1">Solved</button>
                  </td> -->
                  <td>
                  <button class="rounded-pill btn--blue btn pt-2 pb-2 pr-2 pl-2 btn-primary" id="solveButton">Solve</button>                </td>
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
  <script src="../admin/include/vendor.bundle.base.js.download"></script>

<script>
$(document).ready(function() {
    $("#solveButton").on("click", function() {
        $.ajax({
            url: "mark_as_solved.php",
            type: "POST",
            success: function(response) {
                console.log(response);
                // Update the button content to include a checkmark icon
                $("#solveButton").html('Solved <i class="fas fa-check"></i>');
            }
        });
    });
});
</script>

  <script>
$(document).ready(function() {
    $("#solveButton").on("click", function() {
        $.ajax({
            url: "mark_as_solved.php",
            type: "POST",
            success: function(response) {
                console.log(response);
            }
        });
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



</body>

</html>