<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  <title>Register</title>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width">        
  <link rel="stylesheet" href="<?php echo $tconfig['tsite_stylesheets']; ?>templatemo_main.css">
  <style>
  .templatemo-content {
    margin-left: 0px;
	}
  </style>  
<!-- 
Dashboard Template 
http://www.templatemo.com/preview/templatemo_415_dashboard
-->
</head>
<body>
  <div class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <div class="logo"><h1>Member Registration</h1></div>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button> 
      </div>   
    </div>
    <div class="template-page-wrapper">
        <ol class="breadcrumb">
          <li><a href="<?php echo $tconfig['tsite_url']; ?>index.php?file=c-login">Login</a></li>
          <li class="active">Register</li>
        </ol>
      <div class="col-md-10 col-md-offset-1">
          <br><br>
        <div class="templatemo-content">
          <h1>Register</h1>
         
          <div class="margin-bottom-30">
            <div class="row">
            <div class="col-md-12">
				<!-- Register -->
            <form role="form" id="frmreg" name="frmreg" method="post" action="">
                <input type="hidden" name="action" id="action" value="chk_registration">
                <div id="error_msg" class="alert alert-danger" style="display:none;"></div> 
                <div class="row">
                  <div class="col-md-6 margin-bottom-15 required">
                    <label for="firstName" class="control-label">Registration Code *</label>
                    <input type="text" class="form-control" id="vRegistrationCode" name="vRegistrationCode" value="">                  
                  </div>
                  <div class="col-md-6 margin-bottom-15 required">
                    <label for="lastName" class="control-label">Sponsor Username *</label>
                    <input type="text" class="form-control" id="sponsor_username" name="sponsor_username" value="">                 
                  </div>
                </div><!-- row -->                
                 
                <div class="row">
                  <div class="col-md-6 margin-bottom-15 required">
                    <label for="firstName" class="control-label">First Name *</label>
                    <input type="text" class="form-control" id="vFirstName" name="vFirstName" value="">                  
                  </div>
                  <div class="col-md-6 margin-bottom-15 required">
                    <label for="lastName" class="control-label">Last Name *</label>
                    <input type="text" class="form-control" id="vLastName" name="vLastName" value="">                 
                  </div>
                </div><!-- row -->
                
                <div class="row">
                  <div class="col-md-6 margin-bottom-15 required">
                    <label for="firstName" class="control-label">Username *</label>
                    <input type="text" class="form-control" id="vUserName" name="vUserName" value=""> 
                     <small>Username must be at least 6 alphanumeric characters</small>                    
                  </div>
                  <div class="col-md-6 margin-bottom-15 required">
                    <label for="lastName" class="control-label">Contact Number *</label>
                    <input type="text" class="form-control" id="vContact" name="vContact" value="">                 
                  </div>
                </div><!-- row -->
                
                <div class="row">
                  <div class="col-md-6 margin-bottom-15 required">
                    <label for="firstName" class="control-label">Password *</label>
                    <input type="password" class="form-control" id="vPassword" name="vPassword" value="">                  
                    <small>Password must be at least 6 alphanumeric characters</small>
                  </div>
                  <div class="col-md-6 margin-bottom-15 required">
                    <label for="lastName" class="control-label">Confirm Password *</label>
                    <input type="password" class="form-control" id="vRepassword" name="vRepassword" value="">                 
                  </div>
                </div><!-- row -->
                
                <div class="row">
                   <div class="col-md-12 margin-bottom-15">
                    <label class="control-label" for="inputSuccess">Address</label>
                    <input type="text" class="form-control" id="tAddress" name="tAddress" value="">
                  </div>
						  
                </div> 

		<!--<div class="row">
                  <div class="col-md-6 margin-bottom-15 required">
                    <label for="bankName" class="control-label">BPI Account Name *</label>
                    <input type="text" class="form-control" id="vBPIACCNO1" name="vBPIACCNO1" value="">  
                  </div>
                  <div class="col-md-6 margin-bottom-15 required">
                    <label for="bankNumber" class="control-label">BPI Account Number *</label>
                    <input type="text" class="form-control" id="vBPIACCNO2" name="vBPIACCNO2" value="">  
                  </div>
                </div>--><!-- row -->
				
                <div class="row">  
                      <div class="col-md-6 margin-bottom-15">
                    <label for="email" class="control-label">Email Address</label>
                    <input type="text" class="form-control" id="vEmail" name="vEmail" value="">                  
                  </div>		
                  <div class="col-md-6 margin-bottom-15 required">
                    <label for="bankName" class="control-label">BPI Account No. *</label>
                    <input type="text" class="form-control" id="vBPIACCNO1" name="vBPIACCNO1" value="">  
                  </div>
                  
                </div><!-- row -->
                
                <div class="row">
                   <div class="col-md-6 margin-bottom-15" style="margin-top:0px;">
                             <div class="checkbox">
                                <label>
                                  <input type="checkbox" name="terms" id="terms" value="Yes"> I agree to the <a href="http://info.juan-kpremiere.com/terms">Terms and Conditions</a>
                                </label>
                              </div>              
                  </div>
                    <div class="col-md-12 margin-bottom-15">
                        <button id="reg" class="btn btn-lg btn-primary pull-right" onClick="check_registration();">Submit</button>
                  </div> 
                </div>
              
              </form>
				<!-- End Register -->
			</div>
            </div> 
          </div>    
        </div>
      </div>      
      <footer class="templatemo-footer">
        <div class="templatemo-copyright">
          <p>Copyright &copy; 2084 Your Company Name</p>
        </div>
      </footer>
    </div>

    <script src="<?php echo $tconfig['tsite_javascript']; ?>jquery.min.js"></script>
    <script src="<?php echo $tconfig['tsite_javascript']; ?>bootstrap.min.js"></script>
    <script src="<?php echo $tconfig['tsite_javascript']; ?>Chart.min.js"></script>
    <script src="<?php echo $tconfig['tsite_javascript']; ?>templatemo_script.js"></script>
    <script>
        var base_url = "<?php echo $tconfig["tsite_url"]; ?>";
        $("#frmreg").submit(function (e) {
                 e.preventDefault();                   
       });
       
       function check_registration(){            
            var vRegistrationCode = $('#vRegistrationCode').val();
            var sponsor_username = $('#sponsor_username').val();
            var vFirstName = $('#vFirstName').val();
            var vLastName =  $('#vLastName').val();
            var vUserName = $('#vUserName').val();
            var vContact = $('#vContact').val();
            var vPassword = $('#vPassword').val();
            var vRepassword = $('#vRepassword').val();
            var tAddress = $('#tAddress').val();
            var vEmail = $('#vEmail').val();
            var terms = $('#terms').val();
            var vBPIACCNO1 = $('#vBPIACCNO1').val();
            
            
            
            var error_msg = '';
            var error = 0;
            
            if(vRegistrationCode == ''){
               error_msg = error_msg+'* Please enter Registration Code<br>' ;
               error = 1;
            }
            if(sponsor_username == ''){
               error_msg = error_msg+'* Please enter Sponsor Username<br>' ;
               error = 1;
            }
            
            if(vFirstName == ''){
               error_msg = error_msg+'* Please enter First Name<br>' ;
               error = 1;
            }
            if(vLastName == ''){
               error_msg = error_msg+'* Please enter Last Name<br>' ;
               error = 1;
            }
            if(vUserName == ''){
               error_msg = error_msg+'* Please enter Username<br>' ;
               error = 1;
            }
            else{
                if(vUserName.length < 6){
                  error_msg = error_msg+'* Username must be at least 6 characters<br>' ;
                  error = 1;  
                }
            }
            if(vContact == ''){
               error_msg = error_msg+'* Please enter Contact Number<br>' ;
               error = 1;
            }
            if(vPassword == ''){
               error_msg = error_msg+'* Please enter Password<br>' ;
               error = 1;
            }else{
                if(vPassword.length < 6){
                  error_msg = error_msg+'* Password must be at least 6 characters<br>' ;
                  error = 1;  
                }
            }
            
            if(vRepassword == ''){
               error_msg = error_msg+'* Please enter Confirm Password<br>' ;
               error = 1;
            }
            
            if(vBPIACCNO1 == ''){
               error_msg = error_msg+'* Please enter BPI Account Name<br>' ;
               error = 1;
            }
            
            if($('#terms').attr('checked')) {
               error_msg = error_msg+'* Please agree with the Terms and Conditions<br>' ;
               error = 1;
            } else {
               
            }
            
            if(error > 0){     
              $("#error_msg").html(error_msg);
              $("#error_msg").show();
            }else{
              var request = $.ajax({  
                type: "POST",
                url: base_url+"index.php?file=c-registration",  
                data: $("#frmreg").serialize(), 	  

                success: function(data) { 
                  data = data.trim();
                  //alert(data);
                  
                  if(data == 1){
                    $("#error_msg").html('* Registration Code does not match. Please try again.');
                    $("#error_msg").show();
                    return false;
                  }else if(data == 2){
                    $("#error_msg").html('* Sponsor Username does not match. Please try again.');
                    $("#error_msg").show();
                    return false;
                  }else if(data == 3){
                    $("#error_msg").html('* Username you entered is already exist. Please try again witt another.');
                    $("#error_msg").show();
                    return false;
                  }else if(data == 4){
                    window.location.href = base_url+"index.php?file=c-home";
                    return false;
                  }else{
                    $("#error_msg").html('* Something goes wrong. Please try again.');
                    $("#error_msg").show();
                    return false;  
                  }
                }
              });
            }
       }
    </script>
</body>
</html>