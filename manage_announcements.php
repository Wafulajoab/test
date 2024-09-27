<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSO Announcements</title>
    <style>
        /* Form styles */
        form {
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .message {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }

        /* Styling for admin reply form */
        .admin-reply-form {
            margin-top: 10px;
        }

        .admin-reply-form input[type="text"] {
            width: 80%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            margin-top: 5px;
            margin-bottom: 5px;
        }

        .admin-reply-form button[type="submit"] {
            padding: 8px 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .admin-reply-form button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <!-- Your HTML content here -->
      <!-- User interface for sending messages to admin -->
    <form action="admin_announcements.php" method="POST">
        <input type="text" name="user_message" placeholder="Type your message" required>
        <button type="submit">Send</button>
    </form>

    <!-- Display user's messages and admin's replies -->
    <div class="messages-container">
        <?php
        // Include database connection script
        require_once 'connect.php';

        // Fetch messages from the database (including admin's replies)
        $stmt = $conn->prepare("SELECT * FROM messages ORDER BY created_at DESC");
        $stmt->execute();
        $result = $stmt->get_result();
        $messages = $result->fetch_all(MYSQLI_ASSOC);

        // Display each message along with admin's replies
        foreach ($messages as $message) {
            echo '<div class="message">';
            echo '<p>User: ' . $message['user_message'] . '</p>';
            if (!empty($message['admin_reply'])) {
                echo '<p>Admin: ' . $message['admin_reply'] . '</p>';
            }
            echo '</div>';
        }
        ?>
    </div>
</body>

</html>
