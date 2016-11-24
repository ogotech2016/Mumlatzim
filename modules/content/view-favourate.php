<?php
	   //print_r($_REQUEST['servicerequestid']);
	  
	  $sql = "select * from favourite where user_id = '".$_SESSION['id']."'";
	   $favouritedetail = $obj->MySQLSelect($sql);
?>
