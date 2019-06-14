<?php 
require_once("../includes/db_connection.php");


$id = $_GET['id'];

if(isset($_GET['amount'])){
 	$amount = $_GET['amount'];
	$time = $_GET['time'];
}else{

$time = 0;
$amount = 0;
}

if(isset($_GET['type_id'])){
	$id = $_GET['type_id'];
	$type_id = $_GET['id'];

	$sql = mysqli_query($connection, "SELECT * FROM car_type WHERE type_id = '$type_id'");
}else{
	$sql = mysqli_query($connection, "SELECT * FROM car_type WHERE cType_id = '$id'");
}
		$row = mysqli_fetch_array($sql);

?>
<script type="text/javascript">
		$("#costC").val("<?php echo $row['cCost'] ?>");
		$("#duC").val("<?php echo $row['duration'] ?>");
		$("#timeC").val("<?php echo $row['duration'] ?>");
		$("#unC").text("<?php echo $row['unit'] ?>");

<?php
	if($amount > 0){
?>
	var amount2 = <?php echo $amount ?>;
	var base_time2 = <?php echo $time ?>;
	var quo2 = (amount2/base_time2);
	var rem2 = amount2%base_time2;

	if(rem2 > 0 && quo2 > 1){
		$("#error").val("Invalid amount, try: "+ parseInt(quo2) * parseFloat(base_time2));
	}else if(quo2 < 1){
		$("#error").val("Invalid amount, try: 5");
	}else{
		$("#error").val("");
//alert(<?php echo $amount ?>);
		$("#totalAC").val(parseInt(quo2) * parseFloat(base_time2));
	}
<?php
}
?>
</script>