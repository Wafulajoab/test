<?php
session_start();

// Check if the organization is logged in
if (!isset($_SESSION['org_id'])) {
  header("Location: login_organisation.php");
  exit();
}

$org_name = $_SESSION['org_name'];
$org_id = $_SESSION['org_id'];

// Database connection
require_once 'connect.php';

// Fetch jobs posted by the logged-in organization
$sql = "SELECT job_title, job_description, job_requirements, job_location, salary, job_type, created_at FROM Jobs WHERE org_id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $org_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Close statement and connection after fetching data
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Posted Jobs</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }

    .container {
      max-width: 900px;
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

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #007BFF;
      color: white;
    }

    tr:hover {
      background-color: #f1f1f1;
    }

    .go-back {
      display: inline-block;
      margin-top: 20px;
      padding: 10px 20px;
      color: white;
      background-color: #007BFF;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      text-decoration: none;
      text-align: center;
    }

    .go-back:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1><?php echo htmlspecialchars($org_name); ?> - Posted Jobs</h1>
    <?php if (mysqli_num_rows($result) > 0): ?>
      <table>
        <tr>
          <th>Job Title</th>
          <th>Description</th>
          <th>Requirements</th>
          <th>Location</th>
          <th>Salary</th>
          <th>Type</th>
          <th>Posted Date</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
          <tr>
            <td><?php echo htmlspecialchars($row['job_title']); ?></td>
            <td><?php echo htmlspecialchars($row['job_description']); ?></td>
            <td><?php echo htmlspecialchars($row['job_requirements']); ?></td>
            <td><?php echo htmlspecialchars($row['job_location']); ?></td>
            <td><?php echo $row['salary'] ? htmlspecialchars($row['salary']) : 'N/A'; ?></td>
            <td><?php echo htmlspecialchars($row['job_type']); ?></td>
            <td><?php echo htmlspecialchars(date("d-m-Y", strtotime($row['created_at']))); ?></td>
          </tr>
        <?php endwhile; ?>
      </table>
    <?php else: ?>
      <p>No jobs posted yet.</p>
    <?php endif; ?>

    <a href="organisation_dashboard.php" class="go-back">Go Back</a>
  </div>
</body>
</html>
