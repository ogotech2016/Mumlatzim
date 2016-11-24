<?php
session_start();	
	
	$home="SELECT * FROM home";
	$db_records_all5 = $obj->MySQLSelect($home);
	$event="SELECT * FROM Events";
	$db_records_all2 = $obj->MySQLSelect($event);
	$personalcare="SELECT * FROM personalcare";
	$db_records_all3 = $obj->MySQLSelect($personalcare);
	$enreachment="SELECT * FROM enreachment";
	$db_records_all4 = $obj->MySQLSelect($enreachment);
	$country ="select countryname from countrycharges";
	$db_country = $obj->MySQLSelect($country);
	$result = array_merge($db_records_all5,$db_records_all2,$db_records_all3,$db_records_all4);
	
	
	if(isset($_REQUEST['registration'])){
		$chkemail = $_REQUEST['email'];
		$sql_chkemail = "select * from business where Email='$chkemail'";
		$result_chkemail = $obj->MySQLSelect($sql_chkemail);
		
		$Phone= $_REQUEST['contactno'];
		$sql_Phone = "select * from business where Phone='$Phone'";
		$result_Phone = $obj->MySQLSelect($sql_Phone);	
	
			/*if($result_chkemail)
			{?>
					<!--//echo "<script>alert('Business Already Registered.');</script>";-->
					<!--<div class="alert alert-danger abc">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Registration Failed..Business Already Registered With Us.</strong>
					</div>-->
					<?php
			}*/
			
			if($result_Phone)
			{?>
					
					<div class="alert alert-danger abc1" style="padding: 15px; position: absolute; top: 196px; left: 10px; z-index: 9999999; width:98%;">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Registration Failed..Contact Number Already Registered With Us.</strong>
					</div>
					<?php
			}	
		
		
		else
		{
	$Data['Name'] = $_REQUEST['firstName'];
	$Data['Email'] = $_REQUEST['email'];
	$Data['password'] = md5($_REQUEST['password']);
	$Data['contact_person'] = $_REQUEST['Contactperson'];
	$Data['Phone'] = $_REQUEST['contactno'];
	//$Data['Mainaddress'] = $_REQUEST['selectlocation'];
	//$Data['Mainaddress'] = implode("|",$_REQUEST['selectlocation']);
	$Data['Mainaddress'] = $_REQUEST['selectlocation'][0];
	$Data['Mainaddress1'] = $_REQUEST['selectlocation'][1];
	$Data['Mainaddress2'] = $_REQUEST['selectlocation'][2];
	$Data['Mainaddress3'] = $_REQUEST['selectlocation'][3];
	$Data['Mainaddress4'] = $_REQUEST['selectlocation'][4];
	//$Data['category'] = $_REQUEST['category'];
	$Data['category'] = $_REQUEST['subcategory'][0];
	$Data['category1'] = $_REQUEST['subcategory'][1];
	$Data['category2'] = $_REQUEST['subcategory'][2];
	$Data['category3'] = $_REQUEST['subcategory'][3];
	$Data['category4'] = $_REQUEST['subcategory'][4];
	$Data['short_description'] = $_REQUEST['Shortdescription'];
	$Data['con_prefix'] = $_REQUEST['con_prefix'];
	$Data['country'] = $_REQUEST['country'];
	$Data['C2Bclicks'] = "100";
	$Data['business_website'] = $_REQUEST['businesswebsite'];
	$Data['office_number'] = $_REQUEST['Officenumber'];
	$Data['registrationdate'] = date("Y/m/d");
	$Data['Status'] = 2;
	$Data['rating'] = 5;
	$Data['Image'] = $_FILES['image']['name'];
		$theme_url =  dirname(dirname(dirname(__FILE__)));
		$folder= $theme_url."/public_html/images/business/";
		//echo $folder;exit;
		move_uploaded_file($_FILES["image"]["tmp_name"], "$folder".$_FILES["image"]["name"]);
		$finalImageUpload =  $tconfig['tsite_url'] . "/public_html/images/business".'/'.$upload_image;
	$Data['img2'] = $_FILES['image1']['name'];
		$theme_url =  dirname(dirname(dirname(__FILE__)));
		$folder= $theme_url."/public_html/images/business/";
		//echo $folder;exit;
		move_uploaded_file($_FILES["image1"]["tmp_name"], "$folder".$_FILES["image1"]["name"]);
		$finalImageUpload =  $tconfig['tsite_url'] . "/public_html/images/business".'/'.$upload_image;
	$Data['img3'] = $_FILES['image2']['name'];
		$theme_url =  dirname(dirname(dirname(__FILE__)));
		$folder= $theme_url."/public_html/images/business/";
		//echo $folder;exit;
		move_uploaded_file($_FILES["image2"]["tmp_name"], "$folder".$_FILES["image2"]["name"]);
		$finalImageUpload =  $tconfig['tsite_url'] . "/public_html/images/business".'/'.$upload_image;
	$Data['img4'] = $_FILES['image3']['name'];
		$theme_url =  dirname(dirname(dirname(__FILE__)));
		$folder= $theme_url."/public_html/images/business/";
		//echo $folder;exit;
		move_uploaded_file($_FILES["image3"]["tmp_name"], "$folder".$_FILES["image3"]["name"]);
		$finalImageUpload =  $tconfig['tsite_url'] . "/public_html/images/business".'/'.$upload_image;
	
	
	$id = $obj->MySQLQueryPerform("business",$Data,'insert');
	$business_id = $id;
	$_SESSION['reg_redirect'] = $business_id;
	
	$Phone = $Data['Phone'];
	$pass = $Data['password'];
	$sql = "select * from business where Phone='$Phone' and password='$pass'";
	$result = $obj->MySQLSelect($sql);
	
	if($result)
	{
		$_SESSION["bu_name"] = $result[0]['Name'];
		$_SESSION["bu_id"] = $result[0]['id'];
		$_SESSION["bu_avail"] = $result[0]['availability'];
		$_SESSION["bu_email"] = $result[0]['Email'];
		$_SESSION["bu_image"] = $result[0]['Image'];
		$_SESSION["bu_sub"] = $result[0]['category'];
	?>
	<div class="alert alert-success abc" id="msg">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<strong>Register successfully</strong>
	  </div>
	<?php
	}
		}
	}
	if(isset($_REQUEST['item_name'])){
		//$Data['Status'] = '1';
		$Data['Amount'] = $_REQUEST['payment_gross'];
		$Data['paymentvia'] = 'Paypal';
		$businessid = $_REQUEST['custom'];
		$where = " id = '".$businessid."'";
	
	
		$id = $obj->MySQLQueryPerform("business",$Data,'update',$where);
	}
	
	//code start for business login
	if(isset($_REQUEST['submit']))
	{
  	//echo $pass = $_REQUEST['password]'];
	$Phone = $_REQUEST['contactno'];
	$pass = md5($_REQUEST['password]']);

	
	$sql = "select * from business where Phone='$Phone' and password='$pass'";
	$result = $obj->MySQLSelect($sql);
	//print_r($result);
	if($result)
	{
		$_SESSION["bu_name"] = $result[0]['Name'];
		$_SESSION["bu_id"] = $result[0]['id'];
		$_SESSION["bu_avail"] = $result[0]['availability'];
		$_SESSION["bu_email"] = $result[0]['Email'];
		$_SESSION["bu_image"] = $result[0]['Image'];
		$_SESSION["bu_sub"] = $result[0]['category'];
	?>
	<div class="alert alert-success abc" id="msg">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Wel Come,<?php echo $_SESSION["bu_name"]; ?></strong>
</div>
	<?php
	}
	else
	{
		echo "<script>alert('login failed');</script>";
	}
 }
	//code end for business login
	
