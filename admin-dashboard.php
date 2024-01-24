<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin-dashboard.css">
    <title>Admin Dashboard</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


    <?php include 'gettotalusers.php'; ?>
    <?php include 'getTotalClients.php'; ?>
    <script type="text/javascript">
        // Assign the PHP variable value to a JavaScript variable
        var totalClients = <?php  echo json_encode($totalClients); ?>;
        var totalClients = <?php echo json_encode($totalusers); ?>;

    </script>


</head>

<body>
    <header>
        <nav>
            <div id="sidebarToggle">&#9776;</div>
            <div class="logo">Tele Mental</div>

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
                    <li><a href="admin-dashboard.html" class="Dashboard-link">Dashboard</a></li>

                    <li><a href="users.php" class="users-link">Users</a></li>
                    <li><a href="Admin-Dashboard-appointiments.html" class="appointments-link">Appointments</a></li>
                    <li><a href="Admin-Dashboard-client-history.html" class="Clients-history-link">Clients-history</a>
                    </li>
                    <li><a href="#reports" class="reports-link">Reports</a></li>
                    <li><a href="#settings" class="settings-link">Settings</a></li>
                    <!-- Logout button -->
                    <!-- <li><a href="#logout" class="logout-link">Logout</a></li>-->
                    <li><a href="logout.php" class="logout-link">Logout</a></li>

                </ul>
            </div>
        </section>
        <section id="Dashboard-contents" class="Dashboard-contents">
            <!-- Section overview -->
            <section id="overview">
                <h2>Overview</h2>
                <p>Be dedicated to change the way in which people see mental illness at all levels of society.<br>
                    If not for yourself, advocate for those who are struggling in silence.</p>
            </section>

            <!-- Section Attendance -->
            <section id="tele-mental-attendee" class="tele-mental-attendee">
                <div class="attendance">
                    <h3>Total clients</h3>
                    <h1 id="totalClients"><?php  echo json_encode($totalClients); ?></h1>
                </div>
                <div class="attendence">

                    <h3>Total Consulteted</h3>
                    <h1> 250</h1>
                </div>
                <div class="attendence">

                    <h3>System users</h3>
                    <h1 id="totalusers"> <?php echo json_encode($totalusers); ?></h1>
                </div>
            </section>

            <!-- Section performance -->
            <section id="tele-mental-performance">
                <h2>performance</h2>
                <img src="./images/perfomance.png" alt="">
            </section>
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
        document.querySelector('.dropdown').addEventListener('click', function () {
            var dropdownContent = this.querySelector('.dropdown-content');
            dropdownContent.style.display = (dropdownContent.style.display === 'block') ? 'none' : 'block';

            // Logout functionality
            document.querySelector('.logout-link').addEventListener('click', function () {
                // Redirect to the logout script
                window.location.href = 'logout.php';
            });
            // Update the total clients value in the HTML when the document is ready
            $(document).ready(function () {
                document.getElementById('totalClients').innerText = totalClients;
            });


 // Update the total user value in the HTML when the document is ready
 $(document).ready(function () {
                document.getElementById('totalusers').innerText = totalusers;
            });

        });


    </script>
</body>

</html>