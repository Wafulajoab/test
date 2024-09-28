<?php
require_once 'connect.php';

// Fetch all payments (including pending, approved, and rejected)
$sql = "SELECT id, fullname, receipt_file, mpesa_code, status, created_at FROM payments ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Payment History</title>
    <style>
        /* Your existing CSS or additional styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1000px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
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
        }
        .payment-info p {
            margin: 0;
        }
        .status-approved {
            color: green;
        }
        .status-rejected {
            color: red;
        }
        .status-pending {
            color: orange;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        hr {
            border: none;
            border-top: 1px solid #ddd;
            margin: 20px 0;
        }
        .no-payments {
            text-align: center;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Payment History</h1>

        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="payment-item">
                    <div class="payment-info">
                        <p><strong>User:</strong> <?php echo htmlspecialchars($row['fullname']); ?></p>
                        <p><strong>MPESA Code:</strong> <?php echo htmlspecialchars($row['mpesa_code']); ?></p>
                        <p><a href="<?php echo htmlspecialchars($row['receipt_file']); ?>" target="_blank">View Receipt</a></p>
                        <p><strong>Status:</strong> 
                            <?php
                            if ($row['status'] == 'Approved') {
                                echo "<span class='status-approved'>Approved</span>";
                            } elseif ($row['status'] == 'Rejected') {
                                echo "<span class='status-rejected'>Rejected</span>";
                            } else {
                                echo "<span class='status-pending'>Pending</span>";
                            }
                            ?>
                        </p>
                        <p><strong>Date:</strong> <?php echo htmlspecialchars($row['created_at']); ?></p>
                    </div>
                </div>
                <hr>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="no-payments">
                <p>No payments found.</p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
$conn->close();
?>
