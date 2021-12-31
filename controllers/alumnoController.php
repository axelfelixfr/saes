<?php

require_once 'models/alumno.php';
require_once 'models/asignatura.php';
require_once 'views/alumno/sidebarInit.php';

class alumnoController
{
    
    public function main()
    {
        Utils::isAlumno();
        $alumno = $_SESSION['identity'];
        require_once 'views/alumno/main.php';
        require_once 'views/alumno/sidebarFin.php';
    }


    public function general()
    {
        Utils::isAlumno();
        $alumno = $_SESSION['identity'];
        require_once 'views/alumno/general.php';
        require_once 'views/alumno/sidebarFin.php';
    }

    public function horario()
    {
        Utils::isAlumno();
        $horario = $_SESSION['identity']->horario;
        require_once 'views/alumno/horario.php';
        require_once 'views/alumno/sidebarFin.php';
    }

    public function calificaciones()
    {
        Utils::isAlumno();
        $clave_alumno = $_SESSION['identity']->general->clave_usuario;

        // Instancia de asignatura
        $asignatura = new Asignatura();

        $asignatura->setAlumnoClave($clave_alumno);
        $calificaciones = $asignatura->getCalificacionesPorAlumno();
        require_once 'views/alumno/calificaciones.php';
        require_once 'views/alumno/sidebarFin.php';
    }
}
