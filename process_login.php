<?php
session_start();

// Database connection details
$host = "localhost";
$username = "root";
$password = "";
$database = "Tele-mental-db";

// Establishing a connection to the database
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handling login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userType = $_POST["userType"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Use prepared statements to prevent SQL injection
    $query = "SELECT * FROM users WHERE `User-type` = ? AND `Email` = ? AND `Password` = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $userType, $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Valid credentials, set session variables and redirect based on user type
        $_SESSION["user_type"] = $userType;
        $_SESSION["username"] = $username;

        switch ($userType) {
            case "admin":
                header("Location: admin-dashboard.html");
                break;
            case "psychologist":
                header("Location: psychologist-dashboard.html");
                break;
            case "client":
                header("Location: client-dashboard.html");
                break;
            default:
                // Redirect to a default page if user type is not recognized
                header("Location: default-dashboard.html");
        }

        exit();
    } else {
        // Invalid credentials, redirect to login page with an error message
        header("Location: login-page.html?error=InvalidCredentials");
        exit();
    }
}

// Close the database connection
$conn->close();
?>
