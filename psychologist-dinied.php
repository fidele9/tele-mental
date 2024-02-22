<?php
// Database connection details
$host = "localhost";
$username = "root";
$password = "";
$database = "Tele-mental-db";

// Establish a database connection
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the appointments table
$sql = "SELECT * FROM denied";
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin-dashboard.css">
    <title>psychologist-Dashboard-denied</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> <!-- Include jQuery -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <header>
        <nav>
            <div id="sidebarToggle">&#9776;</div>
            <div class="logo"><img src="./images/logoicon3.png" alt="" />Tele mental</div>

            <ul>
                <li class="dropdown">
                    <img src="./images/admin.png" alt="">
                    <div class="dropdown-content">
                        <a href="#">Profile</a>
                        <a href="#">Change Password</a>
                    </div>
                </li>
                
            </ul>
        </nav>
    </header>
    <main>
        <section id="sidebar" class="sidebar">
            <div class="admin-sidebar">
                <ul>
                <ul>
                    <li><a href="psychologist-dashboard.php" class="Dashboard-link">Dashboard</a></li>
                    <!--<li><a href="users.php" class="users-link">Users</a></li>-->
                    <li><a href="psychologist-Dashboard-appointments.php" class="appointments-link">Appointments</a></li>
                    <li><a href="psychologist-Dashboard-client-history.html" class="Clients-history-link">Clients-history</a>
                    </li>
                    <li><a href="psychologist-dinied.php" class="dinied-link">dinied</a></li>
                    <li><a href="psychologist-approved.php" class="approved-link">approved</a></li>
                    <li><a href="psychologist-reports" class="reports-link">Reports</a></li>
                    <li><a href="psychologist-settings.php" class="settings-link">Settings</a></li>
                    <li><a href="logout.php" class="logout-link">Logout</a></li>
                </ul>
            </div>
        </section>
        <section id="Dashboard-contents" class="Dashboard-contents">
            <h2>dinied Appointments</h2>

            <form id="approveForm">
            <table border='1' class="table table-bordered table-dark">
                    <thead>
                        <tr>
                            <!--<th>ID</th>-->
                            <th>National ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Communication</th>
                            <th>Date of Birth</th>
                            <th>Consultation Type</th>
                            <th>Preferred DateTime</th>
                            <th>Duration</th>
                            <th>Payment Mode</th>
                            <th>Comments</th>
                            <th>Consent</th>
                            <th>Created At</th>
                            <!--<th>Status</th>-->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                           // echo "<td>{$row['id']}</td>";
                            echo "<td>{$row['nationalID']}</td>";
                            echo "<td>{$row['name']}</td>";
                            echo "<td>{$row['email']}</td>";
                            echo "<td>{$row['phone']}</td>";
                            echo "<td>{$row['communication']}</td>";
                            echo "<td>{$row['dob']}</td>";
                            echo "<td>{$row['consultationType']}</td>";
                            echo "<td>{$row['preferredDateTime']}</td>";
                            echo "<td>{$row['duration']}</td>";
                            echo "<td>{$row['paymentMode']}</td>";
                            echo "<td>{$row['comments']}</td>";
                            echo "<td>{$row['consent']}</td>";
                            echo "<td>{$row['created_at']}</td>";
                           // echo "<td>";
                           // echo "<select name='status[]' class='status-select'>";
                           // echo "<option value='approve'>Approve</option>";
                            //echo "<option value='deny'>Deny</option>";
                            //echo "<option value='scheduled'>Scheduled</option>";
                            //echo "</select>";-->
                            //echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>

                <!--<button type="button" id="submitApproval">Submit Approval</button>-->
            </form>

        </section>
    </main>
    <footer>
        <!-- Footer content goes here -->
        <div class="container">
            <p>Contact us at: <a href="mailto:hafidele9@gmail.com">hafidele9@gmail.com</a> | Phone: +250789831961</p>
            <p>&copy; 2024 Tele Mental. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Toggle sidebar visibility
        document.getElementById('sidebarToggle').addEventListener('click', function () {
            document.getElementById('sidebar').classList.toggle('sidebar-hidden');
        });


        //for profile drop down
        document.querySelector('.dropdown').addEventListener('click', function() {
        var dropdownContent = this.querySelector('.dropdown-content');
        dropdownContent.style.display = (dropdownContent.style.display === 'block') ? 'none' : 'block';

// Logout functionality
document.querySelector('.logout-link').addEventListener('click', function() {
        // Redirect to the logout script
        window.location.href = 'logout.php';
    });

    });

    // status of appointiment js

    $(document).ready(function () {
            // Handle form submission using AJAX
            $("#submitApproval").click(function () {
                var formData = $("#approveForm").serialize(); // Serialize form data

                $.ajax({
                    type: "POST",
                    url: "update-appointment-status.php", // Create this file for handling database update
                    data: formData,
                    success: function (response) {
                        alert(response); // Show success message or handle as needed
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            });
        });

    </script>
</body>
</html>