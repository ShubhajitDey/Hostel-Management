<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 20px;
            background: linear-gradient(to right, #f4f4f4, #e0e0e0);
            position: relative;
        }

        h1 {
            color: #333;
            margin-bottom: 10px;
        }

        .back-button {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 16px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: #0056b3;
        }

        .team-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 60px;
        }

        .team-member {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            width: 250px;
            text-align: center;
        }

        .team-member img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
        }

        .team-member h3 {
            margin: 10px 0 5px;
            color: #333;
        }

        .team-member p {
            color: #777;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 10px;
        }

        .social-links a {
            text-decoration: none;
            font-size: 24px;
        }

        .facebook {
            color: #1877F2;
        }

        .instagram {
            color: #E4405F;
        }

        .social-links a:hover {
            opacity: 0.8;
        }
    </style>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

    <!-- Back Button -->
    <a href="homepage.php" class="back-button">← Back to Home</a>

    <h1>Meet Our Team</h1>
    <p>We are a passionate group of developers, designers, and innovators.</p>

    <div class="team-container">
        <!-- Member 1 -->
        <div class="team-member">
            <img src="AnkitC.jpg" alt="Ankit Chakrabortty">
            <h3>Arijit Nandi</h3>
            <p>Team Leader + Frontend Developer</p>
            <div class="social-links">
                <a class="facebook" href="https://facebook.com/ankitsharma" target="_blank"><i class="fab fa-facebook"></i></a>
                <a class="instagram" href="https://instagram.com/ankitsharma" target="_blank"><i class="fab fa-instagram"></i></a>
            </div>
        </div>

        <!-- Member 2 -->
        <div class="team-member">
            <img src="Rajesh.png" alt="Rajesh Mandal">
            <h3>Shubhajit Dey</h3>
            <p>Frontend Developer</p>
            <div class="social-links">
                <a class="facebook" href="https://facebook.com/priyaverma" target="_blank"><i class="fab fa-facebook"></i></a>
                <a class="instagram" href="https://instagram.com/priyaverma" target="_blank"><i class="fab fa-instagram"></i></a>
            </div>
        </div>

        <!-- Member 3 -->
        <div class="team-member">
            <img src="Harsh.jpg" alt="Harsh Srivastav">
            <h3>Shubhajit Nandii</h3>
            <p>Backnend Developer</p>
            <div class="social-links">
                <a class="facebook" href="https://facebook.com/rahulsingh" target="_blank"><i class="fab fa-facebook"></i></a>
                <a class="instagram" href="https://instagram.com/rahulsingh" target="_blank"><i class="fab fa-instagram"></i></a>
            </div>
        </div>

        <!-- Member 4 -->
        <div class="team-member">
            <img src="Munmun.jpg" alt="Munmun Sen">
            <h3>Mirajuddin Ansary</h3>
            <p>Backend Developer</p>
            <div class="social-links">
                <a class="facebook" href="https://facebook.com/nehapatel" target="_blank"><i class="fab fa-facebook"></i></a>
                <a class="instagram" href="https://instagram.com/nehapatel" target="_blank"><i class="fab fa-instagram"></i></a>
            </div>
        </div>

        <!-- Member 5 -->
        <div class="team-member">
            <img src="AnkitP.jpg" alt="Ankit Kumar Pathak">
            <h3>Ruby Mahato</h3>
            <p>UI Design</p>
            <div class="social-links">
                <a class="facebook" href="https://facebook.com/vikramrao" target="_blank"><i class="fab fa-facebook"></i></a>
                <a class="instagram" href="https://instagram.com/vikramrao" target="_blank"><i class="fab fa-instagram"></i></a>
            </div>
        </div>

        <!-- Member 6 -->
        <div class="team-member">
            <img src="UttamDa.jpg" alt="Uttam Roy">
            <h3>Nupur Singha</h3>
            <p>Tester</p>
            <div class="social-links">
                <a class="facebook" href="https://facebook.com/simrankaur" target="_blank"><i class="fab fa-facebook"></i></a>
                <a class="instagram" href="https://instagram.com/simrankaur" target="_blank"><i class="fab fa-instagram"></i></a>
            </div>
        </div>

        <!-- Member 7 -->
        <div class="team-member">
            <img src="Pabitra.jpg" alt="Pabitra Mandal">
            <h3>Barsha Har</h3>
            <p>Database Design & Implementation</p>
            <div class="social-links">
                <a class="facebook" href="https://facebook.com/arjunmehta" target="_blank"><i class="fab fa-facebook"></i></a>
                <a class="instagram" href="https://instagram.com/arjunmehta" target="_blank"><i class="fab fa-instagram"></i></a>
            </div>
        </div>

        <!-- Member 8 -->
        <div class="team-member">
            <img src="Suman.jpg" alt="Suman Das">
            <h3>Reba Sahis</h3>
            <p>Database Design & Implementation</p>
            <div class="social-links">
                <a class="facebook" href="https://facebook.com/sanyakapoor" target="_blank"><i class="fab fa-facebook"></i></a>
                <a class="instagram" href="https://instagram.com/sanyakapoor" target="_blank"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>

</body>
</html>
