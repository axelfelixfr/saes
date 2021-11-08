<?php

class alumnoController
{
    public function main()
    {
        Utils::isAlumno();
        require_once 'views/alumno/index.php';
    }
}
