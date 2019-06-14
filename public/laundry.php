<?php require_once("../includes/db_connection.php"); ?>
<?php include("madd.php"); ?>
<?php include('session.php'); ?>

<script src="js/jquery-2.1.3.min.js"></script>

<div>

	<div style="display: none; position: absolute; width: 60%!important; z-index: 10" id="modal-help">
		<div class="modal-content" style="padding: 10%!important;">

			<div class="text-right mbot-10 hover" style="margin-top: -15px; color: red" id="close-help">close</div>
			<div class="row mtop-10">

			</div>

			Gram(s) to Kilo(s) / Kilo(s) to Gram(s)

			<div class="row mtop-10">
				<div class="col-md-6">
					<div class="input-group">
						<span class="input-group-addon" style="font-size: .8em">Grams</span>
						<input type="" name="" class="input-form text-center" id="gr">
					</div>
				</div>
				<div class="col-md-6">
					<div class="input-group">
						<span class="input-group-addon" style="font-size: .8em">Kilo</span>
						<input type="" name="" class="input-form text-center" id="kg">
					</div>
				</div>

				<div class="col-md-12"><hr></div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$("#min").on("keyup", function(){
			var min = this.value;

			var hr = parseFloat(min)/60;

			$("#hr").val(hr);
		});

		$("#hr").on("keyup", function(){
			var hr = this.value;

			var min = parseFloat(hr)*60;

			$("#min").val(min);
		});

		$("#gr").on("keyup", function(){
			var gr = this.value;

			var kg = parseFloat(gr)/1000;

			$("#kg").val(kg);
		});

		$("#kg").on("keyup", function(){
			var kg = this.value;

			var gr = parseFloat(kg)*1000;

			$("#gr").val(gr);
		});
	</script>

	<form method="post" id="frmLaundry">
		
		<div class="row mtop-10">
			<div class="col-md-12 text-right">

				<span id="btn-help" style="font-size: .8em" class="btn btn-primary">Help Convert</span>
			</div>
		</div>
		<div class="row mtop-10">
			<div class="col-md-4">
				`Self Service: 
			</div>
			<div class="col-md-4 text-right">

				<input type="checkbox" name="self" id="self"> Php 60/load (min 8Kg)

			</div>



			<div class="col-md-4">
				<div class="input-group">
					<span class="input-group-addon" style="font-size: .8em">Php</span>
					<input type="text" id="self_load" name="self_load" class="input-form text-center" required readonly>
				</div>
			</div>


			<div class="col-md-12">
				<hr>
			</div>
		</div>

		<script type="text/javascript">
			
			$('#sel').hide();


			$("#self").click(function(){
				if(this.checked == true){
					//$("#self_load").attr("disabled", false);
					$('#load_tl2').hide();
				}else{
					//$("#self_load").attr("disabled", true);
					$('#load_tl2').show();
				}
			});

			$("#yes").click(function(){
				if(this.checked == true){
					$('#sel').show();
					$('#mes').hide();
				}else{
					$('#sel').hide();
					$('#mes').show();
				}
			});

			$("#no").click(function(){
				if(this.checked == true){
					$('#sel').hide();
					$('#mes').show();
				}else{
					$('#sel').show();
					$('#mes').hide();
				}
			});

			$("#btn-help").click(function(){
				$("#modal-help").show();
			});

			$("#close-help").click(function(){
				$("#modal-help").hide();
			});
		</script>

		<div class="mtop-10">	
			<?php

			$sql = mysqli_query($connection, "SELECT * FROM laundry_type WHERE status = 'active'");
			while($row = mysqli_fetch_array($sql)){
				?>
				<div class="row mtop-10">
					<div class="col-md-4">
						<input type="checkbox" id="id<?php echo $row['lType_id'] ?>" value="<?php echo $row['lType_id'] ?>" name="id<?php echo $row['lType_id'] ?>"> <?php echo $row['lType'] ?>
					</div>
					<div class="col-md-4">
						<?php echo $row['lCost']."/Kg" ?>
					</div>
					<div class="col-md-4">
						<div class="input-group">
							<input type="text" id="type<?php echo $row['lType_id'] ?>" name="kilo<?php echo $row['lType_id'] ?>" class="kg lUnit input-form text-center" required disabled>
							<span class="input-group-addon" style="font-size: .8em">Kg</span>
						</div>
					</div>
				</div>

				<script type="text/javascript">
					$("#id<?php echo $row['lType_id'] ?>").click(function(){
						if(this.checked == true){
							$("#type<?php echo $row['lType_id'] ?>").attr("disabled", false);
						}else{
							$("#type<?php echo $row['lType_id'] ?>").attr("disabled", true);
							$("#type<?php echo $row['lType_id'] ?>").val("");
						}

					});
				</script>
				<?php
			}
			?>
		</div>
		
		<div id="load_tl2">
			<div class="row mtop-10">
				<div class="col-md-8">
					<div class="input-group">
						<span class="input-group-addon">Type</span>
						<select name="type" id="type" class="lUnit input-form">
							<?php

							$sql = mysqli_query($connection, "SELECT * FROM laun_type");
							while($row = mysqli_fetch_array($sql)){
								?>
								<option value="<?php echo $row['id'] ?>"><?php echo $row['type_l'] ?></option>
								<?php
							}

							$sql = mysqli_query($connection, "SELECT * FROM laun_type");
							$row = mysqli_fetch_array($sql);
							?>
						</select>
					</div>
				</div>
				<div class="col-md-4">

					<div id="load_tl"></div>

					<div class="input-group">
						<span class="input-group-addon" style="font-size: .8em">Php</span>
						<input type="text" name="lt_p" id="lt_p" value="<?php echo $row['cost_tl'] ?>" class="input-form text-center" readonly>
						<span class="input-group-addon" style="font-size: .8em">per Kg</span>
					</div>
				</div>
			</div>
			<div class="mtop-10">
				<div class="row">
					<div class="col-sm-5">
						Delivery:  
						<input type="radio" name="dev" id="yes" value="yes"> Yes |
						<input type="radio" name="dev" id="no" value="no" checked> No
						<br><br>
					</div>
					<div class="col-sm-5 col-sm-offset-2" id="mes">
						<div class="input-group">
							<span class="input-group-addon" style="font-size: .8em">Php</span>
							<input type="text" name="lt_p" id="lt_p" value="<?php echo $row['cost_tl'] ?>" class="input-form text-center" readonly>
							<span class="input-group-addon" style="font-size: .8em">per Kg</span>
						</div>
					</div>
				</div>


				<div id="sel">
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
			</div>
		</div>

		<hr>


		<div class="text-right mbot-10">
			<input type="submit" id="addL" value="ADD" class="btn btn-primary">
		</div>
	</form>
</div>

<script type="text/javascript">

	var total = 0;

	$("#addL").click(function() {

		$.ajax({
			type: 'POST',
			url: 'add_to_laundry.php',
			data: $('#frmLaundry').serialize() ,
			error: function(xhr, textStatus, errorThrown) {
		//	$("#time_table").load("table-time.php");
	},
	success:function(response){
			//$("#temp_table").load("plan-detail-table.php");
			alert("Success");
			$("#rLoad").load("salestotal.php");
		}
	});

		var form=document.getElementById('frmLaundry').reset();
		$(".lUnit").attr("disabled", true);
		return false;

	});


	$('.kg').on('keyup', function(){
		var sum = 0;
		$('.kg').each(function(){
			var kg = this.value;

			if(kg == ""){
				kg = 0;
			}else{
				kg = parseFloat(this.value);
			}
			sum = sum + kg;
		});	
		total = (sum / 8) * 60;
		if($('#self').is(":checked") == true){
			$('#self_load').val(total)
			console.log(parseInt(total))
		}

		if($('#self').is(":checked") == false){
			$('#self_load').val("")
		}
	});


	$("#no").click(function(){
		$("#area").prop("disabled", true);
		$("#loc").prop("readonly", true);
		$("#delT2").prop("readonly", true);
		$("#delT").prop("readonly", true);

		$("#delT").val("");
	});

	$("#yes").click(function(){
		$("#area").prop("disabled", false);
		$("#delT").prop("disabled", false);	
		$("#delT2").prop("disabled", false);	
		$("#loc").prop("disabled", false);	
		$("#loc").prop("readonly", false);	
		$("#delT2").prop("readonly", false);	
		$("#delT").prop("readonly", false);

		var inputs = $(".kg");
		var totalKg = 0;
		for(var i = 0; i < inputs.length; i++){
			if($(inputs[i]).val() != ""){
				totalKg = parseFloat(totalKg) + parseFloat($(inputs[i]).val());
			}
		}

// alert(totalKg);
if(totalKg > 4){
	$("#delT").val("20");
}else{
	$("#delT").val("");
}
});


	$(".kg").on("keyup", function(){

		var dev = $("input[name='dev']:checked"). val();
		var inputs = $(".kg");
		var totalKg = 0;
		for(var i = 0; i < inputs.length; i++){
			if($(inputs[i]).val() != ""){
				totalKg = parseFloat(totalKg) + parseFloat($(inputs[i]).val());
			}
		}

// alert(totalKg);
if(totalKg > 4){
	if(dev == "yes"){
		$("#delT").val("Php 20");
	}else{
		$("#delT").val("");
	}
}else{
	$("#delT").val("");
}
});


	$("#type").on("change", function(){

		$("#load_tl").load("load_tl.php?id="+this.value);
	});
</script>