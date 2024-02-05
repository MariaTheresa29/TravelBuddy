<?php
include('security.php');
include('includes/header.php');
include('dbcon.php');
if (isset($_POST["feedback"])) {
    // Get user email from session
    $user_email = $_SESSION['email'];

    // Get trip details from form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];
    $rating = isset($_POST['rating']);


    // Insert into trip table
    $insertQuery = "INSERT INTO feedback (user_email, name, email,comment, rating) 
                    VALUES ('$user_email','$name', '$email','$comment','$rating')";

    $insertResult = mysqli_query($con, $insertQuery);

    if ($insertResult) {
        echo "<script> alert('Feedback submitted successfully'); </script>";
    } else {
        echo "Error submiting feeding: " . mysqli_error($con);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Montserrat:400,500,600,700%7CPoppins:400%7CTeko:300,400">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/fonts.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <style>
        .feedback-container {
            max-width: 650px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .text-box-label {
            display: block;
            margin-bottom: 8px;
            font-size: 16px;
            color: #333;
        }

        .text-box {
            width: 100%;
            padding: 12px;
            box-sizing: border-box;
            border: 2px solid #3498db;
            border-radius: 5px;
            margin-bottom: 16px;
            font-size: 16px;
            color: #555;
            transition: border-color 0.3s;
        }

        .text-box:focus {
            border-color: #2980b9;
        }

        .text-area {
            width: 100%;
            padding: 12px;
            box-sizing: border-box;
            border: 2px solid #3498db;
            border-radius: 5px;
            margin-bottom: 16px;
            font-size: 16px;
            color: #555;
            resize: vertical;
            transition: border-color 0.3s;
        }

        .text-area:focus {
            border-color: #2980b9;
        }


        .submit-button {
            background-color: cadetblue;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s;
        }

        .submit-button:hover {
            background-color: #2980b9;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .feedback-heading {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .emoji-rating {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
            font-size: 24px;
            /* Adjust the font size as needed */
        }

        .emoji-rating label {
            cursor: pointer;
        }
    </style>
    <title>Feedback Form with Emoji Ratings</title>
</head>

<body background='images/body_bg.jpg'>

    <form action="" method="post">
        <div class="feedback-container">
            <div class="feedback-heading">Feedback Form</div>
            <div class="form-group">
                <label class="text-box-label" for="name">Name:</label>
                <input name="name" class="text-box" required type="text" id="name" placeholder="Enter your name">
            </div>
            <div class="form-group">
                <label class="text-box-label" for="email">Email:</label>
                <input name="email" class="text-box" required type="email" id="email" placeholder="Enter your email">
            </div>
            <div class="form-group">
                <label for="rating">Overall Rating:</label>
                <div class="emoji-rating">
                    <label>
                        <h6>Excellent</h6><input name="rating" type="radio" name="rating" value="5"> 😍
                    </label>
                    <label>
                        <h6>Very Good</h6><input name="rating" type="radio" name="rating" value="4"> 😊
                    </label>
                    <label>
                        <h6>Good</h6><input name="rating" data-constraints="@Required" type="radio" name="rating" value="3"> 😐
                    </label>
                    <label>
                        <h6>Bad</h6><input name="rating" data-constraints="@Required" type="radio" name="rating" value="2"> 😕
                    </label>
                    <label>
                        <h6>Poor</h6><input name="rating" data-constraints="@Required" type="radio" name="rating" value="1"> 😡
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label class="text-box-label" for="comments">Comments:</label>
                <textarea name="comment" required class="text-box text-area" id="comments" placeholder="Enter your comments"></textarea>
            </div>
            <button type="submit" name="feedback" class="submit-button">Submit Feedback</button>

        </div>
    </form>
</body>
<?php
include('includes/footer.php');
include('script.php');
?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</html>