<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
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
        .confirmation {
            max-width: 600px;
            margin: 20px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        .confirmation h2 {
            color: #333;
            margin-bottom: 20px;
        }
        .confirmation p {
            color: #666;
            margin-bottom: 10px;
        }
        .confirmation button {
            padding: 10px 20px;
            background: #ff385c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .confirmation button:hover {
            background: #e31c5f;
        }
        @media (max-width: 600px) {
            .confirmation {
                margin: 10px;
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Booking Confirmation</h1>
    </div>
    <div class="confirmation">
        <?php
        include 'db.php';
        $id = $_GET['id'];
        $name = $_GET['name'];
        $email = $_GET['email'];
        $checkin = $_GET['checkin'];
        $checkout = $_GET['checkout'];
        $sql = "INSERT INTO bookings (property_id, user_name, user_email, checkin_date, checkout_date) VALUES ($id, '$name', '$email', '$checkin', '$checkout')";
        if ($conn->query($sql) === TRUE) {
            $sql = "SELECT title FROM properties WHERE id = $id";
            $result = $conn->query($sql);
            $property = $result->fetch_assoc();
            echo "<h2>Booking Confirmed!</h2>";
            echo "<p>Property: " . $property['title'] . "</p>";
            echo "<p>Name: $name</p>";
            echo "<p>Email: $email</p>";
            echo "<p>Check-in: $checkin</p>";
            echo "<p>Check-out: $checkout</p>";
        } else {
            echo "<h2>Error</h2>";
            echo "<p>Booking failed: " . $conn->error . "</p>";
        }
        $conn->close();
        ?>
        <button onclick="window.location.href='index.php'">Back to Home</button>
    </div>
</body>
</html>
