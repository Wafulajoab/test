<?php
// Start the session to access session variables
session_start();

// Include the database connection script
require_once 'connect.php';

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // If not logged in, redirect to the login page
    header("Location: login.php");
    exit;
}

// Retrieve the logged-in user's full name from the session
$fullname = $_SESSION['fullname']; // Assuming 'fullname' is stored in the session

// Fetch user job application data from the database
$sql = "SELECT user_name, email, applied_position, status FROM applications WHERE user_name = ?";
$stmt = $conn->prepare($sql);
if ($stmt === false) {
    die('Error preparing statement: ' . $conn->error);
}
$stmt->bind_param("s", $fullname);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $user_name = $row['user_name'];
        $email = $row['email'];
        $applied_position = $row['applied_position'];
        $status = $row['status'];

        // Display the job application data in a styled card
        echo "<div class='card' style='width: 300px; border: 1px solid #ccc; border-radius: 10px; padding: 20px; margin: 10px auto; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); transition: 0.3s;'>";
        echo "<h5 class='card-title' style='font-size: 20px; font-weight: bold; margin-bottom: 10px; text-align: center;'>$user_name</h5>";
        echo "<p class='card-text' style='font-size: 16px; margin-bottom: 10px; text-align: center;'>Position: $applied_position</p>";
        echo "<p class='card-text' style='font-size: 16px; margin-bottom: 10px; text-align: center;'>Email: $email</p>";
        
        // Display the current status
        echo "<p class='card-text' style='font-size: 16px; margin-bottom: 10px; text-align: center;'>Status: $status</p>";
        
        echo "</div>";
    }
} else {
    echo "<p>No job applications found.</p>";
}

// Close database connection
$stmt->close();
$conn->close();
?>
