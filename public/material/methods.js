$(function(){

function Computation()
{
   var discamt = parseFloat ($('#lblsubamt').text()) * parseFloat($('#txtdisc').val());  
   var subamt =  parseFloat ($('#lblsubamt').text()) - discamt;
   var changeamt =  parseFloat ($('#txtamttend').val()) - subamt;
   
   $('#lbldiscamt').html(numeral(discamt).format('0,0.00'));
   $('#lbltotamt').html(numeral(subamt).format('0,0.00'));
   $('#lblchange').html(numeral(changeamt).format('0,0.00'));
   
  // alert("Subamt: "+subamt+"  Disc Amt: "+discamt+" Change: "+changeamt);
   
}


$('#btnbillout').click(function(){
   Computation();
});

$('input:text').focus(function(){
     $(this).select();
});


$('#txtdisc').forceNumeric();
$('#txtdisc').change(function(){
	 var n =   numeral($(this).val()).format('0,0.00');	 	
	 $(this).val(n);
}); 


$('#txtamttend').forceNumeric();
/*
$('#txtamttend').change(function(){    
	 var n =   numeral($(this).val()).format('0,0.00');	 	
	 $(this).val(n);	 	 	 	 
	 if ( parseFloat(n) >= parseFloat($('#lbltotamt').text()) ){
	   
	 }	

	    Compute();
	 
 });

*/ 

 $('#txtamttend, #txtdisc').keyup(function(){
   Computation();
 });

 $('#txtamttend').key('enter', function(){
		   //alert('elow');
		 //  $('#lbltotamt').html($(this).val());
		  Computation();
});
 
 
$("#myModal").modal({backdrop: false});
 

$('#menusm').click(function(){
 $("#stockmaster").modal({backdrop: false});
});


$('#add').click(function(){
  $('#tblsales').append('<tr><td>1</td> <td>2</td> <td>3</td> <td class="price">100.01</td><td><button class="removebtn">Remove</button></td></tr>');   
  
  var sum = 0;
    // iterate through each td based on class and add the values
	$('.price').each(function() {
		var value = $(this).text();
		// add only if the value is number
		if(!isNaN(value) && value.length != 0) {
			sum += parseFloat(value);
		}
    });
	$('#lblsubamt').html(numeral(sum).format('0,0.00'));
	var tax = parseFloat($('#lblsubamt').text())*0.12;
    $('#lbltax').html(numeral(tax).format('0,0.00'));
	
	Computation();
	
});


$('#menusales').click(function(){
 $("#sales").modal({backdrop: false});
 $('#tblsales').html('');
 
 
});


 $('#btnlogin').click(function(){
 

 
     if ($('#username').val()=='admin' & $('#password').val()=='password')
	 {
	   $('#myModal').modal('toggle');
	 }
});


$('body').on('click','.removebtn',function(){
  alert('elow');
  $(this).closest('tr').remove();  
   
   var sum = 0;
    // iterate through each td based on class and add the values
	$('.price').each(function() {
		var value = $(this).text();
		// add only if the value is number
		if(!isNaN(value) && value.length != 0) {
			sum += parseFloat(value);
		}
    });
	$('#lblsubamt').html(numeral(sum).format('0,0.00'));	
	var tax = parseFloat($('#lblsubamt').text())*0.12;
    $('#lbltax').html(numeral(tax).format('0,0.00'));
	Computation();
  return false;		
});





}); // End of Jquery