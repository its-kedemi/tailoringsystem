<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Customer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
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
        .customer-form {
            border: 1px solid #ddd;
            margin: 20px auto;
            padding: 20px;
            max-width: 600px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .customer-form h2 {
            margin-top: 0;
            color: #007BFF;
        }
        .customer-form label {
            display: block;
            margin: 10px 0;
        }
        .customer-form input[type='text'] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .customer-form input[type='submit'] {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007BFF;
            color: white;
            cursor: pointer;
            float: right;
        }
        .customer-form::after {
            content: "";
            display: table;
            clear: both;
        }
    </style>
</head>
<body>
<div class="navbar">
        <a href="admin.php">Dashboard</a>
    </div>
    <?php
    $servername = "localhost";
    $username = "root"; // replace with your actual database username
    $password = ""; // replace with your actual database password
    $database = "tailor";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $email = $_POST["email"];
        $phoneNumber = $_POST["phoneNumber"];

        $sql = "INSERT INTO customers (firstName, lastName, email, phoneNumber) 
                VALUES ('$firstName', '$lastName', '$email', '$phoneNumber')";

        if ($conn->query($sql) === TRUE) {
            echo "Customer added successfully!";
        } else {
            echo "Error adding customer: " . $conn->error;
        }
    }

    $conn->close();
    ?>
    <div class="customer-form">
        <h2>Add Customer</h2>
        <form action="addcustomer.php" method="post">
            <label>First Name: <input type="text" name="firstName" required></label>
            <label>Last Name: <input type="text" name="lastName" required></label>
            <label>Email: <input type="text" name="email" required></label>
            <label>Phone Number: <input type="text" name="phoneNumber" required></label>
            <input type="submit" value="Add Customer">
        </form>
    </div>
</body>
</html>
