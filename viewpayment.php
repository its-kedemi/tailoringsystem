<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .navbar {
            overflow: hidden;
            background-color: #333;
        }
        .navbar a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
        /* Add styles for the rest of the page */
        h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #999;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f3f3f3;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="admin.php">Dashboard</a>
    </div>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "tailor";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch data from payments table
    $sql = "SELECT * FROM payments";
    $result = $conn->query($sql);

    // Check if there are rows in the result set
    if ($result->num_rows > 0) {
        echo "<h2>Payment Details</h2>";
        echo "<table>";
        echo "<tr><th>Payment ID</th><th>Order ID</th><th>Payment Amount</th><th>Payment Method</th></tr>";

        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["paymentID"] . "</td>";
            echo "<td>" . $row["orderID"] . "</td>";
            echo "<td>" . $row["paymentAmount"] . "</td>";
            echo "<td>" . $row["paymentMethod"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No payments found.";
    }

    // Close connection
    $conn->close();
    ?>
</body>
</html>
