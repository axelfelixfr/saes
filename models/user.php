<?php

class User
{
    private $id;
    private $email;
    private $password;
    // Conexión a base de datos
    private $db;
    
    public function __construct()
    {
        $this->db = Database::connect();
    }

    function getId()
    {
        return $this->$id;
    }

    function getEmail()
    {
        return $this->$email;
    }

    function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }


    function getPassword()
    {
        return $this->$password;
    }

    function setPassword($password)
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
            
            $result = $usuario;
        }
        return $result;
    }
}
