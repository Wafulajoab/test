<?php
session_start();
require_once 'connect.php'; // Include your database connection script

if (isset($_POST['message'])) {
    $sender_id = $_POST['sender_id'];
    $receiver_id = $_POST['receiver_id'];
    $message = $_POST['message'];

    $sql = "INSERT INTO chat_messages (sender_id, receiver_id, message, timestamp) VALUES (?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iis", $sender_id, $receiver_id, $message);
    $stmt->execute();

    echo "Message sent successfully";
}
?>
