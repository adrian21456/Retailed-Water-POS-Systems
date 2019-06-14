<?php require_once("../includes/db_connection.php"); ?>
<?php include("madd.php"); ?>
<?php include('session.php'); ?>

<script src="js/jquery-2.1.3.min.js"></script>

<div>
	<form method="post" action="addLaundry.php">
		<div class="row">
			<div class="col-md-6">
				<div class="col-md-12 mtop-10">
					<div class="input-group">
						<span class="input-group-addon">Type</span>
						<input id="costC" type="text" name="type" class="input-form text-center" required>
					</div>
				</div>
				<div class="col-md-6 mtop-10">
					<div class="input-group">
						<span class="input-group-addon">Cost</span>
						<input id="costC" type="number" name="price" class="input-form text-center" required>
						<span class="input-group-addon">Per Kilo</span>
					</div>
				</div>

				<div class="col-md-6 mtop-10">
					<div class="row mtop-10">
						Set as:  

						<input type="radio" name="status" value="active" checked> Active 
						<input type="radio" name="status" value="removed"> Removed
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
						<td class="border">Status</td>
						<td class="border"></td>
					</tr>
<?php
	$sql = mysqli_query($connection, "SELECT * FROM laundry_type");
		while($row = mysqli_fetch_assoc($sql)){
?>
					<tr class="text-center">
						<td class="border"><?php echo $row['lType'] ?></td>
						<td class="border">Php <?php echo $row['lCost'] ."/". $row['lunit'] ?></td>			
						<td class="border"><?php echo $row['status'] ?></td>			
						<td class="border"><a href="main_laundry.php?id=<?php echo $row['lType_id'] ?>">Edit</a></td>
						<!--
						<td class="border"><a href="delete_laundry.php?id=<?php echo $row['lType_id'] ?>" style="color: red">DELETE!!!</a></td>
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
