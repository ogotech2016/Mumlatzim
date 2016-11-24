

  <div class="templatemo-content-wrapper">
    <div class="templatemo-content">
          <h1>Edit Profile</h1>         
          <div class="margin-bottom-30">
            <div class="row">
            <div class="col-md-12">				
            <form role="form" id="frmreg" name="frmreg" method="post" action="">
                <input type="hidden" name="action" id="action" value="chk_registration">
                <div id="error_msg" class="alert alert-danger" style="display:none;"></div>
                <div id="success_msg" class="alert alert-success" style="display:none;"></div>
                <div class="row">
                  <div class="col-md-6 margin-bottom-15 required">
                    <label for="firstName" class="control-label">First Name *</label>
                    <input type="text" class="form-control" id="vFirstName" name="vFirstName" value="<?php echo $db_member[0]['vFirstName'];?>">                  
                  </div>                  
                </div><!-- row -->
                <div class="row">                  
                  <div class="col-md-6 margin-bottom-15 required">
                    <label for="lastName" class="control-label">Last Name *</label>
                    <input type="text" class="form-control" id="vLastName" name="vLastName" value="<?php echo $db_member[0]['vLastName'];?>">                 
                  </div>
                </div><!-- row -->
                <div class="row">
                  <div class="col-md-6 margin-bottom-15 required">
                    <label for="firstName" class="control-label">Username: </label><br>
                    <!--<input type="text" class="form-control" id="vUserName" name="vUserName" value="<?php echo $db_member[0]['vUserName'];?>"> 
                     <small>Username must be at least 6 alphanumeric characters</small>                    -->
                    <?php echo $db_member[0]['vUserName'];?>
                  </div>                  
                </div><!-- row -->
                 <div class="row">                  
                  <div class="col-md-6 margin-bottom-15 required">
                    <label for="lastName" class="control-label">Contact Number *</label>
                    <input type="text" class="form-control" id="vContact" name="vContact" value="<?php echo $db_member[0]['vContact'];?>">                 
                  </div>
                </div><!-- row -->  
                <div class="row">
                   <div class="col-md-12 margin-bottom-15">
                    <label class="control-label" for="inputSuccess">Address</label>
                    <input type="text" class="form-control" id="tAddress" name="tAddress" value="<?php echo $db_member[0]['tAddress'];?>">
                  </div>						  
                </div> 	
                <div class="row">  
                    <div class="col-md-6 margin-bottom-15">
                      <label for="email" class="control-label">Email Address</label>
                      <input type="text" class="form-control" id="vEmail" name="vEmail" value="<?php echo $db_member[0]['vEmail'];?>">                  
                    </div>
                </div><!-- row --> 
                <div class="row">  
                    <div class="col-md-6 margin-bottom-15">
                      <label for="email" class="control-label">BPI Account No.</label>
                      <input type="text" class="form-control" id="vEmail" name="vEmail" value="<?php echo $db_member[0]['vBPIACCNO1'];?>">                  
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 margin-bottom-15">
                        <button id="reg" class="btn btn-lg btn-primary pull-right" onClick="check_registration();">Update Profile</button>
                    </div> 
                </div>              
              </form>	<!-- End Register -->
            </div>
            </div> 
          </div>    
        </div>
    <div class="templatemo-content">
          <h1>Change Password</h1>         
          <div class="margin-bottom-30">
            <div class="row">
            <div class="col-md-12">				
            <form role="form" id="frmpass" name="frmpass" method="post" action="">
                <input type="hidden" name="action" id="action" value="chk_password">
                <div id="error_msg_pass" class="alert alert-danger" style="display:none;"></div>
                <div id="success_msg_pass" class="alert alert-success" style="display:none;"></div>
                <div class="row">
                  <div class="col-md-6 margin-bottom-15 required">
                    <label class="control-label">Old Password *</label>
                    <input type="password" class="form-control" id="vPassword_old" name="vPassword_old" value="">                  
                  </div>                  
                </div><!-- row -->
                <div class="row">                  
                  <div class="col-md-6 margin-bottom-15 required">
                    <label class="control-label">New Password *</label>
                    <input type="password" class="form-control" id="vPassword" name="vPassword" value="">                 
                    <small>Password must be at least 6 alphanumeric characters</small>  
                  </div>
                </div><!-- row -->
                <div class="row">
                  <div class="col-md-6 margin-bottom-15 required">
                    <label class="control-label">Confirm Password *</label>
                    <input type="password" class="form-control" id="vRepassword" name="vRepassword" value=""> 
                  </div>                  
                </div><!-- row -->                               
                <div class="row">
                    <div class="col-md-12 margin-bottom-15">
                        <button id="reg" class="btn btn-lg btn-primary pull-right" onClick="check_password();">Change Password</button>
                    </div> 
                </div>              
              </form>	<!-- End Register -->
            </div>
            </div> 
          </div>    
        </div>
  </div>
<script>
        var base_url = "<?php echo $tconfig["tsite_url"]; ?>";
</script>      