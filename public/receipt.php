<?php require_once("../includes/db_connection.php"); ?>
<?php include("madd.php"); ?>
<?php include("../includes/layouts/functions.php"); ?>
<?php include('session.php'); ?>
<?php include("../includes/layouts/header.php");

$id = $_GET['id'];
$pay = $_GET['pay'];
$total = $_GET['total'];
$year = date("Y");

	mysqli_query($connection, "INSERT INTO pay(cus_id, total, cash, date_pay, time_pay, year_pay) VALUES('$id', '$total', '$pay', NOW(), NOW(), '$year')");

 ?>

<div class="col-md-4 col-md-push-4">
       <table class="table table-hover" id='salestableid'>
    	<thead class="border">
         	<tr>
         		<td colspan="4" class="text-center">

         			<div class="mtop-10">Name of The Business</div><hr>

         			<div class="text-right">
	         			Date: <?php echo date("F d, Y") ?><br>
	         			Time: <?php echo date("H:i A") ?>
         			</div>
         		</td>
         	</tr>
         	<tr>
         		<th colspan="4" class="text-center">RECEIPT</th>
         	</tr>
         	<tr>
                <th class="border">Service</th>
                <th width="75" class="text-center border">Quantity</th>
                <th width="75" class="text-center border">Price</th>
                <th width ="90" class="text-center border">Total</th>
            </tr>
        </thead>
        <tbody>
			<?php

				$sql = mysqli_query($connection, "SELECT * FROM car_cart NATURAL JOIN car_type GROUP BY cType_id");
					while($row = mysqli_fetch_array($sql)){

					$cType_id = $row['cType_id'];

						$sql2 = mysqli_query($connection, "SELECT *, SUM(cQty) As nQty, SUM(cTotal) As nTotal FROM car_cart NATURAL JOIN car_type WHERE cType_id = '$cType_id'");

							$row2 = mysqli_fetch_array($sql2);
							//$qty = mysqli_num_rows($sql2);
			?>
        	<tr class="default">
                <td class="border"><?php echo $row['cType'] ." (". $row['duration'] . $row['unit'] ."s/". $row['cCost'] ."Php)" ?></td>
                <td class="text-center border"><?php echo $row2['nQty'] ." mins" ?></td>
                <td class="text-right border"><?php echo "Php ".$row2['nTotal'] ?></td>
                <td class="text-right border"><?php echo "Php ".$row2['nQty'] * $row2['nTotal'] ?></td>
            </tr>
			
			<?php		
					}
			?>



			<?php

				$sql = mysqli_query($connection, "SELECT * FROM water_cart NATURAL JOIN water_type GROUP BY wType_id");
					while($row = mysqli_fetch_array($sql)){

					$wType_id = $row['wType_id'];


						$sql2 = mysqli_query($connection, "SELECT *, SUM(wQty) As qty FROM water_cart NATURAL JOIN water_type WHERE wType_id = '$wType_id' AND del_id = 0");

							$row2 = mysqli_fetch_array($sql2);

						$sql3 = mysqli_query($connection, "SELECT *, SUM(wQty) As qty2 FROM water_cart NATURAL JOIN water_type WHERE wType_id = '$wType_id' AND del_id > 0");

							$row3 = mysqli_fetch_array($sql3);

							if($row3['del_id'] > 0){
								$add = "+5 Php";
							}else{
								$add = "";
							}

							if(mysqli_num_rows($sql3) > 0){
								$haveDel = "(Php ".($row['wCost']+5) ."/". $row3['qty2'] .")";
								$p2 = "Php ". ($row['wCost']+5);
								
								$t2 = "Php ". $row3['qty2'] * ($row['wCost'] + 5);
							}else{
								$haveDel = "";
								$p2 = "";
								$t2 = "";
							}

			?>
        	<tr class="default">
                <td class="border"><?php echo $row['wType'] ." (".$row['wCost']."Php /".$row2['qty'] .")". $haveDel ?></td>
                <td class="text-center border"><?php echo "<div>".$row2['qty']."</div><div>".$row3['qty2']."</div>" ?></td>
                <td class="text-right border"><?php echo "<div>Php ".$row['wCost'] ."</div><div>". $p2 ."</div>" ?></td>
                <td class="text-right border"><?php echo "<div>Php ".$row2['qty'] * $row['wCost']."</div><div>". $t2 ."</div>" ?></td>
            </tr>
			
			<?php		
					}
			?>	


			<?php

				$sql = mysqli_query($connection, "SELECT * FROM laundry_cart NATURAL JOIN laundry_type GROUP BY lType_id");
					while($row = mysqli_fetch_array($sql)){

					$lType_id = $row['lType_id'];


						$sql2 = mysqli_query($connection, "SELECT *, SUM(lQty) As qty FROM laundry_cart NATURAL JOIN laundry_type WHERE lType_id = '$lType_id'");

							$row2 = mysqli_fetch_array($sql2);
			?>
        	<tr class="default">
                <td class="border"><?php echo $row['lType'] ?></td>
                <td class="text-center border"><?php echo $row2['qty'] ?> Kg</td>
                <td class="text-right border"><?php echo "Php ".$row['lCost'] ?></td>
                <td class="text-right border"><?php echo "Php ".$row2['qty'] * $row['lCost'] ?></td>
            </tr>
			
			<?php		
					}
			?>	

			<?php

				$sql = mysqli_query($connection, "SELECT * FROM delivery WHERE type_del = 'laundry'");
					while($row = mysqli_fetch_array($sql)){

					$id = $row['del_id'];

						$sql2 = mysqli_query($connection, "SELECT *, SUM(lQty) As qty FROM laundry_cart WHERE del_id = '$id'");
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

			<?php

				$sql = mysqli_query($connection, "SELECT * FROM delivery WHERE type_del = 'water'");
					while($row = mysqli_fetch_array($sql)){

					$id = $row['del_id'];

						$sql2 = mysqli_query($connection, "SELECT *, SUM(wQty) As qty FROM water_cart WHERE del_id = '$id'");
							$row2 = mysqli_fetch_array($sql2);
			?>
        	<tr class="default">
                <td class="border">Delivery (<?php echo $row['area'] ?>)</td>
                <td class="text-center border"><?php echo $row2['qty'] ?></td>
                <td class="text-right border"><?php echo "Php ".$row['areaC'] ?></td>
                <td class="text-right border"><?php echo "Php ".$row['areaC'] ?></td>
            </tr>
			
			<?php		
					}
			?>	

<!-- total -->

			<?php

			$cost1 = 0;
				$sql = mysqli_query($connection, "SELECT * FROM car_cart NATURAL JOIN car_type GROUP BY cType_id");
					while($row = mysqli_fetch_array($sql)){

					$cType_id = $row['cType_id'];

						$sql2 = mysqli_query($connection, "SELECT *, SUM(cQty) As nQty, SUM(cTotal) As nTotal FROM car_cart NATURAL JOIN car_type WHERE cType_id = '$cType_id'");

							$row2 = mysqli_fetch_array($sql2);

							$cost1 += $row2['nQty'] * $row2['nTotal'];
		
					}
			?>



			<?php
				$cost2 = 0;
				$sql = mysqli_query($connection, "SELECT * FROM water_cart NATURAL JOIN water_type GROUP BY wType_id");
					while($row = mysqli_fetch_array($sql)){

					$wType_id = $row['wType_id'];


						$sql2 = mysqli_query($connection, "SELECT *, SUM(wQty) As qty FROM water_cart NATURAL JOIN water_type WHERE wType_id = '$wType_id' AND del_id = '0'");

							$row2 = mysqli_fetch_array($sql2);

						$sql3 = mysqli_query($connection, "SELECT *, SUM(wQty) As qty2 FROM water_cart NATURAL JOIN water_type WHERE wType_id = '$wType_id' AND del_id > 0");

							$row3 = mysqli_fetch_array($sql3);

							if($row3['del_id'] > 0){
								$add = "+5 Php";
							}else{
								$add = "";
							}

							if(mysqli_num_rows($sql3) > 0){
								$haveDel = "(Php ".($row['wCost']+5) ."/". $row3['qty2'] .")";
								$p2 = ($row['wCost']+5);
								
								$t2 = $row3['qty2'] * ($row['wCost'] + 5);
							}else{
								$haveDel = "";
								$p2 = "";
								$t2 = "";
							}

							$cost2 += ($row2['qty'] * $row['wCost']) + $t2;
	
					}
			?>	


			<?php

				$cost3 = 0;
				$sql = mysqli_query($connection, "SELECT * FROM laundry_cart NATURAL JOIN laundry_type GROUP BY lType_id");
					while($row = mysqli_fetch_array($sql)){

					$lType_id = $row['lType_id'];


						$sql2 = mysqli_query($connection, "SELECT *, SUM(lQty) As qty FROM laundry_cart NATURAL JOIN laundry_type WHERE lType_id = '$lType_id'");

							$row2 = mysqli_fetch_array($sql2);

							$cost3 += $row2['qty'] * $row['lCost'];
				
					}
			?>	

			<?php

				$cost4 = 0;
				$sql = mysqli_query($connection, "SELECT * FROM delivery");
					while($row = mysqli_fetch_array($sql)){

					$id = $row['del_id'];

						$sql2 = mysqli_query($connection, "SELECT *, SUM(lQty) As qty FROM laundry_cart ");
							$row2 = mysqli_fetch_array($sql2);

							$cost4 += $row['areaC'];
			?>
			
			<?php		
					}
			?>	

        	<tr class="default">
                <td class="border text-right" colspan="3">Total</td>
                <td width="75" class="text-right border" width ="89">Php <div id="allT" style="float: right"><?php echo $overall = $cost1+$cost2+$cost3+$cost4 ?></div></td>
            </tr>
        	<tr class="default">
                <td class="border text-right" colspan="3">Payment</td>
                <td width="75" class="text-right border" width ="89">Php <div id="allT" style="float: right"><?php echo $pay ?></div></td>
            </tr>
        	<tr class="default">
                <td class="border text-right" colspan="3">Change</td>
                <td width="75" class="text-right border" width ="89">Php <div id="allT" style="float: right"><?php echo $pay - $overall ?></div></td>
            </tr>
        	


        </tbody>
    </table>
	

	<div class="text-right">
		<span class="btn btn-primary noPrint" id="print">Print</span>
	</div>
</div>

<script type="text/javascript">
	$("#print").click(function(){
		window.print();
		document.location="truncate.php";
	});
</script>