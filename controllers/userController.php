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
            // $_SESSION['nueva'] = $identity;
// header("Location:".base_url);
// die();
            // Crear una sesión
            if ($identity && is_object($identity)) {
                // Se guarda al usuario en identity
                $_SESSION['identity'] = $identity;

                // Se pasa a false al pasar el login
                if (isset($_SESSION['error_login']) && $_SESSION['error_login']) {
                    $_SESSION['error_login'] = false;
                }

                // Se identifica si es profesor o alumno
                if ($identity->general->perfil_name == 'profesor') {
                    $_SESSION['profesor'] = true;
                    header("Location:".base_url.'profesor/main');
                } elseif ($identity->general->perfil_name == 'alumno') {
                    $_SESSION['alumno'] = true;
                    header("Location:".base_url.'alumno/main');
                }

                // Algo fallo en el login
            } else {
                $_SESSION['error_login'] = true;
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

        if (isset($_SESSION['error_login'])) {
            unset($_SESSION['error_login']);
        }
        
        header("Location:".base_url);
    }
}
