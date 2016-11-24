<?php 
//print_r($_POST);
$sql_admin = "SELECT * FROM ServiceRequest WHERE 1 $ssql $ord";	
$db_admin = $obj->MySQLSelect($sql_admin);
$num_totrec = count($db_admin);

$payen = "SELECT * FROM countrycharges WHERE countryname='Philippines' and 1 $ssql $ord $var_limit";
$dbpayen = $obj->MySQLSelect($payen);
$payhb = "SELECT * FROM countrycharges WHERE countryname='Israel' and 1 $ssql $ord $var_limit";
$dbpayhb = $obj->MySQLSelect($payhb);

	$nm = $_SESSION[bu_id];
	//$sql_admin_all = "SELECT * FROM orders WHERE 1 $ssql $ord $var_limit";	
	$sql_admin_all = "SELECT b.Name,u.name,o.* FROM orders o join business b on o.business_id=b.id join user_private u on u.id=o.user_id WHERE 1 and b.id=$nm";
	$db_records_all = $obj->MySQLSelect($sql_admin_all);

?>
<?php
if(isset($_REQUEST['reject']))
{
	$orderid = $_POST['oid'];
	$reason = $_POST['reason'];
    $data = array('order_status'=>'Rejected','rejected_reason'=>$reason);
    $where = " id IN (".$orderid.")";
	$res = $obj->MySQLQueryPerform("orders",$data,'update',$where);
	
	if($res)$var_msg = $totid." Order Rejected Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tsite_url"]."/index.php?file=bo-businessorder");
	//exit;
}
?>
<?php
if(isset($_REQUEST['share']))
{
	$busi = $_SESSION['bu_id'];
	$serviceid = $_REQUEST['serviceid'];
	$sharebusi = $_POST['sharebusi'];
	//print_r($sharebusi);
	foreach($sharebusi as $sh)
	{
		$sql_c = "select * from share_business where service_id=$serviceid and business_id=$busi and business_mate_id=$sh";
        $result_c = $obj->MySQLSelect($sql_c);
		if(!$result_c)
		{
			$data = array('service_id'=>$serviceid,'business_id'=>$busi,'business_mate_id'=>$sh);
			$res = $obj->MySQLQueryPerform("share_business",$data,'insert');
		}
	}
    if($res)
	{
		echo "<script>alert('Successfully Done');</script>";
	}
	else
	{
		echo "<script>alert('Something wrong');</script>";
	}
	//if($res)$var_msg = $totid." Business Successfully share to friend.";else $var_msg="Eror.";
	//header("Location: ".$tconfig["tsite_url"]."/index.php?file=bo-businessorder");
}
?>
<?php
if(isset($_REQUEST['item_name'])){
	echo "<pre>";
	print_r($_REQUEST);
	echo "</pre>";
	   $txnid = $_REQUEST['txn_id'];
	   $sid = $_REQUEST['item_name'];
	   $amount = $_REQUEST['payment_gross'];
	   $tdrdata = array('sequencial_id'=>$txnid,'Type'=>'C','Direction'=>'0','SubIndustry'=>$_SESSION["bu_sub"],'ChargeItem'=>'C2B','Charge_Ammount'=>$amount,'SR_ID'=>$sid); 
      $tdrres = $obj->MySQLQueryPerform("tdr",$tdrdata,'insert');	   
	   
		echo $orderid = $_REQUEST['custom'];
		//
		$click = "select b.C2Bclicks,o.* from orders o join business b on o.business_id = b.id where o.id = '".$orderid."'";
	   $result_click = $obj->MySQLSelect($click);
	   
	   $bid = $result_click[0]['business_id'];
	   //echo "<br>";
	   $cclick = $result_click[0]['C2Bclicks'];
	   //echo "<br>";
	   $cclick = $cclick + 1;
	   
	   $clickdata = array('C2Bclicks'=>$cclick);
	   $where = " id IN (".$bid.")";
		$clickres = $obj->MySQLQueryPerform("business",$clickdata,'update',$where);
		//
		$data = array('order_status'=>'Approved','rejected_reason'=>array());
	    $where = " id IN (".$orderid.")";
		$res = $obj->MySQLQueryPerform("orders",$data,'update',$where);
	
		if($res)$var_msg = $totid." Order Approve Successfully.";else $var_msg="Eror-in Activation.";
		header("Location: ".$tconfig["tsite_url"]."/index.php?file=bo-businessorder");		
	}
?>
<?php
/*if(isset($_REQUEST['mode']))
{
	if($_REQUEST['mode']=='approve')
	{
	$orderid = $_REQUEST['iAdminId'];
    $data = array('order_status'=>'Approved','rejected_reason'=>array());
    $where = " id IN (".$orderid.")";
	$res = $obj->MySQLQueryPerform("orders",$data,'update',$where);
	
	if($res)$var_msg = $totid." Order Approve Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tsite_url"]."/index.php?file=bo-businessorder");
	}
}*/
?>
