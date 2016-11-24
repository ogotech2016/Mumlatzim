<?php
session_start();
//echo constant("LBL_TEST");
?>

<!DOCTYPE html>

<html lang="en" charset="utf-8">

  <head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo constant("LBL_TITLE") ?></title>

    <link rel="shortcut icon" type="image/icon" href="<?php echo $tconfig["tsite_public_html"]; ?>front/assets/images/favicon.ico"/>

    <link href="<?php echo $tconfig["tsite_public_html"]; ?>front/assets/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo $tconfig["tsite_public_html"]; ?>front/assets/css/bootstrap.css" rel="stylesheet">    

    <link rel="stylesheet" type="text/css" href="<?php echo $tconfig["tsite_public_html"]; ?>front/assets/css/slick.css"/> 

    <link rel="stylesheet" href="<?php echo $tconfig["tsite_public_html"]; ?>front/assets/css/jquery.fancybox.css" type="text/css" media="screen" /> 

    <!-- Animate css -->

    <link rel="stylesheet" type="text/css" href="<?php echo $tconfig["tsite_public_html"]; ?>front/assets/css/animate.css"/> 

    <link rel="stylesheet" type="text/css" href="<?php echo $tconfig["tsite_public_html"]; ?>front/assets/css/bootstrap-progressbar-3.3.4.css"/> 

    <link id="switcher" href="<?php echo $tconfig["tsite_public_html"]; ?>front/assets/css/theme-color/default-theme.css" rel="stylesheet">

    <link href="<?php echo $tconfig["tsite_public_html"]; ?>front/style.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>    

      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <link rel="stylesheet" href="<?php echo $tconfig["tsite_public_html"]; ?>admin/validation/validationEngine.jquery.css" type="text/css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

  </head>

    <?php
    if($_SESSION['sess_lang'] == "EN"){
    ?>
    <body>
    <?php }
    else { ?>
    <body dir="rtl">
    <?php } ?>
  

  <!-- Start header -->

 <header class="header-main">
  <div class="container">
    <div class="header_logo">
      <a class="navbar-brand" href="<?php echo $tconfig["tsite_url"];?>"><img src= "<?php echo $tconfig["tsite_images"]; ?>/recommended4u-logo.png" alt="..."></a> 
    </div>
  </div>

    <nav class="navbar navbar-default">

      <div class="container">

        <!-- Brand and toggle get grouped for better mobile display -->

        <div class="navbar-header">

          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          
          <?php
          if($_SESSION['sess_lang'] == "EN"){
          ?>
          <ul class="nav navbar-nav">
          <?php }
          else { ?>
          <ul class="nav navbar-nav navbar-right">
        <?php } ?>
          <!--<ul class="nav navbar-nav">-->
        <?php
              if(!empty($_SESSION['name'])){
                ?>
                
                <!--<li><a href="#">Hi,<?php echo $_SESSION['name'];  ?></a></li>-->
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo constant("LBL_HI") ?>,<?php echo $_SESSION['name']; ?>&nbsp;<img src="<?php echo $_SESSION['PICTURE'];?>" class="img-circle" alt="FB Profile Image" style="width:25px; height: 25px;"><span class="caret"></span></a>
               
                	<ul class="dropdown-menu">
			            <li><a href="<?php echo $tconfig['tsite_url']; ?>index.php?file=sr-servicerequest"><?php echo constant("LBL_SERVICE") ?></a></li>
			             
			           <!-- <li><a href="<?php echo $tconfig['tsite_url']; ?>index.php?file=fv-favourate"><?php echo constant("LBL_FAVOURITE") ?></a></li>-->
                        
                        <li><a href="<?php echo $tconfig['tsite_url']; ?>logout.php?userlogout=1"><?php echo constant("LBL_LOGOUT") ?></a></li>
                        
			            
			          </ul>
                </li>   
                <?php
              }
			  ?>
           
      </ul>
          <?php
          if($_SESSION['sess_lang'] == "EN"){
          ?>
          <ul class="nav navbar-nav">
            <?php } else { ?>
          <ul class="nav navbar-nav navbar-right">
        <?php } ?>
      <!--<ul class="nav navbar-nav navbar-right">-->
          <!--<ul class="nav navbar-nav navbar-right">-->
          <?php 
				if(empty($_SESSION['name'])){
                ?>
				
			<li><a class="login" href="#" data-toggle="modal" data-target="#myModal"><?php echo constant("LBL_LOGIN") ?></a></li>
            <?php
			}
			?>
             <li><a class="care" href="#"><?php echo constant("LBL_ABOUT") ?></a></li>
            <li><a class="event" href="#"><?php echo constant("LBL_CONTACT") ?></a></li>
             <li><a class="home" href="<?php echo $tconfig['tsite_url']; ?>index.php?file=bu-business"><?php echo constant("LBL_BUSINESS") ?></a></li>
          </ul>
            
          <!--<?php/*
              if(!empty($_SESSION['name'])){
                ?>
               
                <li><a class="logout" href="<?php echo $tconfig['tsite_url']; ?>logout.php?userlogout=1">Logout</a></li>
                <?php
              }*/
            ?>-->
          <?php
          if($_SESSION['sess_lang'] == "EN"){
          ?>
            <ul class="nav navbar-nav navbar-right">
              <?php } else { ?>
          <ul class="nav navbar-nav">
          <?php } ?>
  
             <?php
             if($_SESSION['sess_lang'] == "EN"){

              ?>
			 
                   <li class="dropdown" id="dd"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="<?php echo $tconfig["tsite_public_html"]; ?>images/flag/philippines.png" alt="FB Profile Image" style="width:32px; height: 19px;"><span class="caret"></span></a>
             
			 <?php }else{
              ?>
              <li class="dropdown" ><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="<?php echo $tconfig["tsite_public_html"]; ?>images/flag/israel.png" alt="FB Profile Image" style="width:32px; height: 19px;"> <span class="caret"></span></a>
             <?php }
             ?>
                	<ul class="dropdown-menu" id="myid">
					<?php 
					$sql_con = "select * from country where language='EN'";
					$db_records_con = $obj->MySQLSelect($sql_con);
					
					for($j=0; $j < count($db_records_con); $j++){ 
					$aa= $tconfig['tsite_images']."/flag/".$db_records_con[$j]['flag_img'];
					?>
			            <li id="<?php echo $db_records_con[$j]['id'];?>" onclick="nyf(this.id);"><a href="<?php echo $tconfig['tsite_url']; ?>?language=EN"><img src="<?php echo $aa; ?>" alt="FB Profile Image" style="width:32px; height: 19px;"><?php echo $db_records_con[$j]['country']; ?></a></li>		
					<?php }  ?> 
					
					<?php 
					$sql_con1 = "select * from country where language='HB'";
					$db_records_con1 = $obj->MySQLSelect($sql_con1);
					
					for($j=0; $j < count($db_records_con1); $j++){ 
					$aa1= $tconfig['tsite_images']."/flag/".$db_records_con1[$j]['flag_img'];
					?>
						<li id="<?php echo $db_records_con1[$j]['id'];?>"><a href="<?php echo $tconfig['tsite_url']; ?>?language=HB"><img src="<?php echo $aa1; ?>" alt="FB Profile Image" style="width:32px; height: 19px;"><?php echo $db_records_con1[$j]['country']; ?></a></li>
					<?php } ?>	
	
					</ul>
                </li>              
            <!--<li>
               <form method="POST" action="index.php?file=sr-servicerequest">
               <select name="lang" onchange="this.form.submit()">
                <option value="">--select--</option>
                <option value="EN">English</option>
                <option value="HB">Hebrew</option>
                </select>
               </form>
            </li>-->
            
