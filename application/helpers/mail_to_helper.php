<?php

if (!function_exists('mail_to')) {

    function mail_to($user_email, $user_name, $title, $content) {
        $ci = & get_instance();
        $ci->load->library('My_PHPMailer');
        $mail = new PHPMailer();
        $mail->CharSet = 'UTF-8';
        $mail->IsSMTP(); //Definimos que usaremos o protocolo SMTP para envio.
        $mail->SMTPAuth = true; //Habilitamos a autenticação do SMTP. (true ou false)
        $mail->SMTPSecure = "ssl"; //Estabelecemos qual protocolo de segurança será usado.
        $mail->Host = "smtp.gmail.com"; //Podemos usar o servidor do gMail para enviar.
        $mail->Port = 465; //Estabelecemos a porta utilizada pelo servidor do gMail.
        $mail->Username = $ci->config->item('smtp_email'); //Usuário do gMail
        $mail->Password = $ci->config->item('smtp_password'); //Senha do gMail
        $mail->SetFrom($ci->config->item('smtp_email'), lang('site_title')); //Quem está enviando o e-mail.
        $mail->isHTML('true');
        $mail->Subject = $title; //Assunto do e-mail.
        $mail->Body = $content;
        $mail->AddAddress($user_email, $user_name);
        if ($mail->Send()) {
            $mail->clearAllRecipients();
            return 'SEND_OK';
        } else {
            $mail->clearAllRecipients();
            return 'SEND_NOK';
        }
    }

}