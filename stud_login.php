<?php
include("./dbconnect.php");
extract($_POST);
session_start();

if (isset($_POST['btn'])) {
    $qry = mysqli_query($connect, "select * from stud where name='$sname' && reg='$psw'");
    $num = mysqli_num_rows($qry);
    if ($num == 1) {
?>
        <script>
            alert('welcome to stud home page');
        </script>
<?php
        $_SESSION=
        header("location:./stud/stud_dashboard.php");
    } else {
        echo "<script>alert('User Name Password Wrong.....')</script>";
    }
}
?>
<!-- By CodeAstro - codeastro.com -->
<!DOCTYPE html>
<html dir="ltr">


<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
<!-- MDB -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet" />


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Hostel stud</title>
    <link href="../dist/css/style.min.css" rel="stylesheet">

    <link rel="stylesheet" href="./dist/css/style.min.css">

    <!-- bootstrap -->
    <link rel="stylesheet" href="    https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css
">
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js
"></script>

</head>

<!-- By CodeAstro - codeastro.com -->

<body class="d-flex justify-content-center align-items-center h-100 bg-light">
    <!-- Preloader - style you can find in spinners.css -->

    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div class="main-wrapper bg-light">



        <!-- Preloader - style you can find in spinners.css -->

        <!-- Login box.scss -->

        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative" style="background:url(../assets/images/big/auth-bg.jpg) no-repeat center center;">
            <div class="auth-box row bg-info">
                <div class="col-lg-7 col-md-5 modal-bg-img img-fluid img-thumbnail" style="background-image: url(./admin/include/sjc_ch.png)">
                </div>
                <div class="col-lg-5 col-md-7 bg-light">
                    <div class="p-3">
                        <div class="text-center">
                            <img src="./admin/include/ho_login.png" class="w-35 h-35" alt=" ">
                        </div>
                        <h2 class="mt-3 text-center">Student Login</h2>

                        <form class="mt-4" method="POST">
                            <div class="row">
                                <div class="col-lg-12 p-2">
                                    <div class="form-group">
                                        <label class="text-dark" for="uname">User Name</label>
                                        <input class="form-control" name="sname" type="text" placeholder="Enter UserName" required>
                                    </div>
                                </div>
                                <div class="col-lg-12 p-2">
                                    <div class="form-group">
                                        <label class="text-dark" for="pwd">Password</label>
                                        <input class="form-control" name="psw" type="password" placeholder="Enter password" required>
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button type="submit" id="btn" name="btn" class="btn btn-block btn-dark">LOGIN</button>
                                </div>
                                <div class="col-lg-12 text-center mt-5">
                                    <a href="./admin/admin_login.php" class="text-danger">Go to Admin Panel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- By CodeAstro - codeastro.com -->

        <!-- Login box.scss -->

    </div>


    <!-- Bootstrap tether Core JavaScript -->
    <script src="./assets/libs/jquery/dist/jquery.min.js "></script>
    <script src="assets/libs/popper.js/dist/umd/popper.min.js "></script>
    <script src="./assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>

    <!-- This page plugin js -->

    <script>
        $(".preloader ").fadeOut();
    </script>
</body>

</html>