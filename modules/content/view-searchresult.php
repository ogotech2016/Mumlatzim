<?php
	session_start();
	
	if(isset($_POST['showresult'])){
		
	$_SESSION['category']= $_REQUEST['selectcategory'];
	
	$_SESSION['location'] = $_REQUEST['selectlocation'];
	
		
	}	
	if(!empty($_SESSION['location']))
	{
	//$sql = "select * from business where Mainaddress LIKE '".$location."%' AND  category LIKE '".$ctegory."%' AND Status='1'" ;
	//$sql = "select * from business where category LIKE '".$ctegory."%'";
	//$sql = "select * from business where (Mainaddress LIKE '".$_SESSION['location']."%' OR Mainaddress1 LIKE '".$_SESSION['location']."%' OR Mainaddress2 LIKE '".$_SESSION['location']."%' OR Mainaddress3 LIKE '".$_SESSION['location']."%' OR Mainaddress4 LIKE '".$_SESSION['location']."%') AND  category LIKE '".$_SESSION['category']."%' AND Status='1'" ;
	
	$sql = "select * from business where (Mainaddress LIKE '".$_SESSION['location']."%' OR Mainaddress1 LIKE '".$_SESSION['location']."%' OR Mainaddress2 LIKE '".$_SESSION['location']."%' OR Mainaddress3 LIKE '".$_SESSION['location']."%' OR Mainaddress4 LIKE '".$_SESSION['location']."%') AND  (category LIKE '".$_SESSION['category']."%' OR category1 LIKE '".$_SESSION['category']."%' OR category2 LIKE '".$_SESSION['category']."%' OR category3 LIKE '".$_SESSION['category']."%' OR category4 LIKE '".$_SESSION['category']."%') AND availability='0' AND Status='1'" ;
	
    $showresult = $obj->MySQLSelect($sql);
	//print_r($showresult);
	}
	else{
		$showresult = '';
	}
	//print_r($showresult);
	
	// searching code
	
	if(isset($_GET['sendrequest']))
	{
	   $id = $_GET['sendrequest'];
	   $sql = "select * from business where id = '".$id."' ";
	   $sendrequest = $obj->MySQLSelect($sql);
	   
	   $username = $_SESSION['name'];
	   $sql = "select * from user_private where name = '".$username."' ";
	   $sendrequestuser = $obj->MySQLSelect($sql);
	   //print_r($sendrequest[0]['Email']);
	   //print_r($sendrequestuser);
	   $Data['customer_id'] = $sendrequestuser[0]['id'];
	   $Data['business_id'] = $sendrequest[0]['id'];
	   $Data['Industry'] = $sendrequest[0]['category'];
	   $Data['SubsIndustry'] = $sendrequest[0]['SubIndustry'];
	   $Data['Cname'] = $sendrequestuser[0]['name'];
	   $Data['Creationtime'] = date("Y/m/d");
	   $Data['Bname'] =$sendrequest[0]['Name'];
	   $Data['Bphone'] =$sendrequest[0]['Phone'];
	   $Data['Status'] = 'Inactive';
	   $id = $obj->MySQLQueryPerform("ServiceRequest",$Data,'insert');
	   
	   header('Location: index.php?file=sr-servicerequest&servicerequestid='.$id);
	   
	}
	
	if(isset($_POST['businessid']))
	{
	   $id = $_POST['businessid'];
	   $Data['user_id'] = $_SESSION['id'];
	   $Data['business_id'] = $id;
	   $Data['Creationtime'] = date("Y/m/d");
	   $Data['status'] = 1;
	   $id = $obj->MySQLQueryPerform("favourite",$Data,'insert');
	   
	}
	
	
?>