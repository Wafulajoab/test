<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat System</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* style.css */
body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    margin: 0;
    padding: 0;
}

#chat-container {
    width: 80%;
    max-width: 600px;
    margin: 50px auto;
    background-color: white;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

#chat-messages {
    height: 400px;
    overflow-y: auto;
    border: 1px solid #ddd;
    padding: 10px;
    margin-bottom: 20px;
}

#chat-form {
    display: flex;
    justify-content: space-between;
}

#chat-input {
    flex-grow: 1;
    margin-right: 10px;
    padding: 5px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

button {
    padding: 5px 10px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body>
    <div id="chat-container">
        <div id="chat-messages"></div>
        <form id="chat-form">
            <input type="text" id="chat-input" placeholder="Type your message...">
            <button type="submit">Send</button>
        </form>
    </div>
    <script>
    // script.js
document.addEventListener('DOMContentLoaded', function() {
    const chatForm = document.getElementById('chat-form');
    const chatInput = document.getElementById('chat-input');
    const chatMessages = document.getElementById('chat-messages');

    chatForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const message = chatInput.value.trim();
        if (message) {
            addMessage(message, 'user');
            chatInput.value = '';
            // Simulate admin response
            setTimeout(function() {
                addMessage('Hello, how can I assist you today?', 'admin');
            }, 1000);
        }
    });

    function addMessage(message, sender) {
        const messageElement = document.createElement('div');
        messageElement.classList.add('message', sender);
        messageElement.textContent = message;
        chatMessages.appendChild(messageElement);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }
});
 
</script>
</body>
</html>