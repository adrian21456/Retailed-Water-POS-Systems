<?php require_once("../includes/db_connection.php"); ?>
<?php include("madd.php"); ?>
<?php include("../includes/layouts/functions.php"); ?>
<?php include('session.php'); ?>


<?php




        $home_active = "";
        $create_active = "";
        $sales_active = "active";
		$catid = null;



//unset($_SESSION['cat']); //destroy session variable myvalue
	
?>



<?php include("../includes/layouts/header.php"); ?>
<div class="container">

<head>
<script src="js/jquery-2.1.3.min.js"></script>









<script>
$(function(){


$('#btnsub-disabled').click(function(){
	  $(this).prop('disabled',true);
 holdref= $('#holdref').val();
 waiter= $('#waiter').val();	 
   
									   
									  
									     var cust = 0;
										 var payable_amount = 0;
										 var cash = 0;
										 var paid = 0;
										 var change = 0
										//	alert(payable_amount+" "+cust+" "+cash+" "+paid+" "+change);	
										//	alert(paid+" < "+payable_amount);
										
										//w=localStorage.getItem('waiter');
										//alert(w);
                                        
											
											
										
											
												$.post('controller_kitchen.php',{cust:cust, payable_amount:payable_amount,cash:cash,paid:paid,change:change, 													   
														},	
														
														function(data){	
															//alert(data);
															//$('#cust').val(data);
															//return;
                                                          
															
															 
															// $('#cust').val(data);
															if ($.trim(data)!='false' ){ 
																//$('#payable_form').modal('hide');
																//localStorage.setItem('table','');
																
																//alert('Sales Posted');
																//window.location.href="sales.php";
																
															 if ($.trim(data)=='empty'){
															   
															   alert('No Order found in Kitchen.');	
															 }else{
																 
																var orightml=document.body.innerHTML;
                                                                $('body').html(data).css("font-size","12px").css("margin","0px").css("font-family", "arial");
																window.print();
															 }	
																//window.open('sales.php','_self');
																//alert('printing Grilled order');
													$.post('controller_kitchen2.php',{cust:cust, payable_amount:payable_amount,cash:cash,paid:paid,change:change, 													   
														},	
														
														function(data){	
															//alert(data);
															//$('#cust').val(data);
															//return;
                                                           
															 
															// $('#cust').val(data);
															if ($.trim(data)!='false' ){ 
																//$('#payable_form').modal('hide');
																//localStorage.setItem('table','');
																
																//alert('Sales Posted');
																//window.location.href="sales.php";
																if ($.trim(data)=='empty'){
															   
															   alert('No Order found in Grilled Kitchen.');	
															 }else{
																$.post('holdtrans.php',{});
																var orightml=document.body.innerHTML;
                                                                $('body').html(data).css("font-size","12px").css("margin","0px").css("font-family", "arial");
																window.print();
															 }
																
										
														  
														  $.post('controller_holdtrans.php',{holdref:holdref,waiter:waiter,										   
																	},	
																											
															function(data){	
															//alert(data);

															 
															  
															if ($.trim(data)!='false' ){ 
                                                                  
															}else{

															 
															}
														});  	
																
																window.open('sales.php','_self');
																
																
																
																
																
															}else{
															   window.open('sales.php','_self');
															   alert('Error or Some Items has no Ingredients.');
															}
														});
																
																//$('body').html(orightml);
																//$('#payable_form').html(data);
																/*
																var html="&lt;html&gt";
																html+="&lt;head&gt";
																
																html+="&lt;link rel='stylesheet' type='text/css' href='css/print.css' media='print' /&gt;";
																html+="&lt;head&gt;";
																html+=document.getElementById('body').innerHTML;
																html+="&lt;/html&gt";
																
																var printWin = window.open('','','left=0,top=0,width=1,height=1,toolbar=0,status=0');
															    printWin.document.write(html);
																printWin.document.close();
																printWin.focus();
																printWin.print();
																printWin.close();
																*/
															}else{
															   window.open('sales.php','_self');
															   alert('Error or Some Items has no Ingredients.');
															}
														});
	
});


$('#sel1').change(function(){
	v=$(this).val();
	localStorage.setItem('searchtype',v);
	$('#txtsearch').focus();
	
});

if (localStorage.getItem('searchtype')){
	
	v=localStorage.getItem('searchtype');
	$('#sel1').val(v);
	
}else{
	$('#sel1').val('desc');
	
}



customid=localStorage.getItem('customid');

if (customid==''){
$('#divcustom').hide();

}else{
$('#divcustom').show('slow');
$('#customprice_qty').focus();	
ltype=localStorage.getItem('ltype');

$("#customprice_qty").attr("placeholder", "Enter "+ltype);



}

   
$('#customprice_qty').blur(function(){
    	price=localStorage.getItem('customprice');
		qty=localStorage.getItem('customqty');
		id=localStorage.getItem('customid');
	//alert(price+" "+qty);

	if (ltype=='Price'){
		priceorig=parseFloat($(this).val());
		price=$(this).val();
		
		if (price<0){
			
			price = parseFloat(price);
			
		}else{
			
					price = parseFloat(price)*parseFloat(qty);
		}
			

		//alert(price);
	}else{

		priceorig=0.00;
		qty=$(this).val();
		qty = parseFloat(qty);
		//price = parseFloat(price) * parseFloat(qty)
		
		
		if (price<0){
			
			price = parseFloat(price);
			
		}else{
			
					price = parseFloat(price)*parseFloat(qty);
		}
		//alert(price);

	}
	
		//alert(priceorig);

	 $.post('maincontroller.php',{lType:'AddPrice',	price:price,qty:qty,id:id,priceorig:priceorig,										   
														},	
														
														function(data){	
														//alert(data);

															 
															  
															if ($.trim(data)!='false' ){ 
                                                                  
															}else{

															 
															}
														});  
	
	
    localStorage.setItem('customid','');     
	location.reload();
});

		$('body').on('click','.b',function(){
			//alter('hello');
			
		});
	
	

	
	
	$('.btnlistopen').click(function(){
		if (localStorage.getItem('table')!=''){
		    $('#listbills').html('Pending');
			alert('Open List Bill is pending, kindly hold it before viewing another List Open Bill.');
		}
		
	});
		$('.btnclose').click(function(){
		  // 
		   tbl = $('#holdref').val();
		   localStorage.setItem('table',tbl);
		   w=$('#waiter').val();
		   localStorage.setItem('waiter',w);
		  // $('#hold').hide();
		   location.reload();
	   });

	
	$('.btnenable').click(function(){
		$("#holdref").attr("readonly", false);
		$('#holdref').focus();
	});
	
	    // Button Hold
	
		  	$('.btnhold').click(function(){
				
                     //$('#holdref').focus();
					  x= localStorage.getItem('table');
					  w = localStorage.getItem('waiter');
					  
					  if (x==''){
						  
						  $("#holdref").attr("readonly", false);
					  }else{
						  
						 $("#holdref").attr("readonly", true);
					  }
					  
					  
					 //  alert(x);
					  $('#holdref').val($.trim(x));
					  $('#waiter').val($.trim(w));
						localStorage.setItem('table','');	
						localStorage.setItem('waiter','');	
				       
				});
			// Button Hold




			
				
				$('.btncancel').click(function(){
					//alert('elow');
					localStorage.setItem('table','');	
					localStorage.setItem('waiter','');
				});
				
	
$('#holdref').keyup(function(){
  
var table=$(this).val();
//alert(id);
$.post('maincontroller.php',{lType:'CheckTable',table:table, 													   
														},	
														
														function(data){	
															 //alert(data);

															 
															  
															if ($.trim(data)!='false' ){ 
                                                               
                                                               alert('Table is already taken.');
															    $("#btnsub").attr("disabled", true);
															   $(this).val('');
															}else{

															 $("#btnsub").attr("disabled", false);
															}
														});  
	
});	



$('.btncategory').click(function(){
	
	cat = $(this).attr('xmlvalue');
	 $.post('maincontroller.php',{lType:'Fill',cat:cat,												   
														},	
														
														function(data){	
															//alert(data);
                                                            //  $('#txtsearch').val(data);
															 
															  
															if ($.trim(data)!='false' ){ 
                                                              content = '<div class="row">';
                                                    			var obj = $.parseJSON(data);
																   var lang = '';
																   $.each(obj, function() {	 
																   
																	//lang += '<tr><td class="item_no">'+this['item_no']+'</td><td class="menu_code">'+this['menu_code']+'</td> <td class="desc">'+this['description']+'</td> <td class="tdqty"> <input type="number" class="clsqty" value="'+this['quantity']+'"/></td> <td class="ucost">'+this['unit_cost']+'</td> <td class="price">'+parseFloat(this['quantity'])*parseFloat(this['unit_cost'])+'</td><td><button type="button" class="excludebtn">Exclude</button></td></tr>';                                 		
																	//lang += '<tr><td class="item_no">'+this['item_no']+'</td><td class="menu_code">'+this['menu_code']+'</td> <td class="desc">'+this['description']+'</td> <td class="tdqty"> <input type="number" class="clsqty" value="'+this['quantity']+'"/></td> <td class="ucost">'+this['unit_cost']+'</td> <td class="price">'+parseFloat(this['quantity'])*parseFloat(this['unit_cost'])+'</td><td></td></tr>';                                 		
																    content += '<div class="col-sm-4"><a class="fixed-size-square btnitem" data-record-type="'+this['id']+'"xmlvalue="'+this['retailprice']+'" href="#"><span>'+this['name']+'('+this['category']+')'+'<img  width="108px" height="70" src="'+this['img']+'" alt="Generic placeholder image"></span></a></div>';
																   });	
															  
																
																
																
																
																
																content += '</div>';
																 $('#transactions_right').html(content);
																 $('#transactions_right_bottom').html('');
																 
															}else{
															  // window.open('sales.php','_self');
															   //alert('Search Item not found.');
														       $('#transactions_right').html('<h1>No record found</h1>');
																 $('#transactions_right_bottom').html('');
															   return;
															}
														});
});





 $.post('maincontroller.php',{lType:'all',												   
														},	
														
														function(data){	
															//alert(data);
                                                            //  $('#txtsearch').val(data);
															 
															  
															if ($.trim(data)!='false' ){ 
                                                              content = '<div class="row">';
                                                    			var obj = $.parseJSON(data);
																   var lang = '';
																   $.each(obj, function() {	 
																   
																	//lang += '<tr><td class="item_no">'+this['item_no']+'</td><td class="menu_code">'+this['menu_code']+'</td> <td class="desc">'+this['description']+'</td> <td class="tdqty"> <input type="number" class="clsqty" value="'+this['quantity']+'"/></td> <td class="ucost">'+this['unit_cost']+'</td> <td class="price">'+parseFloat(this['quantity'])*parseFloat(this['unit_cost'])+'</td><td><button type="button" class="excludebtn">Exclude</button></td></tr>';                                 		
																	//lang += '<tr><td class="item_no">'+this['item_no']+'</td><td class="menu_code">'+this['menu_code']+'</td> <td class="desc">'+this['description']+'</td> <td class="tdqty"> <input type="number" class="clsqty" value="'+this['quantity']+'"/></td> <td class="ucost">'+this['unit_cost']+'</td> <td class="price">'+parseFloat(this['quantity'])*parseFloat(this['unit_cost'])+'</td><td></td></tr>';                                 		
																    content += '<div class="col-sm-4"><a class="fixed-size-square btnitem" data-record-type="'+this['id']+'"xmlvalue="'+this['retailprice']+'" href="#"><span>'+this['name']+'('+this['category']+')'+'<img  width="108px" height="70" src="'+this['img']+'" alt="Generic placeholder image"></span></a></div>';
																   });	
															  
																
																
																
																
																
																content += '</div>';
																 $('#transactions_right').html(content);
																 $('#transactions_right_bottom').html('');
																 
															}else{
															  // window.open('sales.php','_self');
															   //alert('Search Item not found.');
														       $('#transactions_right').html('<h1>No record found</h1>');
																 $('#transactions_right_bottom').html('');
															   return;
															}
														});



$('html').on('click','.btnitem',function(){
var id=$(this).attr('data-record-type');
var rprice=$(this).attr('xmlvalue');
//alert(rprice);
$.post('maincontroller.php',{lType:'SaleItems',id:id,rprice:rprice,												   
														},	
														
														function(data){	
															// alert(data);
															if ($.trim(data)!='false' ){ 
                            
																 $('#txtsearch').val('');
																  $('#txtsearch').focus();
															}else{
															  // window.open('sales.php','_self');
															  // alert('Record not found.');
															}
														});
  
});

  $('#txtsearch').keyup(function(){
   opt=$.trim($('#sel1').val());
 // alert(opt);

	search =$.trim($(this).val());
	
	
	
	                             $.post('maincontroller.php',{lType:'SearchItems',search:search,opt:opt,												   
														},	
														
														function(data){	
															//alert(data);

															 
															  
															if ($.trim(data)!='false' ){ 
                                                              content = '<div class="row">';
                                                    			var obj = $.parseJSON(data);
																   var lang = '';
																   $.each(obj, function() {	 
																   
																	//lang += '<tr><td class="item_no">'+this['item_no']+'</td><td class="menu_code">'+this['menu_code']+'</td> <td class="desc">'+this['description']+'</td> <td class="tdqty"> <input type="number" class="clsqty" value="'+this['quantity']+'"/></td> <td class="ucost">'+this['unit_cost']+'</td> <td class="price">'+parseFloat(this['quantity'])*parseFloat(this['unit_cost'])+'</td><td><button type="button" class="excludebtn">Exclude</button></td></tr>';                                 		
																	//lang += '<tr><td class="item_no">'+this['item_no']+'</td><td class="menu_code">'+this['menu_code']+'</td> <td class="desc">'+this['description']+'</td> <td class="tdqty"> <input type="number" class="clsqty" value="'+this['quantity']+'"/></td> <td class="ucost">'+this['unit_cost']+'</td> <td class="price">'+parseFloat(this['quantity'])*parseFloat(this['unit_cost'])+'</td><td></td></tr>';                                 		
																   content += '<div class="col-sm-4"><a class="fixed-size-square btnitem" data-record-type="'+this['id']+'"xmlvalue="'+this['retailprice']+'" href="#"><span>'+this['name']+'('+this['category']+')'+'<img  width="108px" height="70" src="'+this['img']+'" alt="Generic placeholder image"></span></a></div>';
																   });	
															  
																
																
																
																
																
																content += '</div>';
																 $('#transactions_right').html(content);
																 $('#transactions_right_bottom').html('');
																 
															}else{
															  // window.open('sales.php','_self');
															   //alert('Search Item not found.');
														       $('#transactions_right').html('<h1>No record found</h1>');
																 $('#transactions_right_bottom').html('');
															   return;
															}
														});
														
										
	
  });
  
  
  
 // $('#txtsearch').focus();
  
  // Filling up #transactions_right id div
 
 
 
 //function kitchen
 
 
 //function kitchen
  
});

