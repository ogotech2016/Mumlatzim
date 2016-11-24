<?php
define( '_TEXEC', 1 );
    define('TPATH_BASE', dirname(__FILE__) );
    define( 'DS', DIRECTORY_SEPARATOR );
    require_once ( TPATH_BASE .DS.'includes'.DS.'defines.php' );


set_time_limit(0);
 session_start();

if($_GET['userlogout'] == 1){
session_unset($_SESSION['name']);
header('Location: ' . $tconfig['tsite_url']);
}

if($_GET['business'] == 2){
unset($_SESSION['bu_name']);
header('Location: index.php?file=bu-business');
}




//header('Location:index.php');


?>
 