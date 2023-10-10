<?php
include("../dbconnect.php");
session_start();

if (!isset($_SESSION["name"])) {
    header("Location: ./admin_login.php");
    exit();
}

// $stud_update = '';
$stud_update = '';
$displayMessage = false;


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];
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

    $query = "UPDATE stud SET name = ?, reg = ?, dept = ?, year = ?, fathname = ?, fathphone = ?, age = ?, dob = ?, bldgrp = ?, email = ?, phone = ?, address = ? WHERE id = ?";
    $stmt = mysqli_prepare($connect, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssssssssssi", $name, $reg, $dept, $year, $fathname, $fathphone, $age, $dob, $bldgrp, $email, $phone, $address, $id);

        if (mysqli_stmt_execute($stmt)) {
            ?>
<script>
    var name = "<?php echo $name; ?>";
    alert(name + " - details updated successfully!");
</script>

            <?php
        } else {
            $stud_update = "Error updating student details.";
        }
    } else {
        echo "Error creating prepared statement.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>stud_details</title>
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
                    <div class="page-header m-0">
                        <h3 class="page-title">
                            <span class="page-title-icon bg-gradient-primary text-white">
                                <i class="mdi mdi-pencil menu-icon"></i>
                            </span> Update Details
                        </h3>
                        <?php
                                $id = $_GET["id"];
                                $query = "SELECT * FROM stud WHERE id = '$id'";
                                $result = mysqli_query($connect, $query);
                                if ($result && mysqli_num_rows($result) > 0) {
                                    $row = mysqli_fetch_assoc($result);
                                ?>
                            <div class="page-header bg-white pl-4 pr-4 ml-auto rounded" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px;">
                                <h3 type="text" class="p-0" name="ap_id" style="font-size:1rem;">AP_ID: <?php echo $row['ap_id']; ?></h3>
                                <h3 type="text" class="p-4" name="stud_id" style="font-size:1rem;">STUD_ID: <?php echo $row['stud_id']; ?></h3>
                                <img style="border-radius: 20px;height:60px;" src="include/<?php echo $row['image']; ?>">
                            </div>
                        <?php
                                } else {
                                    echo "Student request not found.";
                                }
                        ?>
                        <div class="d-flex align-items-center mb-4 ml-2">
                            <a href="./stud_detail.php">
                                <button type="button" class="btn btn-primary pl-1 pr-1 pt-3 pb-3"><i class="mdi mdi-chevron-left menu-icon" style="font-size: 2rem;"></i></button>
                            </a>
                        </div>
                    </div>

                    <div class="formbold-main-wrapper card  justify-content-center align-items-center">
                        <form method="post" class="col-12" style="box-shadow: rgba(50, 50, 105, 0.15) 0px 2px 5px 0px, rgba(0, 0, 0, 0.05) 0px 1px 1px 0px;">
                            <div class="row mt-0 justify-content-center align-items-center p-3">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <div class="m-1 col-md-5">
                                    <div style="margin-top:10px;">
                                        <label for="name">Name</label><br>
                                        <input type="text" class="form-control" name="name" disabled value="<?php echo $row['name']; ?>" style="font-size:1rem; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                                    </div>
                                    <div style="margin-top:10px;">
                                        <label for="reg">Reg No</label><br>
                                        <input type="text" class="form-control" name="reg" disabled value="<?php echo $row['reg']; ?>" style="font-size:1rem; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                                    </div>
                                </div>
                                <div class="m-1 col-md-5">
                                    <div style="margin-top:10px;">
                                        <label for="dept">Department</label><br>
                                        <input type="text" class="form-control" name="dept" disabled value="<?php echo $row['dept']; ?>" style="font-size:1rem; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                                    </div>
                                    <div style="margin-top:10px;">
                                        <label for="year">Year</label><br>
                                        <input type="text" class="form-control" name="year" disabled value="<?php echo $row['year']; ?>" style="font-size:1rem; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                                    </div>
                                </div>

                                <div class="m-1 col-md-5">
                                    <div style="margin-top:10px;">
                                        <label for="phone">Phone</label><br>
                                        <input type="text" class="form-control" name="phone" disabled value="<?php echo $row['phone']; ?>" style="font-size:1rem; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                                    </div>
                                    <div style="margin-top:10px;">
                                        <label for="email">Email</label><br>
                                        <input type="text" class="form-control" name="email" disabled value="<?php echo $row['email']; ?>" style="font-size:1rem; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                                    </div>
                                </div>

                                <div class="m-1 col-md-5">
                                    <div style="margin-top:10px;">
                                        <label for="age">Age</label><br>
                                        <input type="text" class="form-control" name="age" disabled value="<?php echo $row['age']; ?>" style="font-size:1rem; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                                    </div>
                                    <div style="margin-top:10px;">
                                        <label for="dob">Dob</label><br>
                                        <input type="text" class="form-control" name="dob" disabled value="<?php echo $row['dob']; ?>" style="font-size:1rem; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                                    </div>
                                </div>

                                <div class="m-1 col-md-5">
                                    <div style="margin-top:10px;">
                                        <label for="bldgrp">Blood Group</label><br>
                                        <input type="text" class="form-control" name="bldgrp" disabled value="<?php echo $row['bldgrp']; ?>" style="font-size:1rem; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                                    </div>
                                    <div style="margin-top:10px;">
                                        <label for="fathname">Father Name</label><br>
                                        <input type="text" class="form-control" name="fathname" disabled value="<?php echo $row['fathname']; ?>" style="font-size:1rem; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                                    </div>
                                </div>

                                <div class="m-1 col-md-5">
                                    <div style="margin-top:10px;">
                                        <label for="fathphone">Father Phone</label><br>
                                        <input type="text" class="form-control" name="fathphone" disabled value="<?php echo $row['fathphone']; ?>" style="font-size:1rem; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                                    </div>
                                    <div style="margin-top:10px;">
                                        <label for="address">Address</label><br>
                                        <textarea name="address" class="form-control" cols="30" disabled style="font-size:1rem; padding: 8px; border: 1px solid #ccc; border-radius: 4px;"><?php echo $row['address']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div style="margin-top:10px;">
                                <input type="submit" class="btn--blue btn btn-primary font-weight-bold" value="Update" style="bottom: 20px; left:20%; position:relative" />
                        </form>

                        <input class="upbtn btn--blue btn btn-primary mb-3 font-weight-bold" onclick="enableEditing()" style="position:absolute;bottom:3px;" value="Edit">
                    </div>

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
        function enableEditing() {
            // Enable input fields and textarea for editing
            document.querySelectorAll('input, textarea').forEach(function(element) {
                element.removeAttribute('disabled');
            });

            // Hide the "Edit" button
            document.querySelector('.upbtn').style.display = 'none';
        }
    </script>

    <script>
        $(".preloader ").fadeOut();
    </script>

</body>

</html>