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
    if (isset($_FILES["attachment"])) {
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

    // Handle attachment opportunity creation
    if (isset($_POST['create_attachment_opportunity'])) {
        // Collect form data
        $title = $_POST['title'];
        $num_attachees = $_POST['num_attachees'];
        $qualifications = $_POST['qualifications'];
        $deadline = $_POST['deadline'];
        $details = $_POST['details'];

        // Example: save to database (assuming a connection is established):
        $query = "INSERT INTO attachment_opportunities (title, num_attachees, qualifications, deadline, details, org_id) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sisssi", $title, $num_attachees, $qualifications, $deadline, $details, $_SESSION['org_id']);

        if ($stmt->execute()) {
            $success = "Attachment opportunity created successfully!";
        } else {
            $error = "Error creating attachment opportunity: " . $conn->error;
        }

        $stmt->close();
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
            background-color: #f0f2f5;
        }
        .container {
            padding: 20px;
            max-width: 700px;
            margin: 30px auto;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .container h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo img {
            width: 100px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        input[type="file"],
        input[type="text"],
        input[type="number"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            margin-top: 5px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .message {
            margin-top: 20px;
            font-size: 14px;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
        }
        .message.success {
            color: green;
            background-color: #e6f9e6;
        }
        .message.error {
            color: red;
            background-color: #f9e6e6;
        }
        .hr {
            border: 0;
            border-top: 2px solid #007BFF;
            margin: 20px 0;
        }
        .go-back {
            padding: 12px;
            background-color: #6c757d; /* Bootstrap secondary color */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            text-align: center;
            margin-top: 20px;
        }
        .go-back:hover {
            background-color: #5a6268; /* Darker shade on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Logo -->
        <div class="logo">
            <img src="logo.png" alt="Organization Logo">
        </div>

        <!-- File Upload Form -->
        <h2>Upload Attachment</h2>
        <form action="create_attachment.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="attachment">Choose a file to upload:</label>
                <input type="file" name="attachment" id="attachment" required>
            </div>
            <input type="submit" value="Upload Attachment">
        </form>

        <!-- Divider -->
        <div class="hr"></div>

        <!-- Attachment Opportunity Form -->
        <h2>Create Attachment Opportunity</h2>
        <form action="create_attachment.php" method="post">
            <div class="form-group">
                <label for="title">Attachment Title:</label>
                <input type="text" name="title" id="title" required>
            </div>
            <div class="form-group">
                <label for="num_attachees">Number of Attachees Required:</label>
                <input type="number" name="num_attachees" id="num_attachees" required>
            </div>
            <div class="form-group">
                <label for="qualifications">Qualifications Required:</label>
                <textarea name="qualifications" id="qualifications" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="deadline">Application Deadline:</label>
                <input type="date" name="deadline" id="deadline" required>
            </div>
            <div class="form-group">
                <label for="details">Additional Details:</label>
                <textarea name="details" id="details" rows="4"></textarea>
            </div>
            <input type="submit" name="create_attachment_opportunity" value="Create Attachment Opportunity">
        </form>

        <!-- Go Back Button -->
        <button class="go-back" onclick="window.location.href='organisation_dashboard.php';">Go Back</button>

        <!-- Success and Error Messages -->
        <?php if (!empty($error)): ?>
            <div class="message error"><?php echo $error; ?></div>
        <?php endif; ?>
        <?php if (!empty($success)): ?>
            <div class="message success"><?php echo $success; ?></div>
        <?php endif; ?>
    </div>
</body>
</html>
