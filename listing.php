<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Listings</title>
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
        .filters {
            padding: 20px;
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        .filters select, .filters input {
            padding: 10px;
            border-radius: 5px;
            border: none;
            font-size: 16px;
        }
        .listings {
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
            cursor: pointer;
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
            .filters {
                flex-direction: column;
            }
            .filters select, .filters input {
                width: 100%;
                margin: 5px 0;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Property Listings</h1>
    </div>
    <div class="filters">
        <select id="sort" onchange="applyFilters()">
            <option value="price_asc">Price: Low to High</option>
            <option value="price_desc">Price: High to Low</option>
            <option value="rating_desc">Best Rated</option>
        </select>
        <input type="number" id="min_price" placeholder="Min Price">
        <input type="number" id="max_price" placeholder="Max Price">
    </div>
    <div class="listings">
        <?php
        include 'db.php';
        $destination = isset($_GET['destination']) ? $_GET['destination'] : '';
        $sql = "SELECT * FROM properties WHERE title LIKE '%$destination%'";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<div class='property-card' onclick=\"window.location.href='booking.php?id=" . $row['id'] . "'\">";
            echo "<img src='https://via.placeholder.com/300x200' alt='Property'>";
            echo "<h3>" . $row['title'] . "</h3>";
            echo "<p>$" . $row['price'] . "/night</p>";
            echo "<p>Rating: " . $row['rating'] . "/5</p>";
            echo "</div>";
        }
        $conn->close();
        ?>
    </div>
    <script>
        function applyFilters() {
            const sort = document.getElementById('sort').value;
            const minPrice = document.getElementById('min_price').value;
            const maxPrice = document.getElementById('max_price').value;
            window.location.href = `listing.php?destination=<?php echo $destination; ?>&sort=${sort}&min_price=${minPrice}&max_price=${maxPrice}`;
        }
    </script>
</body>
</html>
