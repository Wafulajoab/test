<?php
session_start();

// Check if the organization is logged in
if (!isset($_SESSION['org_id'])) {
    header("Location: login_organisation.php");
    exit();
}

// Optionally retrieve organization details
$org_name = $_SESSION['org_name'] ?? 'Organization';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription Success</title>
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

        a {
            background-color: #007BFF;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Subscription Successful!</h1>
        <p>Thank you, <?php echo htmlspecialchars($org_name); ?>! Your subscription has been activated.</p>
        <p>You can now start posting jobs and manage your organization.</p>
        <a href="login_organisation.php">Login Now</a>
    </div>
</body>
</html>
