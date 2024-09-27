<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSO Announcements</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* CSS styles */
        body {
            background: darkgrey;
            font-family: Arial, sans-serif;
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .container {
            background-color: lavender;
            width: 48%; /* Adjust as needed */
            margin-top: 70px;
            padding: 10px;
        }

        .container-left {
            order: 1; /* Ensure chat section is on the left */
        }

        .container-right {
            order: 2; /* Ensure Normal announcements are on the right */
        }

        .announcements {
            margin-top: 20px;
            max-height: 70vh;
            overflow-y: auto;
            padding-right: 15px;
        }

        .announcement {
            margin-bottom: 10px;
            padding: 10px;
            background-color: #f2f2f2;
            border-radius: 5px;
        }

        .profile-picture {
            width: 50px; /* Adjust size as needed */
            height: 50px; /* Adjust size as needed */
            border-radius: 50%; /* Makes the image round */
            overflow: hidden; /* Ensures the image stays within the circular boundary */
            margin-right: 10px; /* Adds spacing between the profile picture and announcement content */
        }

        .profile-picture img {
            width: 100%; /* Ensures the image fills the circular boundary */
            height: 100%; /* Ensures the image fills the circular boundary */
            object-fit: cover; /* Covers the circular boundary with the image */
        }

        .reply-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
        }

        .reply-button:hover {
            background-color: #0056b3;
        }

        .reply-form {
            display: none;
            margin-top: 10px;
        }

        .reply-form textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            margin-top: 5px;
        }

        .show-reply-form {
            display: block;
        }

        .container.container-left {
            margin-top: 80px;
        }

        .container.container-left h2 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #333;
        }

        .container.container-left form {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .container.container-left input,
        .container.container-left textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 2px solid #007bff;
            border-radius: 8px;
            box-sizing: border-box;
            transition: border-color 0.3s ease-in-out;
        }

        .container.container-left input:focus,
        .container.container-left textarea:focus {
            border-color: #0056b3;
        }

        .container.container-left button {
            padding: 12px 24px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .container.container-left button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container container-left">
        <h2>Chat Section</h2>
        <form action="normal_announcements.php" method="POST">
            <input type="text" name="title" placeholder="Title" required>
            <textarea name="content" placeholder="Your message" required></textarea>
            <button type="submit">Send</button>
        </form>
    </div>

    <div class="container container-right">
        <h2>Normal Announcements</h2>
        <div class="announcements" id="announcement-container">
            <?php
            // Include your database connection script
            require_once 'connect.php';

            // Handle reply form submission
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reply_content']) && isset($_POST['announcement_id'])) {
                $replyContent = $_POST['reply_content'];
                $announcementId = $_POST['announcement_id'];

                // Insert reply into the database
                $stmt = $conn->prepare("INSERT INTO announcement_replies (announcement_id, reply_content) VALUES (?, ?)");
                $stmt->bind_param('is', $announcementId, $replyContent);
                $stmt->execute();
            }

            // Fetch announcements from the database
            $stmt = $conn->prepare("SELECT * FROM normal_announcements ORDER BY created_at DESC");
            $stmt->execute();
            $result = $stmt->get_result();
            $announcements = $result->fetch_all(MYSQLI_ASSOC);

            // Display announcements
            foreach ($announcements as $announcement) {
                echo '<div class="announcement">';
                echo '<div class="profile-picture">';
                echo '<img src="images/jmtech.jpg" alt="Profile Picture">';
                echo '</div>';
                echo '<div class="announcement-content">';
                echo '<h3>' . $announcement['title'] . '</h3>';
                echo '<p>' . $announcement['content'] . '</p>';
                echo '<p>Date: ' . $announcement['created_at'] . '</p>'; // Display date and time
                echo '<button class="reply-button" onclick="toggleReplyForm(this)">Reply</button>';
                echo '<div class="reply-form">';
                echo '<form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="POST">';
                echo '<input type="hidden" name="announcement_id" value="' . $announcement['id'] . '">';
                echo '<textarea name="reply_content" placeholder="Write your reply here"></textarea>';
                echo '<button type="submit">Submit</button>';
                echo '</form>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>

    <script>
        function toggleReplyForm(button) {
            const replyForm = button.nextElementSibling;
            replyForm.classList.toggle('show-reply-form');
        }
    </script>
</body>

</html>
