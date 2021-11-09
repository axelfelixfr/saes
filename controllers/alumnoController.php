<?php

require_once 'views/alumno/sidebarInit.php';

class alumnoController
{
    
    public function main()
    {
        Utils::isAlumno();
        require_once 'views/alumno/main.php';
        require_once 'views/alumno/sidebarFin.php';
    }


    public function general()
    {
        Utils::isAlumno();
        require_once 'views/alumno/general.php';
    }
}
