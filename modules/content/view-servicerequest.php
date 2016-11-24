<?php
	   //print_r($_REQUEST['servicerequestid']);
	  
	   if(isset($_REQUEST['servicerequestid']))
	  {
	   $sql = "select * from ServiceRequest where id = '".$_REQUEST['servicerequestid']."' ";
	   $service = $obj->MySQLSelect($sql);	   
	   	   
	  	$Data['business_id'] = $service[0]['business_id'];
	  	$Data['user_id'] = $_SESSION['id'];
		$Data['serviceid'] = $_REQUEST['servicerequestid'];
		$Data['createdate'] = date("Y/m/d");
	  	$Data['order_status'] = "Inprocess";
	  	
	  	$id = $obj->MySQLQueryPerform("orders",$Data,'insert');
		
		if($Data['order_status'] = "Inprocess")
		{
			$abc= "select * from business where id = '".$service[0]['business_id']."' ";
			$busin = $obj->MySQLSelect($abc);
			$aaeew = $busin[0]['C2Bclicks']-1;
			$bus_id = $service[0]['business_id'];
			$Data1['C2Bclicks'] = $aaeew;
			//print_r($Data1['C2Bclicks']);	
			$where = " id = '".$bus_id."' ";
		    $idb = $obj->MySQLQueryPerform("business",$Data1,'update',$where);
			
		}
		
	  }
	   
	   if(isset($_REQUEST['sendreview']))
	  {
	  	$Data['business_id'] = $_REQUEST['busi_id'];
	  	$Data['Title'] = $_REQUEST['title'];
	  	$Data['Description'] = $_REQUEST['desc'];
	  	$Data['customer_id'] = $_SESSION['id'];
		$Data['service_id'] = $_REQUEST['service_id'];
	  	$Data['Review'] = $_REQUEST['reviewrate'];
		$Data['Createdate'] = date("Y/m/d");
	  	
	  	$id = $obj->MySQLQueryPerform("Reviews",$Data,'insert');
	  }
	   
	   $sql = "select * from user_private where name = '".$_SESSION['name']."'";
	   $userid = $obj->MySQLSelect($sql);
	   //print_r($userid);
	   
	  $sql = "select * from ServiceRequest where customer_id = '".$userid[0]['id']."' ORDER BY id DESC";
	   $servicerequestshow = $obj->MySQLSelect($sql);

?>
