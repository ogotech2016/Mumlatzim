<link href="<?php echo $tconfig["tsite_stylesheets_front"]; ?>default.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo $tconfig["tsite_javascript_front"]; ?>zebra_datepicker.js"></script>
<link rel="stylesheet" media="all" type="text/css" href="http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css" />
<link rel="stylesheet" media="all" type="text/css" href="<?php echo $tconfig["tsite_javascript_front"]; ?>jquery-ui-timepicker-addon.css" />
<script type="text/javascript" src="http://code.jquery.com/ui/1.11.0/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo $tconfig["tsite_javascript_front"]; ?>jquery-ui-timepicker-addon.js"></script>
<!--<script type="text/javascript" src="<?php echo $tconfig["tsite_javascript_front"]; ?>jquery-ui-timepicker-addon-i18n.min.js"></script>
<script type="text/javascript" src="<?php echo $tconfig["tsite_javascript_front"]; ?>jquery-ui-sliderAccess.js"></script>-->


                
<div class="main">
	
	<div class="main-inner">

	    <div class="container">
	
	      <div class="row">
	      	
	      	<div class="span12"> 
	      		<div class="widget ">	      			
                            <div class="widget-header"><h3>Report</h3></div> <!-- /widget-header -->                            
                            <div class="widget-content">
                                <div id="error_msg" class="alert alert-warning alert-dismissible" style="display:none;"></div>        
                                <form name="frmreport" id="frmreport" method="post" action="">
                                    <input type="hidden" id="action" name="action" value="add_report">
                                    <input type="hidden" id="iReportId" name="iReportId" value="<?php echo $db_editedreport[0]['iReportId']; ?>">
                                    <fieldset>										
                                        <div class="control-group">											
                                            <label class="control-label" for="username">Date</label>
                                            <div class="controls">
                                                <input type="text" class="span3" id="dDate" name="dDate" value="<?php echo $db_editedreport[0]['dDate']; ?>" style="width:200px;">&nbsp;<i class="icon-large icon-calendar "></i> 
                                            </div> <!-- /controls -->				
                                        </div>
                                        <div class="control-group">											
                                            <label class="control-label" for="username">Employee</label>
                                            <div class="controls">
                                                <select name="iMemberId" id="iMemberId">
                                                    <option value="">Select</option>
                                                    <?php for($i=0;$i<count($db_users);$i++){ 
                                                        if($db_users[$i]['iMemberId'] == $db_editedreport[0]['iMemberId']){
                                                            $sel = 'selected';
                                                        }else{
                                                            $sel = '';
                                                        }
                                                    ?>                                                    
                                                    <option value="<?php echo $db_users[$i]['iMemberId']?>" <?php echo $sel; ?>><?php echo $db_users[$i]['vFirstName'].' '.$db_users[$i]['vLastName']?></option>
                                                    <?php } ?>
                                                </select>
                                            </div> <!-- /controls -->				
                                        </div>
                                        <div class="control-group">											
                                            <label class="control-label" for="username">Project</label>
                                            <div class="controls">
                                                <select name="iProjectId" id="iProjectId">
                                                    <option value="">Select</option>
                                                    <?php for($i=0;$i<count($db_projects);$i++){ 
                                                    if($db_projects[$i]['iProjectId'] == $db_editedreport[0]['iProjectId']){
                                                            $sel = 'selected';
                                                        }else{
                                                            $sel = '';
                                                        }
                                                    ?>                                                    
                                                    <option value="<?php echo $db_projects[$i]['iProjectId']?>" <?php echo $sel; ?>><?php echo $db_projects[$i]['vTitle']?></option>
                                                    <?php } ?>
                                                </select>
                                            </div> <!-- /controls -->				
                                        </div>
                                        <div class="control-group">											
                                            <label class="control-label" for="username" >Arrival Time</label>
                                            <div class="controls">
                                                <input type="text" class="span3" id="dArriveTime" name="dArriveTime" value="<?php echo $db_editedreport[0]['dArriveTime']; ?>" style="width:200px;">&nbsp;<i class="icon-large icon-time "></i>
                                            </div> <!-- /controls -->				
                                        </div>
                                        <div class="control-group">											
                                            <label class="control-label" for="username" >Leave Time</label>
                                            <div class="controls">
                                                <input type="text" class="span3" id="dLeaveTime" name="dLeaveTime" value="<?php echo $db_editedreport[0]['dLeaveTime']; ?>" style="width:200px;">&nbsp;<i class="icon-large icon-time "></i>
                                            </div> <!-- /controls -->				
                                        </div>
                                        <div class="control-group">											
                                            <label class="control-label" for="username" >Break</label>
                                            <div class="controls">
                                                <select name="dBreak" id="dBreak">
                                                    <option value="">Select</option>
                                                    <option value="30" <?php if($db_editedreport[0]['dBreak'] == '30'){ ?> selected<?php } ?>>30 Minutes</option>
                                                    <option value="45" <?php if($db_editedreport[0]['dBreak'] == '45'){ ?> selected<?php } ?>>45 Minutes</option>
                                                    <option value="60" <?php if($db_editedreport[0]['dBreak'] == '60'){ ?> selected<?php } ?>>60 Minutes</option>
                                                </select>
                                            </div> <!-- /controls -->				
                                        </div>
