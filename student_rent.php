<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hostel"; // Replace with your actual DB name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Hardcoded contact number for now
$contact = "7854000000"; // <-- Match with your uploaded screenshot

$sql = "SELECT * FROM rentdetails WHERE Contact = '$contact' ORDER BY Year, 
        FIELD(Month, 'January','February','March','April','May','June',
        'July','August','September','October','November','December')";

$result = $conn->query($sql);

// Calculate total due dynamically
$totalDueAmount = 0;
$dueCount = 0;
$rows = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
        if (strtolower($row['PaymentStatus']) === 'due') {
            $dueCount++;
        }
    }
    $totalDueAmount = $dueCount * 1200; // 800 INR per due month
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Hostel Management - Rent Info</title>
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
      cursor: pointer;
      transition: background-color 0.3s, transform 0.3s;
      font-weight: 500;
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
      text-align: center;
    }
    th {
      background-color: #2980B9;
      color: white;
    }
    .pay-button {
      padding: 10px 20px;
      background-color: #2980B9;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s, transform 0.3s;
      font-weight: 500;
      margin-top: 20px;
      display: block;
      width: 150px;
      margin-left: auto;
      margin-right: auto;
    }
    .pay-button:hover {
      background-color: #1A5276;
      transform: scale(1.05);
    }
    .qr-code {
      display: none;
      text-align: center;
      margin-top: 30px;
    }
    .qr-code img {
      width: 200px;
      height: 200px;
    }
    .total-due {
      font-size: 18px;
      font-weight: bold;
      margin-top: 10px;
      color: #2980B9;
    }
  </style>
</head>
<body>
  <div class="navbar">
    <div class="nav-links">
      <a href="student_dashboard.html">Dashboard</a>
      <a href="student_rent.php">Rent info</a>
      <a href="student_feedback.html">Problems/Feedback</a>
    </div>
    <a href="homepage.html" class="home-button">Home</a>
  </div>

  <div class="container">
    <div class="date-time-home">
      <div class="date-time">
        <span id="date"></span> | <span id="time"></span>
      </div>
    </div>

    <table>
      <thead>
        <tr>
          <th>Name</th>
          <th>Contact</th>
          <th>Email</th>
          <th>Year</th>
          <th>Month</th>
          <th>Payment Status</th>
          <th>Rent Cleared</th>
          <th>Rent Due</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (!empty($rows)) {
            foreach ($rows as $row) {
                echo "<tr>
                        <td>{$row['Name']}</td>
                        <td>{$row['Contact']}</td>
                        <td>{$row['Email']}</td>
                        <td>{$row['Year']}</td>
                        <td>{$row['Month']}</td>
                        <td>{$row['PaymentStatus']}</td>
                        <td>{$row['RentCleared']}</td>
                        <td>{$row['RentDue']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No rent records found.</td></tr>";
        }
        ?>
      </tbody>
    </table>

    <input type="hidden" id="totalRentDue" value="<?php echo $totalDueAmount; ?>">

    <button class="pay-button" onclick="showQRCode()">Pay Now</button>
    <div class="qr-code" id="qrCodeContainer">
      <div id="qrCodeAmount"></div>
      <img id="qrCodeImage" alt="QR Code">
      <div class="total-due" id="totalDue"></div>
      <button class="pay-button" onclick="closeQRCode()">Close</button>
    </div>
  </div>

  <script>
    function updateDateTime() {
      const now = new Date();
      document.getElementById('date').innerText = now.toLocaleDateString();
      document.getElementById('time').innerText = now.toLocaleTimeString();
    }
    setInterval(updateDateTime, 1000);
    window.onload = updateDateTime;

    function showQRCode() {
      const total = document.getElementById('totalRentDue').value;
      document.getElementById('qrCodeContainer').style.display = 'block';
      document.getElementById('qrCodeAmount').innerText = `Pay ${total} INR`;
      document.getElementById('totalDue').innerText = `Total Due: ${total} INR`;
      document.getElementById('qrCodeImage').src = 'HORIBOL.jpeg'; // Make sure this image exists
    }

    function closeQRCode() {
      document.getElementById('qrCodeContainer').style.display = 'none';
    }
  </script>
</body>
</html>
