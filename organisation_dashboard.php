<?php
session_start();

// Check if the organization is logged in, if not, redirect to login page
if (!isset($_SESSION['org_id'])) {
    header("Location: login_organisation.php");
    exit();
}

// Get organization details from session
$org_name = $_SESSION['org_name'];
$org_id = $_SESSION['org_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organisation Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Font Awesome for icons -->
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            display: flex;
            transition: margin-left 0.3s;
            position: relative;
        }

        .sidebar {
            width: 250px;
            background-color: #007BFF;
            color: white;
            padding: 20px 10px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            transition: transform 0.3s ease-in-out;
            transform: translateX(-100%);
        }

        .sidebar.active {
            transform: translateX(0);
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
            border-radius: 5px;
            transition: background-color 0.3s ease, padding-left 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #0056b3;
            padding-left: 20px;
        }

        .main-content {
            flex-grow: 1;
            padding: 40px 20px;
            margin-left: 0; /* No initial margin, it will adjust on toggle */
            transition: margin-left 0.3s;
            position: relative;
        }

        .header {
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 28px;
            color: #333;
        }

        .welcome-message {
            font-size: 20px;
            color: #555;
            margin-bottom: 40px;
        }

        .section {
            margin-bottom: 30px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s;
            max-width: 40%; /* Set width to 40% */
            margin: 0 auto; /* Center the section */
        }

        .section:hover {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        .section h2 {
            font-size: 24px;
            color: #007BFF;
            margin-bottom: 15px;
        }

        .section p {
            font-size: 16px;
            color: #555;
            margin-bottom: 15px;
        }

        .buttons {
            display: flex;
            justify-content: flex-start;
            gap: 15px;
        }

        .buttons a {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .buttons a:hover {
            background-color: #0056b3;
        }

        .logout {
            text-align: center;
            margin-top: 40px;
        }

        .logout a {
            padding: 10px 20px;
            background-color: #FF0000;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .logout a:hover {
            background-color: #b30000;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: absolute;
            }

            .main-content {
                margin-left: 0; /* Remove space for the sidebar */
                padding: 20px;
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .section {
                max-width: 90%; /* Adjust section width for mobile */
            }
        }

        /* Menu icon style */
        .menu-icon {
            font-size: 30px;
            color: #007BFF;
            cursor: pointer;
            position: absolute;
            left: 20px;
            top: 20px;
            z-index: 1000;
            transition: transform 0.3s;
        }

        .menu-icon.active {
            transform: rotate(90deg); /* Rotate when active */
        }

        /* Logo style */
        .logo {
            display: block;
            margin: 0 auto 20px; /* Center the logo and add margin below */
            max-width: 40%; /* Adjust as needed */
        }
    </style>
</head>
<body>

<!-- Menu icon -->
<div class="menu-icon" id="menuIcon" onclick="toggleSidebar()">
    <i class="fas fa-bars"></i>
</div>

<div class="sidebar" id="sidebar">
    <img src="logo.png" alt="Logo" class="logo"> <!-- Logo here -->
    <h2>Dashboard</h2>
    <a href="organisation_dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
    <br>
    <a href="edit_organisation.php"><i class="fas fa-edit"></i> Edit Profile</a>
    <br>
    <a href="view_organisation_profile.php"><i class="fas fa-eye"></i> View Profile</a>
    <br>
    <a href="view_applicants_for_organizations.php"><i class="fas fa-users"></i> View Applicants</a>
    <br>
    <a href="create_attachment.php"><i class="fas fa-paperclip"></i> Post New Attachment</a>
    <br>
    <a href="view_posted_jobs.php"><i class="fas fa-briefcase"></i> View Posted Jobs</a>
    <br>
    <a href="create_job.php"><i class="fas fa-plus-circle"></i> Post New Job</a>
    <br><br><br><br><br><br>
    <div class="logout">
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
</div>


<div class="main-content" id="mainContent">
    <div class="header">
        <h1>Welcome to Your Dashboard, <?php echo $org_name; ?></h1>
    </div>

    <div class="welcome-message">
        <p>Hello, <strong><?php echo $org_name; ?></strong>! Manage your organization, view applicants, and more from your dashboard.</p>
    </div>

    <!-- Section for managing organisation data -->
    <div class="section">
        <h2>Manage Organization</h2>
        <p>Update your organization’s profile or view the details of your current setup.</p>
        <div class="buttons">
            <a href="edit_organisation.php">Edit Profile</a>
            <a href="view_organisation_profile.php">View Profile</a>
        </div>
    </div>
    <br>

    <!-- Section for viewing applicants -->
    <div class="section">
        <h2>View Applicants</h2>
        <p>Check the list of applicants for your organization’s job postings.</p>
        <div class="buttons">
            <a href="view_applicants.php">View Applicants</a>
            <a href="create_attachment.php">Post New Attachment</a>
        </div>
    </div>
    <br>

    <!-- Section for viewing posted jobs -->
    <div class="section">
        <h2>View Posted Jobs</h2>
        <p>Review and manage the jobs your organization has posted so far.</p>
        <div class="buttons">
            <a href="view_posted_jobs.php">View Posted Jobs</a>
            <a href="create_job.php">Post New Job</a>
        </div>
    </div>
</div>

<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('mainContent');
        const menuIcon = document.getElementById('menuIcon');
        
        sidebar.classList.toggle('active');
        menuIcon.classList.toggle('active');
        
        // Adjust main content margin
        if (sidebar.classList.contains('active')) {
            mainContent.style.marginLeft = '250px'; // Sidebar open
            menuIcon.style.left = '270px'; // Move icon to the right
        } else {
            mainContent.style.marginLeft = '0'; // Sidebar closed
            menuIcon.style.left = '20px'; // Reset icon position
        }
    }
</script>
</body>
</html>
