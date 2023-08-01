<?php
include("../dbconnect.php");
extract($_POST);
session_start();
$_SESSION['stud_id'] = "stud_id";

if (isset($_POST['btn'])) {

	$qry = mysqli_query($connect, "INSERT INTO stud (stud_id, name, reg, gender, age, email, phone, dept, hname, room) VALUES (NULL, '$name','$reg','$gender','$age','$email','$phone','$dept','$hn','$room')");

	if ($qry) {
		$lastInsertedId = mysqli_insert_id($connect);
		$stud_id = 'stud' . str_pad($lastInsertedId, 3, '0', STR_PAD_LEFT);
		mysqli_query($connect, "UPDATE stud SET stud_id = '$stud_id' WHERE id = $lastInsertedId");
		echo "<script>alert('Hostel Assigned to Students')</script>";
	} else {
		echo "<script>alert('Enter the correct fields')</script>";
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>registration</title>
	<link rel="stylesheet" href="./include/materialdesignicons.min.css">
	<link rel="stylesheet" href="./include/vendor.bundle.base.css">

	<link rel="stylesheet" href="./include/style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">

	<link rel="stylesheet" href="../dist/css/style.min.css">

	<link rel="stylesheet" href="./include/style.css">

	<link rel="shortcut icon" href="./include/ho_login.png">
	<link rel="stylesheet" href="./include/exstyle.css">

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

		<!-- navbar -->
		<?php include 'navbar.php' ?>


		<!-- partial -->
		<div class="container-fluid page-body-wrapper pt-0 proBanner-padding-top">
			<?php include 'sidebar.php' ?>
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
					<div class="container">
					<form id="f1" name="f1" method="post" action="#" onSubmit="return vali()">
						<div class="row">
							<div class="col-md-5 m-3">
								<input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
							</div>
							<div class="col-md-5 m-3">
								<input type="text" class="form-control" name="reg" id="reg" placeholder="Register Number" required>
							</div>
						</div>
						<div class="row">

							<div class="col-md-5 m-3">
								<div class="col  d-flex flex-row">
									<div class="form-check m-3">
										<input class="form-check-input" type="radio" name="gender" id="male" value="male">
										<label class="form-check-label" for="male">
											Male
										</label>
									</div>

									<div class="form-check m-3">
										<input class="form-check-input" type="radio" name="gender" id="female" value="female">
										<label class="form-check-label" for="female">
											Female
										</label>
									</div>
								</div>

							</div>

							<div class="col-md-5 m-3">
								<input type="text" class="form-control"placeholder="Age" name="age" id="age" required>
							</div>
						</div>


						<div class="row">
							<div class="col-md-5 m-3">
								<input type="text" class="form-control" name="email" id="email" placeholder="E-mail" required>
							</div>
							<div class="col-md-5 m-3">
								<input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" required>
							</div>
						</div>

						<div class="row">
							<div class="col-md-5 m-3">
								<input type="text" class="form-control" name="dept" id="dept" placeholder="Department" required>
							</div>
							<div class="col-md-5 m-3">
								<input type="text" class="form-control" name="year" id="year" placeholder="Year of passing" required>
							</div>
						</div>

						<div class="row">
							<div class="col-md-5 m-3">
								<select name="hn">
									<option value="" class="btnsel">Select Hostel</option>
									<?php
									$qry = mysqli_query($connect, "select hname from hostel");
									while ($rw = mysqli_fetch_assoc($qry)) {
									?>
										<option value="<?php echo $rw['hname']; ?>"> <?php echo $rw['hname']; ?></option>
									<?php
									}
									?>
								</select>
							</div>
							<div class="col-md-5 m-3">
								<input type="text" class="form-control" name="room" id="room" placeholder="Room No" required>
							</div>
						</div>
						<div class="p-t-15">
							<button class="btn btn--radius-2 btn--blue btn btn-primary m-3" name="btn" type="submit" id="btn" value="Submit">Submit</button>
							<button class="btn btn--radius-2 btn--blue btn btn-primary m-3" type="reset" name="Submit2" value="Reset">Reset</button>
						</div>
						</form>

					</div>


					<!-- <?php echo $_SESSION['user_name']; ?> -->

				</div>
				<!-- content-wrapper ends -->
				<!-- partial:partials/_footer.html -->
				<footer class="footer">
					<div class="container-fluid clearfix">
						<span class="text-muted d-block text-center text-sm-left d-sm-inline-block"></span>
						<span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"></span>
					</div>
				</footer>
			</div>
		</div>
	</div>
	<script src="./include/vendor.bundle.base.js.download"></script>
	<script src="./include/Chart.min.js.download"></script>
	<script src="./include/jquery.cookie.js.download" type="text/javascript"></script>
	<script src="./include/off-canvas.js.download"></script>
	<script src="./include/hoverable-collapse.js.download"></script>
	<script src="./include/misc.js.download"></script>
	\ <script src="./include/dashboard.js.download"></script>
	<script src="./include/todolist.js.download"></script>
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