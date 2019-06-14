<?php require_once("../includes/db_connection.php"); ?>
<?php include("madd.php"); ?>
<?php include("../includes/layouts/functions.php"); ?>
<?php include('session.php'); ?>
<?php include("../includes/layouts/header.php"); ?>

<?php $nav = 3; ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
				
			<div class="border" style="padding: 1%">
				
			<?php include_once("subnav2.php"); ?>
				
				<div class="border mtop-10" id="formPart" style="padding: 1% 2%">
					<?php
						if(isset($_GET['id'])){
							include_once('edit_refill.php');
						}else{
							include_once('part_refill.php');
						}
					?>
				</div>
			</div>
		</div>
	</div>
</div>