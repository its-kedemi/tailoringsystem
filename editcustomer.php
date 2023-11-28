<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin: 20px;
        }
        input[type='text'] {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        input[type='submit'] {
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            color: white;
            background-color: #007BFF;
            cursor: pointer;
        }
        input[type='submit']:hover {
            background-color: #0056b3;
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
        $customerID = $_GET['id'];

        $sql = "SELECT * FROM customers WHERE customerID = $customerID";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            echo "<h2>Edit Customer</h2>";
            echo "<form action='updatecustomer.php' method='post'>";
            echo "<input type='hidden' name='customerID' value='{$row['customerID']}'>";
            echo "First Name: <input type='text' name='firstName' value='{$row['firstName']}'><br>";
            echo "Last Name: <input type='text' name='lastName' value='{$row['lastName']}'><br>";
            echo "Email: <input type='text' name='email' value='{$row['email']}'><br>";
            echo "Phone Number: <input type='text' name='phoneNumber' value='{$row['phoneNumber']}'><br>";
            echo "<input type='submit' value='Update Customer'>";
            echo "</form>";
        } else {
            echo "Customer not found.";
        }
    }

    $conn->close();
    ?>
</body>
</html>

