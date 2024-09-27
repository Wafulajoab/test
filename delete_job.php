<?php
// Database connection
require_once 'connect.php';

// Check if job id is set in the URL
if(isset($_GET['id'])) {
    $job_id = $_GET['id'];
    
    // Delete job from the database
    $sql = "DELETE FROM Jobs WHERE id = $job_id";
    if(mysqli_query($conn, $sql)) {
        echo "Job deleted successfully!";
        header("Location: manage_jobs.php"); // Redirect back to admin panel
        exit();
    } else {
        echo "Error deleting job: " . mysqli_error($conn);
    }
} else {
    // No job id provided
    echo "Invalid request!";
}
?>
