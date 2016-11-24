<?php



session_start();
define( '_TEXEC', 1 );
define('TPATH_BASE', dirname(__FILE__) );
define( 'DS', DIRECTORY_SEPARATOR );
header('Content-Type: text/html; charset=iso-8859-1');

require_once ( TPATH_BASE .DS.'includes'.DS.'defines.php' );
$l='';

if($_POST['searchby'] == 'Philippines')
{
    $l="EN";
}

if($l == "EN"){
	$sql = "SELECT * FROM locationcategory";
   $locationcategory = $obj->MySQLSelect($sql);
  
}
else{
	$sql = "SELECT * FROM HB_locationcategory";
    $locationcategory = $obj->MySQLSelect($sql);     
}

//$html .= '<select id="selectlocation" class="selectpicker form-control" required="" data-size="10" name="selectlocation[]" title="Choose City or Neighborhood*" data-max-options="5" multiple="" tabindex="-98">';

for($i=0; $i < count($locationcategory); $i++)
{
	$loc=$locationcategory[$i]['category'];		
$aa .= '<optgroup label="'.$loc.'" value="0">';

	if( $l == "EN"){			  
	$sql = "SELECT * FROM locationsubcategory where category_id ='".$locationcategory[$i]['id']."'";
	$locationsubcategory = $obj->MySQLSelect($sql);
	}
	else{
	$sql = "SELECT * FROM HB_locationsubcategory where category_id ='".$locationcategory[$i]['id']."'";
	$locationsubcategory = $obj->MySQLSelect($sql);
	}			
    for($j=0; $j < count($locationsubcategory); $j++){ 
    $locsub=$locationsubcategory[$j]['subcategory'];
	$aa .= '<option style="font-size: 14px; padding-left:15px; font-style: normal; text-decoration: none;" value="'.$locsub.'">'.$locsub.'</option>';
    
	 } }
    
$aa .='</optgroup>';

echo $aa;
    ?>            