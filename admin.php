<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <!-- Google Fonts Link For Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <style>
/* General body styling */
body {
    margin: 0;
    font-family: 'Roboto', sans-serif;
    background: linear-gradient(135deg, #6d5bba 0%, #8d58bf 100%);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* Popup form container styling */
.form-popup {
    background-color: #fff;
    padding: 40px;
    border-radius: 15px;
    width: 100%;
    max-width: 380px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    position: relative;
    animation: slideIn 0.6s ease-in-out;
}

@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Logo image styling */
.form-content .logo {
    display: block;
    margin: 0 auto 20px auto;
    width: 100px;
    height: auto;
}

/* Form title styling */
.form-content h2 {
    text-align: center;
    margin-bottom: 25px;
    font-size: 26px;
    color: #333;
    font-weight: 600;
}

/* Input field container styling */
.input-field {
    margin-bottom: 20px;
    position: relative;
}

/* Input label styling */
.input-field label {
    font-size: 14px;
    color: #555;
    display: block;
    margin-bottom: 6px;
    font-weight: 500;
}

/* Input field styling */
.input-field input {
    width: 100%;
    padding: 12px 15px;
    font-size: 16px;
    border: 1px solid #ddd;
    border-radius: 8px;
    transition: border-color 0.3s;
}

/* Input field focus effect */
.input-field input:focus {
    border-color: #6d5bba;
    outline: none;
}

/* Eye icon styling for password toggle */
.icon-eye {
    position: absolute;
    top: 50%;
    right: 15px;
    transform: translateY(-50%);
    cursor: pointer;
    color: #888;
    font-size: 20px;
}

.icon-eye:hover {
    color: #444;
}

/* Submit button styling */
button[type="submit"] {
    width: 100%;
    padding: 12px 0;
    background-color: #6d5bba;
    border: none;
    color: white;
    font-size: 16px;
    border-radius: 8px;
    cursor: pointer;
    font-weight: 600;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

button[type="submit"]:hover {
    background-color: #5a4b9f;
    transform: translateY(-2px); /* Slight lift effect on hover */
}

button[type="submit"]:active {
    transform: translateY(0); /* Button comes back down when clicked */
}

button[type="submit"]:focus {
    outline: none;
    box-shadow: 0 0 10px rgba(109, 91, 186, 0.7); /* Glowing effect on focus */
}

/* Bottom link styling */
.bottom-link {
    margin-top: 20px;
    text-align: center;
    font-size: 14px;
}

.bottom-link a {
    color: #6d5bba;
    text-decoration: none;
    font-weight: 500;
}

.bottom-link a:hover {
    text-decoration: underline;
}

/* Error message styling */
.error-message {
    color: #d9534f;
    text-align: center;
    margin-top: 15px;
    font-size: 14px;
}

/* Close button styling */
.close-btn {
    position: absolute;
    top: 10px;
    right: 15px;
    cursor: pointer;
    font-size: 22px;
    color: #888;
    transition: color 0.3s ease;
}

.close-btn:hover {
    color: #444;
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
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO admins (fullname, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $fullname, $email, $password);
    
        if ($stmt->execute()) {
            echo "<script>
                    alert('Admin registration successful!');
                    window.location.href = 'admin_login.php';
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
            <img src="logo.png" alt="Logo" class="logo">
            
            <h2>ADMIN SIGNUP</h2>
            <form action="admin.php" method="POST">
                <div class="input-field">
                <label>Enter your name</label>
                    <input type="text" name="fullname" required autocomplete="off">
                </div>
                <div class="input-field">
                <label>Enter your email</label>
                    <input type="email" name="email" required autocomplete="off">
                </div>
                <div class="input-field">
                <label>Create password</label>
                    <input type="password" name="password" id="password" required autocomplete="off">
                    <span class="icon-eye material-symbols-rounded" onclick="togglePassword()">visibility</span>
                </div>
                <div class="policy-text" style="text-align: center;">
                    <input type="checkbox" id="policy" required>
                    <label for="policy">
                        I agree to the
                        <a href="#" class="option" style="text-decoration: none; color: #d51414;">Terms & Conditions</a>
                    </label>
                </div>

                <br>
                <button type="submit" name="submit">Sign Up as Admin</button> 
    
            </form>
            <div class="bottom-link">
                Already have an admin account? 
                <a href="admin_login.php" id="login-link">Admin Login</a>
            </div>
        </div>
    </div>
    <script>
        const closeBtn = document.querySelector('.close-btn');
        closeBtn.addEventListener('click', () => {
            document.querySelector('.form-popup').style.display = 'none';
        });

        function togglePassword() {
            const passwordInput = document.getElementById("password");
            const icon = document.querySelector(".icon-eye");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                icon.textContent = "visibility_off";
            } else {
                passwordInput.type = "password";
                icon.textContent = "visibility";
            }
        }
    </script>
</body>
</html>
