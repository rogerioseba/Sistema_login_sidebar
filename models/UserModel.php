<?php

namespace Models;
use Helpers\Messages;
use Jenssegers\Blade\Blade;
class UserModel extends ConexaoModel
{
    private $blade;
    public $message;
    public function __construct()
    {
        $this->blade = new Blade(DIRREQ . '/views', DIRREQ . '/lib/cache');
        $this->message = new Messages();
    }

    public function validateLogin($email)
    {
        $query = $this->conectDB()->prepare("SELECT users.* from users where email = ?");
        $query->bindParam(1, $email, \PDO::PARAM_STR);
        $query->execute();
        if ($query->rowCount() > 0) {
            return $data = $query->fetch(\PDO::FETCH_OBJ);
        } else {
            return false;
        }
    }

    public function findByToken($token)
    {
        $query = $this->conectDB()->prepare("SELECT users.* from users where token_recovery = ?");
        $query->bindParam(1, $token, \PDO::PARAM_STR);
        $query->execute();
        if ($query->rowCount() > 0) {
            return $data = $query->fetch(\PDO::FETCH_OBJ);
        } else {
            return false;
        }
    }

    public function addUser($dados)
    {
        $password = password_hash($dados['password'],PASSWORD_DEFAULT);
        $query = $this->conectDB()->prepare("Insert INTO users
        (first_name,last_name,email,password) VALUES (?,?,?,?)");
        $query->bindParam(1, $dados['first_name'], \PDO::PARAM_STR);
        $query->bindParam(2, $dados['last_name'], \PDO::PARAM_STR);
        $query->bindParam(3, $dados['email'], \PDO::PARAM_STR);
        $query->bindParam(4, $password, \PDO::PARAM_STR);

        if ($query->execute()) {
            return true;
        } else {

            return false;
        }

    }

    public function updateUsers($data, $file = null)
    {
        if (!empty($file['imagem_tutor']['tmp_name'])){
            $imagem = base64_encode(file_get_contents($file['imagem_tutor']['tmp_name']));
        }else{
            $image_antiga = $this->validateLogin($data['email']);
            $imagem = $image_antiga->imagem_tutor;
        }


        $query = $this->conectDB()->prepare("UPDATE users set first_name = ?, last_name = ?, email = ?, imagem_tutor = ?
                                                   WHERE idusers = ?");
        $query->bindParam(1, $data['first_name'], \PDO::PARAM_STR);
        $query->bindParam(2, $data['last_name'], \PDO::PARAM_STR);
        $query->bindParam(3, $data['email'],\PDO::PARAM_STR);
        $query->bindParam(4, $imagem,\PDO::PARAM_STR);
        $query->bindParam(5, $data['idusers'], \PDO::PARAM_INT);
        if ($query->execute()) {
            return true;
        } else {
            return false;
        }

    }

    public function updatePass($data, $iduser)
    {

        $senha = password_hash($data,PASSWORD_DEFAULT);

        $query = $this->conectDB()->prepare("UPDATE users set password = ?, token_recovery = null
                                                   WHERE idusers = ?");
        $query->bindParam(1, $senha, \PDO::PARAM_STR);
        $query->bindParam(2, $iduser, \PDO::PARAM_INT);
        if ($query->execute()) {
            return true;
        } else {
            return false;
        }

    }

    public function logoutUser()
    {
        session_destroy();
        header('location: ' . DIRPAGE . '/login');
    }

    public function deleteUser($dados){

        $query = $this->conectDB()->prepare("DELETE FROM tags where userid = ?");
        $query->bindParam(1, $dados['idusers'], \PDO::PARAM_INT);
        if ($query->execute()) {
            $query = $this->conectDB()->prepare("DELETE FROM users where idusers = ?");

            $query->bindParam(1, $dados['idusers'], \PDO::PARAM_INT);
            if ($query->execute()){
                return true;
            }else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function recoverUserPass($tokenNewPass, $email)
    {
        $query = $this->conectDB()->prepare("UPDATE users set token_recovery = ? where email = ?");
        $query->bindParam(1, $tokenNewPass);
        $query->bindParam(2, $email);
        if ($query->execute()) {
            return true;
        } else {
            return false;
        }

    }


}