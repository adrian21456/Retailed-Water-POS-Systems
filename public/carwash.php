<?php require_once("../includes/db_connection.php"); ?>
<?php include("madd.php"); ?>
<?php include('session.php'); ?>

<script src="js/jquery-2.1.3.min.js"></script>

<div>
	<form method="post" id="frmCar">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-5 mtop-10">
					<div class="input-group">
						<span class="input-group-addon">Type</span>
						<select name="type" id="type" class="input-form" required>
						<?php

							$sql = mysqli_query($connection, "SELECT * FROM type");
								while($row = mysqli_fetch_array($sql)){
						?>
							<option value="<?php echo $row['type_id'] ?>"><?php echo $row['type'] ?></option>
						<?php
								}
						

							$sql = mysqli_query($connection, "SELECT * FROM car_type");
								$row = mysqli_fetch_array($sql);
						?>
						</select>
					</div>

				</div>
				<div class="col-md-7 mtop-10">
					<div class="input-group" id="loadcType">
						<span class="input-group-addon">Service</span>
						<select name="type" id="carType" class="input-form" required>
						<?php

							$sql = mysqli_query($connection, "SELECT * FROM car_type WHERE type_id = 1");
								while($row = mysqli_fetch_array($sql)){
						?>
							<option value="<?php echo $row['cType_id'] ?>"><?php echo $row['cType'] ?></option>
						<?php
								}
						

							$sql = mysqli_query($connection, "SELECT * FROM car_type");
								$row = mysqli_fetch_array($sql);
						?>
						</select>
					</div>

				</div>
				<div class="col-md-12">
					<hr>
				</div>
				<div class="col-md-3"></div>
				<div class="col-md-4 mtop-10">
					<div class="input-group">
						<input id="costC" type="text" name="" class="input-form text-center" value="<?php echo $row['cCost'] ?>" readonly>
						<span class="input-group-addon">Php</span>
					</div>
				</div>
				<div class="col-md-1 mtop-10">
					<div class="mtop-10">Per</div>
				</div>
				<div class="col-md-4 mtop-10">
					<div class="input-group">
						<input type="text" name="" id="duC" class="input-form text-center" readonly  value="<?php echo $row['duration'] ?>">
						<span class="input-group-addon" id="unC"><?php echo $row['unit'] ?></span>
					</div>
				</div>
			</div>
		</div>

		<hr>

<!--
		<div class="row">
			<div class="col-md-7">
				<div class="input-group">
					<input type="number" name="qty" id="usedT" class="input-form text-center" placeholder="Time Used">
					<span class="input-group-addon" id="">Min</span>
				</div>
			</div>
			<div class="col-md-5">
				<div class="input-group">
					<span class="input-group-addon" id="unC">Total</span>
					<input type="text" name="total" id="amountC" class="input-form text-center" required >
					<span class="input-group-addon" id="unC">Php</span>
				</div>				
			</div>
		</div>

		<div class="row"><diV style="margin-left: 15px" class="mtop-10 mbot-10">OR: </diV>
-->
		
			<div class="col-md-4">
				<div class="input-group">
					<input type="number" name="amount" id="amountC" class="input-form text-center" placeholder="Amount">
					<span class="input-group-addon" id="">Php</span>
				</div>
			</div>
			<div class="col-md-3">
				<!--
				<div class="input-group">
					<input type="hidden" name="timeC" id="timeC" class="input-form text-center" value="<?php echo $row['duration'] ?>" readonly>
					<input type="text" name="" id="timeC2" class="input-form text-center" value="<?php echo $row['duration'] ?>" readonly>
					<span class="input-group-addon" id="">Min</span>
				</div>
				-->
				<div class="input-group">
					<input type="number" name="qty" id="usedT" class="input-form text-center" placeholder="Time">
					<span class="input-group-addon" id="">Min</span>
				</div>
			</div>
			<div class="col-md-5">
				<div class="input-group">
					<span class="input-group-addon" id="unC">Total</span>
					<input type="text" name="totalAC" id="totalAC" class="input-form text-center" readonly >
					<span class="input-group-addon" id="unC">Php</span>
				</div>				
			</div>
		</div>
	
		<div class="row mtop-10">
			<div class="col-md-12">
				<input type="text" id="error" readonly style="border: none; width: 100%; background-color: transparent; color: red">
			</div>
		</div>

		<div id="carCost"></div>

		<hr>

		<div class="text-right mbot-10">
			<input type="submit" id="addCar" value="ADD" class="btn btn-primary">
		</div>
	</form>
</div>

<script type="text/javascript">
	$("#carType").on("change", function(){

	var amount2 = $("#amountC").val();
	var base_time2 = $("#duC").val();

	if(amount2 == ""){
		amount2 = 0;
	}

		$("#carCost").load("carCost.php?id="+this.value+"&amount="+amount2+"&time="+base_time2);
	});
</script>


<script type="text/javascript">

$("#addCar").click(function() {

	if($("#error").val() === ""){
	
		$.ajax({
			type: 'POST',
			url: 'add_to_car.php',
			data: $('#frmCar').serialize(),
			error: function(xhr, textStatus, errorThrown) {
			//	$("#time_table").load("table-time.php");
	        },
			success:function(response){
				//$("#temp_table").load("plan-detail-table.php");

				//alert("Success");
				$("#rLoad").load("salestotal.php");
			}
	    });
		
		var form=document.getElementById('frmCar').reset();
		return false;
		
	}else{
	//	alert("error");
	}

});


$("#usedT").on("keyup", function(){
	
	var time = this.value;
	var min = $("#duC").val();
	var cost = $("#costC").val();
	var t = (Math.trunc(time/min))*cost;
	var rem = time%min;

	if(rem > 0){
		//$("#totalA").val((parseInt(t)+parseFloat(cost)));
		$("#amountC").val((parseInt(t)+parseFloat(cost)));
		$("#totalAC").val((parseInt(t)+parseFloat(cost)));
		$("#error").val("");
	}else{
		//$("#totalA").val(t);
		$("#amountC").val(t);
		$("#totalAC").val(t);
		$("#error").val("");
	}

});

$("#amountC").on("keyup", function(){
	
	var amount = this.value;
	var base_time = $("#duC").val();

	var quo = (amount/$("#costC").val());
	var rem = amount%$("#costC").val();

	console.log(amount +" "+ $("#costC").val());

	if(amount != ""){

		if(rem > 0 && quo > 1){
			if(parseInt(amount) < parseInt($("#costC").val()) ){
				$("#error").val("Invalid amount, try: " + $("#costC").val());
			}else{
				 $("#error").val("Invalid amount, try: "+ parseInt(quo) * parseFloat($("#costC").val()));
			}
		}else if(quo < 1){
			$("#error").val("Invalid amount, try: " + $("#costC").val());
		}else{
			$("#error").val("");

			$("#totalAC").val(parseInt(quo) * parseFloat(base_time));
			$("#usedT").val(parseInt(quo) * parseFloat(base_time));
			//$("#timeC2").val(parseInt(quo) * parseFloat(base_time));
		}
	}else{
		$("#error").val("");
	}

});

$("#type").on("change", function(){
	
	$("#loadcType").load("loadcType.php?id="+this.value);

	var amount2 = $("#amountC").val();
	var base_time2 = $("#duC").val();

	if(amount2 == ""){
		amount2 = 0;
	}

	$("#amountC").val("");
	$("#usedT").val("");
	$("#totalAC").val("");

		$("#carCost").load("carCost.php?id="+ $("#type").val() +"&amount="+amount2+"&time="+base_time2+"&type_id=1");

});
</script>