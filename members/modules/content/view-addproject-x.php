<?php
    $action = $_POST['action'];
    if($action == 'add_project'){
        include_once(TPATH_CLASS."Imagecrop.class.php");
        $thumb = new thumbnail();        
        $Data = $_POST["Data"];       
        if($_POST['iProjectId'] == ''){
            $Data['dAddeddDate'] = date("Y-m-d H:i:s");
            $Data['eStatus'] = 'Pending';
            $Data['iMemberId'] = $_SESSION["sess_iMemberId"];
            $id = $obj->MySQLQueryPerform("projects",$Data,'insert');
            if($id){
                
                $projectfiles = $_FILES['projectfiles'];
                $projectimages = $_FILES['projectimages'];

                if(count($projectfiles) > 0){
                    $name = $projectfiles['name'];
                    $tmpname = $projectfiles['tmp_name'];

                     for($i=0;$i<count($name);$i++){ 
                         $Data_image = array();
                         $image_object = $tmpname[$i];  
                         $image_name   = $name[$i];

                         if($image_name != ""){
                             $Photo_Gallery_folder = $tconfig["tsite_upload_images_files_path"].$id."/";
                             if(!is_dir($Photo_Gallery_folder)){
                                 mkdir($Photo_Gallery_folder, 0777);
                             }  

                             $filedet = $generalobj->fileupload($Photo_Gallery_folder,$image_object, $image_name);
                             
                             $Data_image['vName'] = $image_name;
                             $Data_image['vFile'] = $filedet[0];
                             $Data_image['iProjectId'] = $id;                            
                             $idimg = $obj->MySQLQueryPerform("project_files",$Data_image,'insert');                            
                         }
                     }
                }

                if(count($projectimages) > 0){ 
                    $name = $projectimages['name'];
                    $tmpname = $projectimages['tmp_name'];

                     for($i=0;$i<count($name);$i++){
                         $Data_image = array();
                         $image_object = $tmpname[$i];  
                         $image_name   = $name[$i];

                         if($image_name != ""){
                             $Photo_Gallery_folder = $tconfig["tsite_upload_images_project_path"].$id."/";
                             if(!is_dir($Photo_Gallery_folder)){
                                 mkdir($Photo_Gallery_folder, 0777);
                             }  
                             $Data_image['vImage'] = $generalobj->general_upload_image($image_object,$image_name, $Photo_Gallery_folder, $tconfig["tsite_upload_images_project_size1"], '','','','','','Y','');
                             $Data_image['iProjectId'] = $id;                            
                             $idimg = $obj->MySQLQueryPerform("project_images",$Data_image,'insert');                            
                         }
                     }
                }
                $var_msg = "Project added Successfully.";
            }else{
                $var_msg="Eror-in Add.";
            }
            header("Location: ".$tconfig["tsite_url"]."index.php?file=c-addproject&pid=".$id."&var_msg=$var_msg");
            exit;
        }else{
           $Data['dEditDate'] = date("Y-m-d H:i:s"); 
           $where = " iProjectId = '".$_POST['iProjectId']."'";
           $res = $obj->MySQLQueryPerform("projects",$Data,'update',$where);
           if($res){
               $projectfiles = $_FILES['projectfiles'];
               $projectimages = $_FILES['projectimages'];
               
               if(count($projectfiles) > 0){
                   $name = $projectfiles['name'];
                   $tmpname = $projectfiles['tmp_name'];
                   
                    for($i=0;$i<count($name);$i++){ 
                        $Data_image = array();
                        $image_object = $tmpname[$i];  
                        $image_name   = $name[$i];
                       
                        if($image_name != ""){
                            $Photo_Gallery_folder = $tconfig["tsite_upload_images_files_path"].$_POST['iProjectId']."/";
                            if(!is_dir($Photo_Gallery_folder)){
                                mkdir($Photo_Gallery_folder, 0777);
                            }  
                            
                            $filedet = $generalobj->fileupload($Photo_Gallery_folder,$image_object, $image_name);
                            
                            $Data_image['vName'] = $image_name;
                            $Data_image['vFile'] = $filedet[0];
                            $Data_image['iProjectId'] = $_POST['iProjectId'];                            
                            $idimg = $obj->MySQLQueryPerform("project_files",$Data_image,'insert');                            
                        }
                    }
               }
               
               if(count($projectimages) > 0){ 
                   $name = $projectimages['name'];
                   $tmpname = $projectimages['tmp_name'];
                   
                    for($i=0;$i<count($name);$i++){ 
                        $Data_image = array();
                        $image_object = $tmpname[$i];  
                        $image_name   = $name[$i];
                       
                        if($image_name != ""){
                            $Photo_Gallery_folder = $tconfig["tsite_upload_images_project_path"].$_POST['iProjectId']."/";
                            if(!is_dir($Photo_Gallery_folder)){
                                mkdir($Photo_Gallery_folder, 0777);
                            }  
                            $Data_image['vImage'] = $generalobj->general_upload_image($image_object,$image_name, $Photo_Gallery_folder, $tconfig["tsite_upload_images_project_size1"], '','','','','','Y','');
                            $Data_image['iProjectId'] = $_POST['iProjectId'];                            
                            $idimg = $obj->MySQLQueryPerform("project_images",$Data_image,'insert');                            
                        }
                    }
               }
               
               $var_msg = "Project edited Successfully.";
           }else{
               $var_msg="Eror-in edit.";
           }
           header("Location: ".$tconfig["tsite_url"]."index.php?file=c-addproject&pid=".$_POST['iProjectId']."&var_msg=$var_msg");
           exit;
        }
    }
    
    $iProjectId = $_REQUEST['pid'];   
    
    if($iProjectId != ''){
        $sql = "SELECT * FROM projects WHERE iProjectId = '".$iProjectId."'";
        $db_project = $obj->MySQLSelect($sql);
        
        $sql = "SELECT * FROM project_files WHERE iProjectId = '".$iProjectId."'";
        $db_project_files = $obj->MySQLSelect($sql);
        
        for($i=0;$i<count($db_project_files);$i++){
            $imgname = $tconfig["tsite_upload_images_files_path"].$iProjectId."/".$db_project_files[$i]['vFile'];   
            if(file_exists($imgname)){
               $db_project_files[$i]['vUrl'] = $tconfig["tsite_upload_images_files"].$iProjectId."/".$db_project_files[$i]['vFile'];
            }else{
               $db_project_files[$i]['vUrl']="";
            }
        }
        
        $sql = "SELECT * FROM project_images WHERE iProjectId = '".$iProjectId."'";
        $db_project_imaegs = $obj->MySQLSelect($sql);
        
        for($i=0;$i<count($db_project_imaegs);$i++){
            $imgname = $tconfig["tsite_upload_images_project_path"].$iProjectId."/1_".$db_project_imaegs[$i]['vImage'];   
            if(file_exists($imgname)){
               $db_project_imaegs[$i]['vUrl'] = $tconfig["tsite_upload_images_project"].$iProjectId."/1_".$db_project_imaegs[$i]['vImage'];
            }else{
               $db_project_imaegs[$i]['vUrl']="";
            }
        }
    }
?>