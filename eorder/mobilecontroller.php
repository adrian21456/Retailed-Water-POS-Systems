<?php require_once("../includes/db_connection.php"); ?>
<?php include("../includes/layouts/functions.php"); ?> 
<?php 
date_default_timezone_set('Asia/Manila');

/*
$DBhost = 'localhost';
$DBuser = 'bacolodc';
$DBpass = 'PerlaTupas10/10';
$DBName = "bacolodc_restodb";
*/



    $DBhost = "localhost";
    $DBuser = "root";
    $DBpass = "";
    $DBName = "dbhanz_restaurant";   

	
    $db_handle = mysql_connect($DBhost,$DBuser,$DBpass) or die("Unable to connect to database");
    @mysql_select_db("$DBName") or die("Unable to select database $DBName");
     



	 
	 
if ($_POST['lType']=='SearchItems')
     { 
	         $search = trim($_POST['search']);		 	  		 		 		          
/*               
if $search=='')	{
	 $sql="select * from items where trim(category)=='Specialty'";
	
}	else{   
		 
                 $sql="select * from items where CONCAT_ws(cast(id as char),name,category) like '%$search%'";
	 }
	 */
	  $sql="select * from items where CONCAT_ws(cast(id as char),name,category) like '%$search%' order by name";
		// echo $sql;
		// return;
		 
		 $res=mysql_query($sql);		 
		 $row=mysql_num_rows($res);		 
                 
		 

		if ($row>0)
		{
		while($row = mysql_fetch_assoc($res))
		{   
			foreach($row as $key => $value)
			{    $arr[$key] = $value; }

			$main_arr[] = $arr;
		}

		$json = json_encode($main_arr);
		echo $json;
		}else{
		  echo "false";
		}

                 mysql_close($db_handle);
			
	 }	 	 

	 
if ($_POST['lType']=='Fill')
     { 
		 
$cat=trim($_POST['cat']);		 
                 
		 
                 $sql="SELECT * FROM `items` WHERE trim(category)='$cat' order by name";
		//echo $sql;
		//return;
		 
		 $res=mysql_query($sql);		 
		 $row=mysql_num_rows($res);		 
                 
		 

		if ($row>0)
		{
		while($row = mysql_fetch_assoc($res))
		{   
			foreach($row as $key => $value)
			{    $arr[$key] = $value; }

			$main_arr[] = $arr;
		}

		$json = json_encode($main_arr);
		echo $json;
		}else{
		  echo "false";
		}

                 mysql_close($db_handle);
			
	 }		 
	 
if ($_POST['lType']=='all')
     { 
		 

		 
                // $sql="SELECT * FROM `items` where trim(category)='Specialty'";
				$sql="SELECT * FROM `items` order by name";
		//echo $sql;
		//return;
		 
		 $res=mysql_query($sql);		 
		 $row=mysql_num_rows($res);		 
                 
		 

		if ($row>0)
		{
		while($row = mysql_fetch_assoc($res))
		{   
			foreach($row as $key => $value)
			{    $arr[$key] = $value; }

			$main_arr[] = $arr;
		}

		$json = json_encode($main_arr);
		echo $json;
		}else{
		  echo "false";
		}

                 mysql_close($db_handle);
			
	 }		 	 


