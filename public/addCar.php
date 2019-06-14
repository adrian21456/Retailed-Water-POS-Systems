<?php 
require_once("../includes/db_connection.php"); 


$type = $_POST['type'];
$price = $_POST['price'];
$min = $_POST['min'];
$unit = "Min";


	mysqli_query($connection, "INSERT INTO car_type(cType, cCost, duration, unit) VALUES('$type', '$price', '$min', '$unit')");

	echo "<script>alert('Success')</script>";
	echo "<script>document.location='main_carwash.php'</script>";

?>