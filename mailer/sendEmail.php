<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php';    

//    if(isset($_POST['name']) && isset($_POST['email'])){
    function sendMail($email,$name, $subject, $body){

//        $name = $_POST['name'];
//        $email = $_POST['email'];
//        $subject = $_POST['subject'];
//        $body = $_POST['body'];
    // $email = "ericmukundi10@gmail.com";
        $mail = new PHPMailer();

        // SMTP Settings
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        // sender details
        $mail->Username = "######";
        $mail->Password = "#####";
        $mail->Port =587;
        $mail->SMTPSecure ="tls";

        // Email Settings
        $mail->isHTML(true);
        $mail->setFrom($email, "Sky Technologies");
        $mail->addAddress($email, $name);
        $mail->Subject = $subject;
        $mail->Body = $body;

        try {
            $mail->send();
            return true;
        } catch (\Throwable $th) {
            throw $th->getMessage();
        }

        // header('Location: index.php');
        // exit;
    
    }