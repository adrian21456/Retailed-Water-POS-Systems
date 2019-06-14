
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
				$sql = mysqli_query($connection, "SELECT * FROM water_sales NATURAL JOIN water_type WHERE date_s = '$ym' GROUP BY wType_id");

					while($row = mysqli_fetch_array($sql)){

					 $wType_id = $row['wType_id'];


						$sql2 = mysqli_query($connection, "SELECT *, SUM(wQty) As qty FROM water_sales NATURAL JOIN water_type WHERE wType_id = '$wType_id' AND date_s = '$ym' AND del_id = 0");

							$row2 = mysqli_fetch_array($sql2);

						$sql3 = mysqli_query($connection, "SELECT *, SUM(wQty) As qty2 FROM water_sales NATURAL JOIN water_type WHERE wType_id = '$wType_id' AND date_s = '$ym' AND del_id > 0");

							$row3 = mysqli_fetch_array($sql3);

							if($row3['del_id'] > 0){
								$add = "+5 Php";
							}else{
								$add = "";
							}

							if(mysqli_num_rows($sql3) > 0 AND $row3['qty2'] != ""){
								$haveDel = "(Php ".($row['wCost']+5) ."/". $row3['qty2'] .")";
								$p2 = "Php ". ($row['wCost']+5);
								
								$t2 = "Php ". $row3['qty2'] * ($row['wCost'] + 5);

								 $t3 = $row3['qty2'] * ($row['wCost'] + 5);
							}else{
								$haveDel = "";
								$p2 = "";
								$t2 = "";
								 $t3 = 0;
							}
							if($row2['qty'] != ""){
								$noDel = " (".$row['wCost']."Php /".$row2['qty'] .")";
								$costNo = "Php ".$row['wCost'];
								$costNo2 = "Php ".$row2['qty'] * $row['wCost'];
							}else{
								$noDel = "";
								$costNo = "";
								$costNo2 = "";
							}
			?>
        	<tr class="default">
                <td class="border">
                	<?php echo $row['wType'] .$noDel . $haveDel ?>
                		
               	</td>
                <td class="text-center border"><?php echo "<div>".$row2['qty']."</div><div>".$row3['qty2']."</div>" ?></td>
                <td class="text-right border"><?php echo "<div>$costNo</div><div>". $p2 ."</div>" ?></td>
                <td class="text-right border"><?php echo "<div>$costNo2</div><div>". $t2 ."</div>" ?></td>
            </tr>
			
			<?php		
			$total += $row2['qty'] * $row['wCost'] + $t3;
					}
			?>

        	<tr class="default">
                <td class="text-right border" colspan="3">Total</td>
                <td class="text-right border">Php <?php echo $total ?></td>
            </tr>
		</table>
