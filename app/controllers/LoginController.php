<?php

class LoginController {
    private $userModel;
    private $db;

    public function __construct($db, $userModel) {
    $this->userModel = $userModel;
    $this->db = $db;
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $user = $this->userModel->getUserByCredentials($username, $password);

            if ($user) {
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['profile_id_user'] = $user['profile_id_user'];
                $_SESSION['rol_id_user'] = $user['rol_id_user'];

                switch ($_SESSION['rol_id_user']) {
                    case 'SuperAdministrador':
                        // Lógica para SuperAdministrador
                        break;
                    case 'Administrador':
                        // Lógica para Administrador
                        break;
                    case 'Solicitante':
                        // Lógica para Solicitante
                        break;
                }

                header('Location: dashboard.php');
            } else {
                echo 'Inicio de sesión fallido. Verifica tus credenciales.';
            }
        }
    }
}
?>