if ($_POST['lType']=='SaleItems')
{ 
$id = $_POST['id'];	
$rprice = $_POST['rprice'];	

							 

      if (!$connection) {
              die("Connection failed: " . mysqli_connect_error());
          }
		  
		  

          // select all from items
	                   
					   	$salestrans = mysqli_query($connection, "SELECT * FROM items WHERE id={$id}");
						while($row = mysqli_fetch_array($salestrans)){
						$transid = $row['id'];
						$transprice = $row['retailprice'];
						$total = $row['retailprice'] * 1;
						
						//session_start();
						//$_SESSION['cat'] = $row['category'];
						
						}

						
			   $checkdup= mysqli_query($connection, "SELECT * FROM saleslog WHERE itemid = {$transid}");
	          
					while($rows = mysqli_fetch_array($checkdup)){
						$quantity= $rows['qty'] + 1;
						$saleslogprice=$rows['price'];

						//$total = $transprice * $quantity;
						$total = $saleslogprice * $quantity;
				   if ($rows['itemid'] == $id) {
							echo "match";
							$sql = "UPDATE saleslog set qty ={$quantity}, total = {$total} WHERE itemid ={$transid}";
							if (mysqli_query($connection, $sql)) {
								redirect_to("sales.php");
								break;
								} else {
							echo "false " ;
							}
				   							   		   
			    } else {
 
						   }
						   
					   }
					   //$date = date("Y-m-d H:i:s");
							date_default_timezone_set('Asia/Manila');
							$petsa = date("Y-m-d H:i:s");
							//echo $petsa;
							$checktype= mysqli_query($connection, "SELECT * FROM saleslog");
							 while($rows = mysqli_fetch_array($checktype)){
							 $saleslogdisctype=$rows['disctype'];
						     $saleslogdisc=$rows['disc'];
							 }
                            
							$sql="INSERT INTO saleslog(saleslog.itemid, saleslog.qty, saleslog.date, saleslog.total,saleslog.price,saleslog.disc,saleslog.disctype) VALUES ($transid, 1, '$petsa', $total,$rprice,$saleslogdisc,'$saleslogdisctype')";
							if (!mysqli_query($connection,$sql)) {
							redirect_to("sales.php");
								break;
							  die('false');
							}
							redirect_to("sales.php");
}







if ($_POST['lType']=='CheckTable'){
	

  $table = trim($_POST['table']);		 	  		 		 		          
                 
		 
                 $sql="select * from holdlog where trim(reference)='$table' ";
		// echo $sql;
		// return;
		 
		 $res=mysql_query($sql);		 
		 $row=mysql_num_rows($res);		 
                 
		 

		if ($row>0)
		{
		
		echo "true";
		}else{
		  echo "false";
		}

                 mysql_close($db_handle);
	
}



if ($_POST['lType']=='AddRecipe'){
	

  $id = trim($_POST['id']);		 	  		 		 		          
                 
		 
                 $sql="select * from holdlog where trim(reference)='$table' ";
		// echo $sql;
		// return;
		 
		 $res=mysql_query($sql);		 
		 $row=mysql_num_rows($res);		 
                 
		 

		if ($row>0)
		{
		
		echo "true";
		}else{
		  echo "false";
		}

                 mysql_close($db_handle);
	
}


if ($_POST['lType']=='AddPrice'){
	
  $id = $_POST['id'];		 	  		 		 		          
  $qty =   $_POST['qty'];
  $price =   $_POST['price'];  
  $priceorig =   $_POST['priceorig'];  
  
  if ($priceorig>0){
  
		 
         $sql="update saleslog set qty=$qty, total=$price, price=$priceorig where id=$id ";

  }else{
     
	 if ($price<0)
	 {
	  $sql="update saleslog set qty=1, total=$price, price=$price where id=$id ";
	 }else{
		 $sql="update saleslog set qty=$qty, total=$price where id=$id "; 
	 }
  }	 
		



		$res=mysql_query($sql);		 
	 
                 
		 

		if ($res)
		{
		
		echo "true";
		}else{
		  echo "false";
		}

                 mysql_close($db_handle);
	
}



if ($_POST['lType']=='CustomPrice')
     { 
	         //$search = trim($_POST['search']);		 	  		 		 		          
                 
		 
                 //$sql="select * from items where CONCAT_ws(cast(id as char),name,category) like '%$search%'";
				 $sql="select * from items where retailprice=0";
				 
		// echo $sql;
		// return;
		 
		 $res=mysql_query($sql);		 
		 $row=mysql_num_rows($res);		 
                 
		 

		if ($row>0)
		{
		while($row = mysql_fetch_assoc($res))
		{   
			foreach($row as $key => $value)
			{    $arr[$key] = $value; }

			$main_arr[] = $arr;
		}

		$json = json_encode($main_arr);
		echo $json;
		}else{
		  echo "false";
		}

                 mysql_close($db_handle);
			
	 }	 	




if ($_POST['lType']=='MobileSalesItems')
     { 
		 
$id=trim($_POST['id']);		 
                 
		 
                 $sql="SELECT * FROM `items` WHERE id=$id";
		//echo $sql;
		//return;
		 
		 $res=mysql_query($sql);		 
		 $row=mysql_num_rows($res);		 
                 
		 

		if ($row>0)
		{
		while($row = mysql_fetch_assoc($res))
		{   
			foreach($row as $key => $value)
			{    $arr[$key] = $value; }

			$main_arr[] = $arr;
		}

		$json = json_encode($main_arr);
		echo $json;
		}else{
		  echo "false";
		}

                 mysql_close($db_handle);
			
	 }	





