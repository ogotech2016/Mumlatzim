<?php
session_start();
 // print_r($_SESSION['sess_lbl_pref']);
	if(!empty($_SESSION['FULLNAME']))
	{
	  
	$email = $_SESSION['EMAIL'];
    $username = $_SESSION['FULLNAME'];
    $sql2 = "select * from user_private where email ='".$email."'";
	$registeruser = $obj->MySQLSelect($sql2);
	
	if(!empty($registeruser)){
	  $_SESSION['name'] = $registeruser[0]['name'];
	  $_SESSION['email'] = $registeruser[0]['email'];
	  $_SESSION['id'] = $registeruser[0]['id'];
	  //header('Location: ' . $tconfig['tsite_url']);
				
	  //header("location: index.php?file=s-searchresult");
				
	}
	else{
   
	$Data['name'] = $_SESSION['FULLNAME'];
	$Data['email'] = $_SESSION['EMAIL'];
	$Data['gender'] = $_SESSION['GENDER'];
	$Data['image'] = $_SESSION['PICTURE'];
	$Data['status'] = 1;
	$Data['registration_date'] = date("Y/m/d");
	$Data['join_via'] = 'facebook';
		if(!empty($Data['name'])) {                      
				$_SESSION['name'] = $Data['name'];
				$_SESSION['email'] = $Data['email'];
				$id = $obj->MySQLQueryPerform("user_private",$Data,'insert');
				$_SESSION['id'] = $id;
				
				//header('Location: ' . $tconfig['tsite_url']);
		}
		
	}
	}

    $ctegory = $_REQUEST['selectcategory'];
	$location = $_REQUEST['selectlocation'];
	if(!empty($location))
	{
	$sql = "select * from business where Mainaddress LIKE '".$location."%' AND  category LIKE '".$ctegory."%'";
	//$sql = "select * from business where category LIKE '".$ctegory."%'";
	$showresult = $obj->MySQLSelect($sql);
	}
	else{
		$showresult = '';
	}
	//print_r($showresult);
	
	// searching code
	if($_SESSION['sess_lang'] == "EN"){
	$sql = "SELECT * FROM locationcategory";
    $locationcategory = $obj->MySQLSelect($sql);
	}else{
	  $sql = "SELECT * FROM HB_locationcategory";
    $locationcategory = $obj->MySQLSelect($sql);
	}
	//print_r($locationcategory);
	
	//$sql = "SELECT * FROM locationsubcategory";
    //$locationsubcategory = $obj->MySQLSelect($sql);
	
	//print_r($locationsubcategory);
	
	$sql = "SELECT * FROM home";
    $homeresult = $obj->MySQLSelect($sql);
	
	$sql1 = "SELECT * FROM personalcare";
    $personalcare = $obj->MySQLSelect($sql1);
	
	$sql2 = "SELECT * FROM Events";
    $events = $obj->MySQLSelect($sql2);
	
	$sql3 = "SELECT * FROM enreachment";
    $enreachment = $obj->MySQLSelect($sql3);
	
	/* favourite list */
	 $sql = "select * from favourite where user_id = '".$_SESSION['id']."' ORDER BY id DESC";
	 $favouritedetail = $obj->MySQLSelect($sql);
    
	/* service request */
	$sql = "select * from ServiceRequest where customer_id = '".$_SESSION['id']."' ORDER BY id DESC";
	$servicerequestshow = $obj->MySQLSelect($sql);
   
?>