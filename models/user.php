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
        return $this->id;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function getEmail()
    {
        return $this->email;
    }

    function setEmail($email)
    {
        $this->email = $this->db->real_escape_string($email);
    }

    function getPassword()
    {
        return $this->password;
    }

    function setPassword($password)
    {
        $this->password = $this->db->real_escape_string($password);
    }

    public function login()
    {
        $dataUser = array();
        $result = false;
        $email = $this->email;
        $password = $this->password;
        
        // Comprobar si existe el usuario
        $sql = "SELECT * FROM usuario WHERE email = '$email' AND password = '$password'";
        $login = $this->db->query($sql);
        if ($login && $login->num_rows == 1) {
            $usuario = $login->fetch_object();
            $dataUser["general"] = $usuario;
            // array_push($dataUser, $usuario);
            
            // Se saca su dirección
            $usuario_id = $usuario->id;
            $sqlDireccion = "SELECT * FROM direccion WHERE usuario_id = '$usuario_id'";
            $getDireccion = $this->db->query($sqlDireccion);

            if ($getDireccion && $getDireccion->num_rows == 1) {
                $direccion = $getDireccion->fetch_object();
                $dataUser["direccion"] = $direccion;
                // array_push($dataUser, $direccion);
            }
    
            // Se hacen nuevas consultas dependiendo de su perfil
            $perfil = $usuario->perfil_name;

            if ($perfil == "alumno") {
                $sqlEscolaridad = "SELECT * FROM escolaridad WHERE alumno_id = '$usuario_id'";
                $getEscolaridad = $this->db->query($sqlEscolaridad);

                if ($getEscolaridad && $getEscolaridad->num_rows == 1) {
                    $escolaridad = $getEscolaridad->fetch_object();
                    $dataUser["escolaridad"] = $escolaridad;
                    // array_push($dataUser, $escolaridad);
                }

                $sqlTutor = "SELECT * FROM tutor WHERE alumno_id = '$usuario_id'";
                $getTutor = $this->db->query($sqlTutor);

                if ($getTutor && $getTutor->num_rows == 1) {
                    $tutor = $getTutor->fetch_object();
                    $dataUser["tutor"] = $tutor;

                    // array_push($dataUser, $tutor);
                }

                // return $dataAlumno;
            } elseif ($perfil == "profesor") {
                $result = "Se trata de un profesor";
            } else {
                $result = false;
            }
            $object = json_encode($dataUser);
            $object1 = json_decode($object);
            $result = $object1;
            
            // $result = (object)$dataUser;
            // $object1 = json_decode($dataUser);
            // $result = $dataUser;
        } else {
            $result = false;
        }

        // if (empty($direccion)) {
        //     return $result;
        // }
        
        // return array($result, $direccion);
        return $result;
        // $sql = "SELECT * FROM usuario WHERE email = ? AND password = ?";
        // $statement = $this->db->prepare($sql);
        // // $statement->execute(array(
        // //     ':usuario' => $usuario,
        // //     ':pass' => $pass
        // // ));
        // $statement->bind_param("ss", $email, $password);
        // $statement->execute();
        // $result = $statement->fetch_object();

        // return "No se ejecuto";
    }
}
