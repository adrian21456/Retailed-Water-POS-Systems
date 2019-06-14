<?php 
require_once("../includes/db_connection.php"); 


$type = $_POST['type'];
$price = $_POST['price'];


	mysqli_query($connection, "INSERT INTO water_type(wType, wCost) VALUES('$type', '$price')");

	echo "<script>alert('Success')</script>";
	echo "<script>document.location='main_refill.php'</script>";

?>