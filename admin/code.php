<?php
include('config/dbcon.php');
if(isset($_POST['about_save']))
{ 
  $img1=$_POST['img1'];
  $img2=$_POST['img2'];
  $img3=$_POST['img3'];
  $description=$_POST['description'];
      
      $sql = "INSERT INTO aboutus (img_1,img_2,img_3,description) value('$img1','$img2','$img3','$description')";
      mysqli_query($con,$sql);
      echo "<script> alert('Added successfully');</script>";
      echo '<script>
  window.location.href= "about.php";
  </script>';
    }  
   else
    {
      echo "<script> alert('About wasn't updated');</script>";
      echo '<script>
  window.location.href= "about.php";
  </script>';
    }
//about_update

if(isset($_POST['about_updatebtn']))
{
    $id = $_POST['about_edit_id'];
    $edit_img1 = $_POST['edit_img1'];
    $edit_img2 = $_POST['edit_img2'];
    $edit_img3 = $_POST['edit_img3'];
    $description = $_POST['edit_description'];

    $query = "UPDATE aboutus SET img_1='$edit_img1',img_2='$edit_img2',img_3='$edit_img3',description='$description' WHERE about_id='$id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: aboutus.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: aboutus.php'); 
    }
}

//delete about
if(isset($_POST['about_delete_btn']))
{
    $id = $_POST['about_delete_id'];
    $query = "DELETE FROM aboutus WHERE about_id='$id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: aboutus.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: aboutus.php'); 
    }
}
?>
