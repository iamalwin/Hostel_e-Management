<?php
include("../dbconnect.php");
extract($_POST);
session_start();

if (!isset($_SESSION["name"])) {
    header("Location: ./admin_login.php");
    exit();
}
?>
<?php
$query_studreq = "SELECT * FROM studreq";
$result_studreq = mysqli_query($connect, $query_studreq);

// Retrieve data from studrej table
$query_studrej = "SELECT * FROM studrej";
$result_studrej = mysqli_query($connect, $query_studrej);
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
        /* Add some styles for the no results message */
        .no-results {
            font-size: 1.2rem;
            text-align: center;
            margin-top: 20px;
        }

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
                                <i class="mdi mdi-contacts menu-icon"></i>
                            </span> Students Details
                        </h3>
                        <div id="successMessage" class="sucees p-2" style="display: none;">
                            <?php echo $success_reg; ?>
                            <?php echo $no_reg; ?>
                        </div>
                    </div>
                    <!-- Search Form -->
                    <form method="POST" action="">
                        <div class="input-group" style="bottom: 10px;">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="background-color: white; width: 50px; padding: 0%;">
                                    <i class="mdi mdi-magnify" style="font-size: 2rem; left: 10px; top: 5px; position: absolute;"></i>
                                </span>
                            </div>
                            <input type="text" style="font-size: 1rem;" class="form-control" id="studentID" name="studentID" placeholder="Search by STUD_ID">
                        </div>
                    </form>
                    <!-- Dash data section -->
                    <div class="grid-margin card p-5 stretch-card">
                        <!-- <?php
                                $noResults = true; // Flag to check if there are no search results
                                if (isset($_POST['studentID'])) {
                                    $searchID = mysqli_real_escape_string($connect, $_POST['studentID']);
                                    $qry = mysqli_query($connect, "SELECT * FROM studreq WHERE stud_id LIKE '%$searchID%'");
                                } else {
                                    $qry = mysqli_query($connect, "SELECT * FROM studreq");
                                }
                                $i = 1;
                                ?> -->
                        <table class="table table-responsive-xl">
                            <thead class="bg-light">
                                <tr>
                                    <th class="fw-bolder" scope="col">Stud_id</th>
                                    <th class="fw-bolder" scope="col">Reg No</th>
                                    <th class="fw-bolder" scope="col">Name</th>
                                    <th class="fw-bolder" scope="col">Dept / Year</th>
                                    <th class="fw-bolder" scope="col">Phone</th>
                                    <th class="fw-bolder" scope="col">Fees Details</th>
                                    <th class="fw-bolder" scope="col">Profile</th>
                                </tr>
                            </thead>
                            <!-- <?php
                                    while ($row = mysqli_fetch_array($qry)) {
                                        $reg = $row['reg'];
                                        $noResults = false; // Set the flag to false since there are results
                                    ?> -->

                            <?php
                                        // Display data from studreq table
                                        while ($row = mysqli_fetch_assoc($result_studreq)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['reg'] . "</td>";
                                            echo "<td>" . $row['request_description'] . "</td>";
                                            echo "<td></td>"; // Leave an empty cell for Rejection Reason
                                            echo "</tr>";
                                        }

                                        // Display data from studrej table
                                        while ($row = mysqli_fetch_assoc($result_studrej)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['reg'] . "</td>";
                                            echo "<td></td>"; // Leave an empty cell for Request Description
                                            echo "<td>" . $row['rejection_reason'] . "</td>";
                                            echo "</tr>";
                                        }
                            ?>
                            <tr class="alert" role="alert">
                                <td>
                                    <div><?php echo $row['stud_id']; ?></div>
                                </td>
                                <td>
                                    <div><?php echo $row['reg']; ?></div>
                                </td>
                                <td>
                                    <div><?php echo $row['name']; ?></div>
                                </td>
                                <td>
                                    <div><?php echo $row['dept']; ?> / <?php echo $row['year']; ?></div>
                                </td>
                                <td>
                                    <div><?php echo $row['phone']; ?></div>
                                </td>
                                <td>
                                    <a style="text-decoration: none; " href="./fees_details.php?reg=<?php echo $row['reg']; ?>">
                                        <h6>View Fees</h6>
                                    </a>
                                </td>
                                <td>
                                    <a href='stud_update.php?id=<?php echo $row['id']; ?>'>
                                        <button class="rounded-pill btn--blue btn pt-2 pb-2 pr-2 pl-2 btn-primary" value="Submit"><i class="mdi mdi-account menu-icon pr-1"></i>Profile</button>
                                    </a>
                                </td>
                            </tr>
                            <!-- <?php
                                        $i++;
                                    }
                                    ?> -->
                        </table>
                        <?php
    // Close the database connection
    mysqli_close($connect);
    ?>
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
        $(".preloader ").fadeOut();
    </script>
    <script>
        const studentIDInput = document.getElementById("studentID");
        studentIDInput.addEventListener("input", function() {
            const searchID = studentIDInput.value.trim();
            const tableRows = document.querySelectorAll(".alert");
            tableRows.forEach(function(row) {
                const idCell = row.querySelector("td:nth-child(1) div");
                const studentID = idCell.textContent.toLowerCase();

                if (studentID.includes(searchID.toLowerCase())) {
                    row.style.display = "table-row";
                } else {
                    row.style.display = "none";
                }
            });
        });
    </script>
</body>

</html>