</script>
</head>	



 <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
<?php

    if (!empty($_GET['id'])) {


			$catid = $_REQUEST['id'];

			$_SESSION['cat']= $catid; //start session myvalue
			$catid_session = $_SESSION['cat']; 

    } else {
		if(!isset($_SESSION['cat'])) {

		} else {
			
		$catid_session = $_SESSION['cat'];
		}
	}


?>


<div id="divcustom">

			<input type="number" class="form-control" id="customprice_qty" />

</div>

  <div class="col-sm-5 shadow" style="margin-left: 30px">
  <p>
 
  
  <center><span class="glyphicon glyphicon-time"></span>&nbsp;<?php include('time.php'); ?></center> <br />

   <div id="transactions_left">

		<?php //include_once('salestable.php') ?>

		<?php include_once('salestable.php') ?>
   
    </div>
    <div id="rLoad">
		<?php include_once('salestotal.php') ?>
	</div>

</p>

    <div class="row">
      <div class="col-sm-12"><b>
      <p>
	  
	<?php //include_once('sales_count.php') ?>

<div class="text-right">
	<button class="btn btn-primary" id="btnPay">Add Payment</button>
</div>
<div id="checkCart"></div>


<br /><hr /><center>Thank you and have a Nice day! </center>

    </p>
    </div>
    </div>
