<?php

ob_start();

session_start();
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header('Content-Type: text/html; charset=UTF-8');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
date_default_timezone_set('America/Mexico_City');

require_once 'autoloadController.php';
require_once 'config/db.php';
require_once 'config/parameters.php';
require_once 'helpers/utils.php';

if (isset($_POST['user']) && !empty($_POST['user']) && isset($_POST['actionAjax']) && !empty($_POST['actionAjax'])) {
    $typeUser = $_POST['user'];
    $actionAjax = $_POST['actionAjax'];
    if ($typeUser == "user") {
        $nameController = 'userController';
        $controlador = new $nameController();
        switch ($actionAjax) {
            case 'login':
                $action = 'login';
                $controlador->$action();
                exit();
            break;
            default:
                exit();
        }
    } elseif ($typeUser == "alumno") {
        $nameController = 'alumnoAjax';
        $controlador = new $nameController();
        switch ($actionAjax) {
            case 'tabAlumnoGeneral':
                $action = 'updateGeneral';
                $controlador->$action();
                exit();
            break;
            case 'tabAlumnoNacimiento':
                $action = 'updateNacimiento';
                $controlador->$action();
                exit();
            break;
            case 'tabAlumnoDireccion':
                $action = 'updateDireccion';
                $controlador->$action();
                exit();
            break;
            case 'tabAlumnoTutor':
                $action = 'updateTutor';
                $controlador->$action();
                exit();
            break;
            default:
                exit();
        }
    } elseif ($typeUser == "profesor") {
        $nameController = 'profesorAjax';
        $controlador = new $nameController();
        switch ($actionAjax) {
            case 'calificarAlumnos':
                $action = 'evaluacionAlumnos';
                $controlador->$action();
                exit();
            break;
            case 'cerrarActaEvaluacion':
                $action = 'terminarEvaluacion';
                $controlador->$action();
                exit();
            break;
            default:
                exit();
        }
    }
}

require_once 'views/layout/header.php';

if (isset($_GET['controller'])) {
    $nameController = $_GET['controller'].'Controller';
} elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
    $nameController = controller_default;
} else {
    Utils::show_error();
    exit();
}

if (class_exists($nameController)) {
    $controlador = new $nameController();
    
    if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
        $action = $_GET['action'];
        $controlador->$action();
    } elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
        $action_default = action_default;
        $controlador->$action_default();
    } else {
        Utils::show_error();
    }
} else {
    Utils::show_error();
}



require_once 'views/layout/footer.php';
ob_end_flush();
