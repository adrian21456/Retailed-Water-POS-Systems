<?php require_once("../includes/db_connection.php"); ?>
<?php include("madd.php"); ?>
<?php include("../includes/layouts/functions.php"); ?>
<?php include('session.php'); ?>

<?php include("../includes/layouts/header.php"); ?>

<script src="js/jquery-2.1.3.min.js"></script>

  <div class="container">
    <div class="row border">
      <div class="col-md-4 col-md-push-8 border" style="height: 100vH; padding: 5%">
        <form method="post" action="login.php">
          <img src="../images/login.png" class="img-responsive" style="width: 70%; margin: auto"><hr>
          <input type="email" name="username" placeholder="username" class="input-form text-center mtop-10" autofocus>
          <input type="password" name="password" placeholder="password" class="input-form text-center mtop-10">

          <hr>
          <div class="text-right">
            <input type="submit" value="login" class="btn btn-primary">
          </div>
        </form>
      </div>
    </div>
  </div>