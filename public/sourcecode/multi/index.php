<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Select Query</title>
</head>

<body>
<?php
mysql_connect("localhost","root","");
mysql_select_db("students") or die("Unable to select database");

$sql = "SELECT * FROM students ORDER BY id";

$result = mysql_query($sql) or die($sql."<br/><br/>".mysql_error());

$i = 0;

<table class="table table-hover">
 <thead>
echo '<tr class= "info">';
echo '<th>ID</th>';
echo '<th>Name</th>';
echo '<th>Address</th>';
echo '</tr>';
 </thead>
echo "<form name='form_update' method='post' action='update.php'>\n";
while ($students = mysql_fetch_array($result)) {
	echo '<tr>';
	echo "<td>{$students['id']}<input type='hidden' name='id[$i]' value='{$students['id']}' /></td>";
	echo "<td>{$students['name']}</td>";
	echo "<td><input type='text' size='40' name='address[$i]' value='{$students['address']}' /></td>";
	echo '</tr>';
	++$i;
}
echo '<tr>';
echo "<td><input type='submit' value='submit' /></td>";
echo '</tr>';
echo "</form>";
echo '</table>';
?>


</body>
</html>
