<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add your meta tags, title, and other head elements here -->
</head>
<body background='images/body_bg.jpg'>

<form method="post" action="">
    <div class="create-trip-heading">Create Your Trip</div>
    <div class="create-trip-container">
        <div class="half left-half">
            <div class="form-group">
                <label for="destination">Destination:</label>
                <input type="text" name="destination" required id="destination" placeholder="Enter destination">
            </div>

            <div class="form-group">
                <label for="date-from">Date: From</label>
                <input type="date" required name="date-from" id="date-from" min="<?php echo date('Y-m-d'); ?>">
            </div>

            <div class="form-group">
                <label for="date-to">Date: To</label>
                <input type="date" required name="date-to" id="date-to" min="<?php echo date('Y-m-d'); ?>">
            </div>

            <!-- Add other form fields here -->
        </div>
        <div class="half">
            <!-- Add other form fields here -->

            <button type="submit" name="create-trip">Create Trip</button>
        </div>
    </div>
</form>

<?php
    include('includes/footer.php');
    include('script.php');
?>

</body>
</html>
<button class='reply-button' data-toggle='modal' data-target='#ReplyModal' data-recipient-email='{$unreadRow['sender_email']}' data-message-id='{$unreadRow['msg_id']}'>Reply</button>
<input type="hidden" name="senderEmail" id="senderEmail">
<input type="hidden" name="messageId" id="messageId">
<script>
    $('.reply-button').click(function() {
        var recipientEmail = $(this).data('recipient-email');
        var messageId = $(this).data('message-id');
        $('#senderEmail').val(recipientEmail);
        $('#messageId').val(messageId);
    });
</script>
