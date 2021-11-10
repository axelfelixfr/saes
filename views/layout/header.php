<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <!-- Viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="icon" type="favicon/x-icon" href="<?=base_url?>assets/img/favicon/IPN.ico" />
    <!-- CSS -->
    <link rel="stylesheet" href="<?=base_url?>assets/css/main.css">
    <!-- Iconos de Font Awesome -->
    <link rel="stylesheet" href="<?=base_url?>assets/css/all.min.css">
    <!-- Styles SweetAlert -->
    <link rel="stylesheet" href="<?=base_url?>assets/css/sweetalert2.min.css">
    <title>SAES - UPIICSA</title>
</head>

<body>
    <header>
        <div class="container-fluid">
            <div class="row bg-primary">
                <div class="col-sm-12 col-md d-flex justify-content-around align-items-center p-3">
                    <a id="ipn" href="#"><img class="img-fluid" width="55px" src="<?=base_url?>assets/img/logos/IPN-WHITE.svg" alt="IPN"></a>
                    <h1 class="text-white mx-5 text-center">Sistema de Administración Escolar</h1>
                    <a id="upiicsa" href="#"><img class="img-fluid" width="70px" src="<?=base_url?>assets/img/logos/UPIICSA.svg" alt="UPIICSA"></a>
                </div>
            </div>
            <div class="row py-3 px-1 bg-primary-dark">
                <div class="col-12 col-lg-7 offset-lg-5">
                    <nav class="nav nav-pills nav-justified">
                        <a class="flex-sm-fill text-sm-center nav-link nav-item-hover active mx-2 mt-1 mt-md-0" href="<?=base_url?>">Inicio</a>
                        <?php if (isset($_SESSION['identity'])) :?>
                            <?php if (isset($_SESSION['profesor'])) : ?>
                        <a class="flex-sm-fill text-sm-center nav-link nav-item-hover active mx-2 mt-1 mt-md-0" href="<?=base_url?>profesor/main">Profesores</a>
                            <?php elseif (isset($_SESSION['alumno'])) :?>
                        <a class="flex-sm-fill text-sm-center nav-link nav-item-hover active mx-2 mt-1 mt-md-0" href="<?=base_url?>alumno/main">Alumnos</a>
                            <?php endif; ?>
                        <?php endif; ?>
                        <a class="flex-sm-fill text-sm-center nav-link nav-item-hover active mx-2 mt-1 mt-md-0" href="https://www.ipn.mx/assets/files/normatividad/docs/reglamentos/Reglamento-Organico-IPN-2020.pdf" target="_blank">Reglamento</a>
                        <a class="flex-sm-fill text-sm-center nav-link nav-item-hover active mx-2 mt-1 mt-md-0" href="<?=base_url?>user/ayuda">Ayuda</a>
                        <?php if (!isset($_SESSION['identity'])) :?>
                        <a class="flex-sm-fill text-sm-center nav-link nav-item-hover active mx-2 mt-1 mt-md-0" href="<?=base_url?>user/password">Recuperar
                            contraseña</a>
                        <?php endif; ?>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <section id="main">