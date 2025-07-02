<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hostel";  // Change to your actual DB name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert notice if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $serial = $_POST['serial'];
    $date = $_POST['date'];
    $content = $_POST['noticeContent'];

    $stmt = $conn->prepare("INSERT INTO notice (SL_No, Date, Content) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $serial, $date, $content);
    $stmt->execute();
    $stmt->close();
}

// Fetch all notices
$notices = [];
$sql = "SELECT * FROM notice ORDER BY SL_No DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $notices[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel Management - Notice Board</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* keep your entire CSS unchanged (same as above) */
        /* paste your original CSS here without modification */
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
            display: inline-block;
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
            font-weight: 500;
            display: inline-block;
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
        .date-time {
            font-size: 18px;
            color: #555;
        }
        .form-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }
        .form-container h2 {
            margin-bottom: 20px;
            color: #2C3E50;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input, .form-group textarea {
            width: 90%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-group textarea {
            resize: vertical;
        }
        .form-group button {
            padding: 10px 20px;
            background-color: #2980B9;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
            font-weight: 500;
        }
        .form-group button:hover {
            background-color: #1A5276;
            transform: scale(1.05);
        }
        .notice-board {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        .notice-board h2 {
            margin-bottom: 20px;
            color: #2C3E50;
        }
        .notice {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }
        .notice .date {
            font-size: 14px;
            color: #555;
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

        <div class="form-container">
            <h2>Create Notice</h2>
            <form id="noticeForm" method="POST" action="">
                <div class="form-group">
                    <label for="serial">Serial No.</label>
                    <input type="text" id="serial" name="serial" required>
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" id="dateInput" name="date" required>
                </div>
                <div class="form-group">
                    <label for="noticeContent">Notice</label>
                    <textarea id="noticeContent" name="noticeContent" rows="5" required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit">Submit</button>
                </div>
            </form>
        </div>

        <div class="notice-board" id="noticeBoardContainer">
            <h2>Notice Board</h2>
            <div id="noticeBoard">
                <?php foreach ($notices as $notice): ?>
                    <div class="notice">
                        <div class="date"><?php echo htmlspecialchars($notice['Date']); ?></div>
                        <div class="content"><?php echo nl2br(htmlspecialchars($notice['Content'])); ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>
</html>
