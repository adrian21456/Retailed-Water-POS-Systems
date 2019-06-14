<?php require_once("../includes/db_connection.php"); ?>
<?php include('session.php'); ?>
	<?php include('validateuser.php'); ?>
<?php include("../includes/layouts/functions.php"); ?>
	
<?php include("../includes/layouts/header.php"); ?>
<head>
<script src="js/jquery-2.1.3.min.js"></script>
<script>
$(function(){
	
	$('#btnprint').click(function(){
		
		
	
//var orightml=document.body.innerHTML;
$('#lbl').css('font-size','15px');
var printhtml=$('.row').html();
$('body').html(printhtml).css("font-size","12px").css("margin","0px").css("font-family", "arial");
window.print();
window.open('inventorylist.php','_self');	
});
});

</script>
</head>



<div class="container-fluid">

  <div class="row">
     <
  </div>
</div>									
				


						
						
			<?php include("loader.php"); ?>				
<?php include("../includes/layouts/footer.php"); ?>		