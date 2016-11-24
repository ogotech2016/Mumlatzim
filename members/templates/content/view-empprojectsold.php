<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12"> 
                    <div class="widget ">
                        <div class="widget-header">                            
                            <h3>Old Workorders</h3>
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
                                        <th width="15%" style="font-size:15px;text-align:center;">Own Project ID</th>
                                        <th width="15%" style="font-size:15px;text-align:center;">Cust. Project ID</th>
                                        <th width="40%" style="font-size:15px;text-align:center;">Address</th>
                                        <th width="10%" style="font-size:15px;text-align:center;">View Info.</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i = 0; $i < count($db_projects); $i++) { ?>
                                        <tr>
                                            <td><?php echo $db_projects[$i]['vTitle']; ?></td>
                                            <td><?php echo $db_projects[$i]['vOwnProjectId']; ?></td>
                                            <td><?php echo $db_projects[$i]['vCustomerProjectId']; ?></td>
                                            <td><?php echo $db_projects[$i]['tAddress']; ?></td>
                                            <td><a href="<?php echo $tconfig['tsite_url']; ?>index.php?file=c-empaddproject&pid=<?php echo $db_projects[$i]['iProjectId']; ?>">View Info.</a></td>                                      
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