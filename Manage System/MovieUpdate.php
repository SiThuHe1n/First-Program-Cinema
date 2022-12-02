<?php
	include('Connect.php');
		include('admin_login_session.php');
		

	if (isset($_REQUEST['MNo'])) {
		$MovieNo=$_REQUEST['MNo'];
		$Movie="SELECT * FROM movie WHERE MovieNo='$MovieNo'";

		$result=mysqli_query($Connect,$Movie);
		$arr=mysqli_fetch_array($result);
	
	if(isset($_POST['btnRegister'])) 
{
	$MovieName=$_POST['txtMovieName'];
	$MoviePoster=$_FILES['txtMoviePoster']['name']; 
	$Description=$_POST['txtDescription'];
	$MovieTrailer=$_POST['txtMovieTrailer'];
	$folder="trailer/";
	if($MovieTrailer){
		$filename=$folder."_".$MoviePoster;
		$copy=copy($_FILES['txtMoviePoster']['tmp_name'],$filename);
		if(!$copy)
		{
		exit("Problem Occyred. Cannot upload image.");

		}

	}
	$Movie1="UPDATE movie set MovieNo='$MovieNo',MovieName='$MovieName',MovieDescription='$Description',MoviePoster='$filename',MovieTrailer='$MovieTrailer' WHERE MovieNo='$MovieNo'";
		$result1=mysqli_query($Connect,$Movie1);
		if($result1)
		{
			echo"<script>alert('Movie UPDATE Complete.');</script>";
			echo "<script>window.location.replace('MovieEntry.php');</script>";
		}
}


}
else
{
		echo "<script>alert('Please choose');</script>";
			echo "<script>window.location.replace('MovieDisplay.php');</script>";
}
	

	 	

	 		
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Movie Update</title>
	<link rel="stylesheet" type="text/css" href="design.css">
		<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body>
	<h1> Movie Update</h1>
		<form action="MovieUpdate.php?MNo=<?php echo $MovieNo ?>" method="POST" enctype="multipart/form-data">	
			<table>
				


		<tr>
			<td>Movie Name</td>
			<td><input type="text" name="txtMovieName" value="<?php echo $arr['MovieName'] ?>" required=""></td>
		</tr>
	
		<tr>
			<td>MoviePoster</td>
			<td><input type="file" name="txtMoviePoster" required=""></td>
		</tr>

		<tr>
			<td>MovieTrailer</td>
			<td><input type="link" name="txtMovieTrailer" value="<?php echo $arr['MovieTrailer'] ?>" required=""></td>
		</tr>


		<tr>
			<td>Description</td>
			<td><textarea name="txtDescription" style="resize: none;" required=""><?php echo $arr['MovieDescription'] ?></textarea></td>
		</tr>

	
		<tr>
			<td></td>
			<td><input type="submit" name="btnRegister" value="Register" required=""><input type="reset" value="Clear"></td>
		</tr>
					
			</table>
					
			
		
		
	</form>	

</body>
</html>

