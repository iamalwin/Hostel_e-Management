<?php
include("../dbconnect.php");
extract($_POST);
session_start();

if (!isset($_SESSION["reg"])) {
    header("Location: ../stud_login.php");
    exit();
}
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
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

    <link rel="stylesheet" href="pay.css">
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
                    <div class="justify-content-center card align-items-center p-3">
                        <form name="form1" class="bank" method="post" action="#">
                            <div class="container-fluid">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-sm-12">
                                        <div class="card1 mx-auto">
                                            <p class="heading border-bottom">PAYMENT DETAILS</p>
                                            <form class="card-details ">
                                                <div style="margin-top:10px;">
                                                    <label for="reg">Total Fess</label>
                                                    <input type="text" class="form-control text-uppercase bg-transparent border-0" disabled value="<?php echo $total; ?>.00" style="font-size:1rem; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                                                </div>
                                                <div style="margin-top:10px;">
                                                    <label for="reg">Total Amount</label>
                                                    <input type="text" class="form-control text-uppercase bg-transparent border-0" disabled value="<?php echo $total; ?>.00" style="font-size:1rem; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                                                </div>
                                                <div class="form-group mb-0">
                                                    <p class="text-warning mb-0">Card Number</p>
                                                    <input type="text" name="card-num" placeholder="1234 5678 9012 3457" id="cno" pattern="\d{4} \d{4} \d{4} \d{4}" minlength="19" maxlength="19" title="Please enter a 16-digit card number with spaces" required>
                                                    <img src="https://img.icons8.com/color/48/000000/visa.png" width="64px" height="60px" />
                                                </div>
                                                <div class="form-group">
                                                    <p class="text-warning mb-0">Cardholder's Name</p> <input type="text" name="name" placeholder="Name" size="17">
                                                </div>
                                                <div class="form-group pt-2">
                                                    <div class="row d-flex">
                                                        <div class="col-sm-4">
                                                            <p class="text-warning mb-0">Expiration</p>
                                                            <input type="text" name="exp" placeholder="MM/YYYY" size="7" id="exp" minlength="7" maxlength="7">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <p class="text-warning mb-0">Cvv</p>
                                                            <input type="password" name="cvv" placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3">
                                                        </div>
                                                        <div class="col-sm-5 pt-0">
                                                            <!-- <input name="btn1" type="submit" class="btn btn-primary mt-3" id="btn1" value="Pay" /> -->
                                                            <button name="btn1" id="btn1" type="submit" class="btn btn-primary"><i class="fas fa-arrow-right px-3 py-2"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <?php

                    if (isset($_POST['btn1'])) {
                        $max_qry = mysqli_query($connect, "select max(id) from paid");
                        $max_row = mysqli_fetch_array($max_qry);
                        $id = $max_row['max(id)'] + 1;
                        $date = date('y-m-d');
                        $qt = mysqli_query($connect, "insert into paid values('$id','$reg','$total','$date','$month')");
                        if ($qt) {


                            echo "<script>alert('Payment Success');</script>";
                            echo "<script>window.location.href = 'stud_dashboard.php';</script>";
                        } else {
                            echo "Thank you, redirecting you...";
                            header('Location: ' . $_SESSION['../stud_login.php']);
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
            document.getElementById('cno').addEventListener('input', function(e) {
                var target = e.target;
                var input = target.value.replace(/\D/g, '');
                var formattedInput = '';

                for (var i = 0; i < input.length; i++) {
                    if (i > 0 && i % 4 === 0) {
                        formattedInput += ' ';
                    }
                    formattedInput += input[i];
                }

                target.value = formattedInput;
            });
        </script>

        <script>
            document.getElementById('exp').addEventListener('input', function(e) {
                var target = e.target;
                var input = target.value.replace(/\D/g, ''); // Remove non-digit characters
                var formattedInput = '';

                for (var i = 0; i < input.length; i++) {
                    if (i === 2) {
                        formattedInput += '/'; // Add a slash after the 2nd character
                    }
                    formattedInput += input[i];
                }

                target.value = formattedInput;
            });
        </script>

        <script>
            $(".preloader ").fadeOut();
        </script>

</body>

</html>