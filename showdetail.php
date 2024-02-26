<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="style.css">
    <style>
         body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            color: #333;
        }

        .navbar {
            background-color: #333;
            color: #fff;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 24px;
        }

        .menu-toggle {
            font-size: 20px;
            cursor: pointer;
        }

        .menu {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            width: 40%;
        }

        .menu a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            padding: 10px;
            transition: color 0.3s;
        }

        .menu a:hover {
            color: #4CAF50;
        }

        h1 {
            text-align: center;
            margin-top: 30px;
            color: #4CAF50;
        }

        .detail_container {
            margin-top: 5%;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .detail_container img {
            width: 100%;
            max-width: 500px; /* Set a maximum width for the image */
            border-radius: 8px;
            margin-bottom: 20px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .detail_container p {
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo">InvestNook</div>
        <div class="menu-toggle">&#9776;</div>
        <div class="menu">
            <a href="Home.html">Home</a>
            <a href="Product_retrive.php">Products</a>
            <a href="Investor Panel.html">Investor Panel</a>
            <a href="Events.html">Events</a>
            <a href="Learn.html">Learn</a>
            <a href="SignIn.html">SignIn</a>
            <a href="Get Started.html">Get Started</a>
        </div>
    </nav>
        <div class="chatbutton">
            
        </div>
    <h1>Product Details</h1>

    <div class="detail_container">
        <?php
        include "connection.php";
        if (isset($_GET['id'])) {
            $productId = $_GET['id'];
            $sql = "SELECT * FROM product_table WHERE Product_ID = $productId";
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<img src='" . $row["Product_Photo"] . "' alt='Product Photo'>";
                    echo "<p><strong>Product Name:</strong> " . $row["Product_Name"] . "</p>";
                    echo "<p><strong>Product Description:</strong> " . $row["Product_Description"] . "</p>";
                }
            } else {
                echo "<p>Product not found.</p>";
            }
        } else {
            echo "<p>Product ID not provided.</p>";
        }
        ?>
    </div>

</body>
</html>
