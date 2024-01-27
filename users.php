<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin-dashboard.css">
    <title>Admin-Dashboard-user</title>
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
                    <li><a href="admin-dashboard.php" class="Dashboard-link">Dashboard</a></li>

                    <li><a href="#users" class="users-link">Users</a></li>
                    <li><a href="#appointments" class="appointments-link">Appointments</a></li>
                    <li><a href="#Clients-history" class="Clients-history-link">Clients-history</a></li>
                    <li><a href="#reports" class="reports-link">Reports</a></li>
                    <li><a href="settings.php" class="settings-link">Settings</a></li>
                    <!-- Logout button -->
                    <li><a href="logout.php" class="logout-link">Logout</a></li>
                </ul>
            </div>
        </section>
        <section id="Dashboard-contents" class="Dashboard-contents">

            <?php
            // Include the user.php file content
            include('user.php');
        ?>
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
        });
    </script>
</body>

</html>