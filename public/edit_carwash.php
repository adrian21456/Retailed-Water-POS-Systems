<?php require_once("../includes/db_connection.php"); ?>
<?php include("madd.php"); ?>
<?php include('session.php'); ?>

<script src="js/jquery-2.1.3.min.js"></script>

<?php
$id = $_GET['id'];
	$sql = mysqli_query($connection, "SELECT * FROM car_type WHERE cType_id = '$id'");
		$row = mysqli_fetch_assoc($sql);
?>

<div>
	<form method="post" action="updateCar.php">
		<div class="row">
			<div class="col-md-6">
				<div class="col-md-12 mtop-10">
					<div class="input-group">
						<span class="input-group-addon">Type of Vehicle</span>
						<input id="costC" type="text" name="type" class="input-form text-center" value="<?php echo $row['cType'] ?>" required>
						<input type="hidden" name="id" class="input-form text-center" value="<?php echo $row['cType_id'] ?>" >
					</div>
				</div>
				<div class="col-md-10 mtop-10">
					<div class="input-group">
						<span class="input-group-addon">Price</span>
						<input id="costC" type="number" name="price" class="input-form text-center" value="<?php echo $row['cCost'] ?>" required>
						<span class="input-group-addon">Php</span>
					</div>
				</div>
				<div class="col-md-10 mtop-10">
					<div class="input-group">
						<span class="input-group-addon">Min(s) Per Price</span>
						<input type="text" name="min" id="duC" class="input-form text-center" value="<?php echo $row['duration'] ?>" required>
						<span class="input-group-addon" id="unC">Min(s)</span>
					</div>
				</div>

				<div class="col-md-12 text-right">
					<hr>
					<a href="main_carwash.php"><span class="btn btn-danger">Cancel</span></a>
					<input type="submit" value="UPDATE" class="btn btn-success">
				</div>
			</div>
			<div class="col-md-6">
				<table class="table table-striped">
					<tr class="text-center">
						<td class="border">Type</td>
						<td class="border">Price</td>
						<td class="border">Minutes per Price</td>
						<td class="border"></td>
					</tr>
<?php
	$sql = mysqli_query($connection, "SELECT * FROM car_type");
		while($row = mysqli_fetch_assoc($sql)){
?>
					<tr class="text-center">
						<td class="border"><?php echo $row['cType'] ?></td>
						<td class="border">Php <?php echo $row['cCost'] ?></td>
						<td class="border"><?php echo $row['duration'] ." ". $row['unit'] ?></td>
						<td class="border"><a href="main_carwash.php?id=<?php echo $row['cType_id'] ?>">Edit</a></td>
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
