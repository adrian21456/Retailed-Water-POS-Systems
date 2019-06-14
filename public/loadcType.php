<?php require_once("../includes/db_connection.php"); ?>
<?php include("madd.php"); ?>

<?php $id = $_GET['id']; ?>

						<span class="input-group-addon">Service</span>
						<select name="type" id="carType" class="input-form" required>
						<?php

							$sql = mysqli_query($connection, "SELECT * FROM car_type WHERE type_id = '$id'");
								while($row = mysqli_fetch_array($sql)){
						?>
							<option value="<?php echo $row['cType_id'] ?>"><?php echo $row['cType'] ?></option>
						<?php
								}
						?>
						</select>

<script type="text/javascript">
	$("#carType").on("change", function(){

	var amount2 = $("#amountC").val();
	var base_time2 = $("#duC").val();

	if(amount2 == ""){
		amount2 = 0;
	}

		$("#carCost").load("carCost.php?id="+this.value+"&amount="+amount2+"&time="+base_time2+"&type_id=1");
	});

</script>