<!--                                        <div class="control-group">											
                                            <label class="control-label" for="username">Work Time</label>
                                            <div class="controls">
                                                <input type="text" class="span3" id="dWorktime" name="dWorktime" value="<?php echo $db_editedreport[0]['dWorktime']; ?>">
                                            </div>  /controls 				
                                        </div>-->
                                        <div class="control-group">											
                                            <label class="control-label" for="username">Work info</label>
                                            <div class="controls">
                                                <textarea class="span3" name="tWorkInfo" id="tWorkInfo"><?php echo $db_editedreport[0]['tWorkInfo']; ?></textarea>
                                            </div> <!-- /controls -->				
                                        </div>
                                        <div class="control-group">											
                                            <label class="control-label" for="username">What is left</label>
                                            <div class="controls">
                                                <textarea class="span3" name="tWhatIsLeft" id="tWhatIsLeft"><?php echo $db_editedreport[0]['tWhatIsLeft']; ?></textarea>
                                            </div> <!-- /controls -->				
                                        </div>
                                        
                                        <div class="control-group">											
                                            <label class="control-label" for="username" style="width: 92px;"><input type="checkbox" name="eExtraTime" id="eExtraTime" value="Yes" style="float:left;">&nbsp;&nbsp;Extra Time</label>
                                            <div class="controls" style="display:none;" id="extra">
                                                <textarea class="span3" name="tExtraTime" id="tExtraTime"><?php echo $db_editedreport[0]['tExtraTime']; ?></textarea>
                                            </div> <!-- /controls -->				
                                        </div>
                                        
                                        <div class="control-group">											
                                            <label class="control-label" for="username" style="width: 170px;"><input type="checkbox" name="eBuymaterialfromstore" id="eBuymaterialfromstore" value="Yes" style="float:left;">&nbsp;&nbsp;Buy material from store</label>
                                            <div class="controls" style="display:none;" id="buy">
                                                <textarea class="span3" name="tBuymaterialfromstore" id="tBuymaterialfromstore"><?php echo $db_editedreport[0]['tBuymaterialfromstore']; ?></textarea>
                                            </div> <!-- /controls -->				
                                        </div>
                                        
                                        <div class="control-group">											
                                            <label class="control-label" for="username" style="width: 160px;"><input type="checkbox" name="eGotFromOwnStorage" id="eGotFromOwnStorage" value="Yes" style="float:left;">&nbsp;&nbsp;Got from own storage</label>
                                            <div class="controls" style="display:none;" id="got">
                                                <textarea class="span3" name="tGotFromOwnStorage" id="tGotFromOwnStorage"><?php echo $db_editedreport[0]['tGotFromOwnStorage']; ?></textarea>
                                            </div> <!-- /controls -->				
                                        </div>
                                        
                                        <div class="control-group">											
                                            <label class="control-label" for="username" style="width: 160px;"><input type="checkbox" name="eMilageOfCar" id="eMilageOfCar" value="Yes" style="float:left;">&nbsp;&nbsp;Milage of car</label>
                                            <div class="controls" style="display:none;" id="mil">
                                                <textarea class="span3" name="vMilageOfCar" id="vMilageOfCar"><?php echo $db_editedreport[0]['vMilageOfCar']; ?></textarea>
                                            </div> <!-- /controls -->				
                                        </div>

                                        <div class="control-group">											
                                            <label class="control-label" for="username" style="width: 160px;"><input type="checkbox" name="eOrderedBySupplier" id="eOrderedBySupplier" value="Yes" style="float:left;">&nbsp;&nbsp;Ordered By Supplier</label>
                                            <div class="controls" style="display:none;" id="sup">
                                                <textarea class="span3" name="tOrderedBySupplier" id="tOrderedBySupplier"><?php echo $db_editedreport[0]['tOrderedBySupplier']; ?></textarea>
                                            </div> <!-- /controls -->				
                                        </div>           
                                        
                                        <div class="form-actions" >
                                                <button type="button" onClick="chk_report();" class="btn btn-primary">Save</button>                                                 
                                        </div> 
                                    </fieldset>
                                    </form>
                                    <div class="panel-body">
                        <div class="table-responsive">
                            <form name="frmlist" id="frmlist"  action="index.php?file=ad-administrator_a" method="post">
                            <input type="hidden" name="action" id="action" value="" />
                            <input  type="hidden" name="iAdminId" value=""/>
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th width="10%" style="font-size:13px;text-align:center;">Date</th>
                                        <th width="10%" style="font-size:13px;text-align:center;">Employee</th>                                        
                                        <th width="10%" style="font-size:13px;text-align:center;">Project</th>
                                        <th width="9%" style="font-size:13px;text-align:center;">Arrive Time</th>
                                        <th width="9%" style="font-size:13px;text-align:center;">Leave Time</th>
                                        <th width="9%" style="font-size:13px;text-align:center;">Break</th>
                                        <th width="5%" style="font-size:13px;text-align:center;">Work Time</th>
                                        <th width="20%" style="font-size:13px;text-align:center;">Work Info.</th>
                                        <th width="20%" style="font-size:13px;text-align:center;">What is Left</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php for($i=0;$i<count($db_reports);$i++){ 
                                   if($db_reports[$i]['eStatus'] == 'Approved'){
                                       $bck = 'background-color: #dff0d8;';
                                   }else{
                                       $bck = '';
                                   }    
                                   ?>
                                    <tr>
                                        <td width="10%" style="font-size:13px;vertical-align: top;text-align:center;<?php echo $bck; ?>"><a href="<?php echo $tconfig['tsite_url']; ?>/index.php?file=c-empreports&RId=<?php echo $db_reports[$i]['iReportId']; ?>" title=""><img src="<?php echo $tconfig["tsite_images"]; ?>icons/icon_edit.png" alt="Edit" title="Edit"/></a>&nbsp;&nbsp;<?php echo $db_reports[$i]['dDate']?></td>
                                        <td width="10%" style="font-size:13px;vertical-align: top;text-align:center;<?php echo $bck; ?>"><?php echo $db_reports[$i]['member']; ?></td>                                        
                                        <td width="10%" style="font-size:13px;vertical-align: top;text-align:center;<?php echo $bck; ?>"><?php echo $db_reports[$i]['project']; ?></td>
                                        <td width="9%" style="font-size:13px;vertical-align: top;text-align:center;<?php echo $bck; ?>"><?php echo $db_reports[$i]['dArriveTime']; ?></td>
                                        <td width="9%" style="font-size:13px;vertical-align: top;text-align:center;<?php echo $bck; ?>"><?php echo $db_reports[$i]['dLeaveTime']; ?></td>
                                        <td width="9%" style="font-size:13px;vertical-align: top;text-align:center;<?php echo $bck; ?>"><?php echo $db_reports[$i]['dBreak']; ?>&nbsp;Minutes</td>
                                        <td width="6%" style="font-size:13px;vertical-align: top;text-align:center;<?php echo $bck; ?>"><?php echo $db_reports[$i]['dWorktime']; ?> Hrs.</td>
                                        <td width="20%" style="font-size:13px;vertical-align: top;text-align:left;<?php echo $bck; ?>"><?php echo myTruncate($db_reports[$i]['tWorkInfo'], 70); ?></td>
                                        <td width="20%" style="font-size:13px;vertical-align: top;text-align:left;<?php echo $bck; ?>"><?php echo myTruncate($db_reports[$i]['tWhatIsLeft'], 70); ?></td>
                                    </tr>
                                   <?php } ?> 
                                </tbody>
                            </table>                            
                            </form>
                            <?php echo $page_link;?>
                        </div>
                    </div>
                                </div> <!-- /widget-content -->						
                            </div> <!-- /widget -->	      		
		</div> <!-- /span8 -->
	      </div> <!-- /row -->	
	    </div> <!-- /container -->	    
	</div> <!-- /main-inner -->    
