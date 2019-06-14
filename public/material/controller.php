<?php

/*
date_default_timezone_set('Asia/Manila');
$DBhost = 'localhost';
$DBuser = 'bacolodc';
$DBpass = 'PerlaTupas10/10';
$DBName = "bacolodc_restodb";
*/



    $DBhost = "localhost";
    $DBuser = "root";
    $DBpass = "";
    $DBName = "resto_pos";   

	
    $db_handle = mysql_connect($DBhost,$DBuser,$DBpass) or die("Unable to connect to database");
    @mysql_select_db("$DBName") or die("Unable to select database $DBName");
     
    function CheckRecord($Sql)
	{
	     $res=mysql_query($sql);
		 
		 //echo $sql;

		 
		 $row=mysql_num_rows($res);
		 
			if ($row>0)
			{
			  echo "true";
			}
			else
			{
			 echo "false";
			}
			mysql_close($db_handle);
	}
	 

 if ($_POST['ltype']=='ipaddress')
     { 

        $ipaddress = $_SERVER["REMOTE_ADDR"];
       
	     $sql="select * from visitors where trim(ipaddress)='$ipaddress'";
		 $res=mysql_query($sql);		 
		 $row=mysql_num_rows($res);	 
		  
		 

		if ($row>0)
		{
				
		while($row = mysql_fetch_assoc($res)) {
        $visitcnt = $row["visitcnt"]+1;
		
        }

         $sql="update visitors set visitcnt='$visitcnt'";
		 $res=mysql_query($sql);
		 //echo "true";
		 
		
		}else{
		
		 $sql="insert into visitors (ipaddress,created_at,visitcnt)values(' $ipaddress',now(),1)";
		 $res=mysql_query($sql);
		 // echo "false";
		}
	   

	    
         mysql_close($db_handle);
		
		
     }
	 
	 if ($_POST['ltype']=='UserLogin')
     { 
	      $precinctno = $_POST['acctname'];
		  $password = 	$_POST['acctpass'];	  
		  //CheckRecord("select * from users where precintno='$precintno' and password='$password'");
		  //return;
		 
		 $sql="select * from users where precinctno='$precinctno' and password='$password'";
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
		 
		 /*
			if ($row>0)
			{
			  echo "true";
			}
			else
			{
			 echo "false";
			}
                 */			

               mysql_close($db_handle);
			
	 }
	 
	 
	 
	
	 
	 if ($_POST['ltype']=='passwordchange')
     { 
	      $oldpass = $_POST['oldpass'];
		  $newpass = 	$_POST['newpass'];
          $precinctno = $_POST['precinctno'];		  
		  //CheckRecord("select * from users where precintno='$precintno' and password='$password'");
		  //return;
		 
		 $sql="select * from users where precinctno='$precinctno' and password='$oldpass'";
		 
		 $res=mysql_query($sql);		 
		 $row=mysql_num_rows($res);		 
	 
		 

		if ($row>0)
		{
          
		    $sql="update users set password='$newpass' where precinctno='$precinctno' and password='$oldpass'";
		    $res=mysql_query($sql);		 
		  	
			  
			  if ($res)
			  {
			    echo "updated";
			  }else{
			     echo "false";
			  }
		  
		  
		}else{
		  echo "false";
		}

         mysql_close($db_handle);
			
	 }
	 
	 
	 
	 
 if ($_POST['ltype']=='AddCandidates')
     { 
	      $position = $_POST['position'];
		  $alias = $_POST['alias'];
		  $lname = $_POST['lname'];
		  $fname = $_POST['fname'];
		  $mname = $_POST['mname'];		  		 
		 		          
		 $sql="insert into candidates (alias,lastname,firstname,middlename,position)values('$alias','$lname','$fname','$mname','$position')";

		 $res=mysql_query($sql);
		// $row=mysql_num_rows($res);		 
			
			if ($res)
			{
			 echo "Record added.";
			}else{
			 echo 'error';
			}

                 mysql_close($db_handle);
			
	 }	 
	 

 if ($_POST['ltype']=='addUserPrecicnt')
     { 
	         $userprecinct = $_POST['userprecinct'];		 	  		 		 		          
		 $usertype = $_POST['usertype'];
                 $transtype = $_POST['transtype']; 
                if ($transtype == 'add')		 
		 {
		 $sql="insert into users (precinctno,password,type)values('$userprecinct','password','$usertype')";
		 //$sql="select * from users where userid='userprecinct'";
		  $message='Record added';
		  }else{
		  $sql="update users set type='$usertype' where precinctno='$userprecinct'";
		  $message='Record updated';
		  }
                  
		 // echo $sql;
		// return;
		 $res=mysql_query($sql);
		// $row=mysql_num_rows($res);		 
		 
			
			if ($res)
			{
			 echo $message;
			}else{
			 echo 'error';
			}

                 mysql_close($db_handle);
			
	 }	 	 
	 

