<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative" style="background:url(../assets/images/big/auth-bg.jpg) no-repeat center center;">
            <div class="auth-box row bg-info">
                <div class="col-lg-7 col-md-5 modal-bg-img" style="background-image: url(../admin/include/sjc_ch.png);">
                </div>
                <div class="col-lg-5 col-md-7 bg-light">
                    <div class="p-3">
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
</body>
</html>