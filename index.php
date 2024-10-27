<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Career & Attachment Linking System - Home</title>
  <link rel="stylesheet" href="styles.css"> <!-- Custom CSS for additional styling -->
  <style>
    /* Inline CSS for specific styling */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body, html {
      height: 100%;
      font-family: Arial, sans-serif;
      background-color: rgb(53, 55, 57);
    }

    .home-page {
      background-image: url('image1.jpeg'); /* Replace 'background.jpg' with your actual background image */
      background-size: cover;
      background-position: center;
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      color: #ffffff;
      text-align: center;
      padding: 20px;
    }

    .home-page-content {
      background-color: rgba(0, 0, 0, 0.6); /* Add a semi-transparent background */
      padding: 30px;
      border-radius: 15px;
      max-width: 700px;
      width: 100%;
      margin: auto;
    }

    .home-page-content h1 {
      font-size: 48px;
      margin-bottom: 20px;
    }

    .home-page-content p {
      margin-bottom: 20px;
      font-size: 20px;
    }

    .home-page-content h2 {
      margin-bottom: 20px;
      font-size: 32px;
    }


    .logo {
      position: absolute;
      top: 20px;
      left: 20px;
      width: 100px;
      height: auto;
    }
  </style>
</head>
<body>
  <img src="logo.png" alt="Logo" class="logo"> <!-- Replace 'logo.png' with your actual logo image -->

  <div class="home-page">
    <div class="home-page-content">
      <h1>CAREER & ATTACHMENT LINKING SYSTEM</h1>
      <p>Your success is our success</p>
      <h2>Welcome,</h2><br><br>
      
      <div class="buttons">
  <div class="row">
    <button class="btn" onclick="location.href='register.php'">Register as User</button>
    <button class="btn" onclick="location.href='login.php'">Login as User</button>
  </div>
  <div class="row">
    <button class="btn" onclick="location.href='register_organisation.php'">Register as Organisation</button>
    <button class="btn" onclick="location.href='login_organisation.php'">Login as Organisation</button>
  </div>
  <div class="row">
    <button class="btn" onclick="location.href='admin.php'">Register as Admin</button>
    <button class="btn" onclick="location.href='admin_login.php'">Login as Admin</button>
  </div>
</div>

<style>
  /* Main container for buttons */
  .buttons {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 20px; /* Space between rows */
  }

  /* Row container for each set of buttons */
  .row {
    display: flex;
    justify-content: center;
    gap: 15px; /* Space between buttons in a row */
  }

  /* Button styling */
  .btn {
    width: 240px;
    padding: 15px 25px;
    font-size: 17px;
    font-weight: 600;
    color: #fff; /* White text */
    background-color: #3b82f6; /* Flat color blue */
    border: none;
    border-radius: 8px; /* Slightly rounded corners */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
  }

  /* Hover effect for buttons */
  .btn:hover {
    background-color: #2563eb; /* Darker blue on hover */
    transform: translateY(-4px); /* Lift button on hover */
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15); /* Stronger shadow */
  }

  /* Button active state (pressed) */
  .btn:active {
    transform: translateY(2px); /* Press effect */
    background-color: #1e40af; /* Even darker blue */
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1); /* Reduced shadow */
  }

  /* Responsive layout for smaller screens */
  @media (max-width: 768px) {
    .row {
      flex-direction: column;
      gap: 10px;
    }

    .btn {
      width: 100%;
    }
  }
</style>

    </div>
  </div>
</body>
</html>
