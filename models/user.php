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
            $usuario_clave = $usuario->clave_usuario;
            $sqlDireccion = "SELECT * FROM direccion WHERE usuario_clave = '$usuario_clave'";
            $getDireccion = $this->db->query($sqlDireccion);

            if ($getDireccion && $getDireccion->num_rows == 1) {
                $direccion = $getDireccion->fetch_object();
                $dataUser["direccion"] = $direccion;
                // array_push($dataUser, $direccion);
            }
    
            // Se hacen nuevas consultas dependiendo de su perfil
            $perfil = $usuario->perfil_name;

            if ($perfil == "alumno") {
                // Se obtiene la información sobre escolaridad del alumno
                $sqlEscolaridad = "SELECT * FROM escolaridad WHERE alumno_clave = '$usuario_clave'";
                $getEscolaridad = $this->db->query($sqlEscolaridad);

                if ($getEscolaridad && $getEscolaridad->num_rows == 1) {
                    $escolaridad = $getEscolaridad->fetch_object();
                    $dataUser["escolaridad"] = $escolaridad;
                }

                // Se obtiene la información sobre tutor del alumno
                $sqlTutor = "SELECT * FROM tutor WHERE alumno_clave = '$usuario_clave'";
                $getTutor = $this->db->query($sqlTutor);

                if ($getTutor && $getTutor->num_rows == 1) {
                    $tutor = $getTutor->fetch_object();
                    $dataUser["tutor"] = $tutor;
                }

                // Se obtiene la información sobre el horario del alumno
                $sqlHorario = "SELECT asig.secuencia, asig.descripcion, asig.lunes, asig.martes, asig.miercoles, asig.jueves, asig.viernes, asig.sabado, asig.carrera, asig.edificio, asig.salon, asig.especialidad, asig.periodo_escolar, asig.plan_estudios, insc.asignatura_clave, profe.nombre, profe.apellidos FROM asignatura asig INNER JOIN usuario profe ON asig.profesor_clave = profe.clave_usuario INNER JOIN inscripcion insc ON asig.materia_clave = insc.asignatura_clave WHERE insc.alumno_clave = '$usuario_clave'";
                $getHorario = $this->db->query($sqlHorario);
                
                $horarioAsignaturas = array();
                while ($asig = mysqli_fetch_object($getHorario)) {
                    $horarioAsignaturas[] = $asig;
                }
                
                $dataUser["horario"] = $horarioAsignaturas;
                
                // return $dataAlumno;
            } elseif ($perfil == "profesor") {
                // Se obtienen las asignaturas del profesor
                $sqlAsignaturas = "SELECT * FROM asignatura WHERE profesor_clave = '$usuario_clave'";
                $getAsignaturas = $this->db->query($sqlAsignaturas);

                $arrayAsignaturas = array();
                while ($asig = mysqli_fetch_object($getAsignaturas)) {
                    $arrayAsignaturas[] = $asig;
                }
                
                $dataUser["asignaturas"] = $arrayAsignaturas;

                // $result = "Se trata de un profesor";
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
