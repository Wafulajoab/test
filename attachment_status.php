<?php
// attachment_status.php

// Start the session to access session variables
session_start();

// Include your database connection script
require_once 'connect.php';

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // If not logged in, redirect to the login page
    header("Location: login.php");
    exit;
}

// Retrieve attachment status for the logged-in user from the database
$user_id = $_SESSION['user_id']; // Assuming user ID is stored in session after login

// SQL query to fetch attachment details and status for the logged-in user
$sql = "SELECT attachment_name, status, attachment_date, organization, supervisor_name, supervisor_contact FROM attachments WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Check if any attachment record is found
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "<p>No attachment records found.</p>";
    exit;
}

// Determine the display status based on the admin's action
$status = $row['status'];
if ($status === 'Approved') {
    $display_status = "Approved";
} elseif ($status === 'Rejected') {
    $display_status = "Rejected";
} else {
    $display_status = "Pending"; // Default status if admin has not taken action
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attachment Status</title>
    <!-- Add your CSS styles here -->
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .status {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h2>Attachment Status</h2>
    <table>
        <tr>
            <th>Attachment Name</th>
            <td><?php echo $row['attachment_name']; ?></td>
        </tr>
        <tr>
            <th>Attachment Date</th>
            <td><?php echo $row['attachment_date']; ?></td>
        </tr>
        <tr>
            <th>Organization</th>
            <td><?php echo $row['organization']; ?></td>
        </tr>
        <tr>
            <th>Supervisor Name</th>
            <td><?php echo $row['supervisor_name']; ?></td>
        </tr>
        <tr>
            <th>Supervisor Contact</th>
            <td><?php echo $row['supervisor_contact']; ?></td>
        </tr>
        <tr>
            <th>Status</th>
            <td class="status"><?php echo $display_status; ?></td>
        </tr>
    </table>
</body>
</html>
