<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airbnb Clone - Homepage</title>
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
        .search-bar {
            display: flex;
            justify-content: center;
            padding: 20px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            margin: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .search-bar input, .search-bar button {
            padding: 10px;
            margin: 0 5px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }
        .search-bar button {
            background: #ff385c;
            color: white;
            cursor: pointer;
            transition: background 0.3s;
        }
        .search-bar button:hover {
            background: #e31c5f;
        }
        .featured {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            padding: 20px;
        }
        .property-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }
        .property-card:hover {
            transform: scale(1.05);
        }
        .property-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .property-card h3 {
            padding: 10px;
            color: #333;
        }
        .property-card p {
            padding: 0 10px 10px;
            color: #666;
        }
        @media (max-width: 600px) {
            .search-bar {
                flex-direction: column;
            }
            .search-bar input, .search-bar button {
                margin: 5px 0;
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Airbnb Clone</h1>
    </div>
    <div class="search-bar">
        <input type="text" id="destination" placeholder="Destination">
        <input type="date" id="checkin">
        <input type="date" id="checkout">
        <button onclick="searchProperties()">Search</button>
    </div>
    <div class="featured">
        <?php
        include 'db.php';
        $sql = "SELECT * FROM properties LIMIT 4";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<div class='property-card' onclick=\"window.location.href='listing.php?id=" . $row['id'] . "'\">";
            echo "<img src='https://via.placeholder.com/300x200' alt='Property'>";
            echo "<h3>" . $row['title'] . "</h3>";
            echo "<p>$" . $row['price'] . "/night</p>";
            echo "</div>";
        }
        $conn->close();
        ?>
    </div>
    <script>
        function searchProperties() {
            const destination = document.getElementById('destination').value;
            const checkin = document.getElementById('checkin').value;
            const checkout = document.getElementById('checkout').value;
            window.location.href = `listing.php?destination=${destination}&checkin=${checkin}&checkout=${checkout}`;
        }
    </script>
</body>
</html>
