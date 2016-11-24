<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span8"> 
                    <div class="widget ">
                        <div class="widget-header">                            
                            <h3><?php if($iProjectId != ''){?> Edit <?php }else{ ?> Add <?php } ?> Project</h3>
                        </div> 
                        <div class="widget-content">
                            <form id="frmproject" name="frmproject" method="post" action="" class="form-horizontal" enctype="multipart/form-data">
                                <input type="hidden" name="action" id="action" value="add_project">
                                <input type="hidden" name="iProjectId" id="iProjectId" value="<?php echo $db_project[0]['iProjectId']; ?>">
                                <fieldset>
                                    <div class="control-group">											
                                        <label class="control-label">Project Name</label>
                                        <div class="controls">
                                            <input type="text" class="span4" name="Data[vTitle]" id="vTitle" value="<?php echo $db_project[0]['vTitle']; ?>">
                                        </div> 				
                                    </div>
                                    <div class="control-group">											
                                        <label class="control-label">Project Description</label>
                                        <div class="controls">
                                            <textarea class="span4" name="Data[tDerscription]" id="tDerscription"><?php echo $db_project[0]['tDerscription']; ?></textarea>
                                        </div> 				
                                    </div>
                                    <div class="control-group">											
                                        <label class="control-label">Customer Project Id</label>
                                        <div class="controls">                                            
                                            <input type="text" class="span4" name="Data[vCustomerProjectId]" id="vCustomerProjectId" value="<?php echo $db_project[0]['vCustomerProjectId']; ?>">
                                        </div> 				
                                    </div>
                                    <div class="control-group">											
                                        <label class="control-label">Address</label>
                                        <div class="controls">                                            
                                            <textarea class="span4" name="Data[tAddress]" id="tAddress"><?php echo $db_project[0]['tAddress']; ?></textarea>
                                        </div> 				
                                    </div>
                                    <div class="control-group">											
                                        <label class="control-label">City</label>
                                        <div class="controls">                                            
                                            <input type="text" class="span4" name="Data[vCity]" id="vCity" value="<?php echo $db_project[0]['vCity']; ?>">
                                        </div> 				
                                    </div>
                                     <div class="control-group">											
                                        <label class="control-label">Other Info.</label>
                                        <div class="controls">                                            
                                            <textarea class="span4" name="Data[tOtherInfo]" id="tOtherInfo"><?php echo $db_project[0]['tOtherInfo']; ?></textarea>
                                        </div> 				
                                    </div>
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
                                    <?php if($db_project[0]['eStatus'] != 'Approved'){?>
                                    <div class="form-actions">
                                        <button type="button" class="btn btn-primary" onClick="check_project();"><?php if($iProjectId != ''){?> Edit <?php }else{ ?> Add <?php } ?> Project</button>
                                    </div> 
                                    <?php } ?>
                                </fieldset>
                            </form>
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
                            <div style="width:100%;"><a href="<?php echo $db_project_files[$i]['vUrl']; ?>"><?php echo $db_project_files[$i]['vName']; ?></a></div>
                            <?php } ?>
                            <?php } ?>
                            <h2>Images</h2>
                            <?php for($i=0;$i<count($db_project_imaegs);$i++){ ?>
                            <?php if($db_project_imaegs[$i]['vUrl'] != ''){ ?>
                            <div style="width:100%;float:left;margin-top:10px;"><img src="<?php echo $db_project_imaegs[$i]['vUrl']; ?>" style="width:100px;"></div>
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