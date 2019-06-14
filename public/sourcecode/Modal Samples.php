<?php require_once("../includes/db_connection.php"); ?>
<?php include("../includes/layouts/header.php"); ?>

<!-- Button trigger modal -->
<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this?
      </div>
      <div class="modal-footer">
	  <form method="post">
        <button type="submit" name="delete" value="delete" class="btn btn-danger" >Delete</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </form>
	  </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php
    $id = 0;


    if ( !empty($_GET['id'])) {
	$id = $_REQUEST['id'];
    }

    if ( !empty($_POST)) {
        // keep track post values
        $id = $_POST['id'];

          if (!$connection) {
              die("Connection failed: " . mysqli_connect_error());
          }

          // sql to delete a record
          $sql = "DELETE FROM items WHERE id = {$id}";
          if (mysqli_query($connection, $sql)) {
              header("location: index.php");
          } else {
              echo "Error deleting record: " . mysqli_error($connection);
          }

          }
 ?>




<?php include("../includes/layouts/footer.php"); ?>