<?php

$active1 = "";
$active2 = "";
$active3 = "";

if($nav == 1){
	$active1 = "active";
}
if($nav == 2){
	$active2 = "active";
}
if($nav == 3){
	$active3 = "active";
}
?>
			<ul class="nav nav-tabs mtop-10" >
			  <li id="car" role="presentation" class="<?php echo $active1 ?>"><a href="main_carwash.php" class="hover">Car Wash</a></li>
			  <li id="laundry" role="presentation" class="<?php echo $active2 ?>"><a href="main_laundry.php" class="hover">Laundry</a></li>
			  <li id="water" role="presentation" class="<?php echo $active3 ?>"><a href="main_refill.php" class="hover">Water Refilling</a></li>
			</ul>
