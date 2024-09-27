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

// Initialize variables to avoid undefined variable warnings
$full_name = $education_qualifications = $email = $status = "No data found";

// Fetch user attachment data from the database
$sql = "SELECT full_name, education_qualifications, email, status FROM attachment_applications WHERE full_name = ?";
$stmt = $conn->prepare($sql);
if ($stmt === false) {
    die('Error preparing statement: ' . $conn->error);
}
$stmt->bind_param("s", $fullname); // Correctly bind the full name as a string
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user_data = $result->fetch_assoc();
    $full_name = $user_data['full_name'];
    $education_qualifications = $user_data['education_qualifications'];
    $email = $user_data['email'];
    $status = $user_data['status'];
}

// Close database connection
$stmt->close();
$conn->close();

?>

<div class="card" style="max-width: 400px; margin: auto; border: 1px solid #ccc; border-radius: 10px; padding: 20px; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); transition: 0.3s;">
    <div class="card-body">
        <h5 class="card-title" style="font-size: 24px; font-weight: bold; margin-bottom: 10px; text-align: center;"><?php echo $full_name; ?></h5>
        <p class="card-text" style="font-size: 18px; margin-bottom: 10px; text-align: center;">Education : <?php echo $education_qualifications; ?></p>
        <p class="card-text" style="font-size: 18px; margin-bottom: 10px; text-align: center;">Email: <?php echo $email; ?></p>
        <p class="card-text" style="font-size: 18px; margin-bottom: 10px; text-align: center;">Application Status: <?php echo ucfirst($status); ?></p>
    </div>
</div>
