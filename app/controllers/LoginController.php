<?php

class LoginController
{
    private $userModel;
    private $db;

    public function __construct($db, $userModel)
    {
        $this->userModel = $userModel;
        $this->db = $db;
    }

    public function login(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username_mail = $_POST['username-mail'];
            $password = $_POST['password'];

            $user = $this->userModel->getUserByNameOrMail($username_mail);
            if ($user) {
                $passwordBD = $user['password_user'];
                if (password_verify($passwordBD, $password)) {
                    $_SESSION['userId'] = $user['user_id'];
                    $_SESSION['profileIdUser'] = $user['profile_id_user'];
                    $rolUser = $this->userModel->getRoleByID($user['rol_id_user']);
                    if ($rolUser) {
                        $_SESSION['rolUser'] = $rolUser['role'];
                        switch ($_SESSION['rolUser']) {
                            case 'SuperAdministrador':
                                //Entra a dashboard de superadministrador
                                echo 'Eres super administrador';
                                break;
                            case 'Administrador':
                                //Entra al dashboard de administrador
                                echo 'Eres administrador';
                                break;
                            default:
                                //No es administrador ni superadministrador
                                //Entra al dashboard de solicitante
                                echo 'Eres solicitante';
                                break;
                        }
                    }else{
                        //No se ha encontrado el rol
                        echo 'Ha ocurrido un error. Por el momento no puedes iniciar session.';
                    }
                }else{
                    //Las contraseñas no son iguales
                    echo 'Inicio de sesión fallido. Verifica tus credenciales.';
                }
            } else {
                //No se ha encontrado el usuario
                echo 'Inicio de sesión fallido. Verifica tus credenciales.';
            }
            echo 'No se pudo iniciar';
        }else{
            echo 'No se pudo iniciar';
            require 'app/views/login.php';
        }
    }



    public function showViewLogin() {
        header('Location: app/views/login.php');
    }
}




?>
