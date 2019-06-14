<?php require_once("../includes/db_connection.php"); ?>
<?php include("../includes/layouts/functions.php"); ?>
<?php include("../includes/layouts/header.php"); ?>


<div class="container">
<div class="span9 centred">
  <h2>Bootstrap Mixed Form <p class="lead">with horizontal and inline fields</p></h2>
  <form role="form" class="form-horizontal">
    <div class="form-group">
      <div class="col-sm-4"><label>First name</label><input type="text" class="form-control" placeholder="First"></div>
      <div class="col-sm-4"><label>Last name</label><input type="text" class="form-control" placeholder="Last"></div>
	  <div class="col-sm-4"><label>Last name</label><input type="text" class="form-control" placeholder="Last"></div>
    </div>
	    <div class="form-group">
      <div class="col-sm-4"><label>First name</label><input type="text" class="form-control" placeholder="First"></div>
      <div class="col-sm-4"><label>Last name</label><input type="text" class="form-control" placeholder="Last"></div>
	  <div class="col-sm-4"><label>Last name</label><input type="text" class="form-control" placeholder="Last"></div>
    </div>
	<div class="form-group">
      <label class="col-sm-12" for="TextArea">Textarea</label>
      <div class="col-sm-6"><textarea class="form-control" id="TextArea"></textarea></div>
    </div>
    <div class="form-group">
      <label class="col-sm-12">Phone number</label>
      <div class="col-sm-1"><input type="text" class="form-control" placeholder="000"><div class="help">area</div></div>
      <div class="col-sm-1"><input type="text" class="form-control" placeholder="000"><div class="help">local</div></div>
      <div class="col-sm-2"><input type="text" class="form-control" placeholder="1111"><div class="help">number</div></div>
      <div class="col-sm-2"><input type="text" class="form-control" placeholder="123"><div class="help">ext</div></div>
    </div>
    <div class="form-group">
      <label class="col-sm-1">Options</label>
      <div class="col-sm-2"><input type="text" class="form-control" placeholder="Option 1"></div>
      <div class="col-sm-3"><input type="text" class="form-control" placeholder="Option 2"></div>
    </div>
    <div class="form-group">
      <div class="col-sm-6">
        <button type="submit" class="btn btn-info pull-right">Submit</button>
      </div>
    </div>
  </form>
  
  <hr>

</div>
</div>



<?php include("../includes/layouts/footer.php"); ?>