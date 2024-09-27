<?php
// Include the database connection script
require_once 'connect.php';

// Check if the form has been submitted and the 'reject' button is clicked
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reject'])) {
    // Check if the applicant_id is set and not empty
    if (isset($_POST['applicant_id']) && !empty($_POST['applicant_id'])) {
        // Retrieve the applicant_id from the form submission
        $applicant_id = $_POST['applicant_id'];

        // Update the status of the application to 'rejected' in the database
        $sql = "UPDATE attachment_applications SET status = 'rejected' WHERE id = ?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            // Error occurred while preparing the statement
            echo "Error: " . $conn->error;
        } else {
            // Bind parameters and execute the statement
            $stmt->bind_param("i", $applicant_id);
            if ($stmt->execute()) {
                // Application rejected successfully
                echo "Application rejected successfully.";
                // Redirect to the view_applicants.php
                header("Location: view_applicants.php");
                exit;
            } else {
                // Error occurred while executing the statement
                echo "Error: " . $conn->error;
            }
            // Close statement
            $stmt->close();
        }
    } else {
        // Error: applicant_id not set or empty
        echo "Error: applicant_id not set or empty.";
    }
}
?>
