<?php
session_start();

// Check if the organisation is logged in
if (!isset($_SESSION['org_id'])) {
  header("Location: login_organisation.php");
  exit();
}

$org_name = $_SESSION['org_name'];
$org_id = $_SESSION['org_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Post a New Job</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }

    .container {
      max-width: 800px;
      margin: 50px auto;
      padding: 20px;
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
      color: #333;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    label {
      font-size: 16px;
      margin-bottom: 5px;
    }

    input, textarea, select {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
      width: 100%;
    }

    button {
      padding: 12px;
      font-size: 16px;
      color: white;
      background-color: #007BFF;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Post a New Job</h1>
    <form action="post_job_process.php" method="POST">
      <label for="job_title">Job Title:</label>
      <input type="text" id="job_title" name="job_title" required>

      <label for="job_description">Job Description:</label>
      <textarea id="job_description" name="job_description" rows="5" required></textarea>

      <label for="job_requirements">Job Requirements:</label>
      <textarea id="job_requirements" name="job_requirements" rows="5" required></textarea>

      <label for="job_location">Location:</label>
      <input type="text" id="job_location" name="job_location" required>

      <label for="salary">Salary (Optional):</label>
      <input type="number" id="salary" name="salary">

      <label for="job_type">Job Type:</label>
      <select id="job_type" name="job_type" required>
        <option value="full-time">Full-Time</option>
        <option value="part-time">Part-Time</option>
        <option value="internship">Internship</option>
      </select>

      <button type="submit">Post Job</button>
           <!-- Go Back Button -->
           <button class="go-back" onclick="window.location.href='organisation_dashboard.php';">Go Back</button>
    </form>
  </div>
</body>
</html>
