<?php
session_start();
?>

<!DOCTYPE html>

<html lang="en">

  <head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title><?php echo constant("LBL_TITLE") ?></title>

    <!-- Favicon -->

    <link rel="shortcut icon" type="image/icon" href="<?php echo $tconfig["tsite_public_html"]; ?>front/assets/images/favicon.ico"/>

    <!-- Font Awesome -->

    <link href="<?php echo $tconfig["tsite_public_html"]; ?>front/assets/css/font-awesome.css" rel="stylesheet">

    <!-- Bootstrap -->

    <link href="<?php echo $tconfig["tsite_public_html"]; ?>front/assets/css/bootstrap.css" rel="stylesheet">    

    <!-- Slick slider -->

    <link rel="stylesheet" type="text/css" href="<?php echo $tconfig["tsite_public_html"]; ?>front/assets/css/slick.css"/> 

    <!-- Fancybox slider -->

    <link rel="stylesheet" href="<?php echo $tconfig["tsite_public_html"]; ?>front/assets/css/jquery.fancybox.css" type="text/css" media="screen" /> 

    <!-- Animate css -->

    <link rel="stylesheet" type="text/css" href="<?php echo $tconfig["tsite_public_html"]; ?>front/assets/css/animate.css"/> 

    <!-- Progress bar  -->

    <link rel="stylesheet" type="text/css" href="<?php echo $tconfig["tsite_public_html"]; ?>front/assets/css/bootstrap-progressbar-3.3.4.css"/> 

     <!-- Theme color -->

    <link id="switcher" href="<?php echo $tconfig["tsite_public_html"]; ?>front/assets/css/theme-color/default-theme.css" rel="stylesheet">
    <!-- Main Style -->

    <link href="<?php echo $tconfig["tsite_public_html"]; ?>front/style.css" rel="stylesheet">
    <!-- Fonts -->
    <!-- Open Sans for body font -->

    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    <!-- Lato for Title -->

    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->

  <link rel="stylesheet" href="<?php echo $tconfig["tsite_public_html"]; ?>admin/validation/validationEngine.jquery.css" type="text/css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

  <!--<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
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
          <?php
          if(!empty($_SESSION['bu_name'])){
        ?>
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo constant("LBL_HI") ?>,<?php echo $_SESSION['bu_name'];  ?>&nbsp;<img src="<?php echo $tconfig["tsite_images"]."business/";echo $_SESSION['bu_image'];?>" class="img-circle" alt="FB Profile Image" style="width:25px; height: 25px;"><span class="caret"></span></a>
            
            <ul class="dropdown-menu">
			   <!-- <li><a href="<?php echo $tconfig['tsite_url']; ?>index.php?file=bm-businessmate"><?php echo constant("LBL_INVITEMATE") ?></a></li>-->
			   
		  <li><a href="<?php echo $tconfig['tsite_url']; ?>index.php?file=bu-business"><?php echo constant("LBL_BUSINESS") ?></a></li>
			   
          <li><a href="<?php echo $tconfig['tsite_url']; ?>index.php?file=nf-notification"><?php echo constant("LBL_INBOX") ?></a></li>
          <!--<li><a href="<?php //echo $tconfig['tsite_url']; ?>/index.php?file=bo-businessorder"><span><?php //echo constant("LBL_ORDER") ?></span></a></li>-->
          <li><a href="<?php echo $tconfig['tsite_url']; ?>logout.php?business=2"><?php echo constant("LBL_LOGOUT") ?></a></li>
			            
			          </ul>
            </li>
            <?php
          }
          ?>
          </ul>  
          
          <ul class="nav navbar-nav navbar-right">
          
          <?php
          if(empty($_SESSION['bu_name'])){
          ?>
          <li><a class="signup" id="signup"  data-toggle="modal" data-target="#myModalsignup" href="#"><?php echo constant("LBL_SIGNUP") ?></a></li>
          <li><a class="login" href="#" data-toggle="modal" data-target="#myModallogin"><?php echo constant("LBL_LOGIN") ?></a></li>
          <?php }
          
          if(!empty($_SESSION['bu_name'])){
            ?>
          <li><a href="<?php echo $tconfig['tsite_url']; ?>index.php?file=bm-businessmate"><?php echo constant("LBL_INVITEMATE") ?></a>
          <?php
          }
          ?>
          <li><a class="care" href="#"><?php echo constant("LBL_ABOUT") ?></a></li>
          
            <li><a class="event" href="#"><?php echo constant("LBL_CONTACT") ?></a></li>
            <?php
          if(!empty($_SESSION['bu_name'])){
          ?>
            <li>
                <?php
                $sql_switch = "SELECT * FROM business where id ='".$_SESSION['bu_id']."'";
                $result_switch = $obj->MySQLSelect($sql_switch);
                
                ?>
                <div class="onoffswitch">
                   <input type="hidden" value="<?php echo $_SESSION['bu_id']; ?>" />
                    <input type="checkbox" class="onoffswitch-checkbox" id="myonoffswitch" <?php if($result_switch[0]['availability']==1){echo "checked"; }?>>
                      <label class="onoffswitch-label" for="myonoffswitch">
                        <span class="onoffswitch-inner"></span>
                        <span class="onoffswitch-switch"></span>
                      </label>
                </div>

          </li>
            <?php }
          ?>
          </ul>

        </div>

        <!-- /.navbar-collapse -->

      </div>

      <!-- /.container-fluid -->

    </nav>

  </header>

  <!-- End header -->
