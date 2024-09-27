<?php
// Start the session to access session variables
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // If not logged in, redirect to the login page
    header("Location: login.php");
    exit;
}

// Include your database connection script
require_once 'connect.php';

// Retrieve the logged-in user's fullname from the session
$fullname = $_SESSION['fullname']; // Retrieve from session

// Prepare and execute SQL statement to fetch user details based on fullname
$sql = "SELECT * FROM users WHERE fullname = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $fullname); // Bind $fullname directly
$stmt->execute();
$result = $stmt->get_result();

// Check if the user exists
if ($result->num_rows == 1) {
    // Fetch user details
    $user = $result->fetch_assoc();
    ?>
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="dashboard.css" />
    <title>User Profile</title>
    <style>
        .container {
                display: flex;
                justify-content: space-between;
                max-width: 800px;
                margin: auto;
            }
            .info-column {
                width: 48%;
                background-color: #fff;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                padding: 20px;
                text-align: center;
            }
            .info-column p {
                margin: 10px 0;
            }
            .info-column strong {
                margin-right: 10px;
            }
            .update-btn {
                background-color: #4CAF50;
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin-top: 10px;
                cursor: pointer;
            }
            .update-btn:hover {
                background-color: #45a049;
            }
        </style>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
                    class=></i>CareerHub</div>
            <div class="list-group list-group-flush my-3">
                <a href="dashboard.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fa fa-home"></i>Dashboard</a>
                        <br>
                <a href="fetch_jobs.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fa fa-briefcase"></i>Career Jobs</a>
                        <br>
                <a href="fetch_attachments.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fa fa-paperclip"></i>Attachments</a>
                        <br>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fa fa-envelope-open"></i>Interviews</a>
                        <br>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fa fa-comment"></i>Messages</a>
                        <br>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fa fa-cog"></i>Settings</a>
                        <br>
                <a href="#" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fa fa-sign-out"></i>Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
    <div class="d-flex align-items-center">
        <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
        <h2 class="fs-2 m-0">Dashboard</h2>
    </div>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                   role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user me-2"></i>
                    <?php 
                    echo $_SESSION['fullname']; ?>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>
<?php
} else {
    // User not found in the database
    echo "<p>User details not found.</p>";
}

// Close statement
$stmt->close();

// Close connection
$conn->close();
?>
