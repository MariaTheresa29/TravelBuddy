<?php
include('./dbcon.php');
if (isset($_POST['sign-up'])) {
    $fname = $_POST['fn'];
    $lname = $_POST['ln'];
    $email = $_POST['email'];
    $phoneno = $_POST['phone'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $language = $_POST['language'];
    $profile_img = $_POST['profile_img'];
    $password = ($_POST['password']);
    $confirmpass = $_POST['confirmpassword'];
    $select = mysqli_query($con, "SELECT * FROM register WHERE 
email='$email'");
    if (mysqli_num_rows($select) > 0) {
        echo "<script> alert('Email already registered');</script>";
        echo '<script>
window.location.href= "reg.php";
</script>';
    } else {
        if ($password == $confirmpass) {
            $sql = "INSERT INTO register(first_name,last_name,email,address,password,gender,country,language,profile_img,phone,confirmpassword)
 VALUES ('$fname','$lname','$email','$address','$password','$gender','$country','$language ','$profile_img','$phoneno','$confirmpass')";
            mysqli_query($con, $sql);
            echo "<script> alert('Registered successfully');</script>";
            echo '<script>
window.location.href= "login.html";
</script>';
        } else {
            echo "<script> alert('Password doesnt match');</script>";
            echo '<script>
window.location.href= "reg.html";
</script>';
        }
    }
}
