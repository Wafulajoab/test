<?php
// Include the database connection script
require_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize form input data
    $attachment_id = $_POST['attachment_id'];
    $title = htmlspecialchars($_POST['title']);
    $organization = htmlspecialchars($_POST['organization']);
    $description = htmlspecialchars($_POST['description']);
    $duration = htmlspecialchars($_POST['duration']);
    $deadline = $_POST['deadline']; // No need for htmlspecialchars for date type
    $attachment_limit = $_POST['attachment_limit']; // Retrieve the attachment limit

    // Prepare SQL statement to update data in the database
    $sql = "UPDATE attachments SET title=?, organization=?, description=?, duration=?, application_deadline=?, attachment_limit=? WHERE id=?";
    $stmt = mysqli_prepare($conn, $sql);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "ssssisi", $title, $organization, $description, $duration, $deadline, $attachment_limit, $attachment_id);

    // Execute SQL statement
    if (mysqli_stmt_execute($stmt)) {
        echo "Attachment updated successfully!";
        header("Location: manage_attachments.php"); // Redirect back to admin panel
        exit();
    } else {
        echo "Error updating attachment: " . mysqli_error($conn);
    }

    // Close statement
    mysqli_stmt_close($stmt);
}
?>
