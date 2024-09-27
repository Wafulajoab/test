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

    .buttons {
      margin-top: 20px;
      display: flex;
      justify-content: center;
      gap: 15px;
    }

    .buttons button {
      padding: 12px 25px;
      font-size: 16px;
      color: white;
      background-color: #007BFF;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .buttons button:hover {
      background-color: #0056b3;
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
        <button onclick="location.href='register.php'">Register as user</button>
        <button onclick="location.href='login.php'">Login as user</button>
      </div>
    </div>
  </div>
</body>
</html>
