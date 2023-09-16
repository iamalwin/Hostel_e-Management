<?php
include("../dbconnect.php");
extract($_POST);
session_start();

if (isset($_POST['btn'])) {
    $qry = mysqli_query($connect, "select * from admin where name='$uname' && psw='$password'");
    $result=mysqli_fetch_array($qry);
    $num = mysqli_num_rows($qry);
    if ($num >= 1) {
        $_SESSION['name']=$result['name'];
        $_SESSION['psw']=$result['pwd'];

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
    <title>admin_login</title>

    <link href="../assets/login/css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/login/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/login/style.css">

    <link rel="shortcut icon" href="./include/ho_login.png">

<!-- loading -->
    <link rel="stylesheet" href="../dist/css/style.min.css">

</head>

<body>

<section class="ftco-section">


<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<div class="main-wrapper">

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="wrap d-md-flex">
                    <div class="img" style="background-image: url(./include/sjc_cr.jpg);">
                    </div>
                    <div class="login-wrap p-4 p-md-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">Admin Login</h3>
                            </div>
                            <!-- <div class="w-100">
                                <p class="social-media d-flex justify-content-end">
                                    <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
                                    <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
                                </p>
                            </div> -->
                            <div class="text-center">
                                <a href="../index.php" title="click to home">
                                    <img src="./include/ho_login.png" class="w-35 h-55" alt=" ">
                                </a>
                            </div>
                        </div>
                        <form method="POST" class="signin-form ">
                            <div class="form-group mb-3">
                                <label class="label" for="name">Username</label>
                                <input type="text" class="form-control" name="uname" id="uname" placeholder="Username" required>
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="password" for="pwd">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required="">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary rounded submit px-3" id="btn" name="btn">Login</button>
                            </div>
                        </form>
                        <p class="text-center"><a href="../index.php">Home</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <script src="../assets/libs/jquery/dist/jquery.min.js "></script>
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js "></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>
    <script src="../assets/login/main.js.download"></script>
    <script defer="" src="./assets/login/v8b253dfea2ab4077af8c6f58422dfbfd1689876627854" integrity="sha512-bjgnUKX4azu3dLTVtie9u6TKqgx29RBwfj3QXYt5EKfWM/9hPSAI/4qcV5NACjwAo8UtTeWefx6Zq5PHcMm7Tg==" data-cf-beacon="{&quot;rayId&quot;:&quot;7ee415a2fcb2444f&quot;,&quot;token&quot;:&quot;cd0b4b3a733644fc843ef0b185f98241&quot;,&quot;version&quot;:&quot;2023.7.0&quot;,&quot;si&quot;:100}" crossorigin="anonymous"></script>
    <script src="../assets/libs/jquery/dist/jquery.min.js "></script>
    <script src="assets/libs/popper.js/dist/umd/popper.min.js "></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>
    <script>
        $(".preloader ").fadeOut();
    </script>
</body>

</html>