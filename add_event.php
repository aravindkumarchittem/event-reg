<?php
$servername = "localhost";
$username = "aravind";
$password = "aravind@mysql";
$dbname = "club_events";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $event_name = $_POST['event_name'];
    $description = $_POST['description'];
    $venue = $_POST['venue'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $sql = "INSERT INTO events (event_name, description, venue, date, time) VALUES ('$event_name', '$description', '$venue', '$date', '$time')";

    if ($conn->query($sql) === TRUE) {
        echo "New event created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
header("Location: index.html");
?>
