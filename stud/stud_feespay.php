<?php
include("../dbconnect.php");
session_start();

if (!isset($_SESSION["reg"])) {
    header("Location: ../stud_login.php");
    exit();
}

$month = "";
$mess = "";
$hostel = "";
$total = "";

if (isset($_POST['btn1'])) {
    $month = $_POST['month'];
    $qry = mysqli_query($connect, "select * from amnt where month='$month'");
    $row = mysqli_fetch_assoc($qry);

    if ($row) {
        $total = $row['total'];
        $hostel = $row['hf'];
        $mess = $row['mf'];
    } else {
        $reg = "No data found for the selected month";
        $total = "";
        $hostel = "";
        $mess = "";
    }
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

    <link rel="stylesheet" href="../admin/include/exstyle.css">
    <link rel="stylesheet" href="../admin/include/style.css">
    <link rel="shortcut icon" href="../admin/include/ho_login.png">

    <style>
        .feepay {
            padding: 100px;
        }

        .card-body1 {
            margin: 0;
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
            <div class="main-panel">
                <div class="content-wrapper p-4">

                    <!-- dash section -->

                    <div class="page-header">
                        <h3 class="page-title">
                            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                                <i class="mdi mdi-cash-multiple menu-icon"></i>
                            </span> Fees pay
                        </h3>
                    </div>

                    <!-- Dash data section -->
                    <div class="formbold-main-wrapper card col-12" style="height: 100vh;">
                    <div class="col-12 justify-content-center align-items-center p-3">
                        <form method="post" class="col-10 justify-content-center align-items-center mx-auto m-0">
                            <div class="m-1 col-md-5 mx-auto">
                                <div style="margin-top:10px;">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control text-uppercase" disabled value="<?php echo $row['name']; ?>" style="font-size:1rem; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                                </div>
                                <div style="margin-top:10px;">
                                    <label for="reg">Register No</label>
                                    <input type="text" class="form-control text-uppercase" disabled value="<?php echo $row['reg']; ?>" style="font-size:1rem; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                                </div>

                                <div style="margin-top:10px;">
                                    <label for="reg">Month</label>
                                    <td action="#" method="post">
                                    <select name="month" class="form-control font-weight-bold">
                                                <!-- <option value="">Select</option> -->
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
                                        <input class="btn btn--radius-2 btn--blue btn btn-secondary mb-2 mt-3 " type="submit" name="btn1">
                                    </td>
                                </div>
                            </div>
                        </form>
                        <form class="col-10 justify-content-center align-items-center mx-auto mt-0" name="form1" method="post" action="bank_pay.php?month=<?php echo $month; ?>&total=<?php echo $total; ?>">
                            <div class="m-1 col-md-5 mx-auto">
                                <div style="margin-top:10px;">
                                    <label for="name">Hostel Fees</label><br>
                                    <input type="text" class="form-control" class="form-control" name="name" disabled value="<?php if ($hostel) {
                                                                                                                                    echo $hostel;
                                                                                                                                } ?>" style="font-size:1rem; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                                </div>
                                <div style="margin-top:10px;">
                                    <label for="reg">Mess Fees</label><br>
                                    <input type="text" class="form-control" class="form-control" name="reg" disabled value="<?php if ($mess) {
                                                                                                                                echo $mess;
                                                                                                                            } ?>" style="font-size:1rem; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                                </div>

                                <div style="margin-top:10px;">
                                    <label for="reg">Total amount</label><br>
                                    <input type="text" class="form-control" class="form-control" name="reg" disabled value="<?php if ($total) {
                                                                                                                                echo $total;
                                                                                                                            } ?>" style="font-size:1rem; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                                </div>
                            </div>
                            <div class="text-right col-md-5 mx-auto p-0">
                                <input class="btn btn--radius-2 btn--blue btn btn-success m-3" name="btn" type="submit" id="btn" value="Payment" />
                            </div>
                        </form>
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