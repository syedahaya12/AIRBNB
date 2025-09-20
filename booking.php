<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Property</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }
        .header {
            background: #ff385c;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .booking-form {
            max-width: 600px;
            margin: 20px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .booking-form img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 10px;
        }
        .booking-form h2 {
            margin: 10px 0;
            color: #333;
        }
        .booking-form p {
            color: #666;
            margin-bottom: 10px;
        }
        .booking-form input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .booking-form button {
            width: 100%;
            padding: 10px;
            background: #ff385c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .booking-form button:hover {
            background: #e31c5f;
        }
        @media (max-width: 600px) {
            .booking-form {
                margin: 10px;
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Book Your Stay</h1>
    </div>
    <div class="booking-form">
        <?php
        include 'db.php';
        $id = $_GET['id'];
        $sql = "SELECT * FROM properties WHERE id = $id";
        $result = $conn->query($sql);
        $property = $result->fetch_assoc();
        echo "<img src='https://via.placeholder.com/600x300' alt='Property'>";
        echo "<h2>" . $property['title'] . "</h2>";
        echo "<p>$" . $property['price'] . "/night</p>";
        echo "<p>" . $property['description'] . "</p>";
        ?>
        <input type="text" id="name" placeholder="Your Name">
        <input type="email" id="email" placeholder="Your Email">
        <input type="date" id="checkin" placeholder="Check-in Date">
        <input type="date" id="checkout" placeholder="Check-out Date">
        <button onclick="bookProperty(<?php echo $id; ?>)">Book Now</button>
    </div>
    <script>
        function bookProperty(propertyId) {
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const checkin = document.getElementById('checkin').value;
            const checkout = document.getElementById('checkout').value;
            if (name && email && checkin && checkout) {
                window.location.href = `confirm_booking.php?id=${propertyId}&name=${name}&email=${email}&checkin=${checkin}&checkout=${checkout}`;
            } else {
                alert('Please fill all fields');
            }
        }
    </script>
</body>
</html>
