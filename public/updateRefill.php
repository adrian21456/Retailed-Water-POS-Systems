<?php 
require_once("../includes/db_connection.php"); 


$id = $_POST['id'];
$type = $_POST['type'];
$price = $_POST['price'];


	mysqli_query($connection, "UPDATE water_type SET wType = '$type', wCost = '$price' WHERE wType_id = '$id'");

	echo "<script>alert('Success')</script>";
	echo "<script>document.location='main_refill.php'</script>";

?>