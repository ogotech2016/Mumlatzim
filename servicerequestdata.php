<?php
    define( '_TEXEC', 1 );
    define('TPATH_BASE', dirname(__FILE__) );
    define( 'DS', DIRECTORY_SEPARATOR );
    require_once ( TPATH_BASE .DS.'includes'.DS.'defines.php' );
if(isset($_REQUEST['id']) && isset($_REQUEST['value']))
{
	$id = $_REQUEST['id'];
	$value = $_REQUEST['value'];
	if($value=='on')
	{
		$st = 0;
	}
	else
	{
		$st = 1;
	}
	$data = array('availability'=>$st);
    $where = " id IN (".$id.")";
	$res = $obj->MySQLQueryPerform("business",$data,'update',$where);
}


if(isset($_POST['userid'])){
		
	$id = $_POST['userid'];
	$sid = $_POST['srqid'];
	
	 
	$sql = "select * from business where id = '".$id."' ";
	$sendrequest = $obj->MySQLSelect($sql);
      
?>
<style>
	/* rating css */
input.star { display: none; }

label.star {
  float: left;
  padding: 5px;
  font-size: 20px;
  color: #444;
  transition: all .2s;
}
label.star:before {
  content: '\f006';
  font-family: FontAwesome;
}	
/* end rating */
</style>
<div class="col-md-12 col-sm-12">
		<div class="search-box">
		<div class="row">
		  
		  <div class="col-md-12 col-sm-12 search-img">
			
			  <img src="<?php echo $tconfig["tsite_images"]; ?>/business/<?php echo $sendrequest[0]['Image']; ?>">
		  </div>
			<div class="col-md-8 col-sm-8 search-con">
			  <div class="col-md-12 col-sm-12">
				  <h3><?php echo $sendrequest[0]['Name']; ?></h3>
			  </div>
			  <div class="col-md-12 col-sm-12">
			   <form method="POST" id="rateing_form<?php echo $row_Complete['id'];?>">								
								<div class="cont">
										<div class="stars">
										<input type="hidden" name="job_star" value="<?php echo $sendrequest[0]['rating'];?>">
										<input class="star star-1"  id="<?php echo $sendrequest[0]['rating'];?>star-1" type="radio" name="star<?php echo $sendrequest[0]['rating'];?>" value="1" onclick="starchecked('<?php echo $sendrequest[0]['rating'];?>','1')"/>
										<label <?php  if($sendrequest[0]['rating'] >= '1') { echo 'style="color:pink;"'; } ?> class="star star-1 star-1<?php echo $sendrequest[0]['rating'];?>" for="<?php echo $sendrequest[0]['rating'];?>star-1"></label>
										<input   class="star star-2"  id="<?php echo $sendrequest[0]['rating'];?>star-2" type="radio" name="star<?php echo $sendrequest[0]['rating'];?>" value="2" onclick="starchecked('<?php echo $sendrequest[0]['rating'];?>','2')"/>
										<label <?php  if($sendrequest[0]['rating'] >= '2') { echo 'style="color:pink;"'; } ?> class="star star-2 star-2<?php echo $sendrequest[0]['rating'];?>" for="<?php echo $sendrequest[0]['rating'];?>star-2"></label>
										<input class="star star-3"  id="<?php echo $sendrequest[0]['rating'];?>star-3" type="radio" name="star<?php echo $sendrequest[0]['rating'];?>" value="3" onclick="starchecked('<?php echo $sendrequest[0]['rating'];?>','3')"/>
										<label <?php  if($sendrequest[0]['rating'] >= '3') { echo 'style="color:pink;"'; } ?> class="star star-3 star-3<?php echo $sendrequest[0]['rating'];?>" for="<?php echo $sendrequest[0]['rating'];?>star-3"></label>
										<input class="star star-4"  id="<?php echo $sendrequest[0]['rating'];?>star-4" type="radio" name="star<?php echo $sendrequest[0]['rating'];?>" value="4" onclick="starchecked('<?php echo $sendrequest[0]['rating'];?>','4')"/>
										<label <?php  if($sendrequest[0]['rating'] >= '4') { echo 'style="color:pink;"'; } ?> class="star star-4 star-4<?php echo $sendrequest[0]['rating'];?>" for="<?php echo $sendrequest[0]['rating'];?>star-4"></label>
										<input class="star star-5"  id="<?php echo $sendrequest[0]['rating'];?>star-5" type="radio" name="star<?php echo $sendrequest[0]['rating'];?>" value="5" onclick="starchecked('<?php echo $sendrequest[0]['rating'];?>','5')"/>
										<label <?php  if($sendrequest[0]['rating'] >= '5') { echo 'style="color:pink;"'; } ?>	class="star star-5 star-5<?php echo $sendrequest[0]['rating'];?>" for="<?php echo $sendrequest[0]['rating'];?>star-5"></label>
										</div>
								</div>
					  </form>
			  </div>
			  <?php 

			  $sqlcount = "select count(*) as count from Reviews where business_id='".$sendrequest[0]['id']."'";
			  $resultcount = $obj->MySQLSelect($sqlcount);
			  //print_r($resultcount);
			  
			  ?>
			  <div class="col-md-12 col-sm-12">
					<p><a href="#" onclick="showreview();"><?php echo $resultcount[0]['count'];?> Review</a></p>
			  </div>
			  <div class="col-md-12 col-sm-12">
					<p><a href="#"><?php echo $sendrequest[0]['Email']; ?> </a></p>
			  </div>
			  <div class="col-md-12 col-sm-12">
				  <p><?php echo $sendrequest[0]['country'];?></p>
			  </div>
			  <div class="col-md-12 col-sm-12">
				  <p><?php echo $sendrequest[0]['Mainaddress']; ?></p>
			  </div>
			  <div class="col-md-12 col-sm-12">
				  <p><?php echo $sendrequest[0]['category']; ?></p>
			  </div>
			  <!--<div class="col-md-12 col-sm-12">
				  <p><?php echo $sendrequest[0]['Industry']; ?></p>
			  </div>-->
              <div class="col-md-12 col-sm-12">
				  <p><?php echo $sendrequest[0]['registrationdate']; ?></p>
			  </div>
              <div class="col-md-12 col-sm-12">
				  <p><?php echo $sendrequest[0]['Phone']; ?></p>
			  </div>
		  </div>
			
			<div class="col-md-4 col-sm-4 search-con">
				<div class="col-md-12 col-sm-12" style="margin-top:18%; box-shadow: 0 0 6px #ccc; padding: 8px; text-align: center;">
					<span class="price">$<?php echo $sendrequest[0]['Amount']; ?></span>					
				</div>
			</div>
			
			</div>
		</div>
	</div>

<?php
}

