<?php
include("../dbconnect.php");
extract($_POST);
session_start();
if (!isset($_SESSION["name"])) {
    header("Location: ./admin_login.php");
    exit();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Student Details</title>
    <link rel="stylesheet" href="./include/materialdesignicons.min.css">
    <link rel="stylesheet" href="./include/vendor.bundle.base.css">
    <link rel="stylesheet" href="./include/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../dist/css/style.min.css">
    <link href="Table 05_files/css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="Table 05_files/font-awesome.min.css">
    <link rel="stylesheet" href="Table 05_files/style.css">
    <link rel="stylesheet" href="./include/style.css">
    <link rel="shortcut icon" href="./include/ho_login.png">
    <link rel="stylesheet" href="./include/exstyle.css">
    <style>
        table .fw-bolder {
            font-weight: bolder;
            font-size: 1rem;
        }
        .center-container {
            /* display: flex;
            flex-direction: column; 
            text-align: center;*/
            justify-content: center;
            align-items: center;
            height: 90vh; /* Increase the height as needed */
            width: 90%; /* Increase the width as needed */
            margin: 0 auto;   
        }

        /* Style for approve and decline buttons */
        .action-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .approve-button {
            background-color: green;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-right: 10px;
            cursor: pointer;
        }

        .decline-button {
            background-color: red; 
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
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
                <div class="page-header">
                    <h3 class="page-title">
                        <span class="page-title-icon bg-gradient-primary text-white mr-2">
                            <i class="mdi mdi-contacts menu-icon"></i>
                        </span>Student Details
                    </h3>
                </div>
                <div class="center-container">
                <div class="grid-margin card p-5 stretch-card">
                    <table class="table table-responsive-xl">
                        <?php
                        if (isset($_GET['reg'])) {
                            $reg = $_GET['reg'];
                            $qry = mysqli_query($connect, "SELECT * FROM studreq WHERE reg='$reg'");
                            $row = mysqli_fetch_assoc($qry);
                            if ($row) {
                                echo "<h1>Student Details</h1>";
                                echo "<p>Reg No: " . $row['reg'] . "</p>";
                                echo "<p>Name: " . $row['name'] . "</p>";
                                echo "<p>Father's Name : " . $row['fathname'] . "</p>";
                                echo "<p>Gender: " . $row['gender'] . "</p>";
                                echo "<p>Age : " . $row['age'] . "</p>";
                                echo "<p>D.O.B : " . $row['dob'] . "</p>";
                                echo "<p>Email : " . $row['email'] . "</p>";
                                echo "<p>Phone: " . $row['phone'] . "</p>";
                                echo "<p>Address: " . $row['adds'] . "</p>";
                                // Add buttons for approval and deletion
                                echo "<div class='action-buttons'>";?>
                                <!-- echo "<button class='approve-button' onclick=\"approveStudent('$reg')\">Approve</button>";
                                echo "<button class='decline-button' onclick=\"deleteStudent('$reg')\">Decline</button>"; -->
                                <a href="approve_req.php?update=<?php echo $row['reg']; ?>">
                                <button class='approve-button'>Approve</button>
                                </a>
                                <a href="decline_req.php?update=<?php echo $row['reg']; ?>">
                                <button class='decline-button'>Decline</button>
                                </a>
                                <?php
                                echo "</div>";
                                
                            } else {
                                echo "Student not found.";
                            }
                        } else {
                            echo "Invalid request.";
                        }
                        ?>
                    </table>
                    <!-- Include your JavaScript code here to handle approval and deletion actions -->
                    <script>
                        function approveStudent(reg) {
                            // Add your code to approve the student here
                            alert("Student with Reg No " + reg + " approved.");
                        }

                        function deleteStudent(reg) {
                            // Add your code to decline the student here
                            alert("Student with Reg No " + reg + " declined.");
                        }
                    </script>
                </div>
                    </div>
                <footer class="footer">
                    <div class="container-fluid clearfix">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block"></span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"></span>
                    </div>
                </footer>
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
