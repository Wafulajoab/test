<?php
require_once 'connect.php';

$sender_id = $_SESSION['user_id'];
$receiver_id = 1; // Assuming the admin's ID is 1 for simplicity

$stmt = $conn->prepare("SELECT * FROM chat_messages WHERE (sender_id = ? AND receiver_id = ?) OR (sender_id = ? AND receiver_id = ?) ORDER BY timestamp");
$stmt->bind_param("iiii", $sender_id, $receiver_id, $receiver_id, $sender_id);
$stmt->execute();
$result = $stmt->get_result();
$messages = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();

echo json_encode($messages);
?>
