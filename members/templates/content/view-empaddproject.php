<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span8"> 
                    <div class="widget ">
                        <div class="widget-header">                            
                            <h3>Workorder Details</h3>
                        </div> 
                        <div class="widget-content">                            
                                <fieldset>
                                    <div class="control-group">											
                                        <label class="control-label">Project Name</label>
                                        <div class="controls">
                                            <input type="text" class="span6" name="Data[vTitle]" id="vTitle" value="<?php echo $db_project[0]['vTitle']; ?>" readonly>
                                        </div> 				
                                    </div>
                                    <div class="control-group">											
                                        <label class="control-label">Project Description</label>
                                        <div class="controls">
                                            <textarea class="span6" name="Data[tDerscription]" id="tDerscription" readonly><?php echo $db_project[0]['tDerscription']; ?></textarea>
                                        </div> 				
                                    </div>
                                    <div class="control-group">											
                                        <label class="control-label">Own Project ID</label>
                                        <div class="controls">                                            
                                            <input type="text" class="span6" name="Data[vOwnProjectId]" id="vOwnProjectId" value="<?php echo $db_project[0]['vOwnProjectId']; ?>" readonly>
                                        </div> 				
                                    </div>
                                    <div class="control-group">											
                                        <label class="control-label">Cust. Project ID</label>
                                        <div class="controls">                                            
                                            <input type="text" class="span6" name="Data[vCustomerProjectId]" id="vCustomerProjectId" value="<?php echo $db_project[0]['vCustomerProjectId']; ?>" readonly>
                                        </div> 				
                                    </div>
                                    <div class="control-group">											
                                        <label class="control-label">Address</label>
                                        <div class="controls">                                            
                                            <textarea class="span6" name="Data[tAddress]" id="tAddress" readonly><?php echo $db_project[0]['tAddress']; ?></textarea>
                                        </div> 				
                                    </div>                                    
                                    <hr>
                                    <h2>Add Files<h2><br>
                                    <form id="frmproject" name="frmproject" method="post" action="" class="form-horizontal" enctype="multipart/form-data">
                                    <input type="hidden" name="action" id="action" value="add_project">
                                    <input type="hidden" name="iProjectId" id="iProjectId" value="<?php echo $db_project[0]['iProjectId']; ?>">
                                    <div class="control-group">											
                                        <label class="control-label">Upload Files</label>
                                        <div class="controls">                                            
                                            <input type="file" class="span4" name="projectfiles[]" id="projectfiles" value="" multiple>
                                        </div> 				
                                    </div>
                                    <div class="control-group">											
                                        <label class="control-label">Upload Images</label>
                                        <div class="controls">                                            
                                            <input type="file" class="span4" name="projectimages[]" id="projectimages" value="" multiple>
                                        </div> 				
                                    </div>
                                    <div class="form-actions">
                                        <button type="button" class="btn btn-primary" onClick="check_project();"><?php if($iProjectId != ''){?> Add <?php }else{ ?> Add <?php } ?> Files</button>
                                    </div> 
                                    </form>
                                </fieldset>
                            
                        </div> 
                    </div> 
                </div> 
                <?php if($iProjectId != ''){?>
                <div class="span4">
                 <div class="widget ">
                        <div class="widget-header">                            
                            <h3>Project Files and Images</h3>
                        </div> 
                        <div class="widget-content">
                            <h2>Files</h2>
                            <?php for($i=0;$i<count($db_project_files);$i++){ ?>
                            <?php if($db_project_files[$i]['vUrl'] != ''){ ?>
                            <div style="width:100%;"><a href="<?php echo $db_project_files[$i]['vUrl']; ?>" target="_blank"><?php echo $db_project_files[$i]['vName']; ?></a></div>
                            <?php } ?>
                            <?php } ?>
                            <h2>Images</h2>
                            <?php for($i=0;$i<count($db_project_imaegs);$i++){ ?>
                            <?php if($db_project_imaegs[$i]['vUrl'] != ''){ ?>
                            <div style="width:100%;float:left;margin-top:10px;"><a href="<?php echo $db_project_imaegs[$i]['vUrl_big']; ?>" target="_blank"><img src="<?php echo $db_project_imaegs[$i]['vUrl']; ?>" style="width:100px;"></a></div>
                            <?php } ?> 
                            <?php } ?>
                        </div> 
                    </div>    
                </div>
                <?php } ?>
            </div> 
        </div> 
    </div> 
</div>
<script>
    function check_project(){
        document.frmproject.submit();  
    }
</script>