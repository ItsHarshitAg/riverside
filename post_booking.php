<!DOCTYPE html>
<html>
<head>
    <title>Booking Page with Activities</title>
    <link rel="stylesheet" type="text/css" href="p9php.css">
</head>
<body>
    <div class="header">
        <img src="banner.png" alt="hotel">
    </div>
    <div class="navbar">
        <ul class="footer-list">
            <li><a href="#">Home</a></li>
            <li><a href="#">Room Types</a></li>
            <li><a href="#">Amenities</a></li>
            <li><a href="#">Rates</a></li>
            <li><a href="#">Booking</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>
    <div class="container">
        <div class="booking-form">  
            <h2>Booking Summary (POST Method)</h2>
            <div id="result">
                <?php
                if (isset($_POST['submit'])) {
                    $numGuests = intval($_POST['num1']);
                    $roomType = $_POST['operator'];
                    $numNights = intval($_POST['num2']);
                    $totalCost;

                    // Applying special discounts for extended stays
                    if ($numNights >= 7) {
                       $totalCost = 0.9 * ($numGuests * $numNights * 100); // 10% discount for 7 or more nights
                    } else {
                        switch ($roomType) {
                            case "single":
                                $totalCost = $numGuests * $numNights * 100;
                                break;
                            case "double":
                                $totalCost = $numGuests * $numNights * 150;
                                break;
                            case "suite":
                                $totalCost = $numGuests * $numNights * 200;
                                if ($numGuests === 1) {
                                    echo "Welcome to our luxurious Suite! Enjoy your stay!";
                                } else {
                                    echo "Welcome to our luxurious Suite! We hope you have a wonderful stay!";
                                }
                                break;
                            default:
                                $totalCost = 0;
                                break;
                        }
                    }

                    if ($roomType !== "suite") {
                        echo "Total Cost: $" . number_format($totalCost, 2);

                        // Using for loop to print booking details
                        $bookingDetails = "";
                        for ($i = 0; $i < $numNights; $i++) {
                            $bookingDetails .= "Night " . ($i + 1) . " booked for " . $roomType . " room.<br>";
                        }
                        echo "<br>" . $bookingDetails;
                    }
                }
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