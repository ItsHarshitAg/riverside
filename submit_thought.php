<?php
$servername = 'localhost';
$username = 'root';
$password = "";
$dbname = "hotel_management";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST["thought"])) {
    $thought = $_POST["thought"];

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO thoughts (thought) VALUES (?)");
    $stmt->bind_param("s", $thought);

    $stmt->execute();

    $stmt->close();
}

$conn->close();

header("Location: insights.php");
exit();
?>