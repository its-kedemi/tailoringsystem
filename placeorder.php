<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Order</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000;
            margin: 0;
            padding: 0;
            color: #fff;
        }

        header {
            background-color: #333;
            padding: 10px;
            text-align: center;
        }

        h1 {
            margin: 0;
            color: #fff;
        }

        nav {
            display: flex;
            justify-content: center;
            background-color: #dfd7d7;
            padding: 10px;
            margin-bottom: 20px;
        }

        nav a {
            text-decoration: none;
            color: rgb(70, 9, 9);
            margin: 0 15px;
            cursor: pointer;
        }

        .container {
            background-color: #470505;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px rgba(255, 255, 255, 0.1);
            width: 300px;
            border: 2px solid #fff;
            margin: auto;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            color: #fff;
        }

        input, textarea, button {
            margin-bottom: 15px;
            padding: 10px;
            border: 2px solid #fff;
            border-radius: 5px;
            background: #000;
            color: #fff;
        }

        button {
            background-color: #007BFF;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        a {
            text-decoration: none;
            color: white;
            margin-bottom: 15px;
            display: block;
        }
    </style>
</head>

<body>
    <header>
        <h1>ZETECHONLINE TAILORING MANAGEMENT SYSTEM</h1>
    </header>

    <nav>
        <a href="index.php">Dashboard</a>
        <a href="vieworder.php">View Order</a>
    </nav>

    <div class="container">
        <a href="index.php">Back to Dashboard</a>

        <h2>Place Order</h2>

        <?php
        // Display a success message if set
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "tailor";

            $conn = new mysqli($servername, $username, $password, $database);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $customerName = mysqli_real_escape_string($conn, $_POST["customerName"]);
            $phoneNumber = mysqli_real_escape_string($conn, $_POST["phoneNumber"]);
            $clothType = mysqli_real_escape_string($conn, $_POST["clothType"]);
            $quantity = mysqli_real_escape_string($conn, $_POST["quantity"]);
            $measurements = mysqli_real_escape_string($conn, $_POST["measurements"]);
            $description = mysqli_real_escape_string($conn, $_POST["description"]);
            $amountPaid = ""; // Initialize amountPaid
            $orderID = uniqid();
            // Assign the corresponding price based on the selected cloth type
            switch ($clothType) {
                case "DRESS":
                    $amountPaid = "500";
                    break;
                case "SUIT":
                    $amountPaid = "10000";
                    break;
                case "SHORT":
                    $amountPaid = "350";
                    break;
                case "CARDIGAN":
                    $amountPaid = "500";
                    break;
                // Add more cases for other cloth types
                default:
                    $amountPaid = "0";
            }

            $sql = "INSERT INTO orders (customerName, phoneNumber, clothType, quantity, measurements, description, amountPaid, orderID)
                    VALUES ('$customerName', '$phoneNumber', '$clothType', '$quantity', '$measurements', '$description', '$amountPaid', '$orderID')";

            if ($conn->query($sql) === TRUE) {
                echo '<p style="color: green;">Order placed successfully!</p>';
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }
        ?>

        <form name="orderForm" action="" method="POST" onsubmit="return validateOrder()">
            <label for="customerName">Customer Name:</label>
            <input type="text" id="customerName" name="customerName" required>

            <label for="phoneNumber">Phone Number:</label>
            <input type="tel" id="phoneNumber" name="phoneNumber" pattern="[0-9]{10}" required>

            <label for="clothType">Cloth Type:</label>
            <select id="clothType" name="clothType" onchange="updatePrice()">
                <option value="DRESS">Dress</option>
                <option value="SHORT">Short</option>
                <option value="SUIT">Suit</option>
                <option value="CARDIGAN">Cardigan</option>
            </select>

            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" required>

            <label for="measurements">Measurements:</label>
            <textarea id="measurements" name="measurements" rows="4"></textarea>

            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4"></textarea>

            <label for="amountPaid">Amount Paid:</label>
            <input type="number" id="amountPaid" name="amountPaid" value="" readonly required>

            <!-- Add a hidden input field for order ID -->
            <input type="hidden" id="orderID" name="orderID" value="<?php echo $orderID; ?>" readonly>
            <!-- Add a section to display the order ID -->
            <label for="orderIDDisplay">Order ID:</label>
            <input type="text" id="orderIDDisplay" name="orderIDDisplay" value="<?php echo $orderID; ?>" readonly>

            <button type="submit">Place Order</button>
        </form>
    </div>

    <script>
        function validateOrder() {
            var customerName = document.forms["orderForm"]["customerName"].value;
            var phoneNumber = document.forms["orderForm"]["phoneNumber"].value;
            var clothType = document.forms["orderForm"]["clothType"].value;
            var quantity = document.forms["orderForm"]["quantity"].value;
            var measurements = document.forms["orderForm"]["measurements"].value;
            var description = document.forms["orderForm"]["description"].value;

            if (customerName.trim() === "" || phoneNumber.trim() === "" || isNaN(quantity) || quantity <= 0) {
                alert("Please enter valid details.");
                return false;
            }

            return true;
        }

        function updatePrice() {
            var clothType = document.getElementById("clothType").value;
            var amountPaidInput = document.getElementById("amountPaid");

            // Assign the corresponding price based on the selected cloth type
            switch (clothType) {
                case "DRESS":
                    amountPaidInput.value = "500";
                    break;
                case "SUIT":
                    amountPaidInput.value = "10000";
                    break;
                case "SHORT":
                    amountPaidInput.value = "350";
                    break;
                case "CARDIGAN":
                    amountPaidInput.value = "500";
                    break;
                // Add more cases for other cloth types
                default:
                    amountPaidInput.value = "0";
            }
        }
    </script>
</body>
</html>
