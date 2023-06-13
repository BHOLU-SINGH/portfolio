<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sending mail to Admin | FreeProjects1</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="pop__up__open">
<?php
    error_reporting(0);

    require "PHPMailer/src/PHPMailer.php";
    require "PHPMailer/src/SMTP.php";
    require "PHPMailer/src/Exception.php";

    // Import the PHPMailer classes into the global namespace
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    $mail = new PHPMailer(true);
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'royaldhaked7861@gmail.com';                     //SMTP username
        $mail->Password   = 'frweixkyxkfnbcdr';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('royaldhaked7861@gmail.com', 'Google Team');
        // $mail->addAddress($email, $name); 
        $mail->addAddress('bsdhaked786@gmail.com', $name); 
        $mail->addCC('cc@gmail.com');
        $mail->addBCC('bcc@gmail.com');

        //Attachments
        // $mail->addAttachment('images/google.png', 'new.jpg');

        //Content
        $mail->isHTML(true);
        $mail->Subject = 'Personal Portfolio';
        $mail->Body    = "<html>
        <body>
        <p>Name: $name</p>
        <p>Email: $email</p>
        <p>Message: $message</p>
        </body>
        </html>";

        // $mail->AddEmbeddedImage('images/google.jpg', 'google');
        // $mail->AddEmbeddedImage('images/unnamed.jpg', 'unnamed');

        // Load the image file into memory
        // $image = file_get_contents('images/google.jpg');

        // Encode the image file into base64 format
        // $base64_image = base64_encode($image);

        // Use the AddEmbeddedImage() method to add the image to the email
        // $mail->AddEmbeddedImage('images/google.jpg', 'image1', $base64_image);

        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';

        ?>
        <div class="submit__pop__up">
            <div class="data">
                <div class="btn">
                    <i class="bi bi-x-lg"></i>
                </div>
                <div class="inner__data">
                    <h2>Thank you for submitting your query</h2>
                    <p><i class="bi bi-chevron-double-right"></i> We have successfully received your message.</p>
                    <p class="last__para"><i class="bi bi-chevron-double-right"></i> Thanks for your opinion.</p>
                    <a href="#">go back</a>
                </div>
            </div>
        </div>
        <script>
            const formSubmit = document.querySelector('.submit__pop__up');
            const closeToggle = document.querySelector('.submit__pop__up .data .btn i.bi-x-lg');

            closeToggle.onclick = closePopUp;
            function closePopUp(){
                formSubmit.classList.toggle("open");
                window.location.replace("index.html");
            }
        </script>
        <?php

        // header('location: index.html');

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
?>
</body>
</html>