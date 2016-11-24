<?php
    $iMemberId = $_SESSION["sess_iMemberId"];
    $sql = "SELECT * FROM projects WHERE iMemberId = '".$iMemberId."'";
    $db_projects = $obj->MySQLSelect($sql);
    
    #echo "<pre>";
    #print_r($db_projects); exit;
?>