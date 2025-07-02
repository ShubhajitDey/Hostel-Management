<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact Us</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(to right, #f0f4f7, #d9e2ec);
      margin: 0;
      padding: 0;
    }

    .back-button {
      position: absolute;
      top: 20px;
      right: 20px;
      background-color: #007BFF;
      color: white;
      padding: 10px 15px;
      border-radius: 5px;
      text-decoration: none;
      font-size: 14px;
      transition: 0.3s;
    }

    .back-button:hover {
      background-color: #0056b3;
    }

    .container {
      display: flex;
      justify-content: center;
      align-items: flex-start;
      padding: 80px 40px;
      gap: 40px;
    }

    .form-section,
    .info-section {
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 500px;
    }

    h2 {
      margin-bottom: 20px;
      color: #333;
    }

    form input,
    form textarea {
      width: 100%;
      padding: 10px;
      margin: 10px 0 20px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 15px;
    }

    form textarea {
      height: 120px;
      resize: none;
    }

    form button {
      padding: 10px 20px;
      border: none;
      background-color: #007BFF;
      color: white;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
    }

    form button:hover {
      background-color: #0056b3;
    }

    .info-section p {
      font-size: 16px;
      margin: 10px 0;
      color: #444;
    }

    .info-section p span {
      font-weight: bold;
    }

    @media (max-width: 768px) {
      .container {
        flex-direction: column;
        align-items: center;
        padding: 60px 20px;
      }

      .form-section,
      .info-section {
        width: 100%;
        max-width: 600px;
      }
    }
  </style>

  <script>
    function sendMail() {
      const name = document.getElementById("name").value.trim();
      const email = document.getElementById("email").value.trim();
      const title = document.getElementById("title").value.trim();
      const content = document.getElementById("message").value.trim();

      const mailtoLink =
        `https://mail.google.com/mail/?view=cm&fs=1&to=narijit785@gmail.com` +
        `&su=${encodeURIComponent(title)}` +
        `&body=${encodeURIComponent("Name: " + name + "\nEmail: " + email + "\n\n" + content)}`;

      window.open(mailtoLink, "_blank");
    }
  </script>
</head>

<body>

<a href="homepage.php" class="back-button">← Back to Home</a>

<div class="container">
  <!-- Contact Form Section -->
  <div class="form-section">
    <h2>Send a Message</h2>
    <form onsubmit="sendMail(); return false;">
      <input type="text" id="name" placeholder="Your Name" required>
      <input type="email" id="email" placeholder="Your Email" required>
      <input type="text" id="title" placeholder="Message Title" required>
      <textarea id="message" placeholder="Your Message" required></textarea>
      <button type="submit">Send</button>
    </form>
  </div>

  <!-- Contact Info Section -->
  <div class="info-section">
    <h2>Contact Details</h2>
    <p><span>Name:</span> Arijit Nandi </p>
    <p><span>Phone:</span> 7601866237 </p>
    <p><span>Email:</span> narijit785@gmail.com </p>
    <p><span>Address:</span> Rakshatpur , Raghunathpur ,Purulia ,723133</p>
  </div>
</div>

</body>
</html>
