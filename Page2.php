<html>
<head>
	<title>
		Page 2
	</title>
	<link rel="stylesheet" href="Page2.css" type="text/css">

	</head>

	<body onload="myFunction()" style="margin:0;" id="bod">

<div id="loader"></div>
<div style="display:none;" id="myDiv" class="animate-bottom">
	<div id="division" onclick="reset()">
		<table style="width:100%">
			<thead>
				<tr>
				<th id="one1" align="left"><span class="cls">Trip Type</span></th>
				<th id="one2" align="left"><span class="cls">Departure City</span></th>
				<th id="one3" align="left"><span class="cls">Destinaiton City</span></th>
 				<th id="one4" align="left"><span class="cls">Departure Date</span></th>
 				<th align="left"><span id="one5" class="cls">Return Date</span></th>
 				<th id="one6" align="left"><span class="cls">Total Travellers</span></th>
 			</tr>
			</thead>
			<tbody>
				<tr>
					<td id="one" class="clsother"></td>
					<td id="two" class="clsother"></td>
					<td id="three" class="clsother"></td>
					<td id="four" class="clsother"></td>
					<td id="five" class="clsother"></td>
					<td id="six" class="clsother"></td>
				</tr>
			</tbody>
		</table>
	</div>
	
	<?php
		$mysql_host="localhost";
		$mysql_user="root";
		$mysql_pass="1234";
		$conn=@mysql_connect($mysql_host,$mysql_user,$mysql_pass) or die("Unable to connect");
		@mysql_select_db('ars');
		$pass=$_GET['passengers'];
		$frm=$_GET['from'];
		$to_city=$_GET['to'];
		$dd=$_GET['departure_date'];
		
		$query=("SELECT * from arspage1 natural join schedule_b where departure_city='$frm' and departure_date='$dd' and destination_city='$to_city' and schedule_b.airline_id=arspage1.airline_ID ");
		
		$resultset=mysql_query($query,$conn);
		error_reporting(0);
		if(isset($_GET['arrival_date_select']));{
		$arrival_date=$_GET['arrival_date_select'];
		$query1=("SELECT * from arspage1 natural join schedule_b where departure_city='$to_city' and destination_city='$frm' and departure_date='$arrival_date' and schedule_b.airline_id=arspage1.airline_ID");				
		$resultset1=mysql_query($query1,$conn);
	}
	?>
	
<div>
<table align="center" width=75% class="phptable">
	<tr>
		<th align="left" class="two">Airline ID</th>
		<th align="left" class="two">Departure Time</th>
		<th align="left" class="two">ETA</th>
		<th align="left" class="two">Seats Available?</th>
		<th align="left" class="two">Cost</th>
	</tr>
	<?php
		if(mysql_num_rows($resultset)>0){
			while($rows=mysql_fetch_array($resultset, MYSQL_ASSOC)){
		?>
		<tr onclick="window.location='page3.php?airline_id=<?php echo $rows['airline_ID'];?>&passengers=<?php echo $pass;?>&total_seats=<?php echo $rows['total_seats'];?>&schedule_id=<?php echo $rows['schedule_id'];?>'">
			<td><?php echo $rows['airline_ID'] ?></td>
			<td><?php echo $rows['departure_time']?></td>
			<td><?php echo $rows['arrival_time']?></td>
			<td><?php if($rows['total_seats']>0)echo "YES"?></td>
			<td><?php echo $rows['Cost']?></td>
		</tr>
		<?php
		}
		}
		?>
</table>
</div>
<!--test-->
<h1>RETURN</h1>

<div>
<table align="center" width=75% class="phptable">
	<tr>
		<th align="left" class="two">Airline ID</th>
		<th align="left" class="two">Departure Time</th>
		<th align="left" class="two">ETA</th>
		<th align="left" class="two">Seats Available?</th>
		<th align="left" class="two">Cost</th>
	</tr>
	<?php
			 if(mysql_num_rows($resultset1)>0){
		
			while($rows1=mysql_fetch_array($resultset1, MYSQL_ASSOC)){
		?>
		<tr >
			<td><?php echo $rows1['airline_ID'] ?></td>
			<td><?php echo $rows1['departure_time']?></td>
			<td><?php echo $rows1['arrival_time']?></td>
			<td><?php if($rows1['total_seats']>0)echo "YES"?></td>
			<td><?php echo $rows1['Cost']?></td>
		</tr>
		<?php
		}
		}
		?>
</table>
</div>


<script>
var myVar;

function myFunction() {
    myVar = setTimeout(showPage, 2000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";

}
</script>
<script LANGUAGE="JavaScript">
function reset(){
	var msg=confirm("Do you want to change the Entered Details?\nOK to Edit");
	if(msg){
		window.location="ARS.php";
		return true;
	}
	else
	{
return false;
	}
}
function getParams(){
var idx = document.URL.indexOf('?');
var params = new Array();
if (idx != -1) {
var pairs = document.URL.substring(idx+1, document.URL.length).split('&');
for (var i=0; i<pairs.length; i++){
nameVal = pairs[i].split('=');
params[nameVal[0]] = nameVal[1];
}
}
return params;
}
params = getParams();
Detail = unescape(params["Details"]);
from=unescape(params["from"])
To = unescape(params["to"]);
Departure_date = unescape(params["departure_date"]);
if(params["arrival_date_select"]){
	arrival=unescape(params["arrival_date_select"]);
}
passenger=unescape(params["passengers"]);
from=from.charAt(0).toUpperCase()+from.slice(1);
To=To.charAt(0).toUpperCase()+To.slice(1)
document.getElementById('one').innerHTML= (Detail);
document.getElementById('two').innerHTML =from;
document.getElementById("three").innerHTML= To;
document.getElementById("four").innerHTML=Departure_date;
if(params["arrival_date_select"])
{ 
	document.getElementById("five").innerHTML=arrival;

}
else
{	var bleh="Not Coming Back?K.Fine.";
	document.getElementById("five").innerHTML=bleh;
	document.getElementById("one5").style.opacity=0.5;
	document.getElementById("five").style.opacity=0.5;
	document.getElementById("five").style.color="#B8B89F";
	document.getElementById("one5").style.color="#B8B89F";
}
document.getElementById("six").innerHTML=passenger;
window.pass=passenger;

</script>
</body>
</html>
