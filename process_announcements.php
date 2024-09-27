<?php
// Database connection
$servername = "localhost";
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "career"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$announcement_content = $_POST['announcement_content'];

// If you want to allow file uploads
$file = $_FILES['file']['name'];

// Move uploaded file to desired location (optional)
$target_dir = "uploads/"; // Specify the directory where you want to store the uploaded files
$target_file = $target_dir . basename($_FILES["file"]["name"]);
move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

// Prepare SQL statement
$sql = "INSERT INTO announcements (announcement_content, file) VALUES ('$announcement_content', '$file')";

// Execute SQL statement
if ($conn->query($sql) === TRUE) {
    echo "Announcement created successfully";
    header("Location: admin_announcements.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
