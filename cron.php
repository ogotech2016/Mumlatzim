<?php
    define( '_TEXEC', 1 );
    define('TPATH_BASE', dirname(__FILE__) );
    define( 'DS', DIRECTORY_SEPARATOR );
    require_once ( TPATH_BASE .DS.'includes'.DS.'defines.php' );

    //$curdate = date("Y-m-d");
	//$days_ago = date('Y-m-d', strtotime('-5 days', strtotime($curdate)));
	
	$sql = "select * from Reviews";
	$reviews = $obj->MySQLSelect($sql);
	for ($i = 0; $i < count($reviews); $i++) {
		
		//print_r($reviews[$i]['id']); 
		 $date1=date_create($reviews[$i]["Createdate"]);
		 //print_r($date1);
		 $date2=date_create(date("Y-m-d"));
		 //print_r($date2);
		 $diff=date_diff($date1,$date2);
		  //print_r($diff); echo '<br>';
		 $day =  $diff->format("%R%a days");
		 //print_r($day); 
		 //echo '<br>';
		if($day == '+5 days' && $reviews[$i]["Review"] == 0){
			//echo "123";
			//echo '<br>';
			$sql="Delete from ServiceRequest where id = '".$reviews[$i]['service_id']."'";
			$db_sql=$obj->sql_query($sql);			
		}
	}
	
?>