<?php
// Database connection
require_once 'connect.php';

// Check if job id is set in the URL
if(isset($_GET['id'])) {
    $job_id = $_GET['id'];
    
    // Fetch job details from the database
    $sql = "SELECT * FROM Jobs WHERE id = $job_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result) == 1) {
        // Display edit job form with pre-filled data
?>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Job</title>
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
    
    <form action="update_job.php" method="POST">
    <h1>Edit Job</h1>
        <input type="hidden" name="job_id" value="<?php echo $row['id']; ?>">
        <label for="title">Job Title:</label><br>
        <input type="text" id="title" name="title" value="<?php echo $row['title']; ?>" required><br>
        <label for="job_limit">Job Limit:</label><br>
        <input type="text" id="job_limit" name="job_limit" value="<?php echo $row['job_limit']; ?>" required><br>

        <label for="description">Job Description:</label><br>
        <textarea id="description" name="description" rows="4" cols="50" required><?php echo $row['description']; ?></textarea><br>

        <label for="requirements">Job Requirements:</label><br>
        <textarea id="requirements" name="requirements" rows="4" cols="50" required><?php echo $row['requirements']; ?></textarea><br>

        <label for="deadline">Application Deadline:</label><br>
        <input type="date" id="deadline" name="deadline" value="<?php echo $row['application_deadline']; ?>" required><br>

        <input type="submit" name="submit" value="Update">
    </form>
</body>
</html>

<?php
    } else {
        // Job not found
        echo "Job not found!";
    }
} else {
    // No job id provided
    echo "Invalid request!";
}
?>
