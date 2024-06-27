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

// Handle event deletion
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_event'])) {
    $event_id = $_POST['event_id'];
    $sql = "DELETE FROM events WHERE id = $event_id";

    if ($conn->query($sql) === TRUE) {
        echo "Event deleted successfully";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Fetch and display events
$sql = "SELECT id, event_name, description, venue, date, time FROM events";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='event'>";
        echo "<h3>" . $row["event_name"] . "</h3>";
        echo "<p>" . $row["description"] . "</p>";
        echo "<p><strong>Venue:</strong> " . $row["venue"] . "</p>";
        echo "<p><strong>Date:</strong> " . $row["date"] . "</p>";
        echo "<p><strong>Time:</strong> " . $row["time"] . "</p>";
        echo "<form method='POST' action='list_events.php'>";
        echo "<input type='hidden' name='event_id' value='" . $row["id"] . "'>";
        echo "<button type='submit' name='delete_event'>Delete Event</button>";
        echo "</form>";
        echo "</div>";
    }
} else {
    echo "No events found.";
}

$conn->close();
?>
