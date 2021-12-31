<?php

class Asignatura
{
    private $profesor_clave;
    private $alumno_clave;
    private $asignatura_clave;
    private $evaluacion_clave;
    private $calif_alumno;
    // Conexión a base de datos
    private $db;

    function getProfesorClave()
    {
        return $this->profesor_clave;
    }

    function setProfesorClave($profesor_clave)
    {
        $this->profesor_clave = $profesor_clave;
    }

    function getAlumnoClave()
    {
        return $this->alumno_clave;
    }

    function setAlumnoClave($alumno_clave)
    {
        $this->alumno_clave = $alumno_clave;
    }

    function getAsignaturaClave()
    {
        return $this->asignatura_clave;
    }

    function setAsignaturaClave($asignatura_clave)
    {
        $this->asignatura_clave = $asignatura_clave;
    }

    function getEvaluacionClave()
    {
        return $this->evaluacion_clave;
    }

    function setEvaluacionClave($evaluacion_clave)
    {
        $this->evaluacion_clave = $evaluacion_clave;
    }

    function getCalifAlumno()
    {
        return $this->calif_alumno;
    }

    function setCalifAlumno($calif_alumno)
    {
        $this->calif_alumno = $calif_alumno;
    }

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getEvaluacionesPorProfe()
    {
        $sql = "SELECT asig.secuencia, asig.profesor_clave, asig.descripcion, eval.clv_evaluacion, eval.ordinario, eval.asignatura_clave, eval.estatus_acta, eval.fecha_aplicacion, eval.estatus_completa FROM asignatura asig INNER JOIN evaluacion eval ON asig.materia_clave = eval.asignatura_clave WHERE asig.profesor_clave = '{$this->profesor_clave}';";

        $asignaturasEval = $this->db->query($sql);
        // echo $this->db->error;
        // die();

        return $asignaturasEval;
    }

    public function getCalificacionesPorAlumno()
    {
        $sql = "SELECT asig.secuencia, asig.descripcion, asig.carrera, insc.alumno_clave, insc.asignatura_clave, calif.calificacion_primer, calif.calificacion_segundo, calif.calificacion_tercer FROM inscripcion insc INNER JOIN asignatura asig ON insc.asignatura_clave = asig.materia_clave INNER JOIN calificacion_semestre calif ON insc.alumno_clave = calif.alumno_clave AND insc.asignatura_clave = calif.asignatura_clave WHERE calif.alumno_clave = '{$this->alumno_clave}';";
        $calificaciones = $this->db->query($sql);

        return $calificaciones;
    }

    public function getEvaluacionesPorClave()
    {

        $sql = "SELECT asig.secuencia, alumno.nombre, alumno.apellidos, asig.descripcion, asig.carrera, asig.periodo_escolar, asig.materia_clave, asig.profesor_clave, semestre.alumno_clave, calif.calificacion, calif.evaluacion_clave FROM calificacion_semestre semestre INNER JOIN usuario alumno ON semestre.alumno_clave = alumno.clave_usuario INNER JOIN calificacion_parcial calif ON semestre.alumno_clave = calif.alumno_clave INNER JOIN asignatura asig ON semestre.asignatura_clave = asig.materia_clave WHERE asig.materia_clave = '{$this->asignatura_clave}' AND calif.evaluacion_clave = '{$this->evaluacion_clave}';";
        
        $evaluaciones = $this->db->query($sql);
        // echo $this->db->error;
        // die();

        return $evaluaciones;
    }

    public function getOneEvaluacionPorClaveMateria()
    {
        $sql = "SELECT eval.clv_evaluacion, eval.asignatura_clave, eval.ordinario, eval.fecha_aplicacion, eval.estatus_completa, eval.estatus_acta, asig.profesor_clave, asig.secuencia, asig.descripcion FROM evaluacion eval INNER JOIN asignatura asig ON asig.materia_clave = eval.asignatura_clave WHERE asig.materia_clave = '{$this->asignatura_clave}' AND eval.clv_evaluacion = '{$this->evaluacion_clave}';";

        $evaluacion = $this->db->query($sql);

        return $evaluacion;
    }

    public function updateCalificacionPorAlumno()
    {
        $sql = "UPDATE calificacion_parcial SET calificacion ='{$this->getCalifAlumno()}' WHERE alumno_clave='{$this->getAlumnoClave()}' AND evaluacion_clave='{$this->getEvaluacionClave()}';";
        $save = $this->db->query($sql);
        
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function updateCalificacionTercerParcial()
    {
        $sql = "UPDATE calificacion_semestre SET calificacion_tercer ='{$this->getCalifAlumno()}' WHERE alumno_clave='{$this->getAlumnoClave()}' AND asignatura_clave='{$this->getAsignaturaClave()}';";
        $save = $this->db->query($sql);
        
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function updateEstatusActaEvaluacionComplete()
    {
        $sql = "UPDATE evaluacion SET estatus_completa=1 WHERE asignatura_clave = '{$this->getAsignaturaClave()}' AND clv_evaluacion = '{$this->getEvaluacionClave()}';";

        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }
}
