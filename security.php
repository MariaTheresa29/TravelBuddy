<?php
session_start();
include('dbcon.php');
if(!$_SESSION['email'])
{
   header('Location:login.php');
}
?>