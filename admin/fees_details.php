<?php
include('../dbconnect.php');
session_start();

if (!isset($_SESSION["name"])) {
  header("Location: ./admin_login.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>fees_details</title>
    <link rel="stylesheet" href="./include/materialdesignicons.min.css">
    <link rel="stylesheet" href="./include/vendor.bundle.base.css">
    <link rel="stylesheet" href="./include/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
    <link rel="shortcut icon" href="./admin/include/ho_login.png">
    <link rel="stylesheet" href="./include/exstyle.css">
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
                    <!-- dash section -->

                    <div class="page-header">
                        <h3 class="page-title"style="font-family: 'Montserrat Alternates', sans-serif;
">
                            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                            </span> Fees Details
                        </h3>
                    </div>

                    <!-- Dash data section -->

                    <div class="grid-margin card p-5 stretch-card">
                        <table class="table table-responsive-xl">


                            <thead class="bg-light"><h1>
                                <tr>
                                    <th>Reg No</th>
                                    <!-- <th>Hostel Name</th> -->
                                    <th>Month</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                </tr></h1>
                            </thead>

                            <?php
                            $reg = $_GET['reg'];
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

                                   <!-- <td>
                                        <div><?php echo $row['name']; ?></div>
                                    </td> 
                                    <td>
                                        <div><?php echo $rw['hname']; ?></div>
                                    </td>-->
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

                            ?>
                        </table>

                    </div>
                </div>

            </div>
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