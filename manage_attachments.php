
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
    <title>Admin Panel</title>
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
                <a href="manage_interviews.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
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
                    <h2 class="fs-2 m-0">Attachment Opportunities</h2>
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

            <?php
// Include the database connection script
require_once 'connect.php';

// Query to fetch attachment information
$sql = "SELECT * FROM attachments";
$result = mysqli_query($conn, $sql);



if (mysqli_num_rows($result) > 0) {
    echo "<table style='border-collapse: collapse; width: 100%;'>";
    echo "<tr><th style='background-color: #f2f2f2; border: 1px solid black; text-align: left; padding: 8px;'>Title</th><th style='background-color: #f2f2f2; border: 1px solid black; text-align: left; padding: 8px;'>Organization</th><th style='background-color: #f2f2f2; border: 1px solid black; text-align: left; padding: 8px;'>Description</th><th style='background-color: #f2f2f2; border: 1px solid black; text-align: left; padding: 8px;'>Duration</th><th style='background-color: #f2f2f2; border: 1px solid black; text-align: left; padding: 8px;'>Application Deadline</th><th style='background-color: #f2f2f2; border: 1px solid black; text-align: left; padding: 8px;'>Attachment Limit</th><th style='background-color: #f2f2f2; border: 1px solid black; text-align: left; padding: 8px;'>Action</th></tr>";
    
    // Fetch and display data row by row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td style='border: 1px solid black; text-align: left; padding: 8px;'>" . $row['title'] . "</td>";
        echo "<td style='border: 1px solid black; text-align: left; padding: 8px;'>" . $row['organization'] . "</td>";
        echo "<td style='border: 1px solid black; text-align: left; padding: 8px;'>" . $row['description'] . "</td>";
        echo "<td style='border: 1px solid black; text-align: left; padding: 8px;'>" . $row['duration'] . "</td>";
        echo "<td style='border: 1px solid black; text-align: left; padding: 8px;'>" . $row['application_deadline'] . "</td>";
        echo "<td style='border: 1px solid black; text-align: left; padding: 8px;'>" . $row['attachment_limit'] . "</td>"; // Display the attachment limit
        echo "<td style='border: 1px solid black; text-align: left; padding: 8px;'><a href='edit_attachment.php?id=" . $row['id'] . "' style='text-decoration: none; color: blue;'>Edit</a> | <a href='delete_attachment.php?id=" . $row['id'] . "' onclick=\"return confirm('Are you sure you want to delete this attachment?')\" style='text-decoration: none; color: red;'>Delete</a></td>"; // Edit and delete links
        echo "</tr>";
    }
    echo "</table>";
    echo "<br>"; // Add spacing
    echo "<button style='background-color: #4CAF50; color: white; padding: 12px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; margin-bottom: 20px;'><a href='attachments.php' style='text-decoration: none; color: white;'>Add New Attachment</a></button><br><br>"; // Button link to add new attachment form
} else {
    echo "No attachments found.";
}

// Close the database connection
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
