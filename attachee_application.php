<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include the database connection script
    require_once 'connect.php';
    
    // Set parameters
    $full_name = $_POST['full_name'];
    $date_of_birth = $_POST['date_of_birth'];
    $id_number = $_POST['id_number'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $mobile_number = $_POST['mobile_number'];
    $county = $_POST['county'];
    $education_qualifications = $_POST['education_qualifications'];
    
    // Handle file uploads
    $target_dir = "uploads/";
    $application_letter_path = $target_dir . basename($_FILES["application_letter"]["name"]);
    $introduction_letter_path = $target_dir . basename($_FILES["introduction_letter"]["name"]);
    $resume_path = $target_dir . basename($_FILES["resume"]["name"]);
    $insurance_cover_path = $target_dir . basename($_FILES["insurance_cover"]["name"]);
    
    // Prepare and bind SQL statement to insert data into the database
    $sql = "INSERT INTO attachment_applications (full_name, date_of_birth, id_number, gender, email, mobile_number, county, education_qualifications, application_letter, introduction_letter, resume, insurance_cover) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    
    // Bind parameters
    mysqli_stmt_bind_param($stmt, "ssssssssssss", $full_name, $date_of_birth, $id_number, $gender, $email, $mobile_number, $county, $education_qualifications, $application_letter_path, $introduction_letter_path, $resume_path, $insurance_cover_path);
    
    // Move uploaded files to the upload directory
    if (move_uploaded_file($_FILES["application_letter"]["tmp_name"], $application_letter_path) &&
        move_uploaded_file($_FILES["introduction_letter"]["tmp_name"], $introduction_letter_path) &&
        move_uploaded_file($_FILES["resume"]["tmp_name"], $resume_path) &&
        move_uploaded_file($_FILES["insurance_cover"]["tmp_name"], $insurance_cover_path)) {
        
        // Execute SQL statement
        if(mysqli_stmt_execute($stmt)) {
            // Redirect to attachments.php
            header("Location: fetch_attachments.php");
            exit; // Make sure to exit to prevent further execution
        } else {
            echo "Error submitting application: " . mysqli_error($conn);
        }
    } else {
        echo "Error uploading files.";
    }

    // Close statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attachment Application Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7f8;
        }
        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        .form-title {
            margin-bottom: 30px;
            font-weight: bold;
        }
        .form-control {
            border-radius: 0.75rem;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 0.75rem;
            padding: 10px 20px;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="form-container">
            <h2 class="text-center form-title">Attachment Application Form</h2>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="full_name" class="form-label">Full Name:</label>
                        <input type="text" class="form-control" id="full_name" name="full_name" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="date_of_birth" class="form-label">Date of Birth:</label>
                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="id_number" class="form-label">ID Number:</label>
                        <input type="text" class="form-control" id="id_number" name="id_number" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="gender" class="form-label">Gender:</label>
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="mobile_number" class="form-label">Mobile Number:</label>
                        <input type="text" class="form-control" id="mobile_number" name="mobile_number" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="county" class="form-label">County:</label>
                        <input type="text" class="form-control" id="county" name="county" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="education_qualifications" class="form-label">Education Qualifications:</label>
                        <input type="text" class="form-control" id="education_qualifications" name="education_qualifications" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="application_letter" class="form-label">Application Letter (PDF):</label>
                    <input type="file" class="form-control" id="application_letter" name="application_letter" accept=".pdf" required>
                </div>
                <div class="mb-3">
                    <label for="introduction_letter" class="form-label">Introduction Letter (PDF):</label>
                    <input type="file" class="form-control" id="introduction_letter" name="introduction_letter" accept=".pdf" required>
                </div>
                <div class="mb-3">
                    <label for="resume" class="form-label">Resume (PDF):</label>
                    <input type="file" class="form-control" id="resume" name="resume" accept=".pdf" required>
                </div>
                <div class="mb-3">
                    <label for="insurance_cover" class="form-label">Insurance Cover (PDF):</label>
                    <input type="file" class="form-control" id="insurance_cover" name="insurance_cover" accept=".pdf" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Submit Application</button>
               
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
