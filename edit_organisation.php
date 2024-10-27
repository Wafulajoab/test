<?php
session_start();
require 'database_connection.php'; // Include your database connection file

// Check if the organization is logged in
if (!isset($_SESSION['org_name'])) {
    header("Location: login_organisation.php");
    exit();
}

// Get organization ID from session
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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capture form inputs
    $org_name = $_POST['org_name'];
    $email = $_POST['email'];
    $industry = $_POST['industry'];
    $description = $_POST['description'];

    // Update the organization details in the database
    $update_query = "UPDATE organizations SET org_name = ?, email = ?, industry = ?, description = ? WHERE org_name = ?";
    $update_stmt = $conn->prepare($update_query);

    // Check if the prepare() method for update was successful
    if ($update_stmt === false) {
        die("Error preparing update query: " . $conn->error);
    }

    $update_stmt->bind_param("sssss", $org_name, $email, $industry, $description, $org_name);

    if ($update_stmt->execute()) {
        // Update successful
        $_SESSION['org_name'] = $org_name; // Update session data
        header("Location: view_organisation_profile.php?update_success=1"); // Redirect to view profile
        exit();
    } else {
        // Handle update error
        $error_message = "Failed to update organization details. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Organisation Profile</title>
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

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            max-width: 100px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        label {
            font-size: 16px;
            color: #333;
        }

        input, select, textarea {
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
            box-sizing: border-box;
            background-color: #f9f9f9;
            transition: border-color 0.3s;
        }

        input:focus, select:focus, textarea:focus {
            border-color: #007BFF;
            outline: none;
        }

        button {
            padding: 15px;
            font-size: 18px;
            color: white;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            font-size: 14px;
        }

        .go-back {
            background-color: #6c757d; /* Bootstrap secondary color */
            color: white;
            border: none;
            border-radius: 5px;
            padding: 15px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .go-back:hover {
            background-color: #5a6268; /* Darker shade on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Logo at the top -->
        <div class="logo">
            <img src="logo.png" alt="Organisation Logo"> <!-- Replace with actual logo path -->
        </div>

        <h1>Edit Organisation Profile</h1>

        <!-- Display error message if update failed -->
        <?php if (isset($error_message)): ?>
            <p class="error"><?php echo $error_message; ?></p>
        <?php endif; ?>

        
        <form action="edit_organisation.php" method="POST">
            <div class="form-group">
                <label for="org_name">Organization Name:</label>
                <input type="text" id="org_name" name="org_name" value="<?php echo $org_data['org_name']; ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" value="<?php echo $org_data['email']; ?>" required>
            </div>

            <div class="form-group">
                <label for="industry">Industry:</label>
                <select id="industry" name="industry" required>
                    <option value="">--Select Industry--</option>
                    <option value="Technology" <?php if ($org_data['industry'] == 'Technology') echo 'selected'; ?>>Technology</option>
                    <option value="Healthcare" <?php if ($org_data['industry'] == 'Healthcare') echo 'selected'; ?>>Healthcare</option>
                    <option value="Education" <?php if ($org_data['industry'] == 'Education') echo 'selected'; ?>>Education</option>
                    <option value="Finance" <?php if ($org_data['industry'] == 'Finance') echo 'selected'; ?>>Finance</option>
                    <option value="Manufacturing" <?php if ($org_data['industry'] == 'Manufacturing') echo 'selected'; ?>>Manufacturing</option>
                    <!-- Add more industries as needed -->
                </select>
            </div>

            <div class="form-group">
                <label for="description">Organization Description:</label>
                <textarea id="description" name="description" rows="5" required><?php echo $org_data['description']; ?></textarea>
            </div>

            <button type="submit">Save Changes</button>
                <!-- Go Back Button -->
        <button class="go-back" onclick="window.location.href='organisation_dashboard.php';">Go Back</button>

        </form>
    </div>
</body>
</html>
