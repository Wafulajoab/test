<?php
// Start session
session_start();
// Start output buffering
ob_start();
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
        /* Your existing CSS styles */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .file-links a {
            margin-right: 5px;
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
                    <h2 class="fs-2 m-0">Applicants List</h2>
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

            <h1></h1>
    <table>
        <tr>
            <th>User Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Applied Position</th>
            <th>Date Applied</th>
            <th>Files</th>
            <th>Action</th>
        </tr>
    
        <?php
        require 'vendor/autoload.php'; // Include Composer's autoloader for PHPMailer
        // Include the database connection script
        require_once 'connect.php';
       

// Include PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Function to send email notification based on application status
function sendEmailNotification($email, $status) {
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.elasticemail.com'; // SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'bensonwambuadavid@gmail.com'; // SMTP username
        $mail->Password = 'B46F1AA94A74C24308098C3819FC7189C5C8'; // SMTP password
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption
        $mail->Port = 2525; // TCP port to connect to

        //Recipients
        $mail->setFrom('bensonwambuadavid@gmail.com', 'Benson');
        $mail->addAddress($email); // Add a recipient

        // Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'Application Status Update';
        if ($status === "approved") {
            $mail->Body = "Your application has been approved. Please prepare for the upcoming interview.";
        } elseif ($status === "rejected") {
            $mail->Body = "Your application has been rejected. Unfortunately, you do not meet the organizational requirements.";
        } else {
            $mail->Body = "Your application status is pending review. We will notify you once it has been reviewed.";
        }
        $mail->send();
    } catch (Exception $e) {
        echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

        // Check if the form has been submitted and the 'approve' button is clicked
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['approve'])) {
    // Check if the applicant_id is set and not empty
    if (isset($_POST['applicant_id']) && !empty($_POST['applicant_id'])) {
        // Retrieve the applicant_id from the form submission
        $applicant_id = $_POST['applicant_id'];

        // Update the status of the application to 'approved' in the database
        $sql = "UPDATE Applications SET status = 'approved' WHERE id = ?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            // Error occurred while preparing the statement
            echo "Error: " . $conn->error;
        } else {
            // Bind parameters and execute the statement
            $stmt->bind_param("i", $applicant_id);
            if ($stmt->execute()) {
                // Retrieve the applicant's email address
                $sql = "SELECT email FROM Applications WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $applicant_id);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $email = $row['email'];
                    // Send email notification
                    sendEmailNotification($email, "approved");
                }

                // Redirect to fetch_application.php
                header("Location: fetch_application.php");
                exit;
            } else {
                // Error occurred while executing the statement
                echo "Error: " . $conn->error;
            }
            // Close statement
            $stmt->close();
        }
    } else {
        // Error: applicant_id not set or empty
        echo "Error: applicant_id not set or empty.";
    }
}

// Similar changes should be made for the 'reject' button handling


      // Check if the form has been submitted and the 'reject' button is clicked
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reject'])) {
    // Check if the applicant_id is set and not empty
    if (isset($_POST['applicant_id']) && !empty($_POST['applicant_id'])) {
        // Retrieve the applicant_id from the form submission
        $applicant_id = $_POST['applicant_id'];

        // Update the status of the application to 'rejected' in the database
        $sql = "UPDATE Applications SET status = 'rejected' WHERE id = ?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            // Error occurred while preparing the statement
            echo "Error: " . $conn->error;
        } else {
            // Bind parameters and execute the statement
            $stmt->bind_param("i", $applicant_id);
            if ($stmt->execute()) {
                // Retrieve the applicant's email address
                $sql = "SELECT email FROM Applications WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $applicant_id);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $email = $row['email'];
                    // Send email notification
                    sendEmailNotification($email, "rejected");
                }

                // Redirect to fetch_application.php
                header("Location: fetch_application.php");
                exit;
            } else {
                // Error occurred while executing the statement
                echo "Error: " . $conn->error;
            }
            // Close statement
            $stmt->close();
        }
    } else {
        // Error: applicant_id not set or empty
        echo "Error: applicant_id not set or empty.";
    }
}


        // Query to fetch applicants data
        $sql = "SELECT * FROM Applications";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["user_name"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["phone"] . "</td>";
                echo "<td>" . $row["applied_position"] . "</td>";
                echo "<td>" . $row["date_applied"] . "</td>";
                echo "<td class='file-links'>";
                echo "<a href='uploads/" . basename($row["certificates"]) . "' download>Certificates</a>";
                echo "<a href='uploads/" . basename($row["resume"]) . "' download>Resume</a>";
                echo "</td>";

                // Add approve and reject buttons
                echo "<td class='action-buttons'>";
                if (isset($row["status"]) && $row["status"] === "pending") {
                    echo "<form method='post' action='".$_SERVER["PHP_SELF"]."'>
                            <input type='hidden' name='applicant_id' value='" . $row["id"] . "'>
                            <button class='approve-button' type='submit' name='approve'>Approve</button>
                          </form>";
                    echo "<form method='post' action='".$_SERVER["PHP_SELF"]."'>
                            <input type='hidden' name='applicant_id' value='" . $row["id"] . "'>
                            <button class='reject-button' type='submit' name='reject'>Reject</button>
                          </form>";
                } elseif (isset($row["status"])) {
                    echo $row["status"]; // Display status if not pending
                }
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No applicants found.</td></tr>";
        }

        // Close the database connection
        mysqli_close($conn);
        ob_end_flush();
        ?>
        </table>
    
           
           

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


