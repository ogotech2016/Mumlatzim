<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>Login</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
    
<link href="<?php echo $tconfig["tsite_stylesheets_front"]; ?>bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $tconfig["tsite_stylesheets_front"]; ?>bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />

<link href="css/font-awesome.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    
<link href="<?php echo $tconfig["tsite_stylesheets_front"]; ?>style.css" rel="stylesheet" type="text/css">
<link href="<?php echo $tconfig["tsite_stylesheets_front"]; ?>pages/signin.css" rel="stylesheet" type="text/css">

<script src="<?php echo $tconfig["tsite_javascript_front"]; ?>jquery-1.7.2.min.js"></script>
<script src="<?php echo $tconfig["tsite_javascript_front"]; ?>bootstrap.js"></script>

<script src="<?php echo $tconfig["tsite_javascript_front"]; ?>signin.js"></script>

</head>

<body>
	
	<div class="navbar navbar-fixed-top">
	
	<div class="navbar-inner">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			
			<a class="brand" href="index.html">
				Company name goes here				
			</a>		
			
		  <!--/.nav-collapse -->	
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->

<div class="account-container">
	
	<div id="loginview" class="content clearfix">
		
		<form class="form-horizontal templatemo-signin-form" action="" method="post" name="frmlogin" id="frmlogin">
          <input type="hidden" name="action" id="action" value="chk_login">
          <input type="hidden" name="eType" id="eType" value="User">
		
			<h1>Member Login</h1>		
			
			<div class="login-fields">
				
				<p>Please provide your details</p>
				<div id="error_msg" class="alert alert-warning alert-dismissible" style="display:none;"></div>
				<div class="field">
					<label for="username">Username:</label>
					<input type="text" id="vUserName" name="vUserName" value="<?php echo $_COOKIE['emp_login_cookie']; ?>" placeholder="Username" class="login username-field" />
				</div> <!-- /field -->
				
				<div class="field">
					<label for="password">Password:</label>
					<input type="password" id="vPassword" name="vPassword" value="<?php echo $_COOKIE['emp_password_cookie']; ?>" placeholder="Password" class="login password-field"/>
				</div> <!-- /password -->
				
				
				
				
    
				
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
				<span class="login-checkbox">
                                    <input id="remember_login" name="remember_login" type="checkbox" class="field login-checkbox" value="Yes" tabindex="4" <?php if($_COOKIE['emp_login_cookie'] != '' && $_COOKIE['emp_password_cookie'] != ''){ ?> checked <?php } ?>/>
					<label class="choice" for="Field">Remember Me</label>
				</span>
									
				
           <input type="button" onClick="check_login();" value="Sign in" class="button btn btn-success btn-large">
                              
				
			</div> <!-- .actions -->
			
			
			
		</form>
		
	</div> <!-- /content -->
        
        
        <!-------------Fpass------------>
        <div id="passview" class="content clearfix" style="display:none;">
		
		<form class="form-horizontal templatemo-signin-form" action="" method="post" name="forgotpass" id="forgotpass">
          <input type="hidden" name="action" id="action" value="chk_forgpass">
		
			<h1>Forgot Password</h1>		
			
			<div class="login-fields">
				
				<p>Please provide your email details</p>
				<div id="error_msg"  value="chk_forgpass" class="alert alert-warning alert-dismissible" style="display:none;"></div>
				<div class="field">
					<label for="username">Email</label>
					<input type="text" id="vEmail" name="vEmail" value="" placeholder="Email" class="login username-field" />
				</div> <!-- /field -->
				
			</div> <!-- /login-fields -->
                        
			
			<div class="login-actions">
								
				
           <input type="button" onClick="chk_forgpass();" value="Submit" class="button btn btn-success btn-large">
           
           
                              
				
			</div> <!-- .actions -->
			
			
			
		</form>
		
	</div> <!-- /content -->
        <!------------------------------>
	
</div> <!-- /account-container -->

<div class="login-extra" style="">
	<a id="passviewtxt" href="javascript:void(0);" onClick="change_me('pass');">Forgot Password?</a>
        <a id="loginviewtxt" href="javascript:void(0);" onClick="change_me('log');" style="display:none;">Login</a>
</div> <!-- /login-extra -->


  
  <script>
    var base_url = '<?php $tconfig['tsite_url']; ?>'; 
    
    function change_me(type){
        if(type == 'log'){
            $("#passview").hide();
            $("#loginviewtxt").hide();
            $("#loginview").show();
            $("#passviewtxt").show();
        }else{
            $("#loginview").hide();
            $("#passview").show();
            $("#loginviewtxt").show();
            $("#passviewtxt").hide();
        }
    }
    function chk_forgpass(){ 
          var errcount = 0;
          var passmsg = '';
          if($("#vEmail").val() == ''){ 
            errcount = 1;
            passmsg = passmsg+'* Please enter Email Address<br>';
          }
          
          if(errcount > 0){
            $("#error_msg").html(passmsg);
            $("#error_msg").show();
            return false;
          }
          else{
            document.forgotpass.submit();
          	 passmsg = passmsg+'* password send to your Email Address.<br>';
          }
      }
    
    function check_login(){
		alert(123);
          var errorcount = 0;
          var loginmsg = '';
          if($("#vUserName").val() == ''){ 
            errorcount = 1;
            loginmsg = loginmsg+'* Please enter username<br>';
          }
          if($("#vPassword").val() == ''){
            errorcount = 1; 
            loginmsg = loginmsg+'* Please enter password';
          }
          
          if(errorcount > 0){
            $("#error_msg").html(loginmsg);
            $("#error_msg").show();
            return false;
          }else{
            document.frmlogin.submit();
          }
      }
      
      $('#send_admin_message').click(function(){
            var sender_username = $('#sender_username').val();
            var sender_contact = $('#sender_contact').val();
            var sender_message = $('#sender_message').val();
                
                      if(sender_username == "" || sender_contact == "" || sender_message == ""){
                             $('#send_admin_message_result').html('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>All fields are required.</div>');
                      }else{
                        var request = $.ajax({  
                            type: "POST",
                            url: base_url+"index.php?file=c-loginemp",  
                            data: $("#frmforg").serialize(), 	  

                            success: function(data) { 
                                $("#error_msg").hide();
                                $("#success_msg").hide();
                                data = data.trim();
                                //alert(data); return false;

                              if(data == 2){
                                $('#send_admin_message_result').html('<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Password request sent to your email successfully.</div>');
                                return false;
                              }else if(data == 1){
                                $('#send_admin_message_result').html('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Entered username is not fount. Please try again.</div>');
                                return false;
                              }else{
                                $('#send_admin_message_result').html('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Something goes wrong.Please try again.</div>');
                                return false;  
                              }
                            }
                          });
                      }
            
        });
  </script>
  <?php if($_REQUEST['var_err_msg'] != ''){ ?>
    <script>
       $("#error_msg").html('<?php echo $_REQUEST['var_err_msg']; ?>');
       $("#error_msg").show(); 
    </script>      
  <?php } ?>
</body>   
</html>