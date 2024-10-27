<?php
session_start();
require 'database_connection.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if email and password keys exist in the POST request
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        // Query to check organization credentials
        $query = "SELECT * FROM organizations WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $org = $result->fetch_assoc();

        // Check if the organization exists and verify the password
        if ($org && password_verify($password, $org['password'])) {
            // Store the organization details in session
            $_SESSION['org_id'] = $org['id'];
            $_SESSION['org_name'] = $org['org_name'];

            // Redirect to organization dashboard
            header("Location: organisation_dashboard.php");
            exit();
        } else {
            echo "<script>alert('Invalid email or password');</script>";
        }
        $stmt->close();
    } else {
        echo "<script>alert('Please enter both email and password.');</script>";
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login as Organisation</title>
  <link rel="stylesheet" href="styles.css"> <!-- Custom CSS for additional styling -->
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f0f2f5;
      padding: 0;
      margin: 0;
    }

    .container {
      max-width: 500px;
      margin: 50px auto;
      padding: 30px;
      background-color: white;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
      animation: fadeIn 0.6s ease-in-out; /* Smooth fade-in animation */
    }

    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }

    .logo {
      text-align: center;
      margin-bottom: 20px;
    }

    .logo img {
      max-width: 75px; /* Set your preferred logo size */
      height: auto;
    }

    h1 {
      text-align: center;
      color: #333;
      font-size: 28px;
      margin-bottom: 25px;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    label {
      font-size: 15px;
      color: #555;
    }

    input {
      padding: 12px;
      border: 1px solid #ddd;
      border-radius: 5px;
      font-size: 16px;
      width: 100%;
      box-sizing: border-box;
      background-color: #f9f9f9;
      transition: border-color 0.3s;
    }

    input:focus {
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
      width: 100%;
    }

    button:hover {
      background-color: #0056b3;
    }

    /* Error styling */
    .error {
      color: red;
      font-size: 14px;
    }

    /* Signup link styling */
    .signup-link {
      text-align: center;
      margin-top: 15px;
      font-size: 14px;
    }

    .signup-link a {
      color: #007BFF;
      text-decoration: none;
      font-weight: bold;
    }

    .signup-link a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container">
    <!-- Logo Section -->
    <div class="logo">
      <img src="logo.png" alt="Organisation Logo"> <!-- Replace with your logo source -->
    </div>

    <h1>Login as Organisation</h1>
    <form action="login_organisation.php" method="POST">
      <div class="form-group">
        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" required>
      </div>

      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
      </div>

      <button type="submit">Login</button>
    </form>

    <!-- Signup link -->
    <div class="signup-link">
      <p>Don't have an account? <a href="register_organisation.php">Sign up here</a></p>
    </div>
  </div>
</body>
</html>
