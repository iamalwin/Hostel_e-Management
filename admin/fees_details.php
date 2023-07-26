<?php
include("../dbconnect.php");
extract($_POST);
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Required meta tags -->

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>fees_details</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="./Purple Admin_files/materialdesignicons.min.css">
    <link rel="stylesheet" href="./Purple Admin_files/vendor.bundle.base.css">

    <!-- Layout styles -->
    <link rel="stylesheet" href="./Purple Admin_files/style.css">
    <!-- Add this link to your HTML head section -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">

    <link rel="shortcut icon" href="./include/images/hs-logo.png">
    <!-- End layout styles -->
    <style>
        /* Chart.js */
        @keyframes chartjs-render-animation {
            from {
                opacity: .99
            }

            to {
                opacity: 1
            }
        }

        .chartjs-render-monitor {
            animation: chartjs-render-animation 1ms
        }

        .chartjs-size-monitor,
        .chartjs-size-monitor-expand,
        .chartjs-size-monitor-shrink {
            position: absolute;
            direction: ltr;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            overflow: hidden;
            pointer-events: none;
            visibility: hidden;
            z-index: -1
        }

        .chartjs-size-monitor-expand>div {
            position: absolute;
            width: 1000000px;
            height: 1000000px;
            left: 0;
            top: 0
        }

        .chartjs-size-monitor-shrink>div {
            position: absolute;
            width: 200%;
            height: 200%;
            left: 0;
            top: 0
        }
    </style>
    <style>
        #liveDate,
        #liveTime {
            display: contents;
            font-size: 20px;
            width: 100%;
        }

        .page-title,
        .date,
        .time {
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 10px;
            display: inline-block;
        }
    </style>
    <style>
        /* Custom CSS to make table borders visible */
        table {
            border-collapse: separate;
            border-spacing: 0;
        }

        table td,
        table th {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }
    </style>
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
        <header class="topbar" data-navbarbg="skin6">
            <?php include './include/navbar.php' ?>
        </header>


        <!-- partial -->
        <div class="container-fluid page-body-wrapper pt-0 proBanner-padding-top">
            <!-- partial:partials/_sidebar.html -->
            <div class="navcantainer d-fixed">
                <?php include './include/sidebar.php' ?>
            </div>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <!-- dash section -->

                    <div class="page-header">
                        <h3 class="page-title">
                            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                            </span> Fees Details
                        </h3>
                    </div>

                    <!-- Dash data section -->

                    <div class="grid-margin card p-5 stretch-card">
                        <table class="table table-responsive-xl">
                            <thead>
                                <tr>
                                    <th>Reg No</th>
                                    <th>Hostel Name</th>
                                    <th>Month</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <!-- Remove extra "p" in colspan attribute -->

                            <?php
                            if ($_REQUEST["act"] == ('update')); {
                                $reg = $_REQUEST['reg'];
                                $qry = mysqli_query($connect, "select * from paid where reg='$reg'");
                                $i = 1;
                                while ($row = mysqli_fetch_array($qry)) {
                                    $reg = $row['reg'];
                            ?>

                                    <tr class="alert " role="alert">
                                        <td>
                                            <div><?php echo $reg; ?></div>
                                        </td>

                                        <?php
                                        $qt = mysqli_query($connect, "select * from stud where reg='$reg'");
                                        $rw = mysqli_fetch_assoc($qt);
                                        ?>

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
                                            <div><?php echo "paid"; ?></div>
                                        </td>

                                    </tr>
                            <?php
                                    $i++;
                                }
                            }
                            ?>
                        </table>

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
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="./Purple Admin_files/vendor.bundle.base.js.download"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="./Purple Admin_files/Chart.min.js.download"></script>
    <script src="./Purple Admin_files/jquery.cookie.js.download" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="./Purple Admin_files/off-canvas.js.download"></script>
    <script src="./Purple Admin_files/hoverable-collapse.js.download"></script>
    <script src="./Purple Admin_files/misc.js.download"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="./Purple Admin_files/dashboard.js.download"></script>
    <script src="./Purple Admin_files/todolist.js.download"></script>
    <!-- End custom js for this page -->


    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/jquery/dist/jquery.min.js "></script>
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js "></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>

    <script src="../admin/Purple Admin_files/vendor.bundle.base.js.download"></script>


    
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