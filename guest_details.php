	<?php
	include("dbconnect.php");
	extract($_POST);
	session_start();
	if(isset($_POST['btn']))
	{
	
	$max_qry = mysqli_query($connect,"select max(id) from studreq");
		$max_row = mysqli_fetch_array($max_qry); 
		$id=$max_row['max(id)']+1;
	$qry=mysqli_query($connect,"insert into studreq values('$id','$reg','$name','$fathname','$age','$gender','$dob','$email','$phone','$adds')");
		if($qry)
		{
			
			echo "<script>alert('Registered Successfully')</script>";
		
		} 
		else
		{
			echo "<script>alert('Could not Register')</script>"; 
			
		
		}
		}
	?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>guest_registration</title>
	<link rel="stylesheet" href="./admin/include/materialdesignicons.min.css">
	<link rel="stylesheet" href="./admin/include/vendor.bundle.base.css">

	<link rel="stylesheet" href="./admin/include/style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">

	<link rel="stylesheet" href="../dist/css/style.min.css">

	<link rel="stylesheet" href="./admin/include/style.css">

	<link rel="shortcut icon" href="./admin/include/ho_login.png">
	<link rel="stylesheet" href="./admin/include/exstyle.css">


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
		.divcont{
			box-shadow: none;
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
<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 d-flex flex-row fixed-top">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
      <a class="navbar-brand brand-logo" href="./index.php"><img src="./admin/include/HO_LOGO.png" alt="logo"></a>
      <a class="navbar-brand brand-logo-mini" href="./index.php"><img src="./admin/include/ho_login.png" alt="logo"></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
      <ul class="navbar-nav navbar-nav-right">
<li class="nav-item">
              <a class="nav-link" style="color: black; font-weight:bold;font-size:1rem;" href="index.php">Home</a>
            </li>
      </ul>
    </div>
  </nav>
		<!-- partial -->
		<div class="container-fluid page-body-wrapper">
			<div class="card-body">
					<div class="page-header">
						<h3 class="page-title">
							<span class="page-title-icon bg-gradient-primary text-white mr-2">
								<i class="mdi mdi-account-plus menu-icon"></i>
							</span> Guest Registration
						</h3>
					</div>


					<div class="card d-flex justify-content-center align-items-center">
					<form class="card-body bg-light rounded col-10" id="f1" name="f1" method="post" action="#" onSubmit="return vali()">
						<div class="row">
							<div class="col-md-5 m-3">
								<input type="text" class="form-control" name="name" id="name" onChange="return name ()" placeholder="Name" required>
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
								<input type="number" class="form-control"placeholder="Age" name="age" id="age" required>
							</div>
						</div>

						<div class="row">
							<div class="col-md-5 m-3">
								<input type="text" class="form-control" name="fathname" id="fathname" placeholder="Father Name" required>
							</div>
							<div class="col-md-5 m-3">
								<input type="date" class="form-control" id="dob" name="dob" placeholder="DOB" required>
							</div>
						</div>

						<div class="row">
							<div class="col-md-5 m-3">
								<input type="email" class="form-control" name="email" id="email" placeholder="E-mail" required>
							</div>
							<div class="col-md-5 m-3">
								<input type="phone" class="form-control" id="phone" name="phone" placeholder="Phone" required>
							</div>
						</div>

						<div class="row">
							<div class="col-md-5 m-3">
								<textarea type="field" rows="8" cols="50" class="form-control" name="adds" id="adds" placeholder="Address" required></textarea>
							</div>
						</div>

						<div class="p-t-15">
							<button class="btn btn--radius-2 btn--blue btn btn-primary m-3" name="btn" type="submit" id="btn" value="Submit">Submit</button>
							<button class="btn btn--radius-2 btn--blue btn btn-primary m-3" type="reset" name="Submit2" value="Reset">Reset</button>
						</div>
						</form>

					</div>
			</div>
		</div>
	</div>
	<script src="./admin/include/vendor.bundle.base.js.download"></script>
	<script src="./admin/include/Chart.min.js.download"></script>
	<script src="./admin/include/jquery.cookie.js.download" type="text/javascript"></script>
	<script src="./admin/include/off-canvas.js.download"></script>
	<script src="./admin/include/hoverable-collapse.js.download"></script>
	<script src="./admin/include/misc.js.download"></script>
	<script src="./admin/include/dashboard.js.download"></script>
	<script src="./admin/include/todolist.js.download"></script>
	<script src="./assets/libs/jquery/dist/jquery.min.js "></script>
	<script src="./assets/libs/popper.js/dist/umd/popper.min.js "></script>
	<script src="./assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>

	<script src="./admin/include/vendor.bundle.base.js.download"></script>


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