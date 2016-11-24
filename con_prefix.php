<?php
    define( '_TEXEC', 1 );
    define('TPATH_BASE', dirname(__FILE__) );
    define( 'DS', DIRECTORY_SEPARATOR );
    require_once ( TPATH_BASE .DS.'includes'.DS.'defines.php' );
	
	
 //echo $_POST['aa'];
if(isset($_POST['aa'])){
	 $mid = $_POST['aa'];
	 
	   $sql_year = "select * from country WHERE country='".$_POST['aa']."'";
       $db_records_state = $obj->MySQLSelect($sql_year);
	   
	  // print_r($db_records_state); 
	     
?>

<div class="con_code">

		  <label for="customer_registration_password_first" class="control-label sr-only required">Contact Number
		  </label>
		  
		 <input style="height:36px;float:left;" class="form-control input-lg" min="1" required="required" name="con_prefix" id="customer_registration_password_first" value="<?php echo  $db_records_state[0]['prefix']?>" readonly>

 
		 <?php $aa= $tconfig['tsite_images']."/flag/".$db_records_state[0]['flag_img']; ?>
		<!--<img src="<?php //echo  $aa; ?>" style="width:32px; height: 19px; float:left;"> -->
		
</div>  
	   
	   
<?php	   
}	
?>	

			
				

                	