<?php require_once("../includes/db_connection.php"); ?>
<?php include("../includes/layouts/functions.php"); ?>
<?php include("../includes/layouts/header.php"); ?>

<style type="text/css">
.table-fixed thead {
  width: 97%;
}
.table-fixed tbody {
  height: 230px;
  overflow-y: scroll;
  width: 100%;
}
.table-fixed thead, .table-fixed tbody, .table-fixed tr, .table-fixed td, .table-fixed th {
  display: block;
}
.table-fixed tbody td, .table-fixed thead > tr> th {
  float: left;
  border-bottom-width: 0;
}
</style>

<div class="container">
  <div class="row">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4>
            Fixed Header Scrolling Table 
          </h4>
        </div>
        <table class="table table-fixed">
          <thead>
            <tr>
              <th class="col-xs-2">#</th><th class="col-xs-8">Name</th><th class="col-xs-2">Points</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="col-xs-2">1</td><td class="col-xs-8">Mike Adams</td><td class="col-xs-2">23</td>
            </tr>
            <tr>
              <td class="col-xs-2">2</td><td class="col-xs-8">Holly Galivan</td><td class="col-xs-2">44</td>
            </tr>
            <tr>
              <td class="col-xs-2">3</td><td class="col-xs-8">Mary Shea</td><td class="col-xs-2">86</td>
            </tr>
            <tr>
              <td class="col-xs-2">4</td><td class="col-xs-8">Jim Adams</td><td class="col-xs-2">23</td>
            </tr>
            <tr>
              <td class="col-xs-2">5</td><td class="col-xs-8">Henry Galivan</td><td class="col-xs-2">44</td>
            </tr>
            <tr>
              <td class="col-xs-2">5</td><td class="col-xs-8">Henry Galivan</td><td class="col-xs-2">44</td>
            </tr>
          </tbody>
        </table>
      </div>
  </div>
</div>        



<div class="container">
  <div class="row">
   <div class="col-md-6">
  <h4> <small>Define ingredients for</small> Hamburger</h4>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h5>
            <strong>List of all Ingredients</strong>
          </h5>
		  <h5>
           <small>to add ingredient to product you want to sell, click on the add button on the right side of the table.</small>
          </h5>
		  
        </div>

        <table class="table table-fixed table-striped" >

          <thead>
            <tr>
              <th class="col-xs-2">&nbsp&nbspID</th><th class="col-xs-6">Ingredient</th><th class="col-xs-2">Unit</th><th class="col-xs-2">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="col-xs-2">&nbsp&nbsp1</td><td class="col-xs-6">Onion</td><td class="col-xs-2">PC</td><td class="col-xs-2">Add</td>
            </tr>
            <tr>
              <td class="col-xs-2">&nbsp&nbsp2</td><td class="col-xs-6">Cheese</td><td class="col-xs-2">Slice</td><td class="col-xs-2">Add</td>
            </tr>

          </tbody>
        </table>
      </div>
  </div>
</div> 
</div>  









                        		
<?php include("../includes/layouts/footer.php"); ?>