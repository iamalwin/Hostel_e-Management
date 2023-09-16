<?php
include("../dbconnect.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['insert'])) {
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Preview</title>
</head>
<body>
    <div class="container-scroller">
        <div class="container">
            <?php
            if (isset($postMessage)) {
                // Display the post message (success or error)
                echo '<div class="alert ' . (strpos($postMessage, "successfully") !== false ? 'alert-success' : 'alert-danger') . '" role="alert">';
                echo $postMessage;
                echo '</div>';
            }
            ?>

            <h3>News Preview</h3>

                <form method="post" action="">
                <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Display the news content
                $title = $_POST['title'];
                $content = $_POST['content'];

                echo "<h1>$title</h1>";
                echo "<p>$content</p>";
?>
                <div class="col-md-12 m-3">
                    <label for="title" style="font-size: 1rem;">Title:</label>
                    <input class="form-control" type="text" id="title" value="<?php echo $title;?>" placeholder="News Title" name="title" required>
                </div>
                <div class="col-md-12 m-3">
                    <label for="content" style="font-size: 1rem;">Content:</label>
                    <textarea class="form-control" id="content" name="content" placeholder="Content" rows="8" cols="20" required><?php echo $content;?></textarea>
                    <div class="btn btn--radius-2 pl-3 pr-3 pt-1 pb-1 btn--blue btn-primary mt-3 float-right">
                        <button class="btn p-0 m-2 text-light" type="submit" value="Preview" name="insert">post News</button>
                    </div>
                </div>
            </form>
            <?php
            } 
            ?>
        </div>
    </div>
</body>
</html>
