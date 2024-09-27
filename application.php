<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include the database connection script
    require_once 'connect.php';
    
    // Prepare and bind SQL statement to insert data into the database
    $sql = "INSERT INTO Applications (user_name, email, phone, applied_position, date_applied, certificates, resume) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    
    // Check if statement preparation was successful
    if ($stmt) {
        // Bind parameters
        mysqli_stmt_bind_param($stmt, "sssssss", $user_name, $email, $phone, $applied_position, $date_applied, $certificates_path, $resume_path);
        
        // Set parameters
        $user_name = $_POST['userName'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $applied_position = $_POST['position'];
        $date_applied = $_POST['date'];
        
        // Handle file uploads
        $target_dir = "uploads/";
        $certificates_paths = [];

        // Handle multiple certificate files
        foreach ($_FILES["certificates"]["tmp_name"] as $index => $tmp_name) {
            $certificate_path = $target_dir . basename($_FILES["certificates"]["name"][$index]);

            if (move_uploaded_file($tmp_name, $certificate_path)) {
                $certificates_paths[] = $certificate_path;
            } else {
                echo "Error uploading certificate file.";
            }
        }

        $resume_path = $target_dir . basename($_FILES["resume"]["name"]);

        if (move_uploaded_file($_FILES["resume"]["tmp_name"], $resume_path)) {
            if (mysqli_stmt_execute($stmt)) {
                header("Location: fetch_jobs.php");
                exit;
            } else {
                echo "Error submitting application: " . mysqli_stmt_error($stmt);
            }
        } else {
            echo "Error uploading resume file.";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<!-- Form HTML -->
<div class="container">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
        <label for="userName">User Name:</label><br>
        <input type="text" id="userName" name="userName" required><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>

        <label for="phone">Phone Number:</label><br>
        <input type="text" name="phone" maxlength="10" pattern="\d{10}" title="Phone number must be exactly 10 digits" required><br>

        <label for="position">Applied Position:</label><br>
        <input type="text" id="position" name="position" required><br>

        <label for="date">Date of Application:</label><br>
        <input type="date" id="date" name="date" required><br>

        <label for="certificates">Upload Certificates (DOC, DOCX, or PDF only):</label><br>
        <input type="file" id="certificates" name="certificates[]" accept=".doc,.docx,.pdf" multiple><br>

        <label for="resume">Upload Resume (DOC or PDF only):</label><br>
        <input type="file" id="resume" name="resume" accept=".doc,.docx,.pdf"><br><br>

        <input type="submit" value="Submit Application">
    </form>
</div>

<!-- CSS for Modern Styling -->
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(to right, #6a11cb, #2575fc);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        padding: 10px; /* Added padding to ensure form fits well */
    }

    .container {
        width: 80%; /* Use a percentage for responsiveness */
        max-width: 500px; /* Maximum width for larger screens */
        background-color: #ffffff;
        padding: 20px; /* Reduced padding for smaller screens */
        border-radius: 12px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        animation: fadeIn 0.8s ease-in-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    form {
        display: flex;
        flex-direction: column;
    }

    label {
        font-size: 1rem;
        font-weight: bold;
        color: #333;
        margin-bottom: 5px;
    }

    input[type="text"], input[type="email"], input[type="tel"], input[type="date"], input[type="file"] {
        width: 100%;
        padding: 10px; /* Reduced padding for better fit */
        margin-bottom: 15px; /* Reduced margin for better fit */
        border: 1px solid #ddd;
        border-radius: 6px;
        font-size: 1rem;
        background-color: #f9f9f9;
        transition: border-color 0.3s ease;
    }

    input[type="text"]:focus, input[type="email"]:focus, input[type="tel"]:focus, input[type="date"]:focus, input[type="file"]:focus {
        border-color: #6a11cb;
        outline: none;
        box-shadow: 0 0 5px rgba(106, 17, 203, 0.5);
    }

    input[type="submit"] {
        background: #6a11cb;
        color: white;
        padding: 10px; /* Reduced padding for better fit */
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 1.2rem;
        transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
        background: #2575fc;
    }

    input[type="submit"]:active {
        background-color: #4b00ff;
    }

    ::placeholder {
        color: #888;
        font-size: 0.9rem;
    }

    /* Media Query for Small Screens */
    @media (max-width: 600px) {
        .container {
            padding: 15px; /* Adjusted padding for smaller screens */
        }

        input[type="text"], input[type="email"], input[type="tel"], input[type="date"], input[type="file"] {
            padding: 8px; /* Reduced padding for input fields */
        }

        input[type="submit"] {
            padding: 8px; /* Reduced padding for submit button */
        }
    }
</style>
