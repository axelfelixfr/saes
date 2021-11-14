<?php

require_once 'models/alumno.php';
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
    }
}
