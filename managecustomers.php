<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Customers</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #007BFF;
            color: white;
            padding: 10px;
            margin-bottom: 20px;
        }
        .navbar a {
            color: white;
            text-decoration: none;
        }
        .customer {
            border: 1px solid #ddd;
            margin: 20px auto;
            padding: 20px;
            max-width: 600px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .customer h2 {
            margin-top: 0;
            color: #007BFF;
        }
        .customer p {
            line-height: 1.6;
        }
        .button-container {
            margin-top: 15px;
        }
        .button-container button {
            margin-right: 10px;
            padding: 8px 12px;
            cursor: pointer;
        }
        .button-container button.edit {
            background-color: #007BFF;
            color: white;
        }
        .button-container button.delete {
            background-color: #DC3545;
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
    $username = "root"; // replace with your actual database username
    $password = ""; // replace with your actual database password
    $database = "tailor";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if a delete request has been made
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
        $customerID = $_POST['delete'];

        // Delete the customer from the 'customers' table
        $sql = "DELETE FROM customers WHERE customerID = $customerID";
        if ($conn->query($sql) === TRUE) {
            echo "Customer deleted successfully.";
        } else {
            echo "Error deleting customer: " . $conn->error;
        }
    }

    // Fetch customers from the 'customers' table
    $sql = "SELECT * FROM customers";
    $result = $conn->query($sql);

    if ($result === false) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<div class='customer'>";
            echo "<h2>Customer ID: " . $row["customerID"] . "</h2>";
            echo "<p>First Name: " . $row["firstName"] . "</p>";
            echo "<p>Last Name: " . $row["lastName"] . "</p>";
            echo "<p>Email: " . $row["email"] . "</p>";
            echo "<p>Phone Number: " . $row["phoneNumber"] . "</p>";
            echo "<div class='button-container'>";
            echo "<button class='edit' onclick=\"location.href='editcustomer.php?id=".$row["customerID"]."'\">Edit</button>";
            echo "<form method='post' action=''>";
            echo "<input type='hidden' name='delete' value='".$row["customerID"]."'>";
            echo "<button type='submit' class='delete'>Delete</button>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "No customers found.";
    }

    $conn->close();
    ?>
</body>
</html>
