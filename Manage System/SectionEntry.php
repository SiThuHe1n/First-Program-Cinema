<?php 
	include('Connect.php');
	include('admin_login_session.php');
	if(isset($_POST['btnRegister'])){
		
		$SectionStartTime=$_POST['txtSectionStartTime'];
		$SectionEndTime=$_POST['txtSectionEndTime'];
		$SectionDate=$_POST['txtSectionDate'];
		
		
		$Insert="INSERT INTO section(SectionStartTime,SectionEndTime,SectionDate) VALUES('$SectionStartTime','$SectionEndTime','$SectionDate')";
		$result=mysqli_query($Connect,$Insert);
		if ($result) {
			echo "<script>alert('Customer Register Complete');</script>";
		}
		else{
			echo "<script>alert('error Register ');</script>";
		}
	}
	//SectionNo 	SectionStartTime 	SectionEndTime 	SectionDate 
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Section Entry</title>
 	<link rel="stylesheet" type="text/css" href="design.css">
 		<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
 </head>
 <body>
 	<h1> Section Entry</h1>
 	<form action="SectionEntry.php" method="POST">
 		<table>
 			<caption> Register</caption>
 	
  			<tr>
 				<td>SectionStartTime</td>
 				<td><input type="time" name="txtSectionStartTime" required=""></td>
 			</tr>
 			<tr>
 				<td>SectionEndTime</td>
 				<td><input type="time" name="txtSectionEndTime" required=""></td>
 			</tr>
 			<tr>
 				<td>SectionDate</td>
 				<td><input type="Date" name="txtSectionDate" required=""></td>
 			</tr>

 			<tr>
 				<td></td>
 				<td><input type="submit" name="btnRegister" value="Register">
 					<input type="reset" name="Clear"></td>
 			</tr>
 		</table>
 	</form>
 	<fieldset>
  <legend>Personalia:</legend>
 <table border="1px">	
		<tr>
			<th>SectionNo</th>
			<th>SectionStartTime</th>
			<th>SectionEndTime</th>
			<th>SectionDate</th>
		
			<th>Manage</th>
		</tr>


		<?php 
		$Movie2="SELECT * FROM section ORDER BY SectionNo";
		$Result2=mysqli_query($Connect, $Movie2);
		$count2=mysqli_num_rows($Result2);
	//	SectionNo	SectionStartTime	SectionEndTime	SectionDate 	
		for ($i=0; $i < $count2 ; $i++) 
		{ 
			$arr2=mysqli_fetch_array($Result2);
			echo "<tr>";
				
				echo "<td>".$arr2['SectionNo']."</td>";
				echo "<td>".$arr2['SectionStartTime']."</td>";
			
				
			
				echo "<td>".$arr2['SectionEndTime']."</td>";
				echo "<td>".$arr2['SectionDate']."</td>";
			
			echo "<td>
					<a href='SectionUpdate.php?No=".$arr2['SectionNo']."'>Update</a>
					<a href='SectionDelete.php?No=".$arr2['SectionNo']."'>Delete</a>
			</td>";
			echo "</tr>";
				
			
		}
		?>


		
</table>
 </fieldset>
 </body>
 </html>