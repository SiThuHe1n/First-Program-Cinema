<?php
	include('Connect.php');
		include('admin_login_session.php');
		

	if (isset($_REQUEST['No'])) {
		$No=$_REQUEST['No'];
		$Section="SELECT * FROM section WHERE SectionNo='$No'";

		$result=mysqli_query($Connect,$Section);
		$arr=mysqli_fetch_array($result);
	

	$Section1="DELETE From Section WHERE SectionNo='$No'";
		$result1=mysqli_query($Connect,$Section1);
		if($result1)
		{
			echo"<script>alert('Section Delete Complete.');</script>";
			echo "<script>window.location.replace('SectionEntry.php');</script>";
		}
}



else
{
		echo "<script>alert('Please choose');</script>";
			echo "<script>window.location.replace('SectionEntry.php');</script>";
}
	

	 	

	 		
	
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
		<form action="SectionDelete.php?MNo=<?php echo $No ?>" method="POST" enctype="multipart/form-data">	
			<table>
				


		
	</form>	

</body>
</html>

