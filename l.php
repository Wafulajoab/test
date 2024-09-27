<?php
// Start session
session_start();

require_once 'connect.php';

$error_message = '';

if(isset($_POST['submit'])){
    $fullname = $_POST['fullname'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admins WHERE fullname=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $fullname);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows == 1){
        $row = $result->fetch_assoc();
        if(password_verify($password, $row['password'])){
            // Store admin data in session variables
            $_SESSION['admin_id'] = $row['id'];
            $_SESSION['admin_name'] = $row['fullname'];
            // Redirect to admin panel
            header("Location: adminpannel.php");
            exit;
        } else {
            $error_message = 'Incorrect fullname or password';
        }
    } else {
        $error_message = 'Incorrect fullname or password';
    }

    $stmt->close();
    $conn->close();
}
?>
