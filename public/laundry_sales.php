
<?php require_once("../includes/db_connection.php"); ?>
<?php include('session.php'); ?>

		<table class="table table-striped border">
        	<tr class="default">
                <td class="border">Service</td>
                <td class="text-center border">Quantity</td>
                <td class="text-right border">Price</td>
                <td class="text-right border">Total</td>
            </tr>

			<?php
			$total = 0;
			$ym = $_GET['ym'];

				$sql = mysqli_query($connection, "SELECT * FROM laundry_sales NATURAL JOIN laundry_type WHERE date_s = '$ym' GROUP BY lType_id");
					while($row = mysqli_fetch_array($sql)){

					$lType_id = $row['lType_id'];


						$sql2 = mysqli_query($connection, "SELECT *, SUM(lQty) As qty FROM laundry_sales NATURAL JOIN laundry_type WHERE date_s = '$ym' AND lType_id = '$lType_id'");

							$row2 = mysqli_fetch_array($sql2);

							$total += $row2['qty'] * $row['lCost'];
			?>
        	<tr class="default">
                <td class="border"><?php echo $row['lType'] ?></td>
                <td class="text-center border"><?php echo $row2['qty'] ?> Kg</td>
                <td class="text-right border"><?php echo "Php ".$row['lCost'] ?></td>
                <td class="text-right border"><?php echo "Php ".$row2['qty'] * $row['lCost'] ?></td>
            </tr>
			
			<?php		
					}
			?>	<?php

				$sql = mysqli_query($connection, "SELECT * FROM delivery WHERE type_del = 'laundry'");
					while($row = mysqli_fetch_array($sql)){

					$id = $row['del_id'];

						$sql2 = mysqli_query($connection, "SELECT *, SUM(lQty) As qty FROM laundry_sales WHERE del_id = '$id'");
							$row2 = mysqli_fetch_array($sql2);
			?>
        	<tr class="default">
                <td class="border">Delivery (<?php echo $row['area'] ?>)</td>
                <td class="text-center border"><?php echo $row2['qty'] ?> Kg</td>
                <td class="text-right border"><?php echo "Php ".$row['areaC'] ?></td>
                <td class="text-right border"><?php echo "Php ".$row['areaC'] ?></td>
            </tr>
			
			<?php		
					}
			?>

        	<tr class="default">
                <td class="text-right border" colspan="3">Total</td>
                <td class="text-right border">Php <?php echo $total ?></td>
            </tr>
		</table>
