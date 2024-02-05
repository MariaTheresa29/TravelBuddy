<?php
// session_start();
$host="localhost";
$user="root";
$password="";
$db="travel_buddy";
$con=mysqli_connect($host,$user,$password,$db);
if(mysqli_connect_error())
{
    echo "Connection Fail".mysqli_connect_error();
}
?>