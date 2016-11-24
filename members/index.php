<?php
    define( '_TEXEC', 1 );
    define('TPATH_BASE', dirname(dirname(__FILE__)) );
    define( 'DS', DIRECTORY_SEPARATOR );    
    require_once ( TPATH_BASE .DS.'includes'.DS.'defines.php' ); 
    
    require_once(TPATH_CLASS."class.memberroutes.php");    
    $rtObj = new FrontRoutes();
    $module = $rtObj->GetModule();
    $script = $rtObj->GetScript();
    $mode = $rtObj->GetMode();
  
   
    
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
    
    include("header.php"); 
    
    echo $include_template;  
   
      
      include($include_template);    
      include("footer.php");  
    exit;
?>
