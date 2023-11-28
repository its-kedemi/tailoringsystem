<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Tailoring Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            background: url('C:/Users/HP/Desktop/bacground 1.jpg') center center fixed;
            background-size: cover;
        }

        header {
            background-color: #f5f5f5;
            color: #333;
            padding: 20px;
            text-align: center;
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

        button {
            padding: 8px 12px;
            background-color: #0a0909;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #020202;
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

        input[type="file"] {
            margin-bottom: 15px;
        }

        #imageGallery {
            display: flex;
            flex-wrap: wrap;
        }

        #imageGallery img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin: 5px;
            border-radius: 4px;
        }

        .sidebar {
            width: 200px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background-color: #333;
            color: #fff;
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .sidebar i {
            margin-right: 8px;
        }

        .main-content {
            margin-left: 200px;
            padding: 20px;
        }
    </style>
</head>

<body>
    <header>
        <h1>Admin Panel - Tailoring Management System</h1>
    </header>

    <nav>
        <a href="#">Link 1</a>
        <a href="#">Link 2</a>
    </nav>

    <h3>ADMIN DASHBOARD</h3>

    <div class="dashboard">
        <div class="card" id="totalOrdersCard">
            <div class="card-title">Total Orders</div>
            <div class="card-value" id="totalOrdersValue">Loading...</div>
        </div>
    </div>

    <div class="container">
        <!-- Your content goes here -->
    </div>

    <div class="sidebar">
        <h2>Menu</h2>
        <a href="admin.php"><i class="fas fa-home"></i>Navigation</a>
        <a href="manageorders.php"><i class="fas fa-tasks"></i> Manage Orders</a>
        <a href="addcustomer.php"><i class="fas fa-user-plus"></i> Add Customers</a>
        <a href="managecustomers.php"><i class="fas fa-users"></i> Manage Customers</a>
        <a href="viewpayment.php"><i class="fas fa-users"></i>View Payment</a>
        <a href="login.php"><i class="fas fa-sign-out-alt"></i> Log Out</a>
    </div>

    <script>
        function fetchTotalOrders() {
            const url = 'getTotalOrders.php';

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('totalOrdersValue').textContent = data.totalOrders;
                })
                .catch(error => {
                    console.error('Error fetching total orders:', error);
                });
        }

        window.onload = function () {
            fetchTotalOrders();
        };
    </script>
</body>
</html>
