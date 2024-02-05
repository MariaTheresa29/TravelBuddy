<style>
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        max-width: 400px;
        margin: 0 auto;
    }

    .close {
        cursor: pointer;
        position: absolute;
        top: 10px;
        right: 10px;
    }

    .trip-details {
        margin-left: 384px;
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 5px;
    display: flex;
    justify-content: space-between;
    background-color: #fff;
    margin-top: -8rem;
    width: 60rem;
    /* margin-right: 21rem; */
    text-align: center;
    /* flex-direction: column; */
    /* align-items: flex-start; */
    }

    .trip-details h5 {
        font-weight: bold;
        color: cadetblue;
    }

    .trip-details p {
        margin: 10px 0;
        font-size: 20px;
        color: #555;
        width: 108px;
    }

    .trip-details strong {
        font-weight: bold;
        color: #333;
        width: 300px;
    }

    .button3 {
        height: 46px;
        margin-top: 7px;
        width: 179px;
        background-color: cadetblue;
        color: #fff;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
        .trip-container {
    /* Add margin to the container to separate each trip */
    margin-bottom: 20px;
    }
</style>
<?php
include('security.php');
include('includes/header.php');
?>
<?php
require 'dbcon.php';
// code.php
$user_email = $_SESSION['email'];
if (isset($_POST['Send_Message'])) {
    // Retrieve form data
    $message = $_POST['Message'];
    $recipientEmail = $_POST['Recipient_Email'];

    // Perform any necessary validation

    // Insert the message into the database or send it through another channel
    // For simplicity, let's assume you have a messages table
    $insertQuery = "INSERT INTO message (sender_email, recipient_email, message) 
                    VALUES ('$user_email', '$recipientEmail', '$message')";
    $insertResult = mysqli_query($con, $insertQuery);

    if ($insertResult) {
        // Message sent successfully
        // You may want to redirect the user or show a success message
    } else {
        // Handle the case where the message failed to be sent
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-..."> <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="css/find_travel.css">
    <script>
        $(document).ready(function() {
            $('.button3').click(function() {
                var recipientEmail = $(this).data('recipient-email');
                $('#recipient-email-input').val(recipientEmail);
            });
        });
    </script>
    <title>Create Trip</title>
</head>

<body>
    <!-- Modal -->
    <div class="modal fade" id="MessageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fs-5" id="exampleModalLabel">Send Message</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data">

                        <div class="modal-body">
                            <div class="form-group">
                                <input type="hidden" id="recipient-email-input" name="Recipient_Email">
                            </div>
                            <div class="form-group">
                                <label>Message</label>
                                <textarea name="Message" class="form-control" placeholder="Type Your Message"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="Send_Message" class="btn btn-primary">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->

    <!--Search Travel-->

    <form method="post" action="search.php">
        <div class="create-trip-container">
            <div class="create-trip-heading">Find Travel Partners for Your Trip</div>
            <div class="row">
                <div class="col">
                    <label for="destination">Destination:</label>
                    <input type="text" name="destination" class="form-control" id="destination" placeholder="Enter destination">
                </div>

                <div class="col">
                    <label for="date">Date:From</label>
                    <input type="date" name="dateFrom" class="form-control" id="date">
                </div>

                <div class="col">
                    <label for="date">Date:To</label>
                    <input type="date" name="dateTo"="form-control" id="date">
                </div>

                <div class="col">
                    <label for="accommodation">Accommodation:</label>
                    <select name="accommodation" class="form-control" id="accommodation">
                        <option value="" disabled selected>Select accommodation</option>
                        <option value="home">Home</option>
                        <option value="hotel">Hotel</option>
                        <option value="apartment">Apartment</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <div class="col">
                    <label for="language">Language:</label>
                    <select name="language" class="form-control" id="language">
                        <option value="" disabled selected>Language</option>
                        <option value="plane">English</option>
                        <option value="car">Hindi</option>
                    </select>
                </div>

                <div class="col">
                    <label for="itinerary">Itinerary:</label>
                    <select name="itinerary" class="form-control" id="itinerary">
                        <option value="" disabled selected>Itinerary</option>
                        <option value="plane">Fixed</option>
                        <option value="car">Flexible</option>
                    </select>
                </div>

                <div class="col">
                    <label style="margin-top: 27px;" for="modeOfTravel">Mode of Travel:</label>
                    <select name="modeOfTravel" class="form-control" id="modeOfTravel">
                        <option value="" disabled selected>Select mode of travel</option>
                        <option value="plane">Plane</option>
                        <option value="car">Car</option>
                        <option value="train">Train</option>
                        <option value="other">Other</option>
                    </select>
                </div>
            </div>
                <button name="REQUEST" style="margin-top: 27px; margin-left: 25rem; width: 20%; background-color: cadetblue;">Search</button>
        </div>
    </form>


    <div class="Find-Traveller-container">
        <div class="Find-Traveller">Find Traveller</div>
    </div>

    <?php
require 'dbcon.php';

// Fetch profiles from the register table
$profileQuery = "SELECT * FROM register WHERE usertype = 0";
$profileResult = mysqli_query($con, $profileQuery);

// Check if there are any profiles
if (mysqli_num_rows($profileResult) > 0) {
    while ($profileRow = mysqli_fetch_assoc($profileResult)) {
        $user_email = $profileRow['email'];
        $profileImagePath = "profile_uploads/" . $profileRow['profile_img'];

        // Fetch trips for the specific user from the trip table
        $tripQuery = "SELECT * FROM trip WHERE user_email = '$user_email'";
        $tripResult = mysqli_query($con, $tripQuery);

        // Check if there are any trips for the user
        if (mysqli_num_rows($tripResult) > 0) {
            while ($tripRow = mysqli_fetch_assoc($tripResult)) {
                echo "<div class='trip-container'>";
                echo "<div class='profile-container'>";
                echo "<div class='profile-image'>";
                echo "<img src='$profileImagePath' alt='Profile Picture'>";
                echo "</div>";
                echo "<div class='profile-info'>";
                echo "<h2>{$profileRow['first_name']}</h2>";
                echo "<h6>{$profileRow['email']}</h6>";
                echo "</div>";
                echo "<button class='button3' data-toggle='modal' data-recipient-email='{$profileRow['email']}' data-target='#MessageModal'><i class='fas fa-plus'></i>Message</button>";
    
                echo "</div>"; // Close the profile-container
        
                // Display each trip in a separate container
                echo "<div class='trip-details'>";
                echo "<h5>Trip Details:</h5>";
                echo "<p><strong>Destination:</strong> {$tripRow['Destination']}</p>";
                echo "<p><strong>Date From:</strong> {$tripRow['Date_from']}</p>";
                echo "<p><strong>Date To:</strong> {$tripRow['Date_to']}</p>";
                echo "<p><strong>Accommodation:</strong> {$tripRow['Accomodation']}</p>";
                echo "<p><strong>Budget:</strong> {$tripRow['Budget']}</p>";
                echo "</div>";
        
                echo "<button class='button2' onclick='joinTrip(\"{$profileRow['email']}\", {$tripRow['trip_id']})'><i class='fas fa-plus'></i>Join Trip</button>";
        
                echo "</div>"; // Close the trip-container
            }
        }        
    }
} else {
    // Display a message if no profiles are found
    echo "<p>No profiles found.</p>";
}
?>


    <script>
function joinTrip(email, trip_id) {
    // Assuming you have a function to check payment status
    checkPaymentStatus(email, trip_id);
}

function checkPaymentStatus(email, trip_id) {
    // Use AJAX to send a request to the server-side script
    $.ajax({
        type: 'POST',
        url: 'check_payment_status.php',
        data: { email: email },
        dataType: 'json',
        success: function(response) {
            if (response.status === 'paid') {
                // Payment is made, send join request
                sendJoinRequest(email, trip_id);
            } else {
                // Redirect to payment page
                window.location.href = 'payment.php';
            }
        },
        error: function() {
            // Handle the case where the AJAX request fails
            console.error('Error checking payment status.');
        }
    });
}


function sendJoinRequest(email, trip_id) {
    // Implement logic to send a join request
    // For simplicity, let's assume you have a requests table
    // Example query: INSERT INTO requests (user_email, trip_id) VALUES ('$userEmail', $tripId)
    // After sending the request, you might display a success message or redirect to another page
    // Replace this with your actual logic.
    $.ajax({
        type: 'POST',
        url: 'process_join_request.php', // Replace with the actual server-side script
        data: {
            email: email,
            trip_id: trip_id
        },
        success: function(response) {
            // Display a message based on the response
            if (response === 'success') {
            alert('Join request sent successfully!');
        } else if (response === 'duplicate') {
            alert('You have already joined this trip.');
        } else {
            alert('Join request sent successfully!');
        }
        },
        error: function(xhr, status, error) {
            // Handle errors
            console.error(error);
        }
    });
}
</script>
<?php
    include('includes/footer.php');
    include('script.php');
?>
</body>

</html>