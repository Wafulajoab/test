<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register as Organisation</title>
  <link rel="stylesheet" href="styles.css"> <!-- Custom CSS -->
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      padding: 0;
      margin: 0;
    }

    .container {
      max-width: 600px;
      margin: 50px auto;
      padding: 20px;
      background-color: white;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
    }

    h1 {
      text-align: center;
      color: #333;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    label {
      font-size: 16px;
      margin-bottom: 5px;
    }

    input, textarea, select {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
      width: 100%;
    }

    button {
      padding: 12px;
      font-size: 16px;
      color: white;
      background-color: #007BFF;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #0056b3;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .error {
      color: red;
      margin-top: -10px;
      font-size: 14px;
    }
  </style>
</head>
<body>
  <div class="container">
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
        <textarea id="description" name="description" rows="5" required></textarea>
      </div>

      <button type="submit">Register</button>
    </form>
  </div>
</body>
</html>
