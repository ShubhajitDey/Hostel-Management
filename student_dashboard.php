<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hostel";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch room details
$sql = "SELECT * FROM roomdetails LIMIT 1";
$result = $conn->query($sql);

$total_rooms = $rooms_filled = $rent = $total_students = $space_for_students = $students_with_rent_pending = 0;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_rooms = $row['TotalRooms'];
    $rooms_filled = $row['RoomsFilled'];
    $rent = $row['Rent'];
    $total_students = $row['TotalStudents'];
    $space_for_students = $row['SpaceForStudents'];
    $students_with_rent_pending = $row['StudentsWithRentPending'];
}

$rooms_available = $total_rooms - $rooms_filled;
$rooms_percentage = $total_rooms > 0 ? round(($rooms_filled / $total_rooms) * 100, 2) : 0;
$students_capacity = $space_for_students;
$students_percentage = $students_capacity > 0 ? round(( $students_capacity / $total_students) * 100, 2) : 0;

// Fetch notices
$notices = [];
$notice_sql = "SELECT * FROM notice ORDER BY SL_No DESC";
$notice_result = $conn->query($notice_sql);
if ($notice_result->num_rows > 0) {
    while ($notice_row = $notice_result->fetch_assoc()) {
        $notices[] = $notice_row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* CSS remains unchanged */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7fa;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .navbar {
            background: linear-gradient(90deg, #2C3E50, #4A6E8C);
            padding: 15px 30px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }
        .navbar a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            margin-right: 15px;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.3s;
            font-weight: 500;
        }
        .navbar a:hover {
            background-color: #34495E;
            transform: scale(1.05);
        }
        .home-button {
            padding: 10px 20px;
            background-color: #2980B9;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }
        .home-button:hover {
            background-color: #1A5276;
            transform: scale(1.05);
        }
        .container {
            padding: 30px;
            max-width: 1200px;
            margin: auto;
        }
        .date-time-home {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #2980B9;
            padding-bottom: 10px;
        }
        .info-box {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            width: 45%;
            float: left;
        }
        .section-title {
            font-size: 24px;
            margin-bottom: 20px;
            color: #2C3E50;
        }
        .info-item {
            margin-bottom: 20px;
            font-size: 18px;
        }
        .info-item span {
            font-weight: bold;
            color: #2980B9;
        }
        .progress-bar-container {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .progress-bar {
            flex-grow: 1;
            background-color: #e0e0e0;
            border-radius: 10px;
            overflow: hidden;
        }
        .progress-bar-fill {
            display: block;
            height: 20px;
            background-color: #2980B9;
            text-align: center;
            line-height: 20px;
            color: white;
            transition: width 0.5s ease;
        }
        .progress-value {
            font-size: 16px;
            font-weight: bold;
            color: #2980B9;
        }
        .notice-board {
            clear: both;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        .notice-board .notice {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }
        .notice .date {
            font-size: 14px;
            color: #555;
        }
        .owner-details {
            margin-left: 10px;
        }
    </style>
    <script>
        function updateDateTime() {
            const now = new Date();
            document.getElementById('date').innerText = now.toLocaleDateString();
            document.getElementById('time').innerText = now.toLocaleTimeString();
        }

        function updateProgressBar(id, percentage, label) {
            document.getElementById(id).style.width = percentage + '%';
            document.getElementById(id + 'Value').innerText = label + ' (' + percentage + '%)';
        }

        setInterval(updateDateTime, 1000);
        window.onload = function() {
            updateDateTime();
            updateProgressBar('roomsFilled', <?= $rooms_percentage ?>, '<?= $rooms_filled ?>/<?= $total_rooms ?> Rooms Filled');
            updateProgressBar('studentsCount', <?= $students_percentage ?>, '<?= $total_students ?>/<?= $students_capacity ?> Students');
        };
    </script>
</head>
<body>
    <div class="navbar">
        <div class="nav-links">
            <a href="student_dashboard.php">Dashboard</a>
            <a href="student_rent.php">Rent info</a>
            <a href="student_feedback.php">Problems/Feedback</a>
        </div>
        <a href="homepage.php" class="home-button">Home</a>
    </div>
    <div class="container">
        <div class="date-time-home">
            <div class="date-time">
                <span id="date"></span> | <span id="time"></span>
            </div>
        </div>
        <div class="info-box">
            <div class="section-title">Hostel Details</div>
            <div class="info-item">
                <span>Rooms Filled:</span>
                <div class="progress-bar-container">
                    <div class="progress-bar">
                        <span id="roomsFilled" class="progress-bar-fill"></span>
                    </div>
                    <span class="progress-value" id="roomsFilledValue"></span>
                </div>
            </div>
            <div class="info-item">
                <span>Total Students:</span>
                <div class="progress-bar-container">
                    <div class="progress-bar">
                        <span id="studentsCount" class="progress-bar-fill"></span>
                    </div>
                    <span class="progress-value" id="studentsCountValue"></span>
                </div>
            </div>
            <div class="info-item"><span>Rooms Available:</span> <?= $rooms_available ?></div>
            <div class="info-item"><span>Rent:</span> ₹<?= $rent ?>/head</div>
            <div class="info-item"><span>Space for Students:</span> <?= $space_for_students ?></div>
            <div class="info-item"><span>Students With Rent Pending:</span> <?= $students_with_rent_pending ?></div>
        </div>
        <div class="info-box owner-details">
            <div class="section-title">Owner Details</div>
            <div class="info-item"><span>Name:</span> Jogendra Garain </div>
            <div class="info-item"><span>Contact:</span> 9153159313 </div>
            <div class="info-item"><span>Email:</span> jgorain123@gmail.com</div>
            <div class="info-item"><span>Address:</span> Sarbari, Neturia, West Bengal, 723121</div>
        </div>
        <div class="notice-board">
            <div class="section-title">Notice Board</div>
            <?php foreach ($notices as $notice): ?>
                <div class="notice">
                    <div class="date"><?= htmlspecialchars($notice['Date']) ?></div>
                    <div class="content"><?= htmlspecialchars($notice['Content']) ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
