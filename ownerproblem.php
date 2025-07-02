<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel Management - Problems/Feedback</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
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
        .feedback-table-container {
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #2980B9;
            color: white;
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
        <div class="feedback-table-container">
            <table id="feedbackTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Contact Info</th>
                        <th>Feedback/Complaint</th>
                        <th>Type</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Shubhajit Dey</td>
                        <td>9876543210</td>
                        <td>There should be a TV,for entertainment.</td>
                        <td>Feedback</td>
                        <td>01/1/2025</td>
                    </tr>
                    <tr>
                        <td>Arijit Nandi</td>
                        <td>7601866237</td>
                        <td>In the bathroom,the sink has a problem.Please fix it.</td>
                        <td>Complaint</td>
                        <td>06/2/2025</td>
                    </tr>
                    <!-- More feedback entries can be added here -->
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
