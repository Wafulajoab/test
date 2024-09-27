<?php
// Include the database connection script
require_once 'connect.php';

// Check if attachment id is set in the URL
if (isset($_GET['id'])) {
    $attachment_id = $_GET['id'];
    
    // Fetch attachment details from the database
    $sql = "SELECT * FROM attachments WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $attachment_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        // Display edit attachment form with pre-filled data
?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Attachment</title>
            <style>
                /* CSS styles here */
                body {
                    font-family: Arial, sans-serif;
                    margin: 0;
                    padding: 0;
                    background-color: #f4f4f4;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                }

                form {
                    background-color: #fff;
                    padding: 20px;
                    border-radius: 8px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                    width: 400px;
                }

                h1 {
                    text-align: center;
                    margin-bottom: 20px;
                }

                label {
                    font-weight: bold;
                }

                input[type="text"],
                textarea,
                input[type="date"] {
                    width: 100%;
                    padding: 8px;
                    margin-top: 5px;
                    margin-bottom: 15px;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                    box-sizing: border-box;
                }

                input[type="submit"] {
                    background-color: #4CAF50;
                    color: white;
                    padding: 12px 20px;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                    width: 100%;
                    font-size: 16px;
                }

                input[type="submit"]:hover {
                    background-color: #45a049;
                }
            </style>
        </head>
        <body>
            
            <form action="update_attachment.php" method="POST">
            <h1>Edit Attachment</h1>
                <input type="hidden" name="attachment_id" value="<?php echo $row['id']; ?>">
                <label for="title">Attachment Title:</label><br>
                <input type="text" id="title" name="title" value="<?php echo $row['title']; ?>" required><br>
                <label for="attachment_limit">Attachment Limit:</label><br>
                <input type="text" id="attachment_limit" name="attachment_limit" value="<?php echo $row['attachment_limit']; ?>" required><br>


                <label for="organization">Organization:</label><br>
                <input type="text" id="organization" name="organization" value="<?php echo $row['organization']; ?>" required><br>

                <label for="description">Attachment Description:</label><br>
                <textarea id="description" name="description" rows="4" cols="50" required><?php echo $row['description']; ?></textarea><br>

                <label for="duration">Duration:</label><br>
                <input type="text" id="duration" name="duration" value="<?php echo $row['duration']; ?>" required><br>

                <label for="deadline">Application Deadline:</label><br>
                <input type="date" id="deadline" name="deadline" value="<?php echo $row['application_deadline']; ?>" required><br>

                <input type="submit" name="submit" value="Update">
            </form>
        </body>
        </html>
<?php
    } else {
        // Attachment not found
        echo "Attachment not found!";
    }
} else {
    // No attachment id provided
    echo "Invalid request!";
}
?>
