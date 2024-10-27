<?php
session_start();
require 'database_connection.php'; // Include your database connection file

// Check if the organization is logged in
if (!isset($_SESSION['org_name'])) {
    header("Location: login_organisation.php");
    exit();
}

// Get organization name from session
$org_name = $_SESSION['org_name'];

// Fetch current organization data from the database
$query = "SELECT * FROM organizations WHERE org_name = ?";
$stmt = $conn->prepare($query);

// Check if the prepare() method was successful
if ($stmt === false) {
    die("Error preparing query: " . $conn->error);
}

$stmt->bind_param("s", $org_name);
$stmt->execute();
$result = $stmt->get_result();
$org_data = $result->fetch_assoc();

// Check if the profile was updated successfully
$update_success = isset($_GET['update_success']) && $_GET['update_success'] == 1;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Organisation Profile</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            margin: 0;
            padding: 0;
        }

        .container {
            padding: 40px 20px;
            max-width: 600px;
            margin: 30px auto;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #007BFF;
            margin-bottom: 20px;
        }

        .profile-info {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .profile-info div {
            font-size: 16px;
            color: #333;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .success-message {
            padding: 10px;
            color: green;
            font-size: 16px;
            text-align: center;
            border: 1px solid green;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .edit-btn, .exit-btn {
            display: block;
            width: 100%;
            padding: 15px;
            text-align: center;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 18px;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        .edit-btn:hover, .exit-btn:hover {
            background-color: #0056b3;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            max-width: 100px;
        }
    </style>
</head>
<body>
    <div class="container">

     <!-- Logo at the top -->
     <div class="logo">
            <img src="logo.png" alt="Organisation Logo"> <!-- Replace with actual logo path -->
        </div>

        <h1>Organisation Profile</h1>

        <!-- Display success message if the profile was updated successfully -->
        <?php if ($update_success): ?>
            <div class="success-message">
                Profile updated successfully!
            </div>
        <?php endif; ?>

        <div class="profile-info">
            <div><strong>Organization Name:</strong> <?php echo htmlspecialchars($org_data['org_name']); ?></div>
            <div><strong>Email Address:</strong> <?php echo htmlspecialchars($org_data['email']); ?></div>
            <div><strong>Industry:</strong> <?php echo htmlspecialchars($org_data['industry']); ?></div>
            <div><strong>Description:</strong> <?php echo nl2br(htmlspecialchars($org_data['description'])); ?></div>
        </div>

        <a href="edit_organisation.php" class="edit-btn">Edit Profile</a>

        <!-- Exit Button -->
        <a href="organisation_dashboard.php" class="exit-btn">Exit to Dashboard</a>

    </div>
</body>
</html>
