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
    <script src="https://smtpjs.com/v3/smtp.js"></script>


    <title>CareerHub Dashboard</title>
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
                <a href="profile.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fa fa-home"></i>Dashboard</a>
                        <br>
                <a href="fetch_jobs.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fa fa-briefcase"></i>Career Jobs</a>
                        <br>
                <a href="fetch_attachments.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fa fa-paperclip"></i>Attachments</a>
                        <br>
                <a href="fetch_interviews.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fa fa-envelope-open"></i>Interviews</a>
                        <br>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold" onclick="openContactModal()"><i class="fa fa-comment"></i>Messages</a>
                        <br>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold" onclick="openFeedbackModal()"><i class="fa fa-cog"></i>Feedback</a>
                        <br>

                <a href="logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
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

<!-- Navbar code -->
<div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                   role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user me-2"></i>
                    <?php 
                    
                    if (isset($_SESSION['fullname'])) {
                        echo $_SESSION['fullname'];
                    } else {
                        echo "Guest"; // Default text if fullname is not set
                    }
                     ?>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

<div class="container-fluid px-4">
    <div class="row g-3 my-2">
    <div class="col-md-3">
    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
        <button class="btn btn-success" onclick="loadJobApplicationForm()">Apply for Job</button>
    </div>
</div>

<div class="col-md-3">
    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
        <button class="btn btn-warning" onclick="loadAttachmentApplicationForm()">Apply Attachment</button>
    </div>
</div>

        <div class="col-md-3">
    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
        <button class="btn btn-info" onclick="loadJobStatus()">Job Status</button>
    </div>
</div>

<div class="col-md-3">
    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
        <button class="btn btn-danger" onclick="loadAttachmentStatus()">Attachment Status</button>
    </div>
</div>
<br><br><br><br><br><br>


<div class="container">
<?php if(isset($user)): ?>
            <div class="info-column">
                <h2>Personal Information</h2>
                <p><i class="fas fa-user me-2"></i></p>
                <p><strong><?php echo $user['fullname']; ?></strong></p>
                <p><strong>Id No:</strong> <?php echo $user['id_no']; ?></p>
                <p><strong>Gender:</strong> <?php echo $user['gender']; ?></p>
                <p><strong>DOB:</strong> <?php echo $user['dob']; ?></p>
                <p><strong>County:</strong> <?php echo $user['county']; ?></p>
                <p><strong>Nationality:</strong> <?php echo $user['nationality']; ?></p>
                <a href="#" class="update-btn" onclick="openProfileUpdateModal()">Update Profile</a>


            </div><br><br>
            <div class="info-column">
                <h2>Contact Information</h2>
                <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
                <p><strong>Phone No:</strong> <?php echo $user['phone']; ?></p>
                <a href="#" class="update-btn" onclick="openContactUpdateModal()">Edit Contact</a>

            </div>
            <?php else: ?>
                <p>User details not found.</p>
            <?php endif; ?>
        </div>
            
        </div>
    </div>
    <!-- Modal for Job Application -->
<div class="modal fade" id="jobApplicationModal" tabindex="-1" aria-labelledby="jobApplicationModalLabel" aria-hidden="true">
 <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="jobApplicationModalLabel">Job Application</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Content will be loaded here -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
 </div>
</div>
<!-- Modal for Attachment Application -->
<div class="modal fade" id="attachmentApplicationModal" tabindex="-1" aria-labelledby="attachmentApplicationModalLabel" aria-hidden="true">
 <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="attachmentApplicationModalLabel">Attachment Application</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Content will be loaded here -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
 </div>
</div>



             <!-- Modal for jobs status -->
    <div class="modal fade" id="jobStatusModal" tabindex="-1" aria-labelledby="jobStatusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="jobStatusModalLabel">Job Application Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Content will be loaded here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal for Attachment Status -->
<div class="modal fade" id="attachmentStatusModal" tabindex="-1" aria-labelledby="attachmentStatusModalLabel" aria-hidden="true">
 <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="attachmentStatusModalLabel">Attachment Status</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Content will be loaded here -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
 </div>
</div>
<!-- Modal for Feedback Form -->
<div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
 <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="feedbackModalLabel">Feedback Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="send_feedback.php" method="post">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" required><br>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br>
            <label for="feedback">Feedback:</label><br>
            <textarea id="feedback" name="feedback" rows="4" cols="50" required></textarea><br>
            <input type="submit" value="Submit Feedback">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
 </div>
</div>
<!-- Modal for Contact Form -->
<div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
 <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="contactModalLabel" style="color: #333;">Contact Us</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Contact Us Form -->
        <div class="contact-form">
        <form action="send_contact.php" method="post">
              <label for="name" style="display: block; margin-bottom: 5px;">Name:</label>
              <input type="text" id="name" name="name" required style="width: 100%; padding: 10px; margin-bottom: 10px; border-radius: 5px; border: 1px solid #ccc;">
              <label for="email" style="display: block; margin-bottom: 5px;">Email:</label>
              <input type="email" id="email" name="email" required style="width: 100%; padding: 10px; margin-bottom: 10px; border-radius: 5px; border: 1px solid #ccc;">
              <label for="message" style="display: block; margin-bottom: 5px;">Message:</label>
              <textarea id="message" name="message" rows="4" required style="width: 100%; padding: 10px; margin-bottom: 10px; border-radius: 5px; border: 1px solid #ccc;"></textarea>
              <button type="submit" style="background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Submit</button>
            </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: #6c757d; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Close</button>
      </div>
    </div>
 </div>
</div>





<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
        function loadJobApplicationForm() {
    $.ajax({
        url: 'application.php',
        type: 'GET',
        success: function(data) {
            // Load the fetched data into the modal body
            $('.modal-body').html(data);
            // Show the modal
            $('#jobApplicationModal').modal('show');
        },
        error: function(xhr, status, error) {
            console.error('Error fetching job application form:', error);
        }
    });
}
function loadAttachmentApplicationForm() {
    $.ajax({
        url: 'attachee_application.php',
        type: 'GET',
        success: function(data) {
            // Load the fetched data into the modal body
            $('.modal-body').html(data);
            // Show the modal
            $('#attachmentApplicationModal').modal('show');
        },
        error: function(xhr, status, error) {
            console.error('Error fetching attachment application form:', error);
        }
    });
}
        function loadJobStatus() {
    $.ajax({
        url: 'job_status.php',
        type: 'GET',
        success: function(data) {
            // Load the fetched data into the modal body
            $('.modal-body').html(data);
            // Show the modal
            $('#jobStatusModal').modal('show');
        },
        error: function(xhr, status, error) {
            console.error('Error fetching job status:', error);
        }
    });
}
function loadAttachmentStatus() {
    $.ajax({
        url: 'view_application_status.php',
        type: 'GET',
        success: function(data) {
            // Load the fetched data into the modal body
            $('.modal-body').html(data);
            // Show the modal
            $('#attachmentStatusModal').modal('show');
        },
        error: function(xhr, status, error) {
            console.error('Error fetching attachment status:', error);
        }
    });
}
function openFeedbackModal() {
    var feedbackModal = new bootstrap.Modal(document.getElementById('feedbackModal'));
    feedbackModal.show();
}

    function openContactModal() {
        var contactModal = new bootstrap.Modal(document.getElementById('contactModal'));
        contactModal.show();
    }




        
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










