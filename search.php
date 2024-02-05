<?php
include('security.php');
include('includes/header.php');
?>

<style>
    .trip-details {
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 15px;
        margin: 15px 0;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .trip-details h5 {
        font-weight: bold;
        color: #333;
        margin-bottom: 10px;
    }

    .trip-details p {
        margin: 5px 0;
        font-size: 16px;
        color: #555;
    }

    .trip-details strong {
        font-weight: bold;
        color: #333;
    }

    .profile-name {
        width: 36rem;
    height: 10rem;
    font-size: x-large;
    margin-right: 48rem;
}
.button3 {
        height: 46px;
        background-color: cadetblue;
        color: #fff;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    .card-title b {
    background: linear-gradient(to right, #ff0000, #ff8000, #ffff00, #80ff00, #00ff80, #00ffff, #0080ff, #0000ff);
    -webkit-background-clip: text;
    color: transparent;
    display: inline-block;
    padding-bottom: 5px; /* Adjust as needed */
    border-bottom: 2px solid #000; 
}
/* Add this style to your existing CSS */

</style>

<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-..."> <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <title>Search Trip</title>
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

<?php
    require 'dbcon.php';
    if (isset($_POST['REQUEST'])) {
        // Retrieve input values
        $destination = isset($_POST['destination']) ? mysqli_real_escape_string($con, $_POST['destination']) : '';
        $dateFrom = isset($_POST['dateFrom']) ? mysqli_real_escape_string($con, $_POST['dateFrom']) : '';
        $dateTo = isset($_POST['dateTo']) ? mysqli_real_escape_string($con, $_POST['dateTo']) : '';
        $accommodation = isset($_POST['accommodation']) ? mysqli_real_escape_string($con, $_POST['accommodation']) : '';
        $language = isset($_POST['language']) ? mysqli_real_escape_string($con, $_POST['language']) : '';
        $itinerary = isset($_POST['itinerary']) ? mysqli_real_escape_string($con, $_POST['itinerary']) : '';
        $modeOfTravel = isset($_POST['modeOfTravel']) ? mysqli_real_escape_string($con, $_POST['modeOfTravel']) : '';

        // Build the query based on the entered criteria
      
        $query = "SELECT trip.*, register.profile_img,register.first_name,register.email FROM trip JOIN register ON trip.user_email = register.email WHERE 1=1";

        if (!empty($destination)) {
            $query .= " AND destination = '$destination'";
        } elseif (!empty($dateFrom)) {
            $query .= " AND date_from >= '$dateFrom'";
        } elseif (!empty($dateTo)) {
            $query .= " AND date_to <= '$dateTo'";
        } elseif (!empty($accommodation)) {
            $query .= " AND Accomodation = '$accommodation'";
        } elseif (!empty($language)) {
            $query .= " AND language = '$language'";
        } elseif (!empty($itinerary)) {
            $query .= " AND Itenary = '$itinerary'";
        } elseif (!empty($modeOfTravel)) {
            $query .= " AND mode_of_travel = '$modeOfTravel'";
        }

        // Execute the query
        $result = mysqli_query($con, $query);

        if (!$result) {
            echo "Error in trip search query: " . mysqli_error($con);
        } else {
        ?>
         <div class="container">
        <?php
        // Check if there are any profiles
        while ($row = mysqli_fetch_assoc($result)) {
            // Assuming you have a $row array containing trip details
            echo "<div class='card trip-card' style='margin-top:5rem;margin-bottom:5rem;'>";
            echo "<div class='card-body'>";
            echo "<img src='profile_uploads/{$row['profile_img']}' alt='Profile Photo' class='img-fluid' style='max-width:  212px;height: 18rem; float: left; margin-right: 15px;'>";
            echo "<div class='profile-name' style='font-size: x-large;'>";  
            echo "<b>{$row['first_name']}</b><br>";
            echo "<b>{$row['email']}</b>";
            echo "</div>";  
            echo "<div style='font-size: x-large;margin-left: 40rem;font-size: x-large;margin-top: -10rem;'>";  
            echo "<h4 class='card-title'><b>Trip Details:</b></h4>";
            // Output the trip details, customize as needed
            echo "<p class='card-text'><strong>Destination:</strong> {$row['Destination']}</p>";
            echo "<p class='card-text'><strong>Date From:</strong> {$row['Date_from']}</p>";
            echo "<p class='card-text'><strong>Date To:</strong> {$row['Date_to']}</p>";
            echo "<p class='card-text'><strong>Accommodation:</strong> {$row['Accomodation']}</p>";
            echo "<p class='card-text'><strong>Budget:</strong> {$row['Budget']}</p>";
            echo "<div style='clear: both;'></div>";
            // Add more details as needed
            echo "</div>";
            echo "</div>";
            echo "<button class='button3' data-toggle='modal' data-recipient-email='{$row['email']}' data-target='#MessageModal'><i class='fas fa-plus'></i>Message</button>";

            echo "</div>";
        }
        ?>
         </div>
         <a href="find_travel.php"><button style="font-size: large;height:50px;border-radius:5px;width:10%;margin-left:90%;color:#fff;background-color:#c95454">Back</button></a>
         <?php
    }
}
        ?>
        
    </div>
    </body>
    <?php
include('includes/footer.php');
include('script.php');
?>
</html>
