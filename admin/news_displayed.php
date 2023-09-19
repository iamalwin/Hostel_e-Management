<?php
include("../dbconnect.php");
session_start();
if (!isset($_SESSION["name"])) {
    header("Location: ./admin_login.php");
    exit();
}

$query = "SELECT * FROM news ORDER BY date_published DESC";
$result = mysqli_query($connect, $query);
?>

<?php
if (isset($_POST['delete_news'])) {
    $news_id = $_POST['news_id'];

    $sql = "DELETE FROM news WHERE news_id = ?";
    $stmt = $connect->prepare($sql);

    if (!$stmt) {
        die("Database query failed: " . $connect->error);
    }

    $stmt->bind_param("s", $news_id); // Assuming 'news_id' is a string

    if ($stmt->execute()) {
        // News item deleted successfully
        header("Location: news_displayed.php"); // Redirect back to the news display page
        exit();
    } else {
        echo "Error deleting news item: " . $stmt->error;
    }

    $stmt->close();
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>registration</title>
    <link rel="stylesheet" href="./include/materialdesignicons.min.css">
    <link rel="stylesheet" href="./include/vendor.bundle.base.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../dist/css/style.min.css">
    <link rel="stylesheet" href="./include/style.css">
    <link rel="shortcut icon" href="./include/ho_login.png">
    <link rel="stylesheet" href="./include/news.css">
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
        #content,
        #title {
            font-size: 1.2rem;
            line-height: 20px;
            letter-spacing: 1px;
        }
        .card {
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
                        <div class="card-body col-12">
                            <div class="col p-0">
                                    <section class="cont">
                                    <?php
                                    if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $news_id = $row['news_id'];
        $title = $row['title'];
        $content = $row['content'];
        $date_published = $row['date_published'];

        echo "<div class='news-item'>";
        echo "<h3 class='news-title'>$title</h3>";
        echo "<p class='news-content'>$content</p>";
        echo "<h6 class='news-date'>$date_published</h6>";
        echo "<form method='post' action='news_displayed.php'>";
        echo "<input type='hidden' name='news_id' value='$news_id'>";
        echo "<button type='submit' name='delete_news'>Delete</button>";
        echo "</form>";
        echo "</div>";

    }
} else {
    echo "<div class='no-news'>No news available.</div>";
}
?>
                                    </section>
                                    
                            </div>
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