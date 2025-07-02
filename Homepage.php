<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap');
        footer{
            position: fixed;
            left: 0;
            bottom: 0;
        }
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background-color: #e0f7fa; /* Light blue background color */
            display: flex;
            flex-direction: column;
            height: 100vh;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #333;
            color: white;
            padding: 5px 15px;
            height: 40px;
        }
        header h1 {
            font-size: 18px;
            margin: 0;
        }
        header nav {
            display: flex;
        }
        header nav a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            font-size: 14px;
        }
        .container {
            display: flex;
            flex: 1;
        }
        .sidebar {
            width: 220px;
            background-color: #2c3e50;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0,0,0,0.2);
            color: white;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
        .sidebar a {
            display: flex;
            align-items: center;
            width: 100%;
            padding: 15px 20px;
            margin-bottom: 10px;
            text-decoration: none;
            color: white;
            background-color: #34495e;
            border-radius: 5px;
            transition: background 0.3s, transform 0.3s;
            font-size: 16px;
            font-weight: bold;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .sidebar a:hover {
            background-color: #1abc9c;
            transform: scale(1.05);
        }
        .sidebar a i {
            margin-right: 10px;
        }
        .sidebar .submenu {
            display: none;
            width: 100%;
            padding-left: 20px;
            margin-top: 5px; /* Reduced margin */
        }
        .submenu span {
            display: block;
            background-color: #3b4a5a;
            color: white;
            padding: 10px;
            margin-bottom: 5px;
            border-radius: 5px;
        }
        .main-content {
            flex: 1;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .main-content h2 {
            font-family: 'Roboto', sans-serif; /* Formal font */
            font-size: 36px;
            margin-bottom: 20px;
            margin-left: 40px; /* Moved slightly to the right */
            align-self: flex-start;
        }
        .slider {
            position: relative;
            width: 100%;
            max-width: 900px;
            height: 600px;
            margin: 0 auto;
            overflow: hidden;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .slides {
            display: flex;
            transition: transform 1s ease-in-out;
            height: 100%;
        }
        .slides img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            border-radius: 10px;
        }
        .slider-button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0,0,0,0.5);
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 50%;
            z-index: 10;
        }
        .slider-button.left {
            left: 10px;
        }
        .slider-button.right {
            right: 10px;
        }
        .footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: absolute;
            bottom: 0;
            width: 100%;
        }
        .footer p {
            margin: 0;
            font-size: 14px;
        }
        .footer .social-icons {
            margin-top: 10px;
        }
        .footer .social-icons a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
            font-size: 20px;
        }
        .map-container {
            width: 100%;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-radius: 10px;
            margin-top: 20px;
            text-align: center;
        }
        .map-container iframe {
            width: 100%;
            height: 300px;
            border: none;
            border-radius: 10px;
        }
        .map-container a {
            display: block;
            margin: 10px auto 0 auto;
            width: fit-content;
            background-color: #2c3e50;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let index = 0;
            const slides = document.querySelectorAll('.slides img');
            const totalImages = slides.length;

            function showSlide(i) {
                slides.forEach((img, idx) => {
                    img.style.display = idx === i ? 'block' : 'none';
                });
            }

            function nextSlide() {
                index = (index + 1) % totalImages;
                showSlide(index);
            }

            function prevSlide() {
                index = (index - 1 + totalImages) % totalImages;
                showSlide(index);
            }

            document.querySelector('.slider-button.right').addEventListener('click', nextSlide);
            document.querySelector('.slider-button.left').addEventListener('click', prevSlide);

            setInterval(nextSlide, 3000); // Change slide every 3 seconds

            // Initialize the first slide
            showSlide(index);

            // Toggle Facilities submenu
            document.getElementById('facilitiesToggle').addEventListener('click', function() {
                const submenu = document.getElementById('facilitiesSubmenu');
                submenu.style.display = submenu.style.display === 'block' ? 'none' : 'block';
            });
        });
    </script>
</head>
<body>
    <header>
        <h1>Hostel Management</h1>
        <nav>
            <a href="contactus.php">Contact Us</a>
            <a href="aboutus.php">About Us</a>
        </nav>
    </header>
    <div class="container">
        <div class="sidebar">
            <a href="register.php"><i class="fas fa-user-plus"></i> New Admission</a>
            <a href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a>
            <a id="facilitiesToggle"><i class="fas fa-concierge-bell"></i> Facilities</a>
            <div class="submenu" id="facilitiesSubmenu">
                <span>No Electric Charge</span>
                <span>24*7 Water Supply</span>
                <span>100 metre away from bus stand</span>
                <span>6 km away from rail station</span>
            </div>
            <a href="canteen.php"><i class="fas fa-utensils"></i> Canteen</a>
            <a href="#address"><i class="fas fa-map-marker-alt"></i> Address</a>
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29239.157003048547!2d87.54667405123816!3d22.748775496675634!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f7a07d942c024f%3A0x6df56f6ed5fc54b0!2sSarbari%2C%20West%20Bengal!5e0!3m2!1sen!2sin!4v1630912423181!5m2!1sen!2sin" allowfullscreen="" loading="lazy"></iframe>
                <a href="https://www.google.com/maps/dir/?api=1&destination=MR26+J95+Sarbari,+West+Bengal" target="_blank">Open in Maps</a>
            </div>
        </div>
        <div class="main-content">
            <h2 style="margin-left: 40px; align-self: flex-start;">Jay Bangla Hostel</h2>
            <div class="slider">
                <button class="slider-button left">&lt;</button>
                <div class="slides">
                    <img src="image1.jpg" alt="Hostel Image 1">
                    <img src="image2.jpg" alt="Hostel Image 2">
                    <img src="image3.jpeg" alt="Hostel Image 3">
                    <!-- <img src="image4.jpg" alt="Hostel Image 4">
                    <img src="images5.jpeg" alt="Hostel Image 5"> -->
                    <img src="image7.jpg" alt="Hostel Image 6">
                </div>
                <button class="slider-button right">&gt;</button>
            </div>
        </div>
    </div>
    <div class="footer">
        <p>Hostel Management System | All rights reserved</p>
        <div class="social-icons">
            <a href="https://facebook.com"><i class="fab fa-facebook-f"></i></a>
            <a href="https://twitter.com"><i class="fab fa-twitter"></i></a>
            <a href="https://instagram.com"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
</body>
</html>
