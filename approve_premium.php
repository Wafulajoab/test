<?php
require_once 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_no = $_POST['id_no'];

    $sql = "UPDATE users SET is_premium = 1 WHERE id_no = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id_no);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "User approved as premium.";
    } else {
        echo "Error approving user.";
    }

    $stmt->close();
}

$conn->close();
?>
