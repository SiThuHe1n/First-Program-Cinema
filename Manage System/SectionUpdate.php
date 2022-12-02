<?php
	include('Connect.php');
		include('admin_login_session.php');
		
//Section SectionNo	SectionStartTime	SectionEndTime	SectionDate 	
	if (isset($_REQUEST['No'])) {
		$No=$_REQUEST['No'];
		$quary="SELECT * FROM Section WHERE SectionNo='$No'";

		$result=mysqli_query($Connect,$quary);
		$arr=mysqli_fetch_array($result);
	
	if(isset($_POST['btnRegister'])) 
{
	

	$SectionStartTime=$_POST['txtSectionStartTime'];
	$SectionEndTime=$_POST['txtSectionEndTime'];
	$SectionDate=$_POST['txtSectionDate'];
	

	
	$quary1="UPDATE Section set SectionNo='$No',SectionStartTime='$SectionStartTime',SectionEndTime='$SectionEndTime',SectionDate='$SectionDate' WHERE SectionNo='$No'";
		$result1=mysqli_query($Connect,$quary1);
		if($result1)
		{
			echo"<script>alert('Section UPDATE Complete.');</script>";
			echo "<script>window.location.replace('SectionEntry.php');</script>";
		}
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
	<title>Section Update</title>
	<link rel="stylesheet" type="text/css" href="design.css">
		<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body>
	<h1> Section Update</h1>
		<form action="SectionUpdate.php?No=<?php echo $No ?>" method="POST" enctype="multipart/form-data">	
			<table>
				


		<tr>
 				<td>SectionStartTime</td>
 				<td><input type="time" name="txtSectionStartTime" value="<?php echo $arr['SectionStartTime'] ?>" required=""></td>
 			</tr>
 			<tr>
 				<td>SectionEndTime</td>
 				<td><input type="time" name="txtSectionEndTime" value="<?php echo $arr['SectionEndTime'] ?>" required=""></td>
 			</tr>
 			<tr>
 				<td>SectionDate</td>
 				<td><input type="Date" name="txtSectionDate" value="<?php echo $arr['SectionDate'] ?>" required=""></td>
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

