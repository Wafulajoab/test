<?php
session_start();

// Check if the admin is logged in, if not, redirect to login page
if (!isset($_SESSION['admin_id'])) {
    header("Location: login_admin.php");
    exit();
}

// Logic to fetch and display pending subscriptions
// Handle approval of a subscription
if (isset($_GET['approve'])) {
    $org_id = $_GET['approve'];
    $query = "UPDATE organizations SET subscription_status = 'approved' WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $org_id);
    $stmt->execute();

    // Redirect after approval
    header("Location: view_subscriptions.php");
    exit();
}

// Fetch pending subscriptions to display
$query = "SELECT id, org_name FROM organizations WHERE subscription_status = 'pending'";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approve Subscriptions</title>
</head>
<body>
    <h1>Pending Subscriptions</h1>
    <table>
        <tr>
            <th>Organization Name</th>
            <th>Action</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['org_name']; ?></td>
            <td><a href="?approve=<?php echo $row['id']; ?>">Approve</a></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
