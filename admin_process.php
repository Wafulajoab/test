<?php
session_start();

if (!isset($_SESSION['admin_loggedin']) || $_SESSION['admin_loggedin'] !== true) {
    header("Location: admin_login.php");
    exit;
}

require_once 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $payment_id = $_POST['payment_id'];
    $action = $_POST['action'];

    if ($action == 'approve') {
        // Approve the payment: Update user status to Premium
        $sql = "UPDATE payments SET status = 'Approved' WHERE id = ?";
        $updateUser = "UPDATE users u JOIN payments p ON u.fullname = p.fullname SET u.account_status = 'Premium' WHERE p.id = ?";
    } elseif ($action == 'reject') {
        // Reject the payment: Update user status to Regular
        $sql = "UPDATE payments SET status = 'Rejected' WHERE id = ?";
        $updateUser = "UPDATE users u JOIN payments p ON u.fullname = p.fullname SET u.account_status = 'Regular' WHERE p.id = ?";
    }

    // Update payment status
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $payment_id);
    $stmt->execute();

    // Update user account status
    $stmtUser = $conn->prepare($updateUser);
    $stmtUser->bind_param("i", $payment_id);
    $stmtUser->execute();

    header("Location: admin_payments.php");
}
?>
