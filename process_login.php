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
    $query = "SELECT * FROM users WHERE `User_type` = ? AND `Email` = ? AND `Password` = ?";
    $stmt = $conn->prepare($query);

    // Check if the statement preparation was successful
    if (!$stmt) {
        die("Error in query preparation: " . $conn->error);
    }

    $stmt->bind_param("sss", $userType, $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Valid credentials, set session variables
        $_SESSION["user_type"] = $userType;
        $_SESSION["username"] = $username;

        // Redirect based on user type
        switch ($userType) {
            case "admin":
                header("Location: admin-dashboard.html");
                exit();
            case "psychologist":
                header("Location: pyschologist-dashboard.html");
                exit();
            case "Clients":
                // Redirect to a default page if user type is not recognized
                header("Location: client_dashboard.html");
                exit();
                default:
                header ("Location: client_dashboard.html");
                exit();
        }
    } else {
        // Invalid credentials, show JavaScript alert and use JavaScript to redirect
        echo '<script>alert("Invalid credentials. Please try again."); window.location.href = "login-page.html";</script>';
        exit();
    }
}

// Close the database connection
$conn->close();
?>