if(isset($_POST['searchuserid'])){
	$id = $_POST['searchuserid'];
	$sid = $_POST['srqid'];
	   
	   $sql = "select * from business where id = '".$id."' ";
	   $sendrequest = $obj->MySQLSelect($sql);
?>
<style>
	/* rating css */
input.star { display: none; }

label.star {
  float: left;
  padding: 5px;
  font-size: 20px;
  color: #444;
  transition: all .2s;
}
label.star:before {
  content: '\f006';
  font-family: FontAwesome;
}	
/* end rating */
</style>
<div class="col-md-12 col-sm-12">
		<div class="search-box">
		<div class="row">
		  
		  <div class="col-md-12 col-sm-12 search-img">
			
			  <img src="<?php echo $tconfig["tsite_images"]; ?>/business/<?php echo $sendrequest[0]['Image']; ?>">
		  </div>
			<div class="col-md-8 col-sm-8 search-con">
			  <div class="col-md-12 col-sm-12">
				  <h3><?php echo $sendrequest[0]['Name']; ?></h3>
			  </div>
			  <div class="col-md-12 col-sm-12">
			   <form method="POST" id="rateing_form<?php echo $row_Complete['id'];?>">								
								<div class="cont">
										<div class="stars">
										<input type="hidden" name="job_star" value="<?php echo $sendrequest[0]['rating'];?>">
										<input class="star star-1"  id="<?php echo $sendrequest[0]['rating'];?>star-1" type="radio" name="star<?php echo $sendrequest[0]['rating'];?>" value="1" onclick="starchecked('<?php echo $sendrequest[0]['rating'];?>','1')"/>
										<label <?php  if($sendrequest[0]['rating'] >= '1') { echo 'style="color:pink;"'; } ?> class="star star-1 star-1<?php echo $sendrequest[0]['rating'];?>" for="<?php echo $sendrequest[0]['rating'];?>star-1"></label>
										<input   class="star star-2"  id="<?php echo $sendrequest[0]['rating'];?>star-2" type="radio" name="star<?php echo $sendrequest[0]['rating'];?>" value="2" onclick="starchecked('<?php echo $sendrequest[0]['rating'];?>','2')"/>
										<label <?php  if($sendrequest[0]['rating'] >= '2') { echo 'style="color:pink;"'; } ?> class="star star-2 star-2<?php echo $sendrequest[0]['rating'];?>" for="<?php echo $sendrequest[0]['rating'];?>star-2"></label>
										<input class="star star-3"  id="<?php echo $sendrequest[0]['rating'];?>star-3" type="radio" name="star<?php echo $sendrequest[0]['rating'];?>" value="3" onclick="starchecked('<?php echo $sendrequest[0]['rating'];?>','3')"/>
										<label <?php  if($sendrequest[0]['rating'] >= '3') { echo 'style="color:pink;"'; } ?> class="star star-3 star-3<?php echo $sendrequest[0]['rating'];?>" for="<?php echo $sendrequest[0]['rating'];?>star-3"></label>
										<input class="star star-4"  id="<?php echo $sendrequest[0]['rating'];?>star-4" type="radio" name="star<?php echo $sendrequest[0]['rating'];?>" value="4" onclick="starchecked('<?php echo $sendrequest[0]['rating'];?>','4')"/>
										<label <?php  if($sendrequest[0]['rating'] >= '4') { echo 'style="color:pink;"'; } ?> class="star star-4 star-4<?php echo $sendrequest[0]['rating'];?>" for="<?php echo $sendrequest[0]['rating'];?>star-4"></label>
										<input class="star star-5"  id="<?php echo $sendrequest[0]['rating'];?>star-5" type="radio" name="star<?php echo $sendrequest[0]['rating'];?>" value="5" onclick="starchecked('<?php echo $sendrequest[0]['rating'];?>','5')"/>
										<label <?php  if($sendrequest[0]['rating'] >= '5') { echo 'style="color:pink;"'; } ?>	class="star star-5 star-5<?php echo $sendrequest[0]['rating'];?>" for="<?php echo $sendrequest[0]['rating'];?>star-5"></label>
										</div>
								</div>
					  </form>
			  </div>
			  <?php 

			  $sqlcount = "select count(*) as count from Reviews where business_id='".$sendrequest[0]['id']."'";
			  $resultcount = $obj->MySQLSelect($sqlcount);
			  //print_r($resultcount);
			  
			  ?>
			  <div class="col-md-12 col-sm-12">
					<p><a href="#" onclick="showreview();"><?php echo $resultcount[0]['count'];?> Review</a></p>
			  </div>
			  <div class="col-md-12 col-sm-12">
					<p><a href="#"><?php echo $sendrequest[0]['Email']; ?> </a></p>
			  </div>
			  <div class="col-md-12 col-sm-12">
				  <p><?php echo $sendrequest[0]['country'];?></p>
			  </div>
			  <div class="col-md-12 col-sm-12">
				  <p><?php echo $sendrequest[0]['Mainaddress']; ?></p>
			  </div>
			  <div class="col-md-12 col-sm-12">
				  <p><?php echo $sendrequest[0]['category']; ?></p>
			  </div>
			  <!--<div class="col-md-12 col-sm-12">
				  <p><?php echo $sendrequest[0]['Industry']; ?></p>
			  </div>-->
              <div class="col-md-12 col-sm-12">
				  <p><?php echo $sendrequest[0]['registrationdate']; ?></p>
			  </div>
              <div class="col-md-12 col-sm-12">
				  <p><?php echo $sendrequest[0]['Phone']; ?></p>
			  </div>
		  </div>
			
			<div class="col-md-4 col-sm-4 search-con">
				
				<div class="col-md-12 col-sm-12" style="margin-top:18%; box-shadow: 0 0 6px #ccc; padding: 8px; text-align: center;">
					<span class="price">$<?php echo $sendrequest[0]['Amount']; ?></span>					
				</div>
				
				
			</div>
			
			</div>
		</div>
	</div>
	
<div id="review" style="display: none;">
	<div class="col-md-12 col-sm-12">
	<div class="fix">
	<?php
	$sql_disp = "select r.*, u.name from Reviews r join user_private u on r.customer_id=u.id where r.business_id='".$sendrequest[0]['id']."'";
	$result_disp = $obj->MySQLSelect($sql_disp);
	//print_r($result_disp);
	for ($i=0; $i < count($result_disp); $i++){
		?>
		
	<div class="disp">
	<p>Title : <?php echo $result_disp[$i]['Title'];?></p>
	<p>User Name :<?php echo $result_disp[$i]['name'];?></p>
	<p>Decription : <?php echo $result_disp[$i]['Description'];?></p>
	<p>Review : <?php echo $result_disp[$i]['Review'];?></p>
	<div class="cont">
		<p class="stars">
										<input type="hidden" name="job_star" value="<?php echo $result_disp[$i]['Review'];?>">
										<input class="star star-1"  id="<?php echo $result_disp[$i]['Review'];?>star-1" type="radio" name="star<?php echo $result_disp[$i]['Review'];?>" value="1" onclick="starchecked('<?php echo $result_disp[$i]['Review'];?>','1')"/>
										<label <?php  if($result_disp[$i]['Review'] >= '1') { echo 'style="color:pink;"'; } ?> class="star star-1 star-1<?php echo $result_disp[$i]['Review'];?>" for="<?php echo $result_disp[$i]['Review'];?>star-1"></label>
										<input   class="star star-2"  id="<?php echo $result_disp[$i]['Review'];?>star-2" type="radio" name="star<?php echo $result_disp[$i]['Review'];?>" value="2" onclick="starchecked('<?php echo $result_disp[$i]['Review'];?>','2')"/>
										<label <?php  if($result_disp[$i]['Review'] >= '2') { echo 'style="color:pink;"'; } ?> class="star star-2 star-2<?php echo $result_disp[$i]['Review'];?>" for="<?php echo $result_disp[$i]['Review'];?>star-2"></label>
										<input class="star star-3"  id="<?php echo $result_disp[$i]['Review'];?>star-3" type="radio" name="star<?php echo $result_disp[$i]['Review'];?>" value="3" onclick="starchecked('<?php echo $result_disp[$i]['Review'];?>','3')"/>
										<label <?php  if($result_disp[$i]['Review'] >= '3') { echo 'style="color:pink;"'; } ?> class="star star-3 star-3<?php echo $result_disp[$i]['Review'];?>" for="<?php echo $result_disp[$i]['Review'];?>star-3"></label>
										<input class="star star-4"  id="<?php echo $result_disp[$i]['Review'];?>star-4" type="radio" name="star<?php echo $result_disp[$i]['Review'];?>" value="4" onclick="starchecked('<?php echo $result_disp[$i]['Review'];?>','4')"/>
										<label <?php  if($result_disp[$i]['Review'] >= '4') { echo 'style="color:pink;"'; } ?> class="star star-4 star-4<?php echo $result_disp[$i]['Review'];?>" for="<?php echo $result_disp[$i]['Review'];?>star-4"></label>
										<input class="star star-5"  id="<?php echo $result_disp[$i]['Review'];?>star-5" type="radio" name="star<?php echo $result_disp[$i]['Review'];?>" value="5" onclick="starchecked('<?php echo $result_disp[$i]['Review'];?>','5')"/>
										<label <?php  if($result_disp[$i]['Review'] >= '5') { echo 'style="color:pink;"'; } ?>	class="star star-5 star-5<?php echo $result_disp[$i]['Review'];?>" for="<?php echo $result_disp[$i]['Review'];?>star-5"></label>
										</p>									
	</div>
	</div>
	
	<?php
	}
	?>
	</div>
	</div>
	
	
 </div>
<?php
}
if(isset($_POST['uid']))
 {
		$uid = $_POST['uid'];
		
	   $sqlu = "select * from business where id = '".$uid."' ";
	   $sendrequestu = $obj->MySQLSelect($sqlu);
	   
	   $sql_ss = "select * from ServiceRequest where business_id = '".$uid."' ";
	   $sendrequest_ss = $obj->MySQLSelect($sql_ss);
	
	
?>
<div class="col-md-12 col-sm-12">
		<div class="search-box">
			<div class="row">
		  		<div class="col-md-12 col-sm-12 search-img">
			  		<img src="<?php echo $tconfig["tsite_images"]; ?>/business/<?php echo $sendrequestu[0]['Image']; ?>">
		  		</div>
				<div class="col-md-12 col-sm-12 search-con">
					<div class="col-md-12 col-sm-12">
				  		<h3><b><u>Contact Details</u>:</b></h3>
			  		</div>
			  		<div class="col-md-12 col-sm-12">
				  		<p>Business Name : <?php echo $sendrequestu[0]['Name']; ?></p>
			  		</div>
			  		<!--<div class="col-md-12 col-sm-12">
				  		<p>Main Address : <?php //echo $sendrequestu[0]['Mainaddress']; ?></p>
			  		</div>
					<div class="col-md-12 col-sm-12">
				  		<p>Category : <?php //echo $sendrequestu[0]['category']; ?></p>
			  		</div>-->
					<div class="col-md-12 col-sm-12">
				  		<p>Contact Person : <?php echo $sendrequestu[0]['contact_person']; ?></p>
			  		</div>
			  		<div class="col-md-12 col-sm-12">
				  		<p>Contact Details : <?php echo $sendrequestu[0]['Phone']; ?></p>
			  		</div>
			  		<!--<div class="col-md-12 col-sm-12">
				  		<p>Email : <?php //echo $sendrequestu[0]['Email']; ?></p>
			  		</div>-->
					
					<?php if($sendrequestu[0]['business_website']!=""){?>
					<div class="col-md-12 col-sm-12">
				  		<p>WebSite : <?php echo $sendrequestu[0]['business_website']; ?></p>
			  		</div>
					<?php } ?>
					<div class="col-md-12 col-sm-12">
				  		<p>Description : <?php echo $sendrequestu[0]['short_description']; ?></p>
			  		</div>
					<div class="col-md-12 col-sm-12">
				  		<p>Join since : <?php echo $sendrequestu[0]['registrationdate']; ?></p>
			  		</div>
			  	</div>
			</div>
		</div>
</div>


<style>
	/* rating css */
input.star { display: none; }

label.star {
  float: left;
  padding: 5px;
  font-size: 20px;
  color: #444;
  transition: all .2s;
}
label.star:before {
  content: '\f006';
  font-family: FontAwesome;
}	
/* end rating */
</style>
<div class="col-md-12 col-sm-12">
		<div class="search-box">
		<div class="row">
		  
		  
			<div class="col-md-8 col-sm-8 search-con">
			  <div class="col-md-12 col-sm-12">
				  <h3><?php echo $sendrequestu[0]['Name']; ?></h3>
			  </div>
			  <div class="col-md-12 col-sm-12">
			   <form method="POST" id="rateing_form<?php echo $row_Complete['id'];?>">								
								<div class="cont">
										<div class="stars">
										<input type="hidden" name="job_star" value="<?php echo $sendrequestu[0]['rating'];?>">
										<input class="star star-1"  id="<?php echo $sendrequestu[0]['rating'];?>star-1" type="radio" name="star<?php echo $sendrequestu[0]['rating'];?>" value="1" onclick="starchecked('<?php echo $sendrequestu[0]['rating'];?>','1')"/>
										<label <?php  if($sendrequestu[0]['rating'] >= '1') { echo 'style="color:pink;"'; } ?> class="star star-1 star-1<?php echo $sendrequestu[0]['rating'];?>" for="<?php echo $sendrequestu[0]['rating'];?>star-1"></label>
										<input   class="star star-2"  id="<?php echo $sendrequestu[0]['rating'];?>star-2" type="radio" name="star<?php echo $sendrequestu[0]['rating'];?>" value="2" onclick="starchecked('<?php echo $sendrequestu[0]['rating'];?>','2')"/>
										<label <?php  if($sendrequestu[0]['rating'] >= '2') { echo 'style="color:pink;"'; } ?> class="star star-2 star-2<?php echo $sendrequestu[0]['rating'];?>" for="<?php echo $sendrequestu[0]['rating'];?>star-2"></label>
										<input class="star star-3"  id="<?php echo $sendrequestu[0]['rating'];?>star-3" type="radio" name="star<?php echo $sendrequestu[0]['rating'];?>" value="3" onclick="starchecked('<?php echo $sendrequestu[0]['rating'];?>','3')"/>
										<label <?php  if($sendrequestu[0]['rating'] >= '3') { echo 'style="color:pink;"'; } ?> class="star star-3 star-3<?php echo $sendrequestu[0]['rating'];?>" for="<?php echo $sendrequestu[0]['rating'];?>star-3"></label>
										<input class="star star-4"  id="<?php echo $sendrequestu[0]['rating'];?>star-4" type="radio" name="star<?php echo $sendrequestu[0]['rating'];?>" value="4" onclick="starchecked('<?php echo $sendrequestu[0]['rating'];?>','4')"/>
										<label <?php  if($sendrequestu[0]['rating'] >= '4') { echo 'style="color:pink;"'; } ?> class="star star-4 star-4<?php echo $sendrequestu[0]['rating'];?>" for="<?php echo $sendrequestu[0]['rating'];?>star-4"></label>
										<input class="star star-5"  id="<?php echo $sendrequestu[0]['rating'];?>star-5" type="radio" name="star<?php echo $sendrequestu[0]['rating'];?>" value="5" onclick="starchecked('<?php echo $sendrequestu[0]['rating'];?>','5')"/>
										<label <?php  if($sendrequestu[0]['rating'] >= '5') { echo 'style="color:pink;"'; } ?>	class="star star-5 star-5<?php echo $sendrequestu[0]['rating'];?>" for="<?php echo $sendrequestu[0]['rating'];?>star-5"></label>
										</div>
								</div>
					  </form>
			  </div>
			  <?php 

			  $sqlcount = "select count(*) as count from Reviews where business_id='".$sendrequestu[0]['id']."'";
			  $resultcount = $obj->MySQLSelect($sqlcount);
			  //print_r($resultcount);
			  
			  ?>
			  <div class="col-md-12 col-sm-12">
					<p><a href="#" onclick="showreview();">Click Here To Give Your Review</a></p>
			  </div>
			  
		  </div>
			
			<div class="col-md-4 col-sm-4 search-con">
				<div class="col-md-12 col-sm-12" style="margin-top:18%; box-shadow: 0 0 6px #ccc; padding: 8px; text-align: center;">
					<span class="price">$<?php echo $sendrequestu[0]['Amount']; ?></span>					
				</div>
			</div>
			
			</div>
		</div>
	</div>
<div id="review" style="display: none;">

	
	<div class="col-md-12 col-sm-12">
	<br>
	<strong>Share Your Experience Here.</strong>
			   <form method="POST" id="rateing_form<?php echo $row_Complete['id'];?>">								
								<div class="cont">
										<div class="stars" id="str">
										<input type="hidden" name="job_star" value="<?php echo $showresult[$i]['rating'];?>">
										<input class="star star-1"  id="star-1" type="radio" name="star" value="1" onclick="starchecked('<?php echo $showresult[$i]['rating'];?>','1')"/>
										<label class="star star-1 star-1" for="star-1"></label>
										<input   class="star star-2"  id="star-2" type="radio" name="star" value="2" onclick="starchecked('<?php echo $showresult[$i]['rating'];?>','2')"/>
										<label class="star star-2 star-2" for="star-2"></label>
										<input class="star star-3"  id="star-3" type="radio" name="star" value="3" onclick="starchecked('<?php echo $showresult[$i]['rating'];?>','3')"/>
										<label class="star star-3 star-3" for="star-3"></label>
										<input class="star star-4"  id="star-4" type="radio" name="star" value="4" onclick="starchecked('<?php echo $showresult[$i]['rating'];?>','4')"/>
										<label class="star star-4 star-4" for="star-4"></label>
										<input class="star star-5"  id="star-5" type="radio" name="star" value="5" onclick="starchecked('<?php echo $showresult[$i]['rating'];?>','5')"/>
										<label class="star star-5 star-5" for="star-5"></label>
										</div>
								</div>
								</form>
			  </div>
	<div class="col-md-12 col-sm-12">
	<form class="form-horizontal_aa" role="form" action="index.php?file=sr-servicerequest" method="post" name="frmlogin" id="frmlogin">
                        <input type="hidden" name="busi_id" id="busi_id" value="<?php echo $sendrequestu[0]['id']; ?>">
						<input type="hidden" name="service_id" id="service_id" value="<?php echo $sendrequest_ss[0]['id']; ?>">
                        <input type="hidden" name="reviewrate" id="reviewrate" value="">
                        <div class="form-group login__email">
                            <label class="control-label sr-only required" for="customer_login_email">   Enter Review Title Here
                            </label>
                            <input type="text" id="title" name="title" required="required" class="form-control input-lg" placeholder="Enter Review Title Here..">
                        </div>
                        <div class="form-group login__password">
                            <label class="control-label sr-only required" for="customer_login_password">  Enter Review Description Here
                            </label>
                            <textarea name="desc" class="form-control input-lg" required="required" placeholder="Enter Review Description Here."></textarea>
                        </div>
                        <div class="form-group login__submit">
                            <button type="submit" id="sendreview" name="sendreview" class="btn btn-primary">Submit Review</button>
                        </div>
                        <!--</div>-->
                    </form>
	</div>
 </div>

<?php
 }
 
