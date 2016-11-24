<?php
    if($_POST['action'] == 'chk_registration'){   
        $vFirstName = $_POST['vFirstName'];
        $vLastName = $_POST['vLastName'];
        $vUserName = $_POST['vUserName'];
        $vContact = $_POST['vContact'];
        $tAddress = $_POST['tAddress'];
        $vEmail = $_POST['vEmail'];
        
        $sql = "SELECT iMemberId FROM members WHERE vUserName = '".$vUserName."' AND iMemberId != '".$_SESSION['sess_iMemberId']."'";
        $db_username = $obj->MySQLSelect($sql);
       
        if(count($db_username) > 0){
            echo '3'; exit;
        }        
        
        $Data['vFirstName'] = $vFirstName;
        $Data['vLastName'] = $vLastName;
        $Data['vUserName'] = $vUserName;
        $Data['vContact'] = $vContact;
        $Data['tAddress'] = $tAddress;
        $Data['vEmail'] = $vEmail;        
        
        $where = " iMemberId = '".$_SESSION['sess_iMemberId']."'";
	$res = $obj->MySQLQueryPerform("members",$Data,'update',$where);
        
        if($res){           
            echo '4'; exit;
        }else{
            echo '5'; exit;
        }
        
        exit;
    }
    
    if($_POST['action'] == 'chk_password'){
        $vPassword_old = $_POST['vPassword_old'];
        $vPassword = $_POST['vPassword'];
        $vRepassword = $_POST['vRepassword'];
        
        $sql = "SELECT iMemberId FROM members WHERE vPassword = '".$generalobj->encrypt($vPassword_old)."' AND iMemberId = '".$_SESSION['sess_iMemberId']."'";
        $db_pass = $obj->MySQLSelect($sql);
        
        if(count($db_pass) <= 0){
            echo '3'; exit;
        }
        
        $Data['vPassword'] = $generalobj->encrypt($vPassword);
        $where = " iMemberId = '".$_SESSION['sess_iMemberId']."'";
	$res = $obj->MySQLQueryPerform("members",$Data,'update',$where);
        
        if($res){           
            echo '4'; exit;
        }else{
            echo '5'; exit;
        }
        
        exit;
        
        
    }
    
    $sql = "SELECT * FROM members WHERE iMemberId = '".$_SESSION['sess_iMemberId']."'";
    $db_member = $obj->MySQLSelect($sql);
?>