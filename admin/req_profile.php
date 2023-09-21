<?php
include("../dbconnect.php");
session_start();

$successmail = "";
$errormail = "";

$_SESSION['successmail'] = $successmail;
$_SESSION['errormail'] = $errormail;

// Check if the user is not logged in and redirect to the login page
if (!isset($_SESSION["name"])) {
    header("Location: ./admin_login.php");
    exit();
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = new PHPMailer(true);
    try {
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'johnrajae321peeter@gmail.com';
        $mail->Password = 'tzgi iagj vzpe rpxx';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        // Recipients
        $mail->setFrom('johnrajae321peeter@gmail.com', 'Hostel Admin');
        $mail->addReplyTo('info@gmail.com', 'Information');

        $mail->isHTML(true);

        // Check which button was clicked
        if (isset($_POST['approve'])) {
            $reg = $_POST['reg'];

            $sql = "SELECT * FROM studreq WHERE reg = '$reg'";
            $result = mysqli_query($connect, $sql);
            $row = mysqli_fetch_assoc($result);

            $insert_rq = "INSERT INTO stud (name, reg, dept,year,fathname,fathphone, age, dob, bldgrp, email, phone, address) VALUES (
                '{$row['name']}', '{$row['reg']}','{$row['dept']}','{$row['year']}','{$row['fathname']}','{$row['fathphone']}', '{$row['age']}', '{$row['dob']}', '{$row['bldgrp']}', '{$row['email']}', '{$row['phone']}', '{$row['address']}')";

            mysqli_query($connect, $insert_rq);

            $mail->addAddress($row['email']);
            $mail->Subject = 'Approval Notification';
            $mail->Body = 'Congratulations, ' . $row['name'] . '! Your admission request has been approved.<br>
            Your Login Credential is your Name and Register Number.';

            $delete_rq = "DELETE FROM studreq WHERE reg = '$reg'";
            mysqli_query($connect, $delete_rq);
        } elseif (isset($_POST['reject'])) {
            $reg = $_POST['reg'];
            $sql = "SELECT * FROM studreq WHERE reg = '$reg'";
            $result = mysqli_query($connect, $sql);
            $row = mysqli_fetch_assoc($result);

            $reject_sql = "INSERT INTO studrej (name, reg, dept,year,fathname,fathphone, age, dob, bldgrp, email, phone, address) VALUES ('{$row['name']}', '{$row['reg']}','{$row['dept']}','{$row['year']}','{$row['fathname']}','{$row['fathphone']}', '{$row['age']}', '{$row['dob']}', '{$row['bldgrp']}', '{$row['email']}', '{$row['phone']}', '{$row['address']}')";

            mysqli_query($connect, $reject_sql);

            // Reject button was clicked
            $mail->setFrom('johnrajae321peeter@gmail.com', 'Hostel Admin');
            $mail->addAddress($row['email']);
            $mail->Subject = 'Rejection Notification';
            $mail->Body = 'Sorry' . $row['name'] . ' for Your request has been rejected.';

            $delete_rj = "DELETE FROM studreq WHERE reg = '$reg'";
            mysqli_query($connect, $delete_rj);
        }
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();
        $_SESSION['successmail'] = "Suggestion has been solved.";
    } catch (Exception $e) {
        $_SESSION['errormail'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    header("Location: ./req_profile.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Required meta tags -->

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>stud_details</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="./include/materialdesignicons.min.css">
    <link rel="stylesheet" href="./include/vendor.bundle.base.css">

    <!-- Layout styles -->
    <link rel="stylesheet" href="./include/style.css">
    <!-- Add this link to your HTML head section -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">

    <link rel="stylesheet" href="../dist/css/style.min.css">

    <!-- external -->
    <link href="Table 05_files/css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="Table 05_files/font-awesome.min.css">
    <link rel="stylesheet" href="Table 05_files/style.css">
    <!-- endinject -->
    <link rel="stylesheet" href="./include/style.css">
    <link rel="shortcut icon" href="./include/ho_login.png">
    <link rel="stylesheet" href="./include/exstyle.css">

    <style>
        table .fw-bolder {
            font-weight: bolder;
            font-size: 1rem;
            /* font-size: 10px; */
        }

        .asd {
            /* flex-wrap: wrap; */
            /* width: fit-content; */
            width: 12000px;
        }

        .as {
            font-size: 15px;
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
                        <h3 class="page-title">
                            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                                <i class="mdi mdi-contacts menu-icon"></i>
                            </span>Apply Students
                        </h3>
                        <div id="successMessage" class="sucees p-2" style="display: none;">
                            <?php echo $successmail; ?>
                            <?php echo $errormail; ?></div>
                    </div>

                    <!-- Dash data section -->
                    <div class="grid-margin card p-3 stretch-card" style="overflow: hidden;">
                        <?php
                        $query = "SELECT * FROM studreq";
                        $result = mysqli_query($connect, $query);
                        ?>

                        <?php if (mysqli_num_rows($result) > 0) : ?>

                            <form method="post">
                                <table class="table table-responsive-xl">

                                    <?php
                                    if (isset($_GET['reg'])) {
                                        $reg = $_GET['reg'];
                                        $qry = mysqli_query($connect, "SELECT * FROM studreq WHERE reg='$reg'");
                                        $row = mysqli_fetch_assoc($qry);
                                        if ($row) { ?>
                                            <div class="card-body">
                                                <h2>Student Details</h2>
                                                <p>Reg No:<?php echo $row['reg']; ?>
                                                    <input type="hidden" name="reg" value="<?php echo $row['reg']; ?>">
                                                </p>
                                                <p>Name: <?php echo $row['name']; ?></p>
                                                <p>Dept: <?php echo $row['dept']; ?></p>
                                                <p>Year: <?php echo $row['year']; ?></p>
                                                <p>Father Name: <?php echo $row['fathname']; ?></p>
                                                <p>Father Phone: <?php echo $row['fathphone']; ?></p>
                                                <p>Age: <?php echo $row['age']; ?></p>
                                                <p>DOB: <?php echo $row['dob']; ?></p>
                                                <p>Bload Group: <?php echo $row['bldgrp']; ?></p>
                                                <p>Email: <?php echo $row['email']; ?></p>
                                                <p>Phone: <?php echo $row['phone']; ?></p>
                                                <p>Address: <?php echo $row['address']; ?></p>
                                                <button type="submit" class="btn btn-primary" name="approve" value="approve">Approve</button>
                                                <button type="submit" class="btn btn-primary" name="reject" value="reject">Reject</button>
                                            </div>
                                    <?php
                                            echo "</div>";
                                        } 
                                    } else {
                                        echo "Invalid request.";
                                    }
                                    ?>
                                </table>
                            </form>

                        <?php else : ?>
                            <div style="display:block; text-align:center">
                                <img style="height: 300px; width:400px;" src="./include/no_req.png" alt="">
                            </div>
                        <?php endif; ?>

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
  $(document).ready(function() {
    // Show the success message
    $("#successMessage").fadeIn();

    // Hide the success message after 10 seconds
    setTimeout(function() {
      $("#successMessage").fadeOut();
    }, 20000); // 10 seconds (10,000 milliseconds)
  });
</script>

    <script>
        $(".preloader ").fadeOut();
    </script>

</body>

</html>