<?php
require 'vendor/autoload.php'; // Include Composer's autoloader for PHPMailer

// Establish connection to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "career";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $id = $conn->real_escape_string($_POST['id']);
    $reply = $conn->real_escape_string($_POST['reply']);

    // Update the database with the reply message
    $sql = "UPDATE contact_form SET reply = '$reply' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {

        // Retrieve the email address associated with the id
        $email_query = "SELECT email FROM contact_form WHERE id = $id";
        $result = $conn->query($email_query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $to_email = $row['email'];

            // Send email using PHPMailer
            $mail = new PHPMailer\PHPMailer\PHPMailer(true);
            try {
                //Server settings
                $mail->isSMTP();
                $mail->Host = 'smtp.elasticemail.com'; // SMTP server
                $mail->SMTPAuth = true;
                $mail->Username = 'bensonwambuadavid@gmail.com'; // SMTP username
                $mail->Password = 'B46F1AA94A74C24308098C3819FC7189C5C8'; // SMTP password
                $mail->SMTPSecure = 'tls'; // Enable TLS encryption
                $mail->Port = 2525; // TCP port to connect to

                //Recipients
                $mail->setFrom('bensonwambuadavid@gmail.com', 'Benson ');
                $mail->addAddress($to_email); // Add a recipient

                // Content
                $mail->isHTML(true); // Set email format to HTML
                $mail->Subject = 'Your inquiry has been replied';
                $mail->Body .= $reply ; // Two line breaks after the reply message
                $mail->send();
                echo 'Email sent successfully';
            } catch (Exception $e) {
                echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        } else {
            echo "Error retrieving email address";
        }
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Close connection
$conn->close();
?>
