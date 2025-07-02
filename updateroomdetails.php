<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "hostel";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Update logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $totalRooms = $_POST["TotalRooms"];
    $roomsFilled = $_POST["RoomsFilled"];
    $rent = $_POST["Rent"];
    $totalStudents = $_POST["TotalStudents"];
    $spaceForStudents = $_POST["SpaceForStudents"];
    $studentsWithRentPending = $_POST["StudentsWithRentPending"];

    $sql = "UPDATE roomdetails SET 
            TotalRooms='$totalRooms', 
            RoomsFilled='$roomsFilled', 
            Rent='$rent', 
            TotalStudents='$totalStudents', 
            SpaceForStudents='$spaceForStudents', 
            StudentsWithRentPending='$studentsWithRentPending'";

    if ($conn->query($sql) === TRUE) {
        $message = "Room details updated successfully.";
    } else {
        $message = "Error updating record: " . $conn->error;
    }
}

// Fetch current values
$current = $conn->query("SELECT * FROM roomdetails LIMIT 1");
$data = $current->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Room Details</title>
    <style>
        body {
            background-color: #f6f8fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 50px;
            margin: 0;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
        }

        .container {
            max-width: 600px;
            background: #ffffff;
            margin: 40px auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        label {
            font-weight: 500;
            display: block;
            margin-top: 20px;
            color: #333;
        }

        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 16px;
            background-color: #f9fafb;
        }

        button {
            margin-top: 30px;
            background-color: #2563eb;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #1e40af;
        }

        .message {
            text-align: center;
            margin-top: 20px;
            color: #10b981;
            font-weight: bold;
        }

        .back-link {
            position: absolute;
            top: 20px;
            right: 40px;
            background-color: #6b7280;
            color: white;
            padding: 10px 18px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }

        .back-link:hover {
            background-color: #4b5563;
        }
    </style>
</head>
<body>

<a href="ownerdashboard.php" class="back-link">← Back</a>

<h1>Update Room Details</h1>

<?php if (isset($message)) echo "<div class='message'>$message</div>"; ?>

<div class="container">
    <form method="post" action="">
        <label for="TotalRooms">Total Rooms</label>
        <input type="number" id="TotalRooms" name="TotalRooms" value="<?= $data['TotalRooms'] ?>" required>

        <label for="RoomsFilled">Rooms Filled</label>
        <input type="number" id="RoomsFilled" name="RoomsFilled" value="<?= $data['RoomsFilled'] ?>" required>

        <label for="Rent">Rent (₹)</label>
        <input type="number" id="Rent" name="Rent" value="<?= $data['Rent'] ?>" required>

        <label for="TotalStudents">Total Students</label>
        <input type="number" id="TotalStudents" name="TotalStudents" value="<?= $data['TotalStudents'] ?>" required>

        <label for="SpaceForStudents">Space for Students</label>
        <input type="number" id="SpaceForStudents" name="SpaceForStudents" value="<?= $data['SpaceForStudents'] ?>" required>

        <label for="StudentsWithRentPending">Students with Rent Pending</label>
        <input type="number" id="StudentsWithRentPending" name="StudentsWithRentPending" value="<?= $data['StudentsWithRentPending'] ?>" required>

        <button type="submit">Update</button>
    </form>
</div>

</body>
</html>

<?php
$conn->close();
?>
