<?php
// Include necessary files and perform any other setup if needed

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate user input
    $validFonts = ['Arial', 'Times New Roman']; // Add more valid fonts as needed
    $fontFamily = isset($_POST['fontFamily']) && in_array($_POST['fontFamily'], $validFonts)
        ? $_POST['fontFamily']
        : '';

    // Handle dark mode checkbox
    $darkMode = isset($_POST['darkMode']) ? true : false;

    // Save settings in localStorage
    $settings = [
        'fontFamily' => $fontFamily,
        'darkMode' => $darkMode,
        // Add more settings options as needed
    ];

    echo '<script>';
    echo 'localStorage.setItem("dashboardSettings", ' . json_encode(json_encode($settings)) . ');';
    echo 'window.location.href = "admin-dashboard.php";'; // Redirect back to the dashboard
    echo '</script>';
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="settings.css"> <!-- Include a separate stylesheet for settings if needed -->
    <title>Settings</title>
</head>

<body>
    <h2>Settings</h2>
    <form method="post" action="">
        <!-- Include form fields for various settings -->
        <label for="fontFamily">Select Font:</label>
        <select id="fontFamily" name="fontFamily">
            <option value="Arial">Arial</option>
            <option value="Times New Roman">Times New Roman</option>
            <option value="CoFo Sans">CoFo Sans</option>
            <option value="Lato">Lato</option>
            <option value="Abolition">Abolition</option>
            <option value="Poppins">Poppins</option>
        </select>

        <label for="darkMode">Dark Mode:</label>
        <input type="checkbox" id="darkMode" name="darkMode">

        <!-- Add more settings options as needed -->

        <button type="submit">Save Settings</button>
    </form>

    <script>
        // Include a JavaScript section for applying dynamic styles if needed
        // For example, you can apply styles based on the saved settings when the page loads
        const savedSettings = localStorage.getItem('dashboardSettings');
        if (savedSettings) {
            const settings = JSON.parse(savedSettings);

            // Apply saved settings to all elements in admin-dashboard.html
            document.addEventListener('DOMContentLoaded', function () {
                if (settings.fontFamily) {
                    document.body.style.fontFamily = settings.fontFamily;
                }

                if (settings.darkMode) {
                    document.body.classList.add('dark-mode');
                }
            });
        }
    </script>
</body>

</html>