</div>

<script>

var table = $("#salestableid");
	var refresh = function() {
	  table.load("salestable.php", function() {
		setTimeout(refresh, 350); 
	  });
	};
refresh();

var table1 = $("#sales_countid");
	var refresh1 = function() {
	  table1.load("sales_count.php", function() {
		setTimeout(refresh1, 350); 
	  });
	};
refresh1();
</script>
<div id ="sales_footer">
<!-- <img src="images/categories.png" alt="Categories" height="100" width="400"> -->
</div>
<br />
<!--
<table class="table-condense">
<tr>
<td>	
-->
<div class="col-sm-6">


				
<div id="transactions_right" class="border" style="min-height: 120vH!important">
	
<?php include_once("subnav.php"); ?>
	
	<div class="border mtop-10" id="formPart" style="padding: 1% 2%">
		<?php include_once('carwash.php'); ?>
	</div>
</div>

	</div>		

<script>
$('.fixed-size-square').click(function(e){
  e.preventDefault(); // Prevents default link action
  $.ajax({
     url: $(this).attr('href'),
     success: function(data){
       // Do something
     }
  });
});
</script>
<div id ="transactions_right_bottom">
		<p>
			<?php 
				//$sql = "SELECT * FROM items"; 
				$rs_result = mysqli_query($connection, $sqlforpage); //run the query
				$total_records = mysqli_num_rows($rs_result);  //count number of records
				$total_pages = ceil($total_records / $num_rec_per_page); 
			?>

			<!--
			  <tr class="info">
					<th>
						<ul class="pager">
							<li class="previous"><a href='<?php echo 'sales.php?page='?>'>&larr; Previous</a></li>  
							<?php for ($i=1; $i<=$total_pages; $i++) { ?>
									<li><a href='<?php echo 'sales.php?page=' . $i; ?>'> <?php echo $i; ?></a></li> 
							<?php }; ?>
							<li class="next"><a href='sales.php?page=<?php echo $total_pages; ?>'>Next &rarr;</a> 
						</ul>
					</th>
			  </tr>

			  -->
		</p>

