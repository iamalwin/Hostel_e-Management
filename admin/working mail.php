<?php
include("../dbconnect.php");
session_start();

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
        $mail->setFrom('johnrajae321peeter@gmail.com', 'Mailer');
        $mail->addReplyTo('info@example.com', 'Information');

        $mail->isHTML(true);

        // Check which button was clicked
        if (isset($_POST['approve'])) {
            $reg = $_POST['reg'];

            $insert_sql = "INSERT INTO stud (name, reg, fathname, age, dob, email, phone, address) VALUES (
                '{$row['name']}', '{$row['reg']}', '{$row['age']}', '{$row['dob']}',  '{$row['email']}', '{$row['phone']}', '{$row['address']}')";

            mysqli_query($connect, $delete_sql);

            $mail->addAddress($row['email']);
            $mail->Subject = 'Approval Notification';
            $mail->Body = 'Congratulations, ' . $row['name'] . '! Your admission request has been approved.<br>
            Your Login Credential is your Name and Register Number.';

            $delete_sql = "DELETE FROM studreq WHERE reg = '$reg'";
            mysqli_query($connect, $delete_sql);
        } elseif (isset($_POST['reject'])) {
            $reg = $_POST['reg'];

            $sql = "SELECT * FROM studreq WHERE reg = '$reg'";
            $result = mysqli_query($connect, $sql);
            $row = mysqli_fetch_assoc($result);

            // Reject button was clicked
            $mail->addAddress($row['email']);
            $mail->Subject = 'Rejection Notification';
            $mail->Body = 'Sorry for Your request has been rejected.';

            $delete_sql = "DELETE FROM studreq WHERE reg = '$reg'";
            mysqli_query($connect, $delete_sql);
        }
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    header("Location: ./stud_req.php");
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
                    </div>

                    <!-- Dash data section -->


                    <div class="grid-margin card p-3 stretch-card" style="overflow: hidden;">
                    <?php
$query = "SELECT * FROM studreq";
$result = mysqli_query($connect, $query);
?>

<?php if (mysqli_num_rows($result) > 0) : ?>

    <form method="post" action="./stud_req.php">
        <table class="table table-responsive-xl">
            <thead class="bg-light asd">
                <tr>
                    <th class="fw-bolder" scope="col">Reg No</th>
                    <th class="fw-bolder" scope="col">Name</th>
                    <th class="fw-bolder" scope="col">Father Name</th>
                    <th class="fw-bolder" scope="col">Email</th>
                    <th class="fw-bolder" scope="col">Phone</th>
                    <th class="fw-bolder" scope="col">profile</th>
                </tr>
            </thead>

            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr class="alert asd" role="alert">
                    <td>
                        <div class="as"><?php echo $row['reg']; ?></div>
                        <input type="hidden" name="reg" value="<?php echo $row['reg']; ?>">
                    </td>
                    <td>
                        <div class="as"><?php echo $row['name']; ?></div>
                    </td>
                    <td>
                        <div class="as"><?php echo $row['fathname']; ?></div>
                    </td>
                    <!-- <td>
                        <div class="as"><?php echo $row['gender']; ?></div>
                    </td> -->
                    <td>
                        <div class="as"><?php echo $row['email']; ?></div>
                    </td>
                    <td>
                        <div class="as"><?php echo $row['phone']; ?></div>
                    </td>
                    <td>
                        <button type="submit" name="approve" value="approve">Approve</button>
                        <button type="submit" name="reject" value="reject">Reject</button>
                    </td>
                </tr>
            <?php } ?>
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
        $(".preloader ").fadeOut();
    </script>

</body>

</html>