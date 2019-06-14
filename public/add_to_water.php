<?php 
require_once("../includes/db_connection.php");

echo $type = $_POST['type2'];
$qty = $_POST['qty'];
$dev = $_POST['dev'];
$total = $_POST['total']*$qty;
$del_id = 0;


		if($dev == "yes"){
			$area = $_POST['area'];
			$areaC = $_POST['areaC'];
			$loc = $_POST['loc'];
			$locC = $_POST['locC'];

			$type2 = "water";

			$add = $areaC;


			$sql = mysqli_query($connection, "SELECT * FROM delivery WHERE area LIKE '%$loc%' AND type_del = 'water'");

			if(mysqli_num_rows($sql) > 0){
			$sql = mysqli_query($connection, "SELECT * FROM delivery WHERE area LIKE '%$area%' AND type_del = 'water'");

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
						mysqli_query($connection, "INSERT INTO delivery(area, areaC, type_del) VALUES('$loc', '$locC', '$type2')");
echo "a";
						$del_id = mysqli_insert_id($connection);

					//	mysqli_query($connection, "UPDATE laundry_cart SET del_id = '$del_id' WHERE del_id = '0' ");
					}else{
echo "b";
						mysqli_query($connection, "INSERT INTO delivery(area, areaC, type_del) VALUES('$area', '$areaC', '$type2')");

						$del_id = mysqli_insert_id($connection);

					//	mysqli_query($connection, "UPDATE laundry_cart SET del_id = '$del_id' WHERE del_id = '0' ");

					}
				}

		}


	mysqli_query($connection, "INSERT INTO water_cart(wType_id, wQty, wTotal, del_id) VALUES('$type', '$qty', '$total', '$del_id')");
?>