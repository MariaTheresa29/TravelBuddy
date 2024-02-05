<?php
include('security.php');
include('dbcon.php');

//Profile

if (isset($_POST['save_profile'])) {

    $userID = $_SESSION['email'];
    $Image = $_FILES["Profile"]['name'];

    $sql = "UPDATE register SET profile_img = '$userID" . "_" . "$Image' WHERE email = ?";
    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $userID);
        mysqli_stmt_execute($stmt);

        // Move the uploaded file to the profile_uploads folder with the user ID prefix
        move_uploaded_file($_FILES["Profile"]["tmp_name"], "profile_uploads/" . $userID . "_" . $_FILES["Profile"]["name"]);

        echo "<script> alert('Added successfully');</script>";
        header('Location: profile.php');
    } else {
        echo "Error in prepared statement: " . mysqli_error($con);
        echo "<script> alert('Not updated');</script>";
        header('Location: profile.php');
    }
    mysqli_stmt_close($stmt);
}

if (isset($_POST['upload_travel_image'])) {
    $user_email = $_SESSION['email'];
    $image_path = $_FILES['travel_image']['name'];
    move_uploaded_file($_FILES['travel_image']['tmp_name'],"travel_uploads/" . $image_path);
    $sql = "INSERT INTO travel_images (user_email, image_path) VALUES ('$user_email', '$image_path')";
    mysqli_query($con, $sql);
    echo "<script> alert('Added successfully');</script>";
    header('Location: profile.php');
}
    else {
        echo "Error in prepared statement: " . mysqli_error($con);
        echo "<script> alert('Not updated');</script>";
        header('Location: profile.php');
}

if (isset($_POST['Contact_Msg'])) {
    $c_name = $_POST['c_name'];
    $c_email = $_POST['c_email'];
    $c_phone = $_POST['c_phone'];
    $c_message = $_POST['c_message'];
            $sql = "INSERT INTO contactus(c_name,c_email,c_phone,c_message)
 VALUES ('$c_name','$c_email','$c_phone','$c_message')";
            mysqli_query($con, $sql);
            if($sql)
            echo "<script> alert('Message sent successfully');</script>";
            echo '<script>
window.location.href= "contact-us.php";
</script>';
        } else {
            echo "<script> alert('OOps something went wrong');</script>";
            echo '<script>
window.location.href= "contact-us.php";
</script>';
        }
?>
<?php
include('security.php');
include('dbcon.php');
        if (isset($_POST['card_submit'])) {
            $user_email = $_SESSION['email'];
            $card_num = $_POST['card_num'];
            $exp = $_POST['exp'];
            $card_name = $_POST['card_name'];
            $btnradio = $_POST['btnradio'];
            echo "btnradio: " . $btnradio;
            $sql = "INSERT INTO payment(user_email, card_num, exp, card_name, btnradio)
                    VALUES ('$user_email', '$card_num', '$exp', '$card_name', '$btnradio')";
            
            $result = mysqli_query($con, $sql);
        
            if ($result) {
                echo "<script> alert('Payment sent successfully');</script>";
                echo 'console.log("Before redirect");';
                echo '<script>window.location.href= "payment.php";</script>';
            } else {
                echo "<script> alert('Oops, something went wrong');</script>";
                echo 'console.log("Before redirect");';
                echo '<script>window.location.href= "payment.php";</script>';
            }
        }
        
?>









