<?php
	include('Connect.php');
		include('admin_login_session.php');
		
//Section SectionNo	SectionStartTime	SectionEndTime	SectionDate 	
	if (isset($_REQUEST['No'])) {
		$No=$_REQUEST['No'];
		$quary="SELECT * FROM movieshow WHERE ShowNo='$No'";

		$result=mysqli_query($Connect,$quary);
		$arr=mysqli_fetch_array($result);

	$query1 = "SELECT * FROM cinema";
	$result1 = mysqli_query($Connect, $query1);

	$query2 = "SELECT * FROM room";
	$result2 = mysqli_query($Connect, $query2);

	$query3 = "SELECT * FROM Section";
	$result3 = mysqli_query($Connect, $query3);

	$query4 = "SELECT * FROM movie";
	$result4 = mysqli_query($Connect, $query4);
	
	if(isset($_POST['btnRegister'])) 
{
	



	
	
		
		
		$room=$_POST['room'];
		$Show=$_POST['Show'];
		$movie=$_POST['movie'];
		
		


	
	$quary5="UPDATE movieshow set ShowNo='$No',RoomNo='$room',SectionNo='$Show',MovieNo='$movie' WHERE ShowNo='$No'";
		$result5=mysqli_query($Connect,$quary5);
		if($result5)
		{
			echo"<script>alert('Show UPDATE Complete.');</script>";
			echo "<script>window.location.replace('ShowEntry.php');</script>";
		}
		
		else{
			echo "<script>alert('error Register ');</script>";
		}
}


}
else
{
		echo "<script>alert('Please choose');</script>";
			echo "<script>window.location.replace('ShowEntry.php');</script>";
}
	

	 	

	 		
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Show Update</title>
	<link rel="stylesheet" type="text/css" href="design.css">
		<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body>
	<h1> Show Update</h1>
		<form action="ShowUpdate.php?No=<?php echo $No ?>" method="POST" enctype="multipart/form-data">	
		   

       <div class="container"> 
<table>
 		
 	
  		
  			<tr>
 				<td>room</td>
 				<td>
 					  <select name="room" required="">

			            <?php while($row1 = mysqli_fetch_array($result2)):;?>

			            <?php if ($arr['RoomNo']==$row1[0]) {?>
			            <option value="<?php echo $row1[0];?>"  selected><?php echo $row1[1];?></option>
			       		<?php } else{?>
			            <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>

			            <?php }endwhile;?>

       				  </select>

				</td>
				
 			</tr>

   			
   			<tr>
 				<td>Show</td>
 				<td>
 					  <select name="Show" required="">

 					  	<?php while($row1 = mysqli_fetch_array($result3)):;?>

			            <?php if ($arr['SectionNo']==$row1[0]) {?>
			      		 <option value="<?php echo $row1[0];?>" selected><?php echo " Start : ".$row1[1]." End : ". $row1[2]." Date : ".$row1[3];?></option>
			       		<?php } else{?>
			            <option value="<?php echo $row1[0];?>"><?php echo " Start : ".$row1[1]." End : ". $row1[2]." Date : ".$row1[3];?></option>

			            <?php }endwhile;?>

			           
   				     </select>

				</td>
				
 			</tr>
   			<tr>
 				<td>movie</td>
 				<td>
 					 <select name="movie" required="">

			           
			            <?php while($row1 = mysqli_fetch_array($result4)):;?>

			            <?php if ($arr['MovieNo']==$row1[0]) {?>
			            <option value="<?php echo $row1[0];?>"  selected><?php echo $row1[1];?></option>
			       		<?php } else{?>
			            <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>

			            <?php }endwhile;?>

       				 </select>

				</td>
				
 			</tr>
 			<tr>
 				<td></td>
 				<td><input type="submit" name="btnRegister" value="Register">
 					<input type="reset" name="Clear"></td>
 			</tr>
 		</table>


       </div>
      
        
      
		
		
	</form>	

</body>
</html>