if ($_POST['lType']=='allcat')
     { 
	         	  		 		 		          

	  $sql="select * from category order by category";
		// echo $sql;
		 $res=mysql_query($sql);		 
		 $row=mysql_num_rows($res);		 
                 
		 

		if ($row>0)
		{
		while($row = mysql_fetch_assoc($res))
		{   
			foreach($row as $key => $value)
			{    $arr[$key] = $value; }

			$main_arr[] = $arr;
		}

		$json = json_encode($main_arr);
		echo $json;
		}else{
		  echo "false";
		}

                 mysql_close($db_handle);
		 
		 
	 }	 



if ($_POST['lType']=='OrderList')
     { 
	    $itemid = $_POST["itemid"];
		$qty = $_POST["qty"];
        $price = $_POST["price"];
		$total = $_POST["total"];
		$ref = trim($_POST["ref"]);
		$disc = $_POST["disc"];
		$waiter = $_POST["waiter"];
		
	     $sql="select * from holdlog where itemid=$itemid and trim(reference)='$ref'";
       
		// echo $sql;
		//return;
		 
		 $res=mysql_query($sql);		 
		 $row=mysql_num_rows($res);	 
     
		 $status='false';

		// echo $row;
		//return;
		if ($row>0)
		{
				


         $sql="update holdlog set qty='$qty', total=$total, price=$price, waiter='$waiter' where itemid=$itemid and trim(reference)='$ref'";
		// echo $sql;
		// return;
		 
		 $res=mysql_query($sql);
		 $status='true';
		 
		
		}else{
		
		 $sql="insert into holdlog (itemid,qty,price,total,disc,reference,date,waiter)values($itemid,$qty,$price,$total,$disc,'$ref',now(),'$waiter')";
		 //echo $sql;
		// return;
		 
		 $res=mysql_query($sql);
		  $status='true';
		}
	   

	    echo $status;
         mysql_close($db_handle);
	 }		   


if ($_POST['lType']=='CheckRefExist')
     { 

		$ref = trim($_POST["ref"]);

		
	     $sql="select * from holdlog where trim(reference)='$ref'";
       
		// echo $sql;
		//return;
		 
		 $res=mysql_query($sql);		 
		 $row=mysql_num_rows($res);	 
     
		 $status='false';

		if ($row>0)
		{

		 $status='true';
		 
		
		}else{

		  $status='false';
		}
	   

	    echo $status;
         mysql_close($db_handle);
	 }	
	 
	 
if ($_POST['lType']=='CuingOrder')
     { 
		 
                $cat=$_POST['cat'];
		        if ($cat=='grilled'){
                 $sql="SELECT holdlog.*,items.name FROM `holdlog` inner join items on holdlog.itemid = items.id and items.category='specialty' and holdlog.done=0 order by date, reference";
				//  $sql="SELECT distinct date,reference from holdlog order by date, reference";
               // echo $cat;
               // return;				
			   }
				
				 if ($cat=='main'){
                 $sql="SELECT holdlog.*,items.name FROM `holdlog` inner join items on holdlog.itemid = items.id and items.category!='specialty' and holdlog.done=0 order by date, reference";
				//  $sql="SELECT distinct date,reference from holdlog order by date, reference";
	            // echo $sql.' '.$cat;
               // return;	
				}
				
				if ($cat=='all'){
                 $sql="SELECT holdlog.*,items.name FROM `holdlog` inner join items on holdlog.itemid = items.id  and holdlog.done=0 order by date, reference";
				//  $sql="SELECT distinct date,reference from holdlog order by date, reference";
	            //  echo $sql.' '.$cat;
               // return;	
				}
		//echo $sql;
		//return;
		 
		 $res=mysql_query($sql);		 
		 $row=mysql_num_rows($res);		 
                 
		 

		if ($row>0)
		{
		while($row = mysql_fetch_assoc($res))
		{   
			foreach($row as $key => $value)
			{    $arr[$key] = $value; }

			$main_arr[] = $arr;
		}

		$json = json_encode($main_arr);
		echo $json;
		}else{
		  echo "false";
		}

                 mysql_close($db_handle);
			
	 }		 


