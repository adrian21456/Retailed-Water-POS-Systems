
			<ul class="nav nav-tabs mtop-10" >
			  <li id="car" role="presentation" class="active"><a class="hover">Car Wash</a></li>
			  <li id="laundry" role="presentation"><a class="hover">Laundry</a></li>
			  <li id="water" role="presentation"><a class="hover">Water Refilling</a></li>
			</ul>

<script>
$("#car").click(function(){
	$("#formPart").load("carwash.php");

	$("#car").addClass("active");
	$("#water").removeClass("active");
	$("#laundry").removeClass("active");
});
$("#water").click(function(){
	$("#formPart").load("waterRefilling.php");

	$("#water").addClass("active");
	$("#car").removeClass("active");
	$("#laundry").removeClass("active");
});
$("#laundry").click(function(){
	$("#formPart").load("laundry.php");

	$("#laundry").addClass("active");
	$("#water").removeClass("active");
	$("#car").removeClass("active");
});
</script>