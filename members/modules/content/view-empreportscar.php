<?php
    
    if($_POST['action'] == 'add_report'){         
        if($_POST['iReportId'] == ''){
            $Data['dDate'] = $_POST['dDate'];
            $Data['iCarId'] = $_POST['iCarId'];
            $Data['vLicencePlate'] = $_POST['vLicencePlate'];
            $Data['tFrom'] = $_POST['tFrom'];
            $Data['tTo'] = $_POST['tTo'];
            $Data['tComment'] = $_POST['tComment'];
            $Data['fStartKM'] = $_POST['fStartKM'];
            $Data['fEndKM'] = $_POST['fEndKM'];            
            $Data['fRange'] = $Data['fEndKM'] - $Data['fStartKM'];
            $Data['iAddbyMemberId'] = $_SESSION["sess_iMemberId"];
            $id = $obj->MySQLQueryPerform("carreports",$Data,'insert');
            if($id){
                header("Location: ".$tconfig["tsite_url"]."index.php?file=c-empreportscar&var_msg=Report added successfully.");
                exit;
            }else{
                header("Location: ".$tconfig["tsite_url"]."index.php?file=c-empreportscar&var_err_msg=Something goes wrong. Please try again.");
                exit;
            }
        }else{
            $Data['dDate'] = $_POST['dDate'];
            $Data['iCarId'] = $_POST['iCarId'];
            $Data['vLicencePlate'] = $_POST['vLicencePlate'];
            $Data['tFrom'] = $_POST['tFrom'];
            $Data['tTo'] = $_POST['tTo'];
            $Data['tComment'] = $_POST['tComment'];
            $Data['fStartKM'] = $_POST['fStartKM'];
            $Data['fEndKM'] = $_POST['fEndKM'];            
            $Data['fRange'] = $Data['fEndKM'] - $Data['fStartKM'];
            $Data['iAddbyMemberId'] = $_SESSION["sess_iMemberId"];
            
            $where = " iReportId = '".$_POST['iReportId']."'";
            $res = $obj->MySQLQueryPerform("carreports",$Data,'update',$where);

            if($res){
                header("Location: ".$tconfig["tsite_url"]."index.php?file=c-empreportscar&var_msg=Report updated successfully.");
                exit;
            }else{
                header("Location: ".$tconfig["tsite_url"]."index.php?file=c-empreportscar&var_err_msg=Something goes wrong. Please try again.");
                exit;
            }
        }
    }
    
    if($_REQUEST['RId'] != ''){
        $sql = "SELECT * FROM carreports WHERE 1=1 AND iReportId = '".$_REQUEST['RId']."'";
        $db_editedreport = $obj->MySQLSelect($sql);
    }
    $iMemberId = $_SESSION["sess_iMemberId"];
    
    $sql = "SELECT * FROM carreports WHERE 1=1 AND iAddbyMemberId = '".$iMemberId."'";
    $db_reports = $obj->MySQLSelect($sql);
    
    for($i=0;$i<count($db_reports);$i++){
        $sql = "SELECT * FROM cars WHERE 1=1 AND iCarId = '".$db_reports[$i]['iCarId']."'";
        $db_repcar = $obj->MySQLSelect($sql);
        $db_reports[$i]['car'] = $db_repcar[0]['vCar'];
    }
    
    $sql = "SELECT * FROM cars WHERE 1=1 ORDER By vCar ASC";
    $db_cars = $obj->MySQLSelect($sql);
?>