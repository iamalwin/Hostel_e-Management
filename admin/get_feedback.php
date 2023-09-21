<?php
include('../dbconnect.php');
session_start();

if (!isset($_SESSION["name"])) {
  header("Location: ./admin_login.php");
  exit();
}

$successMessage = "";
$errorMessage = "";

if (isset($_POST['id'])) {
  $id = $_POST['id'];

  $stmt = mysqli_prepare($connect, "DELETE FROM suggest WHERE id = ?");
  mysqli_stmt_bind_param($stmt, "i", $id);

  if (mysqli_stmt_execute($stmt)) {
    $successMessage = "Suggestion has been solved.";
  } else {
    $errorMessage = "Failed to mark suggestion as solved.";
  }
  mysqli_stmt_close($stmt);
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
    .sucees{
      background-color: rgb(195, 255, 225);
      border-radius: 5px;
      border: 1px solid white;
    }
    .error{
      background-color: rgb(255, 121, 121);
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
      <?php include 'navbar.php' ?>
    </header>

    <div class="container-fluid page-body-wrapper pt-0 proBanner-padding-top">
      <div class="navcantainer d-fixed">
        <?php include 'sidebar.php' ?>
      </div>
      <div class="main-panel">
        <div class="content-wrapper p-4">

          <div class="page-header">
            <h3 class="page-title" style="font-family: 'Montserrat Alternates', sans-serif;
">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-chart-bar menu-icon"></i>
              </span> Feedback
            </h3>

            <div id="successMessage" class="sucees p-2" style="display: none;">
            <?php echo $successMessage; ?>
            <?php echo $errorMessage; ?></div>

          </div>
          <form method="POST">
            <div class="grid-margin card p-4 stretch-card">
              <?php
              $qry = mysqli_query($connect, "select * from suggest");
              $i = 1;
              $hasData = false;
              while ($row = mysqli_fetch_array($qry)) {
                $reg = $row['reg'];
                $hasData = true;
              }

              if ($hasData) {
              ?>
                <table class="table table-responsive-xl">
                  <thead class="grid-margin bg-light fs-1 fw-bolder">
                    <tr>
                      <th>Reg No</th>
                      <th>Name</th>
                      <th>Subject</th>
                      <th>Complaints / suggestion</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <?php
                  mysqli_data_seek($qry, 0);

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
                      <td>
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <button class="rounded-pill btn--blue btn pt-2 pb-2 pr-2 pl-2 btn-primary" id="solveButton">Solve</button>
                      </td>
                    </tr>
                  <?php
                    $i++;
                  }
                  ?>
                </table>
              <?php
              } else {
              ?>
                <div style="display:block; text-align:center">
                  <img style="height: 300px; width:300px;" src="./include/no_feed.png" alt="">
                </div>
              <?php
              }
              ?>
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
  $(document).ready(function() {
    // Show the success message
    $("#successMessage").fadeIn();

    // Hide the success message after 10 seconds
    setTimeout(function() {
      $("#successMessage").fadeOut();
    }, 10000); // 10 seconds (10,000 milliseconds)
  });
</script>

  <script>
    $(".preloader ").fadeOut();
  </script>



</body>

</html>