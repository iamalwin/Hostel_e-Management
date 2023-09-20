<?php
include("../dbconnect.php");
extract($_POST);
session_start();

if (!isset($_SESSION["name"])) {
    header("Location: ./admin_login.php");
    exit();
  }
if (isset($_POST['btn'])) {
    $max_qry = mysqli_query($connect, "select max(id) from amnt");
    $max_row = mysqli_fetch_array($max_qry);
    $id = $max_row['max(id)'] + 1;
    $qry = mysqli_query($connect, "insert into amnt values('$id','$hf','$mf','$hf'+'$mf','$month','$date')");
    if ($qry) {
        $gees= "<script>alert('Fees Details entered Sucessfully')</script>";
    } else {
        echo "<script>alert('Enter Again')</script>";
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
		.container {
			margin-top: 20px;
			width: 700px;
			background-color: #fff;
			padding: 40px;
			border-radius: 5px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}

		@media (max-width: 768px) {
			.container {
				padding: 20px;
			}
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
                                <i class="mdi mdi-cash-multiple menu-icon"></i>
                            </span> Fees pay
                        </h3>
                    </div>
                    <!-- Dash data section -->

                    <div class="card d-flex justify-content-center align-items-center">
                        <form class="card-body" style="align-items:center;justify-content:center;" id="f1" name="f1" method="post" action="#">
                            <div class="m-10 bg-light p-4" style="box-shadow: rgba(17, 17, 26, 0.05) 0px 1px 0px, rgba(17, 17, 26, 0.1) 0px 0px 8px;
">
                                <div class="col">
                                    <div class="grid gap-0 row-gap-3">
                                        <div class="p-2 g-col-6">Hostel Fees</div>
                                        <div class="p-2 g-col-6"><input name="hf" type="text" class="form-control" placeholder="Enter Hostel fees" id="hf" /></div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="grid gap-0 row-gap-3">
                                        <div class="p-2 g-col-6">Mess Fees </div>
                                        <div class="p-2 g-col-6"><input name="mf" type="text" class="form-control" placeholder="Enter Mess fees" id="mf" /></div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="grid gap-0 row-gap-3">
                                        <div class="p-2 g-col-6">Month</div>
                                        <div class="p-2 g-col-6">
                                            <select name="month" class="form-control" placeholder="Month">
                                                <option value="">select</option>
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
                                            <!-- <input type="submit" name="btn1"> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="grid gap-0 row-gap-3">
                                        <div class="p-2 g-col-6">Laste Date </div>
                                        <div class="p-2 g-col-6"><input name="date" type="date" class="form-control" placeholder="Last Date" id="date" /></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="grid gap-0 row-gap-3">
                                        <td height="31">&nbsp;</td>
                                        <td><button class="btn btn--radius-2 btn--blue btn btn-primary m-5" name="btn" type="submit" id="btn" value="Submit">Submit</button>
                                            <button class="btn btn--radius-2 btn--blue btn btn-primary m-5" type="reset" name="Submit2" value="Reset">Reset</button>
                                        </td>
                                    </div>
                                </div>
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