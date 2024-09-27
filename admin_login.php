<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        /* Internal CSS styles */
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
    </style>
</head>
<body>
    <div class="form-popup">
        <?php
            // Start session
            session_start();

            require_once 'connect.php';

            $error_message = '';

            if(isset($_POST['submit'])){
                $fullname = $_POST['fullname'];
                $password = $_POST['password'];

                $sql = "SELECT * FROM admins WHERE fullname=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $fullname);
                $stmt->execute();
                $result = $stmt->get_result();

                if($result->num_rows == 1){
                    $row = $result->fetch_assoc();
                    if(password_verify($password, $row['password'])){
                        // Store admin data in session variables
                        $_SESSION['admin_id'] = $row['id'];
                        $_SESSION['admin_name'] = $row['fullname'];
                        // Redirect to admin panel
                        header("Location: adminpannel.php");
                        exit;
                    } else {
                        $error_message = 'Incorrect fullname or password';
                    }
                } else {
                    $error_message = 'Incorrect fullname or password';
                }

                $stmt->close();
                $conn->close();
            }
        ?>
        <span class="close-btn" onclick="window.location.href='admin_index.php'">&times;</span>
        <div class="form-content">
            <h2>Admin Login</h2>
            <form action="" method="POST">
                <div class="input-field">
                    <label>Fullname</label>
                    <input type="text" name="fullname" required autocomplete="off">
                </div>
                <div class="input-field">
                    <label>Password</label>
                    <input type="password" name="password" required autocomplete="off">
                </div>
                <div class="button-container">
                    <button type="submit" name="submit">Login</button>
                </div>
                <?php if(!empty($error_message)): ?>
                    <p class="error-message"><?php echo $error_message; ?></p>
                <?php endif; ?>
            </form>
            <div class="bottom-link">
                Don't have an admin account? <a href="admin.php">Sign Up</a>
            </div>
        </div>
    </div>
</body>
</html>
