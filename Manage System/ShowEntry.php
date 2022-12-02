<?php 
	include('Connect.php');
	include('admin_login_session.php');




	$query2 = "SELECT * FROM room";
	$result2 = mysqli_query($Connect, $query2);

	$query3 = "SELECT * FROM Section";
	$result3 = mysqli_query($Connect, $query3);

	$query4 = "SELECT * FROM movie";
	$result4 = mysqli_query($Connect, $query4);

	
	if(isset($_POST['btnRegister'])){
		
		
		$room=$_POST['room'];
		$Show=$_POST['Show'];
		$movie=$_POST['movie'];
		
		
		$Insert="INSERT INTO movieshow(RoomNo,SectionNo,MovieNo) VALUES('$room','$Show','$movie')";
		$result=mysqli_query($Connect,$Insert);
		if ($result) {
			echo "<script>alert('Completed');</script>";
		}
		else{
			echo "<script>alert('error Register ');</script>";
		}
	}



 ?>


<!DOCTYPE html>

<html>

    <head>

        <title>Show Entry </title>
        <link rel="stylesheet" type="text/css" href="design.css">
        	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>

    <body>
    	<h1> Show Entry</h1>
    	<form action="ShowEntry.php" method="POST">
        <!--Method One-->

      

       
      
        
      <table>
 		
 	
  		
  			<tr>
 				<td>room</td>
 				<td>
 					  <select name="room" required="">

			            <?php while($row1 = mysqli_fetch_array($result2)):;?>

			            <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>

			            <?php endwhile;?>

       				  </select>

				</td>
				
 			</tr>

   			
   			<tr>
 				<td>Show</td>
 				<td>
 					  <select name="Show" required="">

			            <?php while($row1 = mysqli_fetch_array($result3)):;?>

			          	<option value="<?php echo $row1[0];?>"><?php echo " Start : ".$row1[1]." End : ". $row1[2]." Date : ".$row1[3];?></option>

			            <?php endwhile;?>

   				     </select>

				</td>
				
 			</tr>
   			<tr>
 				<td>movie</td>
 				<td>
 					 <select name="movie" required="">

			            <?php while($row1 = mysqli_fetch_array($result4)):;?>

			            <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>

			            <?php endwhile;?>

       				 </select>

				</td>
				
 			</tr>
 			<tr>
 				<td></td>
 				<td><input type="submit" name="btnRegister" value="Register">
 					<input type="reset" name="Clear"></td>
 			</tr>
 		</table>

    </body>
</form>
	<fieldset>
  <legend>Personalia:</legend>
 <table border="1px">	
		<tr>
			
			<th>Room</th>
			<th>Section</th>
			<th>Movie</th>
		
			<th>Manage</th>
		</tr>


		<?php 
		$Show2="SELECT * FROM movieshow ";
		$Result5=mysqli_query($Connect, $Show2);
		$count2=mysqli_num_rows($Result5);
	//	ShowNo	ShowStartTime	ShowEndTime	ShowDate 	
		for ($i=0; $i < $count2 ; $i++) 
		{ 
			$arr2=mysqli_fetch_array($Result5);
			echo "<tr>";
				

				$Room2=$arr2['RoomNo'];
				$Room3="SELECT * FROM room where RoomNo='$Room2'  ";
				$Result7=mysqli_query($Connect, $Room3);
				$arr4=mysqli_fetch_array($Result7);
				echo "<td>".$arr4['RoomName']."</td>";
			
				$Section2=$arr2['SectionNo'];
				$Section3="SELECT * FROM section where SectionNo='$Section2' ";
				$Result8=mysqli_query($Connect, $Section3);
				$arr5=mysqli_fetch_array($Result8);
				echo "<td>"."StartTime:".$arr5['SectionStartTime']."EndTime".$arr5['SectionEndTime']."date".$arr5['SectionDate']."</td>";

		        $movie2=$arr2['MovieNo'];
				$movie3="SELECT * FROM movie where MovieNo='$movie2'  ";
				$Result6=mysqli_query($Connect, $movie3);
				$arr6=mysqli_fetch_array($Result6);
				echo "<td>".$arr6['MovieName']."</td>";
			
			echo "<td>
					<a href='ShowUpdate.php?No=".$arr2['ShowNo']."'>Update</a>
					<a href='ShowDelete.php?No=".$arr2['ShowNo']."'>Delete</a>
			</td>";
			echo "</tr>";
				
			
		}
		?>


		
</table>
 </fieldset>
</html>