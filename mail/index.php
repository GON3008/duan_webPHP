<?php
function GuiMail($title, $content, $addressMail){   
    require "PHPMailer/src/PHPMailer.php"; 
    require "PHPMailer/src/SMTP.php"; 
    require 'PHPMailer/src/Exception.php'; 
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);//true:enables exceptions
    try {
        $mail->SMTPDebug = 0; //0,1,2: chế độ debug. khi chạy ngon thì chỉnh lại 0 nhé
        $mail->isSMTP();  
        $mail->CharSet  = "utf-8";
        $mail->Host = 'smtp.gmail.com';  //SMTP servers
        $mail->SMTPAuth = true; // Enable authentication
        $mail->Username = 'longbt300820@gmail.com'; // SMTP username
        $mail->Password = '0366570289';   // SMTP password  yofcftjywhjkoatt
        $mail->SMTPSecure = 'SSL';  // encryption TLS/SSL 
        $mail->Port = 465;  // port to connect to                
        $mail->setFrom('longbt300820@gmail.com', 'Miu eyeCenter' ); 
       // $addressMail='';
        $mail->addAddress($addressMail); //mail và tên người nhận  
        $mail->isHTML(true);  // Set email format to HTML
        //$title="test mail";
        $mail->Subject = $title;

        //$content='test mail';
        $mail->Body = $content;
        $mail->smtpConnect( array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true
            )
        ));
        $mail->send();
        echo 'Đã gửi mail xong';
    } catch (Exception $e) {
        echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
    }
 }//function GuiMail


?>

