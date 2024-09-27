
<?php 
session_start(); 
                     
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
    <title>Jobs</title>
    
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
        <h2 class="fs-2 m-0">Interview Schedule</h2>
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
<h3></h3>
<p>Here are the upcoming interviews:</p>
<?php
// Include the database connection script
require_once 'connect.php';

// SQL query to fetch interview details
$sql = "SELECT job_title, interview_date, interview_time FROM Interviews";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Start the table with inline CSS
    echo "<table style='width: 100%; border-collapse: collapse;'>";
    echo "<tr>";
    echo "<th style='border: 1px solid black; padding: 8px; text-align: left; background-color: #f2f2f2; color: black;'>Job Title</th>";
    echo "<th style='border: 1px solid black; padding: 8px; text-align: left; background-color: #f2f2f2; color: black;'>Interview Date</th>";
    echo "<th style='border: 1px solid black; padding: 8px; text-align: left; background-color: #f2f2f2; color: black;'>Interview Time</th>";
    echo "</tr>";

    // Output each row of data with inline CSS
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td style='border: 1px solid black; padding: 8px; text-align: left;'>" . $row['job_title'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 8px; text-align: left;'>" . $row['interview_date'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 8px; text-align: left;'>" . $row['interview_time'] . "</td>";
        echo "</tr>";
    }

    // Close the table
    echo "</table>";
} else {
    echo "<p>No interviews scheduled.</p>";
}

// Close the database connection
mysqli_close($conn);
?>



            
    <!-- /#page-content-wrapper -->
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
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

