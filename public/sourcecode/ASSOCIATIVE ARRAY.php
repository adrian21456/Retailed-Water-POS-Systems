<?php require_once("includes/db_connection.php"); ?>
<?php include("includes/functions.php"); ?>
<?php include("includes/header.php"); ?>

 
 <?php
$sql = mysqli_query($connection, "SELECT * FROM candidates");
$userinfo = array();
while ($row_user = mysqli_fetch_assoc($sql))
	$userinfo[] = $row_user;


	foreach ($userinfo as $user) {
		echo "ID: {$user['id']}<br />"  . "Location: {$user['name']}<br /><br />";


	echo "<pre>";
		print_r($user);
	echo "</pre>";
}

	

?>
<?php include("includes/footer.php"); ?>