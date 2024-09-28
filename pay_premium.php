<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

require_once 'connect.php';

$fullname = $_SESSION['fullname'];
$message = ''; // Initialize message

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mpesa_code = strtoupper(trim($_POST['mpesa_code']));

    // Validate MPESA code (exactly 10 characters, must contain letters and digits)
    if (strlen($mpesa_code) != 10 || !preg_match('/[A-Z]/', $mpesa_code) || !preg_match('/[0-9]/', $mpesa_code)) {
        echo "Invalid MPESA code. It must be exactly 10 characters long and include both uppercase letters and digits.";
        exit;
    }

    $targetDir = __DIR__ . "/receipts/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $receiptFile = $targetDir . basename($_FILES["receipt"]["name"]);
    $uploadOk = 1;
    $receiptFileType = strtolower(pathinfo($receiptFile, PATHINFO_EXTENSION));

    // Validate file is an image or pdf
    $check = getimagesize($_FILES["receipt"]["tmp_name"]);
    if ($check === false && $receiptFileType != "pdf") {
        echo "File is not an image or PDF.";
        $uploadOk = 0;
    }

    if ($_FILES["receipt"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["receipt"]["tmp_name"], $receiptFile)) {
            // Insert into payments table and update user status to 'Pending'
            $sql = "INSERT INTO payments (fullname, receipt_file, mpesa_code, status) VALUES (?, ?, ?, 'Pending')";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $fullname, $receiptFile, $mpesa_code);

            if ($stmt->execute()) {
                // Update user's account status to pending
                $updateStatus = "UPDATE users SET account_status = 'Pending' WHERE fullname = ?";
                $updateStmt = $conn->prepare($updateStatus);
                $updateStmt->bind_param("s", $fullname);
                $updateStmt->execute();

                // Set success message for the modal
                $message = "Your receipt has been uploaded. Your account is pending admin approval.";
            } else {
                echo "Error uploading receipt: " . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pay for Premium Access</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        h2 {
            color: #333;
        }
        p {
            font-size: 16px;
            color: #555;
        }
        label {
            display: block;
            margin: 20px 0 10px;
            font-weight: bold;
            color: #333;
        }
        input[type="file"], input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
        }
        button {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-bottom: 10px; /* Add some spacing below the button */
        }
        button:hover {
            background-color: #218838;
        }
        .go-back {
            background-color: #007bff;
        }
        .go-back:hover {
            background-color: #0056b3;
        }
        .info {
            background-color: #e9f7ef;
            padding: 10px;
            border: 1px solid #d4edda;
            color: #155724;
            margin-bottom: 20px;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.4);
            justify-content: center;
            align-items: center;
        }
        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            width: 80%;
            max-width: 400px;
            text-align: center;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover, .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Upgrade to Premium</h2>
        <div class="info">
            <p>To apply for more jobs, please make a payment of <strong>KSH 500</strong> to the following till number:</p>
            <p><strong>Till Number: 234344 - NALO COMPANY</strong></p>
        </div>
        <p>After making the payment, upload the receipt below. Your account will be upgraded to premium status once the admin approves your payment.</p>
        <!-- Payment receipt upload form -->
        <form action="pay_premium.php" method="post" enctype="multipart/form-data">
            <label for="mpesa_code">Enter MPESA Transaction Code (10 characters):</label>
            <input type="text" name="mpesa_code" id="mpesa_code" required 
                   pattern="(?=.*[A-Z])(?=.*[0-9])[A-Z0-9]{10}" 
                   title="Must be exactly 10 characters, including both uppercase letters and digits" 
                   maxlength="10" oninput="this.value = this.value.toUpperCase();">

            <label for="receipt">Upload Payment Receipt (JPG, JPEG, PNG, PDF):</label>
            <input type="file" name="receipt" id="receipt" required>
            <button type="submit">Submit Payment</button>
            <button type="button" class="go-back" onclick="window.history.back();">Go Back</button> <!-- Go Back Button -->
        </form>
    </div>

    <!-- Modal HTML -->
    <div id="successModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p><?php echo $message; ?></p>
        </div>
    </div>

    <script>
        // Get the modal
        var modal = document.getElementById("successModal");
        var span = document.getElementsByClassName("close")[0];

        // Check if message exists, if yes, show modal
        <?php if (!empty($message)) { ?>
            modal.style.display = "flex";
        <?php } ?>

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>
