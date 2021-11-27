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
                            <a class="nav-link py-1 nav-ipn-item" href="<?=base_url?>alumno/general">General</a>
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
            <div class="sb-sidenav-footer m-2">
                <a href="<?=base_url?>user/logout" class="text-white text-decoration-none nav-ipn-item p-1">Cerrar sesión <i class="fas fa-sign-out-alt"></i></a>
                <div class="small ps-1">
                    <?= $_SESSION['identity']->general->clave_usuario ?>
                </div>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container pt-3">