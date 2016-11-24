<?php
	   
      $sql = "select * from invitemate where business_id = '".$_SESSION["bu_id"]."' AND Status='1'";
      $businessmateshow = $obj->MySQLSelect($sql);
      //print_r($servicerequestshow);
	  
	  if(isset($_REQUEST['Invite']))
	  {
	    $chkid = $_REQUEST['businessid']; 
	  	$Data['business_id'] = $_SESSION["bu_id"];
	  	$Data['invitebusiness_id'] = $_REQUEST['businessid']; 
	  	$Data['status'] = 0;
	  	$id = $obj->MySQLQueryPerform("invitemate",$Data,'insert');
		//$sql_mate = "select * from invitemate where business_id = '".$_SESSION["bu_id"]."' AND invitebusiness_id='".$chkid."'";
		
		/*$sql_mate = "select * from invitemate where ((business_id = '".$_SESSION["bu_id"]."' AND invitebusiness_id='".$chkid."') OR (business_id = '".$chkid."' AND invitebusiness_id='".$_SESSION["bu_id"]."'))";
	    $result_mate = $obj->MySQLSelect($sql_mate);
		if(!$result_mate)
		{
			$id = $obj->MySQLQueryPerform("invitemate",$Data,'insert');
		}
		else
		{
			?>
			<div class="alert alert-danger abc">
				  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  <strong>Already Request Exist.</strong>
			</div>
			<?php
		}*/
	  }
	   if(isset($_REQUEST['Resend']))
	  {
	  	
	    $loginbusinessid = $_REQUEST['businessid']; 
		$senderid = $_SESSION["bu_id"];;
		$Data['status'] = 0;
	    $where = " invitebusiness_id = '".$loginbusinessid."' AND business_id = '".$senderid."'";
	    $id = $obj->MySQLQueryPerform("invitemate",$Data,'update',$where);
		
	  }
	  
	  if(isset($_REQUEST['showbusiness']))
	  {
	    $buinessdata = $_REQUEST['searchdata'];
	  	$sql = "select * from business where Name LIKE '".$buinessdata."%' OR  Phone LIKE '".$buinessdata."%' AND availability='0' AND Status='1'" ; 
        $showbusiness = $obj->MySQLSelect($sql);
		//print_r($showbusiness);
	
	  }
	   
      
	   

?>
