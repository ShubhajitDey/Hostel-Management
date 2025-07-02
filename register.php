<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
            box-sizing: border-box;
        }
        body {
            width: 100%;
            height: 100vh;
            background: url('image1.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(5px);
            z-index: 1;
        }
        .container {
            width: 90%;
            max-width: 600px;
            background-color: white;
            padding: 40px;
            text-align: center;
            border-radius: 10px;
            box-shadow: -2px 2px 15px rgba(0, 0, 0, 0.5);
            z-index: 2;
            position: relative;
        }
        .container h1 {
            font-size: 30px;
            color: blue;
        }
        .underline {
            width: 30px;
            height: 4px;
            background-color: blue;
            margin: 10px auto 20px auto;
            border-radius: 5px;
        }
        .input_field {
            background: #eaeaea;
            margin: 15px 0;
            border-radius: 10px;
            display: flex;
            align-items: center;
            overflow: hidden;
        }
        .input_field input {
            width: 100%;
            background: transparent;
            border: 0;
            outline: 0;
            padding: 15px;
        }
        .btn_field {
            width: 100%;
            display: flex;
            justify-content: center;
        }
        .btn_field button {
            width: 100%;
            max-width: 200px;
            background: blue;
            color: white;
            height: 40px;
            border-radius: 20px;
            border: 0;
            outline: 0;
            cursor: pointer;
            transition: background 0.3s;
        }
        .btn_field button:hover {
            background: darkgreen;
        }
    </style>
</head>
<body>
    <div class="overlay"></div>
    <div class="container">
        <h1>Student Registration</h1>
        <div class="underline"></div>
        <form method="POST" action="">
            <div class="input_field">
                <input type="text" name="name" placeholder="Student Name" required>
            </div>
            <div class="input_field">
                <input type="text" name="fathername" placeholder="Father's Name" required>
            </div>
            <div class="input_field">
                <input type="text" name="address" placeholder="Address" required>
            </div>
            <div class="input_field">
                <input type="tel" name="contact" placeholder="Contact No" required>
            </div>
            <div class="input_field">
                <input type="tel" name="guardiancontact" placeholder="Guardian Contact No" required>
            </div>
            <div class="input_field">
                <input type="text" name="college" placeholder="College" required>
            </div>
            <div class="input_field">
                <input type="text" name="dept" placeholder="Department" required>
            </div>
            <div class="input_field">
                <input type="text" name="semester" placeholder="Semester" required>
            </div>
            <div class="input_field">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="input_field">
                <input type="password" name="password" placeholder="Create Password" required>
            </div>
            <div class="btn_field">
                <button type="submit">Register</button>
            </div>
            <p style="margin-top: 15px;">Already registered? <a href="login.php" style="color: blue; text-decoration: underline;">Login here</a></p>
        </form>

        <?php
        // Include the database connection file
        include("db_connection.php");

        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Use isset() to check if keys exist
            $name = isset($_POST['name']) ? trim($_POST['name']) : '';
            $fathername = isset($_POST['fathername']) ? trim($_POST['fathername']) : '';
            $address = isset($_POST['address']) ? trim($_POST['address']) : '';
            $contact = isset($_POST['contact']) ? trim($_POST['contact']) : '';
            $guardiancontact = isset($_POST['guardiancontact']) ? trim($_POST['guardiancontact']) : '';
            $college = isset($_POST['college']) ? trim($_POST['college']) : '';
            $dept = isset($_POST['dept']) ? trim($_POST['dept']) : '';
            $semester = isset($_POST['semester']) ? trim($_POST['semester']) : '';
            $email = isset($_POST['email']) ? trim($_POST['email']) : '';
            $password = isset($_POST['password']) ? trim($_POST['password']) : '';

            // Validate inputs
            if (!empty($name) && !empty($fathername) && !empty($address) && !empty($contact) &&
                !empty($guardiancontact) && !empty($college) && !empty($dept) &&
                !empty($semester) && !empty($email) && !empty($password)) {

                // Sanitize inputs
                $name = mysqli_real_escape_string($conn, $name);
                $fathername = mysqli_real_escape_string($conn, $fathername);
                $address = mysqli_real_escape_string($conn, $address);
                $contact = mysqli_real_escape_string($conn, $contact);
                $guardiancontact = mysqli_real_escape_string($conn, $guardiancontact);
                $college = mysqli_real_escape_string($conn, $college);
                $dept = mysqli_real_escape_string($conn, $dept);
                $semester = mysqli_real_escape_string($conn, $semester);
                $email = mysqli_real_escape_string($conn, $email);
                $password = mysqli_real_escape_string($conn, $password);

                // Prepare the SQL query
                $sql = "INSERT INTO register (Name, Fathername, Address, ContactNo, GuardianContactNo, College, Dept, Semester, Email, Password) 
                        VALUES ('$name', '$fathername', '$address', '$contact', '$guardiancontact', '$college', '$dept', '$semester', '$email', '$password')";

                // Execute the query
                if ($conn->query($sql) === TRUE) {
                    echo "<p style='color: green;'>Registration successful!</p>";
                } else {
                    echo "<p style='color: red;'>Error: " . $conn->error . "</p>";
                }
            } else {
                echo "<p style='color: red;'>All fields are required!</p>";
            }
        }
        ?>
    </div>
</body>
</html>