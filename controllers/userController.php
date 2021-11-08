<?php

require_once 'models/user.php';

class userController
{
    public function index()
    {
        require_once 'views/user/login.php';
    }

    public function password()
    {
        require_once 'views/user/password.php';
    }

    public function ayuda()
    {
        require_once 'views/user/ayuda.php';
    }

    public function login()
    {
        if (isset($_POST)) {
            // Identificar al usuario
            // Consulta a la base de datos
            $user = new User();
            $user->setEmail($_POST['email']);
            $user->setPassword($_POST['password']);
            
            $identity = $user->login();
            
            // Crear una sesión
            if ($identity && is_object($identity)) {
                $_SESSION['identity'] = $identity;
                if ($identity->perfil_name == 'profesor') {
                    $_SESSION['profesor'] = true;
                    header("Location:".base_url.'profesor/main');
                } elseif ($identity->perfil_name == 'alumno') {
                    $_SESSION['alumno'] = true;
                    header("Location:".base_url.'alumno/main');
                }
            } else {
                $_SESSION['error_login'] = 'Checa bien los campos, identificación fallida!!!';
                header("Location:".base_url);
            }
        } else {
            header("Location:".base_url);
        }
    }

    public function logout()
    {
        if (isset($_SESSION['identity'])) {
            unset($_SESSION['identity']);
        }
        
        if (isset($_SESSION['profesor'])) {
            unset($_SESSION['profesor']);
        }

        if (isset($_SESSION['alumno'])) {
            unset($_SESSION['alumno']);
        }
        
        header("Location:".base_url);
    }
}
