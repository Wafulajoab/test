
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

    
    <script src="https://smtpjs.com/v3/smtp.js"></script>
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
                <a href="admin_settings.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fa fa-cog"></i>Settings</a> <!-- Add admin settings link -->
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
                    <h2 class="fs-2 m-0"><h2>Messages</h2></h2>
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
// Include your database connection script
require_once 'connect.php';

// Fetch all users from the database
$sql = "SELECT id, name, email, message, reply FROM contact_form";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>User ID</th><th>Full Name</th><th>Email</th><th>Messages</th><th>Reply</th><th>Actions</th></tr>";
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['message'] . "</td>";
        echo "<td>" . $row['reply'] . "</td>";
        // Add action links for edit and delete
        echo "<td class='action-links'>";
        echo "<button onclick='replyMessage(" . $row['id'] . ")'>Reply</button>";
        echo "<div id='replyArea-" . $row['id'] . "' style='display: none;'>";
        echo "<textarea id='replyText-" . $row['id'] . "'></textarea>";
        echo "<button onclick='submitReply(" . $row['id'] . ")'>Submit</button>";
        echo "</div>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<h2>no messages found.</h2>";
}

$conn->close();
?>

            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
        <script>
    function replyMessage(id) {
        var replyArea = document.getElementById('replyArea-' + id);
        replyArea.style.display = 'block';
    }

    function submitReply(id) {
    var replyText = document.getElementById('replyText-' + id).value;
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'submit_reply.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Success
            alert('Reply submitted successfully!');
                // Reload the page
                window.location.reload();
            } else {
                // Error
                alert('Error occurred while submitting reply.');
            }
        }
    };
    xhr.send('id=' + id + '&reply=' + encodeURIComponent(replyText));
}

</script>

</body>

</html>

