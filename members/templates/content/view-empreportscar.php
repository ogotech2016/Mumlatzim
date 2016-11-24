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
                                            <label class="control-label" for="username">Car</label>
                                            <div class="controls">
                                                <select name="iCarId" id="iCarId">
                                                    <option value="">Select</option>
                                                    <?php for($i=0;$i<count($db_cars);$i++){ 
                                                    if($db_cars[$i]['iCarId'] == $db_editedreport[0]['iCarId']){
                                                            $sel = 'selected';
                                                        }else{
                                                            $sel = '';
                                                        }
                                                    ?>                                                    
                                                    <option value="<?php echo $db_cars[$i]['iCarId']?>" <?php echo $sel; ?>><?php echo $db_cars[$i]['vCar']?></option>
                                                    <?php } ?>
                                                </select>
                                            </div> <!-- /controls -->				
                                        </div>
                                        
                                        <!--<div class="control-group">											
                                            <label class="control-label" for="username">License Plate</label>
                                            <div class="controls">
                                                <input type="text" name="vLicencePlate" id="vLicencePlate" value="<?php //echo $db_editedreport[0]['vLicencePlate']; ?>">
                                            </div> 		
                                        </div> -->
                                        
                                        <div class="control-group">											
                                            <label class="control-label" for="username">From Address</label>
                                            <div class="controls">
                                                <textarea class="span3" name="tFrom" id="tFrom"><?php echo $db_editedreport[0]['tFrom']; ?></textarea>
                                            </div> <!-- /controls -->				
                                        </div>
                                        
                                        
                                        <div class="control-group">											
                                            <label class="control-label" for="username">To Address</label>
                                            <div class="controls">
                                                <textarea class="span3" name="tTo" id="tTo"><?php echo $db_editedreport[0]['tTo']; ?></textarea>
                                            </div> <!-- /controls -->				
                                        </div>
                                        
                                        <div class="control-group">											
                                            <label class="control-label" for="username">Comment</label>
                                            <div class="controls">
                                                <textarea class="span3" name="tComment" id="tComment"><?php echo $db_editedreport[0]['tComment']; ?></textarea>
                                            </div> <!-- /controls -->				
                                        </div>
                                        
                                        <div class="control-group">											
                                            <label class="control-label" for="username">Start KM on meter</label>
                                            <div class="controls">
                                                <input type="text" name="fStartKM" id="fStartKM" value="<?php echo $db_editedreport[0]['fStartKM']; ?>">
                                            </div> <!-- /controls -->				
                                        </div>
                                        
                                        <div class="control-group">											
                                            <label class="control-label" for="username">End KM on meter</label>
                                            <div class="controls">
                                                <input type="text" name="fEndKM" id="fEndKM" value="<?php echo $db_editedreport[0]['fEndKM']; ?>">
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
                                        <th width="10%" style="font-size:13px;text-align:center;">Car</th>                                        
                                        <th width="10%" style="font-size:13px;text-align:center;">License PLate</th>
                                        <th width="15%" style="font-size:13px;text-align:center;">From </th>
                                        <th width="15%" style="font-size:13px;text-align:center;">To</th>
                                        <th width="15%" style="font-size:13px;text-align:center;">Comment</th>
                                        <th width="10%" style="font-size:13px;text-align:center;">Start KM</th>
                                        <th width="10%" style="font-size:13px;text-align:center;">End KM</th>
                                        <th width="10%" style="font-size:13px;text-align:center;">Range</th>
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
                                        <td style="font-size:13px;vertical-align: top;text-align:center;<?php echo $bck; ?>"><a href="<?php echo $tconfig['tsite_url']; ?>/index.php?file=c-empreportscar&RId=<?php echo $db_reports[$i]['iReportId']; ?>" title=""><img src="<?php echo $tconfig["tsite_images"]; ?>icons/icon_edit.png" alt="Edit" title="Edit"/></a>&nbsp;&nbsp;<?php echo $db_reports[$i]['dDate']?></td>
                                        <td style="font-size:13px;vertical-align: top;text-align:left;<?php echo $bck; ?>"><?php echo $db_reports[$i]['car']?></td>
                                        <td style="font-size:13px;vertical-align: top;text-align:left;<?php echo $bck; ?>"><?php echo $db_reports[$i]['vLicencePlate']?></td>
                                        <td style="font-size:13px;vertical-align: top;text-align:left;<?php echo $bck; ?>"><?php echo $db_reports[$i]['tFrom']?></td>
                                        <td style="font-size:13px;vertical-align: top;text-align:left;<?php echo $bck; ?>"><?php echo $db_reports[$i]['tTo']?></td>
                                        <td style="font-size:13px;vertical-align: top;text-align:left;<?php echo $bck; ?>"><?php echo $db_reports[$i]['tComment']?></td>
                                        <td style="font-size:13px;vertical-align: top;text-align:center;<?php echo $bck; ?>"><?php echo $db_reports[$i]['fStartKM']?></td>
                                        <td style="font-size:13px;vertical-align: top;text-align:center;<?php echo $bck; ?>"><?php echo $db_reports[$i]['fEndKM']?></td>
                                        <td style="font-size:13px;vertical-align: top;text-align:center;<?php echo $bck; ?>"><?php echo $db_reports[$i]['fRange']?></td>
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
