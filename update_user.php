<?php
// Include your database connection script
require_once 'connect.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Consider hashing the password before storing
    $phone = $_POST['phone'];
    $id_no = $_POST['id_no'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $county = $_POST['county'];
    $nationality = $_POST['nationality'];

    // Update the user's information in the database
    $sql = "UPDATE users SET fullname = ?, email = ?, password = ?, phone = ?, id_no = ?, gender = ?, dob = ?, county = ?, nationality = ? WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssi", $fullname, $email, $password, $phone, $id_no, $gender, $dob, $county, $nationality, $user_id);

    if ($stmt->execute()) {
        echo "<h2>User updated successfully.</h2>";
        // Redirect back to the user list or display a success message
        header("Location: fetch_user.php");
        exit;
    } else {
        echo "<h2>Error updating user.</h2>";
    }
}
?>
