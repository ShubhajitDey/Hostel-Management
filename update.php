<!DOCTYPE html>
<html>
<head>
  <title>Update Student Details</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f9;
      margin: 0;
      padding: 0;
    }
    .back-button{
        float: right;
        margin-right:0;
        }
    .back-button{
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
            background-color:rgb(61, 210, 255);
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

    .form-row {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    select, input {
      width: 100%;
      padding: 12px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 5px;
      transition: border-color 0.3s ease;
      margin-bottom: 20px;
    }

    select:focus, input:focus {
      border-color: #007BFF;
      outline: none;
    }

    button {
      width: 100%;
      padding: 12px;
      font-size: 16px;
      font-weight: bold;
      background-color: #007BFF;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <?php
include 'db_connection.php';

  // Handle form submission
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $name = $_POST['name'];
      $attribute = $_POST['attribute'];
      $new_value = $_POST['new_value'];

      // Prepare the query to update the 'register' table
      $sql = "UPDATE register SET $attribute = ? WHERE name = ?";
      $stmt = $conn->prepare($sql);

      if ($stmt === false) {
          die("Error preparing the statement: " . $conn->error);
      }

      $stmt->bind_param('ss', $new_value, $name);

      if ($stmt->execute()) {
          echo "<p style='text-align: center; color: green;'>Student details updated successfully!</p>";
      } else {
          echo "<p style='text-align: center; color: red;'>Error updating student details: " . $stmt->error . "</p>";
      }

      $stmt->close();
  }

  // Close connection
  $conn->close();
  ?>

  <div class="container">
    <h2>Update Student Details</h2>
    <form action="" method="post">
      <div class="form-row">
        <!-- Input box for name -->
        <label for="name">Enter Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter the name here" required>

        <!-- Dropdown menu for attribute selection -->
        <label for="attributes">Select an Attribute:</label>
        <select id="attributes" name="attribute" required>
          <option value="Address">Address</option>
          <option value="ContactNo">Contact Number</option>
          <option value="GuardianContactNo">Guardian's Contact Number</option>
          <option value="College">College</option>
          <option value="Dept">Department</option>
          <option value="Semester">Semester</option>
          <option value="Email">Email</option>
          <option value="Password">Password</option>
        </select>

        <!-- Input box for new value -->
        <label for="new_value">Enter New Value:</label>
        <input type="text" id="new_value" name="new_value" placeholder="Enter the new value here" required>
      </div>

      <!-- Submit button -->
      <button type="submit">Update</button>
    </form>
    <br><a href="ownerstudents.php" class="back-button">Back</a></br>
    <br></br>
  </div>
</body>
</html>