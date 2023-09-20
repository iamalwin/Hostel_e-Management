<?php
include("../dbconnect.php");
session_start();

// Check if the user is not logged in and redirect to the login page
if (!isset($_SESSION["name"])) {
    header("Location: ./admin_login.php");
    exit();
}

?>
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['approve'])) {
    $reg = $_POST['reg'];

    $sql = "SELECT * FROM studreq WHERE reg = '$reg'"; // Make sure to use single quotes for the value
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);

    // Insert student details into studs table
    $insert_sql = "INSERT INTO stud (name, reg, fathname, age, dob, email, phone, address) VALUES (
        '{$row['name']}', '{$row['reg']}',  '{$row['fathphone']}', '{$row['age']}', '{$row['dob']}',  '{$row['email']}', '{$row['phone']}', '{$row['adds']}')";
    mysqli_query($connect, $insert_sql);


    // Send approval email
    require 'PHPMailer-master/src/Exception.php';
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';


    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'johnrajae321peeter@gmail.com';
        $mail->Password   = 'tzgi iagj vzpe rpxx';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        // Recipients
        $mail->setFrom(  $row['email'] , 'Mailer');
        $mail->addAddress(  $row['email'] , 'Joe User');     // Add a recipient
        $mail->addAddress(  $row['email'] );               // Name is optional
        $mail->addReplyTo('info@example.com', 'Information');

        // Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'Admission Approved';
        $mail->Body = 'Congratulations, ' . $row['name'] . '! Your admission request has been approved.<br>
        Your Login Credential is your Name and Register Number.
         ';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';

        $delete_sql = "DELETE FROM studreq WHERE reg = '$reg'";
        mysqli_query($connect, $delete_sql);
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    header("Location: ./stud_req.php"); // Replace 'your_page.php' with the actual page URL
    // Delete the request from studreq
    exit();
} if (isset($_POST['reject'])) {
    $reg = $_POST['reg'];

    try {
        // Server settings-
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'johnrajae321peeter@gmail.com';
        $mail->Password   = 'tzgi iagj vzpe rpxx';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        // Recipients
        $mail->setFrom('22pca136@mail.sjctni.edu', 'Mailer');
        $mail->addAddress('22pca136@mail.sjctni.edu', 'Joe User');     // Add a recipient
        $mail->addAddress('22pca136@mail.sjctni.edu');               // Name is optional
        $mail->addReplyTo('info@example.com', 'Information');

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Here is the subject';
        $mail->Body    = 'your application reject <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';

        $delete_sql = "DELETE FROM studreq WHERE reg = '$reg'";
        mysqli_query($connect, $delete_sql);
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
        .asd{
            /* flex-wrap: wrap; */
            /* width: fit-content; */
            width: 12000px;
        }
        .as{
            font-size: 15px;
        }
    </style>
</head>

<body class="">
    <div class="container-scroller">

        <!-- Preloader - style you can find in spinners.css -->
        <!-- 
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div> -->

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
                        <table class="table table-responsive-xl" >
                            <thead class="bg-light asd">
                                <tr>
                                    <th class="fw-bolder" scope="col">Reg No</th>
                                    <th class="fw-bolder" scope="col">Name</th>
                                    <th class="fw-bolder" scope="col">Father Name</th>
                                    <th class="fw-bolder" scope="col">Gender</th>
                                    <th class="fw-bolder" scope="col">Email</th>
                                    <th class="fw-bolder" scope="col">Phone</th>
                                    <th class="fw-bolder" scope="col">Address</th>
                                    <th class="fw-bolder" scope="col">Profile</th>

                                </tr>
                            </thead>

                            <?php
                            $query = "SELECT * FROM studreq";
                            $result = mysqli_query($connect, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $reg = $row['reg'];
                            ?>


                                <tr class="alert asd" role="alert">
                                    <td>
                                        <div class="as"><?php echo $row['reg']; ?></div>
                                    </td>
                                    <td>
                                        <div class="as"><?php echo $row['name']; ?></div>
                                    </td>
                                    <td>
                                        <div class="as"><?php echo $row['fathname']; ?></div>
                                    </td>
                                    <td>
                                        <div class="as"><?php echo $row['gender']; ?></div>
                                    </td>
                                    <td>
                                        <div class="as"><?php echo $row['email']; ?></div>
                                    </td>
                                    <td>
                                        <div class="as"><?php echo $row['phone']; ?></div>
                                    </td>
                                    <td>
                                        <div class="as"><?php echo $row['adds']; ?></div>
                                    </td>
                                    <td>

                                        <form method="post" action="./stud_req.php">
                                            <input type="hidden" name="reg" value="<?php echo $row['reg']; ?>">
                                            <button type="submit" name="approve" class="btn m-1 btn-success">Approve</button>
                                        </form>
                                        <form method="post" action="./stud_req.php">
                                            <input type="hidden" name="reg" value="<?php echo $row['reg']; ?>">
                                            <button type="submit" name="reject" class="btn m-1 btn-danger">Reject</button>
                                        </form>

                                        <!-- <div><a href="stud_view.php?reg=<?php echo $row['reg']; ?>">
                                                <button class="btn btn--radius-2 btn--blue btn btn-primary p-2 m-1" type="reset" name="Submit2" value="Reset">View</button></a></div> -->
                                    </td>
                                </tr>
                            <?php

                            }

                            ?>
                        </table>
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