if ($_POST['ltype']=='userexist')
     { 
	         $userprecinct = $_POST['userprecinct'];		 	  		 		 		          
                 
		 
                 $sql="select * from users where precinctno='$userprecinct'";
		 //echo $sql;
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

	 
/* backup original code
 if ($_POST['ltype']=='AddCandidates')
     { 
	      $position = $_POST['position'];
		  $alias = $_POST['alias'];
		  $lname = $_POST['lname'];
		  $fname = $_POST['fname'];
		  $mname = $_POST['mname'];		  		 
		  $id= $_POST['id'];
		  
		  $resSuccess;
         if ($id<=0)		  
		 // CheckRecord("select * from users where precintno='$precintno' and password=$password");		  		
		 {
		 $sql="insert into candidates (alias,lastname,firstname,middlename,position)values('$alias','$lname','$fname','$mname','$position')";
		       $resSuccess ="Record inserted";
		 }else{
		 
		       $sql = "update candidates set position='$position', alias='$alias', lastname='$lname', firstname='$fname', middlename='$mname' where id=$id";    
			   $resSuccess ="Record update"; 
		 }
		 $res=mysql_query($sql);
		// $row=mysql_num_rows($res);		 
			
			if ($res)
			{
			 echo $resSuccess;
			}else{
			 echo 'error';
			}						
	 }	 	 
	
*/

	 
 if ($_POST['ltype']=='UpdateCandidates')
     { 
	      $position = $_POST['position'];
		  $alias = $_POST['alias'];
		  $lname = $_POST['lname'];
		  $fname = $_POST['fname'];
		  $mname = $_POST['mname'];		  		 
		  $id= $_POST['id'];
  
		  $sql = "update candidates set position='$position', alias='$alias', lastname='$lname', firstname='$fname', middlename='$mname' where id=$id";    

		  $res=mysql_query($sql);
		// $row=mysql_num_rows($res);		 
			
			if ($res)
			{
			 echo 'Record updated.';
			}else{
			 echo 'error';
			}
                 mysql_close($db_handle);
			
	 }	 


	  if ($_POST['ltype']=='UpdateCandidates')
     { 
	      $position = $_POST['position'];
		  $alias = $_POST['alias'];
		  $lname = $_POST['lname'];
		  $fname = $_POST['fname'];
		  $mname = $_POST['mname'];		  		 
		  $id= $_POST['id'];
		  

		  $sql = "update candidates set position='$position', alias='$alias', lastname='$lname', firstname='$fname', middlename='$mname' where id=$id";    


		 $res=mysql_query($sql);
		// $row=mysql_num_rows($res);		 
			
			if ($res)
			{
			 echo 'Record updated.';
			}else{
			 echo 'error';
			}
                  mysql_close($db_handle);		
	 }	 

/*
	 if ($_POST['ltype']=='addScore')
     { 
  		 
		  $score= $_POST['score'];
		  $id = $_POST['id'];
	
         $sql = "select * from candidates where id=$id";  
         $res=mysql_query($sql);		  
         $row = mysql_fetch_row($res);		 
		// echo $row;
		// return;
		  
		  //$score = $row[6]+$score;
		  	//$score = $row[6];	  
		  $sql = "update candidates set vote_count=$score where id=$id";    
         		  
		 $res=mysql_query($sql);
		        
		
			if ($res)
			{
			 echo 'Score added';
			}else{
			 echo 'error';
			}						
	 }
	 
	*/
	
 if ($_POST['ltype']=='addScore')
     { 
  		 
		  $score= $_POST['score'];
		  $id = $_POST['id'];
		  $precinctno = $_POST['precinctno'];
		  

	
         $sql = "select * from realtimescore where candid=$id and precinct_no='$precinctno'";  
         $res=mysql_query($sql);		  
	 $num_row=mysql_num_rows($res);

	if ($num_row>0) 
        {
	  $sql = "update realtimescore set score=$score,transdate=now() where candid=$id and precinct_no='$precinctno'";     
	 }else{
	       
		$sql="insert into realtimescore (precinct_no,score,candid,transdate)values('$precinctno','$score',$id,now())";		  
		
	 }
	 
	 //echo $sql;
	 //return;

        // $row = mysql_fetch_row($res);		 
	//	 echo $row;
	//	 return;
		  
		  //$score = $row[6]+$score;
		  	//$score = $row[6];	  
		
         	


		
		 $res=mysql_query($sql);
		        
		
			if ($res)
			{
			 echo 'Score added';
			}else{
			 echo 'error';
			}						
	 }
	 
	
	 
	 
	 if ($_POST['ltype']=='DeleteCandidates')
     { 
  		 
		  $id= $_POST['id'];
		  

		  $sql = "delete from candidates where id=$id";    


		 $res=mysql_query($sql);
		// $row=mysql_num_rows($res);		 
			
			if ($res)
			{
			 echo 'Record deleted.';
			}else{
			 echo 'error';
			}

                 mysql_close($db_handle);		
	 }	 

	
//----------------------------	 Resto POS Methods start here. ------------------------------------- //
	 
	 if ($_POST['ltype']=='Menu_Items'){
	    
		$menu_items = $_POST['menu_items'];
		//echo $menu_items;
		//return;
		if (strtolower(trim($menu_items)) == 'all')		
		{
		$sql="Select * from menu_items";
		}else{
		$sql="SELECT * FROM `menu_items` WHERE trim(menu_code) like '%$menu_items%' OR trim(description) like '%$menu_items%'";
		}
		
		//echo $sql;
		//return;
		
		$query = mysql_query($sql);
		$num_row=mysql_num_rows($query);

		if ($num_row>0)
		{
		while($row = mysql_fetch_assoc($query))
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
	 
	 
	 
	 if ($_POST['ltype']=='Retrieve_Unpaid'){
	    
		$search = $_POST['search'];
		//echo $menu_items;
		//return;

		$sql="SELECT * FROM sales_hdr WHERE CONCAT_ws(cast(saleshdr_id as char),table_no,waiter) like '%$search%' and paid=0";

		
		//echo $sql;
		//return;
		
		$query = mysql_query($sql);
		$num_row=mysql_num_rows($query);

		if ($num_row>0)
		{
		while($row = mysql_fetch_assoc($query))
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
	 

	  if ($_POST['ltype']=='Retrieve_Unpaid_SalesDtl'){
	    
		$sales_hdrid = $_POST['sales_hdrid'];
		//echo $menu_items;
		//return;

		//$sql="SELECT * FROM sales_dtl WHERE saleshdr_id = $sales_hdrid";
$sql ="SELECT sales_dtl.*, menu_items.description FROM sales_dtl, menu_items WHERE sales_dtl.menu_code";
$sql =$sql."=menu_items.menu_code and sales_dtl.saleshdr_id=$sales_hdrid order by item_no";
		
		//echo $sql;
		//return;
		
		$query = mysql_query($sql);
		$num_row=mysql_num_rows($query);

		if ($num_row>0)
		{
		while($row = mysql_fetch_assoc($query))
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
	 
	 
 if ($_POST['ltype']=='Insert_Sales_dtl')
     {     
	     $item_no = $_POST['item_no'];
		 $menu_code = $_POST['menu_code'];
		 $qty=$_POST['qty'];
		 $ucost=$_POST['ucost'];
		 //$saleshdrid=$_POST['saleshdrid'];
		 
		// $sql ="SELECT MAX(saleshdr_id) AS saleshdr_id FROM sales_hdr";     
        $sql = "select saleshdr_id AS saleshdr_id from sales_hdr order by saleshdr_id desc limit 1";		 
		$res=mysql_query($sql);
		$row = mysql_fetch_assoc($res);
		$saleshdrid= $row['saleshdr_id'];
		 

		 $sql="insert into sales_dtl(menu_code,item_no,quantity,unit_cost,saleshdr_id)values('$menu_code',$item_no,$qty,$ucost,$saleshdrid)";
		 //echo $sql;
		// return;
		 $res=mysql_query($sql);
		      
/*     
	// Deducting menu ingridients in the Stock Inventory 
            $sql = "select * from ingredients where menu_code='$menu_code'";		 
		    $res=mysql_query($sql);		
            
			//echo $sql;
			//return;
			
            while($row = mysql_fetch_assoc($res))
		     {   
				
				$stock_code = trim($row['stock_code']);
				$quantity = $row['quantity']*$qty;
				$um = $row['um'];
				
				  $sql_inv = "select * from inventory_items where stock_code='$stock_code'";		 
  				  $res_inv=mysql_query($sql_inv);
				  $row = mysql_fetch_assoc($res_inv);
				  $inv_qty= $row['quantity']-$quantity;
				 // echo $inv_qty;
				 // return;
				echo "Stock Code ".$stock_code." Quantity ".$quantity." UM ".$um;
				
				//$sql = "update inventory_items set quantity=$inv_qty where trim(stock_code)='$stock_code'";		
				//echo $sql." ---";
				return;
		        $res=mysql_query($sql);		
				
				
				
			}
			
   			
			// Deducting menu ingridients in the Stock Inventory
*/ 
			  	
			if ($res)
			{					
			
			 echo 'added';
			}else{
			 echo 'error';
			}
		 
		 //echo $_POST['ncount'];//$item_no.' - '.$menu_code.' -'.$qty.'- '.$ucost;	         
		 

		 
	
	 }	 

if ($_POST['ltype']=='Insert_Sales_hdr')
     {     
	     $tblno = $_POST['tblno'];
		 $waiter = $_POST['waiter'];
		 $subamt=$_POST['subamt'];
		 $discamt=$_POST['discamt'];

		 $discpercent=$_POST['discpercent'];
		 $amttend=$_POST['amttend'];
		 $totamt=$_POST['totamt'];
		 $change=$_POST['change'];
	     $cuser=$_POST['cuser'];
		 
		 //$sql='insert into sales_hdr(table_no,waiter,sub_amount,disc_amount)values("'.$tblno.'","'.$waiter.'",'.$subamt.','.$discamt.')';
		$sql="insert into sales_hdr(table_no,waiter,sub_amount,disc_amount,percent_disc,amount_tendered,total_amount,amount_changed,trans_dt,user_id)";
		$sql = $sql."values('$tblno','$waiter',$subamt,$discamt,$discpercent,$amttend,$totamt,$change,now(),'$cuser')";
          // echo $sql;
			//return;
		$res=mysql_query($sql);
		

		
			if ($res)
			{
			 echo 'added';
			}else{
			 echo 'error';
			}
		 
		 //echo $_POST['ncount'];//$item_no.' - '.$menu_code.' -'.$qty.'- '.$ucost;	         
		 

		 
	
	 }	 














	 if ($_POST['ltype']=='Single_Items'){
	    
		$menu_code = trim($_POST['menu_code']);
				
		$sql="SELECT * FROM `menu_items` WHERE trim(menu_code) = '$menu_code'";
		
		
		//echo $sql;
		//return;
		
		$query = mysql_query($sql);
		$num_row=mysql_num_rows($query);

		if ($num_row>0)
		{
		while($row = mysql_fetch_assoc($query))
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






   if ($_POST['ltype']=='queryRec'){
	    
		
		
		//$sql="Select * from candidates where position='MAYOR' order by vote_count DESC";
                $sql = "SELECT sum(realtimescore.score) as 'score', candidates.* FROM realtimescore, candidates WHERE realtimescore.candid=candidates.id and candidates.position='MAYOR' group by realtimescore.candid order by score DESC";		
		//echo $sql;
		//return;
		$query = mysql_query($sql);
		
		
		$num_row=mysql_num_rows($query);

		if ($num_row>0)
		{
		while($row = mysql_fetch_assoc($query))
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


 if ($_POST['ltype']=='queryRecVice'){
	    
		
		
		//$sql="Select * from candidates where position='VICE MAYOR' order by vote_count DESC";		
		$sql = "SELECT sum(realtimescore.score) as 'score', candidates.* FROM realtimescore, candidates WHERE realtimescore.candid=candidates.id and candidates.position='VICE MAYOR' group by realtimescore.candid order by score DESC";		
		$query = mysql_query($sql);
		
		
		$num_row=mysql_num_rows($query);

		if ($num_row>0)
		{
		while($row = mysql_fetch_assoc($query))
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
	 
	 
	 
	 if ($_POST['ltype']=='queryRecScore'){
	    
		
		
		$sql="Select * from candidates where position='MAYOR' order by vote_count DESC";		
		$query = mysql_query($sql);
		
		
		$num_row=mysql_num_rows($query);

		if ($num_row>0)
		{
		while($row = mysql_fetch_assoc($query))
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
	 

	 // Vice Mayor
	 if ($_POST['ltype']=='queryRecScoreVice'){
	    
		
		
		$sql="Select * from candidates where position='VICE MAYOR' order by vote_count DESC";		
		$query = mysql_query($sql);
		
		
		$num_row=mysql_num_rows($query);

		if ($num_row>0)
		{
		while($row = mysql_fetch_assoc($query))
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
	 
	 
	 // Vice Mayor
	 
	 
	 
	 if ($_POST['ltype']=='GetSearchRecord'){
	    
		$id = $_POST['id'];
	
		$sql="Select * from candidates where id=$id";
		$query = mysql_query($sql);
		$num_row=mysql_num_rows($query);

		if ($num_row>0)
		{
		while($row = mysql_fetch_assoc($query))
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
	 



	 
   if ($_POST['ltype']=='VotersList'){
	    
		$precinctno = $_POST['precinctno'];
		
		
		
		
		//$sql="Select * from voters_list where precinct_no='$precinctno'";		
		$sql="Select voted,count(voted) as votedtot from voters_list where precinct_no='$precinctno' group by voted";		
		
		$query = mysql_query($sql);
		
		
		$num_row=mysql_num_rows($query);

		if ($num_row>0)
		{
		while($row = mysql_fetch_assoc($query))
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



 if ($_POST['ltype']=='individual'){
	    
		$precinctno = $_POST['precinctno'];
		$search = $_POST['search'];
		
		
		
		$sql="Select * from voters_list where precinct_no='$precinctno' and CONCAT_ws(lastname,firstname,middlename,votersno) like '%$search%'";		
		//$sql="Select voted,count(voted) as votedtot from voters_list where precinct_no='$precinctno' group by voted";		
		//echo $sql;
		//return;
		$query = mysql_query($sql);
		
		
		$num_row=mysql_num_rows($query);

		if ($num_row>0)
		{
		while($row = mysql_fetch_assoc($query))
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
		
		
	  //mysql_close($db_handle);
	 }



 if ($_POST['ltype']=='indvret'){
	    
		$precinctno = $_POST['precinctno'];
		$id = $_POST['id'];
		
		
		
		$sql="Select * from voters_list where precinct_no='$precinctno' and id=$id";		
		//$sql="Select voted,count(voted) as votedtot from voters_list where precinct_no='$precinctno' group by voted";		
		//echo $sql;
		//return;
		$query = mysql_query($sql);
		
		
		$num_row=mysql_num_rows($query);

		if ($num_row>0)
		{
		while($row = mysql_fetch_assoc($query))
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

	 
	 
	 
	    if ($_POST['ltype']=='searchRec'){
	    
		$precinctno = $_POST['precinctno'];
		$lname = $_POST['lname'];
		
		$sql="Select * from voters_list where precinct_no='$precinctno' and lastname like '%$lname%'";		
      //  echo $sql;
		//return;
		
		$query = mysql_query($sql);
		
		
		$num_row=mysql_num_rows($query);

		if ($num_row>0)
		{
		while($row = mysql_fetch_assoc($query))
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
	 


 if ($_POST['ltype']=='tag')
     { 	  		 			
		  $id= $_POST['id'];		  		 		 
		  $sql = "update voters_list set voted=1 where id=$id";            
		 $res=mysql_query($sql);
		 
		// $row=mysql_num_rows($res);		 
			
			if ($res)
			{
			 echo 'Record tag.';
			}else{
			 echo 'error';
			}		
      	// mysql_close($db_handle);	
	 }	 
	 


if ($_POST['ltype']=='untag')
     { 
	  		
 			
		  $id= $_POST['id'];
		  
		 
		  

		  $sql = "update voters_list set voted=0 where id=$id";    
        

		 $res=mysql_query($sql);
		// $row=mysql_num_rows($res);		 
			
			if ($res)
			{
			 echo 'Record untag.';
			}else{
			 echo 'error';
			}		
      	 //mysql_close($db_handle);	
	 }	 	 
	 
	 

// check lastname and firstname if exist

 if ($_POST['ltype']=='checkbylnamefname')
     { 
	      $lname = $_POST['lname'];
		  $fname = 	$_POST['fname'];	  
		  //CheckRecord("select * from users where precintno='$precintno' and password='$password'");
		  //return;
		 
		 $sql="select * from candidates where lastname='$lname' and firstname='$fname'";
		 
		 $res=mysql_query($sql);
		 $row=mysql_num_rows($res);		 
      
			if ($row>0)
			{
			  echo "true";
			}
			else
			{
			 echo "false";
			}	
       
	    mysql_close($db_handle);
			
	 }
// check lastname and firstname if exist



if ($_POST['ltype']=='TotalVoters')
     { 
	    $sql="Select * from total_voters";		
		$query = mysql_query($sql);
		
		
		$num_row=mysql_num_rows($query);

		if ($num_row>0)
		{
		while($row = mysql_fetch_assoc($query))
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
	 }


    if ($_POST['ltype']=='voted'){
	    
		
		$sql="SELECT precinct_no, count(precinct_no) as 'voted' FROM `voters_list` WHERE voted=1 group by precinct_no";		
       // echo $sql;
		//return;
		
		$query = mysql_query($sql);
		
		
		
		$num_row=mysql_num_rows($query);

		if ($num_row>0)
		{
		while($row = mysql_fetch_assoc($query))
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

	    if ($_POST['ltype']=='unvoted'){
	    
		
		$sql="SELECT precinct_no, count(precinct_no) as 'voted' FROM `voters_list` WHERE voted=0 group by precinct_no";		
      //  echo $sql;
		//return;
		
		$query = mysql_query($sql);
		
		
		$num_row=mysql_num_rows($query);

		if ($num_row>0)
		{
		while($row = mysql_fetch_assoc($query))
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



   if ($_POST['ltype']=='votedbrgy'){
	    
		
		$sql="SELECT precinct_no, brgyname, count(brgyname) as 'voted' FROM `voters_list` WHERE voted=1 group by precinct_no,brgyname";		
       // echo $sql;
		//return;
		
		$query = mysql_query($sql);
		
		
		
		$num_row=mysql_num_rows($query);

		if ($num_row>0)
		{
		while($row = mysql_fetch_assoc($query))
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

	    if ($_POST['ltype']=='unvotedbrgy'){
	    
		
		$sql="SELECT precinct_no, brgyname, count(brgyname) as 'voted' FROM `voters_list` WHERE voted=0 group by precinct_no,brgyname";		
      //  echo $sql;
		//return;
		
		$query = mysql_query($sql);
		
		
		$num_row=mysql_num_rows($query);

		if ($num_row>0)
		{
		while($row = mysql_fetch_assoc($query))
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
	 
	

if ($_POST['ltype']=='votedvoters'){
	    
		
		$sql="SELECT * FROM `voters_list` WHERE voted=1" ;		
		
		$query = mysql_query($sql);
		
		
		
		$num_row=mysql_num_rows($query);

		if ($num_row>0)
		{
		while($row = mysql_fetch_assoc($query))
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

	    if ($_POST['ltype']=='unvotedvoters'){
	    
		
		$sql="SELECT * FROM `voters_list` WHERE voted=0" ;			
        //echo $sql;
		//return;
		
		$query = mysql_query($sql);
		
		
		$num_row=mysql_num_rows($query);

		if ($num_row>0)
		{
		while($row = mysql_fetch_assoc($query))
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
	 
	 
	 	 if ($_POST['ltype']=='deluser')
     { 
  		 
		  $precinctno= $_POST['precinctno'];
		  

		  $sql = "delete from users where precinctno=$precinctno";    


		 $res=mysql_query($sql);
		// $row=mysql_num_rows($res);		 
			
			if ($res)
			{
			 echo 'true';
			}else{
			 echo 'false';
			}

                 mysql_close($db_handle);	
	 }	 
	 
	 
    if ($_POST['ltype']=='testload'){
	    
		$paratxt=$_POST['paratxt'];
				
		$sql="SELECT * from testdata where refno='$paratxt'";				
       // echo $sql;
		//return;
		
		$query = mysql_query($sql);
		
		
		$num_row=mysql_num_rows($query);

		if ($num_row>0)
		{
		while($row = mysql_fetch_assoc($query))
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


   if ($_POST['ltype']=='testloadnumrec'){
	    
		
		$numrec=$_POST['numrec'];
		
		
		$sql="SELECT * from testdata limit $numrec";		
       // echo $sql;
		//return;
		
		$query = mysql_query($sql);
		
		
		$num_row=mysql_num_rows($query);

		if ($num_row>0)
		{
		while($row = mysql_fetch_assoc($query))
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
	 
     if ($_POST['ltype']=='xtestcount'){
	    
		
		
		//$sql="SELECT * from testdata where refno='594419'";		
$q = mysql_query("select * from testdata");
$c = mysql_num_rows($q);
echo $c;
		
       // echo $sql;
		return;
		
		$query = mysql_query($sql);
		
		
		$num_row=mysql_num_rows($query);

		if ($num_row>0)
		{
		while($row = mysql_fetch_assoc($query))
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
	 
	 
 //calculate years of age (input string: YYYY-MM-DD)
  function birthday ($birthday){
    list($year,$month,$day) = explode("-",$birthday);
    $year_diff  = date("Y") - $year;
    $month_diff = date("m") - $month;
    $day_diff   = date("d") - $day;
    if ($day_diff < 0 || $month_diff < 0)
      $year_diff--;
    return $year_diff;
	}

function strtodate($dateStr)
{   
   //$time = strtotime( $curdate );
   //$myDate = date( 'Y-m-d', $time );
   $newDate = date("Y-m-d", strtotime( $dateStr ) );   
   return  $newDate;
}


function Insert($sql)
{  
 mysql_query($sql);
 //mysql_close();
 echo '<script>alert("Record Inserted!")</script>';  
}

function saveMode($mode)
{  
   if ($mode=="true")
   {
      echo 'disabled="true"';
   }else{echo "";}
}

function addMode($mode)
{   
   if ($mode=="true")
   {
      echo 'disabled="true"';
   }else{echo "";}
}

function editMode($mode)
{   
   if ($mode=="true")
   {
      echo 'disabled="true"';
   }else{echo "";}
}

function delMode($mode)
{
   if ($mode=="true")
   {
      echo 'disabled="true"';
   }else{echo "";}
}

/*
function toolbar($S,$A,$E,$D)
{

echo '<div style="margin-bottom:5px; float:left">
<table>
<tr>
<td><BUTTON style="width:70px" '.$S.'type="submit" NAME=saveBtn id=submit value=save ACCESSKEY=S>Save <IMG SRC="images/savebtn.png"  ALT=""> </BUTTON></td>

<td><BUTTON style="width:70px"'.$A.'type="submit" NAME=addBtn id=submit value=add ACCESSKEY=A>Add <IMG align="middle" SRC="images/Addbtn.png" ALT=""></BUTTON>
</td>

<td><BUTTON style="width:70px"'.$E.'type="submit" NAME=editBtn id=submit value=edit ACCESSKEY=E>Edit <IMG align="middle" SRC="images/editbtn.png" ALT=""></BUTTON></td>

<td><BUTTON style="width:70px"'.$D.'type="submit" NAME=deleteBtn id=submit value=delete ACCESSKEY=D>Delete <IMG align="middle" SRC="images/Deletebtn.png" ALT="">  </BUTTON></td>

</tr>
</table>

</div> 
';

}
*/

?>
