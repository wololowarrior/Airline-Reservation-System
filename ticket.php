<html>
<head>
	<link rel="stylesheet" href="ticket.css" type="text/css">
</head>
<body>
<h1>Congrats!! Your Flight has been booked. The ticket is here.<br/></h1>

<?php
	$mysql_host="localhost";
		$mysql_user="root";
		$mysql_pass="1234";
		$conn=@mysql_connect($mysql_host,$mysql_user,$mysql_pass) or die("Unable to connect");
		@mysql_select_db('ars');
		$passenger_id=$_GET['passengers_ID'];
		$ticket_id=$_GET['ticket_id'];
		$airline_id=$_GET['airline_id'];
		$schedule_id=$_GET['schedule_id'];
		$query="INSERT INTO ticket(Ticket_id,passenger_id,airline_id,schedule_id) values ('$ticket_id','$passenger_id','$airline_id','$schedule_id')";
		$res=mysql_query($query,$conn);
		$disp="SELECT * from passengers natural join schedule_b natural join arspage1 where passenger_id='$passenger_id' and airline_id='$airline_id' and schedule_id='$schedule_id'";
		$result=mysql_query($disp,$conn);
		?>	
<div id="main">
<?php while($resultset=mysql_fetch_array($result, MYSQL_ASSOC))
		{?>
		<div>Name: <?php echo $resultset['name']?>&ensp;<span id="pnr">PNR: <?php echo $resultset['passenger_ID']?></span></div>
		<div>From: <?php echo $resultset['departure_city']?>&ensp;<span id="pnr">To:  <?php echo $resultset['destination_city']?></span></div> 
		<div>Airline ID:<?php echo $resultset['airline_id']?></div>
		<div>Departure Date:<?php echo $resultset['departure_date']?></div>
		<div>Arrival Date:<?php echo $resultset['arrival_date']?></div>
		<div>Departure Time:<?php echo $resultset['departure_time']?></div>
		<div>Arrival Time:<?php echo $resultset['arrival_time']?></div>
		<?php
		}
		?>
	</div>
<a href="ARS.php">Book Another? Click me</a>	
</body>
</html>