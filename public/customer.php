<?php 
require_once("../includes/db_connection.php");

$name = $_POST['name'];
$contact = $_POST['contact'];
$pay = $_POST['pay'];
$total = $_POST['total'];
$year = date("Y");
$id = 0;

	if($name != ""){
		mysqli_query($connection, "INSERT INTO customer_info(name, contact) VALUES('$name', '$contact')");

		$id = mysqli_insert_id($connection);
	}

	mysqli_query($connection, "INSERT INTO payment(cus_id, total, cash, date_pay, time_pay, year_pay) VALUES('$id', '$total', '$pay', NOW(), NOW(), '$year')");

	$sql = mysqli_query($connection, "SELECT * FROM car_cart NATURAL JOIN car_type");
		while ($row = mysqli_fetch_array($sql)) {

			$cType_id = $row['cType_id'];
			$cQty = $row['cQty'];
			$cTotal = $row['cTotal'];
			$cCost = $row['cCost'];
			$year = date("Y");

			mysqli_query($connection, "INSERT INTO car_sales(cType_id, cQty, oCost, cTotal, date_s, time_s, year) VALUES('$cType_id','$cQty','$cCost','$cTotal',NOW(),NOW(),'$year')");
		}

	$sql = mysqli_query($connection, "SELECT * FROM laundry_cart NATURAL JOIN laundry_type");
		while ($row = mysqli_fetch_array($sql)) {

			$lType_id = $row['lType_id'];
			$lQty = $row['lQty'];
			$del = $row['del_id'];
			$lCost = $row['lCost'];

			$lTotal = $lCost*$lQty;
			$year = date("Y");

			mysqli_query($connection, "INSERT INTO laundry_sales(lType_id, lQty, del_id, oCost, lTotal, date_s, time_s, year) VALUES('$lType_id','$lQty','$del','$lCost','$lTotal',NOW(),NOW(),'$year')");
		}

	
	$sql = mysqli_query($connection, "SELECT * FROM water_cart NATURAL JOIN water_type");
		while ($row = mysqli_fetch_array($sql)) {

			$wType_id = $row['wType_id'];
			$wQty = $row['wQty'];
			$wTotal = $row['wTotal'];
			$del = $row['del_id'];
			$wCost = $row['wCost'];
			$year = date("Y");

			mysqli_query($connection, "INSERT INTO water_sales(wType_id, wQty, del_id, wTotal, oCost, date_s, time_s, year) VALUES('$wType_id','$wQty','$del', '$wTotal','$wCost',NOW(),NOW(),'$year')");
		}

	$sql = mysqli_query($connection, "SELECT * FROM delivery");
		while ($row = mysqli_fetch_array($sql)) {

			$del_id = $row['del_id'];
			$area = $row['area'];
			$areaC = $row['areaC'];
			$type_del = $row['type_del'];

			mysqli_query($connection, "INSERT INTO delivery_sales(area, areaC, type_del, del_id) VALUES('$area','$areaC','$type_del', '$del_id')");
		}


	echo "<script>document.location='receipt.php?pay=$pay&total=$total&id=$id'</script>";
?>