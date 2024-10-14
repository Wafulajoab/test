<?php
session_start();

// Check if the organization is logged in, if not, redirect to login page
if (!isset($_SESSION['org_id'])) {
    header("Location: login_organisation.php");
    exit();
}

// Initialize variables for error handling and success messages
$error = '';
$success = '';

// Handle the file upload
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Define the directory where files will be uploaded
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["attachment"]["name"]);
    $uploadOk = 1;

    // Check if file is selected
    if (empty($_FILES["attachment"]["name"])) {
        $error = "No file selected. Please choose a file to upload.";
        $uploadOk = 0;
    }

    // Check if the file is a valid upload
    $check = getimagesize($_FILES["attachment"]["tmp_name"]);
    if ($check === false) {
        $error = "File is not a valid image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        $error = "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size (optional)
    if ($_FILES["attachment"]["size"] > 500000) { // Limit file size to 500KB
        $error = "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats (optional)
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        // If there was an error, prepare the error message
    } else {
        if (move_uploaded_file($_FILES["attachment"]["tmp_name"], $target_file)) {
            $success = "The file " . htmlspecialchars(basename($_FILES["attachment"]["name"])) . " has been uploaded.";
            // Optionally save file details to the database here
        } else {
            $error = "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post New Attachment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            padding: 20px;
            max-width: 600px;
            margin: 20px auto;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="file"] {
            display: block;
        }
        input[type="submit"] {
            padding: 10px 15px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .message {
            margin-top: 20px;
            color: red; /* Default to red for errors */
        }
        .success {
            color: green; /* Green for success messages */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Post New Attachment</h2>
        <form action="create_attachment.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="attachment">Choose a file to upload:</label>
                <input type="file" name="attachment" id="attachment" required>
            </div>
            <input type="submit" value="Upload Attachment">
        </form>

        <!-- Display success or error messages -->
        <?php if (!empty($error)): ?>
            <div class="message"><?php echo $error; ?></div>
        <?php endif; ?>
        <?php if (!empty($success)): ?>
            <div class="message success"><?php echo $success; ?></div>
        <?php endif; ?>
    </div>
</body>
</html>
