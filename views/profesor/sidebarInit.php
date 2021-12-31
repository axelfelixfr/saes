<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Perfil</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-user-cog"></i></div>
                        Información
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link py-1 nav-ipn-item" href="<?= base_url ?>profesor/personal">Personal</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseCuenta" aria-expanded="false" aria-controls="collapseCuenta">
                        <div class="sb-nav-link-icon"><i class="fas fa-user-lock"></i></div>
                        Cuenta
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseCuenta" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link py-1 nav-ipn-item" href="#">Clave de acceso</a>
                        </nav>
                    </div>
                    <div class="sb-sidenav-menu-heading">En curso</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fas fa-user-graduate"></i></div>
                        Grupos
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link py-1 nav-ipn-item" href="<?= base_url ?>profesor/horarios">Horarios</a>
                            <a class="nav-link py-1 nav-ipn-item" href="#">Listados</a>
                            <a class="nav-link py-1 nav-ipn-item" href="#">Asistencia</a>
                            <a class="nav-link py-1 nav-ipn-item" href="<?= base_url ?>profesor/calificaciones">Calificaciones</a>
                            <a class="nav-link py-1 nav-ipn-item" href="#">Concentrado calif.</a>
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
                    <div class="sb-sidenav-menu-heading">Evaluación</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseTutor" aria-expanded="false" aria-controls="collapseTutor">
                        <div class="sb-nav-link-icon"><i class="fab fa-leanpub"></i></div>
                        Resultados
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseTutor" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link py-1 nav-ipn-item" href="#">Detalles</a>
                            <a class="nav-link py-1 nav-ipn-item" href="#">Comentarios</a>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="sb-sidenav-footer m-2">
                <a href="<?= base_url ?>user/logout" class="text-white text-decoration-none nav-ipn-item p-1">Cerrar sesión <i class="fas fa-sign-out-alt"></i></a>
                <div class="small ps-1">
                    <?= $_SESSION['identity']->general->clave_usuario ?>
                </div>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container pt-3">