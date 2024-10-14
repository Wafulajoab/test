<?php
session_start();

// Check if the organisation is logged in
if (!isset($_SESSION['org_id'])) {
  header("Location: login_organisation.php");
  exit();
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "career_system";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get the organization ID from the session
$org_id = $_SESSION['org_id'];

// Query to fetch jobs posted by the organization
$sql = "SELECT * FROM jobs WHERE org_id = '$org_id'";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Posted Jobs</title>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      padding: 10px;
      border: 1px solid #ddd;
    }

    th {
      background-color: #007BFF;
      color: white;
    }
  </style>
</head>
<body>
  <h1>Posted Jobs</h1>

  <table>
    <tr>
      <th>Job Title</th>
      <th>Description</th>
      <th>Requirements</th>
      <th>Location</th>
      <th>Salary</th>
      <th>Type</th>
      <th>Posted On</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "<tr>
          <td>" . $row['job_title'] . "</td>
          <td>" . $row['job_description'] . "</td>
          <td>" . $row['job_requirements'] . "</td>
          <td>" . $row['job_location'] . "</td>
          <td>" . ($row['salary'] ? "$" . $row['salary'] : 'N/A') . "</td>
          <td>" . ucfirst($row['job_type']) . "</td>
          <td>" . $row['created_at'] . "</td>
        </tr>";
      }
    } else {
      echo "<tr><td colspan='7'>No jobs found</td></tr>";
    }
    ?>

  </table>

</body>
</html>

<?php
$conn->close();
?>
