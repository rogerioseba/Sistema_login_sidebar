<?php

namespace Controllers;

use Helpers\Messages;
use Jenssegers\Blade\Blade;
use Models\UserModel;

class UserController extends UserModel
{
    private $blade;

    public function __construct()
    {
        $this->blade = new Blade(DIRREQ . '/views', DIRREQ . '/lib/cache');
        $this->message = new Messages();
    }

    public function createUser()
    {
        $usuario = $this->validateLogin($_POST['email']);

        if ($usuario){
            $this->message->setMessage('warning', 'Já existe um usuário com o e-mail informado! Tente fazer login.');
            echo $this->blade->render('login');
            return;
        }

        $adduser = $this->addUser($_POST);

        if ($adduser){
            $this->message->setMessage('success', 'Usuário criado com sucesso! Tente fazer login.');
            echo $this->blade->render('login');
            return;
        }else{
            $this->message->setMessage('error', 'Erro ao tentar criar usuário, tente novamente mais tarde!');
            echo $this->blade->render('login');
            return;
        }
    }

    public function updateUser(){
        $usuario = $this->updateUsers($_POST,$_FILES);
        if ($usuario){
            $_SESSION['first_name'] = $_POST['first_name'];
            $_SESSION['last_name'] = $_POST['last_name'];
            $_SESSION['email'] = $_POST['email'];
            if (!empty($_FILES['imagem_tutor']['tmp_name'])) {
                $_SESSION['imagem_tutor'] = base64_encode(file_get_contents($_FILES['imagem_tutor']['tmp_name']));
            }
            $this->message->setMessage('success', 'Usuário Atualizado com sucesso!');
            echo $this->blade->render('home');
            return;
        }else{
            $this->message->setMessage('error', 'Erro ao tentar atualizar usuário, tente novamente mais tarde!');
            echo $this->blade->render('login');
            return;
        }
    }
    public function apagarUser(){

        $apagaruser = $this->deleteUser($_POST);
        if ($apagaruser){
            echo "
<script src='//cdn.jsdelivr.net/npm/sweetalert2@10'></script>
<script>setTimeout(function() {
            swal.fire({
                icon: 'success',
                title: 'Sucesso!',
                text: 'Usuário Excluído com Sucesso!',
                timer: 3000,
                grow: 'fullscreen',
                showConfirmButton: false
            }).then(function (){
                window.location = '".URL_BASE."/logout';
            });
        });
    </script>";
        }else{
            $this->message->setMessage('error', 'Erro ao tentar Excluir usuário, tente novamente mais tarde!');
            echo $this->blade->render('home');
            return;
        }

    }

    public function passwordUser()
    {
        if (isset($_POST['update_pass'])) {
            $usuario = $this->validateLogin($_SESSION['email']);
            if (!empty($_POST['password']) && !empty($_POST['newpassword']) && !empty($_POST['renewpassword'])) {
                if ($_POST['newpassword'] === $_POST['renewpassword']) {
                    if (password_verify($_POST['password'], $usuario->password)) {
                        if ($this->updatePass($_POST['newpassword'], $usuario->idusers)) {
                            $this->message->setMessage('success', 'Senha atualizada com sucesso!');
                            echo $this->blade->render('home');
                            return;
                        }else{
                            $this->message->setMessage('warning', 'Não foi possível alterar senha, tente novamente!');
                            echo $this->blade->render('home');
                            return;
                        }
                    }else{
                        $this->message->setMessage('warning', 'Senha Atual não confere a informada, tente novamente!');
                        echo $this->blade->render('home');
                        return;
                    }
                }else{
                    $this->message->setMessage('warning', 'As senhas novas não correspondem, tente novamente!');
                    echo $this->blade->render('home');
                    return;
                }
            }
            $this->message->setMessage('warning', 'Para alterar as senhas é necessário preencher os dados, tente novamente!');
            echo $this->blade->render('home');
            return;
        } else {
            echo $this->blade->render('home');
            return;
        }
    }



}