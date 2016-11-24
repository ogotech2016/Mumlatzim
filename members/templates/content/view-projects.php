<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12"> 
                    <div class="widget ">
                        <div class="widget-header">                            
                            <h3>My Projects</h3>
                        </div> 
                        <div class="widget-content">
                    <div class="panel panel-default">
                    
                    <div class="panel-body">
                        <div class="table-responsive">
                            <form name="frmlist" id="frmlist"  action="index.php?file=ad-administrator_a" method="post">
                            <input type="hidden" name="action" id="action" value="" />
                            <input  type="hidden" name="iAdminId" value=""/>
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th width="20%" style="font-size:15px;text-align:center;">Project Name</th>
                                        <th width="5%" style="font-size:15px;text-align:center;">Status</th>                                        
                                        <th width="20%" style="font-size:15px;text-align:center;">Add Date</th>                                        
                                        <th width="5%"style="font-size:15px;text-align:center;">Edit</th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i = 0; $i < count($db_projects); $i++) { ?>
                                        <tr>
                                            <td><?php echo $db_projects[$i]['vTitle']; ?></td>
                                            <td><?php echo $db_projects[$i]['eStatus']; ?></td>
                                            <td><?php echo $generalobj->DateTime($db_projects[$i]['dAddeddDate'],13); ?></td>
                                            <td style="text-align:center;">
                                                <a href="<?php echo $tconfig['tsite_url']; ?>/index.php?file=c-addproject&pid=<?php echo $db_projects[$i]['iProjectId']; ?>" title=""><img src="<?php echo $tconfig["tsite_images"]; ?>icons/icon_edit.png" alt="Edit" title="Edit"/></a>
                                            </td>                                            
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            </form>
                            <?php echo $page_link;?>
                        </div>
                    </div>
                    
                </div>
                        </div> 
                    </div> 
                </div> 
                
            </div> 
        </div> 
    </div> 
</div>
<script>
    function check_project(){
        document.frmproject.submit();  
    }
</script>