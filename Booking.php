<?php
	include('Connect.php');
	include('Login_Session.php');
	$arrseat;
		if (isset($_REQUEST['ShowNo'])) {
		$ShowNo=$_REQUEST['ShowNo'];


		
		




	$query1 = "SELECT * FROM movieshow where ShowNo='$ShowNo'";
	$result1 = mysqli_query($Connect, $query1);
	$arr1=mysqli_fetch_array($result1);
	
	$MovieNo=$arr1['MovieNo'];
	$RoomNo=$arr1['RoomNo'];
	$SectionNo=$arr1['SectionNo'];

	$query2 = "SELECT * FROM movie where MovieNo='$MovieNo'";
	$result2 = mysqli_query($Connect, $query2);
	$movie = mysqli_fetch_array($result2);

	$query3 = "SELECT * FROM room where RoomNo='$RoomNo'";
	$result3 = mysqli_query($Connect, $query3);
	$room=mysqli_fetch_array($result3);

	$query4 = "SELECT * FROM section where SectionNo='$SectionNo'";
	$result4 = mysqli_query($Connect, $query4);
	$section=mysqli_fetch_array($result4);

	$BookingID="";
	$query5="SELECT BookingID FROM booking ";
	$result5 = mysqli_query($Connect, $query5);
	$acount=mysqli_num_rows($result5);
	if($acount==0)
	{
		$AutoID=1;
		
	}
	else
	{	
		$AutoID=0;
		for ($i=0; $i < $acount ; $i++)
		{
			$arr2=mysqli_fetch_array($result5);
			if($AutoID<=$arr2['BookingID'])
			{
			$AutoID=$arr2["BookingID"];
			}

			
		}
		$AutoID++;
		
	}
	$CustomerID=$_SESSION["CustomerID"];

	if(isset($_POST['btnconfirm'])) 
{
	


	$txtconfirm=$_POST['txtconfirm'];
	$TicketNo=explode(",", $txtconfirm);
	$numberofticket=count($TicketNo);

	for( $a=0;$a<$numberofticket;$a++)
	{
	$Insert="INSERT INTO booking(BookingID,ShowNo,TicketNo) VALUES('$AutoID','$ShowNo','$TicketNo[$a]')";
		$result9=mysqli_query($Connect,$Insert);
	}
	$TotalPrice=$_POST['txtconfirm2'];
	$MobileBanking=$_POST['txtMobilebanking'];
	$SecretCode=$_POST['txtsecretcode'];
	$Insert2="INSERT INTO payment(BookingID,CustomerID,TotalPrice,MobileBanking,SecretCode) VALUES('$AutoID','$CustomerID','$TotalPrice','$MobileBanking','$SecretCode')";
	$result10=mysqli_query($Connect,$Insert2);
	

		
		


	
	
}



//else
{
	//	echo "<script>alert('Please choose');</script>";
	//		echo "<script>window.location.replace('MovieDisplay.php');</script>";
}
	

	 	

	} 		
	
?>


<!DOCTYPE html>
<html>
<head>
	<title> Booking </title>
<link rel="stylesheet" type="text/css" href="jquery.seat-charts.css">
<link rel="stylesheet" type="text/css" href="booking.css">
<link rel="stylesheet" type="text/css" href="design2.css">
	

</head>

<body>
	<h1> Booking </h1>
 	<form action="Booking.php?ShowNo=<?php echo $ShowNo ?> " method="POST" enctype="multipart/form-data">	

 <div class="demo">
   		<div id="seat-map">
			<div class="front">SCREEN</div>					
		</div>
		<div class="booking-details">
			<p>Movie: <span> <?php echo $movie['MovieName']; ?></span></p>
			<p>Time: <span><?php echo "<td>"; echo " Start : ".$section['SectionStartTime']." End : ". $section['SectionEndTime']." Date : ".$section['SectionDate']."</td>"; ?></span></p>
			<p>Room: <span> <?php echo $room['RoomName']; ?></span></p>
			<p>Seat: </p>
			<ul id="selected-seats"></ul></p>
			<p>Total: <b>$<span id="total" name="txttotal">0</span></b></p>
			<p>
				MobileBanking: <input type="number" name="txtMobilebanking" required=""  max="999999999">
				SecretCode: <input type="number" name="txtsecretcode" required=""  max="999999999">
			</p>		
			<p>Tickets: 
			 <button class="checkout-button" name="btnconfirm">Checkout &raquo;</button>
			 
					
			<div id="legend"style="height: 35px;"></div>

		</div>
	<input type="text" name="txtconfirm" id="confirm" hidden="">
	<br>
	<input type="text" name="txtconfirm2" id="confirm3" hidden="">
		<div style="clear:both"></div>
   </div>
  
   
