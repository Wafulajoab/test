<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register as Organisation</title>
  <link rel="stylesheet" href="styles.css"> <!-- Custom CSS -->
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f0f2f5;
      padding: 0;
      margin: 0;
    }

    .container {
      max-width: 500px;
      margin: 50px auto;
      padding: 30px;
      background-color: white;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
      animation: fadeIn 0.6s ease-in-out; /* Smooth animation */
    }

    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }

    /* Logo section */
    .logo {
      text-align: center;
      margin-bottom: 20px;
    }

    .logo img {
      max-width: 75px;
      height: auto;
    }

    h1 {
      text-align: center;
      color: #333;
      font-size: 28px;
      margin-bottom: 25px;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    label {
      font-size: 15px;
      color: #555;
    }

    input, textarea, select {
      padding: 12px;
      border: 1px solid #ddd;
      border-radius: 5px;
      font-size: 16px;
      width: 100%;
      box-sizing: border-box;
      background-color: #f9f9f9;
      transition: border-color 0.3s;
    }

    input:focus, textarea:focus, select:focus {
      border-color: #007BFF;
      outline: none;
    }

    button {
      padding: 15px;
      font-size: 18px;
      color: white;
      background-color: #007BFF;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
      width: 100%;
    }

    button:hover {
      background-color: #0056b3;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .error {
      color: red;
      margin-top: -10px;
      font-size: 14px;
    }

    /* Add login link */
    .login-link {
      text-align: center;
      margin-top: 15px;
      font-size: 14px;
    }

    .login-link a {
      color: #007BFF;
      text-decoration: none;
      font-weight: bold;
    }

    .login-link a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container">
    <!-- Logo Section -->
    <div class="logo">
      <img src="logo.png" alt="Organisation Logo"> <!-- Replace with your logo source -->
    </div>

    <h1>Register as Organisation</h1>
    <form action="register_organisation_process.php" method="POST">
      <div class="form-group">
        <label for="org_name">Organization Name:</label>
        <input type="text" id="org_name" name="org_name" required>
      </div>

      <div class="form-group">
        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" required>
      </div>

      <div class="form-group">
        <label for="industry">Industry:</label>
        <select id="industry" name="industry" required>
          <option value="">--Select Industry--</option>
          <option value="Technology">Technology</option>
          <option value="Healthcare">Healthcare</option>
          <option value="Education">Education</option>
          <option value="Finance">Finance</option>
          <option value="Manufacturing">Manufacturing</option>
          <!-- Add more industries as needed -->
        </select>
      </div>

      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
      </div>

      <div class="form-group">
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>
      </div>

      <div class="form-group">
        <label for="description">Organization Description:</label>
        <textarea id="description" name="description" rows="4" required></textarea>
      </div>

      <button type="submit">Register</button>
    </form>

    <div class="login-link">
      <p>Already have an account? <a href="login_organisation.php">Login here</a></p>
    </div>
  </div>
</body>
</html>
