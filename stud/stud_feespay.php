<!DOCTYPE html>
<!-- saved from url=(0054)https://www.bootstrapdash.com/demo/purple-admin-free/# -->
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Required meta tags -->

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hotel_Management</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../admin/include/materialdesignicons.min.css">
    <link rel="stylesheet" href="../admin/include/vendor.bundle.base.css">



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
    <link rel="stylesheet" href="../admin/include/style.css">
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
            <?php include './stud_navbar.php' ?>
        </header>

        <!-- partial -->
        <div class="container-fluid page-body-wrapper pt-0 proBanner-padding-top">
            <!-- partial:partials/_sidebar.html -->
            <div class="navcantainer d-fixed">
                <?php include './stud_sidebar.php' ?>
            </div>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <!-- dash section -->

                    <div class="page-header">
                        <h3 class="page-title">
                            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                            <i class="mdi mdi-cash-multiple menu-icon"></i>
                            </span> Fees pay
                        </h3>
                    </div>

                    <!-- Dash data section -->
                    <form action="#" method="post">
                        <div align="center"> <select name="month">
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
                            <input type="submit" name="btn1">
                        </div>
                    </form>

                    <?php
                    if (isset($_POST['btn1'])) {
                        $qry = mysqli_query($connect, "select * from amnt where month='$month'");
                        $row = mysqli_fetch_assoc($qry);
                        $month = $row['month'];
                        $total = $row['total'];
                        $hostel = $row['hf'];
                        $mess = $row['mf'];
                    }
                    ?>
                    <form name="form1" method="post" action="payment.php?month=<?php echo $month; ?>&total=<?php echo $total; ?>">
                        <table width="38%" height="210" border="0" align="center">

                            <tr>
                                <td width="39%" height="44">Register No</td>
                                <td width="61%"><?php echo $reg; ?></td>
                            </tr>


                            <tr>
                                <td width="39%" height="33"> Hostel Fees </td>
                                <td><?php echo $hostel; ?></td>
                            </tr>


                            <tr>
                                <td width="39%" height="42">Mess Fees </td>
                                <td> <?php echo $mess; ?></td>
                            </tr>


                            <tr>
                                <td width="39%" height="37">Total amount </td>
                                <td><?php echo $total; ?></td>
                            </tr>
                            <tr>
                                <td height="31">&nbsp;</td>
                                <td><input name="btn" type="submit" id="btn" /></td>
                            </tr>
                        </table>
                    </form>


                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="../admin/include/vendor.bundle.base.js.download"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="../admin/include/Chart.min.js.download"></script>
        <script src="../admin/include/jquery.cookie.js.download" type="text/javascript"></script>
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="../admin/include/off-canvas.js.download"></script>
        <script src="../admin/include/hoverable-collapse.js.download"></script>
        <script src="../admin/include/misc.js.download"></script>
        <!-- endinject -->
        <!-- Custom js for this page -->
        <script src="../admin/include/dashboard.js.download"></script>
        <script src="../admin/include/todolist.js.download"></script>
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