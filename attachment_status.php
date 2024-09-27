<?php
// attachment_status.php

// Include your database connection script
require_once 'connect.php';

// Retrieve attachment status for the logged-in user from the database
// Assume you have a table named "attachments" where attachment details are stored

// SQL query to fetch attachment status for the logged-in user
$user_id = $_SESSION['user_id']; // Assuming user ID is stored in session after login
$sql = "SELECT * FROM attachments WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Display attachment status in a table format
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attachment Status</title>
    <!-- Add your CSS styles here -->
</head>
<body>
    <h2>Attachment Status</h2>
    <table>
        <thead>
            <tr>
                <th>Attachment Name</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['attachment_name'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
<?php
// Close statement and connection
$stmt->close();
$conn->close();
?>
