<?php
//if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish a database connection
    $servername = "localhost"; // Assuming your MySQL server is running locally
    $username = "root"; // Default username for XAMPP MySQL
    $password = ""; // Default password for XAMPP MySQL
    $dbname = "career"; // Name of your database

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
?>
