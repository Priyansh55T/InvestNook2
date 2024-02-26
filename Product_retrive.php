<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: white;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
        }

        .product-row {
            display: flex;
            width: 100%;
            justify-content: space-evenly;
            margin-bottom: 20px;
        }
        .product-card {
    border: 1px solid #ddd;
    background-color: #fff;
    display: inline-block;
    border-radius: 8px;
    box-shadow: 0 0 40px rgba(0, 0, 0, 0.2);
    overflow: hidden;
    transition: transform 0.3s;
    cursor: pointer;
    height: 500px;
    width: 500px; /* Adjust the width as needed */
    margin-bottom: 20px;
    margin-right: 2%; /* Set the gap between products */
}

/* Ensure the last product in each row has no right margin */
.product-row .product-card:last-child {
    margin-right: 0;
}


        .product-card img {
            width: 100%;
            height: 50%;
            border-radius: 8px 8px 0 0;
            margin-bottom: 10px;
        }

        .product-details {
            padding: 5px;
            color: #333;
        }

        .product-details p {
            margin: 5px 0;
        }

        .button-container {
            display: flex;
            justify-content: space-evenly;
            margin-top: 2%;
        }

        .showdetail_btn button,
        .Invest_btn button {
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
            width: 120px;
            font-size: 14px;
        }

        .showdetail_btn button:hover,
        .Invest_btn button:hover {
            background-color: #45a049;
        }

        .top-right-button {
            position: fixed;
            top: 10px;
            right: 20px;
            padding: 15px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 8px;
            font-size: 18px;
        }

        .top-right-button:hover {
            background-color: #45a049;
        }

        .add-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            padding: 15px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 8px;
            font-size: 18px;
        }

        .add-button:hover {
            background-color: #45a049;
        }

        h1 {
            color: white;
            text-align: center;
            font-size: 50px;
        }
        body {
    margin: 0;
    font-family: 'Inter', sans-serif; /* Ensure you have imported the Inter font */
    background-color: black;
}

header {
    background-color: #333;
    padding: 10px 0;
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.logo a {
    text-decoration: none;
    color: beige;
    font-size: 30px;
}

nav ul {
    list-style: none;
    display: flex;
    margin: 0;
    padding: 0;
}

nav li {
    margin-right: 20px;
}

nav a {
    text-decoration: none;
    color: white;
    font-size: 16px;
}

nav a:hover {
    border-bottom: 2px solid beige;
}
    </style>
    <link rel="stylesheet" href="#">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        var razorpayKey = 'rzp_test_fdfwBaj2AEvLz4';
    </script>

</head>

<body>
<script>
  function initiatePayment(productId, fundRequired) {
    var options = {
      key: razorpayKey,
      amount: fundRequired * 100, // Razorpay amount is in paisa, so convert rupees to paisa
      currency: 'INR',
      name: "InvestNook",
      description: 'Investment in Startup',
      image: 'https://your-company-logo-url.png', // Replace with your company logo URL
      order_id: '', // You'll generate this on the server side
      handler: function (response) {
        // Handle the payment success or failure on the client side
        if (response.razorpay_payment_id) {
          alert('Payment successful! Payment ID: ' + response.razorpay_payment_id);
          // You may want to perform additional actions, such as updating the database
        } else {
          alert('Payment failed!');
        }
      },
    };

    var rzp = new Razorpay(options);
    rzp.open();
  }
</script>

<header>
      <div class="logo">
          <a href="#" style="font-size: 30px; color: beige;">INVE$TNOOK</a>
      </div>
      <nav>
          <ul>
          <li><a href="Home.html">Home</a></li>
                <li><a href="Learn.html">Learn</a></li>
                <li><a href="Investor Panel.html">Investor Panel</a></li>
                <li><a href="Events.html">Events</a></li>
                <li><a href="Product_retrive.php">Products</a></li>
                <li><a href="login.html">Sign In</a></li>
          </ul>
      </nav>
  </header>
    <h1 style="font-size: 50px">Current Startups To Invest</h1>
    <div class="container">
        <?php
        $server = "localhost";
        $user = "root";
        $pssd = "";
        $dbname = "product";

        $conn = new mysqli($server, $user, $pssd, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Select data from the database
        $sql = "SELECT * FROM product_table";
        $result = $conn->query($sql);

        if ($result === false) {
            die("Error in query: " . $conn->error);
        }

        // Check if there are any rows in the result set
        if ($result->num_rows > 0) {
            $counter = 0; // Counter to keep track of products in each row
            echo "<div class='product-row'>";
            while ($row = $result->fetch_assoc()) {
                echo "<div class='product-card'>";
                echo "<img src='" . $row["Company_logo"] . "' alt='Companylogo'>";
                echo "<div class='product-details'>";
                echo "<p><strong>Company Name:</strong> " . $row["Company_Name"] . "</p>";
                echo "<p><strong>Product Name:</strong> " . $row["Product_Name"] . "</p>";
                echo "<p><strong>Fund Required (in Rs)</strong> " . $row["Fund_Required"] . "</p>";
                echo "<p><strong>Equity Offered(in %):</strong> " . $row["Equity_Offered"] . "</p>";
                echo "<p>Contact No:</strong> " . $row["Contact"] . "</p>";
                echo "</div>";
                echo "<div class='button-container'>";
                echo "<div class='showdetail_btn'>";
                echo "<button type='button' onclick=\"location.href='showdetail.php?id=" . $row["Product_id"] . "'\">Show Details</button>";
                echo "</div>";
                echo "<div class='Invest_btn'>";
                echo "<button type='button' onclick=\"initiatePayment('" . $row["Product_id"] . "', " . $row["Fund_Required"] . ")\">Invest</button>";
                
                echo "</div>";
                echo "</div>";
                echo "</div>";

                $counter++;

                if ($counter % 4 == 0) {
                    // Close the current row and start a new one after every 4th product
                    echo "</div><div class='product-row'>";
                }
            }
            echo "</div>"; // Close the last row
        } else {
            echo "No records found in the database.";
        }

        $conn->close();
        ?>
    </div>
    <button class="add-button" type="button" onclick="location.href='Productsform.html'">Add Startup</button>
</body>

</html>
