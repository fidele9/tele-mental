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
        var totalClients = <?php echo json_encode($totalClients); ?>;
        var totalUsers = <?php echo json_encode($totalusers); ?>;
    </script>
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
                    <li><a href="admin-dashboard.html" class="Dashboard-link">Dashboard</a></li>
                    <li><a href="users.php" class="users-link">Users</a></li>
                    <li><a href="Admin-Dashboard-appointments.html" class="appointments-link">Appointments</a></li>
                    <li><a href="Admin-Dashboard-client-history.html" class="Clients-history-link">Clients-history</a></li>
                    <li><a href="#reports" class="reports-link">Reports</a></li>
                    <li><a href="settings.php" class="settings-link">Settings</a></li>
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
                    <h1 id="totalClients"><?php echo json_encode($totalClients); ?></h1>
                </div>
                <div class="attendance">
                    <h3>Total Consulted</h3>
                    <h1> 250</h1>
                </div>
                <div class="attendance">
                    <h3>Total Users</h3>
                    <h1 id="totalUsers"><?php echo json_encode($totalusers); ?></h1>
                </div>
            </section>

            <!-- Section performance       <img src="../images/performance.png" alt="">-->
            <section id="tele-mental-performance">
                <h2>performance</h2>
               
                <img src="/projects%20innolab/tele-mental/images/performance.png" alt="">

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

        // for profile drop-down
        document.querySelector('.dropdown').addEventListener('click', function () {
            var dropdownContent = this.querySelector('.dropdown-content');
            dropdownContent.style.display = (dropdownContent.style.display === 'block') ? 'none' : 'block';

            // Logout functionality
            document.querySelector('.logout-link').addEventListener('click', function () {
                // Redirect to the logout script
                window.location.href = 'logout.php';
            });
        });

        // Check if there are saved settings in localStorage
        const savedSettings = localStorage.getItem('dashboardSettings');
        if (savedSettings) {
            const settings = JSON.parse(savedSettings);

            // Apply saved settings
            if (settings.fontFamily) {
                document.body.style.fontFamily = settings.fontFamily;
            }

            if (settings.darkMode) {
                // Apply dark mode styles
                document.body.classList.add('dark-mode');
            }
        }

        // Update the total clients value in the HTML when the document is ready
        $(document).ready(function () {
            document.getElementById('totalClients').innerText = totalClients;
            document.getElementById('totalUsers').innerText = totalUsers;
        });
    </script>
</body>

</html>
