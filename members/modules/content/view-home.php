<?php
    $sql = "SELECT payment.* FROM payment JOIN genealogy ON genealogy.iGenealogyId = payment.iGenealogyId WHERE genealogy.iParentId = '".$_SESSION["sess_iMemberId"]."' ORDER BY payment.iPaymentId DESC";
    $db_records_all = $obj->MySQLSelect($sql);
    
    $Matrix = 0.00;
    $Cycles = 0;
    
    for($i=0;$i<count($db_records_all);$i++){
       $Matrix = $Matrix + $db_records_all[$i]['fAmount']; 
       $Cycles++;
    } 
    
    $sql = "SELECT * FROM genealogy WHERE iParentId = '".$_SESSION["sess_iMemberId"]."' AND iLeftId != 0 AND iRightId != 0";
    $db_cycles = $obj->MySQLSelect($sql);
    
    
    $sql = "SELECT payment.* FROM payment JOIN genealogy ON genealogy.iGenealogyId = payment.iGenealogyId WHERE genealogy.iParentId = '".$_SESSION["sess_iMemberId"]."' ORDER BY payment.iPaymentId ASC LIMIT 0,1";
    $db_payment = $obj->MySQLSelect($sql);
    
    $lastdt = $db_payment[0]['dAddedDate'];
    
    $lastdt = '2014-05-02';
    
    $currday = date('l', strtotime($lastdt));
    
    //echo $currday;
    
    function time_for_week_day($day_name, $ref_time=null){
        $monday = strtotime(date('o-\WW',$ref_time));
        if(substr(strtoupper($day_name),0,3) === "MON")
            return $monday;
        else
            return strtotime("last $day_name",$monday);
    }
    
    $lastfriday = date('Y-m-d',time_for_week_day('friday',strtotime($lastdt)));
    
    if($currday == 'Friday'){
       $day = $lastdt; 
    }else{
       $day = date('Y-m-d', strtotime("last friday")); 
    }
    
    $weekarr = array();
    
    function get_wks($dt){
        global $weekarr;
        $first = date('Y-m-d', strtotime($dt . ' +6 day'));
        $last = date('Y-m-d', strtotime($first . ' +1 day'));
        $str = $dt.'|'.$first;
        array_push($weekarr, $str);
        $curr = date("Y-m-d"); 
        if(strtotime($last) < strtotime($curr)){
            get_wks($last);
        }else{
            return false;
        }
    }
    
    get_wks($lastfriday);
    
    $weekarrfn = array_reverse($weekarr);
    
    $weekdetails = array();
    
    for($i=0;$i<count($weekarrfn);$i++){
        $dts = explode('|', $weekarrfn[$i]);
        $sql = "SELECT payment.* FROM payment JOIN genealogy ON genealogy.iGenealogyId = payment.iGenealogyId WHERE genealogy.iParentId = '".$_SESSION["sess_iMemberId"]."' AND payment.dAddedDate >= '".$dts[0]." 00:00:00' AND payment.dAddedDate <= '".$dts[1]." 23:59:59'";
        $db_records = $obj->MySQLSelect($sql);
        
        if(count($db_records) > 0){
            $Matrix = 0.00;         

            for($j=0;$j<count($db_records);$j++){
               $Matrix = $Matrix + $db_records[$j]['fAmount'];                
            }
            
            $sql = "SELECT * FROM payment_request WHERE dFromDate = '".$dts[0]."' AND dTodate = '".$dts[1]."' AND iMemberId = '".$_SESSION["sess_iMemberId"]."'";
            $db_payment = $obj->MySQLSelect($sql);
           
            if(count($db_payment) > 0 ){
                if($db_payment[0]['eStatus'] == 'Inactive'){
                   $nwarray['status'] = 'Received'; 
                }else{
                   $nwarray['status'] = 'Requested';  
                }
            }else{
                $nwarray['status'] = '';
            }
            
            $nwarray['week'] = $weekarrfn[$i];
            $nwarray['totamount'] = $Matrix;
            array_push($weekdetails, $nwarray);
        }
    }
    
    $sql = "SELECT payment_cheque.* FROM payment_cheque JOIN genealogy ON genealogy.iGenealogyId = payment_cheque.iGenealogyId WHERE genealogy.iParentId = '".$_SESSION["sess_iMemberId"]."' ORDER BY payment_cheque.iPaymentId DESC";
    $db_cheque = $obj->MySQLSelect($sql);
    
    
    $dts = explode('|', $weekdetails[0]['week']);
    
   //$sql = "SELECT * FROM payment WHERE AND  dAddedDate >= '".$dts[0]."' AND dAddedDate <= '".$dts[1]."' AND eType = 'Cheque'";
   
    $sql = "SELECT payment.* FROM payment JOIN genealogy ON genealogy.iGenealogyId = payment.iGenealogyId WHERE genealogy.iParentId = '".$_SESSION["sess_iMemberId"]."' AND payment.dAddedDate >= '".$dts[0]."' AND payment.dAddedDate <= '".$dts[1]."' AND payment.eType = 'Cheque'";
    $db_check_count = $obj->MySQLSelect($sql);
    
    $sql = "SELECT DISTINCT(iLeftId) FROM genealogy WHERE iParentId = '".$_SESSION["sess_iMemberId"]."' AND iLeftId != 0";
    $db_left = $obj->MySQLSelect($sql);
    
    $sql = "SELECT DISTINCT(iRightId) FROM genealogy WHERE iParentId = '".$_SESSION["sess_iMemberId"]."' AND iRightId != 0";
    $db_right = $obj->MySQLSelect($sql);
    
    $left = array_map("current",$db_left);
    $right = array_map("current",$db_right);
    
    
    $doqnlines = array_merge($left, $right);
    
    $doqnlines = array_unique($doqnlines);
   
?>