<?php 
require_once("../includes/db_connection.php"); 


$id = $_POST['id'];
$type = $_POST['type'];
$price = $_POST['price'];
$min = $_POST['min'];
$unit = "Min";


	mysqli_query($connection, "UPDATE car_type SET cType = '$type', cCost = '$price', duration = '$min' WHERE cType_id = '$id'");

	echo "<script>alert('Success')</script>";
	echo "<script>document.location='main_carwash.php'</script>";

?>