<?php
require 'vendor/autoload.php'; // Include Composer's autoloader for PHPMailer

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kemu";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted and the reply message is set
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["reply_message"]) && isset($_POST["message_id"])) {
    // Sanitize input data
    $reply_message = htmlspecialchars($_POST["reply_message"]);
    $message_id = $_POST["message_id"];

    // Prepare SQL statement to update the message with admin's reply
    $sql = "UPDATE messages SET admin_response = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $reply_message, $message_id);

    // Execute SQL statement
    if ($stmt->execute()) {
        // Admin reply recorded successfully

        // Fetch name and email from the database based on the message_id
        $info_query = "SELECT name, email FROM messages WHERE id = ?";
        $info_stmt = $conn->prepare($info_query);
        $info_stmt->bind_param("i", $message_id);
        $info_stmt->execute();
        $info_stmt->bind_result($recipient_name, $recipient_email);
        $info_stmt->fetch();
        $info_stmt->close();

        // Send email notification
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.elasticemail.com'; // Your SMTP host
        $mail->SMTPAuth = true;
        $mail->Username = 'kemus863@gmail.com'; // Your SMTP username
        $mail->Password = '90999C794011CB72B522A9DBECD16BF2221D'; // Your SMTP password
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 2525; // Your SMTP port
        $mail->setFrom('kemus863@gmail.com', 'Kemu Security'); // Your email and name

        $mail->addAddress($recipient_email); // Recipient email
        $mail->Subject = 'Admin Reply Notification';

        // Construct the email body with spaces and line breaks
        $mail->Body = 'Hello ' . $recipient_name . "\r\n"; // Two line breaks after the recipient name
        $mail->Body .= $reply_message . "\r\n\r\n"; // Two line breaks after the reply message
        $mail->Body .= 'Regards:' . "\r\n"; // One line break before "Best regards"
        $mail->Body .= 'Kemu Security'; // No line break after "Kemu Security"

        // Send the email
        if ($mail->send()) {
            // Email sent successfully
            // Redirect to display_contact.php
            header("Location: displaycontact.php?email_sent=1");
            exit(); // Stop further execution
        } else {
            // Error sending email
            echo "Error sending email: " . $mail->ErrorInfo;
        }
    } else {
        // Error recording admin reply
        echo "Error: " . $conn->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
