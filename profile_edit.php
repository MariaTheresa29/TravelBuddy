<?php
include('security.php');
include('includes/header.php');
?>

<?php
if (!isset($_SESSION["email"])) {
    header("location:login.php");
}
$email = $_SESSION["email"];
$findresult = mysqli_query($con, "SELECT * FROM register WHERE email= '$email'");
if ($res = mysqli_fetch_array($findresult)) {
    $fname = $res['first_name'];
    $lname = $res['last_name'];
    $email = $res['email'];
    $phoneno = $res['phone'];
    $address = $res['address'];
    $gender = $res['gender'];
    $country = $res['country'];
    $language = $res['language'];
    $password = $res['password'];
}
?>

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
    <title>User Profile Edit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
            </div>
            <div class="col-sm-6">
                <form action="" method="POST" enctype='multipart/form-data'>
                    <div class="login_form">
                        <br> <?php
                                if (isset($_POST['update_profile'])) {
                                    $fname = $_POST['firstname'];
                                    $lname = $_POST['lastname'];
                                    $email = $_POST['emailaddress'];
                                    $phoneno = $_POST['phonenumber'];
                                    $gender = $_POST['gender'];
                                    $address = $_POST['address'];
                                    $country = $_POST['country'];
                                    $language = $_POST['language'];
                                    $password = $_POST['password'];
                                    $sql = "SELECT * from register where email='$email'";
                                    $res = mysqli_query($con, $sql);
                                    if (mysqli_num_rows($res) > 0) {
                                        $row = mysqli_fetch_assoc($res);
                                        $result = mysqli_query($con, "UPDATE register SET first_name='$fname',last_name='$lname',email='$email',phone='$phoneno',
                                        gender='$gender',address='$address',country='$country',language='$language',password=' $password' WHERE email='$email'");
                                        if ($result) {
                                            echo "<script> alert('Updated successfully');</script>";
                                        } else {
                                            $error[] = 'Something went wrong';
                                        }
                                    }
                                }
                                if (isset($error)) {

                                    foreach ($error as $error) {
                                        echo '<p class="errmsg">' . $error . '</p>';
                                    }
                                }
                                ?>
                        <form method="post" enctype='multipart/form-data' action="">
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label>First Name</label>
                            </div>
                            <div class="col">
                                <input type="text" name="firstname" value="<?php echo $fname; ?>" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label>Last Name</label>
                            </div>
                            <div class="col">
                                <input type="text" name="lastname" value="<?php echo $lname; ?>" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label>Email</label>
                            </div>
                            <div class="col">
                                <input type="text" name="emailaddress" value="<?php echo $email; ?>" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label>Phone number</label>
                            </div>
                            <div class="col">
                                <input type="text" name="phonenumber" value="<?php echo $phoneno; ?>" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label>Gender</label>
                            </div>
                            <div class="col">
                                <input type="text" name="gender" value="<?php echo $gender; ?>" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label>Address</label>
                            </div>
                            <div class="col">
                                <input type="text" name="address" value="<?php echo $address; ?>" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label>Country</label>
                            </div>
                            <div class="col">
                                <input type="text" name="country" value="<?php echo $country; ?>" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label>Language</label>
                            </div>
                            <div class="col">
                                <input type="text" name="language" value="<?php echo $language; ?>" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label>Password</label>
                            </div>
                            <div class="col">
                                <input type="text" name="password" value="<?php echo $password; ?>" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">

                        <div class="row">
                            <div class="col-sm-6">
                            </div>
                            <div class="col-sm-6">
                                <button class="btn btn-success" name="update_profile">Update Profile</button>
                            </div>
                        </div>
                </form>
            </div>
            <div class="col-sm-3">
            </div>
        </div>
    </div>
    <div class="col-sm-6">
                                <a href="profile.php"> <button class="btn btn-danger" name="update_profile">Back</button></a>
                            </div>
</body>
<?php
include('script.php');
include('includes/footer.php');
?>
</html>