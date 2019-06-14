
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
				$sql = mysqli_query($connection, "SELECT * FROM water_sales NATURAL JOIN water_type WHERE date_s = '$ym'");

					while($row = mysqli_fetch_array($sql)){

					 $wType_id = $row['wType_id'];

			?>
        	<tr class="default">
                <td class="text-center border"><?php echo $row['wType'] ?></td>
                <td class="text-center border"><?php echo $row['wQty'] ?></td>
                <td class="text-right border">Php <?php echo $row['wCost'] ?></td>
                <td class="text-right border"><?php echo $row['wTotal'] ?></td>
            </tr>
			
			<?php		
			$total += $row['wTotal'];
					}
			?>

        	<tr class="default">
                <td class="text-right border" colspan="3">Total</td>
                <td class="text-right border">Php <?php echo $total ?></td>
            </tr>
		</table>
