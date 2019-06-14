<?php require_once("../includes/db_connection.php"); ?>

       <table class="table table-hover" id='salestableid'>
        <tbody>
			<?php

			$cost1 = 0;
				$sql = mysqli_query($connection, "SELECT * FROM car_cart NATURAL JOIN car_type GROUP BY cType_id");
					while($row = mysqli_fetch_array($sql)){

					$cType_id = $row['cType_id'];

						$sql2 = mysqli_query($connection, "SELECT *, SUM(cQty) As nQty, SUM(cTotal) As nTotal FROM car_cart NATURAL JOIN car_type WHERE cType_id = '$cType_id'");

							$row2 = mysqli_fetch_array($sql2);

							$cost1 += $row2['nTotal'];
		
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
                <td class="border text-right" colspan="">Total</td>
                <td width="75" class="text-right border" width ="89">Php <div id="allT" style="float: right"><?php echo $cost1+$cost2+$cost3+$cost4 ?></div></td>
                <td width="90" class="border text-right" style="width: .2%!important"></td>
            </tr>
        	


        </tbody>
    </table>
