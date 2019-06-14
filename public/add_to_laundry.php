<?php 
require_once("../includes/db_connection.php");

$num = 0;
$sql = mysqli_query($connection, "SELECT * FROM laundry_type");
while($row = mysqli_fetch_array($sql)){

	if(isset($_POST["id".$row['lType_id']])){

		$type = $_POST["id".$row['lType_id']];
		$kilo = $_POST["kilo".$row['lType_id']];

		if($kilo != "" ){
			$num = 1;
		}
	}	
}

if($num == 1){
	$dev = $_POST['dev'];
	$del_id = 0;
	if($dev == "yes"){
		$area = $_POST['area'];
		$areaC = $_POST['areaC'];
		$loc = $_POST['loc'];
		$locC = $_POST['locC'];

		$type = "laundry";

		$sql = mysqli_query($connection, "SELECT * FROM delivery WHERE area LIKE '%$loc%' AND type_del = 'laundry'");

		if(mysqli_num_rows($sql) > 0){
			$sql = mysqli_query($connection, "SELECT * FROM delivery WHERE area LIKE '%$area%' AND type_del = 'laundry'");

			$add = $locC;
		}

		$row = mysqli_fetch_array($sql);

		if(mysqli_num_rows($sql) > 0){

			$areaC2 = $row['areaC'];

			$areaC2 += $add;

			$del_id = $row['del_id'];
			echo "c";
			mysqli_query($connection, "UPDATE laundry_cart SET areaC = '$areaC2' WHERE del_id = '$del_id' ");
		}else{

			if($loc != ""){

				if(!(isset($_POST["self"]))){

					mysqli_query($connection, "INSERT INTO delivery(area, areaC, type_del) VALUES('$loc', '$locC', '$type')");
					echo "a";
					$del_id = mysqli_insert_id($connection);

				}

			}else{
				echo "b";

				if(!(isset($_POST["self"]))){
					mysqli_query($connection, "INSERT INTO delivery(area, areaC, type_del) VALUES('$area', '$areaC', '$type')");

					$del_id = mysqli_insert_id($connection);
				}

					//	mysqli_query($connection, "UPDATE laundry_cart SET del_id = '$del_id' WHERE del_id = '0' ");

			}
		}

	}
}


$sql = mysqli_query($connection, "SELECT * FROM laundry_type");
while($row = mysqli_fetch_array($sql)){

	if(isset($_POST["id".$row['lType_id']])){

		$type = $_POST["id".$row['lType_id']];
		$kilo = $_POST["kilo".$row['lType_id']];

		if($kilo != "" ){
			
			mysqli_query($connection, "INSERT INTO laundry_cart(lType_id, lQty, del_id) VALUES('$type', '$kilo', '$del_id')");
		}
	}	
}
?>