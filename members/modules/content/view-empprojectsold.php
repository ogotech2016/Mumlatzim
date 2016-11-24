<?php    
    $iMemberId = $_SESSION["sess_iMemberId"];
    
    function array_sort_by_column(&$arr, $col, $dir = SORT_ASC) {
        $sort_col = array();
        foreach ($arr as $key=> $row) {
            $sort_col[$key] = $row[$col];
        }
        array_multisort($sort_col, $dir, $arr);
    }       
    
    $sql = "SELECT projects.* FROM projects JOIN group_members ON group_members.iGroupId = projects.iAssignId WHERE projects.eAssignType = 'Team' AND group_members.iMemberId = '".$iMemberId."' AND projects.eStatus = 'Completed' ORDER BY projects.iProjectId DESC";
    $db_projects_team = $obj->MySQLSelect($sql);
    
    $sql = "SELECT * FROM projects WHERE eAssignType = 'Person' AND iAssignId = '".$iMemberId."' AND eStatus = 'Completed' ORDER BY iProjectId DESC";
    $db_projects_person = $obj->MySQLSelect($sql);
    
    $db_projects = array_merge($db_projects_team, $db_projects_person);    
    array_sort_by_column($db_projects, 'iProjectId', SORT_DESC);
?>