 <!-- Start footer -->

  <!--<footer id="footer">

    <div class="container">

      <div class="row">

        <div class="col-md-6 col-sm-6">

          <div class="footer-left">

            <p>Designed by <a href="http://www.markups.io/">MarkUps.io</a></p>

          </div>

        </div>

        <div class="col-md-6 col-sm-6">

          <div class="footer-right">

            <a href="index.html"><i class="fa fa-facebook"></i></a>

            <a href="#"><i class="fa fa-twitter"></i></a>

            <a href="#"><i class="fa fa-google-plus"></i></a>

            <a href="#"><i class="fa fa-linkedin"></i></a>

            <a href="#"><i class="fa fa-pinterest"></i></a>

          </div>

        </div>

      </div>

    </div>

  </footer>-->
  
  

  <!-- End footer -->



  <!-- jQuery library -->

  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>    -->

  <!-- Include all compiled plugins (below), or include individual files as needed -->

  <!-- Bootstrap -->

  <script src="<?php echo $tconfig["tsite_public_html"]; ?>front/assets/js/bootstrap.min.js"></script>

  <!-- Slick Slider -->

  <script type="text/javascript" src="<?php echo $tconfig["tsite_public_html"]; ?>front/assets/js/slick.js"></script>    

  <!-- mixit slider -->

  <script type="text/javascript" src="<?php echo $tconfig["tsite_public_html"]; ?>front/assets/js/jquery.mixitup.js"></script>

  <!-- Add fancyBox -->        

  <script type="text/javascript" src="<?php echo $tconfig["tsite_public_html"]; ?>front/assets/js/jquery.fancybox.pack.js"></script>

 <!-- counter -->

  <script src="<?php echo $tconfig["tsite_public_html"]; ?>front/assets/js/waypoints.js"></script>

  <script src="<?php echo $tconfig["tsite_public_html"]; ?>front/assets/js/jquery.counterup.js"></script>

  <!-- Wow animation -->

  <script type="text/javascript" src="<?php echo $tconfig["tsite_public_html"]; ?>front/assets/js/wow.js"></script> 

  <!-- progress bar   -->

  <script type="text/javascript" src="<?php echo $tconfig["tsite_public_html"]; ?>front/assets/js/bootstrap-progressbar.js"></script>  

  <!-- Custom js -->

  <script type="text/javascript" src="<?php echo $tconfig["tsite_public_html"]; ?>front/assets/js/custom.js"></script>

  

  <script src="<?php echo $tconfig["tsite_public_html"]; ?>admin/validation/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>

  <script src="<?php echo $tconfig["tsite_public_html"]; ?>admin/validation/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>  

  <script>

  

    function chk_form(frm){ 

        resp = jQuery("#"+frm).validationEngine('validate');       

        if(resp == true){

        	

            jQuery("#"+frm).submit();

        }else{

            return false;

        }		

    }

  </script>

  <?php if($_REQUEST['var_msg_login'] != ''){ ?><script>jQuery(".success_msg_login").append('<?php echo $_REQUEST['var_msg_login']; ?>');jQuery(".success_msg_login").show();</script><?php } else { ?><?php } ?>

  <?php if($_REQUEST['var_err_msg_login'] != ''){ ?><script>jQuery(".error_msg_login").append('<?php echo $_REQUEST['var_err_msg_login']; ?>');jQuery(".error_msg_login").show();</script><?php } else { ?><?php } ?>

  <?php if($_REQUEST['var_msg_pass'] != ''){ ?><script>jQuery(".success_msg_pass").append('<?php echo $_REQUEST['var_msg_pass']; ?>');jQuery(".success_msg_pass").show();</script><?php } else { ?><?php } ?>

  <?php if($_REQUEST['var_err_msg_pass'] != ''){ ?><script>jQuery(".error_msg_pass").append('<?php echo $_REQUEST['var_err_msg_pass']; ?>');jQuery(".error_msg_pass").show();</script><?php } else { ?><?php } ?>
  
  <script src="<?php echo $tconfig["tsite_public_html"]; ?>js/wow.js"></script>
  <script>
    wow = new WOW(
      {
        animateClass: 'animated',
        offset:       100,
        callback:     function(box) {
          console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
        }
      }
    );
    wow.init();
    document.getElementById('moar').onclick = function() {
      var section = document.createElement('section');
      section.className = 'section--purple wow fadeInDown';
      this.parentNode.insertBefore(section, this);
    };
  </script>

 </body>

</html>