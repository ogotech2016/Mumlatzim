<?php
    $iMemberId = $_SESSION["sess_iMemberId"];
    
    $sql = "SELECT * FROM payment_plans WHERE eStatus = 'Active' ORDER BY iPlanId ASC";
    $db_plans = $obj->MySQLSelect($sql);
    
    echo "<pre>";
    print_r($db_plans); exit;
?>