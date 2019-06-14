<?php 
require_once("../includes/db_connection.php"); 


$id = $_POST['id'];
$type = $_POST['type'];
$price = $_POST['price'];
$status = $_POST['status'];


	mysqli_query($connection, "UPDATE laundry_type SET lType = '$type', lCost = '$price', status = '$status' WHERE lType_id = '$id'");

	echo "<script>alert('Success')</script>";
	echo "<script>document.location='main_laundry.php'</script>";

?>