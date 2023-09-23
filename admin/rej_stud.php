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
                            </span>Rejection list
                        </h3>
                    </div>
                     <!-- Search Form -->
                     <form method="POST" action="">
                        <div class="input-group" style="bottom:10px ;">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="background-color: white;width: 50px; padding:0%"><i class="mdi mdi-magnify" style="font-size:2rem; left:10px;top:5px;position:absolute;"></i></span>
                            </div>
                            <input type="text" class="form-control" id="studentName" name="studentName" placeholder="Search by student's name">
                        </div>
                    </form>
                    <!-- Dash data section -->

                    <div class="grid-margin card p-3 stretch-card" style="overflow: hidden;">
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

                                    <?php
                            if (isset($_POST['studentName'])) {
                                $searchName = mysqli_real_escape_string($connect, $_POST['studentName']);
                                $qry = mysqli_query($connect, "SELECT * FROM studrej WHERE name LIKE '%$searchName%'");
                            } else {
                                $qry = mysqli_query($connect, "SELECT * FROM studrej");
                            }
                            $i = 1;
                            while ($row = mysqli_fetch_array($qry)) {
                                $reg = $row['reg'];
                            ?>
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
                                            <td>
                                                <div class="as"><?php echo $row['email']; ?></div>
                                            </td>
                                            <td>
                                                <div class="as"><?php echo $row['phone']; ?></div>
                                            </td>
                                            <td>
                                                <a href="rej_profile.php?reg=<?php echo $row['reg']; ?>">
                                                    <button type="button" class="btn btn-primary">View</button>
                                                </a>
                                            </td>
                                        </tr><?php
                                $i++;
                            }
                            ?>
                                </table>
                            </form>
                    </div>

                </div>
                <!-- <footer class="footer">
                    <div class="container-fluid clearfix">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block"></span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"></span>
                    </div>
                </footer> -->
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

<script>
        const studentNameInput = document.getElementById("studentName");
        studentNameInput.addEventListener("input", function() {
            const searchName = studentNameInput.value.trim();
            const tableRows = document.querySelectorAll(".alert");
            tableRows.forEach(function(row) {
                const nameCell = row.querySelector("td:nth-child(2) div");
                const studentName = nameCell.textContent.toLowerCase();

                if (studentName.includes(searchName.toLowerCase())) {
                    row.style.display = "table-row";
                } else {
                    row.style.display = "none";
                }
            });
        });
    </script>

</body>

</html>