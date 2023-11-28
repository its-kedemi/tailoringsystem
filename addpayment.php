<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .payment-form {
            width: 300px;
            margin: 0 auto;
        }

        .payment-form label {
            display: block;
            margin-top: 20px;
        }

        .payment-form input,
        .payment-form select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
        }

        .payment-form button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            margin-top: 20px;
            cursor: pointer;
        }

        .payment-form button:hover {
            background-color: #45a049;
        }
    </style>

    <script>
        function validatePayment() {
            var orderID = document.forms["paymentForm"]["orderID"].value;
            var paymentAmount = document.forms["paymentForm"]["paymentAmount"].value;
            var paymentMethod = document.forms["paymentForm"]["paymentMethod"].value;

            if (orderID == "" || paymentAmount == "" || paymentMethod == "") {
                alert("All fields must be filled out");
                return false;
            }

            if (isNaN(paymentAmount) || paymentAmount <= 0) {
                alert("Please enter a valid payment amount");
                return false;
            }

            return true;
        }
    </script>
</head>

<body>
    <?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Establish a database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "tailor";

        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Validate and sanitize input data
        $orderID = mysqli_real_escape_string($conn, $_POST["orderID"]);
        $paymentAmount = mysqli_real_escape_string($conn, $_POST["paymentAmount"]);
        $paymentMethod = mysqli_real_escape_string($conn, $_POST["paymentMethod"]);

        // Validate the input data
        if (empty($orderID) || !is_numeric($paymentAmount) || $paymentAmount <= 0 || empty($paymentMethod)) {
            echo '<p style="color: red;">Please enter valid payment details.</p>';
        } else {
            // Insert payment details into the database
            $sql = "INSERT INTO payments (orderID, paymentAmount, paymentMethod) 
                    VALUES ('$orderID', '$paymentAmount', '$paymentMethod')";

            if ($conn->query($sql) === TRUE) {
                echo '<p style="color: green;">Payment added successfully!</p>';
            } else {
                echo '<p style="color: red;">Error adding payment: ' . $conn->error . '</p>';
            }
        }

        // Close the database connection
        $conn->close();
    }
    ?>

    <!-- Add Payment Form -->
    <h4>ADD PAYMENT</h4>
    <form class="payment-form" name="paymentForm" action="" method="POST" onsubmit="return validatePayment()">
        <label for="orderID">Order ID:</label>
        <input type="text" id="orderID" name="orderID" required>

        <label for="paymentAmount">Payment Amount:</label>
        <input type="number" id="paymentAmount" name="paymentAmount" required>

        <label for="paymentMethod">Payment Method:</label>
        <select id="paymentMethod" name="paymentMethod" required>
            <option value="Lipa Na Mpesa">Lipa Na Mpesa</option>
            <option value="Airtel Money">Airtel Money</option>
            <option value="T-Kash">T-Kash</option>
        </select>

        <button type="submit">Add Payment</button>
    </form>
</body>

</html>
