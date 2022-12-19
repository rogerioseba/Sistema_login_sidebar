<?php

namespace Controllers;

use PHPMailer\PHPMailer\PHPMailer;



class mailController
{
    public function __construct(){

    }

    public function mailRecoverPass($email, $token)
    {
        // inicia classe PHPMAILER
        $mail = new PHPMailer();

        //Método de envio
        $mail->isSMTP();

        //Host do smtp


        $mail->Host = 'mail.tippet.com.br';

        // Usar autenticação SMTP (obrigatório)
        $mail->SMTPAuth = true;

        // Configurações de compatibilidade para autenticação em TLS
        $mail->SMTPSecure = 'tls';

        // Usuário do servidor SMTP (endereço de email)
        // obs: Use a mesma senha da sua conta de email
        $mail->Username = 'contato@tippet.com.br';
        $mail->Password = 'ipa201184jrro';

        //porta Gmail
        $mail->Port = 465;


        // Você pode habilitar esta opção caso tenha problemas. Assim pode identificar mensagens de erro.
        //$mail->SMTPDebug = 2;

        // Define o remetente
        // Seu e-mail
        $mail->setFrom("contato@tippet.com.br","Contato - Tippet");


        // Define o(s) destinatário(s)
        $mail->AddAddress($email);

        // Definir se o e-mail é em formato HTML ou texto plano
        // Formato HTML . Use "false" para enviar em formato texto simples ou "true" para HTML.
        $mail->IsHTML(true);

        // Charset (opcional)
        $mail->CharSet = 'UTF-8';

        // Assunto da mensagem
        $mail->Subject = "Recuperação de Senha";

        // Corpo do email
        $mail->Body = '<h1>Olá, sua solicitação de senha foi realizada!</h1><br>
        <p>Clique no link a seguir para cadastrar sua nova senha.</p>
        <a href="https://tag.tippet.com.br/newpass?tokenpass='.$token.'">Cadastrar Nova Senha</a><br><br>
        <p>Este é um e-mail de recuperação automática enviada pelo sistema da Tippet, por favor não responda.</p>
        <p>Att. Suporte Tippet<br>
        E-mail: contato@tippet.com.br<br>
        Telefone/whatsapp: 11 98532-1793</p>
        ';

        // Envia o e-mail
        $enviado = $mail->Send();

        return true;
    }

}