</div> <!-- /main -->
<script>
    $('#dDate').Zebra_DatePicker();
    $('#dArriveTime').timepicker({timeFormat: 'hh:mm tt'});
    $('#dLeaveTime').timepicker({timeFormat: 'hh:mm tt'});
    $('#dBreak').timepicker({timeFormat: 'hh:mm tt'});  
    
    function chk_report(){
        document.frmreport.submit();
    }
    
    $(document).ready(function(){
        $("#eExtraTime").click(function(){
            if($(this).prop("checked") == true){
                $("#extra").show();
            }
            else if($(this).prop("checked") == false){
                $("#extra").hide();
            }
        });
        
        $("#eBuymaterialfromstore").click(function(){
            if($(this).prop("checked") == true){
                $("#buy").show();
            }
            else if($(this).prop("checked") == false){
                $("#buy").hide();
            }
        });
        
        $("#eGotFromOwnStorage").click(function(){
            if($(this).prop("checked") == true){
                $("#got").show();
            }
            else if($(this).prop("checked") == false){
                $("#got").hide();
            }
        });
        
        $("#eMilageOfCar").click(function(){
            if($(this).prop("checked") == true){
                $("#mil").show();
            }
            else if($(this).prop("checked") == false){
                $("#mil").hide();
            }
        });
        
        $("#eOrderedBySupplier").click(function(){
            if($(this).prop("checked") == true){
                $("#sup").show();
            }
            else if($(this).prop("checked") == false){
                $("#sup").hide();
            }
        });
    });
</script>
<?php if($db_editedreport[0]['eExtraTime'] == 'Yes'){ ?>
<script>$("#eExtraTime").prop('checked', true); $("#extra").show();</script>
<?php } ?>
<?php if($db_editedreport[0]['eBuymaterialfromstore'] == 'Yes'){ ?>
<script>$("#eBuymaterialfromstore").prop('checked', true); $("#buy").show();</script>
<?php } ?>
<?php if($db_editedreport[0]['eGotFromOwnStorage'] == 'Yes'){ ?>
<script>$("#eGotFromOwnStorage").prop('checked', true); $("#got").show();</script>
<?php } ?>
<?php if($db_editedreport[0]['eMilageOfCar'] == 'Yes'){ ?>
<script>$("#eMilageOfCar").prop('checked', true); $("#mil").show();</script>
<?php } ?>

<?php if($db_editedreport[0]['eOrderedBySupplier'] == 'Yes'){ ?>
<script>$("#eOrderedBySupplier").prop('checked', true); $("#sup").show();</script>
<?php } ?>
