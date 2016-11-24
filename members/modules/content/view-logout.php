<?php      
  session_destroy();  
  $_SESSION['sess_iMemberId'] = "";
  $_SESSION["sess_vEmail"] = "";
  header("Location:".$tconfig['tsite_url'].'index.php'); 
  exit;
?>