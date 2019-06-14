<?php require_once("../includes/db_connection.php"); ?>
<?php include("madd.php"); ?>

<?php $id = $_GET['id']; ?>

<?php
	$sql = mysqli_query($connection, "SELECT * FROM laun_type WHERE id = '$id'");
		$row = mysqli_fetch_array($sql);
?>

<script type="text/javascript">
	$("#lt_p").val("<?php echo $row['cost_tl'] ?>");

</script>