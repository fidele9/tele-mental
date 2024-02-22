<?php
// Database connection details
$host = "localhost";
$username = "root";
$password = "";
$database = "Tele-mental-db";

// Establish a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check for a successful connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data only if the request method is POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize input to prevent SQL injection
    $nationalID = mysqli_real_escape_string($conn, $_POST["nationalID"]);
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
    $communication = mysqli_real_escape_string($conn, $_POST["communication"]);
    $dob = mysqli_real_escape_string($conn, $_POST["dob"]);
    $consultationType = mysqli_real_escape_string($conn, $_POST["consultationType"]);
    $preferredDateTime = mysqli_real_escape_string($conn, $_POST["preferredDateTime"]);
    $duration = mysqli_real_escape_string($conn, $_POST["duration"]);
    $payment_mode = mysqli_real_escape_string($conn, $_POST["payment_mode"]);
    $comments = mysqli_real_escape_string($conn, $_POST["comments"]);

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO appointments (nationalID, name, email, phone, communication, dob, consultationType, preferredDateTime, duration, paymentMode, comments)
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssss", $nationalID, $name, $email, $phone, $communication, $dob, $consultationType, $preferredDateTime, $duration, $payment_mode, $comments);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo "Appointment request recorded successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
