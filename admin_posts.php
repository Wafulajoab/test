<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <title>Admin Panel | CareerGroup</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    /* Internal CSS for Admin Panel */
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
    }

    .admin-panel {
      width: 100%;
      max-width: 1200px;
      margin: 0 auto;
      display: flex;
    }

    .sidebar {
      width: 250px;
      background-color: #333;
      color: #fff;
      padding: 20px;
    }

    .admin-content {
      flex: 1;
      padding: 20px;
      background-color: #fff;
    }

    .admin-content h2 {
      margin-top: 0;
    }

    .sidebar ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .sidebar li {
      margin-bottom: 10px;
    }

    .sidebar li a {
      color: #fff;
      text-decoration: none;
      display: block;
    }

    .sidebar li a:hover {
      color: #ccc;
    }

    .form-container {
      margin-top: 20px;
    }

    .form-container label {
      display: block;
      margin-bottom: 5px;
    }

    .form-container input[type="text"],
    .form-container textarea {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    .form-container input[type="submit"] {
      background-color: #333;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 4px;
      cursor: pointer;
    }

    .form-container input[type="submit"]:hover {
      background-color: #555;
    }
  </style>
</head>
<body>
  <div class="admin-panel">
    <div class="sidebar">
      <h2>Admin Panel</h2>
      <ul>
        <li><a href="#">Dashboard</a></li>
        <li><a href="#">Users</a></li>
        <li><a href="#">Settings</a></li>
      </ul>
    </div>
    <div class="admin-content">
      <h2>Add New Post</h2>
      <div class="form-container">
        <form id="post-form">
          <label for="title">Title:</label>
          <input type="text" id="title" name="title">

          <label for="content">Content:</label>
          <textarea id="content" name="content" rows="4"></textarea>

          <input type="submit" value="Submit">
        </form>
      </div>
    </div>
  </div>
</body>
</html>
