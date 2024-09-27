<?php
// Include your database connection script
require_once 'connect.php';

// Check if the user ID is set
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Fetch the user's current information
    $sql = "SELECT user_id, fullname, email, password, phone, id_no, gender, dob, county, nationality FROM users WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        echo "<h2>User not found.</h2>";
        exit;
    }
} else {
    echo "<h2>No user ID provided.</h2>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>

</head> <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        h2 {
            color: #333;
            text-align: center;
            margin-top: 50px;
        }

        form {
            width: 80%;
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"], input[type="email"], input[type="password"], input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
<body>
    <h2>Edit User</h2>
    <form action="update_user.php" method="post">
        <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
        <label for="fullname">Full Name:</label>
        <input type="text" id="fullname" name="fullname" value="<?php echo $user['fullname']; ?>" required><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="<?php echo $user['password']; ?>" required><br>
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" value="<?php echo $user['phone']; ?>" required><br>
        <label for="id_no">ID No:</label>
        <input type="text" id="id_no" name="id_no" value="<?php echo $user['id_no']; ?>" required><br>
        <label for="gender">Gender:</label>
        <input type="text" id="gender" name="gender" value="<?php echo $user['gender']; ?>" required><br>
        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" value="<?php echo $user['dob']; ?>" required><br>
        <label for="county">County:</label>
        <input type="text" id="county" name="county" value="<?php echo $user['county']; ?>" required><br>
        <label for="nationality">Nationality:</label>
        <input type="text" id="nationality" name="nationality" value="<?php echo $user['nationality']; ?>" required><br>
        <input type="submit" value="Update User">
    </form>
</body>
</html>
