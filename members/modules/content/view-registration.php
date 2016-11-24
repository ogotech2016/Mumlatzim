<?php     
    if($_POST['action'] == 'chk_registration'){        
        $vRegistrationCode = $_POST['vRegistrationCode'];        
        $sponsor_username = $_POST['sponsor_username'];
        $vFirstName = $_POST['vFirstName'];
        $vLastName = $_POST['vLastName'];
        $vUserName = $_POST['vUserName'];
        $vContact = $_POST['vContact'];
        $tAddress = $_POST['tAddress'];
        $vPassword = $_POST['vPassword'];
        $vEmail = $_POST['vEmail'];
        $vBPIACCNO1 = $_POST['vBPIACCNO1'];
        
        
        $sql = "SELECT iRegistrationCodeId FROM registrationcodes WHERE vRegistrationCode = '".$vRegistrationCode."' AND eStatus = 'Active'";
        $db_regcode = $obj->MySQLSelect($sql);
        
        if(count($db_regcode) <= 0){
            echo '1'; exit;
        }  
        
        $sql = "SELECT iMemberId FROM members WHERE vUserName = '".$sponsor_username."'";
        $db_user = $obj->MySQLSelect($sql);
        
        if(count($db_user) <= 0){
            echo '2'; exit;
        }
        
        $sql = "SELECT iMemberId FROM members WHERE vUserName = '".$vUserName."'";
        $db_username = $obj->MySQLSelect($sql);
        
        if(count($db_username) > 0){
            echo '3'; exit;
        }
        
        $Data['vRegistrationCode'] = $vRegistrationCode; 
        $Data['iSponsorid'] = $db_user[0]['iMemberId']; 
        $Data['vFirstName'] = $vFirstName;
        $Data['vLastName'] = $vLastName;
        $Data['vUserName'] = $vUserName;
        $Data['vContact'] = $vContact;
        $Data['tAddress'] = $tAddress;
        $Data['vEmail'] = $vEmail;
        $Data['vBPIACCNO1'] = $vBPIACCNO1;        
        $Data['vPassword'] = $generalobj->encrypt($vPassword);
        $Data['dDate'] = date("Y-m-d H:i:s");
        $Data['eType'] = 1;
        $Data['eStatus'] = 'Active';
        $id = $obj->MySQLQueryPerform("members",$Data,'insert');
        if($id){
            $sql = "SELECT * FROM genealogy WHERE iParentId = '".$db_user[0]['iMemberId']."' AND (iLeftId = 0 OR iRightId = 0)";
            $db_genealogy_avail = $obj->MySQLSelect($sql);
            
            if(count($db_genealogy_avail) > 0){
                if($db_genealogy_avail[0]['iLeftId'] == 0){
                    $Data_Genealogy['iParentId'] = $db_user[0]['iMemberId'];
                    $Data_Genealogy['iLeftId'] = $id; 
                    $where = " iGenealogyId = '".$db_genealogy_avail[0]['iGenealogyId']."'";
                    $Genealogyid = $obj->MySQLQueryPerform("genealogy",$Data_Genealogy,'update',$where);
                }else if($db_genealogy_avail[0]['iRightId'] == 0){
                    $Data_Genealogy['iParentId'] = $db_user[0]['iMemberId'];
                    $Data_Genealogy['iRightId'] = $id; 
                    $where = " iGenealogyId = '".$db_genealogy_avail[0]['iGenealogyId']."'";
                    $Genealogyid = $obj->MySQLQueryPerform("genealogy",$Data_Genealogy,'update',$where);
                }
                
                $sql = "SELECT * FROM genealogy WHERE iGenealogyId = '".$db_genealogy_avail[0]['iGenealogyId']."' AND iLeftId != 0 AND iRightId != 0";
                $db_genealogy_perchk = $obj->MySQLSelect($sql);
                
                if(count($db_genealogy_perchk) > 0){
                    $sql = "SELECT iGenealogyId FROM genealogy WHERE iParentId = '".$db_user[0]['iMemberId']."' AND iLeftId != 0 AND iRightId != 0";
                    $db_cycles = $obj->MySQLSelect($sql);
                    $ttcycle = count($db_cycles);
                    
                    $arrrb = array();
                    $cnt = 5;
                    for($i=0;$i<=1000;$i++){
                       array_push($arrrb,$cnt);
                       $cnt = $cnt + 5;
                    }
                    
                    if (in_array($ttcycle, $arrrb)) { 
                        $Data_payment['iGenealogyId'] = $db_genealogy_avail[0]['iGenealogyId'];
                        $Data_payment['fAmount'] = '250.00';
                        $Data_payment['eReceived'] = 'No';
                        $Data_payment['dAddedDate'] = date("Y-m-d H:i:s");
                        $Data_payment['eType'] = 'Cheque';
                        $Genealogyid = $obj->MySQLQueryPerform("payment",$Data_payment,'insert');   
                    }else{ 
                        $Data_payment['iGenealogyId'] = $db_genealogy_avail[0]['iGenealogyId'];
                        $Data_payment['fAmount'] = '250.00';
                        $Data_payment['eReceived'] = 'No';
                        $Data_payment['dAddedDate'] = date("Y-m-d H:i:s"); 
                        $Data_payment['eType'] = 'Cash';
                        $Genealogyid = $obj->MySQLQueryPerform("payment",$Data_payment,'insert');  
                    }  
                    
                    $sql = "SELECT iSponsorid FROM members WHERE iMemberId = '".$db_user[0]['iMemberId']."'";
                    $db_parent_parent = $obj->MySQLSelect($sql);
                    
                    $sql = "SELECT * FROM genealogy WHERE iParentId = '".$db_parent_parent[0]['iSponsorid']."' AND (iLeftId = 0 OR iRightId = 0)";
                    $db_genealogy_patent_fin = $obj->MySQLSelect($sql);
                    
                    if(count($db_genealogy_patent_fin) > 0){
                        if($db_genealogy_patent_fin[0]['iLeftId'] == 0){                            
                            $Data_Genealogy_per['iLeftId'] = $db_user[0]['iMemberId']; 
                            $where = " iGenealogyId = '".$db_genealogy_patent_fin[0]['iGenealogyId']."'";
                            $Genealogyperid = $obj->MySQLQueryPerform("genealogy",$Data_Genealogy_per,'update',$where);
                        }else if($db_genealogy_patent_fin[0]['iRightId'] == 0){
                            $Data_Genealogy_per['iRightId'] = $db_user[0]['iMemberId']; 
                            $where = " iGenealogyId = '".$db_genealogy_patent_fin[0]['iGenealogyId']."'";
                            $Genealogyperid = $obj->MySQLQueryPerform("genealogy",$Data_Genealogy_per,'update',$where);
                        }
                        
                        $sql = "SELECT * FROM genealogy WHERE iGenealogyId = '".$db_genealogy_patent_fin[0]['iGenealogyId']."' AND iLeftId != 0 AND iRightId != 0";
                        $db_genealogy_patent_fin_rec = $obj->MySQLSelect($sql);
                        
                        if(count($db_genealogy_patent_fin_rec) > 0){                            
                            $Data_Genealogy_rec_per['iParentId'] = $db_genealogy_patent_fin_rec[0]['iParentId'];
                            $Data_Genealogy_rec_per['eType'] = 'Recruits';
                            $Genealogyperid = $obj->MySQLQueryPerform("genealogy",$Data_Genealogy_rec_per,'insert');
                        }
                    }else{
                        $Data_Genealogy_rec['iParentId'] = $db_user[0]['iMemberId'];
                        $Data_Genealogy_rec['eType'] = 'Recruits';
                        $Genealogyid = $obj->MySQLQueryPerform("genealogy",$Data_Genealogy_rec,'insert');
                    }
                }
            }else{ 
                $Data_Genealogy['iParentId'] = $db_user[0]['iMemberId'];
                $Data_Genealogy['iLeftId'] = $id;
                $Data_Genealogy['eType'] = 'New';
                $Genealogyid = $obj->MySQLQueryPerform("genealogy",$Data_Genealogy,'insert');
            }
            
            $_SESSION["sess_iMemberId"] = $id;
            $_SESSION["sess_vUserName"] = $vUserName;
            $_SESSION["sess_vFirstName"] = $vFirstName;
            $_SESSION["sess_vLastName"] = $vLastName;
            $_SESSION["sess_vEmail"] = $vEmail;  
            $_SESSION["sess_eType"] = 1;
            $_SESSION["sess_Name"]= $vFirstName." ".$vLastName;
            
            
            $Data_REGCODES['eStatus'] = 'Inactive';
            $where = " vRegistrationCode = '".$vRegistrationCode."'";
            $REGCODEID = $obj->MySQLQueryPerform("registrationcodes",$Data_REGCODES,'update',$where);
            
            echo '4'; exit;
        }else{
            echo '5'; exit;
        }        
        exit;
    }
?>