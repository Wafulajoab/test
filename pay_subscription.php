<?php
session_start();

// Include database connection
require 'database_connection.php'; // Make sure this file is in the same directory

// Check if the organization is logged in
if (!isset($_SESSION['org_id'])) {
    header("Location: login_organisation.php");
    exit();
}

$org_id = $_SESSION['org_id'];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Logic for handling payment, e.g., storing the payment details in the database

    // Update subscription status to 'pending'
    $query = "UPDATE organizations SET subscription_status = 'pending', subscription_payment_date = NOW() WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $org_id);

    if ($stmt->execute()) {
        // Redirect to subscription success page
        header("Location: subscription_success.php");
        exit();
    } else {
        echo "Error updating subscription: " . $stmt->error; // Error handling
    }
    $stmt->close();
}

$conn->close(); // Close the database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pay Subscription</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        h1 {
            color: #007BFF;
            margin-bottom: 20px;
        }

        p {
            color: #555;
            margin-bottom: 30px;
        }

        button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Pay Subscription Fee</h1>
        <h1>Till No. 68798</h1>
        <p>Please pay KSH 1000 to the provided account number.</p>
        <form method="POST" action="">
            <button type="submit">Confirm Payment</button>
        </form>
    </div>
</body>
</html>
