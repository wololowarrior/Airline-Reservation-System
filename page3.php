<html>
<head>
	<title>Page 3</title>
	<link rel="stylesheet" href="Page3.css" type="text/css">
	<link href="toaster/build/toastr.css" rel="stylesheet"/>
	<script src="toster/toastr.js"></script>


</head>

	<body>
	<div align="center">
	<form   method="get" onsubmit="onsumit() enable();">
		<div><div class="one" id="one1">Name</div><input type="text" name="name_of" placeholder="Enter Here" class="xcon"/></div></label>
		<div><div class="one">Age</div><input type="number" name="age_of" placeholder="Enter Here" class="xcon"/></div>
		<div><div class="one">Phone</div><input type="tel" name="number_of" placeholder="Enter Here" class="xcon"/></div>
		<div><div class="one">Address</div><input type="textbox" name="address" class="xcon" placeholder="Enter Here"/></div>
		<div><div class="one">Airline Selected</div><input type="text" id="airl" name="airline_ID" readonly="readonly" class="xcon"/></div>
		<br/><button class="button" type="submit"><span>Book!!</span></button><input type="text" id="sceh" name="schedule_id" hidden/>
			</form>
			</div>
			
			

<script LANGUAGE="JavaScript">
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
airplane = unescape(params["airline_id"]);
sched=unescape(params["schedule_id"]);
document.getElementById("airl").value=airplane;
document.getElementById("sceh").value=sched;
</script>
<script>
function onsumit(){
	<?php
		$mysql_host="localhost";
		$mysql_user="root";
		$mysql_pass="1234";
		$conn=@mysql_connect($mysql_host,$mysql_user,$mysql_pass) or die("Unable to connect");
		@mysql_select_db('ars');
		function generate_random_password($length = 10) {
    $alphabets = range('A','Z');
    $numbers = range('0','9');
    $final_array = array_merge($alphabets,$numbers);
         
    $password = '';
  
    while($length--) {
      $key = array_rand($final_array);
      $password .= $final_array[$key];
    }
  
    return $password;
  }
		$passengers_ID= generate_random_password(5);
		$ticket_id=generate_random_password(5);
		echo '<div>Your PNR is'.$passengers_ID.'<h1>.Please Save IT!!</div>';
		$name_of=$_GET['name_of'];
		$age_of=$_GET['age_of'];
		$number_of=$_GET['number_of'];
		$airline_id=$_GET['airline_id'];
		$sceh=$_GET['schedule_id'];
		$address=$_GET['address'];
		$passengers=$_GET['passengers'];
		$total_seats=$_GET['total_seats'];
		$total_seats=$total_seats-$passengers;
		//$email_of=$_GET['email_of'];
		$airl=$_GET['airline_ID'];	
		$q="UPDATE arspage1 SET total_seats='$total_seats' WHERE airline_ID= '$airline_id'" ;
		$sql_query="INSERT INTO passengers(passenger_ID,airline_id,name,age,phone_no,Address) values ('$passengers_ID','$airl','$name_of','$age_of','$number_of','$address')";
		$red=mysql_query($q,$conn);
		$result=mysql_query($sql_query,$conn);
		
		?>
//document.getElementById("pnt").innerHTML="<?php echo $passengers_ID;?>";

</script><button id="b1" onclick="window.location='ticket.php?passengers_ID=<?php echo $passengers_ID;?>&ticket_id=<?php echo $ticket_id;?>&airline_id=<?php echo $airl;?>&schedule_id=<?php echo $sceh;?>'">Get Your ticket</button>
</body>
</html>