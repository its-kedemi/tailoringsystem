<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tailor";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT COUNT(*) AS totalOrders FROM orders";
$result = $conn->query($sql);

$totalOrders = 0;

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalOrders = $row['totalOrders'];
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Management System</title>
    <style>
     body {
    font-family: 'Arial', sans-serif;
    background-size: cover;
    text-align: center;
    margin: 0;
    padding: 0;
    color: #333;
    background-image: url('C:/Users/HP/Desktop/bacground 1.jpg'); /* Add the path to your background image */
    background-repeat: no-repeat;
    background-attachment: fixed;
}

/* ... (rest of your CSS styles) ... */

header {
    background-color: rgba(0, 0, 0, 0.5); 
    color: #fff;
    padding: 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

header h1 {
    margin: 0;
    font-size: 1.5em;
}

header a {
    color: #fff;
    text-decoration: none;
    margin: 0 10px;
    cursor: pointer;
}

nav {
    background-color: #444;
    padding: 10px;
}

nav a {
    color: #ffffff;
    text-decoration: none;
    padding: 10px 20px;
    margin: 0 10px;
    border-radius: 4px;
    background-color: #0a0909;
    transition: background-color 0.3s ease;
}

nav a:hover {
    background-color: #020202;
}

.container {
    max-width: 800px;
    margin: 20px auto;
    background-color: rgba(255, 255, 255, 0.8); 
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.dashboard {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    align-items: center;
}

.card {
    width: 300px;
    height: 120px;
    margin: 10px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(126, 36, 36, 0.1);
    background-color: #e7f0e7;
    text-align: center;
    border: 1px solid #ddd;
    position: relative;
    cursor: pointer;
    transition: transform 0.3s ease;
}

.card:hover {
    transform: scale(1.05); /* Hover effect - scale up */
}

.card-title {
    font-weight: bold;
    font-size: 18px;
    margin-top: 10px;
}

.card-value {
    font-size: 50px;
}

.arrow {
    position: absolute;
    bottom: 15px;
    left: 50%;
    transform: translateX(-50%);
    cursor: pointer;
    font-size: 24px;
}

h3 {
    color: #333;
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
    background-color: #444;
    color: #fff;
}

        
    </style>
</head>

<body>
    <header>
        <h1>ZETECH ONLINE TAILORING MANAGEMENT SYSTEM</h1>
        <div>
            <a onclick="logout()">Log Out</a>
        </div>
    </header>

    <nav>
        <a href="#">Dashboard</a>
        <a href="placeorder.php">Place Order</a>
        <a href="vieworder.php">View Order</a>
        <a href="addpayment.php">Add Payment</a>
        <a href="#" onclick="goToImagesPage()">Images</a>
        <a href="trackorder.php">Track Order</a>
        <a href="#" onclick="goToAboutPage()">About</a>
    </nav>
    

    <h3>DASHBOARD</h3>
    <div class="dashboard">

    <div class="card" onclick="goToViewOrderPage()">
            <div class="card-title">Total Orders</div>
            <div class="card-value"><?php echo $totalOrders; ?></div>
            <div class="arrow">&#x2192;</div>
        </div>
        
        <div class="card" onclick="goToViewOrderPage()">
            <div class="card-title">View Orders</div>
            <div class="card-value"></div>
            <div class="arrow">&#x2192;</div>
        </div>
    </div>

    
    <div class="container">
        <h4>CLOTH PRICES</h4>
        <table>
            <thead>
                <tr>
                    <th>Cloth</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>DRESS</td>
                    <td>KSH500</td>
                </tr>
                <tr>
                    <td>SUIT</td>
                    <td>KSH10,000</td>
                </tr>
                <tr>
                    <td>SHORT</td>
                    <td>KSH350</td>
                </tr>
                <tr>
                    <td>CARDIGAN</td>
                    <td>KSH500</td>
                </tr>
            </tbody>
        </table>
    </div>

    <script>
        // Function to navigate to the Images page
        function goToImagesPage() {
            window.location.href = 'images.php';
        }

        // Function to navigate to the About page
        function goToAboutPage() {
            window.location.href = 'about.php';
        }

        // Function to navigate to the View Order page
        function goToViewOrderPage() {
            window.location.href = 'vieworder.php';
        }

        // Function to update Total Orders section
        function updateTotalOrders() {
            // Clear user session data (if any)
            sessionStorage.clear();

            // Redirect to signout page
            window.location.href = "signout.php";
        }

        // Function to logout
        function logout() {
            sessionStorage.clear();
            window.location.href = "login.php";
        }

    
    </script>
</body>
</html>
