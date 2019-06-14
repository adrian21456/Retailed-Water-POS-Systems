<?php 
require_once("../includes/db_connection.php"); 

if(isset($_GET['idC'])){
$id = $_GET['idC'];

	$sql = mysqli_query($connection, "DELETE FROM car_cart WHERE cCart_id = '$id'");
}
if(isset($_GET['idL'])){
$id = $_GET['idL'];

	$sql = mysqli_query($connection, "DELETE FROM laundry_cart WHERE lCart_id = '$id'");
}
if(isset($_GET['idW'])){
$id = $_GET['idW'];

	$sql = mysqli_query($connection, "DELETE FROM water_cart WHERE wCart_id = '$id'");
}
if(isset($_GET['idD'])){
$id = $_GET['idD'];

	mysqli_query($connection, "UPDATE laundry_cart SET del_id = '0' WHERE del_id = '$id'");
	mysqli_query($connection, "UPDATE water_cart SET del_id = '0' WHERE del_id = '$id'");

	$sql = mysqli_query($connection, "DELETE FROM delivery WHERE del_id = '$id'");
}

?>