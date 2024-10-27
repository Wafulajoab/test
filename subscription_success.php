<?php
session_start();
require_once 'database_connection.php';

// Assuming the organization ID is stored in the session after submission
$org_id = $_SESSION['org_id'];

$sql = "SELECT subscription_status FROM organizations WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $org_id);
$stmt->execute();
$stmt->bind_result($subscription_status);
$stmt->fetch();
$stmt->close();

if ($subscription_status === 'active') {
    // Redirect to login page if activated
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription Submitted</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #e9ecef;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            max-width: 450px;
            text-align: center;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        h1 {
            color: #28a745;
            font-size: 30px;
            margin-bottom: 20px;
        }

        p {
            font-size: 16px;
            color: #6c757d;
            margin-bottom: 30px;
        }

        .icon {
            font-size: 50px;
            color: #28a745;
            margin-bottom: 20px;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }

        .waiting-text {
            font-size: 14px;
            color: #6c757d;
            animation: blink 1.5s steps(5, start) infinite;
            margin-top: 20px;
        }

        @keyframes blink {
            50% { opacity: 0.5; }
        }

        .loader {
            border: 8px solid #f3f3f3; /* Light gray */
            border-top: 8px solid #28a745; /* Green */
            border-radius: 50%;
            width: 60px; /* Size of the ring */
            height: 60px; /* Size of the ring */
            animation: spin 1s linear infinite; /* Rotation animation */
            margin: 20px auto; /* Centering the loader */
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .activate-btn {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .activate-btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="icon">✔️</div> <!-- Success icon with animation -->
        <h1>Payment Submitted</h1>
        <p>Thank you for your payment! Your submission is under review, and an admin will activate your account soon.</p>
        <div class="loader"></div> <!-- Rotating ring loader -->
        <p class="waiting-text">Waiting for activation...</p>
    </div>
</body>
</html>
