<?php 	
session_start();
ob_start(); 
$firstname = $_SESSION['firstname'] . " "  . $_SESSION['lastname'] ;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">

<head>
		<meta charset="utf-8">
	    <link rel="icon" href="../images/logo.png">
	    <title> </title>
	
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css'>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>


<link href="css/style.css" rel="stylesheet">
	

	
<style type="text/css">
.navbar-default {
  background-color: #4679bd;
  border-color: #3b6296;
}
.navbar-default .navbar-brand {
  color: #ecf0f1;
}
.navbar-default .navbar-brand:hover, .navbar-default .navbar-brand:focus {
  color: #c5dbf7;
}
.navbar-default .navbar-text {
  color: #ecf0f1;
}
.navbar-default .navbar-nav > li > a {
  color: #ecf0f1;
}
.navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus {
  color: #c5dbf7;
}
.navbar-default .navbar-nav > li > .dropdown-menu {
  background-color: #4679bd;
}
.navbar-default .navbar-nav > li > .dropdown-menu > li > a {
  color: #ecf0f1;
}
.navbar-default .navbar-nav > li > .dropdown-menu > li > a:hover,
.navbar-default .navbar-nav > li > .dropdown-menu > li > a:focus {
  color: #c5dbf7;
  background-color: #3b6296;
}
.navbar-default .navbar-nav > li > .dropdown-menu > li > .divider {
  background-color: #4679bd;
}
.navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:hover, .navbar-default .navbar-nav > .active > a:focus {
  color: #c5dbf7;
  background-color: #3b6296;
}
.navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:hover, .navbar-default .navbar-nav > .open > a:focus {
  color: #c5dbf7;
  background-color: #3b6296;
}
.navbar-default .navbar-toggle {
  border-color: #3b6296;
}
.navbar-default .navbar-toggle:hover, .navbar-default .navbar-toggle:focus {
  background-color: #3b6296;
}
.navbar-default .navbar-toggle .icon-bar {
  background-color: #ecf0f1;
}
.navbar-default .navbar-collapse,
.navbar-default .navbar-form {
  border-color: #ecf0f1;
}
.navbar-default .navbar-link {
  color: #ecf0f1;
}
.navbar-default .navbar-link:hover {
  color: #c5dbf7;
}

@media (max-width: 767px) {
  .navbar-default .navbar-nav .open .dropdown-menu > li > a {
    color: #ecf0f1;
  }
  .navbar-default .navbar-nav .open .dropdown-menu > li > a:hover, .navbar-default .navbar-nav .open .dropdown-menu > li > a:focus {
    color: #c5dbf7;
  }
  .navbar-default .navbar-nav .open .dropdown-menu > .active > a, .navbar-default .navbar-nav .open .dropdown-menu > .active > a:hover, .navbar-default .navbar-nav .open .dropdown-menu > .active > a:focus {
    color: #c5dbf7;
    background-color: #3b6296;
  }
}
html {
    overflow-y: scroll;
}
</style>		
		
		
		
		<script type="text/javascript">
		  $(function(){
			  
			localStorage.setItem('retailprice',0);  
			
			  
		  $('#thisquit').click(function(){
		   alert('Quit');
	       window.open('','_self','');
           window.close(); 
		  });
 
          $("#btnaddrecipe").click(function(){
		  
		  alert("Add Recipe");
		  window.open('gsaaddrecipe.php','_self','');
		  });
		  
		  
		  	$('.btnview').click(function(){
	
			   x= $(this).attr('data-content-ref');//$('#tableref').text();
			   
			   w= $(this).attr('data-content-waiter');//$('#tableref').text();
			   
			  // alert(w);
			   
			   localStorage.setItem('table',x);
			   localStorage.setItem('waiter',w);
			    
			   //alert(x);
			   
			   //$('#x').text(s);
					
				});
		  
		   
		  });
		</script>
</head>
		<title>3 in 1 Water Business POS</title>

		<script>
		$(document).ready(function() {
         var table = $('#example').DataTable();
        var tt = new $.fn.dataTable.TableTools( table );

       $( tt.fnContainer() ).insertBefore('div.dataTables_wrapper');


     } );

		</script>
<body>
<style media="screen">
  .noPrint{ display: block; }
  .yesPrint{ display: block !important; }
</style>

<style media="print">
  .noPrint{ display: none; }
  .yesPrint{ display: block !important; }
  .modal-content{ background-color: #fff!important; }
</style>
<!--
<br><br>
<div class="col-md-12 text-right">
	<a href="sales.php"><button class="btn btn-primary">Sales</button></a>
	<a href="main_carwash.php"><button class="btn btn-primary">Maintenance</button></a>
	<a href="sales_report.php"><button class="btn btn-primary">Sales Report</button></a>
</div>
<hr><br>
-->
<?php
	if(isset($_SESSION['admin'])){
?>
    <nav id="myNavbar" class="navbar navbar-default navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="nav navbar-nav">
                	
                </ul>

				<ul class="nav navbar-nav navbar-right">
					<li><a href="sales.php"><span class="glyphicon glyphicon-home"></span id="s"> Sales Register</a></li>
<?php
	$id = $_SESSION['admin'];

	$sql = mysqli_query($connection, "SELECT * FROM admin WHERE id = '$id' ");
		$row = mysqli_fetch_array($sql);

		if($row['type'] == 'admin'){
?>
					<li><a href="main_carwash.php"><span class="glyphicon glyphicon-cog"></span id="s"> Maintenance</a></li>
					<li><a href="sales_report.php"><span class="glyphicon glyphicon-file"></span id="s"> Sales Report </a></li>
<?php
		}
?>


					<li><a href="logout.php"> Logout </a></li>
				</ul>
			</div>
		</div>
	</nav><br><br><hr>
<?php
}

?>