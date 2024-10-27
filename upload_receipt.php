<?php
session_start();

// Include database connection
require 'database_connection.php'; // Ensure this file exists and is correct

// Check if the organization is logged in
if (!isset($_SESSION['org_id'])) {
    header("Location: login_organisation.php");
    exit();
}

$org_id = $_SESSION['org_id'];

// Handle receipt upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['receipt'])) {
    // Directory to store uploaded receipts
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["receipt"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file is a valid image
    $check = getimagesize($_FILES["receipt"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not a valid image.";
        $uploadOk = 0;
    }

    // Check file size (5MB maximum)
    if ($_FILES["receipt"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow only certain file formats (jpg, png, jpeg)
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "Sorry, only JPG, JPEG, and PNG files are allowed.";
        $uploadOk = 0;
    }

    // If everything is okay, try to upload the file
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["receipt"]["tmp_name"], $target_file)) {
            // Prepare the SQL query
            $query = "UPDATE organizations SET receipt_path = ?, subscription_status = 'pending', subscription_payment_date = NOW() WHERE id = ?";
            $stmt = $conn->prepare($query);

            // Check if the query preparation was successful
            if ($stmt === false) {
                die('Error preparing query: ' . $conn->error); // Debugging step to show SQL error
            }

            // Bind parameters and execute the statement
            $stmt->bind_param("si", $target_file, $org_id);

            if ($stmt->execute()) {
                // Redirect to success page
                header("Location: login_organisation.php");
                exit();
            } else {
                echo "Error updating subscription: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

$conn->close(); // Close the database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        h1 {
            color: #007BFF;
            margin-bottom: 20px;
        }

        p {
            color: #555;
            margin-bottom: 30px;
        }

        input[type="file"] {
            display: block;
            margin: 0 auto 20px auto;
        }

        button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Upload Receipt</h1>
        <form method="POST" enctype="multipart/form-data" action="">
            <input type="file" name="receipt" required>
            <button type="submit">Upload Receipt</button>
        </form>
    </div>
</body>
</html>
