<?php

    ob_start();

    session_start();
    define( '_TEXEC', 1 );
    define('TPATH_BASE', dirname(__FILE__) );
    define( 'DS', DIRECTORY_SEPARATOR );
    header('Content-Type: text/html; charset=utf-8');
    require_once ( TPATH_BASE .DS.'includes'.DS.'defines.php' );
    
    require_once(TPATH_CLASS."class.frontroutes.php");    
    $rtObj = new FrontRoutes();
    $module = $rtObj->GetModule();
    $script = $rtObj->GetScript();
    $mode = $rtObj->GetMode();
   
    
   
  // print_r($_SESSION['sess_lang']);
    /*******Setting Of Language******************/
$lang = $_REQUEST['language'];

if(isset($lang))
{
    
 if($_SESSION['sess_lang'] != "")
 {
  if($_SESSION['sess_lang'] != $lang)
  {
   $_SESSION['sess_lang'] = $lang;
  }
 
        $posturi = $_SERVER['HTTP_REFERER'];
        header("Location:".$tconfig['tsite_url']);
        exit;
 }
 else
 {
  $_SESSION['sess_lang'] = $lang;
 }
}
else
{
 if($_SESSION['sess_lang'] == ""){
  $_SESSION['sess_lang'] = "EN";
  }
}

if($_SESSION['sess_lang'] == "EN"){
   //$_SESSION['sess_lang_pref'] = "_EN"; 
   $_SESSION['sess_lbl_pref'] = ""; 
   //$_SESSION['sess_lang_master'] = "";
}else{
  // $_SESSION['sess_lang_pref'] = "_".$_SESSION['sess_lang']; 
   $_SESSION['sess_lbl_pref'] = "HB_"; 
   //$_SESSION['sess_lang_master'] = "_".$_SESSION['sess_lang'];
}
#Include language lable file#



include_once($_SESSION['sess_lang'].".php");

if($_SESSION['sess_lang'] == "HB"){ ?>
    
    <link href="style-heb.css" rel="stylesheet">
<?php }
    
    include_once(TPATH_MODULES.DS."content".DS."common_sections.php");   
    if($mode == 'view'){
        $include_script = TPATH_MODULES.DS.$module.DS.$mode."-".$script.".php";
        $include_template = TPATH_TEMPLATES.DS.$module.DS.$mode."-".$script.".php";    
    }else if($mode =='add' || $mode =='edit'){
        $include_script = TPATH_MODULES.DS.$module.DS.$script.".php";
        $include_template = TPATH_TEMPLATES.DS.$module.DS.$script.".php";
    }else if($mode =='au'){
        $include_script = TPATH_MODULES.DS.$module.DS.$mode."-".$script.".php";
        $include_template = TPATH_TEMPLATES.DS.$module.DS.$mode."-".$script.".php";
    }else{
        $include_script = TPATH_MODULES.DS.$module.DS.$script.".php";
    }
    
    require_once($include_script);    
   if($script == 'business' || $script == "businessmate" || $script == "notification" || $script == "businessorder"){
    //echo "business";
    //print_r($_SESSION);
        include("header_business.php"); 
        include($include_template);    
        include("footer_business.php");
    }
    else{
      //  echo "main";
        //print_r($_SESSION);
        include("header.php"); 
        include($include_template);    
        include("footer.php");
    }
    exit;
?>