if ($_POST['lType']=='CuingOrdernotrealtime')
     { 
		 
                $cat=$_POST['cat'];
		        if ($cat=='grilled'){
                 $sql="SELECT holdlog.*,items.name FROM `holdlog` inner join items on holdlog.itemid = items.id and items.category='specialty'  order by date, reference";
				//  $sql="SELECT distinct date,reference from holdlog order by date, reference";
               // echo $cat;
               // return;				
			   }
				
				 if ($cat=='main'){
                 $sql="SELECT holdlog.*,items.name FROM `holdlog` inner join items on holdlog.itemid = items.id and items.category!='specialty'  order by date, reference";
				//  $sql="SELECT distinct date,reference from holdlog order by date, reference";
	            // echo $sql.' '.$cat;
               // return;	
				}
				
				if ($cat=='all'){
                 $sql="SELECT holdlog.*,items.name FROM `holdlog` inner join items on holdlog.itemid = items.id   order by date, reference";
				//  $sql="SELECT distinct date,reference from holdlog order by date, reference";
	            //  echo $sql.' '.$cat;
               // return;	
				}
		//echo $sql;
		//return;
		 
		 $res=mysql_query($sql);		 
		 $row=mysql_num_rows($res);		 
                 
		 

		if ($row>0)
		{
		while($row = mysql_fetch_assoc($res))
		{   
			foreach($row as $key => $value)
			{    $arr[$key] = $value; }

			$main_arr[] = $arr;
		}

		$json = json_encode($main_arr);
		echo $json;
		}else{
		  echo "false";
		}

                 mysql_close($db_handle);
			
	 }		 	 

if ($_POST['lType']=='DoneOrder'){
	
  $ref = $_POST['ref'];		 	  		 		 		          
  $cat = $_POST['cat'];
  

  
		if ($cat=='all') {
			  if ($ref==''){
				  $sql="update holdlog, items set holdlog.done=1";
			  }else{
               $sql="update holdlog, items set holdlog.done=1 where holdlog.itemid=items.id and trim(holdlog.reference)='$ref'";
			  }
        }else{
			if($ref!=''){
				
				if ($cat=='grilled'){
					
					$sql="update holdlog, items set holdlog.done=1 where holdlog.itemid=items.id and holdlog='$ref' and items.category='Specialty'";
				}
				if ($cat=='main'){
					
					$sql="update holdlog, items set holdlog.done=1 where holdlog.itemid=items.id and trim(holdlog.reference)='$ref' and items.category!='Specialty'";
				}
				
			}else{
			     if ($cat=='grilled'){
					
					$sql="update holdlog, items set holdlog.done=1 where holdlog.itemid=items.id and  items.category='Specialty'";
				}
				if ($cat=='main'){
					
					$sql="update holdlog, items set holdlog.done=1 where holdlog.itemid=items.id and items.category!='Specialty'";
				}
			}
		}	  		 		 		          

  

  
		 
       //  $sql="update holdlog set done=1 where reference='$ref'";
        // echo $sql;
		// return;

		



		$res=mysql_query($sql);		 
	 
                 
		 

		if ($res)
		{
		
		echo "true";
		}else{
		  echo "false";
		}

                 mysql_close($db_handle);
	
}

if ($_POST['lType']=='RecallOrder'){
	
  $ref = $_POST['ref'];		 	  		 		 		          
  $cat = $_POST['cat'];
  

  
		if ($cat=='all') {
			  if ($ref==''){
				  $sql="update holdlog, items set holdlog.done=0";
			  }else{
               $sql="update holdlog, items set holdlog.done=0 where holdlog.itemid=items.id and trim(holdlog.reference)='$ref'";
			  }
        }else{
			if($ref!=''){
				
				if ($cat=='grilled'){
					
					$sql="update holdlog, items set holdlog.done=0 where holdlog.itemid=items.id and holdlog='$ref' and items.category='Specialty'";
				}
				if ($cat=='main'){
					
					$sql="update holdlog, items set holdlog.done=0 where holdlog.itemid=items.id and trim(holdlog.reference)='$ref' and items.category!='Specialty'";
				}
				
			}else{
			     if ($cat=='grilled'){
					
					$sql="update holdlog, items set holdlog.done=0 where holdlog.itemid=items.id and  items.category='Specialty'";
				}
				if ($cat=='main'){
					
					$sql="update holdlog, items set holdlog.done=0 where holdlog.itemid=items.id and items.category!='Specialty'";
				}
			}
		}
         //echo $sql;
		 //return;

		



		$res=mysql_query($sql);		 
	 
                 
		 

		if ($res)
		{
		
		echo "true";
		}else{
		  echo "false";
		}

                 mysql_close($db_handle);
	
}


