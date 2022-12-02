<?php
	include('Connect.php');
		include('Login_Session.php');
		

	if (isset($_REQUEST['MNo'])) {
		$MovieNo=$_REQUEST['MNo'];
		$Movie="SELECT * FROM movie WHERE MovieNo='$MovieNo'";

		$result=mysqli_query($Connect,$Movie);
		$arr=mysqli_fetch_array($result);
	
	


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
	<title>Movie Detail</title>
	<link rel="stylesheet" type="text/css" href="design.css">
</head>
<body>
		<h1> MovieDetail </h1>
		<form action="ProductDetail.php" method="POST">	
			<table>
				<tr>
					<td> <img width='220' height='340' src='<?php echo "Manage System/".$arr['MoviePoster'] ?>'>  </td></td>
					<td> 
						

							<tr>
								<td>Name:</td>
								<td><?php echo $arr['MovieName']; ?></td>
							</tr>

							<tr>
								<td>Description:</td>
								<td><?php echo $arr['MovieDescription']; ?></td>
							</tr>
							<tr>
								<td>Trailer Link: </td>
								<td>
								<a href="<?php echo $arr['MovieTrailer']; ?>" style="font-size:18px">click here</a>	
								</td>

								

							</tr>
						




					
</table>
					
			
		<table>
		
							<?php


				

									$query4 = "SELECT * FROM movieshow where MovieNo='$MovieNo' ";
									$result4 = mysqli_query($Connect, $query4);


									$count=mysqli_num_rows($result4);
									for ($i=0; $i < $count ; $i++) 
									{ 
										$arr4=mysqli_fetch_array($result4);
									
										$RNO=$arr4['RoomNo'];
										$SNO=$arr4['SectionNo'];
										$ShowNo=$arr4['ShowNo'];

										$query3 = "SELECT * FROM section where SectionNo='$SNO'";
										$result3 = mysqli_query($Connect, $query3);
										$arr3=mysqli_fetch_array($result3);

										$query2 = "SELECT * FROM room where RoomNo='$RNO'";
										$result2 = mysqli_query($Connect, $query2);
										$arr2=mysqli_fetch_array($result2);

										


								
										echo "<tr>";
											echo "<td>Room:".$arr2['RoomName']."</td>";
										echo "</tr>";

										echo "</br><tr>";
											echo "<td>"; echo " Start : ".$arr3['SectionStartTime']." End : ". $arr3['SectionEndTime']." Date : ".$arr3['SectionDate']."</td>";
										echo "</tr></br>";

										echo "<tr>";
										echo "<td><a href='Booking.php?ShowNo=".$ShowNo."'>Choose</a></td>";
										echo "</tr></br>";

									/*	echo "<tr>";
											echo "<td>Movie:".$arr1['MovieNo']."</td>";
										echo "</tr>";*/
									}

							?>
						</table>
					<p><a href="MovieDisplay.php" style="font-size:18px">Back?</a></p>	
							<p>need help?<a href="choose.png">help</a></p>
	</form>	

</body>
</html>

