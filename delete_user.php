<?php
// Include your database connection script
require_once 'connect.php';

// Check if the user ID is set
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Prepare the SQL statement to delete the user
    $sql = "DELETE FROM users WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);

    if ($stmt->execute()) {
        echo "<h2>User deleted successfully.</h2>";
        // Redirect back to the user list or display a success message
        header("Location: fetch_user.php");
        exit;
    } else {
        echo "<h2>Error deleting user.</h2>";
    }
} else {
    echo "<h2>No user ID provided.</h2>";
}
?>
