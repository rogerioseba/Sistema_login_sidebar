<?php

namespace Controllers;

use Helpers\Messages;
use Jenssegers\Blade\Blade;
use Models\UserModel;

class LoginController extends UserModel
{
    private $blade;

    public function __construct()
    {
        $this->blade = new Blade(DIRREQ . '/views', DIRREQ . '/lib/cache');
        $this->message = new Messages();
    }

    public function logIn()
    {
        echo $this->blade->render('login');
        return;
    }

    public function loginUser()
    {
        if ($_POST){
            $email = $_POST['email'];
            $senha = $_POST['password'];

            $usuario = $this->validateLogin($email);
            if (empty($email) || empty($senha)) {
                $this->message->setMessage('error', 'Preencha todos os campos para entrar no sistema!');
                echo $this->blade->render('login');
                return;
            }

            if (!$usuario) {
                $this->message->setMessage('error', 'Nenhum usuário encontrado. Verifique os dados e Tente Novamente!');
                echo $this->blade->render('login');
                return;
            }

            if (!password_verify($senha, $usuario->password)) {
                $this->message->setMessage('error', 'Senha Inválida, tente novamente!');
                echo $this->blade->render('login');
                return;
            }else{
                $_SESSION['loggedIn'] = true;
                $_SESSION['first_name'] = $usuario->first_name;
                $_SESSION['last_name'] = $usuario->last_name;
                $_SESSION['email'] = $usuario->email;
                $_SESSION['iduser'] = $usuario->idusers;
                $_SESSION['imagem_tutor']=$usuario->imagem_tutor;
            }

            if ($_SESSION['loggedIn']) {
                header("location: " .URL_BASE."/");
            }



        }
        echo $this->blade->render('login');
    }

    public function registerUser(){
        echo $this->blade->render('pages-register');
        return;
    }

    public function sessionVerify()
    {
        if (!$_SESSION['loggedIn'] || !isset($_SESSION['loggedIn'])) {
            header('location: ' . DIRPAGE . '/login');
        }
    }

    public function logout(){
        $this->logoutUser();
    }
}