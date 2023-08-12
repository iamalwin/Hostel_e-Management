<?php
include("../dbconnect.php");
extract($_POST);
session_start();
?>

<?php
include("../dbconnect.php"); // Include your database connection
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Assuming you have a database connection established earlier

    // Extract data from POST request
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
    $address = $_POST["address"]; // Corrected field name
    $image_path = "path_to_image.jpg"; // Set the actual image path

    // Update query
    $query = "UPDATE stud 
              SET name = '$name', 
                  dept = '$dept', 
                  year = '$year', 
                  fathname = '$fathname', 
                  fathphone = '$fathphone', 
                  age = $age, 
                  dob = '$dob', 
                  bldgrp = '$bldgrp', 
                  email = '$email', 
                  phone = '$phone', 
                  address = '$address', 
                  image_path = '$image_path' 
              WHERE reg = '$reg'"; // Assuming 'reg' is a unique identifier

    if (mysqli_query($connect, $query)) {
        echo "Record updated successfully.";
        // You can also redirect to a success page if needed
    } else {
        echo "Error: " . mysqli_error($connect);
    }

    // Close the connection
    mysqli_close($connect);
}



if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    $query = "SELECT * FROM stud WHERE id = '$id'";
    $result = mysqli_query($connect, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
?>
        <script>
            function toggleEditable() {
                var fields = document.querySelectorAll('input[type="text"]');
                fields.forEach(function(field) {
                    field.disabled = !field.disabled;
                });
            }
        </script>
        <!DOCTYPE html>
        <!-- saved from url=(0054)https://www.bootstrapdash.com/demo/purple-admin-free/# -->
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
                        <div class="content-wrapper">

                            <!-- dash section -->

                            <div class="page-header">
                                <h3 class="page-title">
                                    <span class="page-title-icon bg-gradient-primary text-white mr-2">
                                        <i class="mdi mdi-pencil menu-icon"></i>
                                    </span> Update Details
                                </h3>
                            </div>
                            <!-- Dash data section -->
                            <form method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <table>
        <tr>
            <td>
                <label for="name">Name</label><br>
                <input type="text" name="name" disabled value="<?php echo $row['name']; ?>" style="padding: 5px; border: 1px solid #ccc; border-radius: 4px;">
            </td>
            <td>
                <label for="reg">Registration</label><br>
                <input type="text" name="reg" disabled value="<?php echo $row['reg']; ?>" style="padding: 5px; border: 1px solid #ccc; border-radius: 4px;">
            </td>
        </tr>
        <tr>
            <td>
                <label for="dept">Dept</label><br>
                <input type="text" name="dept" disabled value="<?php echo $row['dept']; ?>" style="padding: 5px; border: 1px solid #ccc; border-radius: 4px;">
            </td>
            <td>
                <label for="year">Year:</label><br>
                <input type="text" name="year" disabled value="<?php echo $row['year']; ?>" style="padding: 5px; border: 1px solid #ccc; border-radius: 4px;">
            </td>
        </tr>

        <tr>
            <td>
                <label for="email">Email:</label><br>
                <input type="text" name="email" disabled value="<?php echo $row['email']; ?>" style="padding: 5px; border: 1px solid #ccc; border-radius: 4px;">
            </td>
            <td>
                <label for="fathname">Father Name:</label><br>
                <input type="text" name="fathname" disabled value="<?php echo $row['fathname']; ?>" style="padding: 5px; border: 1px solid #ccc; border-radius: 4px;">
            </td>
        </tr>

        <tr>
            <td>
                <label for="fathphone">Father Phone:</label><br>
                <input type="text" name="fathphone" disabled value="<?php echo $row['fathphone']; ?>" style="padding: 5px; border: 1px solid #ccc; border-radius: 4px;">
            </td>
            <td>
                <label for="age">Age:</label><br>
                <input type="text" name="age" disabled value="<?php echo $row['age']; ?>" style="padding: 5px; border: 1px solid #ccc; border-radius: 4px;">
            </td>
        </tr>

        <tr>
            <td>
                <label for="dob">Dob</label><br>
                <input type="text" name="dob" disabled value="<?php echo $row['dob']; ?>" style="padding: 5px; border: 1px solid #ccc; border-radius: 4px;">
            </td>
            <td>
                <label for="bldgrp">Blood Group</label><br>
                <input type="text" name="bldgrp" disabled value="<?php echo $row['bldgrp']; ?>" style="padding: 5px; border: 1px solid #ccc; border-radius: 4px;">
            </td>
        </tr>

        <tr>
            <td>
                <label for="email">Email</label><br>
                <input type="text" name="email" disabled value="<?php echo $row['email']; ?>" style="padding: 5px; border: 1px solid #ccc; border-radius: 4px;">
            </td>
            <td>
                <label for="phone">Phone</label><br>
                <input type="text" name="phone" disabled value="<?php echo $row['phone']; ?>" style="padding: 5px; border: 1px solid #ccc; border-radius: 4px;">
            </td>
        </tr>

        <tr>
            <td>
                <label for="address">Address</label><br>
                <input type="text" name="address" cols="20" rows="10" disabled value="<?php echo $row['address']; ?>" style="padding: 5px; border: 1px solid #ccc; border-radius: 4px;">
            </td>
        </tr>

    </table>
    <input type="submit" class="btn--blue btn pt-2 pb-2 pr-4 pl-3 btn-primary" value="Update" style="margin-top: 10px;">
</form>


                            <button class="btn--blue btn pt-2 pb-2 pr-4 pl-3 btn-primary" onclick="toggleEditable()">Edit</button>
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
<?php
    } else {
        echo "Student request not found.";
    }
}
?>