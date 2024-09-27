
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
    <style>
        /* Table styling */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black; /* Black borders */
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            color: black;
        }
        tr:hover {background-color: #f5f5f5;}
        /* Styling for action links */
        .action-links a {
            margin-right: 10px;
            text-decoration: none;
            color: #007bff; /* Default color for links */
        }
        .action-links a:hover {
            color: #0056b3;
        }
        /* Styling for the Add New User button */
        .add-button {
            background-color: #28a745; /* Green */
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
        /* Styling for the Delete button */
        .action-links a[href*='delete_user.php'] {
            color: #dc3545; /* Red */
        }
        .action-links a[href*='delete_user.php']:hover {
            color: #c82333; /* Darker red on hover */
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
                    <h2 class="fs-2 m-0"><h2>Approved Applicants</h2></h2>
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
            

            <div id="printableContent">        
<?php
// Include the database connection script
require_once 'connect.php';

// Query to fetch approved applicants' names, emails, and mobile numbers
$sql = "SELECT full_name, email, mobile_number FROM attachment_applications WHERE status = 'approved'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    
    echo "<table style='width: 100%; border-collapse: collapse; margin-top: 20px; border: 2px solid black;'>";
    echo "<tr style='background-color: #f2f2f2;'>";
    echo "<th style='border: 2px solid black; padding: 8px; text-align: left;'>Applicant</th>";
    echo "<th style='border: 2px solid black; padding: 8px; text-align: left;'>Email</th>";
    echo "<th style='border: 2px solid black; padding: 8px; text-align: left;'>Mobile Number</th>";
    echo "</tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr style='border: 2px solid black;'>";
        echo "<td style='border: 2px solid black; padding: 8px; text-align: left;'>" . $row["full_name"] . "</td>";
        echo "<td style='border: 2px solid black; padding: 8px; text-align: left;'>" . $row["email"] . "</td>";
        echo "<td style='border: 2px solid black; padding: 8px; text-align: left;'>" . $row["mobile_number"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>No approved applicants found.</p>";
}

// Close the database connection
mysqli_close($conn);
?>
 </div>
 <br>

<!-- Print Button -->
<button onclick="printForm()">Print</button>

           
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
        function printForm() {
            // Get the printable content
            var printableContent = document.getElementById('printableContent').innerHTML;
            
            // Create a new window or tab
            var printWindow = window.open('', '_blank');
            
            // Write the content to the new window or tab
            printWindow.document.write('<html><head><title>Print</title></head><body>');
            printWindow.document.write(printableContent);
            printWindow.document.write('</body></html>');
            
            // Print the new window or tab
            printWindow.document.close();
            printWindow.print();
        }
    </script>
</body>

</html>

