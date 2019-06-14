<?php 

require_once("../includes/db_connection.php"); 


$id = $_GET['id'];


	mysqli_query($connection, "DELETE FROM laundry_type WHERE lType_id = '$id'");

	echo "<script>alert('Success!')</script>";
	echo "<script>document.location='main_laundry.php'</script>";

?>