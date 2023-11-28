<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        h2 {
            color: #333;
            text-align: center;
            margin-top: 20px;
        }

        nav {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }

        nav a {
            color: #fff;
            margin: 0 15px;
            text-decoration: none;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            padding: 30px;
            background-color: #fff;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        table th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h2>ZETECHONLINE TAILORING MANAGEMENT SYSTEM</h2>

    <nav>
        <a href="index.php">Dashboard</a>
        <a href="placeorder.php">Place Order</a>
    </nav>

    <div class="container">
        <h3>VIEW ORDERS</h3>
        <!-- Display orders in this section -->
        <div id="orders">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "tailor";

            $conn = new mysqli($servername, $username, $password, $database);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM orders";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table><tr><th>Order ID</th><th>Customer Name</th><th>Phone Number</th><th>Cloth Type</th><th>Quantity</th><th>Measurements</th><th>Description</th><th>Amount Paid</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>{$row['orderID']}</td><td>{$row['customerName']}</td><td>{$row['phoneNumber']}</td><td>{$row['clothType']}</td><td>{$row['quantity']}</td><td>{$row['measurements']}</td><td>{$row['description']}</td><td>{$row['amountPaid']}</td></tr>";
                }
                echo "</table>";
            } else {
                echo "No orders found.";
            }

            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>
