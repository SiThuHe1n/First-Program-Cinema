<?php 
	include('Connect.php');
	include('Login_Session.php');
	$Movie="SELECT * FROM movie ORDER BY MovieNo DESC";
	$Result=mysqli_query($Connect, $Movie);
 ?>
	
	<!DOCTYPE html>
	<html>
	<head>
		<title> Movie Display</title>
		<link rel="stylesheet" type="text/css" href="design.css">
	</head>
	<h1> Movie Display</h1>
	<body>
		
		<table>

		<?php 
		$count=mysqli_num_rows($Result);
		for ($i=0; $i < $count ; $i++) 
		{ 
			$arr=mysqli_fetch_array($Result);
			echo "<tr>";
				echo "<td>

				 
 				 <img src='Manage System/".$arr['MoviePoster']." ' width='250px' height='300px'>
				= </td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td>Movie Name:".$arr['MovieName']."</td>";
			echo "</tr>";
	
			echo "<tr>";
				echo "<td>MovieDescription:</br>".$arr['MovieDescription']."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td><a href='MovieDetail.php?MNo=".$arr['MovieNo']."'>SELECT</a></td>";
			echo "</tr>";
		}
		?>
		
	</table>

	<br>
	<p><a href="logout.php" style="font-size:18px">Logout?</a></p>
	
		<p>need help?<a href="display.png">help</a></p>
	</body>
	</html>