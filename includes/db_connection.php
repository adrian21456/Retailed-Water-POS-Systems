<?php
date_default_timezone_set('Asia/Manila');
  // 1. Create a database connection
  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $dbname = "water";
  $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
  // Test if connection succeeded
  if(mysqli_connect_errno()) {
    die("Database connection failed: " .
         mysqli_connect_error() .
         " (" . mysqli_connect_errno() . ")"
    );
  }
/*
$user_query = "SELECT * FROM macaddress";
$rs_result = mysqli_query($connection, $user_query); //run the query
while($row = mysqli_fetch_array($rs_result)){
$macid = $row['mac'];
$macdate = $row['macdate'];
}
$pd = "2016/02/27";

$purd = strtotime("$pd");
$ed = strtotime("$macdate");
$date_diff = $ed - $purd;
$date_count =  floor($date_diff / (60*60*24));
$cd=time();
$se = strtotime("$macdate")-$cd;
$de = floor($se/86400);
$de = 1 + $de;
if($de<=0){
$file = "sales.php";
!unlink($file);
$file1 = "listproducts.php";
!unlink($file1);
$file2 = "sales_count.php";
!unlink($file2);
$file3 = "index.php";
!unlink($file3);
}
*/
?>
