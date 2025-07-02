<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel Management - Student Details</title>
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
            max-width: 1400px;
            margin: auto;
        }
        .table-container {
            overflow-x: hidden;
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
        .button-container {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 15px;
        }
        .button-container button {
            padding: 10px 15px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s, transform 0.3s;
        }
        .button-container button:hover {
            transform: scale(1.05);
        }
        .delete-button {
            background-color: #e74c3c;
        }
        .delete-button:hover {
            background-color: #c0392b;
        }
    </style>
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
        <div class="table-container">
            <table id="studentsTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Guardian Name</th>
                        <th>Address</th>
                        <th>Contact No</th>
                        <th>Email</th>
                        <th>Guardian Contact No</th>
                        <th>College</th>
                        <th>Department</th>
                        <th>Year</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                // Include database connection
                include 'db_connection.php';

                // Query to fetch student data
                $query = "SELECT Name, FatherName, Address, ContactNo, Email, GuardianContactNo, College, Dept, Semester FROM register";
                $result = mysqli_query($conn, $query);

                // Check if rows exist
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($row['Name'] ?? '') . '</td>';
                        echo '<td>' . htmlspecialchars($row['FatherName'] ?? '') . '</td>';
                        echo '<td>' . htmlspecialchars($row['Address'] ?? '') . '</td>';
                        echo '<td>' . htmlspecialchars($row['ContactNo'] ?? '') . '</td>';
                        echo '<td>' . htmlspecialchars($row['Email'] ?? '') . '</td>';
                        echo '<td>' . htmlspecialchars($row['GuardianContactNo'] ?? '') . '</td>';
                        echo '<td>' . htmlspecialchars($row['College'] ?? '') . '</td>';
                        echo '<td>' . htmlspecialchars($row['Dept'] ?? '') . '</td>';
                        echo '<td>' . htmlspecialchars($row['Semester'] ?? '') . '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="8">No records found.</td></tr>';
                }
                // Close connection
                mysqli_close($conn);
                ?>
                </tbody>
            </table>
        </div>
        <div class="button-container">
            <button onclick="redirectToUpdate()">Update</button>
            <button class="delete-button" onclick="redirectToDelete()">Delete Students</button>
        </div>
    </div>
    <script>
        // Redirect to update.php when the update button is clicked
        function redirectToUpdate() {
            window.location.href = 'update.php';
        }

        // Redirect to delete.php when the delete button is clicked
        function redirectToDelete() {
            window.location.href = 'delete.php';
        }
        function generateUsername() {
    var name = document.getElementById("name").value;
    var mobile = document.getElementById("mobile").value;
    var username = name.toLowerCase() + mobile.slice(-4); // use last 4 digits of mobile number
    document.getElementById("username").value = username;
  }
    </script>
</body>
</html>