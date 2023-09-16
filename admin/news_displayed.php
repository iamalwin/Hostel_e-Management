<?php
include("../dbconnect.php");
extract($_POST);
session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"]; // Get the ID of the post to preview
    $sql = "SELECT * FROM hostel_management.news WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
} elseif (!isset($_SESSION["name"])) {
    header("Location: ./admin_login.php");
    exit();
}
?>

<?php
include("../dbconnect.php");
extract($_POST);
session_start();

if (isset($_POST['submit'])) {
    $title = $_POST["title"];
    $content = $_POST["content"];
    $query = "INSERT INTO news (title, content) VALUES ('$title', '$content')";
    if (mysqli_query($connect, $query)) {
        echo "News item added successfully.<br>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connect);
    }
}
mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>registration</title>
    <link rel="stylesheet" href="./include/materialdesignicons.min.css">
    <link rel="stylesheet" href="./include/vendor.bundle.base.css">

    <link rel="stylesheet" href="./include/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">

    <link rel="stylesheet" href="../dist/css/style.min.css">

    <link rel="stylesheet" href="./include/style.css">

    <link rel="shortcut icon" href="./include/ho_login.png">
    <link rel="stylesheet" href="./include/exstyle.css">

    <style>
        .container {
            margin-top: 20px;
            width: 700px;
            background-color: #fff;
            padding: 40px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }
        }

        .divcont {
            box-shadow: none;
        }
        #content, #title{
            font-size: 1.2rem;
            line-height: 20px;
            letter-spacing: 1px;
        }
        .card{
            height: 80%;
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

        <?php include 'navbar.php' ?>

        <!-- partial -->
        <div class="container-fluid page-body-wrapper pt-0 proBanner-padding-top">
            <?php include 'sidebar.php' ?>
            <div class="main-panel">
                <div class="content-wrapper p-3">
                    <div class="page-header">
                        <h3 class="page-title">
                            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                                <i class="mdi mdi-newspaper menu-icon"></i>
                            </span> Post News
                        </h3>
                    </div>

                    <div class="card d-flex justify-content-center align-items-center">
                    <h1>News Post Preview</h1>
    
    <h2><?php echo $row['title']; ?></h2>
    <p>Published by <?php echo $row['author']; ?> on <?php echo $row['publication_date']; ?></p>
    
    <div>
        <?php echo nl2br($row['content']); ?>
    </div>
    
    <a href="index.php">Back to News</a>
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