<style>
  .abc{
  position: absolute;
  top:137px;
  left:9px;
  width: 98%;
  z-index: 99999;
} 
</style>
<script type="text/javascript">
$(document).on('click', function() {
//	$('#msg').hide();
	$('#msg').fadeOut(1000);
});  
</script>

<style>
      .onoffswitch {
        position: relative; width: 111px; top: 8px; margin-right: 10px;
        -webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;
    }
    .onoffswitch-checkbox {
        display: none;
    }
    .onoffswitch-label {
        display: block; overflow: hidden; cursor: pointer;
        border: 2px solid #999999; border-radius: 20px;
    }
    .onoffswitch-inner {
        display: block; width: 200%; margin-left: -100%;
        transition: margin 0.3s ease-in 0s;
    }
    .onoffswitch-inner:before, .onoffswitch-inner:after {
        display: block; float: left; width: 50%; height: 35px; padding: 0; line-height: 35px;
        font-size: 14px; color: white; font-family: Trebuchet, Arial, sans-serif; font-weight: bold;
        box-sizing: border-box;
    }
    .onoffswitch-inner:before {
        content: "Active";
        padding-left: 10px;
        background-color:  #008000; color: #FFFFFF;
    }
    .onoffswitch-inner:after {
        content: "De-Active";
        padding-right: 10px;
        background-color: #C9302C; color: #FFFFF;
        text-align: right;
    }
    .onoffswitch-switch {
        display: block; width: 18px; margin: 8.5px;
        background: #FFFFFF;
        position: absolute; top: 0; bottom: 0;
        right: 72px;
        border: 2px solid #999999; border-radius: 20px;
        transition: all 0.3s ease-in 0s; 
    }
    .onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-inner {
        margin-left: 0;
    }
    .onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-switch {
        right: 0px; 
    }
</style>
<script>
   $(document).ready(function(){
        $('#myonoffswitch').click(function(){
          var hiddenValueID = $(".onoffswitch").children(':hidden').val();
          var myonoffswitch=$('#myonoffswitch').val();
          //alert(myonoffswitch);
          if ($("#myonoffswitch:checked").length == 0)
          {
            var a=myonoffswitch;
            }
            else
            {
            var a="off";
            }
            $.ajax({
                type: "POST",
                //url: "ajax.php",
                url: '<?php echo $tconfig['tsite_url']; ?>servicerequestdata.php',
                data: {value: a, id: hiddenValueID} ,
                success: function(html){
                    $("#display").html(html).show();
                }
            });
            });
    });
</script>
