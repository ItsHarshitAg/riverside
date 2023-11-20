<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking Form</title>
    <style>
        body {
            background-color: beige;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-image: url('banner.png');
            background-size: cover;
            background-position: center;
            height: 300px;
            display: flex;
            background-color: #355A6B; /* Updated color to complement beige */
            color: white;
            padding: 20px;
        }
        h1 {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .welcome-text {
            font-size: 20px;
            margin-top: 0;
        }
        .navbar {
            background-color: maroon;
            color: white;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar a {
            color: white;
            text-decoration: none;  
            margin: 0 10px;
            font-size: 18px;
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 5px;
        }
        .navbar a:hover {
            background-color: red;
        }
        .banner {
            background-image: url('banner1.png');
            background-size: cover;
            background-position: center;
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 36px;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="header">
        <div class="container">
            <!-- <h1>Riverside Hotel</h1> -->
            <!-- <p class="welcome-text">Welcome to Riverside Hotel - Experience the Ultimate Luxury</p> -->
        </div>
    </div>
    <div class="navbar">
        <div class="container">
            <a href="home.html">Home</a>
            <a href="roomfinal.html">Rooms</a>
            <a href="service.html">Services</a>
            <a href="insights.html">Insights</a>
            <a href="contact.html">Contact</a>
        </div>
    </div>
    <?php
    if (isset($_POST["submit"])) {
        $servername = 'localhost';
        $username = 'root';
        $password = "";
        $dbname = "hotel_management";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn == false) {
            die("<h2>Error: Could not connect to the database.</h2>");
        } else {
            echo "<h2>Connected successfully to the database.</h2>";
        }

        $email = $_POST["email"];
        $check_in = $_POST["check-in"];
        $check_out = $_POST["check-out"];
        $room_type = $_POST["room-type"];
        $nog = $_POST["guests"];
        $special_request = $_POST["special-requests"];

        $sql = "UPDATE booking_form SET check_in='$check_in', check_out='$check_out', room_type='$room_type', nog='$nog', special_request='$special_request' WHERE email='$email'";

        if ($conn->query($sql) == true) {
            echo "<h2>Data updated successfully!</h2>";
        } else {
            echo "<h2>Error: Could not able to execute $sql. Please try again.</h2>";
        }

        $conn->close();
    }
    ?>
</body>
</html>