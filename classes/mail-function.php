<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "email/vendor/autoload.php";

function sendRegistrationMail($email, $name){
  $mail = new PHPMailer;
  $mail->SMTPDebug = 0;
  $mail->isSMTP();
  $mail->Host = "mail.fspublishers.org";
  $mail->SMTPOptions = array('ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ));

  $mail->SMTPAuth = TRUE;
  $mail->Username = "noreply@fspublishers.org";
  $mail->Password = "asd@7860";
  $mail->SMTPSecure = "false";
  $mail->Port = 25;
  $mail->From = "noreply@fspublishers.org";
  $mail->FromName = "Climate Change: Impacts & Solutions"; 
  $mail->addAddress($email);  
  $mail->isHTML(true); 
  $mail->Subject = "Need email confirmation";
  $mail->Body = "<html>";
  $mail->Body .= "<head>";
  $mail->Body .= "<body>";
  $mail->Body .= '<table border="0" cellpadding="0" cellspacing="0" width="100%">';
  $mail->Body .= '<tr>';
  $mail->Body .= '<td align="center" colspan="2" style="background-color:#044767;" bgcolor="#044767">';
  $mail->Body .= '<h1 style="font-size: 30px; padding:20px 20px; font-weight: 800; margin: 0; color: #ffffff;">Welcome to CCIS 2022</h1>';
  $mail->Body .= '</td>';
  $mail->Body .= '</tr>';
  $mail->Body .= '<tr>';
  $mail->Body .= '<td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 20px;">';
  $mail->Body .= 'Dear '.$name.'! We warmly welcome you on CCIS. Kindly confirm your email to aget access to you account.To confirm <a href="https://www.climatechange-ises.com/confirm.php?email='.$email.'">click here...</a>';
  $mail->Body .= '</td>';
  $mail->Body .= '</tr>';
            
  $mail->Body .= '<tr>';
  $mail->Body .= '<td colspan="2" align="center" style="background-color:#1b9ba3;" bgcolor="#1b9ba3">';
  $mail->Body .= '<h4 style="font-size:15px; padding:10px 10px; font-weight:800; margin:0; color:#ffffff;">copyright© CCIS . All rights reserved.</h4>';
  $mail->Body .= '</td>';
  $mail->Body .= '</tr>';
  $mail->Body .= '</table>';
  $mail->Body .= '</body></html>';

  $mail->AltBody = "This is the plain text version of the email content";

            
  if($mail->send()){
    return true;
  }else{
    return false;
  }
}


  

  
        
        
        
        
        

  

                
 ?>