/*====================forgot password==========================*/
if(isset($_POST['send'])) {
	
        $email = $_POST['email'];
        $sql = "SELECT * FROM business WHERE (Email = '".$email."')";
        $result = $obj->MySQLSelect($sql);
        
        $pass1 =  generate_password1_forgot(7);
        $password = md5($pass1);
        
        $Data_re['password']=$password;
        $where = "id = '".$result[0]['id']."'";
        $obj->MySQLQueryPerform("business",$Data_re,'update',$where);
    	
        if(count($result) > 0)
		{
			
					$subject = 'Message from Mumlatzim';
					$to = $result[0]['Email'];					
			
					$message .= '<html><body>';
					$message .= '<b>Details:</b>';
					$message .= '<br><br>';
					$message .= "Hello, <b>".$result[0]['Name'];
					$message .= "</b>";					
					$message .= "<br><br>We have received a password change request for your Mumlatzim account.";
					$message .= "<br><br><b>Your new Password is</b>: ".$pass1;
										
					$headers .= "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
					$headers .= "From: ".$email;
										
					mail($to,$subject,$message,$headers);
					
			?>
					<div class="alert alert-success abc" id="msg1">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Password send successfully to your Email.</strong>
					</div>
					<?php
			}
        else{
			?>
			<div class="alert alert-success abc" id="msg2">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Email sending Failed.Please try again.</strong>
					</div>
					<?php
			
		}
 

}
function generate_password1_forgot( $length = 7 ) {

  $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";

  $password = substr( str_shuffle( $chars ), 0, $length );

  return $password;

  } 


