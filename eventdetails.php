<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Details</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 20px;
        }

        .event-container {
            max-width: 800px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        h1 {
            color: white;
        }

        p {
            margin: 5px 0;
            color: #666;
        }

        .eventdetail {
            text-align: center;
            font-size: 20px;
        }
    </style>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
<header>
      <div class="logo">
        <a href="#">INVE<span style="font-size: 40px;background-image: linear-gradient(to right, #2C3E50, #797975);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;">$</span>TNOOK</a>
      </div>
      <nav>
        <ul>
          <li><a href="Home.html">Home</a></li>
          <li><a href="Investor Panel.html">Investor Panel</a></li>
          <li><a href="Events.html">Events</a></li>
          <li><a href="Product_retrive.php">Products</a></li>
          <li><a href="Learn.html">Learn</a></li>
          <li><a href="SignIn.html">Sign In</a></li>
          <li><a href="Get Started.html">Get Started</a></li>
        </ul>
      </nav>
    </header>
    <div class="eventdetail">
        <h1>InvestNook Virtual Event Details</h1>
    </div>

    <div class="event-container">
        <?php
        $server = "localhost";
        $user = "root";
        $pssd = "";
        $dbname = "event_details";

        // Create a connection
        $conn = new mysqli($server, $user, $pssd, $dbname);

        $sql = "SELECT * FROM event";

        // Execute the query
        $result = $conn->query($sql);

        // Check if there are rows in the result set
        if ($result) {
            if ($result->num_rows > 0) {
                // Display data in a table
                echo '<table>';
                echo '<tr><th>ID</th><th>Event Name</th><th>Category</th><th>Business Investor Name</th><th>Meeting Platform</th><th>Meeting Id</th></tr>';
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['E_id'] . '</td>';
                    echo '<td>' . $row['E_Name'] . '</td>';
                    echo '<td>' .$row['Category']. '</td>';
                    echo '<td>' . $row['B_I_Name'] . '</td>';
                    echo '<td>' . $row['M_Platform'] . '</td>';
                    echo '<td>' . $row['meet_id'] . '</td>';
                    echo '</tr>';
                }
                echo '</table>';
            } else {
                echo "No results found";
            }
        } else {
            echo "Error executing the query: " . $conn->error;
        }

        // Close the connection
        $conn->close();
        ?>
    </div>
</body>
</html>
