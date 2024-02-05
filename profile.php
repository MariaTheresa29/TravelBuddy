<?php
include('security.php');
include('includes/header.php');
?>
<?php
// Check for unread messages for the current user
$unreadQuery = "SELECT sender_email,message,msg_id FROM message WHERE recipient_email = '$reg_id' AND is_read = 0";
$unreadResult = mysqli_query($con, $unreadQuery);

if (!$unreadResult) {
    echo "Error in unread messages query: " . mysqli_error($con);
} else {
    $hasUnreadMessages = mysqli_num_rows($unreadResult) > 0;
}
?>
<?php
// code.php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['sendReply'])) {
    $senderEmail = mysqli_real_escape_string($con, $_POST['senderEmail']);
    $messageId = mysqli_real_escape_string($con, $_POST['messageId']);
    $replyMessage = mysqli_real_escape_string($con, $_POST['replyMessage']);

    // Update the message as read
    $updateQuery = "UPDATE message SET is_read = 1 WHERE msg_id = '$messageId' AND sender_email = '$senderEmail'";
    $updateResult = mysqli_query($con, $updateQuery);

    if (!$updateResult) {
        echo "Error updating message as read: " . mysqli_error($con);
    }

    // Insert the reply into the message table
    $insertReplyQuery = "INSERT INTO message (sender_email, recipient_email, message) VALUES ('$reg_id', '$recipientEmail', '$replyMessage')";
    $insertReplyResult = mysqli_query($con, $insertReplyQuery);

    if ($insertReplyResult) {
        echo "<script> alert('Reply sent successfully');</script>";
    } else {
        echo "Error sending reply: " . mysqli_error($con);
    }
}
?>

<style>
  body {
    font-family: 'Arial', sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
  }

  .profile-image {
    width: 150px;
    /* Set a fixed width for the profile image */
    height: 184px;
    /* Set a fixed height for the profile image */
    object-fit: cover;
    /* Maintain aspect ratio and cover the container */
  }

  .my-trip-container {
    max-width: 800px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    margin-top: 20px;
  }

  .my-trip-heading {
    font-size: 24px;
    font-weight: bold;
    color: #3498db;
    margin-bottom: 20px;
  }

  .trip-details {
    border: 1px solid #ddd;
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 5px;
    display: flex;
    justify-content: space-between;
    background-color: #fff;
  }

  .trip-details p {
    margin: 10px 0;
    font-size: 20px;
    color: #555;
  }

  .trip-details strong {
    font-weight: bold;
    color: #333;
    width: 300px;
  }

  .trip-image {
    max-width: 326px;
    border-radius: 5px;
    height: 250px;
  }

  .create-my-trip {
    display: block;
    margin-top: 15px;
    text-decoration: none;
    padding: 10px;
    background-color: #3498db;
    color: #fff;
    border-radius: 5px;
    text-align: center;
    font-size: 18px;
  }
</style>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-..."> <!-- Include Font Awesome for icons -->
  <link rel="stylesheet" href="css/profile.css">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Montserrat:400,500,600,700%7CPoppins:400%7CTeko:300,400">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/fonts.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script>
    $(document).ready(function () {
        $('.reply-button').click(function () {
            var recipientEmail = $(this).data('recipient-email');
            var messageId = $(this).data('message-id');
            $('#senderEmail').val(recipientEmail);
            $('#messageId').val(messageId);
        });
    });
</script>

  <title>User Profile</title>
</head>

<body>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title fs-5" id="exampleModalLabel">Add Profile</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="code.php" method="POST" enctype="multipart/form-data">

            <div class="modal-body">
              <div class="form-group">
                <label>Profile Image</label>
                <input type="file" name="Profile" class="form-control" placeholder="Upload Image">
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" name="save_profile" class="btn btn-primary">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->

  <!-- Travel Modal -->
  <div class="modal fade" id="TravelModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title fs-5" id="exampleModalLabel">Add Image</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="code.php" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="form-group">
                <label>Travel Image</label>
                <input type="file" name="travel_image" class="form-control" placeholder="Upload Image">
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" name="upload_travel_image" class="btn btn-primary">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->

