
<?php
session_start();
$user_check=$_SESSION['admin_login_session'];
 
 


 
if(!isset($user_check))
{
header("Location: admin_login.php");
}
?>
