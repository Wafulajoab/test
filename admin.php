<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <!-- Google Fonts Link For Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <style>
     /* style.css */
body {
    margin: 0;
    font-family: 'Roboto', sans-serif;
    background: linear-gradient(135deg, #6d5bba 0%, #8d58bf 100%);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

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

.form-content h2 {
    text-align: center;
    margin-bottom: 25px;
    font-size: 26px;
    color: #333;
    font-weight: 600;
}

.input-field {
    margin-bottom: 20px;
    position: relative;
}

.input-field label {
    font-size: 14px;
    color: #555;
    display: block;
    margin-bottom: 6px;
    font-weight: 500;
}

.input-field input {
    width: 100%;
    padding: 12px 15px;
    font-size: 16px;
    border: 1px solid #ddd;
    border-radius: 8px;
    transition: border-color 0.3s;
}

.input-field input:focus {
    border-color: #6d5bba;
    outline: none;
}

.button-container {
    text-align: center;
    margin-top: 10px;
}

.button-container button {
    width: 100%;
    background-color: #6d5bba;
    color: #fff;
    border: none;
    padding: 12px 0;
    font-size: 16px;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    font-weight: 500;
}

.button-container button:hover {
    background-color: #5a4b9f;
}

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

.error-message {
    color: #d9534f;
    text-align: center;
    margin-top: 15px;
    font-size: 14px;
}

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


/* Styling for the Submit button in form */
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
        // JavaScript code here
        const closeBtn = document.querySelector('.close-btn');

        closeBtn.addEventListener('click', () => {
            document.querySelector('.form-popup').style.display = 'none';
        });
    </script>
</body>
</html>
