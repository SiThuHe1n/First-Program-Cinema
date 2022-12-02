<?php
	include('Connect.php');
	session_start();
	if(isset($_SESSION["Login_Session"]))
	{
		header("Location: MovieDisplay.php");
	}
	else{
			if (isset($_POST['btnlogin']))
				{
					$Email=$_POST['txtEmail'];
					$Password=$_POST['txtPassword'];
					$login="SELECT * FROM customer WHERE Username='$Email' AND Password='$Password'";
					$result=mysqli_query($Connect,$login);
					$row = mysqli_fetch_array($result);
					if($row>0)
					{
					
						$_SESSION["Login_Session"]=$row['CustomerID'].$row['CustomerName'];
						$_SESSION["CustomerName"]=$row['CustomerName'];
						$_SESSION["CustomerID"]=$row['CustomerID'];
						header("location: MovieDisplay.php");

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

</head>
<body>
		<h1> Login </h1>
		
		<form action="login.php" method="Post">
			<table align="center">
				<tr>
					<td>Email :</td>
					<td>
						<input type="Email" name="txtEmail" placeholder="Enter Email Address" required>
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
						<p>Don't have an account?<a href="Register.php">Sign Up</a></p>
						<p>need help?<a href="login.png">help</a></p>
					</td>
				</tr>
			</table>
		</fieldset>
		</form>
</body>
</html>
