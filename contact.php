<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us Form</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .contact-form {
        width: 80%;
        max-width: 500px;
        margin: 50px auto;
        padding: 20px;
        background-color: #ffffff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .contact-form h3 {
        text-align: center;
        margin-bottom: 20px;
    }

    .contact-form label {
        display: block;
        margin-bottom: 5px;
    }

    .contact-form input[type="text"],
    .contact-form input[type="email"],
    .contact-form textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .contact-form button[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #007BFF;
        color: #ffffff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .contact-form button[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>
</head>
<body>

<!-- Contact Us Form -->
<div class="contact-form">
    <h3>Contact Us</h3>
    <form action="send_contact.php" method="post">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
      <label for="message">Message:</label>
      <textarea id="message" name="message" rows="4" required></textarea>
      <button type="submit">Submit</button>
    </form>
</div>


</body>
</html>
