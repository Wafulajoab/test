<?php
session_start();

// Check if the organisation is logged in
if (!isset($_SESSION['org_id'])) {
  header("Location: login_organisation.php");
  exit();
}

// Database connection (replace with your actual database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "career";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get job details from the form
  $job_title = $conn->real_escape_string($_POST['job_title']);
  $job_description = $conn->real_escape_string($_POST['job_description']);
  $job_requirements = $conn->real_escape_string($_POST['job_requirements']);
  $job_location = $conn->real_escape_string($_POST['job_location']);
  $salary = isset($_POST['salary']) ? $conn->real_escape_string($_POST['salary']) : NULL;
  $job_type = $conn->real_escape_string($_POST['job_type']);
  
  // Get the organization ID from the session
  $org_id = $_SESSION['org_id'];

  // Insert the job into the database
  $sql = "INSERT INTO jobs (org_id, job_title, job_description, job_requirements, job_location, salary, job_type, created_at)
          VALUES ('$org_id', '$job_title', '$job_description', '$job_requirements', '$job_location', '$salary', '$job_type', NOW())";

  if ($conn->query($sql) === TRUE) {
    echo "New job posted successfully!";
    // Redirect to the organization's dashboard or job list
    header("Location: organisation_dashboard.php");
    exit();
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>