<!----- START Language script--------------------------->

     <!--       <li>	
					
	<div style="margin-top: 6%;" id="google_translate_element">
		

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en',includedLanguages: 'en,iw', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</div>
   <style>
    .goog-te-gadget-icon{
        display: none !important;
    }
    .goog-te-gadget-simple{
        border: none !important;
        background-color: transparent;
        color: #fff;
        margin-top:4px;
    }
    .goog-te-menu-value{
        text-decoration: none !important;
    }
    .goog-te-gadget-simple .goog-te-menu-value{
        color: #fff !important;
    }
    .goog-tooltip{
        display: none !important;
    }
    .goog-te-menu2-item div, .goog-te-menu2-item:link div, .goog-te-menu2-item:visited div, .goog-te-menu2-item:active div
    {
        color:#337ab7 !important;
    }
    .text{
        color:#337ab7l;
        
    }
    .goog-te-menu-value > span
    {
        font-size:13px;
    }
                                    
   </style>
			</li>  -->
            
   <!-----END Language script--------------------------->         
          </ul>

        </div>

        <!-- /.navbar-collapse -->
      </div>

      <!-- /.container-fluid -->

    </nav>

  </header>

  <!-- End header -->

   <div class="modal fade" id="myModal" role="dialog" style="position: fixed;">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Sign In</h4>
        <!--<div>
         <ul class="nav nav-tabs nav-justified login-tabs">
           
            <li class="login-tabs__login" id="login-tabs__login" onClick="toggle_visibility('login-tabs__login');">
                <a class="js-tab2"  id="login">Sign In</a>
            </li>
            
            
            
        </ul>
        </div>-->
          
        </div>
        <div class="modal-body">
          
