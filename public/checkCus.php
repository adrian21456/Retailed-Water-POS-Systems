<?php require_once("../includes/db_connection.php"); ?>
<?php include("madd.php"); ?>
<?php include("../includes/layouts/functions.php"); ?>
<?php include('session.php'); ?>

<?php

	$sql = mysqli_query($connection, "SELECT * FROM laundry_cart");
					$row = mysqli_num_rows($sql);
if(mysqli_num_rows($sql) > 0){
?>
<script type="text/javascript">
	$("#checkMe").val("1");
</script>
<?php
}
?>