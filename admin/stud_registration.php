<?php
include("../dbconnect.php");
extract($_POST);
session_start();
if (isset($_POST['btn'])) {

	$max_qry = mysqli_query($connect, "select max(id) from stud");
	$max_row = mysqli_fetch_array($max_qry);
	$id = $max_row['max(id)'] + 1;
	$qry = mysqli_query($connect, "insert into stud values('$id','$name','$reg','$gender','$age','$email','$phone','$dept','$cls','$hn','$room')");
	if ($qry) {

		echo "<script>alert('Hostel Assigned to Students')</script>";
	} else {
		echo "<script>alert('Enter the correct fields')</script>";
	}
}
?>

<!DOCTYPE html>
<!-- saved from url=(0054)https://www.bootstrapdash.com/demo/purple-admin-free/# -->
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Required meta tags -->

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Purple Admin</title>
	<!-- plugins:css -->
	<link rel="stylesheet" href="./Purple Admin_files/materialdesignicons.min.css">
	<link rel="stylesheet" href="./Purple Admin_files/vendor.bundle.base.css">

	<!-- Layout styles -->
	<link rel="stylesheet" href="./Purple Admin_files/style.css">
	<!-- Add this link to your HTML head section -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">

	<link rel="stylesheet" href="../dist/css/style.min.css">

	<!-- endinject -->
	<!-- Plugin css for this page -->
	<!-- End plugin css for this page -->
	<!-- inject:css -->
	<!-- endinject -->
	<!-- Layout styles -->
	<link rel="stylesheet" href="./Purple Admin_files/style.css">
	<!-- End layout styles -->
	<link rel="shortcut icon" href="./include/images/hs-logo.png  ">
	<!-- End layout styles -->
	<link rel="shortcut icon" href="https://www.bootstrapdash.com/demo/purple-admin-free/assets/images/favicon.ico">
	<style type="text/css">
		/* Chart.js */
		@keyframes chartjs-render-animation {
			from {
				opacity: .99
			}

			to {
				opacity: 1
			}
		}

		.chartjs-render-monitor {
			animation: chartjs-render-animation 1ms
		}

		.chartjs-size-monitor,
		.chartjs-size-monitor-expand,
		.chartjs-size-monitor-shrink {
			position: absolute;
			direction: ltr;
			left: 0;
			top: 0;
			right: 0;
			bottom: 0;
			overflow: hidden;
			pointer-events: none;
			visibility: hidden;
			z-index: -1
		}

		.chartjs-size-monitor-expand>div {
			position: absolute;
			width: 1000000px;
			height: 1000000px;
			left: 0;
			top: 0
		}

		.chartjs-size-monitor-shrink>div {
			position: absolute;
			width: 200%;
			height: 200%;
			left: 0;
			top: 0
		}
	</style>
	<style>
		#liveDate,
		#liveTime {
			display: contents;
			font-size: 20px;
			width: 100%;
		}

		.page-title,
		.date,
		.time {
			background-color: #fff;
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
			padding: 20px;
			border-radius: 10px;
			display: inline-block;
		}
	</style>

</head>

