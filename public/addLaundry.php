<?php 
require_once("../includes/db_connection.php"); 


$type = $_POST['type'];
$price = $_POST['price'];
$status = $_POST['status'];


	mysqli_query($connection, "INSERT INTO laundry_type(lType, lCost, lunit, status) VALUES('$type', '$price', 'Kg', '$status')");

	echo "<script>alert('Success')</script>";
	echo "<script>document.location='main_laundry.php'</script>";

?>