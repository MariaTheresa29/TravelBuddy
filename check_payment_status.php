<?php
// Include your database connection file
require 'dbcon.php';

// Retrieve user email from the AJAX request
$userEmail = isset($_POST['email']) ? $_POST['email'] : '';

// Validate input (you should add more validation based on your requirements)

// Perform the database query
$query = "SELECT payment_status FROM register WHERE email = '$userEmail'";
$result = mysqli_query($con, $query);

header('Content-Type: application/json'); // Add this line

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $paymentStatus = $row['payment_status'];

    // Send the payment status as a response
    echo json_encode(['status' => $paymentStatus]);
} else {
    // Handle the case where the query fails
    echo json_encode(['status' => 'error']);
}

// Close the database connection
mysqli_close($con);
?>

