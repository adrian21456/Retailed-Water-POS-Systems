<?php 
require_once("../includes/db_connection.php");

$id = $_GET['id'];
$pay = $_GET['pay'];

	mysqli_query($connection, "INSERT INTO pay(id, amount, date_p, time_p) VALUES('$id', '$pay', NOW(), NOW())");

	echo "<script>document.location='sales.php'</script>";
?>