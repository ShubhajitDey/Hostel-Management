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

// Fetch data
$sql = "SELECT * FROM canteen";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Canteen Menu</title>
    <style>
        body {
            background: #f3f4f6;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 40px;
            position: relative;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .back-button {
            position: absolute;
            top: 20px;
            right: 40px;
            background-color: #4f46e5;
            color: white;
            padding: 10px 18px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: #3730a3;
        }

        table {
            border-collapse: collapse;
            width: 90%;
            margin: 60px auto 0 auto;
            background-color: #fff;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 15px;
            text-align: center;
        }

        th {
            background-color: #4f46e5;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9fafb;
        }

        tr:hover {
            background-color: #e0e7ff;
        }
    </style>
</head>
<body>

<a href="homepage.php" class="back-button">← Back</a>

<h1>Weekly Canteen Menu</h1>

<table>
    <tr>
        <th>Weekday</th>
        <th>Breakfast</th>
        <th>Lunch</th>
        <th>Tiffin</th>
        <th>Dinner</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . htmlspecialchars($row["Weekdays"]) . "</td>
                    <td>" . htmlspecialchars($row["Breakfast"]) . "</td>
                    <td>" . htmlspecialchars($row["Lunch"]) . "</td>
                    <td>" . htmlspecialchars($row["Tiffin"]) . "</td>
                    <td>" . htmlspecialchars($row["Dinner"]) . "</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No data found</td></tr>";
    }
    ?>

</table>

</body>
</html>

<?php
$conn->close();
?>