?>
<!-- start data for popup review-->
<?php
 if(isset($_POST['rid']))
 {
	
		$rid = $_POST['rid'];
	   $sqlr = "select * from business where id = '".$rid."' ";
	   $sendrequestr = $obj->MySQLSelect($sqlr);
	   
?>
<div class="col-md-12 col-sm-12">
	<div class="modal-header">
        <h4 class="modal-title">Reviews</h4>
      </div>
	<div class="col-md-12 col-sm-12">
	<div class="reviewmodal">
        <?php
        $sql_dispr = "select r.*, u.name from Reviews r join user_private u on r.customer_id=u.id where r.business_id='".$sendrequestr[0]['id']."'";
        $result_dispr = $obj->MySQLSelect($sql_dispr);
        //print_r($result_dispr);
        for ($i=0; $i < count($result_dispr); $i++){
            ?>
        <div class="disp">
            <p>Title : <?php echo $result_dispr[$i]['Title'];?></p>
            <p>User Name :<?php echo $result_dispr[$i]['name'];?></p>
            <p>Decription : <?php echo $result_dispr[$i]['Description'];?></p>
            <p>Review : <?php echo $result_dispr[$i]['Review'];?></p>
            <div class="cont">
                <p class="stars">
                <input type="hidden" name="job_star" value="<?php echo $result_dispr[$i]['Review'];?>">
                <input class="star star-1"  id="<?php echo $result_dispr[$i]['Review'];?>star-1" type="radio" name="star<?php echo $result_dispr[$i]['Review'];?>" value="1" onclick="starchecked('<?php echo $result_dispr[$i]['Review'];?>','1')"/>
                <label <?php  if($result_dispr[$i]['Review'] >= '1') { echo 'style="color:#E1E100;"'; } ?> class="star star-1 star-1<?php echo $result_dispr[$i]['Review'];?>" for="<?php echo $result_dispr[$i]['Review'];?>star-1"></label>
                <input   class="star star-2"  id="<?php echo $result_dispr[$i]['Review'];?>star-2" type="radio" name="star<?php echo $result_dispr[$i]['Review'];?>" value="2" onclick="starchecked('<?php echo $result_dispr[$i]['Review'];?>','2')"/>
                <label <?php  if($result_dispr[$i]['Review'] >= '2') { echo 'style="color:#E1E100;"'; } ?> class="star star-2 star-2<?php echo $result_dispr[$i]['Review'];?>" for="<?php echo $result_dispr[$i]['Review'];?>star-2"></label>
                <input class="star star-3"  id="<?php echo $result_dispr[$i]['Review'];?>star-3" type="radio" name="star<?php echo $result_dispr[$i]['Review'];?>" value="3" onclick="starchecked('<?php echo $result_dispr[$i]['Review'];?>','3')"/>
                <label <?php  if($result_dispr[$i]['Review'] >= '3') { echo 'style="color:#E1E100;"'; } ?> class="star star-3 star-3<?php echo $result_dispr[$i]['Review'];?>" for="<?php echo $result_dispr[$i]['Review'];?>star-3"></label>
                <input class="star star-4"  id="<?php echo $result_dispr[$i]['Review'];?>star-4" type="radio" name="star<?php echo $result_dispr[$i]['Review'];?>" value="4" onclick="starchecked('<?php echo $result_dispr[$i]['Review'];?>','4')"/>
                <label <?php  if($result_dispr[$i]['Review'] >= '4') { echo 'style="color:#E1E100;"'; } ?> class="star star-4 star-4<?php echo $result_dispr[$i]['Review'];?>" for="<?php echo $result_dispr[$i]['Review'];?>star-4"></label>
                <input class="star star-5"  id="<?php echo $result_dispr[$i]['Review'];?>star-5" type="radio" name="star<?php echo $result_dispr[$i]['Review'];?>" value="5" onclick="starchecked('<?php echo $result_dispr[$i]['Review'];?>','5')"/>
                <label <?php  if($result_dispr[$i]['Review'] >= '5') { echo 'style="color:#E1E100;"'; } ?>	class="star star-5 star-5<?php echo $result_dispr[$i]['Review'];?>" for="<?php echo $result_dispr[$i]['Review'];?>star-5"></label>
				</p>									
            </div>
        </div>
        <?php
        }
        ?>
	</div>
	</div>
	</div>

<?php
}
?>
<!-- end data for popup review-->


   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script>
		function starchecked(star,no) {
		    for(i=no;i>=1;i--)
			{
				a=".star-"+i+star;
				//alert(a);				
				//$(a).css('color','pink'); //original code
				$('#str').find(a).css('color','#E1E100');
			}
		    for(i=5;i>no;i--)
			{
				a=".star-"+i+star;				
				//$(a).css('color','#444'); //original code
				$('#str').find(a).css('color','#444');
			}
			
			
			var data=star;
			document.getElementById("reviewrate").value = no;
			//alert(no);
			/*$.ajax({				
				type: "POST", 
				url:'add_rate.php?id='+star+"&user_rating="+no,
				dataType:'html', 
				data: data,
				success: function(data)
				{	
                     alert(data);					
				}
		     });*/
        }
		
		function starchecked1(star,no) {
		    for(i=no;i>=1;i--)
			{
				a=".star-"+i+star;
				$(a).css('color','pink');
			}
		    for(i=5;i>no;i--)
			{
				a=".star-"+i+star;				
				$(a).css('color','#444');
			}
		}
</script>
<script>
function showreview()
{
	if ($('#review').css('display') == 'none')
	{
    	$('#review').show();
	}
}
</script>
<style>
.fix{
  max-height: 200px;
  overflow: auto;
  padding: 5px;
  border:1px solid black;
}
.disp{
  background-color: #FAFAD2;
  border-radius: 7px;
  padding: 10px;
  margin-bottom: 10px;
  display: inline-block;
  width: 100%;
  border: 1px solid #A9A9A9;
}
</style>
 
<script type="text/javascript">
function submitform()
{
  alert("hello");
  document.favourite.submit();
}
</script>
   
