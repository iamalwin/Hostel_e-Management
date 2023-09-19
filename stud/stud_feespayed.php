<?php
include("../dbconnect.php");
extract($_POST);
session_start();

if (!isset($_SESSION["reg"])) {
    header("Location: ../stud_login.php"); 
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>feedback</title>
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
    <link rel="shortcut icon" href="../admin/include/ho_login.png">

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
                <div class="content-wrapper p-4">

                    <!-- dash section -->

                    <div class="page-header">
                        <h3 class="page-title">
                            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                            </span> Payed Details
                        </h3>
                    </div>

                    <!-- Dash data section -->

                    <div class="grid-margin card p-5 stretch-card">

                        <table class="table table-responsive-xl">
                            <thead>
                                <tr>
                                    <th>Reg No</th>
                                    <th>Name</th>
                                    <th>Department</th>
                                    <th>Hostel Name</th>
                                    <th>Month</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <?php
                            $qry = mysqli_query($connect, "select * from paid where reg='$reg'");
                            $i = 1;
                            while ($row = mysqli_fetch_array($qry)) {
                                $reg = $row['reg'];
                                $qt = mysqli_query($connect, "select * from stud where reg='$reg'");
                                $rw = mysqli_fetch_assoc($qt);
                            ?>
                                <tr>
                                    <td>
                                        <div><?php echo $rw['reg']; ?></div>
                                    </td>

                                    <td>
                                        <div><?php echo $rw['name']; ?></div>
                                    </td>
                                    <td>
                                        <div><?php echo $rw['dept']; ?></div>
                                    </td>
                                    <td>
                                        <div><?php echo $rw['hname']; ?></div>
                                    </td>
                                    <td>
                                        <div><?php echo $row['month']; ?></div>
                                    </td>
                                    <td>
                                        <div><?php echo $row['total']; ?></div>
                                    </td>
                                    <td>
                                        <div><?php echo "paid" ?></div>
                                    </td>


                                <?php
                                $i++;
                            }

                                ?>
                        </table>

                    </div>

                </div>
            </div>
        </div>
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