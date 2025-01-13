<?php

$host = 'localhost';       // Your database host
$dbname = 'property_rental'; // Your database name
$username = 'root';        // Your database username
$password = '';            // Your database password (for XAMPP, it's typically blank)

// Set the DSN (Data Source Name)
$dsn = "mysql:host=$host;dbname=$dbname;charset=UTF8";    

try {
    // Create a PDO instance
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Catch any connection errors and display them
    echo "Connection failed: " . $e->getMessage();
    exit;
}


// Retrieve the GET parameters (from the URL passed by checkout.php)
$price = isset($_GET['price']) ? $_GET['price'] : null;
$pak = isset($_GET['pak']) ? $_GET['pak'] : null;
$email = isset($_GET['email']) ? $_GET['email'] : null;

// Check if the parameters are present
if ($price === null || $pak === null || $email === null) {
    echo "Missing required parameters!";
    exit;
}

// Calculate the renewal date (30 days from today)
$renewal_date = date('Y-m-d', strtotime('+30 days'));

// Prepare the SQL query to insert transaction data
$sql = "INSERT INTO transactions (transaction_id, user_email, package_name, price, transaction_date, renewal_date, status)
        VALUES (:tran_id, :email, :pak, :price, :tran_date, :renewal_date, :status)";

// Prepare the statement
$stmt = $pdo->prepare($sql);

// Bind the parameters
$tran_id = "SSLCZ_TEST_" . uniqid();  // Unique transaction ID
$tran_date = date('Y-m-d H:i:s');     // Current date and time
$status = 'SUCCESS';                   // Set status as 'SUCCESS'

$stmt->bindParam(':tran_id', $tran_id);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':pak', $pak);
$stmt->bindParam(':price', $price);
$stmt->bindParam(':tran_date', $tran_date);
$stmt->bindParam(':renewal_date', $renewal_date);
$stmt->bindParam(':status', $status);

// Execute the statement
if ($stmt->execute()) {
    echo "Transaction successful and data inserted!";
} else {
    echo "Failed to insert data!";
}

echo "<br><br>" . $status . " " . $tran_date;

        ?>
        <br>
        <br>

        <a href="sellerDashboard.php?do=Invoice" class="btn btn-info">Go Back</a>

        <?php
?>