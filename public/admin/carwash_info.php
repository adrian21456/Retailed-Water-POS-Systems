<?php require_once("../../includes/db_connection.php"); ?>
<?php include("../madd.php"); ?>
<?php include("../../includes/layouts/functions.php"); ?>
<?php include('../session.php'); ?>
<?php include("../../includes/layouts/header.php"); ?>


<div class="container">
	<div class="row">
		<div class="col-md-12">
				
			<div id="transactions_right" class="border" style="min-height: 120vH!important">
				
			<?php include_once("subnav.php"); ?>
				
				<div class="border mtop-10" id="formPart" style="padding: 1% 2%">
					<?php include_once('carwash.php'); ?>
				</div>
			</div>
		</div>
	</div>
</div>