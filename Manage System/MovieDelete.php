<?php
	include('Connect.php');
		include('admin_login_session.php');
		

	if (isset($_REQUEST['MNo'])) {
		$MovieNo=$_REQUEST['MNo'];
		
	

	$Movie1="DELETE From movie WHERE MovieNo='$MovieNo'";
		$result1=mysqli_query($Connect,$Movie1);
		if($result1)
		{
			echo"<script>alert('Movie Delete Complete.');</script>";
			echo "<script>window.location.replace('MovieEntry.php');</script>";
		}
}



else
{
		echo "<script>alert('Please choose');</script>";
			echo "<script>window.location.replace('MovieEntry.php');</script>";
}
	

	 	

	 		
	
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
		<form action="MovieUpdate.php?MNo=<?php echo $MovieNo ?>" method="POST" enctype="multipart/form-data">	
			<table>
				


		
	</form>	

</body>
</html>

