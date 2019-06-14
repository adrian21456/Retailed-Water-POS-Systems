<?php require_once("../includes/db_connection.php"); ?>

       <table class="table table-hover" id='salestableid'>
    	<thead>
         	<tr class= "default" style="background-color: #e18728">
                <td class="border text-center text-middle" style="width: 1%"></span></td>
                <th><font color = "white">Service</th>
                <th width="75" class="text-center"><font color = "white">Quantity</th>
                <th width="75" class="text-center"><font color = "white">Price</th>
                <th width ="90" class="text-center"><font color = "white">Total</th>
            </tr>
        </thead>
        <tbody>
			<?php

				$sql = mysqli_query($connection, "SELECT * FROM car_cart NATURAL JOIN car_type GROUP BY cType_id");
					while($row = mysqli_fetch_array($sql)){

					$cType_id = $row['cType_id'];

						$sql2 = mysqli_query($connection, "SELECT *, SUM(cQty) As nQty, SUM(cTotal) As nTotal FROM car_cart NATURAL JOIN car_type NATURAL JOIN type WHERE cType_id = '$cType_id'");

							$row2 = mysqli_fetch_array($sql2);
							//$qty = mysqli_num_rows($sql2);
			?>
        	<tr class="default">
                <td class="border text-center text-middle btnRemoveC" style="vertical-align: middle;"><span id="<?php echo $row['cCart_id'] ?>" class="glyphicon glyphicon-remove cRed hover btnRemoveC"></span></td>
                <td class="border"><?php echo $row['cType'] ." (". $row2['type'] .") (". $row['duration'] . $row['unit'] ."s/". $row['cCost'] ."Php)" ?></td>
                <td class="text-center border" style="vertical-align: middle;"><?php echo $row2['nQty'] ." mins" ?></td>
                <td class="text-right border" style="vertical-align: middle;"><?php echo "Php ".$row2['nTotal'] ?></td>
                <td class="text-right border" style="vertical-align: middle;"><?php echo "Php ".$row2['nTotal'] ?></td>
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

							if(mysqli_num_rows($sql3) > 0 AND $row3['qty2'] != ""){
								$haveDel = "(Php ".($row['wCost']+5) ."/". $row3['qty2'] .")";
								$p2 = "Php ". ($row['wCost']+5);
								
								$t2 = "Php ". $row3['qty2'] * ($row['wCost'] + 5);
							}else{
								$haveDel = "";
								$p2 = "";
								$t2 = "";
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
                <td class="border text-center text-middle btnRemoveW"><span id="<?php echo $row['wCart_id'] ?>" class="glyphicon glyphicon-remove cRed hover btnRemoveW"></span></td>
                <td class="border">
                	<?php echo $row['wType'] .$noDel . $haveDel ?>
                		
               	</td>
                <td class="text-center border"><?php echo "<div>".$row2['qty']."</div><div>".$row3['qty2']."</div>" ?></td>
                <td class="text-right border"><?php echo "<div>$costNo</div><div>". $p2 ."</div>" ?></td>
                <td class="text-right border"><?php echo "<div>$costNo2</div><div>". $t2 ."</div>" ?></td>
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
                <td class="border text-center text-middle btnRemoveL"><span id="<?php echo $row['lCart_id'] ?>" class="glyphicon glyphicon-remove cRed hover btnRemoveL"></span></td>
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
                <td class="border text-center text-middle btnRemoveD"><span id="<?php echo $row['del_id'] ?>" class="glyphicon glyphicon-remove cRed hover btnRemoveD"></span></td>
                <td class="border">Delivery (<?php echo $row['area'] ?>) - Laundry</td>
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
                <td class="border text-center text-middle btnRemoveD"><span id="<?php echo $row['del_id'] ?>" class="glyphicon glyphicon-remove cRed hover btnRemoveD"></span></td>
                <td class="border">Delivery (<?php echo $row['area'] ?>) - Refill</td>
                <td class="text-center border"><?php echo $row2['qty'] ?></td>
                <td class="text-right border"><?php echo "Php ".$row['areaC'] ?></td>
                <td class="text-right border"><?php echo "Php ".$row['areaC'] ?></td>
            </tr>
			
			<?php		
					}
			?>	



        </tbody>
    </table>
	
<div id="removeCart"></div>

<script type="text/javascript">
	$(".btnRemoveC").click(function(){
		$("#removeCart").load("removeCart.php?idC="+this.id);
			$("#rLoad").load("salestotal.php");
	});
	$(".btnRemoveW").click(function(){
		$("#removeCart").load("removeCart.php?idW="+this.id);
			$("#rLoad").load("salestotal.php");
	});
	$(".btnRemoveL").click(function(){
		$("#removeCart").load("removeCart.php?idL="+this.id);
			$("#rLoad").load("salestotal.php");
	});
	$(".btnRemoveD").click(function(){
		$("#removeCart").load("removeCart.php?idD="+this.id);
			$("#rLoad").load("salestotal.php");
	});
</script>	