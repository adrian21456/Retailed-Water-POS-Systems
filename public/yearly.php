
<table class="table table-striped border">
<?php
require_once("../includes/db_connection.php");

$sql = mysqli_query($connection, "SELECT year_pay FROM pay GROUP BY year_pay ORDER BY year_pay desc");
	while($row = mysqli_fetch_assoc($sql)){

	$year = $row['year_pay'];

	$sql2 =mysqli_query($connection, "SELECT *, SUM(cTotal) As total FROM car_sales WHERE year = '$year' GROUP BY year");
		$row2 = mysqli_fetch_assoc($sql2);

	$sql3 =mysqli_query($connection, "SELECT *, SUM(lTotal) As total FROM laundry_sales WHERE year = '$year' GROUP BY year");
		$row3 = mysqli_fetch_assoc($sql3);

	$sql4 =mysqli_query($connection, "SELECT *, SUM(wTotal) As total FROM water_sales WHERE year = '$year' GROUP BY year");
		$row4 = mysqli_fetch_assoc($sql4);

	$sql5 =mysqli_query($connection, "SELECT *, SUM(areaC) As total FROM laundry_sales NATURAL JOIN delivery_sales WHERE year = '$year' GROUP BY year");
		$row5 = mysqli_fetch_assoc($sql5);

	$sql6 =mysqli_query($connection, "SELECT *, SUM(areaC) As total FROM water_sales NATURAL JOIN delivery_sales WHERE year = '$year' GROUP BY year");
		$row6 = mysqli_fetch_assoc($sql6);
?>
	<tr>
		<td class="border text-center text-middle"><?php echo "Php ". $total = $row2['total']+$row3['total']+$row4['total']+$row5['total']+$row6['total']; ?></td>
		<td class="border text-center text-middle"><?php echo $year; ?></td>
		<td class="border text-center text-middle hover yearly" id="<?php echo $year; ?>"><span>view</span> <span class="glyphicon glyphicon-search"></span></td>
	</tr>
<?php
	}

?>
</table>


<script type="text/javascript">
	$(".yearly").click(function(){
		$("#v_month").load("monthly.php?year="+this.id);
	});
</script>