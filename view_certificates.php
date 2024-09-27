<?php
// Include the database connection script
require_once 'connect.php';

// Check if a certificate ID is provided in the URL
if(isset($_GET['certificate_id'])) {
    // Sanitize the input to prevent SQL injection
    $certificate_id = mysqli_real_escape_string($conn, $_GET['certificate_id']);
    
    // Query to fetch the certificate URLs from the database based on the applicant ID
    $sql = "SELECT certificates FROM Applications WHERE id = $certificate_id";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1) {
        // Fetch the certificate URLs
        $row = mysqli_fetch_assoc($result);
        $certificateUrls = explode(',', $row['certificates']);

        // Output the certificates
        echo "<h1>Certificates</h1>";
        foreach ($certificateUrls as $url) {
            $file_extension = pathinfo($url, PATHINFO_EXTENSION);
            if (in_array(strtolower($file_extension), ['pdf', 'doc', 'docx', 'ppt', 'pptx'])) {
                echo "<iframe src='$url' style='width: 100%; height: 600px;'></iframe>";
            } else {
                echo "Unsupported file format.";
            }
        }
    } else {
        echo "Certificates not found for this applicant.";
    }
} else {
    echo "Applicant ID not provided.";
}

// Close the database connection
mysqli_close($conn);
?>
