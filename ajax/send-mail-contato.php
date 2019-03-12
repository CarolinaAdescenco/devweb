<?php
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $mensagem = $_POST['mensagem'];

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '../PHPMailer/Exception.php';
    require '../PHPMailer/PHPMailer.php';
    require '../PHPMailer/SMTP.php';
    
    $mail = new PHPMailer(true);

    try {
        //Server settings
        //$mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->CharSet = 'UTF-8';
        $mail->Host = 'mail.actmob.com.br';
        $mail->SMTPAuth = true;
        $mail->Username = 'user@dominio.com.br';
        $mail->Password = 'password#2018';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        //Recipients
        $mail->setFrom('ana.carolina@actmob.com.br', 'Ana Carolina');
        $mail->addAddress('ana.carolina@actmob.com.br', 'Ana Carolina');
        $mail->addReplyTo('ana.carolina@actmob.com.br', 'Ana Carolina');


        //Content
        $mail->isHTML(true);
        $mail->Subject = 'Contato pelo site - LM Prime';
        $mail->Body    = "
        <h1>Contato - LM Prime</h1>
        <b>Nome: </b>$nome<br>
        <b>E-mail: </b>$email<br>
        <b>Telefone: </b>$telefone<br>
        <b>Mensagem: </b>$mensagem";
        $mail->send();
        
        echo json_encode(true);

    } catch (Exception $e) {
        echo json_encode( array(
            'error' => $mail->ErrorInfo
        ) );
    }