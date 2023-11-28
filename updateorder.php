<?php
// admin_update_order.php

$servername = "localhost";
$username = "root";
$password = "";
$database = "tailor";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $orderID = $_POST["orderID"];
    $customerName = $_POST["customerName"];
    $phoneNumber = $_POST["phoneNumber"];
    $clothType = $_POST["clothType"];
    $quantity = $_POST["quantity"];
    $measurements = $_POST["measurements"];
    $description = $_POST["description"];
    $amountPaid = $_POST["amountPaid"];

    $sql = "UPDATE orders 
            SET customerName='$customerName', phoneNumber='$phoneNumber', clothType='$clothType', 
                quantity='$quantity', measurements='$measurements', description='$description', 
                amountPaid='$amountPaid' 
            WHERE orderID=$orderID";

    if ($conn->query($sql) === TRUE) {
        // Redirect to editorder.php with orderID parameter
        header("Location:manageorders.php?id=$orderID");
        exit();
    } else {
        echo "Error updating order: " . $conn->error;
    }
}

$conn->close();
?>
