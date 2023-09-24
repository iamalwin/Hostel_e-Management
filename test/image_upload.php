<?php
// Enable error reporting for debugging purposes
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("dbconnect.php"); // Include your database connection

$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {
	$filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];
	$folder = "images/" . $filename;

	// Get all the submitted data from the form
	$sql = "INSERT INTO image (filename) VALUES ('$filename')";

	// Execute query
	if (mysqli_query($connect, $sql)) {
		// Now let's move the uploaded image into the folder: images
		if (move_uploaded_file($tempname, $folder)) {
			$msg = "Image uploaded successfully!";
		} else {
			$msg = "Failed to upload image!";
		}
	} else {
		$msg = "Error: " . mysqli_error($connect);
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Image Upload</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
	<div id="content">
		<form method="POST" action="" enctype="multipart/form-data">
			<div class="form-group">
				<input class="form-control" type="file" name="uploadfile" value="" />
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit" name="upload">UPLOAD</button>
			</div>
		</form>
	</div>
	<div id="display-image">
		<?php
		$query = "SELECT * FROM image";
		$result = mysqli_query($connect, $query);

		while ($data = mysqli_fetch_assoc($result)) {
		?>
			<img src="images/<?php echo $data['filename']; ?>">

		<?php
		}
		?>
	</div>
	<?php echo $msg; // Display any messages ?>
</body>

</html>
