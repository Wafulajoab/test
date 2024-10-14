<?php
session_start();

// Database connection (replace with your actual connection details)
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
  $email = $conn->real_escape_string($_POST['email']);
  $password = $conn->real_escape_string($_POST['password']);

  // Query to check if the organization exists
  $sql = "SELECT * FROM organizations WHERE email = '$email'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // Fetch the organization's data
    $row = $result->fetch_assoc();
    $hashed_password = $row['password'];

    // Verify the password
    if (password_verify($password, $hashed_password)) {
      // Store session information for the logged-in organization
      $_SESSION['org_id'] = $row['id'];
      $_SESSION['org_name'] = $row['org_name'];

      // Redirect to the organization dashboard or home page
      header("Location: organisation_dashboard.php");
      exit();
    } else {
      echo "Invalid password!";
    }
  } else {
    echo "No organization found with that email!";
  }
}

$conn->close();
?>
