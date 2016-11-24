<?php  
  $sql = "SELECT * FROM state WHERE vCountryCode = '".$_REQUEST['country']."' AND eStatus = 'Active' ORDER BY vState ASC";
  $db_state = $obj->MySQLSelect($sql);
  
  //$state .= '<select name="Data[vState]" id="vState" class="validate[required] form-control">';
  $state .= '<option value="">Select State</option>';
  for($i=0;$i<count($db_state);$i++){
    $state .= '<option value="'.$db_state[$i]['vStateCode'].'">'.$db_state[$i]['vState'].'</option>';
  }
  //$state .= '</select>';
  
  echo $state; exit;
?>