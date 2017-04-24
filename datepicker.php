<!DOCTYPE html>
<html>
<form action="page3.php" method="get" onsubmit=onsumit()>
	Name:<input type="text" name="name_of" placeholder="here"/>
<br/>
	Age:<input type="number" name="age_of" placeholder="here"/>
<br/>	Phone:<input type="number" name="number_of"/>
	<br/>Email:<input type="email" name="email_of">
<br/>	
	Airline Selected:<input type="text" id="airl" name="airline_ID" readonly="readonly"/>
	<input type="submit" value="Submit">
		</form>
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
		$passengers_ID= generate_random_password(7);
		$name_of=$_GET['name_of'];
		$age_of=$_GET['age_of'];
		$number_of=$_GET['number_of'];
		$email_of=$_GET['email_of'];
		$airl=$_GET['airline_ID'];
		$sql_query="INSERT INTO passengers(passengers_ID,airline_id,name,age,phone_no,email) values ($passengers_ID,$airl,$name_of,$age_of,$number_of,$email)";
		mysql_query($sql_query,$conn);
	?>
}
</script>
</html> 
