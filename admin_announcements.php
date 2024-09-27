<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Announcements</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .navbar {
            background-color: purple;
            padding: 30px 0;
            text-align: center;
            position: fixed;
            /* Set the navbar to be fixed */
            width: 100%;
            /* Ensure the navbar spans the entire width of the viewport */
            top: 0;
            /* Position it at the top */
            left: 0;
            /* Ensure it's aligned to the left */
            z-index: 1000;
            /* Ensure it's above other content */
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 10px;
            font-weight: bold;
            background-color: purple;
            border-radius: 25px;
            margin: 25px;
            border: 2px solid white;
        }

        .navbar a:active {
            background-color: smokewhite;
        }


        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
            margin-top: 20px;
        }
        .left-section {
            width: calc(50% - 20px); /* Adjust as needed */
            margin-right: 20px;
        }
        .right-section {
            width: calc(50% - 20px); /* Adjust as needed */
            margin-left: 20px;
        }
        .container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        form label,
        form input,
        form textarea {
            display: block;
            margin-bottom: 10px;
        }
        form input[type="submit"] {
            margin-top: 10px;
        }
        .announcement {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .announcement .edit-delete {
            text-align: right;
            margin-top: 10px;
        }
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background: lavender;
            text-align: center;
            padding: 0.1rem;
        }
        .footer p {
            justify-content: center;
        }
        .footer a {
            color: green;
            text-decoration: underline;
            font-weight: bold;
        }
        .button {
            background-color: #444;
            color: white;
            text-decoration: none;
            font-weight: bold;
            border: 2px solid green;
            padding: 8px 16px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s, border-color 0.3s;
            border-radius: 4px;
        }
        .button:hover {
            background-color: green;
            color: white;
        }
        .button:active {
            transform: translateY(1px);
        }
        .image {
            width: 6%; /* Set the width of the div to 15% */
            margin: 0 auto; /* Center the div horizontally */
            text-align: center; /* Center the image within the div */
        }
        .image img {
            width: 100%; /* Set the width of the image to 100% of the div's width */
            height: auto; /* Maintain the aspect ratio */
        }
        /* Hover effect for Go Back button */
        #go-back-btn:hover {
            background-color: navy;
            border-color: darkslateblue;
        }
        /* Hover effect for Logout button */
        .logout-btn:hover {
            background-color: darkred;
            border-color: firebrick;
        }
        .right-section {
            width: calc(50% - 20px);
            margin-left: 20px;
            height: 400px; /* Set a fixed height */
            overflow-y: auto; /* Enable vertical scrolling */
        }
        .right-section {
            position: relative;
            width: calc(50% - 20px);
            margin-left: 20px;
            height: 650px;
            overflow-y: auto;
        }
        .fixed-title {
            position: sticky;
            top: 0px; /* Adjust as needed based on your design */
            background-color: #f4f4f4; /* Set background color to match the container background */
            z-index: 1;
            padding: 10px;
            margin: 0;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="left-section">
            <h2>Create Announcement</h2>
            <form action="process_announcements.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                <label for="announcement_content">Announcement Content:</label>
                <textarea id="announcement_content" name="announcement_content" rows="4" cols="50" required></textarea>
                <input type="submit" value="Submit" class="button">
            </form>
        </div>

        <div class="right-section">
            <h2 class="fixed-title">Recent Announcements</h2>
            
            <?php
// PHP code to fetch and display all announcements
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "career"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all announcements from the database
$sql = "SELECT * FROM announcements ORDER BY announcement_date DESC"; // Removed the LIMIT clause
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<div class='announcement'>";
        echo "<div style='display: flex; align-items: center;'>"; // Flex container for image and username
        echo "<img src='kmu.jpeg' alt='Profile Icon' style='width: 45px; height: 45px; border-radius: 50%;'>";
        echo "<p style='margin-left: 10px;'><strong> Chief Security Officer (CSO)</strong></p>"; // Username CSO in bold
        echo "</div>";
        echo "<p>" . $row["announcement_content"] . "</p>";
        echo "<p> " . $row["announcement_date"] . "</p>"; // Display date and time
        echo "<div class='edit-delete'>";
        echo "<a href='#'>Edit</a> | <a href='#'>Delete</a>";
        echo "</div>";
        echo "</div>";
        
    }
} else {
    echo "No announcements available.";
}

$conn->close();
?>

        </div>
    </div>

    <div>
    <a href="javascript:history.go(-1);" id="go-back-link" style="background-color: blue; border-color: darkblue; margin: 10px; padding: 10px; border-radius: 25px; color: white; font-weight: bold; text-decoration: none; display: inline-block; cursor: pointer; transition: background-color 0.3s, border-color 0.3s;">Go Back</a>
    <a href="logout.php" class="button logout-btn" style="background-color: red; border-color: darkred; margin: 10px; padding: 10px; border-radius: 25px; color: white; font-weight: bold; cursor: pointer; transition: background-color 0.3s, border-color 0.3s;">Logout</a>

    </div>

    </div>
    <br><br><br><br><br>
    <footer class="footer">
        <p><span>Company.<strong>All Rights Reserved.</strong>Designed By <a href="jmtech.php">JMTech</a></span></p>
    </footer>
    <script>
        // JavaScript function to go back to the previous page
        function goBack(-1) {
            window.history.back();
        }

        // JavaScript function to logout and redirect to landingpage.php
        function logout() {
            window.location.href = "landingpage.php";
        }
    </script>
</body>
</html>