</div>
<!--
</td>
</tr>
</table>
-->
</div>


						<div class="modal fade" id="payment2" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
							<div class="modal-content" style="margin: 20% auto!important">

								<div class="modal-body">
									<form action="customer.php" method="post" id="cusPay">
										`Payment <hr>
										
										<div id="cusSide">
											<div class="input-group mtop-10">
												<span class="input-group-addon">Name</span>
												<input type="text" name="name" id="nameC" class="input-form">
											</div>
											<div class="input-group mtop-10">
												<span class="input-group-addon">Contact</span>
												<input type="number" name="contact" id="conC" class="input-form" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "11">
											</div>
<div id="checkCus"></div>
<input type="hidden" id="checkMe" value="0">
											<hr>

										</div>
										<div class="input-group mtop-10">
											<span class="input-group-addon">Total</span>
											<input type="text" name="total" id="pay" class="input-form">
											<span class="input-group-addon">Php</span>
										
										<!--	<span class="input-group-addon">Php</span> -->
										</div>
										<div class="input-group mtop-10">
											<span class="input-group-addon">Payment</span>
											<input type="text" id="ment" name="pay" class="input-form">
											<span class="input-group-addon">Php</span>
										
										<!--	<span class="input-group-addon">Php</span> -->
										</div>

										<div class="text-right mtop-10"><hr>
											<span class="btn btn-danger" id="cancel">Cancel</span>

											<span id="btnPay2" class="btn btn-success">Contnue</span>
										</div>
									</form>
								</div>	 
<script type="text/javascript">
	$("#cancel").click(function(){
		$("#payment2").css("display", "none");
	});

	$("#btnPay").click(function(){
		$("#payment2").css("opacity", "1");
		$("#payment2").show();
		
		$("#checkCart").load("checkCart.php");

		$("#pay").val($("#allT").text());

$("#checkCus").load("checkCus.php");
	});
	$("#btnPay2").click(function(){


		var pay = $("#pay").val();
		var ment = $("#ment").val();

		var ok1 = false;
		var ok2 = false;
		var ok3 = false;

		if((parseFloat(ment) >= parseFloat(pay))){

			$("#ment").css("border", "solid 1px #ccc");
			ok1 = true;
		}else{

			$("#ment").css("border", "solid 1px red");
			ok1 = false;
		}

		if($("#nameC").val() != ""){
			$("#nameC").css("border", "solid 1px #ccc");
			ok2 = true;
		}else{
			$("#nameC").css("border", "solid 1px red");
			ok2 = false;
		}

		if($("#conC").val() != ""){
			$("#conC").css("border", "solid 1px #ccc");
			ok3 = true;
		}else{
			$("#conC").css("border", "solid 1px red");
			ok3 = false;
		}

		if(ok1 && ok2 && ok3){
			$("#cusPay").submit();
		}

		if($("#checkMe").val() == '0'){
			$("#cusPay").submit();
		}
	});
</script>
 
							</div>
						  </div>
						</div>

						
<?php include("loader.php"); ?>
<?php
  // 5. Close database connection
	if (isset($connection)) {
	  mysqli_close($connection);
	}

?>
