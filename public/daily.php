<table class="table table-striped border">
<?php
require_once("../includes/db_connection.php");

//$year = 2019;
$ym = $_GET['ym'];


$sql = mysqli_query($connection, "SELECT * FROM pay WHERE date_pay LIKE '%$ym%' GROUP BY date_pay");

if(mysqli_num_rows($sql) > 0){
	while($row = mysqli_fetch_assoc($sql)){

		$date = $row['date_pay'];

	$sql2 =mysqli_query($connection, "SELECT *, SUM(cTotal) As total FROM car_sales WHERE date_s = '$date' GROUP BY date_s");
		$row2 = mysqli_fetch_assoc($sql2);

	$sql3 =mysqli_query($connection, "SELECT *, SUM(lTotal) As total FROM laundry_sales WHERE date_s = '$date' GROUP BY date_s");
		$row3 = mysqli_fetch_assoc($sql3);

	$sql4 =mysqli_query($connection, "SELECT *, SUM(wTotal) As total FROM water_sales WHERE date_s = '$date' GROUP BY date_s");
		$row4 = mysqli_fetch_assoc($sql4);

	$sql5 =mysqli_query($connection, "SELECT *, SUM(areaC) As total FROM laundry_sales NATURAL JOIN delivery_sales WHERE date_s = '$date' GROUP BY date_s");
		$row5 = mysqli_fetch_assoc($sql5);

	$sql6 =mysqli_query($connection, "SELECT *, SUM(areaC) As total FROM water_sales NATURAL JOIN delivery_sales WHERE date_s = '$date' GROUP BY date_s");
		$row6 = mysqli_fetch_assoc($sql6);
?>
	<tr>
		<td class="border text-center text-middle"><?php echo "Php ". $total = $row2['total']+$row3['total']+$row4['total']+$row5['total']+$row6['total']; ?></td>
		<td class="border text-center text-middle"><?php echo date("M d, Y", strtotime($date)); ?></td>
		<td class="border text-center text-middle hover daily" id="<?php echo $date; ?>"><span>view</span> <span class="glyphicon glyphicon-search"></span></td>
	</tr>
<?php

		
	}
}else{
?>
	<tr>
		<td class="border text-center text-middle"><?php echo "Php 0"; ?></td>
	</tr>
<?php
}

?>
</table>


<div class="modal" id="vDay">
	<div class="modal-content" style="width: 80%; padding: 5%; margin: 5% auto">
		
	<div class="text-right"><span class="glyphicon glyphicon-remove hover closetab" style="color: red; font-size: 2em; margin-top: -20px"></span></div>

			<ul class="nav nav-tabs mtop-10" >
			  <li id="car" role="presentation" class="active"><a class="hover">Car Wash</a></li>
			  <li id="laundry" role="presentation"><a class="hover">Laundry</a></li>
			  <li id="water" role="presentation"><a class="hover">Water Refilling</a></li>
			  <li id="delivery" role="presentation"><a class="hover">Delivery</a></li>
			</ul>

		<hr>
	
		<div class="row">
			<div class="col-md-12" id="report_body">
				<?php include_once("car_sales.php"); ?>
			</div>
		</div>
		<hr>
	<input type="hidden" id="date_base">
	</div>
</div>


<script type="text/javascript">
	$(".daily").click(function(){
		$("#vDay").show();
		$("#date_base").val(this.id);
		$("#report_body").load("car_sales.php?ym="+this.id);
	});
</script>


<script>
$("#car").click(function(){

	$("#car").addClass("active");
	$("#water").removeClass("active");
	$("#laundry").removeClass("active");
	$("#delivery").removeClass("active");

	var ym = $("#date_base").val();
	$("#report_body").load("car_sales.php?ym="+ym);
});
$("#water").click(function(){
	//$("#formPart").load("waterRefilling.php");

	$("#water").addClass("active");
	$("#car").removeClass("active");
	$("#laundry").removeClass("active");
	$("#delivery").removeClass("active");

	var ym = $("#date_base").val();
	$("#report_body").load("refill_sales.php?ym="+ym);
});
$("#laundry").click(function(){
	//$("#formPart").load("laundry.php");

	$("#laundry").addClass("active");
	$("#water").removeClass("active");
	$("#car").removeClass("active");
	$("#delivery").removeClass("active");

	var ym = $("#date_base").val();
	$("#report_body").load("laundry_sales.php?ym="+ym);
});

$("#delivery").click(function(){
	//$("#formPart").load("laundry.php");

	$("#delivery").addClass("active");
	$("#water").removeClass("active");
	$("#car").removeClass("active");
	$("#laundry").removeClass("active");

	var ym = $("#date_base").val();
	$("#report_body").load("delivery.php?ym="+ym);
});

$(".closetab").click(function(){
	$("#vDay").hide();
});

</script>