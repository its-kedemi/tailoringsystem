<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "tailor";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customerID = $_POST['customerID'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];

    $sql = "UPDATE customers SET firstName='$firstName', lastName='$lastName', email='$email', phoneNumber='$phoneNumber' WHERE customerID=$customerID";

    if ($conn->query($sql) === TRUE) {
        echo "Customer updated successfully.";
        header("Location: managecustomers.php"); // Redirect to the managecustomers.php page
    } else {
        echo "Error updating customer: " . $conn->error;
    }
}

$conn->close();
?>
