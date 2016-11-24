<?php     echo 'zxzx'; exit;
    if($_POST['action'] == 'chk_login')
    {
        $vUserName = $_POST['vUserName'];
        $vPassword = $_POST['vPassword'];
        $eType = $_POST['eType'];       
        
        if($vUserName != '' && $vPassword != '' && $eType != 'customer'){
            $vPassword = $generalobj->encrypt($vPassword);
            $sql = "select * from members WHERE vUserName = '".$vUserName."' and vPassword = '".$vPassword."' AND eType = '".$eType."'";
            $result = $obj->MySQLSelect($sql);
            
            if(count($result) > 0){
            	
                $_SESSION["sess_iMemberId"] = $result[0]["iMemberId"];
                $_SESSION["sess_vUserName"] = $result[0]["vUserName"];
                $_SESSION["sess_vFirstName"] = $result[0]["vFirstName"];
                $_SESSION["sess_vLastName"] = $result[0]["vLastName"];
                $_SESSION["sess_vEmail"] = $result[0]["vEmail"];
                $_SESSION["sess_eType"] = $result[0]["eType"]; 
                $_SESSION["sess_Name"]= $_SESSION["sess_vFirstName"]." ".$_SESSION["sess_vLastName"];
                
                if($_POST['remember_login'] == "Yes")
                {
                        setcookie ("user_login_cookie", $vUserName, time()+2592000);
                        setcookie ("user_password_cookie", $_POST['vPassword'], time()+2592000);
                }
                else
                {
                        setcookie ("user_login_cookie", "", time());
                        setcookie ("user_password_cookie", "", time());
                }
                
                $var_msg = "You login Successfully.";
                header("location:".$tconfig["tsite_url"]."index.php?file=c-projects&var_msg=$var_msg");
                exit;
            }else{
                $var_msg = "Invalid Username or Password";
            	header("location:".$tconfig["tsite_url"]."index.php?file=c-login&var_err_msg=$var_msg");
                exit;
            }
        }else{
            $var_msg = "Invalid Username or Password";
            header("location:".$tconfig["tsite_url"]."index.php?file=c-login&var_err_msg=$var_msg");
            exit;
        }
    }
    
    if($_POST['action'] == 'chk_forgpass'){
        $vEmail = $_POST['vEmail'];
        
        
        $sql = "SELECT * FROM members WHERE vEmail = '".$vEmail."'";
        $result = $obj->MySQLSelect($sql);
        
        if(count($result) > 0){
        	
            $subject = "Forgot Password request";
            
            $message .= "Hello, ".$result[0]['vFirstName'];
            $message .= "<br><br>Here is your password to access your account of Demo site";
            $message .= "<br>Password: ".$generalobj->encrypt($result[0]['vPassword']);
            $message .= "<br><br>Thank You!";
            
            // To send HTML mail, the Content-type header must be set
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

            // Additional headers
            $headers .= 'To:'.$result[0]['vFirstName'].'<'.$result[0]['vEmail'].'>' . "\r\n";
            $headers .= 'From:Admin <demo@demo.com>' . "\r\n";

            // Mail it
            
//            echo $result[0]['vEmail'];
  //          echo "<hr>";
   //         echo $subject;
 //           echo "<hr>";
  //          echo $message;
 //           echo "<hr>";
 //           echo $headers;
  //          
 //           exit;
            
            mail($result[0]['vEmail'], $subject, $message, $headers);
            
            $var_msg = "Password sent successfully on your given email";
                header("location:".$tconfig["tsite_url"]."index.php?file=c-login&var_msg=$var_msg");
                exit;
        }else{
            //echo '1'; exit;
            
            $var_msg = "Email not found. Please try again.";
                header("location:".$tconfig["tsite_url"]."index.php?file=c-login&var_err_msg=$var_msg");
                exit;
        }
    }
?>