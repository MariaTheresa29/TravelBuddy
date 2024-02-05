<?php
require 'dbcon.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve user email and trip ID from the POST data
    $userEmail = isset($_POST['email']) ? $_POST['email'] : '';
    $tripId = isset($_POST['trip_id']) ? $_POST['trip_id'] : '';

    // Validate input (you should add more validation based on your requirements)

    // Check if the user has already joined this trip
    $existingRequestQuery = "SELECT * FROM join_requests WHERE email = '$userEmail' AND trip_id = $tripId";
    $existingRequestResult = mysqli_query($con, $existingRequestQuery);

    if (mysqli_num_rows($existingRequestResult) > 0) {
        echo 'duplicate'; // Inform the client that the user has already joined this trip
    } else {
        // Perform the database insertion
        $insertQuery = "INSERT INTO join_requests (email, trip_id) VALUES ('$userEmail', $tripId)";
        $insertResult = mysqli_query($con, $insertQuery);

        if ($insertResult) {
            echo 'success';
        } else {
            echo 'error';
        }
    }
} else {
    // Invalid request method
    echo 'Invalid request method.';
}
?>


