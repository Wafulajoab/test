<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Post Attachment</title>
    <style>
        /* CSS styles here */
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

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        textarea,
        input[type="date"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    
<?php
// Include the database connection script
require_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize form input data
    $title = htmlspecialchars($_POST['title']);
    $organization = htmlspecialchars($_POST['organization']);
    $description = htmlspecialchars($_POST['description']);
    $duration = htmlspecialchars($_POST['duration']);
    $deadline = $_POST['deadline']; // No need for htmlspecialchars for date type
    $attachment_limit = $_POST['attachment_limit']; // Retrieve the attachment limit

    // Prepare SQL statement to insert data into the database
    $sql = "INSERT INTO attachments (title, organization, description, duration, application_deadline, attachment_limit) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "sssssi", $title, $organization, $description, $duration, $deadline, $attachment_limit);

    // Execute SQL statement
    if (mysqli_stmt_execute($stmt)) {
        echo "<p>Attachment submitted successfully!</p>";

        // Redirect to manage_attachments.php
        header("Location: manage_attachments.php");
        exit(); // Ensure script execution stops after redirection
    
    } else {
        echo "<p>Error: " . mysqli_error($conn) . "</p>";
    }

    // Close statement
    mysqli_stmt_close($stmt);
}
?>

    <form id="attachmentForm" action="attachments.php" method="POST">
        <h1>Add New Attachment</h1>
        <label for="title">Attachment Title:</label><br>
        <input type="text" id="title" name="title" required><br>
        <label for="attachment_limit">Attachment Limit:</label><br>
        <input type="number" id="attachment_limit" name="attachment_limit" required><br>

        <label for="organization">Organization:</label><br>
        <input type="text" id="organization" name="organization" required><br>

        <label for="description">Attachment Description:</label><br>
        <textarea id="description" name="description" rows="4" cols="50" required></textarea><br>

        <label for="duration">Duration:</label><br>
        <input type="text" id="duration" name="duration" required><br>

        <label for="deadline">Application Deadline:</label><br>
        <input type="date" id="deadline" name="deadline" required><br>

        <input type="submit" name="submit" value="Submit">
    </form>

    <script>
        document.getElementById('attachmentForm').addEventListener('submit', function(event) {
            // Prevent the form from submitting if the application deadline is not a future date
            var deadlineInput = document.getElementById('deadline');
            var deadlineDate = new Date(deadlineInput.value);
            var currentDate = new Date();
            if (deadlineDate <= currentDate) {
                alert('Please select a future date for the application deadline.');
                event.preventDefault(); // Prevent form submission
            }
        });
    </script>
</body>
</html>
