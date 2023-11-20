<!DOCTYPE html>
<html>
<head>
    <title>Riverside Hotel - Insights</title>
    <link rel="stylesheet" href="universal.css">
</head>
<body>
<div class="header">
        <img src="banner.png" alt="hotel">
    </div>
    <div class="navbar">
        <div class="container">
            <a href="home.html">Home</a>
            <a href="roomfinal.html">Rooms</a>
            <a href="service.html">Services</a>
            <a href="insights.php">Insights</a>
            <a href="login.html">Admin</a>
        </div>
    </div>

    <div class="container">
        <div class="insights-content">
            <h2>Insights and News</h2>
            <div class="article">
                <h2>Exploring the Scenic Beauty of Riverside</h2>
                <p>
                    At Riverside Hotel, we are fortunate to be situated in one of the most picturesque locations in the region. In this article, we take you on a journey to explore the scenic beauty of the Riverside area and the various attractions it offers to visitors.
                </p>
                <a href="senericbeauty.html">Read More</a>
            </div>
            <div class="article">
                <h2>The Art of Relaxation: A Spa Experience Like No Other</h2>
                <p>
                    Our tranquil spa at Riverside Hotel is a haven of relaxation and rejuvenation. In this article, we delve into the art of relaxation and the unique spa experience that awaits our guests. Discover the range of treatments and therapies designed to pamper your mind, body, and soul.
                </p>
                <a href="spaa.html">Read More</a>
            </div>
            <div class="article">
                <h2>Discovering Local Cuisine: A Gastronomic Adventure</h2>
                <p>
                    Food plays a significant role in the culture of Riverside. Join us as we embark on a gastronomic adventure to explore the diverse and delectable local cuisine. From traditional delicacies to modern culinary creations, Riverside has something to delight every palate.
                </p>
                <a href="localcrusine.html">Read More</a>
            </div>
            <!-- Add more articles as needed -->

            <div class="article">
                <h2>Share Your Thoughts</h2>
                <form action="submit_thought.php" method="post">
                    <textarea name="thought" rows="4" cols="50" placeholder="Write your thoughts here..." required></textarea>
                    <button type="submit">Submit</button>
                </form>
            </div>

            <div class="thoughts">
                <h2>Thoughts from Visitors</h2>
                <?php
                $servername = 'localhost';
                $username = 'root';
                $password = "";
                $dbname = "hotel_management";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM thoughts";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<p>" . $row["thought"] . "</p>";
                    }
                } else {
                    echo "<p>No thoughts submitted yet.</p>";
                }

                $conn->close();
                ?>
            </div>
        </div>
    </div>
    
    <footer>
        <div class="container">
            <p>&copy; 2023 Riverside Hotel. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>