<!-- Message Notification Modal-->
<div class="modal fade" id="MessageNotificationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Message Notifications</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Display unread messages -->
                <h6>Unread Messages:</h6>
                <?php
                while ($unreadRow = mysqli_fetch_assoc($unreadResult)) {
                    echo "<div class='notification-item'>";
                    echo "New message from {$unreadRow['sender_email']}: {$unreadRow['message']}";
                    echo "<button class='reply-button' data-toggle='modal' data-target='#ReplyModal' data-recipient-email='{$unreadRow['sender_email']}' data-message-id='{$unreadRow['msg_id']}'>Reply</button>";
                    echo "</div>";
                }
                ?>

                <!-- Display read messages -->
                <h6>Read Messages:</h6>
                <?php
                $readQuery = "SELECT msg_id, sender_email, message FROM message WHERE recipient_email = '$reg_id' AND is_read = 1";
                $readResult = mysqli_query($con, $readQuery);

                while ($readRow = mysqli_fetch_assoc($readResult)) {
                    echo "<div class='notification-item'>";
                    echo "Message from {$readRow['sender_email']}: {$readRow['message']}";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </div>
</div> 
<!-- Reply Modal -->
<div class="modal fade" id="ReplyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reply to Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="replyMessage">Your Reply:</label>
                        <textarea class="form-control" name="replyMessage" id="replyMessage" rows="3" required></textarea>
                    </div>
                    <input type="hidden" name="senderEmail" id="senderEmail">
                    <input type="hidden" name="messageId" id="messageId">
                    <button type="submit" name="sendReply" class="btn btn-primary">Send Reply</button>
                </form>
            </div>
        </div>
    </div>
</div>

  <!--Profile profile-container-->
  <div class="profile-container">
    <div class="profile-picture">
      <?php
      require 'dbcon.php';
      // Assuming you have a session variable storing the logged-in user ID
      $reg_id = $_SESSION['email']; // Replace 'user_id' with your actual session variable

      $query = "SELECT profile_img FROM register WHERE email= '$reg_id'";
      $query_run = mysqli_query($con, $query);

      if ($query_run) {
        $row = mysqli_fetch_assoc($query_run);
        if ($row) {
          $profileImagePath = "profile_uploads/" . $row['profile_img'];
      ?>
          <img class="profile-image" src="<?php echo $profileImagePath; ?>" alt="Profile Picture">
          <!-- Button trigger modal -->
      <?php
        } else {
          echo "No record found for the logged-in user";
        }
      } else {
        echo "Query execution error: " . mysqli_error($con);
      }
      ?>
      <button style=" width: 89%;height: 2rem;margin-top: -12px; font-size:smaller;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i>
        Upload Profile
      </button>
    </div>
    <br>
    <br>
    <br>
    <br>

    <!--Profile name-->
    <div class="profile-name">
      <?php
      require 'dbcon.php';
      $reg_id = $_SESSION['email'];
      $query = "SELECT first_name FROM register WHERE email= '$reg_id'";
      $query_run = mysqli_query($con, $query);
      if ($query_run) {
        $row = mysqli_fetch_assoc($query_run);
        if ($row) {
      ?>
          <div>
            <h4><?php echo $row['first_name']; ?></h4>
          </div>
      <?php
        } else {
          echo "No record found for the logged-in user";
        }
      } else {
        echo "Query execution error: " . mysqli_error($con);
      }
      ?>
      <!--Create Trip-->
      <a href="create_trip.php"><button class="create-trip"><i class="fas fa-plus"></i>Create Trip</button></a>
      <a href="profile_edit.php">
        <h4>About me&nbsp;<button class="About_me"><i class="fa fa-edit"></i></button></h4>
      </a>
      <div style="display: flex;flex-direction: row-reverse;justify-content: space-evenly;margin-top: -4rem;">       
<button class="notification-button <?php echo $hasUnreadMessages ? 'unread' : ''; ?>" data-toggle="modal" data-target="#MessageNotificationModal">
    <i class="fas fa-bell"></i>
</button>
      </div>
    </div>

    <!--Travel_Images-->
    <div class="profile-details">
      <div class="upload-boxes">
        <?php
        require 'dbcon.php';
        $user_email = $_SESSION['email'];
        $sql = "SELECT * FROM travel_images WHERE user_email = '$user_email'";
        $result = mysqli_query($con, $sql);

        // Counter to keep track of the box number
        $boxNumber = 0;

        while ($row = mysqli_fetch_assoc($result)) {
          $ImagePath = "travel_uploads/" . $row['image_path'];
        ?>
          <div class="upload-box">
            <img class="fixed-size-image" src="<?php echo $ImagePath; ?>" alt="Travel Picture">
            <center><i class="fas fa-cloud-upload-alt"></i></center>
          </div>
        <?php
          $boxNumber++;
        }
        ?>
      </div>
      <button style="width: 81rem; height: 2rem; margin-top: -10px; font-size: smaller;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#TravelModal"><i class="fas fa-plus"></i>
        Upload
      </button>

      <?php
      require 'dbcon.php';
      $user_email = $_SESSION['email'];

      // Handle saving the description if the form is submitted
      if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_description'])) {
        $newDescription = mysqli_real_escape_string($con, $_POST['description']);
        $updateQuery = "UPDATE register SET description = '$newDescription' WHERE email = '$user_email'";
        $updateResult = mysqli_query($con, $updateQuery);

        if ($updateResult) {
          echo "<script> alert('Description updated successfully');</script>";
        } else {
          echo "Error updating description: " . mysqli_error($con);
        }
      }

      // Fetch the saved description from the database
      $descriptionQuery = "SELECT description FROM register WHERE email = '$user_email'";
      $descriptionResult = mysqli_query($con, $descriptionQuery);

      if ($descriptionRow = mysqli_fetch_assoc($descriptionResult)) {
        $savedDescription = $descriptionRow['description'];
      } else {
        $savedDescription = ""; // Default to an empty string if no description is found
      }
      ?>
      <form method="post" action="">
        <div class="description-box">
          <textarea name="description" id="descriptionInput" placeholder="Add Description"><?php echo $savedDescription; ?></textarea>
        </div>
        <button type="submit" class="save-changes" name="update_description">Save Changes</button>
      </form>

    </div>
  </div>
  <!-- My Trip Section -->
  <?php

  $user_email = $_SESSION['email'];

  // Fetch trips for the specific user from the database
  $selectQuery = "SELECT * FROM trip WHERE user_email = '$user_email'";
  $result = mysqli_query($con, $selectQuery);
  ?>
  <div class="my-trip-container">
    <?php
    // Check if there are any trips for the user
    if (mysqli_num_rows($result) > 0) {
      // Display the trips
      echo "<div class='my-trip-container'>";
      echo "<div class='my-trip-heading'>My Trip</div>";
      // Loop through the fetched trips and display trip details
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='trip-details'>";
        echo "<div>";
        echo "<img class='trip-image' src='travel_uploads/gallery-1.jpg' alt='Trip Image'>";
        echo "</div>";
        echo "<div class='left'>";
        echo "<p><strong>Destination:</strong> {$row['Destination']}</p>";
        echo "<p><strong>Date From:</strong> {$row['Date_from']}</p>";
        echo "<p><strong>Date To:</strong> {$row['Date_to']}</p>";
        echo "<p><strong>Accommodation:</strong> {$row['Accomodation']}</p>";
        echo "</div>";
        echo "<div>";
        echo "<p><strong>Travel_type:</strong> {$row['Travel_type']}</p>";
        echo "<p><strong>Travel_work:</strong> {$row['Travel_work']}</p>";
        echo "<p><strong>Budget:</strong> {$row['Budget']}</p>";
        echo "<p><strong>Mode_of_travel:</strong> {$row['Mode_of_travel']}</p>";
        echo "</div>";
        echo "<div class='right'>";
        echo "<p><strong>Meeting:</strong> {$row['Meeting']}</p>";
        echo "<p><strong>Language:</strong> {$row['Language']}</p>";
        echo "<p><strong>Itenary:</strong> {$row['Itenary']}</p>";
        echo "</div>";
        echo "</div>";
      }
      echo "</div>";
    } else {
      // Display a message if no trips are found
      echo "<div class='my-trip-container'>";
      echo "<div class='my-trip-heading'>My Trip</div>";
      echo "<a href='create_trip.php' class='create-my-trip'><i class='fas fa-plus'></i>Create My Trip</a>";
      echo "<p>No trips found for this user.</p>";
      echo "</div>";
    }
    ?>
    <center>
      <a href="create_trip.php"><button style=" font-weight: bold; font-size:medium" class="create-trip">Travel-more</button></a>
    </center>
  </div>
</body>
<?php
include('includes/footer.php');
include('script.php');
?>

</html>