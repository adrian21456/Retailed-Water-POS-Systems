<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update Table</title>
</head>

<body>
<?php
mysql_connect("localhost","root","");
mysql_select_db("students") or die("Unable to select database");

$size = count($_POST['address']);

$i = 0;
while ($i < $size) {
	$address= $_POST['address'][$i];
	$id = $_POST['id'][$i];
	
	$query = "UPDATE students SET address = '$address' WHERE id = '$id' LIMIT 1";
	mysql_query($query) or die ("Error in query: $query");
	echo "$address<br /><br /><em>Updated!</em><br /><br />";
	++$i;
}
?>
</body>
</html>
