<?php
include("../dbconnect.php");


if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $name = $_POST["name"];
    $email = $_POST["email"];

    // Handle image upload
    if (isset($_FILES['image'])) {
        $uploadDirectory = "uploads/"; // Directory to store uploaded images

        // Generate a unique filename to prevent overwriting
        $uniqueFileName = uniqid() . '_' . $_FILES['image']['name'];

        // Move the uploaded file to the image directory
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory . $uniqueFileName)) {
            $imagePath = $uploadDirectory . $uniqueFileName; // Store the image path in a variable
        } else {
            echo "Image upload failed.";
            exit();
        }
    } else {
        echo "Image not provided.";
        exit();
    }

    // Insert user details into the database
    $insertQuery = "INSERT INTO studs (name, email, image_path) VALUES ('$name', '$email', '$imagePath')";
    
    if (mysqli_query($connect, $insertQuery)) {
        echo "Registration successful.<br>";
    } else {
        echo "Error: " . $insertQuery . "<br>" . mysqli_error($connect);
    }
}

mysqli_close($connect);
?>
