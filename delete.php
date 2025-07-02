<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Student</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .back-button {
            float: right;
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

        .back-button:hover {
            background-color: #1A5276;
            transform: scale(1.05);
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333333;
        }

        label {
            font-weight: bold;
            color: #555555;
            display: block;
            margin-bottom: 10px;
        }

        input {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
            transition: border-color 0.3s ease;
        }

        input:focus {
            border-color: #007BFF;
            outline: none;
        }

        button {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #c0392b;
        }

        .message {
            text-align: center;
            font-size: 16px;
            margin-top: 20px;
        }

        .success {
            color: green;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Delete Student</h2>
        <form action="" method="post">
            <!-- Input for name -->
            <label for="name">Enter Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter the student's name" required>

            <!-- Input for phone number -->
            <label for="phone">Enter Phone Number:</label>
            <input type="text" id="phone" name="phone" placeholder="Enter the student's phone number" required>

            <!-- Submit button -->
            <button type="submit">Delete</button>
        </form>
        <br><a href="ownerstudents.php" class="back-button">Back</a><br>
    </div>

    <?php
    // Include the database connection
    include 'db_connection.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $phone = $_POST['phone'];  // ✅ Correct key name

        // Use both name and phone for safer deletion
        $sql = "DELETE FROM register WHERE Name = ? AND ContactNo = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            echo "<p class='message error'>Error preparing the statement: " . $conn->error . "</p>";
            exit;
        }

        $stmt->bind_param('ss', $name, $phone);  // ✅ Bind both values correctly

        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                echo "<p class='message success'>Student details deleted successfully!</p>";
            } else {
                echo "<p class='message error'>No matching record found.</p>";
            }
        } else {
            echo "<p class='message error'>Error deleting record: " . $stmt->error . "</p>";
        }

        $stmt->close();
        $conn->close();
    }
    ?>
</body>
</html>
