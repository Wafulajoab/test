<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Career & Attachment Linking System - Home</title>
  <link rel="stylesheet" href="styles.css"> <!-- Custom CSS for additional styling -->
  <style>
    /* Main Home Page Styles */
    .home-page {
      background-image: url('admin.jpg'); /* Background image */
      background-size: cover;
      background-position: center;
      height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center; /* Center horizontally */
      justify-content: center; /* Center vertically */
      background-color: rgba(0, 0, 0, 0.7); /* Dark overlay for better contrast */
      position: relative;
    }

    /* Content Styling */
    .home-page-content {
      color: #ffffff;
      max-width: 600px; /* Max width for the content */
      text-align: center; /* Center text */
      padding: 20px;
      background: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
      border-radius: 10px; /* Rounded corners */
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); /* Soft shadow for a polished look */
    }

    /* Heading and Paragraphs */
    .home-page-content h1 {
      font-size: 48px;
      font-weight: 700;
      margin-bottom: 20px;
    }

    .home-page-content p {
      font-size: 18px;
      margin-bottom: 20px;
      line-height: 1.5; /* Increase line spacing */
    }

    .home-page-content h2 {
      margin-bottom: 20px;
      font-size: 32px;
    }

    /* Button Styling */
    .buttons {
      margin-top: 20px;
      display: flex;
      justify-content: center; /* Center buttons */
      gap: 20px;
    }

    .buttons button {
      padding: 12px 25px;
      font-size: 18px;
      border: none;
      border-radius: 50px; /* Rounded button */
      background-color: #007bff;
      color: white;
      cursor: pointer;
      transition: background-color 0.3s ease;
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2); /* Button shadow */
    }

    .buttons button:hover {
      background-color: #0056b3;
    }

    /* Logo Styling */
    .logo {
      position: absolute;
      top: 20px;
      left: 20px;
      width: 120px; /* Adjusted width for better proportions */
      height: auto;
      z-index: 10; /* Ensure it's above other elements */
    }

    /* Responsive Styling */
    @media (max-width: 768px) {
      .home-page-content h1 {
        font-size: 32px;
      }

      .home-page-content p {
        font-size: 16px;
      }

      .buttons button {
        font-size: 16px;
        padding: 10px 20px;
      }
    }
  </style>
</head>
<body>
  <img src="logo.png" alt="Logo" class="logo"> <!-- Replace 'logo.png' with your actual logo image -->

  <div class="home-page">
    <div class="home-page-content">
      <h1>CAREER & ATTACHMENT LINKING SYSTEM</h1>
      <p>Your success is our success</p>
      <h2>Welcome,</h2>

      <div class="buttons">
        <button onclick="location.href='admin.php'">Register as Admin</button>
        <button onclick="location.href='admin_login.php'">Login as Admin</button>
      </div>
    </div>
  </div>

</body>
</html>
