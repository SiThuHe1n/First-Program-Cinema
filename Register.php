<?php 
	include('Connect.php');
	if(isset($_POST['btnRegister'])){
		
		
		$CustomerName=$_POST['txtCustomerName'];
		$Email=$_POST['txtEmail'];
		$Password=$_POST['txtPassword'];
		$Phone=$_POST['txtPhone'];
		$Address=$_POST['txtAddress'];
		
		$Insert="INSERT INTO customer(CustomerName,Username,Password,CustomerAddress,CustomerPhone) VALUES('$CustomerName','$Email','$Password','$Address','$Phone')";
		$result=mysqli_query($Connect,$Insert);
		if ($result) {
			echo "<script>alert('Customer Register Complete');</script>";
		}
		else{
			echo "<script>alert('error Register ');</script>";
		}
	
}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Register</title>
 	<link rel="stylesheet" type="text/css" href="design.css">
 </head>
 <body>
 	<h1> Register</h1>
 	<form action="Register.php" method="POST">
 		<table>
 			<caption> Register</caption>
 	
 			<tr>
 				<td>Name</td>
 				<td><input type="text" name="txtCustomerName"required=""></td>
 			</tr>
  			<tr>
 				<td>Email</td>
 				<td><input type="Email" name="txtEmail"required=""></td>
 			</tr>
 			<tr>
 				<td>Password</td>
 				<td><input type="Password" name="txtPassword"required=""></td>
 			</tr>
 			<tr>
 				<td>Phone</td>
 				<td><input type="text" name="txtPhone"required=""></td>
 			</tr>
 			<tr>
 				<td>Address</td>
 				<td><textarea name="txtAddress"required=""></textarea></td>
 			</tr>

 			<tr>
 				<td></td>
 				<td><input type="submit" name="btnRegister" value="Register">
 					<input type="reset" name="Clear"></td>
 			</tr>
 		</table>
 	</form>
 	<a href="login.php" style="font-size:18px">login?</a>
 	<p>need help?<a href="register.png">help</a></p>
 </body>
 </html>