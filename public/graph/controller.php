<?php
date_default_timezone_set('Asia/Manila');

/*
$DBhost = 'localhost';
$DBuser = 'bacolodc';
$DBpass = 'PerlaTupas10/10';
$DBName = "bacolodc_restodb";
*/

    $DBhost = "localhost";
    $DBuser = "root";
    $DBpass = "";
    $DBName = "dbhanz_restaurant";   

	
    $db_handle = mysql_connect($DBhost,$DBuser,$DBpass) or die("Unable to connect to database");
    @mysql_select_db("$DBName") or die("Unable to select database $DBName");
	
	
	
if ($_POST['lType']=='Sales'){

$datefrom =strval(DATE('Y')).'-'.strval(DATE('m')).'-'.strval(DATE('d')-7);
$dateto =strval(DATE('Y')).'-'.strval(DATE('m')).'-'.strval(DATE('d'));

		
		
		$sql= "select sdate,sum(total) as amount from salestranslog where sdate>= '$datefrom' and sdate <= '$dateto' group by sdate desc";
//echo $sql;
//return;
		 $res=mysql_query($sql);		 
		 $row=mysql_num_rows($res);		 
                 
		 

		if ($row>0)
		{
		while($row = mysql_fetch_assoc($res))
		{   
			foreach($row as $key => $value)
			{    $arr[$key] = $value; }

			$main_arr[] = $arr;
		}

		$json = json_encode($main_arr);
		echo $json;
		}else{
		  echo "false";
		}
		
}


if ($_POST['lType']=='Sales2'){

$datefrom =strval(DATE('Y')).'-'.strval(DATE('m')).'-'.strval(DATE('d')-1);
$dateto =strval(DATE('Y')).'-'.strval(DATE('m')).'-'.strval(DATE('d'));

		
		
		// $sql= "select sdate,sum(total) as amount from salestranslog where sdate>= '$datefrom' and sdate <= '$dateto' group by sdate desc limit 6";
 $sql= "select sdate,sum(total) as amount from salestranslog where sdate>= '$datefrom'";
		 $res=mysql_query($sql);		 
		 $row=mysql_num_rows($res);		 
                 
		 

		if ($row>0)
		{
		while($row = mysql_fetch_assoc($res))
		{   
			foreach($row as $key => $value)
			{    $arr[$key] = $value; }

			$main_arr[] = $arr;
		}

		$json = json_encode($main_arr);
		echo $json;
		}else{
		  echo "false";
		}
		
}
?>