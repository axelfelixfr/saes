<?php

require_once 'models/asignatura.php';
require_once 'models/profesor.php';
require_once 'views/profesor/sidebarInit.php';

class profesorController
{
    public function main()
    {
        Utils::isProfesor();
        $profesor = $_SESSION['identity'];
        require_once 'views/profesor/main.php';
        require_once 'views/profesor/sidebarFin.php';
    }

    public function personal()
    {
        Utils::isProfesor();
        $profesor = $_SESSION['identity'];
        require_once 'views/profesor/personal.php';
        require_once 'views/profesor/sidebarFin.php';
    }

    public function horarios()
    {
        Utils::isProfesor();
        $horario = $_SESSION['identity']->asignaturas;
        require_once 'views/profesor/horarios.php';
        require_once 'views/profesor/sidebarFin.php';
    }

    public function calificaciones()
    {
        Utils::isProfesor();

        $clave_profe = $_SESSION['identity']->general->clave_usuario;

        // Instancia de asignatura
        $asignatura = new Asignatura();

        $asignatura->setProfesorClave($clave_profe);
        $asignaturas = $asignatura->getEvaluacionesPorProfe();
        
        require_once 'views/profesor/calificaciones.php';
        require_once 'views/profesor/sidebarFin.php';
    }

    public function evaluar()
    {
        Utils::isProfesor();
        if (isset($_GET['clave_asig']) && isset($_GET['evaluacion'])) {
            $infoCalif = array();
            $clave_asig = $_GET['clave_asig'];
            $evaluacion = $_GET['evaluacion'];
            // Instancia de asignatura
            $asignatura = new Asignatura();
            // Primera consulta
            $asignatura->setAsignaturaClave($clave_asig);
            $asignatura->setEvaluacionClave($evaluacion);

            $evaluaciones = $asignatura->getEvaluacionesPorClave();
            $infoCalif["evaluaciones"] = $evaluaciones;

            // Segunda consulta
            $evaluacion = $asignatura->getOneEvaluacionPorClaveMateria();
            $infoCalif["infoEval"] = $evaluacion;

            $infoCalif;

            require_once 'views/profesor/evaluar.php';
            require_once 'views/profesor/sidebarFin.php';
        }
    }
}
