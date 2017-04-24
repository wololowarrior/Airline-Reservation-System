<html>
	<head>
		<title>
		Your Ticket.
		</title>
		
		<link rel="stylesheet" href="viewticket.css" type="text/css">
	</head>
	<body>
		<?php
			$mysql_host="localhost";
		$mysql_user="root";
		$mysql_pass="1234";
		$conn=@mysql_connect($mysql_host,$mysql_user,$mysql_pass) or die("Unable to connect");
		@mysql_select_db('ars');
		$passenger_id=$_GET['passenger_id'];
		$disp="SELECT * from passengers natural join schedule_b natural join arspage1 natural join ticket where passenger_ID='$passenger_id'";
		$result=mysql_query($disp,$conn) or die ("error");
		if(!mysql_affected_rows())
			echo "ticket does not exist";
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
		</body>
</html>