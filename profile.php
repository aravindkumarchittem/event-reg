<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
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

        .profile-details {
            list-style-type: none;
            padding: 0;
        }

        .profile-details li {
            margin-bottom: 10px;
            color: #555;
        }

        .profile-details span {
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Profile Page</h2>
        <?php
        // Hardcoding user ID for demonstration purposes
        $userId = 5;

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

        // Fetch user data
        $stmt = $conn->prepare("SELECT name, email, regno, phno FROM users WHERE id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $stmt->bind_result($name, $email, $regno, $phno);

        if ($stmt->fetch()) {
            echo "<ul class='profile-details'>";
            echo "<li><span>Name:</span> " . htmlspecialchars($name) . "</li>";
            echo "<li><span>Email:</span> " . htmlspecialchars($email) . "</li>";
            echo "<li><span>Registration Number:</span> " . htmlspecialchars($regno) . "</li>";
            echo "<li><span>Phone Number:</span> " . htmlspecialchars($phno) . "</li>";
            echo "</ul>";
        } else {
            echo "<p class='message'>No user found with the provided ID.</p>";
        }

        // Close statement and connection
        $stmt->close();
        $conn->close();
        ?>
    </div>
</body>
</html>
