<?php

    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $body = "Name: " . $name . "<br>EMail: " . $email . "<br>Message: " . $message;

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'wasabidevelopment@gmail.com';                     //SMTP username
        $mail->Password   = 'hjFq$9341';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('wasabidevelopment@gmail.com', $name);
        $mail->addAddress('danielmaio62@gmail.com', 'Daniel pobre');     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Sent from my website';
        $mail->Body    = $body;
        $mail->CharSet = 'UTF-8';

        $mail->send();
        echo '<script>
            alert("Message has been sent");
            window.history.go(-1);
            </script>';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }