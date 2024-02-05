   <?php
  //  session_start();
   $host= "localhost";
   $user = "root";
   $password = "";
   $db ="travel_buddy";
    // $port = "3000"
   
$con=mysqli_connect($host,$user,$password,$db);
if(mysqli_connect_errno())
{
echo "Connection Fail".mysqli_connect_error();
}
  ?> 



