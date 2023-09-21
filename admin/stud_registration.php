<?php
include("../dbconnect.php");
session_start();

if (!isset($_SESSION["name"])) {
	header("Location: ./admin_login.php");
	exit();
}

$success_reg = "";
$no_reg = "";

if (isset($_POST['btn'])) {
	$name = $_POST["name"];
	$reg = $_POST["reg"];
	$dept = $_POST["dept"];
	$year = $_POST["year"];
	$fathname = $_POST["fathname"];
	$fathphone = $_POST["fathphone"];
	$age = $_POST["age"];
	$dob = $_POST["dob"];
	$bldgrp = $_POST["bldgrp"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$address = $_POST["address"];
	$image = "./include/images";

	// insert
	$insertQuery = "INSERT INTO stud (name, reg, dept, year, fathname, fathphone, age, dob, bldgrp, email, phone, address, image)
          VALUES ('$name', '$reg', '$dept', '$year', '$fathname', '$fathphone', $age, '$dob', '$bldgrp', '$email', '$phone', '$address', '$image')";

	if (mysqli_query($connect, $insertQuery)) {
		$lastInsertedId = mysqli_insert_id($connect);
		$stud_id = 'stud' . str_pad($lastInsertedId, 3, '0', STR_PAD_LEFT);
		// update
		mysqli_query($connect, "UPDATE stud SET stud_id = '$stud_id' WHERE id = $lastInsertedId");
		$success_reg = "Hostel Assigned to Students";
	} else {
		$no_reg = "Enter the correct fields";
	}
	// Close the connection
	mysqli_close($connect);

	header("Location: ../admin/stud_detail.php?id=" . $row['id']);
	exit();
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
		.divcont {
			box-shadow: none;
		}
		.row {
			justify-content: center;
			align-items: center;
		}
		.sucees {
			background-color: rgb(195, 255, 225);
			border-radius: 5px;
			border: 1px solid white;
		}
		.error {
			background-color: rgb(255, 121, 121);
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

		<?php include 'navbar.php' ?>

		<!-- partial -->
		<div class="container-fluid page-body-wrapper pt-0 proBanner-padding-top">
			<?php include 'sidebar.php' ?>
			<div class="main-panel">
				<div class="content-wrapper p-4">
					<div class="page-header">
						<h3 class="page-title" style="font-family: 'Montserrat Alternates', sans-serif;
">
							<span class="page-title-icon bg-gradient-primary text-white mr-2">
								<i class="mdi mdi-account-plus menu-icon"></i>
							</span> Student Registration
						</h3>
					</div>

					<div class="card d-flex justify-content-center align-items-center">
						<form class="card-body col-12" id="f1" name="f1" method="post" action="#" onSubmit="return vali()">
							<div class="row">
								<div class="col-md-5 m-2">
									<label for="">Name</label>
									<input type="text" class="form-control" name="name" id="name" onChange="return name ()" placeholder="Name" required>
								</div>
								<div class="col-md-5 m-2">
									<label for="">Reg No</label>
									<input type="text" class="form-control" name="reg" id="reg" placeholder="Register Number" required>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5 m-2">
									<label for="">Department</label>
									<input type="text" class="form-control" name="dept" id="dept" placeholder="Department" required>
								</div>
								<div class="col-md-5 m-2">
									<label for="">Year</label>
									<input class="form-control" placeholder="Year ex: 1st UG  " name="year" id="year" required>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5 m-2">
									<label for="">Phone</label>
									<input type="" class="form-control" id="phone" name="phone" placeholder="Phone" maxLength="10" required>
								</div>
								<div class="col-md-5 m-2">
									<label for="">e-mail</label>
									<input type="text" class="form-control" name="email" id="email" placeholder="E-Mail" required>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5 m-2">
									<label for="">Age</label>
									<input type="" class="form-control" name="age" id="age" placeholder="Age" maxLength="2" required>
								</div>
								<div class="col-md-5 m-2">
									<label for="">DOB</label>
									<input type="date" title="date of barth" class="form-control" name="dob" id="dob" placeholder="DOB" required>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5 m-2">
									<label for="">Bload Group</label>
									<select class="form-control" id="bldgrp" name="bldgrp" placeholder="Blood Group" required name="blood_group">
										<option value="" disabled selected>Select Blood Group</option>
										<option value="A+">A +ve</option>
										<option value="A-">A -ve</option>
										<option value="B+">B +ve</option>
										<option value="B-">B -ve</option>
										<option value="AB+">AB +ve</option>
										<option value="AB-">AB -ve</option>
										<option value="O+">O +ve</option>
										<option value="O-">O -ve</option>
									</select>
								</div>
								<div class="col-md-5 m-2">
									<label for="">Father Name</label>
									<input type="text" class="form-control" name="fathname" id="fathname" placeholder="Father Name" required>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5 m-2">
									<label for="">Father Phone</label>
									<input type="phone" class="form-control" id="fathphone" name="fathphone" placeholder="Father Phone" onInput="validatePhoneNumber(this)" required>
								</div>
								<div class="col-md-5 m-2">
									<label for="">Address</label>
									<textarea type="text" class="form-control" name="address" id="address" placeholder="Adrress" required></textarea>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5 m-2">
									<label for=""></label>
									<img id="image-preview" src="#" alt="Preview" style="max-width: 80px; display: none;">
								</div>
								<div class="col-md-5 m-2">
									<label for="image">Profile Photo</label>
									<input type="file" name="image" id="image" accept="image/*" onchange="previewImage(event)" required>
								</div>
							</div>

							<!-- <div class="row">
							<div class="col-md-5 m-2 justify-content-center align-items-center d-flex" >
								<select name="hn" class="col-md-10 p-2">
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
							<div class="col-md-5 m-2">
								<input class="form-control" name="room" id="room" placeholder="Room No" required>
							</div>
						</div> -->
							<div class="p-t-15" style="margin-left: 80px;">
								<button class="btn btn--radius-2 btn--blue btn btn-primary m-3" name="btn" type="submit" id="btn" value="Submit">Submit</button>
								<button class="btn btn--radius-2 btn--blue btn btn-primary m-3" type="reset" name="Submit2" value="Reset">Reset</button>
							</div>
						</form>

					</div>

				</div>
			</div>
		</div>
	</div>
	<script src="./include/vendor.bundle.base.js.download"></script>
	<script src="./include/Chart.min.js.download"></script>
	<script src="./include/jquery.cookie.js.download" type="text/javascript"></script>
	<script src="./include/off-canvas.js.download"></script>
	<script src="./include/hoverable-collapse.js.download"></script>
	<script src="./include/misc.js.download"></script>
	<script src="./include/dashboard.js.download"></script>
	<script src="./include/todolist.js.download"></script>
	<script src="../assets/libs/jquery/dist/jquery.min.js "></script>
	<script src="../assets/libs/popper.js/dist/umd/popper.min.js "></script>
	<script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>

	<script src="../admin/include/vendor.bundle.base.js.download"></script>
	<script>
		function previewImage(event) {
			const imagePreview = document.getElementById('image-preview');
			const input = event.target;

			if (input.files && input.files[0]) {
				const reader = new FileReader();

				reader.onload = function(e) {
					imagePreview.src = e.target.result;
					imagePreview.style.display = 'block';
				};

				reader.readAsDataURL(input.files[0]);
			} else {
				imagePreview.style.display = 'none';
			}
		}
	</script>

	<!-- phone -->
	<script>
		function validatePhoneNumber(input) {
			var phoneNumber = document.getElementById(fathphone) // Remove non-numeric characters
			// const maxLength = 10;

			if (!/^[0-9]{10}$/.test(fathphone)) {
				alert('Invalid phone number ')
			}
			return
		}
	</script>
	<!-- year -->
	<script>
		function validateYear(input) {
			const yearno = input.value.replace(/\D/g, ''); // Remove non-numeric characters
			const maxLength = 4;

			if (yearno.length > maxLength) {
				input.value = yearno.slice(0, maxLength); // Truncate input to 10 digits
			}
		}
	</script>

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