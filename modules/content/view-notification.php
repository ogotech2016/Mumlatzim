<?php
	   $sql = "select * from invitemate where invitebusiness_id = '".$_SESSION["bu_id"]."' AND status = 0 ";
	   $notification = $obj->MySQLSelect($sql);
	   $sql_admin_all = "select b.Name,b.category,s.* from share_business s join business b on s.business_id=b.id where business_mate_id='".$_SESSION["bu_id"]."'";
	   $db_records_all = $obj->MySQLSelect($sql_admin_all);
	
	$payen = "SELECT * FROM countrycharges WHERE countryname='Philippines' and 1 $ssql $ord $var_limit";
	$dbpayen = $obj->MySQLSelect($payen);
	$payhb = "SELECT * FROM countrycharges WHERE countryname='Israel' and 1 $ssql $ord $var_limit";
	$dbpayhb = $obj->MySQLSelect($payhb);
	
      if(isset($_REQUEST['Accept']))
	  {
	  	//print_r($_REQUEST);
		$loginbusinessid = $_REQUEST['loginbusinessid'];
		$senderid = $_REQUEST['senderid'];
		$Data['status'] = 1;
	    $where = " invitebusiness_id = '".$loginbusinessid."' AND business_id = '".$senderid."'";
	    $id = $obj->MySQLQueryPerform("invitemate",$Data,'update',$where);
		
		$Data['business_id'] = $_REQUEST['loginbusinessid'];
	  	$Data['invitebusiness_id'] = $_REQUEST['senderid'];
	  	$Data['status'] = 1;
	  	$id = $obj->MySQLQueryPerform("invitemate",$Data,'insert');
		
	    header("Location:". $tconfig['tsite_url']."index.php?file=nf-notification");
	  }
	  if(isset($_REQUEST['cancel']))
	  {
	  	//print_r($_REQUEST);
		$loginbusinessid = $_REQUEST['loginbusinessid'];
		$senderid = $_REQUEST['senderid'];
		$Data['status'] = 2;
	    $where = " invitebusiness_id = '".$loginbusinessid."' AND business_id = '".$senderid."'";
	    $id = $obj->MySQLQueryPerform("invitemate",$Data,'update',$where);
		
	   /*$loginbusinessid = $_REQUEST['loginbusinessid'];
	   $senderid = $_REQUEST['senderid'];
	   $sql="Delete from invitemate where invitebusiness_id='".$loginbusinessid."' AND business_id = '".$senderid."'"; 
	   $db_sql=$obj->sql_query($sql);	
		
	    header("Location:". $tconfig['tsite_url']."index.php?file=nf-notification");*/
	  }
	?>
	<?php
if(isset($_REQUEST['item_name'])){
	echo "<pre>";
	print_r($_REQUEST);
	echo "<pre>";
	
	$txnid = $_REQUEST['txn_id'];
	$cat = $_REQUEST['item_number'];
	   $amount = $_REQUEST['payment_gross'];
	   $sid = $_REQUEST['item_name'];
	   $tdrdata = array('sequencial_id'=>$txnid,'Type'=>'B','Direction'=>'1','SubIndustry'=>$cat,'ChargeItem'=>'B2B','Charge_Ammount'=>$amount,'SR_ID'=>$sid); 
      $tdrres = $obj->MySQLQueryPerform("tdr",$tdrdata,'insert');	   
      
      
		$orderid = $_REQUEST['custom'];
		//$click = "select * from share_business where id = '".$orderid."'";
		//for B2Bclicks update
		$click = "select b.B2Bclicks,s.* from share_business s join business b on s.business_id = b.id where s.id = '".$orderid."'";
	   $result_click = $obj->MySQLSelect($click);
	   
	   $bid = $result_click[0]['business_id'];
	   //echo "<br>";
	   $bclick = $result_click[0]['B2Bclicks'];
	   //echo "<br>";
	   $bclick = $bclick + 1;
	   
	   $clickdata = array('B2Bclicks'=>$bclick);
	   $where = " id IN (".$bid.")";
		$clickres = $obj->MySQLQueryPerform("business",$clickdata,'update',$where);
	   //
	   
		$data = array('status'=>'Approved','rejected_reason'=>array());
	    $where = " id IN (".$orderid.")";
		$res = $obj->MySQLQueryPerform("share_business",$data,'update',$where);
	
		if($res)$var_msg = $totid." Order Approve Successfully.";else $var_msg="Eror-in Activation.";
		header("Location: ".$tconfig["tsite_url"]."/index.php?file=nf-notification");		
	}
?>
<?php
if(isset($_REQUEST['reject']))
{
	$orderid = $_POST['oid'];
	$reason = $_POST['reason'];
    $data = array('status'=>'Rejected','rejected_reason'=>$reason);
    $where = " id IN (".$orderid.")";
	$res = $obj->MySQLQueryPerform("share_business",$data,'update',$where);
	
	if($res)$var_msg = $totid." Order Rejected Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tsite_url"]."/index.php?file=nf-notification");
	//exit;
}
?>	   

