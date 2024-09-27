<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <!-- Google Fonts Link For Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <style>
        /* CSS styles here */
        body {
            background-color: #e0f7fa; /* Light cyan background */
            font-family: Arial, sans-serif; /* Changed font for better readability */
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh; /* Full viewport height */
            padding: 20px; /* Added padding */
        }

        .form-popup {
            width: 400px;
            max-width: 90%; /* Responsive max width */
            display: flex;
            flex-direction: column; /* Changed to column for better layout */
            background-color: #ffffff; /* White background for form */
            padding: 20px;
            border: 2px solid #0d0808;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2); /* Soft shadow for a polished look */
            position: relative; /* For close button positioning */
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            color: #888;
            font-size: 20px;
        }

        .form-content h2 {
            text-align: center; /* Center align the heading */
            margin-bottom: 20px; /* Space below heading */
            color: #333; /* Darker heading color */
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
            transition: border-color 0.3s; /* Transition for focus effect */
        }

        .input-field input:focus {
            border-color: #d51414; /* Change border color on focus */
            outline: none; /* Remove outline */
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
            background-color: #ffffff; /* Ensure label background matches form */
            padding: 0 5px;
        }

        .input-field input:focus + label,
        .input-field input:valid + label {
            top: 0;
            font-size: 12px;
            color: #d51414; /* Change label color on focus */
        }

        .button-container {
            text-align: center;
        }

        .form-popup .bottom-link {
            text-align: center; /* Center align bottom link */
            margin-top: 20px;
            font-size: 14px; /* Slightly smaller font size */
        }

        .form-popup .bottom-link a {
            color: #d51414;
            text-decoration: none;
            margin-top: 10px;
        }

        .form-popup .bottom-link a:hover {
            color: #3008e0; /* Change hover color */
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
            width: 100%; /* Full width button */
            font-size: 16px; /* Button text size */
        }

        .form-content button[type="submit"]:hover {
            background-color: #3008e0; /* Darker color on hover */
        }

        /* Responsive Styling */
        @media (max-width: 500px) {
            .form-popup {
                width: 90%; /* Full width on small screens */
            }

            .input-field input {
                font-size: 14px; /* Smaller input font size */
            }
        }
    </style>
</head>
<body>
    <div class="form-popup">
    <?php
    require_once 'connect.php';
    if(isset($_POST['submit'])) {
        
        // Set parameters and execute
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password before storing

        $sql = "INSERT INTO admins (fullname, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $fullname, $email, $password);
    
        if ($stmt->execute()) {
            echo "<script>
                    alert('Admin registration successful!');
                    window.location.href = 'admin_login.php'; // Redirect using JavaScript
                  </script>";
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }
    
        $stmt->close();
        $conn->close();
    }
?>

        <span class="close-btn material-symbols-rounded">close</span>
        <div class="form-content">
            <h2>ADMIN SIGNUP</h2>
            <form action="admin.php" method="POST">
                <div class="input-field">
                    <input type="text" name="fullname" required autocomplete="off">
                    <label>Enter your name</label>
                </div>
                <div class="input-field">
                    <input type="email" name="email" required autocomplete="off">
                    <label>Enter your email</label>
                </div>
                <div class="input-field">
                    <input type="password" name="password" required autocomplete="off">
                    <label>Create password</label>
                </div>
                <div class="policy-text" style="text-align: center;">
                    <input type="checkbox" id="policy" required>
                    <label for="policy">
                        I agree to the
                        <a href="#" class="option" style="text-decoration: none; color: #d51414;">Terms & Conditions</a>
                    </label>
                </div>
                <button type="submit" name="submit">Sign Up as Admin</button>
            </form>
            <div class="bottom-link">
                Already have an admin account? 
                <a href="admin_login.php" id="login-link">Admin Login</a>
            </div>
        </div>
    </div>
    <script>
        // JavaScript code here
        const closeBtn = document.querySelector('.close-btn');

        closeBtn.addEventListener('click', () => {
            document.querySelector('.form-popup').style.display = 'none';
        });
    </script>
</body>
</html>
