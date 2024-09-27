<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Post Job</title>
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
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are filled
    if (isset($_POST['title']) && isset($_POST['job_limit']) && isset($_POST['description']) && isset($_POST['requirements']) && isset($_POST['deadline'])) {
        // Database connection
        require_once 'connect.php'; // Make sure to replace 'connect.php' with the actual filename
        
        // Prepare and bind SQL statement
        $sql = "INSERT INTO Jobs (title, job_limit, description, requirements, application_deadline) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        
        // Bind parameters
        mysqli_stmt_bind_param($stmt, "issss", $title, $job_limit, $description, $requirements, $deadline);

        // Set parameters
        $title = $_POST['title'];
        $job_limit = $_POST['job_limit'];
        $description = $_POST['description'];
        $requirements = $_POST['requirements'];
        $deadline = $_POST['deadline'];

        // Execute statement
        if (mysqli_stmt_execute($stmt)) {
            // Close statement and connection
            mysqli_stmt_close($stmt);
            mysqli_close($conn);

            // Redirect to manage_jobs.php after successful submission
            header("Location: manage_jobs.php");
            exit(); // Ensure script execution stops after redirection
        } else {
            echo "<p>Error posting job: " . mysqli_error($conn) . "</p>";
        }
    } else {
        echo "<p>Please fill in all required fields.</p>";
    }
}
?>

    <form id="jobForm" action="" method="POST">
        <h1>Add New Job</h1>
        <label for="title">Job Title:</label><br>
        <input type="text" id="title" name="title" required><br>
        <label for="job_limit">Job Limit:</label><br>
        <input type="text" id="job_limit" name="job_limit" required><br>

        <label for="description">Job Description:</label><br>
        <textarea id="description" name="description" rows="4" cols="50" required></textarea><br>

        <label for="requirements">Job Requirements:</label><br>
        <textarea id="requirements" name="requirements" rows="4" cols="50" required></textarea><br>

        <label for="deadline">Application Deadline:</label><br>
        <input type="date" id="deadline" name="deadline" required><br>

        <input type="submit" value="Submit">
    </form>

    <script>
        document.getElementById('jobForm').addEventListener('submit', function(event) {
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
