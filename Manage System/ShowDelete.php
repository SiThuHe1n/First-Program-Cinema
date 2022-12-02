<?php
	include('Connect.php');
		include('admin_login_session.php');
		

	if (isset($_REQUEST['No'])) {
		$No=$_REQUEST['No'];
		
	

	$Show="DELETE From movieshow WHERE ShowNo='$No'";
		$result=mysqli_query($Connect,$Show);
		if($result)
		{
			echo"<script>alert('Movie Delete Complete.');</script>";
			echo "<script>window.location.replace('ShowEntry.php');</script>";
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
		<form action="ShowDelete.php?No=<?php echo $No ?>" method="POST" enctype="multipart/form-data">	
			<table>
				


		
	</form>	

</body>
</html>

