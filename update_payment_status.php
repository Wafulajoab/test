<?php
require_once 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $payment_id = $_POST['payment_id'];
    $action = $_POST['action'];

    if ($action === 'approve') {
        // Update the payment status to 'Approved' and mark as 'Allowed'
        $sql = "UPDATE payments SET approval_status = 'Approved', allowed = 'Yes', denied = 'No' WHERE id = ?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Error preparing SQL: " . $conn->error);
        }
        $stmt->bind_param("i", $payment_id);
        $stmt->execute();
        $stmt->close();

    } elseif ($action === 'reject') {
        // Update the payment status to 'Rejected' and mark as 'Denied'
        $sql = "UPDATE payments SET approval_status = 'Rejected', allowed = 'No', denied = 'Yes' WHERE id = ?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Error preparing SQL: " . $conn->error);
        }
        $stmt->bind_param("i", $payment_id);
        $stmt->execute();
        $stmt->close();
    }
    
    // Redirect back to the pending payments page
    header('Location: pending_payments.php');
    exit;
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Payment Status</title>
</head>
<body>
    <h2>Pending Payments</h2>

    <?php if ($result && $result->num_rows > 0): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Amount</th>
                    <th>Receipt</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['user_id']; ?></td>
                        <td><?php echo $row['amount']; ?></td>
                        <td>
                            <a href="uploads/<?php echo $row['receipt']; ?>" target="_blank">View Receipt</a>
                        </td>
                        <td><?php echo $row['status']; ?></td>
                        <td>
                            <form method="POST" action="">
                                <input type="hidden" name="payment_id" value="<?php echo $row['id']; ?>">
                                <select name="action"> <!-- Updated name to 'action' -->
                                    <option value="approve">Approve</option>
                                    <option value="reject">Reject</option>
                                </select>
                                <button type="submit">Update</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No pending payments found.</p>
    <?php endif; ?>

    <?php $conn->close(); ?>
</body>
</html>
