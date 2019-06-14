<?php require_once("../includes/db_connection.php"); ?>
<?php include("madd.php"); ?>
<?php include('session.php'); ?>

<script src="js/jquery-2.1.3.min.js"></script>

<div>
	<form method="post" action="addRefill.php">
		<div class="row">
			<div class="col-md-6">
				<div class="col-md-12 mtop-10">
					<div class="input-group">
						<span class="input-group-addon">Type of Container</span>
						<input id="costC" type="text" name="type" class="input-form text-center" required>
					</div>
				</div>
				<div class="col-md-10 mtop-10">
					<div class="input-group">
						<span class="input-group-addon">Price</span>
						<input id="costC" type="number" name="price" class="input-form text-center" required>
						<span class="input-group-addon">Php</span>
					</div>
				</div>

				<div class="col-md-12 text-right">
					<hr>
					<input type="submit" id="addCar" value="ADD" class="btn btn-primary">
				</div>
			</div>
			<div class="col-md-6">
				<table class="table table-striped">
					<tr class="text-center">
						<td class="border">Type</td>
						<td class="border">Price</td>
						<td class="border"></td>
					</tr>
<?php
	$sql = mysqli_query($connection, "SELECT * FROM water_type");
		while($row = mysqli_fetch_assoc($sql)){
?>
					<tr class="text-center">
						<td class="border"><?php echo $row['wType'] ?></td>
						<td class="border">Php <?php echo $row['wCost'] ?></td>						
						<td class="border"><a href="main_refill.php?id=<?php echo $row['wType_id'] ?>">Edit</a></td>
						<!--
						<td class="border"><a href="delete_refill.php?id=<?php echo $row['wType_id'] ?>" style="color: red">DELETE!!!</a></td>
						-->
					</tr>
			
<?php
		}
?>
				</table>
			</div>
		</div>

		<div class="text-right mbot-10">
		</div>
	</form>
</div>
