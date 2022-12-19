<?php

namespace Controllers;

use Helpers\Messages;
use Jenssegers\Blade\Blade;
use Models\TagModel;
use Models\UserModel;

class ViewController extends TagModel
{
    private $blade;

    public function __construct()
    {
        $this->blade = new Blade(DIRREQ . '/views', DIRREQ . '/lib/cache');
        $this->message = new Messages();
    }

    public function viewTag(array $data){
        $tag = $this->selectTagTutor($data['tag']);
        echo $this->blade->render('viewtag', compact('tag'));
        return;
    }

    public function newPass()
    {
        if ($_POST){
            $userModel = new UserModel();
            if (isset($_POST['tokenpass'])){
                $usuario = $userModel->findByToken($_POST['tokenpass']);
            }
            if ($usuario){

                    if (!empty($_POST['password']) && !empty($_POST['renewpassword'])) {
                        if ($_POST['password'] === $_POST['renewpassword']) {
                            if ($userModel->updatePass($_POST['password'], $usuario->idusers)) {
                                $this->message->setMessage('success', 'Senha atualizada com sucesso!');
                                echo $this->blade->render('login');
                                return;
                            }else{
                                $this->message->setMessage('error', 'Não foi possível gerar nova senha, tente novamente acessar o link de recuperação do seu e-mail!');
                                echo $this->blade->render('login');
                                return;
                            }
                        }else{
                            $this->message->setMessage('warning', 'As senhas informadas não são iguais, tente novamente acessar o link de recuperação do seu e-mail!');
                            echo $this->blade->render('login');
                            return;
                        }
                    }else{
                        $this->message->setMessage('warning', 'É necessário preencher todos os campos, tente novamente acessar o link de recuperação do seu e-mail!');
                        echo $this->blade->render('login');
                        return;
                    }
                }else{
                $this->message->setMessage('error', 'Não é possível utilizar o seu token de recuperação, faça outra solicitação!');
                echo $this->blade->render('login');
                return;
            }

        }else{
            echo $this->blade->render('new-pass');
            return;
        }
    }

    public function recoverPass(){
       if ($_POST){
           $tokenNewPass = uniqid(rand(), true);
           $email = $_POST['email'];
            $userModel = new UserModel();
           $renew = $userModel->recoverUserPass($tokenNewPass, $email);

           if ($renew) {
               $mail = new mailController();
               $email_enviado = $mail->mailRecoverPass($email, $tokenNewPass);

               if ($email_enviado) {
                   $this->message->setMessage('success', 'Recuperação de senha solicitada, verifique seu email!');
                   echo $this->blade->render('login');
                   return;
               } else {
                   $this->message->setMessage('error', 'Recuperação de senha falhou, verifique se seu e-mail está correto!');
                   echo $this->blade->render('recover-pass');
                   return;
               }
           } else {
               $this->message->setMessage('error', 'Recuperação de senha falhou, verifique se seu e-mail está correto e tente novamente!');
               echo $this->blade->render('recover-pass');
               return;
           }
       }else{
           echo $this->blade->render('recover-pass');
           return;
       }
    }
}