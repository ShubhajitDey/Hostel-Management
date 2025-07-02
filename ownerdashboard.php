<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "hostel";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM roomdetails LIMIT 1";
$result = $conn->query($sql);
$data = $result->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel Management - Owner Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Your CSS - unchanged */
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
        .date-time {
            font-size: 18px;
            color: #555;
        }
        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }
        .card {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
            position: relative;
            overflow: hidden;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
        }
        .card h3 {
            margin-bottom: 10px;
            color: #2C3E50;
            font-size: 20px;
        }
        .card p {
            font-size: 36px;
            color: #2980B9;
            font-weight: bold;
        }
        .home-button, .update-button {
            padding: 10px 20px;
            background-color: #2980B9;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
            font-weight: 500;
        }
        .home-button:hover, .update-button:hover {
            background-color: #1A5276;
            transform: scale(1.05);
        }
        .update-button-container {
            text-align: center;
            margin-top: 30px;
        }
        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(41, 128, 185, 0.1);
            border-radius: 10px;
            z-index: 0;
            transition: opacity 0.3s;
            opacity: 0;
        }
        .card:hover::before {
            opacity: 1;
        }
    </style>
    <script>
        function updateDateTime() {
            const now = new Date();
            const date = now.toLocaleDateString();
            const time = now.toLocaleTimeString();
            document.getElementById('date').innerText = date;
            document.getElementById('time').innerText = time;
        }

        setInterval(updateDateTime, 1000);
        window.onload = updateDateTime;
    </script>
</head>
<body>
    <div class="navbar">
        <div class="nav-links">
            <a href="ownerdashboard.php">Dashboard</a>
            <a href="ownerstudents.php">Students</a>
            <a href="ownerproblem.php">Problems/Feedback</a>
            <a href="ownernotice.php">Notices</a>
        </div>
        <a href="homepage.php" class="home-button">Home</a>
    </div>

    <div class="container">
        <div class="date-time-home">
            <div class="date-time">
                <span id="date"></span> | <span id="time"></span>
            </div>
        </div>

        <div class="cards">
            <div class="card">
                <h3>Total Rooms</h3>
                <p><?= $data['TotalRooms'] ?></p>
            </div>
            <div class="card">
                <h3>Rooms Filled</h3>
                <p><?= $data['RoomsFilled'] ?></p>
            </div>
            <div class="card">
                <h3>Rent</h3>
                <p><?= $data['Rent'] ?>/head</p>
            </div>
            <div class="card">
                <h3>Total Students</h3>
                <p><?= $data['TotalStudents'] ?></p>
            </div>
            <div class="card">
                <h3>Space for Students</h3>
                <p><?= $data['SpaceForStudents'] ?></p>
            </div>
            <div class="card">
                <h3>Students with Rent Pending</h3>
                <p><?= $data['StudentsWithRentPending'] ?></p>
            </div>
        </div>

        <div class="update-button-container">
            <a href="updateroomdetails.php" class="update-button">Update Details</a>
        </div>
    </div>
</body>
</html>
