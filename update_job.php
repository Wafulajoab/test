<?php
// Database connection
require_once 'connect.php';

if(isset($_POST['submit'])) {
    $job_id = $_POST['job_id'];
    $title = htmlspecialchars($_POST['title']);
    $job_limit = htmlspecialchars($_POST['job_limit']);
    $description = htmlspecialchars($_POST['description']);
    $requirements = htmlspecialchars($_POST['requirements']);
    $application_deadline = $_POST['deadline'];
    
    // SQL query to update job information
    $sql = "UPDATE Jobs SET title=?, job_limit=?, description=?, requirements=?, application_deadline=? WHERE id=?";
    $stmt = mysqli_prepare($conn, $sql);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "sisssi", $title, $job_limit, $description, $requirements, $application_deadline, $job_id);

    // Execute SQL statement
    if(mysqli_stmt_execute($stmt)) {
        // Job updated successfully
        header("Location: manage_jobs.php"); // Redirect back to admin panel
        exit();
    } else {
        // Error occurred while updating job
        echo "Error: " . mysqli_error($conn);
    }

    // Close statement
    mysqli_stmt_close($stmt);
} else {
    // No form submission
    echo "Invalid request!";
}
?>
