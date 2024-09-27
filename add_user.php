<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add New User</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <label for="phone">Phone No:</label>
            <input type="text" id="phone" name="phone" required>
            <label for="id_no">Id No:</label>
            <input type="text" id="id_no" name="id_no" required>
            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required>
            <label for="county">County:</label>
            <input type="text" id="county" name="county" required>
            <label for="nationality">Nationality:</label>
            <input type="text" id="nationality" name="nationality" required>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>

<?php
// Include your database connection script
require_once 'connect.php';

// Define variables and initialize with empty values
$fullname = $email = $password = $phone = $id_no = $gender = $dob = $county = $nationality = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $phone = $_POST['phone'];
    $id_no = $_POST['id_no'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $county = $_POST['county'];
    $nationality = $_POST['nationality'];

    // Prepare an insert statement
    $sql = "INSERT INTO users (fullname, email, password, phone, id_no, gender, dob, county, nationality) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    if ($stmt = $conn->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("sssssssss", $fullname, $email, $password, $phone, $id_no, $gender, $dob, $county, $nationality);
        
        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Redirect to success page

                        header("location: fetch_user.php");
                        exit();
                    } else {
                        echo "Error: " . $stmt->error;
                    }
            
                    // Close statement
                    $stmt->close();
                }
            
                // Close connection
                $conn->close();
            }
            ?>
            