<div class="signin" id="signin">
   
		<div class="neww" id="neww">
			<div class="facebook-login-container">
			 
              <?php
			        echo $content = '<a href="'.$tconfig['tsite_url'].'includes/fbconfig.php"><img src="'.$tconfig["tsite_images"].'fb.png" alt="Facebook" style="width: 98%; margin: auto; padding: 5%;"/></a>';
			  ?>  

			</div>
			<div class="facebook-login-container">
			<a href="https://accounts.google.com/o/oauth2/auth?response_type=code&redirect_uri=http%3A%2F%2Fweb-medico.com%2Fweb2%2FMumlatzim%2Fincludes%2Fconf.php&client_id=317870374335-k5u7e1udeev2id3jhps2o9uj65kdtu08.apps.googleusercontent.com&scope=email+profile&access_type=online&approval_prompt=auto">
			<img src="<?php echo $tconfig['tsite_images']; ?>google.png"  style="width: 98%; margin: auto; padding: 5%; padding-top:1px;"></a>
			  
			                 <?php      // echo $content = '<a href="https://www.facebook.com/dialog/oauth?client_id='.$tconfig['App_ID'].'&redirect_uri='.$tconfig['callback_url'].'&scope=email,user_likes,user_friends"><img src="'.$tconfig["tsite_images"].'google.png" alt="Facebook" style="width: 98%; margin: auto; padding: 5%; padding-top:1px;"/></a>';
			  ?>  

			   
			</div>
			<div class="form-group email_login">
			     <button type="reset" id="log" onClick="toggle_visibility('log');" name="log" value="login with Email" class="btn btn-primary btn-lg btn-block bb">Login with Email</button>
			</div>
			
			<div class="regLegalDisclaimer">By proceeding, you agree to our <a href="#" target="_blank" class="js_popup sz800x600" rel="nofollow">Privacy Policy</a> and <a href="/pages/terms.html" target="_blank" class="js_popup sz800x600" rel="nofollow">Terms of Use</a>. </div>
