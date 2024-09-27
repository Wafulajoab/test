<!-- admin_chat.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Chat</title>
    <style>
        #message-form {
            margin-bottom: 20px;
        }
        #message-input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        #message-form button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        #messages {
            height: 300px;
            border: 1px solid #ccc;
            padding: 10px;
            overflow-y: auto;
        }
    </style>
</head>
<body>
    <div id="messages"></div>
    <form id="message-form" action="send_message.php" method="post">
        <input type="text" name="message" id="message-input" placeholder="Type your response...">
        <button type="submit">Send</button>
    </form>

    <script>
    function fetchMessages() {
        fetch('get_messages.php')
            .then(response => response.json())
            .then(messages => {
                const messagesDiv = document.getElementById('messages');
                messagesDiv.innerHTML = '';
                messages.forEach(message => {
                    const messageElement = document.createElement('p');
                    messageElement.textContent = message.message;
                    messagesDiv.appendChild(messageElement);
                });
            });
    }

    // Call fetchMessages when the page loads
    fetchMessages();
    </script>
</body>
</html>
