<?php
include("../dbconnect.php");
extract($_POST);
session_start();
	$reg=$_SESSION['reg'];
	if(isset($_POST['btn']))
	{
	$max_qry=mysqli_query($connect,"select max(id) from suggest");
	$max_row=mysqli_fetch_array($max_qry);
	$id=$max_row['max(id)']+1;
	$qry=mysqli_query($connect,"insert into suggest values('$id','$reg','$name','$sub','$cmpl')");
	if($qry)
	{
		echo "<script>alert('We Get your Suggestions if it is posiible we will take action for that')</script>";
		
	}
	else
	{
		echo "<script>alert('Enter the fields Correctly')</script>";
	
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
  <title>feedback</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../admin/Purple Admin_files/materialdesignicons.min.css">
  <link rel="stylesheet" href="../admin/Purple Admin_files/vendor.bundle.base.css">



  <!-- Add this link to your HTML head section -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">

  <link rel="stylesheet" href="../dist/css/style.min.css">

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', sans-serif;
    }

    .formbold-mb-3 {
      margin-bottom: 15px;
    }

    .formbold-relative {
      position: relative;
    }

    .formbold-opacity-0 {
      opacity: 0;
    }

    .formbold-stroke-current {
      stroke: currentColor;
    }

    #supportCheckbox:checked~div span {
      opacity: 1;
    }

    .formbold-main-wrapper {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 48px;
    }

    .formbold-form-wrapper {
      margin: 0 auto;
      max-width: 570px;
      width: 100%;
      background: white;
      padding: 40px;
    }

    .formbold-img {
      margin-bottom: 45px;
    }

    .formbold-form-title {
      margin-bottom: 30px;
    }

    .formbold-form-title h2 {
      font-weight: 600;
      font-size: 28px;
      line-height: 34px;
      color: #07074d;
    }

    .formbold-form-title p {
      font-size: 16px;
      line-height: 24px;
      color: #536387;
      margin-top: 12px;
    }

    .formbold-input-flex {
      display: flex;
      gap: 20px;
      margin-bottom: 15px;
    }

    .formbold-input-flex>div {
      width: 50%;
    }

    .formbold-form-input {
      width: 100%;
      padding: 13px 22px;
      border-radius: 5px;
      border: 1px solid #dde3ec;
      background: #ffffff;
      font-weight: 500;
      font-size: 16px;
      color: #536387;
      outline: none;
      resize: none;
    }

    .formbold-form-input:focus {
      border-color: #6a64f1;
      box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
    }

    .formbold-form-label {
      color: #536387;
      font-size: 14px;
      line-height: 24px;
      display: block;
      margin-bottom: 10px;
    }

    .formbold-checkbox-label {
      display: flex;
      cursor: pointer;
      user-select: none;
      font-size: 16px;
      line-height: 24px;
      color: #536387;
    }

    .formbold-checkbox-label a {
      margin-left: 5px;
      color: #6a64f1;
    }

    .formbold-input-checkbox {
      position: absolute;
      width: 1px;
      height: 1px;
      padding: 0;
      margin: -1px;
      overflow: hidden;
      clip: rect(0, 0, 0, 0);
      white-space: nowrap;
      border-width: 0;
    }

    .formbold-checkbox-inner {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 20px;
      height: 20px;
      margin-right: 16px;
      margin-top: 2px;
      border: 0.7px solid #dde3ec;
      border-radius: 3px;
    }

    .formbold-btn {
      font-size: 16px;
      border-radius: 5px;
      padding: 14px 25px;
      border: none;
      font-weight: 500;
      background-color: #6a64f1;
      color: white;
      cursor: pointer;
      margin-top: 25px;
    }

    .formbold-btn:hover {
      box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
    }

    /* time */
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

  <!-- Layout styles -->
  <link rel="stylesheet" href="../admin/Purple Admin_files/style.css">
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

    <!-- partial:partials/_navbar.html -->
    <header class="topbar" data-navbarbg="skin6">
      <?php include './include/stud_navbar.php' ?>
    </header>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper pt-0 proBanner-padding-top">
      <!-- partial:partials/_sidebar.html -->
      <div class="navcantainer d-fixed">
        <?php include './include/stud_sidebar.php' ?>
      </div>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">

          <!-- dash section -->

          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
              <i class="mdi mdi-chart-bar menu-icon"></i>
              </span> Feedback
            </h3>
          </div>

          <!-- Dash data section -->


          <div class="formbold-main-wrapper card">
            <div class="formbold-form-wrapper">

              <svg class="formbold-img float-right" width="250" height="70" viewBox="0 0 490 202" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M382.76 2.47283H262.606C262.606 1.10712 261.499 0 260.133 0H210.597C209.231 0 208.124 1.10712 208.124 2.47283H87.4749C85.3191 2.47283 83.2517 3.32799 81.7274 4.85017C80.203 6.37235 79.3467 8.43686 79.3467 10.5896V174.884C79.3467 177.037 80.203 179.101 81.7274 180.623C83.2517 182.146 85.3191 183.001 87.4749 183.001H382.76C384.916 183.001 386.983 182.146 388.508 180.623C390.032 179.101 390.888 177.037 390.888 174.884V10.5886C390.888 8.43611 390.032 6.37183 388.507 4.84985C386.983 3.32787 384.916 2.47283 382.76 2.47283Z" fill="#3F3D56"></path>
                <path d="M379.991 16.8164H90.2441V180.033H379.991V16.8164Z" fill="#E6E6E6"></path>
                <path d="M368.27 25.3164H103V166.396H368.27V25.3164Z" fill="white"></path>
                <path d="M228.237 61.1693C228.237 59.9971 228.546 58.8455 229.132 57.8305C229.718 56.8154 230.562 55.9727 231.577 55.3872C230.562 54.801 229.411 54.4923 228.239 54.4922C227.067 54.4921 225.915 54.8005 224.9 55.3864C223.885 55.9724 223.042 56.8153 222.456 57.8303C221.87 58.8453 221.561 59.9968 221.561 61.1689C221.561 62.341 221.87 63.4924 222.456 64.5074C223.042 65.5225 223.885 66.3653 224.9 66.9513C225.915 67.5373 227.067 67.8457 228.239 67.8456C229.411 67.8454 230.562 67.5367 231.577 66.9505C230.562 66.3651 229.718 65.5226 229.132 64.5077C228.546 63.4928 228.237 62.3414 228.237 61.1693Z" fill="#CCCCCC"></path>
                <path d="M236.631 61.1693C236.631 59.9971 236.939 58.8455 237.526 57.8305C238.112 56.8154 238.955 55.9727 239.971 55.3872C238.956 54.801 237.804 54.4923 236.632 54.4922C235.46 54.4921 234.309 54.8005 233.294 55.3864C232.279 55.9724 231.436 56.8153 230.849 57.8303C230.263 58.8453 229.955 59.9968 229.955 61.1689C229.955 62.341 230.263 63.4924 230.849 64.5074C231.436 65.5225 232.279 66.3653 233.294 66.9513C234.309 67.5373 235.46 67.8457 236.632 67.8456C237.804 67.8454 238.956 67.5367 239.971 66.9505C238.955 66.3651 238.112 65.5226 237.526 64.5077C236.939 63.4928 236.631 62.3414 236.631 61.1693Z" fill="#CCCCCC"></path>
                <path d="M244.834 67.8475C248.521 67.8475 251.511 64.8583 251.511 61.1708C251.511 57.4834 248.521 54.4941 244.834 54.4941C241.146 54.4941 238.157 57.4834 238.157 61.1708C238.157 64.8583 241.146 67.8475 244.834 67.8475Z" fill="#6A64F1"></path>
                <path d="M255.992 82.0242H217.079C216.709 82.0238 216.354 81.8764 216.092 81.6145C215.83 81.3525 215.682 80.9974 215.682 80.6269V41.7137C215.682 41.3433 215.83 40.9881 216.092 40.7262C216.354 40.4642 216.709 40.3168 217.079 40.3164H255.992C256.363 40.3168 256.718 40.4642 256.98 40.7262C257.242 40.9881 257.389 41.3433 257.39 41.7137V80.6269C257.389 80.9974 257.242 81.3525 256.98 81.6145C256.718 81.8764 256.363 82.0238 255.992 82.0242ZM217.079 40.8757C216.857 40.8759 216.644 40.9643 216.487 41.1214C216.329 41.2786 216.241 41.4917 216.241 41.714V80.6272C216.241 80.8495 216.329 81.0626 216.487 81.2197C216.644 81.3769 216.857 81.4653 217.079 81.4655H255.992C256.215 81.4653 256.428 81.3769 256.585 81.2197C256.742 81.0626 256.831 80.8495 256.831 80.6272V41.714C256.831 41.4917 256.742 41.2786 256.585 41.1214C256.428 40.9643 256.215 40.8759 255.992 40.8757H217.079Z" fill="#CCCCCC"></path>
                <path d="M264.681 111.854H205V112.412H264.681V111.854Z" fill="#CCCCCC"></path>
                <path d="M206.885 108.363C207.926 108.363 208.77 107.519 208.77 106.479C208.77 105.438 207.926 104.594 206.885 104.594C205.844 104.594 205 105.438 205 106.479C205 107.519 205.844 108.363 206.885 108.363Z" fill="#6A64F1"></path>
                <path d="M264.681 130.699H205V131.258H264.681V130.699Z" fill="#CCCCCC"></path>
                <path d="M206.885 127.209C207.926 127.209 208.77 126.365 208.77 125.324C208.77 124.283 207.926 123.439 206.885 123.439C205.844 123.439 205 124.283 205 125.324C205 126.365 205.844 127.209 206.885 127.209Z" fill="#6A64F1"></path>
                <path d="M263.589 152.16H244.728C244.402 152.16 244.09 152.03 243.86 151.8C243.629 151.569 243.5 151.257 243.499 150.931V144.321C243.5 143.995 243.629 143.682 243.86 143.452C244.09 143.222 244.402 143.092 244.728 143.092H263.589C263.915 143.092 264.227 143.222 264.457 143.452C264.688 143.682 264.817 143.995 264.818 144.321V150.931C264.817 151.257 264.688 151.569 264.457 151.8C264.227 152.03 263.915 152.16 263.589 152.16Z" fill="#6A64F1"></path>
                <path d="M213.033 108.363C214.074 108.363 214.917 107.519 214.917 106.479C214.917 105.438 214.074 104.594 213.033 104.594C211.992 104.594 211.148 105.438 211.148 106.479C211.148 107.519 211.992 108.363 213.033 108.363Z" fill="#6A64F1"></path>
                <path d="M219.181 108.363C220.222 108.363 221.066 107.519 221.066 106.479C221.066 105.438 220.222 104.594 219.181 104.594C218.14 104.594 217.296 105.438 217.296 106.479C217.296 107.519 218.14 108.363 219.181 108.363Z" fill="#6A64F1"></path>
                <path d="M213.033 127.209C214.074 127.209 214.917 126.365 214.917 125.324C214.917 124.283 214.074 123.439 213.033 123.439C211.992 123.439 211.148 124.283 211.148 125.324C211.148 126.365 211.992 127.209 213.033 127.209Z" fill="#6A64F1"></path>
                <path d="M219.181 127.209C220.222 127.209 221.066 126.365 221.066 125.324C221.066 124.283 220.222 123.439 219.181 123.439C218.14 123.439 217.296 124.283 217.296 125.324C217.296 126.365 218.14 127.209 219.181 127.209Z" fill="#6A64F1"></path>
                <path opacity="0.5" d="M234.87 12.365C236.511 12.365 237.842 11.0364 237.842 9.39736C237.842 7.75836 236.511 6.42969 234.87 6.42969C233.228 6.42969 231.898 7.75836 231.898 9.39736C231.898 11.0364 233.228 12.365 234.87 12.365Z" fill="white"></path>
                <path d="M399.023 177.065H370.746V175.03C370.746 174.923 370.703 174.821 370.627 174.745C370.552 174.669 370.449 174.627 370.342 174.627H360.646C360.539 174.627 360.436 174.669 360.361 174.745C360.285 174.821 360.242 174.923 360.242 175.03V177.065H354.183V175.03C354.183 174.923 354.141 174.821 354.065 174.745C353.989 174.669 353.886 174.627 353.779 174.627H344.084C343.977 174.627 343.874 174.669 343.798 174.745C343.722 174.821 343.68 174.923 343.68 175.03V177.065H337.621V175.03C337.621 174.923 337.578 174.821 337.502 174.745C337.426 174.669 337.324 174.627 337.216 174.627H327.521C327.414 174.627 327.311 174.669 327.236 174.745C327.16 174.821 327.117 174.923 327.117 175.03V177.065H321.058V175.03C321.058 174.923 321.015 174.821 320.94 174.745C320.864 174.669 320.761 174.627 320.654 174.627H310.959C310.852 174.627 310.749 174.669 310.673 174.745C310.598 174.821 310.555 174.923 310.555 175.03V177.065H304.495V175.03C304.495 174.923 304.453 174.821 304.377 174.745C304.301 174.669 304.199 174.627 304.091 174.627H294.397C294.289 174.627 294.187 174.669 294.111 174.745C294.035 174.821 293.993 174.923 293.993 175.03V177.065H287.933V175.03C287.933 174.923 287.89 174.821 287.815 174.745C287.739 174.669 287.636 174.627 287.529 174.627H277.836C277.729 174.627 277.626 174.669 277.55 174.745C277.474 174.821 277.432 174.923 277.432 175.03V177.065H271.37V175.03C271.37 174.923 271.328 174.821 271.252 174.745C271.176 174.669 271.073 174.627 270.966 174.627H195.021C194.914 174.627 194.811 174.669 194.736 174.745C194.66 174.821 194.617 174.923 194.617 175.03V177.065H188.558V175.03C188.558 174.923 188.515 174.821 188.44 174.745C188.364 174.669 188.261 174.627 188.154 174.627H178.459C178.352 174.627 178.249 174.669 178.173 174.745C178.097 174.821 178.055 174.923 178.055 175.03V177.065H171.995V175.03C171.995 174.923 171.953 174.821 171.877 174.745C171.801 174.669 171.699 174.627 171.591 174.627H161.897C161.79 174.627 161.687 174.669 161.611 174.745C161.535 174.821 161.493 174.923 161.493 175.03V177.065H155.433V175.03C155.433 174.923 155.39 174.821 155.315 174.745C155.239 174.669 155.136 174.627 155.029 174.627H145.334C145.227 174.627 145.124 174.669 145.048 174.745C144.973 174.821 144.93 174.923 144.93 175.03V177.065H138.872V175.03C138.872 174.923 138.829 174.821 138.753 174.745C138.678 174.669 138.575 174.627 138.468 174.627H128.772C128.664 174.627 128.562 174.669 128.486 174.745C128.41 174.821 128.367 174.923 128.367 175.03V177.065H122.308V175.03C122.308 174.923 122.266 174.821 122.19 174.745C122.114 174.669 122.011 174.627 121.904 174.627H112.209C112.102 174.627 111.999 174.669 111.923 174.745C111.848 174.821 111.805 174.923 111.805 175.03V177.065H105.746V175.03C105.746 174.923 105.703 174.821 105.627 174.745C105.552 174.669 105.449 174.627 105.342 174.627H95.6446C95.5375 174.627 95.4347 174.669 95.3589 174.745C95.2831 174.821 95.2405 174.923 95.2405 175.03V177.065H76.6603C74.0889 177.065 71.6229 178.085 69.8047 179.901C67.9865 181.716 66.9651 184.179 66.9651 186.747V191.124C66.9651 193.692 67.9865 196.154 69.8047 197.97C71.6229 199.786 74.0889 200.806 76.6603 200.806H399.023C401.594 200.806 404.06 199.786 405.878 197.97C407.697 196.155 408.718 193.692 408.718 191.125V186.747C408.718 184.179 407.697 181.717 405.879 179.901C404.06 178.086 401.594 177.066 399.023 177.066V177.065Z" fill="#3F3D56"></path>
                <path d="M490 200.395H0V201.317H490V200.395Z" fill="#E6E6E6"></path>
                <path d="M442.412 168.175C449.051 175.289 449.394 185.746 449.394 185.746C449.394 185.746 438.973 184.667 432.334 177.553C425.694 170.439 425.351 159.982 425.351 159.982C425.351 159.982 435.772 161.061 442.412 168.175Z" fill="#6A64F1"></path>
                <path d="M463.313 179.279C456.189 185.908 445.717 186.251 445.717 186.251C445.717 186.251 446.797 175.845 453.921 169.215C461.045 162.585 471.517 162.242 471.517 162.242C471.517 162.242 470.437 172.649 463.313 179.279Z" fill="#6A64F1"></path>
                <path d="M461.542 200.394H435.338C434.836 200.394 434.343 200.253 433.917 199.986C433.49 199.72 433.148 199.339 432.928 198.888L427.223 187.177C427.024 186.769 426.932 186.317 426.956 185.864C426.98 185.411 427.119 184.971 427.36 184.586C427.601 184.201 427.936 183.884 428.334 183.664C428.732 183.445 429.179 183.33 429.633 183.33H467.247C467.702 183.33 468.149 183.445 468.547 183.664C468.945 183.884 469.28 184.201 469.521 184.586C469.762 184.971 469.901 185.411 469.925 185.864C469.949 186.317 469.857 186.769 469.658 187.177L463.953 198.888C463.733 199.34 463.39 199.721 462.964 199.987C462.538 200.253 462.045 200.394 461.543 200.394L461.542 200.394Z" fill="#E5E5E5"></path>
                <path d="M28.1517 168.175C34.791 175.289 35.1341 185.746 35.1341 185.746C35.1341 185.746 24.7129 184.667 18.0737 177.553C11.4344 170.439 11.0913 159.982 11.0913 159.982C11.0913 159.982 21.5125 161.061 28.1517 168.175Z" fill="#E5E5E5"></path>
                <path d="M43.1255 200.394H16.9219C16.4191 200.394 15.9264 200.253 15.5002 199.986C15.0739 199.72 14.7313 199.339 14.5116 198.888L8.80661 187.177C8.6074 186.769 8.51542 186.317 8.53936 185.864C8.5633 185.411 8.70236 184.971 8.94344 184.586C9.18453 184.201 9.51971 183.884 9.91743 183.664C10.3152 183.445 10.7623 183.33 11.2169 183.33H48.831C49.2855 183.33 49.7327 183.445 50.1304 183.664C50.5282 183.884 50.8633 184.201 51.1044 184.586C51.3455 184.971 51.4846 185.411 51.5085 185.864C51.5324 186.317 51.4405 186.769 51.2413 187.177L45.5363 198.888C45.3165 199.34 44.974 199.721 44.5477 199.987C44.1215 200.253 43.6288 200.394 43.126 200.394L43.1255 200.394Z" fill="#E5E5E5"></path>
              </svg>

              <form class="grid-margin" action="#" method="POST">
                <div class="formbold-form-title">
                  <h2 class="">Feedback now</h2>
                  <p>
                    Leave Your Feed Back About Hostel And Mess
                  </p>
                </div>

                <div class="formbold-input-flex">
                  <div>
                    <label for="firstname" class="formbold-form-label">
                      Student Name
                    </label>
                    <input type="text" name="name" id="firstname" class="formbold-form-input" />
                  </div>
                </div>


                <div>
                  <label for="area" class="formbold-form-label"> Subject </label>
                  <input type="text" name="sub" id="area" class="formbold-form-input" />
                </div>

                <div>
                  <label for="area" class="formbold-form-label"> Complaints or Suggestions </label>
                  <textarea name="cmpl" id="" cols="60" rows="10" class="formbold-form-input"></textarea>
                </div>
                <button class="formbold-btn" name="btn">Register Now</button>
              </form>
            </div>
          </div>


          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../admin/Purple Admin_files/vendor.bundle.base.js.download"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../admin/Purple Admin_files/Chart.min.js.download"></script>
    <script src="../admin/Purple Admin_files/jquery.cookie.js.download" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../admin/Purple Admin_files/off-canvas.js.download"></script>
    <script src="../admin/Purple Admin_files/hoverable-collapse.js.download"></script>
    <script src="../admin/Purple Admin_files/misc.js.download"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../admin/Purple Admin_files/dashboard.js.download"></script>
    <script src="../admin/Purple Admin_files/todolist.js.download"></script>
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


    <script src="../admin/Purple Admin_files/vendor.bundle.base.js.download"></script>

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