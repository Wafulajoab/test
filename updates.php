<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KEMU Security System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .container {
            background-color: white;
            width: 100%;
            z-index: 100%;
        }

     

        /* CSS for Buttons */
        .button-container {
            width: 100%;
            margin: 0 auto;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin-top: 20px;
        }

        .button-container button {
            margin: 10px;
            padding: 10px 30px;
            background-color: purple;
            color: white;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button-container button:hover {
            background-color: green;
        }

        /* CSS for Announcement Div */
        .announcement-container {
            width: 20%;
            margin: 0 auto;
            text-align: center;
            margin-top: 100px; /* Adjust margin-top as needed */
            background-color: #f5f5f5; /* Set background color */
            padding: 3%; /* Add padding for better appearance */
            border-radius: 25px; /* Add border-radius for rounded corners */
            position: relative; /* Added position relative */
        }

        .announcement-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        
    </style>
</head>
<body>
   
    <!-- Announcements Div -->
    <div class="announcement-container">
        <div class="announcement-title">Announcements</div>
        <!-- Logo and Buttons section -->
        <div class="logo-and-buttons">
            <div class="button-container">
                <button onclick="window.location.href='cso_announcements.php'"> Chief Security Officer(CSO) Announcement</button>
                <button onclick="window.location.href='normal_announcements.php'">Normal Announcements</button>
            </div>
        </div>
    </div>
</body>
</html>
