
<?php
session_start();
$user_check=$_SESSION['Login_Session'];
 
 


 
if(!isset($user_check))
{
header("Location: login.php");
}
?>
