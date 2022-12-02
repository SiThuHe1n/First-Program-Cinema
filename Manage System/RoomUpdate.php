<?php
	include('Connect.php');
		include('admin_login_session.php');
		
//Section SectionNo	SectionStartTime	SectionEndTime	SectionDate 	
	if (isset($_REQUEST['No'])) {
		$No=$_REQUEST['No'];
		$quary="SELECT * FROM Room WHERE RoomNo='$No'";

		$result=mysqli_query($Connect,$quary);
		$arr=mysqli_fetch_array($result);
	
	if(isset($_POST['btnRegister'])) 
{
	


	$RoomName=$_POST['txtRoomName'];
	
	

	
	$quary1="UPDATE Room set RoomNo='$No',RoomName='$RoomName' WHERE RoomNo='$No'";
		$result1=mysqli_query($Connect,$quary1);
		if($result1)
		{
			echo"<script>alert('Room UPDATE Complete.');</script>";
			echo "<script>window.location.replace('RoomEntry.php');</script>";
		}
}


}
else
{
		echo "<script>alert('Please choose');</script>";
			echo "<script>window.location.replace('RoomEntry.php');</script>";
}
	

	 	

	 		
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Room Update</title>
	<link rel="stylesheet" type="text/css" href="design.css">
		<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body>
	<h1> Room Update</h1>
		<form action="RoomUpdate.php?No=<?php echo $No ?>" method="POST" enctype="multipart/form-data">	
			<table>
				


	
 			<tr>
 				<td>Room Name</td>
 				<td><input type="text" name="txtRoomName" value="<?php echo $arr['RoomName'] ?>"  required=""></td>
 			</tr>
 		

 			<tr>
 				<td></td>
 				<td><input type="submit" name="btnRegister" value="Register">
 					<input type="reset" name="Clear"></td>
 			</tr>
					
			</table>
					
			
		
		
	</form>	

</body>
</html>

