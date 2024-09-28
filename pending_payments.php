<?php
require_once 'connect.php';

// Fetch all pending payments including MPESA code, approval status, allowed, and denied columns
$sql = "SELECT id, fullname, receipt_file, mpesa_code, approval_status, allowed, denied FROM payments WHERE status = 'Pending'";
$result = $conn->query($sql);

// Check if the query was successful
if (!$result) {
    die("Error executing query: " . $conn->error);
}
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
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
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
        .no-payments {
            text-align: center;
            color: #555;
        }
        .tick {
            color: green;
            font-weight: bold;
        }
        .cross {
            color: red;
            font-weight: bold;
        }
        .hidden {
            display: none;
        }
        .success-message {
            text-align: center;
            color: green;
            font-size: 18px;
            margin-bottom: 20px;
        }
        .btn-back {
            display: block;
            margin: 0 auto;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-align: center;
            width: 100px;
            border-radius: 5px;
            text-decoration: none;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Pending Payments</h1>

        <!-- Success message and Back button -->
        <div id="actionSuccess" class="hidden">
            <div class="success-message">Action Recorded Successfully</div>
            <a href="pending_payments.php" class="btn-back">Back</a>
        </div>

        <!-- Pending Payments Table -->
        <div id="paymentTable">
            <?php if ($result->num_rows > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Receipt</th>
                            <th>MPESA Code</th>
                            <th>Allowed</th>
                            <th>Denied</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['fullname']); ?></td>
                                <td>
                                    <!-- View and download receipt -->
                                    <a href="uploads/<?php echo htmlspecialchars($row['receipt_file']); ?>" target="_blank" download>Download/View Receipt</a>
                                </td>
                                <td><?php echo htmlspecialchars($row['mpesa_code']); ?></td>
                                <td>
                                    <?php if ($row['allowed'] === 'Yes'): ?>
                                        <span class="tick">✔️</span>
                                    <?php else: ?>
                                        <span></span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($row['denied'] === 'Yes'): ?>
                                        <span class="cross">❌</span>
                                    <?php else: ?>
                                        <span></span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <!-- Buttons to approve or reject via AJAX -->
                                    <button class="btn btn-success" onclick="updatePaymentStatus(<?php echo htmlspecialchars($row['id']); ?>, 'approve')">Approve</button>
                                    <button class="btn btn-danger" onclick="updatePaymentStatus(<?php echo htmlspecialchars($row['id']); ?>, 'reject')">Reject</button>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="no-payments">
                    <p>No pending payments at the moment.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script>
        // AJAX function to update payment status
        function updatePaymentStatus(paymentId, action) {
            $.ajax({
                url: 'update_payment_status.php',
                type: 'POST',
                data: {
                    payment_id: paymentId,
                    action: action
                },
                success: function(response) {
                    // Hide the payment table and show success message with Back button
                    document.getElementById('paymentTable').classList.add('hidden');
                    document.getElementById('actionSuccess').classList.remove('hidden');
                },
                error: function() {
                    alert('Failed to update payment status.');
                }
            });
        }
    </script>
</body>
</html>

<?php
$conn->close();
?>
