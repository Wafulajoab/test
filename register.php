<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form | BDesign254</title>
    <style>
          body{
            background-color: cyan;
        }
        .form-popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 500px;
            max-width: 800px;
            display: flex;
            flex-direction: column; /* Updated */
            background-color: #f9f9f9;
            padding: 20px;
            border: 2px solid #0d0808;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            height: 750px;
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
// Start the session to access session variables
session_start();

// Include your database connection script
require_once 'connect.php';

// Custom function to generate the next user_id
function generateNextUserId($conn) {
    $sql = "SELECT user_id FROM users ORDER BY user_id DESC LIMIT 1";
    $result = $conn->query($sql);
    $lastUserId = $result->fetch_assoc()['user_id'];
    $nextUserId = intval($lastUserId) + 1;
    $formattedUserId = str_pad($nextUserId, 2, "0", STR_PAD_LEFT);
    return $formattedUserId;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = generateNextUserId($conn);
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $phone = $_POST['phone'];
    $id_no = $_POST['id_no'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $county = $_POST['county'];
    $nationality = $_POST['nationality'];

    $sql = "INSERT INTO users (user_id, fullname, email, password, phone, id_no, gender, dob, county, nationality) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssss", $user_id, $fullname, $email, $password, $phone, $id_no, $gender, $dob, $county, $nationality);

    if ($stmt->execute()) {
        echo "<script>alert('Registration successful!');</script>";
        // Redirect to login page after successful registration
        header("Location: login.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

        

<span class="close-btn material-symbols-rounded">&#x2716;</span>

        
        <div class="form-content">
            <h2>SIGNUP</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" autocomplete="off">

                <div class="input-field">
                    <input type="text" name="fullname" required>
                    <label>Enter your name</label>
                </div>
                <div class="input-field">
                    <input type="email" name="email" required>
                    <label>Enter your email</label>
                </div>
                <div class="input-field">
                    <input type="password" name="password" required>
                    <label>Create password</label>
                </div>
                <div class="input-field">
                    <input type="text" name="phone" required>
                    <label>Phone no</label>
                </div>
                <div class="input-field">
                    <input type="text" name="id_no" required>
                    <label>Id No</label>
                </div>
                <div class="input-field">
                    <select name="gender" required>
                        <option value=""></option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                    <label>Gender</label>
                </div>
                <div class="input-field">
                    <input type="date" name="dob" required>
                    <label>Date of Birth</label>
                </div>
                <div class="input-field">
                    <input type="text" name="county" required>
                    <label>County</label>
                </div>
                <div class="input-field">
                    <input type="text" name="nationality" required>
                    <label>Nationality</label>
                </div>
                <div class="policy-text">
                    <input type="checkbox" id="policy">
                    <label for="policy">
                        I agree the
                        <a href="#" class="option" style="text-decoration: none; color: #d51414;">Terms & Conditions</a>
                    </label>
                </div><br>
                <button type="submit" name="submit">Sign Up</button>
            </form>
            <div class="bottom-link">
                Already have an account? 
                <a href="login.php" id="login-link">Login</a>
            </div>
        </div>
    </div>
    <script>
    // JavaScript code here
    document.addEventListener('DOMContentLoaded', function() {
        const closeBtn = document.querySelector('.close-btn');
        const formPopup = document.querySelector('.form-popup');

        closeBtn.addEventListener('click', () => {
            formPopup.style.display = 'none';
            window.location.href = 'index.php'; // Redirect to index.php when close button is clicked
        });
    });
</script>

</body>
</html>

