<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Organization Dashboard</title>
  <link rel="stylesheet" href="styles.css"> <!-- Custom CSS for styling -->
  <style>
    /* Inline CSS for specific organization page styling */
    body {
      font-family: Arial, sans-serif;
      background-color: rgb(245, 245, 245);
      margin: 0;
      padding: 0;
    }

    .navbar {
      background-color: #333;
      overflow: hidden;
    }

    .navbar a {
      float: left;
      display: block;
      color: white;
      text-align: center;
      padding: 14px 20px;
      text-decoration: none;
    }

    .navbar a:hover {
      background-color: #ddd;
      color: black;
    }

    .dashboard {
      padding: 20px;
      max-width: 1200px;
      margin: auto;
    }

    .dashboard h1 {
      font-size: 36px;
      color: #333;
      text-align: center;
      margin-bottom: 40px;
    }

    .section {
      background-color: white;
      padding: 20px;
      margin-bottom: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .section h2 {
      font-size: 28px;
      margin-bottom: 20px;
    }

    .section ul {
      list-style-type: none;
      padding-left: 0;
    }

    .section ul li {
      padding: 10px 0;
      border-bottom: 1px solid #ddd;
    }

    .section ul li:last-child {
      border-bottom: none;
    }

    .action-buttons {
      display: flex;
      gap: 15px;
      margin-top: 20px;
    }

    .action-buttons button {
      padding: 12px 20px;
      font-size: 16px;
      color: white;
      background-color: #007BFF;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .action-buttons button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>

  <!-- Navbar for navigation -->
  <div class="navbar">
    <a href="#">Home</a>
    <a href="#">Job Postings</a>
    <a href="#">Applications</a>
    <a href="#">Profile</a>
    <a href="#">Logout</a>
  </div>

  <!-- Organization Dashboard Content -->
  <div class="dashboard">
    <h1>Organization Dashboard</h1>

    <!-- Section for Job Postings -->
    <div class="section">
      <h2>Your Job Postings</h2>
      <ul>
        <li>Software Developer - Posted on 10/01/2024</li>
        <li>Data Analyst - Posted on 09/25/2024</li>
        <li>Marketing Manager - Posted on 09/20/2024</li>
      </ul>

      <div class="action-buttons">
        <button onclick="location.href='post_job.php'">Post a New Job</button>
        <button onclick="location.href='view_applications.php'">View Applications</button>
      </div>
    </div>

    <!-- Section for Organization Profile -->
    <div class="section">
      <h2>Organization Profile</h2>
      <p><strong>Organization Name:</strong> XYZ Corporation</p>
      <p><strong>Industry:</strong> Technology</p>
      <p><strong>Location:</strong> New York, NY</p>
      <p><strong>Description:</strong> XYZ Corporation is a leading technology firm specializing in software development, data analytics, and IT solutions.</p>

      <div class="action-buttons">
        <button onclick="location.href='edit_profile.php'">Edit Profile</button>
      </div>
    </div>
  </div>
</body>
</html>
