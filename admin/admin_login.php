<?php
include("../dbconnect.php");
extract($_POST);
session_start();

if (isset($_POST['btn'])) {
    $qry = mysqli_query($connect, "select * from admin where name='$uname' && psw='$password'");
    $num = mysqli_num_rows($qry);
    if ($num == 1) {
?>
        <script>
            alert('welcome to admin home page');
        </script>
<?php

        header("location:admin_dashboard.php");
    } else {
        echo "<script>alert('User Name Password Wrong.....')</script>";
    }
}
?>

<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Hostel admin login</title>

    <!-- bootstrap link -->

    <link rel="stylesheet" href="    https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <link rel="stylesheet" href="../dist/css/style.min.css">


    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet" />


    <script type="text/javascript">
        function valid() {
            if (document.registration.password.value != document.registration.cpassword.value) {
                alert("Password and Re-Type Password Field do not match  !!");
                document.registration.cpassword.focus();
                return false;
            }
            return true;
        }
    </script>

</head>

<body>
    <div class="main-wrapper">

        <!-- Preloader - style you can find in spinners.css -->

        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>

        <!-- Preloader - style you can find in spinners.css -->

        <!-- Login box.scss -->

        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative" style="background:url(../assets/images/big/auth-bg.jpg) no-repeat center center;">
            <div class="auth-box row bg-info">
                <div class="col-lg-7 col-md-5 modal-bg-img" style="background-image: url(../assets/images/adimg.jpg);">
                </div>
                <div class="col-lg-5 col-md-7 bg-light">
                    <div class="p-3">
                        <div class="text-center">
                            <img src="../assets/images/big/icon.png" alt="wrapkit">
                        </div>
                        <h2 class="mt-3 text-center">Admin Login</h2>

                        <form class="mt-4" method="POST">
                            <div class="row">
                                <div class="col-lg-12 p-2">
                                    <div class="form-group">
                                        <label class="text-dark" for="uname">Username</label>
                                        <input class="form-control" name="uname" id="uname" type="text" placeholder="Username" required>
                                    </div>
                                </div>
                                <div class="col-lg-12 p-2">
                                    <div class="form-group">
                                        <label class="text-dark" for="pwd">Password</label>
                                        <input class="form-control" name="password" id="password" type="password" placeholder="Enter your password" required>
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button type="submit" name="btn" id="btn" class="btn btn-block btn-danger">LOGIN</button>
                                </div>
                                <div class="col-lg-12 text-center mt-5">
                                    <a href="../stud_login.php" class="text-danger">Go Back</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Login box.scss -->

    </div>

    <!-- All Required js -->

    <script src="../assets/libs/jquery/dist/jquery.min.js "></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js "></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>

    <!-- This page plugin js -->

    <script>
        $(".preloader ").fadeOut();
    </script>
</body>

</html>