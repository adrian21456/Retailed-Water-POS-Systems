
<?php require_once("../includes/db_connection.php"); ?>
<?php include('session.php'); ?>

		<table class="table table-striped border">
        	<tr class="default">
                <td class="border">Service</td>
                <td class="text-center border">Mins</td>
                <td class="text-right border">Price</td>
                <td class="text-right border">Total</td>
            </tr>

			<?php

			$ym = $_GET['ym'];


			$total = 0;
				$sql = mysqli_query($connection, "SELECT * FROM car_sales NATURAL JOIN car_type WHERE date_s = '$ym' GROUP BY cType_id");
					while($row = mysqli_fetch_array($sql)){

					$cType_id = $row['cType_id'];

						$sql2 = mysqli_query($connection, "SELECT *, SUM(cQty) As nQty, SUM(cTotal) As nTotal FROM car_sales NATURAL JOIN car_type WHERE cType_id = '$cType_id'");

							$row2 = mysqli_fetch_array($sql2);

							$total += $row2['nTotal'];
							//$qty = mysqli_num_rows($sql2);
			?>
        	<tr class="default">
                <td class="border"><?php echo $row['cType'] ." (". $row['duration'] . $row['unit'] ."s/". $row['cCost'] ."Php)" ?></td>
                <td class="text-center border"><?php echo $row2['nQty'] ." mins" ?></td>
                <td class="text-right border"><?php echo "Php ".$row2['nTotal'] ?></td>
                <td class="text-right border"><?php echo "Php ". $row2['nTotal'] ?></td>
            </tr>
			
			<?php		
					}
			?>
        	<tr class="default">
                <td class="text-right border" colspan="3">Total</td>
                <td class="text-right border">Php <?php echo $total ?></td>
            </tr>
		</table>
