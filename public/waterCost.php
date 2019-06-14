<?php 
require_once("../includes/db_connection.php");

$id = $_GET['id'];

	$sql = mysqli_query($connection, "SELECT * FROM water_type WHERE wType_id = '$id'");
		$row = mysqli_fetch_array($sql);
?>
<script type="text/javascript">
		$("#costW").val("<?php echo $row['wCost'] ?>");
</script>