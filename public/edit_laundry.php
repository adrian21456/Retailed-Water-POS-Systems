<?php require_once("../includes/db_connection.php"); ?>
<?php include("madd.php"); ?>
<?php include('session.php'); ?>

<script src="js/jquery-2.1.3.min.js"></script>

<?php
$checked1 = "";
$checked2 = "";
$id = $_GET['id'];

	$sql = mysqli_query($connection, "SELECT * FROM laundry_type WHERE lType_id = '$id'");
		$row = mysqli_fetch_assoc($sql);

		if($row['status'] == "active"){
			$checked1 = "checked";
		}else{
			$checked2 = "checked";
		}
?>

<div>
	<form method="post" action="updateLaundry.php">
		<div class="row">
			<div class="col-md-6">
				<div class="col-md-12 mtop-10">
					<div class="input-group">
						<span class="input-group-addon">Type</span>
						<input id="costC" type="text" name="type" class="input-form text-center" value="<?php echo $row['lType'] ?>" required>
						<input type="hidden" name="id" class="input-form text-center" value="<?php echo $row['lType_id'] ?>" >
					</div>
				</div>
				<div class="col-md-6 mtop-10">
					<div class="input-group">
						<span class="input-group-addon">Price</span>
						<input id="costC" type="number" name="price" class="input-form text-center" value="<?php echo $row['lCost'] ?>" required>
						<span class="input-group-addon">Per Kilo</span>
					</div>
				</div>

				<div class="col-md-6 mtop-10">
					<div class="row mtop-10">
						Set as:  

						<input type="radio" name="status" value="active" <?php echo $checked1 ?>> Active 
						<input type="radio" name="status" value="removed" <?php echo $checked2 ?>> Removed
					</div>
				</div>


				<div class="col-md-12 text-right">
					<hr>
					<a href="main_refill.php"><span class="btn btn-danger">Cancel</span></a>
					<input type="submit" value="UPDATE" class="btn btn-success">
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
	$sql = mysqli_query($connection, "SELECT * FROM laundry_type");
		while($row = mysqli_fetch_assoc($sql)){
?>
					<tr class="text-center">
						<td class="border"><?php echo $row['lType'] ?></td>
						<td class="border">Php <?php echo $row['lCost'] ."/". $row['lunit'] ?></td>						
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
