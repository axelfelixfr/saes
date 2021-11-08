<?php

class User
{

    private $email;
    private $password;
    // Conexión a base de datos
    private $db;
    
    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getEmail()
    {
        return $this->$email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }


    public function getPassword()
    {
        return $this->$password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    public function login()
    {
        $result = false;
        $email = $this->email;
        $password = $this->password;
        
        // Comprobar si existe el usuario
        $sql = "SELECT * FROM usuario WHERE email = '$email' AND password = '$password'";
        $login = $this->db->query($sql);

        if ($login && $login->num_rows == 1) {
            $usuario = $login->fetch_object();
            
            // Verificar la contraseña
            // $verify = password_verify($password, $usuario->password);
            
            // if ($verify) {
                $result = $usuario;
            // }
        }
        return $result;
    }
}
