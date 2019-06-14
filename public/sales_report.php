<?php require_once("../includes/db_connection.php"); ?>
<?php include("madd.php"); ?>
<?php include("../includes/layouts/functions.php"); ?>
<?php include('session.php'); ?>

<?php include("../includes/layouts/header.php"); ?>

<div class="container">
<!--
			<ul class="nav nav-tabs mtop-10" >
			  <li id="car" role="presentation" class="active"><a class="hover">Car Wash</a></li>
			  <li id="laundry" role="presentation"><a class="hover">Laundry</a></li>
			  <li id="water" role="presentation"><a class="hover">Water Refilling</a></li>
			</ul>

<hr>
	<div class="col-md-12" id="report_body">
		<?php include_once("car_sales.php"); ?>
	</div>
	<hr>
-->
	<table class="table table-striped border">
		<tr>
			<td class="text-middle text-center border" style="width: 33.33%">Yearly</td>
			<td class="text-middle text-center border" style="width: 33.33%">Monthly</td>
			<td class="text-middle text-center border" style="width: 33.33%">Daily</td>
		</tr>
		<tr>
			<td class="text-middle text-center border">
				<?php include("yearly.php"); ?>
			</td>
			<td class="text-middle text-center border" id="v_month">
				<?php // include("monthly.php"); ?>				
			</td>
			<td class="text-middle text-center border" id="v_day">
				<?php // include("daily.php"); ?>				
			</td>
		</tr>
	</table>
</div