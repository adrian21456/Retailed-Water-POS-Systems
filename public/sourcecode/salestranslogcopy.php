<?php require_once("../includes/db_connection.php"); ?>
<?php include("../includes/layouts/functions.php"); ?>

<?php

		$date = date("Y-m-d H:i:s");
        $customer = $_POST['customer'];
        $total = $_POST['payable_amount'];
        $tax = 0;
		$discount = 0.00;
		$grandtotal= $_POST['payable_amount'];
		$paidby= $_POST['cash'];
		$amountpaid= $_POST['paid'];
		$change= $_POST['change'];
		
		
        $sql="INSERT INTO salestranslog (date, customer, total, tax, discount, grandtotal, paidby, amountpaid, change_amt) VALUES ('$date', '$customer', '$total', '$tax', '$discount', '$grandtotal', '$paidby', '$amountpaid', '$change')";
		
        if (!mysqli_query($connection,$sql)) {
          die('Error: ' . mysqli_error($connection));
        }
        header("location: clearsalestrans.php");
      

?>
