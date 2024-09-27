<?php
require_once 'connect.php';

// Validate and sanitize input data
$title = isset($_POST['title']) ? $_POST['title'] : '';
$content = isset($_POST['content']) ? $_POST['content'] : '';

// Check if title and content are not empty
if (!empty($title) && !empty($content)) {
    // Prepare and execute SQL query to insert data into database
    $stmt = $conn->prepare("INSERT INTO normal_announcements (title, content) VALUES (?, ?)");
    $stmt->bind_param('ss', $title, $content);

    if ($stmt->execute()) {
        // Data inserted successfully
        echo "Announcement inserted successfully";
        // Redirect to the same page
        header("Location: n_announcement.php");
        exit(); // Ensure script execution stops after redirection
    } else {
        // Error inserting data
        echo "Error: Unable to insert announcement";
    }
} else {
    // Handle empty form fields
    echo "Error: Title and content cannot be empty";
    // Redirect to the form if accessed directly
    header("Location: normal_announcements.php");
    exit();
}
?>
