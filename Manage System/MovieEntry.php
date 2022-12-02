<?php
include('Connect.php');
include('admin_login_session.php');

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
	$Movie="INSERT INTO movie(MovieName,MovieDescription,MoviePoster,MovieTrailer) VALUES('$MovieName','$Description','$filename','$MovieTrailer')";
		$result=mysqli_query($Connect,$Movie);
		if($result)
		{
			echo"<script>alert('Movie Register Complete.');</script>";
		}
}
?>
<html>
<head>
	<title>Movie Entry</title>
	<link rel="stylesheet" type="text/css" href="design.css">
		<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body>
	<h1> Movie Entry</h1>
<form action="MovieEntry.php" method="POST" enctype="multipart/form-data">

	<div class="container">
		<table>	
			<tr>
			<td>Movie Name</td>
			<td><input type="text" name="txtMovieName" required=""></td>
		</tr>
	
		<tr>
			<td>MoviePoster</td>
			<td><input type="file" name="txtMoviePoster" required=""></td>
		</tr>

		<tr>
			<td>MovieTrailer</td>
			<td><input type="link" name="txtMovieTrailer" required=""></td>
		</tr>


		<tr>
			<td>Description</td>
			<td><textarea name="txtDescription" required=""></textarea></td>
		</tr>

	
		<tr>
			<td></td>
			<td><input type="submit" name="btnRegister" value="Register"><input type="reset" value="Clear"></td>
		</tr>
</table>

	</div>
	
</form>
  <fieldset>
  <legend>Personalia:</legend>
 <table border="1px">	
		<tr>
			<th>Movie No</th>
			<th>Movie Name</th>
			<th>Movie Poster</th>
			<th>MovieTrailer</th>
			<th>Description</th>
			<th>Manage</th>
		</tr>


		<?php 
		$Movie2="SELECT * FROM movie ORDER BY MovieNo";
		$Result2=mysqli_query($Connect, $Movie2);
		$count2=mysqli_num_rows($Result2);
		for ($i=0; $i < $count2 ; $i++) 
		{ 
			$arr2=mysqli_fetch_array($Result2);
			echo "<tr>";
				
				echo "<td>".$arr2['MovieNo']."</td>";
				echo "<td>".$arr2['MovieName']."</td>";
			
				echo "<td>


				 
 				 <img src='".$arr2['MoviePoster']." ' width='100px' height='100px'>
				 </td>";
			
				echo "<td>".$arr2['MovieTrailer']."</td>";
				echo "<td>".$arr2['MovieDescription']."</td>";
			
			echo "<td>
					<a href='MovieUpdate.php?MNo=".$arr2['MovieNo']."'>Update</a>
					<a href='MovieDelete.php?MNo=".$arr2['MovieNo']."'>Delete</a>
			</td>";
			echo "</tr>";
				
			
		}
		?>


		
</table>
 </fieldset>
</body>
</html>