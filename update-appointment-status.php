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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the array of appointment IDs and statuses
    $statusArray = $_POST["status"];

    // Loop through the array and update the status in the database
    foreach ($statusArray as $key => $status) {
        $id = $key + 1; // Assuming IDs start from 1
        $sql = "UPDATE appointments SET status = '$status' WHERE id = $id";
        $conn->query($sql);

        // Move the appointment to the corresponding table
        if ($status == 'approve') {
            moveAppointmentToTable($conn, $id, 'approved');
        } elseif ($status == 'deny') {
            moveAppointmentToTable($conn, $id, 'denied');
        }
    }

    echo "Status updated successfully";
}

// Function to move an appointment to the specified table
function moveAppointmentToTable($conn, $id, $tableName) {
    $selectSql = "SELECT * FROM appointments WHERE id = $id";
    $result = $conn->query($selectSql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $insertSql = "INSERT INTO $tableName (nationalID, name, email, phone, communication, dob, consultationType, preferredDateTime, duration, paymentMode, comments, consent) 
                      VALUES ('{$row['nationalID']}', '{$row['name']}', '{$row['email']}', '{$row['phone']}', '{$row['communication']}', '{$row['dob']}', '{$row['consultationType']}', '{$row['preferredDateTime']}', {$row['duration']}, '{$row['paymentMode']}', '{$row['comments']}', {$row['consent']})";

        $conn->query($insertSql);

        // Delete the appointment from the 'appointments' table
        $deleteSql = "DELETE FROM appointments WHERE id = $id";
        $conn->query($deleteSql);
    }
}

// Close the database connection
$conn->close();
?>
