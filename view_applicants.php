<?php
// Start session
session_start();
// Retrieve admin's name from session
$admin_name = isset($_SESSION['admin_name']) ? $_SESSION['admin_name'] : '';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="adminpannel.css" /> <!-- Create admin.css for admin panel styling -->
    <title>View Applicants</title>
    <style>
        /* Your CSS styles */
      

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border: 2px solid black; /* border around the table */
        }

        th, td {
            padding: 8px;
            text-align: left;
            border: 2px solid black; /* border around cells */
        }

        th {
            background-color: #f2f2f2;
        }

        .file-links a {
            margin-right: 10px;
            text-decoration: none;
            color: #007bff;
            border: 1px solid black; /* border around each file link */
            padding: 5px; /* add padding to separate the links */
        }

        .file-links a:hover {
            text-decoration: underline;
        }

        /* Flex display for action buttons */
        .action-buttons {
            display: flex;
            gap: 10px;
        }

        /* Green button style for approve */
        .approve-button {
            background-color: green;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Red button style for reject */
        .reject-button {
            background-color: red;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
                <i class=></i>Admin Panel</div> <!-- Update sidebar heading -->
            <div class="list-group list-group-flush my-3">
                <a href="adminpannel.php" class="list-group-item list-group-item-action bg-transparent second-text active">
                    <i class="fa fa-home"></i>Dashboard</a> <!-- Add admin dashboard link -->
                <br>
                <a href="fetch_user.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fa fa-users"></i>Manage Users</a> <!-- Add link to manage users -->
                <br>
                <a href="manage_jobs.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fa fa-briefcase"></i>Manage Jobs</a> <!-- Add link to manage jobs -->
                <br>
                <a href="manage_attachments.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fa fa-paperclip"></i>Manage Attachments</a> <!-- Add link to manage attachments -->
                <br>
                <a href="admin_manage_interviews.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fa fa-envelope-open"></i>Manage Interviews</a> <!-- Add link to manage interviews -->
                <br>
                <a href="admin_manage_messages.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fa fa-comment"></i>Manage Messages</a> <!-- Add link to manage messages -->
                <br>
                <a href="admin_feedback.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fa fa-comment"></i>manage feedback</a> <!-- Add link to manage messages -->
                <br>
                <a href="admin_logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold">
                    <i class="fa fa-sign-out"></i>Logout</a> <!-- Add admin logout link -->
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">View Applicants</h2>
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
                                <?php echo $admin_name; ?>
                </a> <!-- Change to admin name -->
                            
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="#">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
    <h2></h2>
    <?php
// Include the database connection script
require_once 'connect.php';

// Fetch applicants data from the database
$sql = "SELECT * FROM attachment_applications";
$result = mysqli_query($conn, $sql);

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
    echo "<th>Action</th>";
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
        echo "<td class='action-buttons'>";

        // Display different buttons based on status
        if ($row["status"] === "pending") {
            echo "<form method='post' action='approve_attachment.php'>
                    <input type='hidden' name='applicant_id' value='" . $row["id"] . "'>
                    <button class='approve-button' type='submit' name='approve'>Approve</button>
                  </form>";
            echo "<form method='post' action='reject_attachment.php'>
                    <input type='hidden' name='applicant_id' value='" . $row["id"] . "'>
                    <button class='reject-button' type='submit' name='reject'>Reject</button>
                  </form>";
        } else {
            echo $row["status"]; // Display status if not pending
        }

        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No applicants found";
}

// Close database connection
mysqli_close($conn);
?>


           

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


