<?php

class Utils
{
    public static function show_error()
    {
        $error = new errorController();
        $error->index();
    }

    public static function deleteSession($name)
    {
        if (isset($_SESSION[$name])) {
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }

        return $name;
    }

    public static function isIdentity()
    {
        if (!isset($_SESSION['identity'])) {
            header("Location:".base_url);
        } else {
            return true;
        }
    }

    public static function isProfesor()
    {
        if (!isset($_SESSION['profesor'])) {
            header("Location:".base_url);
        } else {
            return true;
        }
    }
    
    public static function isAlumno()
    {
        if (!isset($_SESSION['alumno'])) {
            header("Location:".base_url);
        } else {
            return true;
        }
    }

    public static function saludar()
    {
        
        date_default_timezone_set('America/Mexico_City');
        
        $temprano = 11;
        $tarde = 19;

        $hora_actual = intval(date("H"));
        if ($hora_actual <= $temprano) {
            echo "Buenos días";
        } elseif ($hora_actual > $temprano && $hora_actual <= $tarde) {
            echo "Buenas tardes";
        } else {
            echo "Buenas noches";
        }
    }
}
