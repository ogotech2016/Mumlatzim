<?php
    define( '_TEXEC', 1 );
    define('TPATH_BASE', dirname(__FILE__) );
    define( 'DS', DIRECTORY_SEPARATOR );
    require_once ( TPATH_BASE .DS.'includes'.DS.'defines.php' );

$searchTerm = $_GET['term'];
//get matched data from skills table

$sql = "select * from business WHERE Name LIKE '%".$searchTerm."%' OR Phone LIKE '%".$searchTerm."%' ";
$location = $obj->MySQLSelect($sql);
for($i=0; $i < count($location); $i++){
    $data[] = $location[$i]['Name'];
    //$data[] = $location[$i]['Phone'];
}

//return json data
echo json_encode($data);

?>