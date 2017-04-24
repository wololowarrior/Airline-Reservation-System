<html>
	<head>
		<title>
				Cancel Your Ticket.
		</title>
		<link rel="stylesheet" href="deleteticket.css" type="text/css">
		</head><div>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
			<input id="text3" type="text" placeholder="CANCEL TICKET.Enter PNR HERE" name="passenger_id" />
			<br/>
			<br/>
			<input type="submit" class="button2"/>
		</form>
		<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $name = $_REQUEST['passenger_id'];
    if (empty($name)) {
        echo "Field Empty";
    } else {
        $mysql_host="localhost";
		$mysql_user="root";
		$mysql_pass="1234";
		$conn=@mysql_connect($mysql_host,$mysql_user,$mysql_pass) or die("Unable to connect");
		@mysql_select_db('ars');
		$query="DELETE from passengers where passenger_ID='$name'";
		$result=mysql_query($query,$conn) or die("Please Enter valid PNR");
		
		if(mysql_affected_rows()>0)
		echo $name." Successfully Cancelled. Cheers!";
		else
			echo "not valid";
    }
}
?>
<style>
#text3
{
background: #333;
color: #ccc;
width: 300px;
float:center;
margin-top: 20px;
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

<br/>

<a href="ARS.php">Book Ticket Here!</a>
</div>
</html>