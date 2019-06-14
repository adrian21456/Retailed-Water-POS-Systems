<?php
error_reporting(E_ERROR | E_PARSE);
$error = null;
$macid = null;

ob_start();
system('ipconfig /all');
$mycom=ob_get_contents();
ob_clean();
$findme = "Physical";
$pmac = strpos($mycom, $findme);
$mac=substr($mycom,($pmac+36),17);

										
										/*  Added by gsa to bypass mac address */
										$user_query = "UPDATE macaddress SET mac='$mac'"; 
										$rs_result = mysqli_query($connection, $user_query); //run the query
                                        /*  Added by gsa to bypass mac address */
										
										$user_query = "SELECT * FROM macaddress WHERE mac = '{$mac}'"; 
										$rs_result = mysqli_query($connection, $user_query); //run the query
										while($row = mysqli_fetch_array($rs_result)){
										$macid = $row['mac'];
										}

if ($mac == $macid) {
	$valid = "true";

} else {


}



?>