<?php

    $toEmail = "hubert.julien@gmail.com";
    $mailHeaders = "From: Ethypharm UK : " . $_POST["name"] . "<". $_POST["email"] .">\r\n";
	realpath('email.php');
	require_once("../../../../wp-load.php");
	$toEmail =   get_field('contact_form_recipient', 'option');
	
	//echo $toEmail;
	
	if(isset($_POST['captchResponse'])){
          $captcha=$_POST['captchResponse'];  
    }
	
    if(!$captcha){
    	print "<p class='Error'>Problem in Sending Mail.</p>";
    	exit;
   }
      /*
	   $secretKey = "6LcARggUAAAAAAto65tJkVx1-5UhlmXt42a3B2JX";
        $ip = $_SERVER['REMOTE_ADDR'];
		$url = "https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip;
		
		echo $url;
		
		
		$context=stream_context_create(array('http' => array('header'=>"Host: www.google.com\r\n")));
$response= file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$captcha.'&remoteip='.$ip, false, $context);
		
        $responseKeys = json_decode($response,true);
        if(intval($responseKeys["success"]) !== 1) {
          $send = false; echo "a";
        } else {
           $send = true;  echo "b";
        }
		*/

    if(  mail($toEmail, "New message from Ethypharm UK Website", "\n\nEmail: " . $_POST["email"] . "\n\nPhone: " . $_POST["phone"] . "\n\nType: " . $_POST["select"] . "\n\nMessage: \n" . $_POST["message"], $mailHeaders)) {
        
        print "<span class='success'>Your message has been sent successfully.</span>";

    } 
    else {

        print "<span class='Error'>Problem in Sending Mail.</span>";

    }

?>