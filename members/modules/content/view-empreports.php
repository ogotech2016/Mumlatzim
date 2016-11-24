<?php
    
    if($_POST['action'] == 'add_report'){         
        if($_POST['iReportId'] == ''){
            $Data['dDate'] = $_POST['dDate'];
            $Data['iMemberId'] = $_POST['iMemberId'];
            $Data['iProjectId'] = $_POST['iProjectId'];
            
            
            $arr = date("H:i:s", strtotime($_POST['dArriveTime']));
            $leave = date("H:i:s", strtotime($_POST['dLeaveTime']));
            
            $Data['dArriveTime'] = $arr;
            $Data['dLeaveTime'] = $leave;
           
            $start = strtotime(date("Y-m-d").' '.$arr);
            $end = strtotime(date("Y-m-d").' '.$leave);
            $totmin = round(abs($end - $start) / 60,2);
            
            $work = $totmin - $_POST['dBreak'];            
            $Data['dBreak'] = $_POST['dBreak'];
            
            $hours  = floor($work/60);
            
            $Data['dWorktime'] = $hours;
            
            $Data['tWorkInfo'] = $_POST['tWorkInfo'];
            $Data['tWhatIsLeft'] = $_POST['tWhatIsLeft'];
            $Data['iAddbyMemberId'] = $_SESSION["sess_iMemberId"];
            
            if($_POST['eExtraTime'] == 'Yes'){
                $Data['eExtraTime'] = 'Yes';
                $Data['tExtraTime'] = $_POST['tExtraTime'];
            }else{
                $Data['eExtraTime'] = 'No';
                $Data['tExtraTime'] = '';
            }
            
            if($_POST['eBuymaterialfromstore'] == 'Yes'){
                $Data['eBuymaterialfromstore'] = 'Yes';
                $Data['tBuymaterialfromstore'] = $_POST['tBuymaterialfromstore'];
            }else{
                $Data['eBuymaterialfromstore'] = 'No';
                $Data['tBuymaterialfromstore'] = '';
            }
            
            if($_POST['eGotFromOwnStorage'] == 'Yes'){
                $Data['eGotFromOwnStorage'] = 'Yes';
                $Data['tGotFromOwnStorage'] = $_POST['tGotFromOwnStorage'];
            }else{
                $Data['eGotFromOwnStorage'] = 'No';
                $Data['tGotFromOwnStorage'] = '';
            }
            
            if($_POST['eMilageOfCar'] == 'Yes'){
                $Data['eMilageOfCar'] = 'Yes';
                $Data['vMilageOfCar'] = $_POST['vMilageOfCar'];
            }else{
                $Data['eMilageOfCar'] = 'No';
                $Data['vMilageOfCar'] = '';
            }
            
            if($_POST['eOrderedBySupplier'] == 'Yes'){
                $Data['eOrderedBySupplier'] = 'Yes';
                $Data['tOrderedBySupplier'] = $_POST['tOrderedBySupplier'];    
            }else{
                $Data['eOrderedBySupplier'] = 'No';
                $Data['tOrderedBySupplier'] = '';
            }
            

            $id = $obj->MySQLQueryPerform("reports",$Data,'insert');
            if($id){
                header("Location: ".$tconfig["tsite_url"]."index.php?file=c-empreports&var_msg=Report added successfully.");
                exit;
            }else{
                header("Location: ".$tconfig["tsite_url"]."index.php?file=c-empreports&var_err_msg=Something goes wrong. Please try again.");
                exit;
            }
        }else{
            $Data['dDate'] = $_POST['dDate'];
            $Data['iMemberId'] = $_POST['iMemberId'];
            $Data['iProjectId'] = $_POST['iProjectId'];
            
            
            $arr = date("H:i:s", strtotime($_POST['dArriveTime']));
            $leave = date("H:i:s", strtotime($_POST['dLeaveTime']));
            
            $Data['dArriveTime'] = $arr;
            $Data['dLeaveTime'] = $leave;
           
            $start = strtotime(date("Y-m-d").' '.$arr);
            $end = strtotime(date("Y-m-d").' '.$leave);
            $totmin = round(abs($end - $start) / 60,2);
            
            $work = $totmin - $_POST['dBreak'];            
            $Data['dBreak'] = $_POST['dBreak'];
            
            $hours  = floor($work/60);
            
            $Data['dWorktime'] = $hours;
            $Data['tWorkInfo'] = $_POST['tWorkInfo'];
            $Data['tWhatIsLeft'] = $_POST['tWhatIsLeft'];
            $Data['iAddbyMemberId'] = $_SESSION["sess_iMemberId"];
            
            if($_POST['eExtraTime'] == 'Yes'){
                $Data['eExtraTime'] = 'Yes';
                $Data['tExtraTime'] = $_POST['tExtraTime'];
            }else{
                $Data['eExtraTime'] = 'No';
                $Data['tExtraTime'] = '';
            }
            
            if($_POST['eBuymaterialfromstore'] == 'Yes'){
                $Data['eBuymaterialfromstore'] = 'Yes';
                $Data['tBuymaterialfromstore'] = $_POST['tBuymaterialfromstore'];
            }else{
                $Data['eBuymaterialfromstore'] = 'No';
                $Data['tBuymaterialfromstore'] = '';
            }
            
            if($_POST['eGotFromOwnStorage'] == 'Yes'){
                $Data['eGotFromOwnStorage'] = 'Yes';
                $Data['tGotFromOwnStorage'] = $_POST['tGotFromOwnStorage'];
            }else{
                $Data['eGotFromOwnStorage'] = 'No';
                $Data['tGotFromOwnStorage'] = '';
            }
            
            if($_POST['eMilageOfCar'] == 'Yes'){
                $Data['eMilageOfCar'] = 'Yes';
                $Data['vMilageOfCar'] = $_POST['vMilageOfCar'];
            }else{
                $Data['eMilageOfCar'] = 'No';
                $Data['vMilageOfCar'] = '';
            }
            
            if($_POST['eOrderedBySupplier'] == 'Yes'){
                $Data['eOrderedBySupplier'] = 'Yes';
                $Data['tOrderedBySupplier'] = $_POST['tOrderedBySupplier'];    
            }else{
                $Data['eOrderedBySupplier'] = 'No';
                $Data['tOrderedBySupplier'] = '';
            } 
            
            $where = " iReportId = '".$_POST['iReportId']."'";
            $res = $obj->MySQLQueryPerform("reports",$Data,'update',$where);

            if($res){
                header("Location: ".$tconfig["tsite_url"]."index.php?file=c-empreports&var_msg=Report updated successfully.");
                exit;
            }else{
                header("Location: ".$tconfig["tsite_url"]."index.php?file=c-empreports&var_err_msg=Something goes wrong. Please try again.");
                exit;
            }
        }
    }
    
    if($_REQUEST['RId'] != ''){
        $sql = "SELECT * FROM reports WHERE 1=1 AND iReportId = '".$_REQUEST['RId']."'";
        $db_editedreport = $obj->MySQLSelect($sql);
    }

    $iMemberId = $_SESSION["sess_iMemberId"];
    
    #$sql = "SELECT * FROM projects WHERE eAssignType = 'Person' AND iAssignId = '".$iMemberId."'";
    #$db_projects = $obj->MySQLSelect($sql);
    
    
    function array_sort_by_column(&$arr, $col, $dir = SORT_ASC) {
        $sort_col = array();
        foreach ($arr as $key=> $row) {
            $sort_col[$key] = $row[$col];
        }
        array_multisort($sort_col, $dir, $arr);
    }
    
    function myTruncate($string, $limit, $break=".", $pad="...")
    {
        // return with no change if string is shorter than $limit
        if(strlen($string) <= $limit) return $string;

        // is $break present between $limit and the end of the string?
        if(false !== ($breakpoint = strpos($string, $break, $limit))) {
          if($breakpoint < strlen($string) - 1) {
            $string = substr($string, 0, $breakpoint) . $pad;
          }
        }

        return $string;
    }
    
    $sql = "SELECT projects.* FROM projects JOIN group_members ON group_members.iGroupId = projects.iAssignId WHERE projects.eAssignType = 'Team' AND group_members.iMemberId = '".$iMemberId."' AND projects.eStatus = 'Approved' ORDER BY projects.iProjectId DESC";
    $db_projects_team = $obj->MySQLSelect($sql);
    
    $sql = "SELECT * FROM projects WHERE eAssignType = 'Person' AND iAssignId = '".$iMemberId."' AND eStatus = 'Approved' ORDER BY iProjectId DESC";
    $db_projects_person = $obj->MySQLSelect($sql);
    
    $db_projects = array_merge($db_projects_team, $db_projects_person);    
    array_sort_by_column($db_projects, 'iProjectId', SORT_ASC);
    
    
    $sql = "SELECT iMemberId, vFirstName, vLastName FROM members WHERE eType = 'User' AND eStatus = 'Active' ORDER BY vFirstName ASC";
    $db_users = $obj->MySQLSelect($sql);
    
    //$sql = "SELECT * FROM reports WHERE 1=1 ORDER BY iReportId DESC";
    //$db_reports = $obj->MySQLSelect($sql);
    
    $sql = "SELECT reports.* FROM reports JOIN projects ON projects.iProjectId = reports.iProjectId WHERE projects.eAssignType = 'Person' AND projects.iAssignId = '".$iMemberId."' AND projects.eStatus = 'Approved' ORDER BY reports.iReportId DESC";
    $db_reports_person = $obj->MySQLSelect($sql);
    
    $sql = "SELECT reports.* FROM reports JOIN projects ON projects.iProjectId = reports.iProjectId JOIN group_members ON group_members.iGroupId = projects.iAssignId WHERE projects.eAssignType = 'Team' AND group_members.iMemberId = '".$iMemberId."' AND projects.eStatus = 'Approved' ORDER BY reports.iReportId DESC";
    $db_reports_team = $obj->MySQLSelect($sql);
    
    $db_reports = array_merge($db_reports_person, $db_reports_team);    
    array_sort_by_column($db_reports, 'iReportId', SORT_DESC);
    
    for($i=0;$i<count($db_reports);$i++){
        $sql = "SELECT vFirstName, vLastName FROM members WHERE iMemberId = '".$db_reports[$i]['iMemberId']."'";
        $db_memb = $obj->MySQLSelect($sql);
        $db_reports[$i]['member'] = $db_memb[0]['vFirstName'].' '.$db_memb[0]['vLastName'];
        
        $sql = "SELECT * FROM projects WHERE iProjectId = '".$db_reports[$i]['iProjectId']."'";
        $db_proj = $obj->MySQLSelect($sql);
        $db_reports[$i]['project'] = $db_proj[0]['vTitle'];
    }
    
    #echo "<pre>";
    #print_r($db_reports); exit;
    
    
    #$sql = "SELECT * FROM projects WHERE 1=1 AND eStatus = 'Approved' AND iAssignId = '".$iMemberId."'";
    #$db_peojects = $obj->MySQLSelect($sql);
    
    
?>