<?php
session_start();
require_once 'connect.php'; // Include your database connection script

// Check if sender_id and receiver_id are set in the POST data
if (isset($_POST['sender_id']) && isset($_POST['receiver_id'])) {
    $sender_id = $_POST['sender_id'];
    $receiver_id = $_POST['receiver_id'];

    $sql = "SELECT * FROM chat_messages WHERE (sender_id = ? AND receiver_id = ?) OR (sender_id = ? AND receiver_id = ?) ORDER BY timestamp ASC";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiii", $sender_id, $receiver_id, $receiver_id, $sender_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $messages = array();
    while ($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }

    echo json_encode($messages);
} else {
    // Optional: Send a response indicating that sender_id or receiver_id was not provided
    echo json_encode(array('error' => 'sender_id or receiver_id not provided'));
}
?>
