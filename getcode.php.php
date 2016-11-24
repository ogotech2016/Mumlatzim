
<?php
error_reporting(0);
 define( '_TEXEC', 1 );
    define('TPATH_BASE', dirname(__FILE__) );
    define( 'DS', DIRECTORY_SEPARATOR );
    header('Content-Type: text/html; charset=iso-8859-1');
    require_once ( TPATH_BASE .DS.'includes'.DS.'defines.php' );
 

    if(isset($_POST["id"]) && !empty($_POST["id"])){
    //Get all state data
    $sql_year = "SELECT prefix FROM country WHERE id = ".$_POST['id']."";
    
    //Count total number of rows
    $db_records_state = $obj->MySQLSelect($sql_year);
    
    //Display states list
    if($db_records_state > 0){
        echo '<option value="">Select state</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['id'].'">'.$row['prefix'].'</option>';
        }
    }else{
        echo '<option value="">State not available</option>';
    }
}
 
  

 ?>
