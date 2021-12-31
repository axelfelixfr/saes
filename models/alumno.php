<?php

class Alumno
{
    private $clave;
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

    function getClave()
    {
        return $this->clave;
    }

    function setClave($clave)
    {
        $this->clave = $clave;
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
        $this->num_ext = $this->db->real_escape_string($num_ext);
    }

    function getColonia()
    {
        return $this->colonia;
    }

    function setColonia($colonia)
    {
        $this->colonia = $this->db->real_escape_string($colonia);
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
        $this->estado = $this->db->real_escape_string($estado);
    }

    function getMunicipio()
    {
        return $this->municipio;
    }

    function setMunicipio($municipio)
    {
        $this->municipio = $this->db->real_escape_string($municipio);
    }

    function getNumInt()
    {
        return $this->num_int;
    }

    function setNumInt($num_int)
    {
        $this->num_int = $this->db->real_escape_string($num_int);
    }

    function getMovil()
    {
        return $this->movil;
    }

    function setMovil($movil)
    {
        $this->movil = $this->db->real_escape_string($movil);
    }

    function getEmailGeneral()
    {
        return $this->email_general;
    }

    function setEmailGeneral($email_general)
    {
        $this->email_general = $this->db->real_escape_string($email_general);
    }

    function getTelOficina()
    {
        return $this->tel_oficina;
    }

    function setTelOficina($tel_oficina)
    {
        $this->tel_oficina = $this->db->real_escape_string($tel_oficina);
    }

    function getLabora()
    {
        return $this->labora;
    }

    function setLabora($labora)
    {
        $this->labora = $this->db->real_escape_string($labora);
    }

    function getNombreTutor()
    {
        return $this->nombre_tutor;
    }

    function setNombreTutor($nombre_tutor)
    {
        $this->nombre_tutor = $this->db->real_escape_string($nombre_tutor);
    }

    function getRfcTutor()
    {
        return $this->rfc_tutor;
    }

    function setRfcTutor($rfc_tutor)
    {
        $this->rfc_tutor = $this->db->real_escape_string($rfc_tutor);
    }

    function getPadre()
    {
        return $this->padre;
    }

    function setPadre($padre)
    {
        $this->padre = $this->db->real_escape_string($padre);
    }

    function getMadre()
    {
        return $this->madre;
    }

    function setMadre($madre)
    {
        $this->madre = $this->db->real_escape_string($madre);
    }


    public static function queryUpdateGeneral()
    {
        $sql = "SELECT * FROM usuario SET cartilla = ?, pasaporte = ?, sexo = ? WHERE id = ?";
        $update = $this->db->prepare($sql);
        return $update->execute([$this->getCartilla(),$this->getPasaporte(), $this->getSexo(), $this->id]);
    }

    public function getAlumno()
    {
        $sql = "SELECT * FROM usuario WHERE clave_usuario = {$this->clave};";
        $userAlumno = $this->db->query($sql);

        if ($userAlumno && $userAlumno->num_rows == 1) {
            $usuario = $userAlumno->fetch_object();
        }
        return $usuario;
    }

    public function getDireccionAlumno()
    {
        $sql = "SELECT * FROM direccion WHERE usuario_clave = {$this->clave};";
        $direccionAlumno = $this->db->query($sql);

        if ($direccionAlumno && $direccionAlumno->num_rows == 1) {
            $direccion = $direccionAlumno->fetch_object();
        }

        return $direccion;
    }

    public function getTutor()
    {
        $sql = "SELECT * FROM tutor WHERE alumno_clave = {$this->clave};";
        $tutorAlumno = $this->db->query($sql);

        if ($tutorAlumno && $tutorAlumno->num_rows == 1) {
            $tutor = $tutorAlumno->fetch_object();
        }
        return $tutor;
    }

    public function editGeneral()
    {
        $sql = "UPDATE usuario SET cartilla ='{$this->getCartilla()}', pasaporte='{$this->getPasaporte()}', sexo='{$this->getSexo()}' WHERE clave_usuario={$this->clave};";
        
        $save = $this->db->query($sql);
        
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function editNacimiento()
    {
        $sql = "UPDATE usuario SET nacimiento ='{$this->getNacimiento()}' WHERE clave_usuario={$this->clave};";
        
        $save = $this->db->query($sql);
        
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function editDireccion()
    {
        $sql = "UPDATE direccion SET calle ='{$this->getCalle()}', num_ext ='{$this->getNumExt()}', num_int ='{$this->getNumInt()}', colonia ='{$this->getColonia()}', codigo_postal ={$this->getCodigoPostal()}, estado ='{$this->getEstado()}', municipio ='{$this->getMunicipio()}', movil ='{$this->getMovil()}', email ='{$this->getEmailGeneral()}', tel_oficina ='{$this->getTelOficina()}', labora ='{$this->getLabora()}' WHERE usuario_clave={$this->clave};";

        $save = $this->db->query($sql);
        // echo $this->db->error;
        // die();
        $result = false;
        
        if ($save) {
            $result = true;
        }

        return $result;
    }

    public function editTutor()
    {
        $sql = "UPDATE tutor SET nombre ='{$this->getNombreTutor()}', rfc ='{$this->getRfcTutor()}', padre ='{$this->getPadre()}', madre ='{$this->getMadre()}' WHERE alumno_clave={$this->clave};";

        $save = $this->db->query($sql);
        
        $result = false;
        
        if ($save) {
            $result = true;
        }

        return $result;
    }
}
