<?php
// Include the database connection script
require_once 'connect.php';

// Check if an applicant ID is provided in the URL
if(isset($_GET['applicant_id'])) {
    // Sanitize the input to prevent SQL injection
    $applicant_id = mysqli_real_escape_string($conn, $_GET['applicant_id']);
    
    // Query to fetch the resume URL from the database based on the applicant ID
    $sql = "SELECT resume FROM Applications WHERE id = $applicant_id";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1) {
        // Fetch the resume URL
        $row = mysqli_fetch_assoc($result);
        $resumeUrl = $row['resume'];

        // Output the resume
        echo "<h1>Resume</h1>";
        $file_extension = pathinfo($resumeUrl, PATHINFO_EXTENSION);
        if (in_array(strtolower($file_extension), ['pdf', 'doc', 'docx', 'ppt', 'pptx'])) {
            echo "<iframe src='$resumeUrl' style='width: 100%; height: 800px;'></iframe>";
        } else {
            echo "Unsupported file format.";
        }
    } else {
        echo "Resume not found for this applicant.";
    }
} else {
    echo "Applicant ID not provided.";
}

// Close the database connection
mysqli_close($conn);
?>
