<?php require_once("../includes/db_connection.php"); ?>
<?php include("../includes/layouts/functions.php"); ?>
<?php include("../includes/layouts/header.php"); ?>

<?php
		$codeError = null;
        $nameError = null;
		$purchasepriceError = null;
		$producttaxError = null;
		$retailpriceError = null;
		$quantityError =null;
		$reorderlevelError=null;
		$quantitydeductError = null;
        $descriptionError = null;


 if ( !empty($_POST)) {
        // keep track validation errors
		$codeError = null;
        $nameError = null;
		$purchasepriceError = null;
		$producttaxError = null;
		$retailpriceError = null;
		$quantityError =null;
		$reorderlevelError=null;
		$quantitydeductError = null;
        $descriptionError = null;
		

        // keep track post values
		$code = $_POST['code'];
        $name = $_POST['name'];
		$purchaseprice = $_POST['purchaseprice'];
		$producttax = $_POST['producttax'];
		$retailprice = $_POST['retailprice'];
		$quantity = $_POST['quantity'];
		$reorderlevel= $_POST['reorderlevel'];
		$quantitydeduct = $_POST['quantitydeduct'];
        $description = $_POST['description'];
		$category = $_POST['category'];
		$supplier = $_POST['supplier'];
		$location = $_POST['location'];
		
        // validate input
        $valid = true;
        if (empty($code)) {
            $codeError = 'Please enter product code';
            $valid = false;
        }
		if (empty($name)) {
            $nameError = 'Please enter product name';
            $valid = false;
        }
        if (empty($purchaseprice)) {
            $purchasepriceError = 'Please enter purchase price';
            $valid = false;
        }
        if (empty($producttax)) {
            $producttaxError = 'Please enter product tax..';
            $valid = false;
        }
        if (empty($retailprice)) {
            $retailpriceError = 'Please enter retail price..';
            $valid = false;
        }
		if (empty($quantity)) {
            $quantityError = 'Please enter quantity..';
            $valid = false;
        }
		if (empty($reorderlevel)) {
            $reorderlevelError = 'Please enter reorder level..';
            $valid = false;
        }
		if (empty($description)) {
            $descriptionError = 'Please enter description..';
            $valid = false;
        }
        if ($valid) {

        $sql="INSERT INTO items (name, description, quantity, price, category, location, supplier, code, purchaseprice, tax, reorderlevel, quantitytodeduct) VALUES ('$name', '$description', '$quantity', '$retailprice', '$category', '$location', '$supplier','$code', '$purchaseprice', '$producttax', '$reorderlevel', '$quantitydeduct')";
        if (!mysqli_query($connection,$sql)) {
          die('Error: ' . mysqli_error($connection));
        }
        header("location: index.php");
       }
 }
?>


<div class="container">
<div class="span9 centred">
  <h3>Add Product <p><small>Please enter the information below.</small></p></h3> 
 
  <form role="form" class="form-horizontal" action="createproduct.php" method="POST">
    <div class="form-group">
      <div class="col-sm-4"><label>Product Code</label><input type="text" class="form-control" name="code" placeholder=""><?php echo "<p class='text-danger'>" . $codeError . "</p>";?></div>
      <div class="col-sm-4"><label>Product Name</label><input type="text" class="form-control" name="name" placeholder=""><?php echo "<p class='text-danger'>" . $nameError . "</p>";?></div>
		<div class="col-sm-4"><label>Category</label>
		<select class="form-control" name="category">
			<option>Select Category</option>
		</select>
		</div>	
    </div>
	<div class="form-group">
      <div class="col-sm-4"><label>Purchase Price</label><input type="text" name="purchaseprice" class="form-control" placeholder="0.00"><?php echo "<p class='text-danger'>" . $purchasepriceError . "</p>";?></div>
      <div class="col-sm-4"><label>Product Tax</label><input type="text" name="producttax" class="form-control" placeholder="0"><?php echo "<p class='text-danger'>" . $producttaxError . "</p>";?></div>
	  <div class="col-sm-4"><label>Retail Price</label><input type="text" name="retailprice" class="form-control" placeholder=""><?php echo "<p class='text-danger'>" . $retailpriceError . "</p>";?></div>
    </div>
	<div class="form-group">
      <div class="col-sm-4"><label>Quantity in Stock</label><input type="text" name="quantity" class="form-control" placeholder=""><?php echo "<p class='text-danger'>" . $quantityError . "</p>";?></div>
      <div class="col-sm-4"><label>Reorder Level</label><input type="text" name="reorderlevel" class="form-control" placeholder=""><?php echo "<p class='text-danger'>" . $reorderlevelError . "</p>";?></div>
	  <div class="col-sm-4"><label>Quantity Deduction</label><input type="text" name="quantitydeduct" class="form-control" placeholder="12" value="1"></div>
    </div>
	<div class="form-group">
      <label class="col-sm-12" for="TextArea">Description</label>
      <div class="col-sm-12"><textarea class="form-control" name="description" id="TextArea"></textarea><?php echo "<p class='text-danger'>" . $descriptionError . "</p>";?></div>
    </div>
	<div class="form-group">
	<div class="col-sm-6"><label>Location</label>
		<select class="form-control" name="location">
			<option>Select Location</option>
		</select>
	</div>
	<div class="col-sm-6"><label>Supplier</label>
		<select class="form-control" name="supplier">
			<option>Select Supplier</option>
		</select>
	</div>
	</div>
	<br />
    <div class="form-group">
      <div class="col-sm-12">
        <button type="submit" class="btn btn-info pull-right">Submit</button>
      </div>
    </div>
  </form>
  
  <hr>

</div>



<?php include("../includes/layouts/footer.php"); ?>