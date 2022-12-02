<?php 
	include('Connect.php');
	include('admin_login_session.php');
	if(isset($_POST['btnRegister'])){
		
		$RoomName=$_POST['txtRoomName'];

		$Insert="INSERT INTO room(RoomName) VALUES('$RoomName')";
		$result=mysqli_query($Connect,$Insert);
		if ($result) {
			echo "<script>alert('Room Register Complete');</script>";
		}
		else{
			echo "<script>alert('error Room Register ');</script>";
		}
	}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Room Entry</title>
 	<link rel="stylesheet" type="text/css" href="design.css">
 		<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
 </head>
 <body>
 	<h1> Room Entry</h1>
 	<form action="RoomEntry.php" method="POST">
 		<table>
 			<caption> Register</caption>
 	
 			<tr>
 				<td>Name</td>
 				<td><input type="text" name="txtRoomName" required=""></td>
 			</tr>
  			
 			<tr>
 				<td></td>
 				<td><input type="submit" name="btnRegister" value="Register">
 					<input type="reset" name="Clear"></td>
 			</tr>
 		</table>
 	</form>
 	 <legend>Personalia:</legend>
 <table border="1px">	
		<tr>
			<th>RoomNo</th>
			<th>RoomName</th>
			
		
			<th>Manage</th>
		</tr>


		<?php 
		$Movie2="SELECT * FROM Room ORDER BY RoomNo";
		$Result2=mysqli_query($Connect, $Movie2);
		$count2=mysqli_num_rows($Result2);
	//	SectionNo	SectionStartTime	SectionEndTime	SectionDate 	
		for ($i=0; $i < $count2 ; $i++) 
		{ 
			$arr2=mysqli_fetch_array($Result2);
			echo "<tr>";
				
				echo "<td>".$arr2['RoomNo']."</td>";
				echo "<td>".$arr2['RoomName']."</td>";
			
				
			
			
			
			echo "<td>
					<a href='RoomUpdate.php?No=".$arr2['RoomNo']."'>Update</a>
					<a href='RoomDelete.php?No=".$arr2['RoomNo']."'>Delete</a>
			</td>";
			echo "</tr>";
				
			
		}
		?>


		
</table>
 </fieldset>
 </body>
 </html>