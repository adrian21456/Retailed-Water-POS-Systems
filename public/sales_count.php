<?php require_once("../includes/db_connection.php"); ?>
<?php
$disc = null;
?>
					   <?php	
	                   $count_client= mysqli_query($connection, "SELECT * FROM saleslog");
	                   $count =  mysqli_num_rows($count_client);
                       ?>
					   
					   <?php	
	                   $totalsales= mysqli_query($connection, "SELECT SUM(total) AS totalpritems FROM saleslog");
						while($totalperitems = mysqli_fetch_array($totalsales)){
						$total_sales = $totalperitems['totalpritems'];
						
						}
						
						$slquery= mysqli_query($connection, "SELECT * FROM saleslog");
						while($sldisc = mysqli_fetch_array($slquery)){
						$disc = $sldisc['disc'];
						$type = trim($sldisc['disctype']);
						
						
						}
									// This serve not to have error in $type variable.		
									if ($disc==0){
							             $type='';
										 
									}
									// This serve not to have error in $type variable.	
						//$type='amount';
									//(Discount % / 100) x Marked Price
									//		echo $stdisc . " " . $stsubtotal;
									
                             //
                                        $discounted_amount = ($disc / 100) * $total_sales;
										$stsubtotal = $total_sales - $discounted_amount;
									
									

						
											if ($type=='amount'){
													
													$discounted_amount = $disc;
													$stsubtotal = $total_sales - $disc;
													$disc =0;
											  }
									
								    	

	                                  
                                      

                       ?>
					   
				   
	<table class='table' style="border-style: dotted" id="sales_countid">
      <tr class='' style="border-style: dotted">
        <td width="50" >Total Items: </td>
		<td width="50"align="right"><?php echo $count; ?></td>
		<td width="50" >Total: </td>
        <td width="50"align="right" >P <?php echo number_format($total_sales,2); ?></td>
      </tr>
      <tr class='' style="border-style: dotted">
        <td width="50">Discount: </td>
        <td width="50"align="right"><?php echo $disc . "%"; ?> </td>
		<td width="50">Disc. Amt: </td>
		<td width="50"align="right">P <?php echo number_format($discounted_amount,2); ?></td>
      </tr>
      <tr style="border-style: dotted">
        <td width="50"><h5>Total Payable: </h5></td>
        <td ></td>
		<td></td>
		<td width="50"align="right"><h4><strong>P <?php echo number_format($stsubtotal,2); ?></h4></strong></td>
      </tr>
	</table>
