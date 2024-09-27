<?php
// Include the database connection script
require_once 'connect.php';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the applicant_id is set and not empty
    if (isset($_POST['applicant_id']) && !empty($_POST['applicant_id'])) {
        // Retrieve the applicant_id from the form submission
        $applicant_id = $_POST['applicant_id'];

        // Update the status of the application to 'approved' in the database
        $sql = "UPDATE Applications SET status = 'approved' WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $applicant_id);

        if ($stmt->execute()) {
            // Application approved successfully
            // Redirect to fetch_application.php
            header("Location: fetch_application.php");
            exit; // Ensure no further code execution after redirection
        } else {
            // Error occurred while approving the application
            echo "Error: " . $conn->error;
        }

        // Close statement
        $stmt->close();
    } else {
        // Error: applicant_id not set or empty
        echo "Error: applicant_id not set or empty.";
    }
}

// Close the database connection
$conn->close();
?>


