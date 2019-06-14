<?php 

require_once("../includes/db_connection.php"); 


$id = $_GET['id'];


	mysqli_query($connection, "DELETE FROM water_type WHERE wType_id = '$id'");

	echo "<script>alert('Success!')</script>";
	echo "<script>document.location='main_refill.php'</script>";

?>