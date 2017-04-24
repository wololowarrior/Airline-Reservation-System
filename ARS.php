<!doctype html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<title>Airline Reservation System</title>
	<link rel="stylesheet" href="index.css" type="text/css">
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
		<script>
		function setOneWay(){
			
				//$('arrival_date_select').css('backgroundColor','#ffffff');
				document.getElementById("arrival_date_select").disabled=true;
				document.getElementById("arrival_date_select").style.color="gray";
				document.getElementById("arrival_date_select").style.opacity="0.5";
				document.getElementById("arrival_date").style.opacity="0.5";
			
		} 
		function setround(){
			document.getElementById("arrival_date_select").disabled=false;
			document.getElementById("arrival_date_select").style.color="#EF5C54";
			document.getElementById("arrival_date_select").style.opacity="1";
			document.getElementById("arrival_date").style.opacity="1";
		}
</script>
</head>

	<body>
<?php
		$mysql_host="localhost";
		$mysql_user="root";
		$mysql_pass="1234";
		$conn=@mysql_connect($mysql_host,$mysql_user,$mysql_pass) or die("Unable to connect");
		@mysql_select_db('ars');
		$query="select distinct departure_city from arspage1";
		$resultset=mysql_query($query,$conn);
		?>
		<form action="Page2.php" method="get">
		
		<br/>
		<br/>
		<div class="cssload-loader">Welcome</div>
		<p id="book">Book Flight</p>
		<br/>
		<label><span id="details_oneWay" class="one">
		<input type="radio" id="oneWay" value="OneWay" name="Details" onclick="setOneWay()" default=NULL/>
		ONE WAY
		</label>
		<label>           
	</span>
		<span id="details_roundTrip" class="one">
		<input type="Radio" id="roundTrip" value="Round" name="Details" onclick="setround()"/>
		ROUND TRIP</span>
	</label>
	</br><br/></br>
	<div id="from">From:</div>
	<select name="from" id="depart"> 
<?php
if(mysql_num_rows($resultset)>0){
	while($rows=mysql_fetch_array($resultset, MYSQL_ASSOC)){
?>
	<option><?php echo $rows['departure_city']?></option>
<?php
}
}
?>
</select><br/>
	<div id="to">To:</div><input type="text" id="arrive_at" autocomplete="OFF" name="to" placeholder="Destination City" /><br/>
	<br/>
	<span id="depart_date">Departure Date</span><span id="arrival_date"><t/>&ensp;&ensp;&ensp;Return Date</span><span id="humans">&emsp;&emsp;&emsp;&emsp;Travellers</span><br/>

<input type="date" value="yyy/mm/dd" id="departure_date" name="departure_date" />&ensp;
<input type="date" value="dd/mm/yyy"  id="arrival_date_select" name="arrival_date_select"/>&emsp;&emsp;&emsp;
<input type="number" id="number_of" autocomplete="OFF" placeholder="Enter total" name="passengers" />

<br/>
<br/>
<button class="button" type="submit"><span>Search!!</span></button>

<button class="button1" type="Reset" onclick="setround()"><span>Reset</span></button><br/><br/>


	</form>
<form action="viewticket.php" method="get"> 
<input id="text3" type="text" placeholder="GET YOUR TICKET. Enter PNR HERE" name="passenger_id"/>
<input type="submit" class="button2">
</form>
<style>
#text3
{
background: #333;
color: #ccc;
width: 300px;
float:right;
margin-right:30px;
padding: 6px 10px 6px 25px;
transition: 500ms all ease;
border: 1px solid #333;
  font-family: Tahoma, Geneva, sans-serif;
  font-size:18px;
}
#text3:hover
{

box-shadow: 12px 13px 0px rgba(204, 211, 51, 0.38),
-11px -14px 0px rgba(241, 96, 0, 0.28),
18px -24px 0px rgba(0, 0, 0, 0.34),
33px -6px 0px rgba(39, 74, 214, 0.28);

</style>

<br/><br/>
<div>
<hr>

	<a href="Contactus.html" alt="Click to know"><div class="cmn-t-shake">Contact Us</div></a>
	</div>
	</body>
</html>	