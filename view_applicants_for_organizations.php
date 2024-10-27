<?php
// Start session
session_start();
// Retrieve organization name from session (adjust as per your logic)
$org_name = isset($_SESSION['org_name']) ? $_SESSION['org_name'] : '';

// Include the database connection script
require_once 'connect.php';

// Fetch applicants data from the database
$sql = "SELECT * FROM attachment_applications";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <title>View Applicants for Organizations</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #eef2f3;
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
            margin-left: 270px; /* Adjusted to account for sidebar width */
            padding: 40px 20px;
            transition: margin-left 0.3s; /* Smooth transition */
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border: 2px solid #343a40; /* Border around the table */
        }

        th, td {
            padding: 15px;
            text-align: left;
            border: 1px solid #343a40; /* Border around cells */
        }

        th {
            background-color: #f8f9fa;
        }

        .file-links {
            display: flex;
            flex-direction: column; /* Vertical layout for links */
            gap: 5px; /* Space between links */
        }

        .file-links a {
            color: #007bff;
            text-decoration: none;
            border: 1px solid #343a40; /* Border around each file link */
            padding: 8px; /* Add padding to separate the links */
            border-radius: 3px; /* Rounded corners for links */
            transition: background-color 0.3s, color 0.3s;
            display: inline-block; /* Inline block for better spacing */
        }

        .file-links a:hover {
            text-decoration: underline;
            background-color: #e9ecef; /* Light grey background on hover */
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
            transition: background-color 0.3s;
        }

        .logout a:hover {
            background-color: #b30000;
        }

        /* Menu icon style */
        .menu-icon {
            font-size: 30px;
            color: #007BFF;
            cursor: pointer;
            position: fixed; /* Keep it fixed */
            left: 20px; /* Default position */
            top: 20px; /* Adjust as needed */
            z-index: 1000;
            transition: left 0.3s; /* Smooth transition */
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .main-content {
                margin-left: 0; /* Remove space for the sidebar */
                padding: 20px;
            }

            .sidebar {
                position: absolute;
                height: auto;
                left: -250px; /* Hide sidebar initially */
            }

            .sidebar.active {
                left: 0; /* Show sidebar when active */
            }

            .menu-icon {
                display: block;
            }
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
    <h2>Applicants for Your Organization</h2>
    <?php
    if (mysqli_num_rows($result) > 0) {
        // Display table header
        echo "<table>";
        echo "<tr>";
        echo "<th>Applicant</th>";
        echo "<th>Date of Birth</th>";
        echo "<th>Identity Card Number</th>";
        echo "<th>Gender</th>";
        echo "<th>Email</th>";
        echo "<th>Mobile Number</th>";
        echo "<th>County</th>";
        echo "<th>Education Qualifications</th>";
        echo "<th>Files</th>";
        echo "</tr>";

        // Output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            // Display table rows
            echo "<tr>";
            echo "<td>" . $row["full_name"] . "</td>";
            echo "<td>" . $row["date_of_birth"] . "</td>";
            echo "<td>" . $row["id_number"] . "</td>";
            echo "<td>" . $row["gender"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["mobile_number"] . "</td>";
            echo "<td>" . $row["county"] . "</td>";
            echo "<td>" . $row["education_qualifications"] . "</td>";
            echo "<td class='file-links'>";
            echo "<a href='" . $row["application_letter"] . "' target='_blank'>Application Letter</a>";
            echo "<a href='" . $row["introduction_letter"] . "' target='_blank'>Introduction Letter</a>";
            echo "<a href='" . $row["resume"] . "' target='_blank'>Resume</a>";
            echo "<a href='" . $row["insurance_cover"] . "' target='_blank'>Insurance Cover</a>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<div class='alert alert-warning' role='alert'>No applicants found</div>";
    }

    // Close database connection
    mysqli_close($conn);
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('mainContent');
        const menuIcon = document.getElementById('menuIcon');

        sidebar.classList.toggle('active');
        mainContent.style.marginLeft = sidebar.classList.contains('active') ? '270px' : '0';
        menuIcon.style.left = sidebar.classList.contains('active') ? '250px' : '20px'; // Adjust menu icon position
    }
</script>

</body>
</html>