<body class="">
	<div class="container-scroller">

		<!-- Preloader - style you can find in spinners.css -->

		<!-- <div class="preloader">
			<div class="lds-ripple">
				<div class="lds-pos"></div>
				<div class="lds-pos"></div>
			</div>
		</div> -->

		<!-- partial:partials/_navbar.html -->
		<header class="topbar" data-navbarbg="skin6">
			<?php include './include/navbar.php' ?>
		</header>


		<!-- partial -->
		<div class="container-fluid page-body-wrapper pt-0 proBanner-padding-top">
			<!-- partial:partials/_sidebar.html -->
			<div class="navcantainer d-fixed">
				<?php include './include/sidebar.php' ?>
			</div>
			<!-- partial -->
			<div class="main-panel">
				<div class="content-wrapper">

					<!-- dash section -->

					<div class="page-header">
						<h3 class="page-title">
							<span class="page-title-icon bg-gradient-primary text-white mr-2">
							<i class="mdi mdi-account-plus menu-icon"></i>
							</span> Student Registration
						</h3>

						<nav aria-label="breadcrumb row-5 bg-gradient-primary">
							<h3 class="page-title">
								<span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-calendar align-middle"></i></span>
								<div class="date" id="liveDate"></div>
								<div class="time" id="liveTime"></div>
							</h3>
						</nav>
					</div>

					<!-- Dash data section -->


					<form class=" card p-5 " id="f1" name="f1" method="post" action="#" onSubmit="return vali()">
						<table width="35%" border="0" align="center">

							<tr>
								<td colspan="2" align="center"><strong>
										<h3>Student Registration</h3>
									</strong></td>
							</tr>
							<tr>
								<td colspan="2" align="center">&nbsp;</td>
							</tr>
							<tr>
								<td width="37%" align="justify"><span class="style6">Name</td>
								<td width="63%">
									<input name="name" type="text" id="name" onChange="return name ()" />
								</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td align="justify"> Register Number</td>
								<td>
									<input name="reg" type="text" id="reg" required />
								</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td align="justify"> Gender</td>
								<td><input name="gender" type="radio" value="male" required />
									Male
									<input name="gender" type="radio" value="female" />
									Female
								</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td align="justify"> Age</td>
								<td><input name="age" type="text" id="age" /></td>
							</tr>

							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td align="justify"> Email Id </td>
								<td><input name="email" type="email" id="email" required /></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>

							<tr>
								<td align="justify"> Contact Number </td>
								<td><input name="phone" type="text" id="phone" /></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>

							<tr>
								<td align="justify"> Department </td>
								<td><input name="dept" type="text" id="dept" /></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td align="justify"> Class </td>
								<td><input name="cls" type="text" id="cls" /></td>

							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>

								<td align="justify"> Year Of Passing </td>
								<td><input name="year" type="text" id="year" /></td>

							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td align="justify"> Hostal Name</td>
								<td><select name="hn">
										<option value="">Select Hostel</option>
										<?php
										$qry = mysqli_query($connect, "select hname from hostel");
										while ($rw = mysqli_fetch_assoc($qry)) {
										?>
											<option value="<?php echo $rw['hname']; ?>"> <?php echo $rw['hname']; ?></option>
										<?php
										}
										?>
									</select>
								</td>

							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>

								<td align="justify"> Room No</td>
								<td><input name="room" type="text" id="room" /></td>
							</tr>
							<td>&nbsp;</td>
							<td><input name="btn" type="submit" id="btn" value="Submit" />
								<input type="reset" name="Submit2" value="Reset" />
							</td>
							</tr>
						</table>
					</form>


				</div>
				<!-- content-wrapper ends -->
				<!-- partial:partials/_footer.html -->
				<footer class="footer">
					<div class="container-fluid clearfix">
						<span class="text-muted d-block text-center text-sm-left d-sm-inline-block"></span>
						<span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"></span>
					</div>
				</footer>
				<!-- partial -->
			</div>
			<!-- main-panel ends -->
		</div>
		<!-- page-body-wrapper ends -->
	</div>
	<!-- container-scroller -->
	<!-- plugins:js -->
	<script src="./Purple Admin_files/vendor.bundle.base.js.download"></script>
	<!-- endinject -->
	<!-- Plugin js for this page -->
	<script src="./Purple Admin_files/Chart.min.js.download"></script>
	<script src="./Purple Admin_files/jquery.cookie.js.download" type="text/javascript"></script>
	<!-- End plugin js for this page -->
	<!-- inject:js -->
	<script src="./Purple Admin_files/off-canvas.js.download"></script>
	<script src="./Purple Admin_files/hoverable-collapse.js.download"></script>
	<script src="./Purple Admin_files/misc.js.download"></script>
	<!-- endinject -->
	<!-- Custom js for this page -->
	<script src="./Purple Admin_files/dashboard.js.download"></script>
	<script src="./Purple Admin_files/todolist.js.download"></script>
	<!-- End custom js for this page -->


	<!-- Date & time -->
	<script>
		function updateDateTime() {
			var dateElement = document.getElementById('liveDate');
			var timeElement = document.getElementById('liveTime');
			var now = new Date();

			var formattedDate = now.getFullYear() + '-' +
				padNumber(now.getMonth() + 1) + '-' +
				padNumber(now.getDate());

			var formattedTime = padNumber(now.getHours()) + ':' +
				padNumber(now.getMinutes()) + ':' +
				padNumber(now.getSeconds());

			dateElement.textContent = formattedDate;
			timeElement.textContent = formattedTime;
		}

		function padNumber(number) {
			return (number < 10 ? '0' : '') + number;
		}

		// Update the date and time every second (1000ms)
		setInterval(updateDateTime, 1000);
	</script>


	<!-- Bootstrap tether Core JavaScript -->
	<script src="../assets/libs/jquery/dist/jquery.min.js "></script>
	<script src="../assets/libs/popper.js/dist/umd/popper.min.js "></script>
	<script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>


	<!-- This page plugin js -->

	<script>
		$(".preloader ").fadeOut();
	</script>

</body>

</html>