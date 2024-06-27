<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            color: #555;
        }

        input {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        button {
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #28a745;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #218838;
        }

        .message {
            margin-top: 10px;
            text-align: center;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registration Form</h2>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Database credentials
            $servername = "localhost";
            $username = "aravind"; // change this to your database username
            $password = "aravind@mysql"; // change this to your database password
            $dbname = "registration_db";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Get form data
            $name = $_POST['name'];
            $email = $_POST['mail'];
            $regno = $_POST['regno'];
            $phno = $_POST['phno'];
            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Encrypt the password

            // Prepare and bind
            $stmt = $conn->prepare("INSERT INTO users (name, email, regno, phno, username, password) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $name, $email, $regno, $phno, $username, $password);

            // Execute the statement
            if ($stmt->execute()) {
                echo "<p class='message'>New record created successfully</p>";
            } else {
                echo "<p class='message'>Error: " . $stmt->error . "</p>";
            }

            // Close statement and connection
            $stmt->close();
            $conn->close();
        }
        ?>
        <form action="register.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="mail">Email:</label>
            <input type="email" id="mail" name="mail" required>

            <label for="regno">Registration Number:</label>
            <input type="text" id="regno" name="regno" required>

            <label for="phno">Phone Number:</label>
            <input type="tel" id="phno" name="phno" required>

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>
