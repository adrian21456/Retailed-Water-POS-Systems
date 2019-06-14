<?php 
require_once("../includes/db_connection.php");


	mysqli_query($connection, "TRUNCATE car_cart");
	mysqli_query($connection, "TRUNCATE laundry_cart");
	mysqli_query($connection, "TRUNCATE water_cart");
	mysqli_query($connection, "DELETE FROM delivery");

	echo "<script>document.location='sales.php'</script>";
?>