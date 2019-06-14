<?php require_once("../includes/db_connection.php"); ?>


<?php

	$sql = mysqli_query($connection, "SELECT * FROM laundry_cart");
//echo mysqli_num_rows($sql);
		if(mysqli_num_rows($sql)>0){
?>
<script type="text/javascript">
	$("#cusSide").css("display", "block");
</script>
<?php
		}else{
?>

<script type="text/javascript">
	$("#cusSide").css("display", "none");
</script>

<?php
		}
?>