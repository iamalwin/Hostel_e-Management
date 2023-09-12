<?php
// Establish a database connection (replace with your database credentials)
$hostname = "localhost";
$username = "your_username";
$password = "your_password";
$database = "hostel_management";

$connect = mysqli_connect($hostname, $username, $password, $database);

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve and display registered user details
$selectQuery = "SELECT * FROM studs";
$result = mysqli_query($connect, $selectQuery);

if (mysqli_num_rows($result) > 0) {
    echo "<h2>Registered User Details</h2>";
    echo "<table border='1'>
    <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Profile Image</th>
    </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td><img src='" . $row['image_path'] . "' alt='Profile Image' width='100'></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No registered users found.";
}

mysqli_close($connect);
?>
