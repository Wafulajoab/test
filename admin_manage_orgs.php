<?php
session_start();
$admin_name = isset($_SESSION['admin_name']) ? $_SESSION['admin_name'] : '';
require_once 'database_connection.php'; // Include your database connection

// Activate organization function
if (isset($_POST['activate'])) {
    $org_id = $_POST['org_id'];
    $sql = "UPDATE organizations SET subscription_status = 'active' WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $org_id);
    if ($stmt->execute()) {
        echo "<script>alert('Organization activated successfully.');</script>";

        // Send an email or notification to the organization to inform them
        // Optionally redirect the admin back to the organization management page
        // header("Location: manage_organizations.php"); // Uncomment if you want to redirect

    } else {
        echo "<script>alert('Error activating organization.');</script>";
    }
    $stmt->close();
}

// Fetch organizations
$sql = "SELECT id, org_name, subscription_status FROM organizations";
$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="adminpannel.css" />
    <title>Manage Organizations</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }

        .container-fluid {
            margin-top: 30px;
            max-width: 70%; /* Adjust form to 70% width */
            margin-left: auto;
            margin-right: auto;
        }

        .logo {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .logo img {
            max-width: 150px;
            height: auto;
        }

        h2 {
            color: #343a40;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center; /* Center the title */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        }

        table thead {
            background-color: #007bff;
            color: #fff;
        }

        table thead th {
            padding: 10px;
            font-size: 16px;
            text-align: left;
        }

        table tbody tr {
            border-bottom: 1px solid #dee2e6;
        }

        table tbody tr:hover {
            background-color: #f1f1f1;
        }

        table tbody td {
            padding: 12px;
            font-size: 14px;
            vertical-align: middle;
        }

        .btn {
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            font-size: 14px;
        }

        .btn-success {
            background-color: #28a745;
            color: #fff;
            box-shadow: 0 2px 5px rgba(0, 123, 255, 0.3);
            transition: background-color 0.3s ease;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: #fff;
        }

        @media (max-width: 768px) {
            h2 {
                font-size: 22px;
            }

            table thead th, table tbody td {
                font-size: 12px;
            }

            .btn {
                font-size: 12px;
            }

            .container-fluid {
                width: 90%; /* Adjust width for small screens */
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid px-4">
        <div class="logo">
            <img src="logo.png" alt="Logo"> <!-- Replace 'logo.png' with the actual logo file -->
        </div>
        <h2 class="my-4">Manage Organizations</h2>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Organization Name</th>
                        <th>Subscription Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo htmlspecialchars($row['org_name']); ?></td>
                                <td><?php echo htmlspecialchars($row['subscription_status']); ?></td>
                                <td>
                                    <?php if ($row['subscription_status'] === 'pending'): ?>
                                        <form method="post" style="display:inline;">
                                            <input type="hidden" name="org_id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" name="activate" class="btn btn-success btn-sm">Activate</button>
                                        </form>
                                    <?php else: ?>
                                        <button class="btn btn-secondary btn-sm" disabled>Activated</button>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">No organizations found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>
