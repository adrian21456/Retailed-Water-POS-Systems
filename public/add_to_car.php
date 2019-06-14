<?php 
require_once("../includes/db_connection.php");

$type = $_POST['type'];
$qty = $_POST['qty'];
$total = $_POST['total'];

if(isset($_POST['amount'])){
	if($_POST['amount'] != ""){
		$total = $_POST['amount'];

		$qty = $total;
	}
}

	mysqli_query($connection, "INSERT INTO car_cart(cType_id, cQty, CTotal) VALUES('$type', '$qty', '$total')");
?>