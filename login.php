<!DOCTYPE html>
<!-- Coding By CodingNepal - www.codingnepalweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Registration Form</title>
    <!-- Google Fonts Link For Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <style>
        body{
            background-color: cyan;
        }
        .form-popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            max-width: 800px;
            display: flex;
            flex-direction: column; /* Updated */
            background-color: #f9f9f9;
            padding: 20px;
            border: 2px solid #0d0808;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            height: 400px; 
        }

        .form-popup .form-details {
            text-align: center; /* Updated */
            margin-bottom: 20px; /* Added */
        }

        .form-popup .form-content {
            width: 100%; /* Updated */
        }
        .form-content h2 {
            text-align: center; /* Center align the heading */
        }

        .input-field {
            margin-bottom: 20px;
            position: relative;
        }

        .input-field input {
            width: calc(100% - 20px);
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .input-field select {
            width: calc(100% - 20px);
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .input-field label {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            font-size: 16px;
            color: #888;
            transition: 0.3s;
            pointer-events: none;
            background-color: #f9f9f9;
            padding: 0 5px;
        }

        .input-field input:focus + label,
        .input-field input:valid + label,
        .input-field select:focus + label,
        .input-field select:valid + label {
            top: 0;
            font-size: 12px;
            color: #d51414;
        }

        .button-container {
            text-align: center;
        }

        .form-popup .bottom-link {
            text-align: left;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .form-popup .bottom-link a {
            color: #d51414;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
        }

        .form-popup .bottom-link a:hover {
            color: blue;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            color: #888;
            font-size: 20px;
        }
        .form-content h2{
            text align: center;
        }

        /* Style for sign up button */
        .form-content button[type="submit"] {
            background-color: #d51414;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-content button[type="submit"]:hover {
            background-color: #3008e0;
        }
    </style>
</head>
<body>
<div class="form-popup">
<?php
session_start();

require_once 'connect.php'; // Include your database connection script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $password = $_POST['password'];

    // Attempt to find the user by user_id or fullname
    $sql = "SELECT * FROM users WHERE fullname = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $fullname); // Corrected the type to "ss" for both parameters
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        
        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Password is correct, proceed with login
            $_SESSION['loggedin'] = true;
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['fullname'] = $user['fullname']; // Store the user's full name in the session
            header("Location: dashboard.php");
            exit;
        } else {
            echo "<script>alert('Invalid login credentials.');</script>";
        }
    } else {
        echo "<script>alert('Invalid login credentials.');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>




    <span class="close-btn material-symbols-rounded">&#x2716;</span>
    <div class="form-details">
        <!-- Removed the h1 and p elements -->
    </div>
    <div class="form-content">
        <h2>LOGIN</h2>
        <form action="login.php" method="POST">
        <div class="input-field">
      
    <div class="input-field">
        <input type="text" name="fullname" placeholder="Full Name" required>
        <label>User Name</label>
    </div>
    <div class="input-field">
        <input type="password" name="password" placeholder="Password" required>
        <label>Password</label>
    </div>
            <!-- Added style for forgot password link -->
            <a href="#" class="forgot-pass-link" style="text-decoration: none; color: #d51414; hover{
                color: #3008e0};">Forgot password?</a>
            <button type="submit" name="submit">Log In</button>
        </form>
        <div class="bottom-link">
            Don't have an account?
            <a href="register.php" id="signup-link">Signup</a>
        </div>
    </div>
</div>
<script>
    // JavaScript code here
    document.addEventListener('DOMContentLoaded', function() {
        const closeBtn = document.querySelector('.close-btn');

        closeBtn.addEventListener('click', () => {
            window.location.href = 'index.php'; // Redirect to index.php when close button is clicked
        });
    });
</script>
</body>
</html>
