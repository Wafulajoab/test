<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcements</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* CSS styles */
        body {
            background: rgba(244, 244, 247, 0.973);
            font-family: Arial, sans-serif;
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            position: fixed;
            top: 0;
            left: 0;
            width: 50%; /* Set body width to 50% */
            height: 100%;
            overflow-x: hidden; /* Hide horizontal scrollbar */
        }


        .container {
            background-color: white;
            width: 100%;
            z-index: 100%;
            margin-top: 70px; /* Adjust according to your navbar height */
        }

        

        .announcements {
            margin-top: 20px; /* Adjust according to your navbar and container height */
            max-height: 70vh; /* Set maximum height for scrolling */
            overflow-y: auto; /* Enable vertical scrolling */
            padding-right: 15px; /* Add space for scrollbar */
        }

        .announcement {
            margin-bottom: 10px;
            padding: 10px;
            background-color: #f2f2f2;
            border-radius: 5px;
        }

    </style>
</head>
<body>
<div class="container">
    <h2> Announcements</h2>
    <div class="announcements" id="announcement-container">
        <?php include 'fetchadmin_announcements.php'; ?>
    </div>
</div>
</body>
</html>
