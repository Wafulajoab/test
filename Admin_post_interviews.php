<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Schedule Job Interviews</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 500px;
        }
        h1 {
            text-align: center;
        }
        form {
            width: 100%;
        }
        label {
            display: block;
            margin-top: 20px;
        }
        input[type="text"], input[type="date"], input[type="time"] {
            width: 95%;
            padding: 10px;
            margin-top: 5px;
        }
        input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Schedule Job Interviews</h1>
        <form action="admin_post_interviews.php" method="post">
            <label for="job_title">Job Title:</label>
            <input type="text" id="job_title" name="job_title" required>
            <br>
            <label for="date">Interview Date:</label>
            <input type="date" id="date" name="date" required>
            <br>
            <label for="time">Interview Time:</label>
            <input type="time" id="time" name="time" required>
            <br>
            <input type="submit" value="Schedule Interview">
        </form>
    </div>

    <?php
    // Include the database connection script
    require_once 'connect.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate inputs (e.g., check if job title is provided, date and time are valid)
        if (isset($_POST['job_title']) && isset($_POST['date']) && isset($_POST['time'])) {
            $jobTitle = $_POST['job_title'];
            $date = $_POST['date'];
            $time = $_POST['time'];

            // Insert the new interview into the Interviews table
            $sql = "INSERT INTO Interviews (job_title, interview_date, interview_time) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $jobTitle, $date, $time);
            if ($stmt->execute()) {
                // Redirect to manage_interviews.php after successful scheduling
                header("Location: manage_interviews.php");
                exit;
            } else {
                // Display an error message if the query fails
                echo "Error: " . $stmt->error;
            }
        } else {
            // Display an error message if inputs are not valid
            echo "Please provide a job title, and a date and time.";
        }
    }
    ?>
</body>
</html>