</div> 
<div class="frm" id="frm">                
    <form class="form-horizontal_aa" role="form"  method="post" name="frmlogin" id="frmlogin">
		 <input type="hidden" name="action" id="action" value="chk_login">
                       
		 <div class="form-group login__email">
		                                
		        <label class="control-label sr-only required" for="customer_login_email">            Email
		                </label>
		                            <input type="email" id="email" name="email" required="required" class="form-control input-lg" placeholder="Email">
		   </div>

		 <div class="form-group login__password">
		                                
		        <label class="control-label sr-only required" for="customer_login_password">            Password
		                </label>
		                            <input type="password" id="password" name="password]" required="required" class="form-control input-lg" placeholder="Password">
		                    </div>

              

                    <input type="hidden" class="js-review-order-target-path" name="_target_path" value="">

                    <div class="form-group login__submit">
                  <button type="submit" id="submit" name="submit" onClick="check_login();" value="Sign in" class="btn btn-primary btn-lg btn-block">Sign in</button>
  
                     
                    </div>
					
					<!--<div class="form-group" id="forgot-password" onClick="toggle_visibility('forgot-password');">
                <div class="login__forgot-password">
                                <a href="#">
                                    Forgot your password?
                                </a>
                            </div>
                        
                    </div>-->
                    
                    
        </div>
       
                    
              </form>
       </div>        
              
         
 <div class="forgot-password" id="forgot-password" style="display:none;">                
    <form class="form-horizontal_aa" role="form" action="" method="post" name="frmlogin" id="frmlogin">
		 <input type="hidden" name="action" id="action" value="chk_login">                   
<div class="regForgotPassword" id="regForgotPassword">
<h4>Forgot your Password?</h4>
<p>No problem. Just enter your email address below and we’ll send you a link to reset it.<p>
  <div class="form-group login__email">
		                                
		        <label class="control-label sr-only required" for="customer_login_email">            Email
		                </label>
		                            <input type="email" id="email" name="email" required="required" class="form-control input-lg" placeholder="Email">
	</div>
		   
	<div class="form-group loginsubmit">
                     <button type="submit" id="submit" name="submit" onClick="check_login();" value="Sign in" class="btn btn-primary btn-lg btn-block">Sign in</button>
                  
                     
                    </div>
      <div class="form-group logincancel">
                        <button type="reset" id="cancel" onClick="toggle_visibility('cancel');" class="btn btn-primary btn-lg btn-block vv">Cancel</button>
                    </div>
					
</div>
</form>
</div>
 
<div class="frmemail" id="frmemail" style="display:none;">                
    <form class="form-horizontal_aa" role="form" action="" method="post" name="frmlogin" id="frmlogin">
		 <input type="hidden" name="action" id="action" value="chk_login">
         
		 <div class="form-group login__email">		                                
		        <label class="control-label sr-only required" for="customer_login_email">Email Address
		        </label>
		        <input type="email" id="email" name="email" required="required" class="form-control input-lg" placeholder="Email">
		   </div>

		 <div class="form-group login__password">
		                                
		        <label class="control-label sr-only required" for="customer_login_password">Create a Password
		        </label>
		                            <input type="password" id="password" name="password]" required="required" class="form-control input-lg" placeholder="Create a password">
		                    </div>
                      <input type="hidden" class="js-review-order-target-path" name="_target_path" value="">

                    <div class="form-group login__submit">
                        <button type="submit" id="reg" name="submit" onClick="return register()" value="sign up" class="btn btn-primary btn-lg btn-block">Sign up</button>
              </div>
        </div>
       
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
	</div>
<script>
$('#myModal').on('show.bs.modal', function (e) {

    $('body').addClass('test');
})



function rev11(id) {
	var my_id = id;
	//alert(id);
    $.ajax({
				type: 'POST',
				
                url: '<?php echo $tconfig['tsite_url']; ?>info.php',
				data: { id:my_id},
				success: function(data) {
                                
                               //alert(data);
                                  
                               $("#reviewbox1").modal('show');
							   $("#div123").html(data);
									
	
				}	
									
                                    
           });
}


function nyf(id) {
	
	//alert(id);
	var aa = '#'+id+" a img";
	var imgg =$(aa).attr("src");
	//alert(imgg);
	

}



</script>


<style type="text/css">
	body {
    margin:0;
    padding:0 0;
   /* text-align: center;*/
}
.test[style] {
    padding-right:0 !important;
}
.test.modal-open {
    overflow: auto;
}
.reviewmodal{
  max-height: 395px;
  overflow: auto;
  padding: 5px;
}

</style>
  