if ($_POST['lType']=='DoneOrderItem'){
	
  $ref = $_POST['ref'];		 	  		 		 		          

  

//  SELECT concat_ws(trim(reference),'',trim(cast(itemid as char))) as id FROM `holdlog` where concat_ws(trim(reference),'',trim(cast(itemid as char)))='124'
		 
         $sql="update holdlog set done=1 where concat_ws(trim(reference),'',trim(cast(itemid as char)))='$ref'";
       // echo $sql;
		//return;

		



		$res=mysql_query($sql);		 
	 
                 
		 

		if ($res)
		{
		
		echo "true";
		}else{
		  echo "false";
		}

                 mysql_close($db_handle);
	
}



if ($_POST['lType']=='RecallOrderItem'){
	
  $ref = $_POST['ref'];		 	  		 		 		          

  

//  SELECT concat_ws(trim(reference),'',trim(cast(itemid as char))) as id FROM `holdlog` where concat_ws(trim(reference),'',trim(cast(itemid as char)))='124'
		 
         $sql="update holdlog set done=0 where concat_ws(trim(reference),'',trim(cast(itemid as char)))='$ref'";
       // echo $sql;
		//return;

		



		$res=mysql_query($sql);		 
	 
                 
		 

		if ($res)
		{
		
		echo "true";
		}else{
		  echo "false";
		}

                 mysql_close($db_handle);
	
}


if ($_POST['lType']=='SearchOrder')
     { 
		 
             $ref=$_POST['ref'];   
		     $cat=$_POST['cat'];
		        if ($cat=='grilled'){
					
			      if ($ref==''){		
                 $sql="SELECT holdlog.*,items.name FROM `holdlog` inner join items on holdlog.itemid = items.id and items.category='specialty' order by date, reference";
				  }else{
					  
					$sql="SELECT holdlog.*,items.name FROM `holdlog` inner join items on holdlog.itemid = items.id and items.category='specialty' and holdlog.reference='$ref' order by date, reference";  
				  }
				//  $sql="SELECT distinct date,reference from holdlog order by date, reference";
				}
				
				if ($cat=='main'){
					
					 if ($ref==''){	
                         $sql="SELECT holdlog.*,items.name FROM `holdlog` inner join items on holdlog.itemid = items.id and items.category!='specialty' order by date, reference";
					 }else{
						 
						 $sql="SELECT holdlog.*,items.name FROM `holdlog` inner join items on holdlog.itemid = items.id and items.category!='specialty' and holdlog.reference='$ref' order by date, reference";
					 }
				//  $sql="SELECT distinct date,reference from holdlog order by date, reference";
				}
				
				if ($cat=='all'){
					if ($ref==''){	
                     $sql="SELECT holdlog.*,items.name FROM `holdlog` inner join items on holdlog.itemid = items.id  order by date, reference";
				    }else{
						$sql="SELECT holdlog.*,items.name FROM `holdlog` inner join items on holdlog.itemid = items.id and holdlog.reference='$ref' order by date, reference";
					}
				//  $sql="SELECT distinct date,reference from holdlog order by date, reference";
				}
		//echo $sql;
		//return;
		 
		 $res=mysql_query($sql);		 
		 $row=mysql_num_rows($res);		 
                 
		 

		if ($row>0)
		{
		while($row = mysql_fetch_assoc($res))
		{   
			foreach($row as $key => $value)
			{    $arr[$key] = $value; }

			$main_arr[] = $arr;
		}

		$json = json_encode($main_arr);
		echo $json;
		}else{
		  echo "false";
		}

                 mysql_close($db_handle);
			
	 }		 	 
?>