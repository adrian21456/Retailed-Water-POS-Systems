<table class="table table-striped border">
<?php
require_once("../includes/db_connection.php");
$m = 1;
$year = $_GET['year'];

$sql = mysqli_query($connection, "SELECT year_pay FROM pay WHERE year_pay = '$year' GROUP BY year_pay");
	while($row = mysqli_fetch_assoc($sql)){

		while($m < 13){

			if($m < 10){
				$ym = $year."-0".$m;
			}else{
				$ym = $year."-".$m;
			}

	$sql2 =mysqli_query($connection, "SELECT *, SUM(cTotal) As total FROM car_sales WHERE date_s LIKE '%$ym%' GROUP BY year");
		$row2 = mysqli_fetch_assoc($sql2);

	$sql3 =mysqli_query($connection, "SELECT *, SUM(lTotal) As total FROM laundry_sales WHERE date_s LIKE '%$ym%' GROUP BY year");
		$row3 = mysqli_fetch_assoc($sql3);

	$sql4 =mysqli_query($connection, "SELECT *, SUM(wTotal) As total FROM water_sales WHERE date_s LIKE '%$ym%' GROUP BY year");
		$row4 = mysqli_fetch_assoc($sql4);

	$sql5 =mysqli_query($connection, "SELECT *, SUM(areaC) As total FROM laundry_sales NATURAL JOIN delivery_sales WHERE date_s LIKE '%$ym%' GROUP BY year");
		$row5 = mysqli_fetch_assoc($sql5);

	$sql6 =mysqli_query($connection, "SELECT *, SUM(areaC) As total FROM water_sales NATURAL JOIN delivery_sales WHERE date_s LIKE '%$ym%' GROUP BY year");
		$row6 = mysqli_fetch_assoc($sql6);
?>
	<tr>
		<td class="border text-center text-middle"><?php echo "Php ". $total = $row2['total']+$row3['total']+$row4['total']+$row5['total']+$row6['total']; ?></td>
		<td class="border text-center text-middle"><?php echo date("F", strtotime($ym)); ?></td>
		<td class="border text-center text-middle hover monthly" id="<?php echo $ym; ?>"><span>view</span> <span class="glyphicon glyphicon-search"></span></td>
	</tr>
<?php
		$m++;

		}
	}

?>
</table>

<script type="text/javascript">
	$(".monthly").click(function(){
		$("#v_day").load("daily.php?ym="+this.id);
	});
</script>