/*====================end forgot password==========================*/
?>
<?php
/*====================Notification==========================*/

	   $sql = "select * from invitemate where invitebusiness_id = '".$_SESSION["bu_id"]."' AND status = 0 ";
	   $notification = $obj->MySQLSelect($sql);
	   $sql_admin_all1 = "select b.Name,b.category,s.* from share_business s join business b on s.business_id=b.id where business_mate_id='".$_SESSION["bu_id"]."'";
	   $db_records_all_in = $obj->MySQLSelect($sql_admin_all1);
	
	$payen2 = "SELECT * FROM countrycharges WHERE countryname='Philippines' and 1 $ssql $ord $var_limit";
	$dbpayen2 = $obj->MySQLSelect($payen2);
	$payhb2 = "SELECT * FROM countrycharges WHERE countryname='Israel' and 1 $ssql $ord $var_limit";
	$dbpayhb2 = $obj->MySQLSelect($payhb2);
	
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
		
	    header("Location:". $tconfig['tsite_url']."index.php?file=bu-business");
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
	
/*if(isset($_REQUEST['item_name'])){
	//echo "invite";
	echo "<pre>";
    print_r($_REQUEST);
	echo "<pre>";

	$txnid2 = $_REQUEST['txn_id'];
	$cat2 = $_REQUEST['item_number'];
	   $amount2 = $_REQUEST['payment_gross'];
	   $sid = $_REQUEST['item_name'];
	   $tdrdata2 = array('sequencial_id'=>$txnid2,'Type'=>'B','Direction'=>'1','SubIndustry'=>$cat2,'ChargeItem'=>'B2B','Charge_Ammount'=>$amount2,'SR_ID'=>$sid); 
      $tdrres = $obj->MySQLQueryPerform("tdr",$tdrdata2,'insert');	   
      
      
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
	 
	   
		$data = array('status'=>'Approved','rejected_reason'=>array());
	    $where = " id IN (".$orderid.")";
		$res = $obj->MySQLQueryPerform("share_business",$data,'update',$where);
	
		if($res)$var_msg = $totid." Order Approve Successfully.";else $var_msg="Eror-in Activation.";
		header("Location: ".$tconfig["tsite_url"]."/index.php?file=bu-business");		
	}*/
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
	header("Location: ".$tconfig["tsite_url"]."/index.php?file=bu-business");
	//exit;
}
/*====================end Notification==========================*/
?>	   


 

<?php 
/*==================== ORDER==========================*/
//print_r($_POST);
$sql_admin = "SELECT * FROM ServiceRequest WHERE 1 $ssql $ord";	
$db_admin = $obj->MySQLSelect($sql_admin);
$num_totrec = count($db_admin1);

$payen = "SELECT * FROM countrycharges WHERE countryname='Philippines' and 1 $ssql $ord $var_limit";
$dbpayen = $obj->MySQLSelect($payen);
$payhb = "SELECT * FROM countrycharges WHERE countryname='Israel' and 1 $ssql $ord $var_limit";
$dbpayhb = $obj->MySQLSelect($payhb);

	$nm = $_SESSION[bu_id];
	//$sql_admin_all = "SELECT * FROM orders WHERE 1 $ssql $ord $var_limit";	
	$sql_admin_all1= "SELECT b.Name,u.name,o.* FROM orders o join business b on o.business_id=b.id join user_private u on u.id=o.user_id WHERE 1 and b.id=$nm";
	$db_records_all1 = $obj->MySQLSelect($sql_admin_all1);

?>
<?php
if(isset($_REQUEST['reject1']))	
{
	
	$orderid = $_POST['oid'];
	$reason = $_POST['reason'];
    $data = array('order_status'=>'Rejected','rejected_reason'=>$reason);
    $where = " id IN (".$orderid.")";
	$res = $obj->MySQLQueryPerform("orders",$data,'update',$where);
	
	if($res)$var_msg = $totid." Order Rejected Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tsite_url"]."/index.php?file=bu-business");
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
	//echo "order";
	echo "<pre>";
	print_r($_REQUEST);
	echo "</pre>";
	   $txnid = $_REQUEST['txn_id'];
	   $sid = $_REQUEST['item_name'];
	   $amount = $_REQUEST['payment_gross'];
	   $tdrdata = array('sequencial_id'=>$txnid,'Type'=>'C','Direction'=>'0','SubIndustry'=>$_SESSION["bu_sub"],'ChargeItem'=>'C2B','Charge_Ammount'=>$amount,'SR_ID'=>$sid); 
       $tdrres = $obj->MySQLQueryPerform("tdr",$tdrdata,'insert');	   
	   
		$orderid = $_REQUEST['custom'];
		
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
		
		$data = array('order_status'=>'Approved','rejected_reason'=>array());
	    $where = " id IN (".$orderid.")";
		$res = $obj->MySQLQueryPerform("orders",$data,'update',$where);
	
		if($res)$var_msg = $totid." Order Approve Successfully.";else $var_msg="Eror-in Activation.";
		header("Location: ".$tconfig["tsite_url"]."/index.php?file=bu-business");		
	}
?>






	
