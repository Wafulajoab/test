<?php
require_once 'connect.php';

// Fetch all pending payments
$sql = "SELECT id, fullname, receipt_file, mpesa_code FROM payments WHERE status = 'Pending'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Pending Payments</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .payment-item {
            border-bottom: 1px solid #ddd;
            padding: 15px 0;
        }
        .payment-item:last-child {
            border-bottom: none;
        }
        .payment-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        .payment-info p {
            margin: 0;
            color: #555;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .btn {
            padding: 8px 12px;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
            border: none;
            margin-left: 10px;
        }
        .btn-success {
            background-color: #28a745;
            color: #fff;
        }
        .btn-success:hover {
            background-color: #218838;
        }
        .btn-danger {
            background-color: #dc3545;
            color: #fff;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
        hr {
            border: none;
            border-top: 1px solid #ddd;
            margin: 20px 0;
        }
        .no-payments {
            text-align: center;
            color: #555;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Pending Payments</h1>

        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="payment-item">
                    <div class="payment-info">
                        <p><strong>User:</strong> <?php echo htmlspecialchars($row['fullname']); ?></p>
                        <p><strong>MPESA Code:</strong> <?php echo htmlspecialchars($row['mpesa_code']); ?></p>
                        <p><a href="<?php echo htmlspecialchars($row['receipt_file']); ?>" target="_blank">View Receipt</a></p>
                    </div>

                    <!-- Form to approve or reject payment -->
                    <form action="update_payment_status.php" method="post">
                        <input type="hidden" name="payment_id" value="<?php echo htmlspecialchars($row['id']); ?>">
                        <button type="submit" name="action" value="approve" class="btn btn-success">Approve</button>
                        <button type="submit" name="action" value="reject" class="btn btn-danger">Reject</button>
                    </form>
                </div>
                <hr>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="no-payments">
                <p>No pending payments at the moment.</p>
            </div>
        <?php endif; ?>

    </div>
</body>
</html>
