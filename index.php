<?php

ob_start();

session_start();

require_once 'autoloadController.php';
require_once 'config/db.php';
require_once 'config/parameters.php';
require_once 'helpers/utils.php';
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
