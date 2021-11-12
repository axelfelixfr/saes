<?php

class Alumno
{
    private $id;
    private $cartilla;
    private $pasaporte;
    private $sexo;
    // Conexión a base de datos
    private $db;
    
    public function __construct()
    {
        $this->db = Database::connect();
    }

    function getId()
    {
        return $this->id;
    }
    
    function getCartilla()
    {
        return $this->cartilla;
    }

    function getPasaporte()
    {
        return $this->pasaporte;
    }

    function getSexo()
    {
        return $this->sexo;
    }

    function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    function setCartilla($cartilla)
    {
        $this->cartilla = $cartilla;
        return $this;
    }

    function setPasaporte($pasaporte)
    {
        $this->pasaporte = $pasaporte;
        return $this;
    }

    function setSexo($sexo)
    {
        $this->sexo = $sexo;
        return $this;
    }

    public static function queryUpdateGeneral()
    {
        $sql = "SELECT * FROM usuario SET cartilla = ?, pasaporte = ?, sexo = ? WHERE id = ?";
        $update = $this->db->prepare($sql);
        return $update->execute([$this->getCartilla(),$this->getPasaporte(), $this->getSexo(), $this->id]);
    }

    public function editGeneral()
    {
        $sql = "UPDATE usuario SET cartilla ='{$this->getCartilla()}', pasaporte='{$this->getPasaporte()}', sexo='{$this->getSexo()}' WHERE id={$this->id};";
        
        $save = $this->db->query($sql);
        
        if ($save) {
            $sqlUser = "SELECT * FROM usuario WHERE id = {$this->id};";
            $userUpdate = $this->db->query($sqlUser);

            if ($userUpdate && $userUpdate->num_rows == 1) {
                $usuario = $userUpdate->fetch_object();
            
                $result = $usuario;
            }
        }
        return $result;
    }
}
