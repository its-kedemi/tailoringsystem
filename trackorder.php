<?php
// Include your database connection here
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tailor";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize user input
function sanitize_input($input) {
    global $conn;
    return mysqli_real_escape_string($conn, $input);
}

// Start the session to retrieve user ID
session_start();
$userId = $_SESSION['userId']; // Corrected variable name

// Check if the user is logged in
if (!isset($_SESSION['isAuthenticated']) || $_SESSION['isAuthenticated'] !== true) {
    header("Location: login.php");
    exit;
}

// Check if the order ID is provided in the URL
if (isset($_GET['orderId'])) {
    $orderId = sanitize_input($_GET['orderId']);

    // Prepare the SQL statement
    $sql = "SELECT * FROM orders WHERE user = ? AND orderId = ?";

    // Initialize the statement
    $stmt = $conn->prepare($sql);

    // Bind the parameters
    $stmt->bind_param("is", $userId, $orderId); // Corrected variable name

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if the order exists
    if ($result->num_rows > 0) {
        // Output the order details
        while ($row = $result->fetch_assoc()) {
            echo "Order ID: " . $row["orderId"] . " - Status: " . $row["status"] . "<br>";
            // Add more details as needed
        }
    } else {
        echo "No order found";
    }

    // Close the statement
    $stmt->close();
} else {
    echo "Please provide an Order ID.";
}

// Close the connection
$conn->close();
?>
