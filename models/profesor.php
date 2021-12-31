<?php

class Profesor
{
   
    private $clave;
    // Conexión a base de datos
    private $db;

    function getClave()
    {
        return $this->clave;
    }

    function setClave($clave)
    {
        $this->clave = $clave;
    }

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getProfesor()
    {
        $sql = "SELECT * FROM usuario WHERE clave_usuario = {$this->clave};";
        $userProfesor = $this->db->query($sql);

        if ($userProfesor && $userProfesor->num_rows == 1) {
            $usuario = $userProfesor->fetch_object();
        }
        return $usuario;
    }
}
