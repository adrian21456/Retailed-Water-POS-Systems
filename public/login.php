<?php
include("../includes/db_connection.php");
session_start();

$username = $_POST['username'];
$pass = $_POST['password'];


	$sql1 = mysqli_query($connection, "SELECT * FROM users WHERE email = '$username' AND password = '$pass' ");
		$result1 = mysqli_num_rows($sql1);

		if($result1 > 0){

			$row = mysqli_fetch_array($sql1);

			$_SESSION['admin'] = $row['id'];

			echo "<script>document.location='sales.php'</script>";

		}else{

			echo "<script>alert('Invalid Username or Password')</script>";
//			echo "<script>document.location='index.php'</script>";

		}
?>