<?php
 	include("dbconnect.php");
	extract($_POST);
	session_start();

if(isset($_POST['btn']))
{
$qry=mysqli_query($connect,"select * from admin where name='$uname' && psw='$password'");
$num=mysqli_num_rows($qry);
if($num==1)
{
?>
<script>alert('welcome to admin home page');
</script>
<?php

header("location:./stud/stud_dashboard.php");
}
else
{
echo "<script>alert('Please enter correct username are password...')</script>";

}
}
?> 
<!-- By CodeAstro - codeastro.com -->
<!DOCTYPE html>
<html dir="ltr">


<!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css"
  rel="stylesheet"
/>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Hostel stud</title>

    <!-- bootstrap -->
    <link rel="stylesheet" href="    https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css
">
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js
"></script>

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

<!-- By CodeAstro - codeastro.com -->

<body class="d-flex justify-content-center align-items-center h-100 bg-light">
    <div class="main-wrapper bg-light">

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
                <div class="col-lg-7 col-md-5 modal-bg-img" style="background-image: url(assets/images/hostel-img.jpg);">
                </div>
                <div class="col-lg-5 col-md-7 bg-light">
                    <div class="p-3">
                        <div class="text-center">
                            <img src="assets/images/big/icon.png" alt="wrapkit">
                        </div>
                        <h2 class="mt-3 text-center">Student Login</h2>

                        <form class="mt-4" method="POST">
                            <div class="row">
                                <div class="col-lg-12 p-2">
                                    <div class="form-group">
                                        <label class="text-dark" for="uname">User Name</label>
                                        <input class="form-control" name="uname" id="uname" type="txt" placeholder="Enter UserName" required>
                                    </div>
                                </div>
                                <div class="col-lg-12 p-2">
                                    <div class="form-group">
                                        <label class="text-dark" for="pwd">Password</label>
                                        <input class="form-control" name="password" id="pwd" type="password" placeholder="Enter password" required>
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

    <!-- This page plugin js -->

    <script>
        $(".preloader ").fadeOut();
    </script>
</body>

</html>