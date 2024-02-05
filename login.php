<?php 
include('security.php');
if(isset($_POST["sign-in"]))
{
$email=$_POST['email'];
$password=$_POST['password'];
$query = "select * from register where email='$email' and password='$password'";
$result= mysqli_query($con,"select * from register where email='$email' and password='$password'");
$row =mysqli_fetch_array($result);
echo $query;
if($row["usertype"]==0 && $row>0)
{
    $_SESSION['email']=$email;
     header("Location:profile.php");
     exit();
}
elseif($row["usertype"]==1)
{
       $_SESSION['email']=$email;
       header("Location:../admin/index.php");
       exit();
}
    else
    {
        echo "<script> alert('Wrong Password'); </script>"; 
    }
    header("Location:login.html");
    exit();
}
?>
<?php 
include('script.php');?>