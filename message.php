<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chat Section</title>
    <link rel="stylesheet" href="">
<style>
#chat-container {
    width: 600px;
    height: 400px;
    border: 1px solid #ccc;
    overflow: auto;
}

#user-chat, #admin-chat {
    padding: 10px;
    border: 1px solid #ccc;
    margin-bottom: 10px;
}

#messages, #user-messages, #admin-messages {
    padding: 10px;
    height: 300px;
    overflow: auto;
}

#message-form, #user-message-form, #admin-message-form {
    position: sticky;
    bottom: 0;
    background-color: #f9f9f9;
    padding: 10px;
}

#message-input, #user-message-input, #admin-message-input {
    width: 70%;
}

#reply-btn {
    margin-top: 10px;
}
</style>

</head>
<body>
    <div id="chat-container">
        <!-- User Interface -->
        <div id="user-chat">
            <h3>User Chat</h3>
            <div id="user-messages"></div>
            <form id="user-message-form">
                <input type="text" id="user-message-input" placeholder="Type your message...">
                <button type="submit">Send</button>
            </form>
            <button id="reply-btn">Reply</button>
            <div id="reply-section" style="display: none;">
                <form id="admin-message-form">
                    <input type="text" id="admin-message-input" placeholder="Type your reply...">
                    <button type="submit">Send Reply</button>
                </form>
            </div>
        </div>

        <!-- Admin Interface -->
        <div id="admin-chat" style="display: none;">
            <h3>Admin Chat</h3>
            <div id="admin-messages"></div>
            <form id="admin-message-form">
                <input type="text" id="admin-message-input" placeholder="Type your message...">
                <button type="submit">Send</button>
            </form>
        </div>
    </div>
    <script>
    // Placeholder IDs for user and admin
var user_id = 1; // Example user ID
var admin_id = 2; // Example admin ID

document.getElementById('user-message-form').addEventListener('submit', function(e) {
    e.preventDefault();
    var message = document.getElementById('user-message-input').value;
    sendMessage(user_id, admin_id, message, 'user');
});

document.getElementById('admin-message-form').addEventListener('submit', function(e) {
    e.preventDefault();
    var message = document.getElementById('admin-message-input').value;
    sendMessage(admin_id, user_id, message, 'admin');
});

document.getElementById('reply-btn').addEventListener('click', function() {
    var replySection = document.getElementById('reply-section');
    replySection.style.display = replySection.style.display === 'none' ? 'block' : 'none';
});

function sendMessage(sender_id, receiver_id, message, senderType) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'send_message.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (this.status == 200) {
            fetchMessages(sender_id, receiver_id, senderType);
        }
    };
    xhr.send('sender_id=' + sender_id + '&receiver_id=' + receiver_id + '&message=' + message);
}

function fetchMessages(sender_id, receiver_id, senderType) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'fetch_messages.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (this.status == 200) {
            var messages = JSON.parse(this.responseText);
            var messagesDiv = senderType === 'user' ? document.getElementById('user-messages') : document.getElementById('admin-messages');
            messagesDiv.innerHTML = '';
            messages.forEach(function(msg) {
                var messageDiv = document.createElement('div');
                messageDiv.textContent = msg.message;
                messagesDiv.appendChild(messageDiv);
            });
        }
    };
    xhr.send('sender_id=' + sender_id + '&receiver_id=' + receiver_id);
}



    </script>
</body>
</html>
