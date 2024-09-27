<?php
// Include the database connection script
require_once 'connect.php';

// Query to fetch attachment information
$sql = "SELECT * FROM Jobs";
$result = mysqli_query($conn, $sql);

echo "<h1>JOBS</h1>"; // Add the heading



if (mysqli_num_rows($result) > 0) {
    echo "<table style='border-collapse: collapse; width: 100%;'>";
    echo "<tr><th style='background-color: #f2f2f2; border: 1px solid black; text-align: left; padding: 8px;'>Title</th><th style='background-color: #f2f2f2; border: 1px solid black; text-align: left; padding: 8px;'>Description</th><th style='background-color: #f2f2f2; border: 1px solid black; text-align: left; padding: 8px;'>requirements</th><th style='background-color: #f2f2f2; border: 1px solid black; text-align: left; padding: 8px;'>Application Deadline</th><th style='background-color: #f2f2f2; border: 1px solid black; text-align: left; padding: 8px;'>Action</th></tr>";
    
    // Fetch and display data row by row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td style='border: 1px solid black; text-align: left; padding: 8px;'>" . $row['title'] . "</td>";
        echo "<td style='border: 1px solid black; text-align: left; padding: 8px;'>" . $row['description'] . "</td>";
        echo "<td style='border: 1px solid black; text-align: left; padding: 8px;'>" . $row['requirements'] . "</td>";
        echo "<td style='border: 1px solid black; text-align: left; padding: 8px;'>" . $row['application_deadline'] . "</td>";
        echo "<td style='border: 1px solid black; text-align: left; padding: 8px;'><a href='application.php?attachment_id=" . $row['id'] . "'>Apply</a></td>"; // Link to application form with job ID
        echo "</tr>";
    }
    echo "</table>";
    
} else {
    echo "No jobs found.";
}

// Close the database connection
mysqli_close($conn);
?>
<div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"></h3>
                                <p class="fs-5"></p>
                            </div>
                            <i class=></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"></h3>
                                <p class="fs-5"></p>
                            </div>
                            <i
                                class=></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"></h3>
                                <p class="fs-5"></p>
                            </div>
                            <i class=></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"></h3>
                                <p class="fs-5"></p>
                            </div>
                            <i class=></i>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>