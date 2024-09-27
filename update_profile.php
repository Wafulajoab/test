<?php
session_start();
require_once 'connect.php'; // Include your database connection file
// Assuming you have a database connection established as $conn
// and the user's ID is stored in a session or passed through the form

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare an update statement
    $stmt = $conn->prepare("UPDATE users SET fullname = ?, id_no = ?, gender = ?, dob = ?, county = ?, nationality = ? WHERE id = ?");

    // Bind parameters
    $stmt->bind_param("ssssssi", $_POST['fullname'], $_POST['id_no'], $_POST['gender'], $_POST['dob'], $_POST['county'], $_POST['nationality'], $_SESSION['user_id']);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Profile updated successfully.";
        // Redirect or refresh the page to show updated information
        header("Location: profile.php");
        exit;
    } else {
        echo "Error updating profile: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}
?>

