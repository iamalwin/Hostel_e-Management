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
	<title>registration</title>
	<!-- plugins:css -->
	<link rel="stylesheet" href="./include/materialdesignicons.min.css">
	<link rel="stylesheet" href="./include/vendor.bundle.base.css">

	<!-- Layout styles -->
	<link rel="stylesheet" href="./include/style.css">
	<!-- Add this link to your HTML head section -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">

	<link rel="stylesheet" href="../dist/css/style.min.css">

	<!-- endinject -->
	<!-- Plugin css for this page -->
	<!-- End plugin css for this page -->
	<!-- inject:css -->
	<!-- endinject -->
	<!-- Layout styles -->
	<link rel="stylesheet" href="./include/style.css">
	<!-- End layout styles -->
	<link rel="shortcut icon" href="images/hs-logo.png  ">
	<!-- End layout styles -->
	<link rel="shortcut icon" href="https://www.bootstrapdash.com/demo/purple-admin-free/assets/images/favicon.ico">
	<link rel="stylesheet" href="./include/exstyle.css">
</head>

<body class="">
	<div class="container-scroller">

		<!-- Preloader - style you can find in spinners.css -->

		<div class="preloader">
			<div class="lds-ripple">
				<div class="lds-pos"></div>
				<div class="lds-pos"></div>
			</div>
		</div>

		<!-- partial:partials/_navbar.html -->
		<header class="topbar" data-navbarbg="skin6">
			<?php include 'navbar.php' ?>
		</header>


		<!-- partial -->
		<div class="container-fluid page-body-wrapper pt-0 proBanner-padding-top">
			<!-- partial:partials/_sidebar.html -->
			<div class="navcantainer d-fixed">
				<?php include 'sidebar.php' ?>
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
					</div>

					<!-- Dash data section -->

					<div class="formbold-main-wrapper card">
						<div class="card-body formbold-form-wrapper">
							<h2 class="title">Registration Form</h2>
							<form class="grid-margin" id="f1" name="f1" method="post" action="#" onSubmit="return vali()">
									<div class="row row-space">
										<div class="col-2">
											<div class="input-group mb-3">
												<label class="formbold-form-label">Name</label>
												<input class="input--style-4" type="text" name="name" type="text" id="name" onChange="return name ()">
											</div>
										</div>
										
										<div class="col-2">
											<div class="input-group">
												<label class="label">Register Number</label>
												<input class="input--style-4" type="text" name="reg" id="reg" required>
											</div>
										</div>
									</div>

									<div class="row row-space">
										<div class="col-2">
											<div class="input-group">
												<label class="label">Gender</label>
												<div class="p-t-10">
													<label class="radio-container m-r-45">Male
														<input type="radio" checked="checked" value="male" name="gender" required>
														<span class="checkmark"></span>
													</label>
													<label class="radio-container">Female
														<input type="radio" name="gender" value="female">
														<span class="checkmark"></span>
													</label>
												</div>
											</div>
										</div>
										<div class="col-2">
											<div class="input-group">
												<label class="label">Age</label>
												<div class="input-group-icon">
													<input class="input--style-4 js-datepicker" type="text" name="age" id="age">
												</div>
											</div>
										</div>
									</div>

									<div class="row row-space">
										<div class="col-2">
											<div class="input-group">
												<label class="label">Email</label>
												<input class="input--style-4" type="email" name="email" id="email" required>
											</div>
										</div>
										<div class="col-2">
											<div class="input-group">
												<label class="label">Phone Number</label>
												<input class="input--style-4" type="text" id="phone" name="phone">
											</div>
										</div>
									</div>

									<div class="row row-space">
										<div class="col-2">
											<div class="input-group">
												<label class="label">Department</label>
												<input class="input--style-4" type="text" name="dept" id="dept">
											</div>
										</div>
										<div class="col-2">
											<div class="input-group">
												<label class="label">Class</label>
												<input class="input--style-4" type="text" name="cls" id="cls">
											</div>
										</div>
									</div>

									<div class="row row-space">
										<div class="col-2">
											<div class="input-group">
												<label class="label">Year of Passing</label>
												<input class="input--style-4" type="text" name="year" id="year">
											</div>
										</div>
										<div class="col-2">
											<div class="input-group">
												<label class="label">Subject</label>
												<div class="rs-select2 js-select-simple select--no-search">
													<select name="hn">
														<option value="">Select Hostel</option>
														<?php
														$qry = mysqli_query($connect, "select hname from hostel");
														while ($rw = mysqli_fetch_assoc($qry)) {
														?>
															<option value="<?php echo $rw['hname']; ?>"> <?php echo $rw['hname']; ?></option>
														<?php
														}
														?>
													</select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 105.6px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-subject-ij-container"><span class="select2-selection__rendered" id="select2-subject-ij-container" title="Choose option">Choose option</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
													<div class="select-dropdown"></div>
												</div>
											</div>
										</div>
										<div class="col-2">
											<div class="input-group">
												<label class="label">Room No</label>
												<input class="input--style-4" name="room" type="text" id="room">
											</div>
										</div>
									</div>


									<div class="p-t-15">
										<button class="btn btn--radius-2 btn--blue" name="btn" type="submit" id="btn" value="Submit">Submit</button>

										<button type="reset" name="Submit2" value="Reset">Reset</button>
									</div>

							</form>
						</div>
					</div>

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
	<script src="./include/vendor.bundle.base.js.download"></script>
	<!-- endinject -->
	<!-- Plugin js for this page -->
	<script src="./include/Chart.min.js.download"></script>
	<script src="./include/jquery.cookie.js.download" type="text/javascript"></script>
	<!-- End plugin js for this page -->
	<!-- inject:js -->
	<script src="./include/off-canvas.js.download"></script>
	<script src="./include/hoverable-collapse.js.download"></script>
	<script src="./include/misc.js.download"></script>
	<!-- endinject -->
	<!-- Custom js for this page -->
	<script src="./include/dashboard.js.download"></script>
	<script src="./include/todolist.js.download"></script>
	<!-- End custom js for this page -->

	<!-- Bootstrap tether Core JavaScript -->
	<script src="../assets/libs/jquery/dist/jquery.min.js "></script>
	<script src="../assets/libs/popper.js/dist/umd/popper.min.js "></script>
	<script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>

	<script src="../admin/include/vendor.bundle.base.js.download"></script>


	<script>
		// Function to toggle the collapse on click
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

		// Add click event listeners to all the collapsed menu items
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