<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hostel";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$name = $_POST['name'];
$contact = $_POST['contact'];
$type = $_POST['type']; // "feedback" or "complaint"
$message = $_POST['message'];
$date = date("Y-m-d");

// Prepare SQL statement
$sql = "INSERT INTO `feedback` (`Name`, `Contact`, `Feedback/Complaint`, `Content`, `date`)
        VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sisss", $name, $contact, $type, $message, $date);

// Execute and respond
if ($stmt->execute()) {
    echo "<script>alert('Feedback/Complaint submitted successfully!'); window.location.href='student_feedback.php';</script>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn