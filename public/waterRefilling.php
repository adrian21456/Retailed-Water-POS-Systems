<?php require_once("../includes/db_connection.php"); ?>
<?php include("madd.php"); ?>
<?php include('session.php'); ?>

<script src="js/jquery-2.1.3.min.js"></script>

<div>
	<form method="post" id="frmWater">
		<div class="input-group mtop-10">
			<span class="input-group-addon">Type</span>
			<select name="type2" id="waterType" class="input-form" required>
			<?php

				$sql = mysqli_query($connection, "SELECT * FROM water_type");
					while($row = mysqli_fetch_array($sql)){
			?>
				<option value="<?php echo $row['wType_id'] ?>"><?php echo $row['wType'] ?></option>
			<?php
					}
			

				$sql = mysqli_query($connection, "SELECT * FROM water_type");
					$row = mysqli_fetch_array($sql);
			?>
			</select>
		</div>
		<div class="input-group mtop-10">
			<span class="input-group-addon">Quanity</span>
			<input type="text" name="qty" id="wQty" class="input-form" required ">
		</div>

		<!--
		<div class="input-group mtop-10">
			<span class="input-group-addon">Owner</span>
			<input type="text" name="type" class="input-form" required>
		</div>
		-->
		<div id="waterCost"></div>
		<div class="row">
			<div class="col-md-8">
				<div class="input-group mtop-10">
					<span class="input-group-addon">Cost</span>
					<input id="costW" type="text" name="total" class="input-form" value="<?php echo $row['wCost'] ?>" required readonly>
					<span class="input-group-addon">Php</span>
				</div>
			</div>

			<div class="col-md-4" id="add" style="display: none">
				<div class="input-group mtop-10">
					<input id="costW" type="text" name="" class="input-form text-center" value="+5" required readonly>
					<span class="input-group-addon">Php</span>
				</div>
			</div>
		</div>

<!--
		<div class="mtop-10">
			Delivery:  
			<input type="radio" name="dev" id="yes" value="yes"> Yes |
			<input type="radio" name="dev" id="no" value="no" checked> No
		</div>
		<hr>

		<div class="input-group mtop-10">
			<span class="input-group-addon">Total</span>
			<input id="nTotal" type="text" name="total" class="input-form" required readonly>
			<span class="input-group-addon">Php</span>
		</div>
-->

		<div class="mtop-10">
			Delivery:  
			<input type="radio" name="dev" id="yes" value="yes"> Yes |
			<input type="radio" name="dev" id="no" value="no" checked> No
			<br><br>

			<div class="row">
				<div class="col-md-4">
					<select name="area" id="area" class="lUnit input-form" disabled>
						<option>Mansilingan</option>
						<option>Vista Alegre</option>
					</select>
				</div>
				<div class="col-md-1">
					<div class="mtop-10">Or</div>
				</div>
				<div class="col-md-7">
					<div class="input-group">
						<span class="input-group-addon">Location</span>
						<input type="text" id="loc" name="loc" class="lUnit input-form text-center" readonly>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="input-group mtop-10">
						<input type="text" id="delT" name="areaC" class="lUnit input-form text-center" required readonly>
						<span class="input-group-addon" style="font-size: .8em">Php</span>
					</div>
				</div>
				<div class="col-md-1">
					<div class="mtop-10"></div>
				</div>
				<div class="col-md-7">
					<div class="input-group mtop-10">
						<input type="text" id="delT2" name="locC" class="lUnit input-form text-center" required readonly>
						<span class="input-group-addon" style="font-size: .8em">Php</span>
					</div>
				</div>
			</div>
					
		</div>
		<hr>

		<div class="text-right mbot-10">
			<input type="submit" id="addW" value="ADD" class="btn btn-primary">
		</div>
	</form>
</div>

<script type="text/javascript">
	$("#waterType").on("change", function(){
		$("#waterCost").load("waterCost.php?id="+this.value);
	});
</script>


<script type="text/javascript">

$("#addW").click(function() {
	
	$.ajax({
		type: 'POST',
		url: 'add_to_water.php',
		data: $('#frmWater').serialize(),
		error: function(xhr, textStatus, errorThrown) {
		//	$("#time_table").load("table-time.php");
        },
		success:function(response){
			//$("#temp_table").load("plan-detail-table.php");

			alert("Success");
			$("#rLoad").load("salestotal.php");
		}
    });
	
	var form=document.getElementById('frmWater').reset();
	return false;
	
   });


$("#wQty").on("keyup", function(){

var dev = $("input[name='dev']:checked"). val();
var wQty = $("#wQty").val();
var wCost = $("#wCost").val();
// alert(totalKg);
	if(parseFloat(wQty) < 5){
		if(dev == "yes"){
			$("#delT").val("+"+wQty*5);

		}else{
			$("#delT").val("");
		}
	}else{
		$("#delT").val("");
	}
		if(dev == "yes"){
			$("#delT2").val("+"+wQty*5);
		}else{
			$("#delT2").val("");			
		}
});


/*$("#yes").click(function(){
	var wQty = $("#wQty").val();
	var wCost = $("#costW").val();
	var nwQty = wQty * wCost;

	if(wQty > 4){
		nwQty = parseFloat(wQty * 5) + parseFloat(wQty * wCost);
		//	$("#costW").val(parseFloat(wCost) + parseInt(5));
		$("#add").show();
	}else{
		$("#add").hide();
	}
	
	$("#nTotal").val(nwQty);
});*/

$("#no").click(function(){
	$("#area").prop("disabled", true);
	$("#loc").prop("readonly", true);

	$("#delT").val("");
		$("#delT2").val("");
		$("#loc").val("");
});

$("#yes").click(function(){
	$("#area").prop("disabled", false);
	$("#delT").prop("disabled", false);	
	$("#delT2").prop("disabled", false);	
	$("#loc").prop("disabled", false);	
	$("#loc").prop("readonly", false);	
	$("#delT2").prop("readonly", false);	


var dev = $("input[name='dev']:checked"). val();
var wQty = $("#wQty").val();
var wCost = $("#wCost").val();
// alert(totalKg);
	if(parseFloat(wQty) < 5){
		if(dev == "yes"){
			$("#delT").val("+"+wQty*5);
		}else{
			$("#delT").val("");
		}
	}else{
		$("#delT").val("");
	}

});

$("#loc").on("keyup",function(){
var wQty = $("#wQty").val();

	if($("#loc").val() != ""){
		$("#delT2").val("+"+wQty*5);
	}else{
		$("#delT2").val("");
	}
});
</script>