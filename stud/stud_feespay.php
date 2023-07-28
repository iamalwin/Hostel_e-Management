<?php
include("../dbconnect.php");
extract($_POST);
session_start();
$reg = $_SESSION['reg'];
if (isset($_POST['btn'])) {
    $max_qry = mysqli_query($connect, "select max(id) from suggest");
    $max_row = mysqli_fetch_array($max_qry);
    $id = $max_row['max(id)'] + 1;
    $qry = mysqli_query($connect, "insert into suggest values('$id','$reg','$name','$sub','$cmpl')");
    if ($qry) {
        echo "<script>alert('We Get your Suggestions if it is posiible we will take action for that')</script>";
    } else {
        echo "<script>alert('Enter the fields Correctly')</script>";
    }
}
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

    <link rel="stylesheet" href="../admin/include/ex">
    <!-- Layout styles -->
    <link rel="stylesheet" href="../admin/include/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="https://www.bootstrapdash.com/demo/purple-admin-free/assets/images/favicon.ico">

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

        <!-- partial:partials/_navbar.html -->
        <header class="topbar" data-navbarbg="skin6">
            <?php include './stud_navbar.php' ?>
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
                            <i class="mdi mdi-cash-multiple menu-icon"></i>
                            </span> Fees pay
                        </h3>
                    </div>

                    <!-- Dash data section -->
                    <form action="#" method="post">
                        <div> <select name="month">
                                <option value="">select</option>
                                <option value="january">january</option>
                                <option value="Februry">Februry</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="Agust">Agust</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select>
                            <input type="submit" name="btn1">
                        </div>
                    </form>

                    <?php
                    if (isset($_POST['btn1'])) {
                        $qry = mysqli_query($connect, "select * from amnt where month='$month'");
                        $row = mysqli_fetch_assoc($qry);
                        $month = $row['month'];
                        $total = $row['total'];
                        $hostel = $row['hf'];
                        $mess = $row['mf'];
                    }
                    ?>
                    <form name="form1" method="post" action="payment.php?month=<?php echo $month; ?>&total=<?php echo $total; ?>">
                        <table>

                            <tr>
                                <td width="39%" height="44">Register No</td>
                                <td width="61%"><?php echo $reg; ?></td>
                            </tr>


                            <tr>
                                <td width="39%" height="33"> Hostel Fees </td>
                                <td><?php echo $hostel; ?></td>
                            </tr>


                            <tr>
                                <td width="39%" height="42">Mess Fees </td>
                                <td> <?php echo $mess; ?></td>
                            </tr>


                            <tr>
                                <td width="39%" height="37">Total amount </td>
                                <td><?php echo $total; ?></td>
                            </tr>
                            <tr>
                                <td height="31">&nbsp;</td>
                                <td><input name="btn" type="submit" id="btn" /></td>
                            </tr>
                        </table>
                    </form>


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


        <script src="../admin/include/vendor.bundle.base.js.download"></script>


<script>
  // Function to toggle the collapse on click
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

  // Add click event listeners to all the collapsed menu items
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