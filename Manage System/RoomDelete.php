<?php
	include('Connect.php');
		include('admin_login_session.php');
		

	if (isset($_REQUEST['No'])) {
		$RoomNo=$_REQUEST['No'];
		$Room="SELECT * FROM Room WHERE RoomNo='$RoomNo'";

		$result=mysqli_query($Connect,$Room);
		$arr=mysqli_fetch_array($result);
	

	$Room1="DELETE From Room WHERE RoomNo='$RoomNo'";
		$result1=mysqli_query($Connect,$Room1);
		if($result1)
		{
			echo"<script>alert('Room Delete Complete.');</script>";
			echo "<script>window.location.replace('RoomEntry.php');</script>";
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
	<title></title>
</head>
<body>
		<form action="RoomUpdate.php?No=<?php echo $RoomNo ?>" method="POST" enctype="multipart/form-data">	
			<table>
				


		
	</form>	

</body>
</html>

