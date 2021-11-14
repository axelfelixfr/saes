<?php

class Alumno
{
    private $id;
    private $cartilla;
    private $pasaporte;
    private $sexo;
    private $nacimiento;
    private $calle;
    private $num_ext;
    private $colonia;
    private $codigo_postal;
    private $estado;
    private $municipio;
    private $num_int;
    private $movil;
    private $email_general;
    private $tel_oficina;
    private $labora;
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

    function setId($id)
    {
        $this->id = $id;
    }
    
    function getCartilla()
    {
        return $this->cartilla;
    }

    function setCartilla($cartilla)
    {
        $this->cartilla = $this->db->real_escape_string($cartilla);
    }

    function getPasaporte()
    {
        return $this->pasaporte;
    }

    function setPasaporte($pasaporte)
    {
        $this->pasaporte = $this->db->real_escape_string($pasaporte);
    }

    function getSexo()
    {
        return $this->sexo;
    }

    function setSexo($sexo)
    {
        $this->sexo = $this->db->real_escape_string($sexo);
    }

    function getNacimiento()
    {
        return $this->nacimiento;
    }

    function setNacimiento($nacimiento)
    {
        $this->nacimiento = $this->db->real_escape_string($nacimiento);
    }

    function getCalle()
    {
        return $this->calle;
    }

    function setCalle($calle)
    {
        $this->calle = $this->db->real_escape_string($calle);
    }

    function getNumExt()
    {
        return $this->num_ext;
    }

    function setNumExt($num_ext)
    {
        $this->num_ext = $num_ext;
    }

    function getColonia()
    {
        return $this->colonia;
    }

    function setColonia($colonia)
    {
        $this->colonia = $colonia;
    }

    function getCodigoPostal()
    {
        return $this->codigo_postal;
    }

    function setCodigoPostal($codigo_postal)
    {
        $this->codigo_postal = $codigo_postal;
    }

    function getEstado()
    {
        return $this->estado;
    }

    function setEstado($estado)
    {
        $this->estado = $estado;
    }

    function getMunicipio()
    {
        return $this->municipio;
    }

    function setMunicipio($municipio)
    {
        $this->municipio = $municipio;
    }

    function getNumInt()
    {
        return $this->num_int;
    }

    function setNumInt($num_int)
    {
        $this->num_int = $num_int;
    }

    function getMovil()
    {
        return $this->movil;
    }

    function setMovil($movil)
    {
        $this->movil = $movil;
    }

    function getEmailGeneral()
    {
        return $this->email_general;
    }

    function setEmailGeneral($email_general)
    {
        $this->email_general = $email_general;
    }

    function getTelOficina()
    {
        return $this->tel_oficina;
    }

    function setTelOficina($tel_oficina)
    {
        $this->tel_oficina = $tel_oficina;
    }

    function getLabora()
    {
        return $this->labora;
    }

    function setLabora($labora)
    {
        $this->labora = $labora;
    }


    public static function queryUpdateGeneral()
    {
        $sql = "SELECT * FROM usuario SET cartilla = ?, pasaporte = ?, sexo = ? WHERE id = ?";
        $update = $this->db->prepare($sql);
        return $update->execute([$this->getCartilla(),$this->getPasaporte(), $this->getSexo(), $this->id]);
    }

    public function getAlumno()
    {
        $sql = "SELECT * FROM usuario WHERE id = {$this->id};";
        $userAlumno = $this->db->query($sql);

        if ($userAlumno && $userAlumno->num_rows == 1) {
            $usuario = $userAlumno->fetch_object();
        }
        return $usuario;
    }

    public function editGeneral()
    {
        $sql = "UPDATE usuario SET cartilla ='{$this->getCartilla()}', pasaporte='{$this->getPasaporte()}', sexo='{$this->getSexo()}' WHERE id={$this->id};";
        
        $save = $this->db->query($sql);
        
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function editNacimiento()
    {
        $sql = "UPDATE usuario SET nacimiento ='{$this->getNacimiento()}' WHERE id={$this->id};";
        
        $save = $this->db->query($sql);
        
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }
    
    // FALTA AGREGAR EDITAR DIRECCION
}
