<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #333;
            overflow: hidden;
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
        .order {
            border: 1px solid #ddd;
            margin: 20px auto;
            padding: 20px;
            max-width: 600px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .order h2 {
            margin-top: 0;
            color: #ff5252;
        }
        .order p {
            line-height: 1.6;
        }
        .order button {
            padding: 10px;
            margin: 5px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .edit {
            background-color: #4CAF50;
            color: white;
        }
        .delete {
            background-color: #f44336;
            color: white;
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

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if a delete request has been made
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
        $orderID = $_POST['delete'];

        // Delete the order from the 'orders' table
        $sql = "DELETE FROM orders WHERE orderID = $orderID";
        if ($conn->query($sql) === TRUE) {
            echo "Order deleted successfully.";
        } else {
            echo "Error deleting order: " . $conn->error;
        }
    }

    // Fetch orders from the 'orders' table
    $sql = "SELECT * FROM orders";
    $result = $conn->query($sql);

    if ($result === false) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<div class='order'>";
            echo "<h2>Order ID: " . $row["orderID"] . "</h2>";
            echo "<p>Customer Name: " . $row["customerName"] . "</p>";
            echo "<p>Phone Number: " . $row["phoneNumber"] . "</p>";
            echo "<p>Cloth Type: " . $row["clothType"] . "</p>";
            echo "<p>Quantity: " . $row["quantity"] . "</p>";
            echo "<p>Measurements: " . $row["measurements"] . "</p>";
            echo "<p>Description: " . $row["description"] . "</p>";
            echo "<p>Amount Paid: " . $row["amountPaid"] . "</p>";
            echo "<button class='edit' onclick=\"location.href='editorder.php?id=".$row["orderID"]."'\">Edit</button>";
            echo "<form method='post' action=''>";
            echo "<input type='hidden' name='delete' value='".$row["orderID"]."'>";
            echo "<button type='submit' class='delete'>Delete</button>";
            echo "</form>";
            echo "</div>";
        }
    } else {
        echo "No orders found.";
    }

    $conn->close();
    ?>
</body>
</html>
