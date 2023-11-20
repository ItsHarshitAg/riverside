<?php
$servername = 'localhost';
$username = 'root';
$password = "";
$dbname = "hotel_management";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM user WHERE username=? AND password=?");
    $stmt->bind_param("ss", $username, $password);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        echo "Login successful!";
        header("Location: home.html");
    } else {
        header("Location: login.html");
        echo "Invalid username or password.";
    }

    $stmt->close();
}

$conn->close();
?>