<script src="http://code.jquery.com/jquery-1.12.4.min.js"></script> 
<script src="jquery.seat-charts.js"></script> 

		<script type="text/javascript">
var firstSeatLabel = 1;
var selectedseatnumber=0;
var arrseat=[];

		
			$(document).ready(function() {
				var $cart = $('#selected-seats'),
					$counter = $('#counter'),
					$total = $('#total'),
					sc = $('#seat-map').seatCharts({
					map: [
					<?php
					$cinema1="
							    '__ff_ff_ff_ff__',
								'f_ff_ff_ff_ff_f',
								'f_ff_ff_ff_ff_f',
								'_______________',
								'e_ee_ee_ee_ee_e',
								'e_ee_ee_ee_ee_e',
								'e_ee_ee_ee_ee_e',
								'e_ee_ee_ee_ee_e',  ";
					echo $cinema1;
					?>
						
					],
					seats: {
						f: {
							price   : 100,
							classes : 'first-class', //your custom CSS class
							category: 'First Class'
						},
						e: {
							price   : 40,
							classes : 'economy-class', //your custom CSS class
							category: 'Economy Class'
						}					
					
					},
					naming : {
						top : false,
						 getId  : function(character, row, column) {
	  					  return firstSeatLabel;
							  },	
						getLabel : function (character, row, column) {
							return firstSeatLabel++;
						},
					},
					legend : {
						node : $('#legend'),
					    items : [
							[ 'f', 'available',   'First Class' ],
							[ 'e', 'available',   'Economy Class'],
							[ 'f', 'unavailable', 'Already Booked']
					    ]					
					},
					click: function () {
						if (this.status() == 'available' && selectedseatnumber<10) {
							//let's create a new <li> which we'll add to the cart items
						$('<li>'+this.data().category+' Seat # '+this.settings.label+': <b>$'+this.data().price+'</b> </li>')
								.attr('id', 'cart-item-'+this.settings.id)
								.data('seatId', this.settings.id)
								.appendTo($cart);
							
							/*
							 * Lets update the counter and total
							 *
							 * .find function will not find the current seat, because it will change its stauts only after return
							 * 'selected'. This is why we have to add 1 to the length and the current seat price to the total.
							 */
							$counter.text(sc.find('selected').length+1);
							$total.text(recalculateTotal(sc)+this.data().price);
							selectedseatnumber+=1;
							arrseat.push(this.settings.label); 

							document.getElementById("confirm").value = arrseat;
							document.getElementById("confirm3").value =recalculateTotal(sc)+this.data().price;
							return 'selected';

						} 
						else if (this.status() == 'selected') {
							//update the counter
							$counter.text(sc.find('selected').length-1);
							//and total
							$total.text(recalculateTotal(sc)-this.data().price);
							for(var i=0;i<arrseat.length;i++)
							{
							if(arrseat[i]==this.settings.id)
							{
								arrseat.splice(i, 1); 
							}

							}
						
							//remove the item from our cart
							$('#cart-item-'+this.settings.id).remove();
							selectedseatnumber-=1;
							document.getElementById("confirm").value = arrseat;
							document.getElementById("confirm3").value =recalculateTotal(sc)-this.data().price;
							//seat has been vacated
							return 'available';
						} 
						else if (this.status() == 'unavailable') {
							//seat has been already booked
							return 'unavailable';
						} 
						else if( selectedseatnumber<11)
						{
							alert("you can order under 10 tickets");
							return 'available';
						}

						
					}
				});

				//this will handle "[cancel]" link clicks

				//let's pretend some seats have already been booked
			<?php $query7 = "SELECT TicketNo FROM booking where ShowNo='$ShowNo'";
				$result7 = mysqli_query($Connect, $query7);
				
				$count2=mysqli_num_rows($result7);
				for ($i=0; $i < $count2 ; $i++) 
				{ 
					$arr7=mysqli_fetch_array($result7); 
					?>

					sc.get(['<?php echo $arr7['TicketNo'] ?>']).status('unavailable');
				<?php } ?>
				
				
				
		});

		function recalculateTotal(sc) {
			var total = 0;
		
			//basically find every selected seat and sum its price
			sc.find('selected').each(function () {
				total += this.data().price;
			});
			
			return total;
		}
		
	

		</script>

		</form>	
		<p> <a href="MovieDisplay.php" style="font-size:18px">Back?</a></p>
		<p>need help?<a href="booking.png">help</a></p>


</body>
</html>