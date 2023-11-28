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
        .order-form {
            border: 1px solid #ddd;
            margin: 20px auto;
            padding: 20px;
            max-width: 600px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .order-form h2 {
            margin-top: 0;
            color: #ff5252;
        }
        .order-form label {
            display: block;
            margin: 10px 0;
        }
        .order-form input[type='text'],
        .order-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .order-form input[type='submit'] {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            float: right;
        }
        .order-form::after {
            content: "";
            display: table;
            clear: both;
        }
    </style>
</head>
<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "tailor";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
        $orderID = $_GET['id'];

        $sql = "SELECT * FROM orders WHERE orderID = $orderID";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            echo "<div class='order-form'>";
            echo "<h2>Edit Order</h2>";
            echo "<form action='updateorder.php' method='post'>";
            echo "<input type='hidden' name='orderID' value='{$row['orderID']}'>";
            echo "<label>Customer Name: <input type='text' name='customerName' value='{$row['customerName']}'></label>";
            echo "<label>Phone Number: <input type='text' name='phoneNumber' value='{$row['phoneNumber']}'></label>";
            echo "<label>Cloth Type: <input type='text' name='clothType' value='{$row['clothType']}'></label>";
            echo "<label>Quantity: <input type='text' name='quantity' value='{$row['quantity']}'></label>";
            echo "<label>Measurements: <textarea name='measurements'>{$row['measurements']}</textarea></label>";
            echo "<label>Description: <textarea name='description'>{$row['description']}</textarea></label>";
            echo "<label>Amount Paid: <input type='text' name='amountPaid' value='{$row['amountPaid']}'></label>";
            echo "<input type='submit' value='Update Order'>";
            echo "</form>";
            echo "</div>";
        } else {
            echo "Order not found.";
        }
    }

    $conn->close();
    ?>
</body>
</html>
