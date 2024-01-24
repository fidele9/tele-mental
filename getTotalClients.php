

<?php
// Assuming you have a valid database connection
$host = "localhost";
$username = "root";
$password = "";
$database = "Tele-mental-db";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to count total clients
$query = "SELECT COUNT(*) AS total_clients FROM users WHERE `User_type` = 'Client'";
$result = $conn->query($query);

if ($result) {
    $row = $result->fetch_assoc();
    $totalClients = $row['total_clients'];

    // Check if the request is via AJAX
    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
        // If it's an AJAX request, return JSON
        echo json_encode(['totalClients' => $totalClients]);
    } else {
        // If it's not an AJAX request, do nothing (avoid echoing anything)
    }
} else {
    // Set a default value if the query fails
    $totalClients = "N/A";
}

// Close the database connection
$conn->close();
?>

