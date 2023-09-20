<?php
include("../dbconnect.php");
session_start();

// Check if the user is not logged in and redirect to the login page
if (!isset($_SESSION["name"])) {
    header("Location: ./admin_login.php");
    exit();
}
?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
        $mail->isSMTP(); // Send using SMTP
        $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = 'johnrajae321peeter@gmail.com'; // SMTP username
        $mail->Password = 'tzgi iagj vzpe rpxx'; // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Enable implicit TLS encryption
        $mail->Port = 465; // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        // Recipients
        $mail->setFrom('johnrajae321peeter@gmail.com', 'Mailer');

        // Get recipient email from the form
        $recipientEmail = $_POST['recipient_email'];
        $mail->addAddress($recipientEmail); // Add the recipient's email address
        $mail->addReplyTo('info@example.com', 'Information');

        // Content
        $mail->isHTML(true); // Set email format to HTML

        // Check which button was clicked
        if (isset($_POST['approve'])) {

            $reg = $_POST['reg'];

            $sql = "SELECT * FROM studreq WHERE reg = '$reg'"; // Make sure to use single quotes for the value
            $result = mysqli_query($connect, $sql);
            $row = mysqli_fetch_assoc($result);
        
            // Insert student details into studs table
            $insert_sql = "INSERT INTO stud (name, reg, fathname, age, dob, email, phone, address) VALUES (
                '{$row['name']}', '{$row['reg']}',  '{$row['fathphone']}', '{$row['age']}', '{$row['dob']}',  '{$row['email']}', '{$row['phone']}', '{$row['adds']}')";
            mysqli_query($connect, $insert_sql);
                
            // Approve button was clicked
            $mail->Subject = 'Approval Notification';
            $mail->Body = 'Your request has been approved.'; // Customize this message

            $delete_sql = "DELETE FROM studreq WHERE reg = '$reg'";
            mysqli_query($connect, $delete_sql);
            
        } elseif (isset($_POST['reject'])) {
            
        $delete_sql = "DELETE FROM studreq WHERE reg = '$reg'";
        mysqli_query($connect, $delete_sql);
        
            // Reject button was clicked
            $mail->Subject = 'Rejection Notification';
            $mail->Body = 'Your request has been rejected.'; // Customize this message
        }

        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    header("Location: ./stud_req.php"); // Replace 'your_page.php' with the actual page URL
    // Delete the request from studreq
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Add any necessary CSS or other head content here -->
</head>
<body>
    <form action="" method="post">
        <input type="email" name="recipient_email" placeholder="Recipient's Email">
        <button type="submit" name="approve">Approve</button>
        <button type="submit" name="reject">Reject</button>
    </form>
</body>
</html>