<?php
session_start();// Starting Session
/*// Storing Session
//$user_check=$_SESSION['login_user'];

//$_SESSION['table'];

$user_check_role=$_SESSION['role'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query($connection, "select role from users where role='$user_check_role'");
$row = mysqli_fetch_assoc($ses_sql);
//$login_session_role =$row['role'];
//if($login_session_role == $role ) {
	
//} else {
//mysqli_close($connection); // Closing Connection
//header('Location: index.php'); // Redirecting To Home Page
//} 
$login_session_role = $row['role'];
if(!isset($login_session_role)){
mysqli_close($connection); // Closing Connection
//header('Location: index.php'); // Redirecting To Home Page
}
*/
$user_check_role="admin";

?>