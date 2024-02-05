<?php
include('security.php');
include('includes/header.php');
include('dbcon.php');

if (isset($_POST["create-trip"])) {
    // Get user email from session
    $user_email = $_SESSION['email'];

    // Get trip details from form
    $destination = $_POST['destination'];
    $dateFrom = $_POST['date-from'];
    $dateTo = $_POST['date-to'];
    $typeOfJourney = $_POST['typeOfJourney'];
    $travelAndWork = $_POST['travelAndWork'];
    $budget = $_POST['budget'];
    $accommodation = $_POST['accommodation'];
    $meetingBeforeTrip = $_POST['meetingBeforeTrip'];
    $language = $_POST['language'];
    $itinerary = $_POST['itinerary'];
    $modeOfTravel = $_POST['modeOfTravel'];

    // Insert into trip table
    $insertQuery = "INSERT INTO trip (user_email, Destination, Date_from, Date_to, Travel_type, Travel_work, Budget, Accomodation, Meeting, Language, itenary, Mode_of_travel) 
                    VALUES ('$user_email', '$destination', '$dateFrom', '$dateTo', '$typeOfJourney', '$travelAndWork', '$budget', '$accommodation', '$meetingBeforeTrip', '$language', '$itinerary', '$modeOfTravel')";

    $insertResult = mysqli_query($con, $insertQuery);

    if ($insertResult) {
        echo "<script> alert('Trip created successfully'); </script>";
    } else {
        echo "Error creating trip: " . mysqli_error($con);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-..."> <!-- Include Font Awesome for icons -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .half {
            flex: 1;
            padding: 20px;
            box-sizing: border-box;
        }

        .left-half {
            border-right: 1px solid #ccc;
        }

        .create-trip-container {
            font-size: large;
            font-family: cursive;
            color: #fff;
            display: flex;
            max-width: 900px;
            width: 100%;
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin: 20px auto;
            background: rgba(0, 0, 0, 0.6);
            padding: 20px;
        }

        .create-trip-heading {
            text-align: center;
            font-size: 34px;
            font-weight: bold;
            margin-top: 20px;
            margin-bottom: 20px;
            color: #fff;
        }

        .form-group {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            margin-bottom: 8px;
            font-weight: bold;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            margin-top: 5px;
            /* Add some spacing for select elements */
        }

        button {
            background-color: #3498db;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
    <title>Create Trip</title>
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
                    <label for="date">Date:From</label>
                    <input type="date" required name="date-from" id="date-from" min="<?php echo date('Y-m-d'); ?>">
                </div>

                <div class="form-group">
                    <label for="date">Date:To</label>
                    <input type="date" required name="date-to" id="date-to" min="<?php echo date('Y-m-d'); ?>">
                </div>

                <div class="form-group">
                    <label for="typeOfJourney">Type of Journey:</label>
                    <select name="typeOfJourney" required id="typeOfJourney">
                        <option value="" disabled selected>Select type of journey</option>
                        <option value="business">Business</option>
                        <option value="leisure">Leisure</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="travelAndWork">Travel and Work:</label>
                    <select name="travelAndWork"required id="travelAndWork">
                        <option value="" disabled selected>Select travel and work</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="destination">Budget:</label>
                    <input name="budget" required type="text" id="budget" placeholder="Enter Budget">
                </div>
            </div>
            <div class="half">
                <div class="form-group">
                    <label for="accommodation">Accommodation:</label>
                    <select name="accommodation" required id="accommodation">
                        <option value="" disabled selected>Select accommodation</option>
                        <option value="home">Home</option>
                        <option value="hotel">Hotel</option>
                        <option value="apartment">Apartment</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="meetingBeforeTrip">Meeting Before Trip:</label>
                    <select name="meetingBeforeTrip" required id="meetingBeforeTrip">
                        <option value="" disabled selected>Select meeting before trip</option>
                        <option value="Skype">Skype</option>
                        <option value="Personal">Personal</option>
                        <option value="no">No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="language">Language:</label>
                    <select name="language" required id="language">
                        <option value="" disabled selected>Language</option>
                        <option value="plane">English</option>
                        <option value="car">Hindi</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="itinerary">Itinerary:</label>
                    <select name="itinerary" required id="itinerary">
                        <option value="" disabled selected>Itinerary</option>
                        <option value="Fixed">Fixed</option>
                        <option value="Flexible">Flexible</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="modeOfTravel">Mode of Travel:</label>
                    <select name="modeOfTravel" required id="modeOfTravel">
                        <option value="" disabled selected>Select mode of travel</option>
                        <option value="plane">Plane</option>
                        <option value="car">Car</option>
                        <option value="train">Train</option>
                        <option value="other">Other</option>
                    </select>
                </div>
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