
<?php require_once("../includes/db_connection.php"); ?>
<?php include('session.php'); ?>

		<table class="table table-striped border">
        	<tr class="default">
                <td class="border">Location</td>
                <td class="text-center border">Cost</td>
                <td class="text-right border">Total</td>
                <td class="text-right border">Type</td>
            </tr>

			<?php
			$total = 0;
			$ym = $_GET['ym'];

				$sql = mysqli_query($connection, "SELECT * FROM delivery_sales");
					while($row = mysqli_fetch_array($sql)){

					$id = $row['del_id'];

						$sql2 = mysqli_query($connection, "SELECT *, SUM(lQty) As qty FROM laundry_sales NATURAL JOIN delivery_sales WHERE date_s = '$ym' AND del_id = '$id'");

							$row2 = mysqli_fetch_array($sql2);

						$sql3 = mysqli_query($connection, "SELECT *, SUM(wQty) As qty FROM water_sales NATURAL JOIN delivery_sales WHERE date_s = '$ym' AND del_id = '$id'");

							$row3 = mysqli_fetch_array($sql3);

							if($row['type_del'] == "water"){
								$type = "Water Refill";
							}else{
								$type = "Laundry";								
							}

							if($row2['areaC'] != ""){
								$cost = $row2['areaC'];
							}else{
								$cost = $row3['areaC'];								
							}

					$total += $cost; 
			?>
        	<tr class="default">
                <td class="border">Delivery (<?php echo $row['area'] ?>)</td>
                <td class="text-right border"><?php echo "Php ".$cost; ?></td>
                <td class="text-right border"><?php echo "Php ".$cost; ?></td>
                <td class="text-right border"><?php echo $type; ?></td>
            </tr>
			
			<?php		
					}
			?>

        	<tr class="default">
                <td class="text-right border" colspan="2">Total</td>
                <td class="text-right border">Php <?php echo $total ?></td>
                <td class="text-right border"></td>
            </tr>
		</table>
