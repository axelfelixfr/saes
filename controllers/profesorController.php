<?php


class profesorController
{
    
    public function main()
    {
        Utils::isProfesor();
        require_once 'views/profesor/main.php';
    }
}
