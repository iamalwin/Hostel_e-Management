<?php
include("../dbconnect.php");
extract($_POST);
session_start();
?>

<?php
include("../dbconnect.php"); 
if ($_SERVER["REQUEST_METHOD"] === "POST") {
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
    $image = "path_to_image.jpg";

    $query = "UPDATE stud SET name = '$name', dept = '$dept', year = '$year', fathname = '$fathname', fathphone = '$fathphone', age = $age, dob = '$dob', bldgrp = '$bldgrp', email = '$email', phone = '$phone', address = '$address', image = '$image' WHERE reg = '$reg'";

    if (mysqli_query($connect, $query)) {
        header("Location: ../admin/stud_update.php?id=$id");
        exit();
    } else {
        echo "Error: " . mysqli_error($connect);
    }
    mysqli_close($connect);
}

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    $query = "SELECT * FROM stud WHERE id = '$id'";
    $result = mysqli_query($connect, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
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

                            <div class="page-header">
                                <h3 class="page-title">
                                    <span class="page-title-icon bg-gradient-primary text-white mr-2">
                                        <i class="mdi mdi-pencil menu-icon"></i>
                                    </span> Update Details
                                </h3>
                            </div>

                            <div class="formbold-main-wrapper card d-flex justify-content-center align-items-center p-3">

                            <form method="post" class="col-10">
                                <img src="../stud/include/img/<?php echo $row['image']; ?>" class="rounded-circle float-right" alt="...">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <div class="row">
                                    <div class="m-1 col-md-5">
                                        <div style="margin-top:10px;">
                                            <label for="name">Name</label><br>
                                            <input type="text" class="form-control" name="name" disabled value="<?php echo $row['name']; ?>" style="padding: 5px; border: 1px solid #ccc; border-radius: 4px;">
                                        </div>
                                        <div style="margin-top:10px;">
                                            <label for="reg">Registration</label><br>
                                            <input type="text" class="form-control" name="reg" disabled value="<?php echo $row['reg']; ?>" style="padding: 5px; border: 1px solid #ccc; border-radius: 4px;">
                                        </div>
                                    </div>
                                    <div class="m-1 col-md-5">
                                        <div style="margin-top:10px;">
                                            <label for="dept">Dept</label><br>
                                            <input type="text" class="form-control" name="dept" disabled value="<?php echo $row['dept']; ?>" style="padding: 5px; border: 1px solid #ccc; border-radius: 4px;">
                                        </div>
                                        <div style="margin-top:10px;">
                                            <label for="year">Year</label><br>
                                            <input type="text" class="form-control" name="year" disabled value="<?php echo $row['year']; ?>" style="padding: 5px; border: 1px solid #ccc; border-radius: 4px;">
                                        </div>
                                    </div>

                                    <div class="m-1 col-md-5">
                                        <div style="margin-top:10px;">
                                            <label for="email">Email</label><br>
                                            <input type="text" class="form-control" name="email" disabled value="<?php echo $row['email']; ?>" style="padding: 5px; border: 1px solid #ccc; border-radius: 4px;">
                                        </div>
                                        <div style="margin-top:10px;">
                                            <label for="fathname">Father Name</label><br>
                                            <input type="text" class="form-control" name="fathname" disabled value="<?php echo $row['fathname']; ?>" style="padding: 5px; border: 1px solid #ccc; border-radius: 4px;">
                                        </div>
                                    </div>

                                    <div class="m-1 col-md-5">
                                        <div style="margin-top:10px;">
                                            <label for="fathphone">Father Phone</label><br>
                                            <input type="text" class="form-control" name="fathphone" disabled value="<?php echo $row['fathphone']; ?>" style="padding: 5px; border: 1px solid #ccc; border-radius: 4px;">
                                        </div>
                                        <div style="margin-top:10px;">
                                            <label for="age">Age:</label><br>
                                            <input type="text" class="form-control" name="age" disabled value="<?php echo $row['age']; ?>" style="padding: 5px; border: 1px solid #ccc; border-radius: 4px;">
                                        </div>
                                    </div>

                                    <div class="m-1 col-md-5">
                                        <div style="margin-top:10px;">
                                            <label for="dob">Dob</label><br>
                                            <input type="text" class="form-control" name="dob" disabled value="<?php echo $row['dob']; ?>" style="padding: 5px; border: 1px solid #ccc; border-radius: 4px;">
                                        </div>
                                        <div style="margin-top:10px;">
                                            <label for="bldgrp">Blood Group</label><br>
                                            <input type="text" class="form-control" name="bldgrp" disabled value="<?php echo $row['bldgrp']; ?>" style="padding: 5px; border: 1px solid #ccc; border-radius: 4px;">
                                        </div>
                                    </div>

                                    <div class="m-1 col-md-5">
                                        <div style="margin-top:10px;">
                                            <label for="email">Email</label><br>
                                            <input type="text" class="form-control" name="email" disabled value="<?php echo $row['email']; ?>" style="padding: 5px; border: 1px solid #ccc; border-radius: 4px;">
                                        </div>
                                        <div style="margin-top:10px;">
                                            <label for="phone">Phone</label><br>
                                            <input type="text" class="form-control" name="phone" disabled value="<?php echo $row['phone']; ?>" style="padding: 5px; border: 1px solid #ccc; border-radius: 4px;">
                                        </div>
                                    </div>

                                    <div class="m-1 col-md-5">
                                        <div style="margin-top:10px;">
                                            <label for="address">Address</label><br>
                                            <textarea name="address" cols="30" rows="6" disabled style="padding: 5px; border: 1px solid #ccc; border-radius: 4px;"><?php echo $row['address']; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" class="btn--blue btn btn-primary" value="Update" style="bottom: 0px;left:20%;position:relative">
                            </form>                          
                            <button class="upbtn btn--blue btn  btn-primary mb-3" style="position:absolute;bottom:0%; left:13.5%" onclick="toggleEditable()">Edit</button>
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
                function toggleEditable() {
                    var fields = document.querySelectorAll('input[type="text"], textarea');
                    fields.forEach(function(field) {
                        field.disabled = !field.disabled;
                    });
                }
            </script>

            <script>
                $(".preloader ").fadeOut();
            </script>
        </body>

        </html>
<?php
    } else {
        echo "Student request not found.";
    }
}
?>