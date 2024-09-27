<?php
// Include the database connection file
require_once 'connect.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $feedback = filter_input(INPUT_POST, 'feedback', FILTER_SANITIZE_STRING);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    // Prepare an SQL statement
    $stmt = $conn->prepare("INSERT INTO feedback (name, email, feedback) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $feedback);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo "Thank you for your feedback!";
    } else {
        echo "Failed to send feedback. Please try again.";
    }

    // Close the statement
    $stmt->close();
} else {
    // Redirect to the form if accessed directly
    header('Location: feedback_form.php');
    exit;
}

// Close the database connection
$conn->close();
?>
