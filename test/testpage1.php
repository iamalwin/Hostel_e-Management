<?php
include("../dbconnect.php");
session_start();

// Initialize variables
$searchName = "";
$results = array();

// Check if the search form is submitted
if (isset($_POST['search'])) {
    $searchName = $_POST['search_name'];

    // Perform the SQL query to search for the student's name
    $sql = "SELECT * FROM stud WHERE name LIKE '%$searchName%'";

    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        // Store the search results in the $results array
        while ($row = mysqli_fetch_array($result)) {
            $results[] = $row;
        }
    } else {
        // No results found
        $results = array();
    }
} else {
    // When the search form is not submitted, retrieve all students
    $qry = mysqli_query($connect, "SELECT * FROM stud");
    while ($row = mysqli_fetch_array($qry)) {
        $results[] = $row;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Details</title>
</head>
<body>
    <h2>Search for a Student</h2>
    <form method="post">
        <input type="text" name="search_name" placeholder="Enter student name" value="<?php echo $searchName; ?>">
        <input type="submit" name="search" value="Search">
    </form>

    <h2>Student Details</h2>
    <table>
        <tr>
            <th>Registration Number</th>
            <th>Name</th>
            <th>Department</th>
            <th>Class</th>
            <th>Hostel Name</th>
            <th>Room Number</th>
            <th>Actions</th>
        </tr>

        <?php if (!empty($results)) : ?>
            <?php foreach ($results as $row) : ?>
                <tr class="alert " role="alert">
                    <td><?php echo $row['reg']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['dept']; ?></td>
                    <td><?php echo $row['cls']; ?></td>
                    <td><?php echo $row['hname']; ?></td>
                    <td><?php echo $row['room']; ?></td>
                    <td><a href="./fees_details.php?reg=<?php echo $row['reg']; ?>">View Fees</a></td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="7">No results found for the given name.</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>
