<?php
include("../dbconnect.php");
extract($_POST);
session_start();
$reg = $_SESSION['reg'];
$month = $_REQUEST['month'];
$total = $_REQUEST['total'];
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
        .bank{
            padding: 100px;
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


                    <form name="form1" class="card bank" method="post" action="#">
                        <table>
                            <tr>
                                <td colspan="2"><span style="font-size: 1.5rem;color:skyblue;">Payment Mode</span></td>
                            </tr>
                            <tr>
                                <td height="43">&nbsp;</td>
                                <td width="57%"><label>
                                        <input type="image" name="imageField" src="../admin/include/payment.png" />
                                    </label></td>
                            </tr>

                            <!-- <tr>
          <td width="43%" height="35">Register No</td>
          <td><?php echo $reg; ?></td>
        </tr> -->


                            <tr>
                                <td width="43%" height="32">Total Fess </td>
                                <td><?php echo $total; ?></td>
                            </tr>


                            <tr>
                                <td width="43%" height="37">Total Amount</td>
                                <td><?php echo $total ?></td>
                            </tr>

                            <tr>
                                <td height="33">Enter Card Number </span></td>
                                <td><input name="cno" type="text" id="cno" /></td>
                            </tr>


                            <tr>
                                <td height="43">CVV Number </td>
                                <td><input name="cvv" type="password" id="cvv" /></td>
                            </tr>


                            <tr>
                                <td height="34">Card Name </span></td>
                                <td><input name="cname" type="text" id="cname" /></td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td><input name="btn1" type="submit" class="btn btn-primary mt-3" id="btn1" value="Pay" /></td>
                            </tr>
                        </table>
                    </form>


                    <?php

                    if (isset($_POST['btn1'])) {
                        $max_qry = mysqli_query($connect, "select max(id) from paid");
                        $max_row = mysqli_fetch_array($max_qry);
                        $id = $max_row['max(id)'] + 1;
                        $date = date('y-m-d');
                        $qt = mysqli_query($connect, "insert into paid values('$id','$reg','$total','$date','$month')");
                        if ($qt) {

                            echo "<script>alert('payment Suceess')</script>";
                        } else {

                            // echo "<script>alert('payment failure')</script>";
                            echo "Thank you, redirecting you...";
header('Location: ' . $_SESSION['../login.php']);
                        }
                    }
                    ?>

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