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
include("../dbconnect.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['post_news'])) {
    // Insertion code
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Prepare and execute the SQL query to insert news into the database
    $sql = "INSERT INTO news (title, content) VALUES (?, ?)";
    if ($stmt = $connect->prepare($sql)) {
        $stmt->bind_param("ss", $title, $content);
        if ($stmt->execute()) {
            $postMessage = "News successfully stored in the database.";
        } else {
            $postMessage = "Error storing news in the database: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $postMessage = "Error preparing the SQL statement: " . $connect->error;
    }
    $connect->close();
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

                <?php
            if (isset($postMessage)) {
                // Display the post message (success or error)
                echo '<div class="alert ' . (strpos($postMessage, "successfully") !== false ? 'alert-success' : 'alert-danger') . '" role="alert">';
                echo $postMessage;
                echo '</div>';
            }
            ?>

                    <div class="page-header">
                        <h3 class="page-title">
                            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                                <i class="mdi mdi-newspaper menu-icon"></i>
                            </span> Post News
                        </h3>

                        <div class="btn btn--radius-2 pl-3 pr-3 pt-1 pb-1 btn--blue btn-primary mt-2 float-right"><i class="mdi mdi-pin menu-icon"></i>
                            <a href="./news_preview.php"><button class="btn p-0 m-2 text-light " type="submit" value="Preview">Posted News</button></a>
                        </div>
                    </div>

                    <div class="card d-flex justify-content-center align-items-center">
                        <form class="card-body col-12" action="news_preview.php" method="post">

                        <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Display the news content
                $title = $_POST['title'];
                $content = $_POST['content'];
                ?>

                            <div class="col">
                                <div class="col-md-12 m-3">
                                    <label for="title" style="font-size: 1rem;">Title:</label>
                                    <input class="form-control" type="text" id="title" value="<?php echo $title;?>" placeholder="News Title" name="title" required readonly>
                                </div>
                                <div class="col-md-12 m-3">
                                    <label for="content" style="font-size: 1rem;">Content:</label>
                                    <textarea class="form-control" id="content"  name="content"  placeholder="Content" rows="8" cols="20" required readonly><?php echo $content;?></textarea>

                                    <div class="btn btn--radius-2 pl-3 pr-3 pt-1 pb-1 btn--blue btn-primary mt-3 float-right"><i class="fas fa-paper-plane menu-icon"></i>
                                    <button class="btn p-0 m-2 text-light " type="submit" value="Preview" name="post_news">Post News</button>
                                    </div>
                                    <div class="btn btn--radius-2 pl-3 pr-3 pt-1 pb-1 mr-3 btn--blue btn-primary mt-3 float-right"><i class="mdi mdi-pencil menu-icon"></i><button class="btn p-0 m-2 text-light "id="editButton">Edit News</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php
                    } 
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
   
   
<script>
    document.getElementById('editButton').addEventListener('click', function () {
    toggleEditable('title');
    toggleEditable('content');
    toggleButtonText();
});

function toggleEditable(elementId) {
    var element = document.getElementById(elementId);
    element.readOnly = !element.readOnly;
}

function toggleButtonText() {
    var button = document.getElementById('editButton');
    if (button.textContent === 'Edit') {
        button.textContent = 'Save';
    } else {
        button.textContent = 'Edit';
    }
}

</script>
</body>

</html>