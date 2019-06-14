<?php require_once("includes/db_connection.php"); ?>
<?php include("public/madd.php"); ?>


<!DOCTYPE html>
<html>
<head>

  <meta charset="UTF-8">

  <title>Point of Sales</title>
<link rel="icon" href="images/logo.png">
    <link rel="stylesheet" type="text/css" href="public/css/csss.css">
<script src="public/js/jquery-1.11.1.min.js"></script>



</head>

<body>

<div class="bg">
  <div class="col-md00"></div>
  <div id ="logo_index">

<center><img src="images/mylaundry1.png" width="250px" height="278px" align="center" ></center>

  </div>

    <div id="login">
      <div id="triangle"></div>

  <h1>Log in</h1>
	
  <form action = "" method="POST">
  <p class="box">Email</p>
    <input type="email" name="email" placeholder="Email" autocomplete="off" />

    <p class="box">Password</p>
    <input type="password" name="password" placeholder="Password" autocomplete="off" />

   <input type="submit" name="submit" value="Log in" />
   <div class="col-md00"></div>
	<input type="reset"  name="reset" value="Reset" />
	

  </form>
    </div>

  <!--<script src="js/index.js"></script>-->




        <div class="row">
            <div class="col-sm-12">
              <div class="col-md00"></div>
                <footer>

                    <!--<center><p>&copy; Cafe Lupe Copyright 2016 - <?php echo date("Y"); ?> Restaurant Point of Sales Version 1.0 <small>Developer: Gary Abellar; Contact: 09475704983</small></p></center>-->
					 <center><p style="color: #fff;">&copy; <small></small></p></center>
                </footer>
            </div>
        </div>        
</div>


</body>
</html>
