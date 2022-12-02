<?php
	include('Connect.php');
	
	session_start();
	if(isset($_SESSION["admin_login_session"]))
	{
		header("Location: main.php");
	}
	else{
			if (isset($_POST['btnlogin']))
				{
					$Username=$_POST['txtUsername'];
					$Password=$_POST['txtPassword'];
					$login="SELECT * FROM admin WHERE Username='$Username' AND Password='$Password'";
					$result=mysqli_query($Connect,$login);
					$row = mysqli_fetch_array($result);
					if($row>0)
					{
					
						$_SESSION["admin_login_session"]=$row['AdminID'];
						$_SESSION["AdminUsername"]=$row['Username'];
						$_SESSION["AdminID"]=$row['AdminID'];
						header("location: main.php");

			        }
			        else
			        {
			        	echo "<script>alert('Email or Password is incorrect!');</script>";
			        }
				}
	}
	
?>
<html>
<head>
	<title>Sign in page</title>
	<link rel="stylesheet" type="text/css" href="design.css">
		<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body>
	<h1> Admin Login</h1>
	<fieldset>
		<legend>POS Online</legend>
		<form action="admin_login.php" method="Post">
			<table align="center" border="2">
				<tr>
					<td>Email :</td>
					<td>
						<input type="text" name="txtUsername" placeholder="Enter Username" required>
					</td>
				</tr>
				<tr>
					<td>Password :</td>
					<td>
						<input type="Password" name="txtPassword" placeholder="xxxxxxxxxx" required>
					</td>
				</tr>	
				<tr>
					<td></td>
					<td>
						<input type="submit" name="btnlogin" value="Sign In"/>
						<input type="reset" value="Clear">
						
					</td>
				</tr>
			</table>
		</fieldset>
		</form>
</body>
</html>
