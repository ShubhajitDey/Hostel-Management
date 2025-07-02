<?php
include("db_connection.php");

$login_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : '';
    $password = isset($_POST['password']) ? mysqli_real_escape_string($conn, $_POST['password']) : '';

    if (!empty($email) && !empty($password)) {
        // Check owner login
        $sql_owner = "SELECT * FROM owner WHERE email='$email' AND password='$password'";
        $result_owner = $conn->query($sql_owner);

        // Check student login
        $sql_register = "SELECT * FROM register WHERE Email='$email' AND Password='$password'";
        $result_register = $conn->query($sql_register);

        if ($result_owner->num_rows > 0) {
            // Redirect to owner dashboard
            header("Location: ownerdashboard.php");
            exit();
        } elseif ($result_register->num_rows > 0) {
            // Redirect to student dashboard
            header("Location: student_dashboard.php");
            exit();
        } else {
            $login_error = "Invalid email or password!";
        }
    } else {
        $login_error = "All fields are required!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Login</title>
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
        background: url('image2.jpg') no-repeat center center fixed;
        background-size: cover;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        overflow: hidden;
    }
    .overlay {
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background-color: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(5px);
        z-index: 1;
    }
    .container {
        width: 100%;
        max-width: 600px;
        background-color: white;
        padding: 50px;
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
        margin: 20px 0;
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
        padding: 20px;
        font-size: 16px;
    }
    .btn_field {
        width: 100%;
        display: flex;
        justify-content: center;
    }
    .btn_field button {
        width: 100%;
        max-width: 250px;
        background: blue;
        color: white;
        height: 45px;
        border-radius: 20px;
        border: 0;
        outline: 0;
        cursor: pointer;
        transition: background 0.3s;
        font-size: 18px;
    }
    .btn_field button:hover {
        background: darkblue;
    }
    p {
        color: red;
        margin-top: 20px;
        font-weight: bold;
    }
</style>
</head>
<body>
    <div class="overlay"></div>
    <div class="container">
        <h1>Login</h1>
        <div class="underline"></div>
        <form method="POST" action="">
            <div class="input_field">
                <input type="email" name="email" placeholder="Email" required />
            </div>
            <div class="input_field">
                <input type="password" name="password" placeholder="Password" required />
            </div>
            <div class="btn_field">
                <button type="submit">Login</button>
            </div>
        </form>
        <?php if (!empty($login_error)): ?>
            <p><?= htmlspecialchars($login_error) ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
