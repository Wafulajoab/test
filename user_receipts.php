<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

require_once 'connect.php';

$fullname = $_SESSION['fullname'];

// Fetch user's payment receipts and their statuses
$sql = "SELECT receipt_file, mpesa_code, status, created_at FROM payments WHERE fullname = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $fullname);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Receipts</title>
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
        .receipt-item {
            border-bottom: 1px solid #ddd;
            padding: 15px 0;
        }
        .receipt-item:last-child {
            border-bottom: none;
        }
        .receipt-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .receipt-info p {
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
        .no-receipts {
            text-align: center;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Your Receipts</h1>

        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="receipt-item">
                    <div class="receipt-info">
                        <p><strong>MPESA Code:</strong> <?php echo htmlspecialchars($row['mpesa_code']); ?></p>
                        <p><strong>Status:</strong> 
                            <?php
                            // Display payment status with color coding
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
                        <p><a href="<?php echo htmlspecialchars($row['receipt_file']); ?>" target="_blank" download>Download Receipt</a></p>
                    </div>
                </div>
                <hr>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="no-receipts">
                <p>You have not uploaded any receipts yet.</p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
$conn->close();
?>
