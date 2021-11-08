<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <!-- Viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="icon" type="favicon/x-icon" href="assets/img/logos/IPN.svg" />
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- Iconos de Font Awesome -->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <!-- Styles SweetAlert -->
    <link rel="stylesheet" href="assets/css/sweetalert2.min.css">
    <title>SAES - UPIICSA</title>
</head>

<body>
    <header>
        <div class="container-fluid">
            <div class="row bg-primary">
                <div class="col-sm-12 col-md d-flex justify-content-around align-items-center p-3">
                    <a id="ipn" href="#"><img class="img-fluid" width="55px" src="assets/img/logos/IPN-WHITE.svg" alt="IPN"></a>
                    <h1 class="text-white mx-5 text-center">Sistema de Administración Escolar</h1>
                    <a id="upiicsa" href="#"><img class="img-fluid" width="70px" src="assets/img/logos/UPIICSA.svg" alt="UPIICSA"></a>
                </div>
            </div>
            <div class="row py-3 px-1 bg-primary-dark">
                <div class="col-12 col-lg-7 offset-lg-5">
                    <nav class="nav nav-pills nav-justified">
                        <a id="itemInicio" class="flex-sm-fill text-sm-center nav-link nav-item-hover active mx-2 mt-1 mt-md-0" href="#">Inicio</a>
                        <a id="itemMenu" class="flex-sm-fill text-sm-center nav-link nav-item-hover active mx-2 mt-1 mt-md-0" href="#">Alumnos</a>
                        <a class="flex-sm-fill text-sm-center nav-link nav-item-hover active mx-2 mt-1 mt-md-0" href="https://www.ipn.mx/assets/files/normatividad/docs/reglamentos/Reglamento-Organico-IPN-2020.pdf" target="_blank">Reglamento</a>
                        <a class="flex-sm-fill text-sm-center nav-link nav-item-hover active mx-2 mt-1 mt-md-0" href="#" id="itemAyuda">Ayuda</a>
                        <a id="itemPassword" class="flex-sm-fill text-sm-center nav-link nav-item-hover active mx-2 mt-1 mt-md-0" href="#">Recuperar
                            contraseña</a>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <section id="main">
        <div id="inicio">
            <!-- Inicio de carousel -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 p-0">
                        <div id="carouselIPN" class="carousel carousel-dark slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselIPNIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselIPNIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselIPNIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                <button type="button" data-bs-target="#carouselIPNIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                                <button type="button" data-bs-target="#carouselIPNIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
                                <button type="button" data-bs-target="#carouselIPNIndicators" data-bs-slide-to="5" aria-label="Slide 6"></button>
                                <button type="button" data-bs-target="#carouselIPNIndicators" data-bs-slide-to="6" aria-label="Slide 7"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <a id="upiicsa" href="https://www.upiicsa.ipn.mx/assets/files/upiicsa/Inicio/slide-superior/doc/correo-institucional.pdf" target="_blank">
                                        <img src="assets/img/carrousel/correo_institucional.png" class="d-block img-fluid w-100" alt="Item IPN 1">
                                    </a>
                                </div>
                                <div class="carousel-item">
                                    <a id="upiicsa" href="https://www.upiicsa.ipn.mx/assets/files/upiicsa/Inicio/slide-superior/doc/correo-institucional.pdf" target="_blank">
                                        <img src="assets/img/carrousel/aparatos_ortopedicos.jpg" class="d-block img-fluid w-100" alt="Item IPN 2">
                                    </a>
                                </div>
                                <div class="carousel-item">
                                    <a href="https://www.upiicsa.ipn.mx/assets/files/upiicsa/Inicio/slide-superior/doc/directorio-upiicsa-confinamiento2309.pdf" target="_blank">
                                        <img src="assets/img/carrousel/directorio_upiicsa_confinamiento.png" class="d-block img-fluid w-100" alt="Item IPN 3">
                                    </a>
                                </div>
                                <div class="carousel-item">
                                    <a href="https://elementosdeaprendizaje.ipn.mx/" target="_blank">
                                        <img src="assets/img/carrousel/slider_elem_apren.png" class="d-block img-fluid w-100" alt="Item IPN 4">
                                    </a>
                                </div>
                                <div class="carousel-item">
                                    <a href="https://www.upiicsa.ipn.mx/assets/files/upiicsa/Inicio/slide-superior/doc/correo-alumnos.pdf" target="_blank">
                                        <img src="assets/img/carrousel/correo_alumnos_2.png" class="d-block img-fluid w-100" alt="Item IPN 5">
                                    </a>
                                </div>
                                <div class="carousel-item">
                                    <a href="https://www.upiicsa.ipn.mx/assets/files/upiicsa/Inicio/slide-superior/doc/40_servicio_docentes.pdf" target="_blank">
                                        <img src="assets/img/carrousel/maestro_altamirano.jpg" class="d-block img-fluid w-100" alt="Item IPN 6">
                                    </a>
                                </div>
                                <div class="carousel-item">
                                    <a href="https://alumnoguinda.mx/" target="_blank">
                                        <img src="assets/img/carrousel/correo_temporal.png" class="d-block img-fluid w-100" alt="Item IPN 7">
                                    </a>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselIPN" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselIPN" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fin de carousel -->
            <div class="container pt-4 pb-5">
                <h1 class="text-center">SAES.- Es la herramienta informática diseñada para apoyar en la consulta y
                    realización
                    de trámites escolares.</h1>
                <div class="row justify-content-center">
                    <div class="col-12 col-md-7 d-flex align-items-center">
                        <img src="assets/img/logos/UPIICSA.svg" class="img-fluid float-start" width="200px" alt="UPIICSA">
                        <h2 class="text-warning text-center">Inicie Sesión <span class="text-success">para poder
                                continuar</span></h2>
                    </div>
                    <!-- Inicio del Login-->
                    <div class="col-12 col-md-4">
                        <div class="card m-3">
                            <div class="card-body">
                                <!-- Formulario-->
                                <form class="needs-validation" novalidate action="vista_alumno.html" id="formulario">
                                    <div class="mb-3">
                                        <div class="text-center">
                                            <!-- Correo Electronico -->
                                            <!-- <div class="mb-3">
                                                <label for="correo" class="form-label">Correo Electrónico</label>
                                                <input type="email" class="form-control" name="correo" id="correo" placeholder="Tu correo" required pattern="^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$">
                                            </div> -->
                                            <div class="mb-3">
                                                <label for="usuario" class="form-label">Usuario</label>
                                                <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Tu usuario" required max="13" min="6">
                                            </div>
                                            <!-- FIN Correo Electronico -->
                                            <!-- Contraseña -->
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Contraseña</label>
                                                <input type="password" class="form-control" name="password" id="password" placeholder="Tu contraseña" required pattern="^.{4,12}$">
                                            </div>
                                            <!-- FIN Contraseña -->
                                            <div class="col-12">
                                                <button class="btn btn-primary" type="submit">Entrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- Fin Formulario-->
                            </div>
                        </div>
                    </div>
                    <!-- Fin del Login -->
                </div>
            </div>
            <!-- <div style="height: 10vh"></div> -->
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; SAES
                            <?php echo date("Y") ?>
                        </div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- Inicio de Contraseña -->
        <div id="recuperarPassword" style="display: none;">
            <!-- <nav class="sb-topnav navbar navbar-expand navbar-dark bg-primary">
            <a class="navbar-brand ps-3" href="index.html">Alumno</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav> -->
            <div class="container">
                <div class="row mt-3">
                    <h2 class="text-center">Recuperar contraseña</h2>
                    <div class="col-12 col-lg-6 mx-auto">
                        <div class="card alert-card-primary">
                            <div class="card-body">
                                Capture en el siguiente recuadro, su usuario que utiliza para ingresar a este sistema para recuperar su
                                contraseña.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center align-items-center">
                    <div class="col-auto">
                        <div class="card m-3">
                            <div class="card-body">
                                <form action="" class="p-3">
                                    <div class="mb-3">
                                        <label for="boleta" class="form-label">Usuario</label>
                                        <input type="number" class="form-control" id="boleta" placeholder="Tu boleta">
                                    </div>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-primary">Enviar correo</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="seccionMenu" style="display: none;">
            <div id="layoutSidenav">
                <div id="layoutSidenav_nav">
                    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                        <div class="sb-sidenav-menu">
                            <div class="nav">
                                <div class="sb-sidenav-menu-heading">Perfil</div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                    <div class="sb-nav-link-icon"><i class="fas fa-user-cog"></i></div>
                                    Datos personales
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link py-1 nav-ipn-item" href="#">General</a>
                                        <a class="nav-link py-1 nav-ipn-item" href="#">Médicos</a>
                                        <a class="nav-link py-1 nav-ipn-item" href="#">Deportivos</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                    <div class="sb-nav-link-icon"><i class="fas fa-user-graduate"></i></div>
                                    Datos académicos
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link py-1 nav-ipn-item" href="#">Kárdex</a>
                                        <a class="nav-link py-1 nav-ipn-item" href="#">Estado General</a>
                                        <a class="nav-link py-1 nav-ipn-item" href="#">Solicitud Dictamen</a>
                                        <a class="nav-link py-1 nav-ipn-item" href="#">Dictamen</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseCuenta" aria-expanded="false" aria-controls="collapseCuenta">
                                    <div class="sb-nav-link-icon"><i class="fas fa-user-lock"></i></div>
                                    Cuenta
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseCuenta" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link py-1 nav-ipn-item" href="#">Correo personal</a>
                                        <a class="nav-link py-1 nav-ipn-item" href="#">Clave de acceso</a>
                                    </nav>
                                </div>
                                <div class="sb-sidenav-menu-heading">En curso</div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseInscripcion" aria-expanded="false" aria-controls="collapseInscripcion">
                                    <div class="sb-nav-link-icon"><i class="fas fa-graduation-cap"></i></div>
                                    Inscripción Actual
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseInscripcion" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link py-1 nav-ipn-item" href="#">Horario</a>
                                        <a class="nav-link py-1 nav-ipn-item" href="#">Calificaciones</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseReinscripcion" aria-expanded="false" aria-controls="collapseReinscripcion">
                                    <div class="sb-nav-link-icon"><i class="fas fa-clipboard-check"></i></div>
                                    Reinscripciones
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseReinscripcion" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link py-1 nav-ipn-item" href="#">Cita de Reinscripción</a>
                                        <a class="nav-link py-1 nav-ipn-item" href="#">Reinscripción</a>
                                        <a class="nav-link py-1 nav-ipn-item" href="#">Comprobante</a>
                                    </nav>
                                </div>
                                <div class="sb-sidenav-menu-heading">Gestión</div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseETS" aria-expanded="false" aria-controls="collapseETS">
                                    <div class="sb-nav-link-icon"><i class="fas fa-file-contract"></i></div>
                                    ETS
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseETS" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link py-1 nav-ipn-item" href="#">Inscribir ETS</a>
                                        <a class="nav-link py-1 nav-ipn-item" href="#">Calificaciones</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseSPA" aria-expanded="false" aria-controls="collapseSPA">
                                    <div class="sb-nav-link-icon"><i class="fas fa-chalkboard"></i></div>
                                    SPA
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseSPA" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link py-1 nav-ipn-item" href="#">Inscribir SPA</a>
                                        <a class="nav-link py-1 nav-ipn-item" href="#">Calificaciones</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseRecuperacion" aria-expanded="false" aria-controls="collapseRecuperacion">
                                    <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                                    Recuperación
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseRecuperacion" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link py-1 nav-ipn-item" href="#">Inscribir Curso</a>
                                    </nav>
                                </div>
                                <div class="sb-sidenav-menu-heading">Instructores</div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseTutor" aria-expanded="false" aria-controls="collapseTutor">
                                    <div class="sb-nav-link-icon"><i class="fab fa-leanpub"></i></div>
                                    Tutores
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseTutor" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link py-1 nav-ipn-item" href="#">Tutor Actual</a>
                                        <a class="nav-link py-1 nav-ipn-item" href="#">Comentarios</a>
                                        <a class="nav-link py-1 nav-ipn-item" href="#">Evaluación</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseProfesores" aria-expanded="false" aria-controls="collapseProfesores">
                                    <div class="sb-nav-link-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                                    Profesores
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseProfesores" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link py-1 nav-ipn-item" href="#">Evaluación</a>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="sb-sidenav-footer">
                            Cerrar sesión
                            <div class="small">2019600351</div>
                        </div>
                    </nav>
                </div>
                <div id="layoutSidenav_content">
                    <main>
                        <div class="container-fluid px-4">
                            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
                            <h1 class="mt-4">Datos personales</h1>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
                                <li class="breadcrumb-item active">Datos personales</li>
                            </ol>
                            <div class="card mb-4">
                                <div class="card-body">
                                    <p class="mb-0">
                                        Página de ejemplo
                                    </p>
                                </div>
                            </div>
                            <div style="height: 100vh"></div>
                            <div class="card mb-4">
                                <div class="card-body">When scrolling, the navigation stays at the top of the page. This is the end of
                                    the static navigation demo.</div>
                            </div>
                        </div>
                    </main>
                    <footer class="py-4 bg-light mt-auto">
                        <div class="container-fluid px-4">
                            <div class="d-flex align-items-center justify-content-between small">
                                <div class="text-muted">Copyright &copy; Your Website 2021</div>
                                <div>
                                    <a href="#">Privacy Policy</a>
                                    &middot;
                                    <a href="#">Terms &amp; Conditions</a>
                                </div>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
        <!-- Fin Contraseña -->
    </section>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/sweetalert2.all.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>