<?php
    define( '_TEXEC', 1 );
    define('TPATH_BASE', dirname(__FILE__) );
    define( 'DS', DIRECTORY_SEPARATOR );
    require_once ( TPATH_BASE .DS.'includes'.DS.'defines.php' );

	
	 
// echo $_POST['id'];


if(isset($_POST['id'])){
	$mid = $_POST['id'];
	 $bid = $_SESSION["bu_id"];

	   $sql_year = "select * from orders WHERE id='".$_POST['id']."'";
       $db_records_state = $obj->MySQLSelect($sql_year);
	   $sid = $db_records_state[0]['serviceid'];
	   
	   if(isset($sid))
	   {   
	    $sql2= "select * from Reviews WHERE service_id=$sid AND business_id=$bid";
        $db_records2 = $obj->MySQLSelect($sql2);
		//print_r($db_records2);

	   }

	  
	   
?>
<div class="col-md-12 col-sm-12">
		<div class="search-box">
			<div class="row">
		  	
				<div class="col-md-12 col-sm-12 search-con">
					<div class="col-md-12 col-sm-12">
				  		<h3><b><u>Order Information</u>:</b></h3>
			  		</div>
			  		<br>
					<div class="col-md-12 col-sm-12">
					<div class="disp">
					<?php if($db_records_state[0]['rejected_reason'] != ""){
						
					?>
						<p><b>Reason for Rejected : </b><?php echo $db_records_state[0]['rejected_reason'];?></p>
					<?php } ?>
					<?php if($db_records_state[0]['order_status'] != ""){
						
					?>
						<p><b>Order Status : </b><?php echo $db_records_state[0]['order_status'];?></p>
					<?php } ?>
					<?php if($db_records_state[0]['creationdate'] != ""){
						
					?>	
						<p><b>Order Creation Date : </b><?php echo $db_records_state[0]['creationdate'];?></p>
					<?php } ?>
					<?php if($db_records2[0]['Title'] != ""){
						
					?>	
						<p><b>Title :</b><?php echo $db_records2[0]['Title'];?></p>
					<?php } ?>
					<?php if($db_records2[0]['Description'] != ""){
						
					?>	
						<p><b>Description :</b><?php echo $db_records2[0]['Description'];?></p>
					<?php } ?>
					<?php if($db_records2[0]['Review'] != ""){
						
					?>		
						<p><b>Review : </b><?php echo $db_records2[0]['Review'];?></p>
					<?php } ?>
					
	
			  	    </div>
					</div>
			</div>
		</div>
</div>
<?php	   
}	
?>	

			
				

                	