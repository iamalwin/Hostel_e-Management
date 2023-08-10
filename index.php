<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="./dist/home/css" rel="stylesheet">
  <title>Hostel Management</title>

  <link href="./dist/home/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./dist/css/style.min.css">
  <link rel="stylesheet" href="./dist/home/fontawesome.css">
  <link rel="stylesheet" href="./dist/home/style.css">
  <link rel="stylesheet" href="./dist/home/owl.css">
  <link rel="shortcut icon" href="./admin./include/ho_login.png">


  <style>
    .image-container {
    position: relative;
    display: inline-block;
}
.image-container::before {
  content: "";
    position: absolute;
    top: 0;
    left: 0;
    margin: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(48, 47, 47, 0.578);
}
.image-container img {
    display: block;
    width: 100%;
    height: auto;
}

  </style>
</head>

<body>

  <header class="fixed-top">
    <div class="preloader">
      <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
      </div>
    </div>

    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href=""><em><img src="./admin/include/ho_login.png" style="width: 40px; height:40px" alt=""></em>
          <h2>Hostel Management</h2>
        </a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
          </svg> </button>
        <div class="navbar-collapse collapse" id="navbarResponsive" style="">
          <ul class="navbar-nav ml-auto">
            <!-- <li class="nav-item active">
                <a class="nav-link" href="index.html">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li>  -->
            <li class="nav-item">
              <a class="nav-link" href="./admin/admin_login.php">Admin login</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="./stud_login.php">Students login</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="./guest_details.php">Guest Register</a>
            </li>

            <!-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">About</a>

              <div class="dropdown-menu">
                <a class="dropdown-item" href="about.html">About Us</a>
                <a class="dropdown-item" href="testimonials.html">Testimonials</a>
                <a class="dropdown-item" href="terms.html">Terms</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact Us</a>
            </li> -->
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <div class="main-banner">
    <div class="container-fluid">
      <div class="owl-banner bg-light p-0">

      <!-- <div class="bgimg"><img src="./admin/include/HO_LOGO.png" alt=""></div> -->
        <div class="image-container">
          <img src="./admin/include/sjc.jpeg" alt="">
        </div>        
      </div>
    </div>
  </div>
  <!-- Banner Ends Here -->


  <!-- <footer>
      <div class="container">
        <div class="row">

          <div class="col-lg-12">
            <div class="copyright-text">
              <p><a href="#"></a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </footer> -->

  <script src="./dist/home/jquery.min.js.download"></script>
  <script src="./dist/home/bootstrap.bundle.min.js.download"></script>

  <!-- preloading -->
  <script src="./assets/libs/popper.js/dist/umd/popper.min.js "></script>

  <script>
    $(".preloader ").fadeOut();
  </